
<style>

/* FILTER */
.in-filter-wrap{border-bottom:1px solid var(--border);background:var(--bg);position:sticky;top:72px;z-index:100;backdrop-filter:blur(10px)}
.in-filter-inner{display:flex;align-items:center;overflow-x:auto;scrollbar-width:none}
.in-filter-inner::-webkit-scrollbar{display:none}
.in-filter-btn{flex-shrink:0;padding:1.1rem 2rem;font-family:var(--fm);font-size:.63rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2);background:none;border:none;border-bottom:2px solid transparent;cursor:pointer;transition:all .25s;margin-bottom:-1px}
.in-filter-btn:hover{color:var(--txt)}
.in-filter-btn.active{color:var(--gold);border-bottom-color:var(--gold)}

/* FEATURED ARTICLE */
.in-section{padding:6rem 0 8rem;background:var(--bg)}
.in-featured{display:grid;grid-template-columns:55% 45%;border:1px solid var(--border);margin-bottom:1px;position:relative;overflow:hidden;text-decoration:none;color:inherit}
.in-featured:hover .in-feat-img-wrap{transform:scale(1.04)}
.in-feat-visual{
    overflow:hidden;
    aspect-ratio:16/9;
    position:relative
}
.in-feat-img-wrap img{
height: 100%;
width: 100%;
object-fit: cover;
}
.blog-pagination-new{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}
.blog-pagination a{
    border: 1px solid var(--gold);
    padding: 8px 15px;
    color: var(--gold);
}
.blog-pagination .current {
    padding: 8px 15px;
    background: var(--gold);
    color: #fff;
}
@media(max-width:767px){.in-feat-visual{aspect-ratio:auto;min-height:240px}}
.in-feat-img-wrap{width:100%;height:100%;background:linear-gradient(135deg,#081428 0%,#0d2545 55%,#152d56 100%);position:relative;transition:transform .85s cubic-bezier(.16,1,.3,1)}
.in-feat-img-wrap::after{content:'INSIGHTS';position:absolute;bottom:-.15em;right:-.05em;font-family:var(--fm);font-weight:900;font-size:clamp(5rem,12vw,11rem);line-height:1;letter-spacing:-.06em;color:rgba(255,255,255,.04);pointer-events:none;user-select:none}
.in-feat-badge{position:absolute;top:1.5rem;left:1.5rem;font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;padding:.3rem .85rem;background:var(--gold);color:var(--bg)}
.in-feat-body{padding:3.5rem;display:flex;flex-direction:column;justify-content:space-between;border-left:1px solid var(--border)}
.in-feat-meta{display:flex;align-items:center;gap:1.2rem;margin-bottom:2rem}
.in-feat-cat{font-family:var(--fm);font-size:.54rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold)}
.in-feat-date{font-family:var(--fm);font-size:.6rem;color:var(--txt2)}
.in-feat-title{font-family:var(--fd);font-weight:200;font-size:clamp(1.8rem,2.8vw,3.2rem);line-height:1.05;letter-spacing:-.02em;color:var(--txt);margin-bottom:1.5rem;flex:1}
.in-feat-excerpt{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);line-height:1.85;margin-bottom:2.5rem}
.in-feat-footer{display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--border);padding-top:1.5rem}
.in-feat-author{display:flex;align-items:center;gap:.75rem}
.in-feat-av{width:36px;height:36px;border-radius:50%;background:rgba(139,106,34,.15);border:1px solid rgba(139,106,34,.2);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:.9rem;color:var(--gold);font-weight:200}
.in-feat-author-name{font-family:var(--fm);font-size:.68rem;font-weight:600;color:var(--txt)}
.in-feat-author-role{font-family:var(--fm);font-size:.6rem;color:var(--txt2)}
.in-feat-read{font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.5rem;transition:gap .2s}
.in-featured:hover .in-feat-read{gap:.9rem}
@media(max-width:767px){.in-featured{grid-template-columns:1fr}.in-feat-body{border-left:none;border-top:1px solid var(--border)}}

/* ARTICLE GRID */
.in-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-top:none}
@media(max-width:991px){.in-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:575px){.in-grid{grid-template-columns:1fr}}

.in-card{border-right:1px solid var(--border);border-bottom:1px solid var(--border);display:flex;flex-direction:column;text-decoration:none;color:inherit;position:relative;overflow:hidden;transition:background .3s}
.in-card:hover{background:var(--bg2)}
.in-card:nth-child(3n){border-right:none}
/* Responsive overrides */
@media(max-width:991px){.in-card:nth-child(3n){border-right:1px solid var(--border)}.in-card:nth-child(2n){border-right:none}}
@media(max-width:575px){.in-card{border-right:none!important}}

