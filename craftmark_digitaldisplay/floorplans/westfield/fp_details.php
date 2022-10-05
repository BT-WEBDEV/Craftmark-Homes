<?php $floorplane_name = "westfield"; ?>
<!-- Floorplan Header -->
<div class="community_name">
	<h1>The Westfield<span class="city_name"> at <?php echo $community_name; ?></span></h1>
</div>
<!-- Floorplan Details -->
<div class="flip">
    <div class="d-display-card"> 
    	<!-- Main Slider -->
      	<div class="face front"> 
      		<div id="main_<?php echo $floorplane_name; ?>" class="carousel slide animated fadeIn main-slider" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
				    <div class="carousel-item bg-center active" style="background-image: url(/floorplans/westfield/images/main/slideShow1.jpg);">
				    	<a href="/floorplans/westfield/images/main/slideShow1.jpg" class="i_<?php echo $floorplane_name; ?>">
				    		<img src="/craftmark_digitaldisplay/images/bg-box-big.png" alt="Craftmark Homes" class="img-fluid">
				      	</a>
				    </div>
					<?php for($i=2; $i<=9; $i++) { ?>
						<div class="carousel-item bg-center" style="background-image: url(/floorplans/westfield/images/main/slideShow<?php echo $i; ?>.jpg);">
							<a href="/floorplans/westfield/images/main/slideShow<?php echo $i; ?>.jpg" class="i_<?php echo $floorplane_name; ?>">
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
      			<h1>2,126 Sq.Ft | 3-4 Bed | 3-4 Full & 1 Half Ba | 1-Car Garage</h1>
      			<div class="d-flex flex-wrap">
      				<div class="col-6 align-self-center">
      					<?php include_once("fp_accordion.php"); ?>
      				</div>
      				<div class="col-6">
      					<div id="fp_slider_<?php echo $floorplane_name; ?>" class="carousel slide body-slider" data-ride="carousel" data-interval="false">
                           <div class="carousel-inner" role="listbox">
                            	<!-- Ground -->
                                <div class="carousel-item active">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground2.png" class="img-fluid">
                                </div>
								<!-- Second -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor2.png" class="img-fluid">
                                </div>
								<!-- Third -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/secondfloor.png" class="img-fluid">
                                </div>
                                <!-- Loft -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/loft1.png" class="img-fluid">
                                </div>
                                 <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/loft2.png" class="img-fluid">
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
					<img src="/floorplans/westfield/images/main/slideShow8.jpg" alt="">
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
					<img src="/floorplans/westfield/images/main/slideShow9.jpg" alt="">
				</div>
				<div class="fp-el-image">
					<img src="/floorplans/hometypes/westfield/images/slideShow1.jpg" alt="">
				</div>
			</div>
			<p class="text-left">Elevations &amp; Photography</p>
		</div>
	</div>
</div>