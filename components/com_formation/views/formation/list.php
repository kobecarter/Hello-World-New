<?php
/* ── meta par slug : icon FA, label, couleur badge ──────────────────── */
$hwflMeta = [
    'formation-strategie-marketing-digital-ia-maroc'  => ['icon' => 'fa-chess',           'label' => 'Stratégie',    'color' => '#09A1BE'],
    'formation-claude-code-developpement-web-maroc'   => ['icon' => 'fa-code',            'label' => 'Tech & Build', 'color' => '#680262'],
    'formation-n8n-automatisation-ia-maroc'            => ['icon' => 'fa-diagram-project', 'label' => 'Ops & Growth', 'color' => '#09A1BE'],
    'formation-podcast-ia-maroc'                        => ['icon' => 'fa-microphone',      'label' => 'Créateurs',    'color' => '#680262'],
];
?>

<!-- ══ HERO ══════════════════════════════════════════════════════════════ -->


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
        <div class="wm-hero-label" id="hwfl-label">Hello World Academy</div>
        <h1 class="sh-h1" id="hwfl-h1">Formations en <em>Marketing Digital</em><br>IA &amp; Médias au Maroc</h1>
        <p class="wm-hero-sub" id="hwfl-sub"><?php echo strip_tags($page->getExtrait()); ?></p>
        <div class="wm-hero-ctas" id="hwfl-ctas">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Réserver un audit de maturité gratuit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Réserver un audit de maturité gratuit</span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="#hwfl-catalogue" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Découvrir nos programmes" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Découvrir nos programmes</span></div>
              <div class="sb-knob"><i class="fal fa-layer-group"></i></div>
            </a>
        </div>
      </div>
         <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL; ?>images/pages/<?php echo $page->getPhoto() ?>" alt="<?php echo $page->getTitre() ?>">
      </div>
    </div>
  </div>
</section>

<!-- ══ POURQUOI HELLO WORLD ══════════════════════════════════════════════ -->
<section class="hw-f-list-why">
  <div class="container">
    <div class="hw-f-list-why-head">
      <div class="sec-label rv">Pourquoi Hello World ?</div>
      <h2 class="sec-title rv d1">Plus qu'un catalogue,<br>un véritable <em>accélérateur de compétences</em></h2>
      <p class="rv d2">Hello World ne propose pas un simple catalogue de formations IA. Nous construisons une académie tournée vers trois grands leviers complémentaires : la croissance digitale, les systèmes intelligents et les médias de marque. Cette approche permet de relier acquisition, automatisation, développement et production de contenus dans une logique de performance réelle.</p>
    </div>
    <div class="hw-f-list-why-path" id="hwflWhyPath">
      <svg class="hw-f-list-why-svg" viewBox="0 0 1000 460" preserveAspectRatio="none" aria-hidden="true">
        <defs>
          <linearGradient id="hwflWhyGrad" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#680262"/>
            <stop offset="100%" stop-color="#09A1BE"/>
          </linearGradient>
        </defs>
        <path class="hw-f-list-why-track" d="M80,285 C180,285 240,85 340,85 C440,85 520,285 620,285 C720,285 780,85 880,85" fill="none" stroke="var(--hwfl-border)" stroke-width="2"/>
        <path id="hwflWhyLine" d="M80,285 C180,285 240,85 340,85 C440,85 520,285 620,285 C720,285 780,85 880,85" fill="none" stroke="url(#hwflWhyGrad)" stroke-width="2.5"/>
      </svg>

      <div class="hw-f-list-why-node" style="left:8%;top:62%" id="hwfl-wc1">
        <div class="hw-f-list-why-node-dot" style="background:linear-gradient(135deg,#680262,#09A1BE)"><i class="fal fa-chart-line-up"></i><em>ROI</em></div>
        <div class="hw-f-list-why-node-card above">
          <div class="hw-f-list-why-node-title">Approche orientée ROI</div>
          <p>Chaque module est calibré pour produire un résultat mesurable dans votre contexte métier réel.</p>
        </div>
      </div>

      <div class="hw-f-list-why-node" style="left:34%;top:18%" id="hwfl-wc2">
        <div class="hw-f-list-why-node-dot" style="background:linear-gradient(135deg,#09A1BE,#0d7a92)"><i class="fal fa-bolt"></i><em>100%</em></div>
        <div class="hw-f-list-why-node-card below">
          <div class="hw-f-list-why-node-title">Programmes intensifs et applicatifs</div>
          <p>Nous apprenons en faisant. Chaque heure de théorie est compensée par une heure de pratique sur votre projet réel.</p>
        </div>
      </div>

      <div class="hw-f-list-why-node" style="left:62%;top:62%" id="hwfl-wc3">
        <div class="hw-f-list-why-node-dot" style="background:linear-gradient(135deg,#8B2568,#680262)"><i class="fal fa-route"></i><em>≤ 15</em></div>
        <div class="hw-f-list-why-node-card above">
          <div class="hw-f-list-why-node-title">Parcours adaptés à votre maturité</div>
          <p>TPE, PME, grande entreprise ou indépendant : le contenu et le rythme s'adaptent à votre niveau et à votre contexte.</p>
        </div>
      </div>

      <div class="hw-f-list-why-node" style="left:88%;top:18%" id="hwfl-wc4">
        <div class="hw-f-list-why-node-dot" style="background:linear-gradient(135deg,#09A1BE,#680262)"><i class="fal fa-box-open"></i><em>J+1</em></div>
        <div class="hw-f-list-why-node-card below">
          <div class="hw-f-list-why-node-title">Livrables concrets en sortie de formation</div>
          <p>Frameworks, automatisations, show bibles, roadmaps : vous repartez avec quelque chose à déployer dès lundi.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ CATALOGUE — scroll horizontal GSAP + coverflow 3D ═══════════════════ -->
