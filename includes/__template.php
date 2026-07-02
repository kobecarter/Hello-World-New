<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">

<meta name="website" content="<?php echo $siteURL; ?>">
<?php getSeoMeta($_GET); ?>

<!-- Meta Pixel Code -->
<script>
! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1306708063569247');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1306708063569247&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->

<!-- FavIcon -->
<link rel="shortcut icon" href="<?= $siteURL; ?>assets/img/favicon.ico">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,200;0,300;1,200;1,300&family=Montserrat:ital,wght@0,100;0,200;0,300;0,700;0,800;0,900;1,100;1,200;1,300&family=Raleway:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/owl.theme.default.css"> -->
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/main.css?v=1.2">
<style>
:root {
  --bg:     #f7f5f2;
  --bg2:    #edeae5;
  --bg3:    #e3dfda;
  --txt:    #0d0b09;
  --txt2:   #6b6460;
  --gold:   #8b6a22;
  --gold2:  #c9a96e;
  --border: rgba(0,0,0,.09);
  --fd: 'Cormorant Garamond', Georgia, serif;
  --fm: 'Montserrat', sans-serif;
  --fb: 'Raleway', sans-serif;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--txt);font-family:var(--fb);overflow-x:hidden;line-height:1.6}
a{text-decoration:none;color:inherit}
img{max-width:100%}

/* CURSOR */
.cur{width:10px;height:10px;background:var(--gold);border-radius:50%;position:fixed;top:0;left:0;pointer-events:none;z-index:9999;transform:translate(-50%,-50%);transition:transform .15s}
.cur2{width:34px;height:34px;border:1px solid rgba(139,106,34,.4);border-radius:50%;position:fixed;top:0;left:0;pointer-events:none;z-index:9998;transform:translate(-50%,-50%);transition:left .12s ease,top .12s ease}

/* HEADER */
header{position:fixed;top:0;left:0;right:0;z-index:800;padding:1.6rem 3.5rem;display:flex;align-items:center;justify-content:space-between;background:transparent;gap:2rem;transition:background .4s,padding .4s,border-color .4s;border-bottom:1px solid transparent}
header.scrolled{background:rgba(247,245,242,.94);backdrop-filter:blur(12px);padding:1rem 3.5rem;border-bottom:1px solid var(--border)}
.logo-hw{display:flex;align-items:center}
.logo-hw img{height:62px;width:auto;display:block}
.hdr-nav{display:flex;align-items:center;gap:1.4rem}
.hdr-nav a{font-size:.68rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(13,11,9,.5);transition:color .2s;position:relative}
.hdr-nav a::after{content:'';position:absolute;bottom:-4px;left:0;width:0;height:1px;background:var(--gold);transition:width .3s}
.hdr-nav a:hover{color:var(--txt)}
.hdr-nav a:hover::after{width:100%}
/* SUBMENU */
.has-sub{position:relative;display:flex;align-items:center}
.sub-arr{font-size:.38rem;margin-left:.32rem;vertical-align:middle;transition:transform .28s;color:inherit}
.has-sub.open .sub-arr{transform:rotate(180deg)}
.sub-menu{position:absolute;top:calc(100% + 1rem);left:50%;transform:translateX(-50%) translateY(-6px);background:var(--bg);border:1px solid var(--border);border-radius:14px;overflow:hidden;min-width:210px;opacity:0;pointer-events:none;transition:opacity .22s,transform .22s;z-index:200;box-shadow:0 12px 40px rgba(0,0,0,.09)}
.has-sub.open .sub-menu{opacity:1;pointer-events:auto;transform:translateX(-50%) translateY(0)}
.sub-menu::before{content:'';position:absolute;top:-1rem;left:0;right:0;height:1rem}
.sub-menu a{display:block;padding:.75rem 1.3rem;font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;color:var(--txt2);font-weight:500;border-bottom:1px solid var(--border);transition:color .18s,background .18s;white-space:nowrap}
.sub-menu a:last-child{border-bottom:none}
.sub-menu a:hover{color:var(--gold);background:var(--bg2)}
/* lang-sel en haut → dropdown s'ouvre vers le bas */
header .lang-drop{bottom:auto;top:calc(100% + .6rem)}
header .lang-btn{font-size:.72rem;padding:.72rem 1.35rem}
.hdr-cta{display:inline-flex;align-items:center;gap:.5rem;padding:.82rem 2rem;border:1px solid var(--gold);color:var(--gold);font-size:.72rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;background:transparent;transition:all .3s;position:relative;overflow:hidden;white-space:nowrap;border-radius:50px}
.hdr-cta::before{content:'';position:absolute;inset:0;background:var(--gold);transform:translateX(-101%);transition:transform .3s;z-index:0}
.hdr-cta:hover::before{transform:translateX(0)}
.hdr-cta span{position:relative;z-index:1}
.hdr-cta:hover{color:var(--bg)}
.burger{display:none;cursor:pointer;flex-direction:column;gap:5px;background:none;border:none;padding:.4rem}
.burger i{display:block;width:22px;height:2px;background:var(--txt);transition:all .3s}
@media(max-width:991px){.hdr-nav,header .lang-sel{display:none}.burger{display:flex}header{padding:1.2rem 1.5rem}header.scrolled{padding:1rem 1.5rem}}

/* MOBILE NAV */
.mobile-nav{position:fixed;inset:0;background:var(--bg);z-index:700;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:2.5rem;transform:translateX(100%);transition:transform .5s cubic-bezier(.16,1,.3,1)}
.mobile-nav.open{transform:none}
.mobile-nav a{font-family:var(--fd);font-weight:200;font-size:clamp(2.5rem,8vw,4rem);color:var(--txt);letter-spacing:-.01em;transition:color .2s}
.mobile-nav a:hover{color:var(--gold)}

/* BUTTONS */
.btn-hw{display:inline-flex;align-items:center;gap:.6rem;padding:.9rem 2.4rem;border:1px solid var(--gold);color:var(--gold);font-family:var(--fb);font-size:.7rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;background:transparent;cursor:pointer;transition:all .3s;position:relative;overflow:hidden;border-radius:50px}
.btn-hw::before{content:'';position:absolute;inset:0;background:var(--gold);transform:translateX(-101%);transition:transform .3s;z-index:0}
.btn-hw:hover::before{transform:translateX(0)}
.btn-hw span,.btn-hw i{position:relative;z-index:1}
.btn-hw:hover{color:var(--bg)}
.btn-ghost{border-color:rgba(247,245,242,.2);color:rgba(247,245,242,.6)}
.btn-ghost::before{background:rgba(247,245,242,.1)}
.btn-ghost:hover{color:rgba(247,245,242,.9)}

