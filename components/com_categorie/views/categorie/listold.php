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
		  <ol class="breadcrumb <?=$_SESSION['lang'] == 'ar' ? 'body-rtl' : ''?>">
			<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?=$lang['HOME'][$_SESSION['lang']]?></a></li>
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
					<div class="item-blog">
					<div class="img-box">
						<a href="<?= $post->getLink(); ?>"><img src="<?= $siteURL; ?>images/blog/<?= $post->getPhoto(); ?>" alt="<?= $post->getTitre(); ?>"/></a>
					</div>
					<div class="text-box">
						<h3><?= $post->getTitre(); ?></h3>
						<span class="date"><?= normaldate2($post->getDateAdd());?></span>
						<?php echo mb_substr(strip_tags($post->getExtrait()), 0, 150, "UTF-8"); ?> [&hellip;]
					</div>
					<a href="<?= $post->getLink(); ?>" class="btn-more stop-propagation"><?=$lang['LIRE_SUITE'][$_SESSION['lang']]?> <i class="fa fa-angle-right"></i></a>
					<ul class="share">
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_FACEBOOK'][$_SESSION['lang']]?>" class=" btn-share-social-media facebook"  data-url="<?= $post->getLink(); ?>" data-share-to="https://www.facebook.com/sharer/sharer.php?u="><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_TWITTER'][$_SESSION['lang']]?>" class=" btn-share-social-media twitter" data-url="<?= $post->getLink(); ?>" data-share-to="https://twitter.com/intent/tweet?text="><i class="fab fa-twitter"></i></a></li>
						<li><a href="javascript:void(0)" data-toggle="tooltip" title="<?=$lang['SHARE_ON_LINKEDIN'][$_SESSION['lang']]?>" class=" btn-share-social-media linkedin" data-url="<?= $post->getLink(); ?>" data-share-to="https://www.linkedin.com/sharing/share-offsite/?url="><i class="fab fa-linkedin"></i></a></li>
					</ul>
					</div>
				</div>
			<?php endforeach; ?>
			<?php if(sizeof($posts) <= 0) :?>
			    <div class="col-12">
			         <p class="text-center"><?=$lang['THERE_IS_NO_RESULT'][$_SESSION['lang']]?></p>
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