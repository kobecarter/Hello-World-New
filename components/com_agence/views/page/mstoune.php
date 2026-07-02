
<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/pages/".$page->getPhoto(); ?>
    <div class="banner service-banner location-banner">
        <div class="container">
            <div class="service-banner-content">
                <div class="row">
                    <div class="col-md-7">
                        <div class="title-box-service">
                            <h1 class="banner-title-seervice">Animation Vidéos & Motion Design <span>au Maroc</span></h1>
                              <div class="subtitle-service"><?php echo $page->getExtrait(); ?></div>
                        </div>
                    </div>
                    <div class="col-md-5 service-id-38">
                        <div class="service-banner-img">
                         <img src="<?php echo $siteURL.$banner; ?>" alt="<?php echo $page->getTitre(); ?>" class="avatar">
                        </div>
                    </div>
                </div>
            </div>
          
    
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
    <section class="page-template page-detail-service">
         <div class="service-content">
            <?php echo $page->getTexte(); ?>
        </div>
            <div class="container mt-4 mb-4">
                <div class="motion-design-video">
                    <h2 class="big-title mt-4">Explorez le monde Motion design avec nos experts</h2>
                      <a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=7O0I3Dyp27w" class="cs-video_block cs-style1 cs-video_open cs-bg" data-fancybox >
                        <img data-src="<?php echo $siteURL; ?>images/motion-design-video-cover.webp">
                        <span class="cs-player_btn cs-accent_color">
                          <span></span>
                        </span>
                      </a>
                </div>
            </div>

                <div class="container mt-4">
                    <h2 class="big-title mt-4">Ils nous ont fait confiance</h2>
                    <div id="owl-reference" class="owl-carousel owl-theme mb-5">
                        <?php
                        foreach ($partners as $partner) {
                        ?>
                        <div class="item">
                            <img src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" width="150" height="150"
                                alt="<?php echo $partner->getTitre(); ?>" />
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                   

                </div>

    </section>
<section class="page-detail-service page-faq">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="big-title">Faq</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php foreach($faqs as $key=>$faq) :?>
                    <button class="accordion-faq">
                        <h3><?=$faq->getTitre()?></h3>
                        <i class="fas fa-plus icon"></i>
                    </button>
                    <div class="panel">
                        <?=$faq->getTexte()?>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

</section>
<script>
    var acc = document.getElementsByClassName("accordion-faq");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            var icon = this.querySelector(".icon");

            // Toggle the panel visibility
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus"); // Change icon to "+"
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus"); // Change icon to "-"
            }
        });

    }
</script>
