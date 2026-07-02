<style>
/* READING PROGRESS BAR */
.rd-progress{position:fixed;top:0;left:0;height:2px;background:var(--gold);width:0%;z-index:999;transition:width .1s linear;transform-origin:left}

/* ARTICLE HERO */
.id-hero{padding:14rem 0 6rem;background:var(--bg);border-bottom:1px solid var(--border);position:relative;overflow:hidden}
.id-hero-inner{max-width:860px;margin:0 auto}
.id-hero-breadcrumb{display:flex;align-items:center;gap:.7rem;font-family:var(--fm);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;color:var(--txt2);margin-bottom:2.5rem}
.id-hero-breadcrumb a{color:inherit;text-decoration:none;transition:color .2s}
.id-hero-breadcrumb a:hover{color:var(--gold)}
.id-hero-breadcrumb i{font-size:.45rem}
.id-hero-meta{display:flex;align-items:center;gap:1.5rem;margin-bottom:2rem;flex-wrap:wrap}
.id-hero-cat{font-family:var(--fm);font-size:.56rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);padding:.28rem .9rem;border:1px solid rgba(139,106,34,.25)}
.id-hero-date{font-family:var(--fm);font-size:.68rem;color:var(--txt2)}
.id-hero-time{font-family:var(--fm);font-size:.68rem;color:var(--txt2);display:flex;align-items:center;gap:.45rem}
.id-hero-time i{font-size:.6rem}
.id-hero-title{font-family:var(--fd);font-weight:200;font-size:clamp(2.5rem,5.5vw,6rem);line-height:1.02;letter-spacing:-.03em;color:var(--txt);margin-bottom:2rem}
.id-hero-lede{font-family:var(--fm);font-size:1rem;font-weight:300;color:var(--txt2);line-height:1.85;max-width:680px;border-left:2px solid var(--gold);padding-left:1.5rem;margin-bottom:3rem}

/* AUTHOR */
.id-hero-author{display:flex;align-items:center;gap:1.2rem;padding:1.5rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.id-author-av{width:48px;height:48px;border-radius:50%;background:rgba(139,106,34,.12);border:1px solid rgba(139,106,34,.2);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:1.2rem;color:var(--gold);font-weight:200;flex-shrink:0}
.id-author-name{font-family:var(--fm);font-size:.75rem;font-weight:700;color:var(--txt)}
.id-author-role{font-family:var(--fm);font-size:.65rem;color:var(--txt2)}
.id-hero-share{margin-left:auto;display:flex;align-items:center;gap:.8rem}
.id-share-lbl{font-family:var(--fm);font-size:.58rem;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2)}
.id-share-btn{width:34px;height:34px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--txt2);font-size:.85rem;cursor:pointer;transition:all .25s;text-decoration:none}
.id-share-btn:hover{border-color:var(--gold);color:var(--gold)}

/* ARTICLE LAYOUT — content + sticky sidebar */
.id-layout{display:grid;grid-template-columns:1fr 280px;gap:5rem;align-items:start;padding:6rem 0 8rem;background:var(--bg)}
@media(max-width:991px){.id-layout{grid-template-columns:1fr}.id-sidebar{display:none}}

/* BODY CONTENT */
.id-body{}
.id-body h2{font-family:var(--fd);font-weight:200;font-size:clamp(1.8rem,3vw,3.2rem);line-height:1.05;letter-spacing:-.02em;color:var(--txt);margin:3.5rem 0 1.2rem}
.id-body h3{font-family:var(--fm);font-weight:600;font-size:1rem;letter-spacing:.04em;color:var(--txt);margin:2.5rem 0 .8rem}
.id-body p{font-family:var(--fm);font-size:.9rem;font-weight:300;color:var(--txt2);line-height:2;margin-bottom:1.4rem}
.id-body p:first-of-type::first-letter{font-family:var(--fd);font-size:5rem;font-weight:200;line-height:.75;float:left;padding-right:.15em;padding-top:.05em;color:var(--txt)}
.id-body ul{margin:1rem 0 1.5rem 0;list-style:none;display:flex;flex-direction:column;gap:.6rem}
.id-body li{font-family:var(--fm);font-size:.88rem;font-weight:300;color:var(--txt2);display:flex;gap:.7rem;line-height:1.7}
.id-body li::before{content:'';width:5px;height:5px;border-radius:50%;background:var(--gold);margin-top:.55rem;flex-shrink:0}

/* PULL QUOTE */
.id-pullquote{margin:3rem 0;padding:2.5rem 3rem;border-left:3px solid var(--gold);background:var(--bg2)}
.id-pullquote p{font-family:var(--fd);font-size:clamp(1.4rem,2.5vw,2.2rem);font-weight:200;font-style:italic;color:var(--txt);line-height:1.35;letter-spacing:-.02em;margin-bottom:.6rem!important}
.id-pullquote p:first-of-type::first-letter{float:none;font-size:inherit;padding:0;line-height:inherit}
.id-pullquote cite{font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--txt2)}

