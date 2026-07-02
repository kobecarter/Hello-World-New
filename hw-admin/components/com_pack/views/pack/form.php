<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="packForm">

    <div class="row">
        
        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_pack['service'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['service'][$_SESSION['user']->getLangue()];
                    else
                        echo "service";
                ?>
            </label>
            
            <select name="id_service" class="form-control chosen-select">
                <option value="0">Aucun(e)</option>
                <?php 
                
                    $services = service::findAll($_SESSION['langue'], true);
                    foreach ($services as $service): 
                ?>
                    <?php if(isset($pack) && $service->getId() == $pack->getId()) continue; ?>
                    <?php $sl = isset($pack) && $pack->getService()->getId() == $service->getId() ? "selected" : ""; ?>
                    <option value="<?= $service->getId(); ?>" <?= $sl; ?> ><?= $service->getTitre(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_pack['TITRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['TITRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Titre";
                ?>
            </label>
            <input name="titre" type="text" value="<?= isset($pack) ? $pack->getTitre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-2 form-group">
            <label>
                <?php
                    if(isset($trad_com_pack['PRIX'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['PRIX'][$_SESSION['user']->getLangue()];
                    else
                        echo "Prix";
                ?>
            </label>
            <input name="prix" type="number" value="<?= isset($pack) ? $pack->getPrix() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-2 form-group">
            <label>
                <?php
                    if(isset($trad_com_pack['ORDRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['ORDRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Ordre";
                ?>
            </label>
            <input name="ordre" type="number" value="<?= isset($pack) ? $pack->getOrdre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                            value="1" <?= isset($pack) && $pack->isActive() ? "checked" : "" ;?> /> Active
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="populaire" value="1" <?= isset($pack) && $pack->isPopulaire() ? "checked" : "" ;?> /> Populaire
                </label>
            </div>
        </div>

        <div class="col-md-3 form-group">
            <label>Photo</label>
            <input type="file" name="photo[]" class="form-control" />
        </div>

        <?php if(isset($pack) && $pack->getPhoto()) { ?>
            <div class="col-md-3 form-group">
                <img src="../images/packs/<?= $pack->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>

        <div class="col-md-12 form-group" style="float:left;">
            <label>
                <?php
                    if(isset($trad_com_pack['DESCRIPTION'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['DESCRIPTION'][$_SESSION['user']->getLangue()];
                    else
                        echo "Description";
                ?>
            </label>
            <textarea name="description" id="description"><?php if (isset($pack)) echo $pack->getDescription(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('description', {
                    allowedContent: true,
                    //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>

        <div class="col-md-12 form-group" style="float:left;">
            <label>
                <?php
                    if(isset($trad_com_pack['DETAILS'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_pack['DETAILS'][$_SESSION['user']->getLangue()];
                    else
                        echo "Détails";
                ?>
            </label>
            <textarea name="details" id="details"><?php if (isset($pack)) echo $pack->getDetails(); ?></textarea>
            <script type="text/javascript">
                CKEDITOR.replace('details', {
                    allowedContent: true,
                    //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                });
            </script>
        </div>
        

        <?php if(isset($pack)) { ?>
            <input type="hidden" name="id" value="<?= $pack->getId() ;?>" />
        <?php } ?>



    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#packForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Pack ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Pack modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_pack";
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
