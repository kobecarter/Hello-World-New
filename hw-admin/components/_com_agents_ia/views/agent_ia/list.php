<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_agents_ia')) { ?>
            <li><a href="index.php?option=com_agents_ia&task=add"> Ajouter agent IA</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_agents_ia')) { ?>
            <li><a href="index.php?option=com_agents_ia"> Liste des agents IA</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li class="active">Agents IA</li>
    </ol>

    <div class="widget widget-blue">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
            </div>
            <h3><i class="fas fa-robot"></i> Liste des agents IA</h3>
        </div>
        <div class="widget-content">
            <div class="msgbox"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatable">
                    <caption style="text-align: left; margin-left: 7px; margin-top: 20px;">
                        <i class="fa fa-level-up fa-rotate-180" style="font-size: 25pt"></i>
                        <label for="" style="margin-left: 20px; vertical-align: top;">Avec la sélection :</label>
                        <div style="margin-left: 20px; display: inline-block; vertical-align: top;">
                            <?php if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) { ?>
                                <a href="#0" id="enable_multiple" class="btn btn-success btn-xs disable" data-toggle="tooltip" data-original-title="Activer"><i class="fa fa-toggle-on"></i></a>
                                <a href="#0" id="disable_multiple" class="btn btn-warning btn-xs disable" data-toggle="tooltip" data-original-title="Désactiver"><i class="fa fa-toggle-off"></i></a>
                            <?php } ?>
                            <?php if ($_SESSION['user']->hasDroit('delete', 'com_agents_ia')) { ?>
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
                            <th>Sous-titre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($agents_ia as $agent_ia): ?>
                        <tr id="row_<?= $agent_ia->getId(); ?>">
                            <td><input type="checkbox" class="checkElement" value="<?= $agent_ia->getId(); ?>"></td>
                            <td><?= $agent_ia->getId(); ?></td>
                            <td><?= $agent_ia->getTitre(); ?></td>
                            <td><?= $agent_ia->getSousTitre(); ?></td>
                            <td class="text-center">
                                <?php if ($agent_ia->isActive() && $_SESSION['user']->hasDroit('edit', 'com_agents_ia')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $agent_ia->getId(); ?>_oui" data-toggle="tooltip" data-placement="top" data-original-title="Activé" class="btn btn-success btn-xs enable"><i class="fa fa-toggle-on"></i></a>
                                <?php } else if (!$agent_ia->isActive() && $_SESSION['user']->hasDroit('edit', 'com_agents_ia')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $agent_ia->getId(); ?>_non" data-toggle="tooltip" data-placement="top" data-original-title="Désactivé" class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('edit', 'com_agents_ia')) { ?>
                                    <a href="index.php?option=com_agents_ia&task=edit&id=<?= $agent_ia->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Modifier" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt icon-pencil"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('delete', 'com_agents_ia')) { ?>
                                    <a href="javascript:void(0)" id="delete_<?= $agent_ia->getId(); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
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
        if (confirm("Voulez vous supprimer cet agent IA ?")) {
            var btn = $(this);
            var t   = btn.attr("id").split("_");
            var id  = t[1];
            $.post("components/com_agents_ia/controleurs/router.php?task=deleteAgentIa", "id=" + id, function (theResponse) {
                if (parseInt(theResponse) === 1) {
                    $("#row_" + id).addClass("danger");
                    setTimeout(function () { $("#row_" + id).remove(); }, 300);
                    $(".msgbox").html("<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i> <strong>Succès</strong> Agent IA supprimé avec succès.</div>").slideDown();
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
        $.post("components/com_agents_ia/controleurs/router.php?task=enableAgentIa", "id=" + id + "&state=" + state, function (theResponse) {
            if (parseInt(theResponse) === 1) {
                if (state === "oui") {
                    btn.attr("id", "enable_" + id + "_non").removeClass("btn-success").addClass("btn-warning").attr("data-original-title", "Désactivé").html("<i class='fa fa-toggle-off'>");
                } else {
                    btn.attr("id", "enable_" + id + "_oui").removeClass("btn-warning").addClass("btn-success").attr("data-original-title", "Activé").html("<i class='fa fa-toggle-on'>");
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
            if (confirm("Voulez vous " + (active ? "activer" : "désactiver") + " les agents sélectionnés ?")) {
                $.post("components/com_agents_ia/controleurs/router.php?task=enableAgentsIa", "ids=(" + idsT + ")&active=" + active, function (theResponse) {
                    if (parseInt(theResponse) == 1) {
                        location.reload();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><strong>Erreur!</strong> Erreur lors de l'activation</div>").slideDown();
                    }
                });
            }
        } else {
            $(".msgbox").html("<div class='alert alert-warning alert-dismissable'><strong>Avertissement!</strong> Aucune ligne sélectionnée</div>").slideDown();
        }
    });

    $('#delete_multiple').click(function () {
        var idsT = [];
        $(".checkElement").each(function () { if ($(this).is(':checked')) idsT.push($(this).val()); });
        if (idsT.length) {
            if (confirm("Voulez vous supprimer les agents sélectionnés ?")) {
                $.post("components/com_agents_ia/controleurs/router.php?task=deleteAgentsIa", "ids=(" + idsT + ")", function (theResponse) {
                    if (parseInt(theResponse) == 1) {
                        for (var i = 0; i < idsT.length; i++) { $("#row_" + idsT[i]).remove(); }
                        $(".msgbox").html("<div class='alert alert-success alert-dismissable'><strong>Succès</strong> Agents supprimés avec succès</div>").slideDown();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><strong>Erreur!</strong> Erreur lors de la suppression</div>").slideDown();
                    }
                });
            }
        } else {
            $(".msgbox").html("<div class='alert alert-warning alert-dismissable'><strong>Avertissement!</strong> Aucune ligne sélectionnée</div>").slideDown();
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
