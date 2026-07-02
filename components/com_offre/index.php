<?php

@$task = $_GET['task'];
switch ($task)
{
    default :
        $page = getComponent("com_offre");
        include_once("components/com_offre/views/offre/list.php");
        break;
}