/* HERO */
.hero{position:relative;height:100vh;min-height:640px;overflow:hidden;background:var(--bg);display:flex;flex-direction:column}
#hero-canvas{position:absolute;inset:0;width:100%;height:100%;z-index:0;pointer-events:none}
.hero-body{position:relative;z-index:2;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:4rem 2rem 0;text-align:center}
.hero-title{line-height:.92;margin-bottom:3rem;cursor:default}
.ht-1{display:block;font-family:var(--fm);font-weight:300;font-size:clamp(2.2rem,5.5vw,6.2rem);color:var(--txt);letter-spacing:.02em;text-transform:uppercase}
.ht-2{display:block;font-family:var(--fm);font-weight:300;font-size:clamp(2.2rem,5.5vw,6.2rem);color:var(--txt);letter-spacing:.02em;text-transform:uppercase;line-height:.96}
.ht-accent{font-family:var(--fm);font-weight:600;color:#00b5d2;font-style:normal}
.explore-btn{width:92px;height:92px;border-radius:50%;background:#00b5d2;border:none;cursor:pointer;font-family:var(--fb);font-size:.56rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:#fff;display:flex;align-items:center;justify-content:center;transition:transform .45s cubic-bezier(.34,1.4,.64,1),box-shadow .45s ease;animation:pRing 2.8s ease infinite}
.explore-btn:hover{transform:scale(1.1);box-shadow:0 0 50px rgba(0,181,210,.35)}
@keyframes pRing{0%,100%{box-shadow:0 0 0 0 rgba(0,181,210,.45)}50%{box-shadow:0 0 0 18px rgba(0,181,210,0)}}
.hero-foot{position:relative;z-index:2;display:flex;align-items:center;justify-content:space-between;padding:1rem 3rem 2rem;margin-bottom:env(safe-area-inset-bottom,0)}
/* LANG SELECTOR */
.lang-sel{position:relative}
.lang-btn{display:inline-flex;align-items:center;gap:.55rem;background:none;border:1px solid var(--border);padding:.55rem 1rem;cursor:pointer;font-family:var(--fb);font-size:.62rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--txt2);transition:border-color .25s,color .25s;border-radius:50px}
.lang-btn:hover,.lang-sel.open .lang-btn{border-color:var(--gold);color:var(--gold)}
.lang-ico{font-size:.75rem}
.lang-arr{font-size:.5rem;transition:transform .3s}
.lang-sel.open .lang-arr{transform:rotate(180deg)}
.lang-drop{position:absolute;bottom:calc(100% + .6rem);left:0;background:var(--bg);border:1px solid var(--border);min-width:140px;opacity:0;transform:translateY(6px);pointer-events:none;transition:opacity .22s,transform .22s;z-index:10;border-radius:16px;overflow:hidden}
.lang-sel.open .lang-drop{opacity:1;transform:none;pointer-events:auto}
.lang-opt{display:flex;align-items:center;gap:.6rem;padding:.7rem 1rem;font-size:.65rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--txt2);transition:color .18s,background .18s;border-bottom:1px solid var(--border)}
.lang-opt:last-child{border-bottom:none}
.lang-opt:hover,.lang-opt.active{color:var(--gold);background:var(--bg2)}
.lang-opt .flag{font-size:.85rem}
/* footer right pill */
.hero-foot-r{display:inline-flex;align-items:center;gap:.55rem;padding:.82rem 2rem;background:var(--txt);border-radius:50px;color:var(--bg);font-family:var(--fb);font-size:.72rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;transition:background .3s,transform .3s}
.hero-foot-r:hover{background:#1a1714;transform:translateX(4px)}
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
@media(max-width:768px){.ht-1,.ht-2{font-size:clamp(1.5rem,7vw,3.5rem)}.hero-foot{padding:.8rem 1.5rem 1.2rem}.explore-btn{width:72px;height:72px}}

/* MARQUEE */
.marquee{border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:1.1rem 0;background:#fff;overflow:hidden}
.marquee-track{display:flex;white-space:nowrap;animation:mq 32s linear infinite}
.mq-dot{width:5px;height:5px;border-radius:50%;background:var(--gold);flex-shrink:0}
@keyframes mq{from{transform:translateX(0)}to{transform:translateX(-50%)}}

/* SECTION COMMONS */
.container{max-width:1280px;margin:0 auto;padding:0 3.5rem}
@media(max-width:768px){.container{padding:0 1.5rem}}
.sec-label{font-size:.64rem;letter-spacing:.42em;text-transform:uppercase;color:#09A1BE;display:flex;align-items:center;gap:.9rem;margin-bottom:1.2rem}
.sec-label::before{content:'';width:36px;height:1px;background:#09A1BE}
.sec-title{font-family:var(--fm);font-weight:300;font-size:clamp(2.2rem,5vw,5.5rem);line-height:.95;color:#680262;letter-spacing:-.03em;margin-bottom:2.5rem}
.sec-title em{font-style:normal;color:#09A1BE;}

/* FANCY TITLE HOVER — char wave */
.fancy-title{cursor:default}
.fancy-title .ch{display:inline-block;transition:transform .55s cubic-bezier(.34,1.56,.64,1),color .38s ease,text-shadow .4s ease;transition-delay:calc(var(--ci) * 0.028s)}
.fancy-title:hover .ch{transform:translateY(-0.16em) scale(1.04)}
.sec-title:hover .ch{color:var(--gold)}
.cta-band .sec-title:hover .ch{color:var(--gold2)}
.port-title:hover .ch{color:var(--gold2)}
.fancy-title .ch.sp{transition:none!important}
.fancy-title:hover .ch.sp{transform:none!important;color:inherit!important}
/* hero title chars stay dark on hover */
.hero-title.fancy-title:hover .ch{color:var(--txt)}
.rv{transform:translateY(28px);transition:opacity .7s ease,transform .7s ease}
.rv.on{opacity:1;transform:none}
.rv.d1{transition-delay:.1s}.rv.d2{transition-delay:.2s}.rv.d3{transition-delay:.3s}.rv.d4{transition-delay:.4s}

/* STATEMENT */
.statement{padding:8rem 0;background:var(--bg2);border-bottom:1px solid var(--border);position:relative;overflow:hidden}
.statement p{font-weight:200;font-size:clamp(1.6rem,3.2vw,3.2rem);line-height:1.3;text-align:center;margin:0 auto;letter-spacing:-.01em}
.s-muted{color:rgba(13,11,9,.2)}
.s-gold{color:var(--gold)}

/* SERVICES */
.services{padding:8rem 0;background:var(--bg)}
.services-header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:4rem;gap:2rem;flex-wrap:wrap}
.services-lead{font-size:.9rem;color:var(--txt2);max-width:360px;line-height:1.85;font-weight:300}
.svc-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden}
.svc-card{padding:2.8rem 2.4rem 1.4rem;border-right:1px solid var(--border);border-bottom:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s;cursor:default}
.svc-card:nth-child(3n){border-right:none}
.svc-card:nth-child(n+4){border-bottom:none}
.svc-card:hover{background:var(--bg2)}
.svc-num{position:absolute;top:1.2rem;right:1.6rem;font-family:var(--fm);font-size:4.5rem;font-weight:100;line-height:1;color:rgba(0,0,0,.06);letter-spacing:-.04em;transition:color .4s}
.svc-card:hover .svc-num{color:rgba(139,106,34,.1)}
.svc-icon{display:flex;align-items:center;justify-content:center;margin-bottom:1.8rem;color:var(--gold);transition:transform .35s,color .3s}
.svc-card:hover .svc-icon{transform:translateY(-3px);color:var(--gold)}
.svc-name{font-family:var(--fm);font-weight:500;font-size:1rem;color:var(--txt);margin-bottom:.85rem;line-height:1.25;letter-spacing:-.01em;text-transform: uppercase;}
.svc-desc{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.85;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 7;-webkit-box-orient: vertical; margin-bottom:0;}
.svc-more{display:inline-flex;align-items:center;gap:.45rem;font-size:.64rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);opacity:0;transform:translateX(-8px);transition:all .3s}
.svc-card:hover .svc-more{opacity:1;transform:none}
@media(max-width:991px){.svc-grid{grid-template-columns:repeat(2,1fr)}.svc-card:nth-child(3n){border-right:1px solid var(--border)}.svc-card:nth-child(2n){border-right:none}.svc-card:nth-child(5),.svc-card:nth-child(6){border-bottom:none}}
@media(max-width:575px){.svc-grid{grid-template-columns:1fr}.svc-card{border-right:none!important}.svc-card:last-child{border-bottom:none}}

/* STATS */
.stats{padding:7rem 0;background:var(--bg3);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden}
.stat-item{padding:3.5rem 2.5rem;border-right:1px solid var(--border);text-align:center}
.stat-item:last-child{border-right:none}
.stat-num{font-family:var(--fd);font-weight:200;font-size:clamp(3.5rem,6vw,6.5rem);line-height:1;color:var(--txt);letter-spacing:-.03em;margin-bottom:.5rem}
.stat-suf{color:var(--gold)}
.stat-label{font-size:.68rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--txt2)}
@media(max-width:767px){.stats-grid{grid-template-columns:repeat(2,1fr)}.stat-item:nth-child(2){border-right:none}.stat-item:nth-child(1),.stat-item:nth-child(2){border-bottom:1px solid var(--border)}}
@media(max-width:420px){.stats-grid{grid-template-columns:1fr}.stat-item{border-right:none!important;border-bottom:1px solid var(--border)}.stat-item:last-child{border-bottom:none}}

/* 3D TILT SHINE */
.tilt-shine{position:absolute;inset:0;pointer-events:none;z-index:2;opacity:0;transition:opacity .3s;background:radial-gradient(circle at var(--sx,50%) var(--sy,50%),rgba(201,169,110,.13) 0%,transparent 55%)}
.ai-card:hover .tilt-shine,.svc-card:hover .tilt-shine{opacity:1}
.port-item:hover .tilt-shine{opacity:1}
.tilt-shine.port-shine{background:radial-gradient(circle at var(--sx,50%) var(--sy,50%),rgba(201,169,110,.07) 0%,transparent 50%)}

/* AI SOLUTIONS */
.ai-sol{padding:8rem 0;background:var(--bg3);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.ai-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);overflow:hidden;border-radius:22px}
.ai-card{padding:3rem 2.6rem;border-right:1px solid var(--border);border-bottom:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s;cursor:default;background:var(--bg3)}
.ai-card:nth-child(3n){border-right:none}
.ai-card:nth-child(n+4){border-bottom:none}
.ai-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--gold),var(--gold2),transparent);transform:scaleX(0);transform-origin:left;transition:transform .45s ease}
.ai-card:hover{background:var(--bg2)}
.ai-card:hover::before{transform:scaleX(1)}
.ai-icon-wrap{position:relative;display:inline-flex;margin-bottom:2rem;isolation:isolate}
.ai-icon-wrap::before{content:'';position:absolute;top:50%;left:-200px;right:-200px;height:1px;background:linear-gradient(to right,transparent 0%,rgba(139,106,34,.12) 20%,rgba(139,106,34,.28) 50%,rgba(139,106,34,.12) 80%,transparent 100%);z-index:0}
.ai-card-icon{position:relative;display:flex;align-items:center;justify-content:center;width:80px;height:80px;border:1px solid rgba(139,106,34,.32);border-radius:50%;color:var(--gold);background:var(--bg3);transition:border-color .4s,transform .4s,box-shadow .4s,background .35s;flex-shrink:0;z-index:1;font-size: 32px;}
.ai-card:hover .ai-card-icon{color:var(--gold);transform:translateY(-4px);border-color:rgba(139,106,34,.75);box-shadow:0 0 22px rgba(139,106,34,.12);background:var(--bg2)}
.ai-card-title{font-family:var(--fd);font-weight:300;font-size:1.35rem;color:var(--txt);margin-bottom:.9rem;letter-spacing:-.015em;line-height:1.15;position:relative;z-index:1}
.ai-card-desc{font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.9;font-family:var(--fm);position:relative;z-index:1}
.ai-card-more{border:1px solid var(--border);padding: 5px 10px;border-radius: 5px;text-transform: uppercase;font-weight: 700;font-size: 12px;color: var(--gold);}
.ai-card-more i{margin-left:10px;}
.ai-card-more:hover{background:var(--gold);color:#FFF; text-decoration:none;}
@media(max-width:991px){.ai-grid{grid-template-columns:repeat(2,1fr)}.ai-card:nth-child(3n){border-right:1px solid var(--border)}.ai-card:nth-child(2n){border-right:none}.ai-card:nth-child(5),.ai-card:nth-child(6){border-bottom:none}}
@media(max-width:575px){.ai-grid{grid-template-columns:1fr}.ai-card{border-right:none!important}.ai-card:last-child{border-bottom:none}}

/* SERVICES CARDS */
.srv-section{padding:8rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.srv-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);margin-top:3.5rem}
.srv-card{display:flex;flex-direction:column;border-right:1px solid var(--border);overflow:hidden;transition:background .3s; margin: 0 15px;}
.srv-card:last-child{border-right:none}
.srv-card:hover{background:var(--bg3)}
.srv-visual{position:relative;overflow:hidden;aspect-ratio:4/3;flex-shrink:0;border-radius: 15px;}
.srv-visual::after{content:'';position:absolute;inset:0;background:linear-gradient(110deg,transparent 35%,rgba(247,245,242,.055) 50%,transparent 65%);transform:translateX(-100%);transition:transform .75s ease;pointer-events:none;z-index:2}
.srv-card:hover .srv-visual::after{transform:translateX(130%)}
.srv-visual-bg{position:absolute;inset:0;transition:transform .75s cubic-bezier(.25,.46,.45,.94)}
.srv-card:hover .srv-visual-bg{transform:scale(1.05)}
.srv-visual-bg svg{width:100%;height:100%;display:block}
.srv-visual-num{position:absolute;bottom:.8rem;right:1.4rem;font-family:var(--fd);font-size:5.5rem;font-weight:200;line-height:1;color:rgba(247,245,242,.05);letter-spacing:-.04em;pointer-events:none;z-index:1;user-select:none}
.srv-visual-tag{position:absolute;top:1.4rem;left:1.6rem;font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:rgba(247,245,242,.38);border:1px solid rgba(247,245,242,.1);padding:.26rem .7rem;z-index:1}
.srv-body{padding:2.4rem 2.2rem;flex:1;display:flex;flex-direction:column;border-top:1px solid var(--border)}
.srv-title{font-family:var(--fd);font-weight:200;font-size:2rem;color:var(--txt);line-height:1;margin-bottom:.85rem;letter-spacing:-.01em}
.srv-title em{color:var(--gold);font-style:italic}
.srv-desc{font-size:.79rem;font-weight:300;color:var(--txt2);line-height:1.85;font-family:var(--fm);margin-bottom:1.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--border)}
.srv-features{list-style:none;margin-bottom:2rem;flex:1}
.srv-feat{display:flex;align-items:flex-start;gap:.75rem;padding:.52rem 0;font-size:.76rem;font-weight:400;color:var(--txt2);font-family:var(--fm);border-bottom:1px solid var(--border);transform:translateX(-10px);opacity:.45;transition:transform .42s calc(var(--fi,0)*.07s) ease,opacity .42s calc(var(--fi,0)*.07s)}
.srv-feat:last-child{border-bottom:none}
.srv-card:hover .srv-feat{transform:none;opacity:1}
.srv-feat-ico{flex-shrink:0;width:14px;height:14px;border:1px solid rgba(139,106,34,.35);display:flex;align-items:center;justify-content:center;margin-top:1px}
.srv-feat-ico svg{display:block;color:var(--gold)}
.srv-cta{display:inline-flex;align-items:center;gap:.65rem;padding:.88rem 2rem;background:var(--txt);color:var(--bg);font-family:var(--fb);font-size:.65rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;border:1px solid var(--txt);cursor:pointer;align-self:flex-start;position:relative;overflow:hidden;text-decoration:none;transition:border-color .3s;border-radius: 25px;}
.srv-cta::before{content:'';position:absolute;inset:0;background:var(--gold);transform:scaleX(0);transform-origin:left;transition:transform .42s cubic-bezier(.34,1.56,.64,1);z-index:0}
.srv-cta:hover{border-color:var(--gold)}
.srv-cta:hover::before{transform:scaleX(1)}
.srv-cta > *{position:relative;z-index:1}
@media(max-width:991px){.srv-grid{grid-template-columns:1fr}.srv-card{border-right:none!important;border-bottom:1px solid var(--border)}.srv-card:last-child{border-bottom:none}.srv-visual{aspect-ratio:16/7}}
@media(max-width:575px){.srv-visual{aspect-ratio:4/3}}

