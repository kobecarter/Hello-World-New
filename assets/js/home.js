/* document ready all function here */
$(document).ready(function () {
  /* -----------------------------------
    01. Caroussel Services
    -------------------------------------*/
  $("#owl-services").owlCarousel({
    lazyLoad: true,
    loop: true,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
        dots: false
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
  });
  
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
	  
  /* -----------------------------------
    02. Caroussel Videos
    -------------------------------------*/
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
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });
  /* -----------------------------------
            03. Caroussel References
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
        items: 3,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
      1400: {
        items: 6,
      }
    },
  });
  /* -----------------------------------
            04. Caroussel Testimpnials
                -------------------------------------*/
  $("#owl-testimonials").owlCarousel({
    lazyLoad: true,
    loop: true,
    nav: true,
    navText: ["", ""],
    dots: false,
    margin: 30,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 2,
      },
    },
  });
  /* -----------------------------------
                05. Caroussel blog
                -------------------------------------*/
  $("#owl-blog").owlCarousel({
    lazyLoad: true,
    loop: true,
    nav: true,
    navText: ["", ""],
    dots: true,
    margin: 30,
    autoplay: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  $(document).on("click", ".go-to", function () {
    let self = $(this);
    let url = self.attr("data-url");
    window.open(url, "_blank");
  });

  $(".stop-propagation").on("click", function (event) {
    event.stopPropagation();
  });

  $(document).on("click", ".btn-share-social-media", function () {
    let self = $(this);
    let share_to = self.attr("data-share-to");
    let url = self.attr("data-url");
    const navUrl = share_to + url;
    window.open(navUrl, "_blank");
    return;
  });
  /* -----------------------------------
                05. Button UP
                -------------------------------------*/
  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) $(".up").fadeIn();
    else $(".up").fadeOut();
  });

  $(".up").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
  });

  $(".scroll-down").click(function () {
    $("html, body").animate({ scrollTop: $(".slider-box").height() }, 1000);
  });
  /* -----------------------------------
                13. Testimonial popup opening
                -------------------------------------*/

  $(".testimonial-text .more").click(function () {
    var id = $(this).attr("data-id");
    var order = "id=" + id;
    $.post(
      siteURL +
        "components/com_frontpage/controleurs/router.php?task=showTestimonial",
      order,
      function (theResponse) {
        //$(".modal-title").html('<i class="far fa-comment-alt"></i> Témoignage');
        $("#homeModal .modal-body").html(theResponse);
        $("#homeModal").modal("show");
      }
    );
  });
  
  
  /* -----------------------------------
                13. Forms
                -------------------------------------*/
  //     	window.addEventListener('load', function() {
  //     	  var forms = document.getElementsByClassName('needs-validation');
  //     	  var validation = Array.prototype.filter.call(forms, function(form) {
  //     		form.addEventListener('submit', function(event) {
  //     			 event.preventDefault();
  //     		  if (form.checkValidity() === false) {
  //     		      alert("lfvdfv")
  //     			event.stopPropagation();
  //     		  }else{
  // 				  var id = form.getAttribute('id')
  // 			  	/* -----------------------------------
  // 					07. Contact form
  // 					-------------------------------------*/
  // 					$('form#quotePopUpForm').ajaxForm({
  // 						beforeSubmit: function () {
  // 							// chargement
  // 							$("form#quotePopUpForm .loading").css("display", "block");
  // 						},
  // 						success: function (theResponse) {
  // 							console.log(theResponse)
  // 							$("form#quotePopUpForm .loading").hide();
  // 							var offset = $("#quotePopUpForm .msgbox").offset().top - 100;
  // 							$("html, body").animate({ scrollTop: offset }, "slow");

  // 							if (parseInt(theResponse) === 1) {
  // 								$('form#quotePopUpForm .msgbox').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>'+SUCCES_ENVOI+'</div>');
  // 								$('form#quotePopUpForm')[0].reset();
  // 								document.location = REDIRECT_LINK_QUOTE;
  // 							}
  // 							else if (parseInt(theResponse) === 0) {
  // 								$('form#quotePopUpForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+CHAMPS_OBLIG+' </div>');
  // 							}
  // 							else if (parseInt(theResponse) === 2) {
  // 								$('form#quotePopUpForm .msgbox').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> Code antispam incorrecte</div>');
  // 							}
  // 							else {
  // 								$('form#quotePopUpForm .msgbox').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button> '+ERREUR_EXEC+'</div>');
  // 							}
  // 						}
  // 					});

  // 	  if(id =="quotePopUpForm"){
  // 		$("form#quotePopUpForm").submit()
  // 	  }
  //     		  }
  //     		  form.classList.add('was-validated');
  //     		}, false);
  //     	  });
  //     	}, false);

  //   $(document).on("click", ".iti__country", function () {
  //     let self = $(this);
  //     let value = self.find(".iti__dial-code").text();
  //     let phone = $("input[name='field']").val();
  //     $("input[name='cc']").val(value);
  //     $('input[name="phone"]').val(value + phone);
  //     console.log(value + phone);
  //   });

  //   $(document).on("input", 'input[name="field"]', function () {
  //     let self = $(this);
  //     let value = self.val();
  //     let form = self.parents("form");
  //     let cc = form.find('input[name="cc"]').val();
  //     form.find('input[name="phone"]').val(cc + value);
  //     console.log(cc + value);
  //   });

  //   // Wizard
  //   $(document).on("change", "input[name='services[]']", function () {
  //     if ($("input[name='services[]']:checked").length > 0) {
  //       $("input[name='services[]']").prop("required", false);
  //     } else {
  //       $("input[name='services[]']").prop("required", true);
  //     }
  //   });
  //   $(document).on("click", ".btn-wizard-next", function () {
  //     let self = $(this);
  //     let step = $("form#quotePopUpForm").find("input[name='step']").val();
  //     wizardValidation(step);
  //   });
  //   $(document).on("click", ".btn-wizard-previous", function () {
  //     let self = $(this);
  //     let step = $("form#quotePopUpForm").find("input[name='step']").val();
  //     let next_step = parseInt(step) - 1;
  //     wizard(next_step);
  //   });
  //   $(document).on("change input", ".range-budget", function () {
  //     let self = $(this);
  //     let value = self.val();
  //     $("form#quotePopUpForm")
  //       .find("span.span-budget-value")
  //       .text("+" + value);
  //   });
  //   let step_one_validation = false;
  //   let step_two_validation = false;
  //   let step_three_validation = false;
  //   let step_four_validation = false;
  //   function wizard(next_step) {
  //     $("input[name='step']").val(next_step);
  //     if (next_step == 1) {
  //       $("form#quotePopUpForm").find(".btn-wizard-previous").addClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-next").removeClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-submit").addClass("d-none");
  //     }
  //     if (next_step > 1 && next_step < 4) {
  //       $("form#quotePopUpForm")
  //         .find(".btn-wizard-previous")
  //         .removeClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-next").removeClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-submit").addClass("d-none");
  //     }
  //     if (next_step >= 4) {
  //       $("form#quotePopUpForm").find(".ul-answers").html("");
  //       $("form#quotePopUpForm")
  //         .find("input[name='services[]']:checked")
  //         .each(function () {
  //           let self = $(this);
  //           $("form#quotePopUpForm")
  //             .find(".ul-answers")
  //             .append(
  //               '<li class="li-answer text-grey-light">' +
  //                 self.attr("data-value") +
  //                 "</li>"
  //             );
  //         });

  //       $("form#quotePopUpForm")
  //         .find(".span-budget")
  //         .text($("form#quotePopUpForm").find("input[name='budget']").val());
  //       $("form#quotePopUpForm")
  //         .find(".span-first-name")
  //         .text($("form#quotePopUpForm").find("input[name='first_name']").val());
  //       $("form#quotePopUpForm")
  //         .find(".span-last-name")
  //         .text($("form#quotePopUpForm").find("input[name='last_name']").val());
  //       $("form#quotePopUpForm")
  //         .find(".span-email")
  //         .text($("form#quotePopUpForm").find("input[name='email']").val());
  //       $("form#quotePopUpForm")
  //         .find(".span-phone")
  //         .text($("form#quotePopUpForm").find("input[name='phone']").val());

  //       $("form#quotePopUpForm")
  //         .find(".btn-wizard-previous")
  //         .removeClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-next").addClass("d-none");
  //       $("form#quotePopUpForm").find(".btn-wizard-submit").removeClass("d-none");
  //     }
  //     $("form#quotePopUpForm").find(".step").addClass("d-none");
  //     $("form#quotePopUpForm")
  //       .find(".step[data-step='" + next_step + "']")
  //       .removeClass("d-none");
  //   }
  //   function wizardValidation(step) {
  //     console.log("step => ", step);
  //     let next_step = parseInt(step) + 1;
  //     if (step == 1) {
  //       if (
  //         $("form#quotePopUpForm").find("input[name='services[]']:checked")
  //           .length > 0
  //       ) {
  //         console.log("yes check");
  //         wizard(next_step);
  //         step_one_validation = true;
  //       } else {
  //         console.log("no check");
  //         step_one_validation = false;
  //       }
  //     } else if (step == 2) {
  //       if ($("form#quotePopUpForm").find("input[type='range']").val() > 0) {
  //         console.log("yes range");
  //         wizard(next_step);
  //         step_two_validation = true;
  //       } else {
  //         console.log("no range");
  //         step_two_validation = false;
  //       }
  //     } else if (step == 3) {
  //       console.log("form validation");
  //       let first_name = $("form#quotePopUpForm")
  //         .find("input[name='first_name']")
  //         .val();
  //       let last_name = $("form#quotePopUpForm")
  //         .find("input[name='last_name']")
  //         .val();
  //       let email = $("form#quotePopUpForm").find("input[name='email']").val();
  //       let testEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
  //       let phone = $("form#quotePopUpForm").find("input[name='field']").val();
  //       let testPhone = /^\d{6,}$/;
  //       if (
  //         !["", null, undefined].includes(first_name) &&
  //         !["", null, undefined].includes(last_name) &&
  //         !["", null, undefined].includes(email) &&
  //         testEmail.test(email) &&
  //         !["", null, undefined].includes(phone) &&
  //         testPhone.test(phone)
  //       ) {
  //         console.log("yes form");
  //         wizard(next_step);
  //         step_three_validation = true;
  //       } else {
  //         console.log("no form");
  //         step_three_validation = false;
  //       }
  //     } else if (step == 4) {
  //       step_three_validation = true;
  //     }
  //     $("#quotePopUpForm").addClass("was-validated");
  //   }

  //     $(window).one("click", function() {
  //     var order = '';
  //     $.post(siteURL + "components/com_frontpage/controleurs/router.php?task=getPopUpHome", order, function (theResponse) {
  //         $(".modal-popup-home").html(theResponse);
  //         console.log("Popup content loaded");
  //     });
  // });
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
});
