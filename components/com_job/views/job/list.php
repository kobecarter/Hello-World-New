<?php $jobPage = getComponent("com_job"); ?>

<style>
/* ── RECRUITMENT PAGE ───────────────────────────────────────── */

/* Hero overrides for white bg */
.wm-hero{background:var(--bg)}

/* ── MARQUEE VALUES ─────────────────────────────────────────── */
.rec-mq{overflow:hidden;padding:20px 0;background:var(--bg2);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.rec-mq .mq-t{display:flex;width:max-content;animation:mq-scroll 38s linear infinite;gap:0}
.rec-mq-item{display:flex;align-items:center;gap:.55rem;padding:0 2.8rem;font-family:var(--fm);font-size:.75rem;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--txt2);white-space:nowrap}
.rec-mq-item i{color:var(--gold);font-size:.6rem}

/* ── INTRO / VALUES ─────────────────────────────────────────── */
.rec-values{padding:7rem 0;background:var(--bg)}
.rec-values-hdr{text-align:center;margin-bottom:4rem}
.rec-values-hdr .sec-label{justify-content:center}
.rec-values-hdr .sec-label::before{display:none}
.rec-values-hdr .sh-h2{font-family:var(--fm);font-weight:200;font-size:clamp(2rem,3.5vw,3.2rem);letter-spacing:-.035em;color:var(--txt);line-height:1.08;margin-top:.6rem}
.rec-values-hdr .sh-h2 em{font-style:normal;color:var(--gold)}
.rec-values-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
.rec-val-card{background:var(--bg2);border:1px solid var(--border);border-radius:20px;padding:2.4rem 2rem;position:relative;overflow:hidden;transition:border-color .25s,transform .3s cubic-bezier(.34,1.56,.64,1)}
.rec-val-card:hover{border-color:var(--gold);transform:translateY(-4px)}
.rec-val-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(9,161,190,.04),rgba(104,2,98,.03));opacity:0;transition:opacity .3s}
.rec-val-card:hover::before{opacity:1}
.rec-val-ico{width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,rgba(9,161,190,.12),rgba(104,2,98,.1));display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.2rem;margin-bottom:1.4rem}
.rec-val-title{font-family:var(--fm);font-size:.95rem;font-weight:700;color:var(--txt);margin-bottom:.6rem}
.rec-val-desc{font-family:var(--fm);font-size:.82rem;font-weight:300;color:var(--txt2);line-height:1.75}

