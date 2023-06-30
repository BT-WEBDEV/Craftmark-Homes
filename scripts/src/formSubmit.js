// Contact Modal Trigger
(getUrlVars()["contact"] == 1) ? $('#contactToday').modal('show') : "";

$(document).on('submit', '#topBuilderForm', function (event) {
    event.preventDefault();
    // Data validation
    var re = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    // Disable the submit button while evaluating if the form should be submitted
    $('#buttonMain').prop('disabled', true);

    //HONEYPOT FAKE INPUT FOR CATCHING BOT FORM SPAM
    // var fullName = document.forms["topBuilderForm"]["fullName"].value;
    //
    var firstName = document.forms["topBuilderForm"]["firstName"].value;
    var lastName = document.forms["topBuilderForm"]["lastName"].value;
    var email = document.forms["topBuilderForm"]["email"].value;
    var phone = document.forms["topBuilderForm"]["phone"].value;
    var zipCode = document.forms["topBuilderForm"]["zipCode"].value;
    var comments = document.forms["topBuilderForm"]["comments"].value;
    var community = document.forms["topBuilderForm"]["community"].value;
    var aptDate = document.forms["topBuilderForm"]["aptDate"].value;
    var aptTime = document.forms["topBuilderForm"]["aptTime"].value;
    var quickDeliAddress = document.forms["topBuilderForm"]["quickDeliAddress"].value;
    var interestOptions = document.forms["topBuilderForm"]["interest-options"].value;

    var unformattedPhone = phone.replace(/[^0-9]/gi, '');

    var phone_pattern = /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;

    // console.log(unformattedPhone);

    // HONEY POT TEST - IF HIDDEN INPUT OF FULL NAME IS FILLED OUT, PREVENT FORM SUBMISSION
    // if(fullName) {
    //     event.preventDefault();
    //     // Reactivate the button if the form was not submitted
    //     $('#buttonMain').prop('disabled', false);
    //     return false;
    // }

    comments = "##APPOINTMENT##: " + aptDate + "," + aptTime + " | " + comments;

    if (quickDeliAddress) {
        comments = "##QuickDeliAddress##: " + quickDeliAddress + " | " + comments;
    }

    var is_email = re.test(email);

    if (!firstName || !lastName || !email || !phone) {
        alert("Required field (*) must be filled out");
        // Reactivate the button if the form was not submitted
        $('#buttonMain').prop('disabled', false);
        return false;
    }
    if (!is_email) {
        alert("A valid email address is required");
        // Reactivate the button if the form was not submitted
        $('#buttonMain').prop('disabled', false);
        return false;
    }
    if(!phone_pattern.test( phone )) {
        alert("A valid phone number is required");
        // Reactivate the button if the form was not submitted
        $('#buttonMain').prop('disabled', false);
        return false;
    }

    else {
        var data = $(this).serialize();
        var contentType = "application/x-www-form-urlencoded; charset=utf-8";
        $('#buttonMain').prop('disabled', false);
        doPostAjax(community);
        ajaxReqSaveForm(data);

        // NO PROXY 
        // function doPostAjax(rule_id) {
        //     $.ajax({
        //         url: 'https://webforms.topbuildersolutions.net/api/CreateLead.aspx',
        //         type: 'POST',
        //         contentType: contentType,
        //         data: { BuilderAccountId: 32, AuthenticationId: "86eb9035-83da-4741-ac07-ed85b8ed52f2", RuleId: rule_id, FirstName: firstName, LastName: lastName, Email: email, MobilePhone: unformattedPhone, ZipCode: zipCode, Comments: comments, Options: interestOptions },

        //         success: function (data, textStatus, xhr) {
        //             if ($(data).find('ResponseCode').text() == 0) {
        //                 $("#topBuilderForm").fadeOut(500).hide(function () {
        //                     $("#success_message").fadeIn(500).show();
        //                 });
        //                 $('#buttonMain').prop('disabled', false);
        //             } else {
        //                 alert($(data).find('ResponseMessage').text());
        //                 $('#buttonMain').prop('disabled', false);
        //             }

        //         },
        //         error: function (xhr) {
        //             alert("Something Wrong Please Try Again");
        //             $('#buttonMain').prop('disabled', false);
        //         }
        //     });
        // }

        // WITH PROXY 
        function doPostAjax(rule_id) {  
            $.ajax({
                url: 'https://www.craftmarkhomes.com/api/formSubmit.php', // Update with the correct URL of your PHP script
                type: 'POST',
                data: {
                    BuilderAccountId: 32,
                    AuthenticationId: "86eb9035-83da-4741-ac07-ed85b8ed52f2",
                    RuleId: rule_id,
                    FirstName: firstName,
                    LastName: lastName,
                    Email: email,
                    MobilePhone: unformattedPhone,
                    ZipCode: zipCode,
                    Comments: comments,
                    Options: interestOptions
                },
                success: function (data, textStatus, xhr) {
                    // console.log("Success Response:");
                    // console.log("Data:", data);
                    // console.log("Text Status:", textStatus);
                    // console.log("XHR Object:", xhr);
        
                    var response = JSON.parse(data);
                    if (response.success) {
                        // console.log("Form submission successful!");
        
                        $("#topBuilderForm").fadeOut(500).hide(function () {
                            $("#success_message").fadeIn(500).show();
                        });
        
                        $('#buttonMain').prop('disabled', false);
                    } else {
                        // Handle error case
                        alert("Form submission failed with error: " + response.error);
                        $('#buttonMain').prop('disabled', false);
                    }
                },
                error: function (xhr) {
                    console.log("Network Error:");
                    console.log("XHR Object:", xhr);
                    alert("Something went wrong. Please try again.");
                    $('#buttonMain').prop('disabled', false);
                }
            });
        }
        
        return false;
    }

});


