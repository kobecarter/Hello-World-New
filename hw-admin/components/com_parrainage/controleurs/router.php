<?php
// Endpoint AJAX : mise à jour du statut / de la récompense d'un parrainage.
// Réservé à un admin connecté ($_SESSION['user']).
require_once("../../../config.php");
require_once("../../../instanceDb.php");
require_once("../../../includes/functions/functions.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    echo "0";
    exit;
}

$task = isset($_GET['task']) ? $_GET['task'] : '';

if ($task === 'update') {
    if (!isset($_POST['id']) || $_POST['id'] === '') {
        echo "0";
        exit;
    }
    $id = (int) $_POST['id'];
    $statut = isset($_POST['statut']) ? (int) $_POST['statut'] : 0;
    if ($statut < 0 || $statut > 3) {
        $statut = 0;
    }
    $recompense = isset($_POST['recompense']) ? trim($_POST['recompense']) : '';
    // Récompense considérée "donnée" quand le parrainage est converti ET qu'une récompense est saisie.
    $donnee = ($statut === 2 && $recompense !== '') ? 1 : 0;

    $db->query(sprintf(
        "UPDATE " . __prefixe_db__ . "parrainage SET statut = %s, recompense = %s, recompense_donnee = %s, last_edit = %s WHERE id = %s",
        GetSQLValueString($statut, "int"),
        GetSQLValueString($recompense, "text"),
        GetSQLValueString($donnee, "int"),
        GetSQLValueString(date("Y-m-d H:i:s"), "text"),
        GetSQLValueString($id, "int")
    ));
    echo "1";
    exit;
}

echo "0";
