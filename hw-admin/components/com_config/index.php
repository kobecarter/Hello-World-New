<?php
include_once "components/com_config/traduction.php";
?>
</div>
<div class="main-content">
    <?php
    @$task = $_GET['task'];
    switch ($task) {
        default :
            if ($_SESSION['user']->hasDroit('view', 'com_config')) {
                showForm();
            }
    }

    /* ---------------------------- function ---------------------------- */

    /* ---------------------------- showForm ---------------------------- */
    function showForm()
    {
        global $db;
        global $trad_com_config;
        $c = new config($db, $_SESSION['langue']);
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?= $trad_com_config['TABLE_BORD'][$_SESSION['user']->getLangue()];?></a></li>
            <li class="active"><?= $trad_com_config['com_config'][$_SESSION['user']->getLangue()];?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="msgbox"></div> <!-- conteneur de message -->
                <div class="widget widget-green">
                    <div class="widget-title">
                        <div class="widget-controls">
                            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="<?= $trad_com_config['ACTUALISER'][$_SESSION['user']->getLangue()];?>"><i class="icon-refresh"></i></a>
                            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="<?= $trad_com_config['MINIMISER'][$_SESSION['user']->getLangue()];?>"><i
                                        class="icon-minus-sign"></i></a>
                        </div>
                        <h3><i class="icon-gears"></i> <?= $trad_com_config['com_config'][$_SESSION['user']->getLangue()];?></h3>
                    </div>
                    <div class="widget-content">
                        <?php include("components/com_config/forms/form.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>
