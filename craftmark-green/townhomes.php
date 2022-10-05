<!-- Slider main container -->
<div class="swiper-container hero-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/townhome/TH-cutaway-energy.jpg" class="img-fluid w-100" alt="Energy-Efficient Townhomes, Craftmark Green Model">
            </div>
        </div>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/townhome/TH-cutaway-environment.jpg" alt="Energy-Efficient Townhomes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/townhome/TH-cutaway-health.jpg" alt="Energy-Efficient Townhomes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="list-item">
                <img src="images/townhome/TH-cutaway.jpg" alt="Energy-Efficient Townhomes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
<div class="p-3 px-lg-5">
    <h2 class="font-weight-bold">Green Building</h2>
    <p>Our emphasis on Green Building is the right thing to do for environmental sensitivity, support of global
        warming initiatives, and to lessen the dependence on foreign oil. Our dedication to efficient home
        energy usage produces lower utility costs and higher quality for added home value. We are constantly
        improving every home we build with enhanced energy efficiency for every homeowner. Here are just a few
        reasons why Craftmark is simply a better brand of townhome:</p>
</div>
<div class="p-3 max-md-width-760">
    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="craftmark-green-accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($townhomes as $key => $content) { ?>
        <!-- Accordion card -->
        <div class="card">

            <!-- Card header -->
            <div class="card-header" role="tab" <?php echo ($key ==0) ? "style='border-top: 1px solid rgba(0,0,0,.125);'" : ""; ?>>
                <a data-toggle="collapse" href="#townhomesAccordion<?php echo $key; ?>">
                    <div class="d-flex justify-content-between text-black">
                        <h5 class="mb-0"><?php echo $content[0]; ?></h5>
                        <img src="/images/icon/arrow-down-blue.svg" alt="arrow blue icon">
                    </div>
                </a>
            </div>

            <!-- Card body -->
            <div id="townhomesAccordion<?php echo $key; ?>" class="collapse <?php echo ($key ==0) ? "show" : ""; ?>">
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