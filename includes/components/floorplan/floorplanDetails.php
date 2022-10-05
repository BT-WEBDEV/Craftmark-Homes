<?php
// FloorPlan Details
$floorplans = getJsonData($json_db_url.'floorplans.json');
$communities = getJsonData($json_db_url.'communities.json');
$quickMoveIns = getQuickMoveIns(null, null, null);

$url_path = explode('/', $_SERVER['REQUEST_URI']);

foreach ($floorplans['floorplanTypes'] as $fpType) {
    foreach ($fpType['floorplans'] as $fp) {
        if($fp['url'] == $url_path[2]) {
            $floorplan = $fp;
            $floorplan['type'] = $fpType['type'];
        }
    }
}

$available_com = [];
foreach ($communities['communities'] as $community) {
    foreach ($community['floorplans'] as $com_fp) {
        if($com_fp['fpUrl'] == $url_path[2]) {
            if(sizeof($floorplan['fpVersions']) != 0) {
                foreach ($floorplan['fpVersions'] as $fpVersion) {
                    if($fpVersion['galUrl'] == $community['url']) {
                        $videoTour = $fpVersion['videoTour'];
                        $ThreeDTour = $fpVersion['3DTour'];
                        $pdf = $fpVersion['pdf'];
                        $url = $community['url'];
                        $gallery = $community['url'];
                    }
                }
            } else {
                $videoTour = $floorplan['videoTour'];
                $ThreeDTour = $floorplan['3DTour'];
                $pdf = $floorplan['pdf'];
                $url = $community['url'];
                $gallery = "main";
            }
            $comm = array (
                "communityName" => $community['name'],
                "model" => $com_fp['model'],
                "url" => $url,
                "videoTour" => $videoTour,
                "3DTour" => $ThreeDTour,
                "pdf" => $pdf,
                "gallery" => $gallery,
            );
            array_push($available_com, $comm);
        }
    }
}

$bedrooms = $floorplan['specs']['beds']['min'];
if ( $floorplan['specs']['beds']['max'] != "" ) {
    $bedrooms = $bedrooms . "-" . $floorplan['specs']['beds']['max'];
}

$bathrooms = $floorplan['specs']['fullBaths']['min'];
if ( $floorplan['specs']['fullBaths']['max'] != "" ) {
    $bathrooms = $bathrooms . "-" . $floorplan['specs']['fullBaths']['max'];
}

if ( $floorplan['specs']['halfBaths']['min'] != "" ) {
    $bathrooms = $bathrooms . "F " . $floorplan['specs']['halfBaths']['min'];
    if ( $floorplan['specs']['halfBaths']['max'] != "" ) {
        $bathrooms = $bathrooms . "-" . $floorplan['specs']['halfBaths']['max'] . "H";
    } else {
        $bathrooms = $bathrooms . "H";
    }
}    

$garages = $floorplan['specs']['garage']['min'];
if ( $floorplan['specs']['garage']['max'] != "" ) {
    $garages = $garages . "-" . $floorplan['specs']['garage']['max'];
}

// PageView
require ROOT_PATH."includes/components/visitorAnalytics/pageView.php";
$pv_path = $url_path[1]. "/" .$url_path[2];
checkUserIP($pv_path, 'gka_floorplan_view');
$totalView = getTotalStats($pv_path, 'gka_floorplan_view', false) + 376;

?>

