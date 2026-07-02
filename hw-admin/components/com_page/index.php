<?php
include_once "components/com_page/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_page')) { ?>
            <li>
                <a href="index.php?option=com_page&task=add"> <?= $trad_com_page['AJOUTER_PAGE'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_page')) { ?>
            <li>
                <a href="index.php?option=com_page"> <?= $trad_com_page['LISTE_PAGE'][$_SESSION['user']->getLangue()]; ?></a>
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
            if ($_SESSION['user']->hasDroit('edit', 'com_page')) {
                edit();
                break;
            }
        case 'add' :
            if ($_SESSION['user']->hasDroit('add', 'com_page')) {
                add();
                break;
            }
        case 'url' :
            url();
            break;
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_page')) {
                showList();
            } // Charge la liste des pages
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_page;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_page['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_page['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_page['SUCCES_DEL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_page['ERREUR_DEL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_page['QST_DEL'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_page/controleur/page.php?task=deletePage", order, function (theResponse) {
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
                });

                $(".dupliquer").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_page['SUCCES_DUP'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_page['ERREUR_DUP'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_page['QST_DUP'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_page/controleur/page.php?task=dupliquerPage", order, function (theResponse) {
                            if (parseInt(theResponse) == 1) {
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                                $('.msgbox').slideDown();
                                setTimeout(function () {
                                    document.location = "index.php?option=com_page";
                                }, 2000)
                            }
                            else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                                $('.msgbox').slideDown();
                            }

                        });
                    }
                });

            });

        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_page['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li class="active"><?= $trad_com_page['com_page'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title=""
                       data-original-title="<?= $trad_com_page['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title=""
                       data-original-title="<?= $trad_com_page['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_page['LISTE_PAGE'][$_SESSION['user']->getLangue()]; ?></h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_page['ID'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_page['TITRE'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_page['TYPE'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_page['ACTION'][$_SESSION['user']->getLangue()]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "page";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $p = new page($data['id'], $db, $_SESSION['langue']);
                            if ($p->getTitre() == '') $p = new page($data['id'], $db); // afficher le titre FR si la langue n'est pas rempli
                            ?>
                            <tr id="row_<?php echo $p->getId(); ?>">
                                <td><?php echo $p->getId(); ?></td>
                                <td><?php echo $p->getTitre(); ?></td>
                                <td><?php echo $p->getType(); ?></td>
                                <td class="text-center">
                                    <?php if ($p->isActif()) { ?>
                                        <a href="#0" data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_page['ACTIVE'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-success btn-xs"><i
                                                    class="icon-check2"></i></a>
                                    <?php } ?>
                                    <?php if ($p->istranslated($data['id'], $db, $_SESSION['langue']) == true) { ?>
                                        <a href="#0" data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_page['TRADUIT'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-info btn-xs"><i
                                                    class="fa fa-globe"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('view', 'com_page')) { ?>
                                        <a href="<?php echo $p->getLink(); ?>" target="_blank" data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="<?= $trad_com_page['OUVRIR_PAGE'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-default btn-xs"><i class="fa fa-external-link-alt"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('edit', 'com_page')) { ?>
                                        <a href="index.php?option=com_page&task=edit&id=<?php echo $p->getId(); ?>"
                                           data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_page['MODIFIER'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('add', 'com_page')) { ?>
                                        <a href="#0" id="dupliquer_<?php echo $p->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="<?= $trad_com_page['DUPLIQUER'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-info btn-xs dupliquer"><i class="fa fa-copy"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_page')) { ?>
                                        <a href="#0" id="delete_<?php echo $p->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="<?= $trad_com_page['SUPPRIMER'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
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
        global $db, $p, $trad_com_page;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            if (isset($_GET['lg']) && !empty($_GET['lg'])) {
                $lg = $_GET['lg'];
                $p = new page($id, $db, $lg);
                if ($p->getTitre() == '')
                    $p = new page($id, $db, $_SESSION['langue']);
            } else {
                $p = new page($id, $db, $_SESSION['langue']);
            }
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_page['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
                <li>
                    <a href="index.php?option=com_page"><?= $trad_com_page['PAGES'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li class="active"><?= $trad_com_page['MODIFIER_PAGE'][$_SESSION['user']->getLangue()]; ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_page['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_page['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3>
                                <i class="icon-edit-sign"></i> <?= $trad_com_page['MODIFIER_PAGE'][$_SESSION['user']->getLangue()]; ?>
                            </h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_page/forms/form.php"); ?>
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
        global $db, $trad_com_page;
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_page['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li><a href="index.php?option=com_page"><?= $trad_com_page['PAGES'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li class="active"><?= $trad_com_page['AJOUTER_PAGE'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div> <!-- conteneur de message -->
                <div class="widget widget-green">
                    <div class="widget-title">
                        <div class="widget-controls">
                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_page['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_page['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-minus-sign"></i></a>
                        </div>
                        <h3>
                            <i class="icon-plus-sign-alt"></i> <?= $trad_com_page['AJOUTER_PAGE'][$_SESSION['user']->getLangue()]; ?>
                        </h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_page/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* ---------------------------- url ---------------------------- */
    function url(){
    global $db, $trad_com_page;
    ?>
    <ol class="breadcrumb">
        <li><a href="index.php"><?= $trad_com_page['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
        <li><a href="index.php?option=com_page"><?= $trad_com_page['PAGES'][$_SESSION['user']->getLangue()]; ?></a></li>
        <li class="active"><?= $trad_com_page['URLS'][$_SESSION['user']->getLangue()]; ?></li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="msgbox"></div> <!-- conteneur de message -->
            <div class="widget widget-green">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                           data-placement="top" title=""
                           data-original-title="<?= $trad_com_page['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                    class="icon-refresh"></i></a>
                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                           data-placement="top" title=""
                           data-original-title="<?= $trad_com_page['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                    class="icon-minus-sign"></i></a>
                    </div>
                    <h3>
                        <i class="icon-magic"></i> <?= $trad_com_page['REECRIRE_URLS'][$_SESSION['user']->getLangue()]; ?>
                    </h3>
                </div>
                <div class="widget-content">
                    <?php
                    seo("url");
                    ?>
                    <div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i>
                        <strong><?= $trad_com_page['SUCCES'][$_SESSION['user']->getLangue()]; ?></strong> <?= $trad_com_page['SUCCES_URLS'][$_SESSION['user']->getLangue()]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>
</div>
