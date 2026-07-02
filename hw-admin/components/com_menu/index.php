<?php
include_once "components/com_menu/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_menu')) { ?>
            <li>
                <a href="index.php?option=com_menu&task=add"> <?= $trad_com_menu['AJOUTER_MENU'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_menu')) { ?>
            <li>
                <a href="index.php?option=com_menu"> <?= $trad_com_menu['LISTE_MENU'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
    </ul>
</div>
</div>
<div class="main-content">
    <?php
    @$task = $_GET['task'];
    switch ($task) {
        case 'edit' :
            if ($_SESSION['user']->hasDroit('edit', 'com_menu')) {
                edit();
                break;
            }
        case 'add' :
            if ($_SESSION['user']->hasDroit('add', 'com_menu')) {
                add();
                break;
            }
        case 'items' :
            if ($_SESSION['user']->hasDroit('add', 'com_menu')) {
                items();
                break;
            }
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_menu')) {
                showList();
            } // Charge la liste des produits
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_menu;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_menu['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_menu['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_menu['SUCCES_DEL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_DEL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_menu['QST_DEL'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_menu/controleur/menu.php?task=deleteMenu", order, function (theResponse) {
                            if (parseInt(theResponse) == 1) {
                                $("#row_" + id).addClass("danger");
                                setTimeout(function () {
                                    $("#row_" + id).remove()
                                }, 300);
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                            else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                        });
                    }
                })
            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_menu['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
            <li class="active"><?= $trad_com_menu['com_menu'][$_SESSION['user']->getLangue()];?></li>
        </ol>
        <div class="widget widget-orange">
            <div class="widget-title">
                <div class="widget-controls"><a href="#" class="widget-control widget-control-refresh"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-refresh"></i></a> <a
                            href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                            data-placement="top" title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_menu['LISTE_MENU'][$_SESSION['user']->getLangue()];?></h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_menu['ID'][$_SESSION['user']->getLangue()];?></th>
                            <th><?= $trad_com_menu['NOM'][$_SESSION['user']->getLangue()];?></th>
                            <th><?= $trad_com_menu['ACTION'][$_SESSION['user']->getLangue()];?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $m = new menu($data['id'], $db);

                            ?>
                            <tr id="row_<?php echo $m->getId(); ?>">
                                <td><?php echo $m->getId(); ?></td>
                                <td><?php echo $m->getTitre(); ?></td>
                                <td class="text-center">
                                    <?php if ($_SESSION['user']->hasDroit('edit', 'com_menu')) { ?>
                                        <a href="index.php?option=com_menu&task=items&id=<?php echo $m->getId(); ?>"
                                           data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_menu['GERER_ELEMETS'][$_SESSION['user']->getLangue()];?>" class="btn btn-default btn-xs"><i
                                                    class="icon-reorder"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('edit', 'com_menu')) { ?>
                                        <a href="index.php?option=com_menu&task=edit&id=<?php echo $m->getId(); ?>"
                                           data-toggle="tooltip" data-placement="top" data-original-title="<?= $trad_com_menu['MODIFIER'][$_SESSION['user']->getLangue()];?>"
                                           class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_menu')) { ?>
                                        <a href="#0" id="delete_<?php echo $m->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top" data-original-title="<?= $trad_com_menu['SUPPRIMER'][$_SESSION['user']->getLangue()];?>"
                                           class="btn btn-danger btn-xs delete"><i class="icon-remove"></i></a>
                                    <?php } ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }

    /* ---------------------------- edit ---------------------------- */
    function edit()
    {
        global $db, $trad_com_menu;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $m = new menu($id, $db);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_menu['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
                <li><a href="index.php?option=com_menu"><?= $trad_com_menu['com_menu'][$_SESSION['user']->getLangue()];?></a></li>
                <li class="active"><?= $trad_com_menu['MODIFIER_MENU'][$_SESSION['user']->getLangue()];?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div>
                    <!-- conteneur de message -->
                    <div class="widget widget-red">
                        <div class="widget-title">
                            <div class="widget-controls"><a href="#" class="widget-control widget-control-refresh"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-refresh"></i></a> <a href="#"
                                                                             class="widget-control widget-control-minimize"
                                                                             data-toggle="tooltip" data-placement="top"
                                                                             title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-minus-sign"></i></a></div>
                            <h3><i class="icon-edit-sign"></i> <?= $trad_com_menu['MODIFIER_MENU'][$_SESSION['user']->getLangue()];?></h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_menu/forms/form.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    /* ---------------------------- add ---------------------------- */
    function add()
    {
        global $db, $trad_com_menu;
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_menu['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
            <li><a href="index.php?option=com_menu">G<?= $trad_com_menu['com_menu'][$_SESSION['user']->getLangue()];?></a></li>
            <li class="active"><?= $trad_com_menu['AJOUTER_MENU'][$_SESSION['user']->getLangue()];?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div>
                <!-- conteneur de message -->
                <div class="widget widget-red">
                    <div class="widget-title">
                        <div class="widget-controls"><a href="#" class="widget-control widget-control-refresh"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                        class="icon-minus-sign"></i></a></div>
                        <h3><i class="icon-plus-sign-alt"></i> <?= $trad_com_menu['AJOUTER_MENU'][$_SESSION['user']->getLangue()];?></h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_menu/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* ---------------------------- items ---------------------------- */
    function items()
    {
        global $db, $trad_com_menu;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $m = new menu($id, $db);
            ?>
            <script type="text/javascript">
                $(function () {
                    var succes = "<?= $trad_com_menu['SUCCES'][$_SESSION['user']->getLangue()];?>";
                    var error = "<?= $trad_com_menu['ERREUR'][$_SESSION['user']->getLangue()];?>";

                    $(".delete").click(function (event) {
                        event.preventDefault();
                        var succes_msg = "<?= $trad_com_menu['SUCCES_DEL_ITEM'][$_SESSION['user']->getLangue()];?>";
                        var error_msg = "<?= $trad_com_menu['ERREUR_DEL_ITEM'][$_SESSION['user']->getLangue()];?>";
                        if (confirm("<?= $trad_com_menu['QST_DEL_ITEM'][$_SESSION['user']->getLangue()];?>")) {
                            var t = $(this).attr("id").split("_");
                            var id = t[1];
                            var order = 'id=' + id;
                            $.post("components/com_menu/controleur/menu.php?task=deleteMenuItem", order, function (theResponse) {
                                if (parseInt(theResponse) == 1) {
                                    $("#row_" + id).addClass("danger");
                                    setTimeout(function () {
                                        $("#row_" + id).remove()
                                    }, 300);
                                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                                    $('.msgbox').slideDown();
                                }
                                else {
                                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                                    $('.msgbox').slideDown();
                                }
                            });
                        }
                    })
                });
            </script>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_menu['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
                <li><a href="index.php?option=com_menu"><?= $trad_com_menu['com_menu'][$_SESSION['user']->getLangue()];?></a></li>
                <li class="active"><?= $trad_com_menu['ELEMENTS_MENU'][$_SESSION['user']->getLangue()];?> : <?php echo $m->getTitre(); ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <?php include("components/com_menu/forms/item.php"); ?>
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls"><a href="#" class="widget-control widget-control-refresh"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-refresh"></i></a> <a href="#"
                                                                             class="widget-control widget-control-minimize"
                                                                             data-toggle="tooltip" data-placement="top"
                                                                             title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-minus-sign"></i></a></div>
                            <h3><i class="icon-edit-sign"></i><?= $trad_com_menu['ELEMENTS_MENU'][$_SESSION['user']->getLangue()];?> - <?php echo $m->getTitre(); ?></h3>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                    <tr>
                                        <th><?= $trad_com_menu['ID'][$_SESSION['user']->getLangue()];?></th>
                                        <th><?= $trad_com_menu['TITRE'][$_SESSION['user']->getLangue()];?></th>
                                        <th><?= $trad_com_menu['TYPE'][$_SESSION['user']->getLangue()];?></th>
                                        <th><?= $trad_com_menu['ORDRE'][$_SESSION['user']->getLangue()];?></th>
                                        <th><?= $trad_com_menu['ACTION'][$_SESSION['user']->getLangue()];?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = 0 AND id_menu = " . $m->getId();
                                    $result = $db->queryS($SQLselect);
                                    foreach ($result as $data) {
                                        $i = new menu_item($data["id"], $db, $_SESSION['langue']);
                                        if ($i->getTitre() == '') $i = new menu_item($data['id'], $db); // afficher le titre FR si la langue n'est pas rempli
                                        ?>
                                        <tr id="row_<?php echo $i->getId(); ?>">
                                            <td><?php echo $i->getId(); ?></td>
                                            <td><?php echo $i->getTitre(); ?></td>
                                            <td><?php echo $i->getType(); ?></td>
                                            <td><?php echo $i->getOrdre(); ?></td>
                                            <td class="text-center"><?php if ($_SESSION['user']->hasDroit('edit', 'com_menu')) { ?>
                                                    <a href="index.php?option=com_menu&task=items&id=<?php echo $m->getId(); ?>&id_item=<?php echo $i->getId(); ?>"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?= $trad_com_menu['MODIFIER'][$_SESSION['user']->getLangue()];?>" class="btn btn-warning btn-xs"><i
                                                                class="icon-pencil"></i></a>
                                                <?php } ?>
                                                <?php if ($_SESSION['user']->hasDroit('delete', 'com_menu')) { ?>
                                                    <a href="#0" id="delete_<?php echo $i->getId(); ?>"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="<?= $trad_com_menu['SUPPRIMER'][$_SESSION['user']->getLangue()];?>"
                                                       class="btn btn-danger btn-xs delete"><i class="icon-remove"></i></a>
                                                <?php } ?></td>
                                        </tr>
                                        <?php
                                        // les elements niveau 2 (sous menu)
                                        $SQLselect2 = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $i->getId() . " AND id_menu = " . $m->getId();
                                        $result2 = $db->queryS($SQLselect2);
                                        foreach ($result2 as $data2) {
                                            $i = new menu_item($data2["id"], $db, $_SESSION['langue']);
                                        	if ($i->getTitre() == '') $i = new menu_item($data2['id'], $db); // afficher le titre FR si la langue n'est pas rempli                                            ?>
                                            <tr id="row_<?php echo $i->getId(); ?>">
                                                <td><?php echo $i->getId(); ?></td>
                                                <td>___ <?php echo $i->getTitre(); ?></td>
                                                <td><?php echo $i->getType(); ?></td>
                                                <td><?php echo $i->getOrdre(); ?></td>
                                                <td class="text-center"><?php if ($_SESSION['user']->hasDroit('edit', 'com_menu')) { ?>
                                                        <a href="index.php?option=com_menu&task=items&id=<?php echo $m->getId(); ?>&id_item=<?php echo $i->getId(); ?>"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="<?= $trad_com_menu['MODIFIER'][$_SESSION['user']->getLangue()];?>"
                                                           class="btn btn-warning btn-xs"><i
                                                                    class="icon-pencil"></i></a>
                                                    <?php } ?>
                                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_menu')) { ?>
                                                        <a href="#0" id="delete_<?php echo $i->getId(); ?>"
                                                           data-toggle="tooltip" data-placement="top"
                                                           data-original-title="<?= $trad_com_menu['SUPPRIMER'][$_SESSION['user']->getLangue()];?>"
                                                           class="btn btn-danger btn-xs delete"><i
                                                                    class="icon-remove"></i></a>
                                                    <?php } ?></td>
                                            </tr>
                                            <?php

                                            // les elements niveau 3 (sous menu)
                                            $SQLselect3 = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $i->getId() . " AND id_menu = " . $m->getId();
                                            $result3 = $db->queryS($SQLselect3);
                                            foreach ($result3 as $data3) {
                                                $i = new menu_item($data3["id"], $db, $_SESSION['langue']);
												if ($i->getTitre() == '') $i = new menu_item($data3['id'], $db); // afficher le titre FR si la langue n'est pas rempli 
                                                ?>
                                                <tr id="row_<?php echo $i->getId(); ?>">
                                                    <td><?php echo $i->getId(); ?></td>
                                                    <td>___ ___ <?php echo $i->getTitre(); ?></td>
                                                    <td><?php echo $i->getType(); ?></td>
                                                    <td><?php echo $i->getOrdre(); ?></td>
                                                    <td class="text-center"><?php if ($_SESSION['user']->hasDroit('edit', 'com_menu')) { ?>
                                                            <a href="index.php?option=com_menu&task=items&id=<?php echo $m->getId(); ?>&id_item=<?php echo $i->getId(); ?>"
                                                               data-toggle="tooltip" data-placement="top"
                                                               data-original-title="<?= $trad_com_menu['MODIFIER'][$_SESSION['user']->getLangue()];?>"
                                                               class="btn btn-warning btn-xs"><i
                                                                        class="icon-pencil"></i></a>
                                                        <?php } ?>
                                                        <?php if ($_SESSION['user']->hasDroit('delete', 'com_menu')) { ?>
                                                            <a href="#0" id="delete_<?php echo $i->getId(); ?>"
                                                               data-toggle="tooltip" data-placement="top"
                                                               data-original-title="<?= $trad_com_menu['SUPPRIMER'][$_SESSION['user']->getLangue()];?>"
                                                               class="btn btn-danger btn-xs delete"><i
                                                                        class="icon-remove"></i></a>
                                                        <?php } ?></td>
                                                </tr>
                                                <?php
                                            }

                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    ?>
</div>