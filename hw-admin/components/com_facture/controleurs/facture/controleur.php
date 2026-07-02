<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case 'addFacture':
            addFacture($_POST);
            break;
        case 'editFacture':
            editFacture($_POST);
            break;
        case 'deleteFacture':
            deleteFacture($_POST);
            break;
        case "getRowFacture":
            getRowFacture();
            break;
		case 'removeItemFacture':
            removeItemFacture($_POST);
            break;
		case 'customItemFacture':
            customItemFacture($_POST);
            break;
		case 'editItemFacture':
            editItemFacture($_POST);
            break;
		case 'getServicePrice':
            getServicePrice($_POST);
            break;	
		case 'pdfFacture':
            pdfFacture($_GET);
            break;	
    }
}

function getServicePrice($data){
	$indices = array("id");
    if (fieldCheck($data, $indices)) {
		$service = service::find($data["id"]);
		$price = $service->getPrix();
		
		if(isset($data['id_item']) && !empty($data['id_item'])){
			$item_facture = item_facture::find($data['id_item']);
			$price = $item_facture->getPrix();
		}
		
		echo $price;
	}
}
function addFacture($data)
{
    $indices = array("client");
    if (fieldCheck($data, $indices)) {
        if (buildFacture($data)->add() == 1) {
			// Ajout des lignes facture
			$id_facture = facture::getLastId();
			$facture = facture::find($id_facture);
			
			if(isset($data["id_service"]) && !empty($data["id_service"])){
				$cpt = 0;
				foreach($data["id_service"] as $id_service){
					$service = service::find($id_service);
					$item_facture = new item_facture();
					$item_facture->setFacture($facture);
					$item_facture->setService($service);
					$item_facture->setQte($data["qte"][$cpt]);
					$item_facture->setPrix($data["prix"][$cpt]);
					$item_facture->setTotal($data["qte"][$cpt] * $data["prix"][$cpt]);
					$item_facture->setUnite($service->getUnite());
					$item_facture->setTitre($service->getTitre());
					$item_facture->setDescription($service->getDescription());
					$item_facture->setOrdre($cpt);
					$item_facture->add();
					$cpt++;
				}
				
				// calcul et mise a jour total facture / generer numéro facture
				$facture->setTotalItems();
				$facture->generateNumero();
				$facture->edit();
			}
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function editFacture($data)
{
    $indices = array("id", "client");
    if (fieldCheck($data, $indices)) {
        if (buildFacture($data, $data['id'])->edit() == 1) {
			if(isset($data["id_service"]) && !empty($data["id_service"])){
				$cpt = 0;
				foreach($data["id_service"] as $id_service){
					$service = service::find($id_service);
					if(isset($data["item_id"][$cpt]) && !empty($data["item_id"][$cpt])){
						$item_facture = item_facture::find($data["item_id"][$cpt]);
						$item_facture->setService($service);
						$item_facture->setQte($data["qte"][$cpt]);
						$item_facture->setPrix($data["prix"][$cpt]);
						$item_facture->setTotal($data["qte"][$cpt] * $data["prix"][$cpt]);
						$item_facture->setOrdre($data["ordre"][$cpt]);
						$item_facture->edit();
					}else{
						$item_facture = new item_facture();
						$item_facture->setFacture(facture::find($data['id']));
						$item_facture->setService($service);
						$item_facture->setQte($data["qte"][$cpt]);
						$item_facture->setPrix($data["prix"][$cpt]);
						$item_facture->setTotal($data["qte"][$cpt] * $data["prix"][$cpt]);
						$item_facture->setUnite($service->getUnite());
						$item_facture->setTitre($service->getTitre());
						$item_facture->setDescription($service->getDescription());
						$item_facture->setOrdre($cpt);
						$item_facture->add();
					}
					$cpt++;
				}
				
				$facture = facture::find($data['id']);
				$facture->setTotalItems();
				$facture->edit();
			}
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function deleteFacture($data)
{
    $indices = array("id");
    if (fieldCheck($data, $indices))
    {
        $id = $data["id"];
        $facture = facture::find($id);
        if ($facture->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function removeItemFacture($data)
{
    $indices = array("id");
    if (fieldCheck($data, $indices))
    {
        $id = $data["id"];
        $item_facture = item_facture::find($id);
        if ($item_facture->delete() == 1) {
            echo "1";
        } else {
            echo "2";
        }
    } else {
        echo "0";
    }
}

function getRowFacture(){
	$services = service::findAll($_SESSION['langue'], true);
	?>
	<tr>
		<td></td>
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
			<input type="number" step="any" name="soustotal[]" value="<?php echo $services[0]->getPrix(); ?>" class="form-control total-input">
		</td>
		<td class="add-remove text-right">
			<input type="hidden" name="item_id[]" value="0" class="id-item-input">
			<i class="fas fa-plus-circle add-row" data-toggle="tooltip" data-placement="top" data-original-title="Ajouter ligne"></i> 
			<i class="fas fa-minus-circle remove-row" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer cette ligne"></i> 
		</td>
	</tr>
	<?php
}

function customItemFacture($data){
	$indices = array("id");
    if (fieldCheck($data, $indices))
	{
		$item_facture = item_facture::find($data['id']);
		?>
		<form method="post" action="components/com_facture/controleurs/router.php?task=editItemFacture" id="customForm" enctype="multipart/form-data">
			<div class="msgbox"></div>
			<div class="form-group">
				<label>Titre <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="titre" value="<?php echo $item_facture->getTitre(); ?>">
			</div>
			<div class="form-group">
				<label>Description <span class="text-danger">*</span></label>
				<textarea class="form-control" name="description" id="description"><?php echo $item_facture->getDescription(); ?></textarea>
				<script type="text/javascript">
                    CKEDITOR.replace('description', {
                        //allowedContent: true,
                        allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href];',
                        filebrowserBrowseUrl: 'ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
			</div>
			<div class="form-group">
				<label>Unité <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="unite" value="<?php echo $item_facture->getUnite(); ?>">
			</div>
			<input type="hidden" name="id" value="<?php echo $item_facture->getId(); ?>">
			<div class="submit-section">
				<button class="btn btn-primary submit-btn">Mettre à jour</button>
			</div>
		</form>
<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#customForm').ajaxForm({
            beforeSubmit: function () {
                $("#customForm .loading").css('display','inline-block');
            },
            success: function (theResponse) {
                $("#customForm .loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
				
                var msgsucces = "Facture ajoutée avec succès";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "facture modifiée avec succès";
                }
                if (parseInt(theResponse) === 1) {
                    $('#customForm .msgbox').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> ' + msgsucces + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
					
                    setTimeout(function () {
                        $("#dialog-custom").modal('hide');
                    }, 1500)
					
                } else if(parseInt(theResponse) === 0) {
                    $('#customForm .msgbox').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Attention!</strong> Veuillez remplir les champs obligatoires<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                } else {
                    $('#customForm .msgbox').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Erreur lors de l\'execution de l\'opération<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                }
            }
        });
	})
</script>	
		<?php
	}
}

function editItemFacture($data){
	$indices = array("id", "titre", "description", "unite");
    if (fieldCheck($data, $indices))
	{
		$item_facture = item_facture::find($data['id']);
		$item_facture->setTitre($data['titre']);
		$item_facture->setDescription($data['description']);
		$item_facture->setUnite($data['unite']);
		if($item_facture->edit() == 1)
			echo "1";
		else
			echo "2";
	}
	else
		echo "0";
}

function buildFacture($data, $id = null)
{
    $facture = new facture();

    if($id){
        $facture = facture::find($id);
    }

    $facture->setNumero($data['numero']);
    $facture->setClient(client::find($data['client']));
	$facture->setDateFacture(dateBD($data['date_facture']));
	$facture->setStatu($data['statu']);
	$facture->setDevise($data['devise']);
	$facture->setDiscount($data['discount']);
	$facture->setDiscountVal($data['discount_val']);
    $facture->setDateAdd(date("Y-m-d H:i:s"));
    $facture->setLastEdit(date("Y-m-d H:i:s"));

    return $facture;
}

function pdfFacture($data){
	global $db;
	if(isset($data["id"]) && !empty($data["id"])){
		$facture = facture::find($data["id"]);
		$items = $facture->getItems();
		$client = $facture->getClient();
		$config = new config($db);
		$invoiceFor = $client->getRaisonSocial() != '' ? $client->getRaisonSocial() : $client->getNom() . ' ' . $client->getPrenom();
		
		require_once '../../../vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf();
		
		$htmlInvoice = '<html>
<head>
<style>
body {
	font-family: montserrat;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #FFF;
	border-right: 0.1mm solid #FFF;
	border-bottom: 0.1mm solid #CCC;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border-left: 0.1mm solid #FFF;
	border-right: 0.1mm solid #FFF;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #FFF;
	background-color: #FFFFFF;
	border: 0mm none #000000;
}
.items td.totals {
	text-align: right;
	border-bottom: 0.1mm solid #CCC;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%">
<tr>
	<td><img src="../../../images/config/'. $config->getLogo() .'" width="100"></td>
	<td align="right" style="vertical-align: middle;"><strong style="font-size: 8pt;"><br><br>HW LABEL, '. $config->getAdresse() .'</strong><br>
	<p style="font-size: 8pt;"><strong>t:</strong> '.$config->getTel().'  |  <strong>e:</strong> '.$config->getEmail().' | <strong>w:</strong> www.helloworld-agency.com</p></td>
</tr>
</table>
<hr>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #CCC; font-size: 9pt; text-align: center; padding-top: 3mm; ">
<p style="font-size:8pt;"><strong>IF</strong> 26162283 | <strong>TP</strong> 45101756 | <strong>RC</strong> 91301 | <strong>ICE</strong> 002142777000089</p>
<div style="margin-top:5pt;">Page {PAGENO} sur {nb}</div>
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<table width="100%">
<tr>
<td width="35%" style="vertical-align: middle; font-size:8pt;">Facture pour<hr style="margin:1pt 0 6pt 0;"><span style="font-weight: bold; font-size: 10pt; color:#08c3df">'. $invoiceFor .'</span><br />'. $client->getAdresse() .'<br />'. $client->getICE() .'<br /><span style="font-family:dejavusanscondensed;">&#9742;</span> '. $client->getTel() .'</td>
<td width="30%"></td>

<td width="35%" style="text-align: right;">

<table style="margin-bottom:5pt;">
<tr><td style="font-size:8pt;">Total facture</td></tr>
<tr><td style="border-top:#08c3df solid 0.5pt;"><strong style="font-size: 12pt;">'. number_format($facture->getTotal(), 2, ',', ' ') . ' ' . $facture->getDevise() .'</strong></td></tr>
</table>

<table style="margin-bottom:5pt;">
<tr><td style="font-size:8pt;">Date facture</td></tr>
<tr><td style="border-top:#08c3df solid 0.5pt;"><strong style="font-size: 12pt;">'. normaldate2($facture->getDateFacture()) .'</strong></td></tr>
</table>

<table>
<tr><td style="font-size:8pt;">N° facture</td></tr>
<tr><td style="border-top:#08c3df solid 0.5pt;"><strong style="font-size: 12pt;">'. $facture->getNumero() .'</strong></td></tr>
</table>
</td>
</tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="45%" style="text-align:left;">Description</td>
<td width="15%">Prix HT</td>
<td width="20%">Quantité</td>
<td width="20%" align="right">Total HT</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';
$soustotal = 0;		
foreach($items as $item){
	$soustotal += $item->getTotal();
	$htmlInvoice .= '<tr>
<td><strong>'. $item->getTitre() .'</strong><div style="font-size:8pt; color:#999">' .  $item->getDescription() . '</div></td>
<td align="center" style="vertical-align:middle;">'. number_format($item->getPrix(), 2, ',', ' ') . ' ' . $facture->getDevise() .'</td>
<td align="center" style="vertical-align:middle;">'. $item->getQte() . ' x ' . $item->getUnite() .'</td>
<td align="right" style="vertical-align:middle;" class="cost">'. number_format($item->getTotal(), 2, ',', ' '). ' ' . $facture->getDevise() .'</td>
</tr>';
}		

$htmlInvoice .= '<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="2" rowspan="6"></td>
<td class="totals">Sous-total HT</td>
<td class="totals cost">'. number_format($soustotal, 2, ',', ' '). ' ' . $facture->getDevise() .'</td>
</tr>';
		
if($facture->getDiscount() != ''){
	$discoutSign = $facture->getDiscount() == 'amount' ? ' ' . $facture->getDevise() : '%';
// test réduction
	if($facture->getDiscount() == 'percentage'){
		$soustotal = $soustotal - ($soustotal * $facture->getDiscountVal / 100);
	}
	elseif($facture->getDiscount() == 'amount'){
		$soustotal = $soustotal - $facture->getDiscountVal;
	}
	
	$htmlInvoice .= '<tr>
<td class="totals">Réduction</td>
<td class="totals cost">- '. $facture->getDiscountVal() . $discoutSign .'</td>
</tr>';
}		

$htmlInvoice .= '<tr>
<td class="totals">TVA</td>
<td class="totals cost">'. number_format(($soustotal * 0.2), 2, ',', ' ') . ' ' . $facture->getDevise() .'</td>
</tr>
<tr style="background:#08c3df;">
<td class="totals" style="color:#FFF; border-right:0.1mm solid #08c3df;"><b>TOTAL TTC</b></td>
<td class="totals cost" style="color:#FFF;"><strong>'. number_format($facture->getTotal(), 2, ',', ' ') . ' ' . $facture->getDevise() .'</strong></td>
</tr>
</tbody>
</table>
<div style="margin-top:150t;">
<h3 style="color:#08c3df;">Merci d\'avoir choisi Hello World !!</h3>
<p style="font-size:8pt;"><strong>Conditions: </strong>La validation de la proposition financière implique l\'acceptation complète et entière des Conditions Générales de vente présentées sur le site : <a href="https://www.helloworld-agency.com/conditions-generales-de-ventes/">https://www.helloworld-agency.com/conditions-generales-de-ventes/</a></p>
</div>
</body>
</html>';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
		
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];		
		
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10,
	
	'fontDir' => array_merge($fontDirs, [
        '../../../fonts/',
    ]),
    'fontdata' => $fontData + [
        'montserrat' => [
            'R' => 'Montserrat-Regular.ttf',
			'B' => 'Montserrat-Bold.ttf',
        ]
    ],
    'default_font' => 'montserrat'
]);

$mpdf->SetProtection(array('print', 'copy'));
$mpdf->SetTitle("Facture #" . $facture->getNumero());
$mpdf->SetAuthor("Hello World");
$mpdf->SetWatermarkText("");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.05;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($htmlInvoice);

$mpdf->Output();
	}
}