<?php $banner = $service->getPhotoBanniere() == "" ? "images/banner.jpg" : "images/services/" . $service->getPhotoBanniere(); ?>

<!-- Page Title -->
<div class="banner">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL . $banner; ?>" alt="<?php echo $service->getTitre(); ?>">
	</div>
	<div class="title-box">
		<h1 class="banner-title"><?php echo $service->getTitre(); ?></h1>
		<div class="subtitle"><?php echo $service->getSousTitre(); ?></div>
	</div>
</div>

<section>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a></li>
				<li class="breadcrumb-item"><a href="<?php echo $page->getLink(); ?>"><?php echo $page->getTitre(); ?></a></li>
				<?php if ($service->getParent()->getId() != 0) : ?>
					<li class="breadcrumb-item"><a href="<?php echo $service->getParent()->getLink(); ?>"><?php echo $service->getParent()->getTitre(); ?></a></li>
				<?php endif; ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $service->getTitre(); ?></li>
			</ol>
		</nav>
	</div>
</section>

<!--========================================================
                          SERVICES
  =========================================================-->
<section class="page-template page-detail-service">
	<div class="">
		<div class="container">
		    <div class="row">
		        `<div class="col-12">
		            <ul class="ul-tags">
		              <?php foreach($services as $key=> $value) :?>
		                    <li><a href="<?=$value->getLink()?>" class="a-tag <?=$service->getId() == $value->getId() ? 'active' : null?>"><?=$value->getTitre()?></a></li>
		              <?php endforeach;?>
		            </ul>
		        </div>
		    </div>
			<?php echo $service->getTexte(); ?>
		</div>
		<div class="row w-100 p-0 m-0">
			<?php if ($service->getId() == 36) : ?>
				<div class="col-12 p-0">
					<section class="discover-video">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12">
									<h2 class="big-title">DÉCOUVREZ NOTRE BIBLIOTHÈQUE VIDÉO</h2>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 px-0">
									<?php $video = $videos_to_discover[0]; ?>
									<div class="item-discover-video big-item">
										<div class="imgbox">
											<a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
											<img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>" alt="<?php echo $video->getTitre(); ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="row">
										<?php $cpt = 0; ?>
										<?php foreach ($videos_to_discover as $video) :
											$cpt++;
											if ($cpt == 1) continue;
										?>
											<div class="col-sm-6 px-0">
												<div class="item-discover-video">
													<div class="imgbox">
														<a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
														<img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>" alt="<?php echo $video->getTitre(); ?>">
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 mt-5">
									<a href="<?php echo $pageVideo->getLink(); ?>" class="btn-custom"><span>Discover more videos</span></a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Start Portfolio -->
				<div class="mt-5">
					<div class="cs-portfolio_1_heading">
					<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12">
									<h2 class="big-title">Plongez dans Nos Shootings Photo</h2>
								</div>
							</div>
						</div>
						<div class="cs-isotop_filter cs-style1">
							<ul class="cs-mp0 cs-center">
								<li class="active"><a href="#" data-filter="*">All</a></li>
								<?php $galleries_nav = [19, 20, 21, 22, 23, 24, 25, 26, 27]; ?>
								<?php foreach ($galleries_nav as $value) : ?>
								    <?php $gallery_nav = galerie::find($value, $_SESSION["lang"]); ?>
								    <li><a href="#" data-title="<?= $gallery_nav->getTitre() ?>" data-filter=".<?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($gallery_nav->getTitre())) ?>"><?= $gallery_nav->getTitre() ?></a></li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
					<div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
						<div class="cs-grid_sizer"></div>
						<?php $galleries = [19, 20, 21, 22, 23, 24, 25, 26, 27]; ?>
						<?php foreach ($galleries as $value) : ?>
							<?php $gallery_photos = galerie_photo::findAllByGalerie($_SESSION["lang"], $value) ?>
							<?php foreach ($gallery_photos as $photo) : ?>
								<div class="cs-isotop_item col-12 col-md-4 <?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($photo->getGalerie()->getTitre())) ?>">
									<div class="div-gallery-photo">
										<img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" alt="<?= $photo->getTitre() ?>" class="lazy">
										<a href="javascript:void(0)" data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</div>
					<div class="cs-height_90 cs-height_lg_40"></div>
				</div>
				<!-- End Portfolio -->
			<?php endif; ?>
			<?php if ($service->getId() == 44) : ?>
			<div class="col-12 p-0">
    				<section class="discover-video">
    					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-12">
    								<h2 class="big-title">EXPLORE OUR VIDEO LIBRARY</h2>
    							</div>
    						</div>
    					</div>
    					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-6 px-0">
    								<?php $video = $videos_to_discover[0]; ?>
    								<div class="item-discover-video big-item">
    									<div class="imgbox">
    										<a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
    										<img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>" alt="<?php echo $video->getTitre(); ?>">
    									</div>
    								</div>
    							</div>
    							<div class="col-sm-6">
    								<div class="row">
    									<?php $cpt = 0; ?>
    									<?php foreach ($videos_to_discover as $video) :
    										$cpt++;
    										if ($cpt == 1) continue;
    									?>
    										<div class="col-sm-6 px-0">
    											<div class="item-discover-video">
    												<div class="imgbox">
    													<a href="javascript:void(0)" data-src="https://www.youtube.com/watch?v=<?php echo $video->getVideo(); ?>" data-fancybox><i class="fab fa-youtube"></i></a>
    													<img src="<?php echo $siteURL; ?>images/videos/<?php echo $video->getPhoto(); ?>" alt="<?php echo $video->getTitre(); ?>">
    												</div>
    											</div>
    										</div>
    									<?php endforeach; ?>
    								</div>
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-sm-12 mt-5">
    								<a href="<?php echo $pageVideo->getLink(); ?>" class="btn-custom"><span>Discover more videos</span></a>
    							</div>
    						</div>
    					</div>
    				</section>
    			</div>
    			<!-- Start Portfolio -->
				<div class=" mt-5">
					<div class="cs-portfolio_1_heading">
					<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12">
									<h2 class="big-title">Dive into Our Photo Shoots</h2>
								</div>
							</div>
						</div>
						<div class="cs-isotop_filter cs-style1">
							<ul class="cs-mp0 cs-center">
								<li class="active"><a href="#" data-filter="*">All</a></li>
								<?php $galleries = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]; ?>
								<?php foreach ($galleries as $value) : 
								    $gallery = galerie::find($value, $_SESSION["lang"]) ?>
								    <li><a href="#" data-title="<?= $gallery->getTitre() ?>" data-filter=".<?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($gallery->getTitre())) ?>"><?= $gallery->getTitre() ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
						<div class="cs-grid_sizer"></div>
						<?php $galleries = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,52, 53]; ?>
						<?php foreach ($galleries as $value) : ?>
							<?php $gallery_photos = galerie_photo::findAllByGalerie($_SESSION["lang"], $value) ?>
							<?php foreach ($gallery_photos as $photo) : ?>
								<div class="cs-isotop_item col-12 col-md-4 <?= str_replace([" ", ",", "'"], ["_", "_", "_"], strtolower($photo->getGalerie()->getTitre())) ?>">
									<div class="div-gallery-photo">
										<img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" alt="<?= $photo->getTitre() ?>" class="lazy">
										<a href="javascript:void(0)" data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</div>
					<div class="cs-height_90 cs-height_lg_40"></div>
				</div>
				<!-- End Portfolio -->
		    <?php endif; ?>
			<?php if (in_array($service->getId(),[38,39,42,43,46,47])) : ?>
    			<div class="col-12 p-0">
        			<div class="portfolio">
                    	<div class="container-fluid">
                    		<div class="row">
                    			<div class="col-sm-12">
                    				<h2 class="big-title">Nos dernières réalisations</h2>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="container-fluid">
                    		<div class="row">
                    			<div class="col-sm-6 px-0">
                    				<?php $reference = $references[0]; ?>
                    				<div class="item-portfolio big-item">
                    					<div class="imgbox">
                    						<img width="500" height="700" src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="">
                    					</div>
                    					<div class="title-box">
                    						<h1><?php echo $reference->getNomClient(); ?></h1>
                    						<a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank"><?php echo $reference->getSiteWeb(); ?></a>
                    					</div>
                    					<div class="text-box">
                    						<h1><?php echo $reference->getNomClient(); ?></h1>
                    						<a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank" class="website"><?php echo $reference->getSiteWeb(); ?></a>
                    						<p><?php echo $reference->getExtrait(); ?></p>
                    						<ul class="links">
                    							<li><a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank">Le site</a></li>
                    							<li><a href="<?php echo $reference->getLink(); ?>">Plus de détail</a></li>
                    						</ul>
                    
                    
                    					</div>
                    				</div>
                    			</div>
                    			<div class="col-sm-6">
                    			<div class="row">
                    			<?php $cpt = 0; ?>	
                    			<?php foreach($references as $reference): ?>
                    			<?php
                    				$cpt++;
                    				if($cpt == 1) continue;
                    			?>	
                    			<div class="col-sm-6 px-0">
                    				<div class="item-portfolio">
                    					<div class="imgbox">
                    						<img width="300" height="300" src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="">
                    					</div>
                    					<div class="title-box">
                    						<h1><?php echo $reference->getNomClient(); ?></h1>
                    						<a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank"><?php echo $reference->getSiteWeb(); ?></a>
                    					</div>
                    					<div class="text-box">
                    						<h1><?php echo $reference->getNomClient(); ?></h1>
                    						<a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank" class="website"><?php echo $reference->getSiteWeb(); ?></a>
                    						<p><?php echo $reference->getExtrait(); ?></p>
                    						<ul class="links">
                    							<li><a href="<?= $reference->getSiteWeb() ? 'https://'.$reference->getSiteWeb() : $siteURL ?>" title="Discover website" target="_blank">Le site</a></li>
                    							<li><a href="<?php echo $reference->getLink(); ?>">Plus de détail</a></li>
                    						</ul>
                    
                    
                    					</div>
                    				</div>
                    			</div>			
                    			<?php endforeach; ?>	
                    		</div>
                    		</div>		
                    		</div>
                    		<div class="row">
                    			<div class="col-sm-12 mt-5">
                    				<a href="<?php echo $pageReference->getLink(); ?>" class="btn-custom"><span>Voir plus de réalisations</span></a>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if($service->getId() == 45) :?>
			    <div class="col-12 p-0">
    			    <!-- Start Portfolio -->
    				<div class=" mt-5">
    					<div class="cs-portfolio_1_heading">
    					    <div class="container-fluid">
    							<div class="row">
    								<div class="col-sm-12">
    								    <?php $gallery_service = galerie::find(61,$_SESSION['lang']);?>
    									<h2 class="big-title mb-5"><?=$gallery_service->getTitre()?></h2>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24 mt-3">
    						<div class="cs-grid_sizer"></div>
    							<?php 
    							$photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_service->getId());
    							foreach ($photos as $photo) : ?>
    								<div class="cs-isotop_item col-12 col-md-4">
    									<div class="div-gallery-photo">
    									     <div class="hover-box">
    								 <?php if ($photo->getDesc1()) :?>         
                                    <h4>
                                        <?= $photo->getDesc1() ?> Abonnés
                                    </h4>
                                    <?php endif; ?>
                                        								
                                    <?php if ($photo->getDesc2()) :?>         
                                    <p><?= $photo->getDesc2() ?></p>
                                    <?php endif; ?>
                                </div>
    										<img data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" alt="<?= $photo->getTitre() ?>" class="lazy">
    										<a href="javascript:void(0)" data-src="<?= $siteURL . "images/galerie/" . $photo->getPhoto() ?>" data-fancybox="gallery-market"><i class="fa fa-search-plus"></i></a>
    									</div>
    								</div>
    							<?php endforeach; ?>
    					</div>
    					<div class="cs-height_90 cs-height_lg_40"></div>
    				</div>
    				<!-- End Portfolio -->
				</div>
			<?php endif;?>
			
			<!-- <?php if($service->getId() == 40) :?>
    			<div class="col-sm-12">
        			<section class="item-reference">
            			<div class="container">
                    		<div class="row">
                    			<div class="col-sm-12">
                    			    <?php $gallery_seo = galerie::find(62,$_SESSION['lang']);?>
                    				<h2 class="big-title">Domination des Moteurs de Recherche</h2>
                    			</div>
                    			<div class="col-sm-12">
                    				<div id="owl-photos-seo"  class="owl-carousel owl-theme owl-photos">
                    					<?php
                    					$photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_seo->getId());
                    					foreach($photos as $photo) {
                    						?>
                    						<div class="item-shooting">
                    							<a href="<?php echo $siteURL; ?>images/galerie/<?php echo $photo->getPhoto(); ?>" data-fancybox="gallery-seo" class="imgbox">
                    								<i class="ti-zoom-in"></i>
                    								<img src="<?php echo $siteURL; ?>images/galerie/<?php echo $photo->getPhoto(); ?>"
                    									 alt="<?php echo $photo->getTitre(); ?>"/>
                    							</a>
                    						</div>
                    						<?php
                    					}
                    					?>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </section>
                </div>
            <?php endif;?> -->
            
            <!-- <?php if($service->getId() == 41) :?>
    			<div class="col-sm-12">
        			<section class="item-reference">
            			<div class="container">
                    		<div class="row">
                    			<div class="col-sm-12">
                    			    <?php $gallery_leads = galerie::find(63,$_SESSION['lang']);?>
                    				<h2 class="big-title">Nos dernières campagnes</h2>
                    			</div>
                    			<div class="col-sm-12">
                    				<div id="owl-photos-leads" class="owl-carousel owl-theme owl-photos">
                    					<?php
                    					$photos = galerie_photo::findAllByGalerie($_SESSION['lang'], $gallery_leads->getId());
                    					foreach($photos as $photo) {
                    						?>
                    						<div class="item-shooting">
                    							<a href="<?php echo $siteURL; ?>images/galerie/<?php echo $photo->getPhoto(); ?>" data-fancybox="gallery-leads" class="imgbox">
                    								<i class="ti-zoom-in"></i>
                    								<img src="<?php echo $siteURL; ?>images/galerie/<?php echo $photo->getPhoto(); ?>"
                    									 alt="<?php echo $photo->getTitre(); ?>"/>
                    							</a>
                    						</div>
                    						<?php
                    					}
                    					?>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </section>
                </div>
            <?php endif;?> -->
			<div class="col-sm-12">
				<div class="container">
					<h2 class="big-title">Ils nous ont fait confiance</h2>
					<div id="owl-reference" class="owl-carousel owl-theme mb-5">
						<?php
						foreach ($partners as $partner) {
						?>
							<div class="item">
								<img src="<?php echo $siteURL; ?>images/partners/<?php echo $partner->getPhoto(); ?>" alt="<?php echo $partner->getTitre(); ?>" />
							</div>
						<?php
						}
						?>
					</div>
					<?php
					switch ($service->getSlug()) {
						case 'notorite':
							$btnText = "BOOSTEZ VOTRE NOTORIETE MAINTENANT";
							break;
						case 'branding':
							$btnText = "AMÉLIOREZ VOTRE IMAGE DE MARQUE MAINTENANT";
							break;
						case 'relation':
							$btnText = "CONSTITUEZ VOTRE COMMUNAUTE MAINTENANT";
							break;
						case 'StoryTelling':
							$btnText = "RACONTEZ L’HISTOIRE DE VOTRE MARQUE MAINTENANT";
							break;
						case 'offshoring':
							$btnText = "EXTERNALISEZ VOS SERVICES MAINTENANT";
							break;
						case 'marketingStrategique':
							$btnText = "ÉTUDIEZ VOTRE MARCHE MAINTENANT";
							break;
						case 'marketingOperationnel':
							$btnText = "PLANIFIEZ VOS ACTIONS MARKETING MAINTENANT";
							break;
						case 'dev':
							$btnText = "CONTACTEZ-NOUS POUR UNE CONSULTATION GRATUITE";
							break;
						case 'outilsGestion':
							$btnText = "ADOPTEZ UN OUTIL DE GESTION DE DONNEES CLIENTS MAINTENANT";
							break;
						case 'marketingAutomation':
							$btnText = "ADOPTEZ UN OUTIL DE GESTION DE DONNEES CLIENTS MAINTENANT";
							break;
						case 'marketingInfluence':
							$btnText = "TROUVEZ VOTRE INFLUENCEUR IDÉAL MAINTENANT";
							break;
						case 'commInfluence':
							$btnText = "DEMANDEZ UNE CONSULTATION GRATUITE MAINTENANT";
							break;
						case 'pvente':
							$btnText = "DRAINEZ DU MONDE DANS VOTRE MAGASIN MAINTENANT";
							break;
						case 'ecommerce':
							$btnText = "BOOSTEZ MES VENTES EN LIGNE MAINTENANT";
							break;
						case 'socialCommerce':
							$btnText = "VENDRE MES PRODUITS/SERVICES SUR LES RESEAUX MAINTENANT";
							break;
						default:
							$btnText = "Contactez nous maintenant";
					}
					?>
					<a href="javascript:void(0)" class="btn-service open-form-service" data-id="<?php echo $service->getId(); ?>"><?php echo $btnText; ?> <i class="ti-arrow-right"></i></a>

					<div class="service-form-box col-sm-8 offset-sm-2"></div>

				</div>

			</div>
		</div>

		<?php if (!empty($packs)) : ?>
			<div class="row mt-5">
				<div class="col-sm-12">
					<h2 class="big-title">Découvrir nos packs</h2>
				</div>
				<div class="pack-box">
					<?php foreach ($packs as $pack) : ?>
						<div class="item-pack">
							<h4><?php echo $pack->getTitre(); ?></h4>

							<?php if ($pack->getPrix() != '') : ?>
								<div class="price">
									<?php echo number_format($pack->getPrix(), 2, ',', ' '); ?> <sup>Dhs</sup>
								</div>
							<?php endif; ?>

							<div class="textbox">
								<?php echo $pack->getDetails(); ?>
							</div>
							<a href="#0" class="btn-custom"><span>J'opte pour ce pack</span></a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</section>

<!-- Modal / Demo -->
<div class="modal fade" id="serviceModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><?php echo $btnText; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom purple" data-dismiss="modal"><span>Fermer</span></button>
				<button type="button" class="btn btn-custom send-form"><span>Envoyer</span></button>
			</div>
		</div>
	</div>
</div>