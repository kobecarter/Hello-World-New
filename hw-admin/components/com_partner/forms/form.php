<?php
if(isset($p)){
    $action = "components/com_partner/controleur/partner.php?task=editPartner";
    $task = "edit";
    $bt = "Modifier ce partenaire";
}
else{
    $action = "components/com_partner/controleur/partner.php?task=addPartner";
    $task = "add";
    $bt = "Ajouter partenaire";
}
?>

<form method="post" action="<?php echo $action?>" enctype="multipart/form-data" class="validateForm" id="partnerForm" >
    <div class="row">

        

        <div class="col-md-4 form-group">
            <label>Titre</label>
            <input type="text" name="titre" value="<?php if(isset($p)) echo stripslashes($p->getTitre());?>" required class="form-control" />
        </div>
        
        <div class="col-md-4 form-group">
            <label>URL</label>
            <input type="text" name="url" value="<?php if(isset($p)) echo stripslashes($p->getUrl());?>" required class="form-control" />
        </div>

        <div class="col-md-4 form-group">
            <label>Photo</label>
            <div class="iconed-input"><input type="file" name="photo[]" class="form-control" /></div>
        </div>

        <?php
        if(isset($p) && $p->getPhoto() != ''){
            ?>
            <div class="col-md-2">
                <img src="../images/partners/<?php echo $p->getPhoto();?>" alt="" height="60" />
            </div>
            <?php
        }
        ?>
        
        <div class="col-md-2 form-group">
            <label>Ordre</label>
            <div class="iconed-input"><input type="number" name="ordre" value="<?php if(isset($p)) echo $p->getOrdre();?>" class="form-control" /></div>
        </div>

        <div class="col-md-2 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="actif" value="1" <?php if(isset($p) && $p->isActif()) echo "checked";?> />
                    Active </label>
            </div>
        </div>
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
        $('form#partnerForm').ajaxForm({
            beforeSubmit: function() {
                $(".loading").fadeIn();
            },
            success: function(theResponse) {
                $(".loading").fadeOut();
                // messages
                if($(".submit").attr("name") == 'edit'){
                    var msgsucces = 'Partenaire modifi&eacute; avec succ&egrave;s.';
                    var msgfaild = 'Erreur lors de la modification.';
                }
                else{
                    var msgsucces = 'Partenaire ajout&eacute; avec succ&egrave;s.';
                    var msgfaild = 'Erreur lors de l\'ajout.';
                }
                if(theResponse == '1'){
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> '+msgsucces+'</div>');
                    setTimeout(function(){ document.location = "index.php?option=com_partner"; },3000)
                }
                else{
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> '+msgfaild+'</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    })
</script>