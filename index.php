<?php 
$d_block = "d-block";
include_once("includes/header.php"); 
?>
<?php 
include_once("includes/backend/db_connection.php");
include_once("includes/backend/functions.php"); 
$floorplans = getJsonData($json_db_url.'floorplans.json');
$communities = getJsonData($json_db_url.'communities.json');
$featured = getJsonData($json_db_url.'featured.json');
$quickMoveIns = getQuickMoveIns(null, null, null);
?>

<section id="home-slider" class="nav-space">
    <!-- Slider main container -->
    <div class="swiper-container hero-slider">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            
            <!-- Slides -->
            <div class="swiper-slide">
                <a href="/communities/crown">
                    <div class="list-item">
                        <img src="/images/hero-slider/crown-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="Elevator Townhomes in Gaithersburg, MD, Crown by Craftmark Homes">
                        <img src="/images/hero-slider/crown-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="Elevator Townhomes in Gaithersburg, MD, Crown by Craftmark Homes">
                    </div>
                </a>
            </div>
            <!-- Slides -->
            <div class="swiper-slide">
                <a href="/communities/cabin-branch">
                    <div class="list-item">
                        <img src="/images/hero-slider/cabin-branch-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="The Village at Cabin Branch by Craftmark Homes">
                        <img src="/images/hero-slider/cabin-branch-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="The Village at Cabin Branch by Craftmark Homes">
                    </div>
                </a>
            </div>
            <!-- Slides -->
            <div class="swiper-slide">
                <a href="/communities/retreat-at-westfields">
                    <div class="list-item">
                        <img src="/images/hero-slider/retreat-at-westfields-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="The Retreat at Westfields by Craftmark Homes">
                        <img src="/images/hero-slider/retreat-at-westfields-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="The Retreat at Westfields by Craftmark Homes">
                    </div>
                </a>
            </div>
            <!-- Slides -->
            <div class="swiper-slide">
                <a href="/communities/darnestown-station">
                    <div class="list-item">
                        <img src="/images/hero-slider/darnestown-station-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="Single Family Homes for Sale, Darnestown Station by Craftmark Homes">
                        <img src="/images/hero-slider/darnestown-station-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="Single Family Homes for Sale, Darnestown Station by Craftmark Homes">
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="/communities/watershed">
                    <div class="list-item">
                        <img src="/images/hero-slider/watershed-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="Watershed | New Townhomes for Sale in Laurel County, MD">
                        <img src="/images/hero-slider/watershed-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="Watershed | New Townhomes for Sale in Laurel County, MD">
                    </div>
                </a>
            </div>
            <!-- Slides -->
            <div class="swiper-slide">
                <a href="/communities/clarksburg-town-center">
                    <div class="list-item">
                        <img src="/images/hero-slider/clarksburg-town-center-desktop.jpg"
                            class="img-fluid w-100 d-none d-sm-block"
                            alt="2-Car Garage Townhomes in Montgomery County, MD, Clarksburg Town Center by Craftmark Homes">
                        <img src="/images/hero-slider/clarksburg-town-center-mobile.jpg"
                            class="img-fluid w-100 d-sm-none"
                            alt="2-Car Garage Townhomes in Montgomery County, MD, Clarksburg Town Center by Craftmark Homes">
                    </div>
                </a>
            </div>
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/mateny-hill">
                    <div class="list-item">
                        <img src="/images/hero-slider/mateny-hill-desktop.jpg" class="img-fluid w-100 d-none d-sm-block"
                            alt="Luxury Townhomes in Germantown, MD, Mateny Hill by Craftmark Homes">
                        <img src="/images/hero-slider/mateny-hill-mobile.jpg" class="img-fluid w-100 d-sm-none" alt="Luxury Townhomes in Germantown, MD, Mateny Hill by Craftmark Homes">
                    </div>
                </a>
            </div> -->
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/preserve-at-westfields">
                    <div class="list-item">
                        <img src="/images/hero-slider/preserver-at-westfield-desktop.jpg"
                            class="img-fluid w-100 d-none d-sm-block" alt="New Townhomes in Chantilly, Fairfax County, VA, Preserve at Westfield by Craftmark Homes">
                        <img src="/images/hero-slider/preserver-at-westfield-mobile.jpg"
                            class="img-fluid w-100 d-sm-none" alt="New Townhomes in Chantilly, Fairfax County, VA, Preserve at Westfield by Craftmark Homes">
                    </div>
                </a>
            </div> -->
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/primrose-hill-th">
                    <div class="list-item">
                        <img src="/images/hero-slider/primrose-hill-desktop.png"
                            class="img-fluid w-100 d-none d-sm-block" alt="Luxury Townhomes in Annapolis, MD, Primrose Hill by Craftmark Homes">
                        <img src="/images/hero-slider/primrose-hill-mobile.png" class="img-fluid w-100 d-sm-none"
                            alt="Luxury Townhomes in Annapolis, MD, Primrose Hill by Craftmark Homes">
                    </div>
                </a>
            </div> -->
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/primrose-hill-sf">
                    <div class="list-item">
                        <img src="/images/hero-slider/primrose-hill-sf-desktop.jpg"
                            class="img-fluid w-100 d-none d-sm-block" alt="Single Family Homes in Annapolis, MD, Primrose Hill by Craftmark Homes">
                        <img src="/images/hero-slider/primrose-hill-sf-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="Single Family Homes in Annapolis, MD, Primrose Hill by Craftmark Homes">
                    </div>
                </a>
            </div> -->
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/reserve-at-black-rock">
                    <div class="list-item">
                        <img src="/images/hero-slider/reserve-at-black-rock-desktop.jpg"
                            class="img-fluid w-100 d-none d-sm-block"
                            alt="Custom Homesites in Montgomery County, MD, The Reserve at Black Rock by Craftmark Homes">
                        <img src="/images/hero-slider/reserve-at-black-rock-mobile.jpg"
                            class="img-fluid w-100 d-sm-none"
                            alt="Custom Homesites in Montgomery County, MD, The Reserve at Black Rock by Craftmark Homes">
                    </div>
                </a>
            </div> -->
            <!-- Slides -->
            <!-- <div class="swiper-slide">
                <a href="/communities/burnt-pine-estates">
                    <div class="list-item">
                        <img src="/images/hero-slider/burnt-pine-estates-desktop.jpg"
                            class="img-fluid w-100 d-none d-sm-block"
                            alt="Custom Homesites in Fairfax County, VA, Burnt Pine Estates by Craftmark Homes">
                        <img src="/images/hero-slider/burnt-pine-estates-mobile.jpg" class="img-fluid w-100 d-sm-none"
                            alt="Custom Homesites in Fairfax County, VA, Burnt Pine Estates by Craftmark Homes">
                    </div>
                </a>
            </div> -->
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-next">
            <img src="/images//arrow-right.svg" alt="">
        </div>
        <div class="swiper-button-prev">
            <img src="/images//arrow-left.svg" alt="">
        </div>
    </div>
