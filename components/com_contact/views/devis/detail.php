<style>

/* ─── HERO ─────────────────────────────── */
.ct-hero{position:relative;padding:13rem 0 6rem;background:var(--bg);overflow:hidden;border-bottom:1px solid var(--border)}
.ct-hero-ghost{position:absolute;bottom:-3rem;right:-1rem;font-family:var(--fm);font-weight:900;font-size:clamp(16rem,32vw,48rem);line-height:1;letter-spacing:-.06em;color:rgba(0,0,0,.018);pointer-events:none;user-select:none;white-space:nowrap}
.ct-hero .container{position:relative;z-index:1}
.ct-hero-bread{display:flex;align-items:center;gap:.6rem;font-family:var(--fm);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;color:var(--txt2);margin-bottom:2rem}
.ct-hero-bread a{color:inherit;text-decoration:none;transition:color .2s}
.ct-hero-bread a:hover{color:var(--gold)}
.ct-hero-bread i{font-size:.42rem}
.ct-hero-inner{display:grid;grid-template-columns:1fr auto;align-items:flex-end;gap:4rem}
.ct-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:1.5rem}
.ct-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.ct-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(4rem,9vw,13rem);line-height:.88;letter-spacing:-.04em;color:var(--txt)}
.ct-hero-title em{font-style:normal;color:var(--gold);font-weight:200}
.ct-hero-right{flex-shrink:0;max-width:380px}
.ct-hero-sub{font-family:var(--fm);font-size:.88rem;font-weight:300;color:var(--txt2);line-height:1.9;margin-bottom:2rem}
.ct-hero-badge{display:inline-flex;align-items:center;gap:.6rem;padding:.55rem 1.2rem;border:1px solid rgba(139,106,34,.25);font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold)}
.ct-hero-badge i{font-size:.6rem}
@media(max-width:767px){.ct-hero-inner{grid-template-columns:1fr}.ct-hero-right{max-width:100%}}

/* ─── AUDIT SECTION ────────────────────── */
.ct-audit{background:var(--txt);padding:8rem 0;position:relative;overflow:hidden;border-bottom:1px solid rgba(247,245,242,.06)}
.ct-audit-grid{position:absolute;inset:0;background-image:repeating-linear-gradient(0deg,transparent,transparent 88px,rgba(247,245,242,.015) 88px,rgba(247,245,242,.015) 89px),repeating-linear-gradient(90deg,transparent,transparent 88px,rgba(247,245,242,.015) 88px,rgba(247,245,242,.015) 89px);pointer-events:none}
.ct-audit-inner{display:grid;grid-template-columns:6fr 3fr;gap:6rem;align-items:center;position:relative;z-index:1}
.ct-audit-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:rgba(139,106,34,.55);display:flex;align-items:center;gap:.9rem;margin-bottom:1.5rem}
.ct-audit-label::before{content:'';width:36px;height:1px;background:rgba(139,106,34,.55)}
.ct-audit-title{font-family:var(--fm);font-weight:300;font-size:clamp(2.5rem,5vw,6rem);line-height:.92;letter-spacing:-.04em;color:rgba(247,245,242,.88);margin-bottom:1.5rem}
.ct-audit-title em{display:block;font-style:normal;color:var(--gold2);font-weight:200}
.ct-audit-desc{font-family:var(--fm);font-size:.85rem;font-weight:300;color:rgba(247,245,242,.3);line-height:1.9;margin-bottom:2.5rem}
.ct-audit-list{list-style:none;display:flex;flex-direction:column;gap:.8rem;margin-bottom:3rem}
.ct-audit-item{display:flex;align-items:flex-start;gap:1rem;font-family:var(--fm);font-size:.8rem;font-weight:300;color:rgba(247,245,242,.5);line-height:1.6}
.ct-audit-check{width:22px;height:22px;border:1px solid rgba(139,106,34,.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:.05rem;color:var(--gold2);font-size:.55rem}
.ct-audit-tag{display:inline-flex;align-items:center;gap:.5rem;padding:.4rem 1rem;border:1px solid rgba(139,106,34,.2);font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold2)}
/* RIGHT — stats */
.ct-audit-stats{display:flex;flex-direction:column;gap:0;border:1px solid rgba(247,245,242,.07)}
.ct-audit-stat{padding:1.5rem 3rem;border-bottom:1px solid rgba(247,245,242,.07);position:relative;overflow:hidden;transition:background .3s}
.ct-audit-stat:last-child{border-bottom:none}
.ct-audit-stat:hover{background:rgba(247,245,242,.02)}
.ct-audit-stat::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,var(--gold2),transparent);transform:scaleY(0);transform-origin:top;transition:transform .4s ease}
.ct-audit-stat:hover::before{transform:scaleY(1)}
.ct-stat-val{font-family:var(--fd);font-weight:200;font-size:clamp(3.5rem,6vw,7rem);line-height:1;color:rgba(247,245,242,.85);letter-spacing:-.04em}
.ct-stat-val span{color:var(--gold2);font-size:.55em}
.ct-stat-lbl{font-family:var(--fm);font-size:.65rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:rgba(247,245,242,.25);margin-top:.4rem}
@media(max-width:767px){.ct-audit-inner{grid-template-columns:1fr}.ct-audit-stats{border:none}.ct-audit-stat{padding:2rem 0;border-bottom:1px solid rgba(247,245,242,.07)}}

