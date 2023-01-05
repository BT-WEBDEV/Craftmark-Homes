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
include_once(ROOT_PATH."includes/components/contactTodayModal.php"); 

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
$totalView = getTotalStats($pv_path, 'gka_community_view', false) + $initialViews[$pv_path];
$totalSaved = getTotalStats($pv_path, 'gka_community_view', true) + $initialSaved[$pv_path];
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


<div class="brand-background"
    style="background-image: url('/communities/<?php echo $community['url'] ?>/images/<?php echo $community['brandStyle']['background'] ?>');">
    <section class="community-topper bg-center nav-space alert-space">
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
                                $<?php echo ($comm['priceInfo']['price'] != 0) ? $comm['priceInfo']['price'] : " -- "; ?><?php echo ($comm['priceInfo']['priceTag']) ? $comm['priceInfo']['priceTag'] : "s"; ?>
                            </p>
                            <?php if($comm['name'] == 'Retreat At Westfields') { echo '<span class="seperator">|</span><p class="font-weight-normal">Pre-Construction Pricing</p>'; }?>
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
                <?php
                foreach ($comm['gallery'] as $key => $gallery) {
                ?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <a href="/communities/<?php echo $community['url']; ?>/images/slider/slide<?php echo $gallery[0]; ?>.jpg"
                        data-fancybox="community-slider">
                        <img src="/communities/<?php echo $community['url']; ?>/images/slider/slide<?php echo $gallery[0]; ?>.jpg"
                            class="img-fluid w-100" alt="<?php echo $gallery[2]; ?>">
                    </a>
                </div>
                <?php } ?>
            </div>
            <a style="background-color: <?php echo $community['brandStyle']['mainColor']; ?>; color: <?php echo $community['brandStyle']['btnText']; ?>;"
                data-fancybox-trigger="community-slider" href="javascript:;"
                class="btn custom-btn show-all-photos-btn font-weight-normal">SHOW ALL PHOTOS</a>
        </div>
    </section>

    <section id="community-details">
        <div class="container community-details">
            <div class="content">
                <div class="flex-item item-1 order-1">
                    <div>
                        <p class="d-md-none"><?php echo $comm['address']['county'] ?></p>
                        <p><?php echo $comm['headerInput1'] ?></p>
                        <p><?php echo $comm['headerInput2'] ?></p>
                        <p class="d-md-none font-weight-normal"><?php echo $comm['priceInfo']['label'] ?>
                            $<?php echo $comm['priceInfo']['price'] ?>s</p>
                    </div>
                    <hr>
                </div>
                <div class="flex-item item-2 order-3 text-xl-right">
                    <?php 
                    foreach ($comm['salesAgent']['agents'] as $agent) { ?>
                    <div>
                        <p class="font-weight-bold">@ <?php echo $agent['agentName']; ?></p>
                        <p>
                            <?php if($agent['phone'] != "" && $comm['id'] != 14 && $comm['id'] != 12) { ?>
                            <a class="text-l-blue"
                                href="tel:<?php echo clean($agent['phone']); ?>"><?php echo phoneNumberFormat($agent['phone']); ?></a>
                            <strong>
                                <?php echo ($comm['name'] != 'Retreat At Westfields' && $comm['name'] != 'Darnestown Station') ? "(Call or Text!)" : ""; ?>
                            </strong>
                            <span class="mx-1">|</span>
                            <?php } ?>
                            <a class="text-l-blue"
                                href="mailto:<?php echo $agent['email']; ?>"><?php echo $agent['email']; ?></a>
                        </p>
                    </div>
                    <?php } ?>
                    <div>
                        <p class="disclaimer font-weight-normal"><i><?php echo $comm['salesAgent']['label'] ?></i>
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="flex-item item-3 order-2">
                    <?php foreach ($comm['address']['addresses'] as $address) { ?>
                    <div class="mb-2 address">
                        <p class="label font-weight-bold"><?php echo $address['label'] ?></p>
                        <a class="text-l-blue" target="_blank" href="<?php echo $address['direction'] ?>">
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
                        </a>
                        <p class="text-black"><?php echo $address['additionalInfo'] ?></p>
                    </div>
                    <?php } ?>
                    <!-- Retreat at westfields -->
                    <?php echo ($comm['url'] == 'retreat-at-westfields') ? '<p class="font-weight-bold">Directions:</p><ul><li>Take I-495 to I-66W</li><li>Take Exit 53B, Route 28N/Dulles Airport</li><li>Exit onto Westfields Blvd- Stay right</li><li>Right On Stonecroft Blvd</li><li>Left on Conference Center Drive</li><li>Continue straight ahead to Craftmark Homes – The Retreat at Westfields</li></ul>' : ''; ?>
                    <!-- Retreat at westfields -->
                </div>
                <div class="order-3 w-100 totalView">
                    <hr class="d-block my-xl-3">
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
                <?php
                    // Remove Contact button from sold communities.
                    if($community['status'] != 'soldLabel') {
                ?>
                <div class="mt-3 order-4 w-100">
                    <a href="#"
                        style="background-color: <?php echo $community['brandStyle']['mainColor']; ?>; color: <?php echo $community['brandStyle']['btnText']; ?>;"
                        class="btn d-block m-0 font-weight-bold contact-today-btn" data-toggle="modal"
                        data-target="#contactToday"><?php echo ($formBtnText) ? $formBtnText : "Schedule Appointment" ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<section id="community-menu">
    <div class="container-fluid max-lg-width-1140">
        <ul class="nav md-pills justify-content-center justify-content-md-start community-pills smooth-scroll">
            <li class="nav-item order-<?php echo $comm['sectionOrder']['overview']; ?>">
                <a class="nav-link active" href="#community-overview">OVERVIEW</a>
            </li>
            <!-- <li class="nav-item order-<?php echo $comm['sectionOrder']['floorplans']; ?>">
                <a class="nav-link" href="#community-floorplans">FLOOR PLANS</a>
            </li> --> 
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
</section>

<div class="community-flex-container">

    <!-- Community Overview -->
    <section id="community-overview" class="order-<?php echo $comm['sectionOrder']['overview']; ?>">
        <div class="bg-center community-welcome"
            style="background-image: url('<?php echo ($community['brandStyle']['welcomeBackground']) ? '/communities/'.$community['url'].'/images/'.$community['brandStyle']['welcomeBackground'] : '/images/bg-who-we-are-desktop.jpg' ?>');">
            <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="content px-lg-5">
                    <div>
                        <?php include_once("welcome.php"); ?>
                    </div>

                    <div>
                        <?php 
                        $featured_status = false;
                        
                        foreach ($featured['featured'] as $feat) {  
                            if($feat['comUrl'] == $url_path[2]) { 
                                $featured_status = true;
                            }}
                        ?>
                        <h4 class="font-weight-bold m-0 py-3">
                            <?php echo ($featured_status) ? "Community Video Highlights" : ""; ?></h4>
                        <!-- Retreat at westfields -->
                        <?php echo ($comm['url'] == 'retreat-at-westfields') ? '<p class="pb-3"><strong>View the Richmond Model Video and Flyover of what the finished community will look like below!</strong></p>' : ''; ?>
                        <!-- Retreat at westfields -->
                        <div class="row m-0">
                            <?php 
                            foreach ($featured['featured'] as $featured) {
                                if($featured['comUrl'] == $url_path[2] && $featured['status'] != 'sold') { 
                            ?>
                            <div class="col-3 col-md-2">
                                <?php include(ROOT_PATH."includes/components/featuredList.php"); ?>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Neighborhood -->
    <section id="community-neighborhood" class="order-<?php echo $comm['sectionOrder']['neighborhood']; ?> pb-3">
        <div class="row m-0">
            <div class="col-12 col-md-6 p-0">
                <!-- Slider main container -->
                <!-- <div class="swiper-container hero-slider">
                    Additional required wrapper
                    <div class="swiper-wrapper">
                        Slides
                        <div class="swiper-slide">
                            <div class="list-item">
                                <img src="/communities/clarksburg-town-center/images/neighborhood-slider/slider-1.jpg"
                                    class="img-fluid w-100" alt="<?php echo $comm['name'], " ", $comm['homeType']; ?>">
                            </div>
                        </div>
                    </div>
                </div> -->
                <img src="/communities/<?php echo $comm['url']; ?>/images/neighborhood-slider/slider-1.jpg"
                    class="img-fluid w-100" alt="<?php echo $comm['name'], " ", $comm['homeType']; ?>">
            </div>
            <div class="col-12 col-md-6 p-0">
                <ul class="nav md-pills hover-tab neigborhood-pills z-depth-1">
                    <?php 
                    if(sizeof($comm['neighborhood'])) {
                    foreach ($comm['neighborhood'] as $key => $item) { ?>
                    <li class="nav-item flex-fill">
                        <a class="nav-link <?php echo ($key==0) ? "active" : ""; ?>" data-toggle="tab"
                            href="#<?php echo $item[1] ?>" role="tab"><?php echo $item[0] ?></a>
                    </li>
                    <?php }} else { ?>
                    <li class="nav-item flex-fill">
                        <a class="nav-link active" href="#neighborhood" data-toggle="tab" role="tab">Neighborhood</a>
                    </li>
                    <?php } ?>
                </ul>

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

        <div class="container-fluid max-lg-width-1140">
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
                                    <img src="sp-image/<?php echo $siteplan['0'] ?>" class="img-fluid"
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold mb-3 pl-sm-3">Features</h3>
                </div>
            </div>
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="community-features-accordion" role="tablist"
                aria-multiselectable="true">

                <?php
            if(sizeof($comm['features'])) {
            foreach ($comm['features'] as $feature) {
            ?>
                <!-- Accordion card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="heading-<?php echo $feature; ?>">
                        <a class="collapsed" data-toggle="collapse" data-parent="#community-features-accordion"
                            href="#collapse-<?php echo $feature; ?>" aria-expanded="false"
                            aria-controls="collapse-<?php echo $feature; ?>">
                            <div class="header-box"
                                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.5)), url('/communities/<?php echo $comm['url']; ?>/features/images/<?php echo $feature; ?>.jpg')">
                                <div class="accordion-white-bg"></div>
                                <div class="content z-inder-1 d-flex align-items-center">
                                    <div class="icon">
                                        <img src="/images/icon/community-icon/feature-<?php echo $feature; ?>.svg"
                                            alt="<?php echo $feature, " icon"; ?>">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="text-black"><?php echo $feature; ?></h5>
                                        <hr>
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.445" height="11.723"
                                            viewBox="0 0 20.445 11.723">
                                            <path id="accordion-arrow" data-name="Path 1065"
                                                d="M2066.492,911.514l8.1,8.1,8.1-8.1"
                                                transform="translate(-2064.371 -909.393)" fill="none" stroke="#262626"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapse-<?php echo $feature; ?>" class="collapse" role="tabpanel"
                        aria-labelledby="heading-<?php echo $feature; ?>" data-parent="#community-features-accordion">
                        <div class="card-body">
                            <div>
                                <?php include("features/".$feature.".php"); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Accordion card -->
                <?php } } else { ?>
                <div class="pl-sm-3 my-3">
                    <h4 class="text-l-blue font-weight-bold">Features Coming Soon!</h4>
                </div>
                <?php } ?>
            </div>
            <!-- Accordion wrapper -->
        </div>
    </section>

    <!-- Community Map -->
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

    <!-- Community Floorplans CURRENTLY HIDDEN - SO IS COMMUNITY MENU LINK --> 
    <section id="community-floorplans" class="order-<?php echo $comm['sectionOrder']['floorplans']; ?> py-3" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold m-0 pt-3 pl-sm-3">Floor Plans</h3>
                </div>
            </div>
            <?php if(sizeof($available_fp) != 0) { ?>
            <!-- Slider main container -->
            <div class="swiper-container community-details-swiper-container pl-sm-3">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                foreach ($available_fp as $fp) {
                ?>
                    <div class="swiper-slide py-3">
                        <div class="z-depth-1 h-100 bg-white">
                            <?php include(ROOT_PATH."includes/components/floorplan/floorplanListV3.php"); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images/arrow-right.svg" alt="arrow right icon">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images/arrow-left.svg" alt="arrow left icon">
                </div>
            </div>
            <?php } else if($comm['status'] == "soldLabel" || $comm['status'] == "sold") { ?>
            <div class="pl-sm-3 my-3">
                <h4 class="text-l-blue font-weight-bold">We're sold out!</h4>
            </div>
            <?php } else { ?>
            <div class="pl-sm-3 my-3">
                <h4 class="text-l-blue font-weight-bold">We are currently building!</h4>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Community Quick Move-Ins -->
    <section id="community-quick-move-ins" class="order-<?php echo $comm['sectionOrder']['quick-move-ins']; ?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold m-0 pt-3 pl-sm-3">Quick Move-Ins</h3>
                </div>
            </div>
            <?php if(sizeof($available_qmi) != 0) { ?>
            <!-- Slider main container -->
            <div class="swiper-container community-details-swiper-container pl-sm-3">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($available_qmi as $key => $qmi) { ?>
                    <div class="swiper-slide py-3">
                        <div class="h-100">
                            <?php include(ROOT_PATH."includes/components/quickMoveIns/quickMoveInsListV2.php");  ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images/arrow-right.svg" alt="arrow right icon">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images/arrow-left.svg" alt="arrow left icon">
                </div>
            </div>
            <?php } else if($comm['status'] == "soldLabel" || $comm['status'] == "sold") { ?>
            <div class="pl-sm-3 my-3">
                <h4 class="text-l-blue font-weight-bold">We're sold out!</h4>
            </div>
            <?php } else { ?>
            <div class="pl-sm-3 my-3">
                <h4 class="text-l-blue font-weight-bold">We are currently building!</h4>
            </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php if($community['url'] == "darnestown-station") { ?>
    <section>
        <!-- Modal -->
        <div class="modal animated fadeIn" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <a target="_blank" href="https://fb.me/e/5j0ebXHsx">
                        <img src="/images/popup/02422-CMH-WebEdits-Web-CMH-PopUp-800x800.jpg"
                            alt="The Retreat at Westfields Model Grand Opening" class="img-fluid w-100">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } elseif($community['url'] == "clarksburg-town-center") { ?>
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