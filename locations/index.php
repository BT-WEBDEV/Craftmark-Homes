<?php include_once("../includes/header.php"); ?>
<?php 
include_once("../includes/backend/functions.php"); 
$communities = getJsonData($json_db_url.'communities.json');
$communityJsonString = json_encode($communities['communities'], true);

usort($communities['communities'], function($a, $b) { 
    return strcmp($a["name"], $b["name"]);
});

?>

<section id="" class="filter-section filter-desktop-layout">
    <div class="filter-container z-depth-1 fixed-top w-100">
        <?php include_once("../includes/components/listingFilter.php"); ?>
    </div>
</section>

<div class="map-list-desktop nav-filter-space">
    <!-- Modal Map -->
    <div class="modal fade bottom map-container" id="mapList" tabindex="-1" role="dialog" aria-labelledby="mapListLabel"
        aria-hidden="true" data-backdrop='false' style="z-index: 1040;">
        <div class="modal-dialog modal-fluid modal-bottom m-0" role="document">
            <div class="modal-content">
                <div class="position-relative">
                    <div id="google-map" class="google-map bg-white">
                    </div>
                </div>
                <div id="list-on-map" class="d-none">
                    <!-- Slider main container -->
                    <div class="swiper-container listing-on-map-swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php 
                                foreach ($communities['communities'] as $comm) { 
                                    if($comm['status'] != "sold") {  
                            ?>
                            <div class="swiper-slide">
                                <?php include("../includes/components/community/locationListV1.php"); ?>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="refresh" class="listing-container">
        <div class="container-fluid">
            <div id="filter-container" class="row">
                <?php foreach ($communities['communities'] as $key => $comm) { 
                    if($comm['status'] != "sold") {    
                ?>
                <div id="commWrap-<?php echo $comm['id']; ?>" class="col-12 col-sm-6 col-lg-12 bg-grey-gradient community-container <?php echo ($comm['status'] == "soldLabel") ? "order-12" : "order-2"; ?>"
                        style="<?php 
                            // echo ($comm['status'] == "soldLabel") ? "order: 99" : "order: 2"; 
                            switch ($comm['status']) {
                                case 'soldLabel':
                                    echo "order: 99";
                                    break;
                                case 'comingsoon':
                                    echo "order: 98";
                                    break;
                                default:
                                    echo "order: 2";
                                    break;
                            }
                            ?>"
                        data-county="<?php echo $comm['address']['county'] ?>" 
                        data-hometype="<?php echo $comm['homeType']; ?>"
                        data-price="<?php echo $comm['priceInfo']['price']; ?>"
                        data-version="locationListV2"
                        data-location="<?php echo $comm['address']['addresses'][0]['address']['city'], ", ", $comm['address']['addresses'][0]['address']['state'], ", USA"; ?>"
                        data-status="<?php echo $comm['status']; ?>">
                    <div class="py-4">
                        <?php include("../includes/components/community/locationListV2.php"); ?>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </section>
</div>

<div id="loader">
    <div class="flex-center">
        <img src="/images/icon/spinner.svg" alt="">
    </div>
</div>

<script>
    var communityJsonString = <?php echo $communityJsonString; ?>;
    // var communities = JSON.parse(communityJsonString.replace(/\n/g, "\\n"));

    var communities = communityJsonString;
    $(document).ready(function () {
        if ($('#mapList').is(':visible') && !getUrlVars()["county"] && !getUrlVars()["hometypes"] && !getUrlVars()["min_price"] && !getUrlVars()["max_price"]) {
            createCommunityMapMarkers(communities);
        }
        $('#map-list-switch').on('click',function(event){
            if(this.text != "MAP") {
                initMap();
                createCommunityMapMarkers(communities);
            }
        })
    });
</script>
<!-- GoogleMaps-API + Key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdCFDlE3fBLixVdjPQyqXlTI5xuK4M0-8&callback=initMap"></script>

<div class="infobox d-none">
    <a href="" class="cursor-pointer">
        <div>
            <!-- Slider main container -->
            <div class="swiper-container hero-slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <a href="/communities/clarksburg-town-center">
                            <div class="list-item">
                                <img src="/images/hero-slider/clarksburg-town-center-desktop.jpg"
                                    class="img-fluid w-100 d-none d-sm-block" alt="">
                                <img src="/images/hero-slider/clarksburg-town-center-mobile.jpg"
                                    class="img-fluid w-100 d-sm-none" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <h5 class="m-0 font-weight-normal">Crown</h5>
                <p>Luxury Townhomes</p>
                <p class="font-weight-bold">From the Mid $400s</p>
            </div>
        </div>
    </a>
</div>

<script>
    initCookies({
        cookieName: "savedCommunity",
        listingID: "commWrap-"
    });
</script>