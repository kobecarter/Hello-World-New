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
// Avis Google : fiche Marrakech ou Casablanca selon la ville du client
// (Casablanca sert de lien par défaut pour toute ville autre que Marrakech).
$__gmbOn = defined('GMB_REVIEW_URL_MARRAKECH') && defined('GMB_REVIEW_URL_CASABLANCA');
$__gmbUrl = '';
if ($__gmbOn) {
    $__clientVille = isset($_SESSION['client_info']) && is_object($_SESSION['client_info']) && isset($_SESSION['client_info']->ville) ? trim((string) $_SESSION['client_info']->ville) : '';
    $__gmbUrl = (stripos($__clientVille, 'marrakech') !== false) ? GMB_REVIEW_URL_MARRAKECH : GMB_REVIEW_URL_CASABLANCA;
}

// Parrainage : filleuls recommandés par ce client. Le CRM (crm_client_parrainage)
// est la source de vérité -- voir client::getParrainagesByClientApi.
$__parrainages = array();
if (!empty($clientId)) {
    $__parrainages = client::getParrainagesByClientApi($clientId);
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

// Avatar : initiales (repli) + photo réelle si dispo (crm_client.photo, via
// l'URL publique du CRM, puisque site et CRM sont deux document roots
// distincts).
$__initials = strtoupper(mb_substr(trim($user->prenom), 0, 1) . mb_substr(trim($user->nom), 0, 1));
if ($__initials === '') { $__initials = 'CL'; }
$__clientPhotoUrl = '';
if (isset($_SESSION['client_info']) && is_object($_SESSION['client_info']) && !empty($_SESSION['client_info']->photo)) {
    global $apiURL;
    $__crmBaseURL = preg_replace('#components/?$#', '', $apiURL);
    $__clientPhotoUrl = $__crmBaseURL . 'images/clients/' . $_SESSION['client_info']->photo;
}

// Activité récente : factures payées + réclamations traitées + prochaine échéance,
// fusionnées et triées par date (les plus récentes d'abord).
$__activity = array();
foreach ($factures as $__af) {
    if (!is_object($__af) || empty($__af->date_facture)) continue;
    if ((float) $__af->reste <= 0.005 && (float) $__af->total > 0) {
        $__activity[] = array(
            'd' => $__af->date_facture, 'icon' => 'ti ti-files',
            'title' => sprintf($lang['CL_ACT_INVOICE_PAID'][$_SESSION['lang']], $__af->numero),
            'sub' => number_format((float) $__af->total, 2, ',', ' ') . ' ' . $__af->devise,
        );
    }
}
foreach ($reclamations as $__ar) {
    if (!empty($__ar->reponse) && !empty($__ar->date_reponse)) {
        $__activity[] = array(
            'd' => $__ar->date_reponse, 'icon' => 'ti ti-file',
            'title' => sprintf($lang['CL_ACT_TICKET_RESOLVED'][$_SESSION['lang']], htmlspecialchars($__ar->sujet)),
            'sub' => $lang['CL_RECL_RESPONSE'][$_SESSION['lang']],
        );
    }
}
if (count($__remActive) > 0) {
    $__ra0 = $__remActive[0]['r'];
    list(, $__ra0label) = $__expStatus($__remActive[0]['days']);
    $__activity[] = array(
        'd' => $__ra0->date_expir, 'icon' => $__typeIcon($__ra0->type),
        'title' => htmlspecialchars($__ra0->domaine),
        'sub' => $__typeLabel($__ra0->type) . ' · ' . $__ra0label,
    );
}
usort($__activity, function ($a, $b) { return strcmp($b['d'], $a['d']); });
$__activity = array_slice($__activity, 0, 4);

// Coordonnées bancaires : uniquement les entités réellement rattachées aux
// factures de ce client (via id_bank côté CRM), pas la liste complète de
// l'agence. On exclut les comptes personnels et on déduplique par id de compte.
$__clientBanks = array();
$__seenBankIds = array();
foreach ($factures as $__bf) {
    if (!is_object($__bf) || empty($__bf->bank)) continue;
    $__bk = $__bf->bank;
    if (!is_object($__bk) || empty($__bk->id)) continue;
    if (isset($__seenBankIds[$__bk->id])) continue;
    if (stripos((string) $__bk->raison_sociale, 'PERSO') !== false) continue;
    $__seenBankIds[$__bk->id] = true;
    $__clientBanks[] = $__bk;
}

// Paiements groupés par facture, pour décider dans le tableau "Mes factures"
// si on affiche la ligne facture globale ou le détail des paiements -- même
// règle que facture::isGlobalPdfAllowed() côté CRM (0 paiement, ou 1 seul
// paiement couvrant tout le total, à 1 centime près) : la vérité finale reste
// calculée côté CRM au moment du téléchargement, ceci ne pilote que l'affichage.
$__paymentsByFacture = array();
foreach ($payments as $__pm) {
    $__pmFid = is_array($__pm) ? (isset($__pm['id_facture']) ? $__pm['id_facture'] : 0) : (isset($__pm->id_facture) ? $__pm->id_facture : 0);
    if (!$__pmFid) continue;
    if (!isset($__paymentsByFacture[$__pmFid])) { $__paymentsByFacture[$__pmFid] = array(); }
    $__paymentsByFacture[$__pmFid][] = $__pm;
}
$__pmField = function ($p, $k) {
    return is_array($p) ? (isset($p[$k]) ? $p[$k] : null) : (isset($p->$k) ? $p->$k : null);
};
$__isGlobalPdfAllowed = function ($facture) use ($__paymentsByFacture, $__pmField) {
    $pmts = isset($__paymentsByFacture[$facture->ID]) ? $__paymentsByFacture[$facture->ID] : array();
    if (count($pmts) === 0) return true;
    return count($pmts) === 1 && abs((float) $__pmField($pmts[0], 'montant') - (float) $facture->total) < 0.01;
};

// Points de fidélité : le CRM (com_fidelite) est la source de vérité pour le
// total et l'historique -- voir client::getFideliteTotalApi/getFideliteHistoryApi
// (hw-admin/components/com_client/classes/client.php), qui appellent
// hw_crm/components/com_fidelite/controleurs/router.php (task=apiXxx, secret
// partagé). La table locale hw_points_client ne sert plus qu'au journal de
// déduplication côté contrôleur (clAwardDownloadPointOnce, bonus connexion).
$__pointsTotal = 0;
$__pointsHistory = array();
if (!empty($clientId)) {
    $__pointsTotal = client::getFideliteTotalApi($clientId);
    $__pointsHistory = array_slice(client::getFideliteHistoryApi($clientId), 0, 6);
}

// Paliers de récompenses (10/20/50/100 points) : le CRM décide seul quand un
// palier est débloqué et si l'agence l'a remis (statut/libelle/date_affecte
// viennent de crm_client_rewards à chaque chargement). Seuls notifie/
// notifie_don (a-t-on déjà montré le popup one-shot à CE client) restent
// suivis localement -- pure state d'affichage, pas une donnée métier -- dans
// un mini-miroir local (hw_client_rewards) synchronisé ci-dessous.
$__rewards = array();
$__newRewards = array();
$__newGivenRewards = array(); // paliers remis par l'agence, popup "contactez l'agence" pas encore vu
if (!empty($clientId)) {
    $__crmRewards = client::getFideliteRewardsApi($clientId);
    foreach ($__crmRewards as $__cr) {
        $db->query(sprintf(
            "INSERT INTO " . __prefixe_db__ . "client_rewards (id_client, seuil, libelle, statut, date_debloque, date_affecte, affecte_par, notifie, notifie_don)
             VALUES (%s, %s, %s, %s, %s, %s, %s, 0, 0)
             ON DUPLICATE KEY UPDATE libelle = VALUES(libelle), statut = VALUES(statut), date_affecte = VALUES(date_affecte), affecte_par = VALUES(affecte_par)",
            GetSQLValueString((int) $clientId, "int"), GetSQLValueString((int) $__cr['seuil'], "int"),
            GetSQLValueString($__cr['libelle'], "text"), GetSQLValueString((int) $__cr['statut'], "int"),
            GetSQLValueString($__cr['date_debloque'], "text"), GetSQLValueString($__cr['date_affecte'], "text"),
            GetSQLValueString($__cr['affecte_par'], "text")
        ));
    }
    $__rwRows = $db->queryS(sprintf("SELECT id, seuil, libelle, statut, notifie, notifie_don, date_debloque, date_affecte FROM " . __prefixe_db__ . "client_rewards WHERE id_client = %s ORDER BY seuil ASC", GetSQLValueString((int) $clientId, "int")));
    if (is_array($__rwRows)) {
        $__rewards = $__rwRows;
        foreach ($__rewards as $__rw) {
            if ((int) $__rw['notifie'] === 0) {
                $__newRewards[] = $__rw;
                $db->query(sprintf("UPDATE " . __prefixe_db__ . "client_rewards SET notifie = 1 WHERE id = %s", GetSQLValueString((int) $__rw['id'], "int")));
            }
            if ((int) $__rw['statut'] === 1 && (int) $__rw['notifie_don'] === 0) {
                $__newGivenRewards[] = $__rw;
                $db->query(sprintf("UPDATE " . __prefixe_db__ . "client_rewards SET notifie_don = 1 WHERE id = %s", GetSQLValueString((int) $__rw['id'], "int")));
            }
        }
    }
}

// Attestations de référence : demandées par l'agence depuis la fiche CRM du
// client, signées ici. Comptent aussi dans la cloche de notification.
$__attestations = array();
if (!empty($clientId)) {
    $__attResult = client::getAttestationsByClientApi($clientId);
    if (is_array($__attResult)) { $__attestations = $__attResult; }
}
$__attPending = array();
foreach ($__attestations as $__ap) {
    if (is_object($__ap) && (int) $__ap->statu !== 1) { $__attPending[] = $__ap; }
}
$__hasAttn = $__hasAttn || (count($__attPending) > 0);
$__notifCount += count($__attPending);

// Cadeaux remis par l'agence (rappel persistant dans la cloche tant que le
// client n'a pas contacté l'agence — pas de suivi de ce contact, donc on
// affiche tant que statut=1 ; le popup one-shot utilise $__newGivenRewards).
$__givenRewards = array_values(array_filter($__rewards, function ($r) { return (int) $r['statut'] === 1; }));
$__hasAttn = $__hasAttn || (count($__givenRewards) > 0);
$__notifCount += count($__givenRewards);

// Comptes réseaux/plateformes gérés par l'agence pour ce client (lecture
// seule ici — le mot de passe n'est jamais transmis à l'espace client).
$__clientSocials = array();
if (!empty($clientId)) {
    $__csResult = client::getClientSocialsByClientApi($clientId);
    if (is_array($__csResult)) { $__clientSocials = $__csResult; }
}

// Découvrir : catalogues réels du site (agents IA / formations / services).
$__curLangCat = isset($_SESSION['lang']) && $_SESSION['lang'] !== '' ? $_SESSION['lang'] : 'fr';
$__catAgents = array();
$__catFormations = array();
$__catServices = array();
try { $__catAgents = agent_ia::findAll($__curLangCat, true); } catch (\Throwable $e) { $__catAgents = array(); }
try {
    $__catFormationsAll = formation::findAll($__curLangCat, true);
    $__today0 = date('Y-m-d');
    foreach ($__catFormationsAll as $__cf) {
        $__cfEnd = $__cf->getDateFin() ?: $__cf->getDateDebut();
        if (empty($__cfEnd) || $__cfEnd >= $__today0) { $__catFormations[] = $__cf; }
        if (count($__catFormations) >= 6) { break; }
    }
} catch (\Throwable $e) { $__catFormations = array(); }
try { $__catServices = service::findAll($__curLangCat, true, true, true); $__catServices = array_slice($__catServices, 0, 8); } catch (\Throwable $e) { $__catServices = array(); }

// Historique des demandes du client (essai/commande agent IA, inscription
// formation, commande service).
$__myDemandes = array();
if (!empty($clientId)) {
    $__mdRows = $db->queryS(sprintf("SELECT type, ref_titre, statut, date_add FROM " . __prefixe_db__ . "demande_client WHERE id_client = %s ORDER BY date_add DESC LIMIT 10", GetSQLValueString((int) $clientId, "int")));
    if (is_array($__mdRows)) { $__myDemandes = $__mdRows; }
}
$__demandeTypeLabel = function ($t) use ($lang) {
    $map = array(
        'agent_essai'    => 'CL_DEMANDE_TYPE_AGENT_ESSAI',
        'agent_commande' => 'CL_DEMANDE_TYPE_AGENT_COMMANDE',
        'formation'      => 'CL_DEMANDE_TYPE_FORMATION',
        'service'        => 'CL_DEMANDE_TYPE_SERVICE',
    );
    $key = isset($map[$t]) ? $map[$t] : null;
    return $key ? $lang[$key][$_SESSION['lang']] : $t;
};
$__demandeStatutLabel = function ($s) use ($lang) {
    $s = (int) $s;
    if ($s === 2) return array('done', $lang['CL_DEMANDE_ST_DONE'][$_SESSION['lang']]);
    if ($s === 1) return array('progress', $lang['CL_DEMANDE_ST_PROGRESS'][$_SESSION['lang']]);
    return array('new', $lang['CL_DEMANDE_ST_NEW'][$_SESSION['lang']]);
};

$__hasNoBillingHistory = (count($factures) === 0 && count($payments) === 0);
?><!-- CLIENT SPACE — TOP NAV -->
<section class="cl-topnav">
	<div class="container cl-topnav-inner">
		<button type="button" class="cl-burger" id="clBurgerBtn" aria-haspopup="true" aria-expanded="false" aria-controls="clPillnav" aria-label="Menu"><i class="fa fa-bars"></i></button>
		<a href="<?php echo $siteURL; ?>" class="cl-topnav-logo">Espace <span>Client</span></a>
		<ul class="cl-pillnav cl-group-nav" id="clPillnav">
			<li><a class="cl-pill active" href="javascript:void(0)" data-cl-group="apercu"><i class="ti ti-dashboard"></i> <?php echo $lang['CL_GROUP_OVERVIEW'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill cl-pill-club" href="javascript:void(0)" data-cl-group="club"><i class="fa fa-diamond"></i> <?php echo $lang['CL_GROUP_CLUB'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill" href="javascript:void(0)" data-cl-group="decouvrir"><i class="ti ti-direction"></i> <?php echo $lang['CL_GROUP_DISCOVER'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill" href="javascript:void(0)" data-cl-group="facturation"><i class="ti ti-wallet"></i> <?php echo $lang['CL_GROUP_BILLING'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill" href="javascript:void(0)" data-cl-group="parrainage"><i class="ti ti-gift"></i> <?php echo $lang['CL_GROUP_REFERRAL'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill" href="javascript:void(0)" data-cl-group="support"><i class="ti ti-headphone"></i> <?php echo $lang['CL_GROUP_SUPPORT'][$_SESSION['lang']]; ?></a></li>
			<li><a class="cl-pill" href="javascript:void(0)" data-cl-group="compte"><i class="ti ti-user"></i> <?php echo $lang['CL_GROUP_ACCOUNT'][$_SESSION['lang']]; ?></a></li>
		</ul>
		<div class="cl-topnav-actions">
			<div class="cl-notif" id="clNotif">
				<button type="button" class="cl-notif-btn<?php echo $__notifCount > 0 ? ' has-alert' : ''; ?>" id="clNotifBtn" aria-haspopup="true" aria-expanded="false" aria-label="<?php echo $lang['CL_NOTIF_TITLE'][$_SESSION['lang']]; ?>">
					<i class="fa fa-bell"></i>
					<?php if ($__notifCount > 0) : ?><span class="cl-notif-badge"><?php echo $__notifCount; ?></span><?php endif; ?>
				</button>
			</div>
			<span class="cl-avatar">
				<span class="cl-avatar-clip">
					<?php if (!empty($__clientPhotoUrl)) : ?><img src="<?php echo htmlspecialchars($__clientPhotoUrl); ?>" alt="" onerror="this.remove();"><?php endif; ?>
					<span class="cl-avatar-initials"><?php echo htmlspecialchars($__initials); ?></span>
				</span>
				<span class="cl-avatar-online" aria-hidden="true" title="En ligne"></span>
			</span>
			<a href="javascript:void(0)" class="cl-logout-btn btn-sign-out" title="<?php echo $lang['CL_LOGOUT'][$_SESSION['lang']]; ?>"><i class="fa fa-sign-out"></i></a>
		</div>
	</div>
</section>

<!-- #clNotifPanel vit ici, HORS de .cl-topnav : .cl-topnav a un backdrop-filter
     (et avait un transform), qui crée un nouveau containing block pour tout
     descendant en position:fixed. Le panneau, positionné en JS par coordonnées
     viewport (clPositionNotif), se retrouvait décalé par rapport à sa cible
     réelle tant qu'il restait imbriqué dans la topnav. -->
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
						<a class="cl-notif-item is-<?php echo $__cls; ?>" href="javascript:void(0)" data-cl-group="support">
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
						<a class="cl-notif-item is-<?php echo $__pcls; ?>" href="javascript:void(0)" data-cl-group="facturation">
							<span class="cl-notif-ico"><i class="ti ti-files"></i></span>
							<span class="cl-notif-txt">
								<b><?php echo number_format((float) $__f->reste, 2, ',', ' ') . ' ' . $__f->devise; ?></b>
								<small><?php echo $__f->numero . ' &middot; ' . $__plabel; ?></small>
							</span>
						</a>
						<?php endforeach; ?>
						<?php foreach ($__attPending as $__apn) : ?>
						<a class="cl-notif-item is-soon" href="javascript:void(0)" data-cl-group="club">
							<span class="cl-notif-ico"><i class="fa fa-file-text-o"></i></span>
							<span class="cl-notif-txt">
								<b><?php echo htmlspecialchars($__apn->titre); ?></b>
								<small><?php echo $lang['CL_NOTIF_ATTESTATION'][$_SESSION['lang']]; ?></small>
							</span>
						</a>
						<?php endforeach; ?>
						<?php foreach ($__givenRewards as $__gr) : ?>
						<a class="cl-notif-item is-ok" href="javascript:void(0)" data-cl-group="club">
							<span class="cl-notif-ico"><i class="fa fa-gift"></i></span>
							<span class="cl-notif-txt">
								<b><?php echo htmlspecialchars($__gr['libelle']); ?></b>
								<small><?php echo $lang['CL_NOTIF_REWARD_GIVEN'][$_SESSION['lang']]; ?></small>
							</span>
						</a>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
<div class="cl-topnav-spacer" id="clTopnavSpacer" aria-hidden="true"></div>
<script>
(function(){
	var nav = document.querySelector('.cl-topnav');
	var spacer = document.getElementById('clTopnavSpacer');
	if (!nav || !spacer) return;
	function sync() { spacer.style.height = nav.getBoundingClientRect().bottom + 'px'; }
	sync();
	window.addEventListener('resize', sync);
	setTimeout(sync, 300);
})();
</script>

<section class="cl-dash-hero">
	<span class="cl-dash-hero-ghost" aria-hidden="true">Client</span>
	<div class="container cl-dash-hero-inner">
		<h1 class="cl-dash-hero-title"><?php echo $lang['CL_HELLO'][$_SESSION['lang']]; ?> <em><?= trim($user->nom . " " . $user->prenom) ?: 'Client' ?></em></h1>
		<span class="cl-dash-hero-rule" aria-hidden="true"></span>
	</div>
</section>

<section class="page-template page-client-space">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="logoutMessage"><div class="msgbox"></div></div>
			</div>
			<div class="col-sm-12">
				<?php echo $page->getTexte(); ?>
				<div class="div-client-space">
					<script>
					(function () {
						function init() {
							var links = document.querySelectorAll('[data-cl-group]');
							var panels = document.querySelectorAll('[data-cl-group-panel]');
							function showGroup(key) {
								panels.forEach(function (p) {
									var on = p.getAttribute('data-cl-group-panel') === key;
									p.classList.toggle('active', on);
									if (on && typeof window.clAnimateGroupIn === 'function') window.clAnimateGroupIn(p);
								});
								links.forEach(function (l) { l.classList.toggle('active', l.getAttribute('data-cl-group') === key); });
								closeBurger();
							}
							links.forEach(function (l) {
								l.addEventListener('click', function () { showGroup(this.getAttribute('data-cl-group')); });
							});
							window.clShowGroup = showGroup;

							var burgerBtn = document.getElementById('clBurgerBtn');
							var pillnav = document.getElementById('clPillnav');
							function closeBurger() {
								if (!burgerBtn || !pillnav) return;
								pillnav.classList.remove('is-open');
								burgerBtn.setAttribute('aria-expanded', 'false');
							}
							window.clCloseBurger = closeBurger;
							if (burgerBtn && pillnav) {
								burgerBtn.addEventListener('click', function (e) {
									e.stopPropagation();
									var open = pillnav.classList.toggle('is-open');
									burgerBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
									if (open && typeof window.clNotifSetOpen === 'function') window.clNotifSetOpen(false);
								});
								document.addEventListener('click', function (e) {
									if (!pillnav.contains(e.target) && e.target !== burgerBtn && !burgerBtn.contains(e.target)) closeBurger();
								});
								document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeBurger(); });
							}
						}
						if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
					})();
					</script>
					<div class="cl-group-content">

						<!-- ================= APERÇU ================= -->
						<div class="cl-group-panel active" data-cl-group-panel="apercu">
							<?php if ($__hasAttn) : ?>
							<div class="cl-urgent-row">
								<?php if (count($__pending) > 0) :
									$__dueTxt = array();
									foreach ($__dueByCur as $__cur => $__amt) { $__dueTxt[] = number_format($__amt, 2, ',', ' ') . ' ' . $__cur; }
								?>
								<div class="cl-urgent-card is-danger">
									<span class="cl-urgent-ico"><i class="ti ti-files"></i></span>
									<div class="cl-urgent-body">
										<div class="cl-urgent-label"><?php echo count($__pending) > 1 ? $lang['CL_URGENT_UNPAID_MULTI'][$_SESSION['lang']] : $lang['CL_URGENT_UNPAID_LABEL'][$_SESSION['lang']]; ?></div>
										<div class="cl-urgent-title"><?php echo implode(' + ', $__dueTxt); ?></div>
										<div class="cl-urgent-sub"><?php echo count($__pending); ?> <?php echo strtolower($lang['CL_INVOICES'][$_SESSION['lang']]); ?></div>
									</div>
									<a href="javascript:void(0)" class="cl-urgent-cta" data-cl-group="facturation"><?php echo $lang['CL_URGENT_PAY_CTA'][$_SESSION['lang']]; ?></a>
								</div>
								<?php endif; ?>
								<?php if (count($__expSoon) > 0) :
									$__nextExp = $__expSoon[0]['r'];
									$__nextExpDays = $__expSoon[0]['days'];
									list($__necls, $__nelabel) = $__expStatus($__nextExpDays);
								?>
								<div class="cl-urgent-card is-warning">
									<span class="cl-urgent-ico"><i class="<?php echo $__typeIcon($__nextExp->type); ?>"></i></span>
									<div class="cl-urgent-body">
										<div class="cl-urgent-label"><?php echo $lang['CL_URGENT_EXPIRING_LABEL'][$_SESSION['lang']]; ?></div>
										<div class="cl-urgent-title"><?php echo htmlspecialchars($__nextExp->domaine); ?></div>
										<div class="cl-urgent-sub"><?php echo $__typeLabel($__nextExp->type) . ' · ' . $__nelabel; ?></div>
									</div>
									<a href="javascript:void(0)" class="cl-urgent-cta" data-cl-group="support"><?php echo $lang['CL_URGENT_VIEW_CTA'][$_SESSION['lang']]; ?></a>
								</div>
								<?php endif; ?>
							</div>
							<?php else : ?>
							<div class="cl-urgent-empty"><i class="fa fa-check-circle"></i> <?php echo $lang['CL_URGENT_NONE'][$_SESSION['lang']]; ?></div>
							<?php endif; ?>
							<div class="cl-apercu-grid">
							<?php
							$__ev = array();
							foreach ($factures as $__f) { if (!is_object($__f) || empty($__f->date_facture)) { continue; } $__ev[] = array('d' => $__f->date_facture, 'inv' => (float) $__f->total, 'pay' => 0.0); }
							foreach ($payments as $__p) {
								$__pd = is_array($__p) ? (isset($__p['date']) ? $__p['date'] : null) : (isset($__p->date) ? $__p->date : null);
								$__pm = is_array($__p) ? (isset($__p['montant']) ? $__p['montant'] : 0) : (isset($__p->montant) ? $__p->montant : 0);
								if (empty($__pd) || $__pd === '0000-00-00') { continue; }
								$__ev[] = array('d' => $__pd, 'inv' => 0.0, 'pay' => (float) $__pm);
							}
							usort($__ev, function ($a, $b) { return strcmp($a['d'], $b['d']); });
							$__pcLabels = array(); $__pcInv = array(); $__pcSolde = array();
							$__cumInv = 0; $__cumPay = 0;
							foreach ($__ev as $__e) {
								$__cumInv += $__e['inv']; $__cumPay += $__e['pay'];
								$__pcLabels[] = date('d/m/Y', strtotime($__e['d']));
								$__pcInv[]   = round($__cumInv, 2);
								$__pcSolde[] = round(max($__cumInv - $__cumPay, 0), 2);
							}
							if (count($__ev) > 0) {
								$__lastD = date('Y-m-d', strtotime($__ev[count($__ev) - 1]['d']));
								if ($__lastD < date('Y-m-d')) {
									$__pcLabels[] = date('d/m/Y');
									$__pcInv[]   = round($__cumInv, 2);
									$__pcSolde[] = round(max($__cumInv - $__cumPay, 0), 2);
								}
							}
							$__curYear = date('Y');
							$__paidAllByCur = array();
							$__paidYearByCur = array();
							foreach ($payments as $__pk) {
								$__pkd = is_array($__pk) ? (isset($__pk['date']) ? $__pk['date'] : null) : (isset($__pk->date) ? $__pk->date : null);
								$__pkm = is_array($__pk) ? (isset($__pk['montant']) ? $__pk['montant'] : 0) : (isset($__pk->montant) ? $__pk->montant : 0);
								$__pkc = is_array($__pk) ? (isset($__pk['devise']) ? $__pk['devise'] : '') : (isset($__pk->devise) ? $__pk->devise : '');
								if (empty($__pkd) || $__pkd === '0000-00-00') { continue; }
								if (!isset($__paidAllByCur[$__pkc])) { $__paidAllByCur[$__pkc] = 0.0; }
								$__paidAllByCur[$__pkc] += (float) $__pkm;
								if (date('Y', strtotime($__pkd)) === $__curYear) {
									if (!isset($__paidYearByCur[$__pkc])) { $__paidYearByCur[$__pkc] = 0.0; }
									$__paidYearByCur[$__pkc] += (float) $__pkm;
								}
							}
							$__fmtByCur = function ($byCur) {
								$parts = array();
								foreach ($byCur as $cur => $amt) { $parts[] = number_format($amt, 2, ',', ' ') . ' ' . $cur; }
								return count($parts) > 0 ? implode(' + ', $parts) : '0';
							};
							if (count($__pcLabels) > 0) :
							?>
							<div class="cl-chart-card">
								<div class="cl-chart-head">
									<h3 class="cl-chart-title"><?php echo $lang['CL_CHART_TITLE'][$_SESSION['lang']]; ?></h3>
									<div class="cl-chart-kpis">
										<div class="cl-chart-kpi">
											<span class="cl-chart-kpi-label"><?php echo $lang['CL_CHART_TOTAL_PAID'][$_SESSION['lang']]; ?></span>
											<span class="cl-chart-kpi-val"><?php echo $__fmtByCur($__paidAllByCur); ?></span>
										</div>
										<div class="cl-chart-kpi">
											<span class="cl-chart-kpi-label"><?php echo sprintf($lang['CL_CHART_PAID_THIS_YEAR'][$_SESSION['lang']], $__curYear); ?></span>
											<span class="cl-chart-kpi-val"><?php echo $__fmtByCur($__paidYearByCur); ?></span>
										</div>
									</div>
								</div>
								<div class="cl-chart-canvas-wrap"><canvas id="paymentChart"></canvas></div>
							</div>
							<script src="<?php echo $siteURL; ?>assets/js/chart.umd.min.js"></script>
							<script>
							(function () {
								var el = document.getElementById('paymentChart');
								if (!el || typeof Chart === 'undefined') return;
								var labels   = <?php echo json_encode($__pcLabels); ?>;
								var invoiced = <?php echo json_encode($__pcInv); ?>;
								var paid     = <?php echo json_encode($__pcSolde); ?>;
								var ctx = el.getContext('2d');
								var gInv = ctx.createLinearGradient(0, 0, 0, 260);
								gInv.addColorStop(0, 'rgba(104,2,98,.20)'); gInv.addColorStop(1, 'rgba(104,2,98,0)');
								var gPaid = ctx.createLinearGradient(0, 0, 0, 260);
								gPaid.addColorStop(0, 'rgba(245,166,35,.30)'); gPaid.addColorStop(1, 'rgba(245,166,35,0)');
								new Chart(el, {
									type: 'line',
									data: {
										labels: labels,
										datasets: [
											{ label: <?php echo json_encode($lang['CL_CHART_INVOICED'][$_SESSION['lang']]); ?>, data: invoiced, borderColor: '#680262', backgroundColor: gInv, borderWidth: 1.5, borderDash: [5,4], fill: false, tension: .35, pointRadius: 0, pointHoverRadius: 4, pointBackgroundColor: '#680262' },
											{ label: <?php echo json_encode($lang['CL_CHART_REMAINING'][$_SESSION['lang']]); ?>, data: paid, borderColor: '#f5a623', backgroundColor: gPaid, borderWidth: 3, fill: true, tension: .35, pointRadius: 3, pointHoverRadius: 5, pointBackgroundColor: '#f5a623' }
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
							<?php else : ?>
							<div class="cl-chart-card cl-chart-empty">
								<div class="cl-chart-empty-inner">
									<span class="cl-chart-empty-ico"><i class="ti ti-rocket"></i></span>
									<h3><?php echo $lang['CL_CHART_EMPTY_TITLE'][$_SESSION['lang']]; ?></h3>
									<p><?php echo $lang['CL_CHART_EMPTY_SUB'][$_SESSION['lang']]; ?></p>
									<a href="javascript:void(0)" class="btn-hw cl-chart-empty-cta" data-cl-group="decouvrir"><span><?php echo $lang['CL_CHART_EMPTY_CTA'][$_SESSION['lang']]; ?></span></a>
								</div>
							</div>
							<?php endif; ?>
							<div class="cl-apercu-side">
							<div class="cl-stat-2x2">
								<div class="cl-stat-tile t-teal" data-cl-group="facturation">
									<span class="cl-stat-ico"><i class="ti ti-files"></i></span>
									<div class="cl-stat-num"><?= sizeof($factures) ?></div>
									<div class="cl-stat-label"><?php echo $lang['CL_INVOICES'][$_SESSION['lang']]; ?></div>
								</div>
								<div class="cl-stat-tile t-purple" data-cl-group="facturation">
									<span class="cl-stat-ico"><i class="ti ti-clipboard"></i></span>
									<div class="cl-stat-num"><?= sizeof($devis) ?></div>
									<div class="cl-stat-label"><?php echo $lang['CL_QUOTES'][$_SESSION['lang']]; ?></div>
								</div>
								<div class="cl-stat-tile t-amber" data-cl-group="support">
									<span class="cl-stat-ico"><i class="ti ti-file"></i></span>
									<div class="cl-stat-num"><?= sizeof($reclamations) ?></div>
									<div class="cl-stat-label"><?php echo $lang['CL_REQUESTS'][$_SESSION['lang']]; ?></div>
								</div>
								<div class="cl-stat-tile t-green" data-cl-group="support">
									<span class="cl-stat-ico"><i class="ti ti-mobile"></i></span>
									<div class="cl-stat-num"><?= sizeof($rapples) ?></div>
									<div class="cl-stat-label"><?php echo $lang['CL_RECALLS'][$_SESSION['lang']]; ?></div>
								</div>
							</div>
							</div>
							</div>
							<a href="javascript:void(0)" class="cl-points-mini" data-cl-group="club">
								<span class="cl-points-mini-ico"><i class="fa fa-diamond"></i></span>
								<div class="cl-points-mini-body">
									<div class="cl-points-mini-num"><?php echo (int) $__pointsTotal; ?></div>
									<div class="cl-points-mini-label"><?php echo $lang['CL_POINTS_TITLE'][$_SESSION['lang']]; ?></div>
								</div>
								<span class="cl-points-mini-arrow"><i class="fa fa-angle-right"></i></span>
							</a>
							<div class="cl-apercu-lower">
								<div class="cl-activity-card">
									<h3 class="cl-activity-title"><?php echo $lang['CL_ACTIVITY_TITLE'][$_SESSION['lang']]; ?></h3>
									<?php if (count($__activity) === 0) : ?>
									<div class="cl-activity-empty"><?php echo $lang['CL_ACTIVITY_EMPTY'][$_SESSION['lang']]; ?></div>
									<?php else : foreach ($__activity as $__a) : ?>
									<div class="cl-activity-row">
										<span class="cl-activity-ico"><i class="<?php echo $__a['icon']; ?>"></i></span>
										<div class="cl-activity-txt">
											<b><?php echo $__a['title']; ?></b>
											<span><?php echo $__a['sub']; ?></span>
										</div>
									</div>
									<?php endforeach; endif; ?>
								</div>
								<div class="cl-gains-banner">
									<div class="cl-gains-banner-main">
										<span class="cl-gains-banner-ico"><i class="fa fa-gift"></i></span>
										<div class="cl-gains-banner-body">
											<b><?php echo $lang['CL_PARRAIN_GAINS'][$_SESSION['lang']]; ?></b>
											<ul class="cl-gains-banner-list">
												<li><i class="fa fa-bullhorn"></i> <?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></li>
												<li><i class="fa fa-percent"></i> <?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></li>
												<li><i class="fa fa-gift"></i> <?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></li>
												<li><i class="fa fa-star"></i> <?php echo $lang['CL_PARRAIN_GAIN_POINTS'][$_SESSION['lang']]; ?></li>
												<li><i class="fa fa-search"></i> <?php echo $lang['CL_PARRAIN_GAIN_AUDIT'][$_SESSION['lang']]; ?></li>
												<li><i class="fa fa-graduation-cap"></i> <?php echo $lang['CL_PARRAIN_GAIN_FORMATION'][$_SESSION['lang']]; ?></li>
											</ul>
										</div>
									</div>
									<a href="javascript:void(0)" class="btn-hw cl-gains-banner-btn" data-parrain-scroll><span><?php echo $lang['CL_PARRAIN_POP_CTA'][$_SESSION['lang']]; ?></span></a>
								</div>
							</div>
						</div>

						<!-- ================= FACTURATION ================= -->
						<div class="cl-group-panel" data-cl-group-panel="facturation">
							<h3 class="cl-subhead"><i class="ti ti-files"></i> <?php echo $lang['CL_INVOICES'][$_SESSION['lang']]; ?></h3>
							<p class="cl-table-scroll-hint"><i class="fa fa-arrows-h"></i> <?php echo $lang['CL_TABLE_SCROLL_HINT'][$_SESSION['lang']]; ?></p>
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead><tr>
										<th><?php echo $lang['CL_TH_INVOICE_NUM'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_BILLING_DATE'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_TOTAL'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_REST'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_ACTION'][$_SESSION['lang']]; ?></th>
									</tr></thead>
									<tbody>
									<?php foreach ($factures as $factureJson) :
										$facture = $factureJson;
										if ($facture->total == $facture->reste) { $statu = '<span class="badge bg-danger text-white">' . $lang['CL_ST_UNPAID'][$_SESSION['lang']] . '</span>'; }
										elseif ($facture->total > $facture->reste && $facture->reste > 0) { $statu = '<span class="badge bg-warning text-white">' . $lang['CL_ST_PARTIAL'][$_SESSION['lang']] . '</span>'; }
										elseif ($facture->reste <= 0) { $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_PAID'][$_SESSION['lang']] . '</span>'; }
									?>
									<?php if ($__isGlobalPdfAllowed($facture)) : ?>
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
									<?php else :
										$__fPmts = $__paymentsByFacture[$facture->ID];
										foreach ($__fPmts as $__fpIdx => $__fp) :
											$__fpId = $__pmField($__fp, 'id');
											$__fpSeq = $__pmField($__fp, 'numero_sequence');
											$__fpSeq = ($__fpSeq !== null && $__fpSeq !== '') ? $__fpSeq : ($__fpIdx + 1);
									?>
									<tr>
										<td><?php echo $facture->numero . '-' . $__fpSeq; ?></td>
										<td><?php echo normaldate($__pmField($__fp, 'date')); ?></td>
										<td><?php echo number_format((float) $__pmField($__fp, 'montant'), 2, ',', ' ') . ' ' . $__pmField($__fp, 'devise'); ?></td>
										<td>—</td>
										<td><span class="badge bg-success text-white"><?php echo $lang['CL_ST_PAID'][$_SESSION['lang']]; ?></span></td>
										<td>
											<a class="btn btn-sm btn-danger btn-download-payment text-white" data-id="<?php echo (int) $__fpId; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Download"><i class="far fa-file-pdf"></i></a>
											<a class="btn btn-sm btn-danger btn-loading d-none" href="javascript:void(0)"><i class="fa fa-spinner"></i></a>
										</td>
									</tr>
									<?php endforeach;
									endif; ?>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<h3 class="cl-subhead"><i class="ti ti-clipboard"></i> <?php echo $lang['CL_QUOTES'][$_SESSION['lang']]; ?></h3>
							<p class="cl-table-scroll-hint"><i class="fa fa-arrows-h"></i> <?php echo $lang['CL_TABLE_SCROLL_HINT'][$_SESSION['lang']]; ?></p>
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead><tr>
										<th><?php echo $lang['CL_TH_QUOTE_NUM'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_QUOTE_DATE'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_TOTAL'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_ACTION'][$_SESSION['lang']]; ?></th>
									</tr></thead>
									<tbody>
									<?php foreach ($devis as $devisJson) :
										$devi = $devisJson;
										// Mêmes codes de statut que le CRM (devis::STATU_* -- components/com_devis/classes/devis.php)
										// et mêmes libellés que components/com_devis/views/devis/list.php côté CRM.
										switch ($devi->statu) {
											case '1': $statu = '<span class="badge bg-primary text-white">' . $lang['CL_ST_QUOTE_SENT'][$_SESSION['lang']] . '</span>'; break;
											case '2': $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_QUOTE_ACCEPTED'][$_SESSION['lang']] . '</span>'; break;
											case '3': $statu = '<span class="badge bg-primary text-white">' . $lang['CL_ST_QUOTE_CONTRACT_PENDING'][$_SESSION['lang']] . '</span>'; break;
											case '4': $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_QUOTE_PAID'][$_SESSION['lang']] . '</span>'; break;
											case '5': $statu = '<span class="badge bg-danger text-white">' . $lang['CL_ST_QUOTE_REFUSED'][$_SESSION['lang']] . '</span>'; break;
											case '6': $statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_QUOTE_SIGNED'][$_SESSION['lang']] . '</span>'; break;
											default:  $statu = '<span class="badge bg-warning text-white">' . $lang['CL_ST_QUOTE_DRAFT'][$_SESSION['lang']] . '</span>'; break;
										}
									?>
									<tr>
										<td><?php echo $devi->numero; ?></td>
										<td><?php echo normaldate($devi->date_devis); ?></td>
										<td><?php echo number_format($devi->total, 2, ',', ' ') . ' ' . $devi->devise; ?></td>
										<td><?php echo $statu; ?></td>
										<td><a class="btn btn-sm btn-danger btn-download-quote text-white" data-id="<?= $devi->id ?>" href="javascript:void(0)" data-toggle="tooltip" title="Download"><i class="far fa-file-pdf"></i></a><a class="btn btn-sm btn-danger btn-loading d-none" href="javascript:void(0)"><i class="fa fa-spinner"></i></a></td>
									</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<h3 class="cl-subhead"><i class="ti ti-wallet"></i> <?php echo $lang['CL_TAB_BANK'][$_SESSION['lang']]; ?></h3>
							<?php if (count($__clientBanks) === 0) : ?>
							<div class="cl-bank-empty"><?php echo $lang['CL_BANK_NONE'][$_SESSION['lang']]; ?></div>
							<?php else : ?>
							<div class="cl-bank-grid">
								<?php foreach ($__clientBanks as $__bk) : ?>
								<div class="cl-bank-card">
									<div class="cl-bank-card-head"><?php echo htmlspecialchars($__bk->raison_sociale); ?></div>
									<?php if (!empty($__bk->rib)) : ?><div class="cl-bank-row"><span>RIB</span><b><?php echo htmlspecialchars($__bk->rib); ?></b></div><?php endif; ?>
									<?php if (!empty($__bk->code_swift)) : ?><div class="cl-bank-row"><span><?php echo $lang['CL_BANK_SWIFT_CODE'][$_SESSION['lang']]; ?></span><b><?php echo htmlspecialchars($__bk->code_swift); ?></b></div><?php endif; ?>
									<?php if (!empty($__bk->iban_number)) : ?><div class="cl-bank-row"><span><?php echo $lang['CL_BANK_IBAN'][$_SESSION['lang']]; ?></span><b><?php echo htmlspecialchars($__bk->iban_number); ?></b></div><?php endif; ?>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>

						<!-- ================= SUPPORT ================= -->
						<div class="cl-group-panel" data-cl-group-panel="support">
							<h3 class="cl-subhead"><i class="ti ti-file"></i> <?php echo $lang['CL_TAB_REQUESTS'][$_SESSION['lang']]; ?></h3>
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

							<h3 class="cl-subhead"><i class="ti ti-mobile"></i> <?php echo $lang['CL_TAB_RECALLS'][$_SESSION['lang']]; ?></h3>
							<p class="cl-table-scroll-hint"><i class="fa fa-arrows-h"></i> <?php echo $lang['CL_TABLE_SCROLL_HINT'][$_SESSION['lang']]; ?></p>
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead><tr>
										<th><?php echo $lang['CL_TH_TYPE'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_DOMAIN'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_EXPIRATION'][$_SESSION['lang']]; ?></th>
										<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
									</tr></thead>
									<tbody>
									<?php if (count($__remActive) === 0) : ?>
									<tr><td colspan="4" class="text-center text-muted"><?php echo $lang['CL_ATTN_NONE_EXP'][$_SESSION['lang']]; ?></td></tr>
									<?php else : foreach ($__remActive as $__e) :
										$__r = $__e['r'];
										list($__cls, $__stLabel) = $__expStatus($__e['days']); ?>
									<tr>
										<td><span class="cl-recl-type-ico"><i class="<?php echo $__typeIcon($__r->type); ?>"></i></span> <?php echo $__typeLabel($__r->type); ?></td>
										<td><?php echo htmlspecialchars($__r->domaine); ?></td>
										<td><?php echo normaldate($__r->date_expir); ?></td>
										<td><span class="cl-attn-badge cl-attn-<?php echo $__cls; ?>"><?php echo $__stLabel; ?></span></td>
									</tr>
									<?php endforeach; endif; ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- ================= PARRAINAGE ================= -->
						<div class="cl-group-panel" data-cl-group-panel="parrainage">
							<div class="cl-parrain" id="parrainageSection">
								<div class="cl-parrain-head">
									<span class="cl-parrain-ico"><i class="ti ti-user"></i></span>
									<div>
										<h2><?php echo $lang['CL_PARRAIN_TITLE'][$_SESSION['lang']]; ?></h2>
										<p><?php echo $lang['CL_PARRAIN_SUB'][$_SESSION['lang']]; ?></p>
									</div>
								</div>
								<div class="cl-parrain-gains cl-gains-showcase">
									<span class="cl-parrain-gains-label"><?php echo $lang['CL_PARRAIN_GAINS'][$_SESSION['lang']]; ?></span>
									<div class="cl-gains-showcase-grid">
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-bullhorn"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></b></div>
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-percent"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></b></div>
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-gift"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></b></div>
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-star"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_POINTS'][$_SESSION['lang']]; ?></b></div>
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-search"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_AUDIT'][$_SESSION['lang']]; ?></b></div>
										<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-graduation-cap"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_FORMATION'][$_SESSION['lang']]; ?></b></div>
									</div>
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
										<li><i class="fa fa-star"></i> <?php echo $lang['CL_PARRAIN_GAIN_POINTS'][$_SESSION['lang']]; ?></li>
										<li><i class="fa fa-search"></i> <?php echo $lang['CL_PARRAIN_GAIN_AUDIT'][$_SESSION['lang']]; ?></li>
										<li><i class="fa fa-graduation-cap"></i> <?php echo $lang['CL_PARRAIN_GAIN_FORMATION'][$_SESSION['lang']]; ?></li>
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
								if(cta) cta.addEventListener("click", function(){ close(); if(window.clShowGroup) window.clShowGroup("parrainage"); var sec=document.getElementById("parrainageSection"); if(sec){ setTimeout(function(){ sec.scrollIntoView({behavior:"smooth", block:"center"}); var f=document.getElementById("paFNom"); if(f) setTimeout(function(){ f.focus(); },350); }, 60); } });
								var never = document.getElementById("clParrainPopupNever");
								if(never) never.addEventListener("click", function(){ try{ localStorage.setItem("clParrainNever","1"); }catch(e){} close(); });
								document.addEventListener("keydown", function(e){ if(e.key==="Escape") close(); });
							})();
							</script>
							<?php endif; ?>
						</div>

						<!-- ================= CLUB ÉLITE ================= -->
						<div class="cl-group-panel" data-cl-group-panel="club">
							<div class="cl-club-hero">
								<span class="cl-club-hero-ico"><i class="fa fa-diamond"></i></span>
								<div>
									<h2><?php echo $lang['CL_CLUB_HERO_TITLE'][$_SESSION['lang']]; ?></h2>
									<p><?php echo $lang['CL_CLUB_HERO_SUB'][$_SESSION['lang']]; ?></p>
								</div>
							</div>

							<div class="cl-points-how">
								<h3><i class="ti ti-light-bulb"></i> <?php echo $lang['CL_POINTS_HOW_TITLE'][$_SESSION['lang']]; ?></h3>
								<div class="cl-points-how-grid">
									<a href="javascript:void(0)" class="cl-points-how-step" data-cl-group="compte">
										<span class="cl-points-how-badge">+10</span>
										<span class="cl-points-how-ico"><i class="ti ti-star"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_AVIS_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_AVIS_DESC'][$_SESSION['lang']]; ?></p>
									</a>
									<a href="javascript:void(0)" class="cl-points-how-step" data-cl-group="parrainage">
										<span class="cl-points-how-badge">+15</span>
										<span class="cl-points-how-ico"><i class="ti ti-share"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_PARRAIN_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_PARRAIN_DESC'][$_SESSION['lang']]; ?></p>
									</a>
									<span class="cl-points-how-step">
										<span class="cl-points-how-badge">+20</span>
										<span class="cl-points-how-ico"><i class="ti ti-check-box"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_ATT_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_ATT_DESC'][$_SESSION['lang']]; ?></p>
									</span>
									<a href="javascript:void(0)" class="cl-points-how-step" data-cl-group="facturation">
										<span class="cl-points-how-badge">+1</span>
										<span class="cl-points-how-ico"><i class="ti ti-download"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_DL_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_DL_DESC'][$_SESSION['lang']]; ?></p>
									</a>
									<div class="cl-points-how-step cl-points-how-social">
										<span class="cl-points-how-badge">+3</span>
										<span class="cl-points-how-ico"><i class="fa fa-heart"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_SOCIAL_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_SOCIAL_DESC'][$_SESSION['lang']]; ?></p>
										<div class="cl-points-how-social-links">
											<a href="#" target="_blank" rel="noopener" title="Instagram"><i class="fab fa-instagram"></i></a>
											<a href="#" target="_blank" rel="noopener" title="Facebook"><i class="fab fa-facebook"></i></a>
											<a href="#" target="_blank" rel="noopener" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
										</div>
										<button type="button" class="cl-points-how-social-btn" id="clSocialFollowBtn"><?php echo $lang['CL_SOCIAL_FOLLOW_CTA'][$_SESSION['lang']]; ?></button>
									</div>
									<span class="cl-points-how-step">
										<span class="cl-points-how-badge">+1</span>
										<span class="cl-points-how-ico"><i class="ti ti-calendar"></i></span>
										<b><?php echo $lang['CL_POINTS_HOW_LOGIN_TITLE'][$_SESSION['lang']]; ?></b>
										<p><?php echo $lang['CL_POINTS_HOW_LOGIN_DESC'][$_SESSION['lang']]; ?></p>
									</span>
								</div>
							</div>

							<div class="cl-points-card">
								<div class="cl-points-head">
									<div class="cl-points-total"><?php echo (int) $__pointsTotal; ?></div>
									<div class="cl-points-headtxt">
										<div class="cl-points-title"><?php echo $lang['CL_POINTS_TITLE'][$_SESSION['lang']]; ?></div>
										<div class="cl-points-desc"><?php echo $lang['CL_POINTS_SUB'][$_SESSION['lang']]; ?></div>
									</div>
								</div>
								<?php if (count($__pointsHistory) === 0) : ?>
								<div class="cl-points-empty"><?php echo $lang['CL_POINTS_HISTORY_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-points-history">
									<?php foreach ($__pointsHistory as $__ph) : ?>
									<div class="cl-points-row">
										<span><?php echo htmlspecialchars($__ph['libelle']); ?> · <?php echo normaldatetime($__ph['date_add']); ?></span>
										<b>+<?php echo (int) $__ph['points']; ?></b>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>

							<div class="cl-gains-showcase">
								<h3><?php echo $lang['CL_GAINS_TITLE'][$_SESSION['lang']]; ?></h3>
								<div class="cl-gains-showcase-grid">
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-bullhorn"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_ADS'][$_SESSION['lang']]; ?></b></div>
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-percent"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_REMISE'][$_SESSION['lang']]; ?></b></div>
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-gift"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_CADEAU'][$_SESSION['lang']]; ?></b></div>
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-star"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_POINTS'][$_SESSION['lang']]; ?></b></div>
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-search"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_AUDIT'][$_SESSION['lang']]; ?></b></div>
									<div class="cl-gains-box"><span class="cl-gains-box-ico"><i class="fa fa-graduation-cap"></i></span><b><?php echo $lang['CL_PARRAIN_GAIN_FORMATION'][$_SESSION['lang']]; ?></b></div>
								</div>
							</div>

							<div class="cl-rewards-tiers">
								<h3><?php echo $lang['CL_REWARDS_TIERS_TITLE'][$_SESSION['lang']]; ?></h3>
								<div class="cl-rewards-tiers-grid">
									<?php
									$__tierIcons = array(10 => 'fa-search', 20 => 'fa-graduation-cap', 50 => 'fa-bullhorn', 100 => 'fa-percent');
									foreach ($__rewards as $__tier) :
										$__tierUnlocked = true;
										$__tierGiven = ((int) $__tier['statut'] === 1);
										$__tierIco = isset($__tierIcons[(int) $__tier['seuil']]) ? $__tierIcons[(int) $__tier['seuil']] : 'fa-star';
									?>
									<div class="cl-rewards-tier is-unlocked<?php echo $__tierGiven ? ' is-given' : ''; ?>">
										<span class="cl-rewards-tier-ico"><i class="fa <?php echo $__tierIco; ?>"></i></span>
										<div class="cl-rewards-tier-seuil"><?php echo (int) $__tier['seuil']; ?> pts</div>
										<b><?php echo htmlspecialchars($__tier['libelle']); ?></b>
										<span class="cl-rewards-tier-status"><?php echo $__tierGiven ? sprintf($lang['CL_REWARDS_GIVEN'][$_SESSION['lang']], date('d/m/Y', strtotime($__tier['date_debloque']))) : $lang['CL_REWARDS_UNLOCKED_PENDING'][$_SESSION['lang']]; ?></span>
									</div>
									<?php endforeach; ?>
									<?php
									$__unlockedSeuils = array_map(function ($r) { return (int) $r['seuil']; }, $__rewards);
									foreach (array(10, 20, 50, 100) as $__seuil) :
										if (in_array($__seuil, $__unlockedSeuils, true)) continue;
										$__tierIco = isset($__tierIcons[$__seuil]) ? $__tierIcons[$__seuil] : 'fa-star';
									?>
									<div class="cl-rewards-tier is-locked">
										<span class="cl-rewards-tier-ico"><i class="fa fa-lock"></i></span>
										<div class="cl-rewards-tier-seuil"><?php echo $__seuil; ?> pts</div>
										<b>?</b>
										<span class="cl-rewards-tier-status"><?php echo sprintf($lang['CL_REWARDS_LOCKED'][$_SESSION['lang']], max(0, $__seuil - $__pointsTotal)); ?></span>
									</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="cl-attestation-card">
								<h3><?php echo $lang['CL_ATTESTATION_TITLE'][$_SESSION['lang']]; ?></h3>
								<?php if (count($__attestations) === 0) : ?>
								<div class="cl-attestation-empty"><?php echo $lang['CL_ATTESTATION_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : foreach ($__attestations as $__at) : ?>
								<div class="cl-attestation-item">
									<div class="cl-attestation-item-head">
										<b><?php echo htmlspecialchars($__at->titre); ?></b>
										<?php if ((int) $__at->statu === 1) : ?>
										<span class="cl-attestation-badge is-signed"><?php echo $lang['CL_ATTESTATION_SIGNED'][$_SESSION['lang']]; ?></span>
										<?php else : ?>
										<span class="cl-attestation-badge is-pending"><?php echo $lang['CL_ATTESTATION_PENDING'][$_SESSION['lang']]; ?></span>
										<?php endif; ?>
									</div>
									<div class="cl-attestation-msg"><?php echo nl2br(htmlspecialchars($__at->message)); ?></div>
									<div class="cl-attestation-doclink">
										<a class="cl-attestation-dl" href="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=pdfAttestationApi&id=<?php echo (int) $__at->id; ?>" target="_blank"><i class="fa fa-eye"></i> <?php echo $lang['CL_ATTESTATION_VIEW_DOC'][$_SESSION['lang']]; ?></a>
									</div>
									<?php if ((int) $__at->statu === 1) : ?>
									<div class="cl-attestation-foot">
										<span class="cl-attestation-signed-by"><?php echo sprintf($lang['CL_ATTESTATION_SIGNED_BY'][$_SESSION['lang']], htmlspecialchars($__at->signature_nom)); ?> · <?php echo normaldatetime($__at->signature_date); ?></span>
									</div>
									<?php else : ?>
									<form class="cl-attestation-sign-form" data-id="<?php echo (int) $__at->id; ?>">
										<div class="msgbox cl-attestation-msgbox"></div>
										<input type="text" class="cl-attestation-input" name="nom" placeholder="<?php echo $lang['CL_ATTESTATION_SIGN_NAME'][$_SESSION['lang']]; ?>" required>
										<label class="cl-attestation-confirm"><input type="checkbox" required> <?php echo $lang['CL_ATTESTATION_SIGN_CONFIRM'][$_SESSION['lang']]; ?></label>
										<button type="submit" class="cl-attestation-sign-btn"><?php echo $lang['CL_ATTESTATION_SIGN_BTN'][$_SESSION['lang']]; ?></button>
									</form>
									<?php endif; ?>
								</div>
								<?php endforeach; endif; ?>
							</div>
							<script>
							(function(){
								document.querySelectorAll('.cl-attestation-sign-form').forEach(function(form){
									form.addEventListener('submit', function(e){
										e.preventDefault();
										var box = form.querySelector('.cl-attestation-msgbox');
										var btn = form.querySelector('.cl-attestation-sign-btn');
										var body = new URLSearchParams({ id: form.getAttribute('data-id'), nom: form.querySelector('[name="nom"]').value }).toString();
										btn.disabled = true;
										fetch('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=signAttestationApi', { method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:body })
											.then(function(r){ return r.text(); })
											.then(function(t){ var d; try{ d=JSON.parse(t); }catch(e){ d={icon:'error'}; }
												if(d.icon==='success'){ document.location.reload(); }
												else { btn.disabled = false; box.innerHTML = '<div class="alert alert-warning">'+<?php echo json_encode($lang['CL_ATTESTATION_ERROR'][$_SESSION['lang']]); ?>+'</div>'; }
											})
											.catch(function(){ btn.disabled = false; box.innerHTML = '<div class="alert alert-danger">'+<?php echo json_encode($lang['CL_ATTESTATION_ERROR'][$_SESSION['lang']]); ?>+'</div>'; });
									});
								});
								var socialBtn = document.getElementById('clSocialFollowBtn');
								if (socialBtn) {
									socialBtn.addEventListener('click', function () {
										socialBtn.disabled = true;
										fetch('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=followSocialApi', { method: 'POST' })
											.then(function (r) { return r.text(); })
											.then(function (t) { var d; try { d = JSON.parse(t); } catch (e) { d = { icon: 'error' }; }
												if (d.icon === 'success') {
													socialBtn.textContent = d.already ? <?php echo json_encode($lang['CL_SOCIAL_FOLLOW_ALREADY'][$_SESSION['lang']]); ?> : <?php echo json_encode($lang['CL_SOCIAL_FOLLOW_DONE'][$_SESSION['lang']]); ?>;
												} else {
													socialBtn.disabled = false;
												}
											})
											.catch(function () { socialBtn.disabled = false; });
									});
								}
							})();
							</script>

						<div class="cl-rewards-history">
							<h3><i class="fa fa-gift"></i> <?php echo $lang['CL_REWARDS_HISTORY_TITLE'][$_SESSION['lang']]; ?></h3>
							<?php if (count($__givenRewards) === 0) : ?>
							<div class="cl-rewards-history-empty"><?php echo $lang['CL_REWARDS_HISTORY_EMPTY'][$_SESSION['lang']]; ?></div>
							<?php else : ?>
							<div class="cl-rewards-history-list">
								<?php foreach ($__givenRewards as $__ghr) : ?>
								<div class="cl-rewards-history-row">
									<span class="cl-rewards-history-ico"><i class="fa fa-gift"></i></span>
									<div class="cl-rewards-history-txt">
										<b><?php echo htmlspecialchars($__ghr['libelle']); ?></b>
										<span><?php echo (int) $__ghr['seuil']; ?> pts</span>
									</div>
									<span class="cl-rewards-history-date"><?php echo !empty($__ghr['date_affecte']) ? date('d/m/Y', strtotime($__ghr['date_affecte'])) : ''; ?></span>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
						</div>

						<!-- ================= DÉCOUVRIR / PRODUITS & SERVICES ================= -->
						<div class="cl-group-panel" data-cl-group-panel="decouvrir">
							<div class="cl-club-hero cl-discover-hero">
								<span class="cl-club-hero-ico"><i class="ti ti-direction"></i></span>
								<div>
									<h2><?php echo $lang['CL_DISCOVER_HERO_TITLE'][$_SESSION['lang']]; ?></h2>
									<p><?php echo $lang['CL_DISCOVER_HERO_SUB'][$_SESSION['lang']]; ?></p>
								</div>
							</div>

							<div class="cl-discover-mydemandes">
								<h3><?php echo $lang['CL_MY_REQUESTS_TITLE'][$_SESSION['lang']]; ?></h3>
								<?php if (count($__myDemandes) === 0) : ?>
								<div class="cl-discover-mydemandes-empty"><?php echo $lang['CL_MY_REQUESTS_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-discover-mydemandes-list">
									<?php foreach ($__myDemandes as $__md) : list($__mdCls, $__mdLabel) = $__demandeStatutLabel($__md['statut']); ?>
									<div class="cl-discover-mydemande-row">
										<span class="cl-discover-mydemande-type"><?php echo $__demandeTypeLabel($__md['type']); ?></span>
										<span class="cl-discover-mydemande-titre"><?php echo htmlspecialchars($__md['ref_titre']); ?></span>
										<span class="cl-discover-mydemande-badge is-<?php echo $__mdCls; ?>"><?php echo $__mdLabel; ?></span>
										<span class="cl-discover-mydemande-date"><?php echo date('d/m/Y', strtotime($__md['date_add'])); ?></span>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>

							<div class="cl-discover-section" id="clDiscoverAgents">
								<h3><i class="ti ti-bolt-alt"></i> <?php echo $lang['CL_DISCOVER_AGENTS_TITLE'][$_SESSION['lang']]; ?></h3>
								<p class="cl-discover-section-sub"><?php echo $lang['CL_DISCOVER_AGENTS_SUB'][$_SESSION['lang']]; ?></p>
								<?php if (count($__catAgents) === 0) : ?>
								<div class="cl-discover-empty"><?php echo $lang['CL_DISCOVER_AGENTS_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-discover-grid">
									<?php foreach ($__catAgents as $__ag) : $__agPhoto = $__ag->getPhotoProduit() ?: $__ag->getPhoto(); ?>
									<div class="cl-discover-card">
										<?php if ($__agPhoto) : ?><div class="cl-discover-card-img"><img src="<?php echo $siteURL; ?>images/agents_ia/<?php echo htmlspecialchars($__agPhoto); ?>" alt="<?php echo htmlspecialchars($__ag->getTitre()); ?>" loading="lazy"></div><?php endif; ?>
										<div class="cl-discover-card-body">
											<b><?php echo htmlspecialchars($__ag->getTitre()); ?></b>
											<p><?php echo mb_strimwidth(strip_tags((string) $__ag->getExtrait()), 0, 110, '…'); ?></p>
										</div>
										<div class="cl-discover-card-actions">
											<button type="button" class="cl-discover-btn is-ghost" data-demande-type="agent_essai" data-demande-id="<?php echo (int) $__ag->getId(); ?>" data-demande-titre="<?php echo htmlspecialchars($__ag->getTitre()); ?>" data-demande-slug="<?php echo htmlspecialchars($__ag->getSlug()); ?>"><?php echo sprintf($lang['CL_DISCOVER_TRIAL_CTA_NAMED'][$_SESSION['lang']], htmlspecialchars($__ag->getTitre())); ?></button>
											<button type="button" class="cl-discover-btn" data-demande-type="agent_commande" data-demande-id="<?php echo (int) $__ag->getId(); ?>" data-demande-titre="<?php echo htmlspecialchars($__ag->getTitre()); ?>" data-demande-slug="<?php echo htmlspecialchars($__ag->getSlug()); ?>"><?php echo $lang['CL_DISCOVER_ORDER_CTA'][$_SESSION['lang']]; ?></button>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>

							<div class="cl-discover-section" id="clDiscoverFormations">
								<h3><i class="ti ti-blackboard"></i> <?php echo $lang['CL_DISCOVER_FORMATIONS_TITLE'][$_SESSION['lang']]; ?></h3>
								<p class="cl-discover-section-sub"><?php echo $lang['CL_DISCOVER_FORMATIONS_SUB'][$_SESSION['lang']]; ?></p>
								<?php if (count($__catFormations) === 0) : ?>
								<div class="cl-discover-empty"><?php echo $lang['CL_DISCOVER_FORMATIONS_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-discover-grid">
									<?php foreach ($__catFormations as $__fo) : ?>
									<div class="cl-discover-card">
										<?php if ($__fo->getPhoto()) : ?><div class="cl-discover-card-img"><img src="<?php echo $siteURL; ?>images/formations/<?php echo htmlspecialchars($__fo->getPhoto()); ?>" alt="<?php echo htmlspecialchars($__fo->getTitre()); ?>" loading="lazy"></div><?php endif; ?>
										<div class="cl-discover-card-body">
											<b><?php echo htmlspecialchars($__fo->getTitre()); ?></b>
											<?php if ($__fo->getDateDebut()) : ?><span class="cl-discover-card-meta"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($__fo->getDateDebut())); ?><?php if ($__fo->getLieu()) : ?> · <?php echo htmlspecialchars($__fo->getLieu()); ?><?php endif; ?></span><?php endif; ?>
											<p><?php echo mb_strimwidth(strip_tags((string) $__fo->getExtrait()), 0, 110, '…'); ?></p>
										</div>
										<div class="cl-discover-card-actions">
											<button type="button" class="cl-discover-btn" data-demande-type="formation" data-demande-id="<?php echo (int) $__fo->getId(); ?>" data-demande-titre="<?php echo htmlspecialchars($__fo->getTitre()); ?>" data-demande-slug="<?php echo htmlspecialchars($__fo->getSlug()); ?>"><?php echo $lang['CL_DISCOVER_SIGNUP_CTA'][$_SESSION['lang']]; ?></button>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>

							<div class="cl-discover-section" id="clDiscoverServices">
								<div class="cl-discover-section-head">
									<h3><i class="ti ti-briefcase"></i> <?php echo $lang['CL_DISCOVER_SERVICES_TITLE'][$_SESSION['lang']]; ?></h3>
									<a href="<?php echo $siteURL; ?>notre-expertise/" target="_blank" class="cl-discover-btn is-ghost cl-discover-section-btn"><?php echo $lang['CL_DISCOVER_SERVICES_ALL_CTA'][$_SESSION['lang']]; ?></a>
								</div>
								<p class="cl-discover-section-sub"><?php echo $lang['CL_DISCOVER_SERVICES_SUB'][$_SESSION['lang']]; ?></p>
								<?php if (count($__catServices) === 0) : ?>
								<div class="cl-discover-empty"><?php echo $lang['CL_DISCOVER_SERVICES_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-discover-grid">
									<?php foreach ($__catServices as $__sv) : ?>
									<a class="cl-discover-card cl-discover-card-link" href="<?php echo htmlspecialchars($__sv->getLink()); ?>" target="_blank" rel="noopener">
										<?php if ($__sv->getPhoto()) : ?><div class="cl-discover-card-img"><img src="<?php echo $siteURL; ?>images/services/<?php echo htmlspecialchars($__sv->getPhoto()); ?>" alt="<?php echo htmlspecialchars($__sv->getTitre()); ?>" loading="lazy"></div><?php endif; ?>
										<div class="cl-discover-card-body">
											<b><?php echo htmlspecialchars($__sv->getTitre()); ?></b>
											<p><?php echo mb_strimwidth(strip_tags((string) $__sv->getExtrait()), 0, 110, '…'); ?></p>
										</div>
										<div class="cl-discover-card-actions">
											<span class="cl-discover-btn"><?php echo $lang['CL_DISCOVER_SERVICE_CTA'][$_SESSION['lang']]; ?></span>
										</div>
									</a>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>

						<!-- ================= MON COMPTE ================= -->
						<div class="cl-group-panel" data-cl-group-panel="compte">
							<div class="cl-profile-hero">
								<div class="cl-profile-cover"></div>
								<div class="cl-profile-hero-body">
									<span class="cl-profile-avatar">
										<span class="cl-profile-avatar-clip">
											<?php if (!empty($__clientPhotoUrl)) : ?><img src="<?php echo htmlspecialchars($__clientPhotoUrl); ?>" alt="" onerror="this.remove();"><?php endif; ?>
											<span class="cl-profile-avatar-initials"><?php echo htmlspecialchars($__initials); ?></span>
										</span>
									</span>
									<div class="cl-profile-info">
										<div class="cl-profile-name"><?php echo trim($user->prenom . ' ' . $user->nom) ?: 'Client'; ?></div>
										<?php if (!empty($user->raison_social)) : ?><div class="cl-profile-company"><i class="ti ti-building"></i> <?php echo htmlspecialchars($user->raison_social); ?></div><?php endif; ?>
										<div class="cl-profile-email"><i class="fa fa-envelope-o"></i> <?php echo htmlspecialchars($user->email); ?></div>
									</div>
									<div class="cl-profile-stats">
										<a href="javascript:void(0)" class="cl-profile-stat" data-cl-group="club"><b><?php echo (int) $__pointsTotal; ?></b><span><?php echo $lang['CL_POINTS_TITLE'][$_SESSION['lang']]; ?></span></a>
										<a href="javascript:void(0)" class="cl-profile-stat" data-cl-group="parrainage"><b><?php echo (int) $__parrainTotal; ?></b><span><?php echo $lang['CL_PARRAIN_STAT_TOTAL'][$_SESSION['lang']]; ?></span></a>
									</div>
								</div>
							</div>
							<h3 class="cl-subhead"><i class="ti ti-user"></i> <?php echo $lang['CL_TAB_PROFILE'][$_SESSION['lang']]; ?></h3>
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
								(function(){ Array.prototype.forEach.call(document.querySelectorAll("[data-parrain-scroll]"), function(el){ el.addEventListener("click", function(){ if(window.clShowGroup) window.clShowGroup("parrainage"); var sec=document.getElementById("parrainageSection"); if(sec){ setTimeout(function(){ sec.scrollIntoView({behavior:"smooth", block:"center"}); var f=document.getElementById("paFNom"); if(f) setTimeout(function(){ f.focus(); },350); }, 60); } }); }); })();
								</script>
							</div>

							<a href="javascript:void(0)" class="cl-club-teaser" data-cl-group="club">
								<span class="cl-club-teaser-ico"><i class="fa fa-diamond"></i></span>
								<div class="cl-club-teaser-body">
									<div class="cl-club-teaser-title"><?php echo $lang['CL_POINTS_TEASER_TITLE'][$_SESSION['lang']]; ?></div>
									<div class="cl-club-teaser-sub"><b><?php echo (int) $__pointsTotal; ?></b> <?php echo $lang['CL_POINTS_TEASER_SUB'][$_SESSION['lang']]; ?></div>
								</div>
								<span class="cl-club-teaser-cta"><?php echo $lang['CL_POINTS_TEASER_CTA'][$_SESSION['lang']]; ?> <i class="fa fa-angle-right"></i></span>
							</a>

							<div class="cl-social-card">
								<h3><?php echo $lang['CL_SOCIAL_TITLE'][$_SESSION['lang']]; ?></h3>
								<p class="cl-social-sub"><?php echo $lang['CL_SOCIAL_SUB'][$_SESSION['lang']]; ?></p>
								<?php if (count($__clientSocials) === 0) : ?>
								<div class="cl-social-empty"><i class="fa fa-lock"></i> <?php echo $lang['CL_SOCIAL_EMPTY'][$_SESSION['lang']]; ?></div>
								<?php else : ?>
								<div class="cl-social-list">
									<?php foreach ($__clientSocials as $__cs) :
										$__csP = is_array($__cs) ? $__cs['plateforme'] : $__cs->plateforme;
										$__csL = is_array($__cs) ? $__cs['login'] : $__cs->login;
										$__csLien = is_array($__cs) ? $__cs['lien'] : $__cs->lien;
									?>
									<div class="cl-social-row">
										<span class="cl-social-ico"><i class="fa fa-globe"></i></span>
										<div class="cl-social-body">
											<b><?php echo htmlspecialchars($__csP); ?></b>
											<?php if (!empty($__csL)) : ?><span><?php echo $lang['CL_SOCIAL_LOGIN'][$_SESSION['lang']]; ?> : <?php echo htmlspecialchars($__csL); ?></span><?php endif; ?>
										</div>
										<?php if (!empty($__csLien)) : ?>
										<a href="<?php echo htmlspecialchars($__csLien); ?>" target="_blank" rel="noopener" class="cl-social-open"><?php echo $lang['CL_SOCIAL_LINK_CTA'][$_SESSION['lang']]; ?> <i class="fa fa-external-link"></i></a>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>

							<div class="cl-review">
								<div class="cl-review-head">
									<span class="cl-review-ico"><i class="ti ti-star"></i></span>
									<div>
										<h2><?php echo $lang['CL_REVIEW_TITLE'][$_SESSION['lang']]; ?></h2>
										<p><?php echo $lang['CL_REVIEW_SUB'][$_SESSION['lang']]; ?></p>
										<span class="cl-review-reward-hint"><i class="fa fa-gift"></i> <?php echo $lang['CL_REVIEW_REWARD_HINT'][$_SESSION['lang']]; ?></span>
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
									<div class="cl-review-arrow" aria-hidden="true"><i class="fa fa-long-arrow-right"></i></div>
									<div class="cl-review-col cl-review-gmb">
										<span class="cl-review-gmb-ico"><i class="fab fa-google"></i></span>
										<p class="cl-review-gmb-text"><?php echo $lang['CL_REVIEW_GMB_TEXT'][$_SESSION['lang']]; ?></p>
										<a href="<?php echo htmlspecialchars($__gmbUrl); ?>" target="_blank" rel="noopener" class="cl-review-gmb-btn"><i class="fa fa-star"></i> <?php echo $lang['CL_REVIEW_GMB'][$_SESSION['lang']]; ?></a>
									</div>
									<?php endif; ?>
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
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if (count($__newRewards) > 0) : ?>
<div class="cl-reward-congrats-modal open" id="clRewardCongratsModal" role="dialog" aria-hidden="false">
	<div class="cl-reward-congrats-backdrop" data-reward-congrats-close></div>
	<div class="cl-reward-congrats-card">
		<span class="cl-reward-congrats-ico"><i class="fa fa-trophy"></i></span>
		<h3><?php echo $lang['CL_REWARD_CONGRATS_TITLE'][$_SESSION['lang']]; ?></h3>
		<?php foreach ($__newRewards as $__nr) : ?>
		<p><?php echo sprintf($lang['CL_REWARD_CONGRATS_TEXT'][$_SESSION['lang']], (int) $__nr['seuil'], '<b>' . htmlspecialchars($__nr['libelle']) . '</b>'); ?></p>
		<?php endforeach; ?>
		<button type="button" class="btn-hw cl-reward-congrats-cta" data-reward-congrats-close><span><?php echo $lang['CL_REWARD_CONGRATS_CTA'][$_SESSION['lang']]; ?></span></button>
	</div>
</div>
<script>
(function(){
	var modal = document.getElementById('clRewardCongratsModal');
	if (!modal) return;
	Array.prototype.forEach.call(modal.querySelectorAll('[data-reward-congrats-close]'), function (el) {
		el.addEventListener('click', function () { modal.classList.remove('open'); modal.setAttribute('aria-hidden', 'true'); });
	});
})();
</script>
<?php endif; ?>

<?php if (count($__newGivenRewards) > 0) : ?>
<div class="cl-reward-congrats-modal open" id="clRewardGivenModal" role="dialog" aria-hidden="false">
	<div class="cl-reward-congrats-backdrop" data-reward-given-close></div>
	<div class="cl-reward-congrats-card is-given">
		<span class="cl-reward-congrats-ico"><i class="fa fa-gift"></i></span>
		<h3><?php echo $lang['CL_REWARD_GIVEN_MODAL_TITLE'][$_SESSION['lang']]; ?></h3>
		<?php foreach ($__newGivenRewards as $__gvr) : ?>
		<p><?php echo sprintf($lang['CL_REWARD_GIVEN_MODAL_TEXT'][$_SESSION['lang']], '<b>' . htmlspecialchars($__gvr['libelle']) . '</b>'); ?></p>
		<?php endforeach; ?>
		<button type="button" class="btn-hw cl-reward-congrats-cta" data-reward-given-close><span><?php echo $lang['CL_REWARD_GIVEN_MODAL_CTA'][$_SESSION['lang']]; ?></span></button>
	</div>
</div>
<script>
(function(){
	var modal = document.getElementById('clRewardGivenModal');
	if (!modal) return;
	Array.prototype.forEach.call(modal.querySelectorAll('[data-reward-given-close]'), function (el) {
		el.addEventListener('click', function () { modal.classList.remove('open'); modal.setAttribute('aria-hidden', 'true'); });
	});
})();
</script>
<?php endif; ?>

<div class="cl-demande-modal" id="clDemandeModal" aria-hidden="true">
	<div class="cl-demande-modal-backdrop" data-demande-close></div>
	<div class="cl-demande-modal-card">
		<button type="button" class="cl-demande-modal-x" data-demande-close aria-label="Fermer">&times;</button>
		<h3 id="clDemandeModalTitle"></h3>
		<p id="clDemandeModalSub"></p>
		<div class="msgbox cl-demande-modal-msg"></div>
		<form id="clDemandeForm">
			<input type="hidden" name="type" id="clDemandeType">
			<input type="hidden" name="id_ref" id="clDemandeIdRef">
			<input type="hidden" name="ref_titre" id="clDemandeRefTitre">
			<input type="hidden" name="ref_slug" id="clDemandeRefSlug">
			<textarea name="message" id="clDemandeMessage" rows="3" placeholder="<?php echo $lang['CL_REQUEST_MODAL_MSG_PLACEHOLDER'][$_SESSION['lang']]; ?>"></textarea>
			<button type="submit" class="cl-demande-modal-submit"><?php echo $lang['CL_REQUEST_MODAL_SUBMIT'][$_SESSION['lang']]; ?></button>
		</form>
	</div>
</div>
<script>
(function(){
	var modal = document.getElementById('clDemandeModal');
	if (!modal) return;
	var titleEl = document.getElementById('clDemandeModalTitle');
	var subEl = document.getElementById('clDemandeModalSub');
	var typeInput = document.getElementById('clDemandeType');
	var idRefInput = document.getElementById('clDemandeIdRef');
	var refTitreInput = document.getElementById('clDemandeRefTitre');
	var refSlugInput = document.getElementById('clDemandeRefSlug');
	var form = document.getElementById('clDemandeForm');
	var msgBox = modal.querySelector('.cl-demande-modal-msg');
	var titles = <?php echo json_encode(array(
		'agent_essai' => $lang['CL_REQUEST_MODAL_TITLE_AGENT_ESSAI'][$_SESSION['lang']],
		'agent_commande' => $lang['CL_REQUEST_MODAL_TITLE_AGENT_COMMANDE'][$_SESSION['lang']],
		'formation' => $lang['CL_REQUEST_MODAL_TITLE_FORMATION'][$_SESSION['lang']],
		'service' => $lang['CL_REQUEST_MODAL_TITLE_SERVICE'][$_SESSION['lang']],
	)); ?>;

	function openModal(btn) {
		var type = btn.getAttribute('data-demande-type');
		var titre = btn.getAttribute('data-demande-titre');
		typeInput.value = type;
		idRefInput.value = btn.getAttribute('data-demande-id') || '';
		refTitreInput.value = titre || '';
		refSlugInput.value = btn.getAttribute('data-demande-slug') || '';
		titleEl.textContent = titles[type] || '';
		subEl.textContent = titre || '';
		msgBox.innerHTML = '';
		form.style.display = '';
		form.querySelector('button[type="submit"]').disabled = false;
		document.getElementById('clDemandeMessage').value = '';
		modal.classList.add('open');
		modal.setAttribute('aria-hidden', 'false');
	}
	function closeModal() {
		modal.classList.remove('open');
		modal.setAttribute('aria-hidden', 'true');
	}
	document.querySelectorAll('[data-demande-type]').forEach(function(btn){
		btn.addEventListener('click', function(){ openModal(btn); });
	});
	document.querySelectorAll('[data-demande-close]').forEach(function(el){
		el.addEventListener('click', closeModal);
	});
	document.addEventListener('keydown', function(e){ if (e.key === 'Escape') closeModal(); });

	form.addEventListener('submit', function(e){
		e.preventDefault();
		var btn = form.querySelector('button[type="submit"]');
		btn.disabled = true;
		var body = new URLSearchParams({
			type: typeInput.value, id_ref: idRefInput.value, ref_titre: refTitreInput.value,
			ref_slug: refSlugInput.value, message: document.getElementById('clDemandeMessage').value
		}).toString();
		fetch('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=createDemandeApi', { method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:body })
			.then(function(r){ return r.text(); })
			.then(function(t){ var d; try{ d=JSON.parse(t); }catch(e){ d={icon:'error'}; }
				if (d.icon === 'success') {
					msgBox.innerHTML = '<div class="alert alert-success">'+<?php echo json_encode($lang['CL_REQUEST_SUCCESS'][$_SESSION['lang']]); ?>+'</div>';
					form.style.display = 'none';
					setTimeout(function(){ document.location.reload(); }, 1400);
				} else {
					btn.disabled = false;
					msgBox.innerHTML = '<div class="alert alert-warning">'+<?php echo json_encode($lang['CL_REQUEST_ERROR'][$_SESSION['lang']]); ?>+'</div>';
				}
			})
			.catch(function(){ btn.disabled = false; msgBox.innerHTML = '<div class="alert alert-danger">'+<?php echo json_encode($lang['CL_REQUEST_ERROR'][$_SESSION['lang']]); ?>+'</div>'; });
	});
})();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
(function () {
	if (typeof gsap === 'undefined') return;
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

	function clCountUp(container) {
		container.querySelectorAll('.cl-stat-num, .cl-profile-stat b').forEach(function (el) {
			var target = parseInt(el.textContent, 10);
			if (isNaN(target)) return;
			var counter = { n: 0 };
			gsap.to(counter, {
				n: target, duration: 1.1, delay: .2, ease: 'power2.out',
				onUpdate: function () { el.textContent = Math.round(counter.n); }
			});
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		gsap.timeline({ defaults: { ease: 'power3.out', duration: .7 } })
			.from('.cl-pillnav li', { y: -10, opacity: 0, stagger: .05 })
			.from('.cl-dash-hero-inner', { y: 18, opacity: 0 }, '-=.3')
			.from('.cl-urgent-card, .cl-urgent-empty', { y: 20, opacity: 0, stagger: .08 }, '-=.35')
			.from('.cl-chart-card', { y: 24, opacity: 0 }, '-=.3')
			.from('.cl-stat-tile, .cl-points-mini', { y: 24, opacity: 0, stagger: .08 }, '-=.4')
			.from('.cl-activity-card, .cl-gains-banner', { y: 20, opacity: 0, stagger: .1 }, '-=.3');

		clCountUp(document);
	});

	window.clAnimateGroupIn = function (panel) {
		gsap.from(panel, { opacity: 0, y: 14, duration: .45, ease: 'power2.out' });
		clCountUp(panel);
	};
})();
</script>
