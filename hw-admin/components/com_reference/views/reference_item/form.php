<form method="post" action="<?= $action; ?>" enctype="multipart/form-data" class="validateForm" id="referenceItemForm">

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
            <input name="titre" type="text" value="<?= isset($reference_item) ? $reference_item->getTitre() : "" ;?>" class="form-control" />
        </div>
		
		<div class="col-md-3 form-group">
            <label>Sous titre</label>
            <input name="soustitre" type="text" value="<?= isset($reference_item) ? $reference_item->getSousTitre() : "" ;?>" class="form-control" />
        </div>
        
        <div class="col-md-3 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['SERVICE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['SERVICE'][$_SESSION['user']->getLangue()];
                    else
                        echo "service";
                ?>
            </label>
            <select name="service" class="form-control chosen-select service-select">
                <option value="0">Aucun(e)</option>
                <?php 
				$services = reference::getServices();
				foreach ($services as $service): 
                ?>
				<?php $sl = isset($reference_item) && $reference_item->getService() == $service ? "selected" : ""; ?>
				<option value="<?= $service; ?>" <?= $sl; ?> ><?= $service; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-md-3 form-group item-ref item-shooting">
            <label>
                <?php
                    if(isset($trad_com_reference['GALERIE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['GALERIE'][$_SESSION['user']->getLangue()];
                    else
                        echo "galerie";
                ?>
            </label>
			<a href="index.php?option=com_galerie&task=add" target="_blank" class="btn btn-success btn-xs pull-right" data-toggle="tooltip" data-placement="top" data-original-title="Ajouter galerie">+ <i class="fa fa-images"></i></a>
            <select name="id_galerie" class="form-control chosen-select">
                <option value="0">Aucun(e)</option>
                <?php foreach ($galeries as $galerie): ?>
                    <?php $sl = isset($reference_item) && $reference_item->getGalerie()->getId() == $galerie->getId() ? "selected" : ""; ?>
                     <option value="<?php echo $galerie->getId(); ?>" <?php echo $sl; ?> ><?php echo $galerie->getTitre(); ?></option> 
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-md-3 form-group item-ref item-video">
            <label>
                <?php
                    if(isset($trad_com_reference['VIDEO'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['VIDEO'][$_SESSION['user']->getLangue()];
                    else
                        echo "video";
                ?>
            </label>
			
			<a href="index.php?option=com_video&task=add" target="_blank" class="btn btn-success btn-xs pull-right" data-toggle="tooltip" data-placement="top" data-original-title="Ajouter vidéo">+ <i class="fa fa-play"></i></a>
			
            <select name="id_video" class="form-control chosen-select">
                <option value="0">Aucun(e)</option>
                <?php foreach ($videos as $video): ?>
                    <?php $sl = isset($reference_item) && $reference_item->getVideo()->getId() == $video->getId() ? "selected" : ""; ?>
                     <option value="<?php echo $video->getId(); ?>" <?php echo $sl; ?> ><?php echo $video->getTitre(); ?></option> 
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-md-3 form-group item-ref item-website item-mobile item-print">
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

        <?php if(isset($reference_item) && $reference_item->getPhoto()) { ?>
            <div class="col-md-1 form-group item-ref item-website item-mobile item-print">
                <img src="../images/references/<?= $reference_item->getPhoto(); ?>" height="60" />
            </div>
        <?php } ?>
        
        <div class="col-md-3 form-group item-ref item-print">
            <label>
                <?php
                    if(isset($trad_com_reference['PDF'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['PDF'][$_SESSION['user']->getLangue()];
                    else
                        echo "Pdf";
                ?>
            </label>
            <input type="file" name="pdf[]" class="form-control"/>
        </div>

        <?php if(isset($reference_item) && $reference_item->getPDF()) { ?>
            <div class="col-md-1 form-group item-ref item-print">
                <a href="../images/references/<?= $reference_item->getPDF()?>" target="_blank">
                    <i style="font-size: 24pt; color: red" class="fa fa-file-pdf-o"></i>
                </a>
            </div>
        <?php } ?>

        <div class="col-md-2 form-group">
            <label>
                <?php
                    if(isset($trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()]))
                        echo $trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()];
                    else
                        echo "Ordre";
                ?>
            </label>
            <input name="ordre" type="number" value="<?= isset($reference_item) ? $reference_item->getOrdre() : "" ;?>" class="form-control" />
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
                ><?php if (isset($reference_item)) echo $reference_item->getDescription(); ?></textarea>
        </div>
        

        <?php if(isset($reference_item)) { ?>
            <input type="hidden" name="id" value="<?= $reference_item->getId() ;?>" />
        <?php } ?>



    </div>

    <input type="reset" class="btn btn-default" value="Annuler"/>
    <input type="submit" name="<?= $submitName; ?>" value="<?= $submitValue; ?>" class="btn btn-primary submit"/>
    <span class="loading"><img src="../images/loading.gif" /></span>

</form>

<script>
    $(function () {
		
		$(".item-ref").hide();
		
		$(".service-select").change(function(){
			$(".item-ref").hide();
			switch($(this).val()){
				case 'website' : $(".item-website").show(); break;
				case 'mobile' : $(".item-mobile").show(); break;
				case 'shooting' : $(".item-shooting").show(); $(".item-shooting .chosen-container").width("100%"); break;
				case 'print' : $(".item-print").show(); break;
				case 'video' : $(".item-video").show(); $(".item-video .chosen-container").width("100%"); break;
			}
		})
		
		<?php if(isset($reference_item)): ?>
			$(".item-<?php echo $reference_item->getService(); ?>").show();
		<?php endif; ?>
		
        // envoi du formulaire en ajax
        $('form#referenceItemForm').ajaxForm({
            beforeSubmit: function () {
                $(".loading").fadeIn();
            },
            success: function (theResponse) {
                $(".loading").fadeOut();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                var msgvide = "Veuillez remplir Les champs obligatoires !";
                var msgsucces = "élément ajouté avec succès.";
                var msgfaild = "Erreur lors de l'ajout.";
                if($(".submit").attr("name") === "edit"){
                    msgsucces = "élément modifié avec succès.";
                    msgfaild = "Erreur lors de la modification.";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>').slideDown();
                    setTimeout(function(){
                    
                        <?php
                            $loc = "index.php?option=com_reference&task=addItem&id=" . $_GET['id'];
                            if($task == 'editItem')
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
