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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCGazDgNiggz9abIbupLFzLo5ywU9NdNw"></script>

<style>
    .community-topper p,
    .community-details p,
    .community-details a,
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
            <div class="d-flex flex-wrap justify-content-end justify-content-md-between">
                <div class="desktop-title d-none d-md-block">
                    <div>
                        <h3 style="color: <?php echo $community['brandStyle']['mainColor']; ?>"
                            class="font-weight-bold d-flex">
                            <img src="/images/icon/community-icon/Pin.svg" alt="Map Pin">
                            <div class="align-self-end"><?php echo $comm['name']; ?></div>
                        </h3>
                        <div class="d-flex flex-wrap align-items-center">
                            <p class="font-weight-normal"><?php echo $comm['address']['county'] ?></p>
                            <span class="seperator"></span>
                            <p style="color: <?php echo $community['brandStyle']['mainColor']; ?>" class="price">
                                <?php echo $comm['priceInfo']['label'] ?>
                                $<?php echo ($comm['priceInfo']['price'] != 0) ? $comm['priceInfo']['price'] : " -- "; ?><?php echo ($comm['priceInfo']['priceTag']) ? $comm['priceInfo']['priceTag'] : "s"; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="like-share-wrap text-right d-flex align-self-end">
                    <div class="liked-container d-flex align-items-center save-share text-center">
                        <div>
                            <button id="save-btn-<?php echo $comm['id']; ?>" class="list-card-save" type="button"
                                aria-label="Save" data-listid="<?php echo $comm['id']; ?>"
                                data-pageid="communities/<?php echo $comm['url']; ?>"
                                data-sqltable="gka_community_view">
                                <?php require ROOT_PATH."/images/icon/community-icon/heart.svg" ?>
                            </button>
                            <span class="text-black d-none d-md-block">Save</span>
                        </div>
                    </div>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>"
                        onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
                        <div class="text-center save-share align-items-center">
                            <img src="/images/icon/community-icon/Share.svg" alt="Share">
                            <span class="text-black d-none d-md-block">Share</span>
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
                class="btn custom-btn show-all-photos-btn font-weight-normal">SHOW ALL
                <?php echo sizeof($comm['gallery']); ?> PHOTOS</a>
        </div>
    </section>

    <section id="community-details">
        <div class="container-fluid max-lg-width-1140">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flex-item item-1">
                            <div>
                                <p class="d-md-none"><?php echo $comm['address']['county'] ?></p>
                                <p><?php echo $comm['headerInput1'] ?></p>
                                <p><?php echo $comm['headerInput2'] ?></p>
                                <p class="d-md-none font-weight-normal"><?php echo $comm['priceInfo']['label'] ?>
                                    $<?php echo $comm['priceInfo']['price'] ?>s</p>
                            </div>
                        </div>
                        <div class="flex-item item-3">
                            <?php foreach ($comm['address']['addresses'] as $address) { ?>
                            <div class="address">
                                <p class="label font-weight-bold"><?php echo $address['label'] ?></p>
                                <div class="d-flex align-items-center">
                                    <img src="/images/icon/community-icon/<?php echo ($address['label'] == "GPS Coordinates:") ? "GPS.svg" : "Pin.svg" ?>"
                                        alt="Map Pin">
                                    <a class="" target="_blank" href="<?php echo $address['direction'] ?>">
                                        <?php
                                            $comm_address = (($address['address']['street1']) ? $address['address']['street1'].", " : "") . (($address['address']['street2']) ? $address['address']['street2'].", " : "") . $address['address']['city'] . ", " . $address['address']['state'] . " " . $address['address']['zip'];
                                            // Show only label
                                            if($address['address'] == "") {
                                                $comm_address = "";
                                            }                                
                                        ?>
                                        <div>
                                            <?php echo $comm_address; ?>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <!-- Retreat at westfields -->
                                    <?php echo ($comm['url'] == 'retreat-at-westfields') ? '<p class="font-weight-bold mt-2">Directions:</p><ul><li>Take I-495 to I-66W</li><li>Take Exit 53B, Route 28N/Dulles Airport</li><li>Exit onto Westfields Blvd- Stay right</li><li>Right On Stonecroft Blvd</li><li>Left on Conference Center Drive</li><li>Continue straight ahead to Craftmark Homes – The Retreat at Westfields</li></ul>' : ''; ?>
                                    <!-- Retreat at westfields -->
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mx-0 justify-content-end">
                            <?php foreach ($comm['salesAgent']['agents'] as $agent) { ?>
                            <div class="col-lg-6">
                                <div class="agent">
                                    <div class="image">
                                        <img src="/images/person-placeholder.jpg" alt=""
                                            class="img-fluid img-fit rounded-circle">
                                    </div>
                                    <div class="text-center info">
                                        <div class="name">
                                            <?php echo $agent['agentName']; ?>
                                        </div>
                                        <div>
                                            <?php if($agent['phone'] != "" && $comm['id'] != 14 && $comm['id'] != 12) { ?>
                                            <a class="text-black"
                                                href="tel:<?php echo clean($agent['phone']); ?>"><?php echo phoneNumberFormat($agent['phone']); ?></a>
                                            <strong>
                                                <?php echo ($comm['name'] != 'Retreat At Westfields' && $comm['name'] != 'Darnestown Station') ? "(Call or Text!)" : ""; ?>
                                            </strong>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <a class="text-black"
                                                href="mailto:<?php echo $agent['email']; ?>"><?php echo $agent['email']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="text-right disclaimer col-12">
                                <i><?php echo $comm['salesAgent']['label'] ?></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="totalView">
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
                <div>
                    <?php
                        // Remove Contact button from sold communities.
                        if($community['status'] != 'soldLabel') {
                        ?>
                    <div class="mt-1 order-4 w-100">
                        <a href="#"
                            style="background-color: <?php echo $community['brandStyle']['mainColor']; ?>; color: <?php echo $community['brandStyle']['btnText']; ?>;"
                            class="btn d-block m-0 font-weight-bold contact-today-btn" data-toggle="modal"
                            data-target="#contactToday"><?php echo ($formBtnText) ? $formBtnText : "Schedule Appointment" ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<section id="community-menu">
    <div class="container-fluid max-lg-width-1140">
        <ul class="nav md-pills justify-content-center community-pills smooth-scroll">
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
</section>

<div class="community-flex-container">
    <!-- Community Overview -->
    <section id="community-overview" class="order-<?php echo $comm['sectionOrder']['overview']; ?>">
        <div class="community-welcome"
            style="background: url('<?php echo ($community['brandStyle']['welcomeBackground']) ? '/communities/'.$community['url'].'/images/'.$community['brandStyle']['welcomeBackground'] : '/images/bg-who-we-are-desktop.jpg' ?>');">
            <div class="container-fluid max-lg-width-1140">
                <div>
                    <?php include_once("welcome.php"); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Highlights -->
    <section id="community-highlights" class="bg-l-black order-<?php echo $comm['sectionOrder']['overview']; ?>">
        <div class="container-fluid py-default max-lg-width-1140">
            <div class="mb-3">
                <h3 class="font-weight-bold text-white">COMMUNITY VIDEO HIGHLIGHTS</h3>
            </div>
            <div>
                <?php 
                $featured_status = false;
                
                foreach ($featured['featured'] as $feat) {  
                    if($feat['comUrl'] == $url_path[2]) { 
                        $featured_status = true;
                    }}
                ?>
                <div class="row m-0">
                    <?php 
                        foreach ($featured['featured'] as $featured) {
                            if($featured['comUrl'] == $url_path[2]) { 
                        ?>
                    <div class="col-6 col-md-3 col-lg-2">
                        <?php include(ROOT_PATH."includes/components/featuredListV2.php"); ?>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Neighborhood -->
    <section id="community-neighborhood" class="order-<?php echo $comm['sectionOrder']['neighborhood']; ?> pb-3">
        <div class="header-image">
            <img src="/communities/<?php echo $comm['url']; ?>/images/neighborhood-slider/slider-1.jpg"
                class="img-fluid w-100 img-fit" alt="<?php echo $comm['name'], " ", $comm['homeType']; ?>">
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

    <!-- Community Map -->
    <section id="community-map" class="order-<?php echo $comm['sectionOrder']['map']; ?> bg-white">
        <div class="container-fluid max-lg-width-1140">
            <div class="header d-md-flex align-items-center justify-content-between">
                <div class="open-hour">
                    <h3 class="font-weight-bold m-0 text-l-blue"><?php echo $comm['openHours']['label'] ?></h3>
                </div>
                <div class="d-md-flex align-items-center">
                    <div class="mr-3">
                        <?php echo $comm['openHours']['hours'] ?>
                    </div>
                    <a href="<?php echo $comm['address']['addresses'][0]['direction'] ?>" class="direction"
                        target="_blank">
                        Get Directions <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div id="google-map" class="community-google-map">
            </div>
        </div>
    </section>

    <!-- Community Floorplans -->
    <section id="community-floorplans" class="order-<?php echo $comm['sectionOrder']['floorplans']; ?> py-3">
        <div class="container-fluid max-lg-width-1140">
            <div>
                <h3 class="font-weight-bold m-0 pt-3 text-l-blue">FLOOR PLANS</h3>
            </div>
        </div>
        <?php if(sizeof($available_fp) != 0) { ?>
        <div class="container-fluid">
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
                <h3 class="font-weight-bold m-0 pt-3 text-white">QUICK DELIVERIES</h3>
            </div>
        </div>
        <?php if(sizeof($available_qmi) != 0) { ?>
        <div class="container-fluid">
            <!-- Slider main container -->
            <div class="swiper-container community-details-swiper-containerV2">
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
<script>
    initCookies({
        cookieName: "savedCommunity",
        listingID: "commWrap-"
    });
</script>