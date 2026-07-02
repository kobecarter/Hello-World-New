<?php
if (isset($_GET['id_item']) && !empty($_GET['id_item'])) $i = new menu_item(intval($_GET['id_item']), $db, $_SESSION['langue']);

if (isset($i)) {
    $action = "components/com_menu/controleur/menu.php?task=editMenuItem";
    $task = "edit";
    $bt = $trad_com_menu['MODIFIER_ELEMENT'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_menu/controleur/menu.php?task=addMenuItem";
    $task = "add";
    $bt = $trad_com_menu['AJOUTER_ELEMENT'][$_SESSION['user']->getLangue()];
}
?>
<div class="widget widget-green">
    <div class="widget-title">
        <div class="widget-controls">
            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
               title="" data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-refresh"></i></a>
            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top"
               title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-minus-sign"></i></a>
        </div>
        <h3><i class="icon-plus-sign"></i><?php echo $bt; ?></h3>
    </div>
    <div class="widget-content">
        <div class="msgbox"></div> <!-- conteneur de message -->

        <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm"
              id="menuForm">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label><?= $trad_com_menu['ELEMENT_PARENT'][$_SESSION['user']->getLangue()]; ?></label>
                    <select name="item_parent" class="form-control chosen-select">
                        <option value="0">- <?= $trad_com_menu['SELECTIONNER_ITEM'][$_SESSION['user']->getLangue()]; ?> -</option>
                        <?php
                        isset($i) ? $claus = " AND id<>" . $i->getId() : $claus = "";
                        $SQLselect = "SELECT * FROM " . __prefixe_db__ . "menu_items WHERE parent_id = 0 AND id_menu = " . $m->getId() . " $claus";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $mi = new menu_item($data['id'], $db, $_SESSION['langue']);
                            ?>
                            <option value="<?= $mi->getId() ?>" <?php if (isset($i) && $i->getItemParent() == $mi->getId()) echo "selected"; ?>><?= $mi->getTitre() ?></option>
                            <?php
                            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $mi->getId() . " AND id_menu = " . $m->getId() . " $claus";
                            $result = $db->queryS($SQLselect);
                            foreach ($result as $data) {
                                $mi = new menu_item($data['id'], $db, $_SESSION['langue']);
                                ?>
                                <option value="<?= $mi->getId() ?>" <?php if (isset($i) && $i->getItemParent() == $mi->getId()) echo "selected"; ?>><?php echo '___' . $mi->getTitre() ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label><?= $trad_com_menu['TYPE'][$_SESSION['user']->getLangue()]; ?></label>
                    <select name="type" class="form-control chosen-select">

                        <?php
                        $ids_modules = module::findAllUrl();
                        foreach ($ids_modules as $id_module) {
                            $module = new module($id_module, $db);
                            ?>
                            <option value="<?= $module->getClasse(); ?>" <?php if (isset($i) && $i->getType() == $module->getClasse() . '') echo "selected"; ?>><?php echo ucfirst($module->getClasse()); ?></option>
                            <?php
                        }
                        ?>

                        <option value="ext" <?php if (isset($i) && $i->getType() == 'ext') echo "selected"; ?>>
                            <?= $trad_com_menu['LIEN_EXTERNE'][$_SESSION['user']->getLangue()]; ?>
                        </option>
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label><?= $trad_com_menu['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="titre" type="text" value="<?php if (isset($i)) echo $i->getTitre() ?>" required
                           class="form-control"/>
                </div>

                <div class="col-md-1 form-group">
                    <label><?= $trad_com_menu['ORDRE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="ordre" type="number" value="<?php if (isset($i)) echo $i->getOrdre() ?>"
                           class="form-control"/>
                </div>

                <div class="col-md-2 form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="blank"
                                   value="1" <?php if (isset($i) && $i->isBlank()) echo "checked"; ?> />
                            <?= $trad_com_menu['NOUVELLE_FENETRE'][$_SESSION['user']->getLangue()]; ?>
                        </label>
                    </div>
                </div>


                <?php
                $ids_modules = module::findAllUrl();
                foreach ($ids_modules as $id_module) {
                    $module = new module($id_module, $db);
                    ?>
                    <div class="col-md-3 form-group">
                        <label><?php echo ucfirst($module->getClasse()); ?></label>
                        <select name="<?= $module->getClasse(); ?>" class="form-control chosen-select">
                            <option value="0">- <?= $trad_com_menu['SELECTIONNER'][$_SESSION['user']->getLangue()]; ?> <?= $module->getClasse(); ?> -</option>
                            <?php
                            if($module->getIdModule() == "com_page") {
                                $SQLselect = "SELECT * FROM " . __prefixe_db__ . $module->getNomTable() . " WHERE actif = 1";
                            } else {
                                $SQLselect = "SELECT * FROM " . __prefixe_db__ . $module->getNomTable() . " WHERE active = 1";
                            }
                            $result = $db->queryS($SQLselect);
                            foreach ($result as $data) {
                                $class = $module->getClasse();
                                if(method_exists($class, "find")) {
                                    $obj = $class::find($data['id'], $_SESSION["langue"]);
                                } else {
                                    $obj = new $class($data['id'], $db, $_SESSION["langue"]);
                                }
                                if(method_exists($class, "getTitre")) {
                                    $objTitre = $obj->getTitre();
                                } else if (method_exists($class, "getNom")) {
                                    $objTitre = $obj->getNom();
                                }
                                $sl = (isset($i) && $i->getType() == $module->getClasse() . '' && $i->getIdItem() == $obj->getId()) ? "selected" : "";
                                ?>
                                <option value="<?php echo $obj->getId() ?>" <?php echo $sl; ?>><?php echo $objTitre; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php

                }
                ?>

                <div class="col-md-3 form-group">
                    <label><?= $trad_com_menu['LIEN_EXTERNE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="lien_ext" type="text" value="<?php if (isset($i)) echo $i->getLien() ?>"
                           class="form-control"/>
                </div>

            </div>
            <input type="hidden" name="id_menu" value="<?= $m->getId() ?>"/>

            <?php if (isset($i)) { ?>
                <input type="hidden" name="id" value="<?= $i->getId() ?>"/>
            <?php } ?>

            <input type="reset" class="btn btn-default" value="<?= $trad_com_menu['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
            <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
            <span class="loading"><img src="../images/loading.gif" /></span>
        </form>
    </div>
</div>

<script>
    $(function () {
        var succes = "<?= $trad_com_menu['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_menu['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#menuForm').ajaxForm({
            beforeSubmit: function () {
                $("#menuForm .loading").fadeIn();
            },
            success: function (theResponse) {
                $("#menuForm .loading").fadeOut();
                $("html, body").animate({scrollTop: 0}, "slow");
                // messages
                if ($("#menuForm .submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_MODIF_ITEM'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_MODIF_ITEM'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_ADD_ITEM'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_ADD_ITEM'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) == 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_menu&task=items&id=<?php echo $m->getId()?>";
                    }, 3000)
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    });
</script>