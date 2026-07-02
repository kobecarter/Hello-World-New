<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_galerie')) { ?>
            <li><a href="index.php?option=com_galerie&task=items"> Ajouter galerie</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_galerie')) { ?>
            <li><a href="index.php?option=com_galerie"> Liste des galeries</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li><a href="index.php?option=com_galerie">Galeries</a></li>
        <li class="active">Ajouter Photo : <?php echo $galerie->getTitre(); ?></li>
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
                    <h3><i class="icon-plus-sign"></i> Ajouter Photo</h3>
                </div>
                <div class="widget-content">
                    <?php include_once ("form.php");  ?>
                </div>
            </div>
        </div>
    </div>

    <?php include_once ("list.php");  ?>

</div>