<form method="post" action="<?= $siteURL; ?>components/com_contact/controleurs/contact.php?task=contact" id="contactForm" class="ct-form rv d1">

    <div class="row">
        <div class="msgbox col-12"></div>
    </div>
    <!-- Civilité + Prénom + Nom -->
    <div class="ct-row-3">
        <div class="ct-group">
            <div class="ct-select-label"><?php echo $lang['CTF_CIVILITE'][$_SESSION['lang']]; ?></div>
                <select class="ct-select" id="ct-civ" name="civilite">
                    <option value=""><?php echo $lang['CIVILITE'][$_SESSION['lang']]; ?></option>
                    <option value="Mr"><?php echo $lang['CTF_CIVILITE_MR'][$_SESSION['lang']]; ?></option>
                    <option value="Mme"><?php echo $lang['CTF_CIVILITE_MME'][$_SESSION['lang']]; ?></option>
                    <option value="Mlle"><?php echo $lang['CTF_CIVILITE_MLLE'][$_SESSION['lang']]; ?></option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <input class="ct-input" type="text" name="prenom" id="ct-prenom" placeholder="" autocomplete="given-name" required>
                <label class="ct-float-label" for="ct-prenom"><?php echo $lang['CTF_PRENOM'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <input class="ct-input" type="text" name="nom" id="ct-nom" placeholder=" " autocomplete="family-name" required>
                <label class="ct-float-label" for="ct-nom"><?php echo $lang['CTF_NOM'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Email + Téléphone -->
        <div class="ct-row">
            <div class="ct-group">
                <input class="ct-input" type="email" name="email" id="ct-email" placeholder=" " autocomplete="email" required>
                <label class="ct-float-label" for="ct-email">Email *</label>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <input class="ct-input" type="tel" name="phone" id="ct-tel" placeholder=" " autocomplete="tel">
                <label class="ct-float-label" for="ct-tel"><?php echo $lang['CTF_TELEPHONE'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Entreprise + Ville -->
        <div class="ct-row">
            <div class="ct-group">
                <input class="ct-input" type="text" name="company" id="ct-company" placeholder=" " autocomplete="organization">
                <label class="ct-float-label" for="ct-company"><?php echo $lang['CTF_ENTREPRISE'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <input class="ct-input" type="text" name="ville" id="ct-ville" placeholder=" ">
                <label class="ct-float-label" for="ct-ville"><?php echo $lang['CTF_VILLE'][$_SESSION['lang']]; ?></label>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Service + Budget -->
        <div class="ct-row">
            <div class="ct-group">
                <div class="ct-select-label"><?php echo $lang['CTF_SERVICE_LABEL'][$_SESSION['lang']]; ?></div>
                <select name="service" class="ct-select" id="ct-service">
                <option value=""><?php echo $lang['CTF_SERVICE_CHOOSE'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_IA'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_WEB'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_SAAS'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_MARKETPLACE'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_FORMATION'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_BRAND'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_AUDIT'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_SERVICE_ACCOMPAGNEMENT'][$_SESSION['lang']]; ?></option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <div class="ct-select-label"><?php echo $lang['CTF_BUDGET_LABEL'][$_SESSION['lang']]; ?></div>
                <select name="budget" class="ct-select" id="ct-budget">
                <option value=""><?php echo $lang['CTF_SELECT_PLACEHOLDER'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_1'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_2'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_3'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_4'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_5'][$_SESSION['lang']]; ?></option>
                <option><?php echo $lang['CTF_BUDGET_6'][$_SESSION['lang']]; ?></option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>
        </div>

    <!-- Comment nous avez-vous connu? -->
    <div class="ct-group">
    <div class="ct-select-label"><?php echo $lang['CTF_SOURCE_LABEL'][$_SESSION['lang']]; ?></div>
    <select name="source" class="ct-select" id="ct-source">
        <option value=""><?php echo $lang['CTF_SELECT_PLACEHOLDER'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_1'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_2'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_3'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_4'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_5'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_6'][$_SESSION['lang']]; ?></option>
        <option><?php echo $lang['CTF_SOURCE_7'][$_SESSION['lang']]; ?></option>
    </select>
    <i class="fa fa-chevron-down ct-select-arr"></i>
    <span class="ct-line"></span>
    </div>

    <!-- Message -->
    <div class="ct-group">
    <textarea class="ct-textarea" name="message" id="ct-message" placeholder=" " rows="5"></textarea>
    <label class="ct-float-label" for="ct-message" style="top:.6rem"><?php echo $lang['CTF_MESSAGE_LABEL'][$_SESSION['lang']]; ?></label>
    <span class="ct-line"></span>
    </div>

    <div class="ct-group">
        <div class="g-recaptcha" data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
    </div>

    <div class="sb submit-form" role="slider" tabindex="0" aria-label="<?php echo $lang['CTF_SUBMIT'][$_SESSION['lang']]; ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-fill"></div>
      <div class="sb-label"><span class="sb-hint"><?php echo $lang['CTF_SUBMIT'][$_SESSION['lang']]; ?></span></div>
      <div class="sb-knob"><i class="fa fa-paper-plane"></i></div>
    </div>
    <!-- Bouton réel requis pour que le submit natif se déclenche (form.submit() en JS ne le fait pas) -->
    <button type="submit" class="hs-submit-bridge" tabindex="-1" aria-hidden="true" style="position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0;">Envoyer</button>
    <p class="ct-privacy"><i class="fa fa-lock"></i> <?php echo $lang['CTF_PRIVACY'][$_SESSION['lang']]; ?></p>

</form>