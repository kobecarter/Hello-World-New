<!--<h4 class="card-title">Basic Info</h4>-->
<style>
	.discount_val{
		display: none;
	}
</style>
<form method="post" action="<?php echo $action; ?>" id="factureForm" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 msgbox"></div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Client</label>
				<select class="select" name="client">
				<?php foreach($clients as $client): ?>
					<?php $sl = isset($facture) && $facture->getClient()->getId() == $client->getId() ? "selected" : ""; ?>
					<option value="<?php echo $client->getId() ?>" <?php echo $sl; ?>><?php echo $client->getNom() . ' ' . $client->getPrenom() . ' - ' . $client->getRaisonSocial(); ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="form-group">
				<label>Numéro</label>
				<input type="text" class="form-control" name="numero" value="<?php if(isset($facture)) echo $facture->getNumero(); ?>">
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="form-group">
				<label>Date facture</label>
				<div class="cal-icon">
				<input type="text" class="form-control datetimepicker" name="date_facture" value="<?php if(isset($facture)) echo normaldate($facture->getDateFacture()); ?>">
				</div>	
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="form-group">
				<label>Total</label>
				<input type="number" step="any" class="form-control" disabled name="total" value="<?php if(isset($facture)) echo $facture->getTotal(); ?>">
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="form-group">
				<label>Devise</label>
				<select class="select" name="devise">
					<option value="DH" <?php if(isset($facture) && $facture->getDevise() == 'DH') echo "selected"; ?>>MAD (DH)</option>
					<option value="€" <?php if(isset($facture) && $facture->getDevise() == '€') echo "selected"; ?>>Euro (€)</option>
					<option value="$" <?php if(isset($facture) && $facture->getDevise() == '$') echo "selected"; ?>>Dollar ($)</option>
					<option value="£" <?php if(isset($facture) && $facture->getDevise() == '£') echo "selected"; ?>>Pound (£)</option>
				</select>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
				<label>Réduction</label>
				<select class="select discount" name="discount">
					<option value="">Aucune</option>
					<option value="percentage" <?php if(isset($facture) && $facture->getDiscount() == 'percentage') echo "selected"; ?>>Pourcentage</option>
					<option value="amount" <?php if(isset($facture) && $facture->getDiscount() == 'amount') echo "selected"; ?>>Montant</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-2 discount_val" <?php if(isset($facture) && $facture->getDiscount() != '') echo 'style="display:block"'; ?>>
			<div class="form-group">
				<label>Valeur réduction</label>
				<input type="number" step="any" class="form-control" name="discount_val" value="<?php if(isset($facture)) echo $facture->getDiscountVal(); ?>">
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label>Statu</label>
				<select class="select" name="statu">
					<option value="0" <?php if(isset($facture) && $facture->getStatu() == 0) echo "selected"; ?>>Impayé</option>
					<option value="1" <?php if(isset($facture) && $facture->getStatu() == 1) echo "selected"; ?>>Payé</option>
					<option value="2" <?php if(isset($facture) && $facture->getStatu() == 2) echo "selected"; ?>>Payé partialement</option>
				</select>
			</div>
		</div>
		
		
		
		<div class="table-responsive mt-4">
			<table class="table table-stripped table-center table-hover">
				<thead>
					<tr>
						<th width="100">Ordre</th>
						<th>Service</th>
						<th>Quantité</th>
						<th>Prix</th>
						<th>Total</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($facture)): ?>
						<?php foreach($facture->getItems() as $item_facture): ?>
						<tr>
							<td>
								<input type="number" name="ordre[]" value="<?php echo $item_facture->getOrdre(); ?>" class="form-control qte-input">
							</td>
							<td>
								<select class="select service-select" name="id_service[]">
								<?php foreach($services as $service): ?>
									<?php $sl = $item_facture->getService()->getId() == $service->getId() ? "selected" : ""; ?>
									<option value="<?php echo $service->getId() ?>" <?php echo $sl; ?>><?php echo $service->getTitre(); ?></option>
								<?php endforeach; ?>
								</select>
							</td>
							<td>
								<input type="number" name="qte[]" value="<?php echo $item_facture->getQte(); ?>" class="form-control qte-input">
							</td>
							<td>
								<input type="number" step="any" name="prix[]" value="<?php echo $item_facture->getPrix(); ?>" class="form-control price-input">
							</td>
							<td>
								<input type="number" step="any" name="soustotal[]" value="<?php echo $item_facture->getTotal(); ?>" class="form-control total-input" disabled>
							</td>
							<td class="add-remove text-right">
								<input type="hidden" name="item_id[]" value="<?php echo $item_facture->getId(); ?>" class="id-item-input">
								<i class="fas fa-brush custom-row" data-toggle="tooltip" data-placement="top" data-original-title="Personnaliser" data-id="<?php echo $item_facture->getId(); ?>"></i> 
								<i class="fas fa-plus-circle add-row" data-toggle="tooltip" data-placement="top" data-original-title="Ajouter une ligne"></i> 
								<i class="fas fa-minus-circle remove-row" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer ligne" data-id="<?php echo $item_facture->getId(); ?>"></i> 
							</td>
						</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td>
								<select class="select service-select" name="id_service[]">
								<?php foreach($services as $service): ?>
									<option value="<?php echo $service->getId() ?>"><?php echo $service->getTitre(); ?></option>
								<?php endforeach; ?>
								</select>
							</td>
							<td>
								<input type="number" name="qte[]" value="1" class="form-control qte-input">
							</td>
							<td>
								<input type="number" step="any" name="prix[]" value="<?php echo $services[0]->getPrix(); ?>" class="form-control price-input">
							</td>
							<td>
								<input type="number" step="any" name="soustotal[]" value="<?php echo $services[0]->getPrix(); ?>" class="form-control total-input" disabled>
							</td>
							<td class="add-remove text-right">
								<input type="hidden" name="item_id[]" value="0" class="id-item-input">
								<i class="fas fa-plus-circle add-row" data-toggle="tooltip" data-placement="top" data-original-title="Ajouter ligne"></i> 
								<i class="fas fa-minus-circle remove-row" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer ligne"></i> 
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php if(isset($facture)): ?>
		<input type="hidden" name="id" value="<?php echo $facture->getId(); ?>">
		<?php endif; ?>
	</div>
	<div class="text-right mt-4">
		<button type="submit" name="<?= $submitName; ?>" class="btn btn-primary submit"><span class="spinner-border spinner-border-sm mr-2 loading"></span> <?php echo $submitValue; ?></button>
	</div>
