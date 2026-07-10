<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../../vendor/autoload.php';

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
	if(isset($data['slug']) && !empty($data['slug'])){
		$slug = $data['slug'];
		$service = service::findBySlug($slug,$_SESSION['lang']);
		$config = new config($db,$_SESSION['lang']);
		$pageConfid = new page(1,$db,$_SESSION['lang']);

		switch($service->getSlug()){
			case 'notorite' : $btnText = "Je booste maintenant"; break;
			default : $btnText = "J'envoie ma demande maintenant !";
		}	
		?>
		<form action="<?= $siteURL; ?>components/com_service/controleurs/router.php?task=contact" method="post" id="serviceForm" class="ct-form">
			<h4 class="job-title">Vous y êtes presque, il vous suffit de laisser vos coordonnées pour être contacté par nos EXPERTS</h4>
			<div class="row">
				<div class="msgbox col-12"></div>
			</div>
			<input type="hidden" name="service" value="<?php echo $service->getTitre(); ?>">

			<div class="ct-row">
				<div class="ct-group">
					<input class="ct-input" type="text" name="nom" id="ct-service-nom" placeholder=" " autocomplete="name" required>
					<label class="ct-float-label" for="ct-service-nom">Nom complet *</label>
					<span class="ct-line"></span>
				</div>
				<div class="ct-group">
					<input class="ct-input" type="text" name="tel" id="ct-service-tel" placeholder=" " autocomplete="tel" required>
					<label class="ct-float-label" for="ct-service-tel">Téléphone *</label>
					<span class="ct-line"></span>
				</div>
			</div>

			<div class="ct-group">
				<input class="ct-input" type="email" name="email" id="ct-service-email" placeholder=" " autocomplete="email" required>
				<label class="ct-float-label" for="ct-service-email">Email *</label>
				<span class="ct-line"></span>
			</div>

			<div class="ct-group">
				<textarea class="ct-textarea" name="message" id="ct-service-message" placeholder=" " rows="5"></textarea>
				<label class="ct-float-label" for="ct-service-message" style="top:.6rem">Détail à rajouter</label>
				<span class="ct-line"></span>
			</div>

			<div class="ct-group">
            	<div class="g-recaptcha" data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
        	</div>

			<div class="sb submit-form" role="slider" tabindex="0" aria-label="<?php echo $btnText; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
				<div class="sb-fill"></div>
				<div class="sb-label"><span class="sb-hint"><?php echo $btnText; ?></span></div>
				<div class="sb-knob"><i class="fa fa-paper-plane"></i></div>
			</div>
			<p class="ct-privacy"><i class="fa fa-lock"></i> Données confidentielles · <a href="javascript:void(0)" class="page-popup" data-id="<?php echo $pageConfid->getId(); ?>"><?php echo $pageConfid->getTitre(); ?></a></p>
			<div class="loading"></div>
		</form>
		<div class="or">Ou prenez contact avec nous directement</div>
		<div class="contact-box">
			<p><i class="ti-mobile"></i> <a class="text-white" href="tel:<?php echo $config->getTel(); ?>"><?php echo $config->getTel(); ?></a></p>
			<p><i class="ti-email"></i> <a class="text-white" href="mailto:<?php echo $config->getEmail(); ?>"><?php echo $config->getEmail(); ?></a></p>
			<p><i class="fab fa-whatsapp"></i> <a class="text-white" href="whatsapp://send?text=Salut!&phone=<?= $config->getTel2();?>"><?php echo $config->getTel2(); ?></a></p>
			<h4 align="center">Nous vous remercions pour votre confiance, excellente journée à vous !</h4>
		</div>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script>
		(function(){
			jQuery(".page-popup").click(function(){
				jQuery("#serviceModal .modal-footer").hide();
				jQuery("#serviceModal .modal-title").html(`<?php echo $pageConfid->getTitre(); ?>`);
				jQuery("#serviceModal .modal-body").html(`<?php echo $pageConfid->getTexte(); ?>`);
				jQuery("#serviceModal").modal("show");
			});

			jQuery('form#serviceForm').ajaxForm({
				beforeSubmit: function() {
					jQuery("form#serviceForm .loading").show();
				},
				success: function(theResponse) {
					jQuery("form#serviceForm .loading").hide();
					if (parseInt(theResponse) === 1) {
						jQuery('form#serviceForm .msgbox').html(
							"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['DEMANDE_ENVOI_SUCCES'][$_SESSION['lang']]; ?></div>"
						);
						jQuery('form#serviceForm').resetForm();
						document.location = "<?php echo $service->getThankYouPageLink(); ?>";
					} else if (parseInt(theResponse) === 0) {
						jQuery('form#serviceForm .msgbox').html(
							"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['REMPLIR_CHAMP_OBLIG'][$_SESSION['lang']]; ?></div>"
						);
					} else if (parseInt(theResponse) === 2) {
						jQuery('form#serviceForm .msgbox').html(
							"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button> Veuillez cocher (Je ne suis pas un robot)</div>"
						);
					} else {
						jQuery('form#serviceForm .msgbox').html(
							"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['ERREUR_EXEC'][$_SESSION['lang']]; ?></div>"
						);
						jQuery('form#serviceForm .msgbox').slideDown();
					}
				}
			});

			jQuery("#serviceForm .submit-form").click(function(){
				jQuery(this).closest('form').submit();
			});
		})();
		</script>
		<?php
	}
}

