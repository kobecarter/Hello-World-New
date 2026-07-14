<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="categorieForm">

    <div class="row">
		
		<div class="col-md-6 form-group">
            <label>Seo titre</label>
            <input name="seo_titre" type="text" value="<?= isset($categorie) ? $categorie->getSeoTitre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-6 form-group" >
            <label>Seo description</label>
            <input name="seo_description" type="text" value="<?= isset($categorie) ? $categorie->getSeoDescription() : "" ;?>" class="form-control" >
        </div>

        <div class="col-md-6 form-group" >
            <label>Seo keyword</label>
            <input name="seo_keyword" type="text" value="<?= isset($categorie) ? $categorie->getSeoKeyword() : "" ;?>" class="form-control" >
        </div>

		<div class="col-md-3 form-group">
			<label>Parent</label>
			<select name="id_parent" class="form-control chosen-select">
				<option value="0">Aucun(e)</option>
				<?php foreach($categories as $category):?>
					<option value="<?php echo $category->getId(); ?>" <?php if(isset($categorie) && $categorie->getParent()->getId() == $category->getId()) echo "selected"; ?>><?=$category->getTitre()?></option>
				<?php endforeach; ?>
			</select>
		</div>        

        <div class="col-md-3 form-group">
            <label>Titre</label>
            <input name="titre" type="text" value="<?= isset($categorie) ? $categorie->getTitre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-1 form-group">
            <label>Ordre</label>
            <input name="ordre" type="number" value="<?= isset($categorie) ? $categorie->getOrdre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>Photo</label>
            <input type="file" name="photo[]" class="form-control" />
        </div>

        <?php if(isset($categorie) && $categorie->getPhoto()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/categories/<?= $categorie->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>

        <div class="col-md-3 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                           value="1" <?= isset($categorie) && $categorie->isActive() ? "checked" : "" ;?> /> Active
                </label>
            </div>
        </div>

        <?php if(isset($categorie)) { ?>
            <input type="hidden" name="id" value="<?= $categorie->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#categorieForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                console.log(theResponse)
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Catégorie ajoutée avec succèes.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Catégorie modifiée avec succèes.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function () {
                        document.location = "index.php?option=com_produit&task=categorie";
                    }, 1500)
                } else if(parseInt(theResponse) === 0) {
                    $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> ' + msgvide + '</div>').slideDown();
                } else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> ' + msgfaild + '</div>').slideDown();
                }
            }
        });
    })
</script>
