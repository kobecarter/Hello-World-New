<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/".$service->getPhotoBanniere(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $service->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title"><?php echo $lang['SVC_THANKYOU_TITLE'][$_SESSION['lang']]; ?></h1>
	<h2 class="title text-center"><?php echo $service->getTitre(); ?></h2>
	</div>	
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['BREADCRUMB_HOME'][$_SESSION['lang']]; ?></a></li>
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
			<h3 class="big-title msg-success"><?php echo $lang['SVC_THANKYOU_MESSAGE'][$_SESSION['lang']]; ?></h3>
		</div>
    </div>
  </section>