<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="categorieForm">

    <div class="row">

        <fieldset>
            <legend>Seo Tags</legend>

            <div class="col-md-6 form-group">
                <label>Seo Titre</label>
                <input name="seo_titre" type="text" value="<?= isset($categorie) ? $categorie->getSeoTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-6 form-group" >
                <label>Seo Description</label>
                <input name="seo_description" type="text" value="<?= isset($categorie) ? $categorie->getSeoDescription() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-6 form-group" >
                <label>Seo Keyword</label>
                <input name="seo_keyword" type="text" value="<?= isset($categorie) ? $categorie->getSeoKeyword() : "" ;?>" class="form-control" />
            </div>

        </fieldset>
        <br/>
        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-3 form-group">
                <label>Parent</label>
                <select name="id_parent" class="form-control chosen-select">
                    <option value="0">Aucun(e)</option>
                    <?php foreach ($parents as $parent): ?>
                        <?php if(isset($categorie) && $parent->getId() == $categorie->getId()) continue; ?>
                        <?php $sl = isset($categorie) && $categorie->getParent()->getId() == $parent->getId() ? "selected" : ""; ?>
                        <option value="<?= $parent->getId(); ?>" <?= $sl; ?> ><?= $parent->getTitre(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>Titre</label>
                <input name="titre" type="text" value="<?= isset($categorie) ? $categorie->getTitre() : "" ;?>" class="form-control" />
            </div>
            
            <div class="col-md-3 form-group">
                <label>Slug</label>
                <input name="slug" type="text" value="<?= isset($categorie) ? $categorie->getSlug() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>Ordre</label>
                <input name="ordre" type="number" value="<?= isset($categorie) ? $categorie->getOrdre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active"
                               value="1" <?= isset($categorie) && $categorie->isActive() ? "checked" : "" ;?> /> Active
                    </label>
                </div>
            </div>

            <div class="col-md-3 form-group">
                <label>Photo</label>
                <input type="file" name="photo[]" class="form-control" />
            </div>

            <?php if(isset($categorie) && $categorie->getPhoto()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/categories/<?= $categorie->getPhoto(); ?>" height="60" />
                </div>
            <?php } ?>

        </fieldset>

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
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Categorie ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Categorie modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function () {
                        document.location = "index.php?option=com_categorie";
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
