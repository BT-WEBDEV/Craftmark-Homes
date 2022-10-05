// Contact Modal Trigger
(getUrlVars()["contact"] == 1) ? $('#contactToday').modal('show') : "";

$(document).on('submit', '#topBuilderForm', function (event) {
    event.preventDefault();
    // Data validation
    var re = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

    // Disable the submit button while evaluating if the form should be submitted
    $('#buttonMain').prop('disabled', true);

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

    var unformattedPhone = phone.replace(/[^0-9]/gi, '');

    var phone_pattern = /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;

    console.log(unformattedPhone);

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

        function doPostAjax(rule_id) {
            $.ajax({
                url: 'https://webforms.topbuildersolutions.net/api/CreateLead.aspx',
                type: 'POST',
                contentType: contentType,
                data: { BuilderAccountId: 32, AuthenticationId: "86eb9035-83da-4741-ac07-ed85b8ed52f2", RuleId: rule_id, FirstName: firstName, LastName: lastName, Email: email, MobilePhone: unformattedPhone, ZipCode: zipCode, Comments: comments },

                success: function (data, textStatus, xhr) {
                    if ($(data).find('ResponseCode').text() == 0) {
                        $("#topBuilderForm").fadeOut(500).hide(function () {
                            $("#success_message").fadeIn(500).show();
                        });
                        $('#buttonMain').prop('disabled', false);
                    } else {
                        alert($(data).find('ResponseMessage').text());
                        $('#buttonMain').prop('disabled', false);
                    }

                },
                error: function (xhr) {
                    alert("Something Wrong Please Try Again");
                    $('#buttonMain').prop('disabled', false);
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

