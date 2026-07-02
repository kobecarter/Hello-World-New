<?php $banner = $categorie->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$categorie->getPhoto(); ?>

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
		  <ol class="breadcrumb <?=$_SESSION['lang'] == 'ar' ? 'body-rtl' : ''?>">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?=$lang['HOME'][$_SESSION['lang']]?></a></li>
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
	            <ul class="ul-tags <?=$_SESSION['lang'] == 'ar' ? 'body-rtl' : ''?>">
	              <?php foreach($categories as $key=> $value) :?>
	                    <li><a href="<?=$value->getCategorieLink()?>" class="a-tag <?=$value->getId() == $categorie->getId() ? 'active' : null ?>"><?=$value->getTitre()?></a></li>
	              <?php endforeach;?>
	            </ul>
	        </div>
			<?php foreach ($posts as $post): ?>
				<div class="col-sm-6 col-md-4 mb-4 go-to" data-url="<?= $post->getLink(); ?>">
						<div class="new-blog-item">
                        <div class="new-blog-img">
                            <a href="<?= $post->getLink(); ?>"><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>" alt="<?= $post->getTitre(); ?>E"/></a>
                            
                        </div>
                        <div class="new-blog-content">
                            <div class="new-blog-date-icons">
                          
                                <div class="new-blog-icons">
                                  	<ul class="">
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_FACEBOOK'][$_SESSION['lang']]?>" class=" btn-share-social-media facebook"  data-url="<?= $post->getLink(); ?>" data-share-to="https://www.facebook.com/sharer/sharer.php?u="><i class="fab fa-facebook-f"></i></a></li>
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_TWITTER'][$_SESSION['lang']]?>" class=" btn-share-social-media twitter" data-url="<?= $post->getLink(); ?>" data-share-to="https://twitter.com/intent/tweet?text="><i class="fab fa-twitter"></i></a></li>
                						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_LINKEDIN'][$_SESSION['lang']]?>" class=" btn-share-social-media linkedin" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.linkedin.com/sharing/share-offsite/?url="><i class="fab fa-linkedin"></i></a></li>
                					</ul>
                                </div>
                                <div class="new-blog-date">
                                    	<span class="<?= $post->getLink(); ?>"><?= normaldate2($post->getDateAdd());?></span>

                                </div>
                            </div>
                            <h3 class="new-blog-title"><a href=""><?= $post->getTitre(); ?></a></h3>
                            <a href="<?= $post->getLink(); ?>" class="new-service-readmore"><?=$lang['LIRE_SUITE'][$_SESSION['lang']]?> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
				</div>
			<?php endforeach; ?>
			<?php if(sizeof($posts) <= 0) :?>
			    <div class="col-12">
			         <p class="text-center"><?=$lang['THERE_IS_NO_RESULT'][$_SESSION['lang']]?></p>
			    </div>
			<?php endif;?>
		</div>
    </div>
  </section>