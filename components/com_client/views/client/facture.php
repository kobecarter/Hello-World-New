<?php
/* -------------------------------------------------------------------------
   "Attention" data for the client: domain / hosting / SSL renewals coming up
   (or already overdue) + invoices that still have an outstanding balance.
   Consumed by the "À votre attention" panel and the reminders tab below.
   ------------------------------------------------------------------------- */
$__today = new DateTime('today');

// Reminders: skip archived ones and rows without a real expiry date.
$__remActive = array();   // every active reminder, with signed day delta
$__expSoon   = array();   // subset that needs attention (overdue or <= 60 days)
foreach ($rapples as $__r) {
    if (isset($__r->archived) && (int) $__r->archived === 1) continue;
    if (empty($__r->date_expir) || $__r->date_expir === '0000-00-00') continue;
    try { $__d = new DateTime($__r->date_expir); } catch (Exception $e) { continue; }
    $__days = (int) $__today->diff($__d)->format('%r%a'); // signed days to expiry
    $__item = array('r' => $__r, 'days' => $__days);
    $__remActive[] = $__item;
    if ($__days <= 60) $__expSoon[] = $__item;
}
$__sortByDays = function ($a, $b) { return $a['days'] <=> $b['days']; };
usort($__remActive, $__sortByDays);
usort($__expSoon, $__sortByDays);

// Invoices with money still owed (reste > 0), plus the total due per currency.
$__pending  = array();
$__dueByCur = array();
foreach ($factures as $__f) {
    $__reste = (float) $__f->reste;
    if ($__reste > 0.005) {
        $__pending[] = $__f;
        $__cur = isset($__f->devise) ? $__f->devise : '';
        if (!isset($__dueByCur[$__cur])) $__dueByCur[$__cur] = 0.0;
        $__dueByCur[$__cur] += $__reste;
    }
}
$__hasAttn = (count($__expSoon) > 0 || count($__pending) > 0);
$__notifCount = count($__expSoon) + count($__pending); // badge on the notification bell

// Avis client : témoignage déjà soumis ? (stocké dans la base du site)
global $db;
$__avis = null;
if (!empty($clientId)) {
    $__ar = $db->queryS(sprintf("SELECT a.note, a.message, t.active AS temoignage_active FROM " . __prefixe_db__ . "avis_client a LEFT JOIN " . __prefixe_db__ . "temoignage t ON t.id = a.id_temoignage WHERE a.id_client = %s ORDER BY a.id DESC LIMIT 1", GetSQLValueString((int) $clientId, "int")));
    if (is_array($__ar) && count($__ar) > 0) { $__avis = $__ar[0]; }
}
$__gmbOn = defined('GMB_REVIEW_URL') && GMB_REVIEW_URL !== '';

// Parrainage : filleuls recommandés par ce client.
$__parrainages = array();
if (!empty($clientId)) {
    $__pr = $db->queryS(sprintf("SELECT filleul_nom, filleul_entreprise, filleul_email, statut, recompense, date_add FROM " . __prefixe_db__ . "parrainage WHERE id_parrain = %s ORDER BY id DESC", GetSQLValueString((int) $clientId, "int")));
    if (is_array($__pr)) { $__parrainages = $__pr; }
}
// Stats parrainage (résumé sous le profil).
$__parrainTotal = count($__parrainages);
$__parrainConverted = 0; $__parrainPending = 0; $__parrainRewards = array();
foreach ($__parrainages as $__pp) {
    $__ps = (int) $__pp['statut'];
    if ($__ps === 2) { $__parrainConverted++; if (!empty($__pp['recompense'])) { $__parrainRewards[] = $__pp['recompense']; } }
    elseif ($__ps === 0 || $__ps === 1) { $__parrainPending++; }
}

// Shared display helpers (label / icon / status for a reminder).
$__typeLabel = function ($type) use ($lang) {
    $t = strtolower(trim((string) $type));
    if ($t === 'domaine' || $t === 'domain') return $lang['CL_TYPE_DOMAINE'][$_SESSION['lang']];
    if ($t === 'hosting'  || $t === 'hebergement') return $lang['CL_TYPE_HOSTING'][$_SESSION['lang']];
    if ($t === 'ssl') return $lang['CL_TYPE_SSL'][$_SESSION['lang']];
    return htmlspecialchars((string) $type);
};
$__typeIcon = function ($type) {
    $t = strtolower(trim((string) $type));
    if ($t === 'hosting' || $t === 'hebergement') return 'ti ti-server';
    if ($t === 'ssl') return 'ti ti-lock';
    return 'ti ti-world';
};
// Returns array(cssKey, label) for an expiry from its signed day delta.
$__expStatus = function ($days) use ($lang) {
    if ($days < 0)   return array('exp',  sprintf($lang['CL_EXP_AGO_DAYS'][$_SESSION['lang']], abs($days)));
    if ($days === 0) return array('soon', $lang['CL_EXP_TODAY'][$_SESSION['lang']]);
    if ($days <= 30) return array('soon', sprintf($lang['CL_EXP_IN_DAYS'][$_SESSION['lang']], $days));
    return array('ok', sprintf($lang['CL_EXP_IN_DAYS'][$_SESSION['lang']], $days));
};
?>
<!-- CLIENT SPACE HERO -->
<section class="cl-dash-hero">
	<span class="cl-dash-hero-ghost" aria-hidden="true">Client</span>
	<div class="container cl-dash-hero-inner">
		<div class="cl-dash-hero-lead">
			<div class="cl-dash-hero-bread">
				<a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['CL_HOME'][$_SESSION['lang']]; ?></a>
				<i class="fa fa-chevron-right"></i>
				<span><?php echo $page->getTitre(); ?></span>
			</div>
			<div class="cl-dash-hero-label"><?php echo $lang['CL_SPACE_LABEL'][$_SESSION['lang']]; ?></div>
			<h1 class="cl-dash-hero-title"><?php echo $lang['CL_HELLO'][$_SESSION['lang']]; ?> <em><?= trim($user->nom . " " . $user->prenom) ?: 'Client' ?></em></h1>
		</div>
		<div class="cl-dash-hero-actions">
			<div class="cl-notif" id="clNotif">
				<button type="button" class="cl-notif-btn<?php echo $__notifCount > 0 ? ' has-alert' : ''; ?>" id="clNotifBtn" aria-haspopup="true" aria-expanded="false" aria-label="<?php echo $lang['CL_NOTIF_TITLE'][$_SESSION['lang']]; ?>">
					<i class="fa fa-bell"></i>
					<?php if ($__notifCount > 0) : ?><span class="cl-notif-badge"><?php echo $__notifCount; ?></span><?php endif; ?>
				</button>
				<div class="cl-notif-panel" id="clNotifPanel" role="menu" aria-hidden="true">
					<div class="cl-notif-head">
						<span><?php echo $lang['CL_NOTIF_TITLE'][$_SESSION['lang']]; ?></span>
						<?php if ($__notifCount > 0) : ?><span class="cl-notif-count"><?php echo $__notifCount; ?></span><?php endif; ?>
					</div>
					<div class="cl-notif-body">
						<?php if ($__notifCount === 0) : ?>
						<div class="cl-notif-empty"><i class="fa fa-check-circle"></i> <?php echo $lang['CL_NOTIF_EMPTY'][$_SESSION['lang']]; ?></div>
						<?php else : ?>
						<?php foreach ($__expSoon as $__e) :
							list($__cls, $__stLabel) = $__expStatus($__e['days']);
							$__r = $__e['r']; ?>
						<a class="cl-notif-item is-<?php echo $__cls; ?>" href="javascript:void(0)" data-cl-tab="tabs-4">
							<span class="cl-notif-ico"><i class="<?php echo $__typeIcon($__r->type); ?>"></i></span>
							<span class="cl-notif-txt">
								<b><?php echo htmlspecialchars($__r->domaine); ?></b>
								<small><?php echo $__typeLabel($__r->type) . ' &middot; ' . $__stLabel; ?></small>
							</span>
						</a>
						<?php endforeach; ?>
						<?php foreach ($__pending as $__f) :
							$__isUnpaid = ((float) $__f->total <= (float) $__f->reste + 0.005);
							$__pcls = $__isUnpaid ? 'exp' : 'soon';
							$__plabel = $__isUnpaid ? $lang['CL_ST_UNPAID'][$_SESSION['lang']] : $lang['CL_ST_PARTIAL'][$_SESSION['lang']]; ?>
						<a class="cl-notif-item is-<?php echo $__pcls; ?>" href="javascript:void(0)" data-cl-tab="tabs-1">
							<span class="cl-notif-ico"><i class="ti ti-files"></i></span>
							<span class="cl-notif-txt">
								<b><?php echo number_format((float) $__f->reste, 2, ',', ' ') . ' ' . $__f->devise; ?></b>
								<small><?php echo $__f->numero . ' &middot; ' . $__plabel; ?></small>
							</span>
						</a>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<a href="javascript:void(0)" class="btn-hw btn-sign-out"><i class="fa fa-sign-out"></i> <span>Déconnexion</span></a>
		</div>
	</div>
