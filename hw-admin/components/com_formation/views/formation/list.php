<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_formation')) { ?>
            <li><a href="index.php?option=com_formation&task=add"><i class="fa fa-plus"></i> Ajouter une formation</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_formation')) { ?>
            <li><a href="index.php?option=com_formation"><i class="fa fa-list"></i> Liste des formations</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li class="active">Formations</li>
    </ol>

    <div class="widget widget-blue">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
            </div>
            <h3><i class="fas fa-graduation-cap"></i> Liste des formations</h3>
        </div>
        <div class="widget-content">
            <div class="msgbox"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatable">
                    <caption style="text-align: left; margin-left: 7px; margin-top: 20px;">
                        <i class="fa fa-level-up fa-rotate-180" style="font-size: 25pt"></i>
                        <label for="" style="margin-left: 20px; vertical-align: top;">Avec la sélection :</label>
                        <div style="margin-left: 20px; display: inline-block; vertical-align: top;">
                            <?php if ($_SESSION['user']->hasDroit('edit', 'com_formation')) { ?>
                                <a href="#0" id="enable_multiple" class="btn btn-success btn-xs disable" data-toggle="tooltip" data-original-title="Activer"><i class="fa fa-toggle-on"></i></a>
                                <a href="#0" id="disable_multiple" class="btn btn-warning btn-xs disable" data-toggle="tooltip" data-original-title="Désactiver"><i class="fa fa-toggle-off"></i></a>
                            <?php } ?>
                            <?php if ($_SESSION['user']->hasDroit('delete', 'com_formation')) { ?>
                                <a href="#0" id="delete_multiple" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                            <?php } ?>
                        </div>
                    </caption>
                    <thead>
                        <tr>
                            <th style="width: 118px;">
                                <input type="hidden" id="idVal">
                                <input type="checkbox" name="" id="checkAll"><label for="checkAll">Tout cocher</label>
                            </th>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($formations as $formation): ?>
                        <tr id="row_<?= $formation->getId(); ?>">
                            <td><input type="checkbox" class="checkElement" value="<?= $formation->getId(); ?>"></td>
                            <td><?= $formation->getId(); ?></td>
                            <td><?= htmlspecialchars($formation->getTitre(), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php
                                $typeLabel = $formation->getTypeFormation() == 'distance' ? '<span class="label label-info">À distance</span>' : '<span class="label label-default">Présentiel</span>';
                                echo $typeLabel;
                                ?>
                            </td>
                            <td><?= $formation->getDateDebut() ? date('d/m/Y', strtotime($formation->getDateDebut())) : '—'; ?></td>
                            <td><?= $formation->getDateFin()   ? date('d/m/Y', strtotime($formation->getDateFin()))   : '—'; ?></td>
                            <td>
                                <?php
                                $statusLabels = [
                                    'brouillon' => 'label-default',
                                    'publie'    => 'label-success',
                                    'complet'   => 'label-warning',
                                    'archive'   => 'label-danger',
                                ];
                                $statusNames = [
                                    'brouillon' => 'Brouillon',
                                    'publie'    => 'Publié',
                                    'complet'   => 'Complet',
                                    'archive'   => 'Archivé',
                                ];
                                $st = $formation->getStatus();
                                $labelClass = isset($statusLabels[$st]) ? $statusLabels[$st] : 'label-default';
                                $labelName  = isset($statusNames[$st])  ? $statusNames[$st]  : ucfirst($st);
                                echo '<span class="label ' . $labelClass . '">' . $labelName . '</span>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php if ($formation->isActive() && $_SESSION['user']->hasDroit('edit', 'com_formation')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $formation->getId(); ?>_oui" data-toggle="tooltip" data-placement="top" data-original-title="Activée" class="btn btn-success btn-xs enable"><i class="fa fa-toggle-on"></i></a>
                                <?php } else if (!$formation->isActive() && $_SESSION['user']->hasDroit('edit', 'com_formation')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $formation->getId(); ?>_non" data-toggle="tooltip" data-placement="top" data-original-title="Désactivée" class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('edit', 'com_formation')) { ?>
                                    <a href="index.php?option=com_formation&task=edit&id=<?= $formation->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Modifier" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt icon-pencil"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('delete', 'com_formation')) { ?>
                                    <a href="javascript:void(0)" id="delete_<?= $formation->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
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
        if (confirm("Voulez-vous supprimer cette formation ?")) {
            var btn = $(this);
            var t   = btn.attr("id").split("_");
            var id  = t[1];
            $.post("components/com_formation/controleurs/router.php?task=deleteFormation", "id=" + id, function (theResponse) {
                if (parseInt(theResponse) === 1) {
                    $("#row_" + id).addClass("danger");
                    setTimeout(function () { $("#row_" + id).remove(); }, 300);
                    $(".msgbox").html("<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i> <strong>Succès</strong> Formation supprimée avec succès.</div>").slideDown();
                } else {
                    $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur!</strong> Erreur lors de la suppression.</div>").slideDown();
                }
            });
        }
    });

    $(".enable").click(function () {
        var btn   = $(this);
        var t     = btn.attr("id").split("_");
        var id    = t[1];
        var state = t[2];
        $.post("components/com_formation/controleurs/router.php?task=enableFormation", "id=" + id + "&state=" + state, function (theResponse) {
            if (parseInt(theResponse) === 1) {
                if (state === "oui") {
                    btn.attr("id", "enable_" + id + "_non").removeClass("btn-success").addClass("btn-warning").attr("data-original-title", "Désactivée").html("<i class='fa fa-toggle-off'>");
                } else {
                    btn.attr("id", "enable_" + id + "_oui").removeClass("btn-warning").addClass("btn-success").attr("data-original-title", "Activée").html("<i class='fa fa-toggle-on'>");
                }
            } else {
                $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur!</strong> Erreur lors de l'activation.</div>").slideDown();
            }
        });
    });

    $('#enable_multiple, #disable_multiple').click(function () {
        var active = ($(this).attr('id') == "enable_multiple") ? 1 : 0;
        var idsT   = [];
        $(".checkElement").each(function () { if ($(this).is(':checked')) idsT.push($(this).val()); });
        if (idsT.length) {
            if (confirm("Voulez-vous " + (active ? "activer" : "désactiver") + " les formations sélectionnées ?")) {
                $.post("components/com_formation/controleurs/router.php?task=enableFormations", "ids=(" + idsT + ")&active=" + active, function (theResponse) {
                    if (parseInt(theResponse) == 1) {
                        location.reload();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><strong>Erreur!</strong> Erreur lors de l'activation.</div>").slideDown();
                    }
                });
            }
        } else {
            $(".msgbox").html("<div class='alert alert-warning alert-dismissable'><strong>Avertissement!</strong> Aucune ligne sélectionnée.</div>").slideDown();
        }
    });

    $('#delete_multiple').click(function () {
        var idsT = [];
        $(".checkElement").each(function () { if ($(this).is(':checked')) idsT.push($(this).val()); });
        if (idsT.length) {
            if (confirm("Voulez-vous supprimer les formations sélectionnées ?")) {
                $.post("components/com_formation/controleurs/router.php?task=deleteFormations", "ids=(" + idsT + ")", function (theResponse) {
                    if (parseInt(theResponse) == 1) {
                        for (var i = 0; i < idsT.length; i++) { $("#row_" + idsT[i]).remove(); }
                        $(".msgbox").html("<div class='alert alert-success alert-dismissable'><strong>Succès</strong> Formations supprimées avec succès.</div>").slideDown();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><strong>Erreur!</strong> Erreur lors de la suppression.</div>").slideDown();
                    }
                });
            }
        } else {
            $(".msgbox").html("<div class='alert alert-warning alert-dismissable'><strong>Avertissement!</strong> Aucune ligne sélectionnée.</div>").slideDown();
        }
    });

    $('#checkAll').change(function () {
        var status = $('#checkAll').is(':checked');
        $('.checkElement').prop('checked', status);
    });

    $('.checkElement').click(function () {
        if (!$(this).is(':checked')) {
            $('#checkAll').prop('checked', false);
        } else {
            var all = true;
            $('.checkElement').each(function () { if (!$(this).is(':checked')) all = false; });
            $('#checkAll').prop('checked', all);
        }
    });
});
</script>
