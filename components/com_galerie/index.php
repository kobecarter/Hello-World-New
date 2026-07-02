<?php
include("includes/traduction.php");
global $db, $siteURL, $lang;
$p = getComponent('com_galerie');

// ajouter span au 1er mot du titre
$t = explode(' ', $p->getTitre());
$titre = '';
$cpt = 0;
foreach ($t as $word) {
	$cpt == 0 ? $titre .= '<span>' . $word . '</span> ' : $titre .= $word . ' ';
	$cpt++;
}
?>

<?php if ($p->getPhoto() != '') { ?>
	<style>
		.banner-template{
			background-image: url(<?php echo $siteURL; ?>images/pages/<?php echo $p->getPhoto(); ?>);
		}
	</style>
<?php } ?>

<div class="banner-template" data-stellar-background-ratio="0.5">
    <div class="gradien"></div>
</div>

<section class="page-galerie page-template">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            	<h1 class="grand-titre"><?= $titre;?></h1>
                <?= $p->getTexte();?>
                <div class="frame-box">
                    <div class="mosaicflow" data-item-height-calculation="attribute">
                    <?php
                        $photos = galerie::findAll();
                        foreach ($photos as $id_photo) {
                            $g = new galerie($id_photo, $db, $_SESSION['lang']);
                            ?>
                            <div class="mosaicflow__item">
                                <a href="<?= $siteURL; ?>images/galerie/<?= $g->getPhoto(); ?>" data-fancybox="galerie"
                                   data-caption="<?= $g->getTitre(); ?>">
                                    <img src="<?= $siteURL; ?>images/galerie/<?= $g->getPhoto(); ?>"
                                         alt="<?= $g->getTitre(); ?>"/>
                                </a>
                                <p><?= $g->getTitre(); ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