//======================================================================
// Math Problem Captcha  - Main Contact Page & Pop Up Modal on Community Page
//======================================================================
const buttonSubmit = document.querySelector('[type="submit"]');
const quizInput = document.querySelector(".quiz-control");
if (quizInput) {
    quizInput.addEventListener("input", function(e) {
        const res = buttonSubmit.getAttribute("data-res");
        if ( this.value == res ) {
            buttonSubmit.removeAttribute("disabled");
        } else {
            buttonSubmit.setAttribute("disabled", "");
        }
    });
}
//======================================================================
// Google reCaptcha V3 - COMMUNITY POP UP MODAL FORM - POSTS TO FORM.PHP - THEN RETURNS RESULT 
//======================================================================

$(document).on('submit', '.community-modal-form', function (event) {
    console.log("Button has been pressed"); 
    // We stop it 
    event.preventDefault();
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var zipCode = $('#zipCode').val();
    var community = $('#community').val();
    var aptDate = $('#aptDate').val();
    var aptTime = $('#aptTime').val();
    var comments = $('#comments').val();
    var interestOptions = $('#interest-options').val();

    // needs for recaptacha ready
    grecaptcha.ready(function() {
        console.log("captcha ready!"); 
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('6LfCa4oiAAAAAD7NhTj4lBLG2BLRwlRkS8m5vRM3', {action: 'create_form'}).then(function(token) {
            console.log("captcha executed!"); 
            // add token to form
            $('#topBuilderForm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            $('#topBuilderForm').prepend('<input type="hidden" id ="action" name="action" value="create_form">');

            var action = $('#action').val();

            //console.log(action); 

            $.post("../contact/form.php",{
                firstName: firstName,
                lastName: lastName,
                email: email,
                phone: phone, 
                zipCode: zipCode, 
                community: community, 
                aptDate: aptDate,
                aptTime, aptTime, 
                comments: comments,
                interestOptions: interestOptions,
                action: action, 
                token: token
            }, function(result) {
                        console.log(result);
                        if(result.success) {
                                alert('Thanks for the form submission!')
                        } else {
                                alert('This looks like spam!') 
                        }
            });
        
        });   
    }); 
});


//======================================================================
// Forced Overlay Contact Form
//======================================================================
$(document).on('submit', '#forcedOverlayContactModal', function (event) {
    event.preventDefault();
    // // Data validation
    var re = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    // Disable the submit button while evaluating if the form should be submitted
    $('#buttonMainV2').prop('disabled', true);

    //HONEYPOT FAKE INPUT FOR CATCHING BOT FORM SPAM
    // var fullName = document.forms["forcedOverlayContactModal"]["fullName"].value;
    //
    var firstName = document.forms["forcedOverlayContactModal"]["firstName"].value;
    var lastName = document.forms["forcedOverlayContactModal"]["lastName"].value;
    var email = document.forms["forcedOverlayContactModal"]["email"].value;
    var phone = document.forms["forcedOverlayContactModal"]["phone"].value;

    var unformattedPhone = phone.replace(/[^0-9]/gi, '');

    var phone_pattern = /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;

    // HONEY POT TEST - IF HIDDEN INPUT OF FULL NAME IS FILLED OUT, PREVENT FORM SUBMISSION
    // if(fullName) {
    //     event.preventDefault();
    //     // Reactivate the button if the form was not submitted
    //     $('#buttonMainV2').prop('disabled', false);
    //     return false;
    // }

    // comments = "##APPOINTMENT##: " + aptDate + "," + aptTime + " | " + comments;

    // if (quickDeliAddress) {
    //     comments = "##QuickDeliAddress##: " + quickDeliAddress + " | " + comments;
    // }

    var is_email = re.test(email);

    if (!firstName || !lastName || !email || !phone) {
        alert("Required field (*) must be filled out");
        // Reactivate the button if the form was not submitted
        $('#buttonMainV2').prop('disabled', false);
        return false;
    }
    if (!is_email) {
        alert("A valid email address is required");
        // Reactivate the button if the form was not submitted
        $('#buttonMainV2').prop('disabled', false);
        return false;
    }
    if(!phone_pattern.test( phone )) {
        alert("A valid phone number is required");
        // Reactivate the button if the form was not submitted
        $('#buttonMainV2').prop('disabled', false);
        return false;
    }

    else {
        var data = $(this).serialize();
        var contentType = "application/x-www-form-urlencoded; charset=utf-8";
        $('#buttonMainV2').prop('disabled', false);
        doPostAjax(community);
        ajaxReqSaveForm(data);

        function doPostAjax(rule_id) {
            $.ajax({
                url: 'https://webforms.topbuildersolutions.net/api/CreateLead.aspx',
                type: 'POST',
                contentType: contentType,
                data: { BuilderAccountId: 32, AuthenticationId: "86eb9035-83da-4741-ac07-ed85b8ed52f2", RuleId: rule_id, FirstName: firstName, LastName: lastName, Email: email, MobilePhone: unformattedPhone },

                success: function (data, textStatus, xhr) {
                    if ($(data).find('ResponseCode').text() == 0) {
                        $("#forcedOverlayContactModal").fadeOut(500).hide(function () {
                            $("#success_messageV2").fadeIn(500).show();
                        });
                        $('#buttonMainV2').prop('disabled', false);
                    } else {
                        alert($(data).find('ResponseMessage').text());
                        $('#buttonMainV2').prop('disabled', false);
                    }

                },
                error: function (xhr) {
                    alert("Something Wrong Please Try Again");
                    $('#buttonMainV2').prop('disabled', false);
                }
            });
        }
        return false;
    }
});

// Ajax Request to Save Form Submit info to MySQL DB
function ajaxReqSaveForm(data) {
    $.ajax({
        type: "POST",
        url: "../../includes/components/visitorAnalytics/ajaxReqOnSubmit.php",
        data: data,
        success: function (response) {
            console.log(response);
        }
    });
}