/* ─── FORM + CEO SPLIT ──────────────────── */
.ct-main{padding:8rem 0;background:var(--bg);border-bottom:1px solid var(--border)}
.ct-main-inner{display:grid;grid-template-columns:1fr 380px;gap:6rem;align-items:start}
@media(max-width:991px){.ct-main-inner{grid-template-columns:1fr}}

/* FORM */
.ct-form-block{}
.ct-form-head{margin-bottom:3.5rem}
.ct-form-head .sec-label{margin-bottom:1rem}
.ct-form-title{font-weight:200;font-size:clamp(2.5rem,5vw,5rem);line-height:1;letter-spacing:-.03em;color:var(--txt)}
.ct-form-title em{font-style:normal;color:var(--gold)}
.ct-form{display:flex;flex-direction:column;gap:2rem}
.ct-row{display:grid;grid-template-columns:1fr 1fr;gap:2rem}
.ct-row-3{display:grid;grid-template-columns:140px 1fr 1fr;gap:2rem}
@media(max-width:575px){.ct-row,.ct-row-3{grid-template-columns:1fr}}
.ct-group{position:relative}
.ct-input,.ct-select,.ct-textarea{width:100%;padding:1.35rem 0 .7rem;border:none;border-bottom:1px solid var(--border);background:transparent;font-family:var(--fm);font-size:.88rem;font-weight:300;color:var(--txt);outline:none;transition:border-color .3s;-webkit-appearance:none;resize:none;display:block}
.ct-select{cursor:pointer}
.ct-select option{background:var(--bg);color:var(--txt)}
.ct-textarea{min-height:130px;padding-top:1.6rem}
.ct-input:focus,.ct-select:focus,.ct-textarea:focus{border-bottom-color:var(--gold)}
.ct-input::placeholder,.ct-textarea::placeholder{color:transparent}
.ct-float-label{position:absolute;top:1.35rem;left:0;font-family:var(--fm);font-size:.78rem;color:var(--txt2);pointer-events:none;transition:all .25s cubic-bezier(.16,1,.3,1)}
.ct-input:not(:placeholder-shown)+.ct-float-label,
.ct-input:focus+.ct-float-label,
.ct-textarea:not(:placeholder-shown)+.ct-float-label,
.ct-textarea:focus+.ct-float-label{top:-.15rem;font-size:.52rem;letter-spacing:.22em;text-transform:uppercase;color:var(--gold)}
.ct-select-label{position:absolute;top:-.15rem;left:0;font-size:.52rem;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);font-family:var(--fm);pointer-events:none}
.ct-line{position:absolute;bottom:0;left:0;width:0;height:1px;background:var(--gold);transition:width .35s cubic-bezier(.16,1,.3,1)}
.ct-input:focus~.ct-line,
.ct-select:focus~.ct-line,
.ct-textarea:focus~.ct-line{width:100%}
.ct-select-arr{position:absolute;right:0;top:1.4rem;color:var(--txt2);font-size:.55rem;pointer-events:none}
.ct-submit-wrap{padding-top:.5rem}
.ct-submit{display:inline-flex;align-items:center;gap:.8rem;padding:1.1rem 2.8rem;background:var(--txt);color:var(--bg);font-family:var(--fm);font-size:.68rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;border:1px solid var(--txt);cursor:pointer;position:relative;overflow:hidden;transition:color .35s;border-radius: 28px;}
.ct-submit::before{content:'';position:absolute;inset:0;background:var(--gold);transform:translateX(-101%);transition:transform .4s cubic-bezier(.16,1,.3,1);z-index:0}
.ct-submit:hover::before{transform:translateX(0)}
.ct-submit:hover{border-color:var(--gold)}
.ct-submit span,.ct-submit i{position:relative;z-index:1}
.ct-submit.sent{background:var(--gold);border-color:var(--gold)}
.ct-privacy{font-family:var(--fm);font-size:.62rem;color:var(--txt2);margin-top:1rem;display:flex;align-items:center;gap:.5rem}
.ct-privacy i{color:var(--gold);font-size:.6rem}

