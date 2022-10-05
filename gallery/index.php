<?php include_once("../includes/header.php"); ?>

<?php
include_once("../includes/backend/functions.php"); 
$galleries = getJsonData($json_db_url.'gallery.json');
$featured = getJsonData($json_db_url.'featured.json');
?>

<div class="nav-space"></div>
<section id="home-featured-list" class="py-3 bg-grey-gradient">
    <div class="container-fluid px-0">
        <div class="listing-header px-3 mb-2 d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold m-0">Video Highlights</h6>
        </div>
        <!-- Slider main container -->
        <div class="swiper-container featured-swiper-container pl-sm-3" style="position:relative !important;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php 
                foreach ($featured['featured'] as $featured) { ?>
                <div class="swiper-slide">
                    <?php include("../includes/components/featuredList.php"); ?>
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
<?php 
foreach ($galleries['gallery'] as $gallery) { ?>
<section class="py-3 bg-grey-gradient">
    <div class="container-fluid px-0">
        <div class="listing-header px-3 mb-2 d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold m-0"><?php echo $gallery['name']; ?></h6>
            <!-- <a href="" class="see-all-btn text-l-blue font-weight-normal d-flex align-items-center">
                <p>See All</p>
                <img src="/images/arrow-blue-right.svg" alt="arrow right icon" class="ml-2 ml-md-3">
            </a> -->
        </div>
        <!-- Slider main container -->
        <div class="swiper-container mobile-single-swiper-container pl-sm-3">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php 
                for ($i = sizeof($gallery['photos']) - 1; $i >= 0; $i--) { ?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="global-list-style">
                        <div class="image image-round">
                            <a href="/gallery/images/<?php echo $gallery['url']; ?>/image<?php echo $gallery['photos'][$i][0]; ?>.jpg"
                                data-fancybox="<?php echo $gallery['url']; ?>">
                                <img src="/gallery/images/<?php echo $gallery['url']; ?>/image<?php echo $gallery['photos'][$i][0]; ?>.jpg"
                                    alt="<?php echo $gallery['photos'][$i][2]; ?>" class="img-fluid w-100" data-size="1800x1200">
                            </a>
                        </div>
                        <!-- <div class="content-box">
                            <div class="header">
                                <h6 class="m-0 font-weight-normal">
                                    <?php echo $gallery['photos'][$i][1]; ?>
                                </h6>
                            </div>
                            <div class="content">
                                <div class="spec d-flex flex-wrap align-items-center">
                                    <p><?php echo $gallery['photos'][$i][2]; ?></p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-next">
                <img src="/images/arrow-right.svg" alt="Arrow right icon">
            </div>
            <div class="swiper-button-prev">
                <img src="/images/arrow-left.svg" alt="Arro left icon">
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php include_once(ROOT_PATH."/includes/footer.php"); ?>