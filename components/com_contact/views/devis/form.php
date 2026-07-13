<script>
    $(function() {
        <?php
        $services = service::findAll($_SESSION['lang'], true, true);
        foreach ($services as $s) {
        ?>
            $('.s_<?= $s->getId(); ?>').click(function() {
                if ($(this).is(':checked')) {
                    $('.ss_<?= $s->getId(); ?>').prop('checked', true);
                } else {
                    $('.ss_<?= $s->getId(); ?>').prop('checked', false);
                }
            });
            $(".ss_<?= $s->getId(); ?>").change(function() {
                if ($('.ss_<?= $s->getId(); ?>:checked').length == $('.ss_<?= $s->getId(); ?>').length) {
                    $('.s_<?= $s->getId(); ?>').prop('checked', true);
                } else {
                    $('.s_<?= $s->getId(); ?>').prop('checked', false);
                }
            });
        <?php
        }
        ?>

        $('.fleche a').click(function() {
            var id = $(this).attr('id');
            var option = $(this).attr('option');
            if (option == "open") {
                $(this).html('<i class="fa fa-chevron-up"></i>');
                $(this).attr('option', 'close');
                $('.list-box-' + id).css('height', 'auto');
                var h = $('.list-box-' + id).height();
                $('.list-box-' + id).css('height', '48px');
                $('.list-box-' + id).animate({
                    height: h
                }, 450, function() {
                    $('.list-box-' + id + ' .s-services-box').animate({
                        opacity: 1
                    }, 200);
                });
                $('.list-box-' + id).css('overflow', 'visible');

            } else {
                $(this).html('<i class="fa fa-chevron-down"></i>');
                $(this).attr('option', 'open');
                $('.list-box-' + id).animate({
                    height: 48
                }, 250, function() {
                    $('.list-box-' + id + ' .s-services-box').animate({
                        opacity: 0
                    }, 100);
                });
                $('.list-box-' + id).css('overflow', 'hidden');
            }
        });

        $("input[name='service[]']").on('change', function() {
            if ($("input[name='service[]']").is(':checked')) {
                $("input[name='service[]']").prop('required', false)
            } else {
                $("input[name='service[]']").prop('required', true)
            }
        })

    });
</script>
<form method="post" action="<?= $siteURL; ?>components/com_contact/controleurs/contact.php?task=quote" id="devisForm" class="ct-form rv d1">

    <div class="row">
        <div class="msgbox col-12"></div>
    </div>
    <!-- Civilité + Prénom + Nom -->
        <div class="ct-row-3">
            
            <div class="ct-group">
                <div class="ct-select-label"><?php echo $lang['DEVIS_FORM_VOUS_ETES'][$_SESSION['lang']]; ?></div>
                <select class="ct-select" id="ct-civ" name="type_client">
                    <option value=""><?php echo $lang['DEVIS_FORM_CHOISIR'][$_SESSION['lang']]; ?></option>
                    <option value="Particulier"><?php echo $lang['PARTICULIER'][$_SESSION['lang']]; ?></option>
                    <option value="Société"><?php echo $lang['SOCIETE'][$_SESSION['lang']]; ?></option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <input class="ct-input" type="text" name="fullname" id="ct-prenom" placeholder="" autocomplete="given-name" required>
                <label class="ct-float-label" for="ct-prenom"><?php echo $lang['DEVIS_FORM_NOM_COMPLET'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <div class="ct-select-label"><?php echo $lang['DEVIS_FORM_COMMENT_CONNU'][$_SESSION['lang']]; ?></div>
                <select name="source" class="ct-select" id="ct-source">
                    <option value=""><?php echo $lang['DEVIS_FORM_SELECTIONNER'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_MOTEUR_RECHERCHE'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_RECOMMANDATION'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_RESEAUX_SOCIAUX'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_PRESSE'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_CONFERENCE'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_PODCAST'][$_SESSION['lang']]; ?></option>
                    <option><?php echo $lang['DEVIS_SOURCE_AUTRE'][$_SESSION['lang']]; ?></option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Email + Téléphone -->
        <div class="ct-row">
            <div class="ct-group">
                <input class="ct-input" type="email" name="email" id="ct-email" placeholder=" " autocomplete="email" required>
                <label class="ct-float-label" for="ct-email"><?php echo $lang['DEVIS_FORM_EMAIL'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <!--<input name="cc" type="hidden" value="+212" />-->
                <!--<input type="tel" class="phone d-none" name="phone" required>-->
                <input class="ct-input" type="tel" name="phone" id="ct-tel" placeholder=" " autocomplete="tel">
                <label class="ct-float-label" for="ct-tel"><?php echo $lang['DEVIS_FORM_TELEPHONE'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
        </div>

    

        <!-- Service + Budget -->
    

    <!-- Comment nous avez-vous connu? -->
    
    <div class="ct-row">
            
    </div>

    <!-- Service souhaité -->
    <div class="ct-group ct-group-full">
        <div class="ct-select-label"><?php echo $lang['DEVIS_FORM_SERVICE_SOUHAITE'][$_SESSION['lang']]; ?></div>
        <div class="ct-checkbox-list">
            <?php
            $devisServiceOptions = array(
                $lang['DEVIS_SVC_IA'][$_SESSION['lang']],
                $lang['DEVIS_SVC_WEB_MOBILE'][$_SESSION['lang']],
                $lang['DEVIS_SVC_SAAS'][$_SESSION['lang']],
                $lang['DEVIS_SVC_MARKETPLACE'][$_SESSION['lang']],
                $lang['DEVIS_SVC_FORMATION'][$_SESSION['lang']],
                $lang['DEVIS_SVC_BRAND'][$_SESSION['lang']],
                $lang['DEVIS_SVC_AUDIT'][$_SESSION['lang']],
                $lang['DEVIS_SVC_GLOBAL'][$_SESSION['lang']],
            );
            foreach ($devisServiceOptions as $i => $label) :
            ?>
            <label class="ct-checkbox">
                <input type="checkbox" name="service[]" value="<?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>">
                <span class="ct-checkbox-box"><i class="fa fa-check"></i></span>
                <span class="ct-checkbox-label"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Message -->
    <div class="ct-group">
    <textarea class="ct-textarea" name="message" id="ct-message" placeholder=" " rows="5"></textarea>
    <label class="ct-float-label" for="ct-message" style="top:.6rem"><?php echo $lang['DEVIS_FORM_DECRIVEZ'][$_SESSION['lang']]; ?></label>
    <span class="ct-line"></span>
    </div>

    <div class="ct-group">
        <div class="g-recaptcha" data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
    </div>

       <div class="sb submit-form" role="slider" tabindex="0" aria-label="<?php echo $lang['DEVIS_FORM_ENVOYER'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-fill"></div>
      <div class="sb-label"><span class="sb-hint"><?php echo $lang['DEVIS_FORM_ENVOYER'][$_SESSION['lang']]; ?></span></div>
      <div class="sb-knob"><i class="fa fa-paper-plane"></i></div>
    </div>

</form>