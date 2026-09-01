<?php

// Pont lecture seule pour le CRM (hw-agences/components/com_expertise/classes/siteCatalog.php,
// task=apiXxx) - même patron que com_fidelite/controleurs/router.php côté CRM (secret partagé
// vérifié en constant-time), mais dans le sens inverse : ici c'est le CRM qui consulte les
// vraies données du site (services, formations, réalisations, témoignages, coordonnées), qui
// n'existent que dans cette base. Avant ce fichier, com_fidelite::siteDb() tentait de lire
// hw-admin/config.php via un chemin relatif - impossible dès que le CRM et le site ne sont plus
// sur le même serveur (cas réel en production : CRM sur helloworldlabel.ae, site sur
// helloworld-agency.com), d'où ce pont HTTP.
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/instanceDb.php";
require_once __DIR__ . "/includes/functions/functions.php";

function crmBridgeSecretOk()
{
    $provided = isset($_GET['secret']) ? $_GET['secret'] : (isset($_SERVER['HTTP_X_WEBHOOK_SECRET']) ? $_SERVER['HTTP_X_WEBHOOK_SECRET'] : '');
    return defined('CRM_BRIDGE_SECRET') && CRM_BRIDGE_SECRET !== '' && hash_equals(CRM_BRIDGE_SECRET, (string) $provided);
}

function crmBridgeForbidden()
{
    error_log('crmCatalogApi - tentative non autorisée depuis ' . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'inconnue'));
    http_response_code(403);
    echo json_encode(array('error' => 'forbidden'));
}

// Décode les entités HTML (CKEditor) et retire les balises - le CRM/mobile affiche du texte
// brut. Retourne toujours une chaîne (jamais null) : un champ NULL en base (ex: extrait vide)
// ferait planter le parsing côté modèles mobile, qui déclarent ces champs non-nullables.
function crmBridgeCleanText($value)
{
    if (empty($value)) {
        return "";
    }
    return trim(html_entity_decode(strip_tags($value), ENT_QUOTES, 'UTF-8'));
}

// URLs absolues construites ici (le site connaît sa propre URL réelle) plutôt que côté CRM,
// qui devrait sinon deviner/dupliquer siteURL.
function crmBridgePhotoUrl($dossier, $photo)
{
    global $siteURL;
    return !empty($photo) ? rtrim($siteURL, '/') . '/images/' . $dossier . '/' . $photo : "";
}

if (!isset($_GET['task']) || empty($_GET['task'])) {
    http_response_code(400);
    echo json_encode(array('error' => 'missing_task'));
    exit;
}

header('Content-Type: application/json; charset=utf-8');

if (!crmBridgeSecretOk()) {
    crmBridgeForbidden();
    exit;
}

$task = $_GET['task'];
$langue = isset($_GET['langue']) ? $_GET['langue'] : 'fr';

switch ($task) {
    case 'apiServices':
        crmBridgeApiServices($langue);
        break;
    case 'apiFormations':
        crmBridgeApiFormations($langue);
        break;
    case 'apiReferences':
        crmBridgeApiReferences($langue);
        break;
    case 'apiTestimonials':
        crmBridgeApiTestimonials($langue);
        break;
    case 'apiConfig':
        crmBridgeApiConfig();
        break;
    case 'apiDigitalExpertVideos':
        crmBridgeApiDigitalExpertVideos($langue);
        break;
    default:
        http_response_code(404);
        echo json_encode(array('error' => 'unknown_task'));
}

// Services "vitrine" (actifs, racine, home=1) - même filtre que l'onglet Découvrir de
// l'espace client web (components/com_client/views/client/facture.php).
function crmBridgeApiServices($langue)
{
    global $db, $prefixe_db, $siteURL;
    $sql = sprintf(
        "SELECT A.id AS ID, A.photo, B.titre, B.extrait, B.slug FROM %sservice A " .
        "LEFT JOIN %sdetails_service B ON A.id = B.id_service AND B.langue = %s " .
        "WHERE A.active = 1 AND (A.id_parent = 0 OR A.id_parent IS NULL) AND A.home = 1 " .
        "ORDER BY A.ordre ASC",
        $prefixe_db,
        $prefixe_db,
        GetSQLValueString($langue, "text")
    );
    $rows = $db->queryS($sql);
    $items = array();
    foreach ((is_array($rows) ? $rows : array()) as $row) {
        $items[] = array(
            "id" => (int) $row['ID'],
            "titre" => crmBridgeCleanText($row['titre']),
            "extrait" => crmBridgeCleanText($row['extrait']),
            "photo" => crmBridgePhotoUrl('services', $row['photo']),
            "slug" => $row['slug'],
        );
    }
    echo json_encode(array('data' => $items));
}

