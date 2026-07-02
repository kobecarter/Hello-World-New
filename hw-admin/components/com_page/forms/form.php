<?php
include("includes/traduction.php");
if (isset($p)) {
    $pction = "components/com_page/controleur/page.php?task=editPage";
    $task = "edit";
    $bt = $trad_com_page['MODIFIER_PAGE'][$_SESSION['user']->getLangue()];
} else {
    $pction = "components/com_page/controleur/page.php?task=addPage";
    $task = "add";
    $bt = $trad_com_page['AJOUTER_PAGE'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $pction ?>" enctype="multipart/form-data" class="validateForm" id="pageForm">
    <div class="row">
        <fieldset>
            <legend><?= $trad_com_page['TAGS_SEO'][$_SESSION['user']->getLangue()];?></legend>
            <div class="col-md-6 form-group">
                <label><?= $trad_com_page['TITRE_SEO'][$_SESSION['user']->getLangue()];?></label>
                <div class="iconed-input"><input type="text" name="seo_titre"
                                                 value="<?php if (isset($p)) echo stripslashes($p->getSeoTitre()); ?>"
                                                 class="form-control"/></div>
            </div>

            <div class="col-md-6 form-group">
                <label><?= $trad_com_page['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()];?></label>
                <div class="iconed-input"><input type="text" name="seo_description"
                                                 value="<?php if (isset($p)) echo stripslashes($p->getSeoDescription()); ?>"
                                                 class="form-control"/></div>
            </div>
        </fieldset>

        <fieldset>
            <legend><?= $trad_com_page['DETAILS_PAGE'][$_SESSION['user']->getLangue()];?></legend>

            <div class="col-md-3 form-group">
                <label><?= $trad_com_page['TITRE'][$_SESSION['user']->getLangue()];?></label>
                <div class="iconed-input"><input type="text" name="titre"
                                                 value="<?php if (isset($p)) echo stripslashes($p->getTitre()); ?>"
                                                 required class="form-control"/></div>
            </div>
            <div class="col-md-3 form-group">
                <label><?= $trad_com_page['URL'][$_SESSION['user']->getLangue()];?></label>
                <input type="text" name="url" value="<?php if (isset($p)) echo stripslashes($p->getURL()); ?>"
                       class="form-control"/>
            </div>

            <div class="col-md-3 form-group has-iconed">
                <label><?= $trad_com_page['TYPE'][$_SESSION['user']->getLangue()];?></label>
                <select name="type" class="form-control chosen-select">
                    <option value="page" <?php if (isset($p) && $p->getType() == 'page') echo "selected"; ?>>
                        <?= $trad_com_page['PAGE_CONTENU'][$_SESSION['user']->getLangue()];?>
                    </option>
                    <option value="lien" <?php if (isset($p) && $p->getType() == 'lien') echo "selected"; ?>>
                        <?= $trad_com_page['LIEN_EXTERNE'][$_SESSION['user']->getLangue()];?>
                    </option>
                </select>
            </div>

            <div class="col-md-3 form-group has-iconed">
                <label><?= $trad_com_page['LIEN_EXTERNE'][$_SESSION['user']->getLangue()];?></label>
                <div class="iconed-input"><input type="text" name="externe"
                                                 value="<?php if (isset($p)) echo $p->getExterne(); ?>"
                                                 class="form-control"/></div>
            </div>

            <div class="col-md-3 form-group">
                <label><?= $trad_com_page['SLIDER'][$_SESSION['user']->getLangue()];?></label>
                <select name="slider" class="form-control chosen-select">
                    <option value=""><?= $trad_com_page['PAR_DEFAUT'][$_SESSION['user']->getLangue()];?></option>
                    <?php
                    if(module::exists("com_slider")) {
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slider WHERE actif = 1";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $s = new slider($data['id'], $db);
                            $sl = isset($p) && $p->getIdSlider() == $s->getId() ? "selected" : "";
                            ?>
                            <option value="<?= $s->getId() ?>" <?php echo $sl; ?>><?= $s->getTitre() ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label><?= $trad_com_page['PHOTO'][$_SESSION['user']->getLangue()];?></label>
                <div class="iconed-input"><input type="file" name="photo[]" class=""/></div>
            </div>
            <?php
            if (isset($p) && $p->getPhoto() != '') {
                ?>
                <div class="col-md-2" id="pic_<?php echo $p->getId(); ?>">
                    <a href="#0" id="delphoto_<?php echo $p->getId(); ?>" class="btn btn-danger btn-xs delPhoto" style="position:absolute; top:-5px; right:-5px;"><i class="fa fa-times"></i></a>
                    <img src="../images/pages/<?php echo $p->getPhoto(); ?>" alt="" height="60"
                         style="border:#FFF solid 3px; box-shadow:#CCC 0 0 3px; border-radius:3px; margin-left:10px;"/>
                </div>
                <?php
            }
            ?>

            <div style="float:right;" class="col-md-5 form-group">
                <label><?= $trad_com_page['EXTRAIT'][$_SESSION['user']->getLangue()];?></label>
                <textarea class="form-control" id="extrait"
                          name="extrait"><?php if (isset($p)) echo $p->getExtrait(); ?></textarea>
            </div>

            <div class="col-md-1 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="actif"
                               value="1" <?php if (isset($p) && $p->isActif()) echo "checked"; ?> />
                        <?= $trad_com_page['ACTIVE'][$_SESSION['user']->getLangue()];?>
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label><?= $trad_com_page['TEXTE'][$_SESSION['user']->getLangue()];?></label>
                <textarea name="texte" id="texte"><?php if (isset($p)) echo $p->getTexte(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('texte', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>
        </fieldset>


    </div>
    <?php if (isset($p)) { ?>
        <input type="hidden" name="id" value="<?= $p->getId() ?>"/>
    <?php } ?>

    <input type="reset" class="btn btn-default" value="<?= $trad_com_page['ANNULER'][$_SESSION['user']->getLangue()];?>"/>
    <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>
</form>
<script>
    $(function () {
        var succes = "<?= $trad_com_page['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_page['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#pageForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                // messages
                if ($(".submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_page['SUCCES_MODIF'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_page['ERREUR_MODIF'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_page['SUCCES_ADD'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_page['ERREUR_ADD'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_page";
                    }, 1500)
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });

        $(".delPhoto").click(function(event){
            event.preventDefault();
            var error_msg = "<?= $trad_com_page['ERREUR_DEL_PIC'][$_SESSION['user']->getLangue()];?>";
            if(confirm("<?= $trad_com_page['QST_DEL_PIC'][$_SESSION['user']->getLangue()];?>")){
                var t = $(this).attr("id").split("_");
                var id = t[1];
                var order = 'id='+id;
                $.post("components/com_page/controleur/page.php?task=deletePhotoPage", order, function(theResponse){
                    if(parseInt(theResponse) == 1){
                        $("#pic_"+id).remove();
                    }
                    else{
                        $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                        $('.msgbox').slideDown();
                    }
                });
            }
        });

    });
</script>