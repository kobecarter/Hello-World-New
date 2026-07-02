<?php
if (isset($task) && !empty($task)) {
    switch ($task) {
        case "getForm":
            getForm($_POST);
            break;
		case "contact":
            contact($_POST);
            break;			
    }
}
/* ----------------------------------------- getForm ----------------------------------------- */
function getForm($data)
{
	require_once ("../../../includes/traduction.php");
	global $db, $siteURL;
	if(isset($data['id']) && !empty($data['id'])){
		$id = intval($data['id']);
		$job = job::find($id,$_SESSION['lang']);
		?>
		<form action="<?= $siteURL; ?>components/com_job/controleurs/router.php?task=contact" method="post" class="formTemplate" id="jobForm">
			<h4 class="job-title"><?php echo $job->getTitre(); ?></h4>
			<div class="msgbox"></div>
			<input type="hidden" name="poste" value="<?php echo $job->getTitre(); ?>">
			<div class="form-group">
				<input name="nom" type="text" class="form-control" placeholder="Nom complet" required>
			</div>

			<div class="form-group">
				<input name="email" type="email" class="form-control" placeholder="E-mail" required>
			</div>

			<div class="form-group">
				<input name="tel" type="text" class="form-control" placeholder="Téléphone" required>
			</div>

			<div class="form-group">
				<label>Votre CV</label>
				<input name="cv[]" type="file" class="form-control" placeholder="Photo">
			</div>
			<div class="form-group mb-0">
				<textarea name="message" id="message" placeholder="Votre message" cols="30" rows="5" class="form-control"></textarea>
			</div>
			<!--<div class="form-group form-submit">
				<button type="submit" class="btn btn-primary btn-block"><span>Envoyer !</span></button>
			</div>-->
			<div class="loading"></div>
		</form>
		<script>
		$(document).ready(function (){   
			// Envoi du formulaire Recrutement
			$('form#jobForm').ajaxForm({
				beforeSubmit: function() {
					// chargement
					$("#jobForm .loading").show();
				},
				success: function(theResponse) {
					$("#jobForm .loading").hide();
					if (parseInt(theResponse) === 1) {
						$('#jobForm .msgbox').html(
							"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['DEMANDE_ENVOI_SUCCES'][$_SESSION['lang']]; ?></div>"
						);
						$('#jobForm').resetForm();
					} else if (parseInt(theResponse) === 0) {
						$('#jobForm .msgbox').html(
							"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['REMPLIR_CHAMP_OBLIG'][$_SESSION['lang']]; ?></div>"
						);
					} else {
						$('#jobForm .msgbox').html(
							"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['ERREUR_EXEC'][$_SESSION['lang']]; ?></div>"
						);
						$('#jobForm .msgbox').slideDown();
					}
				}
			});
			
			$(".send-form").click(function(){
				$("form#jobForm").submit();
			})
		});
		</script>
		<?php
	}
}

/* ----------------------------------------- contact ----------------------------------------- */
function contact($data){
    global $db, $siteURL;
    if(isset($data['nom']) && !empty($data['nom']) && isset($data['email']) && !empty($data['email']) && isset($data['tel']) && !empty($data['tel']) && isset($data['poste']) && !empty($data['poste'])){

		if(isset($_FILES['cv']) && $_FILES['cv']['name'][0]!=''){
			$cv = uploadFiles('cv','../../../uploads/',  array('doc','docx','pdf','DOC','DOCX','PDF'));
		}
		else{
			echo '0'; // champs vide
			exit;
		}

		$config = new config($db, $_SESSION["lang"]);

        $message='<html>
<body>
<h1 style="font-weight:normal">Candidature Recrutement</h1>
<table border="0" cellpadding="5">
<tr>
	<td><strong>Nom complet : </strong></td><td>'.$data['nom'].'</td>
</tr>
<tr>
	<td><strong>E-mail : </strong></td><td>'.$data['email'].'</td>
</tr>
<tr>
	<td><strong>Téléphone : </strong></td><td>'.$data['tel'].'</td>
</tr>
<tr>
	<td><strong>Poste : </strong></td><td>'.$data['poste'].'</td>
</tr>
<tr>
	<td><strong>CV : </strong></td><td><a href="'.$siteURL.'uploads/'.$cv[0].'">Ouvrir</a></td>
</tr>
<tr>
	<td><strong>Message : </strong></td><td>'.nl2br($data['message']).'</td>
</tr>
</table>
</body>
</html>';

# send mail ###############################################################################
        $from = $data['email'];
        //$to = $config->getEmail();
		$to = 'recrute@helloworld-agency.com';

        $headers ='From: <'.$from.'>'."\n";
        $headers .='Reply-To: '.$from."\n";
        $headers .='Content-Type: text/html; charset="utf-8"'."\n";
        $headers .='Content-Transfer-Encoding: 8bit';
        mail($to, 'Candidature Recrutement', $message, $headers);
        echo '1';
    }
    else
        echo '0'; // champs requis
}