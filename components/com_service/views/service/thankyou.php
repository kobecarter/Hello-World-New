<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/".$service->getPhotoBanniere(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $service->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title">Confirmation de demande</h1>
	<h2 class="title text-center"><?php echo $service->getTitre(); ?></h2>
	</div>	
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
			<li class="breadcrumb-item"><a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $service->getTitre(); ?></li>
		  </ol>
		</nav>
	</div>
</section>

  <!--========================================================
                          SERVICES
  =========================================================-->
  <section class="page-template page-service">
    <div class="container">
		<div class="vertical-line"></div>
		<div class="content-box">
			<h3 class="big-title msg-success">Votre demande a été envoyée avec succès, Merci d'avoir contacté Hello World</h3>
		</div>
    </div>
  </section>