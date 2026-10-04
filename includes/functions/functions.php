<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function isHome(){
    if(!isset($_GET['option']) || (isset($_GET['option']) && $_GET['option'] == 'com_frontpage'))
        return true;
    else
        return false;
}

function isProduct(){
    if(isset($_GET['option']) && $_GET['option'] == 'com_produit')
        return true;
    else
        return false;
}
function isAgence(){
    if(isset($_GET['option']) && $_GET['option'] == 'com_agence')
        return true;
    else
        return false;
}

function isClientSpace(){
    if(isset($_GET['option']) && $_GET['option'] == 'com_client')
        return true;
    else
        return false;
}

function getSeoMeta($data){
	global $db, $siteURL;
	$config = new config($db, $_SESSION['lang']);
	$seoTitle = $config->getTitre();
	$seoDescription = $config->getDescription();
	$seoKeywords = "Hello World Maroc, agence digitale Maroc, marketing digital Marrakech, création de sites web Maroc, SEO Maroc, publicité en ligne, réseaux sociaux Maroc, développement mobile, branding et design graphique, stratégie digitale, web design, e-commerce Maroc, marketing d'influence, optimisation SEO, campagnes publicitaires Google, gestion des réseaux sociaux, communication digitale, marketing B2B Maroc, marketing B2C Maroc";
	$canonical = ($_SESSION['lang'] == langue::getDefaultLanguage()) ? $siteURL : $siteURL . $_SESSION['lang'] . '/';
	$ogImage = $siteURL . "images/config/" . $config->getLogo();
	if($data != NULL){
		if(isset($data['option']) && !empty($data['option'])){
			$option = $data['option'];
			switch($option){
				// Pages CMS	
				case 'com_page' : 
				case 'com_job' :	
				case 'com_about' : 
			    case 'com_client' : 
				case 'com_video' : 	
					if(isset($data['id']) && !empty($data['id'])){
						$id = intval($data['id']);
						$page = new page($id, $db, $_SESSION["lang"]);
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}
					break;				
				// Page Contact/Devis	
				case 'com_contact' : 
					if(isset($data['task']) && !empty($data['task'])){
						$page = getComponent("com_contact&task=".$data['task']);
					}else{
						$page = getComponent("com_contact");
					}
					$seoTitle = $page->getSeoTitre();
					$seoDescription = $page->getSeoDescription();
					$canonical = $page->getLink();
					break;
					case 'com_agence' : 
					if(isset($data['task']) && !empty($data['task'])){
						$page = getComponent("com_agence&task=".$data['task']);
					}else{
						$page = getComponent("com_agence");
					}
					$seoTitle = $page->getSeoTitre();
					$seoDescription = $page->getSeoDescription();
					$canonical = $page->getLink();
					break;
				// Page référence	
				case 'com_reference' : 
					if(isset($data['id']) && !empty($data['id']) && isset($data['task'])){
						$id = intval($data['id']);
						$reference = reference::find($id, $_SESSION["lang"]);
						$seoTitle = 'Nos références : '.$reference->getNomClient();
						$seoDescription = $reference->getExtrait();
						$canonical = $reference->getLink();
						$ogTitle =  $reference->getNomClient();
						$ogImage = $siteURL . 'images/references/' . $reference->getPhoto();
					}else{
						$page = getComponent("com_reference");
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}
					break;
				// Page produits	
				case 'com_produit' : 
					if(isset($data['id']) && !empty($data['id']) && isset($data['task'])){
					    $id = intval($data['id']);
					    if($data['task'] == 'showCategorie'){
					        $catProduit = categorie_produit::find($id, $_SESSION["lang"]);
    						$seoTitle = $catProduit->getSeoTitre();
    						$seoDescription = $catProduit->getSeoDescription();
    						$canonical = $catProduit->getLink();
					    }else{
    						$produit = produit::find($id, $_SESSION["lang"]);
    						$seoTitle = $produit->getSeoTitre();
    						$seoDescription = $produit->getSeoDescription();
    						$canonical = $produit->getLink();
    						$ogTitle =  $produit->getTitre();
					    }
					}else{
						$page = getComponent("com_produit");
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}
					break;	
				// Page service	
				case 'com_service' : 
					if(isset($data['id']) && !empty($data['id']) && isset($data['task'])){
						$id = intval($data['id']);
						$service = service::find($id, $_SESSION["lang"]);
						$seoTitle = $service->getSeoTitre();
						$seoDescription = $service->getSeoDescription();
						$canonical = $service->getLink();
					}elseif(isset($data['slug']) && !empty($data['slug']) && isset($data['task'])){
					    
						$slug = $data['slug'];
						$service = service::findBySlug($slug, $_SESSION["lang"]);
						if(!$service->getId()){
							$service = service::findBySlug($slug, langue::getDefaultLanguage());
						}
						$seoTitle = $service->getSeoTitre();
						$seoDescription = $service->getSeoDescription();
						$seoKeywords = $service->getSeoKeyword();
						$canonical = $service->getLink();
						$ogTitle =  $service->getTitre();
						$ogDescription = $service->getTexteAccueil();
						$ogImage = $siteURL . 'images/services/' . $service->getPhoto();
					}else{
						$page = getComponent("com_service");
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}
					break;
				// Page Agents IA
				case 'com_agents_ia' :
					if(isset($data['task']) && $data['task'] == 'showDetails' && isset($data['slug']) && !empty($data['slug'])){
						$agent_ia = agent_ia::findBySlug($data['slug'], $_SESSION['lang']);
						if($agent_ia){
							$seoTitle = $agent_ia->getSeoTitre();
							$seoDescription = $agent_ia->getSeoDescription();
							$canonical = $agent_ia->getLink();
							$ogTitle = $agent_ia->getTitre();
						}
					}else{
						$page = getComponent("com_agents_ia");
						if($page){
							$seoTitle = $page->getSeoTitre();
							$seoDescription = $page->getSeoDescription();
							$canonical = $page->getLink();
						}
					}
					break;
				// Page Secteurs
				case 'com_secteur' :
					if(isset($data['task']) && $data['task'] == 'showDetails' && isset($data['slug']) && !empty($data['slug'])){
						$secteur = secteur::findBySlug($data['slug'], $_SESSION['lang']);
						if($secteur){
							$seoTitle = $secteur->getSeoTitre();
							$seoDescription = $secteur->getSeoDescription();
							$canonical = $secteur->getLink();
							$ogTitle = $secteur->getTitre();
						}
					}
					break;
				// Page Formations (Hello World Academy)
				case 'com_formation' :
					if(isset($data['task']) && $data['task'] == 'showDetails' && isset($data['slug']) && !empty($data['slug'])){
						$formation = formation::findBySlug($data['slug'], $_SESSION['lang']);
						if($formation){
							$seoTitle = $formation->getSeoTitre();
							$seoDescription = $formation->getSeoDescription();
							$canonical = $formation->getLink();
							$ogTitle = $formation->getTitre();
						}
					}else{
						$page = getComponent("com_formation");
						if($page){
							$seoTitle = $page->getSeoTitre();
							$seoDescription = $page->getSeoDescription();
							$canonical = $page->getLink();
						}
					}
					break;
				// Page Blog
				case 'com_blog' :
					if(isset($data['id']) && !empty($data['id']) && isset($data['task'])){
						$id = intval($data['id']);
						$blog = blog::find($id, $_SESSION["lang"]);
						$seoTitle = $blog->getSeoTitre();
						$seoDescription = $blog->getSeoDescription();
						$canonical = $blog->getLink();
					}elseif(isset($data['slug']) && !empty($data['slug']) && isset($data['task'])){
					    $slug = $data['slug'];
					    if($data['task'] == 'categorie'){
					        $categorie = categorie::findBySlug($slug, $_SESSION["lang"]);
    						$seoTitle = $categorie->getSeoTitre();
    						$seoDescription = $categorie->getSeoDescription();
    						$canonical = $categorie->getLink();
    						$ogTitle =  $categorie->getTitre();
						    $ogDescription = $categorie->getSeoDescription();
    					
					    }else{
    						$blog = blog::findBySlug($slug, $_SESSION["lang"]);
    						$seoTitle = $blog->getSeoTitre();
    						$seoDescription = $blog->getSeoDescription();
    						$canonical = $blog->getLink();
    						$ogTitle =  $blog->getTitre();
						    $ogDescription = $blog->getSeoDescription();
						    $ogImage = $siteURL . 'images/blog/' . $blog->getPhoto();
					    }
					}elseif(isset($data['cat']) && !empty($data['cat'])){
						$page = getComponent("com_blog&cat=".$data['cat']);
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}else{
						$page = getComponent("com_blog");
						$seoTitle = $page->getSeoTitre();
						$seoDescription = $page->getSeoDescription();
						$canonical = $page->getLink();
					}
					break;	
			}
		}
	}

// Fallback si les variables OG ne sont pas définies
$ogTitleFinal = !empty($ogTitle) ? $ogTitle : $seoTitle;
$ogDescriptionFinal = !empty($ogDescription) ? $ogDescription : $seoDescription;
$ogImageFinal = !empty($ogImage) ? $ogImage : $siteURL . 'images/config/' . $config->getLogo();

echo '<title>' . htmlspecialchars($seoTitle) . '</title>
<meta name="description" content="' . htmlspecialchars(mb_substr($seoDescription, 0, 160, 'UTF-8')) . '">
<meta name="keywords" content="' . htmlspecialchars($seoKeywords) . '">
<meta name="robots" content="index, follow">
<link rel="canonical" href="'.$canonical.'">

<meta property="og:title" content="' . htmlspecialchars($ogTitleFinal) . '" />
<meta property="og:type" content="website" />
<meta property="og:image" content="' . htmlspecialchars($ogImageFinal) . '" />
<meta property="og:site_name" content="' . htmlspecialchars($config->getNom()) . '" />
<meta property="og:description" content="' . htmlspecialchars($ogDescriptionFinal) . '" />';

}