</form>

<!-- Add Category Modal -->
<div id="dialog-custom" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Personnaliser</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>
<!-- /Add Category Modal -->

<script>
    $(function () {
		
		$(document).on( "change", ".service-select", function() {	
			var select = $(this);
			var id = select.val();
			var qte = select.parent().parent().find(".qte-input").val();
			var id_item = select.parent().parent().find(".id-item-input").val();
			var order = 'id='+id+'&id_item='+id_item;
			$.post("components/com_facture/controleurs/router.php?task=getServicePrice", order, function (theResponse) {
				var total = parseFloat(theResponse) * parseInt(qte)
				select.parent().parent().find(".price-input").val(theResponse);
				select.parent().parent().find(".total-input").val(total);
			});
		})
		
		$(document).on( "keyup", ".qte-input", function() {	
			var input = $(this);
			var prix = input.parent().parent().find(".price-input").val();
			var total = input.val() * parseFloat(prix);
			input.parent().parent().find(".total-input").val(total);
		})
		
		$(document).on( "keyup", ".price-input", function() {	
			var input = $(this);
			var qte = input.parent().parent().find(".qte-input").val();
			var total = input.val() * parseInt(qte)
			input.parent().parent().find(".total-input").val(total);
		})
		
		$('.discount').change(function(){
			var select = $(this);
			var val = select.val();
			if(val != ''){
				$('.discount_val').fadeIn();
			}
			else{
				$('.discount_val').fadeOut();
			}
		})
		
        // envoi du formulaire en ajax
        $('form#factureForm').ajaxForm({
            beforeSubmit: function () {
                $("#factureForm .loading").css('display','inline-block');
            },
            success: function (theResponse) {
                $("#factureForm .loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
				
                var msgsucces = "Facture ajoutée avec succès";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "facture modifiée avec succès";
                }
                if (parseInt(theResponse) === 1) {
                    $('#factureForm .msgbox').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> ' + msgsucces + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					
                    setTimeout(function () {
                        document.location = "index.php?option=com_facture";
                    }, 1500)
					
                } else if(parseInt(theResponse) === 0) {
                    $('#factureForm .msgbox').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Attention!</strong> Veuillez remplir les champs obligatoires<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                } else {
                    $('#factureForm .msgbox').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Erreur lors de l\'execution de l\'opération<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                }
            }
        });
		
		$(document).on( "click", ".add-row", function() {
			var $btn = $(this);
			var order = '';
			$.post("components/com_facture/controleurs/router.php?task=getRowFacture", order, function (theResponse) {
				$btn.parent().parent().after(theResponse);
				// Select 2
				if ($('.select').length > 0) {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}
			})
		})
		
		$(document).on( "click", ".remove-row", function() {
			var $btn = $(this);
			var id = $btn.attr("data-id");
			if (confirm("Etes-vous sure !")) {
				var order = 'id=' + id;
				$.post("components/com_facture/controleurs/router.php?task=removeItemFacture", order, function (theResponse) {
					if (parseInt(theResponse) == 1) {

						$btn.parent().parent().addClass("table-danger");
						setTimeout(function () {
							$btn.parent().parent().remove()
						}, 1000);

						$('#factureForm .msgbox').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> ' + msgsucces + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					}
					else {
						$('#factureForm .msgbox').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Erreur lors de la suppression<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					}
				})
			}
		})
		
		$(document).on( "click", ".custom-row", function() {
			var $btn = $(this);
			var id = $btn.attr("data-id");
			var order = 'id=' + id;
			$.post("components/com_facture/controleurs/router.php?task=customItemFacture", order, function (theResponse) {
				$(".modal-body").html(theResponse);
				$("#dialog-custom").modal('show');
			})
		})
    })
</script>
