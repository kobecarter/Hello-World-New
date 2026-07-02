<?php

require_once ("../../../hw-admin/config.php");
require_once ("../../../hw-admin/instanceDb.php");
require_once ("../../../includes/functions/functions.php");
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    @$task = $_GET['task'];
    include_once ("frontpage/controleur.php");
}