/* PORTFOLIO */
.portfolio{padding:8rem 0;background:var(--bg)}
.port-item{position:relative;overflow:hidden;cursor:pointer;min-height:380px;border-radius:22px;margin: 10px;box-shadow: rgba(0,0,0,.1) 10px 10px 0;}
.port-item.tall{grid-row:span 2;min-height:760px}
.port-bg{position:absolute;inset:0;transition:transform .7s ease;background-size:cover;background-position:center}
.port-bg img{height:100%;width:100%;object-fit:cover;}
.port-item:hover .port-bg{transform:scale(1.06)}
.p-meridian .port-bg{background:linear-gradient(145deg,#0e0c0a 0%,#1c1811 40%,#0b0a08 100%)}
.p-luminis .port-bg{background:linear-gradient(155deg,#090d14 0%,#111c2c 55%,#080b10 100%)}
.p-corvus .port-bg{background:linear-gradient(140deg,#0b0f0b 0%,#141f14 50%,#090c09 100%)}
.port-gfx{position:absolute;inset:0;pointer-events:none;overflow:hidden}
.port-gfx::before{content:'';position:absolute;width:220px;height:220px;top:-40px;right:-40px;border:1px solid rgba(201,169,110,.07);transform:rotate(25deg)}
.port-gfx::after{content:'';position:absolute;width:130px;height:130px;top:25px;right:25px;border:1px solid rgba(201,169,110,.05);transform:rotate(12deg)}
.port-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.88) 0%,rgba(0,0,0,.05) 60%,transparent 100%)}
.port-arrow{position:absolute;top:1.8rem;right:1.8rem;width:48px;height:48px;border:1px solid rgba(247,245,242,.12);display:flex;align-items:center;justify-content:center;color:rgba(247,245,242,.35);font-size:1.25rem;transition:all .35s;opacity:0;transform:translateY(-6px);border-radius: 10px;}
.port-item:hover .port-arrow{opacity:1;transform:none;border-color:#FFF;color:#FFF}
.port-body{position:absolute;bottom:0;left:0;right:0;padding:2.5rem 2.2rem}
.port-tag{font-size:.62rem;letter-spacing:.25em;text-transform:uppercase;color:var(--gold2);margin-bottom:.75rem;display:block}
.port-title{font-family:var(--fm);font-weight:300;font-size:clamp(1.8rem,3.5vw,3rem);color:#f5f3f0;line-height:1;margin-bottom:.5rem}
.port-sub{font-size:.8rem;color:rgba(247,245,242,.8)}
@media(max-width:767px){.port-grid{grid-template-columns:1fr}.port-item.tall{grid-row:span 1;min-height:380px}}

/* TRUST MARQUEE */
.trust{padding:0;background:var(--bg2);border-top:1px solid var(--border);overflow:hidden}
.trust-head{padding:6rem 0 4rem;text-align:left}
.trust-rows{border-top:1px solid var(--border)}
.trust-row{display:flex;overflow:hidden;border-bottom:1px solid var(--border)}
.trust-row:last-child{margin-bottom:60px;}
.trust-inner{display:flex;width:max-content;will-change:transform}
.trust-inner.go-l{animation:trkL 32s linear infinite}
.trust-inner.go-r{animation:trkR 32s linear infinite}
.trust-row:hover .trust-inner{animation-play-state:paused}
.trust-item{display:flex;align-items:center;gap:.7rem;padding:1.5rem 2.8rem;border-right:1px solid var(--border);white-space:nowrap;flex-shrink:0;transition:background .25s}
.trust-item img{height:140px;width: 140px;object-fit:contain;}
.trust-item:hover{background:var(--bg3)}
.trust-ico{font-size:.7rem;color:var(--gold);width:14px;text-align:center;flex-shrink:0}
.trust-name{font-family:var(--fm);font-size:.75rem;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--txt2);transition:color .25s}
.trust-name sup{font-size:.55em;letter-spacing:0;vertical-align:super}
.trust-item:hover .trust-name{color:var(--txt)}
@keyframes trkL{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
@keyframes trkR{0%{transform:translateX(-50%)}100%{transform:translateX(0)}}

/* INSIGHTS / DIGITAL EXPERT */
.insights{padding:8rem 0;border-top:1px solid var(--border)}
.insights-header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:4rem;gap:2rem;flex-wrap:wrap}
.insights-host{display:flex;align-items:center;gap:1rem}
.host-av{width:46px;height:46px;border-radius:50%;background:var(--txt);border:1px solid rgba(139,106,34,.3);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:.95rem;color:var(--gold2);font-weight:200;flex-shrink:0}
.host-name{font-family:var(--fd);font-weight:200;font-size:1.1rem;color:var(--txt)}
.host-role{font-size:.58rem;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);margin-top:.1rem}
.insights-main{display:grid;grid-template-columns:1fr 360px;gap:1.5rem;margin-bottom:1.5rem;align-items:stretch}
.ep-featured{padding:3.5rem;position:relative;overflow:hidden;display:flex;flex-direction:column;border-radius:22px}
.ep-featured::after{content:"";background:var(--txt);height:100%;width:100%;position: absolute;top: 0;left: 0;opacity: .5;}
.ep-featured img{position:absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;}
.ep-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:3rem;position: relative;z-index: 1;}
.ep-show{font-size:.56rem;letter-spacing:.4em;text-transform:uppercase;color:rgba(201,169,110,.5)}
.ep-num-tag{font-family:var(--fm);font-size:.58rem;font-weight:700;letter-spacing:.28em;color:rgba(247,245,242,.18);border:1px solid rgba(247,245,242,.07);padding:.28rem .75rem}
.ep-title-feat{font-family:var(--fd);font-weight:200;font-size:clamp(1.7rem,2.5vw,2.8rem);line-height:1.2;color:#f5f3f0;letter-spacing:-.01em;margin-bottom:2.5rem;flex:1;position: relative;z-index: 1;}
.ep-wave{margin-bottom:2rem; position: relative;}
.ep-wave svg{width:100%;height:44px;display:block}
.ep-foot{display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;position:relative;z-index: 1;}
.ep-meta-d{font-size:.64rem;letter-spacing:.1em;text-transform:uppercase;color:rgba(247,245,242,.6)}
.ep-play{display:inline-flex;align-items:center;gap:.65rem;padding:.78rem 1.8rem;border:1px solid rgba(139,106,34,.4);color:var(--gold2);font-size:.62rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;background:transparent;cursor:pointer;text-decoration:none;transition:all .3s;position:relative;overflow:hidden}
.ep-play::before{content:'';position:absolute;inset:0;background:var(--gold);transform:translateX(-101%);transition:transform .3s;z-index:0}
.ep-play:hover::before{transform:translateX(0)}
.ep-play:hover{border-color:var(--gold);color:var(--txt)}
.ep-play>*{position:relative;z-index:1}
.insights-feed{display:flex;flex-direction:column;border:1px solid var(--border);background:var(--bg);border-radius:22px;overflow:hidden}
.feed-item{padding:1.4rem 1.6rem;border-bottom:1px solid var(--border);transition:background .22s;cursor:pointer;display:flex;flex-direction:column;flex:1}
.feed-item:last-child{border-bottom:none}
.feed-item:hover{background:var(--bg2)}
.feed-cat{font-size:.52rem;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);display:inline-block;margin-bottom:.5rem}
.feed-title{font-family:var(--fm);font-size:.84rem;font-weight:400;color:var(--txt);line-height:1.45;letter-spacing:-.01em;flex:1;margin-bottom:.7rem}
.feed-foot{display:flex;align-items:center;justify-content:space-between;padding-top:.65rem;border-top:1px solid var(--border)}
.feed-date{font-size:.58rem;color:var(--txt2);letter-spacing:.06em}
.feed-arr{font-size:.58rem;color:var(--gold);opacity:0;transform:translateX(-4px);transition:all .22s}
.feed-item:hover .feed-arr{opacity:1;transform:none}
.insights-row{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden}
.insight-card{padding:2rem 2.2rem;border-right:1px solid var(--border);transition:background .28s;cursor:pointer;position:relative;overflow:hidden;display:flex;flex-direction:column}
.insight-card:last-child{border-right:none}
.insight-card:hover{background:var(--bg3)}
.insight-cat{font-size:.52rem;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);margin-bottom:.7rem;display:block}
.insight-title{font-family:var(--fm);font-size:.88rem;font-weight:400;color:var(--txt);line-height:1.5;letter-spacing:-.01em;flex:1;margin-bottom:1.4rem}
.insight-foot{display:flex;align-items:center;justify-content:space-between;padding-top:.9rem;border-top:1px solid var(--border);margin-top:auto}
.insight-date{font-size:.58rem;color:var(--txt2)}
.insight-read{font-size:.58rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);opacity:0;transition:opacity .22s;display:flex;align-items:center;gap:.4rem}
.insight-card:hover .insight-read{opacity:1}
.insight-card.is-ep{background:rgba(13,11,9,.022)}
.is-ep-mark{display:flex;align-items:center;gap:.5rem;font-size:.52rem;letter-spacing:.25em;text-transform:uppercase;color:rgba(13,11,9,.25);margin-bottom:.55rem}
.is-ep-mark::before{content:'';width:16px;height:1px;background:var(--gold);opacity:.55;flex-shrink:0}
@media(max-width:1024px){.insights-main{grid-template-columns:1fr 300px}}
@media(max-width:991px){.insights-main{grid-template-columns:1fr}.insights-row{grid-template-columns:repeat(2,1fr)}.insight-card:nth-child(2){border-right:none}.insight-card:nth-child(1),.insight-card:nth-child(2){border-bottom:1px solid var(--border)}}
@media(max-width:575px){.insights-row{grid-template-columns:1fr}.insight-card{border-right:none!important;border-bottom:1px solid var(--border)}.insight-card:last-child{border-bottom:none}.ep-featured{padding:2rem 1.8rem}}

