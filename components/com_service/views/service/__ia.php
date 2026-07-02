<style>
/* INTRO CONTEXTUELLE */
.intro-ctx{padding:8rem 0;background:var(--bg);border-bottom:1px solid var(--border);background: var(--bg3);}
.intro-ctx-inner{display:grid;grid-template-columns:400px 1fr;gap:7rem;align-items:start}
.intro-ctx-sticky{position:sticky;top:110px}
.ics{padding:1.6rem 2rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:1.2rem}
.ics:last-child{border-bottom:none}
.ics-val{font-family:var(--fd);font-weight:200;font-size:2.6rem;line-height:1;color:var(--txt);letter-spacing:-.04em;flex-shrink:0}
.ics-val span{color:var(--gold);font-size:.55em}
.ics-lbl{font-family:var(--fm);font-size:.7rem;font-weight:300;color:var(--txt2);line-height:1.55}
.intro-ctx-body p{font-family:var(--fm);font-size:.9rem;font-weight:300;color:var(--txt2);line-height:1.95;margin-bottom:1.6rem}
.intro-ctx-body p strong{color:var(--txt);font-weight:600}
@media(max-width:991px){.intro-ctx-inner{grid-template-columns:1fr;gap:3rem}.intro-ctx-sticky{position:static}}

/* SECTEURS */
.secteurs{padding:8rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.sect-grid{display:grid;grid-template-columns:repeat(3,1fr);margin-top:4rem;border:1px solid var(--border);border-radius:22px;overflow:hidden}
.sect-card{padding:2.6rem 2.2rem;border-right:1px solid var(--border);border-bottom:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s;display:flex;flex-direction:column}
.sect-card:nth-child(3n){border-right:none}
.sect-card:nth-child(n+4){border-bottom:none}
.sect-card:last-child{border-right:none}
.sect-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--gold),var(--gold2),transparent);transform:scaleX(0);transform-origin:left;transition:transform .45s ease}
.sect-card:hover{background:var(--bg2)}
.sect-card:hover::after{transform:scaleX(1)}
.sect-card-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:1.4rem}
.sect-icon{width:48px;height:48px;border:1px solid rgba(139,106,34,.25);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1rem;flex-shrink:0;transition:all .35s}
.sect-card:hover .sect-icon{background:var(--gold);color:var(--bg);border-color:var(--gold)}
.sect-sector{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);padding:.22rem .65rem;border:1px solid rgba(139,106,34,.18);background:rgba(139,106,34,.04);white-space:nowrap}
.sect-pitch{font-family:var(--fd);font-weight:200;font-size:1.25rem;line-height:1.25;color:var(--txt);letter-spacing:-.01em;margin-bottom:1.2rem}
.sect-solutions{list-style:none;font-family:var(--fm);font-size:.7rem;font-weight:300;color:var(--txt2);line-height:1.65;margin-bottom:1.3rem;flex:1}
.sect-solutions li{padding:.2rem 0;display:flex;align-items:flex-start;gap:.5rem;border-bottom:1px solid rgba(0,0,0,.04)}
.sect-solutions li:last-child{border-bottom:none}
.sect-solutions li::before{content:'→';color:var(--gold);flex-shrink:0;font-size:.65rem;margin-top:.1rem;opacity:.7}
.sect-benefit{font-family:var(--fm);font-size:.65rem;font-weight:500;color:var(--gold);padding:.35rem .7rem;background:rgba(139,106,34,.06);border:1px solid rgba(139,106,34,.1);margin-bottom:1.3rem}
.sect-link{display:inline-flex;align-items:center;gap:.4rem;font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--txt2);text-decoration:none;transition:color .2s;margin-top:auto}
.sect-link:hover{color:var(--gold)}
.sect-link i{font-size:.5rem}
@media(max-width:991px){.sect-grid{grid-template-columns:repeat(2,1fr)}.sect-card:nth-child(4n){border-right:1px solid var(--border)}.sect-card:nth-child(2n){border-right:none!important}.sect-card:nth-child(n+5){border-bottom:1px solid var(--border)}.sect-card:nth-child(n+7){border-bottom:none}}
@media(max-width:575px){.sect-grid{grid-template-columns:1fr}.sect-card{border-right:none!important}.sect-card:last-child{border-bottom:none}}

