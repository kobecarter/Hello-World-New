<?php

function getDaysInMonth($month = null, $year = null)
{

    if ($month == null) {

        $month = date("n", time());

    }

    if ($year = null) {

        $year = date("Y", time());

    }

    $dim = date("t", mktime(0, 0, 0, $month, 1, $year));

    return $dim;

}

function url_rewriting($str)
{
    $str = str_replace('&', 'et', $str);

    // On convertit la cha�ne en UTF-8 si besoin est.
    if ($str !== mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32')) {
        $str = mb_convert_encoding($str, 'UTF-8');
    }

    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');

    // Quelques entit�s � remplacer par les lettres correspondantes.
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '$1', $str);

    $str = preg_replace('`[^\pL\pN]+`u', '-', $str);
    return strtolower(trim($str, '-'));
}

function getTitleOfComponent($option)
{
    global $db;
    $titre = "component";
    $ids_modules = module::findAll();
    foreach ($ids_modules as $id_module) {
        $m = new module($id_module, $db);
        if ($m->getIdModule() == $option) {
            $titre = $m->getNom();
        }
    }
    return $titre;
}

function monthNumToName($mois)
{
    $tableau = Array("", "Janvier", "F&eacute;vrier",
        "Mars", "Avril", "Mai", "Juin", "Juillet",
        "A&ocirc;ut", "Septembre", "Octobre", "Novembre", "D&eacute;cembre");

    return (intval($mois) > 0 && intval($mois)
        < 13) ? $tableau[intval($mois)] : "Ind�fini";
}

function monthNumToShortName($mois)
{
    $tableau = Array("", "Janv", "F&eacute;vr",
        "Mars", "Avr", "Mai", "Juin", "Juill",
        "A&ocirc;ut", "Sept", "Oct", "Nov", "D&eacute;c");

    return (intval($mois) > 0 && intval($mois)
        < 13) ? $tableau[intval($mois)] : "Ind�fini";
}

// retourn le nom du jour
function getDayBynumber($n)
{
    $jours = array('Ind�fini', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $days = array('Ind�fini', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    return ($_SESSION['langue'] == 'en') ? $jours[$n] : $days[$n];
}

// converti une date sous forme de jj/mm/aaaa en mktime

function dateToMktime($date)
{

    if ($date != "") {

        $tDate = explode("/", $date);

        $mktime = mktime(0, 0, 0, $tDate[1], $tDate[0], $tDate[2]);

    } else {

        $mktime = "";

    }

    return $mktime;

}

// converti un mktimeen une date au format jj/mm/aaaa	

function mktimeToDate($mktime)
{

    if ($mktime != "") {

        $date = date("d/m/Y", $mktime);

    } else {

        $date = "";

    }

    return $date;

}

// converti une date au format date sql
function dateBD($date)
{
    $d = explode("/", $date);
    return $d[2] . '-' . $d[1] . '-' . $d[0];
}

// converti une date en une date jj/mm/an
function normalDate($date)
{
    if ($date != "") {
        $d = explode("-", $date);
        return $d[2] . '/' . $d[1] . '/' . $d[0];
    } else
        return "";
}


function normaldate2($date)
{
    $date = explode('-', $date);
    switch ($date[1]) {
        case '01':
            $mois = 'Janvier';
            break;
        case '02':
            $mois = 'F&eacute;vrier';
            break;
        case '03':
            $mois = 'Mars';
            break;
        case '04':
            $mois = 'Avril';
            break;
        case '05':
            $mois = 'Mai';
            break;
        case '06':
            $mois = 'Juin';
            break;
        case '07':
            $mois = 'Juillet';
            break;
        case '08':
            $mois = 'Ao&ucirc;t';
            break;
        case '09':
            $mois = 'Septembre';
            break;
        case '10':
            $mois = 'Octobre';
            break;
        case '11':
            $mois = 'Novembre';
            break;
        case '12':
            $mois = 'D&eacute;cembre';
            break;
    }
    $result = $date[2] . ' ' . $mois . ' ' . $date[0];
    return $result;
}

// retourn un tableau avec les noms des images upload�es 

function uploadFiles($nomChampTxt, $uploadTo, $extensions = NULL)
{

	global $filesNotUploaded;

	

	$nomChampTxt = str_replace("[]","",$nomChampTxt);

	if($_FILES) {

		$racine = $uploadTo;

		// Pour chaque input

		for($i=0;$i<sizeof($_FILES[$nomChampTxt]["name"]);$i++) {

	

			// Si l'input est vide, on passe

			if(!$_FILES[$nomChampTxt]["name"][$i]) continue;

	
			$name = $_FILES[$nomChampTxt]["name"][$i];

			$ext = substr($name, strrpos($name, ".") + 1); 

			if (in_array($ext, $extensions) || $extensions == NULL){
				$nom_fichier=basename($name,".".$ext);
				
				// Pour éviter d'écraser l'ancien en cas de doublon
				$nom_fichier = str_replace(" ","_",$nom_fichier);
				$nom_fichier = str_replace("’","",$nom_fichier);	
				
				$accents = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig);/';
				$string_encoded = htmlentities($nom_fichier,ENT_NOQUOTES,'UTF-8');
				$nom_fichier = preg_replace($accents,'$1',$string_encoded); 	

				$nom_fichier = strtolower($nom_fichier);
				
				$n="";
				while(file_exists("$racine/$nom_fichier$n.$ext")) $n++;

				$nom_fichier="$nom_fichier$n.$ext";

				$fichiers[] = $nom_fichier;
				// Fin de l'upload

					if (@move_uploaded_file($_FILES[$nomChampTxt]["tmp_name"][$i], "$racine/$nom_fichier")){

						@chmod("$racine/$nom_fichier", 0755);

					} else {

						echo "Erreur, impossible d'envoyer le fichier <i>$nom_fichier</i><br>\n";

					}

				}

			}

	

		}

	return @$fichiers;

}

//G�n�rer une chaine de caract�re unique et al�atoire

function random($car)
{
    $string = "";
    $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime() * 1000000);
    for ($i = 0; $i < $car; $i++) {
        $string .= $chaine[rand() % strlen($chaine)];
    }
    return $string;
}


