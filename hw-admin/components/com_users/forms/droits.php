<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td><i class="fa fa-cube"></i> <?= $trad_com_users['MODULES'][$_SESSION['user']->getLangue()];?></td>
            <td><i class="icon-eye-open"></i> <?= $trad_com_users['DROIT_CONSULTER'][$_SESSION['user']->getLangue()];?></td>
            <td><i class="icon-plus"></i> <?= $trad_com_users['DROIT_AJOUTER'][$_SESSION['user']->getLangue()];?></td>
            <td><i class="icon-pencil"></i> <?= $trad_com_users['DROIT_MODIFIER'][$_SESSION['user']->getLangue()];?></td>
            <td><i class="fa fa-trash"></i> <?= $trad_com_users['DROIT_SUPPRIMER'][$_SESSION['user']->getLangue()];?></td>
        </tr>
        </thead>
        <tbody>
        <?php
        $c = new config($db);
        $actions = array('view', 'add', 'edit', 'delete');
        $ids_modules = module::findAll();
        foreach ($ids_modules as $id_module) {
            $m = new module($id_module, $db);
            ?>
            <tr>
                <td><?php echo $m->getNom(); ?></td>
                <?php
                foreach ($actions as $action) {
                    if ($p->hasDroit($action, $m->getIdModule())) {
                        $droit = '<a href="#0" name="disable:' . $p->getId() . ':' . $m->getIdModule() . ':' . $action . '" class="btn btn-success btn-xs droits"><i class="icon-check2"></i></a>';
                    } else {
                        $droit = '<a href="#0" name="enable:' . $p->getId() . ':' . $m->getIdModule() . ':' . $action . '" class="btn btn-danger btn-xs droits"><i class="icon-remove"></i></a>';
                    }
                    ?>
                    <td><?php echo $droit; ?></td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script>
    $(function () {

        $(".droits").click(function (event) {
            event.preventDefault();
            var $bt = $(this);
            var t = $(this).attr("name").split(":");
            var order = 'task=' + t[0] + '&profil=' + t[1] + '&module=' + t[2] + '&action=' + t[3];
            $.post("components/com_users/controleur/user.php?task=setDroit", order, function (theResponse) {
                if (parseInt(theResponse) == 1) {
                    if (t[0] == 'enable') {
                        $bt.attr("name", "disable:" + t[1] + ":" + t[2] + ":" + t[3]);
                        $bt.addClass("btn-success").removeClass("btn-danger");
                        $bt.html('<i class="icon-check2"></i>');
                    }

                    if (t[0] == 'disable') {
                        $bt.attr("name", "enable:" + t[1] + ":" + t[2] + ":" + t[3]);
                        $bt.addClass("btn-danger").removeClass("btn-success");
                        $bt.html('<i class="icon-remove"></i>');
                    }
                }
            });
        })

    })
</script>