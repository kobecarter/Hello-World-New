<?php
include_once "components/com_slider/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_slider')) { ?>
            <li>
                <a href="index.php?option=com_slider&task=add"> <?= $trad_com_slider['AJOUTER_SLIDER'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_slider')) { ?>
            <li>
                <a href="index.php?option=com_slider"> <?= $trad_com_slider['LISTE_SLIDER'][$_SESSION['user']->getLangue()]; ?></a>
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
            if ($_SESSION['user']->hasDroit('edit', 'com_slider')) {
                edit();
                break;
            }
        case 'add' :
            if ($_SESSION['user']->hasDroit('add', 'com_slider')) {
                add();
                break;
            }
        case 'slides' :
            if ($_SESSION['user']->hasDroit('view', 'com_slider')) {
                slides();
                break;
            }
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_slider')) {
                showList();
            }
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- slides ---------------------------- */
    function slides()
    {
        global $db, $trad_com_slider;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $slider = new slider($id, $db);
            ?>
            <script src="js/jquery.sortable.js"></script>
            <script>
                $(function () {
                    var succes = "<?= $trad_com_slider['SUCCES'][$_SESSION['user']->getLangue()];?>";
                    var error = "<?= $trad_com_slider['ERREUR'][$_SESSION['user']->getLangue()];?>";

                    $('.sortable').sortable();
                    $('.handles').sortable({
                        handle: 'span'
                    });
                    $('.connected').sortable({
                        connectWith: '.connected'
                    });
                    $('.exclude').sortable({
                        items: ':not(.disabled)'
                    });

                    $(".deletePhoto").click(function (event) {
                        event.preventDefault();
                        if (confirm("<?= $trad_com_slider['QST_DEL_SlIDE'][$_SESSION['user']->getLangue()];?>")) {
                            var t = $(this).attr("id").split("_");
                            var id = t[1];
                            var order = 'id=' + id;
                            $.post("components/com_slider/controleur/slider.php?task=deleteSlide", order, function (theResponse) {
                                if (parseInt(theResponse) == 1) {
                                    $("#pic_" + id).remove();
                                }
                            })
                        }
                    })

                    $('form#sort').ajaxForm({
                        beforeSubmit: function () {
                            $("#sort .loading").fadeIn();
                        },
                        success: function (theResponse) {
                            $("#sort .loading").fadeOut();
                            // messages
                            var succes_msg = "<?= $trad_com_slider['SUCCES_ORDRE'][$_SESSION['user']->getLangue()];?>";
                            var error_msg = "<?= $trad_com_slider['ERREUR_ORDRE'][$_SESSION['user']->getLangue()];?>";

                            if (parseInt(theResponse) == 1) {
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                            else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                        }
                    });
                })
            </script>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_slider['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
                <li><a href="index.php?option=com_slider"><?= $trad_com_slider['SLIDERS'][$_SESSION['user']->getLangue()];?></a></li>
                <li class="active"><?= $trad_com_slider['SLIDES'][$_SESSION['user']->getLangue()];?> : <?php echo $slider->getTitre(); ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="<?= $trad_com_slider['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="<?= $trad_com_slider['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3><i class="icon-picture"></i> <?= $trad_com_slider['AJOUTER_SLIDE'][$_SESSION['user']->getLangue()];?></h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_slider/forms/slide.php"); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <fieldset>
                    <legend><?= $trad_com_slider['ORDRE_SLIDES'][$_SESSION['user']->getLangue()];?></legend>
                    <form method="post" id="sort" action="components/com_slider/controleur/slider.php?task=orderSlide">
                        <div class="row">
                            <section>
                                <ul class="sortable grid">
                                    <?php
                                    $SQLselect = "SELECT * FROM " . __prefixe_db__ . "slides WHERE id_slider = " . $slider->getId() . " ORDER BY ordre ASC";
                                    $result = $db->queryS($SQLselect);
                                    foreach ($result as $data) {
                                        $slide = new slide($data['id'], $db);
                                        ?>
                                        <li id="pic_<?php echo $slide->getId(); ?>">
                                            <a href="#0" id="delete_<?php echo $slide->getId(); ?>"
                                               class="btn btn-danger btn-xs deletePhoto"
                                               style="position:absolute; top:-5px; right:-5px;"><i
                                                        class="icon-remove"></i></a>
                                            <a href="index.php?option=com_slider&task=slides&id=<?php echo $id; ?>&ids=<?php echo $slide->getId(); ?>"
                                               class="btn btn-warning btn-xs"
                                               style="position:absolute; top:-5px; right:20px;"><i
                                                        class="icon-pencil"></i></a>
                                            <input type="hidden" name="ordre[]" value="<?php echo $slide->getId(); ?>"/>
                                            <img src="../images/slides/<?php echo $slide->getPhoto(); ?>" width=""
                                                 height="50"/>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </section>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="<?= $trad_com_slider['APPLIQUER_ORDRE'][$_SESSION['user']->getLangue()];?>" class="btn btn-primary submit sort"/>
                                <span class="loading"></span>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
            <?php
        }
    }

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_slider;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_slider['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_slider['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_slider['SUCCES_DEL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_slider['ERREUR_DEL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_slider['QST_DEL'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_slider/controleur/slider.php?task=deleteSlider", order, function (theResponse) {
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
            <li><a href="index.php"><?= $trad_com_slider['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
            <li class="active"><?= $trad_com_slider['com_slider'][$_SESSION['user']->getLangue()];?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="<?= $trad_com_slider['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="<?= $trad_com_slider['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_slider['LISTE_SLIDER'][$_SESSION['user']->getLangue()];?></h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_slider['ID'][$_SESSION['user']->getLangue()];?></th>
                            <th><?= $trad_com_slider['TITRE'][$_SESSION['user']->getLangue()];?></th>
                            <th><?= $trad_com_slider['ACTION'][$_SESSION['user']->getLangue()];?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slider";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $s = new slider($data['id'], $db);
                            ?>
                            <tr id="row_<?php echo $s->getId(); ?>">
                                <td><?php echo $s->getId(); ?></td>
                                <td><?php echo $s->getTitre(); ?></td>
                                <td class="text-center">
                                    <?php if ($s->isActif()) { ?>
                                        <a href="#0" data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_slider['ACTIVE'][$_SESSION['user']->getLangue()];?>" class="btn btn-success btn-xs"><i
                                                    class="icon-check2"></i></a>
                                    <?php } ?>

                                    <a href="index.php?option=com_slider&task=slides&id=<?php echo $s->getId(); ?>"
                                       data-toggle="tooltip" data-placement="top" data-original-title="<?= $trad_com_slider['GERER_SLIDES'][$_SESSION['user']->getLangue()];?>"
                                       class="btn btn-default btn-xs"><i class="icon-picture"></i></a>

                                    <?php if ($_SESSION['user']->hasDroit('edit', 'com_slider')) { ?>
                                        <a href="index.php?option=com_slider&task=edit&id=<?php echo $s->getId(); ?>"
                                           data-toggle="tooltip" data-placement="top" data-original-title="<?= $trad_com_slider['MODIFIER'][$_SESSION['user']->getLangue()];?>"
                                           class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_slider')) { ?>
                                        <a href="#0" id="delete_<?php echo $s->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top" data-original-title="<?= $trad_com_slider['SUPPRIMER'][$_SESSION['user']->getLangue()];?>"
                                           class="btn btn-danger btn-xs delete"><i class="icon-remove"></i></a>
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
        global $db, $trad_com_slider;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $s = new slider($id, $db);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_slider['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
                <li><a href="index.php?option=com_slider"><?= $trad_com_slider['SLIDERS'][$_SESSION['user']->getLangue()];?></a></li>
                <li class="active"><?= $trad_com_slider['MODIFIER_SLIDER'][$_SESSION['user']->getLangue()];?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="<?= $trad_com_slider['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="<?= $trad_com_slider['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3><i class="icon-edit-sign"></i> <?= $trad_com_slider['MODIFIER_SLIDER'][$_SESSION['user']->getLangue()];?></h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_slider/forms/form.php"); ?>
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
        global $db, $trad_com_slider;
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_slider['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
            <li><a href="index.php?option=com_slider"><?= $trad_com_slider['SLIDERS'][$_SESSION['user']->getLangue()];?></a></li>
            <li class="active"><?= $trad_com_slider['AJOUTER_SLIDER'][$_SESSION['user']->getLangue()];?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div> <!-- conteneur de message -->
                <div class="widget widget-green">
                    <div class="widget-title">
                        <div class="widget-controls">
                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="<?= $trad_com_slider['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="<?= $trad_com_slider['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                        class="icon-minus-sign"></i></a>
                        </div>
                        <h3><i class="icon-plus-sign-alt"></i> <?= $trad_com_slider['AJOUTER_SLIDER'][$_SESSION['user']->getLangue()];?></h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_slider/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>
