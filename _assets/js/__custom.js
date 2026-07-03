(function($) {
  "use strict";

  /* document ready all function here */
  $(document).ready(function() {
	  
	$('[data-toggle="tooltip"]').tooltip();
	  
    /* -----------------------------------
        01. Caroussel Services
        -------------------------------------*/
    $("#owl-offres").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: true,
      dots: true,
      autoplay: true,
	  autoplayHoverPause: true,	
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        700: {
          items: 3
        },
        1000: {
          items: 4
        },
		1200: {
			items: 5
		  }
      }
    });

	$("#owl-services").owlCarousel({
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

	$("#owl-packages").owlCarousel({
	    lazyLoad: true,
		loop: true,
		nav: true,
		dots: true,
		autoplay: false,
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
	/* -----------------------------------
        02. Caroussel références
        -------------------------------------*/
    $("#owl-reference").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: false,
      dots: false,
      autoplay: true,
	  autoplayHoverPause: true,		
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 3
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        },
        1400: {
          items: 6
        }
      }
    }); 
	  
	/* -----------------------------------
        03. Caroussel témoignage
        -------------------------------------*/
    $("#owl-testimonials").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: true,
	  navText: ["",""],	
      dots: false,
      margin: 30,
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
        04. Caroussel blog
        -------------------------------------*/
    $("#owl-blog").owlCarousel({
        lazyLoad: true,
		  loop: true,
		  nav: true,
		  navText : ["",""],	
		  dots: true,
		  margin: 30,
		  autoplay: true,
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
		
		$(document).on('click','.go-to',function(){
    	    let self = $(this)
    	    let url = self.attr('data-url')
    	    window.open(url, '_blank');
    	})
    	
    	$('.stop-propagation').on('click',function(event){
            event.stopPropagation();
        });
        
        $(document).on('click', '.btn-share-social-media', function() {
            let self = $(this)
            let share_to = self.attr('data-share-to')
            let url = self.attr('data-url')
            const navUrl = share_to + url;
            window.open(navUrl, "_blank");
            return;
        })
	});
		/* -----------------------------------
        05. Collapse services
        -------------------------------------*/
	
		$(document).on('click','.collaps-item',function(){
			if($(this).hasClass("opened")){
				$(this).removeClass("opened", 1000, "ease");
			}else{
				$('.collaps-item').removeClass("opened", 1000, "ease");
				$(this).addClass("opened", 1000, "ease");
			}
		})
	
	/* -----------------------------------
        05. Button UP
        -------------------------------------*/
	$(window).scroll(function () {
		if ($(window).scrollTop() > 100)
			$(".up").fadeIn();
		else
			$(".up").fadeOut();
	});
	
	$(".up").click(function () {
		$("html, body").animate({scrollTop: 0}, 600);
	});
	
	$(".scroll-down").click(function () {
		$("html, body").animate({scrollTop: $(".slider-box").height()}, 1000);
	});
	
	/* -----------------------------------
        06. Banner Parallax
        -------------------------------------*/
	$('.bg-image').each(function(){
		var src = $(this).children('img').attr('src');
		$(this).css('background-image','url('+src+')').children('img').hide();
	});
	
	$('.bg-parallax').attr('data-top-bottom','background-position-y: 30%').attr('data-bottom-top','background-position-y: 70%');

	/* -----------------------------------
        07. Contact form
        -------------------------------------*/
	// $('form#contactForm').ajaxForm({
	// 	beforeSubmit: function () {
	// 		// chargement
	// 		$("#contactForm .loading").show();
	// 	},
	// 	success: function (theResponse) {
	// 		$("#contactForm .loading").hide();
			
	// 		if (parseInt(theResponse) === 1) {
	// 			$('#contactForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
	// 			$('#contactForm').resetForm();
	// 			document.location = REDIRECT_LINK;
	// 		}
	// 		else if (parseInt(theResponse) === 0) {
	// 			$('#contactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
	// 		}
	// 		else if (parseInt(theResponse) === 2) {
	// 			$('#contactForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
	// 		}
	// 		else {
	// 			$('#contactForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
	// 		}
	// 	}
	// });
	
	/* -----------------------------------
        07. Quote form
        -------------------------------------*/
        	/* -----------------------------------
        08. sticky header
        -------------------------------------*/

	$(window).scroll(function () {
		if ($(window).scrollTop() > $(window).height()) {
		  //  alert("hello");
			$("header.sticky").slideDown();

		} else {
			$("header.sticky").slideUp();
		}
	});
	
	//$("#devisForm input.btn").click(function(){
		//gtag_report_conversion();
	//})
	// $('form#devisForm').ajaxForm({
	// 	beforeSubmit: function () {
	// 		// chargement
	// 		$("#devisForm .loading").css("display", "block");
	// 	},
	// 	success: function (theResponse) {
	// 		$("#devisForm .loading").hide();
	// 		var offset = $("#devisForm .msgbox").offset().top - 100;
	// 		$("html, body").animate({ scrollTop: offset }, "slow");
			
	// 		if (parseInt(theResponse) === 1) {
	// 			$('#devisForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
	// 			$('form#devisForm')[0].reset();
	// 			document.location = REDIRECT_LINK_DEVIS;
	// 		}
	// 		else if (parseInt(theResponse) === 0) {
	// 			$('#devisForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
	// 		}
	// 		else if (parseInt(theResponse) === 2) {
	// 			$('#devisForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
	// 		}
	// 		else {
	// 			$('#devisForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
	// 		}
	// 	}
	// });
	
	/* -----------------------------------
        08. timeline
        -------------------------------------*/
	
	var timelineSwiper = new Swiper ('.timeline .swiper-container', {
	  direction: 'vertical',
	  loop: false,
	  speed: 1600,
	  pagination: '.swiper-pagination',
	  paginationBulletRender: function (swiper, index, className) {
		var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
		return '<span class="' + className + '">' + year + '</span>';
	  },
	  paginationClickable: true,
	  nextButton: '.swiper-button-next',
	  prevButton: '.swiper-button-prev',
	  breakpoints: {
		768: {
		  direction: 'horizontal',
		}
	  }
	});
	/* -----------------------------------
        09. ouverture popup recrutement
        -------------------------------------*/

	$(".apply-job").click(function(){
		var order = 'id='+$(this).attr("data-id");
		$.post(siteURL+"components/com_job/controleurs/router.php?task=getForm", order, function (theResponse) {
			$("#jobModal .modal-body").html(theResponse)
			$("#jobModal").modal("show");
		})
	})
	
	/* -----------------------------------
        10. pagination page réalisation
        -------------------------------------*/
	
	$(".load-portfolio").click(function(){
		$(".portfolio .loading").show();
		var $btn = $(this);
		var order = 'page='+(parseInt($btn.attr("current-page")) + 1);
		$.post(siteURL+"components/com_reference/controleurs/router.php?task=loadPortfolio", order, function (theResponse) {
			$(".portfolio .loading").hide();
			$(".portfolio-box").append(theResponse);
			$btn.attr("current-page",parseInt($btn.attr("current-page")) + 1);
		})
	})
	
	/* -----------------------------------
        11. Caroussel photographie
        -------------------------------------*/
    $("#owl-shooting").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: true,
	  navText : ["",""],	
      dots: true,
      margin: 0,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 2
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
    11. Caroussel photographie
    -------------------------------------*/
     $(".owl-shooting").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: true,
	  navText : ["",""],	
      dots: true,
      margin: 0,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 2
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
        11. Caroussel photographie
        -------------------------------------*/
    $("#owl-photos-leads,#owl-photos-seo").owlCarousel({
        lazyLoad: true,
      loop: true,
      nav: true,
	  navText : ["",""],	
      dots: true,
      margin: 0,
      autoplay: true,
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

	/* -----------------------------------
        11. Caroussel photographie
        -------------------------------------*/
		$("#owl-shooting-in-service").owlCarousel({
		    lazyLoad: true,
			loop: true,
			nav: true,
			navText : ["",""],	
			dots: true,
			margin: 0,
			autoplay: true,
			smartSpeed: 1000,
			responsive: {
			  0: {
				items: 4
			  },
			  600: {
				items: 3
			  },
			  1000: {
				items: 2
			  }
			}
		  }); 
	
	/* -----------------------------------
        12. ouverture popup contact service
        -------------------------------------*/

	$(".open-form-service").click(function(){
		var order = 'slug='+$(this).attr("data-slug");
		$.post(siteURL+"components/com_service/controleurs/router.php?task=getForm", order, function (theResponse) {
			//$("#serviceModal .modal-body").html(theResponse)
			//$("#serviceModal").modal("show");
			$(".service-form-box").html(theResponse);
			$(".service-form-box").slideDown();
			$("html, body").animate({scrollTop: $(".service-form-box").offset().top - 100}, 1000);
			
		})
	})
	
	/* -----------------------------------
        13. ouverture popup témoignage
        -------------------------------------*/

	$(".testimonial-text .more").click(function(){
		var id = $(this).attr("data-id");
		var order = 'id='+id;
		$.post(siteURL+"components/com_frontpage/controleurs/router.php?task=showTestimonial", order, function (theResponse) {
			//$(".modal-title").html('<i class="far fa-comment-alt"></i> Témoignage');
			$("#homeModal .modal-body").html(theResponse);
			$("#homeModal").modal('show');
		})
	})

	$(".btn-sign-out").click(function(e){
		e.preventDefault()
		$.get(siteURL+"components/com_client/controleurs/router.php?task=logoutApi", function (theResponse) {
			console.log(theResponse)
			if(theResponse == 1){
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}else {
				$('#logoutMessage .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		})
	})
	
	/* -----------------------------------
        14. Login form
        -------------------------------------*/
	
	$('form#loginForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#loginForm .loading").css("display", "block");
		},
		success: function (theResponse) {
			$("#loginForm .loading").hide();
			var offset = $("#loginForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			
			if (parseInt(theResponse) === 1) {
				$('#loginForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
				$('form#loginForm')[0].reset();
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}
			else if (parseInt(theResponse) === 0) {
				$('#loginForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
			}
			else {
				$('#loginForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	$('form#loginApiForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#loginApiForm .loading").css("display", "block");
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
				// console.log(data)
				setTimeout(function () {
					document.location.reload();
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#loginApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			}else {
				$('#loginApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	$('form#verifyEmailApiForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#verifyEmailApiForm .loading").css("display", "block");
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#verifyEmailApiForm .loading").hide();
			var offset = $("#verifyEmailApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				console.log(data.link)
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#verifyEmailApiForm')[0].reset();
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			}else {
				$('#verifyEmailApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	$('form#setNewPasswordApiForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("form#setNewPasswordApiForm .loading").css("display", "block");
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("form#setNewPasswordApiForm .loading").hide();
			var offset = $("form#setNewPasswordApiForm .msgbox").offset().top - 100;
			$("html, body").animate({ scrollTop: offset }, "slow");
			let data = JSON.parse(theResponse)
			if (data.icon == "success") {
				$('form#setNewPasswordApiForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.message+'</div>');
				$('form#setNewPasswordApiForm')[0].reset();
				setTimeout(function () {
					location.href = siteURL+"client-space/"
				}, 1500)
			}
			else if (["error","warning"].includes(data.icon)) {
				$('form#setNewPasswordApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			}else {
				$('form#setNewPasswordApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	$('form#reclamationApiForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#reclamationApiForm .loading").css("display", "block");
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
			}else {
				$('#reclamationApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});
	$('form#profileApiForm').ajaxForm({
		beforeSubmit: function () {
			// chargement
			$("#profileApiForm .loading").css("display", "block");
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
			}else {
				$('#profileApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		}
	});

	$(document).on("click",".btn-download-invoice",function(){
		let self = $(this)
		let id = self.attr('data-id')
		self.addClass('d-none')
		self.siblings('.btn-loading').removeClass('d-none')
		$.get(siteURL+"components/com_client/controleurs/router.php?task=pdfInvoiceApi&id="+id, function (theResponse) {
		    console.log(theResponse)
			let data = JSON.parse(theResponse)
			console.log(data)
			if (data.icon == "success") {
				// location.href = platURL+"uploads/"+data.message;
				
				var pdfUrl = platURL+"uploads/"+(data.message).trim();
				window.open(pdfUrl, '_blank');
				// var link = document.createElement('a');
				// link.href = pdfUrl;
				// link.download = data.message; 
			
				// document.body.appendChild(link);
				// link.click();

				// document.body.removeChild(link);
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#loginApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			}else {
				$('#loginApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
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
			console.log(data)
			if (data.icon == "success") {
				// location.href = platURL+"uploads/"+data.message;
				
				var pdfUrl = platURL+"uploads/"+data.message;
				window.open(pdfUrl, '_blank');
				// var link = document.createElement('a');
				// link.href = pdfUrl;
				// link.download = data.message; 
			
				// document.body.appendChild(link);
				// link.click();

				// document.body.removeChild(link);
				self.removeClass('d-none')
				self.siblings('.btn-loading').addClass('d-none')
			}
			else if (["error","warning"].includes(data.icon)) {
				$('#loginApiForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+data.message+' </div>');
			}else {
				$('#loginApiForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
			}
		
		})
	})

	$('form#loginGlobalForm').ajaxForm({

		beforeSubmit: function () {
			//chargement
			$("#loginGlobalForm .loading").show();
		},
		success: function (theResponse) {
			console.log(theResponse)
			$("#loginGlobalForm .loading").hide();
			if (parseInt(theResponse) === 1) {
				$('#loginGlobalForm .msgbox').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vous êtes connecté.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
				setTimeout(function () {
					location.href = $("meta[name='website']").attr('content')+"panneaux-des-administrateurs/";
				}, 1500)
			}
			else if (parseInt(theResponse) === 2) {
				$('#loginGlobalForm .msgbox').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Attention!</strong> Login ou mot de passe incorrecte <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			}else if (parseInt(theResponse) === 3) {
				$('#loginGlobalForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
			}
			else if (parseInt(theResponse) === 0) {
				$('#loginGlobalForm .msgbox').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Attention!</strong> Veuillez entrer votre login et mot de passe<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			}
			else {
				$('#loginGlobalForm .msgbox').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Erreur lors de l\'execution de l\'opération<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
			}
		}
	});

	$(document).on('click','.iti__country',function(){
        let self = $(this)
        let value= self.find('.iti__dial-code').text();
		let phone= $("input[name='field']").val()
        $("input[name='cc']").val(value)
		$('input[name="phone"]').val(value+phone)
		console.log(value+phone);
    })
	  
      $(document).on('input','input[name="field"]',function(){
        let self = $(this)
        let value= self.val()
        let form = self.parents('form')
        let cc = form.find('input[name="cc"]').val()
        form.find('input[name="phone"]').val(cc+value)
    	console.log(cc+value);
      })

})(jQuery);

// Enable form validation
(function() {
	'use strict';
	window.addEventListener('load', function() {
	  // Get the forms to apply validation
	  var forms = document.getElementsByClassName('needs-validation');
	  // Loop over them and prevent submission
	  var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			 event.preventDefault();
		  if (form.checkValidity() === false) {
			event.stopPropagation();
		  }else{
						  var id = form.getAttribute('id')    /*-------------------------------------------------------------------------------
					  	/* -----------------------------------
								07. Contact form
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

						$('form#devisForm').ajaxForm({
    beforeSubmit: function () {
        //Validation manuelle des champs required
        var valid = true;
        $('#devisForm [required]').each(function () {
            if (!$(this).val().trim()) {
                valid = false;
            }
        });

        if (!valid) {
            // On bloque l'envoi si un champ est vide
            $('form#devisForm .msgbox').html(
                '<div class="alert alert-warning alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                'Veuillez remplir tous les champs obligatoires.' +
                '</div>'
            );
            return false; //top ajaxForm ici
        }

        //En affiche le loader uniquement si tout est valide
        $("form#devisForm .loading").css("display", "block");
    },

    success: function (theResponse) {
        console.log(theResponse);
        $("form#devisForm .loading").hide();
        var offset = $("#devisForm .msgbox").offset().top - 100;
        $("html, body").animate({ scrollTop: offset }, "slow");

        if (parseInt(theResponse) === 1) {
            $('form#devisForm .msgbox').html(
                '<div class="alert alert-success alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                SUCCES_ENVOI +
                '</div>'
            );
            $('form#devisForm')[0].reset();
            document.location = REDIRECT_LINK_QUOTE;
        }
        else if (parseInt(theResponse) === 0) {
            $('form#devisForm .msgbox').html(
                '<div class="alert alert-warning alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                CHAMPS_OBLIG +
                '</div>'
            );
        }
        else if (parseInt(theResponse) === 2) {
            $('form#devisForm .msgbox').html(
                '<div class="alert alert-warning alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                'Code antispam incorrecte' +
                '</div>'
            );
        }
        else {
            $('form#devisForm .msgbox').html(
                '<div class="alert alert-danger alert-dismissable">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                ERREUR_EXEC +
                '</div>'
            );
        }
    }
});

		  }
		  form.classList.add('was-validated');
		}, false);
	  });
	}, false);
	
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
  })();
  
