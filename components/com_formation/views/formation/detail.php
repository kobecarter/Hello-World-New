<?php
/* ── meta statique par slug ─────────────────────────────────────────── */
$hwfdMap = [
    'strategie-performance-digitale-ia' => [
        'icon' => 'fa-chess', 'cat' => 'Stratégie', 'badge' => 'gold',
        'plus' => 'Nous appliquons une logique simple : "Strategy First, AI Second". Vous ne repartez pas avec une liste d\'outils à la mode, mais avec un cadre de décision robuste pour intégrer l\'IA dans votre croissance.',
        'pour_qui_items' => ['Dirigeants de TPE et PME', 'Chief Digital Officers', 'Directeurs Marketing', 'Responsables Stratégie', 'Directeurs de la Transformation Digitale'],
    ],
    'claude-code-site-premium' => [
        'icon' => 'fa-code', 'cat' => 'Tech & Build', 'badge' => 'purple',
        'plus' => 'Nous ne vous apprenons pas seulement à "faire générer du code". Nous vous apprenons à piloter un flux de production agentique comme un builder professionnel, avec méthode et reproductibilité.',
        'pour_qui_items' => ['Entrepreneurs Tech', 'Développeurs Front et Back', 'Webdesigners', 'Product Builders', 'Fondateurs de startups tech'],
    ],
    'n8n-ia-automatisation-processus' => [
        'icon' => 'fa-diagram-project', 'cat' => 'Ops & Automatisation', 'badge' => 'gold',
        'plus' => 'Nous vous aidons à penser vos automatisations comme des systèmes métier durables, pas comme une accumulation de recettes fragiles. L\'architecture d\'abord, les nodes ensuite.',
        'pour_qui_items' => ['Responsables Opérations', 'Growth Engineers', 'Administrateurs Systèmes', 'Product Managers', 'Responsables de la Transformation Digitale'],
    ],
    'podcast-ia-showrunner' => [
        'icon' => 'fa-microphone', 'cat' => 'Podcast & Média', 'badge' => 'purple',
        'plus' => 'Nous utilisons l\'IA comme un partenaire éditorial et stratégique, pas comme un simple outil de montage ou de génération de texte. Votre voix reste unique.',
        'pour_qui_items' => ['Futurs podcasteurs', 'Directeurs de la Communication', 'Experts métiers', 'Créateurs de contenu', 'Entrepreneurs souhaitant bâtir un média de marque'],
    ],
];
$slug = $formation ? ($formation->getSlug() ?? '') : '';
$meta = isset($hwfdMap[$slug]) ? $hwfdMap[$slug] : ['icon' => 'fa-graduation-cap', 'cat' => 'Formation', 'badge' => 'gold', 'plus' => '', 'pour_qui_items' => []];

/* ── durée ──────────────────────────────────────────────────────────── */
$hwfdDuree = 'Sur demande';
$hwfdDateStr = '';
if ($formation && $formation->getDateDebut() && $formation->getDateFin()) {
    try {
        $d1 = new DateTime($formation->getDateDebut());
        $d2 = new DateTime($formation->getDateFin());
        $days = (int)$d1->diff($d2)->days + 1;
        $hwfdDuree = $days . ' ' . ($days > 1 ? 'jours' : 'jour');
    } catch (Exception $e) {}
}
if ($formation && $formation->getDateDebut()) {
    $hwfdDateStr = date('d M Y', strtotime($formation->getDateDebut()));
}

/* ── autres formations ──────────────────────────────────────────────── */
$hwfdOthers = array_filter($formations ?? [], function($f) use ($slug) { return $f->getSlug() !== $slug; });
$hwfdOtherMeta = ['strategie-performance-digitale-ia' => 'fa-chess', 'claude-code-site-premium' => 'fa-code', 'n8n-ia-automatisation-processus' => 'fa-diagram-project', 'podcast-ia-showrunner' => 'fa-microphone'];