</section>

<!--========================================================
                          ABOUT
  =========================================================-->
<section class="page-template page-client-space">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="logoutMessage">
					<div class="msgbox"></div>
				</div>
			</div>
			<div class="col-12">
				<div class="cl-gains-banner">
					<div class="cl-gains-banner-main">
						<span class="cl-gains-banner-ico"><i class="fa fa-gift"></i></span>
						<div class="cl-gains-banner-body">
							<b><?php echo $lang['CL_PARRAIN_GAINS'][$_SESSION['lang']]; ?></b>
							<ul class="cl-gains-banner-list">
								<li><i class="fa fa-bullhorn"></i> <?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></li>
								<li><i class="fa fa-percent"></i> <?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></li>
								<li><i class="fa fa-gift"></i> <?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></li>
							</ul>
						</div>
					</div>
					<a href="javascript:void(0)" class="btn-hw cl-gains-banner-btn" data-parrain-scroll><span><?php echo $lang['CL_PARRAIN_POP_CTA'][$_SESSION['lang']]; ?></span></a>
				</div>
			</div>
			<div class="col-12 mb-5">
				<div class="row">
					<div class="col-6 col-md-3 p-2">
						<div class="div-card-content bg-invoice">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="div-card-info">
											<div><b class="m-0"><?php echo $lang['CL_INVOICES'][$_SESSION['lang']]; ?></b></div>
											<div><b class="m-0 font-bold"><?= sizeof($factures) ?></b></div>
										</div>
										<i class="ti ti-files"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 p-2">
						<div class="div-card-content bg-quote">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="div-card-info">
											<div><b class="m-0"><?php echo $lang['CL_QUOTES'][$_SESSION['lang']]; ?></b></div>
											<div><b class="m-0 font-bold"><?= sizeof($devis) ?></b></div>
										</div>
										<i class="ti ti-clipboard"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 p-2">
						<div class="div-card-content bg-reclamation">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="div-card-info">
											<div><b class="m-0"><?php echo $lang['CL_REQUESTS'][$_SESSION['lang']]; ?></b></div>
											<div><b class="m-0 font-bold"><?= sizeof($reclamations) ?></b></div>
										</div>
										<i class="ti ti-file"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 p-2">
						<div class="div-card-content bg-recall">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="div-card-info">
											<div><b class="m-0"><?php echo $lang['CL_RECALLS'][$_SESSION['lang']]; ?></b></div>
											<div><b class="m-0 font-bold"><?= sizeof($rapples) ?></b></div>
										</div>
										<i class="ti ti-mobile"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<div class="col-sm-12">
				<?php echo $page->getTexte(); ?>
				<div class="div-client-space">
					<div class="div-client-space-tabs">
						<ul class="nav nav-tabs m-0" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i class="ti ti-files"></i> <?php echo $lang['CL_TAB_INVOICES'][$_SESSION['lang']]; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><i class="ti ti-clipboard"></i> <?php echo $lang['CL_TAB_QUOTES'][$_SESSION['lang']]; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><i class="ti ti-file"></i> <?php echo $lang['CL_TAB_REQUESTS'][$_SESSION['lang']]; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"><i class="ti ti-mobile"></i> <?php echo $lang['CL_TAB_RECALLS'][$_SESSION['lang']]; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"><i class="ti ti-user"></i> <?php echo $lang['CL_TAB_PROFILE'][$_SESSION['lang']]; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab"><i class="ti ti-wallet"></i> <?php echo $lang['CL_TAB_BANK'][$_SESSION['lang']]; ?></a>
							</li>
						</ul><!-- Tab panes -->
					</div>

					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<?php
							// Build a cumulative payment-evolution series from the invoices.
							$__pcRows = array();
							foreach ($factures as $__f) {
								if (!is_object($__f) || !isset($__f->date_facture)) { continue; }
								$__pcRows[] = array(
									'd' => $__f->date_facture,
									't' => (float) $__f->total,
									'p' => (float) $__f->total - (float) $__f->reste,
								);
							}
							usort($__pcRows, function ($a, $b) { return strcmp($a['d'], $b['d']); });
							$__pcLabels = array(); $__pcTot = array(); $__pcPaid = array();
							$__rt = 0; $__rp = 0;
							foreach ($__pcRows as $__r) {
								$__rt += $__r['t']; $__rp += $__r['p'];
								$__pcLabels[] = date('d/m/Y', strtotime($__r['d']));
								$__pcTot[]  = round($__rt, 2);
								$__pcPaid[] = round($__rp, 2);
							}
							if (count($__pcLabels) > 0) :
							?>
							<div class="cl-chart-card">
								<h3 class="cl-chart-title"><?php echo $lang['CL_CHART_TITLE'][$_SESSION['lang']]; ?></h3>
								<div class="cl-chart-canvas-wrap"><canvas id="paymentChart"></canvas></div>
							</div>
							<script src="<?php echo $siteURL; ?>assets/js/chart.umd.min.js"></script>
							<script>
							(function () {
								var el = document.getElementById('paymentChart');
								if (!el || typeof Chart === 'undefined') return;
								var labels   = <?php echo json_encode($__pcLabels); ?>;
								var invoiced = <?php echo json_encode($__pcTot); ?>;
								var paid     = <?php echo json_encode($__pcPaid); ?>;
								var ctx = el.getContext('2d');
								var gInv = ctx.createLinearGradient(0, 0, 0, 260);
								gInv.addColorStop(0, 'rgba(104,2,98,.20)'); gInv.addColorStop(1, 'rgba(104,2,98,0)');
								var gPaid = ctx.createLinearGradient(0, 0, 0, 260);
								gPaid.addColorStop(0, 'rgba(9,161,190,.28)'); gPaid.addColorStop(1, 'rgba(9,161,190,0)');
								new Chart(el, {
									type: 'line',
									data: {
										labels: labels,
										datasets: [
											{ label: <?php echo json_encode($lang['CL_CHART_INVOICED'][$_SESSION['lang']]); ?>, data: invoiced, borderColor: '#680262', backgroundColor: gInv, borderWidth: 2, fill: true, tension: .35, pointRadius: 3, pointHoverRadius: 5, pointBackgroundColor: '#680262' },
											{ label: <?php echo json_encode($lang['CL_CHART_PAID'][$_SESSION['lang']]); ?>, data: paid, borderColor: '#09A1BE', backgroundColor: gPaid, borderWidth: 2, fill: true, tension: .35, pointRadius: 3, pointHoverRadius: 5, pointBackgroundColor: '#09A1BE' }
										]
									},
									options: {
										responsive: true, maintainAspectRatio: false,
										interaction: { mode: 'index', intersect: false },
										plugins: {
											legend: { labels: { font: { family: 'Montserrat', size: 12 }, usePointStyle: true, pointStyle: 'circle', padding: 18 } },
											tooltip: { callbacks: { label: function (c) { return c.dataset.label + ' : ' + Number(c.parsed.y).toLocaleString('fr-FR'); } } }
										},
										scales: {
											x: { grid: { display: false }, ticks: { font: { family: 'Montserrat', size: 10 }, maxRotation: 0, autoSkip: true } },
											y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,.06)' }, ticks: { font: { family: 'Montserrat', size: 10 }, callback: function (v) { return Number(v).toLocaleString('fr-FR'); } } }
										}
									}
								});
							})();
							</script>
							<?php endif; ?>
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead>
										<tr>
											<th><?php echo $lang['CL_TH_INVOICE_NUM'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_BILLING_DATE'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_TOTAL'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_REST'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_ACTION'][$_SESSION['lang']]; ?></th>
										</tr>
									</thead>
									<tbody>
										<?php

										foreach ($factures as $factureJson) :
										    $facture = $factureJson;
											if($facture->total == $facture->reste){
                                                $statu = '<span class="badge bg-danger text-white">' . $lang['CL_ST_UNPAID'][$_SESSION['lang']] . '</span>';
                                            }elseif($facture->total > $facture->reste && $facture->reste > 0)	{
                                                $statu = '<span class="badge bg-warning text-white">' . $lang['CL_ST_PARTIAL'][$_SESSION['lang']] . '</span>';
                                            }elseif($facture->reste <= 0){
                                                $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_PAID'][$_SESSION['lang']] . '</span>';
                                            }
										?>
											<tr>
												<td><?php echo $facture->numero; ?></td>
												<td><?php echo normaldate($facture->date_facture); ?></td>
												<td><?php echo number_format($facture->total, 2, ',', ' ') . ' ' . $facture->devise; ?></td>
												<td><?php echo number_format($facture->reste, 2, ',', ' ') . ' ' . $facture->devise; ?></td>
												<td><?php echo $statu; ?></td>
												<td>