function short_name($str, $limit)
{
    if ($limit < 3) $limit = 3;

    if (strlen($str) > $limit) {
    	$str = substr($str, 0, strpos(wordwrap($str, $limit), "\
"));
    }

    return $str;
}

function curl_get_file_contents($URL){
	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$contents = curl_exec($c);
	curl_close($c);

	if ($contents) return $contents;
	else return FALSE;
}

function dateToMktime($date, $h = 0){

    if ($date != ""){

        $tDate = explode("/",$date);

        $mktime = mktime($h, 0, 0, $tDate[1], $tDate[0], $tDate[2]);

    }else{

        $mktime = "";

    }

    return $mktime;

}

// date entre deux date
function isBetween($date,$from,$to){
    $day = new DateTime($date); // Today
    $DateBegin = new DateTime($from);
    $DateEnd  = new DateTime($to);
    if(
        $day->getTimestamp() >= $DateBegin->getTimestamp() &&
        $day->getTimestamp() <= $DateEnd->getTimestamp()){
        return true;
    }
    else
        return false;
}

// converti un mktimeen une date au format jj/mm/aaaa
function mktimeToDate($mktime){

    if ($mktime != ""){

        $date = date("d/m/Y", $mktime);

    }else{

        $date = "";

    }

    return $date;

}
// converti une date au format date sql
function dateBD($date){
    $d = explode("/",$date);
    return $d[2].'-'.$d[1].'-'.$d[0];
}

