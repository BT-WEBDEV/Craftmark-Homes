<?php

// Community Details
$floorplans = getJsonData($json_db_url.'floorplans.json');
$communities = getJsonData($json_db_url.'communities.json');
$featured = getJsonData($json_db_url.'featured.json');

$url_path = explode('/', $_SERVER['REQUEST_URI']);

// Get Community Details
foreach ($communities['communities'] as $community) {
    if($community['url'] == $url_path[2]) {
        $comm = $community;
        break;
    }
}

// Assign ContactTodayModal formID
$formId = $comm['formId'];
$formBtnText = $comm['formBtnText'];
if($comm['url'] == "crown") {
    $gtagCategory = "Crown VIP Form";
} else {
    $gtagCategory = "Community Form";
}

// Get available floorplans
$available_fp = [];
foreach ($comm['floorplans'] as $com_fp) {
    $filterBy = $com_fp['fpUrl'];
    foreach ($floorplans['floorplanTypes'] as $key => $fpType) {
        foreach ($fpType['floorplans'] as $key => $fp) {
            if($fp['url'] == $filterBy) {
                array_push($available_fp, $fp);
            }
        }
    }
}

// Get available quick move-ins
$quickMoveIns = getQuickMoveIns(null, $comm['name'], null);
$available_qmi = array();

foreach ($quickMoveIns as $key => $qmi) {
    $community_options = json_decode($qmi['community_options'], true);
    if($community_options['params'][$qmi['community_id']]['value'] == $community['name']) {
        array_push($available_qmi, $qmi);
    }
}

// PageView
require ROOT_PATH."includes/components/visitorAnalytics/pageView.php";
$pv_path = $url_path[1]. "/" .$url_path[2];
checkUserIP($pv_path, 'gka_community_view');
// Check if the index exists in the arrays
if (isset($initialViews[$pv_path])) {
    $totalView = getTotalStats($pv_path, 'gka_community_view', false) + $initialViews[$pv_path];
} else {
    // Handle the case when the index is undefined
    // or use a default value
    $totalView = 58; // Set a default value
}

if (isset($initialSaved[$pv_path])) {
    $totalSaved = getTotalStats($pv_path, 'gka_community_view', true) + $initialSaved[$pv_path];
} else {
    // Handle the case when the index is undefined
    // or use a default value
    $totalSaved = 21; // Set a default value
}
?>

<!-- GoogleMaps-API + Key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdCFDlE3fBLixVdjPQyqXlTI5xuK4M0-8"></script>

<style>
    .community-topper p,
    .community-details,
    .community-details,
    .totalView {
        color: <?php echo $community['brandStyle']['textColor'];
        ?>;
    }

    .totalView #viewsIcon,
    .totalView #heart {
        fill: <?php echo $community['brandStyle']['textColor'];
        ?>;
        stroke: <?php echo $community['brandStyle']['textColor'];
        ?>;
    }
</style>


