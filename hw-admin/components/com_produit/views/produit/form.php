<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="produitForm">

    <div class="row">

        <fieldset>
            <legend>
                <?php
                    if(isset($trad_com_produit['TAGS_SEO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_produit['TAGS_SEO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Seo Tags";
                ?>
            </legend>

            <div class="col-md-6 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['TITRE_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['TITRE_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Titre";
                    ?>
                </label>
                <input name="seo_titre" type="text" value="<?= isset($produit) ? $produit->getSeoTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-6 form-group" >
                <label>
                    <?php
                        if(isset($trad_com_produit['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['DESCRIPTION_SEO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Seo Description";
                    ?>
                </label>
                <input name="seo_description" type="text" value="<?= isset($produit) ? $produit->getSeoDescription() : "" ;?>" class="form-control" />
            </div>

        </fieldset>
        <br/>
        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['CATEGORIE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['CATEGORIE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Catégorie";
                    ?>
                </label>
                <select name="id_categorie" class="form-control chosen-select">
                    <option value="0">Aucun(e)</option>
                    <?php foreach($categories as $categorie):?>
						<option value="<?php echo $categorie->getId(); ?>" <?php if(isset($produit) && $produit->getCategorie()->getId() == $categorie->getId()) echo "selected"; ?>><?=$categorie->getTitre()?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>Prix</label>
                <input name="prix" type="number" placeholder="0" value="<?= isset($produit) ? $produit->getPrix() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>Devise</label>
                <select name="devise" class="form-control chosen-select">
					<option value="MAD" <?php if(isset($produit) && $produit->getDevise() == 'MAD') echo "selected"; ?>>MAD</option>
                    <option value="$" <?php if(isset($produit) && $produit->getDevise() == '$') echo "selected"; ?>>$</option>
                    <option value="€" <?php if(isset($produit) && $produit->getDevise() == '€') echo "selected"; ?>>€</option>
                    <option value="£" <?php if(isset($produit) && $produit->getDevise() == '£') echo "selected"; ?>>£</option>
                    <option value="AED" <?php if(isset($produit) && $produit->getDevise() == 'AED') echo "selected"; ?>>AED</option>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Titre";
                    ?>
                </label>
                <input name="titre" type="text" value="<?= isset($produit) ? $produit->getTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['SOUS_TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['SOUS_TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Sous Titre";
                    ?>
                </label>
                <input name="sous_titre" type="text" value="<?= isset($produit) ? $produit->getSousTitre() : "" ;?>" class="form-control" />
            </div>
            
            <div class="col-md-3 form-group">
                <label>URL</label>
                <input name="url" type="text" value="<?= isset($produit) ? $produit->getURL() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['PHOTO'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['PHOTO'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo";
                    ?>
                </label>
                <input type="file" name="photo[]" class="form-control" />
            </div>

            <?php if(isset($produit) && $produit->getPhoto()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/produit/<?= $produit->getPhoto(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_produit['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['PHOTO_BANNIERE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Photo bannière";
                    ?>
                </label>
                <input type="file" name="photo_banniere[]" class="form-control" />
            </div>

            <?php if(isset($produit) && $produit->getPhotoBanniere()) { ?>
                <div class="col-md-3 form-group">
                    <img src="../images/produit/<?= $produit->getPhotoBanniere(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-3 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active"
                               value="1" <?= isset($produit) && $produit->isActive() ? "checked" : "" ;?> /> Active
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>
                    <?php
                        if(isset($trad_com_produit['EXTRAIT'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['EXTRAIT'][$_SESSION['user']->getLangue()];
                        else
                            echo "Extrait";
                    ?>
                </label>
                <textarea name="extrait" id="extrait"><?php if (isset($produit)) echo $produit->getExtrait(); ?></textarea>
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
                        if(isset($trad_com_produit['TEXTE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_produit['TEXTE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Texte";
                    ?>
                </label>
                <textarea name="texte" id="texte"><?php if (isset($produit)) echo $produit->getTexte(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('texte', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

        </fieldset>

        <?php if(isset($produit)) { ?>
            <input type="hidden" name="id" value="<?= $produit->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#produitForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Article ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Article modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_produit";
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
