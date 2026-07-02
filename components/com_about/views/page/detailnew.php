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
                          ABOUT
  =========================================================-->
  <section class="page-template pb-0 about-us-new">
    <div class="container">
              <h2 class="big-title">A propos de nous></h2>
            <div class="row row-content">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="about-us-new-content">
              
                            <div class="">
                                 <p class="agence-paragraph">
                <b>Hello World Agency</b>, c’est l’alliance de la créativité et de l’expertise pour donner vie à vos
                <b>projets digitaux</b>
                et révéler le potentiel de votre <b>marque</b>.
                Nous imaginons des solutions uniques et créatives pour accompagner votre <b>marque</b> vers de nouveaux
                sommets.<br>
                Chez <b>Hello World Agency</b>, chaque projet est une aventure humaine où innovation et passion
                s’unissent
                pour
                vous démarquer. Simplifiez votre <b>transformation digitale</b> avec une équipe engagée, des idées
                fraîches
                et des
                résultats concrets. <br>
                Chez <b>Hello World Agency</b>, on parle humain avant de parler <b>digital</b>. Parce que c’est votre
                histoire qui nous
                inspire, et votre réussite qui nous anime. <br>
            </p>
                             </div>

                    <div class="about-us-numbers row">
                        <div class="col-4 p-0">
                            <div class="stat-box col-border">
                            <h3>+239</h3>
                            <p>Clients satisfaits
                                </p>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="stat-box col-border">
                            <h3>+15</h3>
                            <p>
                                Années d'expérience
                                </p>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="stat-box">
                            <h3>+439</h3>
                            <p>
                               Projets réalisés
                               </p>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-5 offset-1">
                    <div class="about-us-imgbox">
                        <img class="offset-not-img" src="https://www.helloworldlabel.ae/images/marketing_agency_dubai2.webp">
                        <div class="about-us-video">
                            <a href="javascript:void(0)" class="video-circle" data-src="https://www.youtube.com/watch?v=6SEzN6JG4cg" data-fancybox=""><i class="fab fa-youtube"></i></a>
                        </div>
                        <!-- <img class="offset-img" src="https://www.helloworldlabel.ae/images/marketing_agency_dubai1.webp"> -->
                    </div>
                </div>
            </div>
        </div>
    
		<!-- time line -->
	  	<h2 class="big-title">Notre Histoire</h2>
	  	<div class="timeline">
		<div class="swiper-container">
		  <div class="swiper-wrapper">
			<div class="swiper-slide" style="background-image: url(<?php echo $siteURL; ?>images/timeline1.webp);" data-year="2009">
			  <div class="swiper-slide-content"><span class="timeline-year">12 Novembre 2009</span>
				<h4 class="timeline-title">Là où tout a commencé</h4>
				<p class="timeline-text">Hamid et Zakaria étaient deux jeunes étudiants quand leurs chemins se sont croisés en 2009, lorsqu’ils étaient en train de faire leur cycle d’ingénieur en informatique. Ils venaient tous les deux d’une famille modeste et travaillaient en alternance pour pouvoir payer leurs études. Ils ont toujours porté en eux cette ambition de prouver à tous le monde qu’ils pouvaient réussir et faire de grandes choses. </p>
			  </div>
			</div>
			  
			  <div class="swiper-slide" style="background-image: url(<?php echo $siteURL; ?>images/timeline4.jpg);" data-year="2012">
			  <div class="swiper-slide-content"><span class="timeline-year">06 Juin 2012</span>
				<h4 class="timeline-title">Création Hello World</h4>
				<p class="timeline-text">En 2012, ils obtiennent leurs diplômes et décident de créer leur entreprise à deux, qu’ils ont nommé Hello World, c’était leur manière de dire au monde qu’ils étaient prêts. Ils s’étaient lancés dans le secteur des nouvelles technologies, qui était en vogue à cette époque. Hamid et Zakaria se sont vite rendu compte que le rêve et la réalité sont deux mondes différents, à chaque fois qu’ils partaient voir des entreprises pour leurs vendre des prestations, ils se heurtaient à un mur : Qui voudraient faire confiance à deux jeunes lauréats sortis d’école, sans expérience. Malgré ces difficultés, ils ont toujours gardé la tête haute. Petit à petit, leur persévérance avait commencé à porter ses fruits, un premier client, puis un deuxième ensuite un troisième. Satisfaire leurs clients était leur première préoccupation, Ils étaient conscients que c’était la seule manière pour eux d’assurer la survie de leur entreprise « rêve ». </p>
			  </div>
			</div>
			  
			<div class="swiper-slide" style="background-image: url(<?php echo $siteURL; ?>images/timeline2.jpg);" data-year="2014">
			  <div class="swiper-slide-content"><span class="timeline-year">19 Novembre 2014</span>
				<h4 class="timeline-title">Global Entrepreneurship Summit</h4>
				<p class="timeline-text">En 2014, Hello World participe à la 5ème édition du GLOBAL ENTREPRENEURSHIP SUMMIT qui se tenait à Marrakech, organisé pour la première fois dans un pays arabo-africain. Le GES est un sommet mondial qui a été inauguré par le président Barack OBAMA en 2009, afin de doter les entrepreneurs des compétences et des ressources nécessaires pour affronter la concurrence et prospérer dans le 21ème siècle. La 5ème édition du GES s’est distinguée par la présence de représentants gouvernementaux de haut niveau, dont Joe BIDEN « ancien vice-président des états unis », Aziz AKHENNOUCH « ministre de l’agriculture et de la pêche maritime » et Miriem BENSALAH « Ex présidente de la CGEM ». Pour Hello World, c’était une occasion en or, car pour la première fois, les deux jeunes hommes avaient l’occasion de côtoyer et d’échanger avec des gens de haut calibre. Ces mêmes gens qui ont été agréablement surpris par le potentiel, l’enthousiasme et l’ambition de ces deux jeunes.</p>
			  </div>
			</div>
			<div class="swiper-slide" style="background-image: url(<?php echo $siteURL; ?>images/timeline3.jpg);" data-year="2015">
			  <div class="swiper-slide-content"><span class="timeline-year">23 Décembre 2015</span>
				<h4 class="timeline-title">1ère apparition TV</h4>
				<p class="timeline-text">A travers le sommet du GES MARRAKECH, Hello World a pu acquérir de la notoriété, et quelques mois après, elle fait sa première apparition TV sur 2M TV, France 24 TV, AL HORRA TV et la RTM TV. Suites à cela, Hello World a réussi à décrocher de grands marchés dans les secteurs publics et privés et a vu son activité croitre de manière exponentielle au niveau national et international.</p>
			  </div>
			</div>
			
			<div class="swiper-slide" style="background-image: url(<?php echo $siteURL; ?>images/timeline5.jpg);" data-year="2019">
			  <div class="swiper-slide-content"><span class="timeline-year">16 Septembre 2019</span>
				<h4 class="timeline-title">Extension Hello World</h4>
				<p class="timeline-text">Aujourd’hui, Hello World est devenu une agence de communication et de publicité, elle est passé de 2 personnes à une trentaine de personnes, elle compte à son actif un portefeuille client de plus de 250 clients et est implantée dans 4 différentes villes, dont 2 à l’international, à savoir, Marrakech, Casablanca, Paris et Londres.</p>
			  </div>
			</div>
		  </div>
		  <div class="swiper-button-prev"></div>
		  <div class="swiper-button-next"></div>
		  <div class="swiper-pagination"></div>
		</div>
	  </div>

  </section>
  <section class="offices-section about-us-new">
    <div class="container">
        <div class="col-sm-12"><h2 class="big-title"><?php echo $lang['NOS_AGENCES'][$_SESSION['lang']]; ?></h2></div>
        <div class="offices-row bg-p-center" style="background-image: url('https://www.helloworldlabel.ae/images/dubai_img.webp');">
            <div class="row d-flex align-items-stretch row-flex-end">

                <div class="col-sm-12 col-md-6 col-lg-6">
                   <div class="office-col">
                    <div class="office-col-content">
                        <h2 class="office-title">Dubai</h2>
                    </div>
                    <div class="office-col-icons">
                        <ul>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:+971543399752">+971 (0)54 339 9752</a>
                            </li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:contact@helloworldlabel.ae">contact@helloworldlabel.ae</a></li>
                            <li class="li-adress"><i class="fa fa-map-marker"></i><p>Dubai Silicon Oasis, DDP, Building A, Dubai, UAE</p></li>
                        </ul>
                    </div>
                      
                   </div>
                </div>
            </div>
        </div>
        <div class="offices-row bg-p-center" style="background-image: url('https://www.helloworldlabel.ae/images/londre.jpg');">
            <div class="row d-flex align-items-stretch">

                <div class="col-sm-12 col-md-6 col-lg-6">
                   <div class="office-col">
                    <div class="office-col-content">
                        <h2 class="office-title">London</h2>
                    </div>
                    <div class="office-col-icons">
                        <ul>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:+33 974 775 124">+44 974 775 124</a>
                            </li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:contact@helloworldlabel.uk">contact@helloworldlabel.uk</a></li>
                            <li class="li-adress"><i class="fa fa-map-marker"></i><p>Hello World (London) Ltd, 3rd Floor, 86-90 Paul Street, LondonEC2A 4NE</p></li>
                        </ul>
                    </div>
                      
                   </div>
                </div>
            </div>
        </div>
        <div class="offices-row bg-p-bottom" style="background-image: url('https://www.helloworldlabel.ae/images/marrakech_location_hw.webp');">
            <div class="row d-flex align-items-stretch row-flex-end">

                <div class="col-sm-12 col-md-6 col-lg-6">
                   <div class="office-col">
                    <div class="office-col-content">
                        <h2 class="office-title">Marrakech</h2>
                    </div>
                    <div class="office-col-icons">
                        <ul>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:tel:+212675472001">+212 6 7 54 72 001</a>
                            </li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:contact@helloworld-agency.com">contact@helloworld-agency.com</a></li>
                            <li class="li-adress"><i class="fa fa-map-marker"></i><p>AV MY ABDELLAH ET 11 JANVIER IMM SALAM 144 APPT 13 ETAGE 3 BAB DOUKALA, Marrakech</p></li>
                        </ul>
                    </div>
                      
                   </div>
                </div>
            </div>
        </div>
        <div class="offices-row bg-p-bottom" style="background-image: url('https://www.helloworldlabel.ae/images/casablanca-image.webp');">
            <div class="row d-flex align-items-stretch">

                <div class="col-sm-12 col-md-6 col-lg-6">
                   <div class="office-col">
                    <div class="office-col-content">
                        <h2 class="office-title">Casablanca</h2>
                    </div>
                    <div class="office-col-icons">
                        <ul>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:tel:+212614778702">+212 6 14 77 87 02</a>
                            </li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:contact@helloworld-agency.com">contact@helloworld-agency.com</a></li>
                            <li class="li-adress"><i class="fa fa-map-marker"></i><p>70 allé phonex Ain sbaa Casablanca - Maroc</p>7</li>
                        </ul>
                    </div>
                      
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- Start Team Section -->
    <section class="mt-3 mt-sm-0 mb-0 mb-sm-5 pb-5">
      <div class="container">
         <div class="row">
            <div class="col-12">
                <h2 class="big-title text-center mb-3">Une seule équipe, un seul esprit.</h2>
  <p class="p-team">
      Nous opérons dans un même esprit : une équipe unie, complémentaire et
      tournée vers votre succès. Nous réunissons toutes les compétences
      nécessaires pour répondre à vos besoins avec <b>créativité</b> et
      <b>innovation</b>. Nos experts en <b>stratégie marketing</b>,
      <b>communication</b>, <b>web design</b>, <b>graphisme</b> et
      <b>développement web</b> transforment chaque opportunité digitale en une
      véritable valeur ajoutée pour votre business. Avec nous, les <b>réseaux
      sociaux deviennent un puissant levier de croissance</b>. <b>Ensemble, faisons de
      votre projet une réussite, car le succès naît du travail d’équipe !</b>
    </p>
            </div>
         </div>
        <div class="cs-slider cs-style2 cs-gap-24">
          <div class="cs-slider_heading cs-style1 mb-0 mb-md-4 align-items-end">
            <div class="cs-section_heading cs-style1"></div>
            <div class="cs-slider_arrows cs-style1 cs-primary_color">
              <div class="cs-left_arrow cs-center">
                <svg width="26" height="13" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.469791 5.96967C0.176899 6.26256 0.176899 6.73744 0.469791 7.03033L5.24276 11.8033C5.53566 12.0962 6.01053 12.0962 6.30342 11.8033C6.59632 11.5104 6.59632 11.0355 6.30342 10.7426L2.06078 6.5L6.30342 2.25736C6.59632 1.96447 6.59632 1.48959 6.30342 1.1967C6.01053 0.903806 5.53566 0.903806 5.24276 1.1967L0.469791 5.96967ZM26.0001 5.75L1.00012 5.75V7.25L26.0001 7.25V5.75Z" fill="currentColor" />
                </svg>
              </div>
              <div class="cs-right_arrow cs-center">
                <svg width="26" height="13" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M25.5305 7.03033C25.8233 6.73744 25.8233 6.26256 25.5305 5.96967L20.7575 1.1967C20.4646 0.903806 19.9897 0.903806 19.6968 1.1967C19.4039 1.48959 19.4039 1.96447 19.6968 2.25736L23.9395 6.5L19.6968 10.7426C19.4039 11.0355 19.4039 11.5104 19.6968 11.8033C19.9897 12.0962 20.4646 12.0962 20.7575 11.8033L25.5305 7.03033ZM0.00012207 7.25H25.0001V5.75H0.00012207V7.25Z" fill="currentColor" />
                </svg>
              </div>
            </div>
          </div>
          <div class="cs-height_85 cs-height_lg_45"></div>
          <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">
            <div class="cs-slider_wrapper">
              <div class="cs-slide">
                <div class="cs-team cs-style1">
                  <div class="cs-member_thumb">
                    <img src="<?php echo $siteURL; ?>images/team/hamid.webp" alt="Hamid">
                    <div class="cs-member_overlay"></div>
                  </div>
                  <div class="cs-member_info">
                    <h2 class="cs-member_name">Hamid</h2>
                    <div class="cs-member_designation">Ceo & Founder</div>
                  </div>
                  
                </div>
              </div>
              <!-- .cs-slide -->
              <div class="cs-slide">
                <div class="cs-team cs-style1">
                  <div class="cs-member_thumb">
                    <img src="<?php echo $siteURL; ?>images/team/zak.webp" alt="Zakaria">
                    <div class="cs-member_overlay"></div>
                  </div>
                  <div class="cs-member_info">
                    <h2 class="cs-member_name">Zakaria</h2>
                    <div class="cs-member_designation">Co-Founder & IT Manager</div>
                  </div>
                  
                </div>
              </div>
                 <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/hassna.jpeg" alt="Imane">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Hasna</h2>
                                <div class="cs-member_designation">Responsable Administrative</div>
                            </div>

                        </div>
                    </div>
              <!-- .cs-slide -->
            <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/rokya.webp" alt="Rokya">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Rokya</h2>
                                <div class="cs-member_designation">Commerciale</div>
                            </div>

                        </div>
                    </div>
              <!-- .cs-slide -->
               <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/siham.webp" alt="Siham">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Siham</h2>
                                <div class="cs-member_designation">Commerciale</div>
                            </div>

                        </div>
                    </div>
              <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/
