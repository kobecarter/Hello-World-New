<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="galeriePhotoForm">

    <div class="row">
        <div class="col-sm-12 msgbox"></div>
        <input type="hidden" name="id_galerie" value="<?= $_GET['id']; ?>">
        <div class="col-md-3 form-group">
            <label>
                <?php
                if (isset($trad_com_galerie['TITRE'][$_SESSION['user']->getLangue()]))
                    echo $trad_com_galerie['TITRE'][$_SESSION['user']->getLangue()];
                else
                    echo "Titre";
                ?>
            </label>
            <input name="titre" type="text" value="<?= isset($galerie_photo) ? $galerie_photo->getTitre() : ""; ?>"
                class="form-control" />
        </div>
        <div class="col-md-2 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active" value="1"
                        <?= isset($galerie_photo) && $galerie_photo->isActive() ? "checked" : ""; ?> /> Active
                </label>
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label>
                <?php

                echo "Nombre d'abonnés";
                ?>
            </label>
            <input name="desc1" type="text" value="<?= isset($galerie_photo) ? $galerie_photo->getDesc1() : ""; ?>"
                class="form-control" />
        </div>
        <div class="col-md-3 form-group">
            <label>
                <?php

                echo "Secteur d'activité";
                ?>
            </label>
            <input name="desc2" type="text" value="<?= isset($galerie_photo) ? $galerie_photo->getDesc2() : ""; ?>"
                class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                if (isset($trad_com_galerie['PHOTO'][$_SESSION['user']->getLangue()]))
                    echo $trad_com_galerie['PHOTO'][$_SESSION['user']->getLangue()];
                else
                    echo "Photo";
                ?>
            </label>
            <input type="file" name="photo[]" class="form-control" multiple />
        </div>

        <?php if (isset($galerie_photo) && $galerie_photo->getPhoto()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/galerie/<?= $galerie_photo->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>


        <div class="col-md-2 form-group">
            <label>
                <?php
                if (isset($trad_com_galerie['ORDRE'][$_SESSION['user']->getLangue()]))
                    echo $trad_com_galerie['ORDRE'][$_SESSION['user']->getLangue()];
                else
                    echo "Ordre";
                ?>
            </label>
            <input name="ordre" type="number" value="<?= isset($galerie_photo) ? $galerie_photo->getOrdre() : ""; ?>"
                class="form-control" />
        </div>


        <?php if (isset($galerie_photo)) { ?>
            <input type="hidden" name="id" value="<?= $galerie_photo->getId(); ?>" />
        <?php } ?>



    </div>

    <input type="reset" class="btn btn-default" value="Annuler" />
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit" />
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function() {

        // envoi du formulaire en ajax
        $('form#galeriePhotoForm').ajaxForm({
            beforeSubmit: function() {
                $(".loading").fadeIn();
            },
            success: function(theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Photo ajoutée avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if ($(".submit").attr("name") === "edit") {
                    msgsucces = "Photo modifiée avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('#galeriePhotoForm .msgbox').html(
                        '<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' +
                        msgsucces + '</div>').slideDown();
                    setTimeout(function() {

                        <?php $loc = "index.php?option=com_galerie&task=addPhoto&id=" . $_GET['id']; ?>
                        document.location = "<?= $loc ?>";

                    }, 3000);
                } else if (parseInt(theResponse) === 0) {
                    $('#galeriePhotoForm .msgbox').html(
                        '<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Attention!</strong> ' +
                        msgvide + '</div>').slideDown();
                } else {
                    $('#galeriePhotoForm .msgbox').html(
                        '<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> ' +
                        msgfaild + '</div>').slideDown();
                }
            }
        });
    })
</script>