</section>

<div class="d-flex flex-column">
    <section id="home-featured-list" class="position-relative order-1 order-md-2">
        <div class="container-fluid swiper-padding">
            <h3 class="font-weight-normal mb-3 px-md-20">Video Highlights</h3>
            <div id="notify" class="notify d-flex justify-content-center align-items-end">
                <div>
                    <a href="#" id="highlight-close">
                        <img src="/images/icon/close.svg" alt="close" class="close">
                    </a>
                    <div class="text">
                        <h3 class="text-white">See our <br> NEW video!</h3>
                    </div>
                    <div>
                        <img src="/images/icon/arrow-new.svg" alt="arrow" class="arrow">
                    </div>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container featured-swiper-container px-md-20">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                    foreach ($featured['featured'] as $featured) {
                    if($featured['status'] == "home") {
                    ?>
                    <div class="swiper-slide">
                        <?php include("includes/components/featuredList.php"); ?>
                    </div>
                    <?php } } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images//arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images//arrow-left.svg" alt="">
                </div>
            </div>
        </div>
        <!-- <div class="position-absolute bg-grey"></div> -->
    </section>

    <section id="home-who-we-are" class="order-2 order-md-1">
        <div class="container">
            <div class="content">
                <h1 class="font-weight-normal font-weight-md-bold">WHO WE ARE</h1>
                <p>
                    Craftmark Homes is a family-owned company that embraces a culture of giving back while moving
                    forward.
                    We don’t answer to shareholders. Rather, we answer to our customers. And ourselves. Experience the
                    Craftmark difference for yourself in one of our exceptional communities.
                </p>
            </div>
        </div>
    </section>

    <section id="home-community-list" class="order-3 bg-grey">
        <div class="container-fluid swiper-padding">
            <div class="d-flex align-items-center justify-content-between pr-15 px-md-20">
                <h3 class="font-weight-normal m-0">Locations</h3>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container home-listing-swiper-v2 px-md-20">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                    foreach ($communities['communities'] as $comm) { 
                        if($comm['status'] != "sold" && $comm['status'] != "soldLabel" && $comm['url'] != 'coming-soon') {
                        ?>
                    <div class="swiper-slide">
                        <div class="my-3">
                            <?php include("includes/components/community/locationListV1.php"); ?>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images//arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images//arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="home-quick-move-in-list" class="order-4 bg-grey">
        <div class="container-fluid swiper-padding">
            <div class="d-flex align-items-center justify-content-between px-md-20">
                <h3 class="font-weight-normal m-0">Quick Move-In Homes</h3>
            </div>

            <!-- Slider main container -->
            <div class="swiper-container home-listing-swiper-v1 px-md-20 pr-md-0">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                foreach ($quickMoveIns as $qmi) { 
                ?>
                    <div class="swiper-slide py-3">
                        <div class="z-depth-1 bg-white h-100">
                            <?php include("includes/components/quickMoveIns/quickMoveInsListV1.php"); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images//arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images//arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="home-galery" class="order-5 bg-blue">
        <div class="container-fluid swiper-padding">
            <div class="d-flex align-items-center justify-content-between px-md-20">
                <h3 class="text-white font-weight-normal m-0">Gallery</h3>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container gallery-swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                    $gallery = [
                        ["exteriors", 1, "Exteriors Gallery, New Homes in Maryland, Virginia, Washington D.C."], 
                        ["kitchens", 1, "Kitchens Gallery, New Homes in Maryland, Virginia, Washington D.C."], 
                        ["bedrooms", 1, "Bedrooms Gallery, New Homes in Maryland, Virginia, Washington D.C."], 
                        ["bathrooms", 1, "Bathrooms Gallery, New Homes in Maryland, Virginia, Washington D.C."], 
                        ["living-spaces", 1, "Living Spaces Gallery, New Homes in Maryland, Virginia, Washington D.C."], 
                        ["outdoor-living-spaces", 1, "Outdoor Living Spaces Gallery, New Homes in Maryland, Virginia, Washington D.C."]
                    ];
                    foreach ($gallery as $key => $gal) { ?>
                    <div class="swiper-slide">
                        <div class="z-depth-1 my-3">
                            <?php include("includes/components/galleryList.php"); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images//arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images//arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="home-floorplans-listings" class="order-6 bg-grey">
        <div class="container-fluid swiper-padding">
            <div class="d-flex align-items-center justify-content-between px-md-20">
                <h3 class="font-weight-normal m-0">Floor Plans</h3>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container home-listing-swiper-v1">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                foreach ($floorplans['floorplanTypes'] as $fp_type) { 
                    foreach ($fp_type['floorplans'] as $fp) { 
                        if($fp['status'] == "live") { ?>
                    <div class="swiper-slide h-auto d-flex">
                        <div class="z-depth-1 my-3 bg-white">
                            <?php include("includes/components/floorplan/floorplanListV1.php"); ?>
                        </div>
                    </div>
                    <?php }}} ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images//arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images//arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="home-custom-properties" class="order-7 bg-grey">
        <div class="container-fluid py-3 py-md-4">
            <div class="custom-properties home-callout-section align-items-end d-flex">
                <div class="content-wrap d-flex w-100">
                    <div class="content flex-grow-1">
                        <h1>BUILD ON YOUR LOT</h1>
                        <p>Live where you want to live. Fully personalize our popular designs on your own lot.</p>
                    </div>
                    <div>
                        <a href="/custom" class="m-0 btn custom-btn">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --> 

    <section id="home-we-buy-land" class="order-8 bg-grey">
        <div class="container-fluid py-3 py-md-4">
            <div class="we-buy-land home-callout-section align-items-end d-flex">
                <div class="content-wrap d-flex w-100">
                    <div class="content flex-grow-1">
                        <h1>WE BUY LAND</h1>
                        <p>Craftmark's land entitlement and development services rate second to none. We take the hassle
                            out
                            of selling your property.</p>
                    </div>
                    <div>
                        <a href="/we-buy-land" class="m-0 btn custom-btn">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL POP UP - HOME PAGE  -->
<!-- <section>
    <div class="modal animated fadeIn" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a target="_blank" href="tel:17035076882">
                    <img src="/images/popup/02422-CMH-WebEdits-Web-CMH-PopUp-HOME.jpg"
                        alt="The Retreat at Westfields Model Grand Opening" class="img-fluid w-100">
                </a>
            </div>
        </div>
    </div>
</section> --> 

<?php include_once("includes/footer.php"); ?>