
$(document).ready(function() {
	  
	$("#owl-services-cities").owlCarousel({
	    lazyLoad: true,
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplayHoverPause: true,
		smartSpeed: 1000,
		rtl: document.documentElement.dir === 'rtl',
		responsive: {
		  0: {
			items: 1
		  },
		  600: {
			items: 3
		  },
		  1000: {
			items: 3
		  }
		}
	});  
	
	$("#owl-videos").owlCarousel({
	    lazyLoad: true,
      loop: true,
      nav: true,
	  navText : ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
      dots: true,
      autoplay: true,
	  autoplayHoverPause: true,
      smartSpeed: 1000,
      rtl: document.documentElement.dir === 'rtl',
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
    
    $("#owl-core-services").owlCarousel({
	    lazyLoad: false,
      	loop: true,
      	nav: true,
	  	navText : ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
      	dots: true,
      	autoplay: false,
	  	autoplayHoverPause: true,
      	autoplayTimeout: 3200,
      	smartSpeed: 1000,
      	rtl: document.documentElement.dir === 'rtl',
      	responsive: {
			0: {
			items: 1
			},
			600: {
			items: 2
			},
			1000: {
			items: 3
			}
      	}
    });
    
    $("#owl-testimonials").owlCarousel({
	    lazyLoad: true,
      	loop: true,
      	nav: true,
	  	navText : ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
      	dots: true,
      	autoplay: true,
	  	autoplayHoverPause: true,
      	smartSpeed: 1000,
      	rtl: document.documentElement.dir === 'rtl',
      	responsive: {
			0: {
			items: 1
			},
			600: {
			items: 2
			},
			1000: {
			items: 2
			}
      	}
    });
    
    /* -----------------------------------
	Brochure Flipbook
	-------------------------------------*/
    
    let brochure = siteURL + "assets/brochure/brochure.pdf";
  	$(".btn-show-brochure").flipBook({
		pdfUrl: brochure, // url du fichier pdf
		tilt: -13, // pour l'effet d'inclinaison,
		btnShare: { enabled: 0 },
		btnDownloadPages: { enabled: 0 },
		lightBox: true,
		loadAllPages: false,
		lightboxBackground: "rgba(0,0,0,0.8)",
  	});
    
    /* -----------------------------------
	Contact form
	-------------------------------------*/
	$('form#contactForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#contactForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#contactForm .loading").hide();
			
			if (parseInt(theResponse) === 1) {
				$('#contactForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
				$('#contactForm').resetForm();
				document.location = REDIRECT_LINK;
			}
			else if (parseInt(theResponse) === 0) {
				$('#contactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
			}
			else if (parseInt(theResponse) === 2) {
				$('#contactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
			}
			else {
				$('#contactForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});
	
	/* -----------------------------------
	Quick Contact form
	-------------------------------------*/
	$('form#quickContactForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#quickContactForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#quickContactForm .loading").hide();
			
			if (parseInt(theResponse) === 1) {
				$('#quickContactForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
				$('#quickContactForm').resetForm();
				document.location = REDIRECT_LINK;
			}
			else if (parseInt(theResponse) === 0) {
				$('#quickContactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
			}
			else if (parseInt(theResponse) === 2) {
				$('#quickContactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
			}
			else {
				$('#quickContactForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});
	
		$('form#devisForm').ajaxForm({
								beforeSubmit: function () {
									// chargement
									$("form#devisForm .loading").css("display", "block");
								},
								success: function (theResponse) {
								    console.log(theResponse)
									$("form#devisForm .loading").hide();
									var offset = $("#devisForm .msgbox").offset().top - 100;
									$("html, body").animate({ scrollTop: offset }, "slow");
									
									if (parseInt(theResponse) === 1) {
										$('form#devisForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
										$('form#devisForm')[0].reset();
										document.location = REDIRECT_LINK_QUOTE;
									}
									else if (parseInt(theResponse) === 0) {
										$('form#devisForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
									}
									else if (parseInt(theResponse) === 2) {
										$('form#devisForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
									}
									else {
										$('form#devisForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
									}
								}
							});
	
	/* -----------------------------------
	Espace client — Login
	-------------------------------------*/
	$('form#loginApiForm').ajaxForm({
		beforeSubmit: function () {
			$("#loginApiForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#loginApiForm .loading").hide();
			var offset = $("#loginApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('#loginApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#loginApiForm')[0].reset();
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#loginApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			} else {
				$('#loginApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	/* -----------------------------------
	Espace client — Password recovery
	-------------------------------------*/
	$('form#verifyEmailApiForm').ajaxForm({
		beforeSubmit: function () {
			$("#verifyEmailApiForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#verifyEmailApiForm .loading").hide();
			var offset = $("#verifyEmailApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#verifyEmailApiForm')[0].reset();
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			} else {
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	/* -----------------------------------
	Espace client — New password
	-------------------------------------*/
	$('form#setNewPasswordApiForm').ajaxForm({
		beforeSubmit: function () {
			$("#setNewPasswordApiForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#setNewPasswordApiForm .loading").hide();
			var offset = $("#setNewPasswordApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('#setNewPasswordApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#setNewPasswordApiForm')[0].reset();
				setTimeout(function () {
					location.href = siteURL + "client-space/";
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#setNewPasswordApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			} else {
				$('#setNewPasswordApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	/* -----------------------------------
	Espace client — Réclamation
	-------------------------------------*/
	$('form#reclamationApiForm').ajaxForm({
		beforeSubmit: function () {
			$("#reclamationApiForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#reclamationApiForm .loading").hide();
			var offset = $("#reclamationApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('#reclamationApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#reclamationApiForm')[0].reset();
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#reclamationApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			} else {
				$('#reclamationApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	/* -----------------------------------
	Espace client — Profil
	-------------------------------------*/
	$('form#profileApiForm').ajaxForm({
		beforeSubmit: function () {
			$("#profileApiForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#profileApiForm .loading").hide();
			var offset = $("#profileApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('#profileApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#profileApiForm')[0].reset();
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#profileApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			} else {
				$('#profileApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	/* -----------------------------------
	Espace client — Téléchargement facture / devis (PDF)
	-------------------------------------*/
	$(document).on("click",".btn-download-invoice",function(){
		let self = $(this)
		let id = self.attr('data-id')
		// Ouvrir l'onglet MAINTENANT (dans le geste du clic) pour ne pas être bloqué
		// par le bloqueur de pop-up ; on y chargera le PDF une fois le nom reçu.
		var pdfWin = window.open('', '_blank')
		self.addClass('d-none')
		self.siblings('.btn-loading').removeClass('d-none')
		$.get(siteURL+"components/com_client/controleurs/router.php?task=pdfInvoiceApi&id="+id, function (theResponse) {
			self.removeClass('d-none')
			self.siblings('.btn-loading').addClass('d-none')
			var data; try { data = JSON.parse(theResponse) } catch (e) { data = { icon: 'error' } }
			if (data.icon == "success" && data.message && (data.message).trim().slice(-4).toLowerCase() == '.pdf') {
				var pdfUrl = platURL+"uploads/"+(data.message).trim();
				if (pdfWin) { pdfWin.location = pdfUrl } else { window.location = pdfUrl }
			} else {
				if (pdfWin) pdfWin.close()
			}
		}).fail(function () {
			self.removeClass('d-none')
			self.siblings('.btn-loading').addClass('d-none')
			if (pdfWin) pdfWin.close()
		})
	})

	$(document).on("click",".btn-download-quote",function(){
		let self = $(this)
		let id = self.attr('data-id')
		var pdfWin = window.open('', '_blank')
		self.addClass('d-none')
		self.siblings('.btn-loading').removeClass('d-none')
		$.get(siteURL+"components/com_client/controleurs/router.php?task=pdfQuoteApi&id="+id, function (theResponse) {
			self.removeClass('d-none')
			self.siblings('.btn-loading').addClass('d-none')
			var data; try { data = JSON.parse(theResponse) } catch (e) { data = { icon: 'error' } }
			if (data.icon == "success" && data.message && (data.message).trim().slice(-4).toLowerCase() == '.pdf') {
				var pdfUrl = platURL+"uploads/"+(data.message).trim();
				if (pdfWin) { pdfWin.location = pdfUrl } else { window.location = pdfUrl }
			} else {
				if (pdfWin) pdfWin.close()
			}
		}).fail(function () {
			self.removeClass('d-none')
			self.siblings('.btn-loading').addClass('d-none')
			if (pdfWin) pdfWin.close()
		})
	})

	/* -----------------------------------
	Espace client — Déconnexion
	-------------------------------------*/
	$(document).on("click", ".btn-sign-out", function (e) {
		e.preventDefault();
		$.get(siteURL+"components/com_client/controleurs/router.php?task=logoutApi", function (theResponse) {
			console.log(theResponse)
			if (theResponse == 1) {
				$('#logoutMessage .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Déconnexion réussie</div>');
				setTimeout(function () {
					document.location.reload();
				}, 1200)
			} else {
				$('#logoutMessage .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		})
	})

	/* -----------------------------------
	Espace client — Cloche de notification
	-------------------------------------*/
	// #clNotifPanel vit hors de #clNotif dans le DOM (voir facture.php — un
	// ancêtre avec backdrop-filter/transform casse position:fixed sinon), donc
	// tout ce qui gérait l'ouverture/fermeture via la relation parent/enfant
	// entre les deux doit agir explicitement sur les DEUX éléments.
	function clNotifSetOpen(open) {
		$('#clNotif').toggleClass('open', open);
		$('#clNotifPanel').toggleClass('open', open);
		$('#clNotifBtn').attr('aria-expanded', open);
		$('#clNotifPanel').attr('aria-hidden', !open);
	}
	window.clNotifSetOpen = clNotifSetOpen;
	function clPositionNotif() {
		if (!$('#clNotifPanel').hasClass('open')) return;
		var btn = document.getElementById('clNotifBtn');
		var panel = document.getElementById('clNotifPanel');
		if (!btn || !panel) return;
		var r = btn.getBoundingClientRect();
		var isRtl = (document.documentElement.getAttribute('dir') === 'rtl');
		var margin = 12; // marge mini gardée avec le bord de l'écran (sur mobile, le
			// panneau est presque aussi large que l'écran : sans ce clamp, l'aligner
			// sur la cloche pouvait le pousser en partie hors-écran à gauche).
		var panelWidth = panel.offsetWidth || 360;
		panel.style.top = (r.bottom + 8) + 'px';
		if (isRtl) {
			var left = Math.max(margin, Math.min(r.left, window.innerWidth - panelWidth - margin));
			panel.style.left = left + 'px';
			panel.style.right = 'auto';
		} else {
			var right = Math.max(margin, Math.min(window.innerWidth - r.right, window.innerWidth - panelWidth - margin));
			panel.style.right = right + 'px';
			panel.style.left = 'auto';
		}
	}
	$(document).on('click', '#clNotifBtn', function (e) {
		e.stopPropagation();
		var willOpen = !$('#clNotifPanel').hasClass('open');
		clNotifSetOpen(willOpen);
		if (willOpen) {
			if (typeof window.clCloseBurger === 'function') window.clCloseBurger();
			clPositionNotif();
			window.requestAnimationFrame(clPositionNotif);
		}
	});
	$(document).on('click', '.cl-notif-item[data-cl-group]', function () {
		var group = $(this).attr('data-cl-group');
		clNotifSetOpen(false);
		if (typeof window.clShowGroup === 'function') {
			window.clShowGroup(group);
			if ($('.div-client-space').length) {
				$('html, body').animate({ scrollTop: $('.div-client-space').offset().top - 90 }, 300);
			}
		}
	});
	$(document).on('click', function (e) {
		if (!$(e.target).closest('#clNotif, #clNotifPanel').length) {
			clNotifSetOpen(false);
		}
	});
	$(document).on('keydown', function (e) {
		if (e.key === 'Escape') {
			clNotifSetOpen(false);
		}
	});
	$(window).on('scroll resize', function () {
		if ($('#clNotifPanel').hasClass('open')) clPositionNotif();
	});

	/* -----------------------------------
	Espace client — Modifier une réclamation (client)
	-------------------------------------*/
	$(document).on('click', '.cl-recl-edit-toggle', function () {
		$(this).closest('.cl-recl-item').find('.cl-recl-edit-form').slideToggle(180);
	});
	$(document).on('click', '.cl-recl-edit-cancel', function () {
		$(this).closest('.cl-recl-edit-form').slideUp(180);
	});
	$('.cl-recl-edit-form').ajaxForm({
		beforeSubmit: function (arr, $form) {
			$form.find('.loading').show();
		},
		success: function (theResponse, status, xhr, $form) {
			console.log(theResponse);
			$form.find('.loading').hide();
			var data;
			try { data = JSON.parse(theResponse); } catch (e) { data = { icon: 'error' }; }
			if (data.icon == 'success') {
				$form.find('.msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
				setTimeout(function () { document.location.reload(); }, 1200);
			} else if (["error", "warning"].includes(data.icon)) {
				$form.find('.msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> ' + data.message + ' </div>');
			} else {
				$form.find('.msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> ' + ERREUR_EXEC + '</div>');
			}
		}
	});

	$(document).on('click','.collaps-item',function(){
		if($(this).hasClass("opened")){
			$(this).removeClass("opened", 1000, "ease");
		}else{
			$('.collaps-item').removeClass("opened", 1000, "ease");
			$(this).addClass("opened", 1000, "ease");
		}
	});
		
		$('.cs-isotop').isotope({
    	itemSelector: '.cs-isotop_item',
    	transitionDuration: '0.60s',
    	percentPosition: true,
    	masonry: {
    	  columnWidth: '.cs-grid_sizer',
    	}
      });
      /* Active Class of Portfolio*/
      $('.cs-isotop_filter ul li').on('click', function (event) {
    	$(this).siblings('.active').removeClass('active');
    	$(this).addClass('active');
    	event.preventDefault();
      });
      /*=== Portfolio filtering ===*/
      $('.cs-isotop_filter ul').on('click', 'a', function () {
    	var filterElement = $(this).attr('data-filter');
    	console.log(filterElement)
    	$('.cs-isotop').isotope({
    	  filter: filterElement,
    	});
      });
      
      $(".submit-form").click(function(){
          $(this).parent('form').submit();
      })
});