<section class="hw-f-list-catalogue" id="hwfl-catalogue">
  <div class="container">
    <div class="sec-label rv">Les premiers programmes du catalogue</div>
    <h2 class="sec-title rv d1">Choisissez le programme<br>aligné avec <em>vos objectifs</em></h2>
    <p class="hw-f-list-intro-text rv d2">Ces 4 premiers programmes lancent un catalogue amené à s'élargir. Ils couvrent aujourd'hui la stratégie digitale, le développement assisté par IA, l'automatisation des opérations et la création de podcasts. D'autres parcours pourront ensuite enrichir l'offre sur des verticales marketing, tech, contenu, data ou média.</p>
    <div class="hw-f-list-track-hint rv d3"><i class="fal fa-arrows-left-right"></i> Faites défiler pour parcourir les 4 programmes</div>
  </div>

  <?php if (!empty($formations)): ?>
  <div class="hw-f-list-pin" id="hwflPin">
    <div class="hw-f-list-track" id="hwflTrack">
      <div class="hw-f-list-track-spacer" id="hwflSpacerStart" aria-hidden="true"></div>
      <?php foreach ($formations as $idx => $f):
        $sl   = $f->getSlug() ?? '';
        $meta = isset($hwflMeta[$sl]) ? $hwflMeta[$sl] : ['icon' => 'fa-graduation-cap', 'label' => 'Formation', 'color' => '#09A1BE'];
        $isGold = $meta['color'] === '#09A1BE';
        $fduree = 'Sur demande';
        if ($f->getDateDebut() && $f->getDateFin()) {
            try {
                $d1 = new DateTime($f->getDateDebut());
                $d2 = new DateTime($f->getDateFin());
                $days = (int)$d1->diff($d2)->days + 1;
                $fduree = $days . ' ' . ($days > 1 ? 'jours' : 'jour');
            } catch (Exception $e) {}
        }
        $dateStr = $f->getDateDebut() ? date('d M Y', strtotime($f->getDateDebut())) : '';
      ?>
      <a class="hw-f-list-card-3d" href="<?= $f->getLink(); ?>">
        <?php if ($f->getPhoto()): ?>
        <div class="hw-f-list-card-3d-photo">
          <img src="<?= $siteURL; ?>images/formations/<?= htmlspecialchars($f->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($f->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>"><?= htmlspecialchars($meta['label'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <?php endif; ?>
        <div class="hw-f-list-card-3d-body">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= htmlspecialchars($meta['icon'], ENT_QUOTES, 'UTF-8'); ?>" style="color:<?= $meta['color']; ?>;font-size:.95rem"></i>
          </div>
          <div class="hw-f-list-card-title"><?= htmlspecialchars($f->getTitre() ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-sub"><?= htmlspecialchars(mb_strimwidth($f->getSousTitre() ?? '', 0, 120, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="hw-f-list-card-meta">
            <span class="hw-f-list-card-meta-item"><i class="fal fa-clock"></i> <?= htmlspecialchars($fduree, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php if ($dateStr): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-calendar"></i> <?= htmlspecialchars($dateStr, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <?php if ($f->getLieu()): ?><span class="hw-f-list-card-meta-item"><i class="fal fa-location-dot"></i> <?= htmlspecialchars(explode(' —', $f->getLieu())[0], ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
            <span class="hw-f-list-card-meta-item"><i class="fal fa-users"></i> Max. <?= intval($f->getNbParticipants()); ?></span>
          </div>
          <div class="hw-f-list-card-cta">Voir le programme <i class="fal fa-arrow-right"></i></div>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="hw-f-list-card-3d hw-f-list-card-3d-cta">
        <div class="hw-f-list-card-3d-body" style="justify-content:center;text-align:center">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,#680262,#09A1BE);margin:0 auto 1.4rem"><i class="fal fa-comments" style="color:#fff"></i></div>
          <div class="hw-f-list-card-title">D'autres besoins ?</div>
          <div class="hw-f-list-card-sub">Parlons de votre contexte, nous vous orientons vers le bon format.</div>
          <div class="hw-f-list-card-cta" style="justify-content:center">Nous contacter <i class="fal fa-arrow-right"></i></div>
        </div>
      </div>
      <div class="hw-f-list-track-spacer" id="hwflSpacerEnd" aria-hidden="true"></div>
    </div>
  </div>
  <?php else: ?>
  <div class="container">
    <div class="hw-f-list-empty rv">
      <p>Les formations arrivent bientôt. <strong>Exécutez le script SQL de seed</strong> (<code>seed_formations_v2.sql</code>) dans phpMyAdmin pour peupler le catalogue.</p>
    </div>
  </div>
  <?php endif; ?>
</section>

<!-- ══ CE QUE VOS ÉQUIPES GAGNENT — flip cards 3D avant / après ═══════════ -->
<section class="hw-f-list-gains">
  <div class="container">
    <div class="sec-label rv">Des formations conçues pour produire</div>
    <h2 class="sec-title rv d1">Un avant / après<br><em>mesurable</em></h2>
    <p class="hw-f-list-intro-text rv d2">Chaque formation Hello World vise un double objectif : montée en compétence rapide et production immédiate d'un actif utile pour votre activité. Survolez — ou touchez sur mobile — chaque carte pour révéler la transformation.</p>

    <div class="hw-f-gains-3d rv d3">

      <div class="hw-f-gain-flip" tabindex="0">
        <div class="hw-f-gain-flip-inner">
          <div class="hw-f-gain-face hw-f-gain-front">
            <span class="hw-f-gain-front-num">01</span>
            <div class="hw-f-gain-front-ico"><i class="fal fa-question-circle"></i></div>
            <div class="hw-f-gain-front-lbl">Avant</div>
            <p>Des intuitions IA, jamais de preuves.</p>
          </div>
          <div class="hw-f-gain-face hw-f-gain-back">
            <img src="<?= $siteURL; ?>images/clarte.jpg" alt="">
            <div class="hw-f-gain-back-scrim"></div>
            <span class="hw-f-gain-hint-badge"><i class="fal fa-arrows-rotate"></i> Voir le point de départ</span>
            <div class="hw-f-gain-back-body">
              <div class="hw-f-list-gain-card-icon"><i class="fal fa-bullseye"></i></div>
              <div class="hw-f-gain-back-title">Clarté <em>stratégique</em></div>
              <p>Vous identifiez où l'IA crée réellement de la valeur dans votre organisation.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-f-gain-flip" tabindex="0">
        <div class="hw-f-gain-flip-inner">
          <div class="hw-f-gain-face hw-f-gain-front">
            <span class="hw-f-gain-front-num">02</span>
            <div class="hw-f-gain-front-ico"><i class="fal fa-hourglass-half"></i></div>
            <div class="hw-f-gain-front-lbl">Avant</div>
            <p>Des heures perdues en tâches répétitives.</p>
          </div>
          <div class="hw-f-gain-face hw-f-gain-back">
            <img src="<?= $siteURL; ?>images/temps.jpg" alt="">
            <div class="hw-f-gain-back-scrim"></div>
            <span class="hw-f-gain-hint-badge"><i class="fal fa-arrows-rotate"></i> Voir le point de départ</span>
            <div class="hw-f-gain-back-body">
              <div class="hw-f-list-gain-card-icon"><i class="fal fa-timer"></i></div>
              <div class="hw-f-gain-back-title">Gain de <em>temps</em></div>
              <p>Vous remplacez des heures de travail répétitif par des systèmes plus intelligents.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-f-gain-flip" tabindex="0">
        <div class="hw-f-gain-flip-inner">
          <div class="hw-f-gain-face hw-f-gain-front">
            <span class="hw-f-gain-front-num">03</span>
            <div class="hw-f-gain-front-ico"><i class="fal fa-link-slash"></i></div>
            <div class="hw-f-gain-front-lbl">Avant</div>
            <p>La dépendance à un prestataire externe.</p>
          </div>
          <div class="hw-f-gain-face hw-f-gain-back">
            <img src="<?= $siteURL; ?>images/monte.jpg" alt="">
            <div class="hw-f-gain-back-scrim"></div>
            <span class="hw-f-gain-hint-badge"><i class="fal fa-arrows-rotate"></i> Voir le point de départ</span>
            <div class="hw-f-gain-back-body">
              <div class="hw-f-list-gain-card-icon"><i class="fal fa-graduation-cap"></i></div>
              <div class="hw-f-gain-back-title">Montée en <em>autonomie</em></div>
              <p>Vos équipes apprennent à utiliser les outils avec méthode, et non à dépendre d'une mode passagère.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-f-gain-flip" tabindex="0">
        <div class="hw-f-gain-flip-inner">
          <div class="hw-f-gain-face hw-f-gain-front">
            <span class="hw-f-gain-front-num">04</span>
            <div class="hw-f-gain-front-ico"><i class="fal fa-file-slash"></i></div>
            <div class="hw-f-gain-front-lbl">Avant</div>
            <p>Des slides qu'on n'ouvre plus après coup.</p>
          </div>
          <div class="hw-f-gain-face hw-f-gain-back">
            <img src="<?= $siteURL; ?>images/livrables.jpg" alt="">
            <div class="hw-f-gain-back-scrim"></div>
            <span class="hw-f-gain-hint-badge"><i class="fal fa-arrows-rotate"></i> Voir le point de départ</span>
            <div class="hw-f-gain-back-body">
              <div class="hw-f-list-gain-card-icon"><i class="fal fa-box-check"></i></div>
              <div class="hw-f-gain-back-title">Livrables <em>activables</em></div>
              <p>Vous repartez avec des frameworks, systèmes, automatisations ou assets directement exploitables.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ MÉTHODE HELLO WORLD ════════════════════════════════════════════════ -->
<section class="hw-f-list-methode">
  <div class="container">
   <div class="hw-f-list-methode-inner">
    <div class="hw-f-list-methode-text">
    <div class="sec-label rv">Notre méthode</div>
    <h2 class="sec-title rv d1">Pragmatique, premium,<br><em>orientée résultat</em></h2>
    <p style="font-size:.88rem;color:var(--hwfl-txt2);max-width:620px;margin:1.2rem 0 0;line-height:1.9;font-weight:300" class="rv d2">Nous ne formons pas à "l'IA en général". Nous partons de votre contexte, de vos objectifs et de vos contraintes métier. Notre pédagogie combine cadre stratégique, démonstrations concrètes, ateliers guidés et production de livrables utiles dès la formation.</p>
    </div>

    <div class="hw-f-list-methode-grid" id="hwflmGrid">

      <div class="hw-f-list-methode-gcard gc-cyan" id="hwflm-c1">
        <span class="hw-f-list-methode-gnum" id="hwflm-l1">D</span>
        <div class="hw-f-list-methode-gicon"><i class="fal fa-search"></i></div>
        <div class="hw-f-list-methode-gtitle">Diagnostic</div>
        <p class="hw-f-list-methode-gtext">Comprendre votre niveau de maturité, vos priorités et vos contraintes réelles avant de choisir un seul outil.</p>
      </div>

      <div class="hw-f-list-methode-gcard gc-purple" id="hwflm-c2">
        <span class="hw-f-list-methode-gnum" id="hwflm-l2">C</span>
        <div class="hw-f-list-methode-gicon"><i class="fal fa-compass"></i></div>
        <div class="hw-f-list-methode-gtitle">Cadrage</div>
        <p class="hw-f-list-methode-gtext">Sélectionner les bons cas d'usage IA selon leur impact business réel et leur faisabilité dans votre contexte.</p>
      </div>

      <div class="hw-f-list-methode-gcard gc-purple" id="hwflm-c3">
        <span class="hw-f-list-methode-gnum" id="hwflm-l3">A</span>
        <div class="hw-f-list-methode-gicon"><i class="fal fa-rocket"></i></div>
        <div class="hw-f-list-methode-gtitle">Activation</div>
        <p class="hw-f-list-methode-gtext">Pratiquer sur des cas réels, avec vos données, vos outils, vos objectifs. L'apprentissage par le faire.</p>
      </div>

      <div class="hw-f-list-methode-gcard gc-cyan" id="hwflm-c4">
        <span class="hw-f-list-methode-gnum" id="hwflm-l4">L</span>
        <div class="hw-f-list-methode-gicon"><i class="fal fa-box-open"></i></div>
        <div class="hw-f-list-methode-gtitle">Livrables</div>
        <p class="hw-f-list-methode-gtext">Repartir avec quelque chose d'utilisable immédiatement : pas de slides oubliées, mais des actifs actionnables.</p>
      </div>

    </div>
   </div>
  </div>
</section>

<!-- ══ FORMATS & MODALITÉS — carousel 3D ═══════════════════════════════════ -->
<section class="hw-f-list-formats">
  <div class="container">
    <div class="sec-label rv">Formats & Modalités</div>
    <h2 class="sec-title rv d1">Une formation<br>adaptée à <em>votre contexte</em></h2>

    <div class="hw-f-carousel" id="hwflCarousel">
      <div class="hw-f-carousel-stage">
        <div class="hw-f-carousel-ring" id="hwflRing" style="--n:5">
          <div class="hw-f-carousel-item" style="--i:0">
            <div class="hw-f-list-format-icon"><i class="fal fa-building"></i></div>
            <div class="hw-f-list-format-title">En présentiel</div>
            <div class="hw-f-list-format-text">Sessions intensives et collaboratives. L'énergie de groupe démultiplie les apprentissages.</div>
          </div>
          <div class="hw-f-carousel-item" style="--i:1">
            <div class="hw-f-list-format-icon"><i class="fal fa-laptop"></i></div>
            <div class="hw-f-list-format-title">À distance</div>
            <div class="hw-f-list-format-text">Former rapidement des équipes réparties, sans contrainte géographique.</div>
          </div>
          <div class="hw-f-carousel-item" style="--i:2">
            <div class="hw-f-list-format-icon"><i class="fal fa-users-gear"></i></div>
            <div class="hw-f-list-format-title">En intra-entreprise</div>
            <div class="hw-f-list-format-text">Sur-mesure, aligné à vos outils, vos process et votre culture interne.</div>
          </div>
          <div class="hw-f-carousel-item" style="--i:3">
            <div class="hw-f-list-format-icon"><i class="fal fa-network-wired"></i></div>
            <div class="hw-f-list-format-title">En inter-entreprises</div>
            <div class="hw-f-list-format-text">L'expertise Hello World accessible aux indépendants et petites structures.</div>
          </div>
          <div class="hw-f-carousel-item" style="--i:4">
            <div class="hw-f-list-format-icon"><i class="fal fa-graduation-cap"></i></div>
            <div class="hw-f-list-format-title">Campus & grandes écoles</div>
            <div class="hw-f-list-format-text">Ateliers, bootcamps et masterclasses pour universités et écoles d'ingénieurs.</div>
          </div>
        </div>
      </div>
      <div class="hw-f-carousel-nav">
        <button type="button" class="hw-f-carousel-btn" id="hwflCarPrev" aria-label="Format précédent"><i class="fal fa-arrow-left"></i></button>
        <div class="hw-f-carousel-dots" id="hwflCarDots"></div>
        <button type="button" class="hw-f-carousel-btn" id="hwflCarNext" aria-label="Format suivant"><i class="fal fa-arrow-right"></i></button>
      </div>
    </div>
  </div>
</section>



<!-- ══ FAQ ════════════════════════════════════════════════════════════════ -->
<section class="hw-f-list-faq">
  <div class="container">
    <div class="sec-label rv">Questions fréquentes</div>
    <h2 class="hw-f-list-faq-display rv d1"><span class="col-purple">Tout ce que vous<br>devez</span> <span class="col-cyan">savoir</span></h2>
    <div class="hw-f-list-faq-grid">

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Ces formations sont-elles adaptées aux débutants ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Certaines formations accueillent des profils débutants ou intermédiaires, à condition que les objectifs soient clairs. Nous adaptons la profondeur selon le public. L'audit de maturité préalable nous permet de valider l'adéquation entre votre profil et le programme choisi.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Proposez-vous des formations sur-mesure pour les entreprises ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Nous adaptons le contenu à votre secteur, vos équipes, vos outils existants et vos enjeux métiers. Les formats intra-entreprise permettent de travailler sur vos données, vos processus et vos cas d'usage réels. Contactez-nous pour un devis personnalisé.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Les participants repartent-ils avec des livrables concrets ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. C'est un point central de notre méthode. Chaque formation inclut des livrables actionnables immédiatement : feuilles de route, workflows n8n prêts à déployer, show bibles, matrices de priorisation. Vous ne repartez pas avec des slides — vous repartez avec des outils.</div></div>
      </div>

      <div class="hw-f-list-faq-item">
        <div class="hw-f-list-faq-q" role="button" aria-expanded="false">
          <span>Peut-on privatiser une session pour une équipe ?</span>
          <span class="hw-f-list-faq-q-btn">+</span>
        </div>
        <div class="hw-f-list-faq-a"><div class="hw-f-list-faq-a-inner">Oui. Nous proposons des formats intra-entreprise en présentiel ou à distance. La session est alors dédiée à votre équipe avec un contenu adapté à vos outils, vos cas d'usage et votre niveau de maturité collective. Les tarifs intra sont disponibles sur devis.</div></div>
      </div>

    </div>
  </div>
</section>

<!-- ══ PARTENAIRES — ils nous font confiance ═══════════════════════════════ -->
<?php if (!empty($partners)): ?>
<section class="trust" id="hwfl-trust-partners">
  <div class="trust-head container">
    <div class="sec-label rv">Partenaires</div>
    <h2 class="sec-title rv d1">Ils nous font <em>confiance</em></h2>
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
                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Contactez un expert" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint">Contactez un expert</span></div>
                  <div class="sb-knob"><i class="fal fa-envelope"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══ TECHNOLOGIES & PLATEFORMES ═════════════════════════════════════════ -->
<?php if (!empty($tools)): ?>
<section class="trust" id="hwfl-trust-tools">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1">Les <em>technologies</em> et <em>plateformes</em><br>au service de vos projets</h2>
    <p>Nous utilisons les meilleurs outils du marché pour garantir la performance, la sécurité et la croissance de votre business.</p>
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
<section class="hw-f-list-cta-final cta-hw-final">
  <video class="hw-f-list-cta-final-video" autoplay muted loop playsinline preload="auto" poster="<?= $siteURL; ?>assets/video/hw-academy-cta-poster.jpg">
    <source src="<?= $siteURL; ?>assets/video/hw-academy-cta-bg.mp4" type="video/mp4">
  </video>
  <div class="hw-f-list-cta-final-scrim"></div>
  <div class="container">
    <div class="sec-label rv">Passez à l'action</div>
    <h2 class="sec-title rv d1">Passez de la curiosité<br>à l'<em>avantage concurrentiel</em></h2>
    <p class="hw-f-list-cta-sub rv d2">Les organisations et talents qui gagnent demain sont ceux qui relient stratégie digitale, automatisation intelligente et contenus de marque. Hello World vous aide à franchir ce cap avec une académie de programmes premium, concrète, évolutive et activable.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Réserver un audit de maturité gratuit</span></div>
        <div class="sb-knob"><i class="fal fa-calendar-check"></i></div>
      </a>
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" role="button">
        <div class="sb-label"><span class="sb-hint">Parler à un expert Hello World</span></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero entrance */
    if (!rm) {
        gsap.timeline({ defaults: { ease: 'expo.out' } })
            .from('#hwfl-label', { y: 12, autoAlpha: 0, duration: .6 })
            .from('#hwfl-h1',    { y: 60, autoAlpha: 0, duration: 1.1, skewY: 1.8 }, '-=.3')
            .from('#hwfl-sub',   { y: 22, autoAlpha: 0, duration: .8 }, '-=.5')
            .from('#hwfl-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45');
    }

    /* scroll reveals */
    var rvEls = gsap.utils.toArray('.rv');
    if (!rm) {
        gsap.set(rvEls, { y: 38, autoAlpha: 0 });
        ScrollTrigger.batch(rvEls, {
            start: 'top 90%',
            onEnter: function (b) {
                gsap.to(b, { y: 0, autoAlpha: 1, duration: .8, ease: 'expo.out', stagger: .07 });
            }
        });
    }

    /* ── CATALOGUE : scroll horizontal épinglé + coverflow 3D ── */
    (function () {
        var pin   = document.getElementById('hwflPin');
        var track = document.getElementById('hwflTrack');
        var cards = track ? track.querySelectorAll('.hw-f-list-card-3d') : [];
        var spacerStart = document.getElementById('hwflSpacerStart');
        var spacerEnd   = document.getElementById('hwflSpacerEnd');
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
                var delta = (cardCenter - center) / (pinRect.width / 2); // -1..1
                delta = Math.max(-1, Math.min(1, delta));
                if (rm) { card.style.transform = ''; return; }
                var ry = delta * -30; // rotateY
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
            /* mobile : simple carrousel scrollable tactile, pas de pin */
            track.style.overflowX = 'auto';
            track.style.scrollSnapType = 'x mandatory';
            cards.forEach(function (c) { c.style.scrollSnapAlign = 'start'; });
        }

        /* press micro-interaction on top of the 3D transform */
        cards.forEach(function (c) {
            c.addEventListener('mousedown', function () { c.style.filter = 'brightness(.97)'; });
            c.addEventListener('mouseup',   function () { c.style.filter = ''; });
            c.addEventListener('mouseleave', function () { c.style.filter = ''; });
        });
    })();

    /* why path — ligne qui se dessine au scroll + noeuds en cascade */
    (function () {
        var pathWrap = document.getElementById('hwflWhyPath');
        var line     = document.getElementById('hwflWhyLine');
        var nodes    = pathWrap ? pathWrap.querySelectorAll('.hw-f-list-why-node') : [];
        if (!pathWrap || !line || !nodes.length) return;

        if (!rm) {
            var len = line.getTotalLength();
            gsap.set(line, { strokeDasharray: len, strokeDashoffset: len });
            gsap.set(nodes, { autoAlpha: 0, scale: .5 });
            Array.from(nodes).forEach(function (n) {
                var card = n.querySelector('.hw-f-list-why-node-card');
                if (card) gsap.set(card, { autoAlpha: 0, y: card.classList.contains('above') ? 16 : -16 });
            });
            ScrollTrigger.create({
                trigger: pathWrap,
                start: 'top 78%',
                once: true,
                onEnter: function () {
                    gsap.to(line, { strokeDashoffset: 0, duration: 1.8, ease: 'power2.inOut' });
                    Array.from(nodes).forEach(function (n, i) {
                        var card = n.querySelector('.hw-f-list-why-node-card');
                        gsap.to(n, { autoAlpha: 1, scale: 1, duration: .6, delay: i * .35, ease: 'back.out(2)' });
                        if (card) gsap.to(card, { autoAlpha: 1, y: 0, duration: .6, delay: i * .35 + .15, ease: 'expo.out' });
                    });
                }
            });
        }
    })();

    /* ── GAINS : flip cards 3D (clic = bascule, en plus du hover desktop) ── */
    document.querySelectorAll('.hw-f-gain-flip').forEach(function (f) {
        f.addEventListener('click', function () { f.classList.toggle('flipped'); });
        f.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); f.classList.toggle('flipped'); }
        });
    });
    if (!rm) {
        var flips = gsap.utils.toArray('.hw-f-gain-flip');
        gsap.set(flips, { y: 46, autoAlpha: 0 });
        ScrollTrigger.batch(flips, {
            start: 'top 88%',
            onEnter: function (b) { gsap.to(b, { y: 0, autoAlpha: 1, duration: .8, ease: 'expo.out', stagger: .12 }); }
        });
    }

    /* ── FORMATS : carrousel 3D en anneau — rotation pilotée par le scroll,
       dans le sens OPPOSÉ au défilement horizontal du catalogue ── */
    (function () {
        var ring  = document.getElementById('hwflRing');
        var items = ring ? ring.querySelectorAll('.hw-f-carousel-item') : [];
        var n     = items.length;
        if (!ring || !n) return;
        var dotsWrap = document.getElementById('hwflCarDots');
        var pinEl    = document.getElementById('hwflCarousel');
        var current  = 0;
        var radius   = 240;
        var turns    = 1; // nombre de tours complets sur toute la durée du pin
        var scrollTrig;

        function layout() {
            radius = ring.parentElement.clientWidth < 640 ? 140 : 240;
            items.forEach(function (it, i) {
                it.style.transform = 'rotateY(' + (i * (360 / n)) + 'deg) translateZ(' + radius + 'px)';
            });
        }
        function setActive(i) {
            current = (i + n) % n;
            if (dotsWrap) {
                dotsWrap.querySelectorAll('button').forEach(function (d, di) {
                    d.classList.toggle('active', di === current);
                });
            }
        }
        if (dotsWrap) {
            for (var i = 0; i < n; i++) {
                var d = document.createElement('button');
                d.type = 'button';
                d.setAttribute('aria-label', 'Format ' + (i + 1));
                if (i === 0) d.classList.add('active');
                (function (idx) { d.addEventListener('click', function () { goToItem(idx); }); })(i);
                dotsWrap.appendChild(d);
            }
        }

        gsap.set(ring, { transformStyle: 'preserve-3d' });
        layout();
        window.addEventListener('resize', layout);

        if (!rm && window.innerWidth > 760) {
            var scrollLen = Math.max(1000, n * 260);
            scrollTrig = ScrollTrigger.create({
                trigger: pinEl,
                start: 'top top+=100',
                end: '+=' + scrollLen,
                pin: true,
                scrub: .7,
                invalidateOnRefresh: true,
                onUpdate: function (self) {
                    /* sens POSITIF = opposé au track du catalogue qui translate en X négatif */
                    gsap.set(ring, { rotationY: self.progress * 360 * turns });
                    setActive(Math.round(self.progress * turns * n));
                }
            });
            function goToItem(i) {
                var target = (i + n) % n;
                var delta  = target - current;
                if (delta > n / 2) delta -= n;
                if (delta < -n / 2) delta += n;
                var y = window.scrollY + delta * (scrollLen / n);
                var prevBehavior = document.documentElement.style.scrollBehavior;
                document.documentElement.style.scrollBehavior = 'auto';
                gsap.to(window, {
                    scrollTo: { y: y, autoKill: true }, duration: .9, ease: 'expo.out',
                    onComplete: function () { document.documentElement.style.scrollBehavior = prevBehavior; }
                });
            }
            document.getElementById('hwflCarPrev').addEventListener('click', function () { goToItem(current - 1); });
            document.getElementById('hwflCarNext').addEventListener('click', function () { goToItem(current + 1); });
        } else {
            /* mobile / reduced-motion : contrôle manuel simple, sans scroll-jack */
            function goTo(i) {
                setActive(i);
                gsap.to(ring, { rotationY: -current * (360 / n), duration: 1.1, ease: 'expo.out' });
            }
            document.getElementById('hwflCarPrev').addEventListener('click', function () { goTo(current - 1); });
            document.getElementById('hwflCarNext').addEventListener('click', function () { goTo(current + 1); });

            /* swipe gauche/droite au doigt, en plus des boutons */
            var stage = pinEl.querySelector('.hw-f-carousel-stage') || pinEl;
            var touchStartX = 0, touchStartY = 0, touching = false;
            stage.addEventListener('touchstart', function (e) {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
                touching = true;
            }, { passive: true });
            stage.addEventListener('touchend', function (e) {
                if (!touching) return;
                touching = false;
                var dx = e.changedTouches[0].clientX - touchStartX;
                var dy = e.changedTouches[0].clientY - touchStartY;
                if (Math.abs(dx) < 40 || Math.abs(dx) < Math.abs(dy)) return; /* ignore taps and vertical scroll */
                goTo(dx < 0 ? current + 1 : current - 1);
            }, { passive: true });
        }
    })();

    /* méthode — grille de cartes glass alignées : entrée + drop des lettres + tilt 3D au survol */
    (function() {
        var grid   = document.getElementById('hwflmGrid');
        var gCards = grid ? grid.querySelectorAll('.hw-f-list-methode-gcard') : [];
        var gNums  = grid ? grid.querySelectorAll('.hw-f-list-methode-gnum') : [];
        if (!grid || !gCards.length) return;

        if (!rm) {
            gsap.set(gCards, { autoAlpha: 0, y: 36, scale: .94 });
            gsap.set(gNums,  { autoAlpha: 0, y: -70, rotate: -18, scale: .6 });
            ScrollTrigger.create({
                trigger: grid,
                start: 'top 80%',
                once: true,
                onEnter: function () {
                    gsap.to(gCards, { autoAlpha: 1, y: 0, scale: 1, duration: .8, stagger: .12, ease: 'expo.out' });
                    /* les lettres "tombent" au top de chaque carte, en rebond, juste après la carte */
                    gsap.to(gNums, { autoAlpha: 1, y: 0, rotate: 0, scale: 1, duration: 1, stagger: .12, delay: .25, ease: 'bounce.out' });
                }
            });
        }

        /* tilt 3D par carte, suit la souris (perspective posée sur la grille) */
        if (!rm && window.matchMedia('(hover:hover)').matches) {
            grid.style.perspective = '1200px';
            Array.from(gCards).forEach(function (c) {
                c.addEventListener('mousemove', function (e) {
                    var r = c.getBoundingClientRect();
                    var px = (e.clientX - r.left) / r.width  - .5;
                    var py = (e.clientY - r.top)  / r.height - .5;
                    gsap.to(c, { rotateY: px * 14, rotateX: -py * 12, duration: .5, ease: 'power2.out', overwrite: 'auto' });
                });
                c.addEventListener('mouseleave', function () {
                    gsap.to(c, { rotateY: 0, rotateX: 0, duration: .7, ease: 'elastic.out(1,.6)', overwrite: 'auto' });
                });
            });
        }
    })();

    /* trust items stagger */
    if (!rm) {
        var ti = gsap.utils.toArray('.hw-f-list-trust-item');
        gsap.set(ti, { x: 20, autoAlpha: 0 });
        gsap.to(ti, { x: 0, autoAlpha: 1, duration: .65, ease: 'expo.out', stagger: .08, delay: .9 });
    }

    /* FAQ accordion */
    document.querySelectorAll('.hw-f-list-faq-q').forEach(function (q) {
        q.addEventListener('click', function () {
            var item   = q.closest('.hw-f-list-faq-item');
            var ans    = item.querySelector('.hw-f-list-faq-a');
            var inner  = item.querySelector('.hw-f-list-faq-a-inner');
            var isOpen = item.classList.contains('open');
            document.querySelectorAll('.hw-f-list-faq-item.open').forEach(function (o) {
                o.classList.remove('open');
                o.querySelector('.hw-f-list-faq-a').style.maxHeight = '0';
                o.querySelector('.hw-f-list-faq-q').setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                item.classList.add('open');
                ans.style.maxHeight = inner.scrollHeight + 'px';
                q.setAttribute('aria-expanded', 'true');
            }
        });
    });

    /* le pin horizontal du catalogue insère un spacer qui décale tout le
       contenu suivant : on recalcule les positions de déclenchement des
       ScrollTrigger une fois que la mise en page finale (images comprises)
       est stable, sinon les sections après le catalogue ne se révèlent jamais. */
    if (!rm) {
        window.addEventListener('load', function () { ScrollTrigger.refresh(); });
        setTimeout(function () { ScrollTrigger.refresh(); }, 400);
    }
})();
</script>