/* ── nom formation pour le formulaire ──────────────────────────────── */
$hwfdTitreForm = htmlspecialchars($formation ? ($formation->getTitre() ?? '') : '', ENT_QUOTES, 'UTF-8');
?>
<style>
/* ── VARIABLES ─────────────────────────────────────────────────────────── */
:root{--hwfd-ease:cubic-bezier(0.23,1,0.32,1);--hwfd-gold:#09A1BE;--hwfd-purple:#680262;--hwfd-border:rgba(0,0,0,.08);--hwfd-txt:#111;--hwfd-txt2:#555}

/* ── BREADCRUMB ────────────────────────────────────────────────────────── */
.hw-f-det-bc{padding:1.4rem 0;background:#fff;border-bottom:1px solid var(--hwfd-border)}
.hw-f-det-bc-inner{display:flex;align-items:center;gap:.55rem;font-size:.7rem;color:var(--hwfd-txt2)}
.hw-f-det-bc-inner a{color:var(--hwfd-txt2);text-decoration:none;transition:color .2s}
.hw-f-det-bc-inner a:hover{color:var(--hwfd-gold)}
.hw-f-det-bc-sep{opacity:.3}

/* ── HERO INFO CARDS (dans wm-hero-side, fond sombre) ──────────────────── */
.hw-f-det-infos{display:flex;flex-direction:column;gap:.8rem}
.hw-f-det-info-card{display:flex;align-items:center;gap:1.1rem;padding:1.1rem 1.4rem;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:14px;transition:border-color .25s,background .25s}
.hw-f-det-info-card:hover{border-color:rgba(9,161,190,.3);background:rgba(9,161,190,.05)}
.hw-f-det-info-icon{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,rgba(104,2,98,.5),rgba(9,161,190,.5));display:flex;align-items:center;justify-content:center;font-size:.85rem;color:#fff;flex-shrink:0}
.hw-f-det-info-body{display:flex;flex-direction:column;gap:.2rem}
.hw-f-det-info-lbl{font-size:.56rem;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.35);font-weight:700}
.hw-f-det-info-val{font-size:.84rem;color:rgba(255,255,255,.85);font-weight:400}

/* ── POUR QUI ──────────────────────────────────────────────────────────── */
.hw-f-det-audience{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-audience-grid{display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center}
.hw-f-det-profiles{display:flex;flex-direction:column;gap:.75rem;margin-top:2rem}
.hw-f-det-profile{display:flex;align-items:center;gap:.9rem;padding:.95rem 1.2rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:12px;font-size:.8rem;color:var(--hwfd-txt);transition:border-color .25s var(--hwfd-ease),transform .25s var(--hwfd-ease)}
.hw-f-det-profile:hover{border-color:rgba(9,161,190,.3);transform:translateX(4px)}
.hw-f-det-profile i{color:var(--hwfd-gold);font-size:.8rem;width:14px;text-align:center}
@media(max-width:900px){.hw-f-det-audience-grid{grid-template-columns:1fr}}

/* ── INTRO ─────────────────────────────────────────────────────────────── */
.hw-f-det-intro{padding:6rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hw-f-det-intro-inner{max-width:720px;margin:0 auto;text-align:center}
.hw-f-det-intro-body{font-size:1rem;color:var(--hwfd-txt2);line-height:2;font-weight:300}
.hw-f-det-intro-body p{margin:0}

/* ── PROGRAMME ─────────────────────────────────────────────────────────── */
.hw-f-det-programme{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-programme-body{margin-top:3rem}
.hw-f-det-programme-body h3{font-family:var(--fm,sans-serif);font-weight:600;font-size:.84rem;letter-spacing:.08em;text-transform:uppercase;color:var(--hwfd-gold);margin:2.5rem 0 1rem;display:flex;align-items:center;gap:.7rem}
.hw-f-det-programme-body h3:first-child{margin-top:0}
.hw-f-det-programme-body h3::before{content:'';width:20px;height:1px;background:var(--hwfd-gold)}
.hw-f-det-programme-body ul{list-style:none;display:flex;flex-direction:column;gap:.75rem}
.hw-f-det-programme-body li{display:flex;align-items:flex-start;gap:.9rem;padding:1.3rem 1.5rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:13px;font-size:.82rem;color:var(--hwfd-txt2);line-height:1.75;transition:border-color .25s var(--hwfd-ease),transform .25s var(--hwfd-ease)}
.hw-f-det-programme-body li:hover{border-color:rgba(9,161,190,.3);transform:translateX(4px)}
.hw-f-det-programme-body li::before{content:'\f00c';font-family:'Font Awesome 5 Pro';font-weight:300;color:var(--hwfd-gold);font-size:.75rem;flex-shrink:0;margin-top:.15rem}
.hw-f-det-programme-body li strong{color:var(--hwfd-txt)}
.hw-f-det-programme-body p{font-size:.86rem;color:var(--hwfd-txt2);line-height:1.85}

/* ── LIVRABLES ─────────────────────────────────────────────────────────── */
.hw-f-det-livrables{padding:7rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hw-f-det-livrables-body{margin-top:2.5rem}
.hw-f-det-livrables-body ul{list-style:none;display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.hw-f-det-livrables-body li{display:flex;align-items:flex-start;gap:.85rem;padding:1.5rem;background:#f8f8f8;border:1px solid var(--hwfd-border);border-radius:13px;font-size:.8rem;color:var(--hwfd-txt2);line-height:1.7;transition:border-color .25s,box-shadow .25s}
.hw-f-det-livrables-body li:hover{border-color:rgba(9,161,190,.3);box-shadow:0 6px 20px rgba(0,0,0,.05)}
.hw-f-det-livrables-body li::before{content:'\f058';font-family:'Font Awesome 5 Pro';font-weight:300;color:var(--hwfd-gold);font-size:.9rem;flex-shrink:0;margin-top:.05rem}
@media(max-width:640px){.hw-f-det-livrables-body ul{grid-template-columns:1fr}}

/* ── PRÉREQUIS ─────────────────────────────────────────────────────────── */
.hw-f-det-prereqs{padding:6rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-prereqs-inner{max-width:680px}
.hw-f-det-prereqs-text{font-size:.86rem;color:var(--hwfd-txt2);line-height:1.9;margin-top:1.4rem}

/* ── LE PLUS HW ────────────────────────────────────────────────────────── */
.hw-f-det-plus{padding:7rem 0;background:linear-gradient(135deg,#680262 0%,#09A1BE 100%);text-align:center}
.hw-f-det-plus-inner{max-width:680px;margin:0 auto}
.hw-f-det-plus-lbl{font-size:.56rem;letter-spacing:.4em;text-transform:uppercase;color:rgba(255,255,255,.45);margin-bottom:1.5rem}
.hw-f-det-plus-title{font-weight:200;font-size:clamp(1.8rem,3.5vw,3rem);color:#fff;line-height:1.1;letter-spacing:-.03em;margin-bottom:1.5rem}
.hw-f-det-plus-text{font-size:.88rem;color:rgba(255,255,255,.75);line-height:1.95;font-weight:300}

/* ── FORMULAIRE ────────────────────────────────────────────────────────── */
.hw-f-det-form-section{padding:8rem 0;background:#fff;border-top:1px solid var(--hwfd-border)}
.hw-f-det-form-wrap{max-width:780px;margin:0 auto;padding:3rem;background:#fff;border:1px solid var(--hwfd-border);border-radius:24px;box-shadow:0 20px 60px rgba(0,0,0,.05)}
.hw-f-det-form-title{font-family:var(--fm,sans-serif);font-weight:600;font-size:1.5rem;color:var(--hwfd-txt);margin-bottom:.5rem}
.hw-f-det-form-sub{font-size:.8rem;color:var(--hwfd-txt2);line-height:1.8;margin-bottom:2.5rem}
.hw-f-det-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.2rem}
.hw-f-det-form-full{grid-column:1/-1}
.hw-f-det-field{display:flex;flex-direction:column;gap:.4rem}
.hw-f-det-label{font-size:.7rem;font-weight:600;letter-spacing:.04em;color:var(--hwfd-txt);text-transform:uppercase}
.hw-f-det-label span{color:#e44;font-size:.9em;margin-left:2px}
.hw-f-det-input{width:100%;padding:.85rem 1rem;border:1.5px solid var(--hwfd-border);border-radius:10px;font-size:.84rem;color:var(--hwfd-txt);background:#fff;transition:border-color .2s,box-shadow .2s;outline:none;font-family:inherit;box-sizing:border-box;appearance:none}
.hw-f-det-input:focus{border-color:var(--hwfd-gold);box-shadow:0 0 0 3px rgba(9,161,190,.12)}
.hw-f-det-input::placeholder{color:#aaa}
.hw-f-det-conditional{display:none}
.hw-f-det-conditional.visible{display:contents}
.hw-f-det-sep{grid-column:1/-1;border:none;border-top:1px solid var(--hwfd-border);margin:.5rem 0}
.hw-f-det-sep-label{grid-column:1/-1;font-size:.65rem;letter-spacing:.25em;text-transform:uppercase;color:var(--hwfd-txt2);opacity:.6;display:flex;align-items:center;gap:.8rem}
.hw-f-det-sep-label::after{content:'';flex:1;height:1px;background:var(--hwfd-border)}
.hw-f-det-consent{grid-column:1/-1;display:flex;align-items:flex-start;gap:.75rem;padding:1.2rem;background:#f8f8f8;border-radius:10px;cursor:pointer}
.hw-f-det-consent input{width:16px;height:16px;accent-color:var(--hwfd-gold);flex-shrink:0;margin-top:2px;cursor:pointer}
.hw-f-det-consent span{font-size:.73rem;color:var(--hwfd-txt2);line-height:1.7}
.hw-f-det-form-submit{grid-column:1/-1;margin-top:.5rem}
.hw-f-det-submit-btn{width:100%;padding:1.1rem;background:linear-gradient(135deg,#680262,#09A1BE);color:#fff;border:none;border-radius:12px;font-size:.84rem;font-weight:600;letter-spacing:.04em;cursor:pointer;transition:opacity .2s,transform .18s var(--hwfd-ease);font-family:inherit}
.hw-f-det-submit-btn:hover{opacity:.9;transform:translateY(-1px)}
.hw-f-det-submit-btn:active{transform:scale(.98)}
.hw-f-det-success{display:none;text-align:center;padding:3rem 2rem}
.hw-f-det-success-icon{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,#680262,#09A1BE);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.4rem;margin:0 auto 1.5rem}
.hw-f-det-success-title{font-weight:600;font-size:1.2rem;color:var(--hwfd-txt);margin-bottom:.6rem}
.hw-f-det-success-text{font-size:.82rem;color:var(--hwfd-txt2);line-height:1.8}
@media(max-width:640px){.hw-f-det-form-grid{grid-template-columns:1fr}.hw-f-det-form-wrap{padding:2rem 1.2rem}}

/* ── AUTRES FORMATIONS ─────────────────────────────────────────────────── */
.hw-f-det-more{padding:7rem 0;background:#f8f8f8;border-top:1px solid var(--hwfd-border)}
.hw-f-det-more-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.2rem;margin-top:3.5rem}
.hw-f-det-more-card{background:#fff;border:1px solid var(--hwfd-border);border-radius:16px;padding:1.8rem;text-decoration:none;color:inherit;display:flex;flex-direction:column;gap:.55rem;transition:transform .3s var(--hwfd-ease),box-shadow .3s var(--hwfd-ease),border-color .3s}
.hw-f-det-more-card:hover{transform:translateY(-4px);box-shadow:0 14px 36px rgba(0,0,0,.07);border-color:rgba(9,161,190,.25)}
.hw-f-det-more-card:active{transform:scale(.98)}
.hw-f-det-more-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:.85rem;background:rgba(9,161,190,.07);color:var(--hwfd-gold);border:1px solid rgba(9,161,190,.15);margin-bottom:.3rem}
.hw-f-det-more-title{font-weight:600;font-size:.84rem;color:var(--hwfd-txt);line-height:1.3}
.hw-f-det-more-sub{font-size:.72rem;color:var(--hwfd-txt2);line-height:1.6}
.hw-f-det-more-arrow{margin-top:auto;padding-top:.7rem;font-size:.68rem;font-weight:600;color:var(--hwfd-gold);display:flex;align-items:center;gap:.35rem;transition:gap .2s}
.hw-f-det-more-card:hover .hw-f-det-more-arrow{gap:.65rem}
@media(max-width:700px){.hw-f-det-more-grid{grid-template-columns:1fr 1fr}}
@media(max-width:440px){.hw-f-det-more-grid{grid-template-columns:1fr}}

/* ── CTA FINAL ─────────────────────────────────────────────────────────── */
.hw-f-det-cta-final{padding:8rem 0;background:#fff;border-top:1px solid var(--hwfd-border);text-align:center}

/* ── REDUCED MOTION ────────────────────────────────────────────────────── */
@media(prefers-reduced-motion:reduce){
  .hw-f-det-profile,.hw-f-det-programme-body li,.hw-f-det-livrables-body li,.hw-f-det-more-card{transition:none!important}
}
</style>

<!-- ══ BREADCRUMB ══════════════════════════════════════════════════════════ -->
<div class="hw-f-det-bc">
  <div class="container">
    <div class="hw-f-det-bc-inner">
      <a href="<?= $siteURL; ?>">Accueil</a>
      <span class="hw-f-det-bc-sep">/</span>
      <a href="<?= $page->getLink(); ?>">Formations IA</a>
      <span class="hw-f-det-bc-sep">/</span>
      <span><?= htmlspecialchars($formation->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
  </div>
</div>

<!-- ══ HERO ═══════════════════════════════════════════════════════════════ -->
<section class="wm-hero">
  <canvas id="hero-canvas"></canvas>
  <div class="wm-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="0" y1="600" x2="960" y2="0" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <div class="container">
    <div class="wm-hero-inner">
      <div>
        <div class="wm-hero-label" id="hwfd-label"><?php echo $page->getTitre(); ?></div>
        <h1 class="sh-h1 rv on" id="hwfd-h1">
          <?php
            $h1raw = $formation->getH1() ?? $formation->getTitre() ?? '';
            $h1parts = explode(' : ', $h1raw, 2);
            if (count($h1parts) === 2) {
                echo htmlspecialchars($h1parts[0], ENT_QUOTES, 'UTF-8')
                   . ' : <em>' . htmlspecialchars($h1parts[1], ENT_QUOTES, 'UTF-8') . '</em>';
            } else {
                echo htmlspecialchars($h1raw, ENT_QUOTES, 'UTF-8');
            }
          ?>
        </h1>
        <p class="wm-hero-sub rv d1" id="hwfd-sub"><?= htmlspecialchars($formation->getSousTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="wm-hero-ctas rv d2" id="hwfd-ctas">
          <a href="#hwfd-form" class="sb sb-compact" role="button">
            <div class="sb-label"><span class="sb-hint">Réserver ma place</span></div>
            <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
          </a>
          <a href="#hwfd-programme" class="sb sb-compact sb-invert" role="button">
            <div class="sb-label"><span class="sb-hint">Voir le programme</span></div>
            <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
          </a>
        </div>
      </div>
    
    </div>
  </div>
</section>

<!-- ══ POUR QUI ════════════════════════════════════════════════════════════ -->
<section class="hw-f-det-audience">
  <div class="container">
    <div class="hw-f-det-audience-grid">
      <div>
        <div class="sec-label rv">Pour qui ?</div>
        <h2 class="sec-title rv d1">Ce programme<br>s'adresse à <em>vous</em></h2>
        <p style="font-size:.88rem;color:var(--hwfd-txt2);line-height:1.9;font-weight:300;margin-top:1rem;max-width:420px" class="rv d2"><?= htmlspecialchars($formation->getTypePublic() ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
      <div>
        <div class="hw-f-det-profiles">
          <?php foreach ($meta['pour_qui_items'] as $i => $p): ?>
          <div class="hw-f-det-profile rv d<?= min($i + 2, 6); ?>">
            <i class="fal fa-check-circle"></i>
            <?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ INTRO / PROMESSE ════════════════════════════════════════════════════ -->
<?php if ($formation->getExtrait()): ?>
<section class="hw-f-det-intro">
  <div class="container">
    <div class="hw-f-det-intro-inner">
      <div class="sec-label rv" style="text-align:center;margin-bottom:1.5rem">La promesse</div>
      <div class="hw-f-det-intro-body rv d1"><?= $formation->getExtrait(); ?></div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ PROGRAMME ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getDescription()): ?>
<section class="hw-f-det-programme" id="hwfd-programme">
  <div class="container">
    <div class="sec-label rv">Programme</div>
    <h2 class="sec-title rv d1">Le programme <em>détaillé</em></h2>
    <div class="hw-f-det-programme-body rv d2"><?= $formation->getDescription(); ?></div>
  </div>
</section>
<?php endif; ?>

<!-- ══ LIVRABLES ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getLivrables()): ?>
<section class="hw-f-det-livrables">
  <div class="container">
    <div class="sec-label rv">Ce que vous repartez avec</div>
    <h2 class="sec-title rv d1">Vos <em>livrables</em></h2>
    <div class="hw-f-det-livrables-body rv d2"><?= $formation->getLivrables(); ?></div>
  </div>
</section>
<?php endif; ?>

<!-- ══ PRÉREQUIS ═══════════════════════════════════════════════════════════ -->
<?php if ($formation->getPrerequis()): ?>
<section class="hw-f-det-prereqs">
  <div class="container">
    <div class="hw-f-det-prereqs-inner">
      <div class="sec-label rv">Avant de venir</div>
      <h2 class="sec-title rv d1">Prérequis</h2>
      <p class="hw-f-det-prereqs-text rv d2"><?= nl2br(htmlspecialchars($formation->getPrerequis(), ENT_QUOTES, 'UTF-8')); ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ LE PLUS HELLO WORLD ════════════════════════════════════════════════ -->
<?php if ($meta['plus']): ?>
<section class="hw-f-det-plus">
  <div class="container">
    <div class="hw-f-det-plus-inner">
      <div class="hw-f-det-plus-lbl rv">Notre différence</div>
      <div class="hw-f-det-plus-title rv d1">Le plus Hello World</div>
      <p class="hw-f-det-plus-text rv d2"><?= htmlspecialchars($meta['plus'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ FORMULAIRE D'INSCRIPTION / QUALIFICATION ════════════════════════════ -->
<section class="hw-f-det-form-section" id="hwfd-form">
  <div class="container">
    <div class="sec-label rv" style="text-align:center">Inscription / demande d'informations</div>
    <h2 class="sec-title rv d1" style="text-align:center">Trouvez la formation<br>la plus adaptée à <em>votre profil</em></h2>
    <p style="text-align:center;font-size:.82rem;color:var(--hwfd-txt2);max-width:560px;margin:1rem auto 3rem;line-height:1.9;font-weight:300" class="rv d2">Indiquez votre profil et vos besoins. Nous vous recontacterons avec le programme, le format et le niveau les plus pertinents pour vous.</p>

    <div class="hw-f-det-form-wrap rv d3">
      <div id="hwfd-form-content">
        <div class="hw-f-det-form-title">Demande d'inscription</div>
        <div class="hw-f-det-form-sub">Renseignez votre profil pour recevoir une recommandation personnalisée. Tous les champs marqués * sont obligatoires.</div>
        <form id="hwfd-qualification-form" novalidate>
          <input type="hidden" name="formation" value="<?= $hwfdTitreForm; ?>">
          <div class="hw-f-det-form-grid">

            <!-- Champs communs -->
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-prenom">Prénom <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-prenom" name="prenom" placeholder="Votre prénom" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-nom">Nom <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-nom" name="nom" placeholder="Votre nom" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-email">Email professionnel <span>*</span></label>
              <input class="hw-f-det-input" type="email" id="hwfd-email" name="email" placeholder="vous@entreprise.com" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-tel">Téléphone <span>*</span></label>
              <input class="hw-f-det-input" type="tel" id="hwfd-tel" name="telephone" placeholder="+33 6 00 00 00 00" required>
            </div>

            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-formation">Formation souhaitée <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-formation" name="formation_souhaitee" required>
                <option value="">— Sélectionner —</option>
                <option value="strategie" <?= $slug === 'strategie-performance-digitale-ia' ? 'selected' : ''; ?>>Stratégie & Performance Digitale à l'Ère de l'IA</option>
                <option value="claude-code" <?= $slug === 'claude-code-site-premium' ? 'selected' : ''; ?>>Claude Code : Développer un site à 10 000 $</option>
                <option value="n8n" <?= $slug === 'n8n-ia-automatisation-processus' ? 'selected' : ''; ?>>n8n & IA : Automatisation Avancée des Processus Métiers</option>
                <option value="podcast" <?= $slug === 'podcast-ia-showrunner' ? 'selected' : ''; ?>>Podcast & IA : De l'idée fondatrice à la série à succès</option>
                <option value="conseil">Je souhaite être conseillé</option>
              </select>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-format">Format souhaité</label>
              <select class="hw-f-det-input" id="hwfd-format" name="format">
                <option value="presentiel">En présentiel</option>
                <option value="distance">À distance</option>
                <option value="peu-importe">Peu importe</option>
              </select>
            </div>

            <!-- Vous êtes — champ clé -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-statut">Vous êtes <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-statut" name="statut" required>
                <option value="">— Sélectionner votre statut —</option>
                <option value="particulier">Particulier</option>
                <option value="freelancer">Freelancer / Indépendant</option>
                <option value="societe">Société</option>
              </select>
            </div>

            <!-- ── PARTICULIER ─────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-particulier">
              <div class="hw-f-det-sep-label">Votre profil individuel</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-niveau">Votre niveau en IA</label>
                <select class="hw-f-det-input" id="hwfd-p-niveau" name="niveau_ia">
                  <option value="">— Sélectionner —</option>
                  <option value="debutant">Débutant — je découvre les usages</option>
                  <option value="intermediaire">Intermédiaire — j'utilise déjà quelques outils</option>
                  <option value="avance">Avancé — j'ai mis en place des workflows</option>
                  <option value="expert">Expert — je cherche à industrialiser</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-domaine">Domaine d'activité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-p-domaine" name="domaine" placeholder="Ex : marketing, développement, design...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-budget">Budget estimatif</label>
                <select class="hw-f-det-input" id="hwfd-p-budget" name="budget">
                  <option value="">— Sélectionner —</option>
                  <option value="moins-1000">Moins de 1 000 €</option>
                  <option value="1000-2500">1 000 € — 2 500 €</option>
                  <option value="2500-5000">2 500 € — 5 000 €</option>
                  <option value="plus-5000">Plus de 5 000 €</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-dispo">Disponibilité</label>
                <select class="hw-f-det-input" id="hwfd-p-dispo" name="disponibilite">
                  <option value="urgent">Urgent — dès que possible</option>
                  <option value="mois">Ce mois-ci</option>
                  <option value="trimestre">Ce trimestre</option>
                  <option value="reflexion">En réflexion</option>
                </select>
              </div>
            </div>

            <!-- ── FREELANCER ──────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-freelancer">
              <div class="hw-f-det-sep-label">Votre profil freelance</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-metier">Métier / spécialité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-metier" name="metier" placeholder="Ex : consultant, développeur, créateur de contenu...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-exp">Années d'expérience</label>
                <select class="hw-f-det-input" id="hwfd-f-exp" name="annees_experience">
                  <option value="moins-2">Moins de 2 ans</option>
                  <option value="2-5">2 à 5 ans</option>
                  <option value="5-10">5 à 10 ans</option>
                  <option value="plus-10">Plus de 10 ans</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-niveau">Niveau IA</label>
                <select class="hw-f-det-input" id="hwfd-f-niveau" name="niveau_ia_freelance">
                  <option value="debutant">Débutant</option>
                  <option value="intermediaire">Intermédiaire</option>
                  <option value="avance">Avancé</option>
                  <option value="expert">Expert</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-objectif">Objectif business</label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-objectif" name="objectif_business" placeholder="Ex : automatiser ma prospection, créer un podcast...">
              </div>
            </div>

            <!-- ── SOCIÉTÉ ─────────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-societe">
              <div class="hw-f-det-sep-label">Votre organisation</div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-societe">Nom de la société <span>*</span></label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-societe" name="nom_societe" placeholder="Hello World Agency">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-poste">Votre poste</label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-poste" name="poste" placeholder="Ex : Directeur Marketing, CDO...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-taille">Taille de la société</label>
                <select class="hw-f-det-input" id="hwfd-s-taille" name="taille_societe">
                  <option value="">— Sélectionner —</option>
                  <option value="1-9">1 à 9 collaborateurs (TPE)</option>
                  <option value="10-49">10 à 49 collaborateurs (PME)</option>
                  <option value="50-249">50 à 249 collaborateurs (ETI)</option>
                  <option value="250-999">250 à 999 collaborateurs</option>
                  <option value="1000+">1 000+ collaborateurs (Grand groupe)</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-participants">Nombre de participants</label>
                <select class="hw-f-det-input" id="hwfd-s-participants" name="nb_participants">
                  <option value="1-3">1 à 3 participants</option>
                  <option value="4-10">4 à 10 participants</option>
                  <option value="11-25">11 à 25 participants</option>
                  <option value="26+">Plus de 26 participants</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s5">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-secteur">Secteur d'activité</label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-secteur" name="secteur" placeholder="Ex : e-commerce, finance, santé, industrie...">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s6">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-maturite">Maturité IA de l'entreprise</label>
                <select class="hw-f-det-input" id="hwfd-s-maturite" name="maturite_ia">
                  <option value="exploration">Exploration — nous n'avons pas encore commencé</option>
                  <option value="tests">Tests ponctuels — quelques expérimentations</option>
                  <option value="partiel">Déploiement partiel — quelques équipes utilisent l'IA</option>
                  <option value="structure">Déploiement structuré — processus en place</option>
                  <option value="industrialisation">Industrialisation / gouvernance IA</option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-s7">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-contexte">Contexte et enjeux internes</label>
                <textarea class="hw-f-det-input" id="hwfd-s-contexte" name="contexte" rows="3" placeholder="Décrivez votre contexte : quels sont vos enjeux, vos blocages, vos objectifs pour cette formation ?"></textarea>
              </div>
            </div>

            <!-- ── CHAMPS COMMUNS FINAUX ───────────────────────────────── -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-besoin">Votre besoin principal</label>
              <select class="hw-f-det-input" id="hwfd-besoin" name="besoin">
                <option value="">— Sélectionner —</option>
                <option value="competence">Montée en compétence individuelle</option>
                <option value="equipe">Formation d'équipe</option>
                <option value="process">Transformation d'un process</option>
                <option value="strategie">Accompagnement stratégique</option>
                <option value="sais-pas">Je ne sais pas encore</option>
              </select>
            </div>
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-message">Message / précisions complémentaires</label>
              <textarea class="hw-f-det-input" id="hwfd-message" name="message" rows="4" placeholder="Partagez toute information utile pour que nous puissions vous orienter au mieux..."></textarea>
            </div>

            <div class="hw-f-det-consent">
              <input type="checkbox" id="hwfd-consent" name="consent" required>
              <span>J'accepte d'être recontacté par Hello World dans le cadre de ma demande d'inscription. Mes données sont traitées conformément à la <a href="<?= $siteURL; ?>politique-de-confidentialite/" style="color:var(--hwfd-gold)">politique de confidentialité</a> de Hello World.</span>
            </div>

            <div class="hw-f-det-form-submit">
              <button type="submit" class="hw-f-det-submit-btn" id="hwfd-submit-btn">
                <i class="fal fa-paper-plane" style="margin-right:.5rem"></i> Envoyer ma demande
              </button>
            </div>

          </div>
        </form>
      </div>
      <div class="hw-f-det-success" id="hwfd-success">
        <div class="hw-f-det-success-icon"><i class="fal fa-check"></i></div>
        <div class="hw-f-det-success-title">Demande envoyée avec succès !</div>
        <div class="hw-f-det-success-text">Merci pour votre intérêt. Notre équipe reviendra vers vous sous 24 à 48 heures pour valider votre inscription et vous orienter vers le programme le plus adapté à votre profil.</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ AUTRES FORMATIONS ═══════════════════════════════════════════════════ -->
<?php if (!empty($hwfdOthers)): ?>
<section class="hw-f-det-more">
  <div class="container">
    <div class="sec-label rv">Nos autres programmes</div>
    <h2 class="sec-title rv d1">Découvrez aussi<br>nos <em>autres formations</em></h2>
    <div class="hw-f-det-more-grid">
      <?php foreach (array_slice($hwfdOthers, 0, 3) as $of):
        $osl = $of->getSlug() ?? '';
        $oicon = isset($hwfdOtherMeta[$osl]) ? $hwfdOtherMeta[$osl] : 'fa-graduation-cap';
      ?>
      <a class="hw-f-det-more-card rv" href="<?= $of->getLink(); ?>">
        <div class="hw-f-det-more-icon"><i class="fal <?= $oicon; ?>"></i></div>
        <div class="hw-f-det-more-title"><?= htmlspecialchars($of->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hw-f-det-more-sub"><?= htmlspecialchars(mb_strimwidth($of->getSousTitre() ?? '', 0, 75, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hw-f-det-more-arrow">Voir le programme <i class="fal fa-arrow-right"></i></div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ TÉMOIGNAGES ════════════════════════════════════════════════════════ -->
<?php include('includes/testimonials.php'); ?>

<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-det-cta-final">
  <div class="container">
    <div class="sec-label rv">Passez à l'action</div>
    <h2 class="sec-title rv d1">Prêt à intégrer l'IA<br>dans <em>votre réalité</em>&nbsp;?</h2>
    <p class="cta-sub rv d2">Places limitées. Réservez un audit de maturité gratuit pour valider que ce programme correspond à votre profil et vos objectifs.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="#hwfd-form" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Réserver ma place</span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint">Parler à un expert</span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>

<!-- ══ GSAP ═══════════════════════════════════════════════════════════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero entrance */
    if (!rm) {
        gsap.timeline({ defaults: { ease: 'expo.out' } })
            .from('#hwfd-label', { y: 12, autoAlpha: 0, duration: .6 })
            .from('#hwfd-h1',    { y: 55, autoAlpha: 0, duration: 1.05, skewY: 1.5 }, '-=.3')
            .from('#hwfd-sub',   { y: 20, autoAlpha: 0, duration: .8 }, '-=.5')
            .from('#hwfd-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45')
            .from('#hwfd-infos .hw-f-det-info-card', { x: 30, autoAlpha: 0, duration: .55, stagger: .1 }, '-=.6');
    }

    /* scroll reveals */
    var rvEls = gsap.utils.toArray('.rv');
    if (!rm) {
        gsap.set(rvEls, { y: 36, autoAlpha: 0 });
        ScrollTrigger.batch(rvEls, {
            start: 'top 91%',
            onEnter: function (b) { gsap.to(b, { y: 0, autoAlpha: 1, duration: .75, ease: 'expo.out', stagger: .065 }); }
        });
    }

    /* programme / livrables li stagger */
    if (!rm) {
        var lis = gsap.utils.toArray('.hw-f-det-programme-body li, .hw-f-det-livrables-body li');
        gsap.set(lis, { x: -16, autoAlpha: 0 });
        ScrollTrigger.batch(lis, {
            start: 'top 92%',
            onEnter: function (b) { gsap.to(b, { x: 0, autoAlpha: 1, duration: .55, ease: 'expo.out', stagger: .05 }); }
        });
    }

    /* more cards press */
    document.querySelectorAll('.hw-f-det-more-card').forEach(function (c) {
        c.addEventListener('mousedown',  function () { gsap.to(c, { scale: .97, duration: .08 }); });
        c.addEventListener('mouseup',    function () { gsap.to(c, { scale: 1, duration: .4, ease: 'elastic.out(1,.55)' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { scale: 1, duration: .25 }); });
    });

    /* info cards hover color */
    document.querySelectorAll('.hw-f-det-info-card').forEach(function (c) {
        c.addEventListener('mouseenter', function () { gsap.to(c, { x: 4, duration: .25, ease: 'expo.out' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { x: 0, duration: .35, ease: 'expo.out' }); });
    });

    /* ── FORMULAIRE : affichage conditionnel ── */
    var statut = document.getElementById('hwfd-statut');
    var groupParticulier = ['hwfd-grp-particulier','hwfd-p1','hwfd-p2','hwfd-p3','hwfd-p4'];
    var groupFreelancer  = ['hwfd-grp-freelancer','hwfd-f1','hwfd-f2','hwfd-f3','hwfd-f4'];
    var groupSociete     = ['hwfd-grp-societe','hwfd-s1','hwfd-s2','hwfd-s3','hwfd-s4','hwfd-s5','hwfd-s6','hwfd-s7'];

    function hideAll() {
        [].concat(groupParticulier, groupFreelancer, groupSociete).forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('visible');
        });
    }
    function showGroup(group) {
        group.forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('visible');
        });
    }

    if (statut) {
        statut.addEventListener('change', function () {
            hideAll();
            if (statut.value === 'particulier') showGroup(groupParticulier);
            if (statut.value === 'freelancer')  showGroup(groupFreelancer);
            if (statut.value === 'societe')     showGroup(groupSociete);
        });
    }

    /* ── FORMULAIRE : submit ── */
    var form = document.getElementById('hwfd-qualification-form');
    var btn  = document.getElementById('hwfd-submit-btn');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var consent = document.getElementById('hwfd-consent');
            if (!consent.checked) {
                consent.closest('.hw-f-det-consent').style.outline = '2px solid #e44';
                return;
            }
            if (btn) { btn.disabled = true; btn.textContent = 'Envoi en cours…'; }

            /* Construction des données */
            var data = new FormData(form);
            var contact = <?= json_encode($pageContact->getLink()); ?>;

            /* On redirige vers le formulaire de contact avec les données en query string pour le moment */
            var params = new URLSearchParams();
            data.forEach(function(v, k){ if(v) params.set(k, v); });
            params.set('from', 'formation');

            /* Simulation succès (à remplacer par fetch vers votre endpoint contact) */
            setTimeout(function () {
                document.getElementById('hwfd-form-content').style.display = 'none';
                document.getElementById('hwfd-success').style.display = 'block';
                if (!rm) { gsap.from('#hwfd-success', { y: 20, autoAlpha: 0, duration: .6, ease: 'expo.out' }); }
            }, 800);
        });
    }
})();
</script>
