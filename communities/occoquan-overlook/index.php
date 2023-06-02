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
        color: #002A46; 
    }

    #desktop-hero-row {
        align-content: space-between; 
        gap: 50px; 
    }

    #logo-container {
        margin-top: 100px; 
    }

    #hero-callout {
        font-family: "Nelphim", sans-serif;
        font-weight: 300;
        font-style: normal;
        font-size: 40px;
        line-height: 55px;  
    }

    #hero-details {
        font-family: "Montserrat"; 
        font-size: 20px; 
        line-height: 35px;
        font-weight: 600;
        max-width: 991px;   
    }

    #desktop-hide-mobile-show {
        display: none; 
    }

    .main-content {
        font-family: "Montserrat"; 
        justify-content: center; 
        font-size: 20px;
        color: #002A46; 
    }

    #call-to-action {
        font-family: "Nelphim", sans-serif;
        font-weight: 300; 
        font-style: normal;
        font-size: 40px; 
        color: #002A46;
        line-height: 55px;  
    }
   
    input {
        border-radius: 0px !important;
        box-shadow: none !important;
        background-color: #f7f7f7 !important;   
    }
    input::placeholder {
        color: #002A46 !important; 
    }

    #buttonMain {
        border-radius: 0px !important; 
        background: #002A46;
        font-family: "Nelphim", sans-serif;
        font-size: 30px;
        text-transform: uppercase;
    }

    .landing-content {
        background-color: #EFF5F5; 
    }

    #bottom-logos {
        margin-top: -1px; 
        padding: 50px 25px 50px 25px; 
        background-color: #EFF5F5; 
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
            color: #002A46; 
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

        #call-to-action {
            font-size: 30px !important;
            line-height: 50px;  
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

        #logo-container {
            margin-top: 75px; 
        }

        #kr-logo {
            width: 170px;
            margin-bottom: -30px;  
        }

        #hero-callout {
            font-size: 35px; 
            margin-bottom: 0px; 
            line-height: 50px; 
        }

        #hero-details {
            font-size: 16px; 
        }

        .main-content {
            font-size: 16px; 
        }

        #call-to-action {
            font-size: 35px; 
        }

        #buttonMain {
            font-size: 23px; 
        }

    }
</style> 

<section id="landing-hero" style="position: relative;">
  <div class="hero-bg-image">
    <img class="img-fluid w-100" src="../occoquan-overlook/images/landingpage/occoquan-hero.jpg" alt="The Woods at Occoquan Overlook">
    <div id="hero-mask" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.1) 100%);">
      <div id="desktop-show-mobile-hide" class="h-100">
        <div id="desktop-hero-row" class="row h-100 pb-4">
          <div id="logo-container" class="col-md-12 text-center">
            <img id="kr-logo" src="../occoquan-overlook/images/landingpage/Logo.svg" alt="The Woods at Occoquan Overlook Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">WELCOME TO THE WOODS AT OCCOQUAN&nbsp;OVERLOOK:<br>Embrace the Bay&nbsp;Lifestyle</h1>
            <p id="hero-details" class="hero-content mt-4 ml-auto mr-auto">
                Experience the allure of The Woods at Occoquan Overlook, a sophisticated community offering 41 stunning luxury homes. 
                With prices ranging from $1.4 million to $1.8 million, this exclusive enclave captures the essence of refined living. 
                Located near the bay, you’ll enjoy a water-centric lifestyle that will captivate your&nbsp;senses.
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
            <img id="kr-logo-mobile" src="../occoquan-overlook/images/landingpage/Logo.svg" alt="The Woods at Occoquan Overlook Logo"> 
          </div>
          <div class="col-md-12 text-center">
            <h1 id="hero-callout" class="hero-content mb-3">WELCOME TO THE WOODS AT OCCOQUAN OVERLOOK:<br>Embrace the Bay&nbsp;Lifestyle</h1>
          </div>
        </div>
    </div>

    <div id="townhome-content"class="py-4 py-sm-4"> 
        <div class="container max-md-width-991 text-center townhome-container">
            <p class="main-content mb-4">Indulge in the pleasures of a community nestled in the scenic Occoquan area. Immerse yourself in the nearby bay, where water activities and coastal charm await. From picturesque views to an array of recreational opportunities, this is the perfect place to call&nbsp;home.</p>
            <p class="main-content mb-4">Discover a new way of living. Fill out the form below to learn more about The Woods at Occoquan Overlook and start your journey to the bay&nbsp;lifestyle.</p>
        </div>  
    </div>
    
    <div class="container max-md-width-991 text-center"> 
        <h2 id="call-to-action" class="mb-4">DISCOVER A NEW WAY OF LIVING.<br>Fill out the form below to learn more&nbsp;about<br>The Woods at Occoquan Overlook and start your<br>journey to the bay&nbsp;lifestyle.</h2>
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
                                class="btn my-2 waves-effect text-white button-submit font-weight-bold"
                                type="submit" disabled>Submit</button>
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
            <p id="footer-text" class="mr-auto" > © 2023 The Woods at Occoquan&nbsp;Overlook. All rights&nbsp;reserved </p> 
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


