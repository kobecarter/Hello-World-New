<?php $banner = $post->getPhoto() == "" ? "images/banner.jpg" : "images/blog/".$post->getPhoto(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $post->getTitre(); ?>">
	</div>
	<h1 class="banner-title"><?php echo $post->getTitre(); ?></h1>
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $post->getTitre(); ?></li>
		  </ol>
		</nav>
	</div>
</section>

  <!--========================================================
                          ABOUT
  =========================================================-->
  <section class="page-template">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php echo $post->getTexte(); ?>
			</div>
		</div>
    </div>
  </section>