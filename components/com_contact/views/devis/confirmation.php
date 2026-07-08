<style>
/* ── HERO ──────────────────────────────── */
.ty-hero{position:relative;padding:10rem 0 9rem;background:var(--bg);overflow:hidden;border-bottom:1px solid var(--border)}
.ty-hero-grid{position:absolute;inset:0;z-index:0;overflow:hidden}
.ty-hero-grid svg{width:100%;height:100%;opacity:.045}
.ty-hero .container{position:relative;z-index:2}
.ty-hero-bread{display:flex;align-items:center;gap:.6rem;font-family:var(--fm);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;color:var(--txt2);margin-bottom:2.5rem}
.ty-hero-bread a{color:inherit;text-decoration:none;transition:color .2s}.ty-hero-bread a:hover{color:var(--gold)}
.ty-hero-bread i{font-size:.42rem}
.ty-hero-inner{display:grid;grid-template-columns:1fr 340px;gap:4rem;align-items:center}
.ty-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.ty-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.ty-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3.2rem,7vw,9rem);line-height:.9;letter-spacing:-.04em;color:var(--txt);margin-bottom:2.5rem}
.ty-hero-title em{font-style:normal;color:var(--gold);font-weight:200}
.ty-hero-sub{font-size:.92rem;font-weight:300;color:var(--txt2);max-width:480px;line-height:1.9;margin-bottom:2.5rem}
.ty-hero-ctas{display:flex;gap:1rem;flex-wrap:wrap}
/* Right side — confirmation card */
.ty-confirm-card{background:var(--txt);padding:2.8rem;position:relative;overflow:hidden; border-radius: 20px;}
.ty-confirm-card::before{content:'';position:absolute;top:-40px;right:-40px;width:120px;height:120px;border-radius:50%;background:radial-gradient(circle,rgba(139,106,34,.18) 0%,transparent 70%)}
.ty-confirm-icon{width:52px;height:52px;border:1px solid rgba(201,169,110,.3);display:flex;align-items:center;justify-content:center;color:var(--gold2);font-size:1.2rem;margin-bottom:1.8rem; border-radius: 10px;}
.ty-confirm-title{font-family:var(--fd);font-weight:200;font-size:2.4rem;line-height:1;letter-spacing:-.02em;color:rgba(247,245,242,.85);margin-bottom:.8rem}
.ty-confirm-title em{font-style:italic;color:var(--gold2)}
.ty-confirm-desc{font-family:var(--fm);font-size:.78rem;font-weight:300;color:rgba(247,245,242,.32);line-height:1.85;margin-bottom:2rem}
.ty-confirm-sep{height:1px;background:rgba(247,245,242,.07);margin-bottom:2rem}
.ty-confirm-rows{display:flex;flex-direction:column;gap:.9rem}
.ty-confirm-row{display:flex;align-items:center;gap:.9rem;font-family:var(--fm);font-size:.72rem;font-weight:300;color:rgba(247,245,242,.38)}
.ty-confirm-row i{color:var(--gold2);font-size:.7rem;width:14px;text-align:center;flex-shrink:0}
.ty-countdown-bar{height:2px;background:rgba(247,245,242,.07);margin-top:2rem;position:relative;overflow:hidden}
.ty-countdown-fill{height:100%;background:var(--gold);width:100%;transform-origin:left;animation:drainBar 10s linear forwards}
@keyframes drainBar{from{transform:scaleX(1)}to{transform:scaleX(0)}}
@media(max-width:1024px){.ty-hero-inner{grid-template-columns:1fr}}

/* ── EXPLORE STRIP ─────────────────────── */
.ty-explore{padding:7rem 0;background:var(--bg3);border-bottom:1px solid var(--border)}
.ty-explore-grid{display:grid;grid-template-columns:repeat(4,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden;margin-top:4rem}
.ty-exp-card{padding:2.5rem 2rem;border-right:1px solid var(--border);text-decoration:none;display:block;transition:background .25s;position:relative;overflow:hidden}
.ty-exp-card:last-child{border-right:none}
.ty-exp-card:hover{background:var(--bg2)}
.ty-exp-card::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:var(--gold);transform:scaleY(0);transform-origin:top;transition:transform .35s ease}
.ty-exp-card:hover::before{transform:scaleY(1)}
.ty-exp-icon{font-size:1.2rem;color:var(--gold);opacity:.5;margin-bottom:1.2rem;display:block}
.ty-exp-label{font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);margin-bottom:.5rem}
.ty-exp-title{font-family:var(--fd);font-weight:200;font-size:1.4rem;color:var(--txt);line-height:1.1;letter-spacing:-.01em;margin-bottom:.6rem}
.ty-exp-desc{font-family:var(--fm);font-size:.7rem;font-weight:300;color:var(--txt2);line-height:1.7}
.ty-exp-arrow{position:absolute;bottom:1.5rem;right:1.5rem;color:var(--txt2);font-size:.7rem;opacity:0;transform:translate(-4px,4px);transition:all .25s}
.ty-exp-card:hover .ty-exp-arrow{opacity:1;transform:none;color:var(--gold)}
@media(max-width:767px){.ty-explore-grid{grid-template-columns:repeat(2,1fr)}.ty-exp-card:nth-child(2){border-right:none}.ty-exp-card:nth-child(1),.ty-exp-card:nth-child(2){border-bottom:1px solid var(--border)}}
@media(max-width:480px){.ty-explore-grid{grid-template-columns:1fr}.ty-exp-card{border-right:none!important;border-bottom:1px solid var(--border)}.ty-exp-card:last-child{border-bottom:none}}
</style>

