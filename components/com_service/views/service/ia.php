<style>
/* INTRO CONTEXTUELLE */
.intro-ctx{padding:8rem 0;background:var(--bg);border-bottom:1px solid var(--border);background: var(--bg2);}
.intro-ctx-inner{display:grid;grid-template-columns:400px 1fr;gap:7rem;align-items:start}
.intro-ctx-sticky{position:sticky;top:110px}
.ics{padding:1.6rem 2rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:1.2rem}
.ics:last-child{border-bottom:none}
.ics-val{font-family:var(--fd);font-weight:200;font-size:2.6rem;line-height:1;color:var(--txt);letter-spacing:-.04em;flex-shrink:0}
.ics-val span{color:var(--gold);font-size:.55em}
.ics-lbl{font-family:var(--fm);font-size:.7rem;font-weight:300;color:var(--txt2);line-height:1.55}
.intro-ctx-body p{font-family:var(--fm);font-size:.9rem;font-weight:300;color:var(--txt2);line-height:1.95;margin-bottom:1.6rem}
.intro-ctx-body p strong{color:var(--txt);font-weight:600}
.intro-ctx-img .img1{border-radius:18px;overflow:hidden;box-shadow:0 22px 48px -8px rgba(0,0,0,.24),0 8px 20px -8px rgba(0,0,0,.12);max-width: 400px;}
.intro-ctx-img .img2{border-radius:18px;overflow:hidden;box-shadow:0 22px 48px -8px rgba(0,0,0,.24),0 8px 20px -8px rgba(0,0,0,.12);max-width: 400px;position: absolute; top: 60px; left: 150px;border-top: #FFF solid 20px;border-bottom: #FFF solid 20px;}
.intro-ctx-txt p{font-family:var(--fm);font-size:.9rem;font-weight:300;color:var(--txt2);line-height:1.6;margin-bottom:1.3rem;}
@media(max-width:991px){.intro-ctx-inner{grid-template-columns:1fr;gap:3rem}.intro-ctx-sticky{position:static}}

/* SECTEURS — expanding card gallery */
.secteurs{padding:8rem 0 7rem;background:var(--bg);border-bottom:1px solid var(--border);overflow:hidden}
.sect-exp-hdr{text-align:center;margin-bottom:3rem}
.sect-exp-hdr .sec-label{justify-content:center}
.sect-exp-hdr .sec-label::before{display:none}
.sect-exp-sub{font-family:var(--fm);font-size:.85rem;font-weight:300;color:var(--txt2);max-width:500px;margin:.8rem auto 0;line-height:1.85}
/* Flex strip */
.sect-expand{display:flex;gap:6px;height:600px;padding:0 2rem;overflow:hidden}
.sect-exp-card{flex:0 0 112px;border-radius:56px;overflow:hidden;cursor:pointer;position:relative;transition:flex .65s cubic-bezier(.16,1,.3,1)}
.sect-exp-card.active{flex:1 0 0;cursor:default}
/* Gradient backgrounds per sector */
.sect-exp-card[data-s="sante"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#1c5470 0%,transparent 65%),linear-gradient(180deg,#070f18 0%,#0d2030 100%)}
.sect-exp-card[data-s="resto"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#6b3010 0%,transparent 65%),linear-gradient(180deg,#1c0a03 0%,#301508 100%)}
.sect-exp-card[data-s="hotel"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#301a58 0%,transparent 65%),linear-gradient(180deg,#0d0818 0%,#1c1230 100%)}
.sect-exp-card[data-s="immo"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#2c3540 0%,transparent 65%),linear-gradient(180deg,#0a0d10 0%,#181e24 100%)}
.sect-exp-card[data-s="fin"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#0d4025 0%,transparent 65%),linear-gradient(180deg,#030c07 0%,#08200f 100%)}
.sect-exp-card[data-s="mktg"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#4a1040 0%,transparent 65%),linear-gradient(180deg,#130818 0%,#250f35 100%)}
.sect-exp-card[data-s="ops"]{background:radial-gradient(ellipse 110% 55% at 50% 20%,#1e222e 0%,transparent 65%),linear-gradient(180deg,#07080c 0%,#10141c 100%)}
/* Bottom vignette for readability */
.sect-exp-ov{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.9) 0%,rgba(0,0,0,.35) 42%,rgba(0,0,0,.06) 100%);z-index:1;pointer-events:none}
.sect-exp-ov img{height:100%;width:100%;object-fit:cover;}
.sect-exp-ov::after{content:"";height:100%;width:100%;position: absolute;top:0;left:0;/*background:radial-gradient(ellipse 110% 55% at 50% 20%,#1c5470 0%,transparent 65%),linear-gradient(180deg,#070f18 0%,#0d2030 100%)*/ background:linear-gradient(to top,rgba(0,0,0,.9) 0%,rgba(0,0,0,.8) 42%,rgba(0,0,0,.06) 100%);}

/* Gold accent top bar on active */
.sect-exp-card.active::after{content:'';position:absolute;top:0;left:3rem;right:3rem;height:2px;background:linear-gradient(to right,var(--gold),var(--gold2),transparent);z-index:5;opacity:.65}
/* Collapsed icon circle */
.sect-exp-ico{position:absolute;bottom:1rem;left:50%;transform:translateX(-50%);width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.65);font-size:1.6rem;z-index:3;transition:opacity .22s,transform .3s cubic-bezier(.34,1.56,.64,1)}
.sect-exp-card.active .sect-exp-ico{opacity:0;transform:translateX(-50%) scale(.5);pointer-events:none}
/* Sector name — centered above icon, rotated */
.sect-exp-namev{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-90deg);white-space:nowrap;font-family:var(--fm);font-size:.75rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.42);z-index:2;transition:opacity .2s;pointer-events:none}
.sect-exp-card.active .sect-exp-namev{opacity:0}
/* Expanded body content */
.sect-exp-body{position:absolute;bottom:0;left:0;right:0;padding:2.8rem 3rem;z-index:4;opacity:0;transition:opacity .32s .28s;pointer-events:none}
.sect-exp-card.active .sect-exp-body{opacity:1;pointer-events:auto}
.sect-exp-tag{font-family:var(--fm);font-size:1rem;font-weight:700;letter-spacing:.32em;text-transform:uppercase;color:rgba(201,169,110);display:flex;align-items:center;gap:.6rem;margin-bottom:.9rem}
.sect-exp-tag::before{content:'';width:20px;height:1px;background:rgba(201,169,110,1)}
.sect-exp-pitch{font-family:var(--fm);font-weight:200;font-size:clamp(1.1rem,1.8vw,1.85rem);color:rgba(247,245,242,.88);line-height:1.15;letter-spacing:-.02em;margin-bottom:1.1rem}
.sect-exp-sols{list-style:none;margin-bottom:1.2rem}
.sect-exp-sols li{font-family:var(--fm);font-size:.8rem;font-weight:300;color:rgba(247,245,242,.6);padding:.22rem 0;border-bottom:1px solid rgba(255,255,255,.05);display:flex;align-items:center;gap:.5rem}
.sect-exp-sols li:last-child{border-bottom:none}
.sect-exp-sols li::before{content:'';width:4px;height:4px;border-radius:50%;background:var(--gold2);flex-shrink:0;opacity:.65}
.sect-exp-kpi{font-family:var(--fm);font-size:.7rem;font-weight:600;color:var(--bg);padding:.28rem .8rem;border:1px solid rgba(201,169,110,.2);background:rgba(201,169,110,.06);display:inline-flex;margin-bottom:.5rem;border-radius: 5px;}
.sect-exp-link{display:inline-flex;align-items:center;gap:.4rem;font-family:var(--fm);font-size:.7rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(247,245,242,.5);text-decoration:none;transition:color .2s}
.sect-exp-link:hover{color:rgba(247,245,242,.65)}
.sect-exp-link i{font-size:.5rem;transition:transform .2s}
.sect-exp-link:hover i{transform:translateX(3px)}
/* Mobile: vertical accordion */
@media(max-width:767px){
  .sect-expand{flex-direction:column;height:auto;gap:4px;padding:0 0 2rem}
  .sect-exp-card{flex:0 0 64px;border-radius:16px;transition:flex .55s cubic-bezier(.16,1,.3,1)}
  .sect-exp-card.active{flex:0 0 420px}
  .sect-exp-ico{bottom:auto;top:50%;left:1.6rem;transform:translateY(-50%);width:38px;height:38px;font-size:.72rem}
  .sect-exp-card.active .sect-exp-ico{opacity:0;transform:translateY(-50%) scale(.4);pointer-events:none}
  .sect-exp-namev{writing-mode:horizontal-tb;transform:translateY(-50%) rotate(0);top:50%;left:4.6rem;bottom:auto;right:auto;font-size:.55rem;font-weight:700;letter-spacing:.18em;color:rgba(255,255,255,.38)}
  .sect-exp-card.active .sect-exp-namev{opacity:0}
  .sect-exp-body{padding:2rem 1.8rem}
  .sect-exp-pitch{font-size:1.25rem}
}
@media(max-width:575px){.sect-exp-card.active{flex:0 0 390px}}

/* HW CATALOGUE — horizontal scroll cards */
.hw-cat{padding:8rem 0 0;background:var(--bg2);overflow:hidden}
.hw-cat-top{text-align:center;padding-bottom:3.5rem}
.hw-cat-top .sec-label{justify-content:center}
.hw-cat-top .sec-label::before{display:none}
.hw-cat-sub{font-family:var(--fm);font-size:.85rem;font-weight:300;color:var(--txt2);max-width:480px;margin:.8rem auto 0;line-height:1.85}
.hw-scroll-outer{position:relative}
.hw-scroll-track{display:flex;gap:100px;padding:1.5rem 0 4.5rem;overflow-x:auto;scrollbar-width:none;-ms-overflow-style:none;cursor:grab;user-select:none}
.hw-scroll-track:active{cursor:grabbing}
.hw-scroll-track::-webkit-scrollbar{display:none}
.hw-scroll-btn{position:absolute;top:calc(50% - 30px);transform:translateY(-50%);z-index:10;width:46px;height:46px;border-radius:50%;background:var(--bg);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 4px 20px rgba(0,0,0,.09);font-size:.65rem;color:var(--txt2);transition:all .25s;outline:none}
.hw-scroll-btn:hover{background:var(--txt);color:var(--bg);border-color:var(--txt)}
.hw-scroll-btn.hw-prev{left:.6rem}
.hw-scroll-btn.hw-next{right:.6rem}
.hw-card{flex:0 0 calc((100vw - 360px) / 3);height:420px;border-radius:18px;overflow:hidden;cursor:pointer;position:relative;transition:transform .4s cubic-bezier(.34,1.56,.64,1),box-shadow .4s;box-shadow:0 22px 48px -8px rgba(0,0,0,.24),0 8px 20px -8px rgba(0,0,0,.12)}
.hw-card:hover{transform:translateY(-14px);box-shadow:0 36px 72px -8px rgba(0,0,0,.3),0 14px 30px -8px rgba(0,0,0,.16)}
.hw-card[data-p="concierge"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#c88050 0%,#8a3e18 48%,#1c0c04 100%)}
.hw-card[data-p="whatsapp"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#2a9060 0%,#145035 48%,#040f0a 100%)}
.hw-card[data-p="sdr"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#3050a8 0%,#182870 48%,#040818 100%)}
.hw-card[data-p="support"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#7830c0 0%,#3c1068 48%,#0c0418 100%)}
.hw-card[data-p="content"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#d06020 0%,#8a3008 48%,#200a02 100%)}
.hw-card[data-p="voice"]{background:radial-gradient(ellipse 130% 80% at 50% 72%,#1890a0 0%,#085060 48%,#020c10 100%)}
.hw-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    /* transform: translate(-50%, -50%); */
    width: 100%;
    height: 100%;
    /* border-radius: 50%; */
    background: rgb(19 15 15 / 55%);
    /* filter: blur(22px); */
    z-index: 4;
    pointer-events: none;
}
.hw-card-ov{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.04) 0%,rgba(0,0,0,.12) 48%,rgba(0,0,0,.78) 100%);z-index:2;pointer-events:none}
.hw-card-ov img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.hw-card-num{position:absolute;top:.5rem;right:.8rem;font-family:var(--fd);font-weight:200;font-size:6.5rem;line-height:1;color:rgba(255,255,255,.05);z-index:3;letter-spacing:-.05em;pointer-events:none;user-select:none}
.hw-card-body{position:absolute;top:0;left:0;right:0;padding:1.7rem 1.5rem;z-index:4}
.hw-card-tag{font-family:var(--fm);font-size:.6rem;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:rgba(255,255,255,.70);margin-bottom:.5rem}
.hw-card-name{font-family:var(--fm);font-weight:200;font-size:1.55rem;color:rgba(247,245,242,.9);line-height:1.08;letter-spacing:-.02em;margin-bottom:.5rem}
.hw-card-pitch{font-family:var(--fm);font-size:.9rem;font-weight:300;color:rgba(255,255,255,.8);line-height:1.55}
.hw-card-foot{position:absolute;bottom:1.4rem;left:1.4rem;right:1.4rem;z-index:4;display:flex;align-items:center;gap:.9rem}
.hw-card-ico{width:64px;height:64px;flex-shrink:0;border-radius:10px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,.72);font-size:1.95rem;transition:all .35s cubic-bezier(.34,1.56,.64,1)}
.hw-card:hover .hw-card-ico{background:var(--bg);border-color:var(--bg);color:var(--txt);transform:scale(1.12)}
.hw-card-kpi{font-family:var(--fm);font-size:.8rem;font-weight:500;color:rgba(255,255,255,255);line-height:1.45}
@media(max-width:767px){
  .hw-scroll-track{padding:1rem 0 3rem;gap:40px}
  .hw-card{flex:0 0 calc(100vw - 120px);height:340px}
  .hw-scroll-btn{display:none}
  .hw-robot-svg{height:148px}
}

/* BUSINESS VALUES — dark performance full-bleed */
.bv-section{position:relative;padding:9rem 0 6rem;background:#06050a;background-image:url('../../images/para.jpg');background-size:cover;background-position:center;overflow:hidden;background-attachment: fixed;}
.bv-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 90% 90% at 50% 50%,rgba(0,0,0,.38) 0%,rgba(0,0,0,.82) 100%);z-index:0}
.bv-inner{position:relative;z-index:2;max-width: 1400px;}
.bv-eyebrow{font-family:var(--fm);font-size:.5rem;font-weight:700;letter-spacing:.44em;text-transform:uppercase;color:rgba(247,245,242,.6);display:flex;align-items:center;justify-content:center;gap:1.4rem;margin-bottom:2rem}
.bv-eyebrow::before,.bv-eyebrow::after{content:'';width:40px;height:1px;background:rgba(247,245,242,.22)}
.bv-heading{font-weight:300;font-size:clamp(3rem,6vw,7.5rem);color:rgba(247,245,242,.9);text-align:center;letter-spacing:-.03em;line-height:.92;margin-bottom:6.5rem}
.bv-heading em{font-style:normal;color: #ffaefa;}
.bv-stats{display:grid;grid-template-columns:repeat(5,1fr);gap:0 4rem}
.bv-stat{padding:1rem 15px 1.5rem;position:relative;backdrop-filter: blur(10px);border-radius: 20px;}
.bv-stat-val{display:flex;align-items:baseline;gap:.08em;margin-bottom:1rem}
.bv-stat-big{font-family:var(--fm);font-size:74px;color:#fff;line-height:.88;letter-spacing:-.04em;margin-right: 8px;}
.bv-stat-unit{font-family:var(--fm);font-weight:300;font-size:26px;color:rgba(247,245,242,.4);padding-bottom:.15rem;align-self:flex-end}
.bv-stat-label{font-family:var(--fm);font-size:.9rem;color:rgba(247,245,242,1);margin-bottom:.8rem;line-height:1;text-transform: uppercase;font-weight: 600;}
.bv-stat-desc{font-family:var(--fm);font-size:.8rem;font-weight:300;color:rgba(247,245,242,.6);line-height:1.5;}
.bv-stat-bar{position:absolute;bottom:0;left:0;width:26px;height:3px;background:var(--gold);display:none;}
.bv-quote{padding:5rem 0 .5rem;text-align:center}
.bv-quote-inner{display:flex;align-items:flex-start;justify-content:center;gap:1.8rem;max-width:820px;margin:0 auto 2rem}
.bv-qm{font-size:4.8rem;color:rgba(247,245,242,.18);flex-shrink:0;line-height:1}
.bv-qm-o{margin-top:.2rem}
.bv-qm-c{align-self:flex-end;margin-bottom:.2rem}
.bv-quote-text{font-size:clamp(1rem,2.1vw,1.2rem);font-weight:200;color:rgba(247,245,242,.5);font-style:italic;line-height:1.55;margin:0}
.bv-quote-text strong{color:rgba(247,245,242,.82);font-style:normal}
.bv-quote-source{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.36em;text-transform:uppercase;color:rgba(247,245,242,.26)}
.bv-quote-sub{font-family:var(--fm);font-size:.48rem;font-weight:300;color:rgba(247,245,242,.14);margin-top:.3rem;letter-spacing:.08em}
@media(max-width:991px){.bv-stats{grid-template-columns:repeat(3,1fr);gap:0 3rem}.bv-stat:nth-child(n+4){padding-top:2.5rem;margin-top:2.5rem;border-top:1px solid rgba(247,245,242,.07)}}
@media(max-width:575px){.bv-stats{grid-template-columns:repeat(2,1fr);gap:0 2rem}.bv-stat:nth-child(n+3){padding-top:2.5rem;margin-top:2.5rem;border-top:1px solid rgba(247,245,242,.07)}.bv-stat:nth-child(5){grid-column:span 2}}

/* ══ INTEGRATIONS HUB — 3D ORBITAL ══ */
.integrations-hub{padding:9rem 0;background:var(--bg2);border-bottom:1px solid var(--border);overflow:hidden}
.hub-layout{display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:5rem}
.hub-desc{font-size:.9rem;font-weight:300;color:var(--txt2);line-height:1.92;margin:1.6rem 0 2.8rem;max-width:430px}
.hub-badges{display:flex;flex-wrap:wrap;gap:.5rem}
.hub-badge{display:inline-flex;align-items:center;gap:.52rem;padding:.42rem 1.1rem;border:1px solid var(--border);border-radius:50px;font-family:var(--fm);font-size:.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--txt2);background:var(--bg);transition:border-color .3s,color .3s,background .3s;cursor:default}
.hub-badge:hover{border-color:var(--gold);color:var(--gold);background:rgba(139,106,34,.04)}
.hub-badge i{color:var(--gold);font-size:.62rem;transition:color .3s}
.hub-badge:hover i{color:var(--gold)}

/* Scene */
.hub-orbital{display:flex;align-items:center;justify-content:center}
.hub-scene{position:relative;width:580px;height:580px;flex-shrink:0}

/* Elliptical orbital rings — repositioned to follow wider orbits */
.hub-ring{position:absolute;border-radius:50%;pointer-events:none;transform-origin:center center}
.hub-ring.r1{inset:29%;border:1.5px dashed rgba(139,106,34,.28);transform:scaleY(.55) rotate(12deg)}
.hub-ring.r2{inset:15%;border:1px dashed rgba(139,106,34,.18);transform:scaleY(.55) rotate(12deg)}
.hub-ring.r3{inset:4%;border:1px dashed rgba(139,106,34,.11);transform:scaleY(.55) rotate(12deg)}
/* Glowing orbit sentinel dot — separate element so it can truly orbit */

/* Center hub — slightly reduced */
.hub-center{
  position:absolute;inset:40%;border-radius:50%;z-index:20;
  background:conic-gradient(from 135deg,#35C4D5 0%,#6B3A8C 40%,#35C4D5 70%,#4A88C0 100%);
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  box-shadow:
    0 0 0 6px rgba(21, 165, 193,.12),
    0 0 0 12px rgba(21, 165, 193,.06),
    0 14px 44px rgba(21, 165, 193,.42),
    0 0 70px rgba(21, 165, 193,.16),
    inset 0 2px 0 rgba(255,255,255,.22);
  animation:hub-pulse 3s ease-in-out infinite;
}
@keyframes hub-pulse{0%,100%{box-shadow:0 0 0 6px rgba(21, 165, 193,.12),0 0 0 12px rgba(21, 165, 193,.06),0 14px 44px rgba(21, 165, 193,.42),0 0 70px rgba(21, 165, 193,.16),inset 0 2px 0 rgba(255,255,255,.22)}50%{box-shadow:0 0 0 9px rgba(21, 165, 193,.16),0 0 0 18px rgba(21, 165, 193,.07),0 18px 54px rgba(21, 165, 193,.48),0 0 90px rgba(21, 165, 193,.2),inset 0 2px 0 rgba(255,255,255,.22)}}
.hub-center .hw{font-family:var(--fm);font-weight:800;font-size:1rem;color:#fff;letter-spacing:.08em;line-height:1}
.hub-center .ai{font-family:var(--fd);font-weight:300;font-size:.6rem;color:rgba(255,255,255,.62);letter-spacing:.28em;text-transform:uppercase;margin-top:.16rem;font-style:italic}

/* Orbiting arms */
.orb{position:absolute;top:50%;left:50%;width:0;height:0;z-index:10}

/* Icon circles */
.hub-ic{
  position:relative;
  width:46px;height:46px;border-radius:50%;
  background:var(--bg);
  border:1px solid rgba(21, 165, 193,.22);
  display:flex;align-items:center;justify-content:center;
  font-size:1.05rem;color:var(--gold);
  transform:translate(-50%,calc(-1 * var(--r,120px)));
  box-shadow:0 4px 18px rgba(0,0,0,.08),0 0 0 1px rgba(139,106,34,.07);
  cursor:default;
  transition:background .3s,border-color .3s,color .3s,box-shadow .3s;
}
.hub-ic:hover{background:var(--gold);color:var(--bg);border-color:var(--gold);box-shadow:0 8px 28px rgba(21, 165, 193,.45),0 0 0 4px rgba(21, 165, 193,.14)}
.hub-ic .ltr{font-family:var(--fm);font-weight:800;font-size:.78rem}

/* ── ORBITS ── */
/* Inner (r=120px, 18s, CW) */
.orb.o1{animation:arm-cw 18s linear infinite var(--dl,0s)}
.orb.o1 .hub-ic{--r:120px;animation:ic-ccw 18s linear infinite var(--dl,0s)}
/* Middle (r=200px, 27s, CCW) */
.orb.o2{animation:arm-ccw 27s linear infinite var(--dl,0s)}
.orb.o2 .hub-ic{--r:200px;animation:ic-cw 27s linear infinite var(--dl,0s)}
/* Outer (r=265px, 38s, CW) */
.orb.o3{animation:arm-cw 38s linear infinite var(--dl,0s)}
.orb.o3 .hub-ic{--r:265px;animation:ic-ccw 38s linear infinite var(--dl,0s)}

@keyframes arm-cw{to{transform:rotate(360deg)}}
@keyframes arm-ccw{to{transform:rotate(-360deg)}}
@keyframes ic-cw{
  from{transform:translate(-50%,calc(-1 * var(--r,120px))) rotate(0deg)}
  to{transform:translate(-50%,calc(-1 * var(--r,120px))) rotate(360deg)}
}
@keyframes ic-ccw{
  from{transform:translate(-50%,calc(-1 * var(--r,120px))) rotate(0deg)}
  to{transform:translate(-50%,calc(-1 * var(--r,120px))) rotate(-360deg)}
}

/* Connector pulse line (SVG-free, pseudo-element) */
.orb::before{
  content:'';position:absolute;
  left:0;top:0;
  width:1px;
  background:linear-gradient(to top,rgba(139,106,34,.22),rgba(139,106,34,0));
  height:var(--r,120px);
  transform:translateX(-50%) translateY(calc(-1 * var(--r,120px)));
  transform-origin:bottom center;
  pointer-events:none;
  opacity:.5;
}

@media(max-width:991px){
  .hub-layout{grid-template-columns:1fr;text-align:center}
  .hub-desc{margin-left:auto;margin-right:auto}
  .hub-badges{justify-content:center}
  .hub-orbital{margin-top:3rem}
  .hub-scene{width:430px;height:430px}
  .hub-ring.r1{inset:29%}
  .hub-ring.r2{inset:15%}
  .hub-ring.r3{inset:4%}
  .orb.o1 .hub-ic{--r:88px}
  .orb.o2 .hub-ic{--r:148px}
  .orb.o3 .hub-ic{--r:200px}
}
@media(max-width:575px){.hub-orbital{display:none}}



/* PRICING & OFFERS */
.pack-section{padding:8rem 0;background:var(--bg);margin-bottom: 0;}
.pack-box .item-pack{background: #FFF;}
.pack-box .item-pack .textbox p{font-size:16px;}
.pack-box .item-pack .textbox ul{font-size: 16px !important;}
.pack-box .item-pack h4{font-size: 24px;margin-top: 30px;}
.pack-box .item-pack .textbox{padding: 0 15px;}
.pack-box .item-pack .price{font-family: var(--fm);}
.pack-box .item-pack .price span{font-weight: 600;}
.pack-box .item-pack .btn-pack{font-family: var(--fm);padding: 15px 20px;}
.pack-box .item-pack .popular{font-family: var(--fm);}
.pack-section .sec-label{justify-content: center;}
.pack-section .sec-title{text-align: center;}

/* ══ GOUVERNANCE IA — TOP TITLE + 3D FLIP + GRAY SIBLINGS ══ */
.gouv{padding:9rem 0 0;background:var(--bg2);border-bottom:1px solid var(--border);overflow:hidden}
.gouv-header{padding:0 0 3.5rem}
.gouv-header .sec-label{margin-bottom:1rem}
.gouv-header .sec-title{margin-bottom:0}

/* SINGLE RECTANGLE — full width, rows: title band + blocks */
.gouv-wrap{
  display:grid;
  grid-template-rows:auto 1fr;
  overflow:hidden;
  position:relative;
  background:url('../../images/para.jpg') center/cover no-repeat;
  /* background: linear-gradient(to right, #753a88, #cc2b5e); */
}

/* ── 5 CROSSFADING BACKGROUND LAYERS ── */
.gouv-bgs{position:absolute;inset:0;z-index:0;pointer-events:none}
.gouv-bg{
  position:absolute;inset:0;
  opacity:0;
  transition:opacity .85s cubic-bezier(.4,0,.2,1);
}
.gouv-bg.active{opacity:1}

/* Block 01 — Conformité RGPD (real image) */
.gb1{
  background:url('../../images/para.jpg') center/cover no-repeat;
}

.gb1::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(6,5,10,.45) 0%,rgba(6,5,10,.18) 100%);
  pointer-events:none;
}

/* Block 02 — Protection données (real image) */
.gb2{background:
  radial-gradient(ellipse at 52% 42%,rgba(0,185,225,.16) 0%,transparent 52%),
  radial-gradient(ellipse at 18% 78%,rgba(0,110,145,.1) 0%,transparent 44%),
  radial-gradient(ellipse at 88% 20%,rgba(0,70,100,.07) 0%,transparent 38%),
  linear-gradient(162deg,#001c28 0%,#001018 55%,#000810 100%)}
.gb2::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(6,5,10,.5) 0%,rgba(6,5,10,.2) 100%);
  pointer-events:none;
}

/* Block 03 — Violet / Audit / Trace */
.gb3{background:
  radial-gradient(ellipse at 42% 32%,rgba(130,50,235,.22) 0%,transparent 52%),
  radial-gradient(ellipse at 76% 72%,rgba(70,10,150,.13) 0%,transparent 44%),
  radial-gradient(ellipse at 15% 80%,rgba(50,0,100,.08) 0%,transparent 38%),
  linear-gradient(142deg,#120630 0%,#0a0420 55%,#060215 100%)}

/* Block 04 — Amber / Escalade / Human warmth */
.gb4{background:
  radial-gradient(ellipse at 32% 55%,rgba(230,110,0,.2) 0%,transparent 52%),
  radial-gradient(ellipse at 72% 22%,rgba(200,80,0,.13) 0%,transparent 44%),
  radial-gradient(ellipse at 85% 80%,rgba(160,50,0,.08) 0%,transparent 38%),
  linear-gradient(152deg,#280e00 0%,#160800 55%,#0c0400 100%)}

/* Block 05 — Deep cyan / Hébergement / Data */
.gb5{background:
  radial-gradient(ellipse at 52% 42%,rgba(0,185,225,.16) 0%,transparent 52%),
  radial-gradient(ellipse at 18% 78%,rgba(0,110,145,.1) 0%,transparent 44%),
  radial-gradient(ellipse at 88% 20%,rgba(0,70,100,.07) 0%,transparent 38%),
  linear-gradient(162deg,#001c28 0%,#001018 55%,#000810 100%)}

/* ── TOP TITLE BAND ── */
.gouv-left{
  border-bottom:1px solid rgba(255,255,255,.06);
  background:linear-gradient(to right, #753a88, #cc2b5e);
  backdrop-filter:blur(20px);
  -webkit-backdrop-filter:blur(20px);
  display:flex;align-items:center;
  padding:1.8rem 3.5rem;
  position:relative;z-index:4;
  min-height:76px;
}
.gouv-active{
  display:flex;align-items:center;gap:1.8rem;
  opacity:0;transform:translateX(-18px);
  transition:opacity .44s ease,transform .44s ease;
}
.gouv-active.on{opacity:1;transform:translateX(0)}
.gouv-at{
  font-family:var(--fm);font-weight:300;
  font-size:clamp(1.2rem,2vw,1.75rem);
  color:#f5f3f0;line-height:1.1;letter-spacing:-.028em;
  border-left:2px solid rgba(255,255,255,.3);
  padding-left:1.6rem;
}
/* Default hint when nothing is hovered */
.gouv-hint{
  font-family:var(--fm);font-size:.8rem;font-weight:400;
  letter-spacing:.2em;text-transform:uppercase;
  color:rgba(247,245,242,.8);
  transition:opacity .4s;
}
.gouv-hint.hidden{opacity:0;pointer-events:none}
.gouv-ad{display:none}
.gouv-panel-label{display:none}

/* ── BLOCKS GRID ── */
.gouv-right{position:relative;z-index:2;min-height:58vh;display:flex;flex-direction:column}
.gouv-grid{
  flex:1;display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-template-rows:repeat(2,1fr);
}
.gouv-item.r2{border-bottom:none}
.gouv-item-lg{grid-column:span 2}

/* ── GRAY SIBLINGS on hover (CSS :has + JS fallback) ── */
/* .gouv-grid:has(.gouv-item:hover) .gouv-item:not(:hover){filter:grayscale(.9) brightness(.48)} */
.gouv-item{
  border-left:1px solid rgba(0,0,0,.07);
  border-bottom:1px solid rgba(0,0,0,.07);
  cursor:pointer;position:relative;overflow:hidden;
  perspective:1200px;
  transition:filter .44s ease;
  filter:none;
  position: relative;
  overflow: hidden;
}

.gi-inner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: #0000008a;
    z-index: 0;
    pointer-events: none;
}
/* JS fallback class */
/* .gouv-item.gi-dimmed{filter:grayscale(.9) brightness(.48)} */

/* ── 3D FLIP INNER ── */
.gi-inner{
  position:absolute;inset:0;
  transform-style:preserve-3d;
  transition:transform .74s cubic-bezier(.4,0,.2,1);
}
.gi-inner img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.gouv-item:hover .gi-inner{transform:rotateY(180deg)}

/* Front face */
.gi-front{
  position:absolute;
  inset:0;
  backface-visibility:hidden;-webkit-backface-visibility:hidden;
  background:rgba(248,246,242,.12);
  border-top:1px solid rgba(255,255,255,.45);
  display:flex;flex-direction:column;justify-content:flex-end;
  padding:2.5rem 2.4rem;
}

/* Back face — solid black */
.gi-back{
  position:absolute;inset:0;
  backface-visibility:hidden;-webkit-backface-visibility:hidden;
  transform:rotateY(180deg);
  background:#080808;
  display:flex;flex-direction:column;justify-content:center;
  padding:2.5rem 2.4rem;
}
.gi-back::before{
  content:'';position:absolute;top:0;left:0;right:0;height:2px;
  background:linear-gradient(90deg,#FFF 0%,#FFF 40%,transparent 100%);
}

/* Ghost number */
.gi-num{
  font-family:var(--fm);font-weight:200;font-size:6rem;line-height:1;
      color: rgb(255 255 255 / 82%);
  position:absolute;top:1.2rem;right:1.8rem;
  letter-spacing:-.06em;user-select:none;pointer-events:none;
}
/* Icon */
.gi-ico{
  width:44px;height:44px;border-radius:9px;
  /* border:1px solid rgba(139,106,34,.28);background:rgba(139,106,34,.07); */
  display:flex;align-items:center;justify-content:center;
  color:#FFF;font-size:2rem;margin-bottom:1rem;flex-shrink:0;
}
/* Front title */
.gi-title{
  font-family:var(--fm);font-size:1.2rem;
  color:#FFF;letter-spacing:-.01em;line-height:1.3;
}
/* Back elements */
.gi-blabel{
  font-family:var(--fm);font-size:.46rem;font-weight:700;
  letter-spacing:.28em;text-transform:uppercase;
  color:var(--gold);margin-bottom:.7rem;
}
.gi-btitle{
  font-family:var(--fm);font-weight:300;font-size:1.2rem;
  color:#f5f3f0;line-height:1.2;letter-spacing:-.01em;margin-bottom:.9rem;
}
.gi-bdesc{font-size:.9rem;font-weight:300;color:rgba(247,245,242,.6);line-height:1.4}

@media(max-width:991px){
  .gouv-left{grid-template-columns:1fr}
  .gouv-panel-label{border-right:none;border-bottom:1px solid rgba(0,0,0,.07)}
  .gouv-right{min-height:45vh}
  .gouv-grid{grid-template-columns:repeat(2,1fr);grid-template-rows:repeat(3,minmax(190px,1fr))}
  .gouv-item-lg{grid-column:span 2}
}
@media(max-width:575px){
  .gouv-grid{grid-template-columns:1fr;grid-template-rows:repeat(5,minmax(170px,auto))}
  .gouv-item-lg{grid-column:span 1}
  .gouv-active{gap:1.5rem;padding:1.5rem 1.5rem}
}

/* CASE STUDIES */
.case-studies{padding:8rem 0;background:var(--bg);border-bottom:1px solid var(--border)}
.case-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:3rem;margin-top:4rem}
.case-card{padding:3.2rem;border:1px solid var(--border);border-radius:18px;background:var(--bg2);transition:all .35s}
.case-card:hover{border-color:var(--gold);transform:translateY(-3px)}
.case-sector{font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:1rem}
.case-title{font-family:var(--fd);font-weight:300;font-size:1.5rem;color:var(--txt);margin-bottom:1rem;letter-spacing:-.01em}
.case-desc{font-size:.82rem;color:var(--txt2);line-height:1.9;margin-bottom:1.8rem}
.case-metrics{display:flex;gap:1.5rem;flex-wrap:wrap;margin-top:2rem;padding-top:2rem;border-top:1px solid var(--border)}
.case-metric{flex:1;min-width:120px}
.case-metric-value{font-size:1.4rem;font-weight:700;color:var(--gold);margin-bottom:.3rem}
.case-metric-label{font-size:.7rem;color:var(--txt2);text-transform:uppercase;letter-spacing:.08em}
@media(max-width:767px){.case-grid{grid-template-columns:1fr}}
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
        <div class="sh-breadcrumb rv"><?php echo $service->getTitre() ?></div>
          <h1 class="sh-h1 rv d1"><?php echo $service->getH1() ?></h1>
          <p class="sh-sub rv d2"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Demander un audit IA</span></div>
              <div class="sb-knob"><i class="fal fa-search"></i></div>
            </a>
        
            <a href="#services" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir les cas d'usage par secteur" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Voir les cas d'usage par secteur</span></div>
              <div class="sb-knob"><i class="fal fa-suitcase"></i></div>
            </a>
        </div>
      </div>
      <div class="wm-hero-side rv d3 wm-hero-side-banner">
        <img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhotoBanniere() ?>" alt="">
      </div>
    </div>
  </div>
</section>
<!-- ══ MARQUEE — visible after hero unpins ═════════════════════ -->
<div class="mq" id="mq">
    <div class="mq-t">
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
    </div>
</div>

<!-- ═══ INTRODUCTION CONTEXTUELLE ═══════════════════ -->
<section class="intro-ctx">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="intro-ctx-img">
          <div class="img1"><img src="<?php echo $siteURL; ?>images/bg-ia-solution.jpg" alt="" ></div>
          <div class="img2"><img src="<?php echo $siteURL; ?>images/bg-ia-solution.jpg" alt="" ></div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="intro-ctx-txt">
          <div class="sec-label">Contexte marché</div>
          <h2 class="sec-title">Introduction<br><em>Contextuelle</em></h2>
          <p>La digitalisation des entreprises au Maroc a franchi un cap décisif depuis 2020. Face à une pression croissante sur les coûts opérationnels et à l'exigence d'une réactivité continue (24/7), les approches traditionnelles montrent leurs limites. Les agents IA se positionnent aujourd'hui comme le levier de compétitivité incontournable pour les directions générales et directions des systèmes d'information cherchant à optimiser leur rentabilité.</p>
          <p>Sur un marché marocain où des canaux comme WhatsApp et Telegram ont atteint une maturité exceptionnelle dans les échanges B2B et B2C, l'intégration de solutions conversationnelles intelligentes n'est plus une option. Hello World conçoit et déploie dessystèmes autonomes capables de traiter vos flux documentaires, d'engager vos prospects et de fiabiliser votre service client en temps réel.</p>
          <p>Nos offres sont taillées pour répondre aux exigences de conformité et de performance des grands comptes, des institutions semi-publiques et des appels d'offres stratégiques. Le retour sur investissement (ROI) de nos solutions s'observe dès les premiers mois de déploiement grâce à une automatisation maîtrisée et parfaitement intégrée à votre écosystème existant.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ BLOC 1 — SECTEURS ════════════════════════════ -->
<section class="secteurs" id="secteurs">
  <div class="container">
    <div class="sect-exp-hdr">
      <div class="sec-label">Solutions par secteur</div>
      <h2 class="sec-title rv">7 secteurs,<br>des agents <em>sur mesure</em></h2>
      <p class="sect-exp-sub rv d1">Chaque agent est entraîné sur les données et contraintes spécifiques de votre secteur. Cliquez pour explorer.</p>
    </div>
  </div>

  <div class="sect-expand" id="sectExpand">
    <?php $cpt = 0; ?>
    <?php $icoArray = array('fal fa-stethoscope','fal fa-utensils','fal fa-hotel','fal fa-building','fal fa-chart-line','fal fa-bullhorn','fal fa-cogs'); ?>
    <?php foreach($secteurs as $secteur): ?>
    <?php $active = $cpt == 0 ? 'active' : ''; ?>  
    <!-- SANTÉ -->
    <div class="sect-exp-card <?php echo $active; ?>" data-s="sante">
      <div class="sect-exp-ov"><img src="<?php echo $siteURL; ?>images/secteur/<?php echo $secteur->getPhoto(); ?>" alt="<?php echo $secteur->getTitre(); ?>"></div>
      <div class="sect-exp-ico"><i class="<?php echo $icoArray[$cpt]; ?>"></i></div>
      <span class="sect-exp-namev"><?php echo $secteur->getTitre(); ?></span>
      <div class="sect-exp-body">
        <div class="sect-exp-tag"><?php echo $secteur->getTitre(); ?></div>
        <h3 class="sect-exp-pitch"><?php echo $secteur->getSousTitre(); ?></h3>
        <?php echo $secteur->getExtrait(); ?>
        <a href="<?php echo $secteur->getLink(); ?>" class="sect-exp-link" style="display:block;margin-top:.9rem">Déployer pour ma structure <i class="fa fa-arrow-right fa-xs"></i></a>
      </div>
    </div>
    <?php $cpt++; ?>  
    <?php endforeach; ?>
    
    

  </div>
</section>

<!-- ═══ BLOC 2 — HW CATALOGUE ════════════════════════ -->
<section class="hw-cat" id="catalogue">
  <div class="container">
    <div class="hw-cat-top">
      <div class="sec-label">Catalogue Hello World</div>
      <h2 class="sec-title rv">Nos 6 produits IA<br><em>phares</em></h2>
      <p class="hw-cat-sub rv d1">Chaque produit HW est configuré sur vos données, intégré à vos outils et opérationnel sous 3 semaines.</p>
    </div>
  </div>

  <div class="hw-scroll-outer">
    <button class="hw-scroll-btn hw-prev" id="hwPrev" aria-label="Précédent"><i class="fa fa-chevron-left fa-xs"></i></button>
    <button class="hw-scroll-btn hw-next" id="hwNext" aria-label="Suivant"><i class="fa fa-chevron-right fa-xs"></i></button>
    <div class="hw-scroll-track" id="hwTrack">

      <div class="hw-card rv"  id="hw-concierge">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/BOARDY.webp" alt="Concierge A">
        </div>
        <div class="hw-card-num">01</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">Concierge AI</div>
          <div class="hw-card-pitch">Assistance virtuelle sur-mesure — guide vos clients 24/7</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-robot"></i></div>
          <div class="hw-card-kpi">Taux résolution<br>&gt;80% au 1er contact</div>
        </div>
      </div>

      <div class="hw-card rv d1" id="hw-whatsapp">
        <div class="hw-card-ov">
             <img src="<?= $siteURL?>images/agents-ia-services/ASTRO.webp" alt="WhatsApp Agent">
        </div>
        <div class="hw-card-num">02</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">WhatsApp Agent</div>
          <div class="hw-card-pitch">Conversationnel spécialisé canal WhatsApp Business</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fab fa-whatsapp"></i></div>
          <div class="hw-card-kpi">Ouverture &gt;90%<br>Conversion ×2</div>
        </div>
      </div>

      <div class="hw-card rv d2"  id="hw-sdr">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/TITAN.webp" alt="SDR Agent">
        </div>
        <div class="hw-card-num">03</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">SDR Agent</div>
          <div class="hw-card-pitch">Commercial virtuel infatigable pour qualifier vos leads</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-bullseye"></i></div>
          <div class="hw-card-kpi">+40% leads<br>qualifiés</div>
        </div>
      </div>

      <div class="hw-card rv d3" id="hw-support">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/SOLA.webp" alt="Support 24/7">
        </div>
        <div class="hw-card-num">04</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">Support 24/7</div>
          <div class="hw-card-pitch">Automatisation tickets niv. 1 &amp; 2 pour vos centres de contact</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-headset"></i></div>
          <div class="hw-card-kpi">Temps traitement<br>réduit de 60%</div>
        </div>
      </div>

      <div class="hw-card rv"  id="hw-content">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/PULSE.webp" alt="Content Studio">
        </div>
        <div class="hw-card-num">05</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">Content Studio</div>
          <div class="hw-card-pitch">Usine à contenu intelligente pour tous vos canaux</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-pen-nib"></i></div>
          <div class="hw-card-kpi">Production<br>de contenu ×5</div>
        </div>
      </div>

      <div class="hw-card rv d1" id="hw-voice">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/VOX.webp" alt="Voice Caller">
        </div>
        <div class="hw-card-num">06</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">Voice Caller</div>
          <div class="hw-card-pitch">Appels entrants/sortants avec synthèse vocale réaliste</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-phone-volume"></i></div>
          <div class="hw-card-kpi">Appels simultanés<br>illimités</div>
        </div>
      </div>
    <div class="hw-card rv d1" id="hw-voice">
        <div class="hw-card-ov">
            <img src="<?= $siteURL?>images/agents-ia-services/VERDE.webp" alt="Voice Caller">
        </div>
        <div class="hw-card-num">07</div>
        <div class="hw-card-body">
          <div class="hw-card-tag">HW Product</div>
          <div class="hw-card-name">Conversationnel</div>
          <div class="hw-card-pitch">Assistants intelligents pour vos sites web et applications</div>
        </div>
        <div class="hw-card-foot">
          <div class="hw-card-ico"><i class="fal fa-phone-volume"></i></div>
          <div class="hw-card-kpi">Temps traitement<br>réduit de 60%</div>
        </div>
      </div>

    </div>
  </div>

</section>

<!-- ═══ BLOC 3 — VALEUR BUSINESS ════════════════════ -->
<section class="bv-section">
  <div class="container bv-inner">

    <div class="bv-eyebrow rv">ROI mesurable</div>
    <h2 class="bv-heading rv">La performance<br><em>en données réelles</em></h2>

    <div class="bv-stats rv d1">

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="2" data-prefix="">2</span><span class="bv-stat-unit">j/sem</span></div>
        <div class="bv-stat-label">Temps libéré</div>
        <div class="bv-stat-desc">Automatisez les processus chronophages pour réallouer vos équipes à des tâches à haute valeur.</div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="99.9" data-prefix="" data-dec="1">99,9</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label">Fiabilité</div>
        <div class="bv-stat-desc">Supprimez les erreurs humaines en automatisant vos flux de données et vos doubles saisies.</div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="2" data-prefix="&lt;">&lt;2</span><span class="bv-stat-unit">sec</span></div>
        <div class="bv-stat-label">Temps de réponse</div>
        <div class="bv-stat-desc">Offrez une disponibilité 24/7 avec des réponses instantanées sur tous vos canaux.</div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="35" data-prefix="+">+35</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label">Ventes accélérées</div>
        <div class="bv-stat-desc">Qualifiez les leads dès leur arrivée et assurez un follow-up systématique pour raccourcir votre cycle.</div>
        <div class="bv-stat-bar"></div>
      </div>

      <div class="bv-stat">
        <div class="bv-stat-val"><span class="bv-stat-big" data-to="100" data-prefix="">100</span><span class="bv-stat-unit">%</span></div>
        <div class="bv-stat-label">Reporting fiabilisé</div>
        <div class="bv-stat-desc">Alertes ciblées, digests automatiques et circulation fluide de l'information entre vos équipes.</div>
        <div class="bv-stat-bar"></div>
      </div>

    </div>

    <!-- Citation -->
    <div class="bv-quote rv d2">
      <div class="bv-quote-inner">
        <i class="fa fa-quote-left bv-qm bv-qm-o"></i>
        <p class="bv-quote-text">Nos clients ne viennent pas chercher une solution IA. Ils viennent chercher <strong>la certitude que ça va se passer.</strong></p>
        <i class="fa fa-quote-right bv-qm bv-qm-c"></i>
      </div>
      <div class="bv-quote-source">Hello World Agency</div>
      <div class="bv-quote-sub">Digital &amp; Intelligence Artificielle — Casablanca · San Francisco · London</div>
    </div>

  </div>
</section>

<!-- integrations HUB — 3D ORBITAL -->
<section class="integrations-hub" id="integrations">
  <div class="container">
    <div class="hub-layout">

      <!-- LEFT — text + badge pills -->
      <div class="hub-text">
        <div class="sec-label">Écosystème connecté</div>
        <h2 class="sec-title rv">Connecté à<br><em>vos outils</em></h2>
        <p class="hub-desc rv d1">Nos agents s'intègrent nativement à votre stack existante.<br>Aucune refonte requise — connexion en quelques heures.</p>
        <div class="hub-badges rv d2">
          <span class="hub-badge"><i class="fab fa-slack"></i> Slack</span>
          <span class="hub-badge"><i class="fab fa-salesforce"></i> Salesforce</span>
          <span class="hub-badge"><i class="fab fa-hubspot"></i> HubSpot</span>
          <span class="hub-badge"><i class="fab fa-whatsapp"></i> WhatsApp</span>
          <span class="hub-badge"><i class="fab fa-google"></i> Google</span>
          <span class="hub-badge"><i class="fal fa-bolt"></i> Zapier</span>
          <span class="hub-badge"><i class="fab fa-stripe"></i> Stripe</span>
          <span class="hub-badge"><i class="fab fa-shopify"></i> Shopify</span>
          <span class="hub-badge"><i class="fab fa-microsoft"></i> Microsoft</span>
          <span class="hub-badge"><i class="fal fa-table-cells"></i> Airtable</span>
          <span class="hub-badge"><i class="fal fa-comments"></i> Intercom</span>
          <span class="hub-badge"><i class="fab fa-telegram"></i> Telegram</span>
        </div>
      </div>

      <!-- RIGHT — 3D orbital diagram -->
      <div class="hub-orbital rv d2">
        <div class="hub-scene">

          <!-- Decorative elliptical rings -->
          <div class="hub-ring r1"></div>
          <div class="hub-ring r2"></div>
          <div class="hub-ring r3"></div>

          <!-- Central HW AI hub -->
          <div class="hub-center">
            <span class="hw">HW</span>
            <span class="ai">AI</span>
          </div>

          <!-- ── INNER ORBIT (r=85px, 18s CW) — 3 icons at 120° ── -->
          <div class="orb o1" style="--dl:0s">
            <div class="hub-ic" data-tool="Slack"><i class="fab fa-slack"></i></div>
          </div>
          <div class="orb o1" style="--dl:-6s">
            <div class="hub-ic" data-tool="WhatsApp"><i class="fab fa-whatsapp"></i></div>
          </div>
          <div class="orb o1" style="--dl:-12s">
            <div class="hub-ic" data-tool="Google"><i class="fab fa-google"></i></div>
          </div>

          <!-- ── MIDDLE ORBIT (r=150px, 27s CCW) — 4 icons at 90° ── -->
          <div class="orb o2" style="--dl:0s">
            <div class="hub-ic" data-tool="HubSpot"><i class="fab fa-hubspot"></i></div>
          </div>
          <div class="orb o2" style="--dl:-6.75s">
            <div class="hub-ic" data-tool="Salesforce"><i class="fab fa-salesforce"></i></div>
          </div>
          <div class="orb o2" style="--dl:-13.5s">
            <div class="hub-ic" data-tool="Zapier"><i class="fal fa-bolt"></i></div>
          </div>
          <div class="orb o2" style="--dl:-20.25s">
            <div class="hub-ic" data-tool="Stripe"><i class="fab fa-stripe"></i></div>
          </div>

          <!-- ── OUTER ORBIT (r=215px, 38s CW) — 5 icons at 72° ── -->
          <div class="orb o3" style="--dl:0s">
            <div class="hub-ic" data-tool="Microsoft"><i class="fab fa-microsoft"></i></div>
          </div>
          <div class="orb o3" style="--dl:-7.6s">
            <div class="hub-ic" data-tool="Airtable"><span class="ltr">A</span></div>
          </div>
          <div class="orb o3" style="--dl:-15.2s">
            <div class="hub-ic" data-tool="Shopify"><i class="fab fa-shopify"></i></div>
          </div>
          <div class="orb o3" style="--dl:-22.8s">
            <div class="hub-ic" data-tool="Intercom"><i class="fal fa-comments"></i></div>
          </div>
          <div class="orb o3" style="--dl:-30.4s">
            <div class="hub-ic" data-tool="Telegram"><i class="fab fa-telegram"></i></div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

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
      <div class="sec-label">Notre méthodologie</div>
      <h2 class="sec-title rv">De l'audit au go-live<br><em>en 6 étapes maîtrisées</em></h2>
      <p class="sdtl-intro rv d1">Une approche structurée et éprouvée, conçue pour minimiser les risques et maximiser le ROI de votre transformation IA.</p>
    </div>

    <div class="sdtl-timeline" id="sdtlTimeline">
      <!-- Spine -->
      <div class="sdtl-spine"><div class="sdtl-spine-fill" id="sdtlSpineFill"></div></div>

      <!-- ── PHASE 0 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">1</div>
            <div class="sdtl-title">Audit du besoin</div>
            <p class="sdtl-desc">Cartographie des processus métier, identification des cas d'usage à ROI maximal, définition des KPIs cibles.</p>
            <span class="sdtl-tag">SEMAINE 1</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-search"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Analyse</div>
        </div>
      </div>

      <!-- ── PHASE 1 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Stratégie</div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-chess-knight"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">2</div>
            <div class="sdtl-title">Priorisation</div>
            <p class="sdtl-desc">Classement par impact business et effort d'intégration. Plan d'exécution sur 4–12 semaines.</p>
            <span class="sdtl-tag">SEMAINE 2</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 2 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">3</div>
            <div class="sdtl-title">Prototype</div>
            <p class="sdtl-desc">Déploiement pilote en 2–3 semaines. Tests en environnement contrôlé. Feedback équipe intégré.</p>
            <span class="sdtl-tag">SEMAINES 3–5</span>
          </div>
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
          <div class="sdtl-keyword">Test</div>
        </div>
      </div>
      
      <!-- ── PHASE 3 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Connexion</div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-plug"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-glass">
            <div class="sdtl-num">4</div>
            <div class="sdtl-title">Intégration</div>
            <p class="sdtl-desc">Connexion API à votre stack technique. Synchronisation bidirectionnelle. Tests exhaustifs en conditions réelles.</p>
            <span class="sdtl-tag">SEMAINES 6–8</span>
          </div>
        </div>
      </div>

      <!-- ── PHASE 4 — LEFT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-glass">
            <div class="sdtl-num">5</div>
            <div class="sdtl-title">Formation</div>
            <p class="sdtl-desc">Sessions équipe, documentation complète, support 1-on-1. Adoption progressive et accompagnée jusqu'à l'autonomie.</p>
            <span class="sdtl-tag">SEMAINE 9</span>
          </div>
        </div>
        <div class="sdtl-node-wrap">
          <div class="sdtl-node">
            <div class="sdtl-node-ring r1"></div>
            <div class="sdtl-node-ring r2"></div>
            <div class="sdtl-node-ring r3"></div>
            <div class="sdtl-node-core"><i class="fal fa-graduation-cap"></i></div>
            <div class="sdtl-node-pulse"></div>
          </div>
        </div>
        <div class="sdtl-panel sdtl-panel--right">
          <div class="sdtl-keyword">Adoption</div>
        </div>
      </div>
      
      <!-- ── PHASE 5 — RIGHT ── -->
      <div class="sdtl-step">
        <div class="sdtl-panel sdtl-panel--left">
          <div class="sdtl-keyword">Go-Live</div>
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
          <div class="sdtl-glass">
            <div class="sdtl-num">6</div>
            <div class="sdtl-title">Optimisation continue</div>
            <p class="sdtl-desc">Monitoring mensuel, ajustements IA, rapports KPI. Amélioration continue pour un ROI croissant dans le temps.</p>
            <span class="sdtl-tag">MOIS 3+</span>
          </div>
        </div>
      </div>

    </div><!-- /sdtl-timeline -->
  </div>
</section>


<!-- GOUVERNANCE IA — 3D FLIP ASTRONAUT -->
<section class="gouv">
  <div class="container">

    <!-- TITLE ABOVE THE RECTANGLE -->
    <div class="gouv-header">
      <div class="sec-label">Sécurité & conformité</div>
      <h2 class="sec-title rv">Gouvernance IA<br><em>enterprise-grade</em></h2>
    </div>

  </div>

  <!-- THE RECTANGLE — full width, no container -->
  <div class="gouv-wrap" id="gouvWrap">

    <!-- 5 crossfading backgrounds (one per block) -->
    <div class="gouv-bgs">
      <div class="gouv-bg gb1"></div>
      <div class="gouv-bg gb2"></div>
      <div class="gouv-bg gb3"></div>
      <div class="gouv-bg gb4"></div>
      <div class="gouv-bg gb5"></div>
    </div>

    <!-- TOP BAND — only the title -->
    <div class="gouv-left">
      <span class="gouv-hint" id="gouvHint">Survolez un bloc</span>
      <div class="gouv-active" id="gouvActive">
        <div class="gouv-at" id="gouvAT"></div>
      </div>
    </div>

    <!-- RIGHT — 5 flip blocks -->
    <div class="gouv-right">
      <div class="gouv-grid">

        <!-- 01 -->
        <div class="gouv-item"
             data-num="01"
             data-title="Conformité RGPD & CNDP"
             data-desc="Hébergement et traitement des données alignés sur la loi 09-08 et le RGPD européen. Audits réguliers, chiffrement AES-256 au repos et en transit.">
            
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/RGPD.webp" alt="Conformité RGPD & CNDP">
            <div class="gi-front">
              <span class="gi-num">01</span>
              <div class="gi-ico"><i class="fal fa-shield-alt"></i></div>
              <div class="gi-title">Conformité RGPD & CNDP</div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel">Protection légale</div>
              <div class="gi-btitle">Conformité RGPD & CNDP</div>
              <p class="gi-bdesc">Hébergement et traitement alignés sur la loi 09-08 et le RGPD. Audits réguliers, chiffrement AES-256.</p>
            </div>
          </div>
        </div>

        <!-- 02 -->
        <div class="gouv-item"
             data-num="02"
             data-title="Protection des données sensibles"
             data-desc="Chiffrement bout en bout et anonymisation avant traitement par les LLM. Vos données ne servent jamais à entraîner des modèles tiers.">
          <div class="gi-inner">
                <img src="<?php echo $siteURL; ?>images/Protection_des_donnees.webp" alt="Protection des données sensibles">
            <div class="gi-front">
              <span class="gi-num">02</span>
              <div class="gi-ico"><i class="fal fa-lock"></i></div>
              <div class="gi-title">Protection des données sensibles</div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel">Chiffrement bout en bout</div>
              <div class="gi-btitle">Protection des données sensibles</div>
              <p class="gi-bdesc">Anonymisation avant traitement LLM. Zéro donnée utilisée pour l'entraînement de modèles tiers.</p>
            </div>
          </div>
        </div>

        <!-- 03 -->
        <div class="gouv-item"
             data-num="03"
             data-title="Auditabilité & Logs"
             data-desc="Traçabilité absolue de chaque décision IA, conservée dans des journaux sécurisés consultables à tout moment.">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/Auditabilie.webp" alt="Auditabilité">
            <div class="gi-front">
              <span class="gi-num">03</span>
              <div class="gi-ico"><i class="fal fa-file-alt"></i></div>
              <div class="gi-title">Auditabilité & Logs</div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel">Traçabilité absolue</div>
              <div class="gi-btitle">Auditabilité & Logs</div>
              <p class="gi-bdesc">Chaque décision IA tracée et conservée dans des journaux sécurisés, consultables à tout moment.</p>
            </div>
          </div>
        </div>

        <!-- 04 — large (span 2) -->
        <div class="gouv-item r2 gouv-item-lg"
             data-num="04"
             data-title="Escalade & Human-in-the-loop"
             data-desc="Protocole de transfert instantané vers un opérateur humain dès qu'un niveau de certitude est jugé insuffisant. Zéro décision critique prise de façon autonome.">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/controle_humain.webp" alt="Contrôle humain">
            <div class="gi-front">
              <span class="gi-num">04</span>
              <div class="gi-ico"><i class="fal fa-users"></i></div>
              <div class="gi-title">Escalade & Human-in-the-loop</div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel">Contrôle humain</div>
              <div class="gi-btitle">Escalade & Human-in-the-loop</div>
              <p class="gi-bdesc">Transfert instantané vers un opérateur humain dès qu'un niveau de certitude est insuffisant. L'IA assiste — l'humain décide.</p>
            </div>
          </div>
        </div>

        <!-- 05 -->
        <div class="gouv-item r2"
             data-num="05"
             data-title="Hébergement souverain"
             data-desc="On-premise ou cloud privé selon vos exigences de sécurité. SLA haute disponibilité pour les grands comptes et appels d'offres stratégiques.">
          <div class="gi-inner">
              <img src="<?php echo $siteURL; ?>images/cloud.webp" alt="Hébergement souverain">
            <div class="gi-front">
              <span class="gi-num">05</span>
              <div class="gi-ico"><i class="fal fa-server"></i></div>
              <div class="gi-title">Hébergement souverain</div>
            </div>
            <div class="gi-back">
              <div class="gi-blabel">Déploiement souverain</div>
              <div class="gi-btitle">Hébergement souverain</div>
              <p class="gi-bdesc">On-premise ou cloud privé. SLA haute disponibilité garanti pour les grands comptes.</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


<section class="pack-section">
        <div class="container">
            <div class="pricing-header">
              <div class="sec-label">Offres et tarification</div>
              <h2 class="sec-title">Trois modèles<br>d'engagement <em>flexible</em></h2>
              <p class="pricing-intro rv">Du pilote au déploiement d'entreprise, nous adaptons notre offre à votre croissance et votre budget. Transparence complète, pas de frais cachés.</p>
            </div>
        </div>
        <div class="container">
            <div class="pack-box">
                <div class="item-pack">
                    <span class="popular">Démarrage</span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="Offre Pilote"></div>
                    <h4>Offre Pilote</h4>
                    <div class="textbox">
                        <p>Idéal pour tester l'IA sur un cas d'usage précis avant engagement long terme.</p>
                        <ul>
                          <li>1 solution IA (4 semaines)</li>
                          <li>Configuration de base</li>
                          <li>1 intégration simple</li>
                          <li>Formation équipe</li>
                          <li>Support 30 jours</li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span>A partir de </span><br>
                        15 000 <sup>MAD</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span>Demander un audit</span></a>
                </div>

                <div class="item-pack active">
                    <span class="popular"><i class="fa fa-trophy"></i> Recommandé</span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="Offre Pilote"></div>
                    <h4>Bundle Métier</h4>
                    <div class="textbox">
                        <p>Solution complète : 2-3 agents IA, écosystème connecté, support continu.</p>
                        <ul>
                          <li>2-3 solutions IA intégrées</li>
                          <li>Configuration avancée</li>
                          <li>3-4 intégrations CRM</li>
                          <li>Reporting automatisé</li>
                          <li>Support 6 mois inclus</li>
                          <li>Optimisations trimestrielles</li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span>A partir de </span><br>
                        45 000 - 100 000 <sup>MAD</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span>Demander une démo</span></a>
                </div>

                <div class="item-pack">
                    <span class="popular">Grands comptes</span>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/pilot.webp" alt="Offre Pilote"></div>
                    <h4>Transformation IA</h4>
                    <div class="textbox">
                        <p>Déploiement enterprise sur plusieurs départements, API custom, SLA garanti.</p>
                        <ul>
                          <li>Programme complet multi-agents</li>
                          <li>Architecture personnalisée</li>
                          <li>5+ intégrations complexes</li>
                          <li>Reporting executive</li>
                          <li>Support dédié 12+ mois</li>
                          <li>Optimisations mensuelles</li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="price">
                        <span>A partir de </span><br>
                        100 000 <sup>MAD+</sup>
                    </div>
                    <a href="#0" class="btn-pack open-form-service"><span>Parler à un expert</span></a>
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
        <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="Demander un audit IA" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Demander un audit IA</span></div>
          <div class="sb-knob"><i class="fal fa-search"></i></div>
        </a>
    
        <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="Voir le catalogue" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="sb-label"><span class="sb-hint">Voir le catalogue</span></div>
          <div class="sb-knob"><i class="fal fa-eye"></i></div>
        </a>
    </div>
  </div>
</section>

<!-- CASE STUDIES -->
<section class="case-studies">
  <div class="container">
    <div class="sec-label">Cas clients</div>
    <h2 class="sec-title rv">Nos clients<br>font la <em>différence</em></h2>
    
    <div class="case-grid">
      <div class="case-card rv">
        <div class="case-sector">HÔTELLERIE</div>
        <div class="case-title">Hôtel 5 étoiles — Casablanca</div>
        <p class="case-desc">Déploiement d'un réceptionniste IA WhatsApp pour check-in/out et concierge digital. Intégration PMS, disponibilité chambre temps réel.</p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+45%</div>
            <div class="case-metric-label">Satisfaction clients</div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">-35%</div>
            <div class="case-metric-label">Charge réception</div>
          </div>
        </div>
      </div>

      <div class="case-card rv d1">
        <div class="case-sector">IMMOBILIER</div>
        <div class="case-title">Promotion immobilière — Rabat</div>
        <p class="case-desc">Agent IA de qualification téléphonique + prospection LinkedIn. Mises à jour chantier automatisées. Campagnes WhatsApp sortantes.</p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+120%</div>
            <div class="case-metric-label">Leads qualifiés/mois</div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">-60%</div>
            <div class="case-metric-label">Temps prospection</div>
          </div>
        </div>
      </div>

      <div class="case-card rv d2">
        <div class="case-sector">SANTÉ</div>
        <div class="case-title">Clinique privée — Fès</div>
        <p class="case-desc">Système de gestion RDV + relances SMS/WhatsApp. Intégration logiciel médical existant. Support patient 24/7 (FAQ, urgences).</p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">-42%</div>
            <div class="case-metric-label">No-shows RDV</div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">+88%</div>
            <div class="case-metric-label">Utilisation slots</div>
          </div>
        </div>
      </div>

      <div class="case-card rv">
        <div class="case-sector">RESTAURATION</div>
        <div class="case-title">Chaîne de restaurants — Marrakech</div>
        <p class="case-desc">Concierge IA multicanal (chat, WhatsApp, SMS). Réservations, commandes, feedback automatisé. Intégration caisse + table management.</p>
        <div class="case-metrics">
          <div class="case-metric">
            <div class="case-metric-value">+65%</div>
            <div class="case-metric-label">Réservations en ligne</div>
          </div>
          <div class="case-metric">
            <div class="case-metric-value">+3.2pts</div>
            <div class="case-metric-label">Score satisfaction</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
/* Secteurs expand accordion */
(function(){const cards=document.querySelectorAll('.sect-exp-card');if(!cards.length)return;cards.forEach(card=>{card.addEventListener('click',()=>{if(card.classList.contains('active'))return;cards.forEach(c=>c.classList.remove('active'));card.classList.add('active');});});})();

/* Accordion */
document.querySelectorAll('.hw-acc-head').forEach(head=>{head.addEventListener('click',()=>{const item=head.closest('.hw-acc-item');const wasOpen=item.classList.contains('open');document.querySelectorAll('.hw-acc-item.open').forEach(i=>i.classList.remove('open'));if(!wasOpen){item.classList.add('open');setTimeout(()=>item.scrollIntoView({behavior:'smooth',block:'nearest'}),50);}});});

/* HW infinite carousel */
(function(){
  const outer=document.querySelector('.hw-scroll-outer');
  const track=document.getElementById('hwTrack');
  if(!track||!outer)return;
  const originals=Array.from(track.querySelectorAll('.hw-card'));
  const n=originals.length;
  originals.forEach(c=>{const cl=c.cloneNode(true);cl.removeAttribute('id');track.appendChild(cl);});
  originals.slice().reverse().forEach(c=>{const cl=c.cloneNode(true);cl.removeAttribute('id');track.insertBefore(cl,track.firstChild);});
  track.querySelectorAll('.rv').forEach(el=>el.classList.add('on'));
  function metrics(){
    const card=track.querySelector('.hw-card');
    const gap=parseInt(getComputedStyle(track).columnGap||getComputedStyle(track).gap)||100;
    const cw=card?card.offsetWidth:300;
    return{cw,gap,step:cw+gap};
  }
  function init(){
    const{cw,gap,step}=metrics();
    const peek=Math.max(0,(outer.offsetWidth-3*cw-2*gap)/2);
    track.scrollLeft=n*step-peek;
  }
  init();
  window.addEventListener('resize',init);
  let jumping=false;
  track.addEventListener('scroll',()=>{
    if(jumping)return;
    const{step}=metrics();
    if(track.scrollLeft<2*step){jumping=true;track.scrollLeft+=n*step;setTimeout(()=>jumping=false,60);}
    else if(track.scrollLeft>(2*n-2)*step){jumping=true;track.scrollLeft-=n*step;setTimeout(()=>jumping=false,60);}
  },{passive:true});
  const prev=document.getElementById('hwPrev'),next=document.getElementById('hwNext');
  function slide(dir){const{step}=metrics();track.scrollBy({left:dir*step,behavior:'smooth'});}
  if(prev)prev.addEventListener('click',()=>slide(-1));
  if(next)next.addEventListener('click',()=>slide(1));
  let isDown=false,sx,sl;
  track.addEventListener('mousedown',e=>{isDown=true;sx=e.pageX;sl=track.scrollLeft;});
  document.addEventListener('mouseup',()=>isDown=false);
  track.addEventListener('mousemove',e=>{if(!isDown)return;e.preventDefault();track.scrollLeft=sl-(e.pageX-sx)*1.3;});
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

/* GOUVERNANCE — background switch + title + gray siblings */
(function(){
  var panel  = document.getElementById('gouvActive');
  var elTitle= document.getElementById('gouvAT');
  var hint   = document.getElementById('gouvHint');
  var bgs    = Array.from(document.querySelectorAll('.gouv-bg'));
  if(!panel) return;

  var items  = Array.from(document.querySelectorAll('.gouv-item'));

  function setActiveBg(num){
    bgs.forEach(function(bg){ bg.classList.remove('active'); });
    var target = document.querySelector('.gb' + num);
    if(target) target.classList.add('active');
  }

  items.forEach(function(item){
    item.addEventListener('mouseenter', function(){
      var num = parseInt(this.dataset.num) || 1;
      /* Switch background */
      setActiveBg(num);
      /* Show block title in top band */
      elTitle.textContent = this.dataset.title || '';
      panel.classList.add('on');
      if(hint) hint.classList.add('hidden');
      /* Gray out siblings */
      items.forEach(function(other){
        if(other !== item) other.classList.add('gi-dimmed');
        else other.classList.remove('gi-dimmed');
      });
    });
    item.addEventListener('mouseleave', function(){
      /* Fade all backgrounds out */
      bgs.forEach(function(bg){ bg.classList.remove('active'); });
      panel.classList.remove('on');
      if(hint) hint.classList.remove('hidden');
      items.forEach(function(other){ other.classList.remove('gi-dimmed'); });
    });
  });
})();
</script>