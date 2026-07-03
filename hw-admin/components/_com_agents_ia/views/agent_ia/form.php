<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="agentIaForm">

    <div class="row">

        <fieldset>
            <legend>Tags SEO</legend>
            <div class="col-md-6 form-group">
                <label>Titre SEO</label>
                <input name="seo_titre" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSeoTitre() : ""; ?>" class="form-control" />
            </div>
            <div class="col-md-6 form-group">
                <label>Description SEO</label>
                <input name="seo_description" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSeoDescription() : ""; ?>" class="form-control" />
            </div>
        </fieldset>

        <br/>

        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-4 form-group">
                <label>Titre <span class="text-danger">*</span></label>
                <input name="titre" type="text" value="<?= isset($agent_ia) ? $agent_ia->getTitre() : ""; ?>" class="form-control" required />
            </div>

            <div class="col-md-4 form-group">
                <label>H1 <small class="text-muted">(si différent du titre)</small></label>
                <input name="h1" type="text" value="<?= isset($agent_ia) ? htmlspecialchars($agent_ia->getH1(), ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Slug</label>
                <input name="slug" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSlug() : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Sous-titre</label>
                <input name="sous_titre" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSousTitre() : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Secteurs d'activité <small class="text-muted">(Ctrl+clic pour plusieurs)</small></label>
                <select name="id_secteur[]" class="form-control" multiple style="height:120px;">
                    <?php
                    $selectedSecteurs = isset($agent_ia) ? $agent_ia->getSecteurIds() : [];
                    foreach ($secteurs as $secteur): ?>
                    <option value="<?= $secteur->getId(); ?>"
                        <?= in_array($secteur->getId(), $selectedSecteurs) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($secteur->getTitre(), ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>Photo principale</label>
                <input type="file" name="photo[]" class="form-control" />
                <?php if (isset($agent_ia) && $agent_ia->getPhoto()): ?>
                    <img src="../images/agents_ia/<?= $agent_ia->getPhoto(); ?>" height="50" class="mt-1" />
                <?php endif; ?>
            </div>

            <div class="col-md-4 form-group">
                <label>Photo bannière</label>
                <input type="file" name="photo_banniere[]" class="form-control" />
                <?php if (isset($agent_ia) && $agent_ia->getPhotoBanniere()): ?>
                    <img src="../images/agents_ia/<?= $agent_ia->getPhotoBanniere(); ?>" height="50" class="mt-1" />
                <?php endif; ?>
            </div>

            <div class="col-md-4 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active" value="1" <?= isset($agent_ia) && $agent_ia->isActive() ? "checked" : ""; ?> /> Actif
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>Extrait (short description)</label>
                <textarea name="extrait" id="extrait"><?php if (isset($agent_ia)) echo $agent_ia->getExtrait(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('extrait', {
                        allowedContent: true,
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>Contenu principal</label>
                <textarea name="texte" id="texte"><?php if (isset($agent_ia)) echo $agent_ia->getTexte(); ?></textarea>
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

        <?php if (isset($agent_ia)) { ?>
            <input type="hidden" name="id" value="<?= $agent_ia->getId(); ?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
$(function () {
    $('form#agentIaForm').ajaxForm({
        beforeSubmit: function () { $(".loading").fadeIn(); },
        success: function (theResponse) {
            $(".loading").fadeOut();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            var msgsucces = "Agent IA ajouté avec succès.";
            var msgfaild  = "Erreur lors de l'ajout.";
            if ($(".submit").attr("name") === "edit") {
                msgsucces = "Agent IA modifié avec succès.";
                msgfaild  = "Erreur lors de la modification.";
            }
            if (parseInt(theResponse) === 1) {
                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                setTimeout(function () {
                    <?php $loc = "index.php?option=com_agents_ia"; if ($task == 'edit') $loc = ''; ?>
                    document.location = "<?= $loc ?>";
                }, 3000);
            } else if (parseInt(theResponse) === 0) {
                $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Attention!</strong> Veuillez remplir les champs obligatoires !</div>').slideDown();
            } else {
                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> ' + msgfaild + '</div>').slideDown();
            }
        }
    });
});
</script>