// redimentionnement d'images

function redimage($img_src, $img_dest, $dst_w, $dst_h)
{

    // Lit les dimensions de l'image

    $size = GetImageSize($img_src);

    $src_w = $size[0];
    $src_h = $size[1];

    // Teste les dimensions tenant dans la zone

    $test_h = round(($dst_w / $src_w) * $src_h);

    $test_w = round(($dst_h / $src_h) * $src_w);

    // Si Height final non pr�cis� (0)

    if (!$dst_h) $dst_h = $test_h;

    // Sinon si Width final non pr�cis� (0)

    elseif (!$dst_w) $dst_w = $test_w;

    // Sinon teste quel redimensionnement tient dans la zone

    elseif ($test_h > $dst_h) $dst_w = $test_w;

    else $dst_h = $test_h;


    // La vignette existe ?

    $test = (file_exists($img_dest));

    // L'original a �t� modifi� ?

    if ($test)

        $test = (filemtime($img_dest) > filemtime($img_src));

    // Les dimensions de la vignette sont correctes ?

    if ($test) {

        $size2 = GetImageSize($img_dest);

        $test = ($size2[0] == $dst_w);

        $test = ($size2[1] == $dst_h);

    }


    // Cr�er la vignette ?

    if (!$test) {

        // Cr�e une image vierge aux bonnes dimensions

        // $dst_im = ImageCreate($dst_w,$dst_h);

        $dst_im = ImageCreateTrueColor($dst_w, $dst_h);

        // Copie dedans l'image initiale redimensionn�e

        $src_im = ImageCreateFromJpeg($img_src);

        // ImageCopyResized($dst_im,$src_im,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);

        ImageCopyResampled($dst_im, $src_im, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

        // Sauve la nouvelle image

        ImageJpeg($dst_im, $img_dest);

        // D�truis les tampons

        ImageDestroy($dst_im);

        ImageDestroy($src_im);

    }


    // Affiche le descritif de la vignette echo "SRC='".$img_dest."?t=".time()."' WIDTH=".$dst_w." HEIGHT=".$dst_h;

}


// retourn les valeur necessaire pour la pagination

function pagination($req, $nb_elemPage, $pageActu)
{

    global $db;

    $result = $db->query($req);

    $nbr_elem = $db->num_rows($result);

    $page = ceil($nbr_elem / $nb_elemPage);

    $n = ($pageActu + 1) * $nb_elemPage; //nombre des element depuis la 1er page jusqu'a la page actuel

    if ($nbr_elem > $n)

        $val[2] = $pageActu + 1; // bouton suivant

    if ($pageActu > 0)

        $val[3] = $pageActu - 1; // bouton pr�c�dent

    $val[0] = $page; //nombre de page

    $val[1] = $nbr_elem; // nombre d'element retourn� par la requette


    return $val;

}

// teste d'unicit�
function unique($table, $champ, $val)
{
    global $db;
    $SQLselect = "select * from " . $table . " where " . $champ . "='" . $val . "'";
    $n = $db->num_rows($db->query($SQLselect));
    if ($n == 0)
        return true;
    else
        return false;
}

// rajoute la fonction GetSQLValueString pour les requettes au cas ou elle n'est pas d�finie

if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")

    {
        global $db;


        $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($db->getLink(), $theValue) : mysqli_escape_string($db->getLink(), $theValue);


        switch ($theType) {

            case "text":

                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

                break;

            case "long":

            case "int":

                $theValue = ($theValue != "") ? intval($theValue) : "NULL";

                break;

            case "double":

                $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";

                break;

            case "date":

                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

                break;

            case "defined":

                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

                break;

        }

        return $theValue;

    }

}

