<?php
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');

function getDetails($data)
{
    global $db;
    $id = intval($data['id']);
    $projet = new projet($id, $db);
    $nom_domaine = new nom_domaine($projet->getFk_nom_domaine(), $db);
    $nd = $nom_domaine != null ? $nom_domaine->getNom_domaine() : "";
    $etat_avance = $projet->getEtat_avancement() == 100 ? "Complet" : "En cours";
    ?>
    <table class="table">
        <tr>
            <td>Projet</td>
            <td><?= $projet->getNom();?></td>
        </tr>
        <tr>
            <td>Etat d'avance</td>
            <td><?= $projet->getEtat_avancement();?> %</td>
        </tr>
        <tr>
            <td>Avancement</td>
            <td><?= $etat_avance;?></td>
        </tr>
        <tr>
            <td>Date de début</td>
            <td><?= normaldate($projet->getDate_debut());?></td>
        </tr>
        <tr>
            <td>Date de livraison</td>
            <td><?= normaldate($projet->getDate_fin());?></td>
        </tr>
        <tr>
            <td>Nom de domaine</td>
            <?php
            if($nd) {
                ?>
                <td><a href="<?= $nd; ?>" target="_blank"><?= $nd; ?></a></td>
                <?php
            } else {
                ?>
                <td></td>
                <?php
            }
                ?>
        </tr>
    </table>
<?php
}