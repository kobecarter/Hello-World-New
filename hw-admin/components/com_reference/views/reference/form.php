<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="referenceForm">

    <div class="row">

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['NOM_CLIENT'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['NOM_CLIENT'][$_SESSION['user']->getLangue()];
                    else
                        echo "Nom client";
                ?>
            </label>
            <input name="nom_client" type="text" value="<?= isset($reference) ? $reference->getNomClient() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['SITE_WEB'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['SITE_WEB'][$_SESSION['user']->getLangue()];
                    else
                        echo "Site web";
                ?>
            </label>
            <input name="site_web" type="text" value="<?= isset($reference) ? $reference->getSiteWeb() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>Secteur</label>
            <input name="secteur" type="text" value="<?= isset($reference) ? $reference->getSecteur() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>Durée</label>
            <input name="duree" type="text" value="<?= isset($reference) ? $reference->getDuree() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>Services</label>
            <input name="services" type="text" value="<?= isset($reference) ? $reference->getService() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-6 form-group" style="float:left;">
            <label>
                <?php
                    if(isset($trad_com_reference['EXTRAIT'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['EXTRAIT'][$_SESSION['user']->getLangue()];
                    else
                        echo "Extrait";
                ?>
            </label>
            <textarea name="extrait" class="form-control"
                id="extrait"><?php if (isset($reference)) echo $reference->getExtrait(); ?></textarea>
        </div>
		
		<div class="clearfix"></div>
		<div class="col-md-12 form-group">
            <h3>Secteur d'activité</h3>
            <textarea name="secteur_activite" id="secteur_activite"><?php if (isset($reference)) echo $reference->getSecteurActivite(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('secteur_activite', {
                    allowedContent: true,
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>
		
		<div class="col-md-12 form-group">
            <h3>Historique de collaboration</h3>
            <textarea name="historique_collaboration" id="historique_collaboration"><?php if (isset($reference)) echo $reference->getHistoriqueCollaboration(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('historique_collaboration', {
                    allowedContent: true,
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>
		
		<div class="col-md-12 form-group">
            <h3>Resultat</h3>
            <textarea name="resultat" id="resultat"><?php if (isset($reference)) echo $reference->getResultat(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('resultat', {
                    allowedContent: true,
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['PHOTO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['PHOTO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Photo";
                ?>
            </label>
            <input type="file" name="photo[]" class="form-control" />
        </div>

        <?php if(isset($reference) && $reference->getPhoto()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/references/<?= $reference->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['LOGO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['LOGO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Logo";
                ?>
            </label>
            <input type="file" name="logo[]" class="form-control" />
        </div>

        <?php if(isset($reference) && $reference->getLogo()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/references/<?= $reference->getLogo(); ?>" height="60" />
            </div>
        <?php } ?>

        <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                        value="1" <?= isset($reference) && $reference->isActive() ? "checked" : "" ;?> /> 
                    <?php
                        if(isset($trad_com_reference['ACTIVE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_reference['ACTIVE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Active";
                    ?>
                </label>
            </div>
        </div>

		<div class="col-md-12 form-group" style="float:left;">
            <label>
                <?php
                    if(isset($trad_com_reference['DESCRIPTION'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['DESCRIPTION'][$_SESSION['user']->getLangue()];
                    else
                        echo "Description";
                ?>
            </label>
            <textarea name="description" id="description"><?php if (isset($reference)) echo $reference->getDescription(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('description', {
                    allowedContent: true,
                    //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>
    

        <?php if(isset($reference)) { ?>
            <input type="hidden" name="id" value="<?= $reference->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#referenceForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Reference ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Reference modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_reference";
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
