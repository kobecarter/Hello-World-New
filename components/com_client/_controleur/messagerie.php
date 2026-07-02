<?php 
include "../hw-admin/config.php";
require_once('../instanceDb.php');
require_once('../includes/functions/functions.php');
session_start();

/* -------------------------------------------- getMessages -------------------------------------------- */
function getMessages($data){
global $db, $siteURL;	
?>
<table class="table table-hover table-striped table-hw">
  <thead>
    <tr>
      <th>Département</th>
      <th>Objet</th>
      <th>Contenu </th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $id_client = $_SESSION["client"]->getId();
	$claus = isset($data['id']) && !empty($data['id']) ? " AND A.fk_projet = ".intval($data['id']) : "";
    $SQLselect = "SELECT A.id FROM ".__prefixe_db__."message A
                  JOIN ".__prefixe_db__."projet B ON A.fk_projet = B.id
                  WHERE fk_client = $id_client
                  AND id_parent = 0
				  $claus
                  ORDER BY date_message DESC";
    $result = $db->queryS($SQLselect);
    foreach($result as $data){
        $msg = new message($data["id"],$db);
        $d = new departement($msg->getIdDepartement(),$db);
    ?>
    <tr>                
      <td><?php echo $d->getNom() ;  ?></td>
      <td><?php echo $msg->getTitre();?></td>
      <td><?php echo substr($msg->getContenu(),0,80).'...'; ?></td>
      <td class="p-name"><?php echo normaldate(substr($msg->getDate(),0,10)).' '.substr($msg->getDate(),11,5); ?></td>
      <td><a class="btn btn-hw btn-xs discussion" data-id="<?php echo $msg->getId(); ?>"><i class="fa fa-comments"></i> Discussion </a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<script>
$(function(){
	
	$(".discussion").click(function(){
		var id = $(this).attr("data-id");
		var order = 'id='+id;
		
		$.post("<?php echo $siteURL; ?>controleurs/main.php?task=getDiscussion", order, function(theResponse){
			$("#dialog2 #dialogContent").html(theResponse);
			$('#dialog2').modal('show');   
		});
	})
 
}) 
</script>
<?php	
}

/* -------------------------------------------- getDiscussion -------------------------------------------- */
function getDiscussion($data){
global $db, $siteURL;
	
$id = $data['id'];

//client logo
$c = $_SESSION['client'];
$logo = $c->getLogo();

//update message_vu
$sql=" UPDATE ".__prefixe_db__."message SET message_vu='1' where id='$id' and hw='1' " ;
$db->query($sql);


 /*
//---file-message
$sqlfile="select * from ".__prefixe_db__."file where fk_message='$id' " ;
$resfile = $db->queryS($sqlfile);
//----

$nvid  = $data2['id']; $nvtitre = $data2['titre'];$nvtype = $data2['type'];$nvprojet=$data2['fk_projet'];$nvdep=$data2['fk_departement']; */  

function nextMessage($idM){
	
	global $db,$siteURL,$last_msg;
	$logo = $_SESSION['client']->getLogo();
	
	//message_v
	$sql=" UPDATE ".__prefixe_db__."message SET message_vu='1' where id_parent='$idM' and hw='1' " ;
	$db->query($sql);
	//

 
    $SQLselect = "SELECT id FROM ".__prefixe_db__."message where id_parent = $idM";
    $result = $db->query($SQLselect);
	if( $db->num_rows($result) == 1){
		
		$data = $db->fetch_array($result);
		$m = new message($data["id"],$db);
		
		$avatar = $m->isHW() ? 'images/logo_hello_world.png' : 'images/clients/'.$logo;
		$class = $m->isHW() ? 'message-right' : '';
 ?>
 <div class="message <?php echo $class; ?>">
		  		<div class="avatar">
			  	<img class="img-circle" alt="chat avatar" src="<?php echo $siteURL.$avatar ;?>">
		  		</div>
		  		<div class="message-text-wrapper">
				  	<div class="message-text">
				   	 <?php echo $m->getContenu(); ?>
				  	</div>
                    <?php
					  $files = $m->getFiles();
					  foreach($files as $file){
						$f = new fil($file['id'],$db);
						?>
						<a href="<?php echo $siteURL; ?>controleurs/main.php?task=downloadFile&file=<?php echo $f->getIdEncode(); ?>" class="item-file"><i class="fa fa-file"></i> <?php echo $f->getNom(); ?></a>
						<?php  
					  }
					?>
		  		</div>
			  	
		  </div>
		  <?php
	$last_msg = $m->getId();
	nextMessage($m->getId());
	}	
 
}
global $last_msg;
$last_msg = $id;

?>
<div class="row">	
<div class="col-sm-12">
<div class="panel panel-default chat-widget">

	  <div class="panel-body">
      	<?php
		$m = new message($id,$db);
		$avatar = $m->isHW() ? 'images/logo_hello_world.png' : 'images/clients/'.$logo;
		$class = $m->isHW() ? 'message-right' : '';
		?>
		  <div class="message <?php echo $class; ?>">
		  		<div class="avatar">
			  	<img class="img-circle" alt="chat avatar" src="<?php echo $siteURL.$avatar ; ?>" >
		  		</div>
			  	<div class="message-text-wrapper">
				  	<div class="message-text">
				   	 <?php echo $m->getContenu(); ?> 
				  	</div>
		  		</div>
			 <div >
			 <?php
              $files = $m->getFiles();
              foreach($files as $file){
                $f = new fil($file['id'],$db);
                ?>
                <a href="<?php echo $siteURL; ?>controleurs/main.php?task=downloadFile&file=<?php echo $f->getIdEncode(); ?>" class="item-file"><i class="fa fa-file"></i> <?php echo $f->getNom(); ?></a>
                <?php  
              }
             ?>
		  </div> 	
		  </div>
		  
		  
		  
     <?php nextMessage($id); ?>
	 
	
    <form method="post" action="<?php echo $siteURL; ?>controleurs/main.php?task=sendResponse" enctype="multipart/form-data" id="msg-form" class="formTemplate">
        <div class="msgbox"></div>
	  	<div class="panel-footer message">
		  	<div class="avatar">
			  	<img class="img-circle" alt="chat avatar" src="<?php echo $siteURL.'images/clients/'.$logo ; ?>">
		  	</div>
            <div class="message-text-wrapper">
				<textarea name="contenu" class="message-text" placeholder="Votre message ..."></textarea>
				
				<input type="hidden" name="last_msg" value="<?php echo $last_msg ;?>"  />
			
			
			<a class="btn btn-default btn-sm pull-right add-file" href="javascript:void(0)"><i class="fa fa-file"></i> Attacher des fichiers</a>
			<div class="clearfix"></div>
			<div class="row input-box">
				<div class="col-sm-6">
                	<input type="file" name="userfile[]" />
                    <a href="javascript:void(0)" class="remove-file" ><i class="fa fa-times"></i></a>
                </div>
			</div>
            <div class="row">
            	<div class="col-sm-12">
                	<input  class="btn btn-primary " type="submit" value="Envoyer" >
                    <div class="loading"></div> 
                </div>
            </div>
            </div>
	  	</div>
        </form>
	</div>
</div>
</div>
</div>
<script>
$(function(){
	
	$(".add-file").click(function(){
		$(".input-box").append('<div class="col-sm-6"><input type="file" name="userfile[]" /><a href="javascript:void(0)" class="remove-file"><i class="fa fa-times"></i></a></div>');
	})

	$("body").on("click", ".remove-file", function(e){
		$(this).parent().remove();
		e.preventDefault();
	})
	
	
	// Envoi du formulaire
	$('form#msg-form').ajaxForm({
	beforeSubmit: function() {
		// chargement	
		$("#msg-form .loading").show();
	},
	success: function(theResponse){
		$("#msg-form .loading").hide();
		if(parseInt(theResponse) == 1){
			$('form#msg-form')[0].reset();
			$('#msg-form .msgbox').html('<div class="alert alert-success">Félicitation, votre message est envoyé avec succès</div>');
			$('#msg-form .msgbox').slideDown();
			setTimeout(function(){ document.location.reload(); },1500)	
		}
		else if(parseInt(theResponse) == 0){
			$('#msg-form .msgbox').html('<div class="alert alert-warning">Veuillez remplir les champs obligatoires</div>');
			$('#msg-form .msgbox').slideDown();	
		}
		
		else{
			$('#msg-form .msgbox').html('<div class="alert alert-danger">Attention, Erreur lors de l\'envoi</div>');
			$('#msg-form .msgbox').slideDown();	
		}
	}
	});	

});
</script>
<?php
}
?>