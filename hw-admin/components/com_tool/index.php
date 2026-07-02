<div class="sub-sidebar-wrapper">
    <ul>
        <?php if($_SESSION['user']->hasDroit('add', 'com_tool')){ ?>
            <li><a href="index.php?option=com_tool&task=add"> Ajouter outil</a></li>
        <?php } ?>
        <li><a href="index.php?option=com_tool"> Liste des outils</a></li>
    </ul>
</div>
</div>
<div class="main-content">
    <?php
    @$task = $_GET['task'];
    switch($task){
        case 'edit' : if($_SESSION['user']->hasDroit('edit', 'com_tool')){ edit(); break; }
        case 'add' : if($_SESSION['user']->hasDroit('add', 'com_tool')){ add(); break; }
        case 'url' :  url(); break;
        default : if($_SESSION['user']->hasDroit('view', 'com_tool')){ showList(); } // Charge la liste des tools
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
                        $.post("components/com_tool/controleur/tool.php?task=deleteTool", order, function(theResponse){
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
            <li class="active">Gestion des outils</li>
        </ol>

        <div class="widget widget-blue">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
                </div>
                <h3><i class="icon-table"></i> Liste des outils</h3>
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
                        
                        $ids_tools = tool::findAll();
                        
                        foreach($ids_tools as $id_tool){
                            $t = new tool($id_tool,$db,$_SESSION['langue']);
                            
                            if($t->getTitre() == '') $t = new tool($id_tool, $db); // afficher le titre FR si la langue n'est pas rempli
                            ?>
                            <tr id="row_<?php echo $t->getId();?>">
                                <td><?php echo $t->getId();?></td>
                                <td><?php echo $t->getTitre();?></td>
                                <td>
                                    <?php if($t->getUrl()) :?>
                                        <a href="<?=$t->getUrl()?>" target="_blank">Visiter</a>
                                    <?php endif;?>
                                </td>
                                <td class="text-center">
                                    <?php if($t->isActif()){ ?>
                                        <a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="Active" class="btn btn-success btn-xs"><i class="icon-check2"></i></a>
                                    <?php } ?>
                                    <?php if($_SESSION['user']->hasDroit('edit', 'com_tool')){ ?>
                                        <a href="index.php?option=com_tool&task=edit&id=<?php echo $t->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Modifier" class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
                                    <?php } ?>
                                    <?php if($_SESSION['user']->hasDroit('delete', 'com_tool')){ ?>
                                        <a href="#0" id="delete_<?php echo $t->getId();?>" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs delete"><i class="icon-remove"></i></a>
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
            $t = new tool($id,$db,$_SESSION['langue']);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php">Tableau de bord</a></li>
                <li><a href="index.php?option=com_tool">Outils</a></li>
                <li class="active">Modifier outil</li>
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
                            <h3><i class="icon-edit-sign"></i> Modifier outil</h3>
                        </div>
                        <div class="widget-content">
                            <?php include("components/com_tool/forms/form.php"); ?>
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
            <li><a href="index.php?option=com_tool">Outils</a></li>
            <li class="active">Ajouter outil</li>
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
                        <h3><i class="icon-plus-sign-alt"></i> Ajouter outil</h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_tool/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