/* HW CATALOGUE ACCORDION */
.hw-cat{padding:8rem 0;background:var(--border)}
.hw-cat-head{display:flex;align-items:flex-end;justify-content:space-between;gap:3rem;flex-wrap:wrap;margin-bottom:0}
.hw-cat .sec-label{color:rgba(139,106,34,.5)}
.hw-cat .sec-label::before{background:rgba(139,106,34,.5)}
.hw-cat .sec-title{margin-bottom:0}
.hw-cat-sub{font-family:var(--fm);font-size:.85rem;font-weight:300;color:rgba(247,245,242,.22);max-width:400px;line-height:1.85}
.hw-acc{border:1px solid var(--border);border-radius:0;margin-top:4rem;border-radius: 20px;}
.hw-acc-item{border-bottom:1px solid var(--border);}
.hw-acc-item:last-child{border-bottom:none}
.hw-acc-head{display:flex;align-items:center;gap:2rem;padding:2rem 2.4rem;cursor:pointer;transition:background .25s;user-select:none}
.hw-acc-item.open .hw-acc-head,.hw-acc-head:hover{background:rgba(247,245,242,.02)}
.hw-acc-num{font-family:var(--fd);font-weight:200;font-size:2.4rem;color:var(--gold);line-height:1;letter-spacing:-.04em;flex-shrink:0;width:50px;transition:color .3s}
.hw-acc-info{flex:1;min-width:0}
.hw-acc-label{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:rgba(139,106,34,.45);margin-bottom:.3rem}
.hw-acc-name{font-family:var(--fd);font-weight:200;font-size:1.7rem;letter-spacing:-.02em;line-height:1;transition:color .3s;margin-bottom: 6px;}
.hw-acc-item.open .hw-acc-name{color:var(--gold)}
.hw-acc-pitch{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.6;max-width:480px}
.hw-acc-toggle{width:36px;height:36px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);background:none;cursor:pointer;flex-shrink:0;transition:all .3s;font-size:.65rem;pointer-events:none}
.hw-acc-item.open .hw-acc-toggle{border-color:rgba(201,169,110,.35);color:var(--gold2)}
.hw-acc-body{overflow:hidden;max-height:0;transition:max-height .4s cubic-bezier(.16,1,.3,1)}
.hw-acc-item.open .hw-acc-body{max-height:600px}
.hw-acc-body-inner{display:grid;grid-template-columns:1fr 260px;gap:3rem;padding:0 2.4rem 2.5rem 6.8rem}
.hw-acc-feats{list-style:none}
.hw-acc-feat{display:flex;align-items:flex-start;gap:.8rem;padding:.65rem 0;border-bottom:1px solid var(--border);font-family:var(--fm);font-size:.77rem;font-weight:300;color:var(--txt2);line-height:1.6}
.hw-acc-feat:last-child{border-bottom:none}
.hw-acc-feat::before{content:'';width:4px;height:4px;border-radius:50%;background:var(--gold2);flex-shrink:0;margin-top:.5rem;opacity:.45}
.hw-acc-meta{border-left:1px solid rgba(247,245,242,.06);padding-left:2rem}
.hw-acc-meta-row{margin-bottom:1.8rem}
.hw-acc-meta-row:last-child{margin-bottom:0}
.hw-acc-meta-lbl{font-family:var(--fm);font-size:.5rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:rgba(139,106,34,.38);margin-bottom:.5rem}
.hw-acc-meta-val{font-family:var(--fm);font-size:.74rem;font-weight:300;color:var(--txt2);line-height:1.65}
.hw-acc-kpi-val{font-family:var(--fd);font-size:1.5rem;font-weight:200;color:var(--gold2);line-height:1.2}
@media(max-width:767px){.hw-acc-body-inner{grid-template-columns:1fr;padding-left:1.5rem}.hw-acc-meta{border-left:none;padding-left:0;border-top:1px solid rgba(247,245,242,.06);padding-top:1.5rem;margin-top:.5rem}}
@media(max-width:575px){.hw-acc-head{gap:1rem;padding:1.5rem 1.2rem}}

/* BUSINESS VALUES */
.bv-section{padding:8rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.bv-grid{margin-top:4rem;border:1px solid var(--border);border-radius:22px;overflow:hidden}
.bv-row{display:grid;grid-template-columns:220px 1fr 240px;align-items:stretch;border-bottom:1px solid var(--border);position:relative;overflow:hidden;transition:background .3s}
.bv-row:last-child{border-bottom:none}
.bv-row:hover{background:var(--bg3)}
.bv-row::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,var(--gold),var(--gold2));transform:scaleY(0);transform-origin:top;transition:transform .4s ease}
.bv-row:hover::before{transform:scaleY(1)}
.bv-metric{padding:2.2rem 2.5rem;border-right:1px solid var(--border);display:flex;flex-direction: column;align-items:center;justify-content:center;gap:.6rem}
.bv-icon{width:36px;height:36px;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.8rem;margin-bottom:.3rem}
.bv-val{font-weight:200;font-size:2.4rem;color:var(--txt);line-height:1;margin-top: -12px;}
.bv-val em{color:var(--gold);font-style:normal;font-size:.6em}
.bv-content{padding:2.2rem 2.5rem;border-right:1px solid var(--border)}
.bv-title{font-family:var(--fm);font-weight:600;font-size:.85rem;color:var(--txt);margin-bottom:.5rem}
.bv-desc{font-family:var(--fm);font-size:1rem;font-weight:300;color:var(--txt2);line-height:1.8}
.bv-example{padding:2rem 2.2rem;display:flex;flex-direction:column;justify-content:center}
.bv-example-lbl{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.5rem}
.bv-example-text{font-family:var(--fm);font-size:.7rem;font-style:italic;font-weight:300;color:var(--txt2);line-height:1.7}
@media(max-width:991px){.bv-row{grid-template-columns:1fr}.bv-metric,.bv-content,.bv-example{border-right:none;border-bottom:1px solid var(--border);padding:1.8rem 2rem}.bv-row .bv-example{border-bottom:none}}

/* PROCESS 6 steps */
.process-steps.six{grid-template-columns:repeat(3,1fr)}
.process-steps .step-num{color: var(--gold);}
.process-steps .step{border-bottom: 1px solid var(--border);}
.process-steps .step:nth-child(){}
.process-steps .step:nth-child(3){border-right:none;}
.process-steps .step:nth-child(4), .process-steps .step:nth-child(5), .process-steps .step:nth-child(6){border-bottom:none;}
@media(max-width:767px){.process-steps.six{grid-template-columns:1fr}}

/* GOUVERNANCE 5 cards */
.gouv{padding:8rem 0;background:var(--bg)}
.gouv-wrap{margin-top:4rem}
.gouv-row{display:grid;border:1px solid var(--border);overflow:hidden}
.gouv-row.r3{grid-template-columns:repeat(3,1fr);border-radius:22px 22px 0 0}
.gouv-row.r2{grid-template-columns:repeat(2,1fr);border-top:none;border-radius:0 0 22px 22px}
.gouv-card{padding:3.5rem 3rem;border-right:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s}
.gouv-card:last-child{border-right:none}
.gouv-card:hover{background:var(--bg2)}
.gouv-num{font-family:var(--fd);font-weight:200;font-size:8rem;line-height:1;color:rgba(0,0,0,.04);position:absolute;top:-1.5rem;right:1.5rem;letter-spacing:-.06em;user-select:none;pointer-events:none}
.gouv-icon{width:52px;height:52px;border:none;display:flex;align-items:center;justify-content:center;color:var(--gold);margin-bottom:2rem;font-size:3rem;transition:all .35s}
.gouv-title{font-family:var(--fm);font-weight:500;font-size:1rem;color:var(--txt);margin-bottom:.9rem;letter-spacing:-.01em}
.gouv-desc{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.85}
@media(max-width:767px){.gouv-row.r3,.gouv-row.r2{grid-template-columns:1fr;border-radius:0}.gouv-row.r3{border-radius:22px 22px 0 0}.gouv-row.r2{border-radius:0 0 22px 22px}.gouv-card{border-right:none;border-bottom:1px solid var(--border)}.gouv-row .gouv-card:last-child{border-bottom:none}}

