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
		<form action="<?= $siteURL; ?>components/com_service/controleurs/router.php?task=contact" method="post" id="serviceForm" class="needs-validation" novalidate>
			<h4 class="job-title">Vous y êtes presque, il vous suffit de laisser vos coordonnées pour être contacté par nos EXPERTS</h4>
			<div class="msgbox"></div>
			<input type="hidden" name="service" value="<?php echo $service->getTitre(); ?>">
			<div class="form-group">
				<input name="nom" type="text" class="form-control" placeholder="Nom complet" required>
			</div>
			
			<div class="form-group">
				<input name="tel" type="text" class="form-control" placeholder="Téléphone" required>
			</div>
			
			<div class="form-group">
				<input name="email" type="email" class="form-control" placeholder="E-mail" required>
			</div>
			
			<div class="form-group datepicker-field">
				<label>Date et heure dans lesquelles vous voulez être contacté</label>
				
				<div id="picker"> </div>
				<input type="hidden" id="result" name="datetime" value="" required>
			</div>

			<div class="form-group">
				<textarea name="message" id="message" placeholder="Détail à rajouter" cols="30" rows="5" class="form-control"></textarea>
			</div>
			<div class="form-group">
            	<div class="g-recaptcha" data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
        	</div>
			<div class="form-group form-submit">
				<button type="submit" class="btn-custom"><span><?php echo $btnText; ?></span></button>
				
				<a href="javascript:void(0)" class="vie-privee page-popup" data-id="<?php echo $pageConfid->getId(); ?>"><?php echo $pageConfid->getTitre(); ?></a>
			</div>
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
		$(document).ready(function (){   
			    $(".page-popup").click(function(){
				$("#serviceModal .modal-footer").hide();
				$("#serviceModal .modal-title").html(`<?php echo $pageConfid->getTitre(); ?>`);
				$("#serviceModal .modal-body").html(`<?php echo $pageConfid->getTexte(); ?>`);
				$("#serviceModal").modal("show");
				/*var order = 'id='+$(this).attr("data-id");
				$.post(siteURL+"components/com_service/controleurs/router.php?task=getPage", order, function (theResponse) {
					$("#serviceModal .modal-body").html(theResponse)
					$("#serviceModal").modal("show");
				})*/
			})
			
			$('#picker').dateTimePicker({
				dateFormat: "DD/MM/YYYY HH:mm",
				locale: 'fr'
			});
			
			// Get the forms to apply validation
        	  var forms = document.getElementsByClassName('needs-validation');
        	  // Loop over them and prevent submission
        	  var validation = Array.prototype.filter.call(forms, function(form) {
        		form.addEventListener('submit', function(event) {
        			 event.preventDefault();
        		  if (form.checkValidity() === false) {
        			event.stopPropagation();
        		  }else{
        						  var id = form.getAttribute('id')    /*-------------------------------------------------------------------------------
        					  	/* -----------------------------------
        								07. Service form
        								-------------------------------------*/
        							
        							
        							$('form#serviceForm').ajaxForm({
                        				beforeSubmit: function() {
                        					// chargement
                        					$("form#serviceForm .loading").show();
                        				},
                        				success: function(theResponse) {
                        					$("form#serviceForm .loading").hide();
                        					if (parseInt(theResponse) === 1) {
                        						$('#formserviceForm .msgbox').html(
                        							"<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['DEMANDE_ENVOI_SUCCES'][$_SESSION['lang']]; ?></div>"
                        						);
                        						$('form#serviceForm').resetForm();
                        						document.location = "<?php echo $service->getThankYouPageLink(); ?>";
                        					} else if (parseInt(theResponse) === 0) {
                        						$('form#serviceForm .msgbox').html(
                        							"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['REMPLIR_CHAMP_OBLIG'][$_SESSION['lang']]; ?></div>"
                        						);
                        					} else if (parseInt(theResponse) === 2) {
                        						$('form#serviceForm .msgbox').html(
                        							"<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button> Veuillez cocher (Je ne suis pas un robot)</div>"
                        						);
                        					} else {
                        						$('form#serviceForm .msgbox').html(
                        							"<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><?= $lang['ERREUR_EXEC'][$_SESSION['lang']]; ?></div>"
                        						);
                        						$('form#serviceForm .msgbox').slideDown();
                        					}
                        				}
                        			});
        							
        						  if(id =="serviceForm"){
        							$("form#serviceForm").submit()
        						  }
        		  }
        		  form.classList.add('was-validated');
        		}, false);
        	  });
		});
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