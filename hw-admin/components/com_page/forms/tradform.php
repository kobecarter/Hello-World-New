<?php
if(isset($p)){
	$pction = "controleurs/main.php?task=editPage";	
	$task = "edit";
	$bt = "Modifier cette page";
}
else{
	$pction = "controleurs/main.php?task=addPage";	
	$task = "add";
	$bt = "Ajouter page";
}
?>
<form method="post" action="<?php echo $pction?>" enctype="multipart/form-data" class="validateForm" id="productForm" >
  <div class="row">  
	<fieldset>
    	<legend>SEO tags</legend>
        <div class="col-md-6 form-group">
            <label>Titre</label>
            <div class="iconed-input"><input type="text" name="seo_titre" value="<?php if(isset($p)) echo stripslashes($p->getSeoTitre());?>" class="form-control" /></div>
        </div>
        
        <div class="col-md-6 form-group">
            <label>Description</label>
            <div class="iconed-input"><input type="text" name="seo_description" value="<?php if(isset($p))echo stripslashes($p->getSeoDescription());?>" class="form-control" /></div>
        </div>
    </fieldset>  
    
    <fieldset>
    	<legend>Détails page</legend>
        
        <div class="col-md-3 form-group">
            <label>Titre</label>
            <div class="iconed-input"><input type="text" name="alias" value="<?php if(isset($p)) echo stripslashes($p->getAlias());?>" required class="form-control" /></div>
        </div>
		  <div class="col-md-3 form-group">
            <label>URL</label>
            <input type="text" name="url" value="<?php if(isset($p)) echo stripslashes($p->getURL());?>" class="form-control" />
        </div>
                
    <div class="col-md-3 form-group has-iconed">
        <label>Type</label>
        <select name="type" class="form-control chosen-select">
            <option value="page" <?php if(isset($p) && $p->getType() == 'page') echo "selected"; ?>>Page de contenu</option>
            <option value="lien" <?php if(isset($p) && $p->getType() == 'lien') echo "selected";?>>Lien externe</option>
            <option value="room" <?php if(isset($p) && $p->getType() == 'room') echo "selected";?>>Liste chambre</option>
        </select>
    </div>
    
    <div class="col-md-3 form-group has-iconed">
        <label>Lien externe</label>
        <div class="iconed-input"><input type="text" name="externe" value="<?php if(isset($p))echo $p->getExterne();?>" class="form-control" /></div>
    </div>
    
        <div class="col-md-3 form-group">
            <label>Slider</label>
            <select name="slider" class="form-control chosen-select">
                <option value="">Par défaut</option>
                <?php
                $SQLselect = "SELECT id FROM ".__prefixe_db__."slider WHERE actif = 1";
                $result = $db->queryS($SQLselect);
                foreach($result as $data){
                    $s = new slider($data['id'],$db);
					$sl = isset($p) && $p->getIdSlider() == $s->getId() ? "selected" : "";
                    ?>
                    <option value="<?=$s->getId()?>" <?php echo $sl; ?>><?=$s->getTitre()?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
    <div class="col-md-3 form-group">
        <label>Photo</label>
        <div class="iconed-input"><input type="file" name="photo[]" class="" /></div>
    </div>
    <?php
	if(isset($p) && $p->getPhoto() != ''){
		?>
        <div class="col-md-2">
            <img src="../images/pages/<?php echo $p->getPhoto();?>" alt="" height="60" style="border:#FFF solid 3px; box-shadow:#CCC 0 0 3px; border-radius:3px; margin-left:10px;" />
        </div>
        <?php	
	}
	?>
    
	 <div style="float:right;" class="col-md-5 form-group">
        <label>Extrait</label>
      <textarea class="form-control" id="extrait" name="extrait"><?php if(isset($p)) echo $p->getextrait(); ?></textarea>
    </div>
	
    <div class="col-md-1 form-group">
   <div class="checkbox">     
        <label>
        	<input type="checkbox" name="actif" value="1" <?php if(isset($p) && $p->isActif()) echo "checked";?> /> Active
        </label>
    </div>
    </div>
	
	
	<div class="col-md-1 form-group">
	<div class="dropdown">
	 <?php
      $op = isset($_GET['option']) ? $_GET['option'] : 'com_users';
      if(!isset($_SESSION['langue'])) $_SESSION['langue'] = "fr";
      if(isset($_GET['l'])) $_SESSION['langue'] = $_GET['l'];
      ?>
	
	
		  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Langue
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
		
			<li><a href="" data-id="1" data-langue="fr" class="languefr">  Français</a></li>			 
			<li><a href=""  data-id="2" data-langue="en" class="langueen" > Englais</a></li>
			   
		  </ul>
	</div>
 </div>
 
 <script type="text/javascript">
$(function(){
	// Déconnexion
	$('.languefr').click(function(){
	 var id= $(this).attr("data-id"); 
	 var langue= $(this).attr("data-langue"); 
	 
	 
	 	//alert("test");
							var order = 'id='+id; 
			                   $.post("controleurs/main.php?task=compteclick", order, function(theResponse){
								   if(theResponse == '1'){
									   document.location = url; 
								   }

							  });
	 
	 
	 
	})
})
</script>
 
	

    <div class="col-md-12 form-group" style="float:left;">
    	<label>Texte</label>
        <textarea name="texte" id="texte"><?php if(isset($p)) echo $p->getTexte(); ?></textarea>
		<script type="text/javascript">
                CKEDITOR.replace( 'texte',{
					allowedContent: true,
					//allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
					filebrowserBrowseUrl : '../ckeditor/plugins/ckfinder/ckfinder.html'} );
        </script>
    </div>
    </fieldset>
    
  
    
    
    
</div>
<?php if(isset($p)){ ?>
<input type="hidden" name="id" value="<?=$p->getId()?>" />
<?php } ?>  

<input type="reset" class="btn btn-default" value="Annuler" />
<input type="submit" value="<?php echo $bt?>" name="<?php echo $task; ?>" class="btn btn-primary submit" />
<span class="loading"></span>
</form>
<script>
$(function(){
	
	// envoi du formulaire en ajax
	$('form#productForm').ajaxForm({
	beforeSubmit: function() {
		$(".loading").fadeIn();
	},
	success: function(theResponse) {
			$(".loading").fadeOut();
			// messages
			if($(".submit").attr("name") == 'edit'){
				var msgsucces = 'Page modifi&eacute;e avec succ&egrave;s.';
				var msgfaild = 'Erreur lors de la modification.';
			}
			else{
				var msgsucces = 'Page ajout&eacute;e avec succ&egrave;s.';
				var msgfaild = 'Erreur lors de l\'ajout.';
			}
			if(theResponse == '1'){
				$('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> '+msgsucces+'</div>');	
				setTimeout(function(){ document.location = "index.php?option=com_page"; },3000)		
			}
			else{
				$('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> '+msgfaild+'</div>');
				$('.msgbox').slideDown();
			}
	}
	});
})
</script>