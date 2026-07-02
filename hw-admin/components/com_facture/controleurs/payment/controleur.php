<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'paymentForm':
            paymentForm($_POST);
            break;
        case 'editPayment':
            editPayment($_POST);
            break;
        case 'deletePayment':
            deletePayment($_POST);
            break;
        case "addPayment":
            addPayment($_POST);
            break;
    }
}

function addPayment($data)
{
    $indices = array("id_facture", "montant");
    if (fieldCheck($data, $indices)) {
        if (buildPayment($data)->add() == 1) {
			facture::find($data['id_facture'])->checkPayment();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editPayment($data)
{
    $indices = array("id", "id_facture", "montant");
    if (fieldCheck($data, $indices)) {
        if (buildPayment($data, $data['id'])->edit() == 1) {
			facture::find($data['id_facture'])->checkPayment();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deletePayment($data)
{
    $indices = array("id");
    if (fieldCheck($data, $indices))
    {
        $id = $data["id"];
        $payment = payment::find($id);
        if ($payment->delete() == 1) {
			facture::find($data['id_facture'])->checkPayment();
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function paymentForm($data){
	
	$indices = array("id_facture");
    if (fieldCheck($data, $indices)){	
		
	$facture = facture::find($data['id_facture']);
		
	if(isset($data['id']) && !empty($data['id'])){
		$payment = payment::find($data['id']);
		$btnText = "Modifier paiement";
		$action = "components/com_facture/controleurs/router.php?task=editPayment";
		$task = "edit";
		
	}else{
		$btnText = "Ajouter paiement";
		$action = "components/com_facture/controleurs/router.php?task=addPayment";
		$task = "add";
	}
		?>
		<form method="post" action="<?php echo $action; ?>" id="paymentForm">
			<div class="msgbox"></div>
			
			<div class="form-group">
				<label>Montant <span class="text-danger">*</span></label>
				<input class="form-control" type="number" step="any" name="montant" value="<?php if(isset($payment)) echo $payment->getMontant();  else echo $facture->getReste(); ?>">
			</div>
			
			<div class="form-group">
				<label>Date <span class="text-danger">*</span></label>
				<div class="cal-icon">
				<input class="form-control datetimepicker" type="text" name="date_payment" value="<?php if(isset($payment)) echo normaldate($payment->getDatePayment()); ?>">
				</div>
			</div>
			
			<div class="form-group">
				<label>Méthode de paiement</label>
				<select class="select" name="methode_payment">
					<option value="Chèque" <?php if(isset($payment) && $payment->getMethodePayment() == 'Chèque') echo "selected"; ?>>Chèque</option>
					<option value="Traite" <?php if(isset($payment) && $payment->getMethodePayment() == 'Traite') echo "selected"; ?>>Traite</option>
					<option value="Espèce" <?php if(isset($payment) && $payment->getMethodePayment() == 'Espèce') echo "selected"; ?>>Espèce</option>
					<option value="Virement" <?php if(isset($payment) && $payment->getMethodePayment() == 'Virement') echo "selected"; ?>>Virement</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Détail</label>
				<textarea name="detail" class="form-control"><?php if(isset($payment)) echo $payment->getDetail(); ?></textarea>
			</div>
			
			<?php if(isset($payment)): ?>
			<input type="hidden" name="id" value="<?php echo $payment->getId(); ?>">
			<?php endif; ?>
			<input type="hidden" name="id_facture" value="<?php echo $data['id_facture'] ?>">
			
			<div class="submit-section">
				<button class="btn btn-primary submit-btn submit" name="<?php echo $task; ?>"><span class="spinner-border spinner-border-sm mr-2 loading"></span> <?php echo $btnText; ?></button>
			</div>
		</form>
<script>
    $(function () {
		// Select 2
		if ($('.select').length > 0) {
			$('.select').select2({
				minimumResultsForSearch: -1,
				width: '100%'
			});
		}

		// Datetimepicker
		if($('.datetimepicker').length > 0 ){
			$('.datetimepicker').datetimepicker({
				format: 'DD/MM/YYYY',
				icons: {
					up: "fas fa-angle-up",
					down: "fas fa-angle-down",
					next: 'fas fa-angle-right',
					previous: 'fas fa-angle-left'
				}
			});
		}

		// envoi du formulaire en ajax
        $('form#paymentForm').ajaxForm({
            beforeSubmit: function () {
                $("#paymentForm .loading").css('display','inline-block');
            },
            success: function (theResponse) {
                $("#paymentForm .loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
				
                var msgsucces = "Paiement ajouté avec succès";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Paiement modifié avec succès";
                }
                if (parseInt(theResponse) === 1) {
                    $('#paymentForm .msgbox').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> ' + msgsucces + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					
                    setTimeout(function () {
						document.location.reload();
                    }, 1500)
					
                } else if(parseInt(theResponse) === 0) {
                    $('#paymentForm .msgbox').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Attention!</strong> Veuillez remplir les champs obligatoires<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                } else {
                    $('#paymentForm .msgbox').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Erreur lors de l\'execution de l\'opération<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                }
            }
        });
	})
</script>	
		<?php
	}
}

function buildPayment($data, $id = null)
{
    $payment = new payment();

    if($id){
        $payment = payment::find($id);
    }

    $payment->setFacture(facture::find($data['id_facture']));
	$payment->setMontant($data['montant']);
	$payment->setDatePayment(dateBD($data['date_payment']));
	$payment->setMethodePayment($data['methode_payment']);
	$payment->setDetail($data['detail']);
    $payment->setDateAdd(date("Y-m-d H:i:s"));
    $payment->setLastEdit(date("Y-m-d H:i:s"));

    return $payment;
}