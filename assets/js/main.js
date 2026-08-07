
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
		self.addClass('d-none')
		self.siblings('.btn-loading').removeClass('d-none')
		$.get(siteURL+"components/com_client/controleurs/router.php?task=pdfInvoiceApi&id="+id, function (theResponse) {
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				var pdfUrl = platURL+"uploads/"+(data.message).trim();
				window.open(pdfUrl, '_blank');
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			} else {
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			}
		})
	})

	$(document).on("click",".btn-download-quote",function(){
		let self = $(this)
		let id = self.attr('data-id')
		self.addClass('d-none')
		self.siblings('.btn-loading').removeClass('d-none')
		$.get(siteURL+"components/com_client/controleurs/router.php?task=pdfQuoteApi&id="+id, function (theResponse) {
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				var pdfUrl = platURL+"uploads/"+(data.message).trim();
				window.open(pdfUrl, '_blank');
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			} else {
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			}
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
