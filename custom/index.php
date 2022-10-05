<?php include_once("../includes/header.php"); ?>
<?php 
include_once("../includes/backend/functions.php"); 
$galleries = getJsonData($json_db_url.'customGallery.json');
$floorplans = getJsonData($json_db_url.'floorplans.json');
$featured = getJsonData($json_db_url.'featured.json');
?>
<section id="custom-desc" class="nav-space">
    <div class="container">
        <div class="pt-4 col-md-9">
            <h2 class="font-weight-bold">WE CAN BUILD ON YOUR LOT</h2>
            <p>Now you can have the home you’ve always wanted where you want to live. You can stay close to your family
                and friends in the neighborhood of your preference when you choose Craftmark Homes to Build on Your Lot,
                which combines the integrity of an established, quality brand with the potential to completely
                personalize our most popular floor plans to fit your lifestyle. With Craftmark’s affordable home construction pricing starting at $116/sq. ft. including lower level costs (does not include the price of your lot or site development costs) it’s time to take the next step for your family.</p>
            <!-- <p class="mt-3">
                Ask about building custom Craftmark Homes on your land, or explore our Featured Lots in <a
                    target="_blank"
                    href="https://matrix.brightmls.com/Matrix/Public/Portal.aspx?ID=16176685131#1">Rolling
                    Ridge</a> and <a target="_blank"
                    href="https://matrix.brightmls.com/Matrix/Public/Portal.aspx?ID=16303357444">Clarksville</a>, ready
                for you to build your dream home in gorgeous Montgomery County, MD.
            </p> -->
        </div>
        <div class="pb-4">
            <div>
                <?php 
                $featured_status = false;
                
                foreach ($featured['featured'] as $feat) {  
                    if($feat['comUrl'] == "boyl") { 
                        $featured_status = true;
                    }}
                ?>
                <h4 class="font-weight-bold m-0 py-3">
                    <?php echo ($featured_status) ? "Community Highlights" : ""; ?>
                </h4>
                <div class="row m-0">
                    <?php 
                    foreach ($featured['featured'] as $featured) {
                        if($featured['comUrl'] == "boyl") { 
                    ?>
                    <div class="col-4 col-md-3">
                        <?php include(ROOT_PATH."includes/components/featuredList.php"); ?>
                    </div>
                    <?php }} ?>
                </div>
            </div>
            <div class="mt-3">
                <a target="_blank" href="BOYL-Features.pdf" class="btn-rounded btn bg-l-blue custom-btn text-white">
                    <img src="/images/icon/download.svg" alt="download icon">
                    Standard Features
                </a>
            </div>
        </div>
    </div>
</section>

