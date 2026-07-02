/* document ready all function here */
$(document).ready(function () {
    
    $(document).on("click", ".iti__country", function() {
        let self = $(this);
        let value = self.find(".iti__dial-code").text();
        let phone = $("input[name='field']").val();
        $("input[name='cc']").val(value);
        $('input[name="phone"]').val(value + phone);
        console.log(value + phone);
    });
    
    $(document).on("input", 'input[name="field"]', function() {
        let self = $(this);
        let value = self.val();
        let form = self.parents("form");
        let cc = form.find('input[name="cc"]').val();
        form.find('input[name="phone"]').val(cc + value);
        console.log(cc + value);
    });
    
    // Wizard
    $(document).on("change", "input[name='services[]']", function() {
        if ($("input[name='services[]']:checked").length > 0) {
            $("input[name='services[]']").prop("required", false);
        } else {
            $("input[name='services[]']").prop("required", true);
        }
    });
    $(document).on("click", ".btn-wizard-next", function() {
        let self = $(this);
        let step = $("form#quotePopUpForm").find("input[name='step']").val();
        //alert(step);
        wizardValidation(step);
    });
    $(document).on("click", ".btn-wizard-previous", function() {
        let self = $(this);
        let step = $("form#quotePopUpForm").find("input[name='step']").val();
        let next_step = parseInt(step) - 1;
        //alert(next_step);
        wizard(next_step);
    });
    $(document).on("change input", ".range-budget", function() {
        let self = $(this);
        let value = self.val();
        $("form#quotePopUpForm")
            .find("span.span-budget-value")
            .text("+" + value);
    });
    
    let step_one_validation = false;
    let step_two_validation = false;
    let step_three_validation = false;
    let step_four_validation = false;

    function wizard(next_step) {
        $("input[name='step']").val(next_step);
        if (next_step == 1) {
            $("form#quotePopUpForm").find(".btn-wizard-previous").addClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-next").removeClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-submit").addClass("d-none");
        }
        if (next_step > 1 && next_step < 4) {
            $("form#quotePopUpForm")
                .find(".btn-wizard-previous")
                .removeClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-next").removeClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-submit").addClass("d-none");
        }
        if (next_step >= 4) {
            $("form#quotePopUpForm").find(".ul-answers").html("");
            $("form#quotePopUpForm")
                .find("input[name='services[]']:checked")
                .each(function() {
                    let self = $(this);
                    $("form#quotePopUpForm")
                        .find(".ul-answers")
                        .append(
                            '<li class="li-answer text-grey-light">' +
                            self.attr("data-value") +
                            "</li>"
                        );
                });

            $("form#quotePopUpForm")
                .find(".span-budget")
                .text($("form#quotePopUpForm").find("input[name='budget']").val());
            $("form#quotePopUpForm")
                .find(".span-first-name")
                .text($("form#quotePopUpForm").find("input[name='first_name']").val());
            $("form#quotePopUpForm")
                .find(".span-last-name")
                .text($("form#quotePopUpForm").find("input[name='last_name']").val());
            $("form#quotePopUpForm")
                .find(".span-email")
                .text($("form#quotePopUpForm").find("input[name='email']").val());
            $("form#quotePopUpForm")
                .find(".span-phone")
                .text($("form#quotePopUpForm").find("input[name='phone']").val());
          $("form#quotePopUpForm")
                .find(".span-ville")
                .text($("form#quotePopUpForm").find("select[name='city']").val());


            $("form#quotePopUpForm")
                .find(".btn-wizard-previous")
                .removeClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-next").addClass("d-none");
            $("form#quotePopUpForm").find(".btn-wizard-submit").removeClass("d-none");
        }
        $("form#quotePopUpForm").find(".step").addClass("d-none");
        $("form#quotePopUpForm")
            .find(".step[data-step='" + next_step + "']")
            .removeClass("d-none");
    }
    
    
    function wizardValidation(step) {
        console.log("step => ", step);
        let next_step = parseInt(step) + 1;
        if (step == 1) {
            if (
                $("form#quotePopUpForm").find("input[name='services[]']:checked")
                .length > 0
            ) {
                console.log("yes check");
                wizard(next_step);
                step_one_validation = true;
            } else {
                console.log("no check");
                step_one_validation = false;
            }
        } else if (step == 2) {
            if ($("form#quotePopUpForm").find("input[type='range']").val() > 0) {
                console.log("yes range");
                wizard(next_step);
                step_two_validation = true;
            } else {
                console.log("no range");
                step_two_validation = false;
            }
        } else if (step == 3) {
            console.log("form validation");
            let first_name = $("form#quotePopUpForm")
                .find("input[name='first_name']")
                .val();
            let last_name = $("form#quotePopUpForm")
                .find("input[name='last_name']")
                .val();
            let email = $("form#quotePopUpForm").find("input[name='email']").val();
            let testEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
            let phone = $("form#quotePopUpForm").find("input[name='field']").val();
            let testPhone = /^\d{6,}$/;
            if (
                !["", null, undefined].includes(first_name) &&
                !["", null, undefined].includes(last_name) &&
                !["", null, undefined].includes(email) &&
                testEmail.test(email) &&
                !["", null, undefined].includes(phone) &&
                testPhone.test(phone)
            ) {
                console.log("yes form");
                wizard(next_step);
                step_three_validation = true;
            } else {
                console.log("no form");
                step_three_validation = false;
            }
        } else if (step == 4) {
            step_three_validation = true;
        }
        $("#quotePopUpForm").addClass("was-validated");
    }
    
});