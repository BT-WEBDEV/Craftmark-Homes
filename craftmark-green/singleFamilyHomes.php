<!-- Slider main container -->
<div class="swiper-container hero-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/singlefamily/SF-cutaway-efficiency.jpg" class="img-fluid w-100" alt="Energy-Efficient Single Family Homes, Craftmark Green Model">
            </div>
        </div>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/singlefamily/SF-cutaway-energy.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/singlefamily/SF-cutaway.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
<div class="p-3 home-type-slider-content px-lg-5">
    <div class="content">
        <h2 class="font-weight-bold">LEADING BY EXAMPLE</h2>
        <p>Our emphasis on Green Building is the right thing to do for environmental sensitivity, support of global
            warming initiatives, and to lessen the dependence on foreign oil. Our dedication to efficient home energy
            usage produces lower utility costs and higher quality for added home value. We are constantly improving
            every home we build with enhanced energy efficiency for every homeowner. Here are just a few reasons why
            Craftmark is simply a better brand of single family home:</p>
    </div>
</div>

<div class="p-3 max-md-width-760">
    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="craftmark-green-accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($singleFamilyHomes as $key => $content) { ?>
        <!-- Accordion card -->
        <div class="card">

            <!-- Card header -->
            <div class="card-header" role="tab"
                <?php echo ($key ==0) ? "style='border-top: 1px solid rgba(0,0,0,.125);'" : ""; ?>>
                <a data-toggle="collapse" href="#singleFamilyAccordion<?php echo $key; ?>">
                    <div class="d-flex justify-content-between text-black">
                        <h5 class="mb-0"><?php echo $content[0]; ?></h5>
                        <img src="/images/icon/arrow-down-blue.svg" alt="arrow blue icon">
                    </div>
                </a>
            </div>

            <!-- Card body -->
            <div id="singleFamilyAccordion<?php echo $key; ?>" class="collapse <?php echo ($key ==0) ? "show" : ""; ?>">
                <div class="card-body p-0 py-3">
                    <?php echo $content[1]; ?>
                </div>
            </div>

        </div>
        <!-- Accordion card -->
        <?php } ?>
    </div>
    <!-- Accordion wrapper -->
</div>