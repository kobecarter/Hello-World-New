<?php

@$task = $_GET['task'];
switch ($task)
{
    case 'add' :
        if ($_SESSION['user']->hasDroit('add', 'com_facture')) {
			$services = service::findAll($_SESSION['langue'], true);
			$clients = client::findAll(true);
            $action = "components/com_facture/controleurs/router.php?task=addFacture";
            $submitName = "add";
            $submitValue = "Ajouter facture";
            include_once("components/com_facture/views/facture/add.php");
        }
        break;
    case 'edit' :
        if ($_SESSION['user']->hasDroit('edit', 'com_facture')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $facture = facture::find($id);
				$clients = client::findAll(true);
				$services = service::findAll($_SESSION['langue'], true);
                $action = "components/com_facture/controleurs/router.php?task=editFacture";
                $submitName = "edit";
                $submitValue = "Modifier facture";
                include_once("components/com_facture/views/facture/edit.php");
            }
        }
        break;
	case 'show' :
        if ($_SESSION['user']->hasDroit('view', 'com_facture')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
                $facture = facture::find($id);
                include_once("components/com_facture/views/facture/facture.php");
            }
        }
        break;
	case 'payment' :
        if ($_SESSION['user']->hasDroit('view', 'com_facture')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = intval($_GET['id']);
				$facture = facture::find($id);
                $payments = payment::findAll($id);
                include_once("components/com_facture/views/facture/payment.php");
            }
        }
        break;	
    default :
        if ($_SESSION['user']->hasDroit('view', 'com_facture')) {
            $factures = facture::findAll();
            include_once("components/com_facture/views/facture/list.php");
        }
        break;
}