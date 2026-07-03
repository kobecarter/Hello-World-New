<?php

@$task = $_GET['task'];
switch ($task) {
    case 'add':
        if ($_SESSION['user']->hasDroit('add', 'com_agents_ia')) {
            $secteurs    = secteur::findAll($_SESSION['langue'], true);
            $action      = "components/com_agents_ia/controleurs/router.php?task=addAgentIa";
            $submitName  = "add";
            $submitValue = "Ajouter agent IA";
            include_once("components/com_agents_ia/views/agent_ia/add.php");
        }
        break;
    case 'edit':
        if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id          = intval($_GET['id']);
                $agent_ia    = agent_ia::find($id, $_SESSION['langue']);
                $secteurs    = secteur::findAll($_SESSION['langue'], true);
                $action      = "components/com_agents_ia/controleurs/router.php?task=editAgentIa";
                $submitName  = "edit";
                $submitValue = "Modifier agent IA";
                include_once("components/com_agents_ia/views/agent_ia/edit.php");
            }
        }
        break;
    default:
        if ($_SESSION['user']->hasDroit('view', 'com_agents_ia')) {
            $agents_ia = agent_ia::findAll($_SESSION["langue"]);
            include_once("components/com_agents_ia/views/agent_ia/list.php");
        }
        break;
}