/* BUNDLES */
.bundles{padding:8rem 0;background:var(--bg2);border-top:1px solid rgba(247,245,242,.06)}
.bundles .sec-label{color:rgba(139,106,34,.5)}
.bundles .sec-label::before{background:rgba(139,106,34,.5)}
.bundles .sec-title{margin-bottom:0}
.bundles-head{display:flex;align-items:flex-end;justify-content:space-between;gap:3rem;flex-wrap:wrap;margin-bottom:0}
.bundles-sub{font-family:var(--fm);font-size:.85rem;font-weight:300;color:rgba(247,245,242,.22);max-width:400px;line-height:1.85}
.bundles-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:var(--border);margin-top:4rem;border:1px solid var(--border);border-radius: 20px;}
.bundle-card{padding:3.2rem 3rem;position:relative;overflow:hidden;transition:background .3s;background:var(--bg2);}
.bundle-card:hover{background:var(--bg);}
.bundle-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(to right,var(--gold),var(--gold2),transparent);transform:scaleX(0);transform-origin:left;transition:transform .45s ease}
.bundle-card:hover::before{transform:scaleX(1)}
.bundle-card:nth-child(1){border-radius: 20px 0 0 0;}
.bundle-card:nth-child(2){border-radius: 0 20px 0 0;}
.bundle-card:nth-child(3){border-radius: 0 0 0 20px;}
.bundle-card:nth-child(4){border-radius: 0 0 20px 0;}
.bundle-tag{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--gold);border:1px solid var(--gold);padding:.25rem .7rem;display:inline-flex;align-items:center;gap:.4rem;margin-bottom:2rem;border-radius: 5px;}
.bundle-name{font-family:var(--fd);font-weight:200;font-size:2.2rem;line-height:1;letter-spacing:-.02em;margin-bottom:1rem}
.bundle-desc{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);line-height:1.85;margin-bottom:1.5rem}
.bundle-detail{font-family:var(--fm);font-size:.7rem;font-style:italic;color:var(--txt2);border-top:1px solid var(--border);padding-top:1.2rem;margin-bottom:1.5rem}
.bundle-link{display:inline-flex;align-items:center;gap:.4rem;font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);text-decoration:none;transition:color .2s}
.bundle-link:hover{color:var(--gold2)}
.bundle-link i{font-size:.52rem}
@media(max-width:767px){.bundles-grid{grid-template-columns:1fr}}
</style>

<!-- HERO -->
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
        <div class="wm-hero-label"><?php echo $service->getTitre() ?></div>
        <h1 class="wm-hero-title rv"><?php echo $service->getH1() ?></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
          <a href="<?php echo $pageContact->getLink(); ?>" class="btn-hw"><span>Demander un audit IA</span> <i class="fa fa-arrow-right fa-xs"></i></a>
          <a href="#services" class="btn-hw" style="border-color:var(--border);color:var(--txt2)"><span>Voir les cas d'usage par secteur</span></a>
        </div>
      </div>
      <div class="wm-hero-side rv d3">
        <img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhotoBanniere() ?>" alt="">
      </div>
    </div>
  </div>
</section>

<!-- ═══ INTRODUCTION CONTEXTUELLE ═══════════════════ -->
<section class="intro-ctx">
  <div class="container">
    <div class="intro-ctx-inner">
      <div class="intro-ctx-sticky rv">
        <div class="sec-label">Contexte marché</div>
        <h2 class="sec-title" style="margin-bottom:0">Introduction<br><em>Contextuelle</em></h2>
      </div>
      <div class="intro-ctx-body rv d1">
        <p>La digitalisation des entreprises au Maroc a franchi un cap décisif depuis 2020. Face à une pression croissante sur les coûts opérationnels et à l'exigence d'une réactivité continue (24/7), les approches traditionnelles montrent leurs limites. Les agents IA se positionnent aujourd'hui comme le levier de compétitivité incontournable pour les directions générales et directions des systèmes d'information cherchant à optimiser leur rentabilité.</p>
        <p>Sur un marché marocain où des canaux comme WhatsApp et Telegram ont atteint une maturité exceptionnelle dans les échanges B2B et B2C, l'intégration de solutions conversationnelles intelligentes n'est plus une option. Hello World conçoit et déploie des systèmes autonomes capables de traiter vos flux documentaires, d'engager vos prospects et de fiabiliser votre service client en temps réel.</p>
        <p>Nos offres sont taillées pour répondre aux exigences de conformité et de performance des grands comptes, des institutions semi-publiques et des appels d'offres stratégiques. Le retour sur investissement (ROI) de nos solutions s'observe dès les premiers mois de déploiement grâce à une automatisation maîtrisée et parfaitement intégrée à votre écosystème existant.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 1 — SECTEURS ════════════════════════════ -->
