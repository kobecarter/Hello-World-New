<?php
if (isset($task) && !empty($task)) {
	switch ($task) {
		case 'showTestimonial':
			showTestimonial($_POST);
			break;
		case 'getPopUp':
			getPopUp($_POST);
			break;
		case 'getPopUpHome':
			getPopUpHome($_POST);
			break;
	}
}

function showTestimonial($data)
{
	global $db;
	if (isset($data['id']) && !empty($data['id'])) {
		$id = intval($data['id']);
		$t = temoignage::find($id, $_SESSION['lang']);
?>
<div class="testimonial-modal">
    <span class="temoignage-autor"><?php echo $t->getNom(); ?></span>
    <p class="temoignage-p">
        <i class="fa fa-quote-left"></i>
        <?php echo $t->getTemoignage(); ?>
        <i class="fa fa-quote-right"></i>
    </p>
</div>
<?php
	}
}

/* ----------------------------------------- getPopUp ----------------------------------------- */
function getPopUp($data)
{
	global $db, $siteURL;

	$popups = popup::getPopup();
	foreach ($popups as $popup) {
	?>
<div class="popup-box">
    <div class="textbox">
        <h3 class="title"><?php echo $popup->getTitre(); ?></h3>
    </div>
    <div class="imgbox"><img src="<?php echo $siteURL . 'images/popup/' . $popup->getPhoto(); ?>"
            alt="<?php echo $popup->getTitre(); ?>" /></div>
    <div class="footer-popup">
        <h3><?php echo $popup->getTitre(); ?></h3>
        <?php echo $popup->getDescription(); ?>
        <?php if ($popup->getBtnText() != '' && $popup->getBtnLink() != ''): ?>
        <a href="<?php echo $popup->getBtnLink(); ?>" class="btn-popup"><?php echo $popup->getBtnText(); ?></a>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="popup-sep"></div>
<?php
	}
}

