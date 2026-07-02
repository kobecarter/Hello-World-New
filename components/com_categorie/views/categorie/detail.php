<!-- <?php
		var_dump($similarblogs);
		?> -->
<?php $banner = $post->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/blog/" . $post->getPhotoBanniere(); ?>

<!-- Page Title -->
<div class="banner">
    <div class="bg-image bg-parallax">
        <img src="<?php echo $siteURL . $banner; ?>" alt="<?php echo $post->getTitre(); ?>">
    </div>
    <div class="title-box">
        <h1 class="banner-title"><?php echo $post->getTitre(); ?></h1>
    </div>
</div>

<section>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb <?=$_SESSION['lang'] == 'ar' ? 'body-rtl' : ''?>">
                <li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?=$lang['HOME'][$_SESSION['lang']]?></a></li>
                <li class="breadcrumb-item"><a
                        href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
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
                <ul class="ul-tags <?=$_SESSION['lang'] == 'ar' ? 'body-rtl' : ''?>">
                    <?php foreach ($categories as $key => $value) : ?>
                    <li><a href="<?= $value->getCategorieLink() ?>"
                            class="a-tag <?= $value->getId() == $post->getCategorie()->getId() ? 'active' : null ?>"><?= $value->getTitre() ?></a>
                    </li>
                    <?php endforeach; ?>
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
<section class="blog-section blog-section-similar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="big-title"><?=$lang['SIMILAR_BLOGS'][$_SESSION['lang']]?></h2>
                <div id="owl-blog" class="owl-carousel owl-theme">
                    <?php
					foreach ($similarblogs as $blog) {
						//$tags = explode(";", $blog->getTags());
						$tags = array();
					?>
               	<div class="new-blog-item">
                        <div class="new-blog-img">
                            <a href="<?= $blog->getLink(); ?>"><img src="<?= $siteURL; ?>images/blog/<?= $blog->getPhoto(); ?>" alt="<?= $blog->getTitre(); ?>"/></a>
                            
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
                                    	<span class="<?= $blog->getLink(); ?>"><?= normaldate2($blog->getDateAdd());?></span>

                                </div>
                            </div>
                            <h3 class="new-blog-title"><a href="<?= $blog->getLink(); ?>"><?= $blog->getTitre(); ?></a></h3>
                            <a href="<?= $blog->getLink(); ?>" class="new-service-readmore"><?=$lang['LIRE_SUITE'][$_SESSION['lang']]?> <i class="fa fa-angle-right"></i></a>
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