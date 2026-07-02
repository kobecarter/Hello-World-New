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
  <section class="page-template page-video">
    <div class="container">
		<div class="row list-video">
			<div class="col-sm-12"><?php echo $page->getTexte(); ?></div>
			<?php foreach ($videos as $video): ?>
			<div class="col-sm-4 mb-4">
				<div class="item-video">
					<div class="imgbox">
						<a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
						<img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>" alt="<?php echo $video->getTitre(); ?>">
					</div>
					<div class="textbox">
						<h3><span><?php echo $video->getTitre(); ?></span></h3>
						<ul>
							<li><strong><i class="fa fa-map-marker"></i> Localisation :</strong> <?php echo $video->getLocalisation(); ?></li>
							<?php if($video->getDateShooting() != ''): ?>
							<li><strong><i class="fa fa-calendar"></i> Date shooting :</strong> <?php echo normaldate($video->getDateShooting()); ?></li>
							<?php endif; ?>
							<li><strong><i class="fa fa-comment"></i> Commentaire :</strong> <?php echo nl2br($video->getExtrait()); ?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
  </section>