/* ── STATS BAND ─────────────────────────────────────────────── */
.rec-stats{padding:5rem 0;background:linear-gradient(135deg,#8B2568,#4CC3D0);position:relative;overflow:hidden}
.rec-stats::before{content:'';position:absolute;inset:0;background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M60 0L0 0 0 60' fill='none' stroke='rgba(255,255,255,0.05)' stroke-width='1'/%3E%3C/svg%3E") repeat;pointer-events:none}
.rec-stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:2rem;text-align:center;position:relative;z-index:1}
.rec-stat-num{font-family:var(--fm);font-weight:200;font-size:clamp(2.4rem,4vw,4rem);color:#fff;letter-spacing:-.04em;line-height:1}
.rec-stat-num em{font-style:normal;font-size:.55em;color:rgba(255,255,255,.65)}
.rec-stat-lbl{font-family:var(--fm);font-size:.72rem;font-weight:500;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.6);margin-top:.5rem}

/* ── JOB LISTINGS ───────────────────────────────────────────── */
.rec-jobs{padding:7rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.rec-jobs-hdr{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:3rem;gap:2rem;flex-wrap:wrap}
.rec-jobs-hdr-left .sh-h2{font-family:var(--fm);font-weight:200;font-size:clamp(1.8rem,3vw,2.8rem);letter-spacing:-.035em;color:var(--txt);line-height:1.08;margin-top:.4rem}
.rec-jobs-hdr-left .sh-h2 em{font-style:normal;color:var(--gold)}
.rec-jobs-count{font-family:var(--fm);font-size:.78rem;font-weight:500;color:var(--txt2);background:var(--bg3);border:1px solid var(--border);border-radius:50px;padding:.35rem 1rem}
.rec-jobs-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1.2rem}
.rec-job-card{background:var(--bg);border:1px solid var(--border);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;transition:border-color .25s,box-shadow .25s}
.rec-job-card:hover{border-color:var(--gold);box-shadow:0 12px 40px -8px rgba(9,161,190,.12)}
.rec-job-img{height:200px;overflow:hidden;position:relative}
.rec-job-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s cubic-bezier(.16,1,.3,1)}
.rec-job-card:hover .rec-job-img img{transform:scale(1.04)}
.rec-job-img-placeholder{width:100%;height:100%;background:linear-gradient(135deg,rgba(9,161,190,.1),rgba(104,2,98,.08));display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:2.8rem;opacity:.4}
.rec-job-tag{position:absolute;top:1rem;left:1rem;font-family:var(--fm);font-size:.62rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);color:var(--gold2);padding:.3rem .8rem;border-radius:50px;border:1px solid rgba(104,2,98,.12)}
.rec-job-body{padding:1.8rem 2rem 2rem;display:flex;flex-direction:column;flex:1}
.rec-job-date{font-family:var(--fm);font-size:.68rem;font-weight:500;color:var(--txt2);letter-spacing:.06em;margin-bottom:.7rem}
.rec-job-title{font-family:var(--fm);font-weight:300;font-size:1.2rem;letter-spacing:-.02em;color:var(--txt);line-height:1.2;margin-bottom:.8rem}
.rec-job-desc{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);line-height:1.7;flex:1;margin-bottom:1.5rem;overflow:hidden}
.rec-job-footer{display:flex;align-items:center;justify-content:space-between;gap:1rem}
.rec-job-apply{display:inline-flex;align-items:center;gap:.5rem;font-family:var(--fm);font-size:.75rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gold);text-decoration:none;cursor:pointer;border:none;background:none;padding:.5rem 0;transition:gap .2s,color .2s}
.rec-job-apply:hover{gap:.8rem;color:var(--gold2)}
.rec-job-apply i{font-size:.55rem;transition:transform .2s}
.rec-job-apply:hover i{transform:translateX(3px)}

/* No jobs state */
.rec-no-jobs{text-align:center;padding:5rem 2rem;color:var(--txt2)}
.rec-no-jobs i{font-size:3rem;opacity:.2;margin-bottom:1rem;display:block;color:var(--gold)}
.rec-no-jobs p{font-family:var(--fm);font-size:.9rem;font-weight:300}

/* ── SPONTANEOUS CTA ────────────────────────────────────────── */
.rec-cta{padding:7rem 0;background:var(--bg);border-top:1px solid var(--border)}
.rec-cta-inner{display:grid;grid-template-columns:1fr 1fr;gap:6rem;align-items:center}
.rec-cta-label{font-family:var(--fm);font-size:.68rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);margin-bottom:1rem}
.rec-cta-label::before{content:'';display:inline-block;width:16px;height:1px;background:var(--gold);vertical-align:middle;margin-right:.6rem}
.rec-cta-title{font-family:var(--fm);font-weight:200;font-size:clamp(2rem,3.5vw,3.4rem);letter-spacing:-.035em;color:var(--txt);line-height:1.05;margin-bottom:1.2rem}
.rec-cta-title em{font-style:normal;color:var(--gold2)}
.rec-cta-sub{font-family:var(--fm);font-size:.88rem;font-weight:300;color:var(--txt2);line-height:1.9;margin-bottom:2.5rem;max-width:460px}
.rec-cta-side{background:var(--bg2);border:1px solid var(--border);border-radius:24px;padding:2.8rem}
.rec-cta-side-title{font-family:var(--fm);font-size:.85rem;font-weight:700;color:var(--txt);margin-bottom:.5rem}
.rec-cta-side-sub{font-family:var(--fm);font-size:.8rem;font-weight:300;color:var(--txt2);line-height:1.7;margin-bottom:2rem}
.rec-cta-email{display:flex;align-items:center;gap:.8rem;padding:1.2rem 1.6rem;background:linear-gradient(135deg,rgba(9,161,190,.06),rgba(104,2,98,.05));border:1px solid rgba(9,161,190,.15);border-radius:14px;text-decoration:none;transition:border-color .2s,transform .2s}
.rec-cta-email:hover{border-color:var(--gold);transform:translateY(-2px)}
.rec-cta-email-ico{width:40px;height:40px;border-radius:10px;background:var(--gold);display:flex;align-items:center;justify-content:center;color:#fff;font-size:.95rem;flex-shrink:0}
.rec-cta-email-txt .ttl{font-family:var(--fm);font-size:.8rem;font-weight:700;color:var(--txt);display:block}
.rec-cta-email-txt .val{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--gold);display:block}


