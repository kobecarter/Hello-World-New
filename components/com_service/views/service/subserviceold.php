<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/" . $service->getPhotoBanniere(); ?>
//  <?php 
//   $serviceBanner = "images/services/Web_Design_Development_agency.webp" ;
// ?>
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

<!-- Page Title -->
<div class="banner service-banner">
    <div class="container">
        <div class="service-banner-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-box-service">
                        <h1 class="banner-title-seervice service-span-<?php echo $service->getId(); ?>"><?php echo $service->getH1(); ?></h1>
                        <div class="subtitle-service"><?php echo $service->getSousTitre(); ?></div>
                    </div>
                </div>
                <div class="col-md-5 service-id-<?php echo $service->getId(); ?>">
                    <div class="service-banner-img">
                     <img src="<?php echo $siteURL . $serviceBanner; ?>" alt="<?php echo $service->getTitre(); ?>" class="avatar">
                    </div>
                </div>
            </div>
        </div>
      

    </div>
</div>

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="ul-tags">
                        <?php foreach ($services as $key => $value) : ?>
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
        
        <?php if (!empty($packs)) : ?>
        <section class="pack-section">
        <?php
        switch($service->getId()){
            case 38 : $parag = '<p>Des sites web haute performance et "mobile-first", conçus sur-mesure pour répondre aux besoins de votre entreprise. Tous les tarifs sont indiqués à titre indicatif (à partir de) et peuvent varier en fonction de vos demandes spécifiques.</p>'; break;
            case 40 : $parag = '<p>Gravissez les échelons des résultats Google et captez un trafic organique qualifié. Tous nos tarifs sont des prix de départ, basés sur des forfaits mensuels.</p>'; break;
            case 46 : $parag = '<p>Développez votre communauté et boostez la notoriété de votre marque là où se trouvent vos clients. Les tarifs indiqués sont des prix de base. Tous nos packs nécessitent un budget publicitaire minimum.</p>
            <p><i class="fas fa-exclamation-triangle"></i> <strong>Note</strong> : Si les packs de gestion des réseaux sociaux nécessitent des services de design additionnels (branding, graphismes complexes, etc.), des frais supplémentaires pourront être appliqués.</p>'; break;
            default : $parag = '';
        }
        ?>
        <?php
        switch($service->getId()){
            case 38 : $note = "<b>Les Packs 1 & 2</b> bénéficient d'une tarification préférentielle spécifiquement conçue pour soutenir l'écosystème entrepreneurial marocain. Ils sont donc strictement réservés aux entreprises au cours de leurs 24 premiers mois d'activité. Tous les prix indiqués sont des tarifs de base. Le prix final peut varier en fonction des demandes spécifiques, des intégrations personnalisées, des besoins de conception supplémentaires (graphisme, identité visuelle, etc.) ou de l'élargissement de la portée du projet."; break;
            case 40 : $note = "Pour<b> « Le Pilote SEO »</b> bénéficie d'une tarification préférentielle spécifiquement conçue pour soutenir l'écosystème entrepreneurial marocain et est donc strictement réservé aux entreprises au cours de leurs 24 premiers mois d'activité. Tous les prix indiqués sont des tarifs de base. Le prix final peut varier en fonction des demandes spécifiques, des intégrations personnalisées, des besoins de conception supplémentaires (graphisme, identité visuelle, etc.) ou de l'élargissement de la portée du projet."; break; 
            default : $note = "<b>Les Packs 1</b> bénéficie d'une tarification préférentielle spécifiquement conçue pour soutenir l'écosystème entrepreneurial marocain. Ils sont donc strictement réservés aux entreprises au cours de leurs 24 premiers mois d'activité. Tous les prix indiqués sont des tarifs de base. Le prix final peut varier en fonction des demandes spécifiques, des intégrations personnalisées, des besoins de conception supplémentaires (graphisme, identité visuelle, etc.) ou de l'élargissement de la portée du projet.";
        }
        ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="big-title">Découvrir nos packs</h2>
                    <?php echo $parag; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pack-box">
                <?php foreach ($packs as $pack) : ?>
                <div class="item-pack <?php if($pack->isPopulaire()) echo 'active'; ?>">
                    <?php if($pack->isPopulaire()) echo '<span class="popular"><i class="fa fa-trophy"></i> Le plus populaire</span>'; ?>
                    <div class="imgbox"><img src="<?php echo $siteURL; ?>images/packs/<?php echo $pack->getPhoto(); ?>" alt="<?php echo $pack->getTitre(); ?>"></div>
                    <h4><?php echo $pack->getTitre(); ?></h4>
    
                    <div class="textbox">
                        <?php echo $pack->getDetails(); ?>
                    </div>
                    
                    <?php if ($pack->getPrix() != '') : ?>
                    <div class="price">
                        <span>A partir de </span><br>
                        <?php echo number_format($pack->getPrix(), 2, ',', ' '); ?> <sup>Dhs</sup>
                        <?php if($service->getId() == 40 || $service->getId() == 46) echo ' / Mois'; ?>
                    </div>
                    <?php endif; ?>
                    
                    <a href="#0" class="btn-pack open-form-service"><span>Demander mon Devis Gratuit</span></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="container">
            <?php if($service->getId())
            ?>
            <div class="note"><strong>Note</strong> : <?php echo $note; ?> <div>
            <div class="col-sm-12 mt-4 text-center">
                <a href="<?php echo $pageContact->getLink(); ?>" class="btn-custom-cta">Demander un audit gratuit</a>
            </div>
        </div>
        </section>
        <?php endif; ?>
        
        <section class="service-testimonials">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="big-title">Ils nous font confiance pour leur croissance</h2>
                        <p class="container text-center">Plus que des prestataires, nous sommes les partenaires de votre croissance. Découvrez comment nous avons aidé des entreprises à Casablanca et dans tout le Maroc à transformer leur présence digitale en un véritable levier de succès.</p>
                        <div id="owl-testimonials" class="owl-carousel owl-theme mt-5">
                            <?php
                            foreach ($testimonials as $temoignage) {
                            ?>
                                 <div class="item-testimonial">
                                    <div class="autor-box">
                                        <div class="imgbox">
                                            <?php
                                            $photo = $temoignage->getPhoto();
                                            $image = !empty($photo) ? $photo : 'avatar.jpg';
                                            ?>
                                            <img width="150" height="150" src="<?php echo $siteURL; ?>images/temoignages/<?php echo $image; ?>" alt="Avis <?php echo $temoignage->getNom(); ?>" />
                                        </div>
                                        <span class="autor"><?php echo $temoignage->getNom(); ?></span>
                                        <span class="profession"><?php echo $temoignage->getFonction(); ?></span>
                                        <span class="google-icon"><!-- <img src="<?php echo $siteURL; ?>images/google.png" alt="Avis <?php echo $temoignage->getNom(); ?>" /> --><i class="fab fa-google"></i></span>
        
                                        <div class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="textbox">
                                        <p>
                                            <?php echo mb_substr(nl2br(strip_tags($temoignage->getTemoignage())), 0, 240, "UTF-8"); ?>
                                            <?php if (mb_strlen($temoignage->getTemoignage()) > 240): ?>
                                            ... <br><a href="#0" data-id="<?= $temoignage->getId(); ?>" class="more"><?= $lang['LIRE_SUITE'][$_SESSION['lang']] ?></a>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="text-center"><a href="<?php echo $pageContact->getLink(); ?>" class="btn-custom-cta">Rejoignez plus de 1000 clients satisfaits</a></div>
                    </div>
                </div>
        
            </div>
        </section>
        
        <section class="tool-section">
            <div class="container">
                <h3 class="big-title">Les technologies et plateformes au service de vos projets</h3>
                <p>Nous utilisons les meilleurs outils du marché pour garantir la performance, la sécurité et la croissance de votre business.</p>
            </div>
            <div class="container-fluid">    
                <div class="tool-logo-wrapper">
                    <div class="tool-box logo-animate">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tool-box logo-animate">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tool-box logo-animate">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tool-logo-wrapper">
                    <div class="tool-box logo-animate-alt">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tool-box logo-animate-alt">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="tool-box logo-animate-alt">
                        <?php foreach($tools as $tool): ?>
                        <div class="item-tool"><img src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <?php if(isset($childServices)): ?>
        <div class="service-by-cities">
            <div class="container">
            <h3 class="big-title">Proches de vous, où que vous soyez au Maroc</h3>
            <div id="owl-services-cities" class="owl-carousel owl-theme">
            <?php foreach($childServices as $subService): ?>
            <div class="item-service-city">
                <h3><a href="<?php echo $subService->getLink(); ?>"><?php echo $subService->getTitre(); ?></a></h3>
                <a href="<?php echo $subService->getLink(); ?>">En savoir plus <i class="ti-arrow-right"></i></a>
            </div>
            <?php endforeach; ?>
            </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row w-100 p-0 m-0">
            <?php if ($service->getId() == 36) : ?>
            <div class="col-12 p-0">
                <section tion class="discover-video">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="big-title">DÉCOUVREZ NOTRE BIBLIOTHÈQUE VIDÉO</h2>
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
                            <div class="col-sm-12 mt-5">
                                <a href="<?php echo $pageVideo->getLink(); ?>" class="btn-custom"><span>Discover more
                                        videos</span></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Start Portfolio -->
            <div class="mt-5">
                <div class="cs-portfolio_1_heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="big-title">Plongez dans Nos Shootings Photo</h2>
                            </div>
                        </div>
                    </div>
                    <div class="cs-isotop_filter cs-style1">
                        <ul class="cs-mp0 cs-center">
                            <li class="active"><a href="#" data-filter="*">All</a></li>
                            <?php $galleries_nav = [19, 20, 21, 22, 23, 24, 25, 26, 27]; ?>
                            <?php foreach ($galleries_nav as $value) : ?>
                            <?php $gallery_nav = galerie::find($value, $_SESSION["lang"]); ?>
                            <li><a h ref="#" data-title="<?= $gallery_nav->getTitre() ?>"
                                    data-filter=".<?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($gallery_nav->getTitre())) ?>"><?= $gallery_nav->getTitre() ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
                    <div class="cs-grid_sizer"></div>
                    <?php $galleries = [19, 20, 21, 22, 23, 24, 25, 26, 27]; ?>
                    <?php foreach ($galleries as $value) : ?>
                    <?php $gallery_photos = galerie_photo::findAllByGalerie($_SESSION["lang"], $value) ?>
                    <?php foreach ($gallery_photos as $photo) : ?>
                    <div
                        class="cs-isotop_item col-12 col-md-4 <?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($photo->getGalerie()->getTitre())) ?>">
                        <div class="div-gallery-photo">
                            <img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                alt="<?= $service->getTitre() ?>" class="lazy">
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
            <!-- End Portfolio -->
            <?php endif; ?>
            <?php if ($service->getId() == 44) : ?>
            <div class="col-12 p-0">
                <section tion class="discover-video">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="big-title">EXPLORE OUR VIDEO LIBRARY</h2>
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
                            <div class="col-sm-12 mt-5">
                                <a href="<?php echo $pageVideo->getLink(); ?>" class="btn-custom"><span>Discover more
                                        videos</span></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Start Portfolio -->
            <div class=" mt-5">
                <div class="cs-portfolio_1_heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="big-title">Dive into Our Photo Shoots</h2>
                            </div>
                        </div>
                    </div>
                    <div class="cs-isotop_filter cs-style1">
                        <ul class="cs-mp0 cs-center">
                            <li class="active"><a href="#" data-filter="*">All</a></li>
                            <?php $galleries = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]; ?>
                            <?php foreach ($galleries as $value) :
                                    $gallery = galerie::find($value, $_SESSION["lang"]) ?>
                            <li><a h ref="#" data-title="<?= $gallery->getTitre() ?>"
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
                            <img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                alt="<?= $service->getTitre() ?>" class="lazy">
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
            <!-- End Portfolio -->
            <?php endif; ?>
            <?php //if (in_array($service->getId(), [38, 39, 42, 43, 46, 47])) : ?>
            <div class="col-12 p-0">
                <div class="portfolio">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="big-title">Nos dernières réalisations</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 px-0">
                                <?php $reference = $references[0]; ?>
                                <div class="item-portfolio big-item">
                                    <div class="imgbox">
                                        <img width="500" height="700"
                                            src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>"
                                            alt="<?php echo $reference->getNomClient(); ?>">
                                    </div>
                                    <div class="title-box">
                                        <span class="nom-client"><?php echo $reference->getNomClient(); ?></span>
                                         <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                        <a h ref="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                            title="Discover website"
                                            target="_blank"><?php echo $reference->getSiteWeb(); ?></a>
                                            	<?php endif; ?>
                                    </div>
                                    <div class="text-box">
                                        <span class="nom-client"><?php echo $reference->getNomClient(); ?></span>
                                        <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                        <a h ref="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                            title="Discover website" target="_blank"
                                            class="website"><?php echo $reference->getSiteWeb(); ?></a>
                                            	<?php endif; ?>
                                        <p><?php echo $reference->getExtrait(); ?></p>
                                        <ul class="links">
                                            <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                            <li>
                                                <a h ref="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                                    title="Discover website" target="_blank">Le site</a></li>
                                        <?php endif; ?>
                                            <li><a href="<?php echo $reference->getLink(); ?>">Plus de détail</a></li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <?php $cpt = 0; ?>
                                    <?php foreach ($references as $reference): ?>
                                    <?php
                                            $cpt++;
                                            if ($cpt == 1) continue;
                                            ?>
                                    <div class="col-sm-6 px-0">
                                        <div class="item-portfolio">
                                            <div class="imgbox">
                                                <img width="300" height="300"
                                                    src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>"
                                                    alt="<?php echo $reference->getNomClient(); ?>">
                                            </div>
                                            <div class="title-box">
                                                <span class="nom-client"><?php echo $reference->getNomClient(); ?></span>
                                                 <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                                <a href="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                                    title="Discover website"
                                                    target="_blank"><?php echo $reference->getSiteWeb(); ?></a>
                                                     <?php endif; ?> 
                                            </div>
                                            <div class="text-box">
                                                 <span class="nom-client"><?php echo $reference->getNomClient(); ?></span>
                                                      <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                                <a href="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                                    title="Discover website" target="_blank"
                                                    class="website"><?php echo $reference->getSiteWeb(); ?></a>
                                                      <?php endif; ?>
                                                <p><?php echo $reference->getExtrait(); ?></p>
                                                <ul class="links">
                                                         <?php if (!empty(trim($reference->getSiteWeb()))): ?>
                                                    <li><a href="<?= $reference->getSiteWeb() ? 'https://' . $reference->getSiteWeb() : $siteURL ?>"
                                                            title="Discover website" target="_blank">Le site</a></li>  
                                                            <?php endif; ?>
                                                    <li><a href="<?php echo $reference->getLink(); ?>">Plus de
                                                            détail</a></li>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-5 text-center">
                                <a href="<?php echo $pageReference->getLink(); ?>" class="btn-custom-cta">Voir plus de réalisations</a>
                                <a href="<?php echo $pageContact->getLink(); ?>" class="btn-custom-cta">Parlons de votre projet</a>
                                <!-- <a href="<?php echo $pageReference->getLink(); ?>" class="btn-custom"><span>Voir plus de réalisations</span></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php //endif; ?>

            <?php if ($service->getId() == 45) : ?>
            <div class="col-12 p-0">
                <!-- Start Portfolio -->
                <div class=" mt-5">
                    <div class="cs-portfolio_1_heading">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php $gallery_service = galerie::find(61, $_SESSION['lang']); ?>
                                    <h2 class="big-title mb-5"><?= $gallery_service->getTitre() ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
                        <div class="cs-grid_sizer"></div>
                        <?php
                            $photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_service->getId());
                            foreach ($photos as $photo) : ?>
                        <div class="cs-isotop_item col-12 col-md-4">
                            <div class="div-gallery-photo">
                                <div class="hover-box">
                                    <?php if ($photo->getDesc1()) : ?>
                                    <h4>
                                        <?= $photo->getDesc1() ?> Abonnés
                                    </h4>
                                    <?php endif; ?>

                                    <?php if ($photo->getDesc2()) : ?>
                                    <p><?= $photo->getDesc2() ?></p>
                                    <?php endif; ?>
                                </div>
                                <img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>"
                                    alt="<?= $photo->getTitre() ?>" class="lazy">
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
            <?php endif; ?>

            <div class="col-sm-12">
                <div class="container">
                    <h2 class="big-title">Ils nous ont fait confiance</h2>
                    
                    <div id="owl-reference" class="owl-carousel owl-theme mb-5">
                        <?php
                        foreach ($partners as $partner) {
                        ?>
                        <div class="item">
                            <img src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" width="150" height="150"
                                alt="<?php echo $partner->getTitre(); ?>" />
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    switch ($service->getSlug()) {
                        case 'notorite':
                            $btnText = "BOOSTEZ VOTRE NOTORIETE MAINTENANT";
                            break;
                        case  'branding':
                            $btnText = "AMÉLIOREZ VOTRE IMAGE DE MARQUE MAINTENANT";
                            break;
                        case   'relation':
                            $btnText = "CONSTITUEZ VOTRE COMMUNAUTE MAINTENANT";
                            break;
                        case   'StoryTelling':
                            $btnText = "RACONTEZ L’HISTOIRE DE VOTRE MARQUE MAINTENANT";
                            break;
                        case    'offshoring':
                            $btnText = "EXTERNALISEZ VOS SERVICES MAINTENANT";
                            break;
                        case 'marketingStrategique':
                            $btnText = "ÉTUDIEZ VOTRE MARCHE MAINTENANT";
                            break;
                        case  'marketingOperationnel':
                            $btnText = "PLANIFIEZ VOS ACTIONS MARKETING MAINTENANT";
                            break;
                        case   'dev':
                            $btnText = "CONTACTEZ-NOUS POUR UNE CONSULTATION GRATUITE";
                            break;
                        case 'outilsGestion':
                            $btnText = "ADOPTEZ UN OUTIL DE GESTION DE DONNEES CLIENTS MAINTENANT";
                            break;
                        case     'marketingAutomation':
                            $btnText = "ADOPTEZ UN OUTIL DE GESTION DE DONNEES CLIENTS MAINTENANT";
                            break;
                        case  'marketingInfluence':
                            $btnText = "TROUVEZ VOTRE INFLUENCEUR IDÉAL MAINTENANT";
                            break;
                        case   'commInfluence':
                            $btnText = "DEMANDEZ UNE CONSULTATION GRATUITE MAINTENANT";
                            break;
                        case    'pvente':
                            $btnText = "DRAINEZ DU MONDE DANS VOTRE MAGASIN MAINTENANT";
                            break;
                        case 'ecommerce':
                            $btnText = "BOOSTEZ MES VENTES EN LIGNE MAINTENANT";
                            break;
                        case     'socialCommerce':
                            $btnText = "VENDRE MES PRODUITS/SERVICES SUR LES RESEAUX MAINTENANT";
                            break;
                        default:
                            $btnText = "Contactez nous maintenant";
                    }
                    ?>
                    <a h ref="javascript:void(0)" class="btn-service open-form-service" data-slug="<?php echo $service->getSlug(); ?>"><?php echo $btnText; ?> <i
                            class="ti-arrow-right"></i></a>

                    <div class="service-form-box col-sm-8 offset-sm-2"></div>

                </div>

            </div>
        </div>

        

    </div>
</section>

<?php if(sizeof($faqs) > 0): ?>
<section class="page-detail-service page-faq">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="big-title">Faq</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php foreach($faqs as $key=>$faq) :?>
                    <button class="accordion-faq">
                        <h3><?=$faq->getTitre()?></h3>
                        <i class="fas fa-plus icon"></i>
                    </button>
                    <div class="panel">
                        <?=$faq->getTexte()?>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

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
				<button type="button" class="btn btn-custom purple" data-dismiss="modal"><span>Fermer</span></button>
				<button type="button" class="btn btn-custom send-form"><span>Envoyer</span></button>
			</div>
		</div>
	</div>
</div>

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
		$(document).ready(function (){   
			$('#picker2').dateTimePicker({
				dateFormat: "DD/MM/YYYY HH:mm",
				locale: 'fr'
			});
        });
   
</script>