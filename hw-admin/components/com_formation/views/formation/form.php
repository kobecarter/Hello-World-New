<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="formationForm">

    <div class="row">

        <!-- ═══════════════════════════════════════════════
             SEO
        ════════════════════════════════════════════════ -->
        <fieldset style="overflow:hidden; display:block; width:100%;">
            <legend>Tags SEO</legend>
            <div class="col-md-6 form-group">
                <label>Titre SEO</label>
                <input name="seo_titre" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getSeoTitre() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Titre affiché dans les résultats Google" />
            </div>
            <div class="col-md-6 form-group">
                <label>Description SEO</label>
                <input name="seo_description" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getSeoDescription() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Description courte pour les moteurs de recherche" />
            </div>
            <div class="col-md-6 form-group">
                <label>Mots-clés SEO</label>
                <input name="seo_keyword" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getSeoKeyword() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Mots-clés séparés par des virgules" />
            </div>
            <div class="clearfix"></div>
        </fieldset>

        <div class="clearfix" style="height:10px;"></div>

        <!-- ═══════════════════════════════════════════════
             CONTENUS TEXTUELS
        ════════════════════════════════════════════════ -->
        <fieldset style="overflow:hidden; display:block; width:100%;">
            <legend>Contenus textuels</legend>

            <div class="col-md-4 form-group">
                <label>Titre <small class="text-muted">(nom interne)</small> <span class="text-danger">*</span></label>
                <input name="titre" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getTitre() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" required placeholder="Nom de gestion interne" />
            </div>

            <div class="col-md-4 form-group">
                <label>H1 <small class="text-muted">(titre visible sur la page)</small></label>
                <input name="titre_h1" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getH1() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Titre affiché aux visiteurs" />
            </div>

            <div class="col-md-4 form-group">
                <label>Slug <small class="text-muted">(généré automatiquement)</small></label>
                <input name="slug" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getSlug() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="url-de-la-formation" />
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 form-group">
                <label>Sous-titre <small class="text-muted">(accroche)</small></label>
                <textarea name="sous_titre" class="form-control" rows="3" placeholder="Accroche courte présentant la formation"><?= isset($formation) ? htmlspecialchars($formation->getSousTitre() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?></textarea>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>Extrait <small class="text-muted">(présentation courte — éditeur)</small></label>
                <textarea name="extrait" id="extrait"><?= isset($formation) ? $formation->getExtrait() : ""; ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('extrait', {
                        allowedContent: true,
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>Description <small class="text-muted">(contenu principal — éditeur)</small></label>
                <textarea name="description" id="description"><?= isset($formation) ? $formation->getDescription() : ""; ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('description', {
                        allowedContent: true,
                        extraAllowedContent: '*[style]; span; strong; b',
                        pasteFromWordRemoveFontStyles: false,
                        pasteFromWordRemoveStyles: false,
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6 form-group">
                <label>Prérequis</label>
                <textarea name="prerequis" class="form-control" rows="5" placeholder="Connaissances requises avant d'intégrer la formation"><?= isset($formation) ? htmlspecialchars($formation->getPrerequis() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?></textarea>
            </div>

            <div class="col-md-6 form-group">
                <label>Livrables</label>
                <textarea name="livrables" class="form-control" rows="5" placeholder="Ce que les participants repartiront avec (supports, certificat…)"><?= isset($formation) ? htmlspecialchars($formation->getLivrables() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?></textarea>
            </div>

            <div class="clearfix"></div>

        </fieldset>

        <div class="clearfix" style="height:10px;"></div>

        <!-- ═══════════════════════════════════════════════
             MÉDIAS
        ════════════════════════════════════════════════ -->
        <fieldset style="overflow:hidden; display:block; width:100%;">
            <legend>Médias</legend>

            <div class="col-md-4 form-group">
                <label>Photo <small class="text-muted">(vignette / carte)</small></label>
                <input type="file" name="photo[]" class="form-control" accept="image/*" />
            </div>
            <?php if (isset($formation) && $formation->getPhoto()): ?>
            <div class="col-md-2 form-group">
                <label>&nbsp;</label><br>
                <img src="../images/formations/<?= htmlspecialchars($formation->getPhoto(), ENT_QUOTES, 'UTF-8'); ?>" height="60" style="border-radius:6px;border:1px solid #ddd;" />
            </div>
            <?php endif; ?>

            <div class="col-md-4 form-group">
                <label>Photo bannière <small class="text-muted">(hero de la page)</small></label>
                <input type="file" name="photo_banniere[]" class="form-control" accept="image/*" />
            </div>
            <?php if (isset($formation) && $formation->getPhotoBanniere()): ?>
            <div class="col-md-2 form-group">
                <label>&nbsp;</label><br>
                <img src="../images/formations/<?= htmlspecialchars($formation->getPhotoBanniere(), ENT_QUOTES, 'UTF-8'); ?>" height="60" style="border-radius:6px;border:1px solid #ddd;" />
            </div>
            <?php endif; ?>

            <div class="clearfix"></div>

            <div class="col-md-4 form-group">
                <label>PDF <small class="text-muted">(programme téléchargeable)</small></label>
                <input type="file" name="pdf[]" class="form-control" accept=".pdf" />
            </div>
            <?php if (isset($formation) && $formation->getPdf()): ?>
            <div class="col-md-4 form-group" style="margin-top:26px;">
                <a href="../images/formations/<?= htmlspecialchars($formation->getPdf(), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" class="btn btn-default btn-sm">
                    <i class="icon-file-pdf-o"></i> <?= htmlspecialchars($formation->getPdf(), ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
            <?php endif; ?>

            <div class="clearfix"></div>
        </fieldset>

        <div class="clearfix" style="height:10px;"></div>

        <!-- ═══════════════════════════════════════════════
             LOGISTIQUE
        ════════════════════════════════════════════════ -->
        <fieldset style="overflow:hidden; display:block; width:100%;">
            <legend>Logistique &amp; Paramètres</legend>

            <div class="col-md-4 form-group">
                <label>Type de formation</label>
                <select name="type_formation" class="form-control">
                    <option value="presentiel" <?= (isset($formation) && $formation->getTypeFormation() == 'presentiel') ? 'selected' : ''; ?>>En présentiel</option>
                    <option value="distance"   <?= (isset($formation) && $formation->getTypeFormation() == 'distance')   ? 'selected' : ''; ?>>À distance (en ligne)</option>
                    <option value="hybride"    <?= (isset($formation) && $formation->getTypeFormation() == 'hybride')    ? 'selected' : ''; ?>>Hybride</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>Type de public</label>
                <input name="type_public" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getTypePublic() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Ex : Managers, Développeurs, Tout public…" />
            </div>

            <div class="col-md-4 form-group">
                <label>Nombre de participants <small class="text-muted">(max)</small></label>
                <input name="nb_participants" type="number" min="0" value="<?= isset($formation) ? intval($formation->getNbParticipants()) : 0; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Nombre de participants requis <small class="text-muted">(minimum pour maintenir la session)</small></label>
                <input name="nb_participants_min" type="number" min="0" value="<?= isset($formation) ? intval($formation->getNbParticipantsMin()) : 0; ?>" class="form-control" />
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4 form-group">
                <label>Date de début</label>
                <input name="date_debut" type="datetime-local" value="<?= isset($formation) && $formation->getDateDebut() ? date('Y-m-d\TH:i', strtotime($formation->getDateDebut())) : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Date de fin</label>
                <input name="date_fin" type="datetime-local" value="<?= isset($formation) && $formation->getDateFin() ? date('Y-m-d\TH:i', strtotime($formation->getDateFin())) : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Lieu <small class="text-muted">(adresse ou lien de réunion)</small></label>
                <input name="lieu" type="text" value="<?= isset($formation) ? htmlspecialchars($formation->getLieu() ?? '', ENT_QUOTES, 'UTF-8') : ""; ?>" class="form-control" placeholder="Ex : Marrakech / https://meet.google.com/..." />
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4 form-group">
                <label>Ouverture des inscriptions</label>
                <input name="date_ouverture_inscription" type="datetime-local" value="<?= isset($formation) && $formation->getDateOuvertureInscription() ? date('Y-m-d\TH:i', strtotime($formation->getDateOuvertureInscription())) : ""; ?>" class="form-control" />
            </div>

            <div class="col-md-4 form-group">
                <label>Date limite d'inscription</label>
                <input name="date_limite_inscription" type="datetime-local" value="<?= isset($formation) && $formation->getDateLimiteInscription() ? date('Y-m-d\TH:i', strtotime($formation->getDateLimiteInscription())) : ""; ?>" class="form-control" />
            </div>

            <div class="clearfix"></div>

        </fieldset>

        <div class="clearfix" style="height:10px;"></div>

        <!-- ═══════════════════════════════════════════════
             STATUTS & PUBLICATION
        ════════════════════════════════════════════════ -->
        <fieldset style="overflow:hidden; display:block; width:100%;">
            <legend>Statuts &amp; Publication</legend>

            <div class="col-md-4 form-group">
                <label>Statut de la session</label>
                <select name="status" class="form-control">
                    <option value="brouillon" <?= (isset($formation) && $formation->getStatus() == 'brouillon') ? 'selected' : (!isset($formation) ? 'selected' : ''); ?>>Brouillon</option>
                    <option value="publie"    <?= (isset($formation) && $formation->getStatus() == 'publie')    ? 'selected' : ''; ?>>Publié</option>
                    <option value="complet"   <?= (isset($formation) && $formation->getStatus() == 'complet')   ? 'selected' : ''; ?>>Complet</option>
                    <option value="archive"   <?= (isset($formation) && $formation->getStatus() == 'archive')   ? 'selected' : ''; ?>>Archivé</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <div class="checkbox" style="margin-top: 26px;">
                    <label>
                        <input type="checkbox" name="active" value="1" <?= isset($formation) && $formation->isActive() ? "checked" : ""; ?> /> Actif (visible sur le site)
                    </label>
                </div>
            </div>

            <div class="clearfix"></div>

        </fieldset>

        <?php if (isset($formation)) { ?>
            <input type="hidden" name="id" value="<?= $formation->getId(); ?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler" />
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit" />
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
$(function () {
    $('form#formationForm').ajaxForm({
        beforeSubmit: function () { $(".loading").fadeIn(); },
        success: function (theResponse) {
            $(".loading").fadeOut();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            var msgsucces = "Formation ajoutée avec succès.";
            var msgfaild  = "Erreur lors de l'ajout.";
            if ($(".submit").attr("name") === "edit") {
                msgsucces = "Formation modifiée avec succès.";
                msgfaild  = "Erreur lors de la modification.";
            }
            if (parseInt(theResponse) === 1) {
                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                setTimeout(function () {
                    <?php $loc = "index.php?option=com_formation"; if (isset($task) && $task == 'edit') $loc = ''; ?>
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
