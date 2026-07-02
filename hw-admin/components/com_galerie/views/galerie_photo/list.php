<style>
    .connected, .sortable, .exclude, .handles {
        margin: 20px auto;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .sortable.grid {
        overflow: hidden;
        padding:0;
        margin:10px;
    }
    .connected li, .sortable li, .exclude li, .handles li {
        list-style: none;
        border: 1px solid #CCC;
        background: #F6F6F6;
        font-family: "Tahoma";
        color: #1C94C4;
        margin: 5px;
        padding: 5px;
    }
    .handles span {
        cursor: move;
    }
    li.disabled {
        opacity: 0.5;
    }
    .sortable.grid li {
        line-height: 80px;
        float: left;
        text-align: center;
        position:relative;
    }
    .sortable.grid li img{
        float:left;
    }
    li.highlight {
        background: #FEE25F;
    }
    #connected {
        width: 440px;
        overflow: hidden;
        margin: auto;
    }
    .connected {
        float: left;
        width: 200px;
    }
    .connected.no2 {
        float: right;
    }
    li.sortable-placeholder {
        border: 1px dashed #CCC;
        background: none;
		height: 100px;
		width: 100px;
    }
</style>

<div class="widget widget-green">
    <div class="widget-title">
        <div class="widget-controls">
            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
        </div>
        <h3><i class="fa fa-images"></i> Liste des photos</h3>
    </div>
    <div class="widget-content">

            <?php if(isset($_GET['id_photo'])): ?>
                <input type="submit" value="Ajouter photo" id='ajouter' class="btn btn-primary submit"
                    style="margin-bottom: 20px;" />
            <?php endif; ?>
			
			
			<form method="post" id="sort" action="components/com_galerie/controleurs/router.php?task=orderPhoto">
				<div class="msgbox"></div>
				<div class="row">
					<section>
						<ul class="sortable grid">
							<?php
							foreach ($galerie_photos as $photo) {
								?>
								<li id="pic_<?php echo $photo->getId(); ?>">
									<a href="#0" id="delete_<?php echo $photo->getId(); ?>"
									   class="btn btn-danger btn-xs deletePhoto"
									   style="position:absolute; top:-5px; right:-5px;"><i
												class="icon-remove"></i></a>
									<a href="index.php?option=com_galerie&task=editPhoto<?= "&id=".$_GET['id']."&id_photo=" . $photo->getId(); ?>"
									   class="btn btn-warning btn-xs"
									   style="position:absolute; top:-5px; right:20px;"><i
												class="icon-pencil"></i></a>
									<input type="hidden" name="ordre[]" value="<?php echo $photo->getId(); ?>"/>
									<img src="../images/galerie/<?php echo $photo->getPhoto(); ?>" width=""
										 height="90"/>
								</li>
								<?php
							}
							?>
						</ul>
					</section>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" value="Appliquer l'ordre" class="btn btn-primary submit sort"/>
						<span class="loading"></span>
					</div>
				</div>
			</form>            
    </div>
</div>

<script src="js/jquery.sortable.js"></script>
<script type="text/javascript">
    $(function () {
		
		$('.sortable').sortable();
		$('.handles').sortable({
			handle: 'span'
		});
		$('.connected').sortable({
			connectWith: '.connected'
		});
		$('.exclude').sortable({
			items: ':not(.disabled)'
		});
		
		
        $(".deletePhoto").click(function () {
            if (confirm("Voulez vous supprimer cette photo ?")) {
                var btn = $(this);
                var t = btn.attr("id").split("_");
                var id = t[1];
                var order = "id=" + id;
                $.post("components/com_galerie/controleurs/router.php?task=deleteGaleriePhoto", order, function (theResponse) {
                    var success_msg = "Photo supprimée avec succès.";
                    var error_msg = "Erreur lors de la suppression.";
                    if (parseInt(theResponse) === 1) {
                        setTimeout(function () {
                            $("#pic_" + id).remove()
                        }, 300);
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur! </strong>" + error_msg + "</div>").slideDown();
                    }
                });
            }
        });
		
		$('form#sort').ajaxForm({
			beforeSubmit: function () {
				$("#sort .loading").fadeIn();
			},
			success: function (theResponse) {
				$("#sort .loading").fadeOut();
				// messages
				var succes_msg = "Ordre mis à jour avec succès";
				var error_msg = "Erreur lors de la mise à jour";
				
				if (parseInt(theResponse) === 1) {
					$('#sort .msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + '</strong> ' + succes_msg + '</div>');
				}
				else {
					$('#sort .msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + '</strong> ' + error_msg + '</div>');
				}
			}
		})

    });

    $(document).ready(function()
    {
        $("#ajouter").click(function()
        {
            location = "index.php?option=com_galerie&task=addPhoto&id=<?= $_GET['id'] ?>";
        });

    });

</script>


