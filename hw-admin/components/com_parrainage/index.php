<?php
// Gestion des parrainages clients (self-contained, protégé par la session admin).
// Le routage admin se fait par existence de fichier (index.php?option=com_parrainage),
// donc pas besoin d'enregistrer un module / des droits pour l'afficher.
if (!isset($_SESSION['user'])) {
    echo '<div class="main-content"><div class="alert alert-danger">Accès refusé.</div></div>';
    return;
}

$rows = $db->queryS("SELECT * FROM " . __prefixe_db__ . "parrainage ORDER BY id DESC");
if (!is_array($rows)) { $rows = array(); }
$statuts = array(0 => "En attente", 1 => "Contacté", 2 => "Converti", 3 => "Clôturé");
// Récompenses proposées (cases à cocher). Modifiez librement cette liste.
$recompenses = array(
    "Crédits Google Ads",
    "Réduction sur facture",
    "Points de fidélité",
    "Carte-cadeau",
    "Audit SEO offert",
    "Formation offerte",
);
?>
<style>
    .pa-recompense-cell { min-width: 200px; }
    .pa-check { display: block; font-weight: 400; font-size: 12px; margin: 0 0 3px; cursor: pointer; }
    .pa-check input { margin-right: 5px; vertical-align: middle; }
</style>
<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li class="active">Parrainages</li>
    </ol>

    <div class="widget widget-blue">
        <div class="widget-title">
            <h3><i class="fa fa-handshake-o"></i> Parrainages clients (<?php echo count($rows); ?>)</h3>
        </div>
        <div class="widget-content">
            <div class="msgbox"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Parrain</th>
                        <th>Filleul</th>
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th style="min-width:140px;">Statut</th>
                        <th style="min-width:170px;">Récompense</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($rows)) : ?>
                        <tr><td colspan="9" class="text-center text-muted">Aucun parrainage pour l'instant.</td></tr>
                    <?php else : foreach ($rows as $r) : ?>
                        <tr id="prow_<?php echo (int) $r['id']; ?>">
                            <td><?php echo (int) $r['id']; ?></td>
                            <td><?php echo htmlspecialchars($r['parrain_nom']); ?><br><small class="text-muted"><?php echo htmlspecialchars($r['parrain_email']); ?></small></td>
                            <td><b><?php echo htmlspecialchars($r['filleul_nom']); ?></b><?php if (!empty($r['filleul_entreprise'])) : ?><br><small class="text-muted"><?php echo htmlspecialchars($r['filleul_entreprise']); ?></small><?php endif; ?></td>
                            <td><small><?php echo htmlspecialchars($r['filleul_email']); ?><?php if (!empty($r['filleul_tel'])) : ?><br><?php echo htmlspecialchars($r['filleul_tel']); ?><?php endif; ?></small></td>
                            <td><small><?php echo !empty($r['message']) ? nl2br(htmlspecialchars($r['message'])) : '<span class="text-muted">—</span>'; ?></small></td>
                            <td><small><?php echo htmlspecialchars($r['date_add']); ?></small></td>
                            <td>
                                <select class="form-control input-sm pa-statut">
                                    <?php foreach ($statuts as $k => $v) : ?>
                                        <option value="<?php echo $k; ?>" <?php echo ((int) $r['statut'] === $k) ? 'selected' : ''; ?>><?php echo $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="pa-recompense-cell">
                                <?php $selRec = array_filter(array_map('trim', explode(',', (string) $r['recompense']))); ?>
                                <?php foreach ($recompenses as $rc) : ?>
                                    <label class="pa-check"><input type="checkbox" class="pa-recompense-cb" value="<?php echo htmlspecialchars($rc); ?>" <?php echo in_array($rc, $selRec) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($rc); ?></label>
                                <?php endforeach; ?>
                            </td>
                            <td><a href="javascript:void(0)" class="btn btn-success btn-xs pa-save" data-id="<?php echo (int) $r['id']; ?>"><i class="fa fa-save"></i> Enregistrer</a></td>
                        </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function () {
        $('.pa-save').click(function () {
            var btn = $(this), id = btn.data('id'), row = $('#prow_' + id);
            var recompense = row.find('.pa-recompense-cb:checked').map(function () { return this.value; }).get().join(', ');
            var order = 'id=' + id + '&statut=' + encodeURIComponent(row.find('.pa-statut').val()) + '&recompense=' + encodeURIComponent(recompense);
            $.post('components/com_parrainage/controleurs/router.php?task=update', order, function (resp) {
                if (parseInt(resp) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i> <strong>Succès </strong>Parrainage mis à jour.</div>').slideDown();
                } else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="fa fa-times"></i> <strong>Erreur! </strong>Mise à jour impossible.</div>').slideDown();
                }
            });
        });
    });
</script>