<section id="custom-gallery" class="grid-gallery py-3 py-sm-4">
    <div class="container">
        <div>
            <h2 class="font-weight-bold text-center text-sm-left">GALLERY <span class="font-weight-normal">Finished
                    Homes</span></h2>
        </div>
        <div class="row">
            <ul class="nav md-pills round-pills-menu">
                <?php foreach ($galleries['gallery'] as $key => $gallery) { ?>
                <li class="nav-item">
                    <a class="nav-link h-100 d-flex align-items-center <?php echo ($key==0) ? "active" : ""; ?>"
                        data-toggle="tab" href="#<?php echo $gallery['url']; ?>" role="tab">
                        <div><?php echo $gallery['name']; ?><span><?php echo $gallery['location']; ?></span></div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <!-- Gallery Tab panels -->
                <div class="tab-content p-0">
                    <?php foreach ($galleries['gallery'] as $key => $gallery) { ?>
                    <!--Panel -->
                    <div class="tab-pane fade <?php echo ($key==0) ? "in show active" : ""; ?>"
                        id="<?php echo $gallery['url']; ?>" role="tabpanel">
                        <!-- Slider main container -->
                        <div class="swiper-container custom-gallery-swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery['photos'] as $key => $photo) { ?>
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="global-list-style">
                                        <div class="image image-round">
                                            <a href="/custom/images/<?php echo $gallery['url']; ?>/img-<?php echo $photo[0]; ?>.jpg"
                                                data-fancybox="custom-gallery">
                                                <img src="/custom/images/<?php echo $gallery['url']; ?>/img-<?php echo $photo[0]; ?>.jpg"
                                                    alt="<?php echo $photo[2]; ?>" class="img-fluid w-100"
                                                    data-size="1800x1200">
                                            </a>
                                        </div>
                                        <!-- <div class="content-box">
                                            <div class="header">
                                                <h6 class="m-0 font-weight-normal">
                                                    <?php echo $photo[1]; ?>
                                                </h6>
                                            </div>
                                            <div class="content">
                                                <div class="spec d-flex flex-wrap align-items-center">
                                                    <p><?php echo $photo[2]; ?></p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--/.Panel-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="custom-floorplan" class="bg-blue py-3 py-sm-4">
    <div class="container pr-sm-0">
        <div>
            <h2 class="font-weight-bold text-center text-white">CUSTOMIZABLE HOME DESIGNS</h2>
        </div>
        <!-- Slider main container -->
        <div class="swiper-container mobile-single-swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php 
                foreach ($floorplans['floorplanTypes'] as $fp_type) {
                foreach ($fp_type['floorplans'] as $fp) { 
                    if($fp['status'] == "live" && $fp['customProperties'] == true) {
                ?>
                <div class="swiper-slide py-3">
                    <div class="custom-properties-fp">
                        <?php include("../includes/components/floorplan/floorplanListV2.php"); ?>
                    </div>
                </div>
                <?php }}} ?>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-next">
                <img src="/images/arrow-right.svg" alt="arrow right icon">
            </div>
            <div class="swiper-button-prev">
                <img src="/images/arrow-left.svg" alt="arrow left icon">
            </div>
        </div>
    </div>
</section>

<section id="custom-map" class="pt-3">
    <div class="container">
        <div>
            <h2 class="font-weight-bold text-center mb-sm-3 mt-sm-2">WHERE WE BUILD</h2>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <div id="googft-mapCanvas" style="height: 400px">
                    <!-- Added Map From JS -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-3 py-sm-4">
    <div class="container">
        <div>
            <h2 class="font-weight-bold text-center mb-sm-3">CUSTOM HOME BUILDING PROCESS</h2>
        </div>
        <div>
            <ul class="nav md-pills building-process-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#process1" role="tab">1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process2" role="tab">2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process3" role="tab">3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process4" role="tab">4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process5" role="tab">5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#process6" role="tab">6</a>
                </li>
            </ul>
        </div>
        <div class="building-process-tab-content">
            <!-- Tab panels -->
            <div class="tab-content">

                <!--Process 1-->
                <div class="tab-pane fade in show active" id="process1" role="tabpanel">
                    <h4 class="font-weight-normal">Introduction/Initial Meeting with Property and House Type Review</h4>
                    <ul>
                        <li>Contact David Pastva at (703) 748-5866 to request additional information about our Custom
                            Properties program such as pricing and standard features, or request a meeting.</li>
                        <li>During the initial meeting:
                            <ul>
                                <li>Discuss which of our floor plans best suits your lifestyle and family needs</li>
                                <li>Review any changes you might wish to make to those floor plans</li>
                                <li>Quick overview of our building process from start to finish.</li>
                                <li>Review of the property you have chosen to build on to make sure we will be able to
                                    deliver the house and options that you desire.</li>
                                <li>Receive a list of lenders for your consideration who can help you understand the
                                    loan process and secure the right construction/permanent financing for your unique
                                    situation. Note, you are not required to use one of our lenders.</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.Process 1-->

                <!--Process 2-->
                <div class="tab-pane fade" id="process2" role="tabpanel">
                    <h4 class="font-weight-normal">Property Visit and House Type Selection</h4>
                    <ul>
                        <li>We will meet with you at your property to evaluate and discuss site conditions.</li>
                        <li>Together, we’ll work to finalize the selection of your house type and exterior elevation
                            along with a review of options that you might desire.</li>
                        <li>Several days following the property visit and finalizing the house plans we will prepare and
                            review with you separate pricing schedules, one for the house and options of your choice and
                            the other for the required site development work.</li>
                    </ul>
                </div>
                <!--/.Process 2-->

                <!--Process 3-->
                <div class="tab-pane fade" id="process3" role="tabpanel">
                    <h4 class="font-weight-normal">Sales Agreement</h4>
                    <ul>
                        <li>Execute a Sales Agreement</li>
                        <li>Close on the construction loan</li>
                    </ul>
                </div>
                <!--/.Process 3-->

                <!--Process 4-->
                <div class="tab-pane fade" id="process4" role="tabpanel">
                    <h4 class="font-weight-normal">Site and Architectural Plan Preparation/Permit Submission</h4>
                    <ul>
                        <li>We’ll begin site plan and architectural plan preparation with a final review of those plans
                            with you prior to submission for permitting.</li>
                        <li>Note: a separate demolition permit will need to be obtained if your property has an existing
                            home which we can assist in acquiring.</li>
                        <li>You’ll meet with our design team to finalize interior finishes and selections. (Many of
                            these finishes are on display at our existing model home sales centers.)</li>
                        <li>Depending on the jurisdiction the permitting process can take anywhere from 45 days up to 3
                            months.</li>
                    </ul>
                </div>
                <!--/.Process 4-->

                <!--Process 5-->
                <div class="tab-pane fade" id="process5" role="tabpanel">
                    <h4 class="font-weight-normal">Construction</h4>
                    <ul>
                        <li>Upon issuance of all the permits you will have the opportunity to meet with our production
                            team onsite to review your house plans and selection package.</li>
                        <li>Construction begins with excavation and foundation.</li>
                        <li>The production team will meet with you again at the home prior to the installation of
                            drywall to verify that your home is being built in accordance with the architectural plans
                            and your selections.</li>
                        <li>Average construction time is approximately 5 months.</li>
                    </ul>
                </div>
                <!--/.Process 5-->

                <!--Process 6-->
                <div class="tab-pane fade" id="process6" role="tabpanel">
                    <h4 class="font-weight-normal">Completion/Occupancy/Move-in Date</h4>
                    <ul>
                        <li>When your new home is complete, you will have an orientation walk-thru with the production
                            team, focused on the demonstration of the home’s features, systems, maintenance requirements
                            and warranties. Any concerns about the construction finishes will be documented at this
                            time.</li>
                        <li>Approximately 5 days later, we’ll take you on a re-walk of the home with the production team
                            to verify the final condition of the home.</li>
                        <li>We’ll schedule a follow-up visit with you in your home approximately 90 days after you move
                            in, and another approximately 9 months after occupancy so we can address any concerns or
                            questions you may have about your home or the systems installed.</li>
                    </ul>
                </div>
                <!--/.Process 6-->
            </div>
        </div>
    </div>
</section>

<section id="custom-financing" class="py-3 py-sm-5">
    <div class="container">
        <div>
            <h2 class="font-weight-bold">FINANCING & PRE-QUALIFICATION</h2>
            <p>For your financing and pre-qualification needs we can provide the following list of lenders for the most
                competitive construction-to-permanent loan programs in the industry, coupled with experienced,
                knowledgeable and trustworthy loan officers who will work closely with you in structuring the best loan
                package for your specific situation.</p>
            <div class="mt-3">
                <a target="_blank" href="Lender_Contact.pdf" class="btn-rounded btn bg-l-blue custom-btn text-white">
                    <img src="/images/icon/download.svg" alt="download icon">
                    Lenders
                </a>
            </div>

        </div>
    </div>
</section>

<div class="py-3 py-sm-4">
    <div class="container max-md-width-760">
        <div class="mb-sm-4 px-2">
            <h2 class="m-0">Find Out More About </h2>
            <h2 class="font-weight-bold">HOW TO BUILD ON YOUR LOT</h2>
        </div>
        <div>
            <!-- Form -->
            <div id="success_message" class="text-center">
                <h3>Thank you for your interest. We will review your message and get back to you as soon as possible!
                </h3>
            </div>
            <form id="topBuilderForm" name="topBuilderForm" class="text-center" action="#!">
                <input type="hidden" name="community" value="457">
                <input type="hidden" name="zipCode" value="Not Provided">
                <input type="hidden" name="aptDate" value="Not Provided">
                <input type="hidden" name="aptTime" value="Not Provided">
                <div class="row m-0">
                    <!-- First Name -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="firstName" name="firstName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="First Name*" required>
                    </div>
                    <!-- Last Name -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="lastName" name="lastName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="Last Name*" required>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="email" name="email" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Email*" required>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="phone" name="phone" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Phone">
                    </div>
                    <!-- Comments -->
                    <div class="col-sm-12 px-2 form-group">
                        <textarea class="form-control z-depth-1" id="comments" name="comments" rows="3"
                            placeholder="Comments"></textarea>
                    </div>
                    <!-- Sign in button -->
                    <div class="col-sm-12 px-2">
                        <button id="buttonMain" onclick="gtag('event', 'click', { 'event_category': 'BOYL Form' });"
                            class="btn bg-l-blue btn-rounded btn-block my-2 waves-effect font-weight-bold text-white button-submit"
                            type="submit" disabled>Submit</button>
                    </div>

                    <!-- Captcha -->
                    <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a"
                        data-callback="recaptcha_callback"></div>
                </div>
            </form>
            <!-- Form -->
        </div>
    </div>
</div>

<?php include_once(ROOT_PATH."/includes/footer.php"); ?>
<script type="text/javascript" src="/custom/boylmap.js"></script>
<!-- GoogleMaps-API + Key -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCGazDgNiggz9abIbupLFzLo5ywU9NdNw&callback=initMap"></script>

<script>
function recaptcha_callback() {
    $('.button-submit').removeAttr('disabled');
};
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>