<?php $banner = $page->getPhoto() == "" ? "images/banner.jpg" : "images/page/" . $page->getPhoto(); ?>

<!-- Page Title -->
<div class="banner d-none d-sm-block">
	<div class="bg-image bg-parallax">
		<img src="<?php echo $siteURL . $banner; ?>" alt="<?php echo $page->getTitre(); ?>">
	</div>
	<div class="title-box">
		<h1 class="banner-title"><?php echo $page->getTitre(); ?></h1>
	</div>
</div>

<section class="breadcrumb-mobile">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Home</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $page->getTitre(); ?></li>
			</ol>
			<a class="btn-sign-out"><i class="fa fa-sign-out"></i> Logout</a>
		</nav>
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
				<div class="d-block d-sm-flex justify-content-between text-center mb-4">
					<h3>Hello <?= $user->nom . " " . $user->prenom ?></h3>
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
											<div><b class="m-0">Invoices</b></div>
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
											<div><b class="m-0">Quotes</b></div>
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
											<div><b class="m-0">Requests</b></div>
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
											<div><b class="m-0">Recalls</b></div>
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
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i class="ti ti-files"></i> My invoices</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><i class="ti ti-clipboard"></i> My quotes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><i class="ti ti-file"></i> My requests</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"><i class="ti ti-mobile"></i> My recalls</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"><i class="ti ti-user"></i> My Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab"><i class="fas fa-bank"></i> Bank details


								</a>
							</li>
						</ul><!-- Tab panes -->
					</div>

					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<div class="div-table-client-space">
								<table class="table table-striped table-client-space">
									<thead>
										<tr>
											<th>Invoice #</th>
											<th>Billing date</th>
											<th>Total</th>
											<th>Rest</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php

										foreach ($factures as $factureJson) :
										    $facture = $factureJson;
											if($facture->total == $facture->reste){
                                                $statu = '<span class="badge bg-danger text-white">Unpaid</span>';
                                            }elseif($facture->total > $facture->reste && $facture->reste > 0)	{
                                                $statu = '<span class="badge bg-warning text-white">Partially paid</span>';
                                            }elseif($facture->reste <= 0){
                                                $statu = '<span class="badge bg-success text-white">Paid</span>';
                                            }
										?>
											<tr>
												<td><?php echo $facture->numero; ?></td>
												<td><?php echo normaldate($facture->date_facture); ?></td>
												<td><?php echo number_format($facture->total, 2, ',', ' ') . ' ' . $facture->devise; ?></td>
												<td><?php echo number_format($facture->reste, 2, ',', ' ') . ' ' . $facture->devise; ?></td>
												<td><?php echo $statu; ?></td>
												<td>
												    <a class="btn btn-sm btn-info text-white" href="javascript:void(0)"  data-toggle="modal" data-target="#invoice-detail<?=$facture->ID?>" title="Show">Follow up</a>
												        <!-- Modal / Demo -->
                                                        <div class="modal fade" id="invoice-detail<?=$facture->ID?>" role="dialog">
                                                        	<div class="modal-dialog" role="document">
                                                        		<div class="modal-content">
                                                        			<div class="modal-header">
                                                        				<h4 class="modal-title" id="myModalLabel"><i class="far fa-eye"></i> Détail</h4>
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
                                                                                            <h3>Deadline : <span class="text-success"><?=$days?> Day(s)</span></h3>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <?php if($startDate <= $today) :?>
                                                                                                <h3><span class="text-danger"><?=$rest_days?> Day(s)</span> left</h3>
                                                                                            <?php else :?>
                                                                                                <h3><span class="text-danger">It doesn't start yet</span></h3>
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
                                                                                                <span class="span-wizard">Devis</span>
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
                                                                                                <span class="span-wizard">Contrat</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="li-wizard">
                                                                                            <?php
                                                                                                $wizard_status_invoice = "wizard-success";
                                                                                            ?>
                                                                                            <a class="a-wizard <?=$wizard_status_invoice?>" href="javascript:void(0)">
                                                                                                <i class="i-wizard fa fa-file-invoice"></i>
                                                                                                <span class="span-wizard">Facture</span>
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
                                                                                                <span class="span-wizard">Paiements</span>
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
											<th>Quote #</th>
											<th>Quotation date</th>
											<th>Total</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($devis as $devisJson) :
										    $devi = $devisJson;
											switch ($devi->statu) {
												case '1':
                                                    $statu = '<span class="badge bg-success text-white">Validé Ss contrat signé</span>';
                                                    break;
                                                case '2':
                                                    $statu = '<span class="badge bg-danger text-white">Refusé</span>';
                                                    break;
                                                case '3':
                                                    $statu = '<span class="badge bg-primary text-white">Validé avec contrat signé</span>';
                                                    break;
                                                case '4':
                                                    $statu = '<span class="badge bg-warning text-white">Valide.NP</span>';
                                                    break;
                                                default:
                                                    $statu = '<span class="badge bg-warning text-white">Non valide</span>';
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
													<th>Subject</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php

												foreach ($reclamations as $reclamation) :
													switch ($reclamation->etat) {
														case '1':
															$statu = '<span class="badge bg-success text-white">Traité</span>';
															break;
														default:
															$statu = '<span class="badge bg-danger text-white">Non traité</span>';
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
										<h2 class="big-title">Request</h2>
									</div>
									<div class="div-reclamation-form">
										<form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=createReclamationApi" id="reclamationApiForm" method="post" class="formTemplate">
											<div class="msgbox"></div>
											<div class="row">
												<div class="col-12 col-md-6">
													<div class="form-group text-left">
														<label for="sujet">Subject<span class="text-danger"> * </span></label>
														<input type="text" class="form-control" name="sujet" placeholder="Sujet" required>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group text-left">
														<label for="sujet">Department<span class="text-danger"> * </span></label>
														<select class="from-control form-select" name="department" id="department" required>
															<option value="">Select</option>
															<option value="Support">Support</option>
															<option value="Billing">Billing</option>
															<option value="Sales">Sales</option>
															<option value="Abuse">Abuse</option>
														</select>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group text-left">
														<label for="message">Request<span class="text-danger"> * </span></label>
														<textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
													</div>
												</div>
											</div>



											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-block" value="Envoyer">
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
											<th>Type</th>
											<th>Domain</th>
											<th>Expiration date</th>
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
												<label for="nom">First name<span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->nom ?>" name="nom" placeholder="First name" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="prenom">Last name<span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->prenom ?>" name="prenom" placeholder="Last name" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="email">Email<span class="text-danger"> * </span></label>
												<input type="email" class="form-control" value="<?= $user->email ?>" name="email" placeholder="Email" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="tel">Phone<span class="text-danger"> * </span></label>
												<input type="tel" class="form-control" value="<?= $user->tel ?>" name="tel" placeholder="Phone" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="raison_social">Business name<span class="text-danger"> * </span></label>
												<input type="text" class="form-control" value="<?= $user->raison_social ?>" name="raison_social" placeholder="Business name" readonly required>
											</div>
										</div>
										<div class="co-12 col-md-6">
											<div class="form-group text-left">
												<label for="tel">Password<span class="text-danger"> * </span></label>
												<input type="password" class="form-control" name="password" placeholder="Password" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-block" value="Modify">
										<div class="loading"></div>
									</div>
								</form>
							</div>ƒ
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
																	<th scope="row" width="300">Business Name</th>
																	<td>HW LABEL</td>
																</tr>
																<tr>
																	<th scope="row">Registered Office</th>
																	<td>PORTE 13, Immeuble Essalam,BAB DOUKALA , Marrakech</td>
																</tr>
																<tr>
																	<th scope="row">Commercial Registry Number</th>
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
																	<th scope="row">SWIFT Code for Banque Populaire</th>
																	<td>BCPOMAMC</td>
																</tr>

															</tbody>
														</table>
														<h5 class="my-4 text-dark">Foreign Currency Account</h5>
														<table class="table table-striped text-left mb-0">
															<tbody>
																<tr>
																	<th scope="row" width="300">RIB</th>
																	<td>145 450 21283 18465020047 44</td>
																</tr>
																<tr>
																	<th scope="row">SWIFT Code for Banque Populaire</th>
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
																	<th scope="row">SWIFT Code for Banque Populaire</th>
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
																	<th scope="row" width="300">Business Name</th>
																	<td>Verse concept</td>
																</tr>
																<tr>
																	<th scope="row">Registered Office</th>
																	<td>PORTE 13, Immeuble Essalam, BAB DOUKALA, Marrakech</td>
																</tr>
																<tr>
																	<th scope="row">Commercial Registry Number</th>
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
																	<th scope="row">SWIFT Code for Banque Populaire</th>
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
																	<th scope="row" width="300">Bank Name</th>
																	<td>WIO BANK</td>
																</tr>
																<tr>
																	<th scope="row">Account Number</th>
																	<td>9984582655</td>
																</tr>
																<tr>
																	<th scope="row">BIC/SWIFT</th>
																	<td>WIOBAEADXXX</td>
																</tr>
																<tr>
																	<th scope="row">Account Name</th>
																	<td>HELLOWORLDLABEL - FZCO</td>
																</tr>
																<tr>
																	<th scope="row">Account Currency</th>
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
				<!-- Start Latest Project -->
				<section class="mt-5">
					<div class="container">
						<div class="cs-section_heading cs-style1 text-center">
							<h3 class="cs-section_subtitle">Recent Packages</h3>
							<h2 class="cs-section_title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">HELLO WORLD Packages & Services</h2>
						</div>
					</div>
					<div class="cs-height_50 cs-height_lg_45"></div>
					<div class="cs-slider cs-style3 cs-gap-24">
						<div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="1" data-slides-per-view="1">
							<div class="cs-slider_wrapper">
								<?php foreach ($packs as $key => $value) : ?>
									<div class="cs-slide">
										<a href="<?= $value->getURL() ?>" class="cs-portfolio cs-style1 cs-bg">
											<div class="cs-portfolio_bg" data-src="<?php echo $siteURL; ?>images/produit/<?= $value->getPhoto() ?>">
												<div class="cs-portfolio_hover"></div>
											</div>
											<div class="cs-portfolio_info">
												<div class="cs-portfolio_info_bg cs-accent_bg"></div>
												<h2 class="cs-portfolio_title"><?= $value->getTitre() ?></h2>
												<div class="cs-portfolio_subtitle">View details</div>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
								<!-- .cs-slide -->
							</div>
						</div>
						<!-- .cs-slider_container -->
						<div class="cs-pagination cs-style1"></div>
					</div>
					<!-- .cs-slider -->
				</section>
				<!-- End Latest Project -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<!-- Start Service Section -->
			<section id="service">
				<div class="cs-height_150 cs-height_lg_80"></div>
				<div class="container">
					<div class="row">
						<div class="col-xl-4">
							<div class="cs-section_heading cs-style1">
								<h3 class="cs-section_subtitle">Our Selection of Digital Tools</h3>
								<h2 class="cs-section_title">Optimize your online performance with our digital tools</h2>
								<div class="cs-height_45 cs-height_lg_20"></div>
								<a href="<?= $categorie_tools->getLink() ?>" class="cs-text_btn wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
									<span>Explore our latest digital tools</span>
									<svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z" fill="currentColor"></path>
									</svg>
								</a>
							</div>
							<div class="cs-height_90 cs-height_lg_45"></div>
						</div>
						<div class="col-xl-8">
							<div class="row">

								<div class="col-lg-3 col-sm-6 cs-hidden_mobile"></div>
								<div class="col-lg-3 col-sm-6">
									<div class="cs-hobble">
										<a href="<?= $tools[0]->getLink() ?>" class="cs-card cs-style1 cs-hover_layer1">
											<img src="<?php echo $siteURL; ?>images/produit/<?= $tools[0]->getPhoto() ?>" alt="<?= $tools[0]->getTitre() ?>">
											<div class="cs-card_overlay"></div>
											<div class="cs-card_info">
												<span class="cs-hover_layer3 cs-accent_bg"></span>
												<h2 class="cs-card_title"><?= $tools[0]->getTitre() ?></h2>
											</div>
										</a>
									</div>
									<div class="cs-height_0 cs-height_lg_30"></div>
								</div>
								<div class="col-lg-3 col-sm-6 cs-hidden_mobile"></div>
								<div class="col-lg-3 col-sm-6">
									<div class="cs-hobble">
										<a href="<?= $tools[1]->getLink() ?>" class="cs-card cs-style1 cs-hover_layer1">
											<img src="<?php echo $siteURL; ?>images/produit/<?= $tools[1]->getPhoto() ?>" alt="<?= $tools[1]->getTitre() ?>">
											<div class="cs-card_overlay"></div>
											<div class="cs-card_info">
												<span class="cs-hover_layer3 cs-accent_bg"></span>
												<h2 class="cs-card_title"><?= $tools[1]->getTitre() ?></h2>
											</div>
										</a>
									</div>
									<div class="cs-height_0 cs-height_lg_30"></div>
								</div>
								<div class="col-lg-3 col-sm-6">
									<div class="cs-hobble">
										<a href="<?= $tools[2]->getLink() ?>" class="cs-card cs-style1 cs-hover_layer1">
											<img src="<?php echo $siteURL; ?>images/produit/<?= $tools[2]->getPhoto() ?>" alt="<?= $tools[2]->getTitre() ?>">
											<div class="cs-card_overlay"></div>
											<div class="cs-card_info">
												<span class="cs-hover_layer3 cs-accent_bg"></span>
												<h2 class="cs-card_title"><?= $tools[2]->getTitre() ?></h2>
											</div>
										</a>
									</div>
									<div class="cs-height_0 cs-height_lg_30"></div>
								</div>
								<div class="col-lg-3 col-sm-6 cs-hidden_mobile"></div>
								<div class="col-lg-3 col-sm-6">
									<div class="cs-hobble">
										<a href="<?= $tools[3]->getLink() ?>" class="cs-card cs-style1 cs-hover_layer1">
											<img src="<?php echo $siteURL; ?>images/produit/<?= $tools[3]->getPhoto() ?>" alt="<?= $tools[3]->getTitre() ?>">
											<div class="cs-card_overlay"></div>
											<div class="cs-card_info">
												<span class="cs-hover_layer3 cs-accent_bg"></span>
												<h2 class="cs-card_title"><?= $tools[3]->getTitre() ?></h2>
											</div>
										</a>
									</div>
									<div class="cs-height_0 cs-height_lg_30"></div>
								</div>
								<div class="col-lg-3 col-sm-6 cs-hidden_mobile"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Service Section -->
		</div>
	</div>
</section>