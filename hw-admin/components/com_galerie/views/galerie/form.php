<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="galerieForm">

    <div class="row">

        <div class="col-md-3 form-group">
            <label>Titre</label>
            <input name="titre" type="text" value="<?= isset($galerie) ? $galerie->getTitre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>Cover</label>
            <input type="file" name="cover[]" class="form-control" />
        </div>

        <?php if(isset($galerie) && $galerie->getCover()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/galerie/<?= $galerie->getCover(); ?>" height="60" />
            </div>
        <?php } ?>

		<div class="col-md-3 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                        value="1" <?= isset($galerie) && $galerie->isActive() ? "checked" : "" ;?> /> 
                    <?php
                        if(isset($trad_com_galerie['ACTIVE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_galerie['ACTIVE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Active";
                    ?>
                </label>
            </div>
        </div>

    </div>

	<?php if(isset($galerie)) { ?>
		<input type="hidden" name="id" value="<?= $galerie->getId() ;?>" />
	<?php } ?>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#galerieForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Galerie ajoutée avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Galerie modifiée avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_galerie";
                            if($task == 'edit')
                                $loc = '';

                        ?>
                        document.location = "<?= $loc ?>"; 
                    
                    },3000);
                } else if(parseInt(theResponse) === 0) {
                    $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Attention!</strong> ' + msgvide + '</div>').slideDown();
                } else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> ' + msgfaild + '</div>').slideDown();
                }
            }
        });
    })
</script>
