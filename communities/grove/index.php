<?php include_once("../../includes/header.php"); ?>
<style> 
    html {
        scroll-behavior: smooth;
    }
    
    body {
        background-color: white; 
    }
    /* HERO */
    #landing-hero {
        background-image: url("../grove/images/landingpage/grove-bg-hero.jpg");
        background-size: cover;
        background-position: center;
    }

    #hero-title {
        font-family: "arboria", sans-serif;
        font-weight: 700;
        font-style: normal; 
        font-size: 65px; 
        line-height: 1; 
    }

    #hero-sub-title {
        font-family: "arboria", sans-serif;
        font-weight: 300;
        font-style: normal;
        font-size: 35px; 
        line-height: 1.5; 
    }

    #signUpNowButton {
        font-family: "arboria", sans-serif;
        font-size: 18px; 
        background: #EEECE9;
        border: 2px solid #B98E53;
        border-radius: 3px;
        color: #B98E54;
        text-transform: capitalize;
        max-width: 200px; 
    }

    /* CONTENT */
    
    #landing-content {
        background-color: #EEECE9;
        background-image: url("../grove/images/landingpage/content-bg.jpg"); 
    }

    #community-description {
        font-family: "arboria", sans-serif;
        font-weight: 300;
        font-style: normal;
        font-size: 22px; 
        line-height: 2; 
    }

    #community-cta {
        font-family: "arboria", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size: 26px; 
        line-height: 1.5; 
    }


    input {
        border-radius: 0px !important;
        box-shadow: none !important;
        background-color: #f7f7f7 !important;   
    }
    input::placeholder {
        color: black !important; 
    }

    #form-comments {
        width: 100%; 
        padding: 5px; 
        border: 1px solid #ced4da;
        border-radius: 0px !important;
        background-color: #f7f7f7 !important  
    }


    #form-comments::placeholder {
        color: black !important;  
    }


    #buttonMain {
        font-family: 'arboria', sans-serif;
        border-radius: 0px !important; 
        background: #B98E54;
        font-size: 25px; 
        width: 50%;  
    }

    
    .bottom-logos-wrapper {
        gap: 150px; 
    }

     /* XS PHONE */
    @media only screen and (max-width: 320px) {
        #landing-hero.xs-phone {
            padding-bottom: 325px !important;  
        }

        #landing-content.xs-phone {
            padding-top: 150px !important; 
        }  
    }

    /* PHONE */
    @media only screen and (max-width: 425px) {

        #landing-hero.phone {
            padding: 10px 10px 400px 10px !important;  
        }

        #logo-container {
            padding: 0px !important;
            margin-left: -15px; 
        }

        #row-container {
            padding: 0px !important; 
        }
        
        #hero-title {
            font-size: 35px !important; 
        }
        #map-container img {
            transform: translate(-50%, 50%) !important;
        }

        #landing-content {
            padding-top: 280px !important; 
        }  
    }

    /* TABLET */
    @media only screen and (max-width: 768px) {

        #landing-hero {
            padding: 10px 10px 300px 10px !important;
            position: relative;
            z-index: 1;
        }  
        
        #grove-logo {
            margin-left: 0px !important; 
        }

        .remove-padding {
            padding: 0px !important; 
        }

        #signUpNowButton {
            margin-top: 25px !important; 
        }

        #map-container {
            position: relative;
            z-index: 10;
            overflow: visible; 
        }

        #map-container img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 25%);
            z-index: 1;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        #landing-content {
            padding-top: 300px; 
        }

        #townhome-content > .townhome-container {
            margin-top: 0px !important; 
        }

        #buttonMain {
            width: 100% !important; 
        }

        .bottom-logos-wrapper{
            gap: 40px;
            margin-bottom: 50px;  
        }
    }

    /* LAPTOP */
    @media only screen and (max-width: 1024px) {

        
        #hero-row {
            padding: 0px !important; 
        }
        
        #hero-title {
            font-size: 40px !important; 
        }
        
        #hero-sub-title {
            font-size: 25px !important; 
        }

        #signUpNowButton {
           
        }

        #community-description {
            font-size: 20px !important; 
        }
    }


    /* LAPTOP LARGE */
    @media only screen and (max-width: 1440px) {
        
        #landing-hero {
            padding: 30px; 
        }
        #hero-row {
            padding: 0px !important; 
        }
        #hero-title {
            font-size: 55px; 
        }
        
        #hero-sub-title {
            font-size: 30px; 
        }

        #signUpNowButton {
        
        }
    }

