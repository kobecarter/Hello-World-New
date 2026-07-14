<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/" . $service->getPhotoBanniere(); ?>

<?php 
if($service->getId()==38){
  $serviceBanner = "images/services-img/Web_Design_Development_agency.webp" ;
}
elseif($service->getId()==42){
  $serviceBanner = "images/services-img/graphic-design-au-maroc.webp" ;
}
elseif($service->getId()==39){
  $serviceBanner = "images/services-img/mobile_app_service-au-maroc.webp" ;
}
elseif($service->getId()==41){
  $serviceBanner = "images/services-img/generation-de-leads.webp" ;
}
elseif($service->getId()==45){
  $serviceBanner = "images/services-img/marketing-influece-agency.webp";
}
elseif($service->getId()==47){
  $serviceBanner = "images/services-img/copywriting.webp" ;
}
elseif($service->getId()==44){
  $serviceBanner = "images/services-img/photo-video.webp" ;
}
elseif($service->getId()==46){
  $serviceBanner = "images/services-img/social_media.webp" ;
}
elseif($service->getId()==40){
  $serviceBanner = "images/services-img/seo_service_au_maroc.webp" ;
}
elseif($service->getId()==43){
  $serviceBanner = "images/services-img/copywriting.webp" ;
}
elseif($service->getId()==50){
  $serviceBanner = "images/services-img/Personal_Branding_maroc.webp" ;
}
elseif($service->getId()==51){
  $serviceBanner = "images/services-img/ia.svg" ;
}
else{
   $serviceBanner = "images/services/Web_Design_Development_agency.webp" ;
}
?> 
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
    <div class="wm-hero-inner service-id-<?php echo $service->getId() ?>">
      <div>
        <div class="wm-hero-label"><?php echo $service->getTitre() ?></div>
        <h1 class="sh-h1"><?php echo $service->getH1() ?> <span class="agency-tag">Marrakech - Casablanca - Rabat - Tanger</span></h1>
        <p class="wm-hero-sub rv d1"><?php echo strip_tags($service->getExtrait()); ?></p>
        <div class="wm-hero-ctas rv d2">
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DEMANDER_DEVIS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-calculator"></i></div>
            </a>

            <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_VOIR_OFFRES'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-eye"></i></div>
            </a>
        </div>
      </div>
      <div class="service-banner-img">
    <?php
    // 1. On récupère la photo du service actuel
    $photo = $service->getPhotoHero();
    if (empty($photo) && $service->getParent() && $service->getParent()->getId() != 0) {
        $photo = $service->getParent()->getPhotoHero();
    }
    ?>
    
    <img src="<?php echo $siteURL; ?>/images/services/<?php echo $photo; ?>" 
         alt="<?php echo htmlspecialchars($service->getTitre()); ?>">
</div>
    </div>
  </div>
</section>


<!--<div class="marquee">-->
<!--  <div class="marquee-track">-->
<!--    <span class="mq-item">SITES SUR MESURE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">APPS iOS &amp; ANDROID<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PORTAILS CLIENTS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">UX / UI DESIGN<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PERFORMANCE &amp; SEO<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">IA INTÉGRÉE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">ANALYTICS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">SITES SUR MESURE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">APPS iOS &amp; ANDROID<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PORTAILS CLIENTS<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">UX / UI DESIGN<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">PERFORMANCE &amp; SEO<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">IA INTÉGRÉE<span class="mq-dot"></span></span>-->
<!--    <span class="mq-item">ANALYTICS<span class="mq-dot"></span></span>-->
<!--  </div>-->
<!--</div>-->
<section class="breadcrumb-sec">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['BREADCRUMB_HOME'][$_SESSION['lang']]; ?></a></li>
				<li class="breadcrumb-item"><a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
				<?php if ($service->getParent()->getId() != 0) : ?>
					<li class="breadcrumb-item"><a href="<?php echo $service->getParent()->getLink(); ?>"><?php echo $service->getParent()->getTitre(); ?></a></li>
				<?php endif; ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $service->getTitre(); ?></li>
			</ol>
		</nav>
	</div>
</section>
<!--========================================================
                          SERVICES
  =========================================================-->
