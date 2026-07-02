<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_categorie')) { ?>
            <li><a href="index.php?option=com_categorie&task=add"> Ajouter categorie</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_categorie')) { ?>
            <li><a href="index.php?option=com_categorie"> Liste des categories</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li class="active">Liste des categories</li>
    </ol>

    <div class="widget widget-blue">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                   title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                   data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
            </div>
            <h3><i class="icon-table"></i> Liste des categories</h3>
        </div>
        <div class="widget-content">
            <div class="msgbox"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Ordre</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $categorie): ?>
                        <tr id="row_<?= $categorie->getId(); ?>">
                            <td><?= $categorie->getId(); ?></td>
                            <td><?= $categorie->getTitre(); ?></td>
                            <td><?= $categorie->getOrdre(); ?></td>
                            <td class="text-center">
                                <?php if ($categorie->isActive() && $_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $categorie->getId(); ?>_oui"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Activé"
                                       class="btn btn-success btn-xs enable"><i class="fa fa-toggle-on"></i></a>
                                <?php } else if (!$categorie->isActive() && $_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $categorie->getId(); ?>_non"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Désactivé"
                                       class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                    <a href="index.php?option=com_categorie&task=edit&id=<?= $categorie->getId(); ?>"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Modifier"
                                       class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('delete', 'com_categorie')) { ?>
                                    <a href="javascript:void(0)" id="delete_<?= $categorie->getId(); ?>"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Supprimer"
                                       class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php if($categorie->hasChildren()): ?>
                            <?php $ss_categories = $categorie->getChildren($_SESSION["langue"]); ?>
                            <?php foreach($ss_categories as $ss_categorie): ?>
                                <tr id="row_<?= $ss_categorie->getId(); ?>">
                                    <td><?= $ss_categorie->getId(); ?></td>
                                    <td>___ <?= $ss_categorie->getTitre(); ?></td>
                                    <td><?= $ss_categorie->getOrdre(); ?></td>
                                    <td class="text-center">
                                        <?php if ($ss_categorie->isActive() && $_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                            <a href="javascript:void(0)" id="enable_<?= $ss_categorie->getId(); ?>_oui"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Activé"
                                               class="btn btn-success btn-xs enable"><i class="fa fa-toggle-on"></i></a>
                                        <?php } else if (!$ss_categorie->isActive() && $_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                            <a href="javascript:void(0)" id="enable_<?= $ss_categorie->getId(); ?>_non"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Désactivé"
                                               class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>
                                        <?php } ?>
                                        <?php if ($_SESSION['user']->hasDroit('edit', 'com_categorie')) { ?>
                                            <a href="index.php?option=com_categorie&task=edit&id=<?= $ss_categorie->getId(); ?>"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Modifier"
                                               class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                        <?php } ?>
                                        <?php if ($_SESSION['user']->hasDroit('delete', 'com_categorie')) { ?>
                                            <a href="javascript:void(0)" id="delete_<?= $ss_categorie->getId(); ?>"
                                               data-toggle="tooltip" data-placement="top" data-original-title="Supprimer"
                                               class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function () {

        $(".delete").click(function () {
            if (confirm("Voulez vous supprimer cet categorie ?")) {
                var btn = $(this);
                var t = btn.attr("id").split("_");
                var id = t[1];
                var order = "id=" + id;
                $.post("components/com_categorie/controleurs/router.php?task=deleteCategorie", order, function (theResponse) {
                    var success_msg = "Actualité supprimée avec succès.";
                    var error_msg = "Erreur lors de la suppression.";
                    if (parseInt(theResponse) === 1) {
                        $("#row_" + id).addClass("danger");
                        setTimeout(function () {
                            $("#row_" + id).remove()
                        }, 300);
                        $(".msgbox").html("<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i> <strong>Succès </strong>" + success_msg + "</div>").slideDown();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur! </strong>" + error_msg + "</div>").slideDown();
                    }
                });
            }
        });

        $(".enable").click(function () {
            var btn = $(this);
            var t = btn.attr("id").split("_");
            var id = t[1];
            var state = t[2];
            var order = 'id=' + id + "&state=" + state;
            $.post("components/com_categorie/controleurs/router.php?task=enableCategorie", order, function (theResponse) {
                var error_msg = "Erreur lors de l'activation.";
                if (state === "oui") {
                    error_msg = "Erreur lors de la désactivation.";
                }
                if (parseInt(theResponse) === 1) {
                    if (state === "oui") {
                        btn.attr("id", "enable_" + id + "_non").removeClass("btn-success").addClass("btn-warning").attr("data-original-title", "Désactivé").html("<i class='fa fa-toggle-off'>");
                    } else {
                        btn.attr("id", "enable_" + id + "_oui").removeClass("btn-warning").addClass("btn-success").attr("data-original-title", "Activé").html("<i class='fa fa-toggle-on'>");
                    }
                } else {
                    $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur! </strong>" + error_msg + "</div>").slideDown();
                }
            });
        });

    });
</script>
