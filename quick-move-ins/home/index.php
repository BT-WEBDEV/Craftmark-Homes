<!-- <div style="height: 200px;"></div> -->
<?php 
include_once("../../includes/header.php"); 

charsetEncode();

$qmi_id = $_GET['id'];

// Get Quick Move Ins Data
$quickMoveIns = getQuickMoveIns($qmi_id, null);
$quickMoveInsGallery = getQmiGallery($qmi_id);



// Get Floorplan Type
switch ($quickMoveIns[0]['listing_type']) {
    case 13: 
        $prop_type = [3150, "fp_townhomes"];
        break;
    case 14: $prop_type = [3151, "fp_condominiums"];
        break;
    case 15: $prop_type = [3152, "fp_single_family"];
        break;
    default:
        break;
}

// Get Featured Options
$featureOptions = getDbstParams(null, 'feature', 4);

$prop_features = array();

foreach ($featureOptions as $key => $option) {
    if($quickMoveIns[0][$option['table_column']] == 1) {

        $f_options = json_decode($option['options'], true);  
        $selected_options = array_filter(explode(",", $quickMoveIns[0][$option['table_column']."_options"]));   
        
        foreach ($selected_options as $key => $selected) {
            array_push($prop_features, $f_options['values'][$selected]['value']);
        }
    }
}

$floorplans = getJsonData($json_db_url.'floorplans.json');
$floorplanOptions = getDbstParams($prop_type[0], null, null);
// var_dump($floorplanOptions);

$floorplanOptions = json_decode($floorplanOptions[0]['options'], true);

foreach($floorplanOptions['params'] as $fpParams) {
    if($fpParams['key'] == $quickMoveIns[0][$prop_type[1]]) {
        $fpName = $fpParams['value'];
        break;
    }
}

consoleLog($fpParams); 

foreach ($floorplans['floorplanTypes'] as $fp_type) { 
    foreach ($fp_type['floorplans'] as $fp) {
        if($fp['name'] == $fpName) {
            $floorplan = $fp;
            break;
        }
    }
}

// Get Community Data
$community_options = json_decode($quickMoveIns[0]['community_options'], true);
$communityName = $community_options['params'][$quickMoveIns[0]['community_id']]['value'];
$communities = getJsonData($json_db_url.'communities.json');

foreach ($communities['communities'] as $key => $community) {
    if($community['name'] == $communityName) {
        $community = $community;
        break;
    }
}

// Assign Community FormId for Contact Modal
$formId = $community['formId'];
$gtagCategory = "Quick Move-Ins Form";
$qmi_address = $quickMoveIns[0]['street_number']." ".$quickMoveIns[0]['street_name'].", ".$quickMoveIns[0]['city'].", ".$states[$quickMoveIns[0]['state']]." ".$quickMoveIns[0]['zip'];
include_once(ROOT_PATH."includes/components/contactTodayModal.php");

// PageView
require ROOT_PATH."includes/components/visitorAnalytics/pageView.php";
$pv_id = $qmi_id;
checkUserIP($qmi_id, 'gka_quick_move_ins_view');
$totalView = getTotalStats($qmi_id, 'gka_quick_move_ins_view', false) + $qmi_id;
$totalSaved = getTotalStats($qmi_id, 'gka_quick_move_ins_view', true) + 11;