<section class="page-template page-detail-service">
    <div class="">
        <div class="container p-0">
            <div class="row">
                <div class="col-12">
                    <ul class="ul-tags">
                        <?php foreach ($services_tags as $key => $value) : ?>
                        <li><a href="<?= $value->getLink() ?>"
                                class="a-tag <?= $service->getId() == $value->getId() ? 'active' : null ?>"><?= $value->getTitre() ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="service-content">
            <?php echo $service->getTexte(); ?>
        </div>

        <div class="container text-center service-cta-box">
            <a href="javascript:void(0)" class="sb sb-compact open-form-service" data-slug="<?php echo $service->getSlug(); ?>" role="slider" tabindex="0" aria-label="<?php echo $lang['SVC_CTA_CONTACTEZ_NOUS_MAINTENANT'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_CONTACTEZ_NOUS_MAINTENANT'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
            </a>
            <div class="service-form-box col-sm-8 offset-sm-2"></div>
        </div>

        <?php if (!empty($packs)) : ?>
        <section class="pack-section">
        <?php
        switch($service->getId()){
            case 38 : $parag = $lang['SVC_PACK_PARAG_38'][$_SESSION['lang']]; break;
            case 40 : $parag = $lang['SVC_PACK_PARAG_40'][$_SESSION['lang']]; break;
            case 46 : $parag = $lang['SVC_PACK_PARAG_46'][$_SESSION['lang']]; break;
            default : $parag = '';
        }
        ?>
        <?php
        switch($service->getId()){
            case 38 : $note = $lang['SVC_PACK_NOTE_38'][$_SESSION['lang']]; break;
            case 40 : $note = $lang['SVC_PACK_NOTE_40'][$_SESSION['lang']]; break;
            default : $note = $lang['SVC_PACK_NOTE_DEFAULT'][$_SESSION['lang']];
        }
        ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="big-title"><?php echo $lang['SVC_SECTION_DECOUVRIR_PACKS'][$_SESSION['lang']]; ?></h2>
                    <?php echo $parag; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pack-box">
                <?php foreach ($packs as $pack) : ?>
                <div class="item-pack <?php if($pack->isPopulaire()) echo 'active'; ?>">
                    <?php if($pack->isPopulaire()) echo '<span class="popular"><i class="fa fa-trophy"></i> '.$lang['SVC_PACK_POPULAR'][$_SESSION['lang']].'</span>'; ?>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/<?php echo $pack->getPhoto(); ?>" alt="<?php echo $pack->getTitre(); ?>"></div>
                    <h4><?php echo $pack->getTitre(); ?></h4>
    
                    <div class="textbox">
                        <?php echo $pack->getDetails(); ?>
                    </div>
                    
                    <?php if ($pack->getPrix() != '') : ?>
                    <div class="price">
                        <span><?php echo $lang['SVC_PACK_A_PARTIR_DE'][$_SESSION['lang']]; ?></span><br>
                        <?php echo number_format($pack->getPrix(), 2, ',', ' '); ?> <sup>Dhs</sup>
                        <?php if($service->getId() == 40 || $service->getId() == 46) echo $lang['SVC_PACK_PAR_MOIS'][$_SESSION['lang']]; ?>
                    </div>
                    <?php endif; ?>

                    <a href="#0" class="btn-pack open-form-service"><span><?php echo $lang['SVC_CTA_DEMANDER_DEVIS_GRATUIT'][$_SESSION['lang']]; ?></span></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="container">
            <?php if($service->getId())
            ?>
            <div class="note"><strong><?php echo $lang['SVC_PACK_NOTE_LABEL'][$_SESSION['lang']]; ?></strong> : <?php echo $note; ?> <div>
            
        </div>
        </section>
        <?php endif; ?>
        

</div>
</section>
<!-- Realisation-->
<section class="portfolio" id="work">
          <div class="container">
            <div class="sec-label rv">Selected Work</div>
            <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_REALISATIONS'][$_SESSION['lang']]; ?></h2>
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
           <div class="container">
            <div class="col-sm-12 mt-5 text-center">
                <a href="<?php echo $pageReference->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_VOIR_PLUS_REALISATIONS'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-trophy"></i></div>
                </a>

                <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_PARLONS_PROJET'][$_SESSION['lang']]; ?></span></div>
                  <div class="sb-knob"><i class="fal fa-arrow-right"></i></div>
                </a>
            </div>
        </div>
        </section>
</section>
<!---->

<?php include('includes/testimonials.php'); ?>

<section class="trust" id="trust">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_TECH_TITLE'][$_SESSION['lang']]; ?></h2>
    <p><?php echo $lang['SVC_SECTION_TECH_SUBTITLE'][$_SESSION['lang']]; ?></p>
  </div>
  <div class="trust-rows">

    <!-- Rangée 1 → gauche -->
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Rangée 2 → droite (direction opposée) -->
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
<?php if(isset($childServices)): ?>
<section class="service-by-cities">
                <div class="container">
                <h3 class="sec-title rv d1 fancy-title on"><?php echo $lang['SVC_SECTION_PROCHES_DE_VOUS'][$_SESSION['lang']]; ?></h3>
                <div id="owl-services-cities" class="owl-carousel owl-theme">
                <?php foreach($childServices as $subService): ?>
                <div class="item-service-city">
                    <h3><a href="<?php echo $subService->getLink(); ?>"><?php echo $subService->getTitre(); ?></a></h3>
                    <a href="<?php echo $subService->getLink(); ?>"><?php echo $lang['SVC_CTA_EN_SAVOIR_PLUS'][$_SESSION['lang']]; ?> <i class="ti-arrow-right"></i></a>
                </div>
                <?php endforeach; ?>
                </div>
                </div>
    </section>
