<?php
if (isset($_GET['ids']) && !empty($_GET['ids'])) {
    $s = new slide(intval($_GET['ids']), $db, $_SESSION['langue']);
}
if (isset($s)) {
    $action = "components/com_slider/controleur/slider.php?task=editSlide";
    $task = "edit";
    $bt = $trad_com_slider['MODIFIER_SLIDE'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_slider/controleur/slider.php?task=addSlide";
    $task = "add";
    $bt = $trad_com_slider['AJOUTER_SLIDE'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm" id="sliderForm">
    <div class="row">
        <div class="col-md-3 form-group">
            <label><?= $trad_com_slider['SLIDER'][$_SESSION['user']->getLangue()]; ?></label>
            <select name="slider" class="form-control chosen-select">
                <option value="0"></option>
                <?php
                $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slider";
                $result = $db->queryS($SQLselect);
                foreach ($result as $data) {
                    $ss = new slider($data['id'], $db);
                    ?>
                    <option value="<?php echo $ss->getId(); ?>" <?php if (isset($_GET['id']) && $_GET['id'] == $ss->getId()) echo "selected"; ?>><?= $ss->getTitre() ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="col-md-3 form-group">
            <label><?= $trad_com_slider['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input type="text" name="titre"
                                             value="<?php if (isset($s)) echo $s->getTitre(); ?>" class="form-control"/>
            </div>
        </div>

        <div class="col-md-2 form-group">
            <label><?= $trad_com_slider['ORDRE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input type="number" name="ordre"
                                             value="<?php if (isset($s)) echo $s->getOrdre(); ?>" class="form-control"/>
            </div>
        </div>

        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_slider['URL'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input type="text" name="url" value="<?php if (isset($s)) echo $s->getURL(); ?>"
                                             class="form-control"/></div>
        </div>

        <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="actif"
                           value="1" <?php if (isset($s) && $s->isActif()) echo "checked"; ?> /> <?= $trad_com_slider['ACTIVE'][$_SESSION['user']->getLangue()]; ?>
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 form-group has-iconed">
            <label><?= $trad_com_slider['DESCRIPTION'][$_SESSION['user']->getLangue()]; ?></label>
            <textarea name="description"
                      class="form-control"><?php if (isset($s)) echo $s->getDescription(); ?></textarea>
        </div>


        <div class="col-md-3 form-group">
            <label><?= $trad_com_slider['PHOTO'][$_SESSION['user']->getLangue()]; ?> 1500 x 568</label>
            <div class="iconed-input"><input type="file" name="photo[]" class=""/></div>
        </div>

        <?php
        if (isset($s) && $s->getPhoto() != '') {
            ?>
            <div class="col-md-3">
                <img src="../images/slides/<?php echo $s->getPhoto(); ?>" alt="" height="60"/>
            </div>
            <?php
        }
        ?>

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
                $("#sliderForm .loading").fadeIn();
            },
            success: function (theResponse) {
                $("#sliderForm .loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                // messages
                if ($("#sliderForm .submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_slider['SUCCES_MODIF_SLIDE'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_slider['ERREUR_MODIF_SLIDE'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_slider['SUCCES_ADD_SLIDE'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_slider['ERREUR_ADD_SLIDE'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) == 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_slider&task=slides&id=<?php echo $slider->getId(); ?>";
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