/* ----------------------------------------- contact ----------------------------------------- */
function contact($data){
    global $db, $siteURL;
    if(isset($data['nom']) && !empty($data['nom']) && isset($data['email']) && !empty($data['email']) && isset($data['tel']) && !empty($data['tel'])){
		
    	$your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
    	$response = $_POST['g-recaptcha-response'];
    	$var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=" . $_SERVER['REMOTE_ADDR']));
    	if (!$var->success) {
    		echo '2';
    		exit;
    	}
    		
		$config = new config($db, $_SESSION["lang"]);
		$mail = new PHPMailer(true);
        try {                                           //Send using SMTP
            $mail->Host       = 'helloworld-agency.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
            $mail->Username   = $config->getEmail();                     //SMTP username           //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($data['email'], $data['nom']);
            $mail->addAddress($config->getEmail(), $config->getNom());     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64'; 
            $mail->Subject = 'Contact Services';
            $mail->AltBody = 'Contact Services';

            $message='<html>
                        <body>
                        <h1 style="font-weight:normal">Contact Services</h1>
                            <table border="0" cellpadding="5">
                                <tr width="30%">
                                	<td><strong>Nom complet : </strong></td><td>'.$data['nom'].'</td>
                                </tr>
                                <tr>
                                	<td><strong>E-mail : </strong></td><td>'.$data['email'].'</td>
                                </tr>
                                <tr>
                                	<td><strong>Téléphone : </strong></td><td>'.$data['tel'].'</td>
                                </tr>
                                <tr>
                                	<td><strong>Service : </strong></td><td>'.$data['service'].'</td>
                                </tr>
                                <tr>
                                	<td><strong>Message : </strong></td><td>'.nl2br($data['message']).'</td>
                                </tr>
                            </table>
                        </body>
                    </html>';
                    
            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString('Contact Services', "text"),
                    GetSQLValueString($data['nom'], "text"),
                    GetSQLValueString($data['email'], "text"),
                    GetSQLValueString($data['tel'], "text"),
                    GetSQLValueString($message, "text"),
                    GetSQLValueString(date('Y-m-d'), "date"),
                    GetSQLValueString(1, "int"));
                $db->query($insertSQL);
            
            $mail->Body = $message;
            if($mail->send()){
                echo '1';
            }else{
                echo '3';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{
        echo '0'; // champs requis
    }
            
}