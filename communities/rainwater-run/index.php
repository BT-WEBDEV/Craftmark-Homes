<?php include_once("../../includes/header.php"); ?>
<style> 
    body {
        background-color: white; 
    }
    #landing-hero {
        padding-top: 40px;
    }

    .blue-bar {
        height: 75px; 
        background-color: #618eb7;
    }

    #welcome-vip {
        font-size: 3.6rem; 
        color: #618eb7; 
    }
    .p-content {
        font-size: 28px; 
        color: #022948;
        margin-top: 25px; 
    }
    input {
        border-radius: 0px !important;
        box-shadow: none !important;
        background-color: #f7f7f7 !important;   
    }
    input::placeholder {
        color: #022948 !important; 
    }
    #buttonMain {
        border-radius: 0px !important; 
    }
    #bottom-logos {
        padding: 50px 25px 50px 25px; 
    }
    .bottom-logos-wrapper {
        gap: 150px; 
    }
    @media only screen and (max-width: 600px) {
        .bottom-logos-wrapper{
            gap: 40px;
            margin-bottom: 50px;  
        }
    }
</style> 

<section id="landing-hero">
    <div class="blue-bar"> 
    </div>
    <div class="hero-bg-image"> 
        <img class="img-fluid w-100" src="../rainwater-run/images/landingpage/rainwater-hero.jpg" alt="rainwater-run"> 
    </div> 
</section>

<section class="landing-content"> 
    <div class="py-3 py-sm-4"> 
        <div class="container max-md-width-760 text-center">
            <img src="../rainwater-run/images/landingpage/rainwater-run-logo.jpg" alt="rainwater-run-logo"> 
            <h1 id="welcome-vip"> WELCOME, VIP </h1>
            <p class="p-content"> 
                A new community of luxury single family estate homes from $2M is coming soon to the charming town of Oakton,&nbsp;VA! 
            </p> 
            <p class="p-content"> 
                Register now to receive more information <br> as it becomes available! 
            </p> 
        </div>  
    </div>
    
    <div class="py-3 py-sm-4">
        <div class="container max-md-width-760">
            <div>
                <!-- Form -->
                <div id="success_message" class="text-center"> 
                    <h3>Thank you for your interest. We will review your message and get back to you as soon as possible!
                    </h3>
                </div>
                <form id="topBuilderForm" name="topBuilderForm" class="text-center" action="#!">
                    <input type="hidden" name="quickDeliAddress" value="">
                    <input type="hidden" name="community" value="5420">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="aptDate" value="Not Provided">
                    <input type="hidden" name="aptTime" value="Not Provided">
                    <textarea hidden="hidden" name="comments" value="Not Provided"> </textarea>
                    <div class="row m-0 justify-content-center">
                        
                        <!-- Honeypot --> 
                        <input name="fullName" type="text" id="fullName" class="hide-honey" autocomplete="false" tabindex="-1" placeholder="Full Name"> 
                        
                        <!-- First Name -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="firstName" name="firstName"
                                class="form-control mb-2" placeholder="First Name*" required>
                        </div>
                        <!-- Last Name -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="lastName" name="lastName"
                                class="form-control mb-2" placeholder="Last Name*" required>
                        </div>
                        <!-- Email -->
                        <div class="col-sm-12 px-2">
                            <input type="text" id="email" name="email" class="form-control mb-2"
                                placeholder="Email*" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-sm-12 px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2"
                                placeholder="Phone">
                        </div>
                        
                        <!-- Sign in button -->
                        <div class="col-sm-4 px-2 text-center">
                            <button id="buttonMain" onclick="gtag('event', 'click', { 'event_category': 'Rainwater Form' });"
                                class="btn bg-l-blue  btn-block my-2 waves-effect font-weight-bold text-white button-submit"
                                type="submit" disabled>Submit</button>
                        </div>

                         <!-- Captcha --> 
                         <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a"
                            data-callback="recaptcha_callback">
                        </div>

                    </div>
                </form>
                <!-- Form -->
            </div>
        </div>
    </div>
</section>

<section id="bottom-logos"> 
    <div class="container-fluid"> 
        <div class="row bottom-logos-wrapper"> 
            <img src="/images/eho.svg" width="80px">
            <img src="/images/craftmark-logo-black-vertical.svg" width="200px">   
        </div>
    </div> 
</section> 

<div style="display:none"> 
    <?php include_once(ROOT_PATH."/includes/footer.php"); ?>
</div> 
<!-- GoogleMaps-API + Key -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCGazDgNiggz9abIbupLFzLo5ywU9NdNw&callback=initMap">
</script>

<script>
function recaptcha_callback() {
    $('.button-submit').removeAttr('disabled');
};
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script> 


