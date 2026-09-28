<?php

if(file_exists("hw-admin/config.php")){
    if(is_dir("installation")){
        /* -- Suppression du dossier d'installation -- */
        function rmdir_recursive($dir) {
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                else unlink("$dir/$file");
            }
            rmdir($dir);
        }
        //rmdir_recursive("installation");
    }
}else{
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header("Location: ".$url."installation/", true, 301);
}


require_once('hw-admin/config.php');

require_once('hw-admin/instanceDb.php');

require_once('includes/functions/functions.php');

require_once('hw-admin/includes/security.php');

hwSendSecurityHeaders();

if (!isset($_SESSION)){

    // PHP's default session cache limiter ('nocache') forces a full
    // re-fetch on every repeat visit. Pages here are session-driven
    // (language) but public, so a short private cache is safe — and
    // takes precedence over the site's much coarser 1-year .htaccess
    // Expires rule for text/html, which is too long for CMS-driven content.
    session_cache_limiter('private');
    session_cache_expire(5);
    hwSecureSessionCookie();
    session_start();

}

// La langue en session finit dans presque toutes les requêtes SQL : une valeur posée
// avant ce contrôle (ou forgée) est écartée.
if (isset($_SESSION['lang']) && !hwIsKnownLanguage($_SESSION['lang'])) {
    unset($_SESSION['lang']);
}

// Paramètres d'URL hors format (injection SQL, XSS, chemin de fichier...) : 404 direct.
if (!hwRequestParamsValid($_GET) || (isset($_GET['l']) && $_GET['l'] !== '' && !hwIsKnownLanguage($_GET['l']))) {
    http_response_code(404);
    include('404.php');
    exit;
}

require_once('includes/traduction.php');

$option = (isset($_GET['option']) && !empty($_GET['option'])) ? $_GET['option'] : "com_frontpage";

if (preg_match("/com_/i",$option) && file_exists("components/".$option."/index.php")){

    ob_start();

    if(isset($_GET["l"]) && !empty($_GET["l"])){
        $_SESSION['lang'] = $_GET["l"];
    }
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = langue::getDefaultLanguage();
    }
    $config = new config($db, $_SESSION['lang']);
    include("components/".$option."/index.php");

    $page_content = ob_get_clean();

    include("includes/template.php");

}else{

    http_response_code(404);
    include('404.php');

}


?>