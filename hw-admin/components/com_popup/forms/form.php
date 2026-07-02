<?php

if(isset($b)){

    $action = "components/com_popup/controleur/popup.php?task=editPopup";

    $task = "edit";

    $bt = "Modifier ce popup";

}

else{

    $action = "components/com_popup/controleur/popup.php?task=addPopup";

    $task = "add";

    $bt = "Ajouter popup";

}

?>

<form method="post" action="<?php echo $action?>" enctype="multipart/form-data" class="validateForm" id="popupForm" >

    <div class="row">

        <div class="col-md-3 form-group">

            <label>Titre</label>

            <input name="titre" type="text" value="<?php if(isset($b)) echo $b->getTitre()?>" required class="form-control" />

        </div>



        <div class="col-md-3 form-group">

            <label>Date début affichage</label>

            <input name="from_date" type="date" value="<?php if(isset($b)) echo $b->getFromDate()?>" required class="form-control" />

        </div>



        <div class="col-md-3 form-group">

            <label>Date fin affichage</label>

            <input name="to_date" type="date" value="<?php if(isset($b)) echo $b->getToDate()?>" required class="form-control" />

        </div>
		
		<div class="col-md-3 form-group">
            <label>Taille</label>
			<select name="size" class="form-control chosen-select">
				<option value="Large" <?php if(isset($b) && $b->getSize() == 'Large') echo "selected"; ?>>Large</option>
				<option value="Medium" <?php if(isset($b) && $b->getSize() == 'Medium') echo "selected"; ?>>Medium</option>
				<option value="Small" <?php if(isset($b) && $b->getSize() == 'Small') echo "selected"; ?>>Small</option>
			</select>
        </div>
        		
		<div class="col-md-3 form-group">
            <label>Texte boutton</label>
            <input name="btn_text" type="text" value="<?php if(isset($b)) echo $b->getBtnText()?>" class="form-control" />
        </div>
        
        <div class="col-md-3 form-group">

            <label>Lien boutton</label>

            <input name="btn_link" type="text" value="<?php if(isset($b)) echo $b->getBtnLink()?>" class="form-control" />

        </div>
		
        <div class="col-md-3 form-group">

            <label>Photo</label>

            <input type="file" name="photo[]" />

        </div>

        <?php

        if(isset($b) && $b->getPhoto() != ''){

            ?>

            <div class="col-md-2 form-group"><img src="../images/popup/<?php echo $b->getPhoto(); ?>" height="60" /></div>

            <?php

        }

        ?>


        <div class="col-md-2 form-group">

            <div class="checkbox">

                <label>

                    <input type="checkbox" name="actif" value="1" <?php if(isset($b) && $b->isActif()) echo "checked";?> /> Active

                </label>

            </div>
            
        </div>
        
        <div class="clearfix"></div>
        
        <div class="col-md-6 form-group">
            <label>Extrait</label>
            <textarea name="extrait" class="form-control"><?php if(isset($b)) echo $b->getExtrait(); ?></textarea>
        </div>
		
		<div class="col-md-6 form-group">
            <label>Page</label>
            <select name="page[]" class="form-control chosen-select" multiple>
				<option value="home" <?php if(isset($b) && $b->hasPage('home')) echo "selected"; ?>>Accueil</option>
				<?php 
				$id_pages = page::findAll();
	  			foreach($id_pages as $id_page){
					$page = new page($id_page,$db,$_SESSION['langue']);
					$sl = isset($b) && $b->hasPage($id_page) ? "selected" : "";
					?>
					<option value="<?php echo $page->getId(); ?>" <?php echo $sl; ?>><?php echo $page->getTitre(); ?></option>
					<?php
				}
				?>
				<option value="*" <?php if(isset($b) && $b->hasPage('*')) echo "selected"; ?>>Toutes les pages</option>
			</select>
        </div>

        <div class="col-md-12 form-group" style="float:left;">

            <label>Description</label>

            <textarea name="description" id="description" class=""><?php if(isset($b)) echo $b->getDescription(); ?></textarea>

            <script type="text/javascript">

                CKEDITOR.replace( 'description',{filebrowserBrowseUrl : '../ckeditor/plugins/ckfinder/ckfinder.html'} );

            </script>

        </div>

    </div>

    <?php if(isset($b)){ ?>

        <input type="hidden" name="id" value="<?=$b->getId()?>" />

    <?php } ?>



    <input type="reset" class="btn btn-default" value="Annuler" />

    <input type="submit" value="<?php echo $bt?>" name="<?php echo $task; ?>" class="btn btn-primary submit" />

    <span class="loading"></span>

</form>

<script>

    $(function(){



        // envoi du formulaire en ajax

        $('form#popupForm').ajaxForm({

            beforeSubmit: function() {

                $(".loading").fadeIn();

            },

            success: function(theResponse) {

                $(".loading").fadeOut();

                // messages

                if($(".submit").attr("name") == 'edit'){

                    var msgsucces = 'Popup modifi&eacute; avec succ&egrave;s.';

                    var msgfaild = 'Erreur lors de la modification.';

                }

                else{

                    var msgsucces = 'Popup ajout&eacute; avec succ&egrave;s.';

                    var msgfaild = 'Erreur lors de l\'ajout.';

                }

                if (parseInt(theResponse) === 1) {

                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> '+msgsucces+'</div>');

                    setTimeout(function(){ document.location = "index.php?option=com_popup"; },2000)

                }

                else if (parseInt(theResponse) === 0){
                    $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Veuillez remplir Les champs obligatoires !</div>');
                    $('.msgbox').slideDown();
                }
				
				else{
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> '+msgfaild+'</div>');
                    $('.msgbox').slideDown();
                }

            }

        });

    })

</script>