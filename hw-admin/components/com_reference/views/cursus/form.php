<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="cursusForm">

    <div class="row">

        <input type="hidden" name="id_reference" value="<?= $_GET['id']; ?>">
        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['TITRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['TITRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Titre";
                ?>
            </label>
            <input name="titre" type="text" value="<?= isset($cursus) ? $cursus->getTitre() : "" ;?>" class="form-control" />
        </div>

		<div class="col-md-2 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Ordre";
                ?>
            </label>
            <input name="ordre" type="number" value="<?= isset($cursus) ? $cursus->getOrdre() : "" ;?>" class="form-control" />
        </div>

        <div class="col-md-6 form-group" style="float:left;">
            <label>
                <?php
                    if(isset($trad_com_reference['DESCRIPTION'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['DESCRIPTION'][$_SESSION['user']->getLangue()];
                    else
                        echo "Description";
                ?>
            </label>
            <textarea name="description" class="form-control" id="description"
                ><?php if (isset($cursus)) echo $cursus->getDescription(); ?></textarea>
        </div>
        

        <?php if(isset($cursus)) { ?>
            <input type="hidden" name="id" value="<?= $cursus->getId() ;?>" />
        <?php } ?>



    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {
		
        // envoi du formulaire en ajax
        $('form#cursusForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Cursus ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Cursus modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_reference&task=addCursus&id=" . $_GET['id'];
                            if($task == 'editCursus')
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