/* ─── CEO SIDEBAR ──────────────────────── */
.ct-ceo{position:sticky;top:120px}
.ct-ceo-photo{position:relative;margin-bottom:2rem;overflow:hidden}
.ct-ceo-photo-inner{aspect-ratio:3/4;position:relative;display:flex;align-items:center;justify-content:center}
.ct-ceo-photo-inner img{width:100%;height:100%;object-fit:cover;border-radius: 20px;}
.ct-ceo-initials{font-family:var(--fd);font-weight:200;font-size:8rem;color:rgba(139,106,34,.25);line-height:1;letter-spacing:-.04em;position: absolute;}
.ct-ceo-photo-ghost{position:absolute;bottom:-0.15em;right:-.05em;font-family:var(--fm);font-weight:900;font-size:8rem;line-height:1;letter-spacing:-.06em;color:rgba(255,255,255,.03);user-select:none}
.ct-ceo-badge{position:absolute;bottom:1.2rem;left:1.2rem;background:var(--gold);padding:.35rem .9rem;font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--bg)}
.ct-ceo-name{font-family:var(--fd);font-weight:200;font-size:2.2rem;color:var(--txt);letter-spacing:-.02em;line-height:1;margin-bottom:.3rem}
.ct-ceo-role{font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);margin-bottom:1.2rem}
.ct-ceo-bio{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.85;margin-bottom:1.8rem}
.ct-ceo-contacts{display:flex;flex-direction:column;gap:.65rem;margin-bottom:1.8rem;padding:1.5rem;background:var(--bg2);border-left:4px solid rgba(139,106,34,.3);border-radius: 20px;}
.ct-ceo-contact{display:flex;align-items:center;gap:.7rem;font-family:var(--fm);font-size:.72rem;color:var(--txt2);text-decoration:none;transition:color .2s}
.ct-ceo-contact i{color:var(--gold);font-size:.7rem;width:14px;text-align:center;flex-shrink:0}
.ct-ceo-contact:hover{color:var(--gold)}
.ct-ceo-socials{display:flex;gap:.6rem}
.ct-ceo-social{width:38px;height:38px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--txt2);font-size:.85rem;text-decoration:none;transition:all .25s;border-radius: 5px;}
.ct-ceo-social:hover{border-color:var(--gold);color:var(--gold)}
.ct-ceo-guarantee{display:flex;align-items:center;gap:.8rem;margin-top:1.5rem;padding:1rem 1.2rem;border:1px solid rgba(139,106,34,.18);background:rgba(139,106,34,.04);border-radius: 20px;}
.ct-ceo-guarantee i{color:var(--gold);font-size:1rem;flex-shrink:0}
.ct-ceo-guarantee-text{font-family:var(--fm);font-size:.7rem;font-weight:300;color:var(--txt2);line-height:1.55}
.ct-ceo-guarantee-text strong{font-weight:700;color:var(--txt);display:block;font-size:.72rem}

/* ─── OFFICES ──────────────────────────── */
.ct-offices{padding:8rem 0;background:var(--bg3);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.ct-offices-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden;margin-top:4rem}
.ct-office-card{padding:3.5rem 3rem;border-right:1px solid var(--border);position:relative;overflow:hidden;transition:background .3s}
.ct-office-card:last-child{border-right:none}
.ct-office-card:hover{background:var(--bg2)}
.ct-office-card::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,var(--gold),var(--gold2),transparent);transform:scaleY(0);transform-origin:top;transition:transform .45s ease}
.ct-office-card:hover::before{transform:scaleY(1)}
.ct-office-city{font-family:var(--fm);font-weight:700;font-size:.65rem;letter-spacing:.24em;text-transform:uppercase;color:var(--gold);margin-bottom:.6rem}
.ct-office-name{font-weight:200;font-size:2.5rem;line-height:.95;letter-spacing:-.02em;color:var(--txt);margin-bottom:1.5rem}
.ct-office-addr{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.85;margin-bottom:1.8rem}
.ct-office-details{display:flex;flex-direction:column;gap:.5rem;padding-top:1.5rem;border-top:1px solid var(--border)}
.ct-office-detail{display:flex;align-items:center;gap:.65rem;font-family:var(--fm);font-size:.7rem;color:var(--txt2);text-decoration:none;transition:color .2s}
.ct-office-detail i{color:var(--gold);font-size:.65rem;width:14px;text-align:center;flex-shrink:0}
.ct-office-detail:hover{color:var(--gold)}
@media(max-width:767px){.ct-offices-grid{grid-template-columns:1fr;border-radius:0}.ct-office-card{border-right:none!important;border-bottom:1px solid var(--border)}.ct-office-card:last-child{border-bottom:none}}

