<?php 
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');

function getDocuments($data){
global $db, $siteURL;

$docExt = array("doc","docx","DOC","DOCX"); 
$ExlExt = array("xlsx","XLSX","csv","CSV");
$pdfExt = array("pdf","PDF"); 
$zipExt = array("zip","ZIP","rar","RAR"); 
$imgEXt = array("jpg","gif","jpeg","png","JPG");

$id = intval($data['id']);
$SQLselect = "SELECT id from ".__prefixe_db__."file WHERE fk_projet = $id";	
$result = $db->queryS($SQLselect);
foreach($result as $data2){
	$f = new fil($data2['id'],$db);
	
	$extension=explode(".",$f->getNom());
	 
	if(in_array($extension[1],$docExt)) $class = "file-word-o";
	elseif(in_array($extension[1], $imgEXt)) $class = "file-photo-o";
	elseif(in_array($extension[1], $ExlExt)) $class = "file-excel-o";
	elseif(in_array($extension[1], $pdfExt)) $class = "file-pdf-o";
	elseif(in_array($extension[1], $zipExt)) $class = "file-zip-o";
    else $class = "file" ;
	?>
<div class="col-md-3 doc-item">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3"><i class="fa fa-<?php echo $class; ?>"></i></div>
                <div class="col-xs-9 text-right comment">
                    <?php echo $f->getMessage(); ?>
                </div>
            </div>
        </div>
        <a href="<?php echo $siteURL; ?>controleurs/main.php?task=downloadFile&file=<?php echo $f->getIdEncode(); ?>">
            <div class="panel-footer">
                <div class="pull-left"><?php echo $f->getNom(); ?> </div>
                <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-down"></i></div>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>   
    <?php	
}
}
?>    

	