<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ty-hero">
  <div class="ty-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <defs><pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"><path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/></pattern></defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="720" y1="900" x2="1440" y2="200" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(16rem,32vw,46rem);bottom:-3rem;right:-1rem;color:rgba(0,0,0,.025)" aria-hidden="true">OK</span>
  <div class="container">
    <div class="ty-hero-bread rv">
      <a href="<?php echo $siteURL; ?>">Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <a href="<?php echo $pageContact->getLink(); ?>">Contact</a>
      <i class="fa fa-chevron-right"></i>
      <span>Confirmation</span>
    </div>
    <div class="ty-hero-inner">
      <div>
        <div class="ty-hero-label rv">Confirmation</div>
        <h1 class="ty-hero-title rv d1">Message <em>bien reçu</em>, merci.</h1>
        <p class="ty-hero-sub rv d2">Notre équipe a été notifiée et analyse votre demande. Vous recevrez une réponse personnalisée de notre part dans les plus brefs délais.</p>
        <div class="ty-hero-ctas rv d3">
          <a href="<?php echo $siteURL; ?>" class="btn-hw"><span>Retour à l'accueil</span> <i class="fa fa-arrow-right fa-xs"></i></a>
          <a href="<?php echo $pageRealisation->getLink(); ?>" class="btn-hw"><span>Voir nos réalisations</span></a>
        </div>
      </div>
      <div class="rv d2">
        <div class="ty-confirm-card">
          <div class="ty-confirm-icon"><i class="fa fa-check"></i></div>
          <div class="ty-confirm-title">Envoyé <em>avec succès</em></div>
          <p class="ty-confirm-desc">Votre message a été transmis à notre équipe. Nous vous répondons personnellement sous 24h ouvrées.</p>
          <div class="ty-confirm-sep"></div>
          <div class="ty-confirm-rows">
            <div class="ty-confirm-row"><i class="fa fa-clock"></i> Réponse garantie sous 24h</div>
            <div class="ty-confirm-row"><i class="fa fa-user-tie"></i> Hamid Kennou vous contacte directement</div>
            <div class="ty-confirm-row"><i class="fa fa-gift"></i> Audit stratégique gratuit inclus</div>
            <div class="ty-confirm-row"><i class="fa fa-shield-halved"></i> Aucun engagement requis</div>
          </div>
          <div class="ty-countdown-bar"><div class="ty-countdown-fill"></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PENDANT CE TEMPS, EXPLOREZ ══════════════════ -->
<section class="ty-explore">
  <div class="container">
    <div class="sec-label">À découvrir</div>
    <h2 class="sec-title rv">En attendant notre <em>réponse</em></h2>
    <div class="ty-explore-grid rv d1">
      <a href="<?php echo $pageRealisation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-images ty-exp-icon"></i>
        <div class="ty-exp-label">Portfolio</div>
        <div class="ty-exp-title">Nos réalisations</div>
        <div class="ty-exp-desc">120+ projets web, mobile et IA livrés pour des marques ambitieuses.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageBlog->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-newspaper ty-exp-icon"></i>
        <div class="ty-exp-label">Insights</div>
        <div class="ty-exp-title">Notre blog</div>
        <div class="ty-exp-desc">Stratégie digitale, tendances IA et guides pratiques pour votre croissance.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageIA->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-robot ty-exp-icon"></i>
        <div class="ty-exp-label">Solutions IA</div>
        <div class="ty-exp-title">Nos agents IA</div>
        <div class="ty-exp-desc">Automatisez vos ventes, votre support et votre création de contenu avec l'IA.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
      <a href="<?php echo $pageFormation->getLink(); ?>" class="ty-exp-card">
        <i class="fa fa-graduation-cap ty-exp-icon"></i>
        <div class="ty-exp-label">Formations</div>
        <div class="ty-exp-title">Formation IA</div>
        <div class="ty-exp-desc">Formez vos équipes et dirigeants aux outils IA en 2 jours, sur mesure.</div>
        <i class="fa fa-arrow-up-right ty-exp-arrow"></i>
      </a>
    </div>
  </div>
</section>

<!-- ═══ CTA ══════════════════════════════════════════ -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Hello World Agency</div>
    <h2 class="sec-title">À très bientôt<br><em>dans votre boîte mail</em></h2>
    <p class="cta-sub">En attendant, suivez-nous sur LinkedIn et Instagram pour découvrir nos dernières réalisations et tendances IA.</p>
    <div class="cta-btns">
      <a href="<?php echo $siteURL; ?>" class="btn-hw"><span>Retour à l'accueil</span> <i class="fa fa-arrow-right fa-xs"></i></a>
      <a href="<?php echo $pageContact->getLink(); ?>" class="btn-hw btn-ghost"><span>Envoyer un autre message</span></a>
    </div>
  </div>
</section>