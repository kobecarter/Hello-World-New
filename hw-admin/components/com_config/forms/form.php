<?php
$action = "components/com_config/controleur/config.php?task=updateConfig";
$bt = $trad_com_config['M_A_J'][$_SESSION['user']->getLangue()];
?>
<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm" id="configForm">
    <div class="row">
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['NOM'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="nom" type="text" value="<?php echo $c->getNom() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="titre" type="text" value="<?php echo $c->getTitre() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-6 form-group has-iconed">
            <label><?= $trad_com_config['DESCRIPTION'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="description" type="text" value="<?php echo $c->getDescription() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['E_MAIL'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="email" type="text" value="<?php echo $c->getEmail() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['TEL'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="tel" type="text" value="<?php echo $c->getTel() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_config['TEL'][$_SESSION['user']->getLangue()]; ?> 2</label>
            <input name="tel2" type="text" value="<?php echo $c->getTel2() ?>" class="form-control"/>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['FAX'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="fax" type="text" value="<?php echo $c->getFax() ?>"
                                             class="form-control"/></div>
        </div>
        <?php
        ?>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_config['SLIDER'][$_SESSION['user']->getLangue()]; ?></label>
            <select name="slider" class="form-control chosen-select">
                <option value=""><?= $trad_com_config['PAR_DEFAUT'][$_SESSION['user']->getLangue()]; ?></option>
                <?php
                if (module::exists("com_slider")) {
                    $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slider WHERE actif = 1";
                    $result = $db->queryS($SQLselect);
                    foreach ($result as $data) {
                        $s = new slider($data['id'], $db);
                        $sl = isset($c) && $c->getIdSlider() == $s->getId() ? "selected" : "";
                        ?>
                        <option value="<?= $s->getId() ?>" <?php echo $sl; ?>><?= $s->getTitre() ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['X'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="x" type="text" value="<?php echo $c->getX() ?>"
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['Y'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="y" type="text" value="<?php echo $c->getY() ?>"
                                             class="form-control"/></div>
        </div>

        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_config['LOGO'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input type="file" name="logo[]" class=""/></div>
        </div>
        <?php
        if (isset($c) && $c->getLogo() != '') {
            ?>
            <div class="col-md-2" id="logo">
                <a href="#0" class="btn btn-danger btn-xs deleteLogo"
                   style="position:absolute; top:-5px; right:-5px;"><i class="fa fa-times"></i></a>
                <img src="../images/config/<?php echo $c->getLogo(); ?>" alt="" height="60"
                     style="border:#FFF solid 3px; box-shadow:#CCC 0 0 3px; border-radius:3px; margin-left:10px;"/>
            </div>
            <?php
        }
        ?>

        <div class="col-md-6 form-group has-iconed">
            <label><?= $trad_com_config['ADRESSE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="adresse" type="text" value="<?php echo $c->getAdresse() ?>"
                                             class="form-control"/></div>
        </div>
        <?php
        $social = array("facebook", "twitter", "gplus", "youtube", "instagram", "pinterest", "linkedin", "skype", "tumblr", "viadeo");
        foreach ($social as $item) {
            $s = ucfirst($item);
            $get = "get" . $s;
            $v = $c->$get();
            ?>
            <div class="col-md-3 form-group has-iconed">
                <label>URL <?= $item; ?></label>
                <div class="iconed-input">
                    <input name="<?= $item; ?>" type="text" value="<?= $v; ?>"
                                                 class="form-control"/>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_config['ANALYTIC'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="analytic" type="text" value="<?php echo $c->getAnalytic() ?>"
                                             class="form-control"/></div>
        </div>
    </div>
    <input type="reset" class="btn btn-default" value="<?= $trad_com_config['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
    <input type="submit" value="<?php echo $bt ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>
</form>
<script>
    $(function () {
        var succes = "<?= $trad_com_config['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_config['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#configForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                // messages
                var msgsucces = "<?= $trad_com_config['SUCCES_MODIF'][$_SESSION['user']->getLangue()];?>";
                var msgfaild = "<?= $trad_com_config['ERREUR_MODIF'][$_SESSION['user']->getLangue()];?>";

                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + msgsucces + '</div>').slideDown();
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + msgfaild + '</div>').slideDown();
                }
            }
        });

        $(".deleteLogo").click(function (event) {
            event.preventDefault();
            if (confirm("<?= $trad_com_config['QST_DEL_LOGO'][$_SESSION['user']->getLangue()];?>")) {
                var order = '';
                $.post("components/com_config/controleur/config.php?task=deleteLogo", order, function (theResponse) {
                    if (parseInt(theResponse) === 1) {
                        $("#logo").remove();
                    }
                    else {
                        var error = "<?= $trad_com_config['ERREUR'][$_SESSION['user']->getLangue()];?>";
                        var msgfaild = "<?= $trad_com_config['ERREUR_DEL_LOGO'][$_SESSION['user']->getLangue()];?>";
                        $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + msgfaild + '</div>').slideDown();
                    }
                });
            }
        });

    });
</script>