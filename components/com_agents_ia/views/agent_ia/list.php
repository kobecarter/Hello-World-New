<?php
$agentCategories = [
    'whatsapp-agent'          => 'Messagerie',
    'whatsapp-concierge'      => 'Messagerie',
    'whatsapp-campaign-agent' => 'Messagerie',
    'conversationnel'         => 'Messagerie',
    'booking-assistant'       => 'Service Client',
    'resto-assistant'         => 'Service Client',
    'voice-caller'            => 'Service Client',
    'sdr-agent'               => 'Service Client',
    'support-247'             => 'Service Client',
    'content-studio'          => 'Marketing',
    'content-broadcaster'     => 'Marketing',
    'marketing-reporter'      => 'Marketing',
    'seo-tracker'             => 'Marketing',
    'trading-signal-agent'    => 'Finance',
    'trade-executor'          => 'Finance',
    'market-alert-agent'      => 'Finance',
    'expense-tracker'         => 'Finance',
    'inbox-assistant'         => 'Productivite',
    'task-summarizer'         => 'Productivite',
    'deadline-notifier'       => 'Productivite',
    'call-analyzer'           => 'Productivite',
    'project-tracker'         => 'Immobilier',
    'lead-finder'             => 'Donnees',
];

$agentIcons = [
    'Messagerie'    => 'fa-comment-dots',
    'Service Client'=> 'fa-headset',
    'Marketing'     => 'fa-bullhorn',
    'Finance'       => 'fa-chart-line',
    'Productivite'  => 'fa-tasks',
    'Immobilier'    => 'fa-building',
    'Donnees'       => 'fa-database',
];

$catLabels = [
    'Messagerie'    => 'Messagerie',
    'Service Client'=> 'Service Client',
    'Marketing'     => 'Marketing',
    'Finance'       => 'Finance',
    'Productivite'  => 'Productivité',
    'Immobilier'    => 'Immobilier',
    'Donnees'       => 'Données',
];

$cats = array_keys($catLabels);
?>

<style>
/* ── AIA listing — light theme ──────────────────────────────── */

/* custom easing (Emil Kowalski — cubic-bezier expo-out) */
:root {
    --ease-out: cubic-bezier(0.23, 1, 0.32, 1);
    --ease-in-out: cubic-bezier(0.77, 0, 0.175, 1);
}

/* hero — text left (vertically centered), image right, no frame/background on the image */
.aia-hero-center.wm-hero { height: auto; min-height: 92vh; display: flex; align-items: center; padding-bottom: 4rem; }
.aia-hero-center .wm-hero-inner { align-items: center; transform: translateY(-20%); }
.aia-hero-center .wm-hero-side {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}
.aia-hero-center .wm-hero-side img {
    width: 100%;
    height: auto;
    display: block;
}
@media (max-width: 1024px) {
    .aia-hero-center .wm-hero-side { display: flex; }
}