// converti une date en une date jj/mm/an
function normaldate($date){
    $date = explode('-',$date);
    $result=$date[2].'/'.$date[1].'/'.$date[0];
    return $result;
}

// converti une date BD en une date jj/mm/an hh:mm
function normaldatetime($date){
    $t = explode(" ",$date);
    $result = normaldate($t[0]).' '.substr($t[1],0,5);
    return $result;
}

function normaldate2($date){
    $date = explode('-',$date);
    switch ($date[1]){
        case '01': $mois='Janvier'; break;
        case '02': $mois='F&eacute;vrier'; break;
        case '03': $mois='Mars'; break;
        case '04': $mois='Avril'; break;
        case '05': $mois='Mai'; break;
        case '06': $mois='Juin'; break;
        case '07': $mois='Juillet'; break;
        case '08': $mois='Ao&ucirc;t'; break;
        case '09': $mois='Septembre'; break;
        case '10': $mois='Octobre'; break;
        case '11': $mois='Novembre'; break;
        case '12': $mois='D&eacute;cembre'; break;
    }
    $result=$date[2].' '.$mois.' '.$date[0];
    return $result;
}

function monthFromNumber($n){
    switch ($n){
        case '01': $mois='Janvier'; break;
        case '02': $mois='F&eacute;vrier'; break;
        case '03': $mois='Mars'; break;
        case '04': $mois='Avril'; break;
        case '05': $mois='Mai'; break;
        case '06': $mois='Juin'; break;
        case '07': $mois='Juillet'; break;
        case '08': $mois='Ao&ucirc;t'; break;
        case '09': $mois='Septembre'; break;
        case '10': $mois='Octobre'; break;
        case '11': $mois='Novembre'; break;
        case '12': $mois='D&eacute;cembre'; break;
        default : $mois = '';
    }
    return $mois;
}