.in-card-visual{position:relative;overflow:hidden;aspect-ratio:16/9}
.in-card-img{width:100%;height:100%;transition:transform .7s cubic-bezier(.16,1,.3,1)}
.in-card:hover .in-card-img{transform:scale(1.07)}
.in-card-img-inner{width:100%;height:100%;position:relative}

/* Each card gets a unique gradient */
.in-card:nth-child(1) .in-card-img-inner{background:linear-gradient(135deg,#1a0808 0%,#2e1010 100%)}
.in-card:nth-child(2) .in-card-img-inner{background:linear-gradient(135deg,#061412 0%,#0d2419 100%)}
.in-card:nth-child(3) .in-card-img-inner{background:linear-gradient(135deg,#06080e 0%,#0e1525 100%)}
.in-card:nth-child(4) .in-card-img-inner{background:linear-gradient(135deg,#100c04 0%,#201508 100%)}
.in-card:nth-child(5) .in-card-img-inner{background:linear-gradient(135deg,#040c0c 0%,#081818 100%)}
.in-card-img-inner::after{content:'';position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.4) 0%,transparent 60%)}

.in-card-body{padding:2.2rem 2.2rem 2.5rem;flex:1;display:flex;flex-direction:column}
.in-card-meta{display:flex;align-items:center;gap:1rem;margin-bottom:1.2rem}
.in-card-cat{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold)}
.in-card-date{font-family:var(--fm);font-size:.6rem;color:var(--txt2)}
.in-card-time{font-family:var(--fm);font-size:.6rem;color:var(--txt2);display:flex;align-items:center;gap:.35rem}
.in-card-time::before{content:'·'}
.in-card-title{font-family:var(--fd);font-weight:200;font-size:clamp(1.3rem,2vw,1.9rem);line-height:1.1;letter-spacing:-.02em;color:var(--txt);flex:1;margin-bottom:1.2rem}
.in-card-excerpt{font-family:var(--fm);font-size:.75rem;font-weight:300;color:var(--txt2);line-height:1.8;margin-bottom:1.5rem}
.in-card-cta{display:inline-flex;align-items:center;gap:.45rem;font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);border-bottom:1px solid transparent;padding-bottom:.2rem;align-self:flex-start;transition:gap .2s,border-color .2s}
.in-card:hover .in-card-cta{gap:.8rem;border-color:rgba(139,106,34,.35)}

/* WIDE CARD — spans 2 columns */
.in-card-wide{grid-column:span 2;flex-direction:row}
.in-card-wide .in-card-visual{aspect-ratio:auto;flex:1;min-height:280px}
.in-card-wide .in-card-body{flex:1;padding:3rem}
@media(max-width:991px){.in-card-wide{grid-column:span 1;flex-direction:column}.in-card-wide .in-card-visual{min-height:200px}}

/* NEWSLETTER BAND */
.in-newsletter{padding:5rem 0;background:var(--bg3);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.in-nl-inner{display:grid;grid-template-columns:1fr auto;align-items:center;gap:3rem}
.in-nl-title{font-family:var(--fd);font-weight:200;font-size:clamp(2rem,3.5vw,4rem);line-height:1;letter-spacing:-.03em;color:var(--txt)}
.in-nl-title em{font-style:italic;color:var(--gold)}
.in-nl-sub{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);margin-top:.8rem}
.in-nl-form{display:flex;gap:0;flex-shrink:0;min-width:380px}
.in-nl-input{flex:1;padding:1rem 1.5rem;border:1px solid var(--border);border-right:none;background:var(--bg);font-family:var(--fm);font-size:.8rem;color:var(--txt);outline:none;transition:border-color .25s}
.in-nl-input:focus{border-color:var(--gold)}
.in-nl-input::placeholder{color:var(--txt2)}
.in-nl-btn{padding:1rem 2rem;background:var(--gold);color:var(--bg);font-family:var(--fm);font-size:.65rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;border:none;cursor:pointer;transition:background .25s;white-space:nowrap;flex-shrink:0}
.in-nl-btn:hover{background:var(--txt)}
@media(max-width:900px){.in-nl-inner{grid-template-columns:1fr}.in-nl-form{min-width:unset;width:100%}}
</style>

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
        <div class="wm-hero-label"><?php echo $categorie->getTitre() ?></div>
        <h1 class="sh-h1 rv on"><?php echo $categorie->getTitre() ?></h1>
        
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