<section class="secteurs" id="secteurs">
  <div class="container">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:2rem;flex-wrap:wrap">
      <div>
        <div class="sec-label">Solutions par secteur</div>
        <h2 class="sec-title rv">7 secteurs,<br>des agents <em>sur mesure</em></h2>
      </div>
    </div>
    <div class="sect-grid">

      <!-- SANTÉ -->
      <div class="sect-card rv">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-stethoscope"></i></div>
          <span class="sect-sector">Santé</span>
        </div>
        <div class="sect-pitch">Fluidifiez le parcours patient et optimisez le temps médical.</div>
        <ul class="sect-solutions">
          <li>Rappels automatiques SMS/WhatsApp</li>
          <li>Confirmation patient interactive</li>
          <li>Optimisation agenda médecin</li>
          <li>Gestion proactive des no-shows</li>
        </ul>
        <div class="sect-benefit">Réduction de 40% de l'absentéisme · RDV 24/7</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Santé <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- RESTAURANT -->
      <div class="sect-card rv d1">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-utensils"></i></div>
          <span class="sect-sector">Restauration</span>
        </div>
        <div class="sect-pitch">Digitalisez l'expérience client, de la réservation à la commande.</div>
        <ul class="sect-solutions">
          <li>Prise de commande WhatsApp automatisée</li>
          <li>Menu dynamique &amp; réservations intelligentes</li>
          <li>Rappel de panier moyen</li>
          <li>Upselling automatisé boissons/desserts</li>
        </ul>
        <div class="sect-benefit">Ticket moyen +15% · Zéro perte d'appel</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Restauration <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- HÔTELLERIE -->
      <div class="sect-card rv d2">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-hotel"></i></div>
          <span class="sect-sector">Hôtellerie</span>
        </div>
        <div class="sect-pitch">Conciergerie multilingue 24/7 et réservations directes boostées.</div>
        <ul class="sect-solutions">
          <li>Booking conversationnel multilingue</li>
          <li>Confirmation instantanée de réservation</li>
          <li>Upsell chambres/services</li>
          <li>Check-in/out express automatisé</li>
        </ul>
        <div class="sect-benefit">Réduction commissions OTA · Réponse &lt;1 min</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Hôtellerie <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- IMMOBILIER -->
      <div class="sect-card rv d3">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-building"></i></div>
          <span class="sect-sector">Immobilier</span>
        </div>
        <div class="sect-pitch">Qualifiez vos leads en temps réel et informez vos acquéreurs.</div>
        <ul class="sect-solutions">
          <li>Mises à jour quotidiennes de chantiers</li>
          <li>Scraping/veille marché automatisé</li>
          <li>Campagnes WhatsApp vers prospects chauds</li>
          <li>Qualification téléphonique des leads</li>
        </ul>
        <div class="sect-benefit">Conversion lead-to-visit +30%</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Immobilier <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- FINANCE -->
      <div class="sect-card rv">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-chart-line"></i></div>
          <span class="sect-sector">Finance</span>
        </div>
        <div class="sect-pitch">Automatisez votre intelligence de marché et vos flux d'exécution.</div>
        <ul class="sect-solutions">
          <li>Agent Forex &amp; Or (signaux Telegram)</li>
          <li>Alertes de news et sentiment marché</li>
          <li>Suivi intelligent des reçus/dépenses</li>
          <li>Exécution en millisecondes</li>
        </ul>
        <div class="sect-benefit">Zéro erreur humaine · Traçabilité totale</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Finance <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- SOCIAL MEDIA + MARKETING -->
      <div class="sect-card rv d1">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fal fa-bullhorn"></i></div>
          <span class="sect-sector">Marketing</span>
        </div>
        <div class="sect-pitch">Industrialisez votre veille, vos rapports et la distribution de contenus.</div>
        <ul class="sect-solutions">
          <li>Suivi positions SEO Google automatisé</li>
          <li>Rapport marketing hebdomadaire</li>
          <li>Génération de tableaux de métriques</li>
          <li>Publication omnicanal automatisée</li>
        </ul>
        <div class="sect-benefit">Gain 10h/semaine sur le reporting</div>
        <a href="<?php echo $pageContact->getLink(); ?>" class="sect-link">Voir les solutions Marketing <i class="fa fa-arrow-right"></i></a>
      </div>

      <!-- ORGANISATION -->
      <!-- <div class="sect-card rv d2">
        <div class="sect-card-top">
          <div class="sect-icon"><i class="fa fa-gears"></i></div>
          <span class="sect-sector">Opérations</span>
        </div>
        <div class="sect-pitch">Brisez les silos et assistez vos équipes au quotidien.</div>
        <ul class="sect-solutions">
          <li>Organisation Gmail et alertes urgentes</li>
          <li>Synthèse Trello par projet</li>
          <li>Digest deadlines vers Slack</li>
          <li>Analyse enregistrements Zoom (résumés)</li>
        </ul>
        <div class="sect-benefit">Perte d'information réduite à 0%</div>
        <a href="contact.html" class="sect-link">Voir les solutions Opérations <i class="fa fa-arrow-right"></i></a>
      </div> -->

    </div>
  </div>
</section>