/* ----------------------------------------- getPopUp ----------------------------------------- */
function getPopUpHome($data)
{
	global $db, $siteURL;
	?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
    <i class="ti ti-close" aria-hidden="true"></i>
</button>
<div id="quotePopUpContent">
    <div class="row p-0 m-0 w-100">
        <div class="col-12 col-md-6 p-0">
            <img src="<?php echo $siteURL; ?>images/popup/popup-img2.png" width="500" height="500"
                alt="Fill in the from and scan your website and get a discount of 300$"
                class="img-quote-background">
        </div>
        <div class="col-12 col-md-6 p-0 align-self-center">
            <div class="div-quote-content p-3 pt-5">
                <form method="post"
                    action="<?= $siteURL; ?>components/com_contact/controleurs/contact.php?task=quotePopUp"
                    id="quotePopUpForm" class="needs-validation" novalidate>
                    <div class="msgbox col-sm-12"></div>
                    <div class="step" data-step="1">
                        <div class="div-process-bars d-flex mb-3">
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                        </div>
                        <h5 class="text-brown text-right step-number"><b>1/4 étapes</b></h5>
                        <h5 class="mb-3 step-title"><b>Prêt à passer à l’action? Choisissez votre
                                besoin :</b>
                        </h5>
                        <div class="div-answers-check">
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-1">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_1"
                                            class="s_1 custom-control-input"
                                            value="Développement de Site Web" required
                                            data-value="Développement de Site Web"><label
                                            class="custom-control-label" for="s_1">Création de Site
                                            Web</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-2">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_2"
                                            class="s_2 custom-control-input"
                                            value="Développement d'Applications Mobiles" required
                                            data-value="Développement d'Applications Mobiles"><label
                                            class="custom-control-label" for="s_2">Développement
                                            d'Applications Mobiles</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-3">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_3"
                                            class="s_3 custom-control-input" value="Référencement - SEO"
                                            required data-value="Référencement - SEO"><label
                                            class="custom-control-label" for="s_3">Référencement -
                                            SEO</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-3">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_4"
                                            class="s_4 custom-control-input" value="Génération de Leads"
                                            required data-value="Génération de Leads"><label
                                            class="custom-control-label" for="s_4">Génération
                                            de Leads</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-4">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_5"
                                            class="s_5 custom-control-input"
                                            value="Conception Design Graphique" required
                                            data-value="Conception Design Graphique"><label
                                            class="custom-control-label" for="s_5">Conception Design
                                            Graphique</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-5">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_6"
                                            class="s_6 custom-control-input"
                                            value="Marque et de Stratégie" required
                                            data-value="Marque et de Stratégie"><label
                                            class="custom-control-label" for="s_6">Stratégie de
                                            Marque</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-6">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_7"
                                            class="s_7 custom-control-input"
                                            value="Production Photo Et Vidéo" required
                                            data-value="Production Photo Et Vidéo"><label
                                            class="custom-control-label" for="s_7">Production Photo Et
                                            Vidéo</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-7">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_8"
                                            class="s_8 custom-control-input"
                                            value="Gestion des Réseaux Sociaux" required
                                            data-value="Gestion des Réseaux Sociaux"><label
                                            class="custom-control-label" for="s_8">Gestion des Réseaux
                                            Sociaux</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-8">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_9"
                                            class="s_9 custom-control-input" value="Rédaction Et Contenu
												Publicitaire" required data-value="Rédaction Et Contenu
												Publicitaire"><label class="custom-control-label" for="s_9">Rédaction et Contenu Publicitaire</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <div class="list-box list-box-8">
                                    <div class="custom-control custom-checkbox">
                                        <span class="span-checkbox"></span>
                                        <input type="checkbox" name="services[]" id="s_10"
                                            class="s_10 custom-control-input"
                                            value="Marketing d’Influence" required
                                            data-value="Marketing d’Influence"><label
                                            class="custom-control-label" for="s_10">Marketing
                                            d’Influence</label>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="step  d-none" data-step="2">
                        <div class="div-process-bars d-flex mb-3">
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                        </div>
                        <h5 class="text-brown text-right step-number"><b>2/4 étapes</b></h5>
                        <h5 class="mb-3 step-title"><b>Quel est votre budget prévisionnel pour votre
                                projet?</b>
                        </h5>
                        <div class="form-group mb-2">
                            <label class="label-form" for="additional_information">Budget <span
                                    class="text-danger">*</span></label>
                            <div class="div-budget">
                                <input type="range" class="range-budget" min="0" step="100" max="500000"
                                    name="budget" value="0" required>
                                <label class="label-budget-value mt-3 mb-0"><span
                                        class="span-budget-value">0</span> MAD</label>
                            </div>
                        </div>
                    </div>
                    <div class="step  d-none" data-step="3">
                        <div class="div-process-bars d-flex mb-3">
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100"></div>
                            <div class="div-process-bar w-100"></div>
                        </div>
                        <h5 class="text-brown text-right step-number"><b>3/4 étapes</b></h5>
                        <h5 class="mb-3 step-title"><b>Remplissez le formulaire pour commencer !</b>
                        </h5>
                        <div class="form-group mb-2">

                            <input type="text" placeholder="Nom" id="first_name_wizard"
                                class="form-control" name="first_name" required>
                        </div>
                        <div class="form-group mb-2">

                            <input type="text" placeholder="Prénom" id="last_name_wizard"
                                class="form-control" name="last_name" required>
                        </div>
                        <div class="form-group mb-2">

                            <input type="email" placeholder="E-mail"
                                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}"
                                id="email_wizard" class="form-control" name="email" required>
                        </div>
                        <div class="form-group mb-2">
   
                            <select class="form-control" id="city_wizard" name="city" required>
                                <option value="" disabled selected>Choisir une ville</option>
                               <option value="Casablanca">Casablanca</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Marrakech">Marrakech</option>
                                <option value="Fès">Fès</option>
                                <option value="Tanger">Tanger</option>
                                <option value="Agadir">Agadir</option>
                                <option value="Meknès">Meknès</option>
                                <option value="Oujda">Oujda</option>
                                <option value="Tétouan">Tétouan</option>
                                <option value="Safi">Safi</option>
                                <option value="Essaouira">Essaouira</option>
                                <option value="Nador">Nador</option>
                                <option value="Kenitra">Kenitra</option>
                                <option value="Beni Mellal">Beni Mellal</option>
                                <option value="Benguerir">Benguerir</option>
                                <option value="El Jadida">El Jadida</option>
                                <option value="Dakhla">Dakhla</option>
                                <option value="Laâyoune">Laâyoune</option>
                                <option value="Khouribga">Khouribga</option>
                                <option value="Ouarzazate">Ouarzazate</option>
                                <option value="Ifrane">Ifrane</option>
                                <option value="Taza">Taza</option>
                                <option value="Chefchaouen">Chefchaouen</option>
                                <option value="Taroudant">Taroudant</option>
                                <option value="Errachidia">Errachidia</option>
                                <option value="Asilah">Asilah</option>
                                <option value="Skhirat">Skhirat</option>
                                <option value="Settat">Settat</option>
                                <option value="Berkane">Berkane</option>
                                <option value="Sidi Kacem">Sidi Kacem</option>
                                <option value="Sidi Ifni">Sidi Ifni</option>
                                <option value="Tiznit">Tiznit</option>
                                <option value="Al Hoceima">Al Hoceima</option>
                                 <option value="autres">Autres</option>
                           
                            </select>
                        </div>

                        <div class="form-group mb-2">

                            <input name="cc" type="hidden" value="+212" />
                            <input type="tel" class="phone d-none" name="phone" required>
                            <input type="text" pattern="\d{6,}" name="field" id="phone3"
                                class="form-control" placeholder="Téléphone" required />
                        </div>
                         
                        <div class="form-group mb-2 mt-3">
                            <div class="g-recaptcha"
                                data-sitekey="6LeNLyITAAAAAM2DmrW17Hlr59rQukXhWB0p2_hM"></div>
                        </div>
                    </div>
                    <div class="step  d-none" data-step="4">
                        <div class="div-process-bars d-flex mb-3">
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100 bg-success"></div>
                            <div class="div-process-bar w-100 "></div>
                        </div>
                        <h5 class="text-brown text-right step-number"><b>4/4 étapes</b></h5>
                        <h5 class="mb-3 step-title"><b>Merci d’avoir fourni vos informations ! <br>
                                Voici le résumé
                                :
                            </b></h5>
                        <div class="form-group mb-2">
                            <h6 class="quastion-title mb-0"><span class="span-number-question">1</span>
                                Votre besoin est:</h6>
                            <div class="div-answers">
                                <ul class="ul-answers m-0">
                                    <!-- <li class="li-answer text-grey-light">WEBSITE DEVELOPMENT IN DUBAI</li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <h6 class="quastion-title mb-0"><span class="span-number-question">2</span>
                                Votre budget est :</h6>
                            <div class="div-answers">
                                <p class="p-answer text-grey-light mb-0"><b><span
                                            class="span-budget">0</span> MAD</b>
                                </p>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <h6 class="quastion-title mb-0"><span class="span-number-question">3</span>
                                Vos coordonnées sont : </h6>
                            <div class="div-answers">
                                <p class="p-answer text-grey-light mb-0"><b>Prénom :</b> <span
                                        class="text-brown span-first-name"></span></p>
                                <p class="p-answer text-grey-light mb-0"><b>Nom de famille :</b> <span
                                        class="text-brown span-last-name"></span></p>
                                <p class="p-answer text-grey-light mb-0"><b>Adresse e-mail :</b> <span
                                        class="text-brown span-email"></span></p>
                                <p class="p-answer text-grey-light mb-0"><b>Numéro de téléphone :</b>
                                    <span class="text-brown span-phone"></span>
                                  <p class="p-answer text-grey-light mb-0"><b>Ville :</b>
                                    <span class="text-brown span-ville"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="step d-none thank-you-step" data-step="5">

                        <div class="pop-up-gift">
                            <img alt="Hello World Cadeau" src="<?php echo $siteURL; ?>images/popup/gift-img3.png">
                        </div>
                        <h5 class="mb-3"><b>Félicitations ! <br> Votre cadeau HelloWorld vous attend.
                            </b></h5>
                        <div class="form-group mb-2">
                            <p>Notre équipe prendra contact avec vous pour le suivi et les prochaines
                                étapes.
                            </p>
                        </div>
                    </div>
                    <div class="from-group text-right">
                        <hr>
                        <input type="hidden" name="step" value="1">
                        <input type="button" class="btn btn-secondary btn-wizard-previous d-none"
                            value="Précédent">
                        <input type="button" class="btn btn-primary btn-wizard-next" data-step="1"
                            value="Suivant">
                        <input type="submit" class="btn btn-success btn-wizard-submit d-none"
                            value="Je récupère mon cadeau">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
