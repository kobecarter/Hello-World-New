<?php
include_once "components/com_users/traduction.php";
?>
<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_users')) { ?>
            <li>
                <a href="index.php?option=com_users&task=add"> <?= $trad_com_users['AJOUTER_USER'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li>
                <a href="index.php?option=com_users&task=addProfil"> <?= $trad_com_users['AJOUTER_PROFIL'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_users')) { ?>
            <li>
                <a href="index.php?option=com_users"> <?= $trad_com_users['LISTE_USER'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li>
                <a href="index.php?option=com_users&task=profil"> <?= $trad_com_users['LISTE_PROFIL'][$_SESSION['user']->getLangue()]; ?></a>
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
            if ($_SESSION['user']->hasDroit('edit', 'com_users')) {
                edit();
            }
            break;
        case 'add' :
            if ($_SESSION['user']->hasDroit('add', 'com_users')) {
                add();
            }
            break;
        case 'profil' :
            profil();
            break;
        case 'addProfil' :
            addProfil();
            break;
        case 'editProfil' :
            editProfil();
            break;
        case 'droits' :
            droits();
            break;
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_users')) {
                showList();
            } // Charge la liste des utilisateurs
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList()
    {
        global $db, $trad_com_users;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_users['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_users['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".enable").click(function (event) {
                    event.preventDefault();
                    var error_msg = "<?= $trad_com_users['ERREUR_ACTIVE_USER'][$_SESSION['user']->getLangue()];?>";
                    var t = $(this).attr("id").split("_");
                    var id = t[1];
                    var order = 'id=' + id;
                    $.post("components/com_users/controleur/user.php?task=enableUser", order, function (theResponse) {
                        if (parseInt(theResponse) == 1) {
                            document.location.reload();
                        }
                        else {
                            $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong>' + error_msg + '</div>');
                            $('.msgbox').slideDown();
                        }
                    });
                });

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_users['SUCCES_DEL_USER'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_users['ERREUR_DEL_USER'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_users['QST_DEL_USER'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_users/controleur/user.php?task=deleteUser", order, function (theResponse) {
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
                })
            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li class="active"><?= $trad_com_users['com_users'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title=""
                       data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title=""
                       data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_users['LISTE_USER'][$_SESSION['user']->getLangue()]; ?>
                </h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_users['PRENOM'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['NOM'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['LOGIN'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['E_MAIL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['TEL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['PROFIL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['ETAT'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['ACTION'][$_SESSION['user']->getLangue()]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "users";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $u = new compte($data['id'], $db);
                            $p = new profil($u->getIdProfil(), $db);
                            ?>
                            <tr id="row_<?php echo $u->getId(); ?>">
                                <td><?php echo $u->getFirstName(); ?></td>
                                <td><?php echo $u->getLastName(); ?></td>
                                <td><?php echo $u->getUserName(); ?></td>
                                <td><?php echo $u->getEmail(); ?></td>
                                <td><?php echo $u->getTel(); ?></td>
                                <td><?php echo $p->getProfil(); ?></td>
                                <?php if ($_SESSION['user']->hasDroit('edit', 'com_users')) { ?>
                                    <td><a href="#0" id="enable_<?php echo $u->getId(); ?>" class="enable"
                                           style="text-decoration:none;"><?php echo ($u->isActif()) ? '<span class="label label-success">' . $trad_com_users['ACTIF'][$_SESSION['user']->getLangue()] . '</span>' : '<span class="label label-danger">' . $trad_com_users['INACTIF'][$_SESSION['user']->getLangue()] . '</span>'; ?></a>
                                    </td>
                                <?php } ?>
                                <td class="text-center">
                                    <?php if ($_SESSION['user']->hasDroit('edit', 'com_users')) { ?>
                                        <a href="index.php?option=com_users&task=edit&id=<?php echo $u->getId(); ?>"
                                           data-toggle="tooltip" data-placement="top"
                                           data-original-title="<?= $trad_com_users['MODIFIER'][$_SESSION['user']->getLangue()]; ?>"
                                           class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if ($_SESSION['user']->hasDroit('delete', 'com_users') && !$u->isSuperUser()) { ?>
                                        <a href="#0" id="delete_<?php echo $u->getId(); ?>" data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="<?= $trad_com_users['SUPPRIMER'][$_SESSION['user']->getLangue()]; ?>"
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
        global $db, $trad_com_users;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $u = new compte($id, $db);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
                <li>
                    <a href="index.php?option=com_users"><?= $trad_com_users['USERS'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li class="active"><?= $trad_com_users['MODIFIER_USER'][$_SESSION['user']->getLangue()]; ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3>
                                <i class="icon-edit-sign"></i> <?= $trad_com_users['MODIFIER_USER'][$_SESSION['user']->getLangue()]; ?>
                            </h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_users/forms/form.php"); ?>
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
        global $db, $trad_com_users;
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li>
                <a href="index.php?option=com_users"><?= $trad_com_users['USERS'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li class="active"><?= $trad_com_users['AJOUTER_USER'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div> <!-- conteneur de message -->
                <div class="widget widget-green">
                    <div class="widget-title">
                        <div class="widget-controls">
                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-minus-sign"></i></a>
                        </div>
                        <h3>
                            <i class="icon-plus-sign-alt"></i> <?= $trad_com_users['AJOUTER_USER'][$_SESSION['user']->getLangue()]; ?>
                        </h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_users/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* ---------------------------- profil ---------------------------- */
    function profil()
    {
        global $db, $trad_com_users;
        ?>
        <script type="text/javascript">
            $(function () {
                var succes = "<?= $trad_com_users['SUCCES'][$_SESSION['user']->getLangue()];?>";
                var error = "<?= $trad_com_users['ERREUR'][$_SESSION['user']->getLangue()];?>";

                $(".delete").click(function (event) {
                    event.preventDefault();
                    var succes_msg = "<?= $trad_com_users['SUCCES_DEL_PROFIL'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_users['ERREUR_DEL_PROFIL'][$_SESSION['user']->getLangue()];?>";
                    if (confirm("<?= $trad_com_users['QST_DEL_PROFIL'][$_SESSION['user']->getLangue()];?>")) {
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id=' + id;
                        $.post("components/com_users/controleur/user.php?task=deleteProfil", order, function (theResponse) {
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
                })
            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li>
                <a href="index.php?option=com_users"><?= $trad_com_users['com_users'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li class="active"><?= $trad_com_users['PROFILS'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                       title=""
                       data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                       data-placement="top" title=""
                       data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> <?= $trad_com_users['LISTE_PROFIL'][$_SESSION['user']->getLangue()]; ?>
                </h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th><?= $trad_com_users['PROFIL'][$_SESSION['user']->getLangue()]; ?></th>
                            <th><?= $trad_com_users['ACTION'][$_SESSION['user']->getLangue()]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "profils";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $p = new profil($data['id'], $db);
                            ?>
                            <tr id="row_<?php echo $p->getId(); ?>">
                                <td><?php echo $p->getProfil(); ?></td>
                                <td class="text-center">
                                    <a href="index.php?option=com_users&task=droits&id=<?php echo $p->getId(); ?>"
                                       class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                                       title=""
                                       data-original-title="<?= $trad_com_users['DROITS_ACCES'][$_SESSION['user']->getLangue()]; ?>"><i
                                                class="icon-unlock"></i></a>

                                    <a href="index.php?option=com_users&task=editProfil&id=<?php echo $p->getId(); ?>"
                                       class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"
                                       title=""
                                       data-original-title="<?= $trad_com_users['MODIFIER'][$_SESSION['user']->getLangue()]; ?>"><i
                                                class="icon-pencil"></i></a>

                                    <a href="#0" id="delete_<?php echo $p->getId(); ?>"
                                       class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="top"
                                       title=""
                                       data-original-title="<?= $trad_com_users['SUPPRIMER'][$_SESSION['user']->getLangue()]; ?>"><i
                                                class="icon-remove"></i></a>
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

    /* ---------------------------- addProfil ---------------------------- */
    function addProfil()
    {
        global $db, $trad_com_users;
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
            <li>
                <a href="index.php?option=com_users"><?= $trad_com_users['com_users'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li>
                <a href="index.php?option=com_users&task=profil"><?= $trad_com_users['PROFILS'][$_SESSION['user']->getLangue()]; ?></a>
            </li>
            <li class="active"><?= $trad_com_users['AJOUTER_PROFIL'][$_SESSION['user']->getLangue()]; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div> <!-- conteneur de message -->
                <div class="widget widget-green">
                    <div class="widget-title">
                        <div class="widget-controls">
                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                        class="icon-minus-sign"></i></a>
                        </div>
                        <h3>
                            <i class="icon-plus-sign-alt"></i> <?= $trad_com_users['AJOUTER_PROFIL'][$_SESSION['user']->getLangue()]; ?>
                        </h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_users/forms/profil.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* ---------------------------- editProfil ---------------------------- */
    function editProfil()
    {
        global $db, $trad_com_users;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $p = new profil($id, $db);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
                <li>
                    <a href="index.php?option=com_users"><?= $trad_com_users['com_users'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li>
                    <a href="index.php?option=com_users&task=profil"><?= $trad_com_users['PROFILS'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li class="active"><?= $trad_com_users['MODIFIER_PROFIL'][$_SESSION['user']->getLangue()]; ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3>
                                <i class="icon-edit-sign"></i> <?= $trad_com_users['MODIFIER_PROFIL'][$_SESSION['user']->getLangue()]; ?>
                            </h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_users/forms/profil.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    /* ---------------------------- droits ---------------------------- */
    function droits()
    {
        global $db, $trad_com_users;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $p = new profil($id, $db);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php"><?= $trad_com_users['TABLE_BORD'][$_SESSION['user']->getLangue()]; ?></a></li>
                <li>
                    <a href="index.php?option=com_users"><?= $trad_com_users['com_users'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li>
                    <a href="index.php?option=com_users&task=profil"><?= $trad_com_users['PROFILS'][$_SESSION['user']->getLangue()]; ?></a>
                </li>
                <li class="active"><?= $trad_com_users['DROITS_ACCES'][$_SESSION['user']->getLangue()]; ?></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="msgbox"></div> <!-- conteneur de message -->
                    <div class="widget widget-green">
                        <div class="widget-title">
                            <div class="widget-controls">
                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-refresh"></i></a>
                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                                   data-placement="top" title=""
                                   data-original-title="<?= $trad_com_users['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i
                                            class="icon-minus-sign"></i></a>
                            </div>
                            <h3>
                                <i class="icon-unlock"></i> <?= $trad_com_users['DROITS_ACCES'][$_SESSION['user']->getLangue()]; ?>
                                - <?php echo $p->getProfil(); ?></h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_users/forms/droits.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    ?>
</div>
