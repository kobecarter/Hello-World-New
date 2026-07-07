<?php
/* One-off data repair/seed for menu id=3 ("Main menu" / mega menu).
   Completes the 7 existing top-level rows in place (they already point to
   the right records) and inserts group/item rows reproducing today's
   hardcoded getMegaMenu() content, so the new data-driven renderer produces
   the same output. Safe to re-run: it wipes and rebuilds everything under
   menu id=3 except the 7 top-level rows themselves (updated in place, not
   recreated, to preserve their existing ids).

   Disclosed, deliberate deviations from today's hardcoded output (see plan):
   1. market panel: was 8 fake hardcoded agent cards -> now auto-lists the
      real agent_ia table (limit 6, matching its own "6 agents" badge) with
      a trailing "Voir tous" link, mirroring the Solutions IA panel pattern.
   2. solutions/"Sectoriel" group: was 7 hardcoded secteur ids -> now
      auto-lists ALL active secteurs (fixes the previously-invisible
      "Operations-1" duplicate secteur).
   3. saas panel: drops the accidental d-none duplicate "MVP SaaS" card.
   4. agencies panel badge: "6 agents" (copy-paste leftover, semantically
      wrong for an agencies panel) corrected to "7 agences".
   5. web panel's auto-generated cards (card_style=card) render their
      bullet-feature list from the linked service's own extrait/texte_accueil
      content (already editable via the com_service admin) instead of the
      previous per-service-ID hardcoded bullet arrays -- this is not
      pixel-identical on day one unless those services' extrait fields are
      edited to match, but it is the correct place to manage that content
      going forward. */

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../instanceDb.php');
require_once(__DIR__ . '/../../includes/functions/functions.php');

$MENU_ID = 3;

function upsertDetails($db, $idMenuItem, $titre, $lien, $description, $langue = 'fr')
{
    $existing = $db->query("SELECT id_menu_item FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = " . intval($idMenuItem) . " AND langue = " . GetSQLValueString($langue, 'text'));
    if ($db->num_rows($existing) > 0) {
        $db->query(sprintf(
            "UPDATE " . __prefixe_db__ . "details_menu_item SET titre=%s, lien=%s, description=%s WHERE id_menu_item=%s AND langue=%s",
            GetSQLValueString($titre, 'text'),
            GetSQLValueString($lien, 'text'),
            GetSQLValueString($description, 'text'),
            GetSQLValueString($idMenuItem, 'int'),
            GetSQLValueString($langue, 'text')
        ));
    } else {
        $db->query(sprintf(
            "INSERT INTO " . __prefixe_db__ . "details_menu_item (id_menu_item, titre, lien, langue, description) VALUES (%s, %s, %s, %s, %s)",
            GetSQLValueString($idMenuItem, 'int'),
            GetSQLValueString($titre, 'text'),
            GetSQLValueString($lien, 'text'),
            GetSQLValueString($langue, 'text'),
            GetSQLValueString($description, 'text')
        ));
    }
}

