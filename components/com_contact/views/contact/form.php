<form method="post" action="<?= $siteURL; ?>components/com_contact/controleurs/contact.php?task=contact" id="contactForm" class="ct-form rv d1">

    <div class="row">
        <div class="msgbox col-12"></div>
    </div>
    <!-- Civilité + Prénom + Nom -->
    <div class="ct-row-3">
        <div class="ct-group">
            <div class="ct-select-label">Civilité</div>
                <select class="ct-select" id="ct-civ" name="civilite">
                    <option value=""><?php echo $lang['CIVILITE'][$_SESSION['lang']]; ?></option>
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                    <option value="Mlle">Mlle</option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <input class="ct-input" type="text" name="prenom" id="ct-prenom" placeholder="" autocomplete="given-name" required>
                <label class="ct-float-label" for="ct-prenom">Prénom *</label>
                <span class="ct-line"></span>
            </div>

            <div class="ct-group">
                <input class="ct-input" type="text" name="nom" id="ct-nom" placeholder=" " autocomplete="family-name" required>
                <label class="ct-float-label" for="ct-nom">Nom *</label>
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
                <label class="ct-float-label" for="ct-tel">Téléphone</label>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Entreprise + Ville -->
        <div class="ct-row">
            <div class="ct-group">
                <input class="ct-input" type="text" name="company" id="ct-company" placeholder=" " autocomplete="organization">
                <label class="ct-float-label" for="ct-company">Entreprise</label>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <input class="ct-input" type="text" name="ville" id="ct-ville" placeholder=" ">
                <label class="ct-float-label" for="ct-ville">Ville</label>
                <span class="ct-line"></span>
            </div>
        </div>

        <!-- Service + Budget -->
        <div class="ct-row">
            <div class="ct-group">
                <div class="ct-select-label">Service souhaité</div>
                <select name="service" class="ct-select" id="ct-service">
                <option value="">Choisir un service…</option>
                <option>Solutions IA — Agents &amp; Automatisation</option>
                <option>Web &amp; Mobile — Site ou App</option>
                <option>SaaS &amp; Produits — MVP ou Plateforme</option>
                <option>Marketplace IA</option>
                <option>Formation IA — Équipes ou Dirigeants</option>
                <option>Brand Experience — Identité &amp; Contenu</option>
                <option>Audit stratégique</option>
                <option>Accompagnement global</option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>
            <div class="ct-group">
                <div class="ct-select-label">Budget indicatif</div>
                <select name="budget" class="ct-select" id="ct-budget">
                <option value="">Sélectionner…</option>
                <option>Moins de 10 000 DHs</option>
                <option>10 000 DHs – 30 000 DHs</option>
                <option>30 000 DHs – 80 000 DHs</option>
                <option>80 000 DHs – 200 000 DHs</option>
                <option>200 000 DHs et plus</option>
                <option>À définir ensemble</option>
                </select>
                <i class="fa fa-chevron-down ct-select-arr"></i>
                <span class="ct-line"></span>
            </div>
        </div>

    <!-- Comment nous avez-vous connu? -->
    <div class="ct-group">
    <div class="ct-select-label">Comment nous avez-vous connu ?</div>
    <select name="source" class="ct-select" id="ct-source">
        <option value="">Sélectionner…</option>
        <option>Moteur de recherche (Google, Bing…)</option>
        <option>Recommandation d'un proche</option>
        <option>Réseaux sociaux (LinkedIn, Instagram…)</option>
        <option>Presse ou médias</option>
        <option>Conférence ou événement</option>
        <option>Podcast</option>
        <option>Autre</option>
    </select>
    <i class="fa fa-chevron-down ct-select-arr"></i>
    <span class="ct-line"></span>
    </div>

    <!-- Message -->
    <div class="ct-group">
    <textarea class="ct-textarea" name="message" id="ct-message" placeholder=" " rows="5"></textarea>
    <label class="ct-float-label" for="ct-message" style="top:.6rem">Décrivez votre projet ou votre question</label>
    <span class="ct-line"></span>
    </div>

    <div class="ct-group">
        <div class="g-recaptcha" data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
    </div>

    <div class="sb submit-form" role="slider" tabindex="0" aria-label="Envoyer ma demande" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
      <div class="sb-fill"></div>
      <div class="sb-label"><span class="sb-hint">Envoyer ma demande</span></div>
      <div class="sb-knob"><i class="fa fa-paper-plane"></i></div>
    </div>
    <p class="ct-privacy"><i class="fa fa-lock"></i> Données confidentielles · Réponse garantie sous 24h</p>

</form>