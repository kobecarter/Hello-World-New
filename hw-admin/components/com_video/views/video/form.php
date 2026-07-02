<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="videoForm">

    <div class="row">

        <div class="col-md-3 form-group">
            <label>Catégorie</label>
            <select name="id_categorie" class="form-control chosen-select">
                <option value="0">Aucun(e)</option>
                <?php foreach ($categories as $categorie) : ?>
                <?php $sl = isset($video) && $video->getCategorie()->getId() == $categorie->getId() ? "selected" : ""; ?>
                <option value="<?= $categorie->getId(); ?>" <?= $sl; ?>><?= $categorie->getTitre(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3 form-group">
            <label>Titre</label>
            <input name="titre" type="text" value="<?= isset($video) ? $video->getTitre() : "" ;?>" class="form-control" />
        </div>
		
		<div class="col-md-3 form-group">
            <label>Code Vidéo</label>
            <input name="video" type="text" value="<?= isset($video) ? $video->getVideo() : "" ;?>" class="form-control" />
        </div>
		
		<div class="col-md-3 form-group">
            <label>localisation</label>
            <input name="localisation" type="text" value="<?= isset($video) ? $video->getLocalisation() : "" ;?>" class="form-control" />
        </div>
		
		<div class="col-md-6 form-group">
            <label><?= $trad_com_page['EXTRAIT'][$_SESSION['user']->getLangue()];?></label>
            <textarea class="form-control" id="extrait" name="extrait"><?php if (isset($video)) echo $video->getExtrait(); ?></textarea>
        </div>
		
		<div class="col-md-3 form-group">
            <label>Photo</label>
            <input type="file" name="photo[]" class="form-control" />
        </div>
		
        <?php if(isset($video) && $video->getPhoto()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/videos/<?= $video->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>
		
		<div class="clearfix"></div>
		<div class="col-md-3 form-group">
            <label>Date shooting</label>
            <input name="date_shooting" type="date" value="<?= isset($video) ? $video->getDateShooting() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-1 form-group">
            <label>Ordre</label>
            <input name="ordre" type="number" value="<?= isset($video) ? $video->getOrdre() : "" ;?>" class="form-control" />
        </div>
		
        <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                           value="1" <?= isset($video) && $video->isActive() ? "checked" : "" ;?> /> Active
                </label>
            </div>
        </div>

        <?php if(isset($video)) { ?>
            <input type="hidden" name="id" value="<?= $video->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#videoForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Vidéo ajoutée avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Vidéo modifiée avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function () {
                        document.location = "index.php?option=com_video";
                    }, 1500)
                } else if(parseInt(theResponse) === 0) {
                    $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Attention!</strong> ' + msgvide + '</div>').slideDown();
                } else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> ' + msgfaild + '</div>').slideDown();
                }
            }
        });
    })
</script>