// Formations à venir uniquement (filtré ici, comme l'original côté CRM) - la limite reste
// du ressort de l'appelant (le CRM), pas de cette API.
function crmBridgeApiFormations($langue)
{
    global $db, $prefixe_db;
    $sql = sprintf(
        "SELECT A.id AS ID, A.photo, A.date_debut, A.date_fin, A.lieu, B.titre, B.extrait, B.slug FROM %sformation A " .
        "LEFT JOIN %sdetails_formation B ON A.id = B.id_formation AND B.langue = %s " .
        "WHERE A.active = 1 ORDER BY A.date_debut ASC",
        $prefixe_db,
        $prefixe_db,
        GetSQLValueString($langue, "text")
    );
    $rows = $db->queryS($sql);
    $today = date('Y-m-d');
    $items = array();
    foreach ((is_array($rows) ? $rows : array()) as $row) {
        $end = !empty($row['date_fin']) ? $row['date_fin'] : $row['date_debut'];
        if (!empty($end) && substr($end, 0, 10) < $today) {
            continue;
        }
        $items[] = array(
            "id" => (int) $row['ID'],
            "titre" => crmBridgeCleanText($row['titre']),
            "extrait" => crmBridgeCleanText($row['extrait']),
            "photo" => crmBridgePhotoUrl('formations', $row['photo']),
            "date_debut" => $row['date_debut'],
            "date_fin" => $row['date_fin'],
            "lieu" => $row['lieu'],
            "slug" => $row['slug'],
        );
    }
    echo json_encode(array('data' => $items));
}

// Réalisations / cas clients réels (hw_reference) - même filtre que la page publique
// r-alisations-et-cas-clients (components/com_reference/index.php : active=1, id décroissant).
function crmBridgeApiReferences($langue)
{
    global $db, $prefixe_db;
    $sql = sprintf(
        "SELECT A.id AS ID, A.photo, B.nom_client, B.extrait, B.site_web FROM %sreference A " .
        "LEFT JOIN %sdetails_reference B ON A.id = B.id_reference AND B.langue = %s " .
        "WHERE A.active = 1 ORDER BY A.id DESC",
        $prefixe_db,
        $prefixe_db,
        GetSQLValueString($langue, "text")
    );
    $rows = $db->queryS($sql);
    $items = array();
    foreach ((is_array($rows) ? $rows : array()) as $row) {
        $items[] = array(
            "id" => (int) $row['ID'],
            "titre" => crmBridgeCleanText($row['nom_client']),
            "extrait" => crmBridgeCleanText($row['extrait']),
            "photo" => crmBridgePhotoUrl('references', $row['photo']),
        );
    }
    echo json_encode(array('data' => $items));
}

// Vrais avis clients (hw_temoignage).
function crmBridgeApiTestimonials($langue)
{
    global $db, $prefixe_db;
    $sql = sprintf(
        "SELECT A.id AS ID, A.photo, B.nom, B.fonction, B.temoignage FROM %stemoignage A " .
        "LEFT JOIN %sdetails_temoignage B ON A.id = B.id_temoignage AND B.langue = %s " .
        "WHERE A.active = 1 ORDER BY A.ordre ASC",
        $prefixe_db,
        $prefixe_db,
        GetSQLValueString($langue, "text")
    );
    $rows = $db->queryS($sql);
    $items = array();
    foreach ((is_array($rows) ? $rows : array()) as $row) {
        $auteur = crmBridgeCleanText($row['nom']);
        $texte = crmBridgeCleanText($row['temoignage']);
        if (empty($auteur) || empty($texte)) {
            continue;
        }
        $items[] = array(
            "author" => $auteur,
            "fonction" => crmBridgeCleanText($row['fonction']),
            "testimonial" => $texte,
            "photo" => crmBridgePhotoUrl('temoignages', $row['photo']),
        );
    }
    echo json_encode(array('data' => $items));
}

// Coordonnées et réseaux sociaux réels du site (hw_config, ligne unique).
function crmBridgeApiConfig()
{
    global $db, $prefixe_db;
    $rows = $db->queryS("SELECT email, tel, tel2, facebook, twitter, instagram, youtube, linkedin FROM " . $prefixe_db . "config LIMIT 1");
    echo json_encode(array('data' => (is_array($rows) && count($rows) > 0) ? $rows[0] : array()));
}

// Vidéos "Digital Expert" (hw_video, id_categorie = 14) - même source que la page
// d'accueil du site (components/com_frontpage/index.php: video::findAllByCategorie($lang,14,...)).
function crmBridgeApiDigitalExpertVideos($langue)
{
    global $db, $prefixe_db;
    $sql = sprintf(
        "SELECT A.id AS ID, A.video, A.photo, A.date_shooting, B.titre, B.extrait, B.localisation FROM %svideo A " .
        "LEFT JOIN %sdetails_video B ON A.id = B.id_video AND B.langue = %s " .
        "WHERE A.active = 1 AND A.id_categorie = 14 ORDER BY A.ordre ASC",
        $prefixe_db,
        $prefixe_db,
        GetSQLValueString($langue, "text")
    );
    $rows = $db->queryS($sql);
    $items = array();
    foreach ((is_array($rows) ? $rows : array()) as $row) {
        $items[] = array(
            "id" => (int) $row['ID'],
            "titre" => crmBridgeCleanText($row['titre']),
            "extrait" => crmBridgeCleanText($row['extrait']),
            "localisation" => crmBridgeCleanText($row['localisation']),
            "date_shooting" => $row['date_shooting'],
            "photo" => crmBridgePhotoUrl('videos', $row['photo']),
            "youtube_id" => $row['video'],
            "youtube_url" => !empty($row['video']) ? 'https://www.youtube.com/watch?v=' . $row['video'] : "",
        );
    }
    echo json_encode(array('data' => $items));
}
