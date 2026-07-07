<?php
/* One-off schema upgrade: adds the columns needed to make the mega menu
   fully admin-manageable. Safe to run more than once (checks
   information_schema before adding each column). Run via CLI:
     php upgrade_mega_menu.php
   or by visiting it once in a browser, then delete/archive this file. */

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../instanceDb.php');
require_once(__DIR__ . '/../../includes/functions/functions.php');

function columnExists($db, $table, $column)
{
    $dbName = GetSQLValueString($GLOBALS['dataBaseName'], 'text');
    $res = $db->query("SELECT COUNT(*) as c FROM information_schema.columns
        WHERE table_schema = {$dbName} AND table_name = '" . __prefixe_db__ . $table . "' AND column_name = '{$column}'");
    $row = $db->fetch_assoc($res);
    return intval($row['c']) > 0;
}

function indexExists($db, $table, $indexName)
{
    $dbName = GetSQLValueString($GLOBALS['dataBaseName'], 'text');
    $res = $db->query("SELECT COUNT(*) as c FROM information_schema.statistics
        WHERE table_schema = {$dbName} AND table_name = '" . __prefixe_db__ . $table . "' AND index_name = '{$indexName}'");
    $row = $db->fetch_assoc($res);
    return intval($row['c']) > 0;
}

$menuItemsColumns = array(
    'panel_key'      => "VARCHAR(20) NULL",
    'icon'           => "VARCHAR(20) NULL",
    'gradient'       => "VARCHAR(10) NULL",
    'badge'          => "VARCHAR(60) NULL",
    'card_style'     => "VARCHAR(10) NULL",
    'auto_list'      => "VARCHAR(20) NULL",
    'auto_limit'     => "INT NULL",
    'show_packs'     => "TINYINT(1) NOT NULL DEFAULT 0",
    'testimonial_id' => "INT NULL",
    'cta_label'      => "VARCHAR(80) NULL",
    'active'         => "TINYINT(1) NOT NULL DEFAULT 1",
    'image'          => "VARCHAR(255) NULL",
);

$m = new migration();
$m->table('menu_items');
$anyPending = false;
foreach ($menuItemsColumns as $col => $def) {
    if (!columnExists($db, 'menu_items', $col)) {
        $m->addColumn($col, $def);
        $anyPending = true;
        echo "queued: menu_items.{$col}\n";
    } else {
        echo "skip (exists): menu_items.{$col}\n";
    }
}
if ($anyPending) {
    $m->exec();
}

if (!columnExists($db, 'details_menu_item', 'description')) {
    $m2 = new migration();
    $m2->table('details_menu_item')->addColumn('description', 'TEXT NULL');
    $m2->exec();
    echo "queued: details_menu_item.description\n";
} else {
    echo "skip (exists): details_menu_item.description\n";
}

if (!indexExists($db, 'details_menu_item', 'uniq_item_lang')) {
    $db->query("ALTER TABLE " . __prefixe_db__ . "details_menu_item ADD UNIQUE INDEX uniq_item_lang (id_menu_item, langue)");
    echo "queued: uniq_item_lang index\n";
} else {
    echo "skip (exists): uniq_item_lang index\n";
}

echo "\n--- Verification (re-checking information_schema) ---\n";
$allOk = true;
foreach (array_keys($menuItemsColumns) as $col) {
    $ok = columnExists($db, 'menu_items', $col);
    $allOk = $allOk && $ok;
    echo ($ok ? "OK   " : "FAIL ") . "menu_items.{$col}\n";
}
$ok = columnExists($db, 'details_menu_item', 'description');
$allOk = $allOk && $ok;
echo ($ok ? "OK   " : "FAIL ") . "details_menu_item.description\n";
$ok = indexExists($db, 'details_menu_item', 'uniq_item_lang');
$allOk = $allOk && $ok;
echo ($ok ? "OK   " : "FAIL ") . "details_menu_item unique index uniq_item_lang\n";

echo "\n" . ($allOk ? "ALL COLUMNS/INDEX CONFIRMED PRESENT." : "SOME COLUMNS MISSING — see FAIL lines above.") . "\n";