function insertItem($db, $menuId, $parentId, $ordre, $fields)
{
    $defaults = array(
        'type' => 'ext', 'id_item' => 0, 'blank' => 0,
        'panel_key' => null, 'icon' => null, 'gradient' => null, 'badge' => null,
        'card_style' => null, 'auto_list' => null, 'auto_limit' => null,
        'show_packs' => 0, 'testimonial_id' => null, 'cta_label' => null,
        'active' => 1, 'image' => null,
        'titre' => '', 'lien' => '#', 'description' => '',
    );
    $f = array_merge($defaults, $fields);

    $sql = sprintf(
        "INSERT INTO " . __prefixe_db__ . "menu_items
            (id_menu, parent_id, type, id_item, blank, ordre, panel_key, icon, gradient, badge, card_style, auto_list, auto_limit, show_packs, testimonial_id, cta_label, active, image)
         VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
        GetSQLValueString($menuId, 'int'),
        GetSQLValueString($parentId, 'int'),
        GetSQLValueString($f['type'], 'text'),
        GetSQLValueString($f['id_item'], 'int'),
        GetSQLValueString($f['blank'], 'int'),
        GetSQLValueString($ordre, 'int'),
        GetSQLValueString($f['panel_key'], 'text'),
        GetSQLValueString($f['icon'], 'text'),
        GetSQLValueString($f['gradient'], 'text'),
        GetSQLValueString($f['badge'], 'text'),
        GetSQLValueString($f['card_style'], 'text'),
        GetSQLValueString($f['auto_list'], 'text'),
        GetSQLValueString($f['auto_limit'], 'int'),
        GetSQLValueString($f['show_packs'], 'int'),
        GetSQLValueString($f['testimonial_id'], 'int'),
        GetSQLValueString($f['cta_label'], 'text'),
        GetSQLValueString($f['active'], 'int'),
        GetSQLValueString($f['image'], 'text')
    );
    $db->query($sql);
    $newId = $db->last_id();
    upsertDetails($db, $newId, $f['titre'], $f['lien'], $f['description']);
    return $newId;
}

function updatePanel($db, $id, $fields, $description = null)
{
    $sets = array();
    foreach ($fields as $col => $val) {
        $sets[] = $col . " = " . GetSQLValueString($val, is_int($val) ? 'int' : 'text');
    }
    $db->query("UPDATE " . __prefixe_db__ . "menu_items SET " . implode(', ', $sets) . " WHERE id = " . intval($id));
    if ($description !== null) {
        // All 7 top-level panels already have a details_menu_item row (pre-existing), so a plain UPDATE is sufficient.
        $db->query(sprintf(
            "UPDATE " . __prefixe_db__ . "details_menu_item SET description=%s WHERE id_menu_item=%s AND langue='fr'",
            GetSQLValueString($description, 'text'),
            GetSQLValueString($id, 'int')
        ));
    }
}

echo "=== Cleaning up: delete dead placeholder rows + any previous groups/items from earlier runs ===\n";
// The 6 known-dead ext/id_item=0 rows under panel 68, plus any group/item
// rows this script previously created (identified as any row whose parent
// is one of the 7 top-level panel ids).
$panelIds = array(68, 75, 76, 77, 78, 79, 80);
foreach ($panelIds as $pid) {
    $level2 = array();
    $res = $db->queryS("SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = $pid");
    foreach ($res as $row) { $level2[] = $row['id']; }
    foreach ($level2 as $gid) {
        $res3 = $db->queryS("SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = $gid");
        foreach ($res3 as $row3) {
            $db->query("DELETE FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = " . $row3['id']);
            $db->query("DELETE FROM " . __prefixe_db__ . "menu_items WHERE id = " . $row3['id']);
        }
        $db->query("DELETE FROM " . __prefixe_db__ . "details_menu_item WHERE id_menu_item = $gid");
        $db->query("DELETE FROM " . __prefixe_db__ . "menu_items WHERE id = $gid");
    }
}
echo "cleanup done\n";

echo "\n=== Updating the 7 top-level panel rows in place ===\n";
// image left NULL for solutions/web/brand on purpose where the hero visual
// should keep following the linked service's own live photo (dynamic,
// matches current behavior); set explicitly where today's hero image is a
// fixed static asset unrelated to the linked record.
updatePanel($db, 68, array('ordre'=>1,'panel_key'=>'solutions','icon'=>'robot','gradient'=>'grad-sol','badge'=>'Service IA','cta_label'=>'Découvrir'),
    "Agents IA & automatisations pour toute votre relation client.");
updatePanel($db, 75, array('ordre'=>2,'panel_key'=>'web','icon'=>'globe','gradient'=>'grad-web','badge'=>'Sur mesure','cta_label'=>'Voir nos réalisations'),
    "Des expériences digitales rapides, élégantes et évolutives.");
