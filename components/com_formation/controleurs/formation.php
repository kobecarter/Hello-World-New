<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "../../../hw-admin/config.php";
require_once('../../../hw-admin/instanceDb.php');
require_once('../../../includes/functions/functions.php');
require '../../../vendor/autoload.php';
session_start();

/* ── Soumission Forms HubSpot (portail HW = 143509868) ────────────────────
   Le GUID du formulaire cible doit être renseigné ici : il correspond au
   formulaire HubSpot déjà utilisé pour les leads "Formations" sur
   https://www.helloworld-agency.com/ (Marketing > Formulaires > ... >
   Intégrer > "Copier l'ID du formulaire"). Tant qu'il n'est pas renseigné,
   l'envoi HubSpot est ignoré silencieusement (l'email et l'enregistrement
   local continuent de fonctionner normalement). */
define('HS_PORTAL_ID', '143509868');
define('HS_FORM_GUID', ''); // ← à compléter

if (isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'qualification':
            qualification($_POST);
            break;
    }
}

function submitToHubspot($data)
{
    if (HS_FORM_GUID === '') {
        return; // GUID non configuré, on ignore proprement
    }
    $fields = array();
    $map = array(
        'email'      => 'email',
        'prenom'     => 'firstname',
        'nom'        => 'lastname',
        'telephone'  => 'phone',
        'nom_societe'=> 'company',
        'message'    => 'message',
    );
    foreach ($map as $key => $hsField) {
        if (!empty($data[$key])) {
            $fields[] = array('name' => $hsField, 'value' => $data[$key]);
        }
    }
    $payload = json_encode(array(
        'fields' => $fields,
        'context' => array(
            'pageUri'  => isset($data['page_uri']) ? $data['page_uri'] : '',
            'pageName' => isset($data['formation']) ? $data['formation'] : '',
        ),
    ));
    $url = 'https://api.hsforms.com/submissions/v3/integration/submit/' . HS_PORTAL_ID . '/' . HS_FORM_GUID;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    curl_close($ch);
}

/* ── Demande de qualification / inscription formation ─────────────────── */
function qualification($data)
{
    global $db;
    if (!isset($data['prenom']) || empty($data['prenom']) ||
        !isset($data['nom'])    || empty($data['nom'])    ||
        !isset($data['email'])  || empty($data['email'])
    ) {
        echo '0';
        exit;
    }

    $config = new config($db);
    $mail = new PHPMailer(true);
    try {
        $mail->Host     = 'helloworld-agency.com';
        $mail->Username = $config->getEmail();

        $mail->setFrom($data['email'], $data['prenom'] . ' ' . $data['nom']);
        $mail->addAddress($config->getEmail(), $config->getNom());
        $mail->addReplyTo($data['email'], $data['prenom'] . ' ' . $data['nom']);

        $mail->isHTML(true);
        $mail->CharSet  = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject  = 'Demande de formation — ' . (isset($data['formation']) ? $data['formation'] : 'Hello World Academy');
        $mail->AltBody  = 'Nouvelle demande de formation';

        $rows = '';
        $labels = array(
            'formation'          => 'Formation souhaitée',
            'format'             => 'Format souhaité',
            'statut'             => 'Vous êtes',
            'niveau_ia'          => "Niveau d'expérience IA",
            'domaine'            => "Domaine d'activité",
            'budget'             => 'Budget estimatif',
            'disponibilite'      => 'Disponibilité',
            'metier'             => 'Métier / spécialité',
            'annees_experience'  => "Années d'expérience",
            'niveau_ia_freelance'=> 'Niveau IA',
            'objectif_business'  => 'Objectif business',
            'nom_societe'        => 'Société',
            'poste'              => 'Poste',
            'taille_societe'     => 'Taille de la société',
            'nb_participants'    => 'Nombre de participants',
            'secteur'            => "Secteur d'activité",
            'maturite_ia'        => 'Maturité IA',
            'contexte'           => 'Contexte / enjeux',
            'besoin'             => 'Besoin principal',
            'prenom'             => 'Prénom',
            'nom'                => 'Nom',
            'email'              => 'Email',
            'telephone'          => 'Téléphone',
            'message'            => 'Message',
        );
        foreach ($labels as $key => $label) {
            if (!empty($data[$key])) {
                $rows .= '<tr><td><strong>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . ' : </strong></td><td>' . nl2br(htmlspecialchars($data[$key], ENT_QUOTES, 'UTF-8')) . '</td></tr>';
            }
        }

        $message = '<html><body>
            <h1 style="font-weight:normal">Nouvelle demande de formation</h1>
            <table border="0" cellpadding="5">' . $rows . '</table>
            </body></html>';

        $insertSQL = sprintf(
            "INSERT INTO " . __prefixe_db__ . "contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString('Formation', "text"),
            GetSQLValueString($data['prenom'] . ' ' . $data['nom'], "text"),
            GetSQLValueString($data['email'], "text"),
            GetSQLValueString(isset($data['telephone']) ? $data['telephone'] : '', "text"),
            GetSQLValueString($message, "text"),
            GetSQLValueString(date('Y-m-d'), "date"),
            GetSQLValueString(1, "int")
        );
        $db->query($insertSQL);

        $mail->Body = $message;
        $sent = $mail->send();

        submitToHubspot($data);

        echo $sent ? '1' : '3';
    } catch (Exception $e) {
        echo '3';
    }
}
