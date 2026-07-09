<section class="wm-hero blog-hero">
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
        <div class="wm-hero-label"><?php echo $post->getCategorie()->getTitre() ?></div>
        <h1 class="wm-hero-title rv"><?php echo $post->getTitre() ?></h1>

      </div>
     
    </div>
  </div>
</section>

<!-- ARTICLE LAYOUT -->
<div class="container">
  <div class="id-layout">

    <!-- BODY -->
    <article class="id-body">
		<?=  $post->getTexte() ?>
    </article>

    <!-- SIDEBAR -->
    <aside class="id-sidebar">
      <div class="id-toc-title">Catégories</div>
      <ul class="id-toc-list">
        <li class="id-toc-item" data-target="s1"><a href="<?php echo $presseCat->getLink(); ?>">Presse</a></li>
        <li class="id-toc-item" data-target="s2"><a href="<?php echo $marketingCat->getLink(); ?>">Marketing news</a></li>
        <li class="id-toc-item" data-target="s3"><a href="<?php echo $digitalCat->getLink(); ?>">Digital Expert</a></li>
        
      </ul>
      <div class="id-sidebar-cta">
        <div class="id-sidebar-cta-title">Audit IA<br><em>offert</em></div>
        <p class="id-sidebar-cta-text">Identifiez vos 5 meilleurs cas d'usage IA avec notre équipe. Sans engagement.</p>
        <a href="<?php echo $pageContact->getLink(); ?>" class="id-sidebar-cta-btn">Demander l'audit <i class="fa fa-arrow-right fa-xs"></i></a>
      </div>
    </aside>

  </div>
</div>

<!-- AUTHOR BIO -->
<div style="background:var(--bg);border-top:1px solid var(--border)">
  <div class="container">
    <div class="id-author-bio">
      <div class="id-author-bio-inner rv">
        <div class="id-author-bio-av">HK</div>
        <div>
          <div class="id-author-bio-name">Hamid Kennou</div>
          <div class="id-author-bio-role">Fondateur &amp; Digital Expert</div>
          <p class="id-author-bio-text">Entrepreneur serial, expert en transformation digitale et intelligence artificielle. Hamid a accompagné plus de 200 organisations dans leur adoption de l'IA, de la startup au CAC 40. Intervenant régulier dans des conférences tech et business en Europe, au Moyen-Orient et en Amérique du Nord.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- RELATED ARTICLES -->
<section class="id-related">
  <div class="container">
    <div class="sec-label">À lire aussi</div>
    <h2 class="sec-title rv">Articles<br><em>similaires</em></h2>
    <div class="id-related-grid">
    <?php foreach ($similarblogs as $post) {
					//$tags = explode(";", $blog->getTags());
					$tags = array();
					?>
      <a href="<?= $post->getLink(); ?>" class="id-rel-card rv">
        <div class="id-rel-visual">
          <div class="id-rel-img" style=""><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>" alt="<?= $post->getTitre(); ?>"/></div>
        </div>
        <span class="id-rel-cat"><?php echo $post->getCategorie()->getTitre() ?></span>
        <div class="id-rel-title"><?= strip_tags(substr($post->getTexte(), 0, 120)); ?>...</div>
        <span class="id-rel-cta">Lire l'article <i class="fa fa-arrow-right fa-xs"></i></span>
      </a>
    	<?php
				}
				?>
    </div>
  </div>
</section>