function monthFromNumberLang($n, $lang){
    switch($lang){
        case "fr":
            switch ($n){
                case '01': $mois='Janvier'; break;
                case '02': $mois='F&eacute;vrier'; break;
                case '03': $mois='Mars'; break;
                case '04': $mois='Avril'; break;
                case '05': $mois='Mai'; break;
                case '06': $mois='Juin'; break;
                case '07': $mois='Juillet'; break;
                case '08': $mois='Ao&ucirc;t'; break;
                case '09': $mois='Septembre'; break;
                case '10': $mois='Octobre'; break;
                case '11': $mois='Novembre'; break;
                case '12': $mois='D&eacute;cembre'; break;
                default : $mois = '';
            }
            break;
        case "en":
            switch ($n){
                case '01': $mois='January'; break;
                case '02': $mois='February'; break;
                case '03': $mois='March'; break;
                case '04': $mois='April'; break;
                case '05': $mois='May'; break;
                case '06': $mois='June'; break;
                case '07': $mois='July'; break;
                case '08': $mois='August'; break;
                case '09': $mois='September'; break;
                case '10': $mois='October'; break;
                case '11': $mois='November'; break;
                case '12': $mois='Decembrer'; break;
                default : $mois = '';
            }
            break;
        case "es":
            switch ($n){
                case '01': $mois='Enero'; break;
                case '02': $mois='Febrero'; break;
                case '03': $mois='Marzo'; break;
                case '04': $mois='Abril'; break;
                case '05': $mois='Mayo'; break;
                case '06': $mois='Junio'; break;
                case '07': $mois='Julio'; break;
                case '08': $mois='Agosto'; break;
                case '09': $mois='Septiembre'; break;
                case '10': $mois='Octubre'; break;
                case '11': $mois='Noviembre'; break;
                case '12': $mois='Diciembre'; break;
                default : $mois = '';
            }
            break;
        case "de":
            switch ($n){
                case '01': $mois='Januar'; break;
                case '02': $mois='Februar'; break;
                case '03': $mois='Mars'; break;
                case '04': $mois='April'; break;
                case '05': $mois='Mai'; break;
                case '06': $mois='Juni'; break;
                case '07': $mois='Juli'; break;
                case '08': $mois='August'; break;
                case '09': $mois='September'; break;
                case '10': $mois='Oktober'; break;
                case '11': $mois='November'; break;
                case '12': $mois='Dezember'; break;
                default : $mois = '';
            }
            break;
        case "it":
            switch ($n){
                case '01': $mois='Gennaio'; break;
                case '02': $mois='Febbraio'; break;
                case '03': $mois='Marte'; break;
                case '04': $mois='Aprile'; break;
                case '05': $mois='Maggio'; break;
                case '06': $mois='Giugno'; break;
                case '07': $mois='Luglio'; break;
                case '08': $mois='Agosto'; break;
                case '09': $mois='Settembre'; break;
                case '10': $mois='Ottobre'; break;
                case '11': $mois='Novembre'; break;
                case '12': $mois='Dicembre'; break;
                default : $mois = '';
            }
            break;
    }

    return $mois;
}

function url_rewriting($str) {
    $str = str_replace('&', 'et', $str);

    // On convertit la cha�ne en UTF-8 si besoin est.
    if($str !== mb_convert_encoding(mb_convert_encoding($str,'UTF-32','UTF-8'),'UTF-8','UTF-32')) {
        $str = mb_convert_encoding($str,'UTF-8');
    }

    $str = htmlentities($str, ENT_NOQUOTES ,'UTF-8');

    // Quelques entit�s � remplacer par les lettres correspondantes.
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i','$1',$str);

    $str = preg_replace('`[^\pL\pN]+`u','-',$str);
    return strtolower(trim($str,'-'));
}

// retourn un tableau avec les noms des images upload�es

