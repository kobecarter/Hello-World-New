<?php
/* ── meta statique par id de formation (stable entre langues, contrairement au slug) ── */
$hwl = $_SESSION['lang'];
$hwfdMap = [
    1 => [
        'icon' => 'fa-chess', 'cat' => 'Stratégie', 'badge' => 'gold',
        'intro' => $lang['FORMD_1_INTRO'][$hwl],
        'hero_cta' => $lang['FORMD_1_HERO_CTA'][$hwl],
        'final_cta' => $lang['FORMD_1_FINAL_CTA'][$hwl],
        'plus' => $lang['FORMD_1_PLUS'][$hwl],
        'pour_qui_items' => [
            ['label' => $lang['FORMD_1_AUD1'][$hwl], 'icon' => 'fa-briefcase'],
            ['label' => $lang['FORMD_1_AUD2'][$hwl], 'icon' => 'fa-user-tie'],
            ['label' => $lang['FORMD_1_AUD3'][$hwl], 'icon' => 'fa-bullhorn'],
            ['label' => $lang['FORMD_1_AUD4'][$hwl], 'icon' => 'fa-compass'],
            ['label' => $lang['FORMD_1_AUD5'][$hwl], 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-strategie.jpg',
    ],
    2 => [
        'icon' => 'fa-code', 'cat' => 'Tech & Build', 'badge' => 'purple',
        'intro' => $lang['FORMD_2_INTRO'][$hwl],
        'hero_cta' => $lang['FORMD_2_HERO_CTA'][$hwl],
        'final_cta' => $lang['FORMD_2_FINAL_CTA'][$hwl],
        'plus' => $lang['FORMD_2_PLUS'][$hwl],
        'pour_qui_items' => [
            ['label' => $lang['FORMD_2_AUD1'][$hwl], 'icon' => 'fa-rocket'],
            ['label' => $lang['FORMD_2_AUD2'][$hwl], 'icon' => 'fa-code'],
            ['label' => $lang['FORMD_2_AUD3'][$hwl], 'icon' => 'fa-palette'],
            ['label' => $lang['FORMD_2_AUD4'][$hwl], 'icon' => 'fa-cube'],
            ['label' => $lang['FORMD_2_AUD5'][$hwl], 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-claudecode.jpg',
    ],
    3 => [
        'icon' => 'fa-diagram-project', 'cat' => 'Ops & Automatisation', 'badge' => 'gold',
        'intro' => $lang['FORMD_3_INTRO'][$hwl],
        'hero_cta' => $lang['FORMD_3_HERO_CTA'][$hwl],
        'final_cta' => $lang['FORMD_3_FINAL_CTA'][$hwl],
        'plus' => $lang['FORMD_3_PLUS'][$hwl],
        'pour_qui_items' => [
            ['label' => $lang['FORMD_3_AUD1'][$hwl], 'icon' => 'fa-gears'],
            ['label' => $lang['FORMD_3_AUD2'][$hwl], 'icon' => 'fa-chart-line'],
            ['label' => $lang['FORMD_3_AUD3'][$hwl], 'icon' => 'fa-server'],
            ['label' => $lang['FORMD_3_AUD4'][$hwl], 'icon' => 'fa-clipboard-list'],
            ['label' => $lang['FORMD_3_AUD5'][$hwl], 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-n8n.jpg',
    ],
    4 => [
        'icon' => 'fa-microphone', 'cat' => 'Podcast & Média', 'badge' => 'purple',
        'intro' => $lang['FORMD_4_INTRO'][$hwl],
        'hero_cta' => $lang['FORMD_4_HERO_CTA'][$hwl],
        'final_cta' => $lang['FORMD_4_FINAL_CTA'][$hwl],
        'plus' => $lang['FORMD_4_PLUS'][$hwl],
        'pour_qui_items' => [
            ['label' => $lang['FORMD_4_AUD1'][$hwl], 'icon' => 'fa-microphone'],
            ['label' => $lang['FORMD_4_AUD2'][$hwl], 'icon' => 'fa-comments'],
            ['label' => $lang['FORMD_4_AUD3'][$hwl], 'icon' => 'fa-lightbulb'],
            ['label' => $lang['FORMD_4_AUD4'][$hwl], 'icon' => 'fa-pen-nib'],
            ['label' => $lang['FORMD_4_AUD5'][$hwl], 'icon' => 'fa-graduation-cap'],
        ],
        'programme_img' => 'programme-podcast.jpg',
    ],
];
$fid  = $formation ? $formation->getId() : 0;
$meta = isset($hwfdMap[$fid]) ? $hwfdMap[$fid] : ['icon' => 'fa-graduation-cap', 'cat' => 'Formation', 'badge' => 'gold', 'intro' => '', 'hero_cta' => $lang['FORMD_BTN_RESERVER_PLACE'][$hwl], 'final_cta' => $lang['FORMD_DEFAULT_FINAL_CTA'][$hwl], 'plus' => '', 'pour_qui_items' => [], 'programme_img' => ''];

/* ── durée ──────────────────────────────────────────────────────────── */
$hwfdDuree = $lang['FORML_CARD_SUR_DEMANDE'][$hwl];
$hwfdDateStr = '';
if ($formation && $formation->getDateDebut() && $formation->getDateFin()) {
    try {
        $d1 = new DateTime($formation->getDateDebut());
        $d2 = new DateTime($formation->getDateFin());
        $days = (int)$d1->diff($d2)->days + 1;
        $hwfdDuree = $days . ' ' . ($days > 1 ? $lang['FORML_CARD_JOURS'][$hwl] : $lang['FORML_CARD_JOUR'][$hwl]);
    } catch (Exception $e) {}
}
if ($formation && $formation->getDateDebut()) {
    $hwfdDateStr = date('d M Y', strtotime($formation->getDateDebut()));
}

/* ── inscriptions / capacité (hero info cards) ─────────────────────── */
$hwfdOuvertureStr = '';
$hwfdLimiteStr    = '';
if ($formation && $formation->getDateOuvertureInscription()) {
    $hwfdOuvertureStr = date('d M Y', strtotime($formation->getDateOuvertureInscription()));
}
if ($formation && $formation->getDateLimiteInscription()) {
    $hwfdLimiteStr = date('d M Y', strtotime($formation->getDateLimiteInscription()));
}
$hwfdCapaciteStr = '';
if ($formation && intval($formation->getNbParticipants()) > 0) {
    $hwfdCapaciteStr = ($formation->getNbParticipantsMin() ? intval($formation->getNbParticipantsMin()) . ' – ' : '') . intval($formation->getNbParticipants()) . ' participants';
}

/* ── lieu / modalité : dépend du "Type de formation" choisi dans l'admin ─ */
$hwfdLieuLabel = $lang['FORMD_CHIP_LIEU'][$hwl];
$hwfdLieuIcon  = 'fa-location-dot';
$hwfdLieuVal   = $formation ? explode(' —', $formation->getLieu() ?? '')[0] : '';
if ($formation && $formation->getTypeFormation() === 'distance') {
    $hwfdLieuLabel = $lang['FORMD_CHIP_MODALITE'][$hwl];
    $hwfdLieuIcon  = 'fa-wifi';
    $hwfdLieuVal   = $lang['FORMD_LIEU_ONLINE'][$hwl];
} elseif ($formation && $formation->getTypeFormation() === 'hybride') {
    $hwfdLieuLabel = $lang['FORMD_CHIP_MODALITE'][$hwl];
    $hwfdLieuIcon  = 'fa-shuffle';
    $hwfdLieuVal   = $hwfdLieuVal !== '' ? $lang['FORMD_LIEU_HYBRIDE'][$hwl] . ' — ' . $hwfdLieuVal : $lang['FORMD_LIEU_HYBRIDE'][$hwl];
}

/* ── programme : parsing des modules (<li><strong>Module N — Titre</strong> : texte</li>)
   pour le panneau diagonal, avec repli sur le HTML brut si le motif ne matche pas ──── */
$hwfdModules = [];
if ($formation && $formation->getDescription()) {
    preg_match_all('/<li>\s*<strong>(.*?)<\/strong>\s*:?\s*(.*?)<\/li>/is', $formation->getDescription(), $hwfdModMatches, PREG_SET_ORDER);
    foreach ($hwfdModMatches as $i => $mm) {
        $hwfdFullTitle = html_entity_decode(trim(strip_tags($mm[1])), ENT_QUOTES, 'UTF-8');
        /* "Module N — Titre descriptif" → label court "Module N" + titre descriptif séparé */
        $hwfdLabel = 'Module ' . ($i + 1);
        $hwfdSub   = $hwfdFullTitle;
        if (preg_match('/^(.*?)\s*[—–-]\s*(.+)$/u', $hwfdFullTitle, $hwfdSplit)) {
            $hwfdLabel = trim($hwfdSplit[1]);
            $hwfdSub   = trim($hwfdSplit[2]);
        }
        $hwfdModules[] = [
            'num'   => sprintf('%02d', $i + 1),
            'label' => $hwfdLabel,
            'title' => $hwfdSub,
            'text'  => html_entity_decode(trim(strip_tags($mm[2])), ENT_QUOTES, 'UTF-8'),
        ];
    }
}
$hwfdModuleImgMap = [
    1 => ['strategie-m1.jpg', 'strategie-m2.jpg', 'strategie-m3.jpg', 'strategie-m4.jpg'],
    2 => ['claudecode-m1.jpg', 'claudecode-m2.jpg', 'claudecode-m3.jpg', 'claudecode-m4.jpg'],
    3 => ['n8n-m1.jpg', 'n8n-m2.jpg', 'n8n-m3.jpg', 'n8n-m4.jpg'],
    4 => ['podcast-m1.jpg', 'podcast-m2.jpg', 'podcast-m3.jpg', 'podcast-m4.jpg'],
];
$hwfdModuleImgs = isset($hwfdModuleImgMap[$fid]) ? $hwfdModuleImgMap[$fid] : [];

/* ── livrables : parsing en items pour la rangée horizontale de cercles
   (nombre variable selon la formation, 3 à 5) ─────────────────────────── */
$hwfdLivrItems = [];
if ($formation && $formation->getLivrables()) {
    preg_match_all('/<li>(.*?)<\/li>/is', $formation->getLivrables(), $hwfdLivrMatches);
    foreach ($hwfdLivrMatches[1] as $li) {
        $txt = html_entity_decode(trim(strip_tags($li)), ENT_QUOTES, 'UTF-8');
        if ($txt !== '') $hwfdLivrItems[] = $txt;
    }
}
/* icône choisie selon le contenu réel du livrable (et non plus par index) */
$hwfdLivrIconRules = [
    'icon-target.png'    => ['diagnostic', 'audit', 'analys', 'maturité', 'priorisation', 'prioris', 'cible', 'objectif'],
    'icon-map.png'       => ['cartograph', 'carte', 'panorama', 'vision', 'opportunit'],
    'icon-road.png'      => ['feuille de route', 'roadmap', "plan d'action", 'parcours', 'étapes', 'trajectoire', 'déploy', 'version'],
    'icon-box.png'       => ['livrable', 'kit', 'pack', 'template', 'asset', 'bibliothèque', 'squelette', 'show bible', 'bible'],
    'icon-layers.png'    => ['architecture', 'structure', 'système', 'couche', 'niveau', 'workflow', 'méthode', 'reproductible', 'logique'],
    'icon-clipboard.png' => ['checklist', 'liste', 'process', 'guide', 'calendrier', 'planning', 'positionnement', 'concept', 'charte', 'plan'],
];
function hwfd_livr_icon($text, $prevIcon = null) {
    global $hwfdLivrIconRules;
    $t = mb_strtolower($text, 'UTF-8');
    $scores = [];
    foreach ($hwfdLivrIconRules as $icon => $keywords) {
        $score = 0;
        foreach ($keywords as $kw) {
            if (mb_strpos($t, mb_strtolower($kw, 'UTF-8')) !== false) $score += mb_strlen($kw);
        }
        $scores[$icon] = $score;
    }
    arsort($scores);
    foreach ($scores as $icon => $score) {
        if ($score > 0 && $icon !== $prevIcon) return $icon;
    }
    $top = array_key_first($scores);
    if ($scores[$top] > 0) return $top;
    return $prevIcon === 'icon-clipboard.png' ? 'icon-box.png' : 'icon-clipboard.png';
}
$hwfdLivrGradients = [
    ['#680262', '#B23A8C'],
    ['#09A1BE', '#5FD3E8'],
    ['#C2185B', '#F06292'],
];

/* ── autres formations ──────────────────────────────────────────────── */
$hwfdOthers = array_filter($formations ?? [], function($f) use ($fid) { return $f->getId() !== $fid; });
$hwfdOtherMeta = [
    1 => ['icon' => 'fa-chess',           'label' => $lang['FORML_BADGE_STRATEGIE'][$hwl], 'color' => '#09A1BE'],
    2 => ['icon' => 'fa-code',            'label' => 'Tech & Build', 'color' => '#680262'],
    3 => ['icon' => 'fa-diagram-project', 'label' => 'Ops & Growth', 'color' => '#09A1BE'],
    4 => ['icon' => 'fa-microphone',      'label' => $lang['FORML_BADGE_CREATEURS'][$hwl], 'color' => '#680262'],
];

/* ── nom formation pour le formulaire ──────────────────────────────── */
$hwfdTitreForm = htmlspecialchars($formation ? ($formation->getTitre() ?? '') : '', ENT_QUOTES, 'UTF-8');
?>

<!-- ══ BREADCRUMB ══════════════════════════════════════════════════════════ -->
<div class="hw-f-det-bc">
  <div class="container">
    <div class="hw-f-det-bc-inner">
      <a href="<?= $siteURL; ?>"><?= $lang['CT_BREAD_ACCUEIL'][$hwl]; ?></a>
      <span class="hw-f-det-bc-sep">/</span>
      <a href="<?= $page->getLink(); ?>"><?= $lang['FORMD_BREADCRUMB_FORMATIONS'][$hwl]; ?></a>
      <span class="hw-f-det-bc-sep">/</span>
      <span><?= $formation->getTitre() ?? ''?></span>
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
        <h1 class="sh-h1" id="hwfd-h1">
         <?php echo !empty($formation->getH1()) ? $formation->getH1() : $formation->getTitre(); ?>
        </h1>
        <p class="wm-hero-sub" id="hwfd-sub"><?= $formation->getSousTitre() ?></p>
        <div class="wm-hero-ctas" id="hwfd-ctas">
          <a href="#hwfd-form" class="sb sb-compact" role="button">
            <div class="sb-label"><span class="sb-hint"><?= htmlspecialchars($meta['hero_cta'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
          </a>
          <a href="#hwfd-programme" class="sb sb-compact sb-invert" role="button">
            <div class="sb-label"><span class="sb-hint"><?= $lang['FORML_CARD_CTA'][$hwl]; ?></span></div>
            <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ COMPTE À REBOURS ══════════════════════════════════════════════════ -->
<?php if ($formation->getDateFin()): ?>
<section class="hw-f-det-cd-section">
  <div class="container">
    <div class="hwfd-countdown rv d2" id="hwfdCountdown" data-end="<?= date('c', strtotime($formation->getDateFin())); ?>">
      <div class="sec-label rv" style="justify-content:center"><?= $lang['FORMD_CD_LIMITED'][$hwl]; ?></div>
      <h2 class="sec-title rv d1" style="font-size:clamp(1.6rem,3vw,2.6rem)"><?= $lang['FORMD_CD_TITLE'][$hwl]; ?></h2>
      <div class="hwfd-countdown-timer">
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <defs><linearGradient id="hwfdCdGrad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#680262"/><stop offset="100%" stop-color="#09A1BE"/></linearGradient></defs>
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdDaysFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdDays">–</div>
          <div class="hwfd-cd-label"><?= $lang['FORMD_CD_DAYS'][$hwl]; ?></div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdHoursFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdHours">–</div>
          <div class="hwfd-cd-label"><?= $lang['FORMD_CD_HOURS'][$hwl]; ?></div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdMinsFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdMins">–</div>
          <div class="hwfd-cd-label"><?= $lang['FORMD_CD_MINS'][$hwl]; ?></div>
        </div>
        <div class="hwfd-cd-unit">
          <svg class="hwfd-cd-ring" viewBox="0 0 100 100">
            <circle class="hwfd-cd-track" cx="50" cy="50" r="44"/>
            <circle class="hwfd-cd-fill" id="hwfdCdSecsFill" cx="50" cy="50" r="44"/>
          </svg>
          <div class="hwfd-cd-value" id="hwfdCdSecs">–</div>
          <div class="hwfd-cd-label"><?= $lang['FORMD_CD_SECS'][$hwl]; ?></div>
        </div>
      </div>
      <p class="hwfd-countdown-note"><?= $lang['FORMD_CD_NOTE'][$hwl]; ?></p>
      <div class="hwfd-countdown-chips">
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-clock"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $lang['FORMD_CHIP_DUREE'][$hwl]; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdDuree, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php if ($hwfdDateStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-calendar-check"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $lang['FORMD_CHIP_DEMARRAGE'][$hwl]; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdDateStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdLieuVal): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal <?= $hwfdLieuIcon; ?>"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $hwfdLieuLabel; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdLieuVal, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdCapaciteStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-users"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $lang['FORMD_CHIP_PLACES'][$hwl]; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdCapaciteStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
        <?php if ($hwfdLimiteStr): ?>
        <div class="hwfd-cd-chip">
          <div class="hwfd-cd-chip-icon"><i class="fal fa-calendar-xmark"></i></div>
          <div><span class="hwfd-cd-chip-lbl"><?= $lang['FORMD_CHIP_CLOTURE'][$hwl]; ?></span><span class="hwfd-cd-chip-val"><?= htmlspecialchars($hwfdLimiteStr, ENT_QUOTES, 'UTF-8'); ?></span></div>
        </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($meta['intro'])): ?>
      <p class="hwfd-countdown-intro rv d3"><?= htmlspecialchars($meta['intro'], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ POUR QUI ════════════════════════════════════════════════════════════ -->
<section class="hw-f-det-audience">
  <div class="container">
    <div class="hw-f-det-audience-grid">
      <div>
        <div class="sec-label rv"><?= $lang['FORMD_AUD_LABEL'][$hwl]; ?></div>
        <h2 class="sec-title rv d1"><?= $lang['FORMD_AUD_TITLE'][$hwl]; ?></h2>
      </div>
      <div class="hwfd-audience-list" id="hwfdAudienceList">
        <?php foreach ($meta['pour_qui_items'] as $i => $p): ?>
        <div class="hwfd-audience-card rv d<?= min($i + 2, 6); ?>">
          <div class="hwfd-audience-icon">
            <i class="fal <?= htmlspecialchars($p['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
            <div class="hwfd-audience-orbit"><span class="hwfd-audience-orbit-dot"></span></div>
          </div>
          <div class="hwfd-audience-name"><?= htmlspecialchars($p['label'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ══ PROGRAMME ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getDescription()): ?>
<section class="hw-f-det-programme" id="hwfd-programme">
  <div class="container">
    <div class="sec-label rv"><?= $lang['FORMD_PROG_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['FORMD_PROG_TITLE'][$hwl]; ?></h2>
  </div>

  <?php if (!empty($hwfdModules)): ?>
  <div class="hwfd-prog-diag rv d2" id="hwfdProgDiag">
    <?php foreach ($hwfdModules as $i => $mod): ?>
    <div class="hwfd-diag-panel" tabindex="0">
      <div class="hwfd-diag-panel-inner">
        <?php if (isset($hwfdModuleImgs[$i])): ?>
        <img src="<?= $siteURL; ?>images/formations/modules/<?= htmlspecialchars($hwfdModuleImgs[$i], ENT_QUOTES, 'UTF-8'); ?>" alt="" loading="lazy">
        <?php endif; ?>
      </div>
      <div class="hwfd-diag-scrim"></div>
      <div class="hwfd-diag-num"><?= $mod['num']; ?></div>
      <div class="hwfd-diag-body">
        <div class="hwfd-diag-label"><?= htmlspecialchars($mod['label'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hwfd-diag-title"><?= htmlspecialchars($mod['title'], ENT_QUOTES, 'UTF-8'); ?></div>
        <p class="hwfd-diag-text"><?= htmlspecialchars($mod['text'], ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="container">
    <div class="hw-f-det-programme-split">
      <?php if (!empty($meta['programme_img'])): ?>
      <div class="hw-f-det-programme-visual rv d2">
        <img src="<?= $siteURL; ?>images/formations/<?= htmlspecialchars($meta['programme_img'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($formation->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
      </div>
      <?php endif; ?>
      <div class="hw-f-det-programme-body rv d3"><?= $formation->getDescription(); ?></div>
    </div>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>

<!-- ══ LIVRABLES ══════════════════════════════════════════════════════════ -->
<?php if ($formation->getLivrables()): ?>
<section class="hw-f-det-livrables">
  <div class="container">
    <div class="sec-label rv"><?= $lang['FORMD_LIVR_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['FORMD_LIVR_TITLE'][$hwl]; ?></h2>

    <?php if (!empty($hwfdLivrItems)): ?>
    <div class="hwfd-livr-row rv d2" id="hwfdLivrWave" style="grid-template-columns:repeat(<?= count($hwfdLivrItems); ?>,1fr)">
      <?php $hwfdPrevIcon = null; foreach ($hwfdLivrItems as $i => $item):
        $grad  = $hwfdLivrGradients[$i % count($hwfdLivrGradients)];
        $icon  = hwfd_livr_icon($item, $hwfdPrevIcon);
        $hwfdPrevIcon = $icon;
        $isLast = ($i === count($hwfdLivrItems) - 1);
      ?>
      <div class="hwfd-livr-item">
        <div class="hwfd-livr-circle-wrap" style="--c:<?= $grad[0]; ?>">
          <?php if (!$isLast): ?><div class="hwfd-livr-connector"></div><?php endif; ?>
          <div class="hwfd-livr-orbit"><span class="hwfd-livr-orbit-dot"></span></div>
          <div class="hwfd-livr-circle-outer" style="background:conic-gradient(from 200deg,<?= $grad[0]; ?>,<?= $grad[1]; ?>,<?= $grad[0]; ?>)">
            <div class="hwfd-livr-circle-inner"><img src="<?= $siteURL; ?>images/formations/livr-icons/<?= $icon; ?>" alt="" loading="lazy"></div>
          </div>
        </div>
        <div class="hwfd-livr-vline" style="background:linear-gradient(to bottom,<?= $grad[0]; ?>,rgba(0,0,0,.06))"></div>
        <div class="hwfd-livr-text">
          <div class="hwfd-livr-num" style="color:<?= $grad[0]; ?>"><?= $lang['FORMD_LIVR_ITEM_PREFIX'][$hwl]; ?> <?= sprintf('%02d', $i + 1); ?></div>
          <p><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="hw-f-det-livrables-body rv d2"><?= $formation->getLivrables(); ?></div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- ══ PRÉREQUIS ═══════════════════════════════════════════════════════════ -->
<?php if ($formation->getPrerequis()): ?>
<section class="hw-f-det-prereqs">
  <div class="container">
    <div class="hw-f-det-prereqs-inner">
      <div class="sec-label rv" style="justify-content:center"><?= $lang['FORMD_PREREQ_LABEL'][$hwl]; ?></div>
      <h2 class="sec-title rv d1"><?= $lang['FORMD_PREREQ_TITLE'][$hwl]; ?></h2>
      <p class="hw-f-det-prereqs-text rv d2"><?= nl2br(htmlspecialchars($formation->getPrerequis(), ENT_QUOTES, 'UTF-8')); ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ LE PLUS HELLO WORLD ════════════════════════════════════════════════ -->
<?php if ($meta['plus']): ?>
<section class="hw-f-det-plus">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container" style="position:relative;z-index:2">
    <div class="hw-f-det-plus-inner">
      <div class="hw-f-det-plus-lbl rv"><?= $lang['FORMD_PLUS_LABEL'][$hwl]; ?></div>
      <div class="hw-f-det-plus-title rv d1"><?= $lang['FORMD_PLUS_TITLE'][$hwl]; ?></div>
      <p class="hw-f-det-plus-text rv d2"><?= htmlspecialchars($meta['plus'], ENT_QUOTES, 'UTF-8'); ?></p>
      <div class="cta-btns rv d3" style="justify-content:center;margin-top:2.2rem">
        <a href="#hwfd-form" class="sb sb-compact sb-invert" role="button">
          <div class="sb-label"><span class="sb-hint"><?= htmlspecialchars($meta['final_cta'], ENT_QUOTES, 'UTF-8'); ?></span></div>
          <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ FORMULAIRE D'INSCRIPTION / QUALIFICATION ════════════════════════════ -->
<section class="hw-f-det-form-section" id="hwfd-form">
  <div class="container">
    <div class="sec-label rv" style="text-align:center"><?= $lang['FORMD_FORM_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1" style="text-align:center"><?= $lang['FORMD_FORM_TITLE'][$hwl]; ?></h2>
    <p style="text-align:center;font-size:.82rem;color:var(--hwfd-txt2);max-width:560px;margin:1rem auto 3rem;line-height:1.9;font-weight:300" class="rv d2"><?= $lang['FORMD_FORM_INTRO'][$hwl]; ?></p>

    <div class="hw-f-det-form-wrap rv d3">
      <div id="hwfd-form-content">
        <div class="hw-f-det-form-title"><?= $lang['FORMD_FORM_SUBTITLE'][$hwl]; ?></div>
        <div class="hw-f-det-form-sub"><?= $lang['FORMD_FORM_SUB'][$hwl]; ?></div>

        <div class="hwfd-wizard-progress">
          <div class="hwfd-wizard-step active" id="hwfd-wizard-step1"><span class="hwfd-wizard-dot">1</span><span><?= $lang['FORMD_WIZ_STEP1'][$hwl]; ?></span></div>
          <div class="hwfd-wizard-line" id="hwfd-wizard-line"></div>
          <div class="hwfd-wizard-step" id="hwfd-wizard-step2"><span class="hwfd-wizard-dot">2</span><span><?= $lang['FORMD_WIZ_STEP2'][$hwl]; ?></span></div>
        </div>

        <form id="hwfd-qualification-form" novalidate>
          <input type="hidden" name="formation" value="<?= $hwfdTitreForm; ?>">
          <input type="hidden" name="page_uri" value="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

          <div class="hwfd-step-wrap">
          <!-- ══ ÉTAPE 1 : besoin & contexte ══════════════════════════════ -->
          <div class="hwfd-step hw-f-det-form-grid" id="hwfd-step-1">

            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-formation"><?= $lang['FORMD_F_FORMATION_LABEL'][$hwl]; ?> <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-formation" name="formation_souhaitee" required>
                <option value=""><?= $lang['FORMD_SELECT_DASH'][$hwl]; ?></option>
                <option value="strategie" <?= $fid === 1 ? 'selected' : ''; ?>><?= $lang['FORMD_OPT_STRATEGIE'][$hwl]; ?></option>
                <option value="claude-code" <?= $fid === 2 ? 'selected' : ''; ?>><?= $lang['FORMD_OPT_CLAUDECODE'][$hwl]; ?></option>
                <option value="n8n" <?= $fid === 3 ? 'selected' : ''; ?>><?= $lang['FORMD_OPT_N8N'][$hwl]; ?></option>
                <option value="podcast" <?= $fid === 4 ? 'selected' : ''; ?>><?= $lang['FORMD_OPT_PODCAST'][$hwl]; ?></option>
                <option value="conseil"><?= $lang['FORMD_OPT_CONSEIL'][$hwl]; ?></option>
              </select>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-format"><?= $lang['FORMD_F_FORMAT_LABEL'][$hwl]; ?></label>
              <select class="hw-f-det-input" id="hwfd-format" name="format">
                <option value="presentiel"><?= $lang['FORML_FORMAT_PRESENTIEL_TITLE'][$hwl]; ?></option>
                <option value="distance"><?= $lang['FORML_FORMAT_DISTANCE_TITLE'][$hwl]; ?></option>
                <option value="peu-importe"><?= $lang['FORMD_OPT_PEU_IMPORTE'][$hwl]; ?></option>
              </select>
            </div>

            <!-- Vous êtes — champ clé -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-statut"><?= $lang['FORMD_F_STATUT_LABEL'][$hwl]; ?> <span>*</span></label>
              <select class="hw-f-det-input" id="hwfd-statut" name="statut" required>
                <option value=""><?= $lang['FORMD_SELECT_STATUT_DASH'][$hwl]; ?></option>
                <option value="particulier"><?= $lang['FORMD_STATUT_PARTICULIER'][$hwl]; ?></option>
                <option value="freelancer"><?= $lang['FORMD_STATUT_FREELANCE'][$hwl]; ?></option>
                <option value="societe"><?= $lang['FORMD_STATUT_SOCIETE'][$hwl]; ?></option>
              </select>
            </div>

            <!-- ── PARTICULIER ─────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-particulier">
              <div class="hw-f-det-sep-label"><?= $lang['FORMD_SEP_PARTICULIER'][$hwl]; ?></div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-niveau"><?= $lang['FORMD_P_NIVEAU_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-p-niveau" name="niveau_ia">
                  <option value=""><?= $lang['FORMD_SELECT_DASH'][$hwl]; ?></option>
                  <option value="debutant"><?= $lang['FORMD_NIV_DEBUTANT'][$hwl]; ?></option>
                  <option value="intermediaire"><?= $lang['FORMD_NIV_INTER'][$hwl]; ?></option>
                  <option value="avance"><?= $lang['FORMD_NIV_AVANCE'][$hwl]; ?></option>
                  <option value="expert"><?= $lang['FORMD_NIV_EXPERT'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-domaine"><?= $lang['FORMD_P_DOMAINE_LABEL'][$hwl]; ?></label>
                <input class="hw-f-det-input" type="text" id="hwfd-p-domaine" name="domaine" placeholder="<?= $lang['FORMD_P_DOMAINE_PH'][$hwl]; ?>">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-budget"><?= $lang['FORMD_P_BUDGET_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-p-budget" name="budget">
                  <option value=""><?= $lang['FORMD_SELECT_DASH'][$hwl]; ?></option>
                  <option value="moins-1000"><?= $lang['FORMD_BUDGET_1'][$hwl]; ?></option>
                  <option value="1000-2500"><?= $lang['FORMD_BUDGET_2'][$hwl]; ?></option>
                  <option value="2500-5000"><?= $lang['FORMD_BUDGET_3'][$hwl]; ?></option>
                  <option value="plus-5000"><?= $lang['FORMD_BUDGET_4'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-p4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-p-dispo"><?= $lang['FORMD_P_DISPO_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-p-dispo" name="disponibilite">
                  <option value="urgent"><?= $lang['FORMD_DISPO_URGENT'][$hwl]; ?></option>
                  <option value="mois"><?= $lang['FORMD_DISPO_MOIS'][$hwl]; ?></option>
                  <option value="trimestre"><?= $lang['FORMD_DISPO_TRIMESTRE'][$hwl]; ?></option>
                  <option value="reflexion"><?= $lang['FORMD_DISPO_REFLEXION'][$hwl]; ?></option>
                </select>
              </div>
            </div>

            <!-- ── FREELANCER ──────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-freelancer">
              <div class="hw-f-det-sep-label"><?= $lang['FORMD_SEP_FREELANCE'][$hwl]; ?></div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-metier"><?= $lang['FORMD_F_METIER_LABEL'][$hwl]; ?></label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-metier" name="metier" placeholder="<?= $lang['FORMD_F_METIER_PH'][$hwl]; ?>">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-exp"><?= $lang['FORMD_F_EXP_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-f-exp" name="annees_experience">
                  <option value="moins-2"><?= $lang['FORMD_EXP_1'][$hwl]; ?></option>
                  <option value="2-5"><?= $lang['FORMD_EXP_2'][$hwl]; ?></option>
                  <option value="5-10"><?= $lang['FORMD_EXP_3'][$hwl]; ?></option>
                  <option value="plus-10"><?= $lang['FORMD_EXP_4'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-niveau"><?= $lang['FORMD_F_NIVEAU_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-f-niveau" name="niveau_ia_freelance">
                  <option value="debutant"><?= $lang['FORMD_NIV_SIMPLE_DEBUTANT'][$hwl]; ?></option>
                  <option value="intermediaire"><?= $lang['FORMD_NIV_SIMPLE_INTER'][$hwl]; ?></option>
                  <option value="avance"><?= $lang['FORMD_NIV_SIMPLE_AVANCE'][$hwl]; ?></option>
                  <option value="expert"><?= $lang['FORMD_NIV_SIMPLE_EXPERT'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-f4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-f-objectif"><?= $lang['FORMD_F_OBJECTIF_LABEL'][$hwl]; ?></label>
                <input class="hw-f-det-input" type="text" id="hwfd-f-objectif" name="objectif_business" placeholder="<?= $lang['FORMD_F_OBJECTIF_PH'][$hwl]; ?>">
              </div>
            </div>

            <!-- ── SOCIÉTÉ ─────────────────────────────────────────────── -->
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-grp-societe">
              <div class="hw-f-det-sep-label"><?= $lang['FORMD_SEP_SOCIETE'][$hwl]; ?></div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s1">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-societe"><?= $lang['FORMD_S_NOM_LABEL'][$hwl]; ?> <span>*</span></label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-societe" name="nom_societe" placeholder="Hello World Agency">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s2">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-poste"><?= $lang['FORMD_S_POSTE_LABEL'][$hwl]; ?></label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-poste" name="poste" placeholder="<?= $lang['FORMD_S_POSTE_PH'][$hwl]; ?>">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s3">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-taille"><?= $lang['FORMD_S_TAILLE_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-s-taille" name="taille_societe">
                  <option value=""><?= $lang['FORMD_SELECT_DASH'][$hwl]; ?></option>
                  <option value="1-9"><?= $lang['FORMD_TAILLE_1'][$hwl]; ?></option>
                  <option value="10-49"><?= $lang['FORMD_TAILLE_2'][$hwl]; ?></option>
                  <option value="50-249"><?= $lang['FORMD_TAILLE_3'][$hwl]; ?></option>
                  <option value="250-999"><?= $lang['FORMD_TAILLE_4'][$hwl]; ?></option>
                  <option value="1000+"><?= $lang['FORMD_TAILLE_5'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s4">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-participants"><?= $lang['FORMD_S_PARTICIPANTS_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-s-participants" name="nb_participants">
                  <option value="1-3"><?= $lang['FORMD_PART_1'][$hwl]; ?></option>
                  <option value="4-10"><?= $lang['FORMD_PART_2'][$hwl]; ?></option>
                  <option value="11-25"><?= $lang['FORMD_PART_3'][$hwl]; ?></option>
                  <option value="26+"><?= $lang['FORMD_PART_4'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s5">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-secteur"><?= $lang['FORMD_S_SECTEUR_LABEL'][$hwl]; ?></label>
                <input class="hw-f-det-input" type="text" id="hwfd-s-secteur" name="secteur" placeholder="<?= $lang['FORMD_S_SECTEUR_PH'][$hwl]; ?>">
              </div>
            </div>
            <div class="hw-f-det-conditional" id="hwfd-s6">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-maturite"><?= $lang['FORMD_S_MATURITE_LABEL'][$hwl]; ?></label>
                <select class="hw-f-det-input" id="hwfd-s-maturite" name="maturite_ia">
                  <option value="exploration"><?= $lang['FORMD_MAT_1'][$hwl]; ?></option>
                  <option value="tests"><?= $lang['FORMD_MAT_2'][$hwl]; ?></option>
                  <option value="partiel"><?= $lang['FORMD_MAT_3'][$hwl]; ?></option>
                  <option value="structure"><?= $lang['FORMD_MAT_4'][$hwl]; ?></option>
                  <option value="industrialisation"><?= $lang['FORMD_MAT_5'][$hwl]; ?></option>
                </select>
              </div>
            </div>
            <div class="hw-f-det-conditional hw-f-det-form-full" id="hwfd-s7">
              <div class="hw-f-det-field">
                <label class="hw-f-det-label" for="hwfd-s-contexte"><?= $lang['FORMD_S_CONTEXTE_LABEL'][$hwl]; ?></label>
                <textarea class="hw-f-det-input" id="hwfd-s-contexte" name="contexte" rows="3" placeholder="<?= $lang['FORMD_S_CONTEXTE_PH'][$hwl]; ?>"></textarea>
              </div>
            </div>

            <!-- ── CHAMPS COMMUNS FINAUX ───────────────────────────────── -->
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-besoin"><?= $lang['FORMD_BESOIN_LABEL'][$hwl]; ?></label>
              <select class="hw-f-det-input" id="hwfd-besoin" name="besoin">
                <option value=""><?= $lang['FORMD_SELECT_DASH'][$hwl]; ?></option>
                <option value="competence"><?= $lang['FORMD_BESOIN_1'][$hwl]; ?></option>
                <option value="equipe"><?= $lang['FORMD_BESOIN_2'][$hwl]; ?></option>
                <option value="process"><?= $lang['FORMD_BESOIN_3'][$hwl]; ?></option>
                <option value="strategie"><?= $lang['FORMD_BESOIN_4'][$hwl]; ?></option>
                <option value="sais-pas"><?= $lang['FORMD_BESOIN_5'][$hwl]; ?></option>
              </select>
            </div>
            <div class="hw-f-det-field hw-f-det-form-full">
              <label class="hw-f-det-label" for="hwfd-message"><?= $lang['FORMD_MESSAGE_LABEL'][$hwl]; ?></label>
              <textarea class="hw-f-det-input" id="hwfd-message" name="message" rows="4" placeholder="<?= $lang['FORMD_MESSAGE_PH'][$hwl]; ?>"></textarea>
            </div>

            <div class="hwfd-step-nav">
              <button type="button" class="hwfd-btn-next" id="hwfd-next-btn"><?= $lang['FORMD_BTN_CONTINUER'][$hwl]; ?> <i class="fal fa-arrow-right" style="margin-left:.5rem"></i></button>
            </div>

          </div>

          <!-- ══ ÉTAPE 2 : vos coordonnées ═══════════════════════════════ -->
          <div class="hwfd-step hw-f-det-form-grid" id="hwfd-step-2" style="display:none">

            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-prenom"><?= $lang['FORMD_PRENOM_LABEL'][$hwl]; ?> <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-prenom" name="prenom" placeholder="<?= $lang['FORMD_PRENOM_PH'][$hwl]; ?>" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-nom"><?= $lang['FORMD_NOM_LABEL'][$hwl]; ?> <span>*</span></label>
              <input class="hw-f-det-input" type="text" id="hwfd-nom" name="nom" placeholder="<?= $lang['FORMD_NOM_PH'][$hwl]; ?>" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-email"><?= $lang['FORMD_EMAIL_LABEL'][$hwl]; ?> <span>*</span></label>
              <input class="hw-f-det-input" type="email" id="hwfd-email" name="email" placeholder="vous@entreprise.com" required>
            </div>
            <div class="hw-f-det-field">
              <label class="hw-f-det-label" for="hwfd-tel"><?= $lang['CTF_TELEPHONE'][$hwl]; ?> <span>*</span></label>
              <input class="hw-f-det-input" type="tel" id="hwfd-tel" name="telephone" placeholder="+33 6 00 00 00 00" required>
            </div>

            <div class="hw-f-det-consent">
              <input type="checkbox" id="hwfd-consent" name="consent" required>
              <span><?= $lang['FORMD_CONSENT_PRE'][$hwl]; ?> <a href="<?= $siteURL; ?>politique-de-confidentialite/" style="color:var(--hwfd-gold)"><?= $lang['FORMD_CONSENT_LINK'][$hwl]; ?></a> <?= $lang['FORMD_CONSENT_POST'][$hwl]; ?></span>
            </div>

            <div class="hw-f-det-success-error hw-f-det-form-full" id="hwfd-error"><?= $lang['FORMD_ERROR_MSG'][$hwl]; ?></div>

            <div class="hwfd-step-nav">
              <button type="button" class="hwfd-btn-back" id="hwfd-back-btn"><i class="fal fa-arrow-left" style="margin-right:.5rem"></i> <?= $lang['FORMD_BTN_RETOUR'][$hwl]; ?></button>
              <button type="submit" class="hw-f-det-submit-btn hwfd-btn-next" id="hwfd-submit-btn" style="flex:2">
                <i class="fal fa-paper-plane" style="margin-right:.5rem"></i> <?= $lang['CTF_SUBMIT'][$hwl]; ?>
              </button>
            </div>

          </div>
          </div>
        </form>
      </div>
      <div class="hw-f-det-success" id="hwfd-success">
        <div class="hw-f-det-success-icon"><i class="fal fa-check"></i></div>
        <div class="hw-f-det-success-title"><?= $lang['FORMD_SUCCESS_TITLE'][$hwl]; ?></div>
        <div class="hw-f-det-success-text"><?= $lang['FORMD_SUCCESS_TEXT'][$hwl]; ?></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ AUTRES FORMATIONS ═══════════════════════════════════════════════════ -->
<?php if (!empty($hwfdOthers)): ?>
<section class="hw-f-det-more hw-f-list-catalogue">
  <div class="container">
    <div class="sec-label rv"><?= $lang['FORMD_OTHERS_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['FORMD_OTHERS_TITLE'][$hwl]; ?></h2>
    <div class="hw-f-list-track-hint rv d2"><i class="fal fa-arrows-left-right"></i> <?= $lang['FORMD_OTHERS_HINT'][$hwl]; ?></div>
  </div>

  <div class="hw-f-list-pin" id="hwfdMorePin">
    <div class="hw-f-list-track" id="hwfdMoreTrack">
      <div class="hw-f-list-track-spacer" id="hwfdMoreSpacerStart" aria-hidden="true"></div>
      <?php foreach ($hwfdOthers as $of):
        $ometa = isset($hwfdOtherMeta[$of->getId()]) ? $hwfdOtherMeta[$of->getId()] : ['icon' => 'fa-graduation-cap', 'label' => $lang['FORML_BADGE_DEFAULT'][$hwl], 'color' => '#09A1BE'];
        $oIsGold = $ometa['color'] === '#09A1BE';
        $oDuree = $lang['FORML_CARD_SUR_DEMANDE'][$hwl];
        if ($of->getDateDebut() && $of->getDateFin()) {
            try {
                $od1 = new DateTime($of->getDateDebut());
                $od2 = new DateTime($of->getDateFin());
                $odays = (int)$od1->diff($od2)->days + 1;
                $oDuree = $odays . ' ' . ($odays > 1 ? $lang['FORML_CARD_JOURS'][$hwl] : $lang['FORML_CARD_JOUR'][$hwl]);
            } catch (Exception $e) {}
        }
        $oDateStr = $of->getDateDebut() ? date('d M Y', strtotime($of->getDateDebut())) : '';
      ?>
      <a class="hw-f-list-card-3d" href="<?= $of->getLink(); ?>">
        <?php if ($of->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/formations/<?= htmlspecialchars($of->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($of->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $oIsGold ? 'gold' : 'purple'; ?>"><?= htmlspecialchars($ometa['label'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $oIsGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $oIsGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $oIsGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= htmlspecialchars($ometa['icon'], ENT_QUOTES, 'UTF-8'); ?>" style="color:<?= $ometa['color']; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($of->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth($of->getSousTitre() ?? '', 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-meta">
            <span class="hw-f-list-card-meta-item"><i class="fal fa-clock"></i> <?= htmlspecialchars($oDuree, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php if ($oDateStr): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-calendar"></i> <?= htmlspecialchars($oDateStr, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <?php if ($of->getLieu()): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-location-dot"></i> <?= htmlspecialchars(explode(' —', $of->getLieu())[0], ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <span class="hw-f-list-card-meta-item"><i class="fal fa-users"></i> <?= $lang['FORML_CARD_MAX'][$hwl]; ?> <?= intval($of->getNbParticipants()); ?></span>
          </div>
          <div class="hw-f-list-card-cta"><?= $lang['FORML_CARD_CTA'][$hwl]; ?> <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-card-3d hw-f-list-card-3d-cta">
        <div class="hw-f-list-card-3d-body" style="justify-content:center;text-align:center">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,#680262,#09A1BE);margin:0 auto 1.4rem"><i class="fal fa-comments" style="color:#fff"></i></div>
          <div class="hw-f-list-card-title"><?= $lang['FORM_OTHER_NEEDS_TITLE'][$_SESSION['lang']]; ?></div>
          <div class="hw-f-list-card-sub"><?= $lang['FORM_OTHER_NEEDS_SUB'][$_SESSION['lang']]; ?></div>
          <a href="<?= $pageContact->getLink(); ?>" class="hw-f-list-card-cta" style="justify-content:center"><?= $lang['FORM_OTHER_NEEDS_CTA'][$_SESSION['lang']]; ?> <i class="fal fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="hw-f-list-track-spacer" id="hwfdMoreSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ PARTENAIRES — ils nous font confiance ═══════════════════════════════ -->
<?php if (!empty($partners)): ?>
<section class="trust" id="hwfd-trust-partners">
  <div class="trust-head container">
    <div class="sec-label rv"><?= $lang['FORML_PARTNERS_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['FORML_PARTNERS_TITLE'][$hwl]; ?></h2>
  </div>
  <div class="trust-rows">
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach ($partners as $partner): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if (!empty($partners2)): ?>
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach ($partners2 as $partner): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<!-- ══ DIGITAL EXPERT — vidéos ═══════════════════════════════════════════ -->
<?php if (!empty($videos)): ?>
<section id="expert">
    <div class="container">
        <div class="sec-label rv">Digital Expert</div>
        <h2 class="sec-title rv d1"><em>Digital</em> Expert</h2>

        <div id="owl-videos" class="owl-carousel owl-theme">
            <?php foreach ($videos as $video): ?>
                <div class="item-video">
                    <div class="imgbox">
                        <a href="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                            title="<?php echo $video->getTitre(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
                        <img class="discove-img-video" width="300" height="300"
                            src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                            alt="<?php echo $video->getTitre(); ?>">
                    </div>
                    <div class="textbox">
                        <h3><span><?php echo $video->getTitre(); ?></span></h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> <?php echo $video->getLocalisation(); ?></li>
                            <?php if ($video->getDateShooting() != ''): ?>
                                <li><i class="fa fa-calendar"></i> <?php echo normaldate($video->getDateShooting()); ?></li>
                            <?php endif; ?>
                            <li><i class="fa fa-comment"></i> <?php echo nl2br($video->getExtrait()); ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?= $lang['FORML_CONTACT_EXPERT'][$hwl]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?= $lang['FORML_CONTACT_EXPERT'][$hwl]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-envelope"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══ TECHNOLOGIES & PLATEFORMES ═════════════════════════════════════════ -->
<?php if (!empty($tools)): ?>
<section class="trust" id="hwfd-trust-tools">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1"><?= $lang['FORML_TOOLS_TITLE'][$hwl]; ?></h2>
    <p><?= $lang['FORML_TOOLS_TEXT'][$hwl]; ?></p>
  </div>
  <div class="trust-rows">
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach ($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach ($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-det-cta-final cta-hw-final">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label rv"><?= $lang['FORML_CTA_FINAL_LABEL'][$hwl]; ?></div>
    <h2 class="sec-title rv d1"><?= $lang['FORMD_CTA_TITLE'][$hwl]; ?></h2>
    <p class="cta-sub rv d2"><?= $lang['FORMD_CTA_SUB'][$hwl]; ?></p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="#hwfd-form" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint"><?= $lang['FORMD_BTN_RESERVER_PLACE'][$hwl]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint"><?= $lang['FORMD_BTN_PARLER_EXPERT'][$hwl]; ?></span></div>
        <div class="sb-knob"><i class="fal fa-comment-dots"></i></div>
      </a>
    </div>
  </div>
</section>

<!-- ══ TÉMOIGNAGES ════════════════════════════════════════════════════════ -->
<?php include('includes/testimonials.php'); ?>

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
            .from('#hwfd-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45');
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

    /* programme / livrables li stagger (repli sans wave JS) */
    if (!rm) {
        var lis = gsap.utils.toArray('.hw-f-det-programme-body li, .hw-f-det-livrables-body li');
        gsap.set(lis, { x: -16, autoAlpha: 0 });
        ScrollTrigger.batch(lis, {
            start: 'top 92%',
            onEnter: function (b) { gsap.to(b, { x: 0, autoAlpha: 1, duration: .55, ease: 'expo.out', stagger: .05 }); }
        });
    }

    /* ── COMPTE À REBOURS : expiration à la fin de la formation, anneaux qui
       se vident au fil du temps qui passe ── */
    (function () {
        var wrap = document.getElementById('hwfdCountdown');
        if (!wrap) return;
        var end = new Date(wrap.dataset.end).getTime();
        var $days = document.getElementById('hwfdCdDays');
        var $hours = document.getElementById('hwfdCdHours');
        var $mins = document.getElementById('hwfdCdMins');
        var $secs = document.getElementById('hwfdCdSecs');
        var ringDays = document.getElementById('hwfdCdDaysFill');
        var ringHours = document.getElementById('hwfdCdHoursFill');
        var ringMins = document.getElementById('hwfdCdMinsFill');
        var ringSecs = document.getElementById('hwfdCdSecsFill');
        var R = 44, CIRC = 2 * Math.PI * R;
        [ringDays, ringHours, ringMins, ringSecs].forEach(function (r) {
            if (r) r.style.strokeDasharray = CIRC;
        });
        function setRing(ring, fraction) {
            if (!ring) return;
            var f = Math.max(0, Math.min(1, fraction));
            ring.style.strokeDashoffset = CIRC * (1 - f);
        }
        function pad(n) { return String(n).padStart(2, '0'); }
        function tick() {
            var diff = Math.max(0, end - Date.now());
            var days = Math.floor(diff / 86400000);
            var hours = Math.floor((diff % 86400000) / 3600000);
            var mins = Math.floor((diff % 3600000) / 60000);
            var secs = Math.floor((diff % 60000) / 1000);
            if ($days) $days.textContent = days;
            if ($hours) $hours.textContent = pad(hours);
            if ($mins) $mins.textContent = pad(mins);
            if ($secs) $secs.textContent = pad(secs);
            setRing(ringDays, days / 30);
            setRing(ringHours, hours / 24);
            setRing(ringMins, mins / 60);
            setRing(ringSecs, secs / 60);
            if (diff <= 0) {
                wrap.classList.add('expired');
                clearInterval(timer);
            }
        }
        tick();
        var timer = setInterval(tick, 1000);
    })();

    /* ── POUR QUI : cartes façon info-cards du hero — au survol, un petit
       anneau apparaît autour de l'icône avec un point qui orbite en continu ── */
    (function () {
        var list  = document.getElementById('hwfdAudienceList');
        var cards = list ? list.querySelectorAll('.hwfd-audience-card') : [];
        if (!list || !cards.length) return;

        Array.from(cards).forEach(function (c) {
            var orbit = c.querySelector('.hwfd-audience-orbit');
            var tween;
            if (!orbit) return;
            c.addEventListener('mouseenter', function () {
                if (!rm) {
                    if (!tween) tween = gsap.to(orbit, { rotate: 360, duration: 3.2, repeat: -1, ease: 'none', paused: true });
                    tween.play();
                }
            });
            c.addEventListener('mouseleave', function () {
                if (tween) tween.pause();
            });
        });
    })();

    /* ── LIVRABLES : rangée de cercles à anneau dégradé — entrée en 3D pop +
       connecteurs qui se dessinent, flottement idle discret après l'entrée ── */
    (function () {
        var wrap       = document.getElementById('hwfdLivrWave');
        var items      = wrap ? wrap.querySelectorAll('.hwfd-livr-item') : [];
        var circles    = wrap ? wrap.querySelectorAll('.hwfd-livr-circle-outer') : [];
        var connectors = wrap ? wrap.querySelectorAll('.hwfd-livr-connector') : [];
        var vlines     = wrap ? wrap.querySelectorAll('.hwfd-livr-vline') : [];
        var orbits     = wrap ? wrap.querySelectorAll('.hwfd-livr-orbit') : [];
        if (!wrap || !items.length) return;

        function startIdleFloat() {
            if (rm) return;
            Array.from(items).forEach(function (it, i) {
                gsap.to(it, {
                    y: '+=6', duration: 2.4 + (i % 3) * .3, yoyo: true, repeat: -1,
                    ease: 'sine.inOut', delay: i * .2
                });
            });
            Array.from(orbits).forEach(function (o, i) {
                gsap.to(o, { rotate: 360, duration: 9 + i * 1.4, repeat: -1, ease: 'none' });
            });
        }

        if (!rm) {
            gsap.set(items, { autoAlpha: 0, y: 26 });
            gsap.set(circles, { scale: .3, rotateY: -110, transformPerspective: 800 });
            gsap.set(connectors, { scaleX: 0, transformOrigin: 'left center' });
            ScrollTrigger.create({
                trigger: wrap,
                start: 'top 80%',
                once: true,
                onEnter: function () {
                    gsap.to(items, { autoAlpha: 1, y: 0, duration: .65, stagger: .16, ease: 'expo.out' });
                    gsap.to(circles, { scale: 1, rotateY: 0, duration: .75, stagger: .16, delay: .05, ease: 'back.out(1.8)' });
                    gsap.to(connectors, { scaleX: 1, duration: .55, stagger: .16, delay: .35, ease: 'power2.out' });
                    gsap.to(vlines, { scaleY: 1, duration: .5, stagger: .16, delay: .55, ease: 'power2.out' });
                    gsap.delayedCall(.35 + (items.length * .16) + .8, startIdleFloat);
                }
            });
        } else {
            gsap.set(items, { autoAlpha: 1 });
            gsap.set(vlines, { scaleY: 1 });
        }

        /* tilt 3D léger au survol de chaque cercle, suit la souris */
        if (!rm && window.matchMedia('(hover:hover)').matches) {
            Array.from(items).forEach(function (it, i) {
                var circle = circles[i];
                if (!circle) return;
                it.addEventListener('mousemove', function (e) {
                    var r = circle.getBoundingClientRect();
                    var px = (e.clientX - r.left) / r.width - .5;
                    var py = (e.clientY - r.top) / r.height - .5;
                    gsap.to(circle, { rotateY: px * 20, rotateX: -py * 16, duration: .4, ease: 'power2.out', overwrite: 'auto' });
                });
                it.addEventListener('mouseleave', function () {
                    gsap.to(circle, { rotateY: 0, rotateX: 0, duration: .6, ease: 'elastic.out(1,.6)', overwrite: 'auto' });
                });
            });
        }
    })();

    /* ── AUTRES FORMATIONS : scroll horizontal épinglé + coverflow 3D (comme la page liste) ── */
    (function () {
        var pin   = document.getElementById('hwfdMorePin');
        var track = document.getElementById('hwfdMoreTrack');
        var cards = track ? track.querySelectorAll('.hw-f-list-card-3d') : [];
        var spacerStart = document.getElementById('hwfdMoreSpacerStart');
        var spacerEnd   = document.getElementById('hwfdMoreSpacerEnd');
        if (!pin || !track || !cards.length) return;

        function sizeSpacers() {
            if (!spacerStart || !spacerEnd || window.innerWidth <= 760) return;
            var cardW = cards[0].getBoundingClientRect().width;
            var w = Math.max(0, (pin.clientWidth - cardW) / 2);
            spacerStart.style.width = w + 'px';
            spacerEnd.style.width = w + 'px';
        }
        sizeSpacers();

        function trackDistance() {
            return Math.max(0, track.scrollWidth - pin.clientWidth);
        }

        function tiltCards() {
            var pinRect = pin.getBoundingClientRect();
            var center = pinRect.left + pinRect.width / 2;
            cards.forEach(function (card) {
                var r = card.getBoundingClientRect();
                var cardCenter = r.left + r.width / 2;
                var delta = (cardCenter - center) / (pinRect.width / 2);
                delta = Math.max(-1, Math.min(1, delta));
                if (rm) { card.style.transform = ''; return; }
                var ry = delta * -30;
                var scale = 1 - Math.abs(delta) * 0.14;
                var z = -Math.abs(delta) * 130;
                card.style.transform = 'perspective(1400px) rotateY(' + ry.toFixed(2) + 'deg) translateZ(' + z.toFixed(1) + 'px) scale(' + scale.toFixed(3) + ')';
                card.style.opacity = String(1 - Math.abs(delta) * 0.35);
            });
        }

        if (!rm && window.innerWidth > 760) {
            gsap.to(track, {
                x: function () { return -trackDistance(); },
                ease: 'none',
                scrollTrigger: {
                    trigger: pin,
                    start: 'top top+=70',
                    end: function () { return '+=' + (trackDistance() + window.innerHeight * .6); },
                    scrub: .6,
                    pin: true,
                    invalidateOnRefresh: true,
                    onRefresh: sizeSpacers,
                    onUpdate: tiltCards
                }
            });
            ScrollTrigger.addEventListener('refresh', tiltCards);
            window.addEventListener('load', function () { sizeSpacers(); ScrollTrigger.refresh(); tiltCards(); });
            window.addEventListener('resize', sizeSpacers);
        } else {
            track.style.overflowX = 'auto';
            track.style.scrollSnapType = 'x mandatory';
            cards.forEach(function (c) { c.style.scrollSnapAlign = 'start'; });
        }

        cards.forEach(function (c) {
            c.addEventListener('mousedown', function () { c.style.filter = 'brightness(.97)'; });
            c.addEventListener('mouseup',   function () { c.style.filter = ''; });
            c.addEventListener('mouseleave', function () { c.style.filter = ''; });
        });
    })();

    /* ── PROGRAMME : panneaux diagonaux — tap pour ouvrir sur tactile ── */
    (function () {
        var panels = document.querySelectorAll('.hwfd-diag-panel');
        if (!panels.length) return;
        var isTouch = window.matchMedia('(hover:none)').matches;
        if (!isTouch) return;
        panels.forEach(function (p) {
            p.addEventListener('click', function (e) {
                var already = p.classList.contains('touch-active');
                panels.forEach(function (o) { o.classList.remove('touch-active'); });
                if (!already) {
                    p.classList.add('touch-active');
                    e.preventDefault();
                }
            });
        });
    })();

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

    /* ── FORMULAIRE : wizard 2 étapes avec transition 3D ── */
    (function () {
        var step1  = document.getElementById('hwfd-step-1');
        var step2  = document.getElementById('hwfd-step-2');
        var nextBtn = document.getElementById('hwfd-next-btn');
        var backBtn = document.getElementById('hwfd-back-btn');
        var wiz1   = document.getElementById('hwfd-wizard-step1');
        var wiz2   = document.getElementById('hwfd-wizard-step2');
        var wizLine = document.getElementById('hwfd-wizard-line');
        if (!step1 || !step2) return;

        function validateStep(stepEl) {
            var valid = true;
            var firstInvalid = null;
            stepEl.querySelectorAll('[required]').forEach(function (f) {
                f.classList.remove('hwfd-invalid');
                if (!f.checkValidity()) {
                    valid = false;
                    f.classList.add('hwfd-invalid');
                    if (!firstInvalid) firstInvalid = f;
                }
            });
            if (firstInvalid) firstInvalid.focus();
            return valid;
        }

        function goToStep2() {
            if (!validateStep(step1)) return;
            wiz1.classList.remove('active'); wiz1.classList.add('done');
            wiz2.classList.add('active');
            wizLine.classList.add('done');
            if (rm) {
                step1.style.display = 'none';
                step2.style.display = 'grid';
                return;
            }
            gsap.to(step1, {
                rotateY: -90, autoAlpha: 0, duration: .5, ease: 'power2.in',
                onComplete: function () {
                    step1.style.display = 'none';
                    step2.style.display = 'grid';
                    gsap.fromTo(step2, { rotateY: 90, autoAlpha: 0 }, { rotateY: 0, autoAlpha: 1, duration: .6, ease: 'power2.out' });
                }
            });
        }

        function goToStep1() {
            wiz1.classList.add('active'); wiz1.classList.remove('done');
            wiz2.classList.remove('active');
            wizLine.classList.remove('done');
            if (rm) {
                step2.style.display = 'none';
                step1.style.display = 'grid';
                return;
            }
            gsap.to(step2, {
                rotateY: 90, autoAlpha: 0, duration: .5, ease: 'power2.in',
                onComplete: function () {
                    step2.style.display = 'none';
                    step1.style.display = 'grid';
                    gsap.fromTo(step1, { rotateY: -90, autoAlpha: 0 }, { rotateY: 0, autoAlpha: 1, duration: .6, ease: 'power2.out' });
                }
            });
        }

        if (nextBtn) nextBtn.addEventListener('click', goToStep2);
        if (backBtn) backBtn.addEventListener('click', goToStep1);
    })();

    /* ── FORMULAIRE : submit réel (email + enregistrement + HubSpot) ── */
    var form = document.getElementById('hwfd-qualification-form');
    var btn  = document.getElementById('hwfd-submit-btn');
    var errorBox = document.getElementById('hwfd-error');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var step2 = document.getElementById('hwfd-step-2');
            var invalid = false;
            step2.querySelectorAll('[required]').forEach(function (f) {
                f.classList.remove('hwfd-invalid');
                if (!f.checkValidity()) { f.classList.add('hwfd-invalid'); invalid = true; }
            });
            if (invalid) return;

            var consent = document.getElementById('hwfd-consent');
            if (!consent.checked) {
                consent.closest('.hw-f-det-consent').style.outline = '2px solid #e44';
                return;
            }
            if (errorBox) errorBox.style.display = 'none';
            var originalLabel = btn.innerHTML;
            if (btn) { btn.disabled = true; btn.innerHTML = <?= json_encode($lang['FORMD_SENDING'][$hwl]); ?>; }

            var data = new FormData(form);

            fetch(<?= json_encode($siteURL); ?> + 'components/com_formation/controleurs/formation.php?task=qualification', {
                method: 'POST',
                body: data
            })
            .then(function (r) { return r.text(); })
            .then(function (res) {
                if (res.trim() === '1' || res.trim() === '3') {
                    /* 1 = envoyé avec succès, 3 = enregistré mais mail non parti : on affiche quand même la confirmation */
                    document.getElementById('hwfd-form-content').style.display = 'none';
                    var success = document.getElementById('hwfd-success');
                    success.style.display = 'block';
                    if (!rm) {
                        gsap.fromTo(success, { y: 30, autoAlpha: 0, rotateX: -12, scale: .94 }, { y: 0, autoAlpha: 1, rotateX: 0, scale: 1, duration: .8, ease: 'back.out(1.6)' });
                        gsap.fromTo('.hw-f-det-success-icon', { scale: 0, rotate: -120 }, { scale: 1, rotate: 0, duration: .7, delay: .15, ease: 'elastic.out(1,.55)' });
                    }
                } else {
                    if (btn) { btn.disabled = false; btn.innerHTML = originalLabel; }
                    if (errorBox) errorBox.style.display = 'block';
                }
            })
            .catch(function () {
                if (btn) { btn.disabled = false; btn.innerHTML = originalLabel; }
                if (errorBox) errorBox.style.display = 'block';
            });
        });
    }
})();
</script>