<?php endif; ?>


<!-- Galerie influenceur -->
<?php if ($service->getId() == 45) : ?>
<section class="influencer-galerie">
   
    <div class="row">
              <div class="col-12 p-0">
                <!-- Start Portfolio -->
                <div class=" mt-5">
                    <div class="cs-portfolio_1_heading">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php $gallery_service = galerie::find(61, $_SESSION['lang']); ?>
                                    <h2 class="sec-title rv d1 fancy-title on mb-5"><?= $gallery_service->getTitre() ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
                        
                        <?php
                            $photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_service->getId());
                            foreach ($photos as $photo) : ?>
                        <div class="cs-isotop_item col-12 col-md-4">
                            <div class="div-gallery-photo">
                                <div class="hover-box">
                                    <?php if ($photo->getDesc1()) : ?>
                                    <h4>
                                        <?= $photo->getDesc1() ?><?php echo $lang['SVC_SUFFIX_ABONNES'][$_SESSION['lang']]; ?>
                                    </h4>
                                    <?php endif; ?>

                                    <?php if ($photo->getDesc2()) : ?>
                                    <p><?= $photo->getDesc2() ?></p>
                                    <?php endif; ?>
                                </div>
                                <img src="<?= 'https://www.helloworld-agency.com/images/galerie/' . $photo->getPhoto(); ?>" alt="<?= $photo->getTitre(); ?>" class="">
                                <a h ref="javascript:void(0)"
                                    data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                    data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cs-height_90 cs-height_lg_40"></div>
                </div>
                <!-- End Portfolio -->
            </div>
         </div>
</section>
<?php endif; ?>
<!---->

<!--Galerie photo video service-->
 <?php if ($service->getId() == 44) : ?>
<section class="videotheque">
    <div class="discover-video">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                        <h2 class="sec-title rv d1 fancy-title on mb-5"><?php echo $lang['SVC_SECTION_VIDEOTHEQUE'][$_SESSION['lang']]; ?></h2>
                    </div>
                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 px-0">
                                        <?php $video = $videos_to_discover[0]; ?>
                                        <div class="item-discover-video big-item">
                                            <div class="imgbox">
                                                <a h ref="javascript:void(0)"
                                                    data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                                                    data-fancybox><i class="fab fa-youtube"></i></a>
                                                <img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                                                    alt="<?php echo $video->getTitre(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <?php $cpt = 0; ?>
                                            <?php foreach ($videos_to_discover as $video) :
                                                    $cpt++;
                                                    if ($cpt == 1) continue;
                                                ?>
                                            <div class="col-sm-6 px-0">
                                                <div class="item-discover-video">
                                                    <div class="imgbox">
                                                        <a h ref="javascript:void(0)"
                                                            data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>"
                                                            data-fancybox><i class="fab fa-youtube"></i></a>
                                                        <img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>"
                                                            alt="<?php echo $video->getTitre(); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-5 d-flex justify-content-center">                                        
                                        <a href="<?php echo $pageVideo->getLink() ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                          <div class="sb-label"><span class="sb-hint"><?php echo $lang['SVC_CTA_DISCOVER_MORE_VIDEOS'][$_SESSION['lang']]; ?></span></div>
                                          <div class="sb-knob"><i class="fal fa-play"></i></div> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    <!-- Start Portfolio -->
    <div class="mt-5 photo-shooting">
                    <div class="cs-portfolio_1_heading">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="sec-title rv d1 fancy-title on mb-5"><?php echo $lang['SVC_SECTION_PHOTOTHEQUE'][$_SESSION['lang']]; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="cs-isotop_filter cs-style1">
                            <ul class="cs-mp0 cs-center">
                                <li class="active"><a href="#" data-filter="*"><?php echo $lang['SVC_FILTER_ALL'][$_SESSION['lang']]; ?></a></li>
                                <?php $galleries = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]; ?>
                                <?php foreach ($galleries as $value) :
                                        $gallery = galerie::find($value, $_SESSION["lang"]) ?>
                                <li><a href="#" data-title="<?= $gallery->getTitre() ?>"
                                        data-filter=".<?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($gallery->getTitre())) ?>"><?= $gallery->getTitre() ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
                        <div class="cs-grid_sizer"></div>
                        <?php $galleries = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]; ?>
                        <?php foreach ($galleries as $value) : ?>
                        <?php $gallery_photos = galerie_photo::findAllByGalerie($_SESSION["lang"], $value) ?>
                        <?php foreach ($gallery_photos as $photo) : ?>
                        <div
                            class="cs-isotop_item col-12 col-md-4 <?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($photo->getGalerie()->getTitre())) ?>">
                            <div class="div-gallery-photo">
                                <img src="<?= 'https://www.helloworld-agency.com/images/galerie/' . $photo->getPhoto() ?>"
                                    alt="<?= $service->getTitre() ?>" class="">
                                <a h ref="javascript:void(0)"
                                    data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                    data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="cs-height_90 cs-height_lg_40"></div>
                </div>
   
