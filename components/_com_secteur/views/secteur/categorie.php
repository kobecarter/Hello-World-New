<?php $banner = $categorie->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$page->getPhoto(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $categorie->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title"><?php echo $categorie->getTitre(); ?></h1>
	</div>	
</div> 

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $categorie->getTitre(); ?></li>
		  </ol>
		</nav>
	</div>
</section>

  <!--========================================================
                          BLOG
  =========================================================-->
  <section class="page-template page-blog">
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-12 mb-4">
	            <ul class="ul-tags">
	              <?php foreach($categories as $key=> $value) :?>
	                    <li><a href="<?=$value->getCategorieLink()?>" class="a-tag <?=$value->getId() == $categorie->getId() ? 'active' : null ?>"><?=$value->getTitre()?></a></li>
	              <?php endforeach;?>
	            </ul>
	        </div>
			<?php foreach ($posts as $post): ?>
				<div class="col-sm-6 col-md-4 mb-5 go-to" data-url="<?= $post->getLink(); ?>">
					<div class="item-blog">
					<div class="img-box">
						<img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>" alt="<?= $post->getTitre(); ?>"/>
					</div>
					<div class="text-box">
						<h3><?= $post->getTitre(); ?></h3>
						<span class="date"><?= normaldate2($post->getDateAdd());?></span>
						<?= $post->getExtrait(); ?>
					</div>
					<a href="<?= $post->getLink(); ?>" class="btn-more stop-propagation">Lire la suite <i class="fa fa-angle-right"></i></a>
					<ul class="share">
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Facebook" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.facebook.com/sharer/sharer.php?u=" class="btn-share-social-media facebook"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Twitter" data-url="<?= $post->getLink(); ?>" data-share-to="https://twitter.com/intent/tweet?text=" class="btn-share-social-media twitter"><i class="fab fa-twitter"></i></a></li>
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Linkedin" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.linkedin.com/sharing/share-offsite/?url=" class="btn-share-social-media linkedin"><i class="fab fa-linkedin"></i></a></li>
					</ul>
					</div>
				</div>
			<?php endforeach; ?>
			<?php if(sizeof($posts) <= 0) :?>
			    <div class="col-12">
			         <p class="text-center">Il n'y a aucun résultat</p>
			    </div>
			<?php endif;?>
		</div>
    </div>
  </section>