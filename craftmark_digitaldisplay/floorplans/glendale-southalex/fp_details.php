<?php $floorplane_name = "glendale-southalex"; ?>
<!-- Floorplan Header -->
<div class="community_name">
	<h1>The Glendale<span class="city_name"> at <?php echo $community_name; ?></span></h1>
</div>
<!-- Floorplan Details -->
<div class="flip">
    <div class="d-display-card"> 
    	<!-- Main Slider -->
      	<div class="face front"> 
      		<div id="main_<?php echo $floorplane_name; ?>" class="carousel slide animated fadeIn main-slider" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
				    <div class="carousel-item bg-center active" style="background-image: url(/floorplans/glendale/images/main/slideShow1.jpg);">
				    	<a href="/floorplans/glendale/images/main/slideShow1.jpg" class="i_<?php echo $floorplane_name; ?>">
				    		<img src="/craftmark_digitaldisplay/images/bg-box-big.png" alt="Craftmark Homes" class="img-fluid">
				      	</a>
				    </div>
					<?php for($i=2; $i<=12; $i++) { ?>
				    <div class="carousel-item bg-center" style="background-image: url(/floorplans/glendale/images/main/slideShow<?php echo $i; ?>.jpg);">
				    	<a href="/floorplans/glendale/images/main/slideShow<?php echo $i; ?>.jpg" class="i_<?php echo $floorplane_name; ?>">
				    		<img src="/craftmark_digitaldisplay/images/bg-box-big.png" alt="Craftmark Homes" class="img-fluid">
				      	</a>
				    </div>
				    <?php } ?>
				</div>

				<!-- Carousel Control -->
				<a class="carousel-control-prev" href="#main_<?php echo $floorplane_name; ?>" role="button" data-slide="prev">
				    <img src="/craftmark_digitaldisplay/images/arrow-left.svg" class="img-fluid" alt="">
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#main_<?php echo $floorplane_name; ?>" role="button" data-slide="next">
				    <img src="/craftmark_digitaldisplay/images/arrow-right.svg" class="img-fluid" alt="">
				    <span class="sr-only">Next</span>
				</a>
			</div>
      	</div> 
		
		<!-- Floor Plan Detials -->
      	<div class="face back"> 
      		<div class="floorplans_details">
      			<h1>2,494-2,796 Sq.Ft | 4 Bed | 3 Full & 2 Half Ba | 2-Car Garage</h1>
      			<div class="d-flex flex-wrap">
      				<div class="col-6 align-self-center">
      					<?php include_once("fp_accordion.php"); ?>
      				</div>
      				<div class="col-6">
      					<div id="fp_slider_<?php echo $floorplane_name; ?>" class="carousel slide body-slider" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                            	<!-- Ground -->
                                <div class="carousel-item active">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level_rec.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level_end_unit.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level_end_unit_dropped.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level_dropped.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground_level_dropped_rec.png" class="img-fluid">
                                </div>
								<!-- First -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/first_floor.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/first_floor_end_unit.png" class="img-fluid">
                                </div>
								<!-- Second -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/second_floor.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/second_floor_bath.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/second_floor_flex.png" class="img-fluid">
                                </div>
                                <!-- Loft -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/terrace_floor.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/terrace_floor_bedroom.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
      				</div>
      			</div>
			</div>
      	</div>
    </div>	 
 </div>

 <!-- FloorPlan and Elevation Button -->
 <div class="row justify-content-between buttonWrap">
	<div class="col-5">
		<div class="d-inline-block fp-button">
			<div class="add-shadow d-inline-block clearfix">
				<div class="icon-logo d-flex justify-content-center" data-bg-color="blue">
					<img class="img-fluid align-self-center" src="/craftmark_digitaldisplay/images/floorplans-icon.png" alt="">
				</div>
				<div class="fp-el-image">
					<img src="/floorplans/glendale/images/main/slideShow5.jpg" alt="">
				</div>
			</div>
			<p>Floor Plans</p>
		</div>
	</div>

	<div class="col-7 text-right justify-content-end">
		<div class="el-button d-inline-block">
			<div class="add-shadow d-inline-block clearfix">
				<div class="icon-logo d-flex justify-content-center" data-bg-color="yellow">
					<img class="img-fluid align-self-center" src="/craftmark_digitaldisplay/images/photos-icon.png" alt="">
				</div>
				<div class="fp-el-image">
					<img src="/floorplans/glendale/images/main/slideShow8.jpg" alt="">
				</div>
				<div class="fp-el-image">
					<img src="/floorplans/glendale/images/main/slideShow11.jpg" alt="">
				</div>
			</div>
			<p class="text-left">Elevations &amp; Photography</p>
		</div>
	</div>
</div>