/* TEAM */
.team{padding:8rem 0;background:var(--bg)}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;margin-top:3rem}
.team-card{overflow:hidden}
.team-thumb{position:relative;overflow:hidden;aspect-ratio:3/4;background:var(--bg3);border-radius:18px}
.team-initials{font-family:var(--fd);font-weight:200;font-size:5rem;color:rgba(0,0,0,.06);user-select:none;position:absolute;inset:0;display:flex;align-items:center;justify-content:center}
.team-geo{position:absolute;inset:0;pointer-events:none}
.team-geo::before{content:'';position:absolute;width:75%;height:75%;bottom:0;left:0;border-left:1px solid rgba(139,106,34,.1);border-bottom:1px solid rgba(139,106,34,.1)}
.team-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(247,245,242,.85) 0%,transparent 55%)}
.team-info{padding:1rem 0}
.team-name{font-family:var(--fd);font-weight:200;font-size:1.3rem;color:var(--txt)}
.team-role{font-size:.63rem;letter-spacing:.16em;text-transform:uppercase;color:var(--gold);margin-top:.15rem}
@media(max-width:991px){.team-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:480px){.team-grid{gap:.8rem}}

/* TESTIMONIALS — carousel */
.testimonials{padding:8rem 0;background:var(--bg);border-top:1px solid var(--border)}
.testi-viewport{overflow:hidden}
.testi-track{display:flex;transition:transform .6s cubic-bezier(.25,.46,.45,.94)}
.testi-item{flex-shrink:0;padding:0 0.75rem;box-sizing:border-box}
.testi-card{background:var(--bg2);border:1px solid var(--border);padding:2.4rem 2rem;transition:border-color .3s;border-radius:22px;height:100%}
.testi-card:hover{border-color:rgba(139,106,34,.22)}
.testi-quote{font-family:Georgia,serif;font-size:5.5rem;line-height:.8;color:var(--gold);opacity:.14;display:block;margin-bottom:1.4rem}
.testi-text{font-size:.85rem;color:var(--txt2);line-height:1.9;font-style:italic;margin-bottom:2rem;border-top:1px solid var(--border);padding-top:1.5rem;height: 340px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 12;-webkit-box-orient: vertical;}
.testi-author{display:flex;align-items:center;gap:1rem}
.testi-avatar{width:44px;height:44px;border-radius:50%;background:var(--bg3);border:1px solid rgba(139,106,34,.25);display:flex;align-items:center;justify-content:center;font-family:var(--fd);font-size:1rem;color:var(--gold);font-weight:200;flex-shrink:0}
.testi-name{font-family:var(--fd);font-weight:200;font-size:1.1rem;color:var(--txt)}
.testi-co{font-size:.62rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-top:.15rem}
.testi-controls{display:flex;align-items:center;justify-content:center;gap:2rem;margin-top:2.5rem}
.testi-nav{width:50px;height:50px;border:1px solid var(--border);background:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--txt2);font-size:.78rem;transition:all .3s;border-radius:50%}
.testi-nav:hover{border-color:var(--gold);color:var(--gold)}
.testi-dots{display:flex;gap:.55rem;align-items:center}
.testi-dot{width:7px;height:7px;border-radius:50%;background:var(--bg3);border:1px solid var(--border);cursor:pointer;padding:0;transition:all .3s}
.testi-dot.active{background:var(--gold);border-color:var(--gold);width:28px;border-radius:4px}
@media(max-width:575px){.testi-card{padding:2rem 1.5rem}}

/* CTA BAND */
/* POURQUOI HELLO WORLD */
.why-hw{padding:8rem 0;background:var(--bg2);overflow:visible;position:relative}
.why-hw::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 70% at 30% 50%,rgba(139,106,34,.03) 0%,transparent 70%);pointer-events:none}
.why-grid{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;position:relative;z-index:1}
.why-label.sec-label{color:var(--gold)}
.why-label.sec-label::before{background:var(--gold)}
.why-hw .sec-title{color:var(--txt)}
.why-hw .sec-title em{color:var(--gold)}
.why-intro{font-family:var(--fm);font-size:.88rem;font-weight:300;color:var(--txt2);line-height:1.9;margin-bottom:2.5rem}
.why-list{list-style:none;border-top:1px solid var(--border)}
.why-item{display:flex;align-items:flex-start;gap:1rem;padding:1.2rem 0;border-bottom:1px solid var(--border)}
.why-ico{width:18px;height:18px;border:1px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:.15rem;color:var(--gold);font-size:.4rem}
.why-txt{font-family:var(--fm);font-size:.82rem;font-weight:300;color:var(--txt2);line-height:1.75}
.why-txt strong{color:var(--txt);font-weight:500}
/* Bubble scene — cercles concentriques alignés à gauche */
.bubble-scene{position:relative;height:480px;overflow:visible}
/* Centre décalé en bas-gauche comme dans la capture */
.bub-wrap{position:absolute;top:50%;left:70px;transform:translate(0,-50%) scale(1.4);width:520px;height:520px}
.bub{position:absolute;border-radius:50%;}
.bub-4{width:520px;height:520px;background:rgba(0,0,0,.04)}
.bub-3{width:370px;height:370px;background:rgba(0,0,0,.06);left: 15px;bottom: 50px;}
.bub-2{width:240px;height:240px;background:rgba(0,0,0,.08);left: 30px; bottom: 100px;}
.bub-1{width:125px;height:125px;background:rgba(0,0,0,.11);left: 45px;bottom: 140px;}
/* Labels dans les anneaux — zone supérieure visible, diagonale */
.bl{position:absolute;z-index:5;opacity:0;transform:translateY(14px);transition:opacity .55s ease,transform .55s ease;text-align: center;}
.bl.on{opacity:1;transform:none}
/* centre bub-wrap à (2%+260px, 72%*480=346px) = approx (275px, 346px) dans la scène */
.bl-4{top:30px; left:500px; transition-delay:.36s}
.bl-3{top:110px;left:320px;transition-delay:.24s}
.bl-2{top:188px;left:180px;transition-delay:.12s}
.bl-1{top: 290px;left: 70px;transition-delay:0s}
.bub-val{display:block;font-family:var(--fm);font-weight:200;font-size:2.4rem;color:var(--txt);line-height:1;letter-spacing:-.03em}
.bub-suf{color:var(--gold);font-size:.5em;font-weight:400}
.bub-lbl{font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--txt2);margin-top:.4rem}
@media(max-width:991px){.why-grid{grid-template-columns:1fr}.bubble-scene{height:380px}.bub-wrap{width:400px;height:400px;top:70%}.bub-4{width:400px;height:400px}.bub-3{width:285px;height:285px}.bub-2{width:185px;height:185px}.bub-1{width:96px;height:96px}.bl-4{top:22px;left:52px}.bl-3{top:84px;left:106px}.bl-2{top:144px;left:150px}.bl-1{top:193px;left:180px}}