updatePanel($db, 76, array('ordre'=>3,'panel_key'=>'saas','icon'=>'rocket','gradient'=>'grad-saas','badge'=>'Produits','cta_label'=>'Lancer mon produit','image'=>'images/pages/saas.webp'),
    "Du MVP au dashboard décisionnel, livré vite et bien.");
updatePanel($db, 77, array('ordre'=>4,'panel_key'=>'market','icon'=>'robot','gradient'=>'grad-mk','badge'=>'6 agents','cta_label'=>'Parcourir','image'=>'images/pages/market-place.webp'),
    "Activez un agent IA en quelques jours, pas en mois.");
updatePanel($db, 78, array('ordre'=>5,'panel_key'=>'form','icon'=>'cap','gradient'=>'grad-form','badge'=>'Académie','cta_label'=>'Voir le calendrier','image'=>'images/pages/formation.webp'),
    "Montez en compétence, vous et vos équipes.");
updatePanel($db, 79, array('ordre'=>6,'panel_key'=>'brand','icon'=>'palette','gradient'=>'grad-brand','badge'=>'360°','cta_label'=>'Découvrir','image'=>'images/pages/branding.webp'),
    ""); // empty on purpose: brand's hero desc falls back to the live service's own extrait, matching current behavior.
$agenceMarraPhoto = new page(33, $db, 'fr');
updatePanel($db, 80, array('ordre'=>7,'panel_key'=>'agencies','icon'=>'robot','gradient'=>'grad-mk','badge'=>'7 agences','cta_label'=>'Parcourir','image'=>'images/pages/'.$agenceMarraPhoto->getPhoto()),
    "Une présence mondiale, un accompagnement de proximité et des solutions pensées pour vos ambitions internationales.");
echo "panels updated\n";

echo "\n=== brand (id 79) ===\n";
$g = insertItem($db, $MENU_ID, 79, 1, array('type'=>'service','id_item'=>18,'card_style'=>'sublink','auto_list'=>'service_children','titre'=>'Expertises','lien'=>'#'));
insertItem($db, $MENU_ID, $g, 1, array('type'=>'ext','lien'=>'', 'titre'=>"Voir toute l'offre Brand Experience",'description'=>"Découvrez l'ensemble de nos expertises en création de marque.",'icon'=>'palette'));
// lien left empty here -> renderer falls back to the panel's own service link when empty (see menu.php).

echo "=== web (id 75) ===\n";
$g = insertItem($db, $MENU_ID, 75, 1, array('type'=>'service','id_item'=>107,'card_style'=>'card','auto_list'=>'service_children','titre'=>'Offres','lien'=>'#'));
insertItem($db, $MENU_ID, $g, 1, array('type'=>'ext','lien'=>'', 'titre'=>"Voir toute l'offre Web & Mobile",'icon'=>'globe'));

echo "=== saas (id 76) ===\n";
$g = insertItem($db, $MENU_ID, 76, 1, array('type'=>'ext','lien'=>'#','card_style'=>'card','titre'=>'Produits'));
insertItem($db, $MENU_ID, $g, 1, array('type'=>'ext','lien'=>'', 'titre'=>'MVP SaaS','icon'=>'building','image'=>'https://loremflickr.com/600/700/software,office?lock=18','description'=>"Du concept au produit en ligne, vite et bien.\n• Prototypage rapide\n• Sprints agiles\n• Itération continue"));
insertItem($db, $MENU_ID, $g, 2, array('type'=>'ext','lien'=>'', 'titre'=>'Plateformes Métiers','icon'=>'building','image'=>'https://loremflickr.com/600/700/software,office?lock=18','description'=>"Des outils internes qui font gagner du temps.\n• Outils PME / ETI\n• Workflows automatisés\n• ERP / CRM internes"));
insertItem($db, $MENU_ID, $g, 3, array('type'=>'ext','lien'=>'', 'titre'=>'Dashboards & Analytics','icon'=>'dash','image'=>'https://loremflickr.com/600/700/data,dashboard?lock=19','description'=>"Vos décisions enfin guidées par la donnée.\n• BI & KPI visuels\n• Tableaux temps réel\n• Reporting automatisé"));
// saas items' 'lien' left empty -> falls back to the panel's own service link ($saasProduit) at render time.

