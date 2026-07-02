<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="faqForm">

    <div class="row">
        <fieldset>
            <legend>Détails</legend>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_faq['SERVICE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_faq['SERVICE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Service";
                    ?>

                    <span class="text-danger"> * </span>
                </label>
                <select name="id_service" class="form-control chosen-select" required>
                    <option value="0">Aucun(e)</option>
                    <?php foreach($services as $service):?>
						<option value="<?php echo $service->getId(); ?>" <?php if(isset($faq) && $faq->getService()->getId() == $service->getId()) echo "selected"; ?>><?=$service->getTitre()." (".$service->getId().")"?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>
                    <?php
                        if(isset($trad_com_faq['TITRE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_faq['TITRE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Titre";
                    ?>

                    <span class="text-danger"> * </span>
                </label>
                <input name="titre" type="text" value="<?= isset($faq) ? $faq->getTitre() : "" ;?>" class="form-control" required/>
            </div>

            <div class="col-md-12 form-group" style="float:left;">
                <label>
                    <?php
                        if(isset($trad_com_faq['TEXTE'][$_SESSION['user']->getLangue()]))
                            echo $trad_com_faq['TEXTE'][$_SESSION['user']->getLangue()];
                        else
                            echo "Texte";
                    ?>

                    <span class="text-danger"> * </span>
                </label>
                <textarea name="texte" id="texte" required><?php if (isset($faq)) echo $faq->getTexte(); ?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('texte', {
                        allowedContent: true,
                        //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                        filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                    });
                </script>
            </div>

        </fieldset>

        <?php if(isset($faq)) { ?>
            <input type="hidden" name="id" value="<?= $faq->getId() ;?>" />
        <?php } ?>

    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {

        // envoi du formulaire en ajax
        $('form#faqForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                console.log(theResponse);
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
                            $loc = "index.php?option=com_faq";
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
