<?php
if(isset($p)){
	$action = "components/com_users/controleur/user.php?task=editProfil";
	$task = "edit";
	$bt = $trad_com_users['MODIFIER_PROFIL'][$_SESSION['user']->getLangue()];;
}
else{
	$action = "components/com_users/controleur/user.php?task=addProfil";
	$task = "add";
	$bt = $trad_com_users['AJOUTER_PROFIL'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $action?>" enctype="multipart/form-data" class="validateForm" id="profilForm" >
  <div class="row">
    <div class="col-md-3 form-group has-iconed">
        <label><?= $trad_com_users['PROFIL'][$_SESSION['user']->getLangue()];?></label>
        <div class="iconed-input"><input name="profil" type="text" value="<?php if(isset($p)) echo $p->getProfil()?>" required class="form-control" /></div>
    </div>
  </div>
<?php if(isset($p)){ ?>
<input type="hidden" name="id" value="<?=$p->getId()?>" />
<?php } ?>  

<input type="reset" class="btn btn-default" value="<?= $trad_com_users['ANNULER'][$_SESSION['user']->getLangue()];?>" />
<input type="submit" value="<?php echo $bt?>" name="<?php echo $task; ?>" class="btn btn-primary submit" />
</form>
<script>
$(function(){
    var succes = "<?= $trad_com_users['SUCCES'][$_SESSION['user']->getLangue()];?>";
    var error = "<?= $trad_com_users['ERREUR'][$_SESSION['user']->getLangue()];?>";

	// envoi du formulaire en ajax
	$('form#profilForm').ajaxForm({
	beforeSubmit: function() {
			
	},
	success: function(theResponse) {
			// messages
			if($(".submit").attr("name") == 'edit'){
                var succes_msg = "<?= $trad_com_users['SUCCES_MODIF_PROFIL'][$_SESSION['user']->getLangue()];?>";
                var error_msg = "<?= $trad_com_users['ERREUR_MODIF_PROFIL'][$_SESSION['user']->getLangue()];?>";
			}
			else{
                var succes_msg = "<?= $trad_com_users['SUCCES_ADD_PROFIL'][$_SESSION['user']->getLangue()];?>";
                var error_msg = "<?= $trad_com_users['ERREUR_ADD_PROFIL'][$_SESSION['user']->getLangue()];?>";
			}
			if(parseInt(theResponse) == 1){
				$('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>'+ succes +'</strong> '+ succes_msg +'</div>');
				setTimeout(function(){ document.location = "index.php?option=com_users&task=profil"; },2000)
			}
			else{
				$('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>'+ error +'</strong> '+ error_msg +'</div>');
				$('.msgbox').slideDown();
			}
	}
	});
})
</script>