/* ─── SOCIAL STRIP ─────────────────────── */
.ct-social-strip{padding:3rem 0 5rem;background:var(--txt);border-bottom:1px solid rgba(247,245,242,.06)}
.ct-social-inner{display:flex;align-items:center;justify-content:space-between;gap:3rem;flex-wrap:wrap}
.ct-social-left{font-weight:200;font-size:42px;line-height:1;color:rgba(247,245,242,.75);letter-spacing:-.02em}
.ct-social-left em{font-style:italic;color:var(--gold2)}
.ct-social-links{display:flex;gap:1rem}
.ct-social-link{display:flex;align-items:center;gap:.7rem;padding:.8rem 1.6rem;border:1px solid rgba(247,245,242,.1);color:rgba(247,245,242,.4);font-family:var(--fm);font-size:.62rem;font-weight:600;letter-spacing:.16em;text-transform:uppercase;text-decoration:none;transition:all .3s;border-radius: 25px;}
.ct-social-link i{font-size:.9rem}
.ct-social-link:hover{border-color:var(--gold2);color:var(--gold2)}
</style>
<!-- ═══ HERO ════════════════════════════════════════ -->
<section class="ct-hero">
	<canvas id="hero-canvas"></canvas>
  <span class="ct-hero-ghost" aria-hidden="true">CONTACT</span>
  <div class="container">
    <div class="ct-hero-bread rv">
      <a href="<?php echo $siteURL; ?>">Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span>devis</span>
    </div>
    <div class="ct-hero-inner">
      <div>
        <div class="ct-hero-label rv">Hello World Agency</div>
        <h1 class="ct-hero-title rv d1">Demandez <br><em>votre</em> devis</h1>
      </div>
      <!-- <div class="ct-hero-right rv d2">
        <p class="ct-hero-sub">Première prise de contact sans engagement. Notre équipe analyse votre situation et revient vers vous sous 24 heures avec des recommandations concrètes.</p>
        <span class="ct-hero-badge"><i class="fa fa-shield-halved"></i> 100% gratuit · Sans engagement</span>
      </div> -->
    </div>
  </div>
</section>

