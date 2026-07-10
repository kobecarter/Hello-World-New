<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include"../../../hw-admin/config.php";
require_once('../../../hw-admin/instanceDb.php');
require_once('../../../includes/functions/functions.php');
require '../../../vendor/autoload.php';
session_start();

if(isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'contact' :
            contact($_POST);
            break;
        case 'quickContact' :
            quickContact($_POST);
            break;
		case 'quote' :
            quote($_POST);
            break;
        case 'consultingRendezVous' :
            consultingRendezVous($_POST);
            break;	
		case 'quotePopUp' :
			quotePopUp($_POST);
			break;	
	    case 'realisationRequest' :
            realisationRequest($_POST);
            break;	
        case 'newsletter' :
            newsletter($_POST);
            break;
    }
}

/* ----------------------------------------- contact ----------------------------------------- */
function contact($data){
    // die("hello");
    global $db;
    if(isset($data['nom']) && !empty($data['nom']) && isset($data['email']) && !empty($data['email']) && isset($data['phone']) && !empty($data['phone']) && isset($data['source']) && !empty($data['source']) && isset($data['ville']) && !empty($data['ville'])){
    
        // verification captcha
        $your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
        $response = $_POST['g-recaptcha-response']; 
        $var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=".$_SERVER['REMOTE_ADDR']));
        if(!$var->success){
        	echo '2';
        	exit;	
        }
        
        
        $config = new config($db);
        $mail = new PHPMailer(true);
        try {                                           //Send using SMTP
            $mail->Host       = 'helloworld-agency.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
            $mail->Username   = $config->getEmail();                     //SMTP username           //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($data['email'], $data['nom']);
            $mail->addAddress($config->getEmail(), $config->getNom());     //Add a recipient

            //Content
                //Content
            $mail->isHTML(true);  
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';                                 //Set email format to HTML
            $mail->Subject = 'Contact';
            $mail->AltBody = 'Contact';
            $message='<html>
                    <body>
                        <h1 style="font-weight:normal">Contact</h1>
                        <table border="0" cellpadding="5">
                            <tr width="30%">
                            	<td><strong>Source : </strong></td><td>'.$data['source'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Civilité : </strong></td><td>'.$data['civilite'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Nom complet : </strong></td><td>'.$data['nom'].' '.$data['prenom'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Tél : </strong></td><td>'.$data['phone'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Ville : </strong></td><td>'.$data['ville'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Entreprise : </strong></td><td>'.$data['company'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>E-mail : </strong></td><td>'.$data['email'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Service demandé : </strong></td><td>'.$data['service'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Budget : </strong></td><td>'.$data['budget'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Message : </strong></td><td>'.nl2br($data['message']).'</td>
                            </tr>
                        </table>
                    </body>
                    </html>';
                    
            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString('Contact', "text"),
                GetSQLValueString($data['nom'].' '.$data['prenom'], "text"),
                GetSQLValueString($data['email'], "text"),
                GetSQLValueString($data['phone'], "text"),
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
        echo '0';
    }
    # send mail ###############################################################################
    //$from = $data['email'];
    //$to = $config->getEmail();
}

/* ----------------------------------------- quickContact ----------------------------------------- */
function quickContact($data){
    // die("hello");
    global $db;
    if(isset($data['nom']) && !empty($data['nom']) && isset($data['email']) && !empty($data['email']) && isset($data['phone']) && !empty($data['phone'])){
    
        
        $config = new config($db);
        $mail = new PHPMailer(true);
        try {                                           //Send using SMTP
            $mail->Host       = 'helloworld-agency.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
            $mail->Username   = $config->getEmail();                     //SMTP username           //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($data['email'], $data['nom']);
            $mail->addAddress($config->getEmail(), $config->getNom());     //Add a recipient

            //Content
                //Content
            $mail->isHTML(true);  
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';                                 //Set email format to HTML
            $mail->Subject = 'Contact';
            $mail->AltBody = 'Contact';
            $message='<html>
                    <body>
                        <h1 style="font-weight:normal">Contact</h1>
                        <table border="0" cellpadding="5">
                            <tr width="30%">
                            	<td><strong>Nom complet : </strong></td><td>'.$data['nom'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Tél : </strong></td><td>'.$data['phone'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>E-mail : </strong></td><td>'.$data['email'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Budget : </strong></td><td>'.$data['budget'].'</td>
                            </tr>
                            <tr>
                            	<td><strong>Message : </strong></td><td>'.nl2br($data['message']).'</td>
                            </tr>
                        </table>
                    </body>
                    </html>';
                    
            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString('Quick Contact', "text"),
                GetSQLValueString($data['nom'], "text"),
                GetSQLValueString($data['email'], "text"),
                GetSQLValueString($data['phone'], "text"),
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
        echo '0';
    }
}
/* ----------------------------------------- devis ----------------------------------------- */
function quote($data)
{
    global $db;
    if (isset($data['fullname']) && !empty($data['fullname']) && isset($data['email']) && !empty($data['email']) && isset($data['phone']) && !empty($data['phone']) && isset($data['source']) && !empty($data['source']) && isset($data['type_client']) && !empty($data['type_client'])) {

        // verification captcha
        $your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
        $response = $_POST['g-recaptcha-response'];
        $var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=" . $_SERVER['REMOTE_ADDR']));
        if (!$var->success) {
            echo '2';
            exit;
        }

        //$p = new packs($data['id'], $db);
		$config = new config($db);
		
		$services = "";
		
		if(isset($data['service']) && !empty($data['service'])){
			foreach($data['service'] as $item){
				$services .= " - ".str_replace('-','',$item);
			}
		}
		
		if($services == ""){
			$services = "Aucun service n'a été séléctionné !";
		}
    
        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "demande_devis (nom, email, message, pack, services, vu, date) VALUES (%s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($data['nom'], "text"),
            GetSQLValueString($data['email'], "text"),
            GetSQLValueString($data['message'], "text"),
            GetSQLValueString('-', "text"),
            GetSQLValueString($services, "text"),
            GetSQLValueString(0, "int"),
            GetSQLValueString(date('Y-m-d H:i:s'), "date")
        );

        if (!$db->query($insertSQL)) {
            $mail = new PHPMailer(true);
            try {                                           //Send using SMTP
                $mail->Host       = 'helloworld-agency.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
                $mail->Username   = $config->getEmail();                     //SMTP username           //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($data['email'], $data['nom']);
                $mail->addAddress($config->getEmail(), $config->getNom());     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set     
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';                                 
                $mail->Subject = 'Demande devis';
                $mail->AltBody = 'Demande devis';
                $message = '<html>
                                <body>
                                    <h1 style="font-weight:normal">Demande devis</h1>
                                    <table border="0" cellpadding="10">
                                        <tr width="30%">
                                        	<td><strong>Comment vous nous avez connu ? : </strong></td><td>' . $data['source'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Vous êtes : </strong></td><td>' . $data['type_client'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Nom complet : </strong></td><td>' . $data['fullname'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Tél : </strong></td><td>' . $data['phone'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>E-mail : </strong></td><td>' . $data['email'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Services demandés : </strong></td><td>' . $services . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Message : </strong></td><td>' . nl2br($data['message']) . '</td>
                                        </tr>
                                    </table>
                                </body>
                            </html>';
                            
                $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString('Demande devis', "text"),
                    GetSQLValueString($data['fullname'], "text"),
                    GetSQLValueString($data['email'], "text"),
                    GetSQLValueString($data['phone'], "text"),
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
        } else {
            echo '2';
        }
    } else{
        echo '0'; // champs requis
    }
}

/* ----------------------------------------- Consulting ----------------------------------------- */
function consultingRendezVous($data)
{
    // die("hello");
    global $db;
    if (isset($data['fullname']) && !empty($data['fullname']) && isset($data['email']) && !empty($data['email']) && isset($data['phone']) && !empty($data['phone'])) {

        // verification captcha
        $your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
        $response = $_POST['g-recaptcha-response'];
        $var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=" . $_SERVER['REMOTE_ADDR']));
        if (!$var->success) {
            echo '2';
            exit;
        }

        //$p = new packs($data['id'], $db);
		$config = new config($db);
		
		$services = "";
		
            if(isset($data['service']) && !empty($data['service'])){
                foreach($data['service'] as $item){
                    $services .= " - ".str_replace('-','',$item);
                }
            }
            
            if($services == ""){
                $services = "Aucun service n'a été séléctionné !";
            }
            $mail = new PHPMailer(true);
            try {                                           //Send using SMTP
                $mail->Host       = 'helloworld-agency.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
                $mail->Username   = $config->getEmail();                     //SMTP username           //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($data['email'], $data['fullname']);
                $mail->addAddress($config->getEmail(), $config->getNom());     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Demande consultation';
                $mail->AltBody = 'Demande consultation';
                $message = '<html>
                                <body>
                                    <h1 style="font-weight:normal">Demande de consultation</h1>
                                    <table border="0" cellpadding="10">
                                   
                                        <tr>
                                        	<td><strong>Nom complet : </strong></td><td>' . $data['fullname'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Tél : </strong></td><td>' . $data['phone'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>E-mail : </strong></td><td>' . $data['email'] . '</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Datetime : </strong></td><td>' . $data['datetime'] . '</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Anciennete business : </strong></td><td>' . $data['anciennete_business'] . '</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Type reunion : </strong></td><td>' . $data['type_reunion'] . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Services demandés : </strong></td><td>' . $services . '</td>
                                        </tr>
                                        <tr>
                                        	<td><strong>Message : </strong></td><td>' . nl2br($data['message']) . '</td>
                                        </tr>
                                    </table>
                                </body>
                            </html>';
                            
                            $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                            GetSQLValueString('Demande de consultation', "text"),
                            GetSQLValueString($data['fullname'], "text"),
                            GetSQLValueString($data['email'], "text"),
                            GetSQLValueString($data['phone'], "text"),
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
        
    } else{
        echo '0'; // champs requis
    }
}
/* ----------------------------------------- newsletter ----------------------------------------- */
function newsletter($data){
if(isset($data['email']) && !empty($data['email'])){
	$email = addslashes($data['email']);
	global $db;
	if(unique(__prefixe_db__."newsletter", "email", $email)){
		$SQLinsert = sprintf("INSERT INTO ".__prefixe_db__."newsletter (email, date_add, confirm) VALUES (%s, %s, %s)",
		   GetSQLValueString($email, "text"),
		   GetSQLValueString(date('Y-m-d'), "text"),
		   GetSQLValueString(0, "int"));
		if(!$db->query($SQLinsert))
			echo '1'; // succes
		else
			echo '3'; // erreur
	}
	else
	echo '2'; // email existe deja dans la base de données
}
else
echo '0'; // champs email obligatoir
}

/* ----------------------------------------- devis ----------------------------------------- */
function quotePopUp($data){
    global $db;
    if (isset($data['first_name']) && !empty($data['first_name']) && isset($data['last_name']) && !empty($data['last_name']) && isset($data['email']) && !empty($data['email']) && isset($data['phone']) && !empty($data['phone']) && isset($data['budget']) && !empty($data['budget']) && isset($data['services']) && !empty($data['services']) && isset($data['city']) && !empty($data['city'])) {

		// verification captcha
        $your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
        $response = $_POST['g-recaptcha-response'];
        $var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=" . $_SERVER['REMOTE_ADDR']));
        if (!$var->success) {
            echo '2';
            exit;
        }


        //$p = new packs($data['id'], $db);
		$config = new config($db);
		
		$services = "";
		
		if(isset($data['services']) && !empty($data['services'])){
			foreach($data['services'] as $service){
				//$s = service::find($id_service, $_SESSION["lang"]);
				$services .= " - " . $service;
			}
		}
		
		$mail = new PHPMailer(true);
        try {                                          
            $mail->Host       = 'helloworld-agency.com';                             
            $mail->Username   = $config->getEmail();                                               
        
            //Recipients
            $mail->setFrom($data['email'], $data['nom']);
            $mail->addAddress($config->getEmail(), $config->getNom());     

            //Content
            $mail->isHTML(true);  
            $mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

            $mail->Subject = 'Quote request';
            $mail->AltBody = 'Quote request';
		
            $message = '<html>
    					<body>
        					<h1 style="font-weight:normal">Quote request</h1>
        					<table border="0" cellpadding="10">
            					<tr width="30%">
            						<td><strong>First name : </strong></td><td>' . $data['first_name'] . '</td>
            					</tr>
            					<tr>
            						<td><strong>Last name : </strong></td><td>' . $data['last_name'] . '</td>
            					</tr>
            					<tr>
            						<td><strong>Email : </strong></td><td>' . $data['email'] . '</td>
            					</tr>
            					<tr>
            						<td><strong>Phone : </strong></td><td>' . $data['phone'] . '</td>
            					</tr>
            					 <tr>
            						<td><strong>Ville : </strong></td><td>' . $data['city'] . '</td>
            					</tr>
            					<tr>
            						<td><strong>Budget : </strong></td><td>' . $data['budget'] . 'MAD</td>
            					</tr>
            					<tr>
            						<td><strong>Services requested : </strong></td><td>' . $services . '</td>
            					</tr>
        					</table>
    					</body>
					</html>';
					
			 $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString('Quote request', "text"),
                    GetSQLValueString($data['first_name'].' '.$data['last_name'], "text"),
                    GetSQLValueString($data['email'], "text"),
                    GetSQLValueString($data['phone'], "text"),
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
function realisationRequest($data){
    global $db;
    if (isset($data['email']) && !empty($data['email'])) {
        
        // verification captcha
        $your_secret = '6LeNLyITAAAAADKfhcUap5DBB_rXiL_SqBDp-jxw';
        $response = $_POST['g-recaptcha-response'];
        $var = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$your_secret&response=$response&remoteip=" . $_SERVER['REMOTE_ADDR']));
        if (!$var->success) {
            echo '2';
            exit;
        }
        
        $config = new config($db);
		$mail = new PHPMailer(true);
        try {                                          
            $mail->Host       = 'helloworld-agency.com';                             
            $mail->Username   = $config->getEmail();                                               
        
            //Recipients
            $mail->setFrom($data['email']);
            $mail->addAddress($config->getEmail(), $config->getNom());     

            //Content
            $mail->isHTML(true);  
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->Subject = 'Realisation request';
            $mail->AltBody = 'Realisation request';
		
            $message = '<html>
    					<body>
        					<h1 style="font-weight:normal">Realisation request</h1>
        					<table border="0" cellpadding="10">
            				
            					<tr>
            						<td><strong>Email : </strong></td><td>' . $data['email'] . '</td>
            					</tr>
            					
            					<tr>
            						<td><strong>Services requested : </strong></td><td>' . $data['service'] . '</td>
            					</tr>
        					</table>
    					</body>
					</html>';
					
			//  $insertSQL = sprintf("INSERT INTO ".__prefixe_db__."contact (nom, fullname, email, phone, template, date_add, confirm) VALUES (%s, %s, %s, %s, %s, %s, %s)",
            //         GetSQLValueString('Quote request', "text"),
            //         GetSQLValueString($data['first_name'].' '.$data['last_name'], "text"),
            //         GetSQLValueString($data['email'], "text"),
            //         GetSQLValueString($data['phone'], "text"),
            //         GetSQLValueString($message, "text"),
            //         GetSQLValueString(date('Y-m-d'), "date"),
            //         GetSQLValueString(1, "int"));
            //     $db->query($insertSQL);
            
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
?>