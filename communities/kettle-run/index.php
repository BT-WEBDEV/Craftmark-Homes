<?php include_once("../../includes/header.php"); ?>
<style> 
    @font-face {
        font-family: Nelphim;
        src: url(/styles/font/nelphim/Nelphim.otf);
    }
    @font-face {
        font-family: Halogen;
        src: url(/styles/font/halogen/Halogen-Regular.otf),
             url(/styles/font/halogen/Halogen-Bold.otf);
    }
    
    body {
        background-color: white; 
    }

    #landing-hero {
        padding-top: 40px;
    }

    #desktop-show-mobile-hide {
        display: block; 
    }

    .hero-content {
        color: white; 
    }

    #desktop-hero-row {
        align-content: end; 
        gap: 50px; 
    }

    #hero-callout {
        font-family: "Nelphim", sans-serif;
        font-weight: 300;
        font-style: normal;
        font-size: 60px;
        line-height: 75px;  
    }


    #desktop-hide-mobile-show {
        display: none; 
    }

    .main-content {
        font-family: "Montserrat"; 
        justify-content: center; 
        font-size: 23px;
        color: #555555; 
    }

    #call-to-action {
        font-family: "contralto-small", sans-serif;
        font-weight: 300; 
        font-style: normal;
        font-size: 40px; 
        color: #87630D; 
    }
   
    input {
        border-radius: 0px !important;
        box-shadow: none !important;
        background-color: #f7f7f7 !important;   
    }
    input::placeholder {
        color: black !important; 
    }

    #buttonMain {
        border-radius: 0px !important; 
        background: #87630D;
        font-family: 'Montserrat', sans-serif; 
        font-size: 30px;
        text-transform: capitalize;
    }

    .landing-content {
        background-color: #EEECE9; 
    }

    #bottom-logos {
        margin-top: -1px; 
        padding: 50px 25px 50px 25px; 
        background-color: #EEECE9; 
    }
    .bottom-logos-wrapper {
        gap: 50px;
        justify-content: start; 
        align-items: baseline;  
    }

    #footer-text {
        font-family: "Montserrat"; 
        font-size: 20px; 
        color: #555555; 
    }
    @media only screen and (max-width: 767px) {

        #desktop-show-mobile-hide {
            display: none; 
        }

        #desktop-hide-mobile-show {
            display: block;  
        }

        .hero-content {
            color: #555555; 
        }
        
        #landing-hero {
            padding-top: 0px !important;
        }   

        #kr-logo-mobile {
            width: 200px;
            margin-top: -225px;  
        }

        #hero-callout {
            font-size: 30px !important; 
            margin-bottom: 10px !important;
            line-height: 45px;  
        }

        #townhome-content > .townhome-container {
            margin-top: 0px !important; 
        }

        #buttonMain {
            font-size: 23px; 
        }

        .bottom-logos-wrapper{
            gap: 40px;
            margin-bottom: 50px;  
        }
    }

    @media only screen and (max-width: 1200px) {


        #kr-logo {
            width: 170px;
            margin-bottom: -30px;  
        }

        #hero-callout {
            font-size: 40px; 
            margin-bottom: 0px; 
            line-height: 50px; 
        }

        .main-content {
            font-size: 16px; 
        }

        #buttonMain {
            font-size: 23px; 
        }

    }
</style> 

<section id="landing-hero" style="position: relative;">
  <div class="hero-bg-image">
    <img class="img-fluid w-100" src="../kettle-run/images/landingpage/kettle-run-hero.jpg" alt="Potomac Chase">
    <div id="hero-mask" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.1) 100%);">
      <div id="desktop-show-mobile-hide" class="container h-100">
        <div id="desktop-hero-row" class="row h-100 pb-5">
          <div id="logo-container" class="col-md-12 text-center">
            <img id="kr-logo" src="../kettle-run/images/landingpage/Logo.svg" alt="Kettle Run Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">DISCOVER YOUR DREAM COUNTRY <br> LIFESTYLE IN FAUQUIER COUNTY </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="landing-content" > 

    <div id="desktop-hide-mobile-show" class="container h-100">
        <div class="row h-100 align-items-end">
          <div class="col-md-12 text-center">
            <img id="kr-logo-mobile" src="../kettle-run/images/landingpage/Logo.svg" alt="Kettle Run Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">DISCOVER YOUR DREAM&nbsp;COUNTRY <br> LIFESTYLE IN FAUQUIER&nbsp;COUNTY </h1>
          </div>
        </div>
    </div>

    <div id="townhome-content"class="py-3 py-sm-4"> 
        <div class="container max-md-width-991 text-center mt-5 townhome-container">
            <p class="main-content mb-4">Nestled in the heart of Fauquier County, our new community offers a sophisticated country lifestyle. With 42 single-family homes available in the mid $1Ms range, you can experience the ultimate in luxury living while enjoying the natural beauty of the surrounding&nbsp;countryside.</p>
            <p class="main-content mb-4">Our community provides the perfect escape from the hustle and bustle of city life, offering a serene and tranquil environment that lets you relax and unwind. You’ll love the wide-open spaces, stunning vistas, and peaceful setting that our community&nbsp;offers.</p>
            <p class="main-content mb-4">Join our exclusive mailing list and be among the first to know when homes become available in our coveted&nbsp;community.</p>
        </div>  
    </div>
    
    <div class="container max-md-width-991 text-center"> 
        <p class="main-content mb-4 font-weight-bold">Don’t miss out on the chance to live in luxury in Fauquier&nbsp;County.<br>Sign up for updates&nbsp;today!</p>
    </div>

    <!-- Form --> 
    <div class="py-3 py-sm-4">
        <div class="container max-md-width-760">
            <div>
                <!-- Form -->
                <div id="success_message" class="text-center"> 
                    <h3>Thank you for your interest. We will review your message and get back to you as soon as possible!
                    </h3>
                </div>
                <form id="topBuilderForm" name="topBuilderForm" class="text-center" action="#!">
                    <input type="hidden" name="community" value="5676">
                    <input type="hidden" name="quickDeliAddress" value="">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="aptDate" value="Not Provided">
                    <input type="hidden" name="aptTime" value="Not Provided">
                    <input type="hidden" name="interest-options" value="Not Provided">
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
                        <!-- Phone -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2"
                                placeholder="Phone*">
                        </div>
                        <div class="col-sm-6 px-2">
                            <input type="text" id="email" name="email" class="form-control mb-2"
                                placeholder="Email*" required>
                        </div>
   
                         <!-- Captcha --> 
                         <div class="col-sm-12 px-2">
                            <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a"
                                data-callback="recaptcha_callback">
                            </div>
                        </div>
                        
                        <!-- Sign in button -->
                        <div class="col-sm-6 px-2 text-center">
                            <button id="buttonMain" onclick="gtag('event', 'click', { 'event_category': 'The Grove Form' });"
                                class="btn my-2 waves-effect text-white button-submit font-weight-bold"
                                type="submit" disabled>Sign Up Now!</button>
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
            <p id="footer-text" class="mr-auto d-none" > © 2023 Kettle Run. All rights reserved </p> 
            <img src="/images/eho.svg" width="80px">
            <img src="/images/craftmark-logo-black-vertical.svg" width="150px">   
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