<section class="nav-space z-depth-1 position-relative" style="z-index: 2;">
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12">
                <div class="my-3">
                    <h3 class="font-weight-bold m-0 text-center"><?php echo $floorplan['name']; ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="floorplan-slider" class="grid-gallery">
    <div class="container-fluid p-0">
        <?php if(sizeof($floorplan['fpVersions']) != 0) { ?>
        <ul class="nav md-pills hover-tab floorplan-pills custom-pills z-depth-1">
            <?php foreach ($floorplan['fpVersions'] as $key => $version) { ?>
            <li class="nav-item flex-fill">
                <a class="nav-link <?php echo ($key == 0) ? "active" : ""; ?> justify-content-center" data-toggle="tab"
                    href="#<?php echo $version['galUrl'] ?>" role="tab">
                    <p><?php echo $version['versionName'] ?></p>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content p-0">
            <?php foreach ($floorplan['fpVersions'] as $key => $version) { ?>
            <!--Gallery pane-->
            <div class="tab-pane fade <?php echo ($key == 0) ? "in show active" : ""; ?>"
                id="<?php echo $version['galUrl'] ?>" role="tabpanel">
                <!-- Slider main container -->
                <div id="<?php echo $version['galUrl'] ?>-fp-gallery"
                    class="swiper-container community-slider-swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php foreach ($version['gallery'] as $key => $vGallery) { ?>
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="list-item">
                                <a href="/floorplans/<?php echo $floorplan['url'] ?>/images/<?php echo $version['galUrl'] ?>/slideShow<?php echo $vGallery[0]; ?>.jpg"
                                    data-fancybox="floorplan-<?php echo $version['galUrl'] ?>-gallery"
                                    data-caption="<?php echo $vGallery[1]; ?>">
                                    <img src="/floorplans/<?php echo $floorplan['url'] ?>/images/<?php echo $version['galUrl'] ?>/slideShow<?php echo $vGallery[0]; ?>.jpg"
                                        alt="<?php echo $vGallery[2]; ?>">
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <a data-fancybox-trigger="floorplan-<?php echo $version['galUrl'] ?>-gallery" href="javascript:;"
                        class="btn custom-btn bg-l-blue text-white show-all-photos-btn font-weight-normal">SHOW ALL
                        PHOTOS</a>
                </div>
            </div>
            <!--/.Gallery pane-->
            <?php } ?>
        </div>
        <?php } else { ?>
        <div>
            <!-- Slider main container -->
            <div id="fp-gallery-single" class="swiper-container community-slider-swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php foreach ($floorplan['gallery'] as $key => $gallery) { ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="list-item">
                            <a href="/floorplans/<?php echo $floorplan['url'] ?>/images/main/slideShow<?php echo $gallery[0]; ?>.jpg"
                                data-fancybox="floorplan-main-gallery" data-caption="<?php echo $gallery[1]; ?>">
                                <img src="/floorplans/<?php echo $floorplan['url'] ?>/images/main/slideShow<?php echo $gallery[0]; ?>.jpg"
                                    alt="<?php echo $gallery[2]; ?>">
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <a data-fancybox-trigger="floorplan-main-gallery" href="javascript:;"
                    class="btn custom-btn bg-l-blue text-white show-all-photos-btn font-weight-normal">SHOW ALL
                    PHOTOS</a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section>
    <div class="container fp-specs-container">
        <div class="details row m-0 align-items-center">
            <?php foreach ($floorplan['details'] as $details) { ?>
            <div class="detail-item d-flex align-items-center">
                <p><?php echo $details ?></p>
                <span class="seperator">|</span>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="spec-item col-6 order-2 d-flex align-items-center">
                <img src="/images/icon/bedrooms.svg" alt="Bedroom">
                <!-- <p><?php echo $floorplan['specs']['beds'] ?> Bedrooms</p> -->
                <p><?php echo $bedrooms; ?> Bedrooms</p>
            </div>
            <div class="spec-item col-6 order-3 d-flex align-items-center">
                <img src="/images/icon/bathrooms.svg" alt="Bathrooms">
                <!-- <p><?php echo $floorplan['specs']['baths'] ?> Baths</p> -->
                <p><?php echo $bathrooms ?> Baths</p>
            </div>
            <div class="spec-item col-6 order-4 d-flex align-items-center">
                <img src="/images/icon/garage.svg" alt="Garage">
                <!-- <p><?php echo $floorplan['specs']['garage'] ?>-Car Garage</p> -->
                <p><?php echo $garages ?>-Car Garage</p>
            </div>
            <div class="spec-item sqFeet col-6 order-1 d-flex align-items-center">
                <p class="text-l-blue font-weight-bold"><?php echo $floorplan['specs']['sqFeetLabel'] ?>
                    <?php echo $floorplan['specs']['sqFeet'] ?> Sq. Ft.</p>
            </div>
        </div>
        <?php if (sizeof($available_com) == 0) { ?>
        <div class="row mt-3">
            <!-- NEW DESIGN -->
            <div class="col-12 fp-spec-icons text-right">
                <div class="row">
                    <?php if ($floorplan['3DTour']) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a target="_blank" href="<?php echo $floorplan['3DTour'] ?>" class="btn custom-btn">
                            <div class="d-flex align-items-center">
                                <img src="/images/icon/floorplan-icon/3d-walkthrough.svg" alt="" class="icon">
                                <div class="btn-text text-center">3D WALKTHROUGH</div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if ($floorplan['videoTour']) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a data-fancybox="" href="<?php echo $floorplan['videoTour'] ?>" class="btn custom-btn">
                            <div class="d-flex align-items-center">
                                <img src="/images/icon/floorplan-icon/watch-video.svg" alt="" class="icon">
                                <div class="btn-text text-center">WATCH VIDEO</div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if ($floorplan['pdf']) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a target="_blank" href="pdf/<?php echo $floorplan['pdf'] ?>" class="btn custom-btn">
                            <div class="d-flex align-items-center">
                                <img src="/images/icon/floorplan-icon/floor-plans.svg" alt="" class="icon">
                                <div class="btn-text text-center">FLOOR PLANS</div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a data-fancybox-trigger="floorplan-main-gallery" href="javascript:;" class="btn custom-btn">
                            <div class="d-flex align-items-center">
                                <img src="/images/icon/floorplan-icon/photo-gallery.svg" alt="" class="icon">
                                <div class="btn-text text-center">PHOTO GALLERY</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- NEW DESIGN -->
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12 totalView">
                <div class="text-center">
                    <div>
                        <?php require ROOT_PATH."/images/icon/views.svg" ?>
                        Views: <span class="font-weight-normal"><?php echo $totalView; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container fp-available-at py-2">
        <h4 class="font-weight-bold">AVAILABLE AT:</h4>
        <div class="row">
            <?php 
            if (sizeof($available_com) != 0) {
            foreach ($available_com as $comm) { ?>
            <!-- NEW DESIGN -->
            <div class="col-md-6">
                <div class="d-flex flex-wrap available-community">
                    <div class="col-lg-6">
                        <a href="/communities/<?php echo $comm['url'] ?>/">
                            <div class="view overlay cursor-pointer mb-3 mb-lg-0">
                                <img src="/communities/<?php echo $comm['url'] ?>/images/listingImg-v1.png" alt=""
                                    class="img-fluid w-100">
                                <div class="mask flex-center">
                                    <p class="white-text font-weight-bold">VISIT</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 fp-spec-icons text-right">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <?php if ($comm['3DTour']) { ?>
                            <div>
                                <a target="_blank" href="<?php echo $comm['3DTour']; ?>" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/3d-walkthrough.svg" alt="" class="icon">
                                        <div class="btn-text text-center">3D WALKTHROUGH</div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if ($comm['videoTour']) { ?>
                            <div>
                                <a data-fancybox href="<?php echo $comm['videoTour']; ?>" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/watch-video.svg" alt="" class="icon">
                                        <div class="btn-text text-center">WATCH VIDEO</div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if ($comm['pdf']) { ?>
                            <div>
                                <a target="_blank" href="pdf/<?php echo $comm['pdf']; ?>" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/floor-plans.svg" alt="" class="icon">
                                        <div class="btn-text text-center">FLOOR PLANS</div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <div>
                                <a data-fancybox-trigger="floorplan-<?php echo $comm['gallery'] ?>-gallery"
                                    href="javascript:;" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/photo-gallery.svg" alt="" class="icon">
                                        <div class="btn-text text-center">PHOTO GALLERY</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NEW DESIGN -->
            <?php } } else if($floorplan['customProperties']) { ?>
            <div class="col-md-6">
                <div class="d-flex flex-wrap available-community">
                    <div class="col-lg-6">
                        <a href="/custom/">
                            <div class="view overlay cursor-pointer mb-3 mb-lg-0">
                                <img src="/custom/images/listingImg.png" alt="Custom Properties"
                                    class="img-fluid w-100">
                                <div class="mask flex-center">
                                    <p class="white-text font-weight-bold">VISIT</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 fp-spec-icons text-right">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div>
                                <a target="_blank" href="pdf/<?php echo $floorplan['pdf']; ?>" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/floor-plans.svg" alt="" class="icon">
                                        <div class="btn-text text-center">FLOOR PLANS</div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a data-fancybox-trigger="floorplan-main-gallery"
                                    href="javascript:;" class="btn custom-btn">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/floorplan-icon/photo-gallery.svg" alt="" class="icon">
                                        <div class="btn-text text-center">PHOTO GALLERY</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-12">
                <div>
                    <h4 class="text-l-blue font-weight-normal">Currently not available</h4>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container py-2">
        <h4 class="font-weight-bold">Ready to move? Buy it now!</h4>
        <div class="row">
            <?php 
            $qmiList = false;
            foreach ($quickMoveIns as $qmi) {
                switch ($qmi['listing_type']) {
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
                
                $floorplanOptions = getDbstParams($prop_type[0], null, null);
                $floorplanOptions = json_decode($floorplanOptions[0]['options'], true);
                $fpName =  $floorplanOptions['params'][$qmi[$prop_type[1]]]['value'];
                
                if($fpName == $floorplan['name']) {
                $qmiList = true;
            ?>
            <div id="qmiWrap-<?php echo $qmi['id']; ?>" class="col-lg-4 col-sm-6 py-3">
                <div class="z-depth-1 bg-white h-100">
                    <?php include(ROOT_PATH."includes/components/quickMoveIns/quickMoveInsListV1.php"); ?>
                </div>
            </div>
            <?php }} if(!$qmiList) { ?>
            <div class="col-12">
                <div>
                    <h4 class="text-l-blue font-weight-normal">We're busy building!</h4>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>