/* FAQ */
.faq{padding:8rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.faq-list{margin-top:3.5rem;border-top:1px solid var(--border)}
.faq-item{border-bottom:1px solid var(--border)}
.faq-btn{width:100%;display:flex;align-items:center;justify-content:space-between;gap:2rem;padding:1.8rem 0;background:none;border:none;cursor:pointer;text-align:left}
.faq-q{font-family:var(--fm);font-size:.95rem;font-weight:500;color:var(--txt);line-height:1.4;letter-spacing:-.01em;transition:color .2s}
.faq-btn:hover .faq-q{color:var(--gold)}
.faq-btn.open .faq-q{color:var(--gold)}
.faq-ico{width:28px;height:28px;border:1px solid var(--border);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--txt2);font-size:.55rem;transition:all .3s}
.faq-btn.open .faq-ico{background:var(--gold);border-color:var(--gold);color:#fff;transform:rotate(45deg)}
.faq-body{max-height:0;overflow:hidden;transition:max-height .45s cubic-bezier(.4,0,.2,1)}
.faq-body.open{max-height:400px}
.faq-ans{font-family:var(--fm);font-size:.84rem;font-weight:300;color:var(--txt2);line-height:1.9;padding-bottom:1.8rem;max-width:720px}
.faq-cols{display:grid;grid-template-columns:1fr 1fr;gap:0 5rem;align-items:start}
.faq-cols .faq-list{margin-top:0}
@media(max-width:767px){.faq-cols{grid-template-columns:1fr}}

/* AGENCIES — Nos agences */
.agencies{padding:8rem 0 0;background:var(--bg);border-top:1px solid var(--border)}
.agencies-list{margin-top:4rem}
.agency-band{position:relative;min-height:440px;display:flex;align-items:center;overflow:hidden;border-top:1px solid rgba(255,255,255,.05);border-radius:60px 60px 0 0}
.agency-band img{position:absolute;}
.agency-band+.agency-band{margin-top:-60px}
.agency-band:nth-child(1){z-index:1}
.agency-band:nth-child(2){z-index:2}
.agency-band:nth-child(3){z-index:3}
.agency-band:first-child{border-top:none}
.agency-band::before{content:'';position:absolute;inset:0;background:linear-gradient(to right,rgb(247, 245, 242) 0%,rgba(247,245,242,.9) 38%,rgba(247,245,242,.1) 56%,rgba(247,245,242,0) 100%);z-index:1;pointer-events:none}
.agency-band::after{content:'';position:absolute;right:0;top:0;width:55%;height:100%;background:repeating-linear-gradient(0deg,transparent,transparent 48px,rgba(201,169,110,.028) 48px,rgba(201,169,110,.028) 49px);z-index:0;pointer-events:none}
.agency-band>.container{position:relative;z-index:2;transform: translateX(-50%);width: 650px;}
.agency-content{max-width:650px;padding:4.5rem 0}
.agency-tag{font-size:.56rem;letter-spacing:.4em;text-transform:uppercase;color:var(--gold);margin-bottom:1.4rem;display:flex;align-items:center;gap:.8rem}
.agency-tag::before{content:'';width:26px;height:1px;background:var(--gold);flex-shrink:0}
.agency-city{font-family:var(--fd);font-weight:200;font-size:clamp(3.2rem,6vw,6.5rem);line-height:.95;color:var(--txt);letter-spacing:-.03em;margin-bottom:.5rem;transition:color .35s}
.agency-band:hover .agency-city{color:var(--gold)}
.agency-details{list-style:none;border-top:1px solid var(--border);margin-bottom:2rem}
.agency-details li{display:flex;align-items:flex-start;gap:.9rem;padding:.72rem 0;border-bottom:1px solid var(--border);font-size:.82rem}
.agency-details li i{color:var(--gold);flex-shrink:0;margin-top:2px;font-size:.75rem;width:14px;text-align:center;line-height: 18px;}
.agency-details li a,.agency-details li p{color:var(--txt2);transition:color .2s;margin:0}
.agency-details li a:hover{color:var(--gold)}
.agency-link{display:inline-flex;align-items:center;gap:.6rem;font-size:.62rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gold);transition:gap .25s}
.agency-link:hover{gap:1rem}
.agency-coords{position:absolute;right:3.5rem;bottom:2.5rem;font-family:var(--fm);font-size:.55rem;font-weight:300;letter-spacing:.22em;color:rgba(201,169,110,.22);z-index:2;text-transform:uppercase;user-select:none}
.agency-num{position:absolute;right:3.5rem;top:50%;transform:translateY(-50%);font-family:var(--fd);font-weight:200;font-size:clamp(6rem,14vw,16rem);line-height:1;color:rgba(255,255,255,.025);z-index:0;letter-spacing:-.05em;user-select:none;pointer-events:none}
@media(max-width:991px){.agency-band::before{background:linear-gradient(to right,var(--bg) 0%,var(--bg) 62%,rgba(247,245,242,.3) 100%)}}
@media(max-width:575px){.agency-content{padding:3rem 0}.agency-band{min-height:auto}.agency-band::before{background:rgba(247,245,242,.93)}.agency-coords,.agency-num{display:none}}

.cta-band{padding:9rem 0;background:var(--txt);text-align:center;position:relative;overflow:hidden}
.cta-band::before{content:'AXIOM';font-family:var(--fd);font-weight:200;font-size:clamp(8rem,20vw,22rem);position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:transparent;-webkit-text-stroke:1px rgba(247,245,242,.04);white-space:nowrap;pointer-events:none;user-select:none}
.cta-band .sec-label{justify-content:center;color:rgba(139,106,34,.55)}
.cta-band .sec-label::before{background:rgba(139,106,34,.55)}
.cta-band .sec-title{color:var(--bg)}
.cta-band .sec-title em{color:var(--gold2)}
.cta-sub{font-size:.9rem;color:rgba(247,245,242,.35);max-width:440px;margin:0 auto 3rem;line-height:1.85}
.cta-btns{display:flex;gap:1.2rem;justify-content:center;flex-wrap:wrap;position:relative;z-index:1}

/* CONTACT */
.contact{padding:8rem 0;background:var(--bg2);border-top:1px solid var(--border)}
.contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:start;margin-top:3rem}
.contact-lead{font-size:.9rem;color:var(--txt2);line-height:1.85;max-width:380px}
.c-detail{display:flex;gap:1.2rem;align-items:flex-start;padding:1.6rem 0;border-bottom:1px solid var(--border)}
.c-detail:first-of-type{border-top:1px solid var(--border);margin-top:2.5rem}
.c-ico{width:45px;height:45px;border:1px solid rgba(139,106,34,.2);display:flex;align-items:center;justify-content:center;color:var(--gold);flex-shrink:0;font-size:1rem;border-radius: 5px;}
.c-lbl{font-size:.6rem;letter-spacing:.22em;text-transform:uppercase;color:var(--txt2);margin-bottom:.25rem}
.c-val{font-size:1.1rem;font-weight:200;color:var(--txt)}
.form-row{margin-bottom:1.3rem}
.form-row label{display:block;font-size:.6rem;letter-spacing:.22em;text-transform:uppercase;color:var(--txt2);margin-bottom:.6rem}
.form-row input,.form-row select,.form-row textarea{width:100%;padding:.9rem 1rem;background:var(--bg);border:1px solid var(--border);color:var(--txt);font-family:var(--fb);font-size:.88rem;font-weight:300;outline:none;-webkit-appearance:none;appearance:none;transition:border-color .25s;border-radius:10px}
.form-row input:focus,.form-row select:focus,.form-row textarea:focus{border-color:var(--gold)}
.form-row textarea{resize:vertical;min-height:130px}
.form-2col{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
@media(max-width:767px){.contact-grid{grid-template-columns:1fr;gap:3rem}.form-2col{grid-template-columns:1fr}}

/* FOOTER */
/* FOOTER */
footer::before{content:'';position:absolute;top:0;left:0;height:1px;width:0;background:linear-gradient(to right,transparent,var(--gold) 50%,transparent);z-index:2}
footer.foot-in::before{animation:foot-line 1.8s ease forwards}
@keyframes foot-line{to{width:100%}}
.footer-glow{position:absolute;top:-100px;left:50%;transform:translateX(-50%);width:700px;height:260px;background:radial-gradient(ellipse,rgba(139,106,34,.07) 0%,transparent 70%);pointer-events:none}
.footer-top{display:grid;grid-template-columns:1.6fr 1fr 1fr 1fr;gap:3rem;padding:4rem 0;border-bottom:1px solid rgba(255,255,255,.06)}
.footer-hw-logo{height:68px;width:auto;display:block;margin-bottom:1.8rem;opacity:.85;transition:opacity .3s,filter .3s}
.footer-hw-logo:hover{opacity:1;filter:brightness(1.1)}
.footer-tagline{font-size:.8rem;color:rgba(247,245,242,.38);line-height:1.95;max-width:240px}
.fcol-title{font-size:.64rem;letter-spacing:.28em;text-transform:uppercase;color:rgba(247,245,242,.75);margin-bottom:1.6rem;position:relative;padding-bottom:.75rem}
.fcol-title::after{content:'';position:absolute;bottom:0;left:0;width:20px;height:1px;background:var(--gold);opacity:.55}
.flinks{list-style:none}
.flinks li{margin-bottom:.55rem}
.flinks a{font-size:.82rem;color:rgba(247,245,242,.45);font-weight:300;position:relative;display:inline-block;padding-bottom:1px;transition:color .2s}
.flinks a::after{content:'';position:absolute;bottom:0;left:0;width:0;height:1px;background:var(--gold2);transition:width .3s cubic-bezier(.34,1.56,.64,1)}
.flinks a:hover{color:rgba(247,245,242,.88)}
.flinks a:hover::after{width:100%}
.fmt-strip{border-top:1px solid rgba(255,255,255,.04);border-bottom:1px solid rgba(255,255,255,.04);padding:.65rem 0;overflow:hidden}
.fmt-track{display:flex;width:max-content;animation:fmt 30s linear infinite}
.fmt-item{white-space:nowrap;font-size:.56rem;letter-spacing:.35em;text-transform:uppercase;padding:0 2.5rem;color:rgba(201,169,110,.2)}
.fmt-item.hi{color:rgba(201,169,110,.5)}
@keyframes fmt{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.footer-bottom{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;padding:2rem 0}
.footer-copy{font-size:.67rem;color:rgba(247,245,242,.28);letter-spacing:.08em}
.footer-social{display:flex;gap:.55rem}
.footer-social a{width:38px;height:38px;border:1px solid rgba(247,245,242,.09);display:flex;align-items:center;justify-content:center;color:rgba(247,245,242,.32);font-size:.8rem;position:relative;overflow:hidden;transition:border-color .25s}
.footer-social a::before{content:'';position:absolute;inset:0;background:var(--gold);transform:scaleY(0);transform-origin:bottom;transition:transform .32s cubic-bezier(.34,1.56,.64,1)}
.footer-social a i{position:relative;z-index:1;transition:color .25s}
.footer-social a:hover{border-color:var(--gold)}
.footer-social a:hover::before{transform:scaleY(1)}
.footer-social a:hover i{color:#060402}
@media(max-width:991px){.footer-top{grid-template-columns:1fr 1fr;gap:2rem}}
@media(max-width:575px){.footer-top{grid-template-columns:1fr}.footer-statement{padding:3.5rem 0 3rem}.footer-bottom{flex-direction:column;align-items:flex-start}}

/* BACK TO TOP */
.back-top{position:fixed;bottom:2rem;right:2rem;width:48px;height:48px;background:var(--bg2);border:1px solid var(--border);color:var(--txt);display:flex;align-items:center;justify-content:center;z-index:900;cursor:pointer;font-size:1rem;transition:all .3s;opacity:0;pointer-events:none;border-radius: 10px;}
.back-top.show{opacity:1;pointer-events:auto}
.back-top:hover{border-color:var(--gold);color:var(--gold)}
/* PARALLAX */
[data-px]{will-change:transform}
</style>

<style>
/* DARK HERO HEADER OVERRIDE */
header.hdr-light:not(.scrolled){background:transparent}
header.hdr-light:not(.scrolled) .hdr-nav a{color:rgba(247,245,242,.45)}
header.hdr-light:not(.scrolled) .hdr-nav a:hover,
header.hdr-light:not(.scrolled) .hdr-nav a.active{color:rgba(247,245,242,.9)}
header.hdr-light:not(.scrolled) .logo-hw img{filter:brightness(0) invert(1) opacity(.85)}
header.hdr-light:not(.scrolled) .burger i{background:var(--bg)}
header.hdr-light:not(.scrolled) .lang-btn{border-color:rgba(247,245,242,.18);color:rgba(247,245,242,.5)}

/* HERO */
.sol-hero{position:relative;min-height:100vh;display:flex;flex-direction:column;background:#06050a;overflow:hidden}
#sol-canvas{position:absolute;inset:0;width:100%;height:100%;z-index:0;pointer-events:none}
.sol-hero-body{position:relative;z-index:2;flex:1;display:flex;flex-direction:column;justify-content:center;padding:12rem 0 6rem}
.sol-hero-label{font-size:.6rem;letter-spacing:.48em;text-transform:uppercase;color:rgba(139,106,34,.7);display:flex;align-items:center;gap:.9rem;margin-bottom:2.2rem}
.sol-hero-label::before{content:'';width:36px;height:1px;background:rgba(139,106,34,.7)}
.sol-hero-title{font-family:var(--fm);font-weight:300;font-size:clamp(3.2rem,7vw,9rem);line-height:.9;letter-spacing:-.04em;color:#f5f3f0;margin-bottom:2.5rem}
.sol-hero-title em{display:block;font-style:italic;color:var(--gold2);font-family:var(--fd);font-weight:200;font-size:.72em}
.sol-hero-sub{font-size:.95rem;font-weight:300;color:rgba(247,245,242,.38);max-width:540px;line-height:1.9;margin-bottom:3.5rem}
.sol-hero-badges{display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:4rem}
.badge{display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1rem;border:1px solid rgba(247,245,242,.09);font-family:var(--fm);font-size:.58rem;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:rgba(247,245,242,.32)}
.badge i{color:var(--gold2);font-size:.6rem}
.sol-hero-foot{position:relative;z-index:2;display:flex;align-items:center;justify-content:space-between;padding:2rem 0;border-top:1px solid rgba(255,255,255,.05)}
.sol-hero-scroll{font-family:var(--fm);font-size:.56rem;letter-spacing:.3em;text-transform:uppercase;color:rgba(247,245,242,.2);display:flex;align-items:center;gap:.8rem}
.sol-hero-scroll::before{content:'';width:1px;height:40px;background:linear-gradient(to bottom,rgba(247,245,242,.12),transparent);flex-shrink:0}
.sol-cta-pill{display:inline-flex;align-items:center;gap:.6rem;padding:.85rem 2.2rem;background:var(--gold);color:var(--txt);font-family:var(--fb);font-size:.68rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;border-radius:50px;transition:all .3s;position:relative;overflow:hidden}
.sol-cta-pill::before{content:'';position:absolute;inset:0;background:var(--gold2);transform:translateX(-101%);transition:transform .3s;z-index:0}
.sol-cta-pill:hover::before{transform:translateX(0)}
.sol-cta-pill > *{position:relative;z-index:1}

/* PRODUCTS SECTION */
.products{padding:8rem 0;background:var(--bg3);border-top:1px solid var(--border)}
.products-header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:4rem;gap:2rem;flex-wrap:wrap}
.products-lead{font-size:.88rem;color:var(--txt2);max-width:400px;line-height:1.85;font-weight:300}

/* PRODUCT CARD — distinct from ai-card */
.prod-grid{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid var(--border);border-radius:22px;overflow:hidden}
.prod-card{padding:3rem 2.6rem;border-right:1px solid var(--border);border-bottom:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s;cursor:default;background:var(--bg3)}
.prod-card:nth-child(3n){border-right:none}
.prod-card:nth-child(n+4){border-bottom:none}
.prod-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--gold),var(--gold2),transparent);transform:scaleX(0);transform-origin:left;transition:transform .45s ease}
.prod-card:hover{background:var(--bg2)}
.prod-card:hover::after{transform:scaleX(1)}
.prod-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem}
.prod-badge{font-family:var(--fm);font-size:.52rem;font-weight:700;letter-spacing:.24em;text-transform:uppercase;padding:.3rem .8rem;border:1px solid rgba(139,106,34,.3);color:var(--gold);background:rgba(139,106,34,.04)}
.prod-icon-wrap{width:56px;height:56px;border:1px solid rgba(139,106,34,.28);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--gold);background:var(--bg3);transition:all .35s}
.prod-card:hover .prod-icon-wrap{background:var(--gold);color:var(--bg);border-color:var(--gold)}
.prod-name{font-family:var(--fd);font-weight:300;font-size:1.5rem;color:var(--txt);margin-bottom:.75rem;letter-spacing:-.02em;line-height:1.1}
.prod-name strong{font-family:var(--fm);font-weight:700;font-size:.7em;color:var(--gold);letter-spacing:.1em;display:block;margin-bottom:.3rem;text-transform:uppercase}
.prod-desc{font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.9;font-family:var(--fm);margin-bottom:2rem}
.prod-tags{display:flex;gap:.4rem;flex-wrap:wrap}
.prod-tag{font-size:.54rem;letter-spacing:.16em;text-transform:uppercase;padding:.22rem .65rem;border:1px solid var(--border);color:var(--txt2);font-family:var(--fm);font-weight:500}
@media(max-width:991px){.prod-grid{grid-template-columns:repeat(2,1fr)}.prod-card:nth-child(3n){border-right:1px solid var(--border)}.prod-card:nth-child(2n){border-right:none}}
@media(max-width:575px){.prod-grid{grid-template-columns:1fr}.prod-card{border-right:none!important}.prod-card:last-child{border-bottom:none}}

