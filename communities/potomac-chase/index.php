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

    #hero-callout {
        font-family: "contralto-small", sans-serif;
        font-weight: 300;
        font-style: normal;
        font-size: 60px;
        line-height: 70px;  
    }

    #hero-details {
        font-family: "Montserrat", sans-serif; 
        font-size: 20px; 
        font-weight: lighter;
        line-height: 35px;  
    }

    #desktop-hide-mobile-show {
        display: none; 
    }

    .main-content {
        font-family: "Montserrat"; 
        justify-content: center; 
        font-size: 20px;
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

     
    #interest-options {
        width: 100%;
        height: 40px;  
        padding: 5px; 
        color: black;  
        border: 1px solid #ced4da; 
        appearance: none; 
        background: #f7f7f7 url("/communities/potomac-chase/images/arrow.svg") no-repeat right 10px center;
    }

    #interest-options::after {
        display: none;
    }


    #buttonMain {
        border-radius: 0px !important; 
        background: #87630D;
        font-family: 'contralto-small', sans-serif; 
        font-size: 30px;
        font-weight: 300;   
    }

    .landing-content {
        background-color: #EEECE9; 
    }

    #bottom-logos {
        padding: 50px 25px 50px 25px; 
        background-color: #EEECE9; 
    }
    .bottom-logos-wrapper {
        gap: 50px;
        justify-content: end; 
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
            color: black; 
        }
        
        #landing-hero {
            padding-top: 0px !important;
        }   

        #pc-logo-mobile {
            width: 300px;
            margin-top: -200px;  
        }

        #hero-callout {
            font-size: 30px !important; 
            margin-bottom: 10px !important;
            line-height: 45px;  
        }
        
        
        #hero-details {
            font-size: 16px !important; 
            line-height: 25px;
            font-weight: normal;  
        }

        #townhome-content > .townhome-container {
            margin-top: 0px !important; 
        }

        .three-features {
            font-size: 18px !important; 
        }

        .bottom-logos-wrapper{
            gap: 40px;
            margin-bottom: 50px;  
        }
    }

    @media only screen and (max-width: 1200px) {


        #pc-logo {
            width: 250px;
            margin-bottom: -160px;  
        }

        #hero-callout {
            font-size: 40px; 
            margin-bottom: 0px; 
        }

        #hero-details {
            font-size: 16px; 
        }

        .main-content {
            font-size: 16px; 
        }

    }
</style> 

<section id="landing-hero" style="position: relative;">
  <div class="hero-bg-image">
    <img class="img-fluid w-100" src="../potomac-chase/images/landingpage/potomac-hero.jpg" alt="Potomac Chase">
    <div id="hero-mask" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.1) 100%);">
      <div id="desktop-show-mobile-hide" class="container h-100">
        <div class="row h-100 pb-5 align-items-end">
          <div id="logo-container" class="col-md-12 text-center">
            <img id="pc-logo" src="../potomac-chase/images/landingpage/logo-with-bg.png" alt="Potomac Chase Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">WELCOME TO POTOMAC CHASE - <br> Where Luxury Meets Legacy </h1>
            <p id="hero-details" class="hero-content mt-4">
                Discover an exclusive community where luxury living seamlessly blends with the charm of a well-established neighborhood. 
                Nestled on an existing street in North Potomac, Potomac Chase offers a rare opportunity to own a distinctive residence.
            </p>
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
            <img id="pc-logo-mobile" src="../potomac-chase/images/landingpage/logo-with-bg.png" alt="Potomac Chase Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">WELCOME TO POTOMAC&nbsp;CHASE - <br> Where Luxury Meets&nbsp;Legacy </h1>
            <p id="hero-details" class="hero-content mt-4">
                Discover an exclusive community where luxury living seamlessly blends with the charm of a well-established neighborhood. 
                Nestled on an existing street in North Potomac, Potomac Chase offers a rare opportunity to own a distinctive&nbsp;residence.
            </p>
          </div>
        </div>
    </div>

    <div id="townhome-content"class="py-3 py-sm-4"> 
        <div class="container max-md-width-991 text-center mt-5 townhome-container">
            <p class="main-content mb-4">With its expansive, deep lots and exquisite craftsmanship, Potomac Chase embodies the epitome of upscale living. Picture yourself in a sophisticated home where every detail has been meticulously crafted to create a sanctuary for you and your loved&nbsp;ones.</p>
            <p class="main-content mb-4">Starting from the Upper $1Ms, these exquisite residences offer the perfect balance of luxury and value. Whether you envision hosting lavish gatherings or cherishing quiet moments of relaxation, Potomac Chase provides the ideal backdrop for creating lasting&nbsp;memories.</p>
            <p class="main-content mb-4">Be among the privileged few to call Potomac Chase home. Join our VIP list today to receive exclusive updates and information about this exceptional community. By providing your contact details below, you’ll stay informed about pre-sales, events, and the latest news as we prepare to unveil this extraordinary&nbsp;opportunity.</p>
        </div>  
    </div>
    
    <div class="container max-md-width-991 text-center"> 
            <h3 id="call-to-action">JOIN AND STAY INFORMED</h3>  
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
                        <!-- Phone -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2"
                                placeholder="Phone*">
                        </div>
                        <div class="col-sm-6 px-2">
                            <input type="number" id="zipCode" name="zipCode"
                                class="form-control mb-2" placeholder="Zip Code*">
                        </div>
                        
                        <!-- Email -->
                        <div class="col-sm-12 px-2 mb-2">
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
                                class="btn my-2 waves-effect text-white button-submit"
                                type="submit" disabled>SIGN UP NOW!</button>
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
            <p id="footer-text" class="mr-auto" > © 2023 Potomac Chase. All rights reserved </p> 
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


