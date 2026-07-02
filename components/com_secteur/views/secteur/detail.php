<?php $banner = $post->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/blog/".$post->getPhotoBanniere(); ?>

<!-- Page Title -->
<div class="banner blog-banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $post->getTitre(); ?>">
	</div>
	<div class="title-box">
	<h1 class="banner-title"><?php echo $post->getTitre(); ?></h1>
	</div>	
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
	        <div class="col-12 mb-4">
	            <ul class="ul-tags">
	              <?php foreach($categories as $key=> $value) :?>
	               <li><a href="<?=$value->getCategorieLink()?>" class="a-tag <?=$value->getId() == $post->getCategorie()->getId() ? 'active' : null ?>"><?=$value->getTitre()?></a></li>
	                    <!--<li><a href="<?=$value->getCategorieLink()?>" class="a-tag"><?=$value->getTitre()?></a></li>-->
	              <?php endforeach;?>
	            </ul>
	        </div>
			<div class="col-sm-12">
			    <div class="div-blog-detail">
			        <?php echo $post->getTexte(); ?>
			    </div>
			</div>
		</div>
    </div>
  </section>
  <section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
				<h2 class="big-title">Blogs Similaires</h2>
				<div id="owl-blog" class="owl-carousel owl-theme">
				<?php
				foreach ($similarblogs as $post) {
					//$tags = explode(";", $blog->getTags());
					$tags = array();
					?>
			
					<div class="new-blog-item">
                        <div class="new-blog-img">
                            <a href="<?= $post->getLink(); ?>"><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>" alt="<?= $post->getTitre(); ?>E"/></a>
                            
                        </div>
                        <div class="new-blog-content">
                            <div class="new-blog-date-icons">
                          
                                <div class="new-blog-icons">
                                  	<ul class="">
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Facebook" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.facebook.com/sharer/sharer.php?u=" class="btn-share-social-media facebook"><i class="fab fa-facebook-f"></i></a></li>
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Twitter" data-url="<?= $post->getLink(); ?>" data-share-to="https://twitter.com/intent/tweet?text=" class="btn-share-social-media twitter"><i class="fab fa-twitter"></i></a></li>
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="Partagez sur Linkedin" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.linkedin.com/sharing/share-offsite/?url=" class="btn-share-social-media linkedin"><i class="fab fa-linkedin"></i></a></li>
                					</ul>
                                </div>
                                <div class="new-blog-date">
                                    	<span class="<?= $post->getLink(); ?>"><?= normaldate2($post->getDateAdd());?></span>

                                </div>
                            </div>
                            <h3 class="new-blog-title"><a href="<?= $post->getLink(); ?>"><?= $post->getTitre(); ?></a></h3>
                            <a href="<?= $post->getLink(); ?>" class="new-service-readmore"><?=$lang['LIRE_SUITE'][$_SESSION['lang']]?> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
			
					<?php
				}
				?>
				</div>
            </div>
        </div>
    </div>
</section>