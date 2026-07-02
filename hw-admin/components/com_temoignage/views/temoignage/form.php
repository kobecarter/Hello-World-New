<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="temoignageForm">

    <div class="row">
        
        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['NOM'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['NOM'][$_SESSION['user']->getLangue()];
                    else
                        echo "Nom";
                ?>
            </label>
            <input name="nom" type="text" value="<?= isset($temoignage) ? $temoignage->getNom() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['FONCTION'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['FONCTION'][$_SESSION['user']->getLangue()];
                    else
                        echo "Fonction";
                ?>
            </label>
            <input name="fonction" type="text" value="<?= isset($temoignage) ? $temoignage->getFonction() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['EMAIL'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['EMAIL'][$_SESSION['user']->getLangue()];
                    else
                        echo "E-mail";
                ?>
            </label>
            <input name="email" type="email" value="<?= isset($temoignage) ? $temoignage->getEmail() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['SUJET'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['SUJET'][$_SESSION['user']->getLangue()];
                    else
                        echo "Sujet";
                ?>
            </label>
            <input name="sujet" type="text" value="<?= isset($temoignage) ? $temoignage->getSujet() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-6 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['TEMOIGNAGE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['TEMOIGNAGE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Temoignage";
                ?>
            </label>
            <textarea class="form-control" id="temoignage"
                name="temoignage"><?php if (isset($temoignage)) echo $temoignage->getTemoignage(); ?></textarea>
        </div>
        
        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['PHOTO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['PHOTO'][$_SESSION['user']->getLangue()];
                    else
                        echo "Photo";
                ?>
            </label>
            <input type="file" name="photo[]" class="form-control" />
        </div>

        <?php if(isset($temoignage) && $temoignage->getPhoto()) { ?>
            <div class="col-md-2 form-group">
                <img src="../images/temoignages/<?= $temoignage->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>

        <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="active"
                            value="1" <?= isset($temoignage) && $temoignage->isActive() ? "checked" : "" ;?> /> Active
                </label>
            </div>
        </div>
         <div class="col-md-1 form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="global"
                            value="1" <?= isset($temoignage) && $temoignage->isGlobal() ? "checked" : "" ;?> /> Global
                </label>
            </div>
        </div>

    </div>
    
    <div class="row">

        

        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_temoignage['ORDRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_temoignage['ORDRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Ordre";
                ?>
            </label>
            <input name="ordre" type="number" value="<?= isset($temoignage) ? $temoignage->getOrdre() : "" ;?>" class="form-control" />
        </div>
        

        <?php if(isset($temoignage)) { ?>
            <input type="hidden" name="id" value="<?= $temoignage->getId() ;?>" />
        <?php } ?>



    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#temoignageForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Temoignage ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Temoignage modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_temoignage";
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