function uploadFiles($nomChampTxt, $uploadTo, $extensions = NULL){

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



                // Pour �viter d'�craser l'ancien en cas de doublon

                $n="";

                while(file_exists("$racine/$nom_fichier$n.$ext")) $n++;

                $nom_fichier="$nom_fichier$n.$ext";

                $nom_fichier=str_replace(" ","_",$nom_fichier);

                $nom_fichier=strtr($nom_fichier,'A��A�A�E�E�I��IO��O�U�U��a��a�a�e�e�i��io��o�u�u��y','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiiooooouuuuyy');

                $nom_fichier = strtolower($nom_fichier);

                $fichiers[] = $nom_fichier;

                // Fin de l'upload

                if (@move_uploaded_file($_FILES[$nomChampTxt]["tmp_name"][$i], "$racine/$nom_fichier")){

                    @chmod("$racine/$nom_fichier", 0777);

                } else {

                    echo "Erreur, impossible d'envoyer le fichier <i>$nom_fichier</i><br>\n";

                }

            }

        }



    }

    return @$fichiers;

}

//G�n�rer une chaine de caract�re unique et al�atoire

function random($car) {
    $string = "";
    $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime()*1000000);
    for($i=0; $i<$car; $i++) {
        $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
}


// redimentionnement d'images

function redimage($img_src,$img_dest,$dst_w,$dst_h) {

    // Lit les dimensions de l'image

    $size = GetImageSize($img_src);

    $krms_w = $size[0]; $krms_h = $size[1];

    // Teste les dimensions tenant dans la zone

    $test_h = round(($dst_w / $krms_w) * $krms_h);

    $test_w = round(($dst_h / $krms_h) * $krms_w);

    // Si Height final non pr�cis� (0)

    if(!$dst_h) $dst_h = $test_h;

    // Sinon si Width final non pr�cis� (0)

    elseif(!$dst_w) $dst_w = $test_w;

    // Sinon teste quel redimensionnement tient dans la zone

    elseif($test_h>$dst_h) $dst_w = $test_w;

    else $dst_h = $test_h;



    // La vignette existe ?

    $test = (file_exists($img_dest));

    // L'original a �t� modifi� ?

    if($test)

        $test = (filemtime($img_dest)>filemtime($img_src));

    // Les dimensions de la vignette sont correctes ?

    if($test) {

        $size2 = GetImageSize($img_dest);

        $test = ($size2[0]==$dst_w);

        $test = ($size2[1]==$dst_h);

    }



    // Cr�er la vignette ?

    if(!$test) {

        // Cr�e une image vierge aux bonnes dimensions

        // $dst_im = ImageCreate($dst_w,$dst_h);

        $dst_im = ImageCreateTrueColor($dst_w,$dst_h);

        // Copie dedans l'image initiale redimensionn�e

        $krms_im = ImageCreateFromJpeg($img_src);

        // ImageCopyResized($dst_im,$krms_im,0,0,0,0,$dst_w,$dst_h,$krms_w,$krms_h);

        ImageCopyResampled($dst_im,$krms_im,0,0,0,0,$dst_w,$dst_h,$krms_w,$krms_h);

        // Sauve la nouvelle image

        ImageJpeg($dst_im,$img_dest);

        // D�truis les tampons

        ImageDestroy($dst_im);

        ImageDestroy($krms_im);

    }



    // Affiche le descritif de la vignette echo "SRC='".$img_dest."?t=".time()."' WIDTH=".$dst_w." HEIGHT=".$dst_h;

}





// retourn les valeur necessaire pour la pagination

function pagination($req,$nb_elemPage,$pageActu)

{
    global $db;
    $result = $db->query($req);

    $nbr_elem = $db->num_rows($result);
    if($nbr_elem == 0)
        return 0;
    else{
        $page = ceil($nbr_elem / $nb_elemPage);

        $n=($pageActu+1)*$nb_elemPage; //nombre des element depuis la 1er page jusqu'a la page actuel

        if($nbr_elem > $n)

            $val[2]=$pageActu+1; // bouton suivant

        if($pageActu > 1)

            $val[3]=$pageActu-1; // bouton pr�c�dent

        $val[0]=$page; //nombre de page

        $val[1]=$nbr_elem; // nombre d'element retourn� par la requette


    }
    return $val;

}