setTimeout(function() {
    if (document.querySelector("#phone3")) {
        const phoneInputField = document.querySelector("#phone3");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "ma",
            //onlyCountries: ["ma"],
            separateDialCode: true,
        }, );
    }
}, 2000)

$(document).ready(function() {
    // Get the forms to apply validation
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (form.checkValidity() === false) {
                event.stopPropagation();
            } else {
                var id = form.getAttribute('id')
                /*-------------------------------------------------------------------------------
                    					  	/* -----------------------------------
                    								07. Service form
                    								-------------------------------------*/


                $("form#quotePopUpForm").ajaxForm({
                    beforeSubmit: function() {
                        // Afficher le chargement
                        $("form#quotePopUpForm .loading").css("display", "block");
                    },
                    success: function(theResponse) {
                        console.log(theResponse);
                        $("form#quotePopUpForm .loading").hide();

                        // Scroll vers le haut du formulaire
                        var offset = $("#quotePopUpForm .msgbox").offset().top -
                            100;
                        $("html, body").animate({
                            scrollTop: offset
                        }, "slow");

                        if (parseInt(theResponse) === 1) {
                            // Masquer toutes les étapes et les boutons
                            $(".step").addClass(
                                "d-none"); // Masquer toutes les étapes
                            $(".thank-you-step").removeClass(
                                "d-none"); // Afficher l'étape de remerciements
                            $(".text-right").hide(); // Masquer tous les boutons

                            // Réinitialiser le formulaire
                            $("form#quotePopUpForm")[0].reset();

                            // Redirection vers la page de remerciements après 2 secondes
                            setTimeout(function() {
                                window.location.href = REDIRECT_LINK_CONG;
                            }, 4000);
                        } else if (parseInt(theResponse) === 0) {
                            $("form#quotePopUpForm .msgbox").html(
                                '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                CHAMPS_OBLIG +
                                " </div>"
                            );
                        } else if (parseInt(theResponse) === 2) {
                            $("form#quotePopUpForm .msgbox").html(
                                '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>'
                            );
                        } else {
                            $("form#quotePopUpForm .msgbox").html(
                                '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> ' +
                                ERREUR_EXEC +
                                "</div>"
                            );
                        }
                    },
                });

                if (id == "quotePopUpForm") {
                    $("form#quotePopUpForm").submit()
                }
            }
            form.classList.add('was-validated');
        }, false);
    });
})
</script>
<?php
}