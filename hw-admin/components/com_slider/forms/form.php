<?php
if (isset($s)) {
    $action = "components/com_slider/controleur/slider.php?task=editSlider";
    $task = "edit";
    $bt = $trad_com_slider['MODIFIER_SLIDER'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_slider/controleur/slider.php?task=addSlider";
    $task = "add";
    $bt = $trad_com_slider['AJOUTER_SLIDER'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm" id="sliderForm">
    <div class="row">

        <div class="col-md-6 form-group">
            <label><?= $trad_com_slider['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input type="text" name="titre"
                                             value="<?php if (isset($s)) echo $s->getTitre(); ?>" class="form-control"/>
            </div>
        </div>

        <div class="col-md-2 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="actif"
                           value="1" <?php if (isset($s) && $s->isActif()) echo "checked"; ?> /> <?= $trad_com_slider['ACTIVE'][$_SESSION['user']->getLangue()]; ?>
                </label>
            </div>
        </div>
    </div>

    <?php if (isset($s)) { ?>
        <input type="hidden" name="id" value="<?= $s->getId() ?>"/>
    <?php } ?>

    <input type="reset" class="btn btn-default"
           value="<?= $trad_com_slider['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
    <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif"/></span>
</form>
<script>
    $(function () {
        var succes = "<?= $trad_com_slider['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_slider['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#sliderForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({scrollTop: 0}, "slow");
                // messages
                if ($(".submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_slider['SUCCES_MODIF'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_slider['ERREUR_MODIF'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_slider['SUCCES_ADD'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_slider['ERREUR_ADD'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) == 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_slider";
                    }, 2000)
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    })
</script>