<!-- ═══ BLOC 2 — HW CATALOGUE ════════════════════════ -->
<section class="hw-cat" id="catalogue">
  <div class="container">
    <div class="hw-cat-head">
      <div>
        <div class="sec-label">Catalogue Hello World</div>
        <h2 class="sec-title rv">Nos 6 produits IA<br><em>phares</em></h2>
      </div>
      <p class="hw-cat-sub rv d1">Chaque produit HW est configuré sur vos données, intégré à vos outils et opérationnel sous 3 semaines.</p>
    </div>

    <div class="hw-acc rv d1">

      <div class="hw-acc-item" id="hw-concierge">
        <div class="hw-acc-head">
          <div class="hw-acc-num">01</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">Concierge AI</div>
            <div class="hw-acc-pitch">Solution d'assistance virtuelle sur-mesure pour guider vos utilisateurs 24/7.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Réponses immédiates aux FAQ complexes</li>
              <li class="hw-acc-feat">Routage intelligent vers l'humain si nécessaire</li>
              <li class="hw-acc-feat">Multilingue naturel (Darija, Français, Anglais, Arabe)</li>
              <li class="hw-acc-feat">Connexion directe à votre base de connaissances</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">Hôtellerie · Services · Corporate</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Chatbot web/app entraîné</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">Taux résolution 1er contact &gt;80%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-acc-item" id="hw-whatsapp">
        <div class="hw-acc-head">
          <div class="hw-acc-num">02</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">WhatsApp Agent</div>
            <div class="hw-acc-pitch">Agent conversationnel spécialisé canal WhatsApp Business.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Prise de commande/RDV de bout en bout</li>
              <li class="hw-acc-feat">Campagnes de notifications sortantes</li>
              <li class="hw-acc-feat">Authentification sécurisée de l'utilisateur</li>
              <li class="hw-acc-feat">Intégration CRM pour historique des échanges</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">Retail · Restaurant · Immobilier</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Numéro WhatsApp officiel automatisé</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">Taux ouverture &gt;90% · Conversion ×2</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-acc-item" id="hw-sdr">
        <div class="hw-acc-head">
          <div class="hw-acc-num">03</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">SDR Agent</div>
            <div class="hw-acc-pitch">Votre commercial virtuel infatigable pour qualifier les leads entrants.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Scraping et enrichissement de profils</li>
              <li class="hw-acc-feat">Séquences emails/messages hyper-personnalisées</li>
              <li class="hw-acc-feat">Scoring des leads en temps réel</li>
              <li class="hw-acc-feat">Prise de rendez-vous automatique dans l'agenda</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">Immobilier · B2B · Finance</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Pipeline CRM qualifié automatiquement</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">+40% de leads qualifiés générés</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-acc-item" id="hw-support">
        <div class="hw-acc-head">
          <div class="hw-acc-num">04</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">Support 24/7</div>
            <div class="hw-acc-pitch">Automatisation des tickets niveau 1 &amp; 2 pour vos centres de contact.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Analyse sémantique des réclamations</li>
              <li class="hw-acc-feat">Résolution autonome des requêtes courantes</li>
              <li class="hw-acc-feat">Création automatique de tickets formatés</li>
              <li class="hw-acc-feat">Suivi satisfaction client (NPS) post-interaction</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">E-commerce · Télécom · Santé</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Agent connecté au système de ticketing</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">Temps de traitement réduit de 60%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-acc-item" id="hw-content">
        <div class="hw-acc-head">
          <div class="hw-acc-num">05</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">Content Studio</div>
            <div class="hw-acc-pitch">Usine à contenu intelligente pour générer et publier sur tous vos canaux.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Génération d'articles optimisés SEO</li>
              <li class="hw-acc-feat">Veille sectorielle et synthèse d'actualités</li>
              <li class="hw-acc-feat">Création de visuels et tableaux de bord</li>
              <li class="hw-acc-feat">Programmation cross-canal des publications</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">Marketing · Agences · Médias</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Workflow complet de génération de contenu</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">Production de contenu ×5</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hw-acc-item" id="hw-voice">
        <div class="hw-acc-head">
          <div class="hw-acc-num">06</div>
          <div class="hw-acc-info">
            <div class="hw-acc-label">HW Product</div>
            <div class="hw-acc-name">Voice Caller</div>
            <div class="hw-acc-pitch">Agent d'appels entrants/sortants avec synthèse vocale réaliste.</div>
          </div>
          <button class="hw-acc-toggle"><i class="fa fa-plus"></i></button>
        </div>
        <div class="hw-acc-body">
          <div class="hw-acc-body-inner">
            <ul class="hw-acc-feats">
              <li class="hw-acc-feat">Qualification de fiches prospects par la voix</li>
              <li class="hw-acc-feat">Rappels de rendez-vous ou de paiements</li>
              <li class="hw-acc-feat">Transcription et résumé dans le CRM</li>
              <li class="hw-acc-feat">Gestion des débordements d'appels</li>
            </ul>
            <div class="hw-acc-meta">
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Secteurs</div>
                <div class="hw-acc-meta-val">Immobilier · Santé · Finance</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">Livrable</div>
                <div class="hw-acc-meta-val">Numéro SIP connecté à l'agent vocal</div>
              </div>
              <div class="hw-acc-meta-row">
                <div class="hw-acc-meta-lbl">KPI</div>
                <div class="hw-acc-kpi-val">Appels simultanés illimités</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ BLOC 3 — VALEUR BUSINESS ════════════════════ -->
