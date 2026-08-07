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
		<a href="javascript:void(0)" class="btn-hw btn-sign-out"><i class="fa fa-sign-out"></i> <span>Déconnexion</span></a>
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
												    <a class="btn btn-sm btn-info text-white" href="javascript:void(0)"  data-toggle="modal" data-target="#invoice-detail<?=$facture->ID?>" title="Show"><?php echo $lang['CL_FOLLOW_UP'][$_SESSION['lang']]; ?></a>
												        <!-- Modal / Demo -->
                                                        <div class="modal fade" id="invoice-detail<?=$facture->ID?>" role="dialog">
                                                        	<div class="modal-dialog" role="document">
                                                        		<div class="modal-content">
                                                        			<div class="modal-header">
                                                        				<h4 class="modal-title" id="myModalLabel"><i class="far fa-eye"></i> <?php echo $lang['CL_DETAIL'][$_SESSION['lang']]; ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                                                        			</div>
                                                        			<div class="modal-body">
                                                        			    <div class="row-row">
                                                        			        <?php if(isValidDate($facture->date_debut) && isValidDate($facture->date_fin)) :?>
                                                                                <div class="col-12">
                                                                                    <?php
                                                                                        // Define the two dates
                                                                                        $today = new DateTime();
                                                                                        $startDate = new DateTime($facture->date_debut);
                                                                                        $endDate = new DateTime($facture->date_fin);
                                                                                        
                                                                                        // Calculate the difference
                                                                                        $interval1 = $startDate->diff($endDate);
                                                                                        $interval2 = $today->diff($endDate);
                                                                                        
                                                                                        // Get the difference in days
                                                                                        $days = $interval1->days;
                                                                                        $rest_days = $interval2->days;
                                                                                    ?>
                                                                                    <div class="row-row mb-5 text-center">
                                                                                        <div class="col-md-6">
                                                                                            <h3><?php echo $lang['CL_DEADLINE'][$_SESSION['lang']]; ?> : <span class="text-success"><?=$days?> <?php echo $lang['CL_DAYS'][$_SESSION['lang']]; ?></span></h3>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <?php if($startDate <= $today) :?>
                                                                                                <h3><span class="text-danger"><?=$rest_days?> <?php echo $lang['CL_DAYS'][$_SESSION['lang']]; ?></span> <?php echo $lang['CL_DAYS_LEFT'][$_SESSION['lang']]; ?></h3>
                                                                                            <?php else :?>
                                                                                                <h3><span class="text-danger"><?php echo $lang['CL_NOT_STARTED'][$_SESSION['lang']]; ?></span></h3>
                                                                                            <?php endif;?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif;?>
                                                        			        <div class="col-12">
                                                        			            <div class="wizard">
                                                                                    <ul class="ul-wizard" id="myTab" role="tablist">
                                                                                        <li class="li-wizard">
                                                                                            <?php 
                                                                                                $wizard_status_quote = "";
                                                                                                if($facture->devis->statu){
                                                                                                    if($facture->devis->statu == 0 || $facture->devis->statu == 2){
                                                                                                        $wizard_status_quote = "wizard-danger";
                                                                                                    }else if($facture->devis->statu == 1 || $facture->devis->statu == 3){
                                                                                                        $wizard_status_quote = "wizard-success";
                                                                                                    }
                                                                                                }
                                                                                            ?>
                                                                                            <a class="a-wizard <?=$wizard_status_quote?>" href="javascript:void(0)">
                                                                                                <i class="i-wizard fa fa-file-invoice-dollar"></i>
                                                                                                <span class="span-wizard"><?php echo $lang['CL_WIZ_QUOTE'][$_SESSION['lang']]; ?></span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="li-wizard">
                                                                                            <?php 
                                                                                                $wizard_status_contrat = "";
                                                                                                if($facture->devis){
                                                                                                    if($facture->devis->statu == 1){
                                                                                                        $wizard_status_contrat = "wizard-danger";
                                                                                                    }else if($facture->devis->statu == 3){
                                                                                                        $wizard_status_contrat = "wizard-success";
                                                                                                    }
                                                                                                }
                                                                                            ?>
                                                                                            <a class="a-wizard <?=$wizard_status_contrat?>" href="javascript:void(0)">
                                                                                                <i class="i-wizard fa fa-file-invoice-dollar"></i>
                                                                                                <span class="span-wizard"><?php echo $lang['CL_WIZ_CONTRACT'][$_SESSION['lang']]; ?></span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="li-wizard">
                                                                                            <?php
                                                                                                $wizard_status_invoice = "wizard-success";
                                                                                            ?>
                                                                                            <a class="a-wizard <?=$wizard_status_invoice?>" href="javascript:void(0)">
                                                                                                <i class="i-wizard fa fa-file-invoice"></i>
                                                                                                <span class="span-wizard"><?php echo $lang['CL_WIZ_INVOICE'][$_SESSION['lang']]; ?></span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="li-wizard">
                                                                                            <?php
                                                                                                $wizard_status_payment = "";
                                                                                                if($facture->total == $facture->reste){
                                                                                                    $wizard_status_payment = "wizard-danger";
                                                                                                }elseif($facture->total > $facture->reste && $facture->reste > 0)	{
                                                                                                    $wizard_status_payment = "wizard-warning";
                                                                                                }elseif($facture->reste <= 0){
                                                                                                    $wizard_status_payment = "wizard-success";
                                                                                                }
                                                                                            ?>
                                                                                            <a class="a-wizard <?=$wizard_status_payment?> " href="javascript:void(0)">
                                                                                                <i class="i-wizard far fa-money-bill-alt"></i>
                                                                                                <span class="span-wizard"><?php echo $lang['CL_WIZ_PAYMENT'][$_SESSION['lang']]; ?></span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                        			        </div>
                                                        			    </div>
                                                        				
                                                        			</div>
                                                        		</div>
                                                        	</div>
                                                        </div>
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
									<div class="div-table-client-space">
										<table class="table table-striped table-client-space">
											<thead>
												<tr>
													<th><?php echo $lang['CL_TH_SUBJECT'][$_SESSION['lang']]; ?></th>
													<th><?php echo $lang['CL_TH_DATE'][$_SESSION['lang']]; ?></th>
													<th><?php echo $lang['CL_TH_STATUS'][$_SESSION['lang']]; ?></th>
												</tr>
											</thead>
											<tbody>
												<?php

												foreach ($reclamations as $reclamation) :
													switch ($reclamation->etat) {
														case '1':
															$statu = '<span class="badge bg-success text-white">' . $lang['CL_ST_TREATED'][$_SESSION['lang']] . '</span>';
															break;
														default:
															$statu = '<span class="badge bg-danger text-white">' . $lang['CL_ST_UNTREATED'][$_SESSION['lang']] . '</span>';
															break;
													}
												?>
													<tr>
														<td><?php echo $reclamation->sujet ?></td>
														<td><?php echo normaldate($reclamation->date_add); ?></td>
														<td><?php echo $statu; ?></td>
													</tr>
												<?php
												endforeach;

												?>
											</tbody>
										</table>
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
										</tr>
									</thead>
									<tbody>

										<?php
                                           
										foreach ($rapples as $rapple) : ?>
											<tr>
												<td><?php echo $rapple->type ?></td>
												<td><?php echo $rapple->domaine ?></td>
												<td><?php echo normaldate($rapple->date_expir); ?></td>
											</tr>
										<?php
										endforeach;

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