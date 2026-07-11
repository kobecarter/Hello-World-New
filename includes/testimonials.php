<section class="testimonials" id="testimonials">
  <div class="container">
    <div class="sec-label rv">Témoignages</div>
    <h2 class="sec-title rv d1"><em>Ce qu'ils disent</em> de nous</h2>
    <div class="testi-carousel rv d2">
          <div id="owl-testimonials" class="owl-carousel owl-theme">
          <?php foreach($testimonials as $temoignage): ?>
            <div class="item-testimonial">
              <div class="autor-box">
                  <div class="imgbox">
                      <?php
                      $photo = $temoignage->getPhoto();
                      $image = !empty($photo) ? $photo : 'avatar.jpg';
                      ?>
                      <img width="150" height="150" src="<?php echo $siteURL; ?>images/temoignages/<?php echo $image; ?>" alt="Avis <?php echo $temoignage->getNom(); ?>" />
                  </div>
                  <span class="autor"><?php echo $temoignage->getNom(); ?></span>
                  <span class="profession"><?php echo $temoignage->getFonction(); ?></span>
                  <span class="google-icon"><!-- <img src="<?php echo $siteURL; ?>images/google.png" alt="Avis <?php echo $temoignage->getNom(); ?>" /> --><i class="fab fa-google"></i></span>

                  <div class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                          class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </div>
              </div>
              <div class="textbox">
                  <p>
                      <?php echo mb_substr(nl2br(strip_tags($temoignage->getTemoignage())), 0, 240, "UTF-8"); ?>
                      <?php if (mb_strlen($temoignage->getTemoignage()) > 240): ?>
                      ... <br><a href="#0" data-id="<?= $temoignage->getId(); ?>" class="more"><?= $lang['LIRE_SUITE'][$_SESSION['lang']] ?></a>
                      <?php endif; ?>
                  </p>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
          
          <?php if(isset($_GET['option']) && $_GET['option'] == 'com_service'): ?>
          <div class="text-center mt-5">  
            <a href="<?php echo $pageContact->getLink(); ?>" class="sb sb-compact sb-invert" data-auto-reset="true" role="slider" tabindex="0" aria-label="" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="sb-label"><span class="sb-hint">Rejoignez plus de 1000 clients satisfaits</span></div>
              <div class="sb-knob"><i class="fal fa-trophy"></i></div> 
            </a>
          </div>
          <?php endif; ?>  
    </div>
  </div>
</section>