<section class="bv-section">
  <div class="container">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:2rem;flex-wrap:wrap">
      <div>
        <div class="sec-label">ROI mesurable</div>
        <h2 class="sec-title rv">5 leviers de valeur <em>immédiate</em></h2>
      </div>
    </div>
    <div class="bv-grid rv d1">
      <div class="bv-row">
        <div class="bv-metric">
          <div class="bv-icon"><i class="fal fa-clock"></i></div>
          <div class="bv-val">2<em> j/sem</em></div>
        </div>
        <div class="bv-content">
          <div class="bv-title">Gagner du temps</div>
          <div class="bv-desc">Automatisez les processus séquentiels chronophages pour réallouer vos équipes à des tâches à haute valeur ajoutée.</div>
        </div>
        <div class="bv-example">
          <div class="bv-example-lbl">Exemple concret</div>
          <div class="bv-example-text">Synthèse automatique de 50 emails quotidiens vers un tableau Trello, sans intervention humaine.</div>
        </div>
      </div>
      <div class="bv-row">
        <div class="bv-metric">
          <div class="bv-icon"><i class="fal fa-shield-alt"></i></div>
          <div class="bv-val">99,9<em>%</em></div>
        </div>
        <div class="bv-content">
          <div class="bv-title">Réduire les tâches manuelles</div>
          <div class="bv-desc">Supprimez les copier-coller et doubles saisies générateurs d'erreurs humaines dans vos flux de données.</div>
        </div>
        <div class="bv-example">
          <div class="bv-example-lbl">Exemple concret</div>
          <div class="bv-example-text">Extraction des factures reçues par email et saisie comptable automatisée dans votre ERP.</div>
        </div>
      </div>
      <div class="bv-row">
        <div class="bv-metric">
          <div class="bv-icon"><i class="fal fa-bolt"></i></div>
          <div class="bv-val">&lt;2<em> sec</em></div>
        </div>
        <div class="bv-content">
          <div class="bv-title">Améliorer le service client</div>
          <div class="bv-desc">Offrez une disponibilité totale, de jour comme de nuit, avec des réponses instantanées et précises.</div>
        </div>
        <div class="bv-example">
          <div class="bv-example-lbl">Exemple concret</div>
          <div class="bv-example-text">Un client d'hôtel modifie sa réservation à 3h du matin via WhatsApp sans aucune intervention humaine.</div>
        </div>
      </div>
      <div class="bv-row">
        <div class="bv-metric">
          <div class="bv-icon"><i class="fal fa-chart-line"></i></div>
          <div class="bv-val">+35<em>%</em></div>
        </div>
        <div class="bv-content">
          <div class="bv-title">Accélérer les ventes</div>
          <div class="bv-desc">Réduisez votre cycle de vente en qualifiant les leads dès leur arrivée et en assurant un follow-up systématique.</div>
        </div>
        <div class="bv-example">
          <div class="bv-example-lbl">Exemple concret</div>
          <div class="bv-example-text">Relance WhatsApp intelligente 24h après une visite immobilière avec scoring automatique du prospect.</div>
        </div>
      </div>
      <div class="bv-row">
        <div class="bv-metric">
          <div class="bv-icon"><i class="fal fa-chart-pie"></i></div>
          <div class="bv-val">100<em>%</em></div>
        </div>
        <div class="bv-content">
          <div class="bv-title">Fiabiliser le reporting interne</div>
          <div class="bv-desc">Assurez une circulation fluide de l'information entre départements avec des alertes ciblées et des digests automatiques.</div>
        </div>
        <div class="bv-example">
          <div class="bv-example-lbl">Exemple concret</div>
          <div class="bv-example-text">Digest quotidien des urgences projets envoyé sur Slack au manager, sans oubli ni délai.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PRODUCTS -->
<!-- <section class="products" id="produits">
  <div class="container">
    <div class="products-header">
      <div>
        <div class="sec-label">Solutions par secteur</div>
        <h2 class="sec-title">Six solutions <em>immédiatement</em>opérationnelles</h2>
      </div>
	</div>

    <div class="prod-grid">
      <div class="prod-card rv" id="hw-concierge">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-robot"></i></div>
        </div>
        <div class="prod-name"><strong>Concierge AI</strong>L'assistant intelligent pour vos clients</div>
        <p class="prod-desc">Un agent conversationnel multicanal qui répond, oriente et convertit 24/7 — formé sur votre catalogue, vos FAQ et vos processus métier.</p>
        <div class="prod-tags">
          <span class="prod-tag">Chat</span>
          <span class="prod-tag">E-mail</span>
          <span class="prod-tag">Multilingue</span>
        </div>
      </div>

      <div class="prod-card rv d1" id="hw-whatsapp">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fab fa-whatsapp"></i></div>
        </div>
        <div class="prod-name"><strong>WhatsApp Agent</strong>L'automatisation WhatsApp Business</div>
        <p class="prod-desc">Confirmations de RDV, suivi de commandes, relances et support client directement dans WhatsApp. Intégré à votre CRM en temps réel.</p>
        <div class="prod-tags">
          <span class="prod-tag">WhatsApp API</span>
          <span class="prod-tag">CRM sync</span>
          <span class="prod-tag">Automation</span>
        </div>
      </div>

      <div class="prod-card rv d2" id="hw-sdr">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-chart-line"></i></div>
        </div>
        <div class="prod-name"><strong>SDR Agent</strong>Le commercial IA qui ne dort jamais</div>
        <p class="prod-desc">Prospection automatisée, qualification de leads et prise de RDV sur LinkedIn, email et téléphone. Votre pipeline commercial en pilote automatique.</p>
        <div class="prod-tags">
          <span class="prod-tag">LinkedIn</span>
          <span class="prod-tag">Cold email</span>
          <span class="prod-tag">Lead scoring</span>
        </div>
      </div>

      <div class="prod-card rv" id="hw-support">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-headset"></i></div>
        </div>
        <div class="prod-name"><strong>Support 24/7</strong>Le service client qui ne s'arrête jamais</div>
        <p class="prod-desc">Résolution automatique de 80% des tickets. Escalade intelligente vers vos agents humains. Base de connaissance qui s'enrichit à chaque interaction.</p>
        <div class="prod-tags">
          <span class="prod-tag">Zendesk</span>
          <span class="prod-tag">Intercom</span>
          <span class="prod-tag">Auto-learning</span>
        </div>
      </div>

      <div class="prod-card rv d1" id="hw-content">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-pen-nib"></i></div>
        </div>
        <div class="prod-name"><strong>Content Studio</strong>La production de contenu à l'échelle</div>
        <p class="prod-desc">Articles SEO, posts réseaux sociaux, newsletters et scripts vidéo générés dans le ton de votre marque. 10x votre production, 0 compromis sur la qualité.</p>
        <div class="prod-tags">
          <span class="prod-tag">SEO</span>
          <span class="prod-tag">Social</span>
          <span class="prod-tag">Brand voice</span>
        </div>
      </div>

      <div class="prod-card rv d2" id="hw-voice">
        <div class="prod-head">
          <div class="prod-icon-wrap"><i class="fa fa-phone-volume"></i></div>
        </div>
        <div class="prod-name"><strong>Voice Caller</strong>Les appels sortants automatisés</div>
        <p class="prod-desc">Relances téléphoniques, confirmations de RDV et enquêtes de satisfaction en voix naturelle. Disponible en français, anglais, arabe et espagnol.</p>
        <div class="prod-tags">
          <span class="prod-tag">Voix naturelle</span>
          <span class="prod-tag">Multilingue</span>
          <span class="prod-tag">CRM ready</span>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- INTEGRATIONS -->