// teste d'unicit�
function unique($table, $champ, $val, $claus = ''){
    global $db;
    $SQLselect = "SELECT * FROM ".$table." WHERE ".$champ."=".GetSQLValueString($val, "text")." $claus";
    $n = $db->num_rows($db->query($SQLselect));
    if($n == 0)
        return true;
    else
        return false;
}

// lien des composants
function getComponentLink($component){
    global $db;
    $langue = $_SESSION['lang'];
    $SQLselect = "SELECT DISTINCT(id_page) FROM ".__prefixe_db__."details_page WHERE externe = ".GetSQLValueString("index.php?option=".$component, "text")." AND langue = ".GetSQLValueString($langue, "text")." LIMIT 0,1";
    $result = $db->query($SQLselect);
    if($db->num_rows($result) != 1 && $langue != langue::getDefaultLanguage()){
        // Pas encore de traduction de cette page pour cette langue : on retombe sur la langue par défaut.
        $langue = langue::getDefaultLanguage();
        $SQLselect = "SELECT DISTINCT(id_page) FROM ".__prefixe_db__."details_page WHERE externe = ".GetSQLValueString("index.php?option=".$component, "text")." AND langue = ".GetSQLValueString($langue, "text")." LIMIT 0,1";
        $result = $db->query($SQLselect);
    }
    if($db->num_rows($result) == 1){
        $data = $db->fetch_array($result);
        $p = new page($data['id_page'],$db,$langue);
        return $p->getLink();
    }
    else
        return 'index.php?option='.$component;
}

// page des composants
function getComponent($component){
    global $db;
    $langue = $_SESSION['lang'];
    $SQLselect = "SELECT DISTINCT(id_page) FROM ".__prefixe_db__."details_page WHERE externe = ".GetSQLValueString("index.php?option=".$component, "text")." AND langue = ".GetSQLValueString($langue, "text")." LIMIT 0,1";
    $result = $db->query($SQLselect);
    if($db->num_rows($result) != 1 && $langue != langue::getDefaultLanguage()){
        // Pas encore de traduction de cette page pour cette langue : on retombe sur la langue par défaut.
        $langue = langue::getDefaultLanguage();
        $SQLselect = "SELECT DISTINCT(id_page) FROM ".__prefixe_db__."details_page WHERE externe = ".GetSQLValueString("index.php?option=".$component, "text")." AND langue = ".GetSQLValueString($langue, "text")." LIMIT 0,1";
        $result = $db->query($SQLselect);
    }
    if($db->num_rows($result) == 1){
        $data = $db->fetch_array($result);
        $p = new page($data['id_page'],$db,$langue);
        return $p;
    }
    else
        return NULL;
}

// Nombre de jours entre deux dates
function getNbrJour($date1, $date2, $h1 = 0, $h2 = 0){

    $d1 = dateToMktime($date1, $h1);
    $d2 = dateToMktime($date2, $h2);
    $dateDiff = $d2 - $d1;
    $fullDays = floor($dateDiff/(60*60*24));
    $fullHours = floor(($dateDiff-($fullDays*60*60*24))/(60*60));
    //if($fullHours > 3) $fullDays++; // si l'heure de retour depasse l'heure de livraison de plus de 3heures (jour sup)
    return array($fullDays,$fullHours);
}

// rajoute la fonction GetSQLValueString pour les requettes au cas ou elle n'est pas d�finie

