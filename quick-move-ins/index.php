<?php 
include_once("../includes/header.php"); 
$quickMoveIns = getQuickMoveIns(null, null, null);
$quickObj = array();

foreach ($quickMoveIns as $key => $prop) {
    $prop_loc = array(
        "name" => $prop['property_name'],
        "homeType" => getQuickMoveInsListingType($prop['listing_type']),
        "google_lat" => $prop['google_lat'],
        "google_long" => $prop['google_long'],
        "c_lat" => $prop['c_lat'],
        "c_long" => $prop['c_long'],
        "url" => "/cms-admin/wp-content/uploads/WPL/".$prop['id']."/".$prop['gallery'],
        "price" => number_format($prop['price']),
        "id" => $prop['id'],
        "county" => $prop['county']
    );

    array_push($quickObj, $prop_loc);
}

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
            </div>
        </div>
    </div>
    <section class="listing-container">
        <div class="container-fluid">
            <div id="filter-container" class="row">
                <?php 
                foreach ($quickMoveIns as $qmi) { 
                ?>
                <div id="qmiWrap-<?php echo $qmi['id']; ?>" class="col-lg-12 col-sm-6 py-3 bg-grey-gradient quick-move-ins-container order-2"
                        data-county="<?php echo $qmi['county'] ?>" 
                        data-hometype="<?php echo getQuickMoveInsListingType($qmi['listing_type']); ?>"
                        data-price="<?php echo substr($qmi['price'], 0, -3); ?>">
                    <?php include("../includes/components/quickMoveIns/quickMoveInsListV2.php"); ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </section>
</div>

<div id="loader">
    <div class="flex-center">
        <img src="/images/icon/spinner.svg" alt="spinner icon">
    </div>
</div>

<script>
    var quickMoveIns = JSON.parse('<?php echo json_encode($quickObj, true); ?>');
    $(document).ready(function () {
        if ($('#mapList').is(':visible')) {
            creatQuickMoveInsMapMarkers(quickMoveIns);
        }
        
        $('#map-list-switch').on('click', function (event) {
            if (this.text != "MAP") {
                creatQuickMoveInsMapMarkers(quickMoveIns);
            }
        })
    });
</script>
<!-- GoogleMaps-API + Key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdCFDlE3fBLixVdjPQyqXlTI5xuK4M0-8&callback=initMap"></script>

<script>
    initCookies({
        cookieName: "savedQuickMoveIns",
        listingID: "qmiWrap-"
    });
</script>