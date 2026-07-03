<?php
/* ── meta par slug : icon FA, label, couleur badge ──────────────────── */
$hwflMeta = [
    'strategie-performance-digitale-ia'  => ['icon' => 'fa-chess',           'label' => 'Stratégie',    'color' => '#09A1BE'],
    'claude-code-site-premium'           => ['icon' => 'fa-code',            'label' => 'Tech & Build', 'color' => '#680262'],
    'n8n-ia-automatisation-processus'    => ['icon' => 'fa-diagram-project', 'label' => 'Ops & Growth', 'color' => '#09A1BE'],
    'podcast-ia-showrunner'              => ['icon' => 'fa-microphone',      'label' => 'Créateurs',    'color' => '#680262'],
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
        <div class="wm-hero-label"><?php echo $page->getTitre() ?></div>
        <h1 class="sh-h1 rv on">Formations <em>d'Excellence</em><br>pour Dirigeants et Équipes Agiles</h1>
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
     
    </div>
  </div>
</section>

<!-- ══ POURQUOI HELLO WORLD ══════════════════════════════════════════════ -->
<section class="hw-f-list-why">
  <div class="container">
    <div class="hw-f-list-why-head">
      <div class="sec-label rv">Pourquoi Hello World ?</div>
      <h2 class="sec-title rv d1">Nous ne vendons<br>pas de <em>promesses</em></h2>
      <p class="rv d2">Nos formations sont conçues pour créer un impact mesurable sur vos ventes, votre productivité, votre marketing et vos opérations.</p>
    </div>
    <div class="hw-f-list-why-cards">

      <div class="hw-f-list-why-card" id="hwfl-wc1">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#680262,#09A1BE)">
          <i class="fal fa-chart-line-up"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>ROI</em></div>
        <div class="hw-f-list-why-card-title">Approche orientée ROI</div>
        <p class="hw-f-list-why-card-text">Chaque module est calibré pour produire un résultat mesurable dans votre contexte métier réel.</p>
        <span class="hw-f-list-why-card-cta">Notre méthode <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc2">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#09A1BE,#0d7a92)">
          <i class="fal fa-bolt"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>100%</em></div>
        <div class="hw-f-list-why-card-title">Programmes intensifs et applicatifs</div>
        <p class="hw-f-list-why-card-text">Nous apprenons en faisant. Chaque heure de théorie est compensée par une heure de pratique sur votre projet réel.</p>
        <span class="hw-f-list-why-card-cta">Voir les formats <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc3">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#8B2568,#680262)">
          <i class="fal fa-route"></i>
        </div>
        <div class="hw-f-list-why-card-num">≤ <em>15</em></div>
        <div class="hw-f-list-why-card-title">Parcours adaptés à votre maturité</div>
        <p class="hw-f-list-why-card-text">TPE, PME, grande entreprise ou indépendant : le contenu et le rythme s'adaptent à votre niveau et à votre contexte.</p>
        <span class="hw-f-list-why-card-cta">Votre profil <i class="fal fa-arrow-right"></i></span>
      </div>

      <div class="hw-f-list-why-card" id="hwfl-wc4">
        <div class="hw-f-list-why-card-icon" style="background:linear-gradient(135deg,#09A1BE,#680262)">
          <i class="fal fa-box-open"></i>
        </div>
        <div class="hw-f-list-why-card-num"><em>J+1</em></div>
        <div class="hw-f-list-why-card-title">Livrables concrets en sortie</div>
        <p class="hw-f-list-why-card-text">Frameworks, automatisations, show bibles, roadmaps : vous repartez avec quelque chose à déployer dès lundi.</p>
        <span class="hw-f-list-why-card-cta">Les livrables <i class="fal fa-arrow-right"></i></span>
      </div>

    </div>
  </div>
</section>

<!-- ══ CATALOGUE ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-catalogue" id="hwfl-catalogue">
  <div class="container">
    <div class="sec-label rv">Nos formations premium IA</div>
    <h2 class="sec-title rv d1">Choisissez le programme<br>aligné avec <em>vos objectifs</em></h2>
    <p class="hw-f-list-intro-text rv d2">Chaque programme a été conçu pour répondre à un enjeu métier clair : structurer une stratégie IA rentable, accélérer le développement d'un produit, automatiser les opérations, ou bâtir un média de marque durable.</p>

    <?php if (!empty($formations)): ?>
    <div class="hw-f-list-grid">
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
      <a class="hw-f-list-card rv d<?= min($idx + 1, 4); ?>" href="<?= $f->getLink(); ?>">
        <div class="hw-f-list-card-top">
          <div class="hw-f-list-card-icon" style="background:linear-gradient(135deg,<?= $isGold ? 'rgba(9,161,190,.1)' : 'rgba(104,2,98,.08)'; ?>,<?= $isGold ? 'rgba(9,161,190,.05)' : 'rgba(104,2,98,.04)'; ?>);border:1px solid <?= $isGold ? 'rgba(9,161,190,.2)' : 'rgba(104,2,98,.18)'; ?>">
            <i class="fal <?= htmlspecialchars($meta['icon'], ENT_QUOTES, 'UTF-8'); ?>" style="color:<?= $meta['color']; ?>;font-size:.95rem"></i>
          </div>
          <span class="hw-f-list-card-badge <?= $isGold ? 'gold' : 'purple'; ?>"><?= htmlspecialchars($meta['label'], ENT_QUOTES, 'UTF-8'); ?></span>
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
      </a>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="hw-f-list-empty rv">
      <p>Les formations arrivent bientôt. <strong>Exécutez le script SQL de seed</strong> (<code>seed_formations_v2.sql</code>) dans phpMyAdmin pour peupler le catalogue.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ══ CE QUE VOS ÉQUIPES GAGNENT ════════════════════════════════════════ -->
<section class="hw-f-list-gains">
  <div class="container">
    <div class="sec-label rv">Des formations conçues pour produire</div>
    <h2 class="sec-title rv d1">Un avant / après<br><em>mesurable</em></h2>
    <div class="hw-f-list-gains-strip rv d2">

      <!-- 01 — Clarté stratégique -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">01.</div>
        <div class="hw-f-list-gain-card-img">
        <img src="<?=$siteURL ?>/images/clarte.jpg" alt="Clarté stratégique">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-bullseye"></i></div>
          <div class="hw-f-list-gain-card-title">Clarté stratégique</div>
          <p class="hw-f-list-gain-card-text">Vous identifiez précisément où l'IA crée réellement de la valeur dans votre organisation, et où elle ne ferait que complexifier.</p>
        </div>
      </div>

      <!-- 02 — Gain de temps -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">02.</div>
        <div class="hw-f-list-gain-card-img">
         <img src="<?=$siteURL ?>/images/temps.jpg" alt="Gain de temps">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-timer"></i></div>
          <div class="hw-f-list-gain-card-title">Gain de temps</div>
          <p class="hw-f-list-gain-card-text">Vous remplacez des heures de travail répétitif par des systèmes plus intelligents, libérant vos équipes pour les tâches à forte valeur ajoutée.</p>
        </div>
      </div>

      <!-- 03 — Montée en autonomie -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">03.</div>
        <div class="hw-f-list-gain-card-img">
     <img src="<?=$siteURL ?>/images/monte.jpg" alt="Montée en autonomie">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-graduation-cap"></i></div>
          <div class="hw-f-list-gain-card-title">Montée en autonomie</div>
          <p class="hw-f-list-gain-card-text">Vos équipes apprennent à utiliser les outils avec méthode, et non à dépendre d'une mode passagère ou d'un prestataire externe.</p>
        </div>
      </div>

      <!-- 04 — Livrables activables -->
      <div class="hw-f-list-gain-card">
        <div class="hw-f-list-gain-card-num">04.</div>
        <div class="hw-f-list-gain-card-img">
     <img src="<?=$siteURL ?>/images/livrables.jpg" alt="Livrables activables">
        </div>
        <div class="hw-f-list-gain-card-body">
          <div class="hw-f-list-gain-card-icon"><i class="fal fa-box-check"></i></div>
          <div class="hw-f-list-gain-card-title">Livrables activables</div>
          <p class="hw-f-list-gain-card-text">Frameworks, systèmes, automatisations ou assets : vous repartez avec des outils directement exploitables dans votre activité.</p>
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

    <div class="hw-f-list-methode-orbit">

      <!-- SVG arcs + rings — coordonnées recalculées par JS -->
      <svg class="hw-f-list-methode-arcs" viewBox="0 0 1000 580" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
          <linearGradient id="hwflm-g1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#09A1BE" stop-opacity=".55"/><stop offset="100%" stop-color="#09A1BE" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g2" x1="100%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#680262" stop-opacity=".55"/><stop offset="100%" stop-color="#680262" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g3" x1="0%" y1="100%" x2="100%" y2="0%"><stop offset="0%" stop-color="#09A1BE" stop-opacity=".55"/><stop offset="100%" stop-color="#09A1BE" stop-opacity=".05"/></linearGradient>
          <linearGradient id="hwflm-g4" x1="100%" y1="100%" x2="0%" y2="0%"><stop offset="0%" stop-color="#680262" stop-opacity=".55"/><stop offset="100%" stop-color="#680262" stop-opacity=".05"/></linearGradient>
        </defs>
        <!-- center rings -->
        <circle class="hwflm-inner-ring" cx="500" cy="290" r="82" fill="none" stroke="rgba(9,161,190,.13)" stroke-width="1.2"/>
        <circle class="hwflm-outer-ring" cx="500" cy="290" r="108" fill="none" stroke="rgba(9,161,190,.06)" stroke-width="1" stroke-dasharray="4 7"/>
        <!-- arc paths (d attr set by JS) -->
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g1)" stroke-width="1.2" stroke-dasharray="5 8"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g2)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:.8s"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g3)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:1.6s"/>
        <path class="hwflm-arc" fill="none" stroke="url(#hwflm-g4)" stroke-width="1.2" stroke-dasharray="5 8" style="animation-delay:2.4s"/>
        <!-- nodes (cx/cy set by JS) -->
        <circle class="hwflm-node" r="4.5" fill="#09A1BE" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#680262" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#09A1BE" fill-opacity=".5"/>
        <circle class="hwflm-node" r="4.5" fill="#680262" fill-opacity=".5"/>
        <!-- node outer rings -->
        <circle class="hwflm-nring" r="9" fill="none" stroke="#09A1BE" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#680262" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#09A1BE" stroke-opacity=".2" stroke-width="1"/>
        <circle class="hwflm-nring" r="9" fill="none" stroke="#680262" stroke-opacity=".2" stroke-width="1"/>
      </svg>

      <!-- Robot centre — remplacez le <div> par <img src="votre-robot.png"> quand prêt -->
      <div class="hw-f-list-methode-robot" id="hwflm-robot">
        <div class="hw-f-list-methode-robot-ph"><i class="fal fa-robot"></i></div>
      </div>

      <!-- card 01 — haut gauche -->
      <div class="hw-f-list-methode-card pos-tl" id="hwflm-c1">
        <span class="hw-f-list-methode-card-num">01</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-search"></i></div>
        <div class="hw-f-list-methode-card-title">Diagnostic</div>
        <p class="hw-f-list-methode-card-text">Comprendre votre niveau de maturité, vos priorités et vos contraintes réelles avant de choisir un seul outil.</p>
      </div>

      <!-- card 02 — haut droite -->
      <div class="hw-f-list-methode-card pos-tr" id="hwflm-c2">
        <span class="hw-f-list-methode-card-num">02</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-compass"></i></div>
        <div class="hw-f-list-methode-card-title">Cadrage</div>
        <p class="hw-f-list-methode-card-text">Sélectionner les bons cas d'usage IA selon leur impact business réel et leur faisabilité dans votre contexte.</p>
      </div>

      <!-- card 03 — bas gauche -->
      <div class="hw-f-list-methode-card pos-bl" id="hwflm-c3">
        <span class="hw-f-list-methode-card-num">03</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-rocket"></i></div>
        <div class="hw-f-list-methode-card-title">Activation</div>
        <p class="hw-f-list-methode-card-text">Pratiquer sur des cas réels, avec vos données, vos outils, vos objectifs. L'apprentissage par le faire.</p>
      </div>

      <!-- card 04 — bas droite -->
      <div class="hw-f-list-methode-card pos-br" id="hwflm-c4">
        <span class="hw-f-list-methode-card-num">04</span>
        <div class="hw-f-list-methode-card-icon"><i class="fal fa-box-open"></i></div>
        <div class="hw-f-list-methode-card-title">Livrables</div>
        <p class="hw-f-list-methode-card-text">Repartir avec quelque chose d'utilisable immédiatement : pas de slides oubliées, mais des actifs actionnables.</p>
      </div>

    </div>
   </div>
  </div>