<?php if ($facture->statu == '1') : ?>
														<a class="btn btn-sm btn-danger btn-download-invoice text-white" data-id="<?= $facture->ID ?>" href="javascript:void(0)" data-toggle="tooltip" title="Download"><i class="far fa-file-pdf"></i></a>
													    <a class="btn btn-sm btn-danger btn-loading d-none" href="javascript:void(0)"><i class="fa fa-spinner"></i></a>
													<?php else : ?>
														<a class="btn btn-sm btn-secondary btn-disabled" href="javascript:void(0)"><i class="far fa-file-pdf"></i></a>
													<?php endif; ?>
												</td>
											</tr>
										<?php
										endforeach;

										?>
									</tbody>
								</table>
							</div>

						</div>
						<div class="tab-pane" id="tabs-2" role="tabpanel">
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead>
										<tr>
											<th><?php echo $lang['CL_TH_QUOTE_NUM'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_QUOTE_DATE'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_TOTAL'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_ACTION'][$_SESSION['lang']]; ?></th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($devis as $devisJson) :
										    $devi = $devisJson;
											switch ($devi->statu) {
												case '1':
                                                    $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_QUOTE_VALID_NOSIGN'][$_SESSION['lang']] . '</span>';
                                                    break;
                                                case '2':
                                                    $statu = '<span class="badge bg-danger text-white">' . $lang['CL_ST_QUOTE_REFUSED'][$_SESSION['lang']] . '</span>';
                                                    break;
                                                case '3':
                                                    $statu = '<span class="badge bg-primary text-white">' . $lang['CL_ST_QUOTE_VALID_SIGNED'][$_SESSION['lang']] . '</span>';
                                                    break;
                                                case '4':
                                                    $statu = '<span class="badge bg-warning text-white">' . $lang['CL_ST_QUOTE_VALID_NP'][$_SESSION['lang']] . '</span>';
                                                    break;
                                                default:
                                                    $statu = '<span class="badge bg-warning text-white">' . $lang['CL_ST_QUOTE_INVALID'][$_SESSION['lang']] . '</span>';
                                                    break;
											}
										?>
											<tr>
												<td><?php echo $devi->numero; ?></td>
												<td><?php echo normaldate($devi->date_devis); ?></td>
												<td><?php echo number_format($devi->total, 2, ',', ' ') . ' ' . $devi->devise; ?></td>
												<td><?php echo $statu; ?></td>
												<td><a class="btn btn-sm btn-danger btn-download-quote text-white" data-id="<?= $devi->id ?>" href="javascript:void(0)" data-toggle="tooltip" title="Download"><i class="far fa-file-pdf"></i></a><a class="btn btn-sm btn-danger btn-loading d-none" href="javascript:void(0)"><i class="fa fa-spinner"></i></a></td>
											</tr>
										<?php
										endforeach;

										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane" id="tabs-3" role="tabpanel">
							<div class="row">
								<div class="col-12">
									<div class="cl-recl-list">
											<?php foreach ($reclamations as $reclamation) : ?>
												<div class="cl-recl-item">
													<div class="cl-recl-head">
														<span class="cl-recl-subject"><?php echo htmlspecialchars($reclamation->sujet); ?></span>
														<span class="cl-recl-date"><?php echo normaldate($reclamation->date_add); ?></span>
													</div>
													<div class="cl-recl-message"><?php echo nl2br(htmlspecialchars($reclamation->message)); ?></div>
													<?php if (!empty($reclamation->reponse)) : ?>
														<div class="cl-recl-response">
															<div class="cl-recl-response-head"><i class="fa fa-reply"></i> <?php echo $lang['CL_RECL_RESPONSE'][$_SESSION['lang']]; ?><?php if (!empty($reclamation->date_reponse)) : ?> <span class="cl-recl-response-date">· <?php echo date("d/m/Y", strtotime($reclamation->date_reponse)); ?></span><?php endif; ?></div>
															<div class="cl-recl-response-text"><?php echo nl2br(htmlspecialchars($reclamation->reponse)); ?></div>
														</div>
													<?php else : ?>
														<div class="cl-recl-foot">
															<span class="cl-recl-pending"><i class="fa fa-clock"></i> <?php echo $lang['CL_RECL_PENDING'][$_SESSION['lang']]; ?></span>
															<button type="button" class="cl-recl-edit-toggle"><i class="fa fa-pen"></i> <?php echo $lang['CL_RECL_EDIT'][$_SESSION['lang']]; ?></button>
														</div>
														<form class="cl-recl-edit-form formTemplate" method="post" action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=updateReclamationApi">
															<div class="msgbox"></div>
															<input type="hidden" name="id" value="<?php echo (int) $reclamation->id; ?>">
															<input type="hidden" name="department" value="<?php echo htmlspecialchars($reclamation->department); ?>">
															<label class="cl-recl-edit-label"><?php echo $lang['CL_TH_SUBJECT'][$_SESSION['lang']]; ?></label>
															<input class="cl-recl-edit-input" type="text" name="sujet" value="<?php echo htmlspecialchars($reclamation->sujet); ?>" required>
															<label class="cl-recl-edit-label"><?php echo $lang['CL_FORM_REQUEST'][$_SESSION['lang']]; ?></label>
															<textarea class="cl-recl-edit-input" name="message" rows="3" required><?php echo htmlspecialchars($reclamation->message); ?></textarea>
															<div class="cl-recl-edit-actions">
																<button type="button" class="cl-recl-edit-cancel"><?php echo $lang['CL_RECL_CANCEL'][$_SESSION['lang']]; ?></button>
																<button type="submit" class="cl-recl-edit-save"><?php echo $lang['CL_RECL_SAVE'][$_SESSION['lang']]; ?></button>
															</div>
															<div class="loading"></div>
														</form>
													<?php endif; ?>
												</div>
											<?php endforeach; ?>
										</div>
								</div>
								<div class="col-12">
									<div class="reclamation-title mt-5">
										<h2 class="big-title"><?php echo $lang['CL_REQUEST_TITLE'][$_SESSION['lang']]; ?></h2>
									</div>
									<div class="div-reclamation-form">
										<form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=createReclamationApi" id="reclamationApiForm" method="post" class="formTemplate">
											<div class="msgbox"></div>
											<div class="row">
												<div class="col-12 col-md-6">
													<div class="form-group text-left">
														<label for="sujet"><?php echo $lang['CL_TH_SUBJECT'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
														<input type="text" class="form-control" name="sujet" placeholder="<?php echo $lang['CL_TH_SUBJECT'][$_SESSION['lang']]; ?>" required>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group text-left">
														<label for="sujet"><?php echo $lang['CL_FORM_DEPARTMENT'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
														<select class="from-control form-select" name="department" id="department" required>
															<option value=""><?php echo $lang['CL_FORM_SELECT'][$_SESSION['lang']]; ?></option>
															<option value="Support"><?php echo $lang['CL_DEPT_SUPPORT'][$_SESSION['lang']]; ?></option>
															<option value="Billing"><?php echo $lang['CL_DEPT_BILLING'][$_SESSION['lang']]; ?></option>
															<option value="Sales"><?php echo $lang['CL_DEPT_SALES'][$_SESSION['lang']]; ?></option>
															<option value="Abuse"><?php echo $lang['CL_DEPT_ABUSE'][$_SESSION['lang']]; ?></option>
														</select>
													</div>
												</div>
												<div class="col-12 cl-recl-facture" id="reclFactureWrap" style="display:none;">
													<div class="form-group text-left">
														<label for="facture_ref"><?php echo $lang['CL_RECL_WHICH_INVOICE'][$_SESSION['lang']]; ?></label>
														<select class="from-control form-select" name="facture_ref" id="facture_ref">
															<option value=""><?php echo $lang['CL_RECL_SELECT_INVOICE'][$_SESSION['lang']]; ?></option>
															<?php foreach ($factures as $__rf) : ?>
															<option value="<?php echo htmlspecialchars($__rf->numero); ?>"><?php echo htmlspecialchars($__rf->numero) . ' — ' . normaldate($__rf->date_facture) . ' — ' . number_format((float) $__rf->total, 2, ',', ' ') . ' ' . $__rf->devise; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group text-left">
														<label for="message"><?php echo $lang['CL_FORM_REQUEST'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
														<textarea rows="4" class="form-control" name="message" placeholder="<?php echo $lang['CL_FORM_REQUEST'][$_SESSION['lang']]; ?>" required></textarea>
													</div>
												</div>
											</div>



											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-block" value="<?php echo $lang['CL_SEND'][$_SESSION['lang']]; ?>">
												<div class="loading"></div>
											</div>
										</form>
										<script>
										(function(){
											var dep = document.getElementById("department");
											var wrap = document.getElementById("reclFactureWrap");
											var sel = document.getElementById("facture_ref");
											if(!dep || !wrap) return;
											function sync(){
												var on = (dep.value === "Billing");
												wrap.style.display = on ? "" : "none";
												if(sel){ if(on){ sel.setAttribute("required","required"); } else { sel.removeAttribute("required"); sel.value=""; } }
											}
											dep.addEventListener("change", sync);
											sync();
										})();
										</script>
									</div>

								</div>
							</div>


						</div>
						<div class="tab-pane" id="tabs-4" role="tabpanel">
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead>
										<tr>
											<th><?php echo $lang['CL_TH_TYPE'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_DOMAIN'][$_SESSION['lang']]; ?></th>
											<th><?php echo $lang['CL_TH_EXPIRATION'][$_SESSION['lang']]; ?></th>
												<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
										</tr>
									</thead>
									<tbody>

										<?php if (count($__remActive) === 0) : ?>
											<tr><td colspan="4" class="text-center text-muted"><?php echo $lang['CL_ATTN_NONE_EXP'][$_SESSION['lang']]; ?></td></tr>
										<?php else :
											foreach ($__remActive as $__e) :
												$__r = $__e['r'];
												list($__cls, $__stLabel) = $__expStatus($__e['days']); ?>
											<tr>
												<td><span class="cl-recl-type-ico"><i class="<?php echo $__typeIcon($__r->type); ?>"></i></span> <?php echo $__typeLabel($__r->type); ?></td>
												<td><?php echo htmlspecialchars($__r->domaine); ?></td>
												<td><?php echo normaldate($__r->date_expir); ?></td>
												<td><span class="cl-attn-badge cl-attn-<?php echo $__cls; ?>"><?php echo $__stLabel; ?></span></td>
											</tr>
										<?php
											endforeach;
										endif;
										?>
										</tbody>
								</table>
							</DIV>
						</div>
						<div class="tab-pane" id="tabs-5" role="tabpanel">
							<div class="div-profil-form">
								<form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=updateProfileApi" id="profileApiForm" method="post" class="formTemplate">
									<div class="msgbox"></div>
									<div class="row">
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="nom"><?php echo $lang['CL_FIRST_NAME'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->nom ?>" name="nom" placeholder="<?php echo $lang['CL_FIRST_NAME'][$_SESSION['lang']]; ?>" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="prenom"><?php echo $lang['CL_LAST_NAME'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->prenom ?>" name="prenom" placeholder="<?php echo $lang['CL_LAST_NAME'][$_SESSION['lang']]; ?>" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="email"><?php echo $lang['CL_EMAIL'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="email" class="form-control" value="<?= $user->email ?>" name="email" placeholder="<?php echo $lang['CL_EMAIL'][$_SESSION['lang']]; ?>" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="tel"><?php echo $lang['CL_PHONE'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="tel" class="form-control" value="<?= $user->tel ?>" name="tel" placeholder="<?php echo $lang['CL_PHONE'][$_SESSION['lang']]; ?>" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="raison_social"><?php echo $lang['CL_BUSINESS_NAME'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->raison_social ?>" name="raison_social" placeholder="<?php echo $lang['CL_BUSINESS_NAME'][$_SESSION['lang']]; ?>" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="tel"><?php echo $lang['CL_PASSWORD'][$_SESSION['lang']]; ?><span class="text-danger"> * </span></label>
												<input type="password" class="form-control" name="password" placeholder="<?php echo $lang['CL_PASSWORD'][$_SESSION['lang']]; ?>" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-block" value="<?php echo $lang['CL_MODIFY'][$_SESSION['lang']]; ?>">
										<div class="loading"></div>
									</div>
								</form>
								<div class="cl-psum">
									<div class="cl-psum-head"><i class="fa fa-handshake-o"></i> <?php echo $lang['CL_PARRAIN_MY'][$_SESSION['lang']]; ?></div>
									<?php if ($__parrainTotal === 0) : ?>
									<div class="cl-psum-empty">
										<p><?php echo $lang['CL_PARRAIN_SUB'][$_SESSION['lang']]; ?></p>
										<a href="javascript:void(0)" class="btn-hw cl-psum-cta" data-parrain-scroll><span><?php echo $lang['CL_PARRAIN_POP_CTA'][$_SESSION['lang']]; ?></span></a>
									</div>
									<?php else : ?>
									<div class="cl-psum-stats">
										<div class="cl-psum-stat"><span class="n"><?php echo $__parrainTotal; ?></span><span class="l"><?php echo $lang['CL_PARRAIN_STAT_TOTAL'][$_SESSION['lang']]; ?></span></div>
										<div class="cl-psum-stat is-ok"><span class="n"><?php echo $__parrainConverted; ?></span><span class="l"><?php echo $lang['CL_PARRAIN_STAT_CONVERTED'][$_SESSION['lang']]; ?></span></div>
										<div class="cl-psum-stat is-wait"><span class="n"><?php echo $__parrainPending; ?></span><span class="l"><?php echo $lang['CL_PARRAIN_STAT_PENDING'][$_SESSION['lang']]; ?></span></div>
										<div class="cl-psum-stat is-gold"><span class="n"><?php echo count($__parrainRewards); ?></span><span class="l"><?php echo $lang['CL_PARRAIN_STAT_REWARDS'][$_SESSION['lang']]; ?></span></div>
									</div>
									<?php if (!empty($__parrainRewards)) : ?>
									<div class="cl-psum-rewards">
										<span class="cl-psum-rewards-label"><i class="fa fa-gift"></i> <?php echo $lang['CL_PARRAIN_STAT_REWARDS'][$_SESSION['lang']]; ?></span>
										<?php foreach ($__parrainRewards as $__rw) : ?><span class="cl-psum-reward"><?php echo htmlspecialchars($__rw); ?></span><?php endforeach; ?>
									</div>
									<?php endif; ?>
									<a href="javascript:void(0)" class="cl-psum-link" data-parrain-scroll><?php echo $lang['CL_PARRAIN_POP_CTA'][$_SESSION['lang']]; ?> &rarr;</a>
									<?php endif; ?>
								</div>
								<script>
								(function(){ Array.prototype.forEach.call(document.querySelectorAll("[data-parrain-scroll]"), function(el){ el.addEventListener("click", function(){ var sec=document.getElementById("parrainageSection"); if(sec){ sec.scrollIntoView({behavior:"smooth", block:"center"}); var f=document.getElementById("paFNom"); if(f) setTimeout(function(){ f.focus(); },600); } }); }); })();
								</script>
							</div>
						</div>
						<div class="tab-pane" id="tabs-6" role="tabpanel">
							<div class="container">
								<div class="row">
									<div class="col-12">
										<!-- Accordion -->
										<div id="accordionOne" class="accordion">
											<!-- Accordion item 1 -->
											<div class="card mb-3">
												<div id="headingOne" class="card-header shadow-sm border-0 p-0">
													<h2 class="mb-0">
														<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link text-white font-weight-bold text-uppercase collapsible-link">Hello world Agency</button>
													</h2>
												</div>
												<div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionOne" class="collapse show">
													<div class="card-body p-0">
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300"><?php echo $lang['CL_BUSINESS_NAME'][$_SESSION['lang']]; ?></th>
																	<td>HW LABEL</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_OFFICE'][$_SESSION['lang']]; ?></th>
																	<td>PORTE 13, Immeuble Essalam,BAB DOUKALA , Marrakech</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_RC'][$_SESSION['lang']]; ?></th>
																	<td>91301</td>
																</tr>
																<tr>
																	<th scope="row">ICE</th>
																	<td>002142777000089</td>
																</tr>
																<tr>
																	<th scope="row">RIB</th>
																	<td>145 450 21211 18465020006 83</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_SWIFT'][$_SESSION['lang']]; ?></th>
																	<td>BCPOMAMC</td>
																</tr>

															</tbody>
														</table>
														<h5 class="my-4 text-dark"><?php echo $lang['CL_BANK_FOREIGN'][$_SESSION['lang']]; ?></h5>
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300">RIB</th>
																	<td>145 450 21283 18465020047 44</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_SWIFT'][$_SESSION['lang']]; ?></th>
																	<td>BCPOMAMC</td>
																</tr>
															</tbody>
														</table>
														<h5 class="my-4 text-dark">BMCE Bank</h5>
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300">RIB</th>
																	<td>011450000012210002095446</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_SWIFT'][$_SESSION['lang']]; ?></th>
																	<td>BCPOMAMC</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div><!-- End -->

											<!-- Accordion item 1 -->
											<div class="card mb-3">
												<div id="headingTwo" class="card-header shadow-sm border-0 p-0">
													<h2 class="mb-0">
														<button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link text-white font-weight-bold text-uppercase collapsible-link">Verse concept</button>
													</h2>
												</div>
												<div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionOne" class="collapse">
													<div class="card-body p-0">
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300"><?php echo $lang['CL_BUSINESS_NAME'][$_SESSION['lang']]; ?></th>
																	<td>Verse concept</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_OFFICE'][$_SESSION['lang']]; ?></th>
																	<td>PORTE 13, Immeuble Essalam, BAB DOUKALA, Marrakech</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_RC'][$_SESSION['lang']]; ?></th>
																	<td>123993</td>
																</tr>
																<tr>
																	<th scope="row">ICE</th>
																	<td>003035748000095</td>
																</tr>
																<tr>
																	<th scope="row">RIB</th>
																	<td>145 450 21211 72309250022 43</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_SWIFT'][$_SESSION['lang']]; ?></th>
																	<td>BCPOMAMC</td>
																</tr>

															</tbody>
														</table>
													</div>
												</div>
											</div><!-- End -->

											<!-- Accordion item 1 -->
											<div class="card mb-0">
												<div id="headingThree" class="card-header shadow-sm border-0 p-0">
													<h2 class="mb-0">
														<button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link text-white font-weight-bold text-uppercase collapsible-link">Hello world label Duba</button>
													</h2>
												</div>
												<div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionOne" class="collapse">
													<div class="card-body p-0">
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300"><?php echo $lang['CL_BANK_NAME'][$_SESSION['lang']]; ?></th>
																	<td>WIO BANK</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_ACCT_NUM'][$_SESSION['lang']]; ?></th>
																	<td>9984582655</td>
																</tr>
																<tr>
																	<th scope="row">BIC/SWIFT</th>
																	<td>WIOBAEADXXX</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_ACCT_NAME'][$_SESSION['lang']]; ?></th>
																	<td>HELLOWORLDLABEL - FZCO</td>
																</tr>
																<tr>
																	<th scope="row"><?php echo $lang['CL_BANK_ACCT_CURRENCY'][$_SESSION['lang']]; ?></th>
																	<td>AED</td>
																</tr>
																<tr>
																	<th scope="row">IBAN</th>
																	<td>AE750860000009984582655</td>
																</tr>

															</tbody>
														</table>
													</div>
												</div>
											</div><!-- End -->
										</div><!-- End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php if (true) : ?>
			<div class="col-12 mb-5">
				<div class="cl-review">
					<div class="cl-review-head">
						<span class="cl-review-ico"><i class="ti ti-star"></i></span>
						<div>
							<h2><?php echo $lang['CL_REVIEW_TITLE'][$_SESSION['lang']]; ?></h2>
							<p><?php echo $lang['CL_REVIEW_SUB'][$_SESSION['lang']]; ?></p>
						</div>
					</div>
					<div class="cl-review-body">
						<div class="cl-review-col">
							<?php if ($__avis) : ?>
							<div class="cl-review-sent" id="clReviewSent">
								<div class="cl-review-stars-static">
									<?php for ($i = 1; $i <= 5; $i++) : ?><i class="fa fa-star<?php echo $i <= (int) $__avis['note'] ? ' on' : ''; ?>"></i><?php endfor; ?>
								</div>
								<p class="cl-review-sent-msg"><?php echo nl2br(htmlspecialchars($__avis['message'])); ?></p>
								<?php $__pub = ((int) $__avis['temoignage_active'] === 1); ?>
								<span class="cl-review-badge <?php echo $__pub ? 'ok' : 'wait'; ?>"><?php echo $__pub ? $lang['CL_REVIEW_ST_PUBLISHED'][$_SESSION['lang']] : $lang['CL_REVIEW_ST_PENDING'][$_SESSION['lang']]; ?></span>
								<button type="button" class="cl-review-edit" id="clReviewEdit"><i class="fa fa-pencil"></i> <?php echo $lang['CL_REVIEW_EDIT'][$_SESSION['lang']]; ?></button>
							</div>
							<?php endif; ?>
							<form id="temoignageForm" class="cl-review-form"<?php echo $__avis ? ' style="display:none;"' : ''; ?>>
								<div class="msgbox cl-review-msg"></div>
								<label class="cl-review-label"><?php echo $lang['CL_REVIEW_RATING'][$_SESSION['lang']]; ?></label>
								<div class="cl-review-stars" id="clStars">
									<?php $__n = $__avis ? (int) $__avis['note'] : 5; for ($i = 1; $i <= 5; $i++) : ?><i class="fa fa-star<?php echo $i <= $__n ? ' on' : ''; ?>" data-v="<?php echo $i; ?>"></i><?php endfor; ?>
								</div>
								<input type="hidden" name="note" id="clNote" value="<?php echo $__avis ? (int) $__avis['note'] : 5; ?>">
								<label class="cl-review-label" for="clMsg"><?php echo $lang['CL_REVIEW_YOUR_MESSAGE'][$_SESSION['lang']]; ?></label>
								<textarea class="cl-review-input" name="message" id="clMsg" rows="4" required><?php echo $__avis ? htmlspecialchars($__avis['message']) : ''; ?></textarea>
								<button type="submit" class="btn-hw cl-review-submit"><span><?php echo $lang['CL_REVIEW_SUBMIT'][$_SESSION['lang']]; ?></span></button>
							</form>
						</div>
						<?php if ($__gmbOn) : ?>
						<div class="cl-review-col cl-review-gmb">
							<span class="cl-review-gmb-ico"><i class="fa fa-google"></i></span>
							<p class="cl-review-gmb-text"><?php echo $lang['CL_REVIEW_GMB_TEXT'][$_SESSION['lang']]; ?></p>
							<a href="<?php echo htmlspecialchars(GMB_REVIEW_URL); ?>" target="_blank" rel="noopener" class="cl-review-gmb-btn"><i class="fa fa-star"></i> <?php echo $lang['CL_REVIEW_GMB'][$_SESSION['lang']]; ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<script>
			(function(){
				var stars = document.querySelectorAll('#clStars i');
				var noteInput = document.getElementById('clNote');
				var form = document.getElementById('temoignageForm');
				if(!form) return;
				function paint(n){ stars.forEach(function(s){ s.classList.toggle('on', parseInt(s.getAttribute('data-v'),10) <= n); }); }
				stars.forEach(function(s){
					var v = parseInt(s.getAttribute('data-v'),10);
					s.addEventListener('mouseenter', function(){ paint(v); });
					s.addEventListener('click', function(){ noteInput.value = v; paint(v); });
				});
				document.getElementById('clStars').addEventListener('mouseleave', function(){ paint(parseInt(noteInput.value,10)||0); });
				var editBtn = document.getElementById('clReviewEdit');
				if(editBtn) editBtn.addEventListener('click', function(){ var sent=document.getElementById('clReviewSent'); if(sent) sent.style.display='none'; form.style.display=''; });
				form.addEventListener('submit', function(e){
					e.preventDefault();
					var box = form.querySelector('.cl-review-msg');
					var body = new URLSearchParams({ note: noteInput.value, message: document.getElementById('clMsg').value }).toString();
					fetch('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=createTemoignageApi', { method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:body })
						.then(function(r){ return r.text(); })
						.then(function(t){ var d; try{ d=JSON.parse(t); }catch(e){ d={icon:'error'}; }
							if(d.icon==='success'){ box.innerHTML='<div class="alert alert-success">'+<?php echo json_encode($lang['CL_REVIEW_THANKS'][$_SESSION['lang']]); ?>+'</div>'; }
							else{ box.innerHTML='<div class="alert alert-warning">'+<?php echo json_encode($lang['CL_REVIEW_ERROR'][$_SESSION['lang']]); ?>+'</div>'; }
						})
						.catch(function(){ box.innerHTML='<div class="alert alert-danger">'+<?php echo json_encode($lang['CL_REVIEW_ERROR'][$_SESSION['lang']]); ?>+'</div>'; });
				});
			})();
			</script>
			<?php endif; ?>
<div class="col-12 mb-5">
							<div class="cl-parrain" id="parrainageSection">
								<div class="cl-parrain-head">
									<span class="cl-parrain-ico"><i class="ti ti-user"></i></span>
									<div>
										<h2><?php echo $lang['CL_PARRAIN_TITLE'][$_SESSION['lang']]; ?></h2>
										<p><?php echo $lang['CL_PARRAIN_SUB'][$_SESSION['lang']]; ?></p>
									</div>
								</div>
<div class="cl-parrain-gains">
									<span class="cl-parrain-gains-label"><?php echo $lang['CL_PARRAIN_GAINS'][$_SESSION['lang']]; ?></span>
									<span class="cl-parrain-gain"><i class="fa fa-bullhorn"></i> <?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></span>
									<span class="cl-parrain-gain"><i class="fa fa-percent"></i> <?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></span>
									<span class="cl-parrain-gain"><i class="fa fa-gift"></i> <?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></span>
								</div>
																<div class="cl-parrain-body">
									<form id="parrainageForm" class="cl-parrain-form">
										<div class="msgbox cl-parrain-msg"></div>
										<div class="cl-parrain-grid">
											<div><label class="cl-review-label" for="paFNom"><?php echo $lang['CL_PARRAIN_FNAME'][$_SESSION['lang']]; ?> *</label><input class="cl-review-input" type="text" id="paFNom" name="filleul_nom" required></div>
											<div><label class="cl-review-label" for="paFEnt"><?php echo $lang['CL_PARRAIN_FCOMPANY'][$_SESSION['lang']]; ?></label><input class="cl-review-input" type="text" id="paFEnt" name="filleul_entreprise"></div>
											<div><label class="cl-review-label" for="paFMail"><?php echo $lang['CL_PARRAIN_FEMAIL'][$_SESSION['lang']]; ?> *</label><input class="cl-review-input" type="email" id="paFMail" name="filleul_email" required></div>
											<div><label class="cl-review-label" for="paFTel"><?php echo $lang['CL_PARRAIN_FTEL'][$_SESSION['lang']]; ?></label><input class="cl-review-input" type="tel" id="paFTel" name="filleul_tel"></div>
										</div>
										<label class="cl-review-label" for="paMsg"><?php echo $lang['CL_PARRAIN_MSG'][$_SESSION['lang']]; ?></label>
										<textarea class="cl-review-input" id="paMsg" name="message" rows="2"></textarea>
										<button type="submit" class="btn-hw cl-parrain-submit"><span><?php echo $lang['CL_PARRAIN_SUBMIT'][$_SESSION['lang']]; ?></span></button>
									</form>
									<div class="cl-parrain-list">
										<div class="cl-parrain-list-title"><?php echo $lang['CL_PARRAIN_LIST_TITLE'][$_SESSION['lang']]; ?></div>
										<?php if (empty($__parrainages)) : ?>
										<p class="cl-parrain-empty"><?php echo $lang['CL_PARRAIN_EMPTY'][$_SESSION['lang']]; ?></p>
										<?php else : ?>
										<table class="cl-parrain-table">
											<thead><tr><th><?php echo $lang['CL_PARRAIN_TH_FILLEUL'][$_SESSION['lang']]; ?></th><th><?php echo $lang['CL_PARRAIN_TH_STATUS'][$_SESSION['lang']]; ?></th><th><?php echo $lang['CL_PARRAIN_TH_REWARD'][$_SESSION['lang']]; ?></th></tr></thead>
											<tbody>
											<?php foreach ($__parrainages as $__p) :
												$__pst = (int) $__p['statut'];
												$__pcls = $__pst === 2 ? 'ok' : ($__pst === 3 ? 'no' : ($__pst === 1 ? 'info' : 'wait'));
												$__plabel = $__pst === 2 ? $lang['CL_PARRAIN_ST_CONVERTED'][$_SESSION['lang']] : ($__pst === 3 ? $lang['CL_PARRAIN_ST_CLOSED'][$_SESSION['lang']] : ($__pst === 1 ? $lang['CL_PARRAIN_ST_CONTACTED'][$_SESSION['lang']] : $lang['CL_PARRAIN_ST_PENDING'][$_SESSION['lang']])); ?>
											<tr>
												<td><b><?php echo htmlspecialchars($__p['filleul_nom']); ?></b><?php if (!empty($__p['filleul_entreprise'])) : ?><small><?php echo htmlspecialchars($__p['filleul_entreprise']); ?></small><?php endif; ?></td>
												<td><span class="cl-review-badge <?php echo $__pcls; ?>"><?php echo $__plabel; ?></span></td>
												<td><?php echo !empty($__p['recompense']) ? htmlspecialchars($__p['recompense']) : '—'; ?></td>
											</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<script>
						(function(){
							var form = document.getElementById('parrainageForm');
							if(!form) return;
							var MSG = {
								ok: <?php echo json_encode($lang['CL_PARRAIN_THANKS'][$_SESSION['lang']]); ?>,
								dup: <?php echo json_encode($lang['CL_PARRAIN_DUP'][$_SESSION['lang']]); ?>,
								err: <?php echo json_encode($lang['CL_PARRAIN_ERROR'][$_SESSION['lang']]); ?>
							};
							form.addEventListener('submit', function(e){
								e.preventDefault();
								var box = form.querySelector('.cl-parrain-msg');
								var body = new URLSearchParams(new FormData(form)).toString();
								fetch('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=createParrainageApi', { method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:body })
									.then(function(r){ return r.text(); })
									.then(function(t){ var d; try{ d=JSON.parse(t); }catch(e){ d={icon:'error'}; }
										if(d.icon==='success'){ box.innerHTML='<div class="alert alert-success">'+MSG.ok+'</div>'; form.reset(); setTimeout(function(){ document.location.reload(); }, 1400); }
										else if(d.code==='dup'){ box.innerHTML='<div class="alert alert-warning">'+MSG.dup+'</div>'; }
										else{ box.innerHTML='<div class="alert alert-warning">'+MSG.err+'</div>'; }
									})
									.catch(function(){ box.innerHTML='<div class="alert alert-danger">'+MSG.err+'</div>'; });
							});
						})();
						</script>
<?php if (empty($__parrainages)) : ?>
												<div class="cl-parrain-popup" id="clParrainPopup" role="dialog" aria-hidden="true">
													<div class="cl-parrain-popup-backdrop" data-parrain-close></div>
													<div class="cl-parrain-popup-card">
														<button type="button" class="cl-parrain-popup-x" data-parrain-close aria-label="Fermer">&times;</button>
														<span class="cl-parrain-popup-ico"><i class="fa fa-gift"></i></span>
														<h3><?php echo $lang['CL_PARRAIN_POP_TITLE'][$_SESSION['lang']]; ?></h3>
														<p class="cl-parrain-popup-text"><?php echo $lang['CL_PARRAIN_POP_TEXT'][$_SESSION['lang']]; ?></p>
														<ul class="cl-parrain-popup-list">
															<li><i class="fa fa-bullhorn"></i> <?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></li>
															<li><i class="fa fa-percent"></i> <?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></li>
															<li><i class="fa fa-gift"></i> <?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></li>
														</ul>
														<p class="cl-parrain-popup-filleul"><i class="fa fa-user-plus"></i> <?php echo $lang['CL_PARRAIN_POP_FILLEUL'][$_SESSION['lang']]; ?></p>
														<div class="cl-parrain-popup-actions">
															<a href="javascript:void(0)" class="btn-hw cl-parrain-popup-cta" id="clParrainPopupCta"><span><?php echo $lang['CL_PARRAIN_POP_CTA'][$_SESSION['lang']]; ?></span></a>
															<button type="button" class="cl-parrain-popup-later" data-parrain-close><?php echo $lang['CL_PARRAIN_POP_LATER'][$_SESSION['lang']]; ?></button>
														</div>
														<button type="button" class="cl-parrain-popup-never" id="clParrainPopupNever"><?php echo $lang['CL_PARRAIN_POP_NEVER'][$_SESSION['lang']]; ?></button>
													</div>
												</div>
												<script>
												(function(){
													var pop = document.getElementById("clParrainPopup");
													if(!pop) return;
													function close(){ pop.classList.remove("open"); pop.setAttribute("aria-hidden","true"); }
													function open(){ pop.classList.add("open"); pop.setAttribute("aria-hidden","false"); }
													try {
														if(!localStorage.getItem("clParrainNever") && !sessionStorage.getItem("clParrainSeen")){ setTimeout(open, 1200); sessionStorage.setItem("clParrainSeen","1"); }
													} catch(e){ setTimeout(open, 1200); }
													Array.prototype.forEach.call(pop.querySelectorAll("[data-parrain-close]"), function(el){ el.addEventListener("click", close); });
													var cta = document.getElementById("clParrainPopupCta");
													if(cta) cta.addEventListener("click", function(){ close(); var sec=document.getElementById("parrainageSection"); if(sec){ sec.scrollIntoView({behavior:"smooth", block:"center"}); var f=document.getElementById("paFNom"); if(f) setTimeout(function(){ f.focus(); }, 600); } });
													var never = document.getElementById("clParrainPopupNever");
													if(never) never.addEventListener("click", function(){ try{ localStorage.setItem("clParrainNever","1"); }catch(e){} close(); });
													document.addEventListener("keydown", function(e){ if(e.key==="Escape") close(); });
												})();
												</script>
												<?php endif; ?>
																								<div class="col-12">
				<section class="srv-section" id="services-dev">
  <div class="container">
    <div class="services-header">
      <div>
        <div class="sec-label rv"><?php echo $lang['HOME_SRV_DEV_LABEL'][$_SESSION['lang']]; ?></div>
        <h2 class="sec-title rv d1"><?php echo $lang['HOME_SRV_CORE_TITLE'][$_SESSION['lang']]; ?></h2>
      </div>
    </div>
    <div class="srv-grid rv d2" id="srvGrid3d">

      <div id="owl-core-services" class="owl-carousel owl-theme">

      <!-- Web -->
      <?php $serviceWeb = service::find(38,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
              <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceWeb->getPhotoBanniere(); ?>" alt="<?php echo $serviceWeb->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">Web & Front-end</div>
          <div class="srv-visual-num">01</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_WEB_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceWeb->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_WEB_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>React / Next.js & TypeScript</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>API REST / GraphQL & back-end</li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>SEO technique & Core Web Vitals</li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_WEB_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceWeb->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_WEB_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-laptop-code"></i></div>
            </a>
        </div>
      </div>

      <!-- Mobile -->
      <?php $serviceMobile = service::find(39,$_SESSION['lang']); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceMobile->getPhoto(); ?>" alt="<?php echo $serviceMobile->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag">iOS & Android</div>
          <div class="srv-visual-num">02</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_MOBILE_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceMobile->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>iOS & Android natif / React Native</li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>UI/UX mobile-first & micro-animations</li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_MOBILE_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceMobile->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_MOBILE_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-mobile"></i></div>
            </a>
        </div>
      </div>

      <!-- SaaS -->
      <?php $serviceSaaS = service::find(1,$_SESSION['lang']); if(!$serviceSaaS->getSlug()) $serviceSaaS = service::find(1, langue::getDefaultLanguage()); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
            <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceSaaS->getPhoto(); ?>" alt="<?php echo $serviceSaaS->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag"><?php echo $lang['HOME_SRV_SAAS_TAG'][$_SESSION['lang']]; ?></div>
          <div class="srv-visual-num">03</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_SAAS_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceSaaS->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceSaaS->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_SAAS_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-desktop"></i></div>
            </a>
        </div>
      </div>

      <!-- AI -->
      <?php $serviceIA = service::find(17,$_SESSION['lang']); if(!$serviceIA->getSlug()) $serviceIA = service::find(17, langue::getDefaultLanguage()); ?>
      <div class="srv-card">
        <div class="srv-visual">
          <div class="srv-visual-bg">
             <img src="<?php echo $siteURL; ?>images/services/<?php echo $serviceIA->getPhoto(); ?>" alt="<?php echo $serviceIA->getTitre(); ?>" class="h-100">
          </div>
          <div class="srv-visual-tint"></div>
          <div class="srv-visual-tag"><?php echo $lang['HOME_SRV_IA_TAG'][$_SESSION['lang']]; ?></div>
          <div class="srv-visual-num">04</div>
        </div>
        <div class="srv-body">
          <h3 class="srv-title"><?php echo $lang['HOME_SRV_IA_TITLE'][$_SESSION['lang']]; ?></h3>
          <p class="srv-desc"><?php echo $serviceIA->getTexteAccueil(); ?></p>
          <ul class="srv-features">
            <li class="srv-feat" style="--fi:0"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT1'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:1"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT2'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:2"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT3'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:3"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT4'][$_SESSION['lang']]; ?></li>
            <li class="srv-feat" style="--fi:4"><span class="srv-feat-ico"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><polyline points="1,4 3,6 7,2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span><?php echo $lang['HOME_SRV_SAAS_FEAT5'][$_SESSION['lang']]; ?></li>
          </ul>
            <a href="<?php echo $serviceIA->getLink(); ?>" class="sb sb-compact" role="button">
              <div class="sb-label"><span class="sb-hint"><?php echo $lang['HOME_SRV_IA_CTA'][$_SESSION['lang']]; ?></span></div>
              <div class="sb-knob"><i class="fal fa-robot"></i></div>
            </a>
        </div>
      </div>

      </div>

    </div>
  </div>
</section>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- Start Service Section -->
			<section class="trust" id="trust">
  <div class="trust-head container text-center">
    <h2 class="sec-title rv d1"><?php echo $lang['HOME_TECH_TITLE'][$_SESSION['lang']]; ?></h2>
    <p><?php echo $lang['HOME_TECH_SUB'][$_SESSION['lang']]; ?></p>
  </div>
  <div class="trust-rows">

    <!-- Rangée 1 → gauche -->
    <div class="trust-row">
      <div class="trust-inner go-l">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Rangée 2 → droite (direction opposée) -->
    <div class="trust-row">
      <div class="trust-inner go-r">
        <?php foreach($tools as $tool): ?>
          <div class="trust-item">
            <img class="img-partner" src="<?php echo $siteURL; ?>images/tools/<?php echo $tool->getPhoto(); ?>" alt="<?php echo $tool->getTitre(); ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
			<!-- End Service Section -->
		</div>
	</div>
</section>