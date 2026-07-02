<?php
if (isset($m)) {
    $action = "components/com_menu/controleur/menu.php?task=editMenu";
    $task = "edit";
    $bt = $trad_com_menu['MODIFIER_MENU'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_menu/controleur/menu.php?task=addMenu";
    $task = "add";
    $bt = $trad_com_menu['AJOUTER_MENU'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm" id="menuForm">
    <div class="row">
        <div class="col-md-6 form-group">
            <label><?= $trad_com_menu['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
            <input name="titre" type="text" value="<?php if (isset($m)) echo $m->getTitre() ?>" required
                   class="form-control"/>
        </div>
    </div>
    <?php if (isset($m)) { ?>
        <input type="hidden" name="id" value="<?= $m->getId(); ?>"/>
    <?php } ?>

    <input type="reset" class="btn btn-default"
           value="<?= $trad_com_menu['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
    <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>
</form>
<script>
    $(function () {
        var succes = "<?= $trad_com_menu['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_menu['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#menuForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({scrollTop: 0}, "slow");
                // messages
                if ($(".submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_MODIF'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_MODIF'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_ADD'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_ADD'][$_SESSION['user']->getLangue()];?>";
                }

                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_menu";
                    }, 1500)
                } else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    })
</script>