</section>

<!-- ══ FORMATS & MODALITÉS ════════════════════════════════════════════════ -->
<section class="hw-f-list-formats">
  <div class="container">
    <div class="sec-label rv">Formats & Modalités</div>
    <h2 class="sec-title rv d1">Une formation<br>adaptée à <em>votre contexte</em></h2>
    <div class="hw-f-list-formats-grid">
      <div class="hw-f-list-format-card rv d2">
        <div class="hw-f-list-format-icon"><i class="fal fa-building"></i></div>
        <div class="hw-f-list-format-title">En présentiel</div>
        <div class="hw-f-list-format-text">Pour des sessions intensives, collaboratives et hautement engageantes. L'énergie de groupe démultiplie les apprentissages.</div>
      </div>
      <div class="hw-f-list-format-card rv d3">
        <div class="hw-f-list-format-icon"><i class="fal fa-laptop"></i></div>
        <div class="hw-f-list-format-title">À distance</div>
        <div class="hw-f-list-format-text">Pour former rapidement des équipes réparties ou des profils individuels sans contrainte géographique.</div>
      </div>
      <div class="hw-f-list-format-card rv d4">
        <div class="hw-f-list-format-icon"><i class="fal fa-users-gear"></i></div>
        <div class="hw-f-list-format-title">En intra-entreprise</div>
        <div class="hw-f-list-format-text">Pour des besoins sur-mesure, alignés à vos outils, vos processus internes et la culture de votre organisation.</div>
      </div>
      <div class="hw-f-list-format-card rv d5">
        <div class="hw-f-list-format-icon"><i class="fal fa-network-wired"></i></div>
        <div class="hw-f-list-format-title">En inter-entreprises</div>
        <div class="hw-f-list-format-text">Pour les profils indépendants et les petites structures qui veulent accéder à l'expertise Hello World.</div>
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
<!-- ══ CTA FINAL ══════════════════════════════════════════════════════════ -->
<section class="hw-f-list-cta-final">
  <div class="container">
    <div class="sec-label rv">Passez à l'action</div>
    <h2 class="sec-title rv d1">De la curiosité à<br>l'<em>avantage concurrentiel</em></h2>
    <p class="hw-f-list-cta-sub rv d2">L'IA récompense les organisations qui structurent vite, testent intelligemment et déploient avec méthode. Hello World vous aide à franchir ce cap avec des formations premium, concrètes et activables.</p>
    <div class="cta-btns rv d3" style="justify-content:center">
      <a href="<?= $pageContact->getLink(); ?>" class="sb sb-compact" role="button">
        <div class="sb-label"><span class="sb-hint">Réserver un audit gratuit</span></div>
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
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);
    var rm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* hero entrance */
    if (!rm) {
        gsap.timeline({ defaults: { ease: 'expo.out' } })
            .from('#hwfl-label', { y: 12, autoAlpha: 0, duration: .6 })
            .from('#hwfl-h1',    { y: 60, autoAlpha: 0, duration: 1.1, skewY: 1.8 }, '-=.3')
            .from('#hwfl-sub',   { y: 22, autoAlpha: 0, duration: .8 }, '-=.5')
            .from('#hwfl-ctas',  { y: 16, autoAlpha: 0, duration: .7 }, '-=.45')
            .from('#hwfl-trust', { y: 12, autoAlpha: 0, duration: .6 }, '-=.4');
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

    /* card press — Emil Kowalski elastic */
    document.querySelectorAll('.hw-f-list-card').forEach(function (c) {
        c.addEventListener('mousedown',  function () { gsap.to(c, { scale: .97, duration: .08 }); });
        c.addEventListener('mouseup',    function () { gsap.to(c, { scale: 1, duration: .45, ease: 'elastic.out(1,.55)' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { scale: 1, duration: .25 }); });
    });

    /* why cards — entrée en éventail + Emil Kowalski elastic press */
    if (!rm) {
        var wc = gsap.utils.toArray('.hw-f-list-why-card');
        gsap.set(wc, { y: 40, autoAlpha: 0, scale: .96 });
        ScrollTrigger.batch(wc, {
            start: 'top 88%',
            onEnter: function (b) {
                gsap.to(b, { y: 0, autoAlpha: 1, scale: 1, duration: .75, ease: 'expo.out', stagger: .1 });
            }
        });
    }
    document.querySelectorAll('.hw-f-list-why-card').forEach(function (c) {
        c.addEventListener('mousedown',  function () { gsap.to(c, { scale: .97, duration: .1, ease: 'power2.out' }); });
        c.addEventListener('mouseup',    function () { gsap.to(c, { scale: 1, duration: .5, ease: 'elastic.out(1,.5)' }); });
        c.addEventListener('mouseleave', function () { gsap.to(c, { scale: 1, duration: .3, ease: 'power2.out' }); });
    });

    /* gains expandable cards */
    var gainCards = document.querySelectorAll('.hw-f-list-gain-card');
    if (gainCards.length) {
        function activateGainCard(card) {
            gainCards.forEach(function(c) { c.classList.remove('active'); });
            card.classList.add('active');
        }
        gainCards.forEach(function(c) {
            c.addEventListener('mouseenter', function() { activateGainCard(c); });
            c.addEventListener('mousedown',  function() { gsap.to(c, { scale:.985, duration:.08 }); });
            c.addEventListener('mouseup',    function() { gsap.to(c, { scale:1, duration:.5, ease:'elastic.out(1,.5)' }); });
            c.addEventListener('mouseleave', function() { gsap.to(c, { scale:1, duration:.25 }); });
        });
        gainCards[0].classList.add('active');
    }

    /* methode orbit — SVG arcs dynamiques + GSAP */
    (function() {
        var orbit    = document.querySelector('.hw-f-list-methode-orbit');
        var arcsSvg  = document.querySelector('.hw-f-list-methode-arcs');
        var robot    = document.getElementById('hwflm-robot');
        if (!orbit || !arcsSvg || !robot) return;
        var arcPaths = arcsSvg.querySelectorAll('path.hwflm-arc');
        var arcNodes = arcsSvg.querySelectorAll('circle.hwflm-node');
        var arcNRings= arcsSvg.querySelectorAll('circle.hwflm-nring');
        var iRing    = arcsSvg.querySelector('circle.hwflm-inner-ring');
        var oRing    = arcsSvg.querySelector('circle.hwflm-outer-ring');
        var mCards   = orbit.querySelectorAll('.hw-f-list-methode-card');

        function updateArcs() {
            if (window.innerWidth < 900) return;
            var ow = orbit.offsetWidth, oh = orbit.offsetHeight;
            arcsSvg.setAttribute('viewBox', '0 0 ' + ow + ' ' + oh);
            var oRect = orbit.getBoundingClientRect();
            var rRect = robot.getBoundingClientRect();
            var rx = rRect.left + rRect.width  / 2 - oRect.left;
            var ry = rRect.top  + rRect.height / 2 - oRect.top;
            var r1 = Math.min(ow, oh) * .09, r2 = Math.min(ow, oh) * .12;
            if (iRing) { iRing.setAttribute('cx', rx); iRing.setAttribute('cy', ry); iRing.setAttribute('r', r1); }
            if (oRing) { oRing.setAttribute('cx', rx); oRing.setAttribute('cy', ry); oRing.setAttribute('r', r2); }
            mCards.forEach(function(card, i) {
                var cRect = card.getBoundingClientRect();
                var isRight = card.classList.contains('pos-tr') || card.classList.contains('pos-br');
                var sx = isRight ? (cRect.left  - oRect.left) : (cRect.right - oRect.left);
                var sy = cRect.top + cRect.height / 2 - oRect.top;
                /* cubic bezier : part horizontal du bord de carte, arrive vertical au robot */
                var dx = rx - sx;
                var c1x = sx + dx * 0.4, c1y = sy;
                var c2x = rx - dx * 0.15, c2y = ry - (ry - sy) * 0.28;
                if (arcPaths[i]) arcPaths[i].setAttribute('d', 'M '+sx+' '+sy+' C '+c1x+' '+c1y+' '+c2x+' '+c2y+' '+rx+' '+ry);
                /* node à t=0.32 sur la courbe cubique */
                var t = 0.32, mt = 1-t;
                var nx = mt*mt*mt*sx + 3*mt*mt*t*c1x + 3*mt*t*t*c2x + t*t*t*rx;
                var ny = mt*mt*mt*sy + 3*mt*mt*t*c1y + 3*mt*t*t*c2y + t*t*t*ry;
                if (arcNodes[i])  { arcNodes[i].setAttribute('cx',  nx); arcNodes[i].setAttribute('cy',  ny); }
                if (arcNRings[i]) { arcNRings[i].setAttribute('cx', nx); arcNRings[i].setAttribute('cy', ny); }
            });
        }

        /* initial update + resize */
        updateArcs();
        window.addEventListener('resize', updateArcs);

        /* GSAP entrance */
        if (!rm) {
            var dirs = [{x:-30,y:-25},{x:30,y:-25},{x:-30,y:25},{x:30,y:25}];
            Array.from(mCards).forEach(function(c,i){ gsap.set(c,{autoAlpha:0,x:dirs[i].x,y:dirs[i].y,scale:.88}); });
            gsap.set('#hwflm-robot',{autoAlpha:0,scale:.72});
            ScrollTrigger.create({
                trigger: orbit,
                start: 'top 76%',
                once: true,
                onEnter: function() {
                    Array.from(mCards).forEach(function(c,i){
                        gsap.to(c,{autoAlpha:1,x:0,y:0,scale:1,duration:.85,delay:i*.13,ease:'expo.out'});
                    });
                    gsap.to('#hwflm-robot',{autoAlpha:1,scale:1,duration:1.15,delay:.28,ease:'elastic.out(1,.55)'});
                    setTimeout(updateArcs, 120);
                }
            });
            /* robot float loop — oscillation douce autour du centre */
            gsap.to('#hwflm-robot',{y:-10,duration:2.8,ease:'sine.inOut',repeat:-1,yoyo:true,delay:1.6});
        }
        /* elastic press on cards */
        Array.from(mCards).forEach(function(c) {
            c.addEventListener('mousedown',  function(){ gsap.to(c,{scale:.97,duration:.08}); });
            c.addEventListener('mouseup',    function(){ gsap.to(c,{scale:1,duration:.5,ease:'elastic.out(1,.5)'}); });
            c.addEventListener('mouseleave', function(){ gsap.to(c,{scale:1,duration:.25}); });
        });
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
})();
</script>
