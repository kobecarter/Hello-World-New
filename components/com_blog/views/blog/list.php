

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
        <h1 class="sh-h1 rv on"><?php echo $page->getTitre() ?></h1>
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
      <div class="wm-hero-side rv d3">
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

<!-- CONTENT -->
<section class="in-section">
    <?php
    $featuredPost = !empty($posts) ? $posts[0] : null;
    ?>

    <div class="container">

        <!-- FEATURED -->
        <?php if ($featuredPost): ?>
        <a href="<?= $featuredPost->getLink(); ?>" class="in-featured rv">
            <div class="in-feat-visual">
                <div class="in-feat-img-wrap"><img src="<?= $siteURL; ?>images/blog/<?= $featuredPost->getPhoto(); ?>"  class="lazy" alt="<?= $featuredPost->getTitre(); ?>"/></div>
                <span class="in-feat-badge">À la une</span>
            </div>

            <div class="in-feat-body">
                <div>
                    <div class="in-feat-meta">
                        <span class="in-feat-cat">Article</span>
                        <span class="in-feat-date">
                            <?= normaldate2($featuredPost->getDateAdd()); ?>
                        </span>
                    </div>

                    <h2 class="in-feat-title">
                        <?= $featuredPost->getTitre(); ?>
                    </h2>

                    <p class="in-feat-excerpt">
                     <?= strip_tags(substr($featuredPost->getTexte(), 0, 120)); ?>...
                    </p>
                </div>

                <div class="in-feat-footer">
                    <div class="in-feat-author">
                        <div class="in-feat-av">HK</div>
                        <div>
                            <div class="in-feat-author-name">Hamid Kennou</div>
                            <div class="in-feat-author-role">Fondateur · 12 min de lecture</div>
                        </div>
                    </div>

                    <span class="in-feat-read">
                        Lire l'article <i class="fa fa-arrow-right fa-xs"></i>
                    </span>
                </div>
            </div>
        </a>
        <?php endif; ?>

        <!-- GRID -->
        <div class="in-grid">

            <?php foreach (array_slice($posts, 1) as $post): ?>

            <a href="<?= $post->getLink(); ?>" class="in-card rv" data-cat="casestudy">
                <div class="in-card-visual">
                    <div class="in-card-img">
                        <div class="in-card-img-inner"><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>"  class="lazy" alt="<?= $post->getTitre(); ?>"/></div>
                    </div>
                </div>

                <div class="in-card-body">
                    <div class="in-card-meta">
                        <span class="in-card-cat">Étude de cas</span>
                        <span class="in-card-date">
                            <?= normaldate2($post->getDateAdd()); ?>
                        </span>
                        <span class="in-card-time">8 min</span>
                    </div>

                    <h3 class="in-card-title">
                        <?= $post->getTitre(); ?>
                    </h3>

                    <p class="in-card-excerpt">
                       <?= strip_tags(substr($post->getTexte(), 0, 120)); ?>...
                    </p>

                    <span class="in-card-cta">
                        Lire <i class="fa fa-arrow-right fa-xs"></i>
                    </span>
                </div>
            </a>

            <?php endforeach; ?>

        </div>
        <?php if(sizeof($posts) <= 0) :?>
			    <div class="col-12">
			         <p class="text-center">Il n'y a aucun résultat</p>
			    </div>
			<?php endif;?>
			<div class="clearfix"></div>

                <div class="pagination blog-pagination blog-pagination-new">
                    <?php
                    for ($i = 1; $i <= ceil(count($blogAll) / $itemPerPage); $i++) {
                        $current = ($i == $currentPage) ? 'current' : '';
                    ?>
                        <a href="<?php echo $page->getLink() . $i . '/'; ?>"
                            class="<?php echo $current; ?>"><?php echo $i; ?></a>
                    <?php
                    }
                    ?>
         
    </div>

  <!-- NEWSLETTER -->
  <div class="in-newsletter" style="margin-top:5rem">
    <div class="container">
      <div class="in-nl-inner">
        <div class="rv">
          <div class="in-nl-title">Chaque semaine, une <em>analyse</em><br>qui change votre façon de voir</div>
          <p class="in-nl-sub">Insights exclusifs · Pas de spam · Désabonnement en un clic</p>
        </div>
        <div class="rv d1">
          <div class="in-nl-form">
            <input class="in-nl-input" type="email" placeholder="votre@email.com">
            <button class="in-nl-btn">S'abonner <i class="fa fa-arrow-right fa-xs"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>