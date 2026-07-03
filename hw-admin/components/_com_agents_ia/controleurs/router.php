<?php
require_once ("../../../config.php");
require_once ("../../../instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if (isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    switch ($task) {
        case 'addAgentIa':
            if ($_SESSION['user']->hasDroit('add', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
        case 'editAgentIa':
            if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
        case 'deleteAgentIa':
            if ($_SESSION['user']->hasDroit('delete', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
        case 'enableAgentIa':
            if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
        case 'deleteAgentsIa':
            if ($_SESSION['user']->hasDroit('delete', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
        case 'enableAgentsIa':
            if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) {
                include_once("agent_ia/controleur.php");
            }
            break;
    }
}
