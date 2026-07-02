

<div class="widget widget-green">
    <div class="widget-title">
        <div class="widget-controls">
            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
        </div>
        <h3><i class="icon-table"></i> Liste des éléments</h3>
    </div>
    <div class="widget-content">
        <div class="table-responsive">

            <?php
                if(isset($_GET['id_item']))
                {
            ?>
                <input type="submit" value="Ajouter élélemnt" id='ajouter' class="btn btn-primary submit"
                    style="margin-bottom: 20px;" />
            <?php
                }
            ?>
            <table class="table table-bordered table-hover datatable">
                <caption style="text-align: left; margin-left: 7px; margin-top: 20px;">
                    <i class="fa fa-level-up fa-rotate-180" style="font-size: 25pt"></i>
                    <label for="" style="margin-left: 20px; vertical-align: top;">Avec la sélection :</label>
                    <div style="margin-left: 20px; display: inline-block; vertical-align: top;">

                    <?php if($_SESSION['user']->hasDroit('delete', 'com_reference')){ ?>
                        <a href="#0" id="delete_multiple" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" 
                        class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                    <?php } ?>
                    
                    </div>
                    
                </caption>
                <thead>
                <tr>
                    <th style="width: 118px;">
                        <input type="hidden" id="idVal">
                        <input type="checkbox" name="" id="checkAll" ><label for="checkAll">Tout cocher</label>
                    </th>
                    <th>ID</th>
                    <th>
                        <?php
                            if(isset($trad_com_reference['TITRE'][$_SESSION['user']->getLangue()]))
                                echo $trad_com_reference['TITRE'][$_SESSION['user']->getLangue()];
                            else
                                echo "Titre";
                        ?>
                    </th>
                    <th>
                        <?php
                            if(isset($trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()]))
                                echo $trad_com_reference['ORDRE'][$_SESSION['user']->getLangue()];
                            else
                                echo "Ordre";
                        ?>
                    </th>
                    <th>
                        <?php
                            if(isset($trad_com_reference['ACTION'][$_SESSION['user']->getLangue()]))
                                echo $trad_com_reference['ACTION'][$_SESSION['user']->getLangue()];
                            else
                                echo "Action";
                        ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reference_items as $reference_item): ?>
                    <tr id="row_<?= $reference_item->getId(); ?>">
                        <td>
                            <input type="checkbox" class="checkElement" value="<?php echo $reference_item->getId();?>" >
                        </td>
                        <td><?= $reference_item->getId(); ?></td>
                        <td><?= $reference_item->getTitre(); ?></td>
                        <td><?= $reference_item->getOrdre(); ?></td>
                        <td class="text-center">
                            <?php if ($_SESSION['user']->hasDroit('edit', 'com_reference')) { ?>
                                <a href="index.php?option=com_reference&task=editItem<?= "&id=".$_GET['id']."&id_item=" . $reference_item->getId(); ?>"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Modifier"
                                    class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt icon-pencil"></i></a>
                            <?php } ?>
                            <?php if ($_SESSION['user']->hasDroit('delete', 'com_reference')) { ?>
                                <a href="javascript:void(0)" id="delete_<?= $reference_item->getId(); ?>"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Supprimer"
                                    class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function () {

        $(".delete").click(function () {
            if (confirm("Voulez vous supprimer cet élément ?")) {
                var btn = $(this);
                var t = btn.attr("id").split("_");
                var id = t[1];
                var order = "id=" + id;
                $.post("components/com_reference/controleurs/router.php?task=deleteReferenceItem", order, function (theResponse) {
                    var success_msg = "Actualité supprimée avec succès.";
                    var error_msg = "Erreur lors de la suppression.";
                    if (parseInt(theResponse) === 1) {
                        $("#row_" + id).addClass("danger");
                        setTimeout(function () {
                            $("#row_" + id).remove()
                        }, 300);
                        $(".msgbox").html("<div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i> <strong>Succès </strong>" + success_msg + "</div>").slideDown();
                    } else {
                        $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur! </strong>" + error_msg + "</div>").slideDown();
                    }
                });
            }
        });

    });

    $(document).ready(function()
    {
        $("#ajouter").click(function()
        {
            location = "index.php?option=com_reference&task=addItem&id=<?= $_GET['id'] ?>";
        });

        $('#delete_multiple').click(function()
        {
            var test = false;
            var idsT = [];
            $(".checkElement").each(function()
            {
                if($(this).is(':checked'))
                {
                    test = true;
                    idsT.push($(this).val());
                }

            });


            if(test)
            {
                if(confirm("Voulez vous supprimer les éléments sélectionnés ??"))
                {
                    var ids = "(" + idsT + ")";

                    var order = 'ids=' + ids;
                    $.post(
                        "components/com_reference/controleurs/router.php?task=deleteReferenceItems", 
                        order, 
                        function(theResponse)
                        {
                            if(parseInt(theResponse) == 1)
                            {
                                
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> les references supprim&eacute;s avec succ&egrave;s</div>');	
                                $('.msgbox').slideDown();
                                for(var i = 0; i < idsT.length; i++)
                                {
                                $("#row_"+idsT[i]).addClass("danger");
                                }
                                setTimeout(function()
                                {
                                for(var i = 0; i < idsT.length; i++)
                                {
                                    $("#row_"+idsT[i]).remove();
                                }
                                },300);

                                setTimeout(function()
                                {
                                location = "";
                                },2000);
                            

                            // setTimeout(function(){$("#row_"+id).remove()},300);
                            }
                            else{
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de la suppression</div>');
                                $('.msgbox').slideDown();
                            }
                        }
                    );
                }
            }
            else
            {
                $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-remove-sign"></i> <strong>Avertissement!</strong> Aucune ligne n\'a été sélectionnée</div>');
                $('.msgbox').slideDown();
            }
        });




        $("#idVal").val($('.checkElement').eq(0).val());

        $('#checkAll').change(function()
        {
            var status = $('#checkAll').is(':checked');
            $('.checkElement').each(function()
            {
                $(this).prop('checked', status);
            });
        });

        $('.checkElement').each(function()
        {
            $(this).click(function()
            {
                if($(this).is(':checked') == false)
                {
                    $('#checkAll').prop('checked', false);
                }
                else
                {
                    var status = true;
                    $('.checkElement').each(function()
                    {
                    if($(this).is(':checked') == false)
                    {
                        status = false;
                    }
                    });

                    $('#checkAll').prop('checked', status);

                }
            });
        });

        $('body').eq(0).click(function(event)
        {

            if($("#idVal").val() != $('.checkElement').eq(0).val())
            {
                $("#idVal").val($('.checkElement').eq(0).val());

                $('#checkAll').prop('checked', false);
                $('.checkElement').each(function()
                {
                $(this).prop('checked', false);
                });
            }
        });

    });

</script>


