<?php
/*
 * Page 404.
 *
 * Reprise de la page du site de Dubai, aux couleurs de helloworld-agency.com
 * (cyan #09A1BE et violet #680262 de assets/css/main.css).
 *
 * Servie par ErrorDocument (voir le generateur dans
 * hw-admin/includes/functions/functions.php) et par sendHttp404AndExit().
 *
 * Elle est volontairement autonome : pas de includes/template.php, donc pas de
 * mega-menu ni de scripts tiers. Une page d'erreur doit s'afficher meme quand
 * le reste du site ne repond plus, et elle n'a aucune raison de couter 350 Ko.
 * Aucun JavaScript non plus, pour la meme raison.
 */

require_once('hw-admin/config.php');
require_once('hw-admin/instanceDb.php');
require_once('includes/functions/functions.php');
require_once('hw-admin/includes/security.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['lang']) || !hwIsKnownLanguage($_SESSION['lang'])) {
    $_SESSION['lang'] = langue::getDefaultLanguage();
}

// Apache sert cette page via ErrorDocument, donc sans passer par le routeur :
// la session peut etre vide, ou dans une autre langue que l'URL demandee. Le
// prefixe de l'URL d'origine est la seule indication fiable -- sans ca, une
// URL /fr/ morte repondait une page d'erreur en anglais. Le code passe par la
// liste blanche des langues actives, l'URL venant du visiteur.
$e404Uri = '';
foreach (array('REDIRECT_URL', 'REQUEST_URI') as $e404Key) {
    if (!empty($_SERVER[$e404Key])) { $e404Uri = $_SERVER[$e404Key]; break; }
}
if (preg_match('#^/([A-Za-z]{2})(?:/|$)#', (string) $e404Uri, $e404M)) {
    $e404Code = strtolower($e404M[1]);
    if (hwIsKnownLanguage($e404Code)) { $_SESSION['lang'] = $e404Code; }
}

require_once('includes/traduction.php');
// Appelee depuis sendHttp404AndExit(), cette page s'execute dans la portee d'une
// fonction : le fichier de traduction est deja charge, mais $lang n'y est pas visible.
if (!isset($lang) || !is_array($lang)) {
    if (isset($GLOBALS['lang']) && is_array($GLOBALS['lang'])) { $lang = $GLOBALS['lang']; }
    else { require('includes/traduction.php'); }
}

global $db, $siteURL;
$config = new config($db, $_SESSION['lang']);

// Apache pose deja le statut quand il sert cette page via ErrorDocument, mais
// pas si elle est appelee directement : sans ca, une 404 repondrait 200.
if (!headers_sent()) {
    http_response_code(404);
}