/* GOUVERNANCE */
.gouv{padding:8rem 0;background:var(--bg)}
.gouv-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border:1px solid var(--border);border-radius:22px;overflow:hidden;margin-top:4rem}
.gouv-card{padding:3.5rem 3rem;border-right:1px solid var(--border);position:relative;overflow:hidden;transition:background .35s}
.gouv-card:last-child{border-right:none}
.gouv-card:hover{background:var(--bg2)}
.gouv-num{font-family:var(--fd);font-weight:200;font-size:8rem;line-height:1;color:rgba(0,0,0,.04);position:absolute;top:-1.5rem;right:1.5rem;letter-spacing:-.06em;user-select:none;pointer-events:none}
.gouv-icon{width:52px;height:52px;border:1px solid rgba(139,106,34,.2);display:flex;align-items:center;justify-content:center;color:var(--gold);margin-bottom:2rem;font-size:1.1rem;transition:all .35s}
.gouv-card:hover .gouv-icon{background:var(--gold);color:var(--bg);border-color:var(--gold)}
.gouv-title{font-family:var(--fm);font-weight:500;font-size:1rem;color:var(--txt);margin-bottom:.9rem;letter-spacing:-.01em}
.gouv-desc{font-family:var(--fm);font-size:.78rem;font-weight:300;color:var(--txt2);line-height:1.85}
@media(max-width:767px){.gouv-grid{grid-template-columns:1fr}.gouv-card{border-right:none!important;border-bottom:1px solid var(--border)}.gouv-card:last-child{border-bottom:none}}

/* WEB MOBILE HERO */
.wm-hero{position:relative;padding:10rem 0 9rem;background:var(--bg);overflow:hidden;height: 100vh;}
.wm-hero-grid{position:absolute;inset:0;z-index:0;overflow:hidden}
.wm-hero-grid svg{width:100%;height:100%;opacity:.045}
.wm-hero .container{position:relative;z-index:2}
.wm-hero-inner{display:grid;grid-template-columns:1fr 400px;gap:4rem}
.wm-hero-label{font-size:.6rem;letter-spacing:.46em;text-transform:uppercase;color:var(--gold);display:flex;align-items:center;gap:.9rem;margin-bottom:2rem}
.wm-hero-label::before{content:'';width:36px;height:1px;background:var(--gold)}
.wm-hero-title{font-family:var(--fm);font-weight:300;font-size:84px;line-height:1.1;letter-spacing:-.04em;color:var(--txt);margin-bottom:2.5rem}
.wm-hero-title em{font-style:normal;color:var(--gold);font-weight:200}
.wm-hero-sub{font-size:.92rem;font-weight:300;color:var(--txt2);max-width:480px;line-height:1.9;margin-bottom:3rem}
.wm-hero-ctas{display:flex;gap:1rem;flex-wrap:wrap}
.wm-hero-side{position:relative}
.wm-screen{background:var(--txt);border-radius:18px;overflow:hidden;aspect-ratio:9/16;max-width:200px;margin:0 auto;position:relative;box-shadow:0 40px 120px rgba(0,0,0,.18)}
.wm-screen::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(139,106,34,.12) 0%,transparent 60%)}
.wm-screen-gfx{position:absolute;inset:0;display:flex;flex-direction:column;gap:8px;padding:24px 16px}
.wm-bar{height:4px;border-radius:2px;background:rgba(247,245,242,.08)}
.wm-bar.hi{background:rgba(139,106,34,.4);width:60%}
.wm-bar.mid{width:80%}
.wm-bar.sm{width:45%}
.wm-screen-dot{width:32px;height:32px;border-radius:50%;background:rgba(139,106,34,.3);margin:8px 0}
.wm-tablet{position:absolute;right:-40px;top:60px;background:#1a1815;border-radius:12px;width:260px;aspect-ratio:4/3;box-shadow:0 24px 80px rgba(0,0,0,.22);overflow:hidden}
.wm-tablet::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent,transparent 28px,rgba(139,106,34,.04) 28px,rgba(139,106,34,.04) 29px)}
@media(max-width:1024px){.wm-hero-inner{grid-template-columns:1fr}.wm-hero-side{display:none}}
</style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

      <!-- Event snippet for Contact (hello world) conversion page -->
	    <script>
	    gtag('event', 'conversion', {
	        'send_to': 'AW-988470532/wIfpCLro748DEIS6q9cD'
	    });
	    </script>

	    <!-- Event snippet for Envoi de formulaire pour prospects conversion page -->
	    <script>
	    gtag('event', 'conversion', {
	        'send_to': 'AW-988470532/gtHMCIHqpZADEIS6q9cD'
	    });
	    </script>


	    <!-- Google Tag Manager -->
	    <script>
	    (function(w, d, s, l, i) {
	        w[l] = w[l] || [];
	        w[l].push({
	            'gtm.start': new Date().getTime(),
	            event: 'gtm.js'
	        });
	        var f = d.getElementsByTagName(s)[0],
	            j = d.createElement(s),
	            dl = l != 'dataLayer' ? '&l=' + l : '';
	        j.async = true;
	        j.src =
	            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
	        f.parentNode.insertBefore(j, f);
	    })(window, document, 'script', 'dataLayer', 'GTM-KZNQF2R');
	    </script>
	    <!-- End Google Tag Manager -->
</head>
<body>

<div class="cur" id="cur"></div>
<div class="cur2" id="cur2"></div>

<nav class="mobile-nav" id="mobileNav">
  <a href="#services" onclick="closeMobileNav()">Solutions IA</a>
  <a href="#work" onclick="closeMobileNav()">Web &amp; Mobile</a>
  <a href="#services" onclick="closeMobileNav()">SaaS &amp; Produits</a>
  <a href="#services" onclick="closeMobileNav()">Marketplace</a>
  <a href="#services" onclick="closeMobileNav()">Formations IA</a>
  <a href="#services" onclick="closeMobileNav()">Brand Experience</a>
  <a href="#team" onclick="closeMobileNav()">Nos agences</a>
