<!-- Start Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="<?= $siteURL ?>images/fire.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color heading-title-header mb-0"><?= $categorie->getTitre() ?></h1>
    </div>
  </div>
</div>
<!-- End Hero -->
<section>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="<?= $siteURL ?>">Accueil</a></li>
        <li class="breadcrumb-item active heading-title-header"><?= $categorie->getTitre() ?></li>
      </ol>
    </nav>
  </div>
</section>
<div class="cs-height_150 cs-height_lg_80"></div>
<!-- Start Portfolio -->
<div class="container">
  <div class="cs-portfolio_1_heading justify-content-between">
    <div class="cs-section_heading cs-style1">
      <h3 class="cs-section_subtitle">Formations, Packs, Services, Outils</h3>
      <h2 class="cs-section_title">Découvrez Nos Offres</h2>
    </div>
    <div class="cs-isotop_filter cs-style1">
      <ul class="cs-mp0 cs-center">
        <li class="active"><a href="#" data-title="<?= $page->getTitre() ?>" data-filter="*">All</a></li>
        <?php foreach ($categories_produit as $key => $value) : ?>
          <li><a href="#" data-title="<?= $value->getTitre() ?>" data-filter=".<?= str_replace(" ", "_", strtolower($value->getTitre())) ?>"><?= $value->getTitre() ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="cs-height_90 cs-height_lg_15"></div>
  <div class="cs-isotop cs-style1 cs-isotop_col_3 cs-has_gutter_24">
    <div class="cs-grid_sizer"></div>
    <?php foreach ($produits as $key => $value) : ?>
      <div class="cs-isotop_item <?= $key % 2 == 0 && rand(0, sizeof($produits)) % 2 == 0 ? 'cs-w66' : '' ?> <?= str_replace(" ", "_", strtolower($value->getCategorie()->getTitre())) ?>">
        <a href="<?= $value->getLink() ?>" class="cs-portfolio cs-style1 cs-type1">
          <div class="cs-portfolio_hover"></div>
          <div class="cs-portfolio_bg cs-bg" data-src="<?= $siteURL . "images/produit/" . $value->getPhoto() ?>"></div>
          <div class="cs-portfolio_info">
            <div class="cs-portfolio_info_bg cs-accent_bg"></div>
            <h2 class="cs-portfolio_title"><?= $value->getTitre() ?></h2>
            <div class="cs-portfolio_subtitle">Voir les détails</div>
          </div>
        </a>
      </div><!-- .cs-isotop_item -->
    <?php endforeach; ?>
  </div>
  <div class="cs-height_90 cs-height_lg_40"></div>
</div>
<!-- End Portfolio -->