</section>
<?php endif; ?>
<!---->
<section class="trust" id="trust">
      <div class="trust-head container">
        <div class="sec-label rv"><?php echo $lang['SVC_SECTION_PARTENAIRES_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_PARTENAIRES_TITLE'][$_SESSION['lang']]; ?></h2>
      </div>
      <div class="trust-rows">
    
        <!-- Rangée 1 → gauche -->
        <div class="trust-row">
          <div class="trust-inner go-l">
            <?php foreach ($partners as $partner): ?>
              <div class="trust-item">
                <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    
        <!-- Rangée 2 → droite (direction opposée) -->
        <div class="trust-row">
          <div class="trust-inner go-r">
            <?php foreach ($partners2 as $partner): ?>
              <div class="trust-item">
                <img class="img-partner" src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    
      </div>
    </section>

<section class="faq" id="faq">
  <div class="container">
    <div class="sec-label rv"><?php echo $lang['SVC_SECTION_FAQ_LABEL'][$_SESSION['lang']]; ?></div>
    <h2 class="sec-title rv d1"><?php echo $lang['SVC_SECTION_FAQ_TITLE'][$_SESSION['lang']]; ?></h2>
    <div class="faq-cols rv d2">
      <div>
        <div class="faq-list">
          <?php foreach($faqs as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <div class="faq-list">
          <?php foreach($faqs2 as $faq): ?>
          <div class="faq-item">
            <button class="faq-btn">
              <span class="faq-q"><?php echo $faq->getTitre(); ?></span>
              <span class="faq-ico"><i class="fa fa-plus"></i></span>
            </button>
            <div class="faq-body">
              <p class="faq-ans"><?php echo strip_tags($faq->getTexte()); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal / Demo -->
<div class="modal fade" id="serviceModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><?php echo $btnText; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom purple" data-dismiss="modal"><span><?php echo $lang['SVC_MODAL_FERMER'][$_SESSION['lang']]; ?></span></button>
				<button type="button" class="btn btn-custom send-form"><span><?php echo $lang['SVC_MODAL_ENVOYER'][$_SESSION['lang']]; ?></span></button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
    var acc = document.getElementsByClassName("accordion-faq");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            var icon = this.querySelector(".icon");

            // Toggle the panel visibility
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus"); // Change icon to "+"
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus"); // Change icon to "-"
            }
        });

    }
</script>
<script type="text/javascript">
//     $(document).ready(function() {

//         // Vérifier si le popup a déjà été affiché dans la session
//         if (!sessionStorage.getItem("popupShown")) {

//             setTimeout(function() {
//                 $("#realisation-popup").modal("show");

//                 // Marquer le popup comme affiché
//                 sessionStorage.setItem("popupShown", "true");
//             }, 3000);

//         }

//     });
</script>

<script>

// 		$(document).ready(function (){
// 			$('#picker2').dateTimePicker({
// 				dateFormat: "DD/MM/YYYY HH:mm",
// 				locale: 'fr'
// 			});
//         });


</script>

<script>
document.addEventListener('click', function(e){
	var btn = e.target.closest('.open-form-service');
	if(!btn) return;
	var order = 'slug=' + btn.getAttribute('data-slug');
	jQuery.post("<?php echo $siteURL; ?>components/com_service/controleurs/router.php?task=getForm", order, function (theResponse) {
		var box = document.querySelector(".service-form-box");
		jQuery(box).html(theResponse);
		if (window.gsap) {
			gsap.fromTo(box, {autoAlpha: 0, y: 30}, {autoAlpha: 1, y: 0, duration: .7, ease: 'power2.out'});
		} else {
			jQuery(box).slideDown();
		}
		jQuery("html, body").animate({scrollTop: jQuery(".service-form-box").offset().top - 100}, 1000);
	})
})
</script>