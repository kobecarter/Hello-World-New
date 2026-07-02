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
                          BLOG
  =========================================================-->
  <section class="page-template page-blog">
    <div class="container">
		<div class="row">
			<div class="col-sm-12"><?php echo $page->getTexte(); ?></div>
			<?php foreach ($posts as $post): ?>
					<div class="col-sm-6 col-md-4 mb-4">
					<div class="new-blog-item">
                        <div class="new-blog-img">
                            <a href="<?= $post->getLink(); ?>"><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>"  class="lazy" alt="<?= $post->getTitre(); ?>"/></a>
                            
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
				</div>
			<?php endforeach; ?>
			<?php if(sizeof($posts) <= 0) :?>
			    <div class="col-12">
			         <p class="text-center">Il n'y a aucun résultat</p>
			    </div>
			<?php endif;?>
					 <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="pagination blog-pagination">
                    <?php
                    for ($i = 1; $i <= ceil(count($blogAll) / $itemPerPage); $i++) {
                        $current = ($i == $currentPage) ? 'current' : '';
                    ?>
                        <a href="<?php echo $page->getLink() . $i . '/'; ?>"
                            class="<?php echo $current; ?>"><?php echo $i; ?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
		</div>
    </div>
  </section>