.recrutement-form .modal-footer {
    flex-wrap: nowrap !important;
    
}
.recrutement-form .modal-footer button{
        border: none !important;
}
.rec-job-desc h3{
   color: #08c3df;
    font-size: 26px;
}
.rec-job-desc ul li{
	padding: 5px 0 5px 25px;
	border-bottom: 1px dashed #eee;
	position: relative;
}
.rec-job-desc ul li::before{
	content: "";
	height: 16px;
	width: 16px;
	position: absolute;
	border: #08c3df solid 3px;
	border-radius: 50%;
	left: 0;
	top: 8px;
}
.rec-job-desc ul li::after{
	content: "";
	height: 5px;
	width: 5px;
	position: absolute;
	background: #08c3df;
	border-radius: 50%;
	left: 6px;
	top: 13px;
}
/* ── RESPONSIVE ─────────────────────────────────────────────── */
@media(max-width:991px){
  .rec-values-grid{grid-template-columns:repeat(2,1fr)}
  .rec-stats-grid{grid-template-columns:repeat(2,1fr);gap:2.5rem}
  .rec-cta-inner{grid-template-columns:1fr;gap:3rem}
}
@media(max-width:767px){
  .rec-jobs-grid{grid-template-columns:1fr}
  .rec-values-grid{grid-template-columns:1fr}
  .rec-jobs-hdr{flex-direction:column;align-items:flex-start}
  .rec-stats-grid{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:479px){
  .rec-stats-grid{grid-template-columns:1fr}
}
</style>

<!-- ══════════════════════════════════════════════════
     HERO
════════════════════════════════════════════════════ -->
<section class="wm-hero">
  <canvas id="hero-canvas"></canvas>
  <div class="wm-hero-grid" aria-hidden="true">
    <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">
      <defs>
        <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
          <path d="M 60 0 L 0 0 0 60" fill="none" stroke="#8b6a22" stroke-width="0.5"/>
        </pattern>
      </defs>
      <rect width="1440" height="900" fill="url(#grid)"/>
      <line x1="0" y1="900" x2="1440" y2="0" stroke="#8b6a22" stroke-width="0.4"/>
      <line x1="0" y1="600" x2="960" y2="0" stroke="#8b6a22" stroke-width="0.3"/>
    </svg>
  </div>
  <div class="container">
    <div class="wm-hero-inner">
      <div>
        <div class="sh-breadcrumb rv">Carrières &amp; Recrutement</div>
        <h1 class="sh-h1 rv d1">Rejoignez l'équipe qui <em>réinvente</em> l'IA</h1>
        <p class="sh-sub rv d2">Nous construisons des agents intelligents qui transforment les entreprises. Si vous voulez avoir un impact réel dans un monde en mutation, votre place est ici.</p>
        <div class="wm-hero-ctas rv d2">
          <a href="#offres" class="sb sb-compact" data-auto-reset="true">
            <div class="sb-label"><span class="sb-hint">Voir les offres</span></div>
            <div class="sb-knob"><i class="fal fa-arrow-down"></i></div>
          </a>
          <a href="mailto:recrute@helloworld-agency.com" class="sb sb-compact sb-invert">
            <div class="sb-label"><span class="sb-hint">Candidature spontanée</span></div>
            <div class="sb-knob"><i class="fal fa-paper-plane"></i></div>
          </a>
        </div>
      </div>
     
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════
     MARQUEE VALUES
════════════════════════════════════════════════════ -->
<div class="rec-mq">
  <div class="mq-t">
    <?php $mqItems = [
      ['ico'=>'fa-star','lbl'=>'Impact réel'],
      ['ico'=>'fa-rocket','lbl'=>'Environnement innovant'],
      ['ico'=>'fa-users','lbl'=>'Équipe soudée'],
      ['ico'=>'fa-brain','lbl'=>'Apprentissage continu'],
      ['ico'=>'fa-globe','lbl'=>'Remote-friendly'],
      ['ico'=>'fa-chart-line','lbl'=>'Croissance rapide'],
      ['ico'=>'fa-hands-helping','lbl'=>'Culture bienveillante'],
      ['ico'=>'fa-lightbulb','lbl'=>'Autonomie &amp; Initiative'],
      ['ico'=>'fa-star','lbl'=>'Impact réel'],
      ['ico'=>'fa-rocket','lbl'=>'Environnement innovant'],
      ['ico'=>'fa-users','lbl'=>'Équipe soudée'],
      ['ico'=>'fa-brain','lbl'=>'Apprentissage continu'],
      ['ico'=>'fa-globe','lbl'=>'Remote-friendly'],
      ['ico'=>'fa-chart-line','lbl'=>'Croissance rapide'],
      ['ico'=>'fa-hands-helping','lbl'=>'Culture bienveillante'],
      ['ico'=>'fa-lightbulb','lbl'=>'Autonomie &amp; Initiative'],
    ];
    foreach($mqItems as $mi): ?>
    <span class="rec-mq-item"><i class="fal <?= $mi['ico'] ?>"></i><?= $mi['lbl'] ?></span>
    <?php endforeach; ?>
  </div>
</div>

<!-- ══════════════════════════════════════════════════
     VALEURS
════════════════════════════════════════════════════ -->
<!--<section class="rec-values">-->
<!--  <div class="container">-->
<!--    <div class="rec-values-hdr rv">-->
<!--      <p class="sec-label">Notre ADN</p>-->
<!--      <h2 class="sh-h2">Pourquoi rejoindre <em>HelloWorld</em>&nbsp;?</h2>-->
<!--    </div>-->
<!--    <div class="rec-values-grid">-->
<!--      <div class="rec-val-card rv d1">-->
<!--        <div class="rec-val-ico"><i class="fal fa-rocket"></i></div>-->
<!--        <div class="rec-val-title">Mission qui a du sens</div>-->
<!--        <p class="rec-val-desc">Nous aidons les entreprises à tirer parti de l'intelligence artificielle pour automatiser, croître et innover. Chaque ligne de code que vous écrivez a un impact concret.</p>-->
<!--      </div>-->
<!--      <div class="rec-val-card rv d2">-->
<!--        <div class="rec-val-ico"><i class="fal fa-brain"></i></div>-->
<!--        <div class="rec-val-title">Technologies d'avant-garde</div>-->
<!--        <p class="rec-val-desc">LLM, agents autonomes, voice AI, RAG, orchestration multi-agents. Vous travaillez avec les outils les plus avancés du marché dès le premier jour.</p>-->
<!--      </div>-->
<!--      <div class="rec-val-card rv d3">-->
<!--        <div class="rec-val-ico"><i class="fal fa-users"></i></div>-->
<!--        <div class="rec-val-title">Équipe internationale</div>-->
<!--        <p class="rec-val-desc">Une équipe multiculturelle passionnée, distribuée entre Marrakech et l'Europe, avec une communication ouverte et un management horizontal.</p>-->
<!--      </div>-->
<!--      <div class="rec-val-card rv d1">-->
<!--        <div class="rec-val-ico"><i class="fal fa-chart-line"></i></div>-->
<!--        <div class="rec-val-title">Croissance accélérée</div>-->
<!--        <p class="rec-val-desc">Portés par la vague IA, nos projets se multiplient. Les opportunités d'évolution sont réelles et rapides — pas de plafond de verre ici.</p>-->
<!--      </div>-->
<!--      <div class="rec-val-card rv d2">-->
<!--        <div class="rec-val-ico"><i class="fal fa-balance-scale"></i></div>-->
<!--        <div class="rec-val-title">Équilibre vie pro / perso</div>-->
<!--        <p class="rec-val-desc">Flexibilité horaire, remote-friendly, culture de la confiance. Nous jugeons sur les résultats, pas sur le temps de présence.</p>-->
<!--      </div>-->
<!--      <div class="rec-val-card rv d3">-->
<!--        <div class="rec-val-ico"><i class="fal fa-graduation-cap"></i></div>-->
<!--        <div class="rec-val-title">Formation &amp; montée en compétences</div>-->
<!--        <p class="rec-val-desc">Accès aux certifications, conférences, budget formation. Dans l'IA tout va vite — nous investissons dans votre apprentissage permanent.</p>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<!-- ══════════════════════════════════════════════════
     STATS
════════════════════════════════════════════════════ -->


<!-- ══════════════════════════════════════════════════
     OFFRES D'EMPLOI
════════════════════════════════════════════════════ -->
<section class="rec-jobs" id="offres">
  <div class="container">
    <div class="rec-jobs-hdr rv">
      <div class="rec-jobs-hdr-left">
        <p class="sec-label">Offres actuelles</p>
        <h2 class="sh-h2">Nos <em>postes ouverts</em></h2>
      </div>
      <?php if(!empty($jobs)): ?>
      <span class="rec-jobs-count"><?= count($jobs) ?> offre<?= count($jobs) > 1 ? 's' : '' ?> disponible<?= count($jobs) > 1 ? 's' : '' ?></span>
      <?php endif; ?>
    </div>

    <?php if(!empty($jobs)): ?>
    <div class="rec-jobs-grid">
      <?php foreach($jobs as $i => $job):
        $photo = $job->getPhoto() != "" ? $siteURL . 'images/jobs/' . $job->getPhoto() : '';
        $delay = ($i % 4) + 1;
      ?>
      <div class="rec-job-card rv d<?= $delay ?>">
        <div class="rec-job-img">
          <?php if($photo): ?>
            <img src="<?= $photo ?>" alt="<?= htmlspecialchars($job->getTitre(), ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
          <?php else: ?>
            <div class="rec-job-img-placeholder"><i class="fal fa-briefcase"></i></div>
          <?php endif; ?>
          <span class="rec-job-tag"><i class="fal fa-circle-dot" style="margin-right:.35rem;font-size:.55rem;color:var(--gold2)"></i>Emploi</span>
        </div>
        <div class="rec-job-body">
          <div class="rec-job-date"><i class="fal fa-calendar-alt" style="margin-right:.4rem"></i><?= normaldate($job->getDateAdd()) ?></div>
          <h3 class="rec-job-title"><?= htmlspecialchars($job->getTitre(), ENT_QUOTES, 'UTF-8') ?></h3>
          <div class="rec-job-desc"><?= $job->getDescription() ?></div>
          <div class="rec-job-footer">
            <button class="rec-job-apply apply-job" data-id="<?= $job->getId() ?>">
              Postuler <i class="fal fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="rec-no-jobs rv">
      <i class="fal fa-search"></i>
      <p>Aucune offre en ce moment — revenez prochainement ou envoyez une candidature spontanée.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ══════════════════════════════════════════════════
     CANDIDATURE SPONTANÉE
════════════════════════════════════════════════════ -->
<!--<section class="rec-cta">-->
<!--  <div class="container">-->
<!--    <div class="rec-cta-inner">-->
<!--      <div>-->
<!--        <div class="rec-cta-label rv">Candidature spontanée</div>-->
<!--        <h2 class="rec-cta-title rv d1">Votre profil n'est <em>pas listé</em>&nbsp;?</h2>-->
<!--        <p class="rec-cta-sub rv d2">Même sans offre ouverte, nous sommes toujours à la recherche de talents exceptionnels. Envoyez-nous votre CV et un mot sur ce que vous souhaitez construire avec nous.</p>-->
<!--        <div class="rv d3">-->
<!--          <a href="#offres" class="sb sb-compact" data-auto-reset="true">-->
<!--            <div class="sb-label"><span class="sb-hint">Voir les offres</span></div>-->
<!--            <div class="sb-knob"><i class="fal fa-list"></i></div>-->
<!--          </a>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="rec-cta-side rv d2">-->
<!--        <div class="rec-cta-side-title">Contact recrutement</div>-->
<!--        <p class="rec-cta-side-sub">Envoyez votre CV + une courte lettre de motivation à notre équipe RH. Nous répondons à toutes les candidatures sous 72 h.</p>-->
<!--        <a href="mailto:recrute@helloworld-agency.com" class="rec-cta-email">-->
<!--          <div class="rec-cta-email-ico"><i class="fal fa-envelope"></i></div>-->
<!--          <div class="rec-cta-email-txt">-->
<!--            <span class="ttl">Email RH</span>-->
<!--            <span class="val">recrute@helloworld-agency.com</span>-->
<!--          </div>-->
<!--        </a>-->
<!--        <div style="margin-top:1.2rem;padding-top:1.2rem;border-top:1px solid var(--border)">-->
<!--          <p style="font-family:var(--fm);font-size:.72rem;font-weight:300;color:var(--txt2);line-height:1.7;margin:0">-->
<!--            <i class="fal fa-clock" style="color:var(--gold);margin-right:.4rem"></i>-->
<!--            Seules les candidatures reçues par e-mail ou via les offres ci-dessus seront traitées.-->
<!--          </p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
</section>

<!-- ══════════════════════════════════════════════════
     MODAL CANDIDATURE
════════════════════════════════════════════════════ -->
<div class="modal fade" id="jobModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content recrutement-form" style="border-radius:20px;border:1px solid var(--border);overflow:hidden">
      <div class="modal-header" style="background:var(--bg2);border-bottom:1px solid var(--border);padding:1.5rem 2rem">
        <h4 class="modal-title" style="font-family:var(--fm);font-weight:300;font-size:1.2rem;color:var(--txt)">Postuler pour cette offre</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:var(--txt2)"><i class="ti-close"></i></button>
      </div>
      <div class="modal-body recrutement-form" style="padding:2rem">
        <!-- Loaded dynamically via AJAX -->
      </div>
      <div class="modal-footer" style="background:var(--bg2);border-top:1px solid var(--border);padding:1rem 2rem;gap:.7rem">
        <button type="button" class="sb sb-compact sb-invert" data-dismiss="modal" style="font-size:.75rem">
          <div class="sb-label"><span class="sb-hint">Fermer</span></div>
          <div class="sb-knob"><i class="fal fa-times"></i></div>
        </button>
        <button type="button" class="sb sb-compact send-form">
          <div class="sb-label"><span class="sb-hint">Envoyer ma candidature</span></div>
          <div class="sb-knob"><i class="fal fa-paper-plane"></i></div>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
(function(){
  // Open modal + load form via AJAX
  document.querySelectorAll('.apply-job').forEach(function(btn){
    btn.addEventListener('click', function(){
      var id = this.getAttribute('data-id');
      var modal = document.getElementById('jobModal');
      var body = modal.querySelector('.modal-body');
      body.innerHTML = '<div style="text-align:center;padding:2rem;color:var(--txt2)"><i class="fal fa-spinner fa-spin" style="font-size:2rem"></i></div>';
      $('#jobModal').modal('show');
      $.post('<?= $siteURL ?>components/com_job/controleurs/router.php?task=getForm', {id: id}, function(html){
        $(body).html(html); // jQuery .html() executes inline <script> tags
      });
    });
  });
})();
</script>