/* ── About / descriptif — texte simple, direct sur la page (pas de box) ── */
.aia-about { position: relative; padding: 90px 0 100px; background: #fff; overflow: hidden; }
.aia-about-orb {
    position: absolute;
    width: 520px; height: 520px;
    left: 50%; top: -220px;
    transform: translateX(-50%);
    border-radius: 50%;
    background: radial-gradient(circle, rgba(9,161,190,.1) 0%, transparent 70%);
    filter: blur(100px);
    pointer-events: none;
}
.aia-about-panel { position: relative; }
.aia-about-panel .aia-section-title { margin-bottom: 1.5rem; }
.aia-about-text {
    font-size: 1.05rem;
    color: #4b5563;
    line-height: 1.8;
    max-width: 100%;
}
.aia-about-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 2.2rem;
}
.aia-about-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 17px;
    border-radius: 100px;
    font-size: .78rem;
    font-weight: 600;
    color: #0d0f1e;
    background: rgba(9,161,190,.06);
    border: 1px solid rgba(9,161,190,.18);
    transition: transform .25s var(--ease-out), background .25s var(--ease-out);
}
.aia-about-tag i { color: #09A1BE; }
@media (hover: hover) and (pointer: fine) {
    .aia-about-tag:hover { transform: translateY(-2px); background: rgba(9,161,190,.12); }
}

/* filter bar */
.aia-filter-bar {
    background: #fff;
    border-bottom: 1px solid rgba(0,0,0,.08);
    position: sticky;
    top: 0;
    z-index: 90;
    box-shadow: 0 1px 0 rgba(0,0,0,.04);
}
.aia-filter-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 48px;
    display: flex;
    align-items: center;
    gap: 4px;
    overflow-x: auto;
    scrollbar-width: none;
}
.aia-filter-inner::-webkit-scrollbar { display: none; }
.aia-filter-btn {
    flex-shrink: 0;
    padding: 14px 18px;
    font-size: .8rem;
    font-weight: 600;
    letter-spacing: .04em;
    border: none;
    background: transparent;
    color: #6b7280;
    cursor: pointer;
    transition: color .2s var(--ease-out);
    position: relative;
    white-space: nowrap;
}
/* button press feedback (Emil Kowalski) */
.aia-filter-btn:active { transform: scale(0.97); }
.aia-filter-btn::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: #09A1BE;
    transition: width .28s var(--ease-out);
}
.aia-filter-btn.active { color: #09A1BE; }
.aia-filter-btn.active::after { width: calc(100% - 12px); }
@media (hover: hover) and (pointer: fine) {
    .aia-filter-btn:hover:not(.active) { color: #1a1a2e; }
}

/* grid section */
.aia-section { position: relative; padding: 80px 0 120px; background: #fff; overflow: hidden; }
.aia-section-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(110px);
    pointer-events: none;
    z-index: 0;
}
.aia-section-orb.o1 { width: 480px; height: 480px; background: radial-gradient(circle, rgba(196,146,46,.16) 0%, transparent 70%); top: -60px; right: -100px; }
.aia-section-orb.o2 { width: 420px; height: 420px; background: radial-gradient(circle, rgba(104,2,98,.10) 0%, transparent 70%); bottom: 10%; left: -120px; }
.aia-grid-wrap { position: relative; z-index: 1; max-width: 1280px; margin: 0 auto; padding: 0 48px; }
.aia-section-head { margin-bottom: 56px; }
.aia-section-eyebrow {
    font-size: .64rem;
    font-weight: 700;
    letter-spacing: .42em;
    text-transform: uppercase;
    color: #09A1BE;
    display: flex;
    align-items: center;
    gap: .9rem;
    margin-bottom: 1.2rem;
}
.aia-section-eyebrow::before { content: ''; width: 36px; height: 1px; background: #09A1BE; }
.aia-section-title {
    font-family: var(--fm, sans-serif);
    font-weight: 100;
    font-size: clamp(2.2rem, 4.5vw, 5.5rem);
    color: #680262;
    line-height: .95;
    letter-spacing: -.03em;
    margin-bottom: 0;
}
.aia-section-title em { font-style: normal; color: #09A1BE; }
.aia-count-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(9,161,190,.07);
    border: 1px solid rgba(9,161,190,.2);
    font-size: .78rem;
    color: #09A1BE;
    font-weight: 700;
    margin-left: 14px;
    vertical-align: middle;
}
.aia-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 28px;
}
.aia-card-wrap { height: 560px; will-change: transform; }
.aia-card-wrap[data-hidden] { display: none; }

/* cards — glass + 3D tilt */
.aia-card {
    position: relative;
    height: 100%;
    background: linear-gradient(150deg, rgba(255,255,255,.82), rgba(255,255,255,.5));
    border: 1px solid var(--glass-border, rgba(255,255,255,.8));
    border-radius: 22px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    -webkit-backdrop-filter: blur(16px) saturate(160%);
    backdrop-filter: blur(16px) saturate(160%);
    box-shadow: 0 18px 42px -26px rgba(40,40,75,.28), inset 0 1px 0 rgba(255,255,255,.9);
    transition: box-shadow .3s var(--ease-out), background .3s var(--ease-out);
    cursor: pointer;
    text-decoration: none;
}
@media (hover: hover) and (pointer: fine) {
    .aia-card:hover {
        background: linear-gradient(150deg, rgba(255,255,255,.92), rgba(255,255,255,.68));
        box-shadow: var(--shadow-card, 0 18px 42px -22px rgba(40,40,75,.5)), inset 0 1px 0 rgba(255,255,255,.95);
    }
    .aia-card:hover .aia-card-img img { transform: scale(1.05); }
    .aia-card:hover .aia-card-arrow {
        background: #09A1BE;
        color: #fff;
        transform: rotate(-45deg);
    }
}
.aia-card:active { transform: scale(0.98); }
.aia-card-img {
    position: relative;
    overflow: hidden;
    aspect-ratio: 11 / 9;
    flex-shrink: 0;
    background: #f3f4f6;
}
.aia-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s var(--ease-out);
    display: block;
}
.aia-card-img-ph {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: rgba(139,106,34,.2);
}
.aia-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(255,255,255,.6) 0%, transparent 55%);
}
.aia-card-cat {
    position: absolute;
    top: 14px;
    left: 14px;
    padding: 4px 11px;
    border-radius: 100px;
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    background: rgba(255,255,255,.88);
    border: 1px solid rgba(9,161,190,.25);
    color: #09A1BE;
    backdrop-filter: blur(6px);
}
.aia-card-body {
    padding: 22px 24px 24px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
}
.aia-card-title {
    font-family: var(--fm, sans-serif);
    font-weight: 600;
    font-size: 1.05rem;
    color: #0d0f1e;
    line-height: 1.25;
    margin: 0;
    min-height: 2.5em;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.aia-card-sub {
    font-size: .82rem;
    color: #09A1BE;
    font-weight: 500;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.aia-card-desc {
    font-size: .88rem;
    color: #6b7280;
    line-height: 1.55;
    margin: 0;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.aia-card-footer {
    margin-top: auto;
    padding-top: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid rgba(0,0,0,.06);
}
.aia-card-lbl {
    font-size: .72rem;
    color: #09A1BE;
    letter-spacing: .08em;
    text-transform: uppercase;
    font-weight: 600;
}
.aia-card-arrow {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgb(12 161 190 / 5%);
    border: 1px solid rgb(12 161 190);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #09A1BE;
    font-size: .85rem;
    transition: background .25s var(--ease-out), color .25s var(--ease-out), transform .25s var(--ease-out);
}

/* empty state */
.aia-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    color: #9ca3af;
}
.aia-empty i { font-size: 3rem; display: block; margin-bottom: 16px; opacity: .25; }

/* CTA — one deliberate color exception (purple-to-teal) */
.aia-cta {
    background: linear-gradient(135deg, #680262 0%, #09A1BE 100%);
    padding: 100px 0;
    text-align: center;
}
.aia-cta-inner { max-width: 800px; margin: 0 auto; padding: 0 48px; }
.aia-cta h2 {
    font-family: var(--fm, sans-serif);
    font-weight: 100;
    font-size: clamp(2rem, 4vw, 4.5rem);
    color: #fff;
    line-height: .95;
    letter-spacing: -.03em;
    margin-bottom: 1.5rem;
}
.aia-cta h2 em { font-style: normal; color: #91ebfc; }
.aia-cta p {
    color: rgba(255,255,255,.78);
    font-size: 1rem;
    line-height: 1.65;
    margin-bottom: 2.5rem;
}

@media (max-width: 768px) {
    .aia-grid-wrap, .aia-filter-inner, .aia-cta-inner { padding-left: 24px; padding-right: 24px; }
    .aia-grid { grid-template-columns: 1fr; }
}

/* reduced motion (design-taste-frontend skill — mandatory for MOTION_INTENSITY > 3) */
@media (prefers-reduced-motion: reduce) {
    .aia-card-wrap, .aia-card,
    .aia-section-eyebrow, .aia-section-title,
    .aia-about-panel, .aia-about-panel *,
    .aia-cta h2, .aia-cta p, .aia-cta .sb {
        opacity: 1 !important;
        transform: none !important;
    }
}
</style>

<!-- ── Hero ──────────────────────────────────────────── -->
<section class="wm-hero aia-hero-center">
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
        <div class="wm-hero-label"><?php echo $page->getTitre() ?></div>
        <h1 class="sh-h1 rv on">Nos <em>Agents IA</em></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un devis" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un audit technique</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>
        
            <a href="<?php echo $pageReference->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir nos offres" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les réalisations</span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div> 
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="<?php echo $page->getTitre() ?>">
      </div>
    </div>
  </div>
</section>
<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq"><div class="mq-t">
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
  <span class="mi"><span class="d"></span><span class="h">Hello World Agency</span></span>
  <span class="mi"><span class="d"></span>Web &amp; Mobile</span>
  <span class="mi"><span class="d"></span><span class="h">Solutions IA</span></span>
  <span class="mi"><span class="d"></span>SaaS &amp; Produits</span>
  <span class="mi"><span class="d"></span><span class="h">Brand Experience</span></span>
  <span class="mi"><span class="d"></span>140+ Déploiements</span>
  <span class="mi"><span class="d"></span><span class="h">ROI dès 7 semaines</span></span>
  <span class="mi"><span class="d"></span>Digital Marketing Agency</span>
</div></div>

<!-- ── About / descriptif — sépare le marquee du filtre ─ -->
<section class="aia-about" id="aia-about">
    <div class="aia-about-orb" aria-hidden="true"></div>
    <div class="aia-grid-wrap">
        <div class="aia-section-head aia-about-panel">
            <div class="aia-section-eyebrow rv">Comment ça marche</div>
            <h2 class="aia-section-title rv d1">Des collègues digitaux, <em>prêts à l'emploi</em></h2>
            <p class="aia-about-text rv d2">
                Chaque agent est une brique métier autonome — messagerie, service client, marketing, finance,
                productivité ou données — entraînée sur vos process et déployée en moins de 72h. Pas de code à
                écrire, pas d'équipe technique à recruter&nbsp;: vous choisissez l'agent ci-dessous, on le
                connecte à vos outils, il travaille pour vous 24/7.
            </p>
            <div class="aia-about-tags rv d3">
                <span class="aia-about-tag"><i class="fal fa-bolt"></i> Déploiement en 72h</span>
                <span class="aia-about-tag"><i class="fal fa-plug"></i> Connecté à vos outils</span>
                <span class="aia-about-tag"><i class="fal fa-language"></i> Multilingue 24/7</span>
                <span class="aia-about-tag"><i class="fal fa-code"></i> Sans code</span>
            </div>
        </div>
    </div>
</section>

<!-- ── Filter bar ────────────────────────────────────── -->
<nav class="aia-filter-bar" id="aia-listing" aria-label="Filtrer les agents">
    <div class="aia-filter-inner">
        <button class="aia-filter-btn active" data-filter="all">
            Tous <span style="font-weight:400;opacity:.5;">(<?= count($agents_ia); ?>)</span>
        </button>
        <?php foreach ($cats as $cat): ?>
        <button class="aia-filter-btn" data-filter="<?= $cat; ?>">
            <i class="fal <?= $agentIcons[$cat] ?? 'fa-robot'; ?>" style="margin-right:5px;font-size:.85em;opacity:.7;"></i>
            <?= htmlspecialchars($catLabels[$cat], ENT_QUOTES, 'UTF-8'); ?>
        </button>
        <?php endforeach; ?>
    </div>
</nav>

<!-- ── Grid ──────────────────────────────────────────── -->
<section class="aia-section">
    <div class="aia-section-orb o1" aria-hidden="true"></div>
    <div class="aia-section-orb o2" aria-hidden="true"></div>
    <div class="aia-grid-wrap">
        <div class="aia-section-head">
            <div class="aia-section-eyebrow">Nos solutions</div>
            <h2 class="aia-section-title">
                Choisissez votre <em>agent IA</em>
                <span class="aia-count-badge" id="aia-count"><?= count($agents_ia); ?></span>
            </h2>
        </div>

        <div class="aia-grid" id="aia-grid">
            <?php if (!empty($agents_ia)): ?>
            <?php foreach ($agents_ia as $agent):
                $cat  = $agentCategories[$agent->getSlug()] ?? 'Autres';
                $icon = $agentIcons[$cat] ?? 'fa-robot';
                $lbl  = $catLabels[$cat] ?? $cat;
            ?>
            <div class="aia-card-wrap" data-category="<?= $cat; ?>">
                <a class="aia-card" href="<?= $agent->getLink(); ?>" aria-label="<?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?>">
                    <?php $cardPhoto = $agent->getPhotoProduit() ?: $agent->getPhoto(); ?>
                    <div class="aia-card-img">
                        <?php if ($cardPhoto): ?>
                        <img src="<?= $siteURL; ?>images/agents_ia/<?= $cardPhoto; ?>"
                             alt="<?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?>"
                             loading="lazy">
                        <?php else: ?>
                        <div class="aia-card-img-ph"><i class="fal fa-robot"></i></div>
                        <?php endif; ?>
                        <div class="aia-card-overlay"></div>
                        <span class="aia-card-cat">
                            <i class="fal <?= $icon; ?>" style="margin-right:4px;"></i>
                            <?= htmlspecialchars($lbl, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </div>
                    <div class="aia-card-body">
                        <h3 class="aia-card-title"><?= htmlspecialchars($agent->getTitre(), ENT_QUOTES, 'UTF-8'); ?></h3>
                        <?php if ($agent->getSousTitre()): ?>
                        <p class="aia-card-sub"><?= htmlspecialchars($agent->getSousTitre(), ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>
                        <?php if ($agent->getExtrait()): ?>
                        <p class="aia-card-desc"><?= mb_substr(strip_tags($agent->getExtrait()), 0, 105, 'UTF-8'); ?>...</p>
                        <?php endif; ?>
                        <div class="aia-card-footer">
                            <span class="aia-card-lbl">Découvrir</span>
                            <span class="aia-card-arrow"><i class="fal fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="aia-empty">
                <i class="fal fa-robot"></i>
                Aucun agent disponible pour le moment.
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ── CTA final ─────────────────────────────────────── -->
<section class="aia-cta">
    <div class="aia-cta-inner">
        <h2>Déployez votre premier<br><em>agent IA aujourd'hui</em></h2>
        <p>Notre équipe vous accompagne de la sélection au lancement en moins de 72h. Aucune compétence technique requise.</p>
        <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
            <div class="sb-label"><span class="sb-hint">Parler à un expert</span></div>
            <div class="sb-knob"><i class="fal fa-rocket"></i></div>
        </a>
    </div>
</section>

<!-- ── GSAP ──────────────────────────────────────────── -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── Hero image entrance + gentle parallax on the centered visual */
    if (!prefersReduced) {
        gsap.from('.aia-hero-center .wm-hero-side', {
            y: 40, autoAlpha: 0, scale: .96, duration: 1.1, ease: 'expo.out', delay: .35
        });
        gsap.to('.aia-hero-center .wm-hero-side', { y: -30, ease: 'none',
            scrollTrigger: { trigger: '.aia-hero-center', start: 'top top', end: 'bottom top', scrub: 1.5 }
        });
    }

    /* ── About panel reveal — utilise le système .rv sitewide (IntersectionObserver, cf. includes/template.php), */
    /* pas de ScrollTrigger ici : évite tout état bloqué à opacity 0 si le trigger est raté au chargement.        */

    /* ── Card reveal on scroll (ScrollTrigger batch — Emil: stagger 50-70ms, from y not scale(0)) */
    var wraps = gsap.utils.toArray('.aia-card-wrap');

    if (!prefersReduced) {
        gsap.set(wraps, { y: 50, autoAlpha: 0 });
        ScrollTrigger.batch(wraps, {
            start: 'top 90%',
            onEnter: function (batch) {
                gsap.to(batch, { y: 0, autoAlpha: 1, duration: .75, ease: 'expo.out', stagger: .06 });
            },
            onEnterBack: function (batch) {
                gsap.to(batch, { y: 0, autoAlpha: 1, duration: .45, stagger: .04 });
            }
        });
    }

    /* ── Section head reveal (grille uniquement — le descriptif utilise .rv, pas GSAP) */
    if (!prefersReduced) {
        gsap.from('.aia-section .aia-section-eyebrow', {
            y: 18, autoAlpha: 0, duration: .8, ease: 'expo.out',
            scrollTrigger: { trigger: '.aia-section .aia-section-head', start: 'top 87%' }
        });
        gsap.from('.aia-section .aia-section-title', {
            y: 28, autoAlpha: 0, duration: .95, ease: 'expo.out', delay: .08,
            scrollTrigger: { trigger: '.aia-section .aia-section-head', start: 'top 87%' }
        });
        gsap.from('.aia-cta h2, .aia-cta p, .aia-cta .sb', {
            y: 32, autoAlpha: 0, stagger: .1, duration: .9, ease: 'expo.out',
            scrollTrigger: { trigger: '.aia-cta', start: 'top 82%' }
        });
    }

    /* ── 3D tilt on cards (same mouse-follow pattern as .ai-card / .svc-card sitewide) */
    if (!prefersReduced && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.querySelectorAll('.aia-card').forEach(function (el) {
            var shine = document.createElement('div');
            shine.className = 'tilt-shine';
            el.appendChild(shine);
            el.addEventListener('mouseenter', function () {
                el.style.transition = 'transform .06s linear, box-shadow .3s, background .3s';
            });
            el.addEventListener('mousemove', function (e) {
                var r = el.getBoundingClientRect();
                var dx = (e.clientX - r.left - r.width * .5) / (r.width * .5);
                var dy = (e.clientY - r.top - r.height * .5) / (r.height * .5);
                el.style.transform = 'perspective(900px) rotateX(' + (-dy * 6) + 'deg) rotateY(' + (dx * 6) + 'deg) translateY(-5px) translateZ(8px)';
                shine.style.setProperty('--sx', ((dx + 1) / 2 * 100) + '%');
                shine.style.setProperty('--sy', ((dy + 1) / 2 * 100) + '%');
            });
            el.addEventListener('mouseleave', function () {
                el.style.transition = 'transform .65s cubic-bezier(.34,1.56,.64,1), box-shadow .3s, background .3s';
                el.style.transform = '';
            });
        });
    }

    /* ── Category filter (Emil: blur crossfade to mask state switch) */
    var filterBtns = document.querySelectorAll('.aia-filter-btn');
    var countEl    = document.getElementById('aia-count');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = this.getAttribute('data-filter');

            filterBtns.forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');

            var visible = [], hidden = [];
            wraps.forEach(function (w) {
                (filter === 'all' || w.getAttribute('data-category') === filter)
                    ? visible.push(w)
                    : hidden.push(w);
            });

            /* fade out hidden — Emil: fast exit (200ms) */
            if (hidden.length) {
                gsap.to(hidden, {
                    autoAlpha: 0, y: -14, duration: .22, ease: 'power2.in',
                    onComplete: function () {
                        hidden.forEach(function (w) {
                            w.setAttribute('data-hidden', '1');
                            w.style.display = 'none';
                        });
                    }
                });
            }

            /* show visible — Emil: deliberate enter (600ms expo-out with stagger 60ms) */
            visible.forEach(function (w) {
                w.removeAttribute('data-hidden');
                w.style.display = '';
            });
            gsap.fromTo(visible,
                { autoAlpha: 0, y: 28 },
                { autoAlpha: 1, y: 0, duration: .6, ease: 'expo.out', stagger: .06,
                  delay: hidden.length ? .18 : 0 }
            );

            if (countEl) countEl.textContent = visible.length;
            ScrollTrigger.refresh();
        });
    });
})();
</script>
