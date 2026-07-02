<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="secteurForm">

    <div class="row">

        <fieldset>
            <legend>
                <?php
                    if(isset($trad_com_secteur['TAGS_SEO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_secteur['TAGS_SEO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Seo Tags";
                ?>
            </legend>

            <div class="col-md-6 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['TITRE_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['TITRE_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Titre";
                    ?>
                </label>
                <input name="seo_titre" type="text" value="<?= isset($secteur) ? $secteur->getSeoTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-6 form-group" >
                <label>
                    <?php
                        if(isset($trad_com_secteur['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Description";
                    ?>
                </label>
                <input name="seo_description" type="text" value="<?= isset($secteur) ? $secteur->getSeoDescription() : "" ;?>" class="form-control" />
            </div>

        </fieldset>
        <br/>
        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['SERVICE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['SERVICE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Service";
                    ?>
                </label>
                <select name="id_service" class="form-control chosen-select">
                    <option value="0">Aucun(e)</option>
                    <?php foreach($services as $service):?>
						<option value="<?php echo $service->getId(); ?>" <?php if(isset($secteur) && $secteur->getService()->getId() == $service->getId()) echo "selected"; ?>><?=$service->getTitre()?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Titre";
                    ?>
                </label>
                <input name="titre" type="text" value="<?= isset($secteur) ? $secteur->getTitre() : "" ;?>" class="form-control" />
            </div>
            
            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['SLUG'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['SLUG'][$_SESSION['user']->getLangue()];
                        else
                            echo "Slug";
                    ?>
                </label>
                <input name="slug" type="text" value="<?= isset($secteur) ? $secteur->getSlug() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['SOUS_TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['SOUS_TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Sous Titre";
                    ?>
                </label>
                <input name="sous_titre" type="text" value="<?= isset($secteur) ? $secteur->getSousTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['PHOTO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['PHOTO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo";
                    ?>
                </label>
                <input type="file" name="photo[]" class="form-control" />
            </div>

            <?php if(isset($secteur) && $secteur->getPhoto()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/secteur/<?= $secteur->getPhoto(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_secteur['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo bannière";
                    ?>
                </label>
                <input type="file" name="photo_banniere[]" class="form-control" />
            </div>

            <?php if(isset($secteur) && $secteur->getPhotoBanniere()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/secteur/<?= $secteur->getPhotoBanniere(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active"
                               value="1" <?= isset($secteur) && $secteur->isActive() ? "checked" : "" ;?> /> Active
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>
                    <?php
                        if(isset($trad_com_secteur['EXTRAIT'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['EXTRAIT'][$_SESSION['user']->getLangue()];
                        else
                            echo "Extrait";
                    ?>
                </label>
                <textarea name="extrait" id="extrait"><?php if (isset($secteur)) echo $secteur->getExtrait(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('extrait', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>
                    <?php
                        if(isset($trad_com_secteur['TEXTE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_secteur['TEXTE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Texte";
                    ?>
                </label>
              <textarea name="texte" id="texte"><?php if (isset($secteur)) echo $secteur->getTexte(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('texte', {
                        allowedContent: true,
                        extraAllowedContent: '*[style]; span; strong; b',
                        pasteFromWordRemoveFontStyles: false,
                        pasteFromWordRemoveStyles: false,
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

        </fieldset>

        <?php if(isset($secteur)) { ?>
            <input type="hidden" name="id" value="<?= $secteur->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#secteurForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                console.log(theResponse)
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Secteur ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Secteur modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_secteur";
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