</nav>

<?php
$headerColor = '';
if(isset($_GET['option']) && $_GET['option'] == 'com_reference' && isset($_GET['task']) && $_GET['task'] == 'showDetails') $headerColor = 'hdr-light';
?>
<header id="hdr" class="<?php echo $headerColor; ?>">
  <a href="<?php echo $siteURL; ?>" class="logo-hw">
    <img src="<?php echo $siteURL; ?>images/config/<?php echo $config->getLogo(); ?>" alt="<?php echo $config->getNom(); ?>">
  </a>
  <nav class="hdr-nav">
    <?php
    // top menu
    $topMenu = new menu(3, $db);
    $topMenu->getMenu();
    ?>
    <!-- <div class="has-sub">
      <a href="#services">Solutions IA <i class="fa fa-chevron-down sub-arr"></i></a>
      <div class="sub-menu">
        <a href="#">Agents IA</a>
        <a href="#">Automatisation</a>
        <a href="#">Chatbots &amp; Assistants</a>
        <a href="#">Analyse de données</a>
        <a href="#">LLM sur mesure</a>
      </div>
    </div>
    <a href="#work">Web &amp; Mobile</a>
    <a href="#services">SaaS &amp; Produits</a>
    <a href="#services">Marketplace</a>
    <a href="#services">Formations IA</a>
    <a href="#services">Brand Experience</a>
    <a href="#agencies">Nos agences</a> -->
  </nav>
  <div class="lang-sel" id="langSel">
    <button class="lang-btn" id="langBtn" aria-label="Select language">
      <i class="fa fa-globe lang-ico"></i>
      <span id="langCur">EN</span>
      <i class="fa fa-chevron-down lang-arr"></i>
    </button>
    <div class="lang-drop" id="langDrop">
      <a href="#" class="lang-opt active"><span class="flag">🇬🇧</span> English</a>
      <a href="#" class="lang-opt"><span class="flag">🇫🇷</span> Français</a>
      <a href="#" class="lang-opt"><span class="flag">🇲🇦</span> العربية</a>
      <a href="#" class="lang-opt"><span class="flag">🇪🇸</span> Español</a>
    </div>
  </div>
  <button class="burger" id="burger" aria-label="Open menu"><i></i><i></i><i></i></button>
</header>

<?php echo $page_content; ?>

<footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <h3 class="big-title">Rencontrez-nous...</h3>
	                    <div class="apps text-center">
	                        <a href="#" class="item my-2"><img width="100" height="100"
	                                src="<?php echo $siteURL; ?>images/playstore.webp" alt="Play store"></a>
	                        <a href="https://apps.apple.com/ma/app/hello-world-agency/id1566017621?l=fr-FR" class="item my-2"><img width="100" height="100"
	                                src="<?php echo $siteURL; ?>images/appstore.webp" alt="App store"></a>
	                    </div>
	                </div>
	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                            <?php
                			$marrakechPage = new page(33, $db, $_SESSION['lang']);
                			?>
	                        <h4><a href="<?php echo $marrakechPage->getLink(); ?>">Marrakech</a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab" href="#home"
	                                    role="tab" aria-controls="home" aria-selected="true"><i class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab" href="#profile"
	                                    role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab" href="#contact"
	                                    role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="home" role="tabpanel"
	                                aria-labelledby="home-tab"><a
	                                    href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><a
	                                    href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
	                                <?php echo $config->getAdresse(); ?></div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                        	    <?php
                			$casaPage = new page(32, $db, $_SESSION['lang']);
                			?>
	                        <h4><a href="<?php echo $casaPage->getLink(); ?>">Casablanca</a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-casa" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab" href="#mail-casa"
	                                    role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-casa" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-casa" role="tabpanel"
	                                aria-labelledby="home-tab"><a
	                                    href="tel:<?php echo $config->getTel2(); ?>"><?php echo $config->getTel2(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="mail-casa" role="tabpanel" aria-labelledby="profile-tab"><a
	                                    href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-casa" role="tabpanel" aria-labelledby="contact-tab">
	                                70 allé phonex Ain sbaa Casablanca - Maroc</div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                          	    <?php
                			$londonPage = new page(34, $db, $_SESSION['lang']);
                			?>
	                         <h4><a href="<?php echo $londonPage->getLink(); ?>">Londres</a></h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-londre" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab"
	                                    href="#email-londre" role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-londre" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-londre" role="tabpanel"
	                                aria-labelledby="home-tab"><a href="tel:+44 5 24 42 31 56">+44 5 24 42 31 56</a></div>
	                            <div class="tab-pane fade" id="email-londre" role="tabpanel" aria-labelledby="profile-tab">
	                                <a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-londre" role="tabpanel"
	                                aria-labelledby="contact-tab">Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street,
	                                London<br>EC2A 4NE</div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-sm-6 col-md-3">
	                    <div class="item-agency">
	                        <h4>Dubai</h4>

	                        <ul class="nav nav-tabs" id="myTab" role="tablist">
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link active" id="home-tab" title="Mobile" data-toggle="tab"
	                                    href="#tel-dubai" role="tab" aria-controls="home" aria-selected="true"><i
	                                        class="ti-mobile"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="profile-tab" title="Email" data-toggle="tab"
	                                    href="#email-dubai" role="tab" aria-controls="profile" aria-selected="false"><i
	                                        class="ti-email"></i></a>
	                            </li>
	                            <li class="nav-item" role="presentation">
	                                <a class="nav-link" id="contact-tab" title="location" data-toggle="tab"
	                                    href="#adresse-dubai" role="tab" aria-controls="contact" aria-selected="false"><i
	                                        class="ti-location-pin"></i></a>
	                            </li>
	                        </ul>
	                        <div class="tab-content" id="myTabContent">
	                            <div class="tab-pane fade show active" id="tel-dubai" role="tabpanel"
	                                aria-labelledby="home-tab"><a href="tel:+971543399752">+971 54 339 9752</a></div>
	                            <div class="tab-pane fade" id="email-dubai" role="tabpanel" aria-labelledby="profile-tab">
	                                <a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a>
	                            </div>
	                            <div class="tab-pane fade" id="adresse-dubai" role="tabpanel"
	                                aria-labelledby="contact-tab">Dubai Silicon Oasis, DDP, Building A, Dubai, United Arab
	                                Emirates</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </footer>
	    <section class="bottom">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <ul class="footer-bottom-menu">
	                        <?php
							// bottom menu
							$bottomMenu = new menu(2, $db);
							$bottomMenu->getMegaMenu();
							?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </section>

<button class="back-top" id="backTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <i class="fa fa-arrow-up"></i>
</button>

<script>
var homePage = <?php echo isHome() ? 'true' : 'false'; ?>;
var siteURL = '<?php echo $siteURL; ?>';
var apiURL = '<?php echo $apiURL; ?>';
var platURL = '<?php echo $platURL; ?>';
var task = '<?php echo isset($_GET['task']) ? $_GET['task'] : '' ?>';
var SUCCES_ENVOI = '<?= $lang['DEMANDE_ENVOI_SUCCES'][$_SESSION['lang']]; ?>';
var CHAMPS_OBLIG = '<?= $lang['REMPLIR_CHAMP_OBLIG'][$_SESSION['lang']]; ?>';
var EMAIL_EXISTE = '<?= $lang['EMAIL_EXIST_DEJA'][$_SESSION['lang']]; ?>';
var ERREUR_EXEC = '<?= $lang['ERREUR_EXEC'][$_SESSION['lang']]; ?>';
<?php
$confirmPage = new page(19, $db, $_SESSION['lang']);
$congPage = new page(31, $db, $_SESSION['lang']);
$confirmPageDevis = new page(20, $db, $_SESSION['lang']);
$confirmPageDevis = new page(20, $db, $_SESSION['lang']);
?>
var REDIRECT_LINK = '<?php echo $confirmPage->getLink(); ?>';
var REDIRECT_LINK_QUOTE = '<?php echo $confirmPageDevis->getLink(); ?>';
var REDIRECT_LINK_CONG = '<?php echo $congPage->getLink(); ?>';
</script>

<script src='<?php echo $siteURL; ?>assets/js/jquery-3.3.1.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/bootstrap.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/owl.carousel.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/isotope.pkg.min.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/jquery.form.js'></script>
<script src='<?php echo $siteURL; ?>assets/js/main.js'></script>
<script>
/* CURSOR */
const cur  = document.getElementById('cur');
const cur2 = document.getElementById('cur2');
document.addEventListener('mousemove', e => {
  cur.style.left  = e.clientX + 'px';
  cur.style.top   = e.clientY + 'px';
  cur2.style.left = e.clientX + 'px';
  cur2.style.top  = e.clientY + 'px';
});
document.querySelectorAll('a,button,.svc-card,.port-item,.testi-card').forEach(el => {
  el.addEventListener('mouseenter', () => cur.style.transform = 'translate(-50%,-50%) scale(2.5)');
  el.addEventListener('mouseleave', () => cur.style.transform = 'translate(-50%,-50%) scale(1)');
});

/* HEADER + BACK-TOP */
const hdr     = document.getElementById('hdr');
const backTop = document.getElementById('backTop');
window.addEventListener('scroll', () => {
  const s = window.scrollY;
  hdr.classList.toggle('scrolled', s > 80);
  backTop.classList.toggle('show', s > 600);
}, { passive: true });

/* MOBILE NAV */
const mobileNav = document.getElementById('mobileNav');
const burger    = document.getElementById('burger');
let navOpen = false;
function closeMobileNav() { navOpen = false; mobileNav.classList.remove('open'); }
burger.addEventListener('click', () => {
  navOpen = !navOpen;
  mobileNav.classList.toggle('open', navOpen);
});

/* SCROLL REVEAL */
const io = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
}, { threshold: 0.1 });
document.querySelectorAll('.rv').forEach(el => io.observe(el));

/* FOOTER TOP BORDER LINE */
const footEl = document.querySelector('footer');
if (footEl) {
  const footIO = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('foot-in'); footIO.unobserve(e.target); } });
  }, { threshold: 0.05 });
  footIO.observe(footEl);
}

