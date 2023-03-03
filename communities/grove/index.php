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

    #hero-title,#hero-craftmark  {
        font-family: "Halogen", sans-serif;
        font-size: 30px;
        letter-spacing: 1px; 
    }

    #hero-callout {
        font-family: "Nelphim", sans-serif;
        font-size: 80px; 
    }

    #hero-details {
        font-family: "Montserrat", sans-serif; 
        font-size: 20px; 
        font-weight: lighter; 
    }

    #desktop-hide-mobile-show {
        display: none; 
    }

    .three-features {
        font-family: "Montserrat"; 
        justify-content: center; 
        gap: 10px; 
        color: #555555; 
        font-size: 32px;
        margin-bottom:10px;  
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
        color: black !important; 
    }

     
    #interest-options {
        width: 100%;
        height: 40px;  
        padding: 5px; 
        color: black;  
        border: 1px solid #ced4da; 
        appearance: none; 
        background: #f7f7f7 url("/communities/grove/images/arrow.svg") no-repeat right 10px center;
    }

    #interest-options::after {
        display: none;
    }


    #buttonMain {
        border-radius: 0px !important; 
        background: #B98E54;
        font-family: 'Halogen', sans-serif; 
        font-size: 25px;  
    }

    .landing-content {
        background-color: #EEECE9; 
    }

    #bottom-logos {
        padding: 50px 25px 50px 25px; 
        background-color: #EEECE9; 
    }
    .bottom-logos-wrapper {
        gap: 150px; 
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

        #hero-callout {
            font-size: 30px !important; 
            margin-bottom: 10px !important; 
        }
        #hero-title,#hero-craftmark  {
            font-size: 20px; 
            margin-bottom: 10px !important; 
        }
        
        #hero-details {
            font-size: 18px !important; 
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
        
        #hero-title,#hero-craftmark {
            margin-bottom: 0px; 
        }

        #hero-callout {
            font-size: 50px; 
            margin-bottom: 0px; 
        }

        .three-features {
            font-size: 25px; 
        }

    }
</style> 

<section id="landing-hero" style="position: relative;">
  <div class="hero-bg-image">
    <img class="img-fluid w-100" src="../grove/images/landingpage/the-grove-hero.jpg" alt="the-grove">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.8) 100%);">
      <div id="desktop-show-mobile-hide" class="container h-100">
        <div class="row h-100 pb-5 align-items-end">
          <div class="col-md-12 text-center">
            <h1 id="hero-title" class="hero-content mb-3" >THE GROVE</h1>
            <h2 id="hero-callout" class="hero-content mb-3">THREE PRESTIGIOUS <br> NEW HOME DESIGNS</h1>
            <h3 id="hero-craftmark" class="hero-content mb-5">FROM CRAFTMARK HOMES</h1>
            <p id="hero-details" class="hero-content">Darnestown Road & Great Seneca Highway <br> Gaithersburg | Montgomery County, MD</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="landing-content" > 

    <div id="desktop-hide-mobile-show" class="container h-100 pt-5">
        <div class="row h-100 align-items-end">
          <div class="col-md-12 text-center">
            <h1 id="hero-title" class="hero-content mb-3" >THE GROVE</h1>
            <h2 id="hero-callout" class="hero-content mb-3">THREE PRESTIGIOUS <br> NEW HOME DESIGNS</h1>
            <h3 id="hero-craftmark" class="hero-content mb-5">FROM CRAFTMARK HOMES</h1>
            <p id="hero-details" class="hero-content">Darnestown Road & Great Seneca Highway <br> Gaithersburg | Montgomery County, MD</p>
          </div>
        </div>
    </div>

    <div id="townhome-content"class="py-3 py-sm-4"> 
        <div class="container max-md-width-991 text-center mt-5 townhome-container">
            <div class="row three-features">
                <b> 24-foot Elevator-Ready Townhomes</b> 
                |
                <i> Coming Soon! </i> 
            </div>
            <div class="row three-features">
                <b> 20-foot Townhomes</b> 
                |
                <i> Coming Soon! </i> 
            </div>
            <div class="row three-features">
                <b> Townhome-Style Condominiums </b> 
                |
                <i> Coming Soon! </i> 
            </div>
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
                        <div class="col-sm-6 px-2">
                            <input type="text" id="email" name="email" class="form-control mb-2"
                                placeholder="Email*" required>
                        </div>
                        <!-- Phone -->
                        <div class="col-sm-6 px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2"
                                placeholder="Phone">
                        </div>

                        <!-- Dropdown --> 
                        <div class="col-sm-12 px-2 mb-2">
                            <div class="form-outline">
                                <select id="interest-options" name="interest-options" class="form-select" required>
                                    <option class="interest" value="" selected disabled>I’m interested in…</option>
                                    <option class="interest" value="24-foot Elevator-Ready Townhomes">24-foot Elevator-Ready Townhomes</option>
                                    <option class="interest" value="20-foot Townhomes">20-foot Townhomes</option>
                                    <option class="interest" value="Townhome-Style Condominiums">Townhome-Style Condominiums</option>
                                </select>
                            </div>
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
                                class="btn btn-block my-2 waves-effect font-weight-bold text-white button-submit"
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