<!-- ═══ FORMULAIRE + CEO ════════════════════════════ -->
<section class="ct-main" id="formulaire">
  <div class="container">
    <div class="ct-main-inner">

      <!-- FORM -->
      <div class="ct-form-block">
        <div class="ct-form-head rv">
          <div class="sec-label">Demande de devis</div>
          <div class="ct-form-title">Obtenez un <em>devis sur mesure</em></div>
        </div>

        <?php include("components/com_contact/views/devis/form.php"); ?>
      </div>

      <!-- CEO SIDEBAR -->
      <aside class="ct-ceo rv d2">
        <div class="ct-ceo-photo">
          <div class="ct-ceo-photo-inner">
            <span class="ct-ceo-initials">HK</span>
            <span class="ct-ceo-photo-ghost" aria-hidden="true">HW</span>
			<img src="<?php echo $siteURL; ?>images/digital_expert.webp" alt="Hamid Kennou">
          </div>
          <span class="ct-ceo-badge">Votre interlocuteur</span>
        </div>
        <div class="ct-ceo-name">Hamid Kennou</div>
        <div class="ct-ceo-role">CEO &amp; Fondateur</div>
        <p class="ct-ceo-bio"><i class="fa fa-quote-left"></i> Pour moi, le digital est avant tout une aventure humaine que je mène avec <strong>amour depuis 15 ans</strong>. Nous mettons tout notre cœur pour que votre marque ne soit pas seulement <strong>visible</strong>, mais qu’elle brille par son authenticité et devienne <strong>réellement rentable</strong>. Notre mission est de transformer votre présence en un levier de croissance solide <strong>partout au Maroc</strong>. <i class="fa fa-quote-right"></i></p>
        <div class="ct-ceo-contacts">
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-ceo-contact"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
          <a href="tel:+33600000000" class="ct-ceo-contact"><i class="fa fa-phone"></i> <?php echo $config->getTel2(); ?></a>
          <a href="<?php echo $config->getLinkedin(); ?>" target="_blank" rel="noopener" class="ct-ceo-contact"><i class="fab fa-linkedin"></i> Hamid Kennou sur LinkedIn</a>
        </div>
        <div class="ct-ceo-socials">
          <a href="#" class="ct-ceo-social" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="ct-ceo-social" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="ct-ceo-social" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="#" class="ct-ceo-social" aria-label="X"><i class="fab fa-x-twitter"></i></a>
        </div>
        <div class="ct-ceo-guarantee">
          <i class="fa fa-circle-check"></i>
          <div class="ct-ceo-guarantee-text">
            <strong>Réponse garantie sous 24h</strong>
            Chaque demande est analysée et traitée par notre équipe. Aucun bot, que des humains.
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<!-- ═══ NOS BUREAUX ══════════════════════════════════ -->
<section class="ct-offices">
  <div class="container">
    <div class="sec-label">Nos Bureaux</div>
    <h2 class="sec-title rv">Présents sur <em>3 continents</em></h2>
    <div class="ct-offices-grid rv d1">

      <div class="ct-office-card">
        <div class="ct-office-city">Afrique</div>
        <div class="ct-office-name">Marrakech</div>
        <div class="ct-office-addr"><?php echo $config->getAdresse(); ?></div>
        <div class="ct-office-details">
          <a href="tel:<?php echo $config->getTel(); ?>" class="ct-office-detail"><i class="fa fa-phone"></i> <?php echo $config->getTel(); ?></a>
          <a href="mailto:<?php echo $config->getEmail(); ?>" class="ct-office-detail"><i class="fa fa-envelope"></i> <?php echo $config->getEmail(); ?></a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city">Europe</div>
        <div class="ct-office-name">London</div>
        <div class="ct-office-addr">1 Canada Square, Level 30<br>Canary Wharf<br>London E14 5AB, UK</div>
        <div class="ct-office-details">
          <a href="tel:+442079460100" class="ct-office-detail"><i class="fa fa-phone"></i> +44 20 7946 0100</a>
          <a href="mailto:london@helloworld-agency.com" class="ct-office-detail"><i class="fa fa-envelope"></i> london@helloworld-agency.com</a>
        </div>
      </div>

      <div class="ct-office-card">
        <div class="ct-office-city">Moyen-Orient</div>
        <div class="ct-office-name">Dubai</div>
        <div class="ct-office-addr">DIFC, Gate Avenue<br>Level 14, Office 1406<br>Dubai, UAE 117210</div>
        <div class="ct-office-details">
          <a href="tel:+97144550100" class="ct-office-detail"><i class="fa fa-phone"></i> +971 4 455 0100</a>
          <a href="mailto:dubai@helloworld-agency.com" class="ct-office-detail"><i class="fa fa-envelope"></i> contact@helloworldlabel.ae</a>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="testimonials" id="testimonials">
  <div class="container">
    <div class="sec-label rv">Témoignages</div>
    <h2 class="sec-title rv d1"><em>Ce qu'ils disent</em> de nous</h2>
    <div class="testi-carousel rv d2">
      <div class="testi-viewport">
        <div class="testi-track">
          <?php foreach($testimonials as $testimonial): ?>
          <div class="testi-item">
            <div class="testi-card">
              <span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
              <span class="testi-quote">"</span>
              <p class="testi-text"><?php echo $testimonial->getTemoignage(); ?></p>
              <div class="testi-author">
                <?php
                $t = explode(" ",$testimonial->getNom());
                ?>
                <div class="testi-avatar"><?php echo substr($t[0],0,1).substr($t[1],0,1); ?></div>
                <div>
                  <div class="testi-name"><?php echo $testimonial->getNom(); ?></div>
                  <div class="testi-co"><?php echo $testimonial->getFonction(); ?></div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="testi-controls">
        <button class="testi-nav testi-prev" aria-label="Previous"><i class="fa fa-arrow-left"></i></button>
        <div class="testi-dots"></div>
        <button class="testi-nav testi-next" aria-label="Next"><i class="fa fa-arrow-right"></i></button>
      </div>
    </div>
  </div>
</section>



<!-- ═══ SOCIAL STRIP ════════════════════════════════ -->
<section class="ct-social-strip">
  <div class="container">
    <div class="ct-social-inner rv">
      <div class="ct-social-left">Suivez-nous sur</div>
      <div class="ct-social-links">
        <a href="<?php echo $config->getLinkedin(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="<?php echo $config->getInstagram(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="<?php echo $config->getYoutube(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
        <a href="<?php echo $config->getFacebook(); ?>" class="ct-social-link" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
      </div>
    </div>
  </div>
</section>