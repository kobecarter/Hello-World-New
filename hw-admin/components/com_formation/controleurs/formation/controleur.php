<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addFormation':    addFormation($_POST);    break;
        case 'editFormation':   editFormation($_POST);   break;
        case 'deleteFormation': deleteFormation($_POST); break;
        case 'enableFormation': enableFormation($_POST); break;
        case 'deleteFormations': deleteFormations($_POST); break;
        case 'enableFormations': enableFormations($_POST); break;
    }
}

function addFormation($data)
{
    $indices = array("titre");
    if (validateFormation($data, $indices)) {
        if (buildFormation($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editFormation($data)
{
    $indices = array("id", "titre");
    if (validateFormation($data, $indices)) {
        if (buildFormation($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteFormation($data)
{
    $indices = array("id");
    if (validateFormation($data, $indices)) {
        $id        = $data["id"];
        $formation = formation::find($id, $_SESSION["langue"]);
        $dir = "../../../../images/formations/";
        if ($formation->getPhoto()         && file_exists($dir . $formation->getPhoto()))         @unlink($dir . $formation->getPhoto());
        if ($formation->getPhotoBanniere() && file_exists($dir . $formation->getPhotoBanniere())) @unlink($dir . $formation->getPhotoBanniere());
        if ($formation->getPdf()           && file_exists($dir . $formation->getPdf()))           @unlink($dir . $formation->getPdf());
        if ($formation->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteFormations($data)
{
    $indices = array("ids");
    if (validateFormation($data, $indices)) {
        if (formation::deleteMultiple($data) == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableFormation($data)
{
    $indices = array("id", "state");
    if (validateFormation($data, $indices)) {
        $formation = new formation();
        $formation->setId($data['id']);
        $formation->setActive($data['state'] == "oui" ? 0 : 1);
        if ($formation->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableFormations($data)
{
    $indices = array("ids", "active");
    if (validateFormation($data, $indices)) {
        $res = formation::enableMultiple($data);
        echo ($res == 1) ? '1' : '2';
    } else {
        echo '0';
    }
}

function validateFormation($data = array(), $indices = array())
{
    foreach ($indices as $indice) {
        if (!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0)) {
            return false;
        }
    }
    return true;
}

function buildFormation($data, $id = null)
{
    $formation = new formation();
    $imgDir    = "../../../../images/formations/";
    $imgExts   = array('jpg','jpeg','png','gif','webp','svg','JPG','JPEG','PNG','GIF','WEBP','SVG');

    if ($id) {
        $formation->setId($id);
        $slug = formation::generateSlug(
            (isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),
            $_SESSION['langue'],
            $id
        );
        $existing = formation::find($id, $_SESSION['langue']);
    } else {
        $slug = formation::generateSlug(
            (isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),
            $_SESSION['langue']
        );
        $existing = null;
    }

    $formation->setTypeFormation(isset($data['type_formation'])  ? $data['type_formation']  : 'presentiel');
    $formation->setTypePublic(isset($data['type_public'])        ? $data['type_public']      : '');
    $formation->setDateDebut(isset($data['date_debut'])          ? $data['date_debut']       : null);
    $formation->setDateFin(isset($data['date_fin'])              ? $data['date_fin']         : null);
    $formation->setLieu(isset($data['lieu'])                     ? $data['lieu']             : '');
    $formation->setNbParticipants(isset($data['nb_participants']) ? intval($data['nb_participants']) : 0);
    $formation->setStatus(isset($data['status'])                 ? $data['status']           : 'brouillon');
    $formation->setActive(isset($data['active'])                 ? 1 : 0);
    $formation->setTitre($data['titre']);
    $formation->setSlug($slug);
    $formation->setH1(isset($data['titre_h1'])                   ? $data['titre_h1']         : '');
    $formation->setSousTitre(isset($data['sous_titre'])          ? $data['sous_titre']       : '');
    $formation->setExtrait(isset($data['extrait'])               ? $data['extrait']          : '');
    $formation->setDescription(isset($data['description'])       ? $data['description']      : '');
    $formation->setPrerequis(isset($data['prerequis'])           ? $data['prerequis']        : '');
    $formation->setLivrables(isset($data['livrables'])           ? $data['livrables']        : '');
    $formation->setSeoTitre(isset($data['seo_titre'])            ? $data['seo_titre']        : '');
    $formation->setSeoDescription(isset($data['seo_description']) ? $data['seo_description'] : '');
    $formation->setDateAdd(date("Y-m-d"));
    $formation->setLastEdit(date("Y-m-d"));
    $formation->setLangue($_SESSION['langue']);

    /* ── photo ─────────────────────────────────────────────────────── */
    if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'][0])) {
        $uploaded = uploadFiles('photo', $imgDir, $imgExts);
        if (isset($uploaded[0])) {
            if ($existing && $existing->getPhoto() && file_exists($imgDir . $existing->getPhoto())) {
                @unlink($imgDir . $existing->getPhoto());
            }
            $formation->setPhoto($uploaded[0]);
        } else {
            $formation->setPhoto($existing ? $existing->getPhoto() : null);
        }
    } else {
        $formation->setPhoto($existing ? $existing->getPhoto() : null);
    }

    /* ── photo bannière ─────────────────────────────────────────────── */
    if (isset($_FILES['photo_banniere']) && !empty($_FILES['photo_banniere']['name'][0])) {
        $uploaded = uploadFiles('photo_banniere', $imgDir, $imgExts);
        if (isset($uploaded[0])) {
            if ($existing && $existing->getPhotoBanniere() && file_exists($imgDir . $existing->getPhotoBanniere())) {
                @unlink($imgDir . $existing->getPhotoBanniere());
            }
            $formation->setPhotoBanniere($uploaded[0]);
        } else {
            $formation->setPhotoBanniere($existing ? $existing->getPhotoBanniere() : null);
        }
    } else {
        $formation->setPhotoBanniere($existing ? $existing->getPhotoBanniere() : null);
    }

    /* ── pdf ────────────────────────────────────────────────────────── */
    if (isset($_FILES['pdf']) && !empty($_FILES['pdf']['name'][0])) {
        $uploaded = uploadFiles('pdf', $imgDir, array('pdf','PDF'));
        if (isset($uploaded[0])) {
            if ($existing && $existing->getPdf() && file_exists($imgDir . $existing->getPdf())) {
                @unlink($imgDir . $existing->getPdf());
            }
            $formation->setPdf($uploaded[0]);
        } else {
            $formation->setPdf($existing ? $existing->getPdf() : null);
        }
    } else {
        $formation->setPdf($existing ? $existing->getPdf() : null);
    }

    return $formation;
}
