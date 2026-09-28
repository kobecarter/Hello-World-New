<?php
// Garde commune des contrôleurs AJAX de l'admin : ces fichiers sont appelables
// directement en HTTP, donc chacun doit refuser toute requête sans session admin
// connectée (avant ce garde, plusieurs permettaient p. ex. de créer un utilisateur
// admin ou d'uploader un module sans être connecté).
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['user']) || !is_object($_SESSION['user'])
    || !method_exists($_SESSION['user'], 'isConnected') || !$_SESSION['user']->isConnected()) {
    http_response_code(403);
    exit('0');
}
