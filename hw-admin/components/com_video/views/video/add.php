<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_video')) { ?>
            <li><a href="index.php?option=com_video&task=add"> Ajouter vidéo</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_video')) { ?>
            <li><a href="index.php?option=com_video"> Liste des vidéos</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li><a href="index.php?option=com_video">Vidéos</a></li>
        <li class="active">Ajouter vidéo</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="msgbox"></div>
            <div class="widget widget-green">
                <div class="widget-title">
                    <div class="widget-controls">
                        <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                           data-placement="top" title="" data-original-title="Refresh"><i
                                    class="icon-refresh"></i></a>
                        <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                           data-placement="top" title="" data-original-title="Minimize"><i
                                    class="icon-minus-sign"></i></a>
                    </div>
                    <h3><i class="icon-edit-sign"></i> Ajouter vidéo</h3>
                </div>
                <div class="widget-content">
                    <?php include_once ("form.php"); ?>
                </div>
            </div>
        </div>
    </div>

</div>