<?php
include_once "components/com_menu/traduction.php";

/* Compact at-a-glance summary of the méga menu-specific fields for the
   items() list view, so an admin can tell manual vs. automatic content
   apart without opening every row. */
function menuItemInfoBadges($item)
{
    $parts = array();
    if ($item->getPanelKey()) {
        $parts[] = '<span class="label label-default">' . htmlspecialchars($item->getPanelKey(), ENT_QUOTES, 'UTF-8') . '</span>';
    }
    if ($item->getAutoList()) {
        $limit = $item->getAutoLimit();
        $parts[] = '<span class="label label-info">auto: ' . htmlspecialchars($item->getAutoList(), ENT_QUOTES, 'UTF-8') . ($limit ? ' (max ' . $limit . ')' : '') . '</span>';
    }
    if ($item->getShowPacks()) {
        $parts[] = '<span class="label label-primary">packs</span>';
    }
    if (!$item->isActive()) {
        $parts[] = '<span class="label label-danger">inactif</span>';
    }
    return implode(' ', $parts);
}

/* Edit/delete buttons for a real menu_items row inside the drag-and-drop
   tree -- not used for auto-expanded rows (agents/services), which belong
   to their own admin modules. */
function menuItemActionButtons($item, $menuId)
{
    global $trad_com_menu;
    $lang = $_SESSION['user']->getLangue();
    $buttons = '';
    if ($_SESSION['user']->hasDroit('edit', 'com_menu')) {
        $buttons .= '<a href="index.php?option=com_menu&task=items&id=' . $menuId . '&id_item=' . $item->getId() . '"
            data-toggle="tooltip" data-placement="top" data-original-title="' . $trad_com_menu['MODIFIER'][$lang] . '"
            class="btn btn-warning btn-xs mm-action"><i class="icon-pencil"></i></a>';
    }
    if ($_SESSION['user']->hasDroit('delete', 'com_menu')) {
        $buttons .= '<a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="' . $trad_com_menu['SUPPRIMER'][$lang] . '"
            class="btn btn-danger btn-xs mm-action mm-delete"><i class="icon-remove"></i></a>';
    }
    if ($buttons === '') {
        return '';
    }
    return '<span class="mm-spacer"></span><span class="mm-actions">' . $buttons . '</span>';
}
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
            <style>
                .mm-sortable{list-style:none;margin:0;padding:0;}
                .mm-sortable .mm-sortable{margin-top:8px;margin-left:26px;}
                .mm-item{background:#fff;border:1px solid #e2e2e2;border-radius:4px;margin-bottom:6px;padding:8px 10px;}
                .mm-lvl1-item{border-left:3px solid #3598dc;}
                .mm-lvl2-item{border-left:3px solid #32c5d2;}
                .mm-lvl3-item{border-left:3px solid #a2a2a2;}
                .mm-lvl3-auto-item{border-left:3px solid #f39c12;}
                .mm-auto-limit-marker{list-style:none;text-align:center;font-size:.72rem;color:#e67e22;padding:4px 0;margin-bottom:6px;border-top:1px dashed #f39c12;border-bottom:1px dashed #f39c12;}
                .mm-item-row{display:flex;align-items:center;gap:8px;}
                .mm-handle{cursor:move;color:#999;flex:0 0 auto;}
                .mm-handle:hover{color:#333;}
                .mm-title{font-weight:600;flex:0 0 auto;}
                .mm-placeholder{border:2px dashed #3598dc;background:#eaf4fb;border-radius:4px;margin-bottom:6px;height:38px;}
                .mm-spacer{flex:1 1 auto;}
                .mm-actions{flex:0 0 auto;display:flex;gap:4px;}
            </style>
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

                    $(".mm-delete").click(function (event) {
                        event.preventDefault();
                        var succes_msg = "<?= $trad_com_menu['SUCCES_DEL_ITEM'][$_SESSION['user']->getLangue()];?>";
                        var error_msg = "<?= $trad_com_menu['ERREUR_DEL_ITEM'][$_SESSION['user']->getLangue()];?>";
                        if (confirm("<?= $trad_com_menu['QST_DEL_ITEM'][$_SESSION['user']->getLangue()];?>")) {
                            var $li = $(this).closest('.mm-item');
                            var id = $li.data('id');
                            $.post("components/com_menu/controleur/menu.php?task=deleteMenuItem", {id: id}, function (theResponse) {
                                if (parseInt(theResponse) == 1) {
                                    $li.addClass("danger");
                                    setTimeout(function () { $li.remove(); }, 300);
                                    $("#row_" + id).remove();
                                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                                    $('.msgbox').slideDown();
                                } else {
                                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                                    $('.msgbox').slideDown();
                                }
                            });
                        }
                    })

                    var ordre_succes = "<?= $trad_com_menu['SUCCES_ORDRE'][$_SESSION['user']->getLangue()];?>";
                    var ordre_error = "<?= $trad_com_menu['ERREUR_ORDRE'][$_SESSION['user']->getLangue()];?>";

                    function mmSaveOrder($list) {
                        var ids = $list.children('.mm-item').map(function () {
                            return $(this).data('id');
                        }).get();
                        $.post("components/com_menu/controleur/menu.php?task=reorderMenuItem", {ordre: ids}, function (theResponse) {
                            if (parseInt(theResponse) == 1) {
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + ordre_succes + '</div>');
                            } else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + ordre_error + '</div>');
                            }
                            $('.msgbox').slideDown().delay(1800).slideUp();
                        });
                    }

                    function mmSaveAutoOrder($list) {
                        var ids = $list.children('.mm-lvl3-auto-item').map(function () {
                            return $(this).data('id');
                        }).get();
                        $.post("components/com_menu/controleur/menu.php?task=reorderAutoListChildren", {list_type: $list.data('list-type'), ordre: ids}, function (theResponse) {
                            if (parseInt(theResponse) == 1) {
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + ordre_succes + '</div>');
                            } else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + ordre_error + '</div>');
                            }
                            $('.msgbox').slideDown().delay(1800).slideUp();
                        });
                    }

                    $('#mm-lvl1').sortable({
                        items: '> li.mm-lvl1-item',
                        handle: '.mm-handle',
                        cancel: '.mm-lvl2-sortable, .mm-lvl2-sortable *',
                        placeholder: 'mm-placeholder',
                        axis: 'y',
                        update: function (event, ui) {
                            mmSaveOrder($(this));
                        }
                    });
                    $('.mm-lvl2-sortable').each(function () {
                        $(this).sortable({
                            items: '> li.mm-lvl2-item',
                            handle: '.mm-handle',
                            cancel: '.mm-lvl3-sortable, .mm-lvl3-sortable *, .mm-lvl3-auto-sortable, .mm-lvl3-auto-sortable *',
                            placeholder: 'mm-placeholder',
                            axis: 'y',
                            update: function (event, ui) {
                                mmSaveOrder($(this));
                            }
                        });
                    });
                    $('.mm-lvl3-sortable').each(function () {
                        $(this).sortable({
                            items: '> li.mm-lvl3-item',
                            handle: '.mm-handle',
                            placeholder: 'mm-placeholder',
                            axis: 'y',
                            update: function (event, ui) {
                                mmSaveOrder($(this));
                            }
                        });
                    });
                    $('.mm-lvl3-auto-sortable').each(function () {
                        $(this).sortable({
                            items: '> li.mm-lvl3-auto-item',
                            handle: '.mm-handle',
                            placeholder: 'mm-placeholder',
                            axis: 'y',
                            update: function (event, ui) {
                                mmSaveAutoOrder($(this));
                            }
                        });
                    });
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
                    <div class="widget widget-blue">
                        <div class="widget-title">
                            <h3><i class="icon-move"></i> <?= $trad_com_menu['REORGANISER'][$_SESSION['user']->getLangue()];?></h3>
                        </div>
                        <div class="widget-content">
                            <p class="text-muted"><?= $trad_com_menu['REORGANISER_AIDE'][$_SESSION['user']->getLangue()];?></p>
                            <ul class="mm-sortable" id="mm-lvl1">
                                <?php
                                $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = 0 AND id_menu = " . $m->getId() . " ORDER BY ordre ASC";
                                $result = $db->queryS($SQLselect);
                                foreach ($result as $data) {
                                    $i1 = new menu_item($data["id"], $db, $_SESSION['langue']);
                                    if ($i1->getTitre() == '') $i1 = new menu_item($data['id'], $db);
                                    ?>
                                    <li class="mm-item mm-lvl1-item" data-id="<?php echo $i1->getId(); ?>">
                                        <div class="mm-item-row">
                                            <span class="mm-handle"><i class="icon-move"></i></span>
                                            <span class="mm-title"><?php echo htmlspecialchars($i1->getTitre()); ?></span>
                                            <?php echo menuItemInfoBadges($i1); ?>
                                            <?php echo menuItemActionButtons($i1, $m->getId()); ?>
                                        </div>
                                        <?php
                                        $SQLselect2 = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $i1->getId() . " AND id_menu = " . $m->getId() . " ORDER BY ordre ASC";
                                        $result2 = $db->queryS($SQLselect2);
                                        if (count($result2) > 0) { ?>
                                            <ul class="mm-sortable mm-lvl2-sortable">
                                                <?php foreach ($result2 as $data2) {
                                                    $i2 = new menu_item($data2["id"], $db, $_SESSION['langue']);
                                                    if ($i2->getTitre() == '') $i2 = new menu_item($data2['id'], $db);
                                                    ?>
                                                    <li class="mm-item mm-lvl2-item" data-id="<?php echo $i2->getId(); ?>">
                                                        <div class="mm-item-row">
                                                            <span class="mm-handle"><i class="icon-move"></i></span>
                                                            <span class="mm-title"><?php echo htmlspecialchars($i2->getTitre()); ?></span>
                                                            <?php echo menuItemInfoBadges($i2); ?>
                                                            <?php echo menuItemActionButtons($i2, $m->getId()); ?>
                                                        </div>
                                                        <?php
                                                        $autoList = $i2->getAutoList();
                                                        if (in_array($autoList, array('agent_ia', 'service_children'))) {
                                                            $autoRecords = array();
                                                            $listType = '';
                                                            if ($autoList === 'agent_ia') {
                                                                $listType = 'agent_ia';
                                                                $autoRecords = agent_ia::findAll($_SESSION['langue'], true);
                                                            } elseif ($autoList === 'service_children') {
                                                                $listType = 'service';
                                                                $parentService = service::find($i2->getIdItem(), $_SESSION['langue']);
                                                                $autoRecords = $parentService ? $parentService->getChildren($_SESSION['langue'], true, true) : array();
                                                            }
                                                            $autoLimit = $i2->getAutoLimit();
                                                            if (!empty($autoRecords)) { ?>
                                                                <ul class="mm-sortable mm-lvl3-auto-sortable" data-list-type="<?php echo $listType; ?>">
                                                                    <?php foreach ($autoRecords as $ai => $rec) { ?>
                                                                        <li class="mm-item mm-lvl3-item mm-lvl3-auto-item" data-id="<?php echo $rec->getId(); ?>">
                                                                            <div class="mm-item-row">
                                                                                <span class="mm-handle"><i class="icon-move"></i></span>
                                                                                <span class="mm-title"><?php echo htmlspecialchars($rec->getTitre()); ?></span>
                                                                                <span class="label label-info">auto</span>
                                                                            </div>
                                                                        </li>
                                                                        <?php if ($autoLimit && ($ai + 1) == $autoLimit && ($ai + 1) < count($autoRecords)) { ?>
                                                                            <li class="mm-auto-limit-marker">— limite d'affichage sur le site : <?php echo $autoLimit; ?> —</li>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php
                                                        $SQLselect3 = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $i2->getId() . " AND id_menu = " . $m->getId() . " ORDER BY ordre ASC";
                                                        $result3 = $db->queryS($SQLselect3);
                                                        if (count($result3) > 0) { ?>
                                                            <ul class="mm-sortable mm-lvl3-sortable">
                                                                <?php foreach ($result3 as $data3) {
                                                                    $i3 = new menu_item($data3["id"], $db, $_SESSION['langue']);
                                                                    if ($i3->getTitre() == '') $i3 = new menu_item($data3['id'], $db);
                                                                    ?>
                                                                    <li class="mm-item mm-lvl3-item" data-id="<?php echo $i3->getId(); ?>">
                                                                        <div class="mm-item-row">
                                                                            <span class="mm-handle"><i class="icon-move"></i></span>
                                                                            <span class="mm-title"><?php echo htmlspecialchars($i3->getTitre()); ?></span>
                                                                            <?php echo menuItemInfoBadges($i3); ?>
                                                                            <?php echo menuItemActionButtons($i3, $m->getId()); ?>
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
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
                                        <th>Méga menu</th>
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
                                            <td><?php echo menuItemInfoBadges($i); ?></td>
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
                                                <td><?php echo menuItemInfoBadges($i); ?></td>
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
                                                    <td><?php echo menuItemInfoBadges($i); ?></td>
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