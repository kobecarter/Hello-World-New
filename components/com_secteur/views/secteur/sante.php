<style>
/* ══ WHATSAPP CSS PHONE MOCKUP 3D ══════════════════════════════ */
/* Ambient glow */
.wa-glow{position:absolute;inset:5%;background:radial-gradient(ellipse at 40% 60%,rgba(37,211,102,.1),rgba(139,106,34,.07) 50%,transparent 70%);filter:blur(28px);z-index:0;pointer-events:none;animation:wa-glow-pulse 4s ease-in-out infinite}
@keyframes wa-glow-pulse{0%,100%{opacity:.7}50%{opacity:1}}
/* 3D group */
.wa-3d-group.wa-revealed{opacity:1;animation:wa3d-in 1s cubic-bezier(.34,1.38,.64,1) forwards}
@keyframes wa3d-in{
  from{opacity:0;transform:rotateY(-22deg) rotateX(11deg) translateY(55px) scale(.88)}
  to{opacity:1;transform:rotateY(-13deg) rotateX(5deg) translateY(0) scale(1)}
}
/* Phone outer bezel */
.wa-phone{width:210px;border-radius:36px;background:linear-gradient(165deg,#2d2d2d 0%,#111 100%);padding:8px;position:relative;z-index:2;
  box-shadow:-18px 26px 60px rgba(0,0,0,.42),-6px 8px 22px rgba(0,0,0,.24),0 2px 4px rgba(0,0,0,.18),
    inset 0 1px 0 rgba(255,255,255,.13),inset 0 -1px 0 rgba(0,0,0,.55),inset -1px 0 0 rgba(255,255,255,.05)}
/* Rim shimmer */
.wa-phone::before{content:'';position:absolute;inset:0;border-radius:36px;background:linear-gradient(130deg,rgba(255,255,255,.09) 0%,transparent 40%);pointer-events:none;z-index:5}
/* Screen */
.wa-screen{border-radius:29px;overflow:hidden;font-family:var(--fm)}
/* Status bar */
.wa-sbar{background:#075E54;padding:.24rem .65rem .18rem;display:flex;justify-content:space-between;align-items:center}
.wa-sbar-time{font-size:.47rem;font-weight:700;color:#fff}
.wa-sbar-icons{display:flex;gap:4px;align-items:center;color:#fff;font-size:.42rem}
/* Header */
.wa-hdr{background:#075E54;padding:.38rem .55rem;display:flex;align-items:center;gap:.38rem;border-bottom:1px solid rgba(0,0,0,.08)}
.wa-hdr-back{color:rgba(255,255,255,.72);font-size:.6rem}
.wa-hdr-av{width:24px;height:24px;border-radius:50%;background:#128C7E;display:flex;align-items:center;justify-content:center;font-size:.48rem;font-weight:700;color:#fff;flex-shrink:0}
.wa-hdr-info{flex:1}
.wa-hdr-name{font-size:.52rem;font-weight:700;color:#fff;line-height:1.1}
.wa-hdr-status{font-size:.4rem;color:rgba(255,255,255,.62);margin-top:.04rem}
.wa-hdr-ico{display:flex;gap:6px;align-items:center;color:rgba(255,255,255,.72);font-size:.58rem}
/* Chat area */
.wa-chat-area{background:#ECE5DD;padding:.55rem .48rem;display:flex;flex-direction:column;gap:.32rem;min-height:245px;background-image:radial-gradient(circle,rgba(0,0,0,.018) 1px,transparent 1px);background-size:11px 11px}
.wa-bubble{max-width:83%;padding:.34rem .48rem;border-radius:7px;font-size:.46rem;line-height:1.52;box-shadow:0 1px 2px rgba(0,0,0,.08)}
.wa-bubble.ai{background:#fff;align-self:flex-start;border-bottom-left-radius:1px}
.wa-bubble.pt{background:#DCF8C6;align-self:flex-end;border-bottom-right-radius:1px;text-align:right}
.wa-bt{font-size:.36rem;color:rgba(0,0,0,.3);display:block;margin-top:.18rem}
/* Typing dots */
.wa-dots-wrap{background:#fff;border-radius:7px;border-bottom-left-radius:1px;padding:.3rem .48rem;align-self:flex-start;display:inline-flex;gap:3px;align-items:center;box-shadow:0 1px 2px rgba(0,0,0,.08)}
.wa-dots-wrap span{width:4px;height:4px;border-radius:50%;background:#aaa;animation:wdot .8s ease-in-out infinite}
.wa-dots-wrap span:nth-child(2){animation-delay:.15s}
.wa-dots-wrap span:nth-child(3){animation-delay:.3s}
@keyframes wdot{0%,80%,100%{transform:scale(1);opacity:.5}40%{transform:scale(1.3);opacity:1}}
/* Input row */
.wa-irow{background:#f0f0f0;padding:.35rem .48rem;display:flex;align-items:center;gap:.32rem;border-top:1px solid #e0e0e0}
.wa-ifake{flex:1;background:#fff;border-radius:18px;padding:.3rem .52rem;font-size:.43rem;color:#aaa}
.wa-isend{width:21px;height:21px;border-radius:50%;background:#075E54;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.44rem;flex-shrink:0}
/* Android nav bar */
.wa-navb{background:#111;padding:.28rem .5rem;display:flex;justify-content:space-around;align-items:center}
.wa-navb span{font-size:.6rem;color:rgba(255,255,255,.45);display:block;line-height:1}

/* ── Notification overlay card ── */
.wa-notif{position:absolute;right:-100px;top:50%;transform:translate3d(0,-50%,28px);width:185px;border-radius:13px;overflow:hidden;background:#fff;
  box-shadow:0 18px 44px rgba(0,0,0,.2),0 4px 12px rgba(0,0,0,.1),0 0 0 1px rgba(0,0,0,.06);
  z-index:10;animation:notif-float 4.5s ease-in-out infinite .6s}
@keyframes notif-float{0%,100%{transform:translate3d(0,-50%,28px) translateY(0)}50%{transform:translate3d(0,-50%,28px) translateY(-7px)}}
.wa-notif-hdr{background:#075E54;padding:.46rem .65rem;display:flex;align-items:center;gap:.4rem}
.wa-notif-av{width:21px;height:21px;border-radius:50%;background:#128C7E;display:flex;align-items:center;justify-content:center;font-size:.44rem;font-weight:700;color:#fff;flex-shrink:0}
.wa-notif-name{font-size:.5rem;font-weight:700;color:#fff;line-height:1.1}
.wa-notif-st{font-size:.38rem;color:rgba(255,255,255,.62);margin-top:.03rem}
.wa-notif-msg{padding:.6rem .65rem .4rem;font-size:.6rem;font-weight:700;color:#111;line-height:1.35;border-bottom:1px solid #f0f0f0}
.wa-notif-rep{padding:.38rem .65rem;display:flex;align-items:center;gap:.35rem;color:#bbb;font-size:.46rem;border-bottom:1px solid #f0f0f0}
.wa-notif-acts{display:flex}
.wa-notif-act{flex:1;padding:.38rem;text-align:center;font-family:var(--fm);font-size:.48rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#666;cursor:pointer;transition:background .2s,color .2s}
.wa-notif-act:hover{background:#f5f5f5;color:#075E54}
.wa-notif-act+.wa-notif-act{border-left:1px solid #f0f0f0}

/* ── WhatsApp logo badge ── */
.wa-logo{position:absolute;top:-14px;right:-28px;width:50px;height:50px;border-radius:50%;background:#25D366;display:flex;align-items:center;justify-content:center;
  box-shadow:0 8px 24px rgba(37,211,102,.38),0 4px 10px rgba(0,0,0,.14);z-index:15;
  animation:logo-float 3.8s ease-in-out infinite 1.2s}
@keyframes logo-float{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-9px) rotate(6deg)}}
.wa-logo svg{width:26px;height:26px;fill:#fff}    
</style>
<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="sh-hero">
  <canvas id="sh-canvas"></canvas>

  <div class="sh-hero-body">
    <div class="container">
      <div class="sh-hero-inner">

        <!-- LEFT -->
        <div class="sh-hero-left">
          <div class="sh-breadcrumb rv">Solutions IA — Secteur Santé</div>
          <h1 class="sh-h1 rv d1">
            Solutions IA<br>
            pour <em>la Santé</em><br>
            &amp; les Médecins
          </h1>
          <p class="sh-sub rv d2">Modernisez l'accueil patient et supprimez l'absentéisme grâce à l'automatisation intelligente de vos prises de rendez-vous au Maroc.</p>
          <div class="sh-cta-row rv d3">
            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Voir les solutions" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les solutions</span></div>
              <div class="sb-knob"><i class="fal fa-stethoscope"></i></div>
            </a>
        
            <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Demander un audit IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un audit IA</span></div>
              <div class="sb-knob"><i class="fal fa-search"></i></div>
            </a>
          </div>
          <div class="sh-badges rv d4">
            <div class="sh-badge"><div class="sh-badge-val">-40<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">No-shows</div></div>
            <div class="sh-badge"><div class="sh-badge-val">24/7</div><div class="sh-badge-lbl">Disponibilité</div></div>
            <div class="sh-badge"><div class="sh-badge-val">+25<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Remplissage</div></div>
            <div class="sh-badge"><div class="sh-badge-val">92<span style="font-size:.9em">%</span></div><div class="sh-badge-lbl">Automatisé</div></div>
          </div>
        </div>

        <!-- RIGHT — 3D Medical Orbital -->
        <div class="sh-hero-right">
          <div class="sho-scene">
            <div class="sho-ring r1"></div>
            <div class="sho-ring r2"></div>
            <div class="sho-ring r3"></div>
            <div class="sho-core">
              <div class="sho-plus">✚</div>
              <div class="sho-lbl">Santé IA</div>
            </div>

            <!-- Inner orbit (r=100px) -->
            <div class="sho-orb o1" style="--dl:0s"><div class="sho-ic" data-tip="Doctolib"><i class="fal fa-calendar-check"></i></div></div>
            <div class="sho-orb o1" style="--dl:-5.3s"><div class="sho-ic" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></div></div>
            <div class="sho-orb o1" style="--dl:-10.6s"><div class="sho-ic" data-tip="Google Agenda"><i class="fab fa-google"></i></div></div>

            <!-- Middle orbit (r=170px) -->
            <div class="sho-orb o2" style="--dl:0s"><div class="sho-ic" data-tip="SMS Relances"><i class="fal fa-sms"></i></div></div>
            <div class="sho-orb o2" style="--dl:-6s"><div class="sho-ic" data-tip="Logiciel médical"><i class="fal fa-laptop-medical"></i></div></div>
            <div class="sho-orb o2" style="--dl:-12s"><div class="sho-ic" data-tip="Paiement CMI"><i class="fal fa-credit-card"></i></div></div>
            <div class="sho-orb o2" style="--dl:-18s"><div class="sho-ic" data-tip="Dossier patient"><i class="fal fa-file-medical"></i></div></div>

            <!-- Outer orbit (r=222px) -->
            <div class="sho-orb o3" style="--dl:0s"><div class="sho-ic" data-tip="CNDP Conforme"><i class="fal fa-shield-alt"></i></div></div>
            <div class="sho-orb o3" style="--dl:-6.8s"><div class="sho-ic" data-tip="Crossway / Logos"><div class="ltr">Rx</div></div></div>
            <div class="sho-orb o3" style="--dl:-13.6s"><div class="sho-ic" data-tip="Analytics RDV"><i class="fal fa-chart-line"></i></div></div>
            <div class="sho-orb o3" style="--dl:-20.4s"><div class="sho-ic" data-tip="Notifications"><i class="fal fa-bell"></i></div></div>
            <div class="sho-orb o3" style="--dl:-27.2s"><div class="sho-ic" data-tip="QR Code Salle"><i class="fal fa-qrcode"></i></div></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ══ STAT STRIP ════════════════════════════════════════════════ -->
<section class="sh-stats">
  <div class="container">
    <div class="sh-stats-grid">
      <div class="sh-stat rv">
        <div class="sh-stat-val"><span class="sh-counter" data-target="40">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Absentéisme réduit</div>
        <div class="sh-stat-sub">Relances automatiques J-1 & H-2</div>
      </div>
      <div class="sh-stat rv d1">
        <div class="sh-stat-val" style="font-size:clamp(2rem,4vw,4rem)">24<span class="suf">/7</span></div>
        <div class="sh-stat-lbl">Prise de rendez-vous</div>
        <div class="sh-stat-sub">Sans intervention secrétariat</div>
      </div>
      <div class="sh-stat rv d2">
        <div class="sh-stat-val"><span class="sh-counter" data-target="92">0</span><span class="suf">%</span></div>
        <div class="sh-stat-lbl">Traitement autonome</div>
        <div class="sh-stat-sub">Sans intervention humaine</div>
      </div>
      <div class="sh-stat rv d3">
        <div class="sh-stat-val"><span class="sh-counter" data-target="5">0</span><span class="suf">h</span></div>
        <div class="sh-stat-lbl">Économie secrétariat</div>
        <div class="sh-stat-sub">Par semaine et par cabinet</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ CONTEXTE & ENJEUX ════════════════════════════════════════ -->
<section class="sh-context">
  <div class="container">
    <div class="sh-context-inner">

      <div>
        <div class="sec-label">Contexte &amp; Enjeux</div>
        <h2 class="sh-ctx-title rv"><strong>Secteur médical</strong>Pourquoi l'IA devient<br>indispensable au Maroc</h2>
        <div class="sh-ctx-body rv d1">
          <p>Le secteur médical marocain souffre d'un <em>engorgement chronique des secrétariats</em>. Les médecins perdent un temps précieux face aux no-shows (rendez-vous non honorés) et à la gestion administrative. L'IA permet aujourd'hui de libérer le temps médical en automatisant la relation patient de bout en bout, avec une rigueur absolue sur la confidentialité des données (normes <em>CNDP</em>).</p>
          <p>Entre la pression des patients exigeant une réactivité 24/7 et la nécessité de fiabiliser l'agenda des praticiens, l'adoption d'un agent conversationnel devient un <em>standard de qualité de service</em> pour les cabinets, cliniques et centres d'imagerie modernes au Maroc.</p>
        </div>
        <div class="sh-pills rv d2">
          <span class="sh-pill"><i class="fal fa-exclamation-triangle"></i> Engorgement secrétariats</span>
          <span class="sh-pill"><i class="fal fa-ban"></i> Taux de no-shows élevé</span>
          <span class="sh-pill"><i class="fal fa-moon"></i> Zéro disponibilité après 18h</span>
          <span class="sh-pill"><i class="fal fa-shield-alt"></i> Conformité CNDP requise</span>
          <span class="sh-pill"><i class="fal fa-clock"></i> Gestion chronophage des RDV</span>
        </div>
      </div>

      <!-- CSS ART Visual -->
      <div class="sh-ctx-visual rv d2">
        <div class="sh-ctx-blob"></div>
        <div class="sh-ctx-blob2"></div>
        <div class="sh-ctx-center"><div class="sh-ctx-cross">✚</div></div>
        <div class="sh-fcard fc1">
          <div class="sh-fcard-val">280</div>
          <div class="sh-fcard-lbl">RDV/mois</div>
        </div>
        <div class="sh-fcard fc2">
          <div class="sh-fcard-val">-40%</div>
          <div class="sh-fcard-lbl">No-shows</div>
        </div>
        <div class="sh-fcard fc3">
          <div class="sh-fcard-val">5h</div>
          <div class="sh-fcard-lbl">Économisées/sem.</div>
        </div>
        <div class="sh-fcard fc4">
          <div class="sh-fcard-val">2 mois</div>
          <div class="sh-fcard-lbl">ROI atteint</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ SOLUTIONS IA ══════════════════════════════════════════════ -->
<section class="sh-solutions" id="solutions">
  <div class="container">
    <div class="sec-label">Solutions IA — Cœur de page</div>
    <h2 class="sec-title rv">Système de gestion<br><em>des rendez-vous IA</em></h2>

    <!-- KPI Grid -->
    <div class="sol-kpi-grid rv d1">
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">-40<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Absentéisme patient</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">24/7</div>
        <div class="sol-kpi-lbl">Disponibilité agent IA</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">+25<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Taux remplissage agenda</div>
      </div>
      <div class="sol-kpi-card">
        <div class="sol-kpi-val">92<span style="font-size:.7em">%</span></div>
        <div class="sol-kpi-lbl">Sans intervention humaine</div>
      </div>
    </div>

    <!-- Feature Card -->
    <div class="sol-feature rv">
      <!-- Left: Content -->
      <div class="sol-fc-text">
        <div class="sol-fc-title"><strong>Agent RDV Multi-Canal</strong>Gestion autonome de vos créneaux</div>
        <p class="sol-fc-desc">Agent conversationnel gérant de façon autonome la disponibilité du praticien, avec triage intelligent des motifs de consultation et optimisation du planning.</p>
        <ul class="sol-benefits">
          <li><i class="fa fa-check"></i><span><strong>Prise de RDV 24/7</strong> — Patients peuvent réserver même hors heures de bureau</span></li>
          <li><i class="fa fa-check"></i><span><strong>Relances automatiques</strong> — SMS + WhatsApp à J-1 et H-2 avant consultation</span></li>
          <li><i class="fa fa-check"></i><span><strong>Libération immédiate</strong> — Créneaux annulés automatiquement libérés pour autres patients</span></li>
          <li><i class="fa fa-check"></i><span><strong>Optimisation du planning</strong> — Durée des actes prise en compte automatiquement</span></li>
          <li><i class="fa fa-check"></i><span><strong>Questionnaire pré-consultation</strong> — Formulaire conversationnel pour antécédents et motif exact</span></li>
          <li><i class="fa fa-check"></i><span><strong>Gestion proactive des no-shows</strong> — Relances ciblées par détection comportementale</span></li>
        </ul>
        <div class="sol-roi-box">
          <div class="sol-roi-num">0,3</div>
          <div class="sol-roi-text"><strong>ETP économisé par cabinet de taille moyenne.</strong><br>5 heures de secrétariat sauvées par semaine, investissement rentabilisé en 2 mois.</div>
        </div>
      </div>

      <!-- Right: WhatsApp CSS Mockup 3D -->
      <div class="sol-fc-visual">
        <div class="wa-scene" id="waScene">
          <div class="wa-glow"></div>

          <div class="wa-3d-group" id="wa3dGroup">
            <!-- WhatsApp logo badge -->
            <div class="wa-logo" aria-hidden="true">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </div>

            <!-- Phone Frame -->
            <div class="wa-phone">
              <div class="wa-screen">
                <!-- Status bar -->
                <div class="wa-sbar">
                  <span class="wa-sbar-time">18:17</span>
                  <div class="wa-sbar-icons">
                    <i class="fa fa-signal"></i>
                    <i class="fa fa-wifi"></i>
                    <i class="fa fa-battery-three-quarters"></i>
                  </div>
                </div>
                <!-- Header -->
                <div class="wa-hdr">
                  <span class="wa-hdr-back">&#8592;</span>
                  <div class="wa-hdr-av">Dr</div>
                  <div class="wa-hdr-info">
                    <div class="wa-hdr-name">Cabinet Dr. Benali</div>
                    <div class="wa-hdr-status">Agent IA · En ligne</div>
                  </div>
                  <div class="wa-hdr-ico">
                    <i class="fa fa-video"></i>
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-ellipsis-vertical"></i>
                  </div>
                </div>
                <!-- Chat -->
                <div class="wa-chat-area">
                  <div class="wa-bubble ai">Bonjour ! Je suis l'assistant IA du Cabinet Dr. Benali. Souhaitez-vous prendre un rendez-vous ?<span class="wa-bt">09:14</span></div>
                  <div class="wa-bubble pt">Oui, je voudrais voir le médecin cette semaine 🙏<span class="wa-bt">09:15</span></div>
                  <div class="wa-bubble ai">Bien sûr ! Pour quel type de consultation : <strong>générale</strong>, <strong>suivi</strong> ou <strong>urgence</strong> ?<span class="wa-bt">09:15</span></div>
                  <div class="wa-bubble pt">Consultation générale<span class="wa-bt">09:15</span></div>
                  <div class="wa-bubble ai">Parfait ! Voici les créneaux :<br>📅 <strong>Mer 25 Jan · 10h30</strong><br>📅 <strong>Jeu 26 Jan · 14h00</strong><br>📅 <strong>Ven 27 Jan · 09h00</strong><br>Lequel vous convient ?<span class="wa-bt">09:15</span></div>
                  <div class="wa-bubble pt">Mercredi 10h30 ✅<span class="wa-bt">09:16</span></div>
                  <div class="wa-dots-wrap"><span></span><span></span><span></span></div>
                </div>
                <!-- Input -->
                <div class="wa-irow">
                  <div class="wa-ifake">Écrire un message...</div>
                  <div class="wa-isend"><i class="fa fa-paper-plane"></i></div>
                </div>
                <!-- Android nav -->
                <div class="wa-navb">
                  <span>&#9664;</span><span>&#9711;</span><span>&#9632;</span>
                </div>
              </div>
            </div>

            <!-- Notification overlay -->
            <div class="wa-notif">
              <div class="wa-notif-hdr">
                <div class="wa-notif-av">Dr</div>
                <div>
                  <div class="wa-notif-name">Cabinet Dr. Benali</div>
                  <div class="wa-notif-st">Agent IA · En ligne</div>
                </div>
              </div>
              <div class="wa-notif-msg">Rendez-vous •<br>Mer 25 Jan • 10h30</div>
              <div class="wa-notif-rep"><i class="fa fa-face-smile"></i> Répondre</div>
              <div class="wa-notif-acts">
                <div class="wa-notif-act">CLOSE</div>
                <div class="wa-notif-act">VIEW</div>
              </div>
            </div>

          </div><!-- /wa-3d-group -->
        </div><!-- /wa-scene -->
      </div>
    </div>

  </div>
</section>

<!-- ══ PARCOURS CLIENT — IMAGE PARALLAX + BEAM PROGRESSIF ════════ -->
<section class="sh-journey" id="parcours">

  <div class="jp-bg">
    <img id="jpImg" class="jp-img"
         src="<?php echo $siteURL; ?>images/parcours-bg.jpeg"
         alt="Clinique médicale moderne Hello World Agency"
         loading="eager"
         decoding="async"
         width="1584" height="672">
  </div>

  <div class="jp-content">
    <div class="container">
      <div class="sec-label">Parcours client typique</div>
      <h2 class="sec-title rv">Expérience patient<br><em>de A à Z</em></h2>
      <p class="rv d1">Trois canaux d'entrée, une expérience unifiée. Choisissez le parcours correspondant à votre patientèle.</p>

      <div class="tab-nav rv d2">
        <button class="tab-btn active" data-tab="wa">Via WhatsApp</button>
        <button class="tab-btn" data-tab="qr">Via QR Code</button>
        <button class="tab-btn" data-tab="web">Via Site Web</button>
      </div>

      <!-- Tab 1: WhatsApp -->
      <div class="tab-pane active" id="tab-wa">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWa"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Message WhatsApp</div><p class="jf-desc">Patient envoie un message au numéro du cabinet sur WhatsApp Business</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Triage IA</div><p class="jf-desc">L'IA identifie le motif (consultation, urgence, suivi) et propose les créneaux disponibles</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Réservation</div><p class="jf-desc">RDV enregistré en temps réel dans le logiciel médical et l'agenda Google du praticien</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Rappels J-1 &amp; H-2</div><p class="jf-desc">Notifications automatiques SMS + WhatsApp avant la consultation pour éviter les no-shows</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Confirmation</div><p class="jf-desc">Patient confirme sa présence ou le créneau est automatiquement libéré pour un autre patient</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Pré-consultation</div><p class="jf-desc">Questionnaire antécédents et motif rempli par voie conversationnelle avant l'arrivée</p></div>
        </div>
      </div>

      <!-- Tab 2: QR Code -->
      <div class="tab-pane" id="tab-qr">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamQr"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">QR Code salle</div><p class="jf-desc">Patient scanne le QR code affiché en salle d'attente ou sur la carte de visite du cabinet</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Activation agent</div><p class="jf-desc">Ouverture automatique de WhatsApp avec message pré-rempli — zéro effort pour le patient</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Sélection créneau</div><p class="jf-desc">L'IA présente les créneaux libres selon la durée du type d'acte médical sélectionné</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Confirmation instantanée</div><p class="jf-desc">Le patient reçoit une confirmation illustrée avec adresse, heure et nom du praticien</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Acompte optionnel</div><p class="jf-desc">Pour les actes spécialisés, collecte d'un acompte via lien CMI pour sécuriser le créneau</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Suivi post-visite</div><p class="jf-desc">Message de satisfaction automatique 24h après la consultation pour enrichir le NPS cabinet</p></div>
        </div>
      </div>

      <!-- Tab 3: Web -->
      <div class="tab-pane" id="tab-web">
        <div class="journey-flow">
          <div class="jf-track-wrap"><div class="jf-beam" id="jfBeamWeb"></div></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">1</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Widget sur site</div><p class="jf-desc">Patient clique sur le chatbot IA intégré au site du cabinet ou de la clinique</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">2</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Identification</div><p class="jf-desc">Saisie rapide du nom et numéro de téléphone pour personnaliser la conversation</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">3</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Calendrier intelligent</div><p class="jf-desc">Affichage des disponibilités en temps réel, filtré par spécialité et durée de consultation</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">4</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">RDV synchronisé</div><p class="jf-desc">Enregistrement simultané dans le logiciel médical, Doctolib et Google Agenda du praticien</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">5</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Rappels multicanaux</div><p class="jf-desc">Séquence de rappels : email confirmation, SMS J-1, WhatsApp H-2 avec lien d'annulation</p></div>
          <div class="jf-step"><div class="jf-num-wrap"><div class="jf-num">6</div><i class="fa fa-check jf-check"></i></div><div class="jf-title">Check-in digital</div><p class="jf-desc">Formulaire pré-consultation envoyé 2h avant le RDV pour optimiser le temps du praticien</p></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ INTÉGRATIONS — ACCORDION ════════════════════════════════ -->
<section class="sh-integrations" id="integrations">
  <div class="container">
    <div class="sec-label">Intégrations clés</div>
    <h2 class="sec-title rv">Connecté à votre<br><em>écosystème médical</em></h2>

    <div class="sh-int-inner">

      <!-- Accordion -->
      <div class="accordion rv d1">

        <div class="acc-item open">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-calendar-check"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Doctolib</span>
              <span class="acc-sub">Synchronisation bidirectionnelle agenda</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Synchronisation bidirectionnelle en temps réel avec votre agenda Doctolib. Les réservations effectuées via l'agent IA (WhatsApp, QR code ou site web) apparaissent instantanément dans Doctolib pour toute l'équipe. Les annulations sont automatiquement répercutées sur les deux systèmes, éliminant tout risque de double-booking.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-laptop-medical"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Logiciels de cabinet</span>
              <span class="acc-sub">Crossway, Logos, Osiris et autres</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Intégration API native avec les principaux logiciels de gestion de cabinet médicaux utilisés au Maroc. Le dossier patient est automatiquement créé ou mis à jour lors de chaque réservation. Les résultats du questionnaire pré-consultation sont versés directement dans le dossier numérique du praticien.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-google"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Google Agenda</span>
              <span class="acc-sub">Sync temps réel avec le praticien</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Synchronisation en temps réel avec l'agenda personnel Google du praticien pour éviter tout conflit de planning. L'agent IA consulte l'agenda avant chaque proposition de créneau. Les événements bloqués (formation, congrès, congés) sont automatiquement exclus des disponibilités proposées aux patients.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fab fa-whatsapp"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">WhatsApp Business API</span>
              <span class="acc-sub">Canal principal de communication patient</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>API WhatsApp officielle (Meta Business) pour des conversations natives dans l'application que vos patients utilisent déjà quotidiennement. Modèles de messages pré-approuvés par Meta, analytics détaillées des taux d'ouverture et de réponse, et conformité RGPD totale. Taux d'ouverture moyen de 94% vs 21% pour l'email.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-credit-card"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Passerelles de paiement</span>
              <span class="acc-sub">CMI, Stripe — acomptes automatiques</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Collecte automatique d'acomptes pour les actes spécialisés ou les blocs opératoires. L'agent IA envoie un lien de paiement sécurisé (CMI pour les cartes marocaines, Stripe international) après confirmation du créneau. Remboursement automatique en cas d'annulation respectant les délais prévus. Réduit les no-shows de 68% supplémentaires.</p>
            </div>
          </div>
        </div>

        <div class="acc-item">
          <button class="acc-trigger">
            <div class="acc-ico"><i class="fal fa-shield-alt"></i></div>
            <div class="acc-lbl-wrap">
              <span class="acc-title">Hébergement HDS & CNDP</span>
              <span class="acc-sub">Données médicales sécurisées au Maroc</span>
            </div>
            <div class="acc-arr"><i class="fa fa-chevron-down"></i></div>
          </button>
          <div class="acc-body">
            <div class="acc-content">
              <p>Hébergement des données de santé conforme aux normes CNDP (loi 09-08) et HDS si requis. Chiffrement AES-256 des données au repos et en transit. Aucune donnée patient transmise à des modèles d'IA tiers pour l'entraînement. Rapport de conformité CNDP fourni à la fin de la Phase 0 de déploiement.</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Visual Integration Hub -->
      <div class="sh-int-visual rv d2">
        <div class="sh-int-card">
          <div class="sec-label" style="margin-bottom:.8rem">Connexions actives</div>
          <div class="sh-int-orbit">
            <div class="sio-ring r1">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-calendar-check"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fab fa-whatsapp"></i></div>
            </div>
            <div class="sio-ring r2">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-laptop-medical"></i></div>
              <div class="sio-dot" style="right:-18px;top:50%;transform:translateY(-50%)"><i class="fab fa-google"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-credit-card"></i></div>
            </div>
            <div class="sio-ring r3">
              <div class="sio-dot" style="top:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-shield-alt"></i></div>
              <div class="sio-dot" style="right:-18px;top:50%;transform:translateY(-50%)"><i class="fal fa-sms"></i></div>
              <div class="sio-dot" style="bottom:-18px;left:50%;transform:translateX(-50%)"><i class="fal fa-qrcode"></i></div>
              <div class="sio-dot" style="left:-18px;top:50%;transform:translateY(-50%)"><i class="fal fa-bell"></i></div>
            </div>
            <div class="sio-center"><span>IA</span></div>
          </div>
          <div style="text-align:center;margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid var(--border)">
            <div style="font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--txt2)">Intégration en quelques heures</div>
            <div style="font-family:var(--fm);font-size:.72rem;color:var(--txt);margin-top:.4rem;font-weight:300">Aucune refonte de votre système existant</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ DÉPLOIEMENT ═══════════════════════════════════════════════ -->
<!-- ══ DÉPLOIEMENT — TIMELINE LIGHT (style solutions-ia) ════════ -->
<section class="sdtl-section" id="deploiement">

  <!-- 3D Background orb subtil -->
  <div class="sdtl-orb-wrap" aria-hidden="true">
    <div class="sdtl-orb" id="sdtlOrb">
      <div class="sdtl-orb-ring r1"></div>
      <div class="sdtl-orb-ring r2"></div>
      <div class="sdtl-orb-ring r3"></div>
      <div class="sdtl-orb-ring r4"></div>
    </div>
  </div>

  <div class="container">
    <div class="sdtl-header">
      <div class="sec-label">Déploiement adapté Santé</div>
      <h2 class="sec-title rv">Méthodologie en phases<br><em>certifiée CNDP</em></h2>
      <p class="sdtl-intro rv d1">Une approche structurée et certifiée conçue pour protéger les données patients dès le premier jour et maximiser le ROI de votre transformation IA.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Conformité CNDP</div>
            <p class="sdtl-desc">Cartographie complète des flux de données patients, signature des engagements de confidentialité, définition du périmètre HDS si requis.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Rapport CNDP validation</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Contrats de confidentialité</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Plan HDS infrastructure</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Audit des flux de données</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 1 – 2</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-shield-alt"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Conformité</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Pilote</div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-flask"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Pilote mono-praticien</div>
            <p class="sdtl-desc">Entraînement de l'agent IA sur les créneaux réels d'un médecin pilote pendant 1 mois. Ajustements continus basés sur l'usage concret.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Agent entraîné et testé</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Rapports qualité RDV</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Feedback praticien collecté</span></div>
              <div class="sdtl-li"><i class="fa fa-circle"></i><span>Optimisation des réponses</span></div>
            </div>
            <span class="sdtl-tag">SEMAINES 3 – 6</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Généralisation</div>
            <p class="sdtl-desc">Déploiement à l'ensemble des praticiens, formation des secrétaires à la supervision humaine, support et monitoring continus.</p>
            <div style="margin-top:1rem">
              <div class="sdtl-li"><span>Manuel de supervision</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Formation staff complète</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Support 24/7 inclus</span><i class="fa fa-circle"></i></div>
              <div class="sdtl-li"><span>Dashboard monitoring</span><i class="fa fa-circle"></i></div>
            </div>
            <span class="sdtl-tag">SEMAINES 7 – 10</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-rocket"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Go-Live</div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>

<!-- ══ CAS CLIENT ════════════════════════════════════════════════ -->
<section class="sh-case" id="cas-client">
  <div class="container">
    <div class="sec-label">Cas client — Étude de succès</div>
    <h2 class="sec-title rv">Résultats concrets<br><em>en secteur médical</em></h2>

    <div class="case-wrap rv d1">

      <!-- Left: Context + Problem -->
      <div class="case-left">
        <div class="case-tag">Étude de cas · Centre Ophtalmologique · Casablanca</div>
        <h3 class="case-headline">Centre d'ophtalmologie<br>4 praticiens, 280 RDV/mois</h3>
        <p class="case-ctx"><strong>Contexte :</strong> Structure avec 4 praticiens traitant 280 rendez-vous par mois. Taux de no-shows de 18%, secrétariat saturé, impossible de répondre aux patients après 18h.</p>
        <div class="case-problem">
          <div class="case-problem-label">Problème identifié</div>
          <div class="case-problem-text">Taux d'absentéisme patients élevé → créneaux non utilisés → perte directe de chiffre d'affaires. Les secrétaires consacraient 60% de leur temps aux appels inbound. Les patients frustrés par l'indisponibilité téléphonique prenaient RDV chez la concurrence.</div>
        </div>
        <div>
          <div class="case-solution-label" style="font-family:var(--fm);font-size:.55rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--txt2);margin-bottom:.45rem">Solution déployée</div>
          <div class="case-solution-text" style="font-size:.8rem;color:var(--txt2);line-height:1.8">Agent RDV WhatsApp + rappels SMS à J-1 et H-2 avant consultation. Intégration avec logiciel de gestion cabinet existant. Formation des 3 secrétaires à la supervision de l'agent IA.</div>
        </div>
      </div>

      <!-- Right: Results -->
      <div class="case-right">
        <div>
          <div class="results-title">Résultats observés après 60 jours</div>
          <div class="results-big-grid">
            <div class="result-big">
              <div class="result-big-val">-65<span style="font-size:.7em">%</span></div>
              <div class="result-big-lbl">No-shows réduits</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">6h</div>
              <div class="result-big-lbl">Gain secrétariat/sem.</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">+22<span style="font-size:.7em">pts</span></div>
              <div class="result-big-lbl">Satisfaction NPS</div>
            </div>
            <div class="result-big">
              <div class="result-big-val">2<span style="font-size:.7em">mois</span></div>
              <div class="result-big-lbl">ROI atteint</div>
            </div>
          </div>
        </div>
        <div class="case-testimonial">
          <p class="ct-text">Nos secrétaires se concentrent désormais sur l'accueil physique des patients, le suivi des dossiers complexes et l'écoute active. Le service client perçu s'est nettement amélioré, et nos praticiens sont ravis de ne plus avoir de créneaux vides.</p>
          <div class="ct-author">— Direction, Centre d'ophtalmologie Casablanca</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FINAL CTA ════════════════════════════════════════════════ -->
 <section class="cta-band" id="cta" style="background-image:url('<?php echo $siteURL; ?>images/sante.jpg')">
  <span class="px-ghost" data-px="0.2" style="font-size:clamp(14rem,30vw,44rem);bottom:-2rem;right:-1rem;color:rgba(247,245,242,.022)" aria-hidden="true">Santé</span>
  <div class="container" style="position:relative;z-index:2">
    <div class="sec-label">Vous êtes prêt à passer à l’action ?</div>
    <h2 class="sec-title" style="text-align:center;margin-bottom:1.5rem">Réduisez les no-shows et <br>simplifiez<em> la prise de <br>rendez-vous</em></h2>
    <p class="cta-sub">Mettez en place un système IA capable d’automatiser les confirmations, les rappels et l’organisation de l’agenda médical, tout en améliorant l’expérience patient et la qualité de service de votre structure.</p>
    <div class="cta-btns">
        <a href="<?php echo $contactPage->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit IA gratuit" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="sb-label"><span class="sb-hint">Demander un audit IA gratuit</span></div>
            <div class="sb-knob"><i class="fal fa-stethoscope"></i></div>
        </a>

        <a href="mailto:<?php echo $config->getEmail(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Planifier une démo santé" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="sb-label"><span class="sb-hint">Planifier une démo santé</span></div>
            <div class="sb-knob"><i class="fal fa-download"></i></div>
        </a>
    </div>
  </div>
</section>

<script>
/* ── ANIMATED COUNTERS ── */
(function(){
  const counters = document.querySelectorAll('.sh-counter');
  const cio = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(!e.isIntersecting) return;
      const el = e.target;
      const target = parseInt(el.dataset.target, 10);
      const duration = 1600;
      const start = performance.now();
      function update(now){
        const p = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - p, 3);
        el.textContent = Math.round(eased * target);
        if(p < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
      cio.unobserve(el);
    });
  }, {threshold:.5});
  counters.forEach(c => cio.observe(c));
})();


/* ── TABS ── */
(function(){
  const btns = document.querySelectorAll('.tab-btn');
  const panes = document.querySelectorAll('.tab-pane');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('active'));
      panes.forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      const target = document.getElementById('tab-' + btn.dataset.tab);
      if(target){
        target.classList.add('active');
        // Re-trigger 3D reveal for new tab's steps
        target.querySelectorAll('.jf-step').forEach((s,i) => {
          s.classList.remove('jf-in');
          setTimeout(() => s.classList.add('jf-in'), i * 80);
        });
        // Beam replay handled by journey IIFE
      }
    });
  });
})();

/* ── SANTE DEPLOY TIMELINE — SCROLL-DRIVEN (light) ── */
(function(){
  const timeline  = document.getElementById('sdtlTimeline');
  const spineFill = document.getElementById('sdtlSpineFill');
  const orb       = document.getElementById('sdtlOrb');
  const steps     = document.querySelectorAll('.sdtl-step');
  if(!timeline || !spineFill) return;

  let rafId = null;
  function updateTimeline(){
    const rect = timeline.getBoundingClientRect();
    const vh   = window.innerHeight;
    /* Spine fill: progresse quand la section scroll dans le viewport */
    const raw  = (vh * 0.65 - rect.top) / (rect.height + vh * 0.05);
    const p    = Math.max(0, Math.min(1, raw));
    spineFill.style.height = (p * 100) + '%';
    /* Orb rotation liée au scroll global */
    if(orb){
      const sp = window.scrollY / Math.max(1, document.body.scrollHeight - vh);
      orb.style.transform =
        `rotateY(${(sp * 720).toFixed(2)}deg) rotateX(${(sp * 300).toFixed(2)}deg)`;
    }
    rafId = null;
  }
  function onScroll(){
    if(!rafId) rafId = requestAnimationFrame(updateTimeline);
  }

  /* Steps: activés à l'entrée dans le viewport (22% visible) */
  const stepIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(e.isIntersecting){
        e.target.classList.add('active');
      } else {
        /* si le step repasse en dessous (scroll up) → désactiver */
        if(e.boundingClientRect.top > 0) e.target.classList.remove('active');
      }
    });
  }, {threshold: 0.22});
  steps.forEach(s => stepIO.observe(s));

  window.addEventListener('scroll', onScroll, {passive:true});
  window.addEventListener('resize', onScroll, {passive:true});
  updateTimeline();
})();

/* ══ JOURNEY — PARALLAX cabinet.jpeg + BEAM 1→6 + 3D GLASS HOVER ══ */
(function(){
  const section = document.getElementById('parcours');
  if(!section) return;
  const jpImg = document.getElementById('jpImg');

  /* ── Parallax : image bouge en sens inverse du scroll ±100px ── */
  function updateParallax(){
    if(!jpImg) return;
    const rect   = section.getBoundingClientRect();
    const vh     = window.innerHeight;
    const midSec = rect.top + rect.height * .5;
    const span   = vh * .5 + rect.height * .5;
    const delta  = (midSec - vh * .5) / span;       /* -1 → +1 */
    jpImg.style.transform = `translateY(${(delta * 200).toFixed(2)}px)`;
  }

  /* ── Interpolation JAUNE → VERT WhatsApp selon index step ──
     Yellow  #FFD700 = rgb(255,215,  0)
     WA Green #25D366 = rgb( 37,211,102)
     Passage par un intermédiaire sombre pour l'effet "go dark"
     Point intermédiaire (t=.5) : #128C7E = rgb(18,140,126)            */
  function stepColor(i, N){
    const t = N <= 1 ? 0 : i / (N - 1);   /* 0 = step1, 1 = step6 */
    let r, g, b;
    if(t <= .5){
      /* jaune → sombre (#128C7E) */
      const u = t * 2;
      r = Math.round(255 + (18  - 255) * u);
      g = Math.round(215 + (140 - 215) * u);
      b = Math.round(0   + (126 - 0)   * u);
    } else {
      /* sombre → WhatsApp vert */
      const u = (t - .5) * 2;
      r = Math.round(18  + (37  - 18)  * u);
      g = Math.round(140 + (211 - 140) * u);
      b = Math.round(126 + (102 - 126) * u);
    }
    return { solid:`rgb(${r},${g},${b})`, glow:`rgba(${r},${g},${b},.62)` };
  }

  /* ── Beam 1→6 — UNE SEULE FOIS, scroll-driven ── */
  function updateSteps(){
    const rect     = section.getBoundingClientRect();
    const vh       = window.innerHeight;
    const scrolled = vh - rect.top;
    const dist     = rect.height * .55;
    const pct      = Math.max(0, Math.min(1, scrolled / dist));

    const activePane = section.querySelector('.tab-pane.active');
    if(!activePane) return;
    const beam  = activePane.querySelector('.jf-beam');
    const steps = Array.from(activePane.querySelectorAll('.jf-step'));
    const N     = steps.length;

    /* Beam width + dot voyageur qui suit le même trajet jaune→sombre→vert */
    if(beam){
      beam.style.width = (pct * 100).toFixed(2) + '%';
      beam.classList.toggle('done', pct >= 1);
      /* Couleur dot = même interpolation 2 temps que stepColor */
      let dr, dg, db;
      if(pct <= .5){
        const u = pct * 2;
        dr = Math.round(255 + (18  - 255) * u);
        dg = Math.round(215 + (140 - 215) * u);
        db = Math.round(0   + (126 - 0)   * u);
      } else {
        const u = (pct - .5) * 2;
        dr = Math.round(18  + (37  - 18)  * u);
        dg = Math.round(140 + (211 - 140) * u);
        db = Math.round(126 + (102 - 126) * u);
      }
      beam.style.setProperty('--dot-color', `rgb(${dr},${dg},${db})`);
      beam.style.setProperty('--dot-glow',  `rgba(${dr},${dg},${db},.72)`);
    }

    steps.forEach((step, i) => {
      const isLit  = pct >= i / N;
      const isDone = pct >= (i + 1) / N;
      if(pct > 0) step.classList.add('jf-in');
      step.classList.toggle('jf-done',   isDone);
      step.classList.toggle('jf-active', isLit && !isDone);

      /* Injecte la couleur interpolée sur chaque step lit/done */
      if(isLit){
        const { solid, glow } = stepColor(i, N);
        step.style.setProperty('--sc',  solid);
        step.style.setProperty('--scg', glow);
      } else {
        step.style.removeProperty('--sc');
        step.style.removeProperty('--scg');
      }
    });
  }

  /* ── Scroll listener ── */
  let raf = null;
  function tick(){ updateParallax(); updateSteps(); raf = null; }
  window.addEventListener('scroll', () => { if(!raf) raf = requestAnimationFrame(tick); }, {passive:true});
  window.addEventListener('resize', () => { if(!raf) raf = requestAnimationFrame(tick); }, {passive:true});

  /* ── Reveal initial en cascade ── */
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if(!e.isIntersecting) return;
      e.target.querySelectorAll('.jf-step').forEach((s, i) => setTimeout(() => s.classList.add('jf-in'), i * 110));
      io.unobserve(e.target);
    });
  }, {threshold: .06});
  const firstFlow = section.querySelector('.tab-pane.active .journey-flow');
  if(firstFlow) io.observe(firstFlow);

  /* ── 3D Glass Tilt au hover ── */
  function attachTilt(flow){
    flow.querySelectorAll('.jf-step').forEach(step => {
      let on = false;
      step.addEventListener('mouseenter', () => {
        on = true;
        step.style.transition = 'background .25s,border-color .25s,box-shadow .25s,transform .06s linear';
      });
      step.addEventListener('mousemove', e => {
        if(!on) return;
        const r  = step.getBoundingClientRect();
        const dx = ((e.clientX - r.left) / r.width  - .5) * 2;
        const dy = ((e.clientY - r.top)  / r.height - .5) * 2;
        step.style.transform = `perspective(360px) rotateX(${(-dy*8).toFixed(1)}deg) rotateY(${(dx*10).toFixed(1)}deg) translateZ(18px) scale(1.05)`;
      });
      step.addEventListener('mouseleave', () => {
        on = false;
        step.style.transition = 'opacity .55s ease,transform .5s cubic-bezier(.34,1.46,.64,1),background .35s,border-color .35s,box-shadow .35s';
        step.style.transform = 'perspective(600px) rotateX(0) translateY(0)';
      });
    });
  }
  section.querySelectorAll('.journey-flow').forEach(attachTilt);
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => requestAnimationFrame(() => {
      const f = section.querySelector('.tab-pane.active .journey-flow');
      if(f){ attachTilt(f); updateSteps(); }
    }));
  });

  updateParallax();
  updateSteps();
})(); 

/* ── ACCORDION ── */
(function(){
  const items = document.querySelectorAll('.acc-item');
  items.forEach(item => {
    const trigger = item.querySelector('.acc-trigger');
    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      items.forEach(i => i.classList.remove('open'));
      if(!isOpen) item.classList.add('open');
    });
  });
})();
</script>