/* IMAGE IN BODY */
.id-body-img{margin:3rem 0;position:relative;overflow:hidden}
.id-body-img-inner{width:100%;aspect-ratio:16/9;transition:transform .8s cubic-bezier(.16,1,.3,1)}
.id-body-img:hover .id-body-img-inner{transform:scale(1.03)}
.id-body-img-caption{font-family:var(--fm);font-size:.65rem;color:var(--txt2);margin-top:.8rem;letter-spacing:.06em;border-left:2px solid var(--border);padding-left:.7rem}

/* STAT CALLOUT */
.id-stat-strip{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);margin:3rem 0}
.id-stat{padding:2rem 1.8rem;border-right:1px solid var(--border);text-align:center}
.id-stat:last-child{border-right:none}
.id-stat-val{font-family:var(--fd);font-weight:200;font-size:clamp(2rem,4vw,3.5rem);line-height:1;color:var(--txt);letter-spacing:-.04em}
.id-stat-val span{color:var(--gold)}
.id-stat-lbl{font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2);margin-top:.4rem}

/* SIDEBAR */
.id-sidebar{position:sticky;top:120px}
.id-toc-title{font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--txt2);margin-bottom:1.2rem;padding-bottom:.8rem;border-bottom:1px solid var(--border)}
.id-toc-list{list-style:none;display:flex;flex-direction:column;gap:0}
.id-toc-item a{display:block;padding:.55rem 0;font-family:var(--fm);font-size:.72rem;color:var(--txt2);text-decoration:none;border-bottom:1px solid var(--border);transition:color .2s;line-height:1.4}
.id-toc-item:last-child a{border-bottom:none}
.id-toc-item a:hover,.id-toc-item.active a{color:var(--gold)}
.id-toc-item.active a{font-weight:600}

.id-sidebar-cta{margin-top:2.5rem;padding:2rem 1.8rem;background:var(--txt);border-radius:0}
.id-sidebar-cta-title{font-family:var(--fd);font-weight:200;font-size:1.8rem;color:rgba(247,245,242,.85);line-height:1;letter-spacing:-.02em;margin-bottom:.6rem}
.id-sidebar-cta-title em{font-style:italic;color:var(--gold2)}
.id-sidebar-cta-text{font-family:var(--fm);font-size:.72rem;color:rgba(247,245,242,.3);line-height:1.7;margin-bottom:1.5rem}
.id-sidebar-cta-btn{display:flex;align-items:center;justify-content:space-between;padding:.9rem 1.2rem;background:var(--gold);font-family:var(--fm);font-size:.62rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--bg);text-decoration:none;transition:background .25s}
.id-sidebar-cta-btn:hover{background:var(--gold2)}

/* AUTHOR BIO */
.id-author-bio{padding:4rem 0;border-top:1px solid var(--border)}
.id-author-bio-inner{display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:start;max-width:760px}
.id-author-bio-av{width:80px;height:80px;border-radius:50%;background:rgba(139,106,34,.12);border:1px solid rgba(139,106,34,.2);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:2rem;color:var(--gold);font-weight:200;flex-shrink:0}
.id-author-bio-name{font-family:var(--fd);font-weight:200;font-size:2rem;color:var(--txt);letter-spacing:-.02em;line-height:1}
.id-author-bio-role{font-family:var(--fm);font-size:.62rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin:.4rem 0 1rem}
.id-author-bio-text{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);line-height:1.85}
@media(max-width:575px){.id-author-bio-inner{grid-template-columns:1fr}}

/* RELATED ARTICLES */
.id-related{padding:6rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.id-related-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden;margin-top:3rem}
.id-rel-card{border-right:1px solid var(--border);padding:2.5rem;text-decoration:none;color:inherit;display:flex;flex-direction:column;gap:1rem;transition:background .3s}
.id-rel-card:last-child{border-right:none}
.id-rel-card:hover{background:var(--bg)}
.id-rel-visual{aspect-ratio:16/9;overflow:hidden;margin-bottom:.5rem}
.id-rel-img{width:100%;height:100%;transition:transform .7s cubic-bezier(.16,1,.3,1)}
.id-rel-card:hover .id-rel-img{transform:scale(1.08)}
.id-rel-cat{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold)}
.id-rel-title{font-family:var(--fd);font-weight:200;font-size:1.4rem;color:var(--txt);line-height:1.1;letter-spacing:-.01em}
.id-rel-cta{display:flex;align-items:center;gap:.45rem;font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2);margin-top:auto;transition:color .2s}
.id-rel-card:hover .id-rel-cta{color:var(--gold)}
@media(max-width:767px){.id-related-grid{grid-template-columns:1fr;border-radius:0}.id-rel-card{border-right:none;border-bottom:1px solid var(--border)}.id-rel-card:last-child{border-bottom:none}}

/*Custom*/
.wm-hero.blog-hero .wm-hero-inner{
    display: flex !important;
}
</style>
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