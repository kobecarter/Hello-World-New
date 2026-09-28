<?php
// Durcissement commun au site public (index.php) et à l'admin (hw-admin/index.php) :
// en-têtes HTTP de sécurité, cookie de session protégé et filtrage des paramètres d'URL
// qui servent au routage, aux requêtes SQL et à l'affichage.

function hwIsHttps()
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
        || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);
}

function hwSendSecurityHeaders()
{
    if (headers_sent()) {
        return;
    }
    header_remove('X-Powered-By');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=()');
    if (hwIsHttps()) {
        header('Strict-Transport-Security: max-age=31536000');
    }
}

// À appeler avant session_start() : cookie inaccessible au JavaScript (vol de session par
// XSS), jamais envoyé en clair, et pas sur les requêtes cross-site (CSRF).
function hwSecureSessionCookie()
{
    if (session_status() === PHP_SESSION_ACTIVE || headers_sent()) {
        return;
    }
    // ini_set plutôt que session_set_cookie_params(array) : fonctionne quelle que soit la
    // version de PHP choisie dans cPanel (SameSite est simplement ignoré avant PHP 7.3).
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', hwIsHttps() ? '1' : '0');
    ini_set('session.cookie_samesite', 'Lax');
}

// Format attendu de chaque paramètre d'URL « de routage ». Une valeur hors format est une
// requête forgée : on renvoie false et l'appelant répond 404.
function hwRequestParamsValid(array $params)
{
    $formats = array(
        'option'   => '/^com_[a-z_]+$/',
        'task'     => '/^[A-Za-z0-9_]+$/',
        'id'       => '/^[0-9]+$/',
        'cat'      => '/^[0-9]+$/',
        'page'     => '/^[0-9]+$/',
        'l'        => '/^[a-z]{2}$/',
        'lang_sys' => '/^[a-z]{2}$/',
        'slug'     => '/^[\p{L}\p{M}\p{N}_.-]+$/u',
    );
    foreach ($formats as $key => $format) {
        if (!isset($params[$key]) || $params[$key] === '') {
            continue;
        }
        if (!is_string($params[$key]) || !preg_match($format, $params[$key])) {
            return false;
        }
    }
    return true;
}

// Code langue : deux lettres ET langue déclarée en base. Il finit dans presque toutes
// les requêtes SQL via la session, d'où la double vérification.
function hwIsKnownLanguage($code)
{
    return is_string($code) && preg_match('/^[a-z]{2}$/', $code) && langue::getIdLangue($code) > 0;
}