<section class="integrations">
  <div class="container">
    <div class="sec-label">Intégrations natives</div>
    <h2 class="sec-title rv">Connecté à <em>votre écosystème</em></h2>
    <div class="int-grid">
      <div class="int-item rv"><i class="fab fa-salesforce int-icon"></i><span class="int-name">CRM (Salesforce, HubSpot)</span></div>
      <div class="int-item rv d1"><i class="fab fa-shopify int-icon"></i><span class="int-name">CMS (WordPress, Shopify)</span></div>
      <div class="int-item rv d2"><i class="fab fa-whatsapp int-icon"></i><span class="int-name">WhatsApp Business API</span></div>
      <div class="int-item rv d3"><i class="fab fa-google int-icon"></i><span class="int-name">Gmail / Outlook</span></div>
      <div class="int-item rv"><i class="fa fa-tasks int-icon"></i><span class="int-name">Trello / Jira / Asana</span></div>
      <div class="int-item rv d1"><i class="fab fa-slack int-icon"></i><span class="int-name">Slack / Microsoft Teams</span></div>
      <div class="int-item rv d2"><i class="fab fa-telegram int-icon"></i><span class="int-name">Telegram</span></div>
      <div class="int-item rv d3"><i class="fa fa-search int-icon"></i><span class="int-name">SEO (Ahrefs, Semrush)</span></div>
      <div class="int-item rv"><i class="fa fa-ticket int-icon"></i><span class="int-name">Ticketing (Zendesk, Freshdesk)</span></div>
      <div class="int-item rv d1"><i class="fab fa-google int-icon"></i><span class="int-name">Google Analytics 4</span></div>
      <div class="int-item rv d2"><i class="fab fa-stripe int-icon"></i><span class="int-name">Paiements (CMI, Stripe, PayPal)</span></div>
      <div class="int-item rv d3"><i class="fa fa-database int-icon"></i><span class="int-name">CRM &amp; ERP sur mesure</span></div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 5 — MÉTHODE DE DÉPLOIEMENT ══════════════ -->
<section class="process">
  <div class="container">
    <div class="sec-label">Notre méthode</div>
    <h2 class="sec-title rv">De l'audit au <em>go-live</em><br>en 6 étapes maîtrisées</h2>
    <div class="process-steps six">
      <div class="step rv">
        <span class="step-num">S1</span>
        <div class="step-title">Audit du besoin</div>
        <p class="step-desc">Analyse des processus existants et identification des goulots d'étranglement. Livrable : Matrice de maturité IA.</p>
      </div>
      <div class="step rv d1">
        <span class="step-num">S2</span>
        <div class="step-title">Priorisation du cas d'usage</div>
        <p class="step-desc">Sélection du workflow offrant le meilleur ratio Rapidité/ROI. Livrable : Cahier des charges fonctionnel allégé.</p>
      </div>
      <div class="step rv d2">
        <span class="step-num">S3–5</span>
        <div class="step-title">Prototype &amp; Pilote</div>
        <p class="step-desc">Développement et entraînement de l'agent IA sur un périmètre restreint. Livrable : Agent fonctionnel en test.</p>
      </div>
      <div class="step rv">
        <span class="step-num">S6</span>
        <div class="step-title">Intégration outils</div>
        <p class="step-desc">Connexion sécurisée aux SI de l'entreprise (CRM, ERP, API). Livrable : Écosystème connecté de bout en bout.</p>
      </div>
      <div class="step rv d1">
        <span class="step-num">S7</span>
        <div class="step-title">Formation équipes</div>
        <p class="step-desc">Accompagnement au changement pour collaborer avec les agents IA. Livrable : Ateliers pratiques + support de formation.</p>
      </div>
      <div class="step rv d2">
        <span class="step-num">Run</span>
        <div class="step-title">Optimisation continue</div>
        <p class="step-desc">Surveillance des KPIs, affinage des prompts et gestion des exceptions. Livrable : Dashboard de performance mensuel.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 6 — GOUVERNANCE ═════════════════════════ -->
<section class="gouv">
  <div class="container">
    <div class="sec-label">Sécurité &amp; Conformité</div>
    <h2 class="sec-title rv">Gouvernance IA <em>enterprise-grade</em></h2>
    <div class="gouv-wrap">
      <div class="gouv-row r3">
        <div class="gouv-card rv">
          <span class="gouv-num">01</span>
          <div class="gouv-icon"><i class="fal fa-shield-alt"></i></div>
          <div class="gouv-title">Conformité RGPD &amp; CNDP</div>
          <p class="gouv-desc">Processus d'hébergement et de traitement des données personnelles alignés sur la réglementation nationale (loi 09-08) et européenne (RGPD). Audits réguliers, chiffrement AES-256.</p>
        </div>
        <div class="gouv-card rv d1">
          <span class="gouv-num">02</span>
          <div class="gouv-icon"><i class="fal fa-lock"></i></div>
          <div class="gouv-title">Protection des données sensibles</div>
          <p class="gouv-desc">Chiffrement de bout en bout et anonymisation des informations critiques avant traitement par les LLM (Large Language Models). Vos données ne servent jamais à entraîner des modèles tiers.</p>
        </div>
        <div class="gouv-card rv d2">
          <span class="gouv-num">03</span>
          <div class="gouv-icon"><i class="fal fa-file-alt"></i></div>
          <div class="gouv-title">Auditabilité &amp; Logs</div>
          <p class="gouv-desc">Traçabilité absolue de chaque décision ou action entreprise par l'agent IA, conservée dans des journaux sécurisés consultables à tout moment.</p>
        </div>
      </div>
      <div class="gouv-row r2">
        <div class="gouv-card rv">
          <span class="gouv-num">04</span>
          <div class="gouv-icon"><i class="fal fa-user-tie"></i></div>
          <div class="gouv-title">Escalade &amp; Human-in-the-loop</div>
          <p class="gouv-desc">Protocole de transfert instantané vers un opérateur humain dès qu'un niveau de certitude est jugé insuffisant ou sur requête de l'utilisateur final. Zéro décision critique prise de façon autonome.</p>
        </div>
        <div class="gouv-card rv d1">
          <span class="gouv-num">05</span>
          <div class="gouv-icon"><i class="fal fa-server"></i></div>
          <div class="gouv-title">Hébergement souverain</div>
          <p class="gouv-desc">Options de déploiement on-premise ou cloud privé selon les exigences de sécurité du donneur d'ordre. SLA de haute disponibilité pour les grands comptes et appels d'offres stratégiques.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 7 — BUNDLES ══════════════════════════════ -->