/* STAT COUNTERS */
const statDefs = [
  { id: 's1', target: 140, suf: '<span class="bub-suf">+</span>' },
  { id: 's2', target: 98,  suf: '<span class="bub-suf">%</span>' },
  { id: 's3', target: 24,  suf: '<span class="bub-suf">+</span>' },
  { id: 's4', target: 12,  suf: '' },
];
function animateCount(el, target, suf) {
  const dur = 1800, start = performance.now();
  (function step(now) {
    const p = Math.min((now - start) / dur, 1);
    const eased = 1 - Math.pow(1 - p, 4);
    el.innerHTML = Math.floor(eased * target) + suf;
    if (p < 1) requestAnimationFrame(step);
  })(start);
}
const statsIo = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      statsIo.unobserve(e.target);
      e.target.classList.add('on');
      statDefs.forEach(d => {
        const el = e.target.querySelector('#' + d.id);
        if (el) animateCount(el, d.target, d.suf);
      });
    }
  });
}, { threshold: 0.2 });
document.querySelectorAll('.bl').forEach(el => statsIo.observe(el));

/* HERO CANVAS — flowing wave terrain */
(function() {
  const canvas = document.getElementById('hero-canvas');
  const ctx = canvas.getContext('2d');
  let W, H, t = 0;
  const LINES = 40, SEGS = 240;
  function resize() { W = canvas.width = canvas.offsetWidth; H = canvas.height = canvas.offsetHeight; }
  function draw() {
    ctx.clearRect(0, 0, W, H);
    t += 0.0055;
    for (let l = 0; l < LINES; l++) {
      const p = l / (LINES - 1);
      const yBase = H * 0.1 + H * 0.8 * p;
      const amp   = H * 0.058 * (0.2 + p * 0.8);
      const bright = 1 - Math.abs(p - 0.42) * 1.9;
      const alpha  = Math.max(0.015, Math.min(bright * 0.115, 0.115));
      ctx.beginPath();
      for (let i = 0; i <= SEGS; i++) {
        const x = (i / SEGS) * W;
        const n = i / SEGS;
        const y = yBase
          + Math.sin(n * Math.PI * 3.6 + t * 1.75 + l * 0.34) * amp
          + Math.sin(n * Math.PI * 6.8 - t * 1.08 + l * 0.19) * amp * 0.4
          + Math.sin(n * Math.PI * 1.4 + t * 0.62 + l * 0.07) * amp * 0.2;
        i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
      }
      ctx.strokeStyle = `rgba(13,11,9,${alpha})`;
      ctx.lineWidth = 0.65;
      ctx.stroke();
    }
    requestAnimationFrame(draw);
  }
  resize(); draw();
  window.addEventListener('resize', resize);
})();

/* FANCY TITLE — char split + wave hover */
(function(){
  function splitChars(el) {
    el.classList.add('fancy-title');
    let ci = 0;
    function proc(node) {
      if (node.nodeType === 3) {
        const frag = document.createDocumentFragment();
        for (const c of node.textContent) {
          const s = document.createElement('span');
          if (c === ' ' || c === ' ') {
            s.className = 'ch sp';
            s.innerHTML = '&nbsp;';
          } else {
            s.className = 'ch';
            s.style.setProperty('--ci', ci++);
            s.textContent = c;
          }
          frag.appendChild(s);
        }
        node.parentNode.replaceChild(frag, node);
      } else if (node.nodeType === 1 && node.tagName !== 'BR') {
        Array.from(node.childNodes).forEach(proc);
      }
    }
    Array.from(el.childNodes).forEach(proc);
  }
  document.querySelectorAll('.hero-title, .sec-title, .port-title').forEach(splitChars);
})();

/* FAQ ACCORDION */
document.querySelectorAll('.faq-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.faq-item');
    const body = item.querySelector('.faq-body');
    const isOpen = btn.classList.contains('open');
    // ferme tous
    document.querySelectorAll('.faq-btn.open').forEach(b => {
      b.classList.remove('open');
      b.closest('.faq-item').querySelector('.faq-body').classList.remove('open');
    });
    if (!isOpen) { btn.classList.add('open'); body.classList.add('open'); }
  });
});

/* SUBMENU — hover avec délai pour éviter la fermeture prématurée */
(function() {
  document.querySelectorAll('.has-sub').forEach(el => {
    let timer;
    el.addEventListener('mouseenter', () => {
      clearTimeout(timer);
      el.classList.add('open');
    });
    el.addEventListener('mouseleave', () => {
      timer = setTimeout(() => el.classList.remove('open'), 180);
    });
  });
  document.addEventListener('click', e => {
    if (!e.target.closest('.has-sub')) {
      document.querySelectorAll('.has-sub.open').forEach(el => el.classList.remove('open'));
    }
  });
})();

/* 3D TILT */
(function(){
  function initTilt(selector, angle, shineClass){
    document.querySelectorAll(selector).forEach(function(el){
      var shine = document.createElement('div');
      shine.className = shineClass ? 'tilt-shine ' + shineClass : 'tilt-shine';
      el.appendChild(shine);
      el.addEventListener('mouseenter', function(){
        el.style.transition = 'transform .06s linear, background .35s';
      });
      el.addEventListener('mousemove', function(e){
        var r = el.getBoundingClientRect();
        var dx = (e.clientX - r.left - r.width * .5) / (r.width * .5);
        var dy = (e.clientY - r.top - r.height * .5) / (r.height * .5);
        el.style.transform = 'perspective(900px) rotateX(' + (-dy * angle) + 'deg) rotateY(' + (dx * angle) + 'deg) translateZ(8px)';
        shine.style.setProperty('--sx', ((dx + 1) / 2 * 100) + '%');
        shine.style.setProperty('--sy', ((dy + 1) / 2 * 100) + '%');
      });
      el.addEventListener('mouseleave', function(){
        el.style.transition = 'transform .65s cubic-bezier(.34,1.56,.64,1), background .35s';
        el.style.transform = '';
      });
    });
  }
  initTilt('.ai-card', 7);
  initTilt('.svc-card', 6);
  initTilt('.srv-card', 5);
  initTilt('.port-item', 4, 'port-shine');

  var hero = document.querySelector('.hero');
  var heroInner = document.querySelector('.hero-inner');
  if (hero && heroInner) {
    hero.addEventListener('mousemove', function(e){
      var r = hero.getBoundingClientRect();
      var dx = (e.clientX - r.left - r.width * .5) / r.width;
      var dy = (e.clientY - r.top - r.height * .5) / r.height;
      heroInner.style.transition = 'transform .1s linear';
      heroInner.style.transform = 'perspective(1400px) rotateX(' + (-dy * 2.5) + 'deg) rotateY(' + (dx * 2.5) + 'deg)';
    });
    hero.addEventListener('mouseleave', function(){
      heroInner.style.transition = 'transform .9s cubic-bezier(.34,1.56,.64,1)';
      heroInner.style.transform = '';
    });
  }
})();

/* TESTIMONIALS CAROUSEL */
(function() {
  var track = document.querySelector('.testi-track');
  if (!track) return;
  var items = track.querySelectorAll('.testi-item');
  var controls = document.querySelector('.testi-controls');
  var dotsWrap = document.querySelector('.testi-dots');
  var current = 0, perPage = 3, maxIdx = 0, autoTimer, dots = [];

  function getPerPage() {
    return window.innerWidth <= 575 ? 1 : window.innerWidth <= 991 ? 2 : 3;
  }

  function buildDots() {
    perPage = getPerPage();
    maxIdx = Math.max(0, items.length - perPage);
    items.forEach(function(item) { item.style.flexBasis = (100 / perPage) + '%'; });
    dotsWrap.innerHTML = '';
    for (var i = 0; i <= maxIdx; i++) {
      var d = document.createElement('button');
      d.className = 'testi-dot' + (i === current ? ' active' : '');
      (function(idx) { d.addEventListener('click', function() { clearTimeout(autoTimer); goTo(idx); startAuto(); }); })(i);
      dotsWrap.appendChild(d);
    }
    dots = Array.from(dotsWrap.querySelectorAll('.testi-dot'));
    controls.style.display = maxIdx > 0 ? 'flex' : 'none';
  }

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, maxIdx));
    track.style.transform = 'translateX(-' + (current * 100 / perPage) + '%)';
    dots.forEach(function(d, i) { d.classList.toggle('active', i === current); });
  }

  function startAuto() {
    autoTimer = setTimeout(function() { goTo(current >= maxIdx ? 0 : current + 1); startAuto(); }, 5000);
  }

  document.querySelector('.testi-prev').addEventListener('click', function() { clearTimeout(autoTimer); goTo(current - 1); startAuto(); });
  document.querySelector('.testi-next').addEventListener('click', function() { clearTimeout(autoTimer); goTo(current + 1); startAuto(); });

  var startX = 0;
  track.addEventListener('touchstart', function(e) { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', function(e) {
    var dx = e.changedTouches[0].clientX - startX;
    if (Math.abs(dx) > 50) { clearTimeout(autoTimer); goTo(current + (dx < 0 ? 1 : -1)); startAuto(); }
  });

  var resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() { buildDots(); goTo(Math.min(current, maxIdx)); }, 150);
  });

  buildDots();
  startAuto();
})();

/* LANG SELECTOR */
(function() {
  const sel = document.getElementById('langSel');
  const btn = document.getElementById('langBtn');
  const cur = document.getElementById('langCur');
  if (!sel) return;
  btn.addEventListener('click', e => { e.stopPropagation(); sel.classList.toggle('open'); });
  document.addEventListener('click', () => sel.classList.remove('open'));
  sel.querySelectorAll('.lang-opt').forEach(opt => {
    opt.addEventListener('click', e => {
      e.preventDefault();
      sel.querySelectorAll('.lang-opt').forEach(o => o.classList.remove('active'));
      opt.classList.add('active');
      cur.textContent = opt.textContent.trim().split(' ')[1].slice(0,2).toUpperCase();
      sel.classList.remove('open');
    });
  });
})();

/* PARALLAX ENGINE */
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  const isMobile = () => window.innerWidth < 900;
  const items = Array.from(document.querySelectorAll('[data-px]')).map(el => ({
    el, f: parseFloat(el.dataset.px)
  }));
  if (!items.length) return;
  let ticking = false;
  function update() {
    if (isMobile()) { items.forEach(({ el }) => { el.style.translate = ''; }); ticking = false; return; }
    const vh = window.innerHeight;
    items.forEach(({ el, f }) => {
      const r = el.getBoundingClientRect();
      const cy = r.top + r.height / 2 - vh / 2;
      el.style.translate = '0 ' + (cy * f).toFixed(2) + 'px';
    });
    ticking = false;
  }
  window.addEventListener('scroll', () => { if (!ticking) { requestAnimationFrame(update); ticking = true; } }, { passive: true });
  window.addEventListener('resize', update);
  update();
})();
</script>
</body>
</html>
