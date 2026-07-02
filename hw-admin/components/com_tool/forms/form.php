<?php
if(isset($t)){
    $action = "components/com_tool/controleur/tool.php?task=editTool";
    $task = "edit";
    $bt = "Modifier cet Outil";
}
else{
    $action = "components/com_tool/controleur/tool.php?task=addTool";
    $task = "add";
    $bt = "Ajouter Outil";
}
?>

<form method="post" action="<?php echo $action?>" enctype="multipart/form-data" class="validateForm" id="toolForm" >
    <div class="row">

        

        <div class="col-md-4 form-group">
            <label>Titre</label>
            <input type="text" name="titre" value="<?php if(isset($t)) echo stripslashes($t->getTitre());?>" required class="form-control" />
        </div>
        
        <div class="col-md-4 form-group">
            <label>URL</label>
            <input type="text" name="url" value="<?php if(isset($t)) echo stripslashes($t->getUrl());?>" required class="form-control" />
        </div>

        <div class="col-md-4 form-group">
            <label>Photo</label>
            <div class="iconed-input"><input type="file" name="photo[]" class="form-control" /></div>
        </div>

        <?php
        if(isset($t) && $t->getPhoto() != ''){
            ?>
            <div class="col-md-2">
                <img src="../images/tools/<?php echo $t->getPhoto();?>" alt="" height="60" />
            </div>
            <?php
        }
        ?>
        
        <div class="col-md-2 form-group">
            <label>Ordre</label>
            <div class="iconed-input"><input type="number" name="ordre" value="<?php if(isset($t)) echo $t->getOrdre();?>" class="form-control" /></div>
        </div>

        <div class="col-md-2 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="actif" value="1" <?php if(isset($t) && $t->isActif()) echo "checked";?> />
                    Active </label>
            </div>
        </div>
    </div>

    <?php if(isset($t)){ ?>
        <input type="hidden" name="id" value="<?=$t->getId()?>" />
    <?php } ?>
    <input type="reset" class="btn btn-default" value="Annuler" />
    <input type="submit" value="<?php echo $bt?>" name="<?php echo $task; ?>" class="btn btn-primary submit" />
    <span class="loading"></span>
</form>
<script>
    $(function(){

        // envoi du formulaire en ajax
        $('form#toolForm').ajaxForm({
            beforeSubmit: function() {
                $(".loading").fadeIn();
            },
            success: function(theResponse) {
                $(".loading").fadeOut();
                // messages
                if($(".submit").attr("name") == 'edit'){
                    var msgsucces = 'Outil modifi&eacute; avec succ&egrave;s.';
                    var msgfaild = 'Erreur lors de la modification.';
                }
                else{
                    var msgsucces = 'Outil ajout&eacute; avec succ&egrave;s.';
                    var msgfaild = 'Erreur lors de l\'ajout.';
                }
                if(theResponse == '1'){
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> '+msgsucces+'</div>');
                    setTimeout(function(){ document.location = "index.php?option=com_tool"; },3000)
                }
                else{
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> '+msgfaild+'</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    })
</script>