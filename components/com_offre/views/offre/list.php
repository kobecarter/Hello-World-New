
  <section class="page-template mt-5">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="into-offre">Commencez votre aventure digitale avec <strong>Hello World</strong> et découvrez les avantages de notre pack exclusif "<strong>Rise-up</strong>" pour booster votre visibilité en ligne !</p>
			</div>
		</div>
    </div>

	<div class="container-fluid p-0">
		<div id="owl-offres" class="owl-carousel owl-theme">
			<div class="item-offre">
				<img src="<?php echo $siteURL; ?>images/offres/s1.jpg" alt="">
			</div>
			<div class="item-offre">
				<img src="<?php echo $siteURL; ?>images/offres/s2.jpg" alt="">
			</div>
			<div class="item-offre">
				<img src="<?php echo $siteURL; ?>images/offres/s3.jpg" alt="">
			</div>
			<div class="item-offre">
				<img src="<?php echo $siteURL; ?>images/offres/s4.jpg" alt="">
			</div>
			<div class="item-offre">
				<img src="<?php echo $siteURL; ?>images/offres/s5.jpg" alt="">
			</div>
        </div>
	</div>

	<div class="container">
		<div class="row">
        	<div class="col-sm-12">
				<h2 class="big-title mt-5"><?php echo $lang['CONTACTEZ_NOUS'][$_SESSION['lang']]; ?></h2>
            </div>
            <div class="col-sm-10 offset-sm-1 contact-form">
            	<p align="center"><?php echo $lang['REMPLIR_FORM_CONTACT'][$_SESSION['lang']]; ?> </p>
				<?php include("components/com_contact/views/contact/form.php"); ?>
            </div>
		</div>
    </div>
  </section>