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
  <section class="page-template page-service">
    <div class="container">
		<div class="row list-service">
			<div class="col-sm-12"><?php echo $page->getTexte(); ?></div>
			<?php foreach ($services as $service): ?>
			<div class="col-sm-6">
				<div class="item-service">
					<div class="ico"><img src="<?php echo $siteURL; ?>images/services/<?php echo $service->getPhoto(); ?>" alt="<?php echo $service->getTitre(); ?>" /></div>
					<h2><?php echo $service->getTitre(); ?></h2>
					<p><?php echo mb_substr(strip_tags($service->getTexteAccueil()),0,280,"UTF-8"); ?></p>
					<a href="<?php echo $service->getLink(); ?>" class="more">Découvrez-plus</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
  </section>