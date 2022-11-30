$(document).ready(function(){
    $('input[name="firstName"]').focus(function(){
        $(".show-more-btn").hide();   
        $("#hidden-form").fadeIn();
        $("#social-icons-row").fadeIn();
    });

    $('input[name="lastName"]').focus(function(){
        $(".show-more-btn").hide();   
        $("#hidden-form").fadeIn();
        $("#social-icons-row").fadeIn();
    });

    $(".show-more-btn").click(function(){
        $(this).hide();   
        $("#hidden-form").fadeIn();
        $("#social-icons-row").fadeIn();
    });
});