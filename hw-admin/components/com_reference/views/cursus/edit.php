<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_reference')) { ?>
            <li><a href="index.php?option=com_reference&task=add"> Ajouter référence</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_reference')) { ?>
            <li><a href="index.php?option=com_reference"> Liste des références</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li><a href="index.php?option=com_reference">Références</a></li>
        <li class="active">Modifier cursus</li>
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
                    <h3><i class="icon-edit-sign"></i> Modifier cursus</h3>
                </div>
                <div class="widget-content">
                    <?php include_once ("form.php"); ?>
                </div>
            </div>
        </div>
    </div>

    <?php include_once ("list.php");  ?>

</div>