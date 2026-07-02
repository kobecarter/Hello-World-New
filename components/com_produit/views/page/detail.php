<!-- Start Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="<?= $siteURL ?>images/fire.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color mb-0"><?= $produit->getTitre() ?></h1>
    </div>
  </div>
</div>
<!-- End Hero -->
<section>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="<?= $siteURL ?>">Accueil</a></li>
        <li class="breadcrumb-item"><a href="<?= $page->getLink() ?>"><?= $page->getTitre() ?></a></li>
        <li class="breadcrumb-item active"><?= $produit->getTitre() ?></li>
      </ol>
    </nav>
  </div>
</section>
<!-- End Why Choose -->
<div class="cs-height_70 cs-height_lg_80"></div>
<div class="container">
  <div class="cs-portfolio_details">
    <img src="<?= $siteURL ?>images/produit/<?= $produit->getPhoto() ?>" alt="Image" class="cs-radius_15 w-100">
    <div class="cs-height_90 cs-height_lg_40"></div>
    <div class="row">
      <div class="col-lg-1é">
        <div class="cs-section_heading cs-style1 text-center">
          <h3 class="cs-section_subtitle"><?= $produit->getSousTitre() ?></h3>
          <h2 class="cs-section_title"><?= $produit->getTitre() ?></h2>
          <div class="cs-height_40 cs-height_lg_20"></div>
          <?= $produit->getTexte() ?>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_65 cs-height_lg_10"></div>
</div>