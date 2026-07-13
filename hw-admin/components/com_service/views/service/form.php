<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="serviceForm">

    <div class="row">

        <fieldset>
            <legend>
                <?php
                    if(isset($trad_com_service['TAGS_SEO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_service['TAGS_SEO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Seo Tags";
                ?>
            </legend>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['TITRE_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['TITRE_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Titre";
                    ?>
                </label>
                <input name="seo_titre" type="text" value="<?= isset($service) ? $service->getSeoTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group" >
                <label>
                    <?php
                        if(isset($trad_com_service['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Description";
                    ?>
                </label>
                <input name="seo_description" type="text" value="<?= isset($service) ? $service->getSeoDescription() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group" >
                <label>
                    <?php
                        if(isset($trad_com_service['KEYWORD_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['KEYWORD_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Keyword";
                    ?>
                </label>
                <input name="seo_keyword" type="text" value="<?= isset($service) ? $service->getSeoKeyword() : "" ;?>" class="form-control" />
            </div>
			
			<div class="col-md-3 form-group" >
                <label>H1</label>
                <input name="h1" type="text" value="<?= isset($service) ? $service->getH1() : "" ;?>" class="form-control" />
            </div>

        </fieldset>
        <br/>
        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['SERVICE_PARENT'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['SERVICE_PARENT'][$_SESSION['user']->getLangue()];
                        else
                            echo "Service parent";
                    ?>
                </label>
                <select name="id_parent" class="form-control chosen-select">
                    <option value="0">Aucun(e)</option>
                    <?php foreach ($parents as $parent): ?>
                        <?php if(isset($service) && $parent->getId() == $service->getId()) continue; ?>
                        <?php $sl = isset($service) && $service->getParent()->getId() == $parent->getId() ? "selected" : ""; ?>
                        <?php
                            // Indentation visuelle selon la profondeur (service racine, enfant, petit-enfant...)
                            $depth = 0;
                            $ancestor = $parent->getParent();
                            while ($ancestor->getId()) {
                                $depth++;
                                $ancestor = $ancestor->getParent();
                            }
                            $indent = str_repeat('— ', $depth);
                        ?>
                        <option value="<?= $parent->getId(); ?>" <?= $sl; ?> ><?= $indent . $parent->getTitre(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['SLIDER'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['SLIDER'][$_SESSION['user']->getLangue()];
                        else
                            echo "Slider";
                    ?>
                </label>
                <select name="id_slider" class="form-control chosen-select">
                    <option value="0">Aucun(e)</option>
                    <?php
                        $SQLselect = "SELECT id FROM ".__prefixe_db__."slider";
                        $result = $db->queryS($SQLselect);
                        foreach($result as $data)
                        {
                            $ss = new slider($data['id'],$db);
                            ?>
                            <option value="<?php echo $ss->getId(); ?>" <?php if(isset($service) && $service->getSlider()->getId() == $ss->getId()) echo "selected"; ?>><?=$ss->getTitre()?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Titre";
                    ?>
                </label>
                <input name="titre" type="text" value="<?= isset($service) ? $service->getTitre() : "" ;?>" class="form-control" />
            </div>
            
            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['SLUG'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['SLUG'][$_SESSION['user']->getLangue()];
                        else
                            echo "slug";
                    ?>
                </label>
                <input name="slug" type="text" value="<?= isset($service) ? $service->getSlug() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['SOUS_TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['SOUS_TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Sous Titre";
                    ?>
                </label>
                <input name="sous_titre" type="text" value="<?= isset($service) ? $service->getSousTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['PHOTO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['PHOTO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo";
                    ?>
                </label>
                <input type="file" name="photo[]" class="form-control" />
            </div>

            <?php if(isset($service) && $service->getPhoto()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/services/<?= $service->getPhoto(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo bannière";
                    ?>
                </label>
                <input type="file" name="photo_banniere[]" class="form-control" />
            </div>

            <?php if(isset($service) && $service->getPhotoBanniere()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/services/<?= $service->getPhotoBanniere(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['PHOTO_HERO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['PHOTO_HERO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo hero";
                    ?>
                </label>
                <input type="file" name="photo_hero[]" class="form-control" />
            </div>

            <?php if(isset($service) && $service->getPhotoHero()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/services/<?= $service->getPhotoHero(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-6 form-group">
                <label>
                    <?php
                        if(isset($trad_com_service['TEXTE_ACCUEIL'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['TEXTE_ACCUEIL'][$_SESSION['user']->getLangue()];
                        else
                            echo "Texte accueil";
                    ?>
                </label>
                <textarea class="form-control" id="texte_accueil"
                    name="texte_accueil"><?php if (isset($service)) echo $service->getTexteAccueil(); ?></textarea>
            </div>

			<div class="col-md-2 form-group" >
                <label>Ordre</label>
                <input name="ordre" type="number" value="<?= isset($service) ? $service->getOrdre() : "" ;?>" class="form-control" />
            </div>
			
            <div class="col-md-2 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active"
                               value="1" <?= isset($service) && $service->isActive() ? "checked" : "" ;?> /> Active
                    </label>
                </div>
            </div>

            <div class="col-md-2 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="home"
                               value="1" <?= isset($service) && $service->isHome() ? "checked" : "" ;?> /> Home
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>
                    <?php
                        if(isset($trad_com_service['EXTRAIT'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['EXTRAIT'][$_SESSION['user']->getLangue()];
                        else
                            echo "Extrait";
                    ?>
                </label>
                <textarea name="extrait" id="extrait"><?php if (isset($service)) echo $service->getExtrait(); ?></textarea>
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
                        if(isset($trad_com_service['TEXTE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_service['TEXTE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Texte";
                    ?>
                </label>
                <textarea name="texte" id="texte"><?php if (isset($service)) echo $service->getTexte(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('texte', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html',
                        // Empêche CKEditor de "nettoyer" (supprimer) les icônes vides (<i class="fa...">)
                        // et les boutons stylés (class="sb ...") lors de l'édition — ils sont
                        // protégés tels quels au lieu d'être passés dans son filtre HTML.
                        protectedSource: [
                            /<i\b[^>]*class="[^"]*\bfa[a-z]?\b[^"]*"[^>]*>\s*<\/i>/gi,
                            /<a\b[^>]*class="[^"]*\bsb\b[^"]*"[\s\S]*?<\/a>/gi
                        ]
                    });
                </script>
            </div>

        </fieldset>

        <?php if(isset($service)) { ?>
            <input type="hidden" name="id" value="<?= $service->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#serviceForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                console.log(theResponse)
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Service ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Service modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_service";
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
