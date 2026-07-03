<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addAgentIa':    addAgentIa($_POST);    break;
        case 'editAgentIa':   editAgentIa($_POST);   break;
        case 'deleteAgentIa': deleteAgentIa($_POST); break;
        case 'enableAgentIa': enableAgentIa($_POST); break;
        case 'deleteAgentsIa': deleteAgentsIa($_POST); break;
        case 'enableAgentsIa': enableAgentsIa($_POST); break;
    }
}

function addAgentIa($data)
{
    $indices = array("titre");
    if (validateAgentIa($data, $indices)) {
        if (buildAgentIa($data)->add() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editAgentIa($data)
{
    $indices = array("id", "titre");
    if (validateAgentIa($data, $indices)) {
        if (buildAgentIa($data, $data['id'])->edit() == 1) {
            seo();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteAgentIa($data)
{
    $indices = array("id");
    if (validateAgentIa($data, $indices)) {
        $id    = $data["id"];
        $agent = agent_ia::find($id, $_SESSION["langue"]);
        if ($agent->delete() == 1) {
            if ($agent->getPhoto() && file_exists("../../../../images/agents_ia/" . $agent->getPhoto())) {
                @unlink("../../../../images/agents_ia/" . $agent->getPhoto());
            }
            if ($agent->getPhotoBanniere() && file_exists("../../../../images/agents_ia/" . $agent->getPhotoBanniere())) {
                @unlink("../../../../images/agents_ia/" . $agent->getPhotoBanniere());
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteAgentsIa($data)
{
    $indices = array("ids");
    if (validateAgentIa($data, $indices)) {
        $photos = agent_ia::findPhotosName($data);
        if (agent_ia::deleteMultiple($data) == 1) {
            if ($photos) {
                foreach ($photos as $photo) {
                    if ($photo && file_exists("../../../../images/agents_ia/" . $photo)) {
                        @unlink("../../../../images/agents_ia/" . $photo);
                    }
                }
            }
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableAgentIa($data)
{
    $indices = array("id", "state");
    if (validateAgentIa($data, $indices)) {
        $agent = new agent_ia();
        $agent->setId($data['id']);
        $agent->setActive($data['state'] == "oui" ? 0 : 1);
        if ($agent->enable() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function enableAgentsIa($data)
{
    $indices = array("ids", "active");
    if (validateAgentIa($data, $indices)) {
        $res = agent_ia::enableMultiple($data);
        echo ($res == 1) ? '1' : '2';
    } else {
        echo '0';
    }
}

function validateAgentIa($data = array(), $indices = array())
{
    foreach ($indices as $indice) {
        if (!isset($data[$indice]) || (empty($data[$indice]) && $data[$indice] != 0)) {
            return false;
        }
    }
    return true;
}

function buildAgentIa($data, $id = null)
{
    $agent      = new agent_ia();
    $allowedExt = array('jpg', 'jpeg', 'gif', 'png', 'svg', 'webp', 'JPG', 'JPEG', 'GIF', 'PNG', 'SVG', 'WEBP');
    $imgDir     = '../../../../images/agents_ia/';

    $photo          = array();
    $photo_banniere = array();

    if (isset($_FILES['photo']) && $_FILES['photo']['name'][0] != '') {
        $photo = uploadFiles('photo', $imgDir, $allowedExt);
    }
    if (isset($_FILES['photo_banniere']) && $_FILES['photo_banniere']['name'][0] != '') {
        $photo_banniere = uploadFiles('photo_banniere', $imgDir, $allowedExt);
    }

    if ($id) {
        $agent->setId($id);
        $existing = agent_ia::find($id, $_SESSION['langue']);

        if (isset($photo[0])) {
            $agent->setPhoto($photo[0]);
            if ($existing->getPhoto() && file_exists($imgDir . $existing->getPhoto())) {
                @unlink($imgDir . $existing->getPhoto());
            }
        } else {
            $agent->setPhoto($existing->getPhoto());
        }

        if (isset($photo_banniere[0])) {
            $agent->setPhotoBanniere($photo_banniere[0]);
            if ($existing->getPhotoBanniere() && file_exists($imgDir . $existing->getPhotoBanniere())) {
                @unlink($imgDir . $existing->getPhotoBanniere());
            }
        } else {
            $agent->setPhotoBanniere($existing->getPhotoBanniere());
        }

        $slug = agent_ia::generateSlug(
            (isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),
            $_SESSION['langue'],
            $id
        );
    } else {
        $agent->setPhoto(isset($photo[0]) ? $photo[0] : null);
        $agent->setPhotoBanniere(isset($photo_banniere[0]) ? $photo_banniere[0] : null);
        $slug = agent_ia::generateSlug(
            (isset($data['slug']) && !empty($data['slug']) ? $data['slug'] : $data['titre']),
            $_SESSION['langue']
        );
    }

    $secteurIds = [];
    if (!empty($data['id_secteur']) && is_array($data['id_secteur'])) {
        $secteurIds = $data['id_secteur'];
    }
    $agent->setSecteurIds($secteurIds);
    $agent->setH1(isset($data['h1']) ? $data['h1'] : '');
    $agent->setActive(isset($data['active']) ? 1 : 0);
    $agent->setTitre($data['titre']);
    $agent->setSlug($slug);
    $agent->setSousTitre(isset($data['sous_titre']) ? $data['sous_titre'] : '');
    $agent->setExtrait(isset($data['extrait']) ? $data['extrait'] : '');
    $agent->setTexte(isset($data['texte']) ? $data['texte'] : '');
    $agent->setSeoTitre(isset($data['seo_titre']) ? $data['seo_titre'] : '');
    $agent->setSeoDescription(isset($data['seo_description']) ? $data['seo_description'] : '');
    $agent->setDateAdd(date("Y-m-d"));
    $agent->setLastEdit(date("Y-m-d"));
    $agent->setLangue($_SESSION['langue']);

    return $agent;
}
