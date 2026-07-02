<div class="sub-sidebar-wrapper">

    <ul>

        <?php if($_SESSION['user']->hasDroit('add', 'com_popup')){ ?>

            <li><a href="index.php?option=com_popup&task=add"> Ajouter Popup</a></li>

        <?php } ?>

        <li><a href="index.php?option=com_popup"> Liste des Popups</a></li>

    </ul>

</div>

</div>

<div class="main-content">

    <?php

    @$task = $_GET['task'];

    switch($task){

        case 'edit' : if($_SESSION['user']->hasDroit('edit', 'com_popup')){ edit(); break; }

        case 'add' : if($_SESSION['user']->hasDroit('add', 'com_popup')){ add(); break; }

        default : if($_SESSION['user']->hasDroit('view', 'com_popup')){ showList(); } // Charge la liste des articles

    }



    /* ---------------------------- function ---------------------------- */



    /* ---------------------------- showList ---------------------------- */

    function showList(){

        global $db;

        ?>

        <script type="text/javascript">

            $(function(){

                $(".delete").click(function(){

                    if(confirm("Voulez vous supprimer ce popup ??")){

                        var t = $(this).attr("id").split("_");

                        var id = t[1];

                        var order = 'id='+id;

                        $.post("components/com_popup/controleur/popup.php?task=deletePopup", order, function(theResponse){

                            if(parseInt(theResponse) == 1){

                                $("#row_"+id).addClass("danger");

                                setTimeout(function(){$("#row_"+id).remove()},300);

                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong>  Popup supprim&eacute; avec succ&egrave;s</div>');

                                $('.msgbox').slideDown();

                            }

                            else{

                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de la suppression</div>');

                                $('.msgbox').slideDown();

                            }

                        });

                    }

                });


                $(".enable").click(function(){

                    var t = $(this).attr("id").split("_");

                    var id = t[1];

                    var order = 'id='+id;

                    $.post("components/com_popup/controleur/popup.php?task=enablePopup", order, function(theResponse){

                        if(parseInt(theResponse) == 1){

                            $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong>  Popup activ&eacute; avec succ&egrave;s</div>');

                            $('.msgbox').slideDown();

                            setTimeout(function(){ document.location.reload(); },1000);

                        }

                        else{

                            $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de l\'activation</div>');

                            $('.msgbox').slideDown();

                        }

                    });

                });

                $(".disable").click(function(){

                    if(confirm("Voulez vous désactiver ce popup ??")){

                        var t = $(this).attr("id").split("_");

                        var id = t[1];

                        var order = 'id='+id;

                        $.post("components/com_popup/controleur/popup.php?task=disablePopup", order, function(theResponse){

                            if(parseInt(theResponse) == 1){

                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong>  Popup désactiv&eacute; avec succ&egrave;s</div>');

                                $('.msgbox').slideDown();

                                setTimeout(function(){ document.location.reload(); },1000);

                            }

                            else{

                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de la désactivation</div>');

                                $('.msgbox').slideDown();

                            }

                        });

                    }

                });

            });

        </script>

        <ol class="breadcrumb">

            <li><a href="index.php">Tableau de bord</a></li>

            <li class="active">Gestion des Popups</li>

        </ol>



        <div class="widget widget-blue">

            <div class="widget-title">

                <div class="widget-controls">

                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>

                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>

                </div>

                <h3><i class="icon-table"></i> Liste des popups</h3>

            </div>

            <div class="widget-content">

                <div class="msgbox"></div>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover datatable">

                        <thead>

                        <tr>

                            <th>ID</th>
                            <th>Titre</th>
                            <th>Date publication</th>
                            <th>Action</th>

                        </tr>

                        </thead>

                        <tbody>

                        <?php

                        $SQLselect = "SELECT id FROM ".__prefixe_db__."popup ORDER BY date_add DESC";

                        $result = $db->queryS($SQLselect);

                        foreach($result as $data){

                            $b = new popup($data['id'],$db,$_SESSION['langue']);

                            ?>

                            <tr id="row_<?php echo $b->getId();?>">

                                <td><?php echo $b->getId();?></td>

                                <td><?php echo $b->getTitre()?></td>
                                <td><?php echo normaldate($b->getDateAdd());?></td>
                                <td class="text-center">
                                    <?php if($b ->isActif()){ ?>

                                        <a  href="javascript:void(0)" id="disable_<?php echo $b->getId();?>" data-toggle="tooltip" data-placement="top" data-original-title="Activé" class="btn btn-success btn-xs disable"><i class="fa fa-toggle-on"></i></a>

                                    <?php }else{ ?>

                                        <a  href="javascript:void(0)" id="enable_<?php echo $b->getId();?>" data-toggle="tooltip" data-placement="top" data-original-title="Disactivé" class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>

                                    <?php } ?>

                                    <?php if($_SESSION['user']->hasDroit('edit', 'com_popup')){ ?>

                                        <a href="index.php?option=com_popup&task=edit&id=<?php echo $b->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Modifier" class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>

                                    <?php } ?>

                                    <?php if($_SESSION['user']->hasDroit('delete', 'com_popup')){ ?>

                                        <a href="#0" id="delete_<?php echo $b->getId();?>" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>

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

    function edit(){

        global $db;

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = intval($_GET['id']);

            $b = new popup($id,$db,$_SESSION['langue']);

            ?>

            <ol class="breadcrumb">

                <li><a href="index.php">Tableau de bord</a></li>

                <li><a href="index.php?option=com_popup">Popups</a></li>

                <li class="active">Modifier Popup</li>

            </ol>

            <div class="row">

                <div class="col-md-12">

                    <div class="msgbox"></div> <!-- conteneur de message -->

                    <div class="widget widget-green">

                        <div class="widget-title">

                            <div class="widget-controls">

                                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>

                                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>

                            </div>

                            <h3><i class="icon-edit-sign"></i> Modifier Popup</h3>

                        </div>

                        <div class="widget-content">

                            <?php include("components/com_popup/forms/form.php"); ?>

                        </div>

                    </div>

                </div>

            </div>

            <?php

        }

    }

    /* ---------------------------- add ---------------------------- */

    function add(){

        global $db;

        ?>

        <ol class="breadcrumb">

            <li><a href="index.php">Tableau de bord</a></li>

            <li><a href="index.php?option=com_popup">Popups</a></li>

            <li class="active">Ajouter Popup</li>

        </ol>

        <div class="row">

            <div class="col-md-12">

                <div class="msgbox"></div> <!-- conteneur de message -->

                <div class="widget widget-green">

                    <div class="widget-title">

                        <div class="widget-controls">

                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>

                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>

                        </div>

                        <h3><i class="icon-plus-sign-alt"></i> Ajouter Popup</h3>

                    </div>

                    <div class="widget-content">

                        <?php include("components/com_popup/forms/form.php"); ?>

                    </div>

                </div>

            </div>

        </div>

        <?php

    }

    ?>

</div>