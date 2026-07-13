<div class="sub-sidebar-wrapper">
    <ul>
        <?php if ($_SESSION['user']->hasDroit('add', 'com_service')) { ?>
            <li><a href="index.php?option=com_service&task=add"> Ajouter service</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']->hasDroit('view', 'com_service')) { ?>
            <li><a href="index.php?option=com_service"> Liste des services</a></li>
        <?php } ?>
    </ul>
</div>

<div class="main-content">

    <ol class="breadcrumb">
        <li><a href="index.php">Tableau de bord</a></li>
        <li class="active">Liste des services</li>
    </ol>

    <div class="widget widget-blue">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
                   title="" data-original-title="Refresh"><i class="icon-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip"
                   data-placement="top" title="" data-original-title="Minimize"><i class="icon-minus-sign"></i></a>
            </div>
            <h3><i class="icon-table"></i> Liste des services</h3>
        </div>
        <div class="widget-content">
            <div class="msgbox"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover datatable">
                    <caption style="text-align: left; margin-left: 7px; margin-top: 20px;">
                        <i class="fa fa-level-up fa-rotate-180" style="font-size: 25pt"></i>
                        <label for="" style="margin-left: 20px; vertical-align: top;">Avec la sélection :</label>
                        <div style="margin-left: 20px; display: inline-block; vertical-align: top;">

                        <?php if($_SESSION['user']->hasDroit('edit', 'com_service')){ ?>
                            <a href="#0" id="enable_multiple" class="btn btn-success btn-xs disable" 
                                data-toggle="tooltip" data-original-title="Activer">
                                <i class="fa fa-toggle-on"></i>
                            </a>
                            <a href="#0" id="disable_multiple" class="btn btn-warning btn-xs disable" 
                                data-toggle="tooltip" data-original-title="Disactiver">
                                <i class="fa fa-toggle-off"></i>
                            </a>
                        <?php } ?>

                        <?php if($_SESSION['user']->hasDroit('delete', 'com_service')){ ?>
                            <a href="#0" id="delete_multiple" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer" 
                            class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                        <?php } ?>

                        </div>
                        
                    </caption>
                    <thead>
                    <tr>
                        <th style="width: 118px;">
                            <input type="hidden" id="idVal">
                            <input type="checkbox" name="" id="checkAll"><label for="checkAll">Tout cocher</label>
                        </th>
                        <th>ID</th>
						<th>Slug</th>
                        <th>
                            <?php
                                if(isset($trad_com_service['TITRE'][$_SESSION['user']->getLangue()]))
                                    echo $trad_com_service['TITRE'][$_SESSION['user']->getLangue()];
                                else
                                    echo "Titre";
                            ?>
                        </th>
                        <th>
                            <?php
                                if(isset($trad_com_service['SOUS_TITRE'][$_SESSION['user']->getLangue()]))
                                    echo $trad_com_service['SOUS_TITRE'][$_SESSION['user']->getLangue()];
                                else
                                    echo "Sous Titre";
                            ?>
                        </th>
						<th>Ordre</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    function renderServiceRow($service, $depth = 0) {
                        ?>
                        <tr id="row_<?= $service->getId(); ?>">
                            <td>
                                <input type="checkbox" class="checkElement" value="<?php echo $service->getId();?>">
                            </td>
                            <td><?= $service->getId(); ?></td>
							<td><?= $service->getSlug(); ?></td>
                            <td><?= str_repeat('___ ', $depth); ?><?= $service->getTitre(); ?></td>
                            <td><?= $service->getSousTitre(); ?></td>
							<td><?= $service->getOrdre(); ?></td>
                            <td class="text-center">
                                <?php if ($service->isActive() && $_SESSION['user']->hasDroit('edit', 'com_service')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $service->getId(); ?>_oui"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Activé"
                                       class="btn btn-success btn-xs enable"><i class="fa fa-toggle-on"></i></a>
                                <?php } else if (!$service->isActive() && $_SESSION['user']->hasDroit('edit', 'com_service')) { ?>
                                    <a href="javascript:void(0)" id="enable_<?= $service->getId(); ?>_non"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Désactivé"
                                       class="btn btn-warning btn-xs enable"><i class="fa fa-toggle-off"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('edit', 'com_service')) { ?>
                                    <a href="index.php?option=com_service&task=edit&id=<?= $service->getId(); ?>"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Modifier"
                                       class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt icon-pencil"></i></a>
                                <?php } ?>
                                <?php if ($_SESSION['user']->hasDroit('delete', 'com_service')) { ?>
                                    <a href="javascript:void(0)" id="delete_<?= $service->getId(); ?>"
                                       data-toggle="tooltip" data-placement="top" data-original-title="Supprimer"
                                       class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                        if ($service->hasChildren()) {
                            foreach ($service->getChildren($_SESSION["langue"]) as $child) {
                                renderServiceRow($child, $depth + 1);
                            }
                        }
                    }
                    foreach ($services as $service) {
                        renderServiceRow($service, 0);
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function () {

        $(".delete").click(function () {
            if (confirm("Voulez vous supprimer cet service ?")) {
                var btn = $(this);
                var t = btn.attr("id").split("_");
                var id = t[1];
                var order = "id=" + id;
                $.post("components/com_service/controleurs/router.php?task=deleteService", order, function (theResponse) {
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

        $(".enable").click(function () {
            var btn = $(this);
            var t = btn.attr("id").split("_");
            var id = t[1];
            var state = t[2];
            var order = 'id=' + id + "&state=" + state;
            $.post("components/com_service/controleurs/router.php?task=enableService", order, function (theResponse) {
                var error_msg = "Erreur lors de l'activation.";
                if (state === "oui") {
                    error_msg = "Erreur lors de la désactivation.";
                }
                if (parseInt(theResponse) === 1) {
                    if (state === "oui") {
                        btn.attr("id", "enable_" + id + "_non").removeClass("btn-success").addClass("btn-warning").attr("data-original-title", "Désactivé").html("<i class='fa fa-toggle-off'>");
                    } else {
                        btn.attr("id", "enable_" + id + "_oui").removeClass("btn-warning").addClass("btn-success").attr("data-original-title", "Activé").html("<i class='fa fa-toggle-on'>");
                    }
                } else {
                    $(".msgbox").html("<div class='alert alert-danger alert-dismissable'><i class='fa fa-times'></i> <strong>Erreur! </strong>" + error_msg + "</div>").slideDown();
                }
            });
        });

    });



    $(document).ready(function()
    {

        $('#enable_multiple, #disable_multiple').click(function()
        {
            var active = ($(this).attr('id') == "enable_multiple") ? 1 : 0;
            var activationTxt = ($(this).attr('id') == "enable_multiple") ? "activer" : "disactiver";

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
                if(confirm("Voulez vous " + activationTxt + " les services sélectionnés ??"))
                {
                    var ids = "(" + idsT + ")";

                    var order = 'ids=' + ids + '&active=' + active ;
                    $.post(
                        "components/com_service/controleurs/router.php?task=enableServices", 
                        order, 
                        function(theResponse)
                        {
                            if(parseInt(theResponse) == 1){
                                var iconActive = "";
                                $("#checkAll").prop("checked", false);
                                $("#checkAll").change();
                                if(active == 1)
                                {
                                    iconActive += '<a href="#0" data-toggle="tooltip" data-placement="top" ';
                                    iconActive += 'data-original-title="Active" class="btn btn-success btn-xs">';
                                    iconActive += '<i class="fa fa-toggle-on"></i></a>';
                                }
                                else
                                {
                                    iconActive += '<a href="#0" data-toggle="tooltip" data-placement="top" ';
                                    iconActive += 'data-original-title="Active" class="btn btn-warning btn-xs">';
                                    iconActive += '<i class="fa fa-toggle-off"></i></a>';
                                }

                                $(idsT).each(function(i, id)
                                {
                                    $("#row_" + id).children().eq($("#row_" + id).children().length - 1).children().eq(0).remove();
                                    $("#row_" + id).children().eq($("#row_" + id).children().length - 1).prepend(iconActive);
                                });
                                
                            
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> les services est activ&eacute;s avec succ&egrave;s</div>');	
                                $('.msgbox').slideDown();
                            

                                // setTimeout(function(){$("#row_"+id).remove()},300);
                                
                            }
                            else
                            {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> Erreur lors de l\'activation</div>');
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
                if(confirm("Voulez vous supprimer les services sélectionnés ??"))
                {
                    var ids = "(" + idsT + ")";

                    var order = 'ids=' + ids;
                    $.post(
                        "components/com_service/controleurs/router.php?task=deleteServices", 
                        order, 
                        function(theResponse)
                        {
                            if(parseInt(theResponse) == 1)
                            {
                                
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> les services supprim&eacute;s avec succ&egrave;s</div>');	
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