?>
<section class="nav-space z-depth-1 position-relative" style="z-index: 2;">
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12">
                <div class="my-3">
                    <h3 class="font-weight-bold m-0 text-center"><?php echo $quickMoveIns[0]['property_name']; ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="quick-move-ins-gallery" class="quick-move-ins-gallery">
    <div class="container-fluid max-lg-width-1140">
        <div class="row d-block position-relative">
            <div class="grid-gallery">
                <!-- Slider main container -->
                <div class="swiper-container quick-move-ins-slider-swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php 
                        if(sizeof($quickMoveInsGallery)) {
                        foreach ($quickMoveInsGallery as $key => $gal) { ?>
                        <div class="swiper-slide">
                            <div class="list-item">
                                <a data-fancybox="quickMoveInsGallery" data-caption="<?php echo $gal['item_title']; ?>"
                                    href="/cms-admin/wp-content/uploads/WPL/<?php echo $qmi_id; ?>/<?php echo $gal['gallery']; ?>">
                                    <img src="/cms-admin/wp-content/uploads/WPL/<?php echo $qmi_id; ?>/<?php echo $gal['gallery']; ?>"
                                        class="img-fluid w-100" alt="<?php echo $gal['item_desc']; ?>">
                                </a>
                            </div>
                        </div>
                        <?php }} else { ?>
                        <div class="swiper-slide">
                            <div class="list-item">
                                <a data-fancybox="quickMoveInsGallery" href="/images/comingsoonListing.jpg">
                                    <img src="/images/comingsoonListing.jpg" class="img-fluid w-100"
                                        alt="Coming soon placeholder">
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <a data-fancybox-trigger="community-slider" href="javascript:;"
                        class="btn custom-btn bg-l-blue text-white show-all-photos-btn font-weight-normal">SHOW ALL
                        PHOTOS</a>
                </div>
            </div>
            <?php if($quickMoveIns[0]['list_status']) { ?>
            <div id="list-status" class="bg-red">
                <?php echo $quickMoveIns[0]['list_status']; ?>
            </div>
            <?php } ?>

            <div class="d-flex align-self-end qmi-share-save z-depth-1">
                <div class="liked-container save-share d-flex align-items-center mr-3">
                    <button id="save-btn-<?php echo $quickMoveIns[0]['id']; ?>" class="list-card-save" type="button"
                        aria-label="Save" data-listid="<?php echo $quickMoveIns[0]['id']; ?>"
                        data-pageid="<?php echo $quickMoveIns[0]['id']; ?>" data-sqltable="gka_quick_move_ins_view">
                        <?php require ROOT_PATH."/images/icon/heart-blue.svg" ?>
                    </button>
                    <span class="text-l-blue d-none d-md-block">Save</span>
                </div>
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>"
                    onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
                    <div class="d-flex h-100 save-share">
                        <img src="/images/icon/share-blue.svg" alt="share icon">
                        <span class="text-l-blue ml-2 d-none d-md-block">Share</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="quick-move-ins-details">
    <div class="container">
        <div class="content py-2">
            <div class="details py-2">
                <h6><span class="price">$<?php echo number_format($quickMoveIns[0]['price']); ?></span>
                    <a href="/communities/<?php echo $community['url']; ?>/"
                        class="text-black"><?php echo $community['name']; ?></a></h6>
                <div class="spec d-flex align-items-center">
                    <div class="text-center d-flex">
                        <img src="/images/icon/bedrooms.svg" alt="bedroom icon">
                        <p><?php echo $quickMoveIns[0]['bedrooms']; ?> Beds</p>
                    </div>
                    <span class="seperator">|</span>
                    <div class="text-center d-flex">
                        <img src="/images/icon/bathrooms.svg" alt="bathroom icon">
                        <p><?php echo $quickMoveIns[0]['baths_full']; ?> full
                            <?php echo $quickMoveIns[0]['baths_half']; ?> half Baths</p>
                    </div>
                    <span class="seperator">|</span>
                    <div class="text-center d-flex">
                        <img src="/images/icon/sqfeet.svg" alt="Square feet icon">
                        <p><?php echo number_format($quickMoveIns[0]['sq_feet']); ?> Sq. Ft.</p>
                    </div>
                </div>
                <div class="pt-2">
                    <address class="font-weight-normal m-0"><?php echo $quickMoveIns[0]['street_number']; ?>
                        <?php echo $quickMoveIns[0]['street_name']; ?>, <?php echo $quickMoveIns[0]['city']; ?>,
                        <?php echo $states[$quickMoveIns[0]['state']]; ?> <?php echo $quickMoveIns[0]['zip']; ?>
                    </address>
                    <p><?php echo $quickMoveIns[0]['county']; ?></p>
                </div>
                <div class="d-flex pt-2">
                    <?php if($quickMoveIns[0]['virtual_tour']) { ?>
                    <div>
                        <a href="<?php echo $quickMoveIns[0]['virtual_tour']; ?>" target="_blank"
                            class="btn-rounded btn bg-l-blue custom-btn text-white mr-2">
                            <img src="/images/icon/360tour.svg" alt="360 tour icon"
                                style="width: 23px; margin-top: -3px;">
                            Virtual Tour
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($quickMoveIns[0]['video_tour']) { ?>
                    <div>
                        <a href="<?php echo $quickMoveIns[0]['video_tour']; ?>" target="_blank"
                            class="btn-rounded btn bg-l-blue custom-btn text-white mr-2">
                            <img src="/images/icon/youtube.svg" alt="360 tour icon"
                                style="width: 15px; margin-top: -3px;">
                            Video Tour
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($quickMoveIns[0]['image_tour']) { ?>
                    <div>
                        <a href="<?php echo $quickMoveIns[0]['image_tour']; ?>" target="_blank"
                            class="btn-rounded btn bg-l-blue custom-btn text-white mr-2">
                            <img src="/images/icon/imagetour.svg" alt="image tour icon"
                                style="width: 15px; margin-top: -3px;">
                            Model Tour
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <!-- THIS HAS BEEN HIDDEN FOR NOW --> 
            <div class="py-2">
                <div>
                    <a href="/floorplans/<?php echo $floorplan['url'] ?>">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="mb-1 text-l-blue font-weight-bold mr-3"><?php echo $fpName; ?> (Model Home)</h5>
                            <img src="/images/arrow-blue-right.svg" alt="Arrow Blue Right" class="Arrow right icon">
                        </div>
                    </a>
                    <?php if(sizeof($floorplan['fpVersions']) == 0 ) { ?>
                    <a target="_blank"
                        href="/floorplans/<?php echo $floorplan['url'] ?>/pdf/<?php echo $floorplan['pdf'] ?>"
                        class="btn-rounded btn bg-l-blue custom-btn text-white mr-2">
                        <img src="/images/icon/download.svg" alt="Download icon">
                        Floor Plan
                    </a>
                    <?php if($floorplan['3DTour']) { ?>
                    <a target="_blank" href="<?php echo $floorplan['3DTour']; ?>" class="mr-2">
                        <img src="/images/icon/floorplan-icon/360tour.svg" alt="360 Tour icon">
                    </a>
                    <?php } ?>
                    <?php if($floorplan['videoTour']) { ?>
                    <a data-fancybox="videoTour" href="<?php echo $floorplan['videoTour'] ?>" class="mr-2">
                        <img src="/images/icon/floorplan-icon/youtube.svg" alt="Youtube icon">
                    </a>
                    <?php } ?>
                    <?php for ($i=1; $i <= $floorplan['galNum']; $i++) { ?>
                    <a data-fancybox="fp-gallery"
                        href="/floorplans/<?php echo $floorplan['url'] ?>/images/main/slideShow<?php echo $i; ?>.jpg"
                        style="<?php echo ($i != 1) ? "display: none;" : ""; ?>">
                        <img src="/images/icon/floorplan-icon/gallery.svg" alt="gallery icon">
                    </a>
                    <?php } ?>
                    <?php } else { foreach ($floorplan['fpVersions'] as $fpVersion) {
                        if($fpVersion['galUrl'] == $community['url']) {
                    ?>
                    <a target="_blank"
                        href="/floorplans/<?php echo $floorplan['url'] ?>/pdf/<?php echo $fpVersion['pdf']; ?>"
                        class="btn-rounded btn bg-l-blue custom-btn text-white">
                        <img src="/images/icon/download.svg" alt="Download icon">
                        Floor Plan
                    </a>
                    <?php if($fpVersion['3DTour']) { ?>
                    <a target="_blank" href="<?php echo $fpVersion['3DTour']; ?>" class="mr-2">
                        <img src="/images/icon/floorplan-icon/360tour.svg" alt="360 Tour icon">
                    </a>
                    <?php } ?>
                    <?php if($fpVersion['videoTour']) { ?>
                    <a target="_blank" href="<?php echo $fpVersion['videoTour']; ?>" class="mr-2">
                        <img src="/images/icon/floorplan-icon/youtube.svg" alt="Youtube icon">
                    </a>
                    <?php } ?>
                    <?php for ($i=1; $i <= $fpVersion['galNum']; $i++) { ?>
                    <a data-fancybox="fp-gallery"
                        href="/floorplans/<?php echo $floorplan['url'] ?>/images/<?php echo $fpVersion['galUrl'] ?>/slideShow<?php echo $i; ?>.jpg"
                        style="<?php echo ($i != 1) ? "display: none;" : ""; ?>">
                        <img src="/images/icon/floorplan-icon/gallery.svg" alt="gallery icon">
                    </a>
                    <?php } ?>
                    <?php break; }}} ?>
                </div>
            </div>
            <hr>
            <div class="py-2 totalView">
                <div class="d-flex justify-content-center">
                    <div>
                        <?php require ROOT_PATH."/images/icon/views.svg" ?>
                        Views: <span class="font-weight-normal"><?php echo $totalView; ?></span>
                    </div>
                    <div class="mx-4">
                        <span>|</span>
                    </div>
                    <div>
                        <?php require ROOT_PATH."/images/icon/heart-black.svg" ?>
                        Saved: <span class="font-weight-normal"><?php echo $totalSaved; ?></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="py-2">
                <h5 class="mb-1 text-l-blue font-weight-bold">Contact Agent</h5>
                <div class="d-flex flex-wrap">
                    <div class="mr-5 mb-2">
                        <p><?php echo $quickMoveIns[0]['agent1_fname']; ?>
                            <?php echo $quickMoveIns[0]['agent1_lname']; ?>
                        </p>
                        <p><?php echo $quickMoveIns[0]['agent1_email']; ?></p>
                        <p><a class="text-black"
                                href="tel:<?php echo clean($quickMoveIns[0]['agent1_phone']); ?>"><?php echo phoneNumberFormat($quickMoveIns[0]['agent1_phone']); ?></a>
                        </p>
                    </div>
                    <?php if($quickMoveIns[0]['agent2_fname'] || $quickMoveIns[0]['agent2_lname']) { ?>
                    <div>
                        <p><?php echo $quickMoveIns[0]['agent2_fname']; ?>
                            <?php echo $quickMoveIns[0]['agent2_lname']; ?>
                        </p>
                        <p><?php echo $quickMoveIns[0]['agent2_email']; ?></p>
                        <p><a class="text-black"
                                href="tel:<?php echo clean($quickMoveIns[0]['agent2_phone']); ?>"><?php echo phoneNumberFormat($quickMoveIns[0]['agent2_phone']); ?></a>
                        </p>
                    </div>
                    <?php } ?>
                </div>

                <div class="mt-3 order-4 w-100">
                    <a href="#" class="btn bg-l-blue text-white d-block m-0 font-weight-bold" data-toggle="modal"
                        data-target="#contactToday">Contact Today</a>
                </div>
            </div>
            <hr>
            <div class="py-2">
                <h5 class="mb-1 text-l-blue font-weight-bold">Description</h5>
                <p>
                    <?php echo ($quickMoveIns[0]['description']) ? nl2br($quickMoveIns[0]['description']) : "Details on the Way"; ?>
                </p>
            </div>
            <hr>
            <div class="py-2">
                <h5 class="mb-1 text-l-blue font-weight-bold">Property Features</h5>
                <div class="row">
                    <?php
                    if($prop_features) {
                    foreach ($prop_features as $key => $feature) {
                    ?>
                    <p class="col-12"><?php echo $feature; ?></p>
                    <?php    
                        }
                    }
                    else { ?>
                    <p class="col-12">Stand By! Details Coming.</p>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once(ROOT_PATH."/includes/footer.php"); ?>
<script>
    initCookies({
        cookieName: "savedQuickMoveIns",
        listingID: "qmiWrap-"
    });
</script>