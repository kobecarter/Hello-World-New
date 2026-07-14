<style>
#agentIaForm fieldset { margin-bottom: 1.8rem; }
#agentIaForm legend { font-size: 1rem; font-weight: 700; margin-bottom: 1.2rem; }

/* ── Photos & Médias — grille de cartes ── */
.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 18px;
    margin-top: 4px;
}
.photo-card {
    border: 1px solid #e2e5e9;
    border-radius: 10px;
    background: #fff;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: border-color .2s, box-shadow .2s;
}
.photo-card:hover { border-color: #b9c0c9; box-shadow: 0 4px 14px rgba(0,0,0,.06); }
.photo-card-preview {
    height: 130px;
    background: #f4f6f8;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    border-bottom: 1px solid #e2e5e9;
}
.photo-card-preview img { max-width: 100%; max-height: 100%; object-fit: contain; }
.photo-card-preview .photo-card-placeholder { color: #b3bac2; font-size: 2rem; }
.photo-card-body { padding: 12px 14px 14px; display: flex; flex-direction: column; gap: 6px; flex: 1; }
.photo-card-label { font-weight: 600; font-size: .92rem; margin: 0; }
.photo-card-hint { font-size: .76rem; color: #8a9099; margin: 0 0 4px; line-height: 1.4; }
.photo-card-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-size: .8rem;
    padding: 7px 10px;
    border: 1px dashed #b9c0c9;
    border-radius: 6px;
    cursor: pointer;
    color: #4a5561;
    transition: background .2s, border-color .2s;
    margin-top: auto;
}
.photo-card-btn:hover { background: #f4f6f8; border-color: #6c93e0; color: #34495e; }
.photo-card-btn input[type="file"] { display: none; }
.photo-card-filename { font-size: .72rem; color: #6c93e0; word-break: break-all; }
</style>

<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="agentIaForm">

    <div class="row">

        <fieldset>
            <legend>Référencement (SEO)</legend>
            <div class="col-md-4 form-group">
                <label>Titre SEO</label>
                <input name="seo_titre" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSeoTitre() : ""; ?>" class="form-control" />
            </div>
            <div class="col-md-4 form-group">
                <label>Description SEO</label>
                <input name="seo_description" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSeoDescription() : ""; ?>" class="form-control" />
            </div>
            <div class="col-md-4 form-group">
                <label>Mots-clés SEO</label>
                <input name="seo_keyword" type="text" value="<?= isset($agent_ia) ? $agent_ia->getSeoKeyword() : ""; ?>" class="form-control" />
            </div>
        </fieldset>

        <fieldset>
            <legend>Informations générales</legend>

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
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active" value="1" <?= isset($agent_ia) && $agent_ia->isActive() ? "checked" : ""; ?> /> Actif
                    </label>
                </div>
            </div>

        </fieldset>

        <fieldset>
            <legend>Photos &amp; Médias</legend>
            <div class="col-md-12">
                <div class="photo-grid">

                    <?php
                    $photoFields = [
                        [
                            'name'  => 'photo',
                            'label' => 'Photo principale',
                            'hint'  => 'Centre du cercle "Se connecte à votre stack"',
                            'value' => isset($agent_ia) ? $agent_ia->getPhoto() : '',
                        ],
                        [
                            'name'  => 'photo_produit',
                            'label' => 'Photo produit',
                            'hint'  => 'Carte affichée sur la page /agents-ia/',
                            'value' => isset($agent_ia) ? $agent_ia->getPhotoProduit() : '',
                        ],
                        [
                            'name'  => 'photo_hero',
                            'label' => 'Photo Hero',
                            'hint'  => 'Image affichée dans le hero de la page agent',
                            'value' => isset($agent_ia) ? $agent_ia->getPhotoHero() : '',
                        ],
                        [
                            'name'  => 'photo_banniere',
                            'label' => 'Photo bannière',
                            'hint'  => 'Fond plein écran du hero (remplace le hero par défaut)',
                            'value' => isset($agent_ia) ? $agent_ia->getPhotoBanniere() : '',
                        ],
                        [
                            'name'  => 'photo_full_body',
                            'label' => 'Photo Full Body',
                            'hint'  => 'Image moitié floutée, section capacités',
                            'value' => isset($agent_ia) ? $agent_ia->getPhotoFullBody() : '',
                        ],
                    ];
                    foreach ($photoFields as $pf):
                        $inputId = 'photo-input-' . $pf['name'];
                    ?>
                    <div class="photo-card">
                        <div class="photo-card-preview" data-preview-for="<?= $inputId; ?>">
                            <?php if ($pf['value']): ?>
                                <img src="../images/agents_ia/<?= $pf['value']; ?>" alt="<?= $pf['label']; ?>" />
                            <?php else: ?>
                                <span class="photo-card-placeholder"><i class="fal fa-image"></i></span>
                            <?php endif; ?>
                        </div>
                        <div class="photo-card-body">
                            <p class="photo-card-label"><?= $pf['label']; ?></p>
                            <p class="photo-card-hint"><?= $pf['hint']; ?></p>
                            <label class="photo-card-btn" for="<?= $inputId; ?>">
                                <i class="fal fa-upload"></i> Choisir un fichier
                                <input type="file" id="<?= $inputId; ?>" name="<?= $pf['name']; ?>[]" accept="image/*" />
                            </label>
                            <span class="photo-card-filename"></span>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Contenu éditorial</legend>

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
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html',
                        // Empêche CKEditor de supprimer les icônes vides (<i class="fa...">) et les
                        // points d'anneau/orbite lors de l'édition — protégés tels quels.
                        protectedSource: [
                            /<i\b[^>]*class="[^"]*\bfa[a-z]?\b[^"]*"[^>]*>\s*<\/i>/gi,
                            /<span\b[^>]*class="[^"]*\baic-orbit-dot\b[^"]*"[^>]*>\s*<\/span>/gi,
                            /<a\b[^>]*class="[^"]*\bsb\b[^"]*"[\s\S]*?<\/a>/gi
                        ]
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
    // Aperçu instantané des photos choisies + nom du fichier
    $('.photo-card input[type="file"]').on('change', function () {
        var input = this;
        var $card = $(input).closest('.photo-card');
        $card.find('.photo-card-filename').text(input.files && input.files[0] ? input.files[0].name : '');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $card.find('.photo-card-preview').html('<img src="' + e.target.result + '" alt="" />');
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

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