$e404Lang    = $_SESSION['lang'];
$e404IsRtl   = ($e404Lang === 'ar');
$e404Home    = ($e404Lang === langue::getDefaultLanguage()) ? $siteURL : $siteURL . $e404Lang . '/';
$e404Contact = $e404Home;
$e404Page    = getComponent('com_contact');
if ($e404Page && method_exists($e404Page, 'getLink') && trim($e404Page->getLink()) !== '') {
    $e404Contact = $e404Page->getLink();
}
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($e404Lang, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo $e404IsRtl ? 'rtl' : 'ltr'; ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, follow">
<title><?php echo htmlspecialchars($config->getNom(), ENT_QUOTES, 'UTF-8'); ?> | <?php echo htmlspecialchars($lang['E404_KICKER'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="shortcut icon" href="<?php echo $siteURL; ?>images/favicon.svg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,200;0,300;1,200;1,300&family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
<style>
/* Memes jetons que assets/css/main.css : la page d'erreur doit appartenir au
   site, mais sans en charger la feuille de 475 Ko. */
:root{
  --ink:#0b0b0d; --paper:#f7f5f2;
  --gold:#09A1BE; --gold2:#B23AAB; --brand-purple:#680262;
  --fd:'Cormorant Garamond',Georgia,serif;
  --fm:'Montserrat',system-ui,sans-serif;
  --expo:cubic-bezier(.16,1,.3,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%}
body{background:var(--ink);color:var(--paper);font-family:var(--fm);line-height:1.6;
  -webkit-font-smoothing:antialiased;overflow-x:hidden}
a{text-decoration:none;color:inherit}

.e404{position:relative;min-height:100%;display:flex;flex-direction:column;overflow:hidden;
  background:var(--ink) center/cover no-repeat}
/* trame et halo : memes motifs que les en-tetes sombres du site */
/* Fond video : meme traitement que la section "Start Your Project"
   (.hw-f-list-cta-final) -- object-fit cover, voile par-dessus, contenu au
   dessus du voile. Le poster s'affiche tant que la video n'est pas prete et
   reste le fond si elle ne se lance pas. */
.e404-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0}
.e404-scrim{position:absolute;inset:0;z-index:1;pointer-events:none;
  background:linear-gradient(100deg,rgba(11,11,13,.94) 0%,rgba(11,11,13,.86) 42%,rgba(11,11,13,.62) 72%,rgba(138,30,132,.30) 100%)}
[dir="rtl"] .e404-scrim{background:linear-gradient(260deg,rgba(11,11,13,.94) 0%,rgba(11,11,13,.86) 42%,rgba(11,11,13,.62) 72%,rgba(138,30,132,.30) 100%)}
.e404-grid{position:absolute;inset:0;z-index:1;pointer-events:none;
  background-image:repeating-linear-gradient(0deg,transparent,transparent 88px,rgba(255,255,255,.022) 88px,rgba(255,255,255,.022) 89px),
                   repeating-linear-gradient(90deg,transparent,transparent 88px,rgba(255,255,255,.022) 88px,rgba(255,255,255,.022) 89px)}
.e404-glow{position:absolute;z-index:1;pointer-events:none;top:-22%;inset-inline-end:-14%;
  width:70vw;height:70vw;max-width:900px;max-height:900px;border-radius:50%;
  background:radial-gradient(circle,rgba(9,161,190,.13),rgba(138,30,132,.06) 45%,transparent 70%)}

.e404-bar{position:relative;z-index:3;padding:1.8rem 0}
.e404-wrap{width:100%;max-width:1100px;margin:0 auto;padding-inline:24px}
/* logo triple : 34px -> 102px, plafonne a 22vw pour ne pas devorer la
   largeur sur telephone */
.e404-logo img{height:min(102px,22vw);width:auto;filter:brightness(0) invert(1);opacity:.9;
  transition:opacity .3s ease}
.e404-logo:hover img{opacity:1}

.e404-main{position:relative;z-index:3;flex:1;display:flex;align-items:center;
  padding-block:3rem 5rem}
.e404-inner{width:100%;max-width:1100px;margin:0 auto;padding-inline:24px}

.e404-kicker{display:inline-flex;align-items:center;gap:.9rem;font-size:.6rem;font-weight:600;
  letter-spacing:.42em;text-transform:uppercase;color:rgba(9,161,190,.8);margin-bottom:2rem}
.e404-kicker::before{content:'';width:34px;height:1px;background:rgba(9,161,190,.65)}

.e404-num{font-family:var(--fd);font-weight:200;line-height:.8;letter-spacing:-.04em;
  font-size:clamp(6rem,18vw,14rem);margin-bottom:2.6rem;display:flex;gap:.02em}
.e404-num span{display:block}
.e404-num span:nth-child(2){color:transparent;-webkit-text-stroke:2px var(--gold2);
  font-style:italic}

h1.e404-title{font-family:var(--fd);font-weight:300;letter-spacing:-.02em;line-height:1.08;
  font-size:clamp(1.9rem,4.4vw,3.3rem);color:var(--paper);margin-bottom:1.3rem;
  max-width:16em;text-wrap:balance}
.e404-sub{font-size:.95rem;font-weight:300;line-height:1.95;color:rgba(247,245,242,.48);
  max-width:40em;margin-bottom:3rem}

.e404-actions{display:flex;flex-wrap:wrap;gap:1rem}
.e404-btn{display:inline-flex;align-items:center;gap:.75rem;padding:1.05rem 2.2rem;
  border-radius:999px;font-size:.72rem;font-weight:700;letter-spacing:.18em;
  text-transform:uppercase;transition:transform .4s var(--expo),box-shadow .4s var(--expo),
  background .4s ease,border-color .4s ease}
.e404-btn:focus-visible{outline:2px solid var(--gold);outline-offset:3px}
.e404-btn svg{width:15px;height:15px;flex:0 0 auto}
[dir="rtl"] .e404-btn svg{transform:scaleX(-1)}

.e404-btn-main{background:linear-gradient(135deg,var(--gold),var(--brand-purple));color:#fff;
  box-shadow:0 14px 34px -14px rgba(138,30,132,.6)}
.e404-btn-main:hover{transform:translateY(-3px);box-shadow:0 20px 44px -14px rgba(138,30,132,.75)}

/* verre, meme recette que .glass-nav du site */
.e404-btn-ghost{color:var(--paper);border:1px solid rgba(247,245,242,.22);
  background:linear-gradient(135deg,rgba(255,255,255,.08),rgba(255,255,255,.03));
  -webkit-backdrop-filter:blur(18px) saturate(150%);backdrop-filter:blur(18px) saturate(150%)}
.e404-btn-ghost:hover{transform:translateY(-3px);border-color:rgba(247,245,242,.4);
  background:linear-gradient(135deg,rgba(255,255,255,.14),rgba(255,255,255,.06))}

.e404-foot{position:relative;z-index:3;padding:1.6rem 0 2.2rem;
  border-top:1px solid rgba(247,245,242,.07);font-size:.72rem;color:rgba(247,245,242,.3)}

[dir="rtl"] .e404-kicker,[dir="rtl"] .e404-btn{letter-spacing:0}
/* les chiffres restent en ordre latin, mais le bloc se cale a droite */
[dir="rtl"] .e404-num{direction:ltr;justify-content:flex-end}

@media(max-width:575px){
  .e404-main{padding-block:1.5rem 3rem}
  .e404-actions{flex-direction:column;align-items:stretch}
  .e404-btn{justify-content:center}
}
@media(prefers-reduced-motion:reduce){
  .e404-btn,.e404-logo img{transition:none}
  .e404-btn:hover{transform:none}
  .e404-video{display:none}
}
</style>
</head>
<body>

<div class="e404" style="background-image:url('<?php echo $siteURL; ?>assets/video/hw-academy-cta-poster.jpg')">
  <video class="e404-video" autoplay muted loop playsinline preload="auto"
         poster="<?php echo $siteURL; ?>assets/video/hw-academy-cta-poster.jpg" aria-hidden="true" tabindex="-1">
    <source src="<?php echo $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="e404-scrim" aria-hidden="true"></div>
  <div class="e404-grid" aria-hidden="true"></div>
  <div class="e404-glow" aria-hidden="true"></div>

  <header class="e404-bar">
    <div class="e404-wrap">
      <a class="e404-logo" href="<?php echo htmlspecialchars($e404Home, ENT_QUOTES, 'UTF-8'); ?>">
        <img src="<?php echo $siteURL; ?>images/config/<?php echo htmlspecialchars($config->getLogo(), ENT_QUOTES, 'UTF-8'); ?>"
             alt="<?php echo htmlspecialchars($config->getNom(), ENT_QUOTES, 'UTF-8'); ?>">
      </a>
    </div>
  </header>

  <main class="e404-main">
    <div class="e404-inner">
      <span class="e404-kicker"><?php echo htmlspecialchars($lang['E404_KICKER'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?></span>

      <div class="e404-num" aria-hidden="true"><span>4</span><span>0</span><span>4</span></div>

      <h1 class="e404-title"><?php echo htmlspecialchars($lang['404'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?></h1>
      <p class="e404-sub"><?php echo htmlspecialchars($lang['E404_SUB'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?></p>

      <div class="e404-actions">
        <a class="e404-btn e404-btn-main" href="<?php echo htmlspecialchars($e404Home, ENT_QUOTES, 'UTF-8'); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.8V21h14V9.8"/></svg>
          <?php echo htmlspecialchars($lang['RETOUR_404'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?>
        </a>
        <a class="e404-btn e404-btn-ghost" href="<?php echo htmlspecialchars($e404Contact, ENT_QUOTES, 'UTF-8'); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6.5h18v11H3z"/><path d="m3 7 9 6.5L21 7"/></svg>
          <?php echo htmlspecialchars($lang['E404_CONTACT'][$e404Lang], ENT_QUOTES, 'UTF-8'); ?>
        </a>
      </div>
    </div>
  </main>

  <footer class="e404-foot">
    <div class="e404-wrap">
      &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($config->getNom(), ENT_QUOTES, 'UTF-8'); ?>
    </div>
  </footer>
</div>

</body>
</html>