<div class="brand-background brand-background-V4"
    style="background-image: url('/communities/<?php echo $community['url'] ?>/images/<?php echo $community['brandStyle']['background'] ?>');">
    <section class="community-topper bg-center nav-space">
        <div class="container-fluid max-lg-width-1140">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="desktop-title d-none d-md-block">
                    <div>
                        <h3 style="color: <?php echo $community['brandStyle']['mainColor']; ?>"
                            class="font-weight-bold d-flex">
                            <img src="/images/icon/map-pin.svg" alt="map pin icon">
                            <div class="align-self-end"><?php echo $comm['name']; ?></div>
                        </h3>
                        <div class="d-flex flex-wrap align-items-center">
                            <p class="font-weight-normal"><?php echo $comm['address']['county'] ?></p>
                            <span class="seperator">|</span>
                            <p style="color: <?php echo $community['brandStyle']['mainColor']; ?>"
                                class="font-weight-normal"><?php echo $comm['priceInfo']['label'] ?>
                                $<?php echo ($comm['priceInfo']['price'] != 0) ? $comm['priceInfo']['price'] : " -- "; ?><?php echo isset($comm['priceInfo']['priceTag']) ? $comm['priceInfo']['priceTag'] : "s"; ?>
                            </p>
                            <?php if($comm['name'] == 'Retreat At Westfields') { echo '<span class="seperator">|</span><p class="font-weight-normal">Full Appointed Townhomes</p>'; }?>
                        </div>
                    </div>
                </div>
                <div class="text-right d-flex align-self-end">
                    <div class="liked-container save-share d-flex align-items-center mr-3">
                        <button id="save-btn-<?php echo $comm['id']; ?>" class="list-card-save" type="button"
                            aria-label="Save" data-listid="<?php echo $comm['id']; ?>"
                            data-pageid="communities/<?php echo $comm['url']; ?>" data-sqltable="gka_community_view">
                            <?php require ROOT_PATH."/images/icon/heart-blue.svg" ?>
                        </button>
                        <span class="text-l-blue d-none d-md-block">Save</span>
                    </div>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>"
                        onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
                        <div class="d-flex h-100 save-share align-items-center">
                            <img src="/images/icon/share-blue.svg" alt="share icon">
                            <span class="text-l-blue ml-2 d-none d-md-block">Share</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="community-slider" class="grid-gallery max-lg-width-1140">
        <!-- Slider main container -->
        <div class="swiper-container community-slider-swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            <?php foreach ($comm['gallery'] as $key => $gallery) {
                    // Check if the array has the expected indices
                    if (isset($gallery[0]) && isset($gallery[1])) {
                ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <a href="/communities/<?php echo $community['url']; ?>/images/slider/slide<?php echo $gallery[0]; ?>.jpg"
                            data-fancybox="community-slider">
                            <img src="/communities/<?php echo $community['url']; ?>/images/slider/slide<?php echo $gallery[0]; ?>.jpg"
                                class="img-fluid w-100" alt="<?php echo $gallery[1]; ?>">
                        </a>
                    </div>
                <?php
                    }
                } ?>
            </div>
            <a style="background-color: <?php echo $community['brandStyle']['mainColor']; ?>; color: <?php echo $community['brandStyle']['btnText']; ?>;"
            data-fancybox-trigger="community-slider" href="javascript:;"
            class="btn custom-btn show-all-photos-btn-V4 font-weight-normal">
            SHOW ALL <?php echo count($comm['gallery'])?> PHOTOS</a>
        </div>
    </section>

    <section id="community-details">
        <div class="container community-details community-details-V4 max-lg-width-1140">
            <div class="content d-flex flex-wrap">
                <div class="flex-item item-1-V4 order-1">
                    <div>
                        <p class="d-md-none"><?php echo $comm['address']['county'] ?></p>
                        <h3><?php echo $comm['headerInput1']?> </h3>
                        <h4><?php echo $comm['headerInput2'] ?></h4>
                        <p class="d-md-none font-weight-normal"><?php echo $comm['priceInfo']['label'] ?>
                            $<?php echo $comm['priceInfo']['price'] ?>s</p>
                    </div>
                    <hr>
                    <?php foreach ($comm['address']['addresses'] as $address) { ?>
                    <div class="mb-2 address">
                        <p class="label font-weight-bold d-flex mb-1"><?php echo $address['label'] ?></p>
                        <div class="d-flex mb-2"> 
                            <img id="community-loc-icon" src="/images/icon/map-pin.svg" alt="map pin icon">
                            <a class="text-l-blue" target="_blank" href="<?php echo $address['direction'] ?>"><u>
                                <!-- Retreat at westfields -->
                                <?php // echo ($comm['url'] == 'retreat-at-westfields') ? ' <p>Click for Google Map Directions</p>' : ''; ?>
                                <!-- Retreat at westfields -->
                                <?php
                                    $comm_address = (($address['address']['street1']) ? $address['address']['street1'].", " : "") . (($address['address']['street2']) ? $address['address']['street2'].", " : "") . $address['address']['city'] . ", " . $address['address']['state'] . " " . $address['address']['zip'];
                                    // Show only label
                                    if($address['address'] == "") {
                                        $comm_address = "";
                                    }                                
                                ?>
                                <p><?php echo $comm_address; ?></p> 
                            </u></a>
                        </div>
                        <!-- Display the address label -->
                        <?php if (isset($address['label2'])) : ?>
                            <p class="label font-weight-bold d-flex mb-1"><?php echo $address['label2']; ?></p>
                        <?php endif; ?>

                        <!-- If the community is Clarksburg Town Center, display its special information -->
                        <?php if ($comm['url'] === 'clarksburg-town-center') : ?>
                            <div class="d-flex"> 
                                <img id="community-loc-icon" src="/images/icon/map-pin.svg" alt="map pin icon">
                                <a class="text-dark" target="_blank" href="https://goo.gl/maps/25dHP87kF7ABvQV5A">
                                    <p>13050 Clarksburg Square Road, Clarksburg, MD 20871</p> 
                                </a>
                            </div>
                        <!-- If the community is not Clarksburg Town Center, display the standard location information -->
                        <?php elseif ($address['direction']) : ?>
                            <div class="d-flex"> 
                                <img id="community-loc-icon" src="/images/icon/map-pin.svg" alt="map pin icon">
                                <a class="text-dark" target="_blank" href="<?php echo $address['direction'] ?>">
                                    <?php
                                        // Get the GPS coordinates for the community
                                        $gps = $comm['address']['coords'];
                                    ?>
                                    <p><?php echo $gps[0]; ?>, <?php echo $gps[1]; ?></p> 
                                </a>
                            </div>
                            <!-- Display any additional location information for the community -->
                            <?php if (isset($address['additionalInfo'])) : ?>
                                <p class="text-black"><?php echo $address['additionalInfo']; ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php } ?>
                    <!-- Retreat at westfields -->
                    <?php echo ($comm['url'] == 'retreat-at-westfields') ? '<p class="font-weight-bold">Directions:</p><ul><li>Take I-495 to I-66W</li><li>Take Exit 53B, Route 28N/Dulles Airport</li><li>Exit onto Westfields Blvd- Stay right</li><li>Right On Stonecroft Blvd</li><li>Left on Conference Center Drive</li><li>Continue straight ahead to Craftmark Homes – The Retreat at Westfields</li></ul>' : ''; ?>
                    <!-- Retreat at westfields -->
                </div>
                <div class="flex-item item-2-V4 order-2 text-xl-center d-flex">
                    <?php 
                    foreach ($comm['salesAgent']['agents'] as $agent) { ?>
                    <div class="d-flex agent-info text-center">
                        <img src="/images/agents/<?php echo $agent['avatar']?>" class="img-fluid mx-auto agent-avatar"> 
                        <p class="font-weight-bold"><?php echo $agent['agentName']; ?></p>
                        <p>
                            <?php if($agent['phone'] != "" && $comm['id'] != 14 && $comm['id'] != 12) { ?>
                            <a class="text-l-blue"
                                href="tel:<?php echo clean($agent['phone']); ?>"><?php echo phoneNumberFormat($agent['phone']); ?></a>
                            <strong>
                                <?php echo ($comm['name'] != 'Retreat At Westfields' && $comm['name'] != 'Darnestown Station' && $comm['name'] != 'Clarksburg Town Center' && $comm['name'] != 'Rainwater Run') ? "(Call or Text!)" : ""; ?>
                            </strong>
                            <?php } ?>
                        </p>
                        <strong>
                            <?php echo ($comm['name'] == 'Rainwater Run') ? "Email for Information:" : ""; ?>
                        </strong>
                        <a class="text-l-blue" href="mailto:<?php echo $agent['email']; ?>">
                        <?php echo $agent['email']; ?>
                        </a>
                        <p class="disclaimer font-weight-normal text-muted">
                        <i><?php echo $comm['salesAgent']['label'] ?>
                        </i>
                    </p>   
                    </div>
                    <?php } ?>         
                    <hr>
                </div>
                <div class="order-3 w-100 totalView mt-3">
                    <div class="d-flex justify-content-center">
                        <div>
                            <?php require ROOT_PATH."/images/icon/views.svg" ?>
                            Views: <span class="font-weight-normal"><?php echo $totalView; ?></span>
                        </div>
                        <div class="mx-4">
                            <span>|</span>
                        </div>
                        <div>
                            <?php require ROOT_PATH."/images/icon/heart.svg" ?>
                            Saved: <span class="font-weight-normal"><?php echo $totalSaved; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- END BRAND BACKGROUND --> 

