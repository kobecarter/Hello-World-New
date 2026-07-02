<?php
    include_once "components/com_contact/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_contact')) { ?>
            <li>
                <a href="index.php?option=com_contact"> <?= $trad_com_contact['LISTE_CONTACTS'][$_SESSION['user']->getLangue()]; ?></a>
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
            if ($_SESSION['user']->hasDroit('view', 'com_contact')) {
                showList();
            } // Charge la liste des articles
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_contact;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_contact['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_contact['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_contact['SUCCES_DEL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_contact['ERREUR_DEL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_contact['QST_DEL'][$_SESSION['user']->getLangue()]; ?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_contact/controleur/contact.php?task=deleteContact", order, function (theResponse) {
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
                
                $(".view").click(function (event) {
                    event.preventDefault();
                    var self = $(this)
                    var t = $(this).attr("id").split("_");
                    var id = t[1];
                    var order = 'id=' + id;
                    $.post("components/com_contact/controleur/contact.php?task=viewContact", order, function (theResponse) {
                        self.parents('tr').removeClass('toread')
                       $("#div-show-contact-information").find('.modal-body').html(theResponse);
                    });
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
                                        document.location = "index.php?option=com_contact";
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
                        alert("<?= $trad_com_contact['ERREUR_EXT'][$_SESSION['user']->getLangue()]; ?> ( " + ext +" )")
                    }
                });

            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_contact['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li class="active"><?= $trad_com_contact['com_contact'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="components/com_contact/controleur/contact.php?task=downloadContact"
                       class="widget-control" data-toggle="tooltip" data-placement="top" title=""
                       data-original-title="<?= $trad_com_contact['TELECHARGER'][$_SESSION['user']->getLangue()]; ?>"><i class="fa fa-download"></i></a>
                    <a href="#" class="widget-control upload" data-toggle="tooltip" data-placement="top" title=""
                       data-original-title="<?= $trad_com_contact['CHARGER'][$_SESSION['user']->getLangue()]; ?>"><i class="fa fa-upload"></i></a>
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="<?= $trad_com_contact['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="<?= $trad_com_contact['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_contact['LISTE_CONTACTS'][$_SESSION['user']->getLangue()]; ?></h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <!-- Upload form -->
                    <form method="post" id="uploadForm"
                          action="components/com_contact/controleur/contact.php?task=uploadContact"
                          enctype="multipart/form-data">
                        <input type="file" name="fichier" id="input" style="display: none"/>
                    </form>
                    <!-- End of upload form -->
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_contact['ID'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['NOM'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['FULLNAME'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['E_MAIL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['PHONE'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['DATE_RECEPTION'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_contact['ACTION'][$_SESSION['user']->getLangue()]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "contact ORDER BY date_add DESC";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $n = new contact($data['id'], $db);
                            ?>
                            <tr id="row_<?php echo $n->getId(); ?>" class="<?= $n->isConfirm() ? 'toread' : null?>">
                                <td><?php echo $n->getId(); ?></td>
                                <td><?php echo $n->getNom(); ?></td>
                                <td><?php echo $n->getFullname(); ?></td>
                                <td><?php echo $n->getEmail(); ?></td>
                                <td><?php echo $n->getPhone(); ?></td>
                                <td><?php echo normaldate($n->getDateAdd()); ?></td>

                                <td class="text-center">

                                    <?php if ($_SESSION['user']->hasDroit('view', 'com_contact')) { ?>
                                        <a href="#0"  data-toggle="modal" data-target="#div-show-contact-information" id="view_<?php echo $n->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top" data-original-title="<?= $trad_com_contact['show'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-info btn-xs view"><i class="fa fa-eye"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_contact')) { ?>
                                        <a href="#0" id="delete_<?php echo $n->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top" data-original-title="<?= $trad_com_contact['SUPPRIMER'][$_SESSION['user']->getLangue()]; ?>"
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
<!-- Modal -->
<div class="modal fade" id="div-show-contact-information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>