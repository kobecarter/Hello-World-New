<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$page->getPhoto(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $page->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title"><?php echo $page->getTitre(); ?></h1>
	</div>	
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $page->getTitre(); ?></li>
		  </ol>
		</nav>
	</div>
</section>

  <!--========================================================
                          SERVICES
  =========================================================-->
  
  
 <section class="page-template new-services-listing">
            <div class="container">
                <div class="row">
              <?php foreach ($services as $service): ?>
              <?php
switch ($service->getId()) {
    case 42:
        $serviceImg = "images/services-img/graphic-design-service.webp";
        break;
    case 38:
        $serviceImg = "images/services-img/web-dev-services.webp";
        break;
    case 46:
        $serviceImg = "images/services-img/social-media-service.webp";
        break;
    case 44:
        $serviceImg = "images/services-img/photo-video-service.webp";
        break;
    case 43:
        $serviceImg = "images/services-img/branding-service-1.webp";
        break;
        case 47:
        $serviceImg = "images/services-img/copywriting-service.webp";
        break;
        case 45:
        $serviceImg = "images/services-img/marketig-influence-service.webp";
        break;
            case 39:
        $serviceImg = "images/services-img/mobile-app-dev-service.webp";
        break;
            case 40:
        $serviceImg = "images/services-img/seo-service-1.webp";
        break;
        case 41:
        $serviceImg = "images/services-img/leads-generation.webp";
        break;
    default:
        $serviceImg = "images/banner.jpg";
}
?>
                    <div class="col-md-6 mb-4 p-0">
                        <div class="row new-service-row"> 
                            <div class="col-sm-12 col-md-5 col-lg-5 p-0">
                                <div class="new-service-img">
                                   <a href="<?php echo $service->getLink(); ?>"><img  src="<?php echo $siteURL.$serviceImg; ?>" alt="<?php echo $service->getTitre(); ?>"/></a> 
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-7 p-0">
                                <div class="new-service-content">
                                <h3 class="new-service-title"><a href="<?php echo $service->getLink(); ?>"><?php echo $service->getTitre(); ?></a></h3>
                                <p class="new-service-paragraph">
                                <?php echo mb_substr(strip_tags($service->getExtrait()),0,330,"UTF-8"); ?>
                                </p>
                                <a class="new-service-readmore" href="<?php echo $service->getLink(); ?>">Découvrez-plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
	<?php endforeach; ?>
                </div>
            </div>
    </section>