<!-- Google Analytics gtag Category -->
<script>
    var gtagCategory = "<?php echo $gtagCategory; ?>";
</script>

<!-- CONTACT TODAY SECTION --> 
<?php
// Remove Contact Section From Sold Communities.
if($community['status'] != 'soldLabel') {
?>
<section id="contact-today" class="py-4"> 
    <div class="container contact-today"> 
        <h2 class="text-center font-weight-bold text-uppercase mb-3" style="color: <?php echo $community['brandStyle']['mainColor']; ?>">Contact Today </h2>
        <div class="mx-4">
                <div id="success_message" class="text-center">
                    <h3>Thank you for your interest. We will review your message and get back to you as soon as
                        possible!</h3>
                </div>
                <form id="topBuilderForm" name="topBuilderForm" class="text-center community-modal-form" action="#!">
                    <input type="hidden" name="community" value="<?php echo $formId; ?>">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="quickDeliAddress" value="Not Provided">
                    

                    <!-- Honeypot --> 
                    <input name="fullName" type="text" id="fullName" class="hide-honey" autocomplete="false" tabindex="-1" placeholder="Full Name">
                    
                    <!-- First & Last Name Always Show -->
                    <div class="container">
                        <div class="row">  
                            <!-- First Name -->
                            <div class="px-2 col-sm-6">
                                <input type="text" id="firstName" name="firstName"
                                    class="form-control mb-2 rounded-input z-depth-1" placeholder="First Name*" required>
                            </div>

                            <!-- Last Name -->
                            <div class="px-2 col-sm-6">
                                <input type="text" id="lastName" name="lastName"
                                    class="form-control mb-2 rounded-input z-depth-1" placeholder="Last Name*" required>
                            </div>
                        </div> 
                    </div> 

                    <!-- SHOW MORE BUTTON --> 
                    <div class="mt-3 order-5 w-100">
                        <a href="#!"
                            style="background-color: <?php echo $community['brandStyle']['mainColor']; ?>; color: <?php echo $community['brandStyle']['btnText']; ?>;"
                            class="btn m-0 py-1 font-weight-bold text-uppercase show-more-btn">Show More</a>
                    </div>
                    
                    <!-- Rest of Form Hidden --> 
                    <div id="hidden-form" class="container px-0" style="display:none"> 
                        <!-- Email -->
                        <div class="px-2">
                            <input type="text" id="email" name="email" class="form-control mb-2 rounded-input z-depth-1"
                                placeholder="Email*" required>
                        </div>
                        <!-- Phone -->
                        <div class="px-2">
                            <input type="text" id="phone" name="phone" class="form-control mb-2 rounded-input z-depth-1"
                                placeholder="Phone*" required>
                        </div>
                        <!-- Comments -->
                        <div class="col-sm-12 px-2">
                            <textarea class="form-control z-depth-1 mb-2" id="comments" name="comments" rows="3"
                                placeholder="Comments"></textarea>
                        </div>

                        <!-- Dropdown Interest - If community is The Grove show interest dropdowns, else hide it --> 
                        <?php if($comm['name'] == 'The Grove') { ?>
                            <div class="col-sm-12 px-2 mb-2">
                                <div class="form-outline">
                                    <select id="interest-options" name="interest-options" class="form-select form-control mb-4 rounded-input z-depth-1" required>
                                        <option class="interest" value="" selected disabled>I’m interested in…</option>
                                        <option class="interest" value="24-foot Elevator-Ready Townhomes">24-foot Elevator-Ready Townhomes</option>
                                        <option class="interest" value="20-foot Townhomes">20-foot Townhomes</option>
                                        <option class="interest" value="Townhome-Style Condominiums">Townhome-Style Condominiums</option>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?> 
                        <select id="interest-options" name="interest-options" class="form-select" style="display:none;">
                            <option class="interest" value="No Options Available" selected>No Options</option>
                        </select>
                        <?php } ?> 
                        <!-- For Appointment -->
                        <?php 
                            //if($comm['url'] != "crown" && $comm['url'] != "preserve-at-westfields" && $communityName != "Preserve at Westfields") { 
                            if($comm['url'] != "retreat-at-westfields" ) { 
                        ?>
                        <div class="px-0">
                            <div class="row m-0">
                                <div class="col-12 px-2">
                                    <h5 class="font-weight-normal mb-2 text-l-blue text-left pl-3">For Appointment:</h5>
                                </div>
                                <div class="col-sm-6 px-2">
                                    <select id="aptDate" name="aptDate" onChange="filterTime();"
                                        class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">
                                        <?php 
                                            // Calculate Dates (Day, Month, Numeric Day)
                                            $date0 = gmdate("D, M d");
                                            $date1 = gmdate("D, M d", time() + 86400);
                                            $date2 = gmdate("D, M d", time() + 86400*2);
                                            $date3 = gmdate("D, M d", time() + 86400*3);
                                            $date4 = gmdate("D, M d", time() + 86400*4);
                                            $date5 = gmdate("D, M d", time() + 86400*5);
                                            $date6 = gmdate("D, M d", time() + 86400*6);
                                            $date7 = gmdate("D, M d", time() + 86400*7);

                                            // Grab the Day from the gmdate String 
                                            $day0 = substr($date0,0,3);
                                            $day1 = substr($date1,0,3);
                                            $day2 = substr($date2,0,3);
                                            $day3 = substr($date3,0,3);
                                            $day4 = substr($date4,0,3);
                                            $day5 = substr($date5,0,3);
                                            $day6 = substr($date6,0,3);
                                            $day7 = substr($date7,0,3);
                                        ?> 

                                        <option value="--">
                                            Select Date
                                        </option>
                                        
                                        <option <?php if ($day0=="Thu"||$day0=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date0?>"><?php echo $date0 ?></option>
                                        
                                        <option  <?php if ($day1=="Thu"||$day1=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date1; ?>"><?php echo $date1;?></option>
                                        
                                        <option  <?php if ($day2=="Thu"||$day2=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date2; ?>"><?php echo $date2; ?></option>

                                        <option <?php if ($day3=="Thu"||$day3=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date3; ?>"><?php echo $date3; ?></option>

                                        <option  <?php if ($day4=="Thu"||$day4=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date4; ?>"><?php echo $date4; ?></option>

                                        <option  <?php if ($day5=="Thu"||$day5=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date5; ?>"><?php echo $date5; ?></option>

                                        <option  <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date6; ?>"><?php echo $date6; ?></option>

                                        <option <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date7; ?>"><?php echo $date7; ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-6 px-2">
                                    <select disabled id="aptTime" name="aptTime"
                                        class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">
                                        <?php 
                                        // Set up TimeZone, Date, Time Stamp, and Set Current Time. 
                                        date_default_timezone_set('America/New_York'); 
                                        $today = date("m/d/Y");
                                        $timestamp = time(); 
                                        $currentTime = date("H:i:s", $timestamp);
                                        $isToday = $date0;  
                                        
                                        // Set up time markers to compare to. 
                                        $elevenAM =  date('H:i:s', mktime(11, 0, 0, null, null, null));
                                        $twelvePM =  date('H:i:s', mktime(12, 0, 0, null, null, null));
                                        $onePM =  date('H:i:s', mktime(13, 0, 0, null, null, null)); 
                                        $twoPM =  date('H:i:s', mktime(14, 0, 0, null, null, null));
                                        $threePM =  date('H:i:s', mktime(15, 0, 0, null, null, null));
                                        $fourPM =  date('H:i:s', mktime(16, 0, 0, null, null, null));
                                        
                                        ?> 
                                        <option value="--">Select Time</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="1:00 PM">1:00 PM</option>
                                        <option value="2:00 PM">2:00 PM</option>
                                        <option value="3:00 PM">3:00 PM</option>
                                        <option value="4:00 PM">4:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <input type="hidden" name="aptDate" value="none">
                            <input type="hidden" name="aptTime" value="none">
                        <?php } ?>

                        <!-- Math Captcha Quiz --> 
                        <?php
                            $min  = 1;
                            $max  = 10;
                            $num1 = rand( $min, $max );
                            $num2 = rand( $min, $max );
                            $sum  = $num1 + $num2;
                        ?>

                        <div class="col-sm-12 px-0">
                            <div class="row m-0">
                                <label for="quiz" class="col-sm-3 col-form-label">
                                    <?php echo $num1 . '+' . $num2; ?>?
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control quiz-control" id="quiz">
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="col-sm-12 px-2">
                            <button id="buttonMain" data-res="<?php echo $sum; ?>"
                                onclick="gtag('event', 'click', { 'event_category': ''+gtagCategory+'' });"
                                class="btn bg-l-blue btn-rounded btn-block my-2 waves-effect font-weight-bold text-white button-submit"
                                type="submit" disabled>Submit</button>
                        </div>
                    </div>
                </form>

                <div id="social-icons-row" class="row my-3 d-flex justify-content-center" style="display:none !important">
                    <!--Facebook-->
                    <a target="_blank" href="https://www.facebook.com/CraftmarkHomes"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-facebook text-black"></i>
                    </a>
                    <!--Twitter-->
                    <a target="_blank" href="https://twitter.com/craftmarkhomes"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-twitter text-black"></i>
                    </a>
                    <!--Instagram-->
                    <a target="_blank" href="https://www.instagram.com/craftmarkhomes/"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-instagram text-black"></i>
                    </a>
                    <!--Youtube-->
                    <a target="_blank" href="https://www.youtube.com/channel/UCdG5p2j56fFMqegeMnDwj5w"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-youtube text-black"></i>
                    </a>
                </div>
            </div> 
    </div> 
</section> 
<?php } ?>

<!-- OLD COMMUNITY MENU PILLS --> 
<!-- <section id="community-menu">
    <div class="container-fluid max-lg-width-1140">
        <ul class="nav md-pills justify-content-center justify-content-md-start community-pills smooth-scroll">
            <li class="nav-item order-<?php echo $comm['sectionOrder']['overview']; ?>">
                <a class="nav-link active" href="#community-overview">OVERVIEW</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['floorplans']; ?>">
                <a class="nav-link" href="#community-floorplans">FLOOR PLANS</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['neighborhood']; ?>">
                <a class="nav-link" href="#community-neighborhood">NEIGHBORHOOD</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['quick-move-ins']; ?>">
                <a class="nav-link" href="#community-quick-move-ins">QUICK MOVE-INS</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['siteplan']; ?>">
                <a class="nav-link" href="#community-siteplan">SITE PLAN</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['features']; ?>">
                <a class="nav-link" href="#community-features">FEATURES</a>
            </li>
            <li class="nav-item order-<?php echo $comm['sectionOrder']['map']; ?>">
                <a class="nav-link" href="#community-map">MAP</a>
            </li>
        </ul>
    </div>
</section> -->

<div class="community-flex-container">

    <!-- Community Overview -->
    <section id="community-overview" class="order-<?php echo $comm['sectionOrder']['overview']; ?>">
        <div class="bg-center community-welcome"
        style="background-image: url('<?php echo '/communities/'.$community['url'].'/images/'.$community['brandStyle']['welcomeBackground'] ? : '/images/bg-who-we-are-desktop.jpg' ?>');"> 
            <div class="container-fluid " style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="content-V4 max-lg-width-1140">
                    <ul id="community-nav" class="nav nav-tabs smooth-scroll">
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['overview']; ?>">
                            <a class="nav-link px-0" href="#community-overview">OVERVIEW</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['floorplans']; ?>">
                            <a class="nav-link px-0" href="#community-floorplans">FLOOR PLANS</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['neighborhood']; ?>">
                            <a class="nav-link px-0" href="#community-neighborhood">NEIGHBORHOOD</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['quick-move-ins']; ?>">
                            <a class="nav-link px-0" href="#community-quick-move-ins">QUICK MOVE-INS</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['siteplan']; ?>">
                            <a class="nav-link px-0" href="#community-siteplan">SITE PLAN</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['features']; ?>">
                            <a class="nav-link px-0" href="#community-features">FEATURES</a>
                        </li>
                        <li class="nav-item order-<?php echo $comm['sectionOrder']['map']; ?>">
                            <a class="nav-link px-0" href="#community-map">MAP</a>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <?php include_once("welcome.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMUNITY VIDEO HIGHLIGHTS --> 
    <section id="community-highlights" class="order-<?php echo $comm['sectionOrder']['overview']; ?>">
        <div class="container-fluid py-default community-highlights-row-container">
            <?php 
            // Initialize an empty array
            $communityFeature = [];

            // Loop through the featured items and add any matching the URL path to the $communityFeature array
            foreach ($featured['featured'] as $featured) {
                if($featured['comUrl'] == $url_path[2]) { 
                    array_push($communityFeature, $featured);
                }
            }
            if (!empty($communityFeature)) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Generate a hyperlink to the URL specified in $communityFeature -->
                        <a href="<?php echo $communityFeature[0]['highlightUrl']['url']; ?>"
                            <?php 
                                // If the URL type is "youtube", set the data-fancybox attribute
                                if($communityFeature[0]['highlightUrl']['type'] == "youtube") { ?>
                                data-fancybox="highlight-<?php echo $communityFeature[0]['url']; ?>" 
                            <?php } ?>
                            <?php 
                                // If the URL type is "360tour", set the target attribute to "_blank"
                                if($communityFeature[0]['highlightUrl']['type'] == "360tour") { ?> 
                                target="_blank" 
                            <?php } ?>
                        >
                            <!-- Display the community's main image -->
                            <div class="view">
                                <img src="/communities/<?php echo $community['url']; ?>/images/<?php echo $community['listingImgV2'][0];?>" alt="<?php echo $featured['imgAlt']; ?>" class="img-fluid" loading="lazy">
                                <!-- Display an overlay image and play button icon corresponding to the URL type of the featured item -->
                                <div class="mask cursor-pointer">
                                    <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['frameV2'] ?>" class="img-fluid" alt="<?php echo $comm['name'] ?>" loading="lazy">
                                    <?php 
                                        // If the URL type is "youtube", display a YouTube play button icon
                                        if($communityFeature[0]['highlightUrl']['type'] == "youtube") { ?>
                                        <div class="big_play_btn_wrap cursor-pointer">
                                            <img src="/images/icon/youtube.svg" alt="Play button icon" class="play_btn youtube" loading="lazy">
                                        </div>
                                    <?php } ?>
                                    <?php 
                                        // If the URL type is "360tour", display a 360 tour icon
                                        if($communityFeature[0]['highlightUrl']['type'] == "360tour") { ?>
                                        <div class="big_play_btn_wrap big_tour_btn_wrap cursor-pointer">
                                            <img src="/images/icon/360tour.svg" alt="360 Tour icon" class="play_btn tour_btn" loading="lazy">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>      
                        </a>
                        <!-- Display the featured item's image alt text as a heading -->
                        <h4 class="text-black mt-3 font-weight-normal"><?php echo $communityFeature[0]['imgAlt']; ?></h4>
                    </div>
                    <div class="col-md-6">
                        <div class="community-highlight-swiper">
                            <h3 class="font-weight-bold text-white mt-2 mb-4">VIDEO HIGHLIGHTS</h3>
                            <div class="swiper-container community-highlight-swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($communityFeature as $featured) { ?>
                                    <div class="swiper-slide">
                                        <?php include(ROOT_PATH."includes/components/featuredList.php"); ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-next">
                                <!-- <img src="/images//arrow-right.svg" alt=""> -->
                                <i class="fa fa-chevron-right"></i>
                            </div>
                            <div class="swiper-button-prev">
                                <!-- <img src="/images//arrow-left.svg" alt=""> -->
                                <i class="fa fa-chevron-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-weight-bold text-white" style="margin-bottom:100px;">Check back later for video highlights!</h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Community Neighborhood -->
    <section id="community-neighborhood" class="order-<?php echo $comm['sectionOrder']['neighborhood']; ?> pb-3">
        <div class="header-image">
            <img src="/communities/<?php echo $comm['url']; ?>/images/neighborhood-slider/slider-1.jpg"
            loading="lazy" class="img-fluid w-100 img-fit" alt="<?php echo $comm['name'], " ", $comm['homeType']; ?>">
            <div class="header container-fluid max-lg-width-1140">
                <h3 class="font-weight-bold">NEIGHBORHOOD</h3>
            </div>
        </div>
        <div class="md-pills-wrap">
            <div class="container-fluid max-lg-width-1140">
                <ul class="nav md-pills hover-tab neigborhood-pills">
                    <?php 
                    if(sizeof($comm['neighborhood'])) {
                    foreach ($comm['neighborhood'] as $key => $item) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($key==0) ? "active" : ""; ?>" data-toggle="tab"
                            href="#<?php echo $item[1] ?>" role="tab"><?php echo $item[0] ?></a>
                    </li>
                    <?php }} else { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="#neighborhood" data-toggle="tab" role="tab">Neighborhood</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="container-fluid max-lg-width-1140">
            <div class="">
                <!-- Tab panels -->
                <div class="tab-content neigborhood-tab-content p-0">
                    <?php 
                    if(sizeof($comm['neighborhood'])) {
                    foreach ($comm['neighborhood'] as $key => $item) { ?>
                    <!--Tab pane-->
                    <div class="tab-pane fade <?php echo ($key==0) ? "in show active" : ""; ?>"
                        id="<?php echo $item[1]; ?>" role="tabpanel">
                        <?php include("neighborhood/". $item[1] .".php"); ?>
                    </div>
                    <!--/.Tab pane-->
                    <?php }} else { ?>
                    <div class="tab-pane fade in show active">
                        <p class="text-l-blue font-weight-bold">Neighborhood feature list coming soon!</p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Siteplan -->
    <section id="community-siteplan" class="order-<?php echo $comm['sectionOrder']['siteplan']; ?>">
        <div class="container-fluid py-default max-lg-width-1140">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold mb-3 pl-sm-3">Site Plan</h3>
                </div>
            </div>
            <?php if(sizeof($comm['sitePlans'])) { ?>
            <!-- Slider main container -->
            <div class="swiper-container community-siteplan-swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php foreach ($comm['sitePlans'] as $key => $siteplan) { ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="d-flex h-100 align-items-center">
                            <a href="sp-image/<?php echo $siteplan['0'] ?>" data-fancybox="siteplan"
                                data-caption="<?php echo $siteplan['1'] ?>">
                                <div class="view overlay z-depth-1-half m-3 cursor-pointer">
                                    <img src="sp-image/<?php echo $siteplan['0'] ?>" class="img-fluid" loading="lazy"
                                        alt="<?php echo $siteplan['2'] ?>">
                                    <div class="mask flex-center rgba-black-strong">
                                        <p class="white-text font-weight-bold">Zoom</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <!-- <img src="/images//arrow-right.svg" alt=""> -->
                    <i class="fa fa-chevron-right" style="color:black;"></i>
                </div>
                <div class="swiper-button-prev">
                    <!-- <img src="/images//arrow-left.svg" alt=""> -->
                    <i class="fa fa-chevron-left" style="color:black;"></i>
                </div>
               
            </div>
            <?php } else { ?>
            <div class="pl-sm-3 my-3">
                <h4 class="text-l-blue font-weight-bold">Site Plan Coming Soon!</h4>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Community Features -->
    <section id="community-features" class="order-<?php echo $comm['sectionOrder']['features']; ?>">
        <div class="container-fluid max-lg-width-1140">
            <div>
                <h3 class="font-weight-bold m-0 pt-3 text-l-blue">FEATURES</h3>
            </div>
        </div>
        <div class="md-pills-wrap">
            <div class="container-fluid max-lg-width-1140">
                <ul class="nav md-pills hover-tab features-pills">
                    <?php foreach ($comm['features'] as $key => $feature) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($key==0) ? "active" : ""; ?>" data-toggle="tab"
                            href="#<?php echo $feature; ?>" role="tab"><?php echo $feature; ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="container-fluid max-lg-width-1140">
            <div class="">
                <!-- Tab panels -->
                <div class="tab-content features-tab-content p-0">
                    <?php foreach ($comm['features'] as $key => $feature) { ?>
                    <!--Tab pane-->
                    <div class="tab-pane fade <?php echo ($key==0) ? "in show active" : ""; ?>"
                        id="<?php echo $feature; ?>" role="tabpanel">
                        <?php include("features/".$feature.".php"); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Map (MAP IS INITIATED IN THE INDEX FILE OF EACH COMMUNITY FOLDER) -->
    <section id="community-map" class="order-<?php echo $comm['sectionOrder']['map']; ?> bg-white">
        <div class="container-fluid max-lg-width-1140">
            <div class="header d-flex align-items-center justify-content-between">
                <div class="open-hour">
                    <h3 class="font-weight-bold m-0"><?php echo $comm['openHours']['label'] ?></h3>
                    <p><?php echo $comm['openHours']['hours'] ?></p>
                </div>
                <a href="<?php echo $comm['address']['addresses'][0]['direction'] ?>" target="_blank">
                    <div class="direction d-flex align-items-center">
                        <p class="text-black">Get Directions</p>
                        <img src="/images/arrow-blue-right.svg" alt="arrow right icon">
                    </div>
                </a>
            </div>
            <div id="google-map" class="community-google-map">
            </div>
        </div>
    </section>

    <!-- Community Floorplans - SO IS COMMUNITY MENU LINK --> 
    <section id="community-floorplans" class="order-<?php echo $comm['sectionOrder']['floorplans']; ?> py-3">
        <div class="container-fluid max-lg-width-1140">
            <div>
                <h3 class="font-weight-bold m-0 pt-3 text-l-blue">FLOOR PLANS</h3>
            </div>
        </div>
        <?php if(sizeof($available_fp) != 0) { ?>
        <div class="container-fluid position-relative">
            <!-- Slider main container -->
            <div class="swiper-container community-details-swiper-containerV2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">

                    <?php foreach ($available_fp as $fp) { ?>
                    <!-- Slides -->
                    <div class="swiper-slide py-3">
                        <div class="z-depth-1 h-100 bg-white">
                            <?php include(ROOT_PATH."includes/components/floorplan/floorplanListV4.php"); ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-next com-fp-btn-next z-depth-1">
                <!-- <img src="/images//arrow-right.svg" alt=""> -->
                <i class="fa fa-chevron-right"></i>
            </div>
            <div class="swiper-button-prev com-fp-btn-prev z-depth-1">
                <!-- <img src="/images//arrow-left.svg" alt=""> -->
                <i class="fa fa-chevron-left"></i>
            </div>
        </div>
        <?php } else { ?>
        <div class="container-fluid max-lg-width-1140">
            <div class="">
                <h4 class="text-l-blue font-weight-normal my-3">We are currently building!</h4>
            </div>
        </div>
        <?php } ?>
    </section>

    <!-- Community Quick Move-Ins -->
    <section id="community-quick-move-ins"
        class="bg-l-black py-3 order-<?php echo $comm['sectionOrder']['quick-move-ins']; ?>">
        <div class="container-fluid max-lg-width-1140">
            <div>
                <h3 class="font-weight-bold m-0 pt-3 text-white">QUICK MOVE-IN HOMES</h3>
            </div>
        </div>
        <?php if(sizeof($available_qmi) != 0) { ?>
        <div class="container-fluid position-relative">
            <!-- Slider main container -->
            <div class="swiper-container community-details-swiper-containerV3">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">

                    <?php foreach ($available_qmi as $key => $qmi) { ?>
                    <!-- Slides -->
                    <div class="swiper-slide py-3">
                        <div class="z-depth-1 h-100 bg-white">
                            <?php include(ROOT_PATH."includes/components/quickMoveIns/quickMoveInsListV4.php"); ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-next com-qmi-btn-next z-depth-1">
                <!-- <img src="/images//arrow-right.svg" alt=""> -->
                <i class="fa fa-chevron-right"></i>
            </div>
            <div class="swiper-button-prev com-qmi-btn-prev z-depth-1">
                <!-- <img src="/images//arrow-left.svg" alt=""> -->
                <i class="fa fa-chevron-left"></i>
            </div>
        </div>
        <?php } else { ?>
        <div class="container-fluid max-lg-width-1140">
            <div class="">
                <h4 class="text-white font-weight-normal my-3">We are currently building!</h4>
            </div>
        </div>
        <?php } ?>
    </section>
</div>


<!-- PROMOTIONAL POP UPS / MODALS  --> 
<?php if($community['url'] == "") { ?>
    <section>
        <!-- Modal -->
        <div class="modal animated fadeIn" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a target="_blank" href="https://www.facebook.com/events/162420570027200/">
                        <img src="/images/popup/watershed-popup.jpg"
                            alt="Watershed Model Grand Opening" class="img-fluid w-100">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } elseif($community['url'] == "") { ?>
    <section>
        <!-- Modal -->
        <div class="modal animated fadeIn" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a target="_blank" href="https://fb.me/e/2f18MJ4Rb">
                        <img src="/images/popup/02422-CMH-WebEdits-Web-CMH-PopUp-800x800.jpg"
                            alt="The Retreat at Westfields Model Grand Opening" class="img-fluid w-100">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } ?> 

<script>
    initCookies({
        cookieName: "savedCommunity",
        listingID: "commWrap-"
    });
</script>

<!--  Filter Available Times from the Current Date Picked --> 
<script type="text/javascript">

    function filterTime(){
        //Grab Dates and Time Stamps from PHP to filter the form. 
        var date0 = "<?php echo $date0; ?>";
        var date1 = "<?php echo $date1; ?>";
        var date2 = "<?php echo $date2; ?>";
        var date3 = "<?php echo $date3; ?>";
        var date4 = "<?php echo $date4; ?>";
        var date6 = "<?php echo $date6; ?>";
        var date7 = "<?php echo $date7; ?>";  

        var currentTime = "<?php echo $currentTime; ?>";  
        var elevenAM = "<?php echo $elevenAM; ?>";  
        var twelvePM = "<?php echo $twelvePM; ?>";  
        var onePM = "<?php echo $onePM; ?>"; 
        var twoPM = "<?php echo $twoPM; ?>"; 
        var threePM = "<?php echo $threePM; ?>"; 
        var fourPM = "<?php echo $fourPM; ?>"; 

        var appointmentDate = $("#aptDate").find('option:selected').text();

        $("#aptTime").removeAttr("disabled");
        

        if (appointmentDate == date0 && currentTime >= elevenAM) {
            $('#aptTime option[value="11:00 AM"]').css("display","none");
        } else {
            $('#aptTime option[value="11:00 AM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= twelvePM) {
            $('#aptTime option[value="12:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="12:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= onePM) {
            $('#aptTime option[value="1:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="1:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= twoPM) {
            $('#aptTime option[value="2:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="2:00 PM"]').css("display","block");
        }
        
        if (appointmentDate == date0 && currentTime >= threePM) {
            $('#aptTime option[value="3:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="3:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= fourPM) { 
            $('#aptTime option[value="4:00 PM"]').css("display","none");

        } else {
            $('#aptTime option[value="4:00 PM"]').css("display","block");
        }
    } 
</script>
