
$(document).ready(function() {
	  
	$("#owl-services-cities").owlCarousel({
	    lazyLoad: true,
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplayHoverPause: true,	
		smartSpeed: 1000,
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
	    lazyLoad: true,
      	loop: true,
      	nav: true,
	  	navText : ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
      	dots: true,
      	autoplay: true,
	  	autoplayHoverPause: true,
      	autoplayTimeout: 3200,
      	smartSpeed: 1000,
      	responsive: {
			0: {
			items: 1,
			autoplay: false
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