marwa.jpg" alt="Siham">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Marwa</h2>
                                <div class="cs-member_designation">Commerciale</div>
                            </div>

                        </div>
                    </div>
                                        <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/salma.webp" alt="Salma">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Salma</h2>
                                <div class="cs-member_designation">Responsable Marketing</div>
                            </div>

                        </div>
                    </div>
              <!-- .cs-slide -->
              <div class="cs-slide">
                <div class="cs-team cs-style1">
                  <div class="cs-member_thumb">
                    <img src="<?php echo $siteURL; ?>images/team/youssef.webp" alt="Youssef">
                    <div class="cs-member_overlay"></div>
                  </div>
                  <div class="cs-member_info">
                    <h2 class="cs-member_name">Youssef</h2>
                    <div class="cs-member_designation">Graphic Design</div>
                  </div>
                  
                </div>
              </div>
              <!-- .cs-slide -->
         <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/anas.jpeg" alt="anas">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Anas</h2>
                                <div class="cs-member_designation">Developpeur Web</div>
                            </div>

                        </div>
                    </div>
                    <div class="cs-slide">
                        <div class="cs-team cs-style1">
                            <div class="cs-member_thumb">
                                <img src="<?php echo $siteURL; ?>images/team/khadija.webp" alt="khadija">
                                <div class="cs-member_overlay"></div>
                            </div>
                            <div class="cs-member_info">
                                <h2 class="cs-member_name">Khadija</h2>
                                <div class="cs-member_designation">Developpeuse Web</div>
                            </div>

                        </div>
                    </div>
              <!-- .cs-slide -->
            </div>
          </div>
          <!-- .cs-slider_container -->
          <div class="cs-pagination cs-style1 cs-hidden_desktop"></div>
        </div>
        <!-- .cs-slider -->
      </div>
    </section>
    <!-- End Team Section -->