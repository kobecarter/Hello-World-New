<div class="sub-sidebar-wrapper">
    <ul>
        <?php if($_SESSION['user']->hasDroit('add', 'com_partner')){ ?>
            <li><a href="index.php?option=com_partner&task=add"> Ajouter partenaire</a></li>
        <?php } ?>
        <li><a href="index.php?option=com_partner"> Liste des partenaires</a></li>
    </ul>
</div>
</div>
<div class="main-content">
    <?php
    @$task = $_GET['task'];
    switch($task){
        case 'edit' : if($_SESSION['user']->hasDroit('edit', 'com_partner')){ edit(); break; }
        case 'add' : if($_SESSION['user']->hasDroit('add', 'com_partner')){ add(); break; }
        case 'url' :  url(); break;
        default : if($_SESSION['user']->hasDroit('view', 'com_partner')){ showList(); } // Charge la liste des partners
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showList ---------------------------- */
    function showList(){
        global $db;
        ?>
        <script type="text/javascript">
            $(function(){

                $(".delete").click(function(){
                    if(confirm("Voulez vous supprimer ce partenaire ??")){
                        var t = $(this).attr("id").split("_");
                        var id = t[1];
                        var order = 'id='+id;
                        $.post("components/com_partner/controleur/partner.php?task=deletePartner", order, function(theResponse){
                            if(theResponse == '1'){
                                $("#row_"+id).addClass("danger");
                                setTimeout(function(){$("#row_"+id).remove()},300);
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> partenaire supprim&eacute; avec succ&egrave;s</div>');
                                $('.msgbox').slideDown();
                            }
                            else{
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de la suppression</div>');
                                $('.msgbox').slideDown();
                            }
                        });
                    }
                })
            });
        </script>
        <ol class="breadcrumb">
            <li><a href="index.php">Tableau de bord</a></li>
            <li class="active">Gestion des partenaires</li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> Liste des partenaires</h3>
            </div>
            <div class="widget-content">
                <div class="msgbox"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ids_partners = partner::findAll();
                        foreach($ids_partners as $id_partner){
                            $p = new partner($id_partner,$db,$_SESSION['langue']);
                            if($p->getTitre() == '') $p = new partner($id_partner, $db); // afficher le titre FR si la langue n'est pas rempli
                            ?>
                            <tr id="row_<?php echo $p->getId();?>">
                                <td><?php echo $p->getId();?></td>
                                <td><?php echo $p->getTitre();?></td>
                                <td>
                                    <?php if($p->getUrl()) :?>
                                        <a href="<?=$p->getUrl()?>" target="_blank">Visiter</a>
                                    <?php endif;?>
                                </td>
                                <td class="text-center">
                                    <?php if($p->isActif()){ ?>
                                        <a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="Active" class="btn btn-success btn-xs"><i class="icon-check2"></i></a>
                                    <?php } ?>
                                    <?php if($_SESSION['user']->hasDroit('edit', 'com_partner')){ ?>
                                        <a href="index.php?option=com_partner&task=edit&id=<?php echo $p->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Modifier" class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if($_SESSION['user']->hasDroit('delete', 'com_partner')){ ?>
                                        <a href="#0" id="delete_<?php echo $p->getId();?>" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs delete"><i class="icon-remove"></i></a>
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
            $p = new partner($id,$db,$_SESSION['langue']);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php">Tableau de bord</a></li>
                <li><a href="index.php?option=com_partner">Partenaires</a></li>
                <li class="active">Modifier partenaire</li>
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
                            <h3><i class="icon-edit-sign"></i> Modifier partenaire</h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_partner/forms/form.php"); ?>
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
            <li><a href="index.php?option=com_partner">Partenaires</a></li>
            <li class="active">Ajouter partenaire</li>
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
                        <h3><i class="icon-plus-sign-alt"></i> Ajouter partenaire</h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_partner/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