</style> 

<section id="landing-hero" class="p-5 phone xs-phone">
    <div id="content-container" class="container-fluid"> 
        <div id="logo-container" class="container-fluid">
            <img id="grove-logo" class="img-fluid mt-5 mx-5" src="../grove/images/landingpage/GroveLogo.svg" alt="GroveLogo">
        </div>
        <div id="row-container" class="container-fluid px-5 my-5">
            <div id="hero-row" class="row p-5">
                <div class="col-md-6 px-5 px-sm-0 mt-3 d-flex flex-column remove-padding">
                    <h1 id="hero-title" class="text-white">WELCOME <br> TO THE GROVE –</h1>
                    <h2 id="hero-sub-title" class="text-white mt-3">A NEW LEVEL OF LUXURY LIVING IN MONTGOMERY&nbsp;COUNTY!</h2>
                    <a id="signUpNowButton" class="btn font-weight-bold mt-auto" href="#topBuilderForm">
                        Sign Up Now!
                    </a>
                </div>
                <div id="map-container" class="col-md-6 px-5 text-center">
                    <a href="../grove/images/landingpage/hero-image-map-lg.jpg" data-fancybox="gallery">
                        <img src="../grove/images/landingpage/hero-image-map.jpg" alt="Siteplan" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="landing-content" class="xs-phone"> 
    <div id="townhome-content"class="py-3 py-sm-4"> 
        <div class="container text-center mt-5 townhome-container">
            <p id="community-description">
            Nestled in the heart of Montgomery County, The Grove is an exciting new residential community offering unparalleled luxury living.
            Designed with a focus on convenience and sophistication, The Grove features a diverse range of quality-built homes and exceptional amenities, 
            all in a vibrant and engaging neighborhood. Sign up below to discover the perfect balance of city and suburban living. 
            Coming soon – get ready to experience a new level of luxury living at The Grove.
            </p> 
        </div> 
        <div class="container text-center mt-5"> 
            <p id="community-cta">
                BE THE FIRST TO RECEIVE EXCLUSIVE UPDATES ABOUT THE COMMUNITY, SUCH AS GRAND OPENING ANNOUNCEMENTS AND SPECIAL OFFERS. 
            </p> 
        </div>
    </div>
    
    <!-- Form Container --> 
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
                        <div class="col-sm-6 px-2">
                            <input type="text" id="email" name="email" class="form-control mb-2"
                                placeholder="Email*" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2"
                                placeholder="Phone">
                        </div>
                        
                        <div class="col-sm-12 px-2 form-group">
                            <textarea id="form-comments" class="form-control" id="comments" name="comments" rows="3"
                            placeholder="Comments"></textarea>
                        </div>

                         <!-- Captcha --> 
                         <div class="col-sm-12 px-2">
                            <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a"
                                data-callback="recaptcha_callback">
                            </div>
                        </div>
                        
                        <!-- Sign in button -->
                        <div class="col-sm-6 px-2 mt-3 text-center">
                            <button id="buttonMain" onclick="gtag('event', 'click', { 'event_category': 'The Grove Form' });"
                                class="btn btn-block my-2 waves-effect font-weight-bold text-white mx-auto button-submit"
                                type="submit" disabled>Submit</button>
                        </div>

                    </div>
                </form>
                <!-- Form -->
            </div>
        </div>
    </div>

    <!-- Logo Container --> 
    <div class="container-fluid p-5"> 
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


