<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/page/".$page->getPhoto(); ?>

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
                          ABOUT
  =========================================================-->
  <section class="page-template">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php echo $page->getTexte(); ?>				
				<?php
				if($client->getId() != 0){
					$client->setActive(1);
					if($client->edit()){
					$_SESSION['client'] = $client;	
					?>
					<div class="alert alert-success">Félicitation!! Votre compte a été activé avec succès</div>
					<a href="<?php echo $pageAccount->getLink(); ?>" class="btn btn-small btn-outline-maincolor">Mon compte</a>
					<?php
					}
					else{
						?>
						<div class="alert alert-danger">Erreur lors de la mise à jour du client</div>
						<?php
					}
				}
				else{
				?>
				<div class="alert alert-danger">Erreur lors de l'execusion de l'opération, compte introuvable</div>
				<?php
				}
				?>
			</div>
		</div>
    </div>
  </section>