// Export base de donn�es
function dumpMySQL($serveur, $login, $password, $base, $mode)
{
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);

    $entete = "-- ----------------------\n";
    $entete .= "-- dump de la base " . $base . " au " . date("d-M-Y") . "\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";

    $listeTables = mysql_query("show tables", $connexion);
    while ($table = mysql_fetch_array($listeTables)) {
        // si l'utilisateur a demand� la structure ou la totale
        if ($mode == 1 || $mode == 3) {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- creation de la table " . $table[0] . "\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table " . $table[0], $connexion);
            while ($creationTable = mysql_fetch_array($listeCreationsTables)) {
                $creations .= $creationTable[1] . ";\n\n";
            }
        }
        // si l'utilisateur a demand� les donn�es ou la totale
        if ($mode > 1) {
            $donnees = mysql_query("SELECT * FROM " . $table[0]);
            $insertions .= "-- -----------------------------\n";
            $insertions .= "-- insertions dans la table " . $table[0] . "\n";
            $insertions .= "-- -----------------------------\n";
            while ($nuplet = mysql_fetch_array($donnees)) {
                $insertions .= "INSERT INTO " . $table[0] . " VALUES(";
                for ($i = 0; $i < mysql_num_fields($donnees); $i++) {
                    if ($i != 0)
                        $insertions .= ", ";
                    if (mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                        $insertions .= "'";
                    $insertions .= addslashes($nuplet[$i]);
                    if (mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                        $insertions .= "'";
                }
                $insertions .= ");\n";
            }
            $insertions .= "\n";
        }
    }

    mysql_close($connexion);

    $fichierDump = fopen("dump/dump_" . date('d-m-Y') . ".sql", "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);

    echo '<div class="alert success">
        <span class="icon"></span>
        <strong>Succ&egrave;s! </strong>Sauvegarde r&eacute;alis&eacute;e avec succ&egrave;s !!
    </div>';
    echo "";
}

function show404Error($val)
{
    include_once($val . ".html");
}

function seo($path = "")
{

    global $db;
    $details = "Options +FollowSymlinks\r\nRewriteEngine on\r\n";

    if ($_SERVER["REMOTE_ADDR"] != "::1" && $_SERVER["REMOTE_ADDR"] != "127.0.0.1") {

        $details .=	'RewriteBase /new/
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]

# add a slashes at the end of the URL
RewriteCond %{REQUEST_URI} /+[^\.]+$
RewriteRule ^(.+[^/])$ %{REQUEST_URI}/ [R=301,L]

# https redirection
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# https to http redirection
# RewriteCond %{HTTPS} ^on$
# RewriteRule ^(.*)$ http://imzi-tours-travel.com/$1 [NC,L,R]

# remove double slashes from URL
RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s/{2,} [NC]
RewriteRule ^(.*) $1 [R=301,L]

RewriteCond %{REQUEST_URI} ^(.*)/{2,}(.*)$
RewriteRule . %1/%2 [R=301,L]

ErrorDocument 404 /404.php

# BEGIN Expire headers
<IfModule mod_expires.c>
 ExpiresActive On
 ExpiresDefault "access plus 1 month"
 ExpiresByType image/jpg "access plus 1 year"
 ExpiresByType image/jpeg "access plus 1 year"
 ExpiresByType image/png "access plus 1 year"
 AddType image/x-icon .ico
 ExpiresByType image/ico "access plus 1 year"
 ExpiresByType image/icon "access plus 1 year"
 ExpiresByType image/x-icon "access plus 1 year"
 ExpiresByType text/css "access plus 1 year"
 ExpiresByType text/javascript "access plus 1 year"
 ExpiresByType text/html "access plus 1 year"
 ExpiresByType application/xhtml+xml "access plus 1 year"
 ExpiresByType application/javascript "access plus 1 year"
 ExpiresByType application/x-javascript "access plus 1 year"
 ExpiresByType application/x-shockwave-flash "access plus 1 year"
</IfModule>
# END Expire headers

# MOD_DEFLATE COMPRESSION
SetOutputFilter DEFLATE
AddOutputFilterByType DEFLATE text/html text/css text/plain text/xml application/x-javascript application/x-httpd-php
#Pour les navigateurs incompatibles
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html
#ne pas mettre en cache si ces fichiers le sont déjà
SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png)$ no-gzip
#les proxies doivent donner le bon contenu
Header append Vary User-Agent env=!dont-vary
';
    }

    $urls = "";
    
    // Redirection old service link
    // $urls .= "RewriteRule ^service/seo-referencement-naturel/37/$ https://www.helloworld-agency.com/service/referencement-seo/ \n"; 
    // $urls .= "RewriteRule ^service/developpement-web-et-mobile/$ https://www.helloworld-agency.com/service/creation-de-sites-web/ \n";
    // $urls .= "RewriteRule ^service/marketing-d-influence/23/$ https://www.helloworld-agency.com/service/marketing-de-celebrites-et-d-influenceurs/ \n";
    // $urls .= "RewriteRule ^service/marketing-d-influence/$ https://www.helloworld-agency.com/service/marketing-de-celebrites-et-d-influenceurs/ \n";
    // $urls .= "RewriteRule ^service/developpement-web-et-mobile/25/$ https://www.helloworld-agency.com/service/creation-de-sites-web/ \n";
    
    
    $urls .= "RewriteRule ^service/seo-referencement-naturel/37/$ https://www.helloworld-agency.com/service/referencement-seo/ [R=301,L]\n"; 
    $urls .= "RewriteRule ^service/developpement-web-et-mobile/$ https://www.helloworld-agency.com/service/creation-de-sites-web/ [R=301,L]\n";
    $urls .= "RewriteRule ^service/marketing-d-influence/23/$ https://www.helloworld-agency.com/service/marketing-de-celebrites-et-d-influenceurs/ [R=301,L]\n";
    $urls .= "RewriteRule ^service/marketing-d-influence/$ https://www.helloworld-agency.com/service/marketing-de-celebrites-et-d-influenceurs/ [R=301,L]\n";
    $urls .= "RewriteRule ^service/developpement-web-et-mobile/25/$ https://www.helloworld-agency.com/service/creation-de-sites-web/ [R=301,L]\n";


    $ids_modules_url = module::findAllUrl();
    $ids_langues = langue::findAll();
    foreach ($ids_modules_url as $id_module) {
        $m = new module($id_module, $db);
        $classe = $m->getClasse();
        if ($id_module == "com_page") {
            $ids_items = $classe::findAll();
            foreach ($ids_items as $id_item) {
                foreach ($ids_langues as $id_langue) {
                    $l = new langue($id_langue, $db);
                    $obj = new $classe($id_item, $db, $l->getCode());
                    $urls .= $obj->getSeo($l->getId());
                }
            }
        } else {
            $urls .= $classe::getSeo();
        }
    }

    //URL réinitialisation du mot de passe
    //if (module::exists("com_client")) {
        $urls .= "RewriteRule ^resetpassword/([a-zA-Z0-9_=-]+)/$ index.php?option=com_client&task=resetPassword&code=$1" . " [L]\n";
		$urls .= "RewriteRule ^enableaccount/([a-zA-Z0-9_=-]+)/$ index.php?option=com_client&task=enableAccount&code=$1" . " [L]\n";
        $urls .= "RewriteRule ^create-a-new-password/([^/]+)/([^/]+)/$ index.php?option=com_client&task=createNewPassword&email=$1&token=$2" . " [L]\n";
    //}

    //Url des Langues
    foreach ($ids_langues as $id) {
        $lg = new langue($id, $db);
        if ($lg->isDefault()) {
            $urls .= "RewriteRule ^$ index.php?l=" . $lg->getCode() . " [L]\n";
        } else {
            $urls .= "RewriteRule ^" . $lg->getCode() . "/$ index.php?l=" . $lg->getCode() . " [L]\n";
        }
    }

    $cf = "../../../../.htaccess";

    if ($path != "") {
        $cf = "../.htaccess";
    }

    $fp = @fopen($cf, "w");
    if ($fp) {
        fputs($fp, $details . $urls);
        fclose($fp);
    }

}

// Supprimer récurssivement un dossier
function rmdir_recursive($dir)
{
    foreach (scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}

// Copier récurssivement un dossier
function copy_recursive($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copy_recursive($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function generateSlug($string) {
    // Define a mapping of special characters to their normal counterparts
    $specialCharacters = array(
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'AE', 'Ç'=>'C',
        'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I',
        'Ð'=>'D', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O',
        'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'ß'=>'s',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'ae', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i',
        'ð'=>'d', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o',
        'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ÿ'=>'y',
        'Ŕ'=>'R', 'ŕ'=>'r'
    );

    // Replace special characters with their normal counterparts
    $string = strtr($string, $specialCharacters);
    
    // Remove all characters that are not alphanumeric or hyphens
    $string = preg_replace('/[^A-Za-z0-9-]+/', '-',$string);

    // Replace any remaining non-alphanumeric characters with hyphens
    $string = str_replace(' ','-',$string);

    // Remove any consecutive hyphens
    $string = preg_replace('/-+/', '-', $string);

    // Remove hyphens at the beginning and end
    return strtolower(rtrim($string, '-'));
}

?>