echo "=== market (id 77) ===\n";
$g = insertItem($db, $MENU_ID, 77, 1, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','auto_list'=>'agent_ia','auto_limit'=>6,'titre'=>'Agents disponibles'));
insertItem($db, $MENU_ID, $g, 1, array('type'=>'ext','lien'=>'', 'titre'=>'Voir tous les agents','icon'=>'grid'));

echo "=== form (id 78) ===\n";
$g = insertItem($db, $MENU_ID, 78, 1, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','auto_list'=>'formation','titre'=>'Programmes'));
insertItem($db, $MENU_ID, $g, 1, array('type'=>'ext','lien'=>'', 'titre'=>'Voir toutes nos formations','icon'=>'grid'));

echo "=== solutions (id 68) ===\n";
$gAgents = insertItem($db, $MENU_ID, 68, 1, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','auto_list'=>'agent_ia','auto_limit'=>6,'titre'=>'Agents IA'));
insertItem($db, $MENU_ID, $gAgents, 1, array('type'=>'ext','lien'=>'', 'titre'=>'Voir tous les agents IA','icon'=>'grid'));

$gAuto = insertItem($db, $MENU_ID, 68, 2, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','titre'=>'Automatisations'));
insertItem($db, $MENU_ID, $gAuto, 1, array('type'=>'ext','lien'=>'', 'titre'=>'CRM','icon'=>'users','image'=>'images/agent-ia/CRM.webp','description'=>'Leads & clients'));
insertItem($db, $MENU_ID, $gAuto, 2, array('type'=>'ext','lien'=>'', 'titre'=>'Email','icon'=>'mail','image'=>'images/agent-ia/Email.webp','description'=>'Campagnes & suivis'));
insertItem($db, $MENU_ID, $gAuto, 3, array('type'=>'ext','lien'=>'', 'titre'=>'Prospection','icon'=>'target','image'=>'images/agent-ia/Prospection.webp','description'=>'Leads qualifiés'));
insertItem($db, $MENU_ID, $gAuto, 4, array('type'=>'ext','lien'=>'', 'titre'=>'Reporting','icon'=>'chart','image'=>'images/agent-ia/Reporting.webp','description'=>'Tableaux de bord'));
// 'Automatisations' items' lien left empty -> falls back to the panel's own service link ($solutionIA).

$gSect = insertItem($db, $MENU_ID, 68, 3, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','auto_list'=>'secteur','titre'=>'Sectoriel'));
echo "solutions groups+items done (gAgents=$gAgents gAuto=$gAuto gSect=$gSect)\n";

echo "=== agencies (id 80) ===\n";
$g = insertItem($db, $MENU_ID, 80, 1, array('type'=>'ext','lien'=>'#','card_style'=>'sublink','titre'=>'Agences'));
$agencePages = array(
    1 => array('id'=>32, 'ordre'=>1),
    2 => array('id'=>33, 'ordre'=>2),
    3 => array('id'=>34, 'ordre'=>3),
    4 => array('id'=>38, 'ordre'=>4),
    5 => array('id'=>37, 'ordre'=>5),
    6 => array('id'=>40, 'ordre'=>6),
    7 => array('id'=>39, 'ordre'=>7),
);
foreach ($agencePages as $row) {
    $p = new page($row['id'], $db, 'fr');
    insertItem($db, $MENU_ID, $g, $row['ordre'], array('type'=>'page','id_item'=>$row['id'],'icon'=>'chat','titre'=>$p->getTitre(),'lien'=>''));
}
echo "agencies done\n";

echo "\nDone seeding menu id=3.\n";
