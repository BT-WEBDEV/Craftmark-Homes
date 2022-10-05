<?php include_once("../includes/header.php"); ?>
<?php 
include_once("../includes/backend/functions.php"); 
$floorplans = getJsonData($json_db_url.'floorplans.json');

for ($i=0; $i < sizeof($floorplans['floorplanTypes']); $i++) { 

    usort($floorplans['floorplanTypes'][$i]['floorplans'], function($a, $b) { 
        return strcmp($a["name"], $b["name"]);
    });

    usort($floorplans['floorplanTypes'][$i]['floorplans'], function($a, $b) { 
        return $a['status'] == "live" ? -1 : 1;
    });    
}

?>
<div class="nav-space">
    <?php foreach ($floorplans['floorplanTypes'] as $fp_type) { ?>
    <section id="floorplans-townhomes-listing" class="py-4 bg-grey-gradient">
        <div class="container-fluid px-0">
            <div class="listing-header px-3 mb-2 d-flex align-items-center justify-content-between">
                <h6 class="font-weight-bold m-0"><?php echo $fp_type['header'] ?></h6>
                <a href="/floorplans/<?php echo $fp_type['type']; ?>/"
                    class="see-all-btn text-l-blue font-weight-normal d-flex align-items-center">
                    <p>See All</p>
                    <img src="/images/arrow-blue-right.svg" alt="" class="ml-2 ml-md-3">
                </a>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container mobile-single-swiper-container pl-sm-3">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php 
                foreach ($fp_type['floorplans'] as $fp) {
                    if($fp['status'] == "live" || $fp['status'] == "sold") {
                ?>
                    <div class="swiper-slide py-3">
                        <div class="z-depth-1 h-100 bg-white list-wrap">
                            <?php include("../includes/components/floorplan/floorplanListV2.php"); ?>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-next">
                    <img src="/images/arrow-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="/images/arrow-left.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</div>

<?php include_once("../includes/footer.php"); ?>