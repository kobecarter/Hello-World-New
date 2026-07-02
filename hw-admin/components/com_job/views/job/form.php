<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="jobForm">

    <div class="row">

        <br/>
        <fieldset>
            <div class="col-md-4 form-group">
                <label>Titre</label>
                <input name="titre" type="text" value="<?= isset($job) ? $job->getTitre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-2 form-group">
                <label>Ordre</label>
                <input name="ordre" type="number" value="<?= isset($job) ? $job->getOrdre() : "" ;?>" class="form-control" />
            </div>

            <div class="col-md-3 form-group">
                <label>Photo</label>
                <input type="file" name="photo[]" class="form-control" />
            </div>

            <?php if(isset($job) && $job->getPhoto()) { ?>
                <div class="col-md-2 form-group">
                    <img src="../images/jobs/<?= $job->getPhoto(); ?>" height="60" />
                </div>
            <?php } ?>

            <div class="col-md-1 form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="active"value="1" 
                            <?= isset($job) && $job->isActive() ? "checked" : "" ;?> /> Active
                    </label>
                </div>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>Description</label>
                <textarea name="description" id="description"><?php if (isset($job)) echo $job->getDescription(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('description', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

        </fieldset>

        <?php if(isset($job)) { ?>
            <input type="hidden" name="id" value="<?= $job->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#jobForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "Offre ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "Offre modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_job";
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