<section class="bundles">
  <div class="container">
    <div class="bundles-head">
      <div>
        <div class="sec-label">Offres &amp; Tarification</div>
        <h2 class="sec-title rv">Formules adaptées à<br><em>chaque ambition</em></h2>
      </div>
      <p class="bundles-sub rv d1">Des offres structurées pour garantir le succès des déploiements majeurs.</p>
    </div>
    <div class="bundles-grid rv d1">
      <div class="bundle-card">
        <div class="bundle-tag"><i class="fa fa-flask"></i> Démarrage</div>
        <div class="bundle-name">Pilot Express</div>
        <div class="bundle-desc">Preuve de concept (POC) sur 4 semaines pour valider la faisabilité technique sur un processus unique. Idéal pour tester avant de scaler.</div>
        <div class="bundle-detail">Périmètre unique · Livraison garantie en 4 semaines</div>
        <a href="contact.html" class="bundle-link">Démarrer un pilote <i class="fa fa-arrow-right"></i></a>
      </div>
      <div class="bundle-card">
        <div class="bundle-tag"><i class="fa fa-layer-group"></i> Secteur</div>
        <div class="bundle-name">Bundle Secteur</div>
        <div class="bundle-desc">Pack pré-entraîné intégrant les 3 à 4 cas d'usage majeurs de votre industrie. Exemple : Bundle Hôtellerie complet (réservation + concierge + satisfaction).</div>
        <div class="bundle-detail">Pré-configuré · Déploiement accéléré · ROI immédiat</div>
        <a href="contact.html" class="bundle-link">Choisir mon secteur <i class="fa fa-arrow-right"></i></a>
      </div>
      <div class="bundle-card">
        <div class="bundle-tag"><i class="fa fa-building-columns"></i> Grands comptes</div>
        <div class="bundle-name">Programme Grands Comptes</div>
        <div class="bundle-desc">Architecture complexe, multi-agents, intégration SI sur-mesure et SLA de haute disponibilité. Idéal pour appels d'offres stratégiques et institutions semi-publiques.</div>
        <div class="bundle-detail">À partir de 100 000 MAD · SLA garanti · Multi-agents</div>
        <a href="contact.html" class="bundle-link">Parler à un expert <i class="fa fa-arrow-right"></i></a>
      </div>
      <div class="bundle-card">
        <div class="bundle-tag"><i class="fa fa-rotate"></i> Run continu</div>
        <div class="bundle-name">Maintenance &amp; Run</div>
        <div class="bundle-desc">Contrat de support annuel incluant l'ajustement des modèles, les mises à jour d'API et le monitoring pro-actif. Votre agent s'améliore en continu.</div>
        <div class="bundle-detail">Monitoring mensuel · Rapports de performance · Support dédié</div>
        <a href="contact.html" class="bundle-link">Souscrire au Run <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<section class="portfolio" id="work">
  <div class="container">
    <div class="sec-label rv">Cas d'utilisation</div>
    <h2 class="sec-title rv d1">Nos dernières <em>réalisations</em></h2>
    <div class="port-grid rv d2">
      <div class="port-item p-meridian tall">
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[0]->getPhoto(); ?>" alt="<?php echo $references[0]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[0]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[0]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[0]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[0]->getExtrait(); ?></p>
        </div>
      </div>

      <div class="port-item p-luminis">
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[1]->getPhoto(); ?>" alt="<?php echo $references[1]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[1]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[1]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[1]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[1]->getExtrait(); ?></p>
        </div>
      </div>
      <div class="port-item p-corvus">
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-bg">
          <img src="<?php echo $siteURL; ?>images/references/<?php echo $references[2]->getPhoto(); ?>" alt="<?php echo $references[2]->getNomClient(); ?>">
        </a>
        <div class="port-gfx"></div>
        <div class="port-overlay"></div>
        <a href="<?php echo $references[2]->getLink(); ?>" class="port-arrow"><i class="fas fa-arrow-right"></i></a>
        <div class="port-body">
          <span class="port-tag"><?php echo $references[2]->getSiteWeb(); ?></span>
          <h3 class="port-title"><?php echo $references[2]->getNomClient(); ?></h3>
          <p class="port-sub"><?php echo $references[2]->getExtrait(); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="container">
    <div class="sec-label">Commencer maintenant</div>
    <h2 class="sec-title">Votre premier agent IA<br><em>opérationnel en 3 semaines</em></h2>
    <p class="cta-sub">Un audit gratuit de 90 minutes avec nos experts pour identifier vos 3 meilleurs cas d'usage IA.</p>
    <div class="cta-btns">
      <a href="<?php echo $pageContact->getLink(); ?>" class="btn-hw"><span>Demander un audit IA</span> <i class="fa fa-arrow-right fa-xs"></i></a>
      <a href="<?php echo $pageReference->getLink(); ?>" class="btn-hw btn-ghost"><span>Voir le catalogue</span></a>
    </div>
  </div>
</section>

<?php include('includes/testimonials.php'); ?>

<script>
/* Accordion */
document.querySelectorAll('.hw-acc-head').forEach(head=>{head.addEventListener('click',()=>{const item=head.closest('.hw-acc-item');const wasOpen=item.classList.contains('open');document.querySelectorAll('.hw-acc-item.open').forEach(i=>i.classList.remove('open'));if(!wasOpen){item.classList.add('open');setTimeout(()=>item.scrollIntoView({behavior:'smooth',block:'nearest'}),50);}});});
</script>