if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")

    {
        global $db;
        //$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;



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



// Vraie 404 depuis un composant : statut 404, tampons vides, page d'erreur, arret.
// Sans cela une URL de contenu inexistant repond 200 (soft 404) ou 500.
function sendHttp404AndExit(){

    if (!headers_sent()) {
        http_response_code(404);
    }

    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    $errorPage = dirname(dirname(__DIR__)) . '/404.php';
    if (file_exists($errorPage)) {
        include($errorPage);
    }

    exit;
}

// Lien de repli d'un contenu qui n'a pas de traduction dans la langue courante : sa version en langue par
// defaut. Avant, ces classes renvoyaient "index.php?option=...", une URL relative qui, ajoutee au chemin de la
// page en cours, donnait un 404 (ex. /en/produits/index.php?option=com_produit&id=7). Si la version par defaut
// n'existe pas non plus, on retombe sur l'accueil.
function hwDefaultLangLink($class, $id){
    global $siteURL;
    static $busy = false;
    if ($busy || !class_exists($class) || !method_exists($class, 'find')) { return $siteURL; }
    $busy = true;
    $link = $siteURL;
    $row = call_user_func(array($class, 'find'), $id, langue::getDefaultLanguage());
    if ($row && method_exists($row, 'getLink')) {
        $l = $row->getLink();
        if (is_string($l) && $l !== '' && strpos($l, 'index.php') !== 0) { $link = $l; }
    }
    $busy = false;
    return $link;
}

// Version redimensionnee d'une image donnee par son URL complete. Si l'URL n'est pas une image du site
// (externe, vide, deja une miniature), elle est rendue telle quelle. Sert au menu : ses vignettes de 41 px
// et ses cartes de 294 px chargeaient sur chaque page les images d'origine, jusqu'a 1800 px de large.
function hwSizedImage($url, $width){
    global $siteURL;
    $url = (string) $url;
    if ($url === '' || strpos($url, $siteURL) !== 0) { return $url; }
    $rel = substr($url, strlen($siteURL));
    $rel = rawurldecode(strtok($rel, '?'));
    return hwThumb($rel, $width);
}

// Version redimensionnee d'une image du site, en WebP, creee a la demande et gardee en cache.
// $rel est le chemin relatif a la racine du site (ex. images/galerie/photo.png). Retourne l'URL de la
// miniature, ou celle de l'original si la miniature ne peut pas etre produite (fichier absent,
// extension GD WebP manquante, memoire insuffisante, dossier de cache non inscriptible) : la page
// reste correcte dans tous les cas. Les images televersees depuis le back-office ne sont pas dans Git
// et peuvent peser plusieurs Mo : c'est ce qui rend ce passage necessaire.
function hwThumb($rel, $width = 640){
    global $siteURL;
    $rel = ltrim((string) $rel, '/');
    $orig = $siteURL . implode('/', array_map('rawurlencode', explode('/', $rel)));
    if (strpos($rel, '..') !== false || !preg_match('#^images/.+\.(jpe?g|png|webp)$#i', $rel)) { return $orig; }
    $root = dirname(dirname(__DIR__));
    $src = $root . '/' . $rel;
    if (!is_file($src)) { return $orig; }
    $dir = $root . '/images/_cache';
    // WebP si l'extension GD le permet, sinon JPEG (une image PNG avec transparence reste alors telle quelle)
    $useWebp = function_exists('imagewebp');
    $ext = $useWebp ? 'webp' : 'jpg';
    $name = substr(sha1($rel), 0, 16) . '-' . (int) $width . '.' . $ext;
    $dst = $dir . '/' . $name;
    $url = $siteURL . 'images/_cache/' . $name;
    if (is_file($dst) && filemtime($dst) >= filemtime($src)) { return $url; }
    if (!function_exists('imagescale') || (!is_dir($dir) && !@mkdir($dir, 0755, true)) || !is_writable($dir)) { return $orig; }
    $info = @getimagesize($src);
    if (!$info || $info[0] < 1) { return $orig; }
    if ($info[0] <= $width) { return $orig; }
    if (!$useWebp && $info[2] == IMAGETYPE_PNG && ord((string) file_get_contents($src, false, null, 25, 1)) >= 4) { return $orig; }
    // memoire necessaire pour decoder : ~5 octets par pixel ; on garde une marge
    $limit = trim(ini_get('memory_limit')); $bytes = (int) $limit;
    if (stripos($limit, 'g') !== false) { $bytes *= 1073741824; } elseif (stripos($limit, 'm') !== false) { $bytes *= 1048576; } elseif (stripos($limit, 'k') !== false) { $bytes *= 1024; }
    if ($bytes > 0 && $info[0] * $info[1] * 5 > $bytes * 0.6) { return $orig; }
    // Toute erreur (fonction GD absente, image corrompue, memoire) laisse l'image d'origine : une page ne doit jamais tomber a cause d'une miniature.
    try {
        if ($info[2] == IMAGETYPE_PNG && function_exists('imagecreatefrompng')) { $img = @imagecreatefrompng($src); }
        elseif ($info[2] == IMAGETYPE_JPEG && function_exists('imagecreatefromjpeg')) { $img = @imagecreatefromjpeg($src); }
        elseif ($info[2] == IMAGETYPE_WEBP && function_exists('imagecreatefromwebp')) { $img = @imagecreatefromwebp($src); }
        else { $img = false; }
    } catch (\Throwable $e) { $img = false; }
    if (!$img) { return $orig; }
    if ($info[2] == IMAGETYPE_JPEG && function_exists('exif_read_data')) {
        $exif = @exif_read_data($src);
        $o = isset($exif['Orientation']) ? (int) $exif['Orientation'] : 1;
        if ($o == 3) { $img = imagerotate($img, 180, 0); } elseif ($o == 6) { $img = imagerotate($img, -90, 0); } elseif ($o == 8) { $img = imagerotate($img, 90, 0); }
    }
    $small = imagescale($img, (int) $width, -1, IMG_BICUBIC);
    imagedestroy($img);
    if (!$small) { return $orig; }
    imagepalettetotruecolor($small); imagealphablending($small, false); imagesavealpha($small, true);
    $tmp = $dst . '.' . getmypid() . '.tmp';
    if ($useWebp) { $ok = @imagewebp($small, $tmp, 82); } else { $ok = @imagejpeg($small, $tmp, 82); }
    imagedestroy($small);
    if (!$ok || !@rename($tmp, $dst)) { @unlink($tmp); return $orig; }
    return $url;
}

// Video de fond du bandeau "Demarrer votre projet" (4 Mo, reconnue a son affiche hw-academy-cta-poster) : elle se telechargeait des l'ouverture de la page
// (autoplay + preload="auto") alors qu'elle se trouve tout en bas. On retire autoplay et on passe preload a "none" ;
// un petit script (voir includes/template.php) la lance quand le visiteur s'en approche. Sans JavaScript,
// l'affiche reste affichee.
function hwLazyVideos($html){
    return preg_replace_callback('#<video\b[^>]*hw-academy-cta-poster[^>]*>#i', function ($m) {
        $tag = preg_replace('#\sautoplay(?:="[^"]*")?#i', '', $m[0]);
        $tag = preg_replace('#\bpreload="[^"]*"#i', 'preload="none"', $tag);
        if (stripos($tag, 'preload=') === false) { $tag = preg_replace('#>$#', ' preload="none">', $tag); }
        return preg_replace('#>$#', ' data-hw-autoplay>', $tag);
    }, $html);
}

// Chargement paresseux des images du contenu de la page.
// Ajoute loading="lazy" decoding="async" aux <img> qui n'ont pas deja un attribut loading, sauf les
// premieres (au-dessus de la ligne de flottaison, pour ne pas retarder l'affichage). Les blocs
// <script>, <style>, <noscript> et les commentaires ne sont pas touches : une balise <img> y est
// souvent une chaine JavaScript, et y inserer des guillemets casserait le script. Les pages qui
// utilisent Isotope (galeries en mosaique, positionnees d'apres la taille des images) sont laissees telles quelles.
function hwLazyImages($html, $skipFirst = 2){
    if (stripos($html, 'cs-isotop') !== false || stripos($html, 'isotope') !== false) {
        return $html;
    }
    $parts = preg_split('#(<script\b.*?</script>|<style\b.*?</style>|<noscript\b.*?</noscript>|<!--.*?-->)#is', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    if ($parts === false) { return $html; }
    $seen = 0;
    foreach ($parts as $i => $part) {
        if ($i % 2 === 1) { continue; }
        $parts[$i] = preg_replace_callback('#<img\b[^>]*>#i', function ($m) use (&$seen, $skipFirst) {
            $seen++;
            $tag = $m[0];
            if ($seen <= $skipFirst) { return $tag; }
            if (preg_match('#\bloading\s*=#i', $tag) || preg_match('#\bfetchpriority\s*=\s*["\']?high#i', $tag)) { return $tag; }
            $add = ' loading="lazy"';
            if (!preg_match('#\bdecoding\s*=#i', $tag)) { $add .= ' decoding="async"'; }
            return preg_replace('#\s*/?>$#', $add . '$0', $tag, 1);
        }, $part);
    }
    return implode('', $parts);
}

function show404Error($val){

    include_once($val.".html");

}

function isValidDate($dateString, $format = 'Y-m-d') {
    // Create a DateTime object from the date string
    $date = DateTime::createFromFormat($format, $dateString);
    
    // Check if the date is valid and matches the expected format
    return $date && $date->format($format) === $dateString;
}
?>