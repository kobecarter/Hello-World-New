<?php
    include_once "components/com_newsletter/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_newsletter')) { ?>
            <li>
                <a href="index.php?option=com_newsletter"> <?= $trad_com_newsletter['LISTE_MAIL'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
    </ul>
</div>
</div>
<div class="main-content">
    <?php
    @$task = $_GET['task'];
    switch ($task) {
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_newsletter')) {
                showList();
            } // Charge la liste des articles
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_newsletter;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_newsletter['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_newsletter['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_newsletter['SUCCES_DEL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_newsletter['ERREUR_DEL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_newsletter['QST_DEL'][$_SESSION['user']->getLangue()]; ?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_newsletter/controleur/newsletter.php?task=deleteNewsletter", order, function (theResponse) {
                            if (parseInt(theResponse) == 1) {
                                $("#row_" + id).addClass("danger");
                                setTimeout(function () {
                                    $("#row_" + id).remove()
                                }, 300);
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong>' + succes_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                            else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong>' + error_msg + '</div>');
                                $('.msgbox').slideDown();
                            }
                        });
                    }
                });

                $(".upload").on('click', function (event) {
                    event.preventDefault();
                    $("#input:hidden").trigger('click');
                });

                $('#input').change(function () {
                    extensions = ["xlsx"];
                    var ext = $('#input')[0].files[0].name;
                    ext = ext.split('.')[1];
                    if ($.inArray(ext, extensions) != -1) {
                        $('form#uploadForm').submit();
                        $('form#uploadForm').ajaxForm({
                            beforeSubmit: function () {
                                $(".loading").fadeIn();
                            },
                            success: function (theResponse) {
                                $(".loading").fadeOut();
                                if (parseInt(theResponse) == 1) {
                                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> Emails uploaded avec succès</div>');
                                    setTimeout(function () {
                                        document.location = "index.php?option=com_newsletter";
                                    }, 2000)
                                }
                                else {
                                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Lors de l\'upload </div>');
                                    $('.msgbox').slideDown();
                                }
                                alert(theResponse)
                            }
                        });
                    } else {
                        alert("<?= $trad_com_newsletter['ERREUR_EXT'][$_SESSION['user']->getLangue()]; ?> ( " + ext +" )")
                    }
                });

            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_newsletter['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li class="active"><?= $trad_com_newsletter['com_newsletter'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="components/com_newsletter/controleur/newsletter.php?task=downloadNewsletter"
                       class="widget-control" data-toggle="tooltip" data-placement="top" title=""
                       data-original-title="<?= $trad_com_newsletter['TELECHARGER'][$_SESSION['user']->getLangue()]; ?>"><i class="fa fa-download"></i></a>
                    <a href="#" class="widget-control upload" data-toggle="tooltip" data-placement="top" title=""
                       data-original-title="<?= $trad_com_newsletter['CHARGER'][$_SESSION['user']->getLangue()]; ?>"><i class="fa fa-upload"></i></a>
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="<?= $trad_com_newsletter['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="<?= $trad_com_newsletter['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_newsletter['LISTE_MAIL'][$_SESSION['user']->getLangue()]; ?></h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <!-- Upload form -->
                    <form method="post" id="uploadForm"
                          action="components/com_newsletter/controleur/newsletter.php?task=uploadNewsletter"
                          enctype="multipart/form-data">
                        <input type="file" name="fichier" id="input" style="display: none"/>
                    </form>
                    <!-- End of upload form -->
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_newsletter['ID'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_newsletter['NOM'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_newsletter['E_MAIL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_newsletter['DATE_RECEPTION'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_newsletter['ACTION'][$_SESSION['user']->getLangue()]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "newsletter ORDER BY date_add DESC";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $n = new newsletter($data['id'], $db);
                            ?>
                            <tr id="row_<?php echo $n->getId(); ?>">
                                <td><?php echo $n->getId(); ?></td>
                                <td><?php echo $n->getNom(); ?></td>
                                <td><?php echo $n->getEmail(); ?></td>
                                <td><?php echo normaldate($n->getDateAdd()); ?></td>

                                <td class="text-center">
                                    <?php if ($n->isConfirm()): ?>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_newsletter['CONFIRME'][$_SESSION['user']->getLangue()]; ?>" class="btn btn-success btn-xs"><i
                                                    class="icon-check2"></i></a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_newsletter')) { ?>
                                        <a href="#0" id="delete_<?php echo $n->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top" data-original-title="<?= $trad_com_newsletter['SUPPRIMER'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-danger btn-xs delete"><i class="icon-trash"></i></a>
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

    ?>
</div>