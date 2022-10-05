<?php $floorplane_name = "annapolis-clarksburgtowncenter"; ?>
<!-- Floorplan Header -->
<div class="community_name">
	<h1>The Annapolis<span class="city_name"> at <?php echo $community_name; ?></span></h1>
</div>
<!-- Floorplan Details -->
<div class="flip">
    <div class="d-display-card"> 
    	<!-- Main Slider -->
      	<div class="face front"> 
      		<div id="main_<?php echo $floorplane_name; ?>" class="carousel slide animated fadeIn main-slider" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
				    <div class="carousel-item bg-center active" style="background-image: url(/floorplans/annapolis/images/clarksburg-town-center/slideShow1.jpg);">
				    	<a href="/floorplans/annapolis/images/clarksburg-town-center/slideShow1.jpg" class="i_<?php echo $floorplane_name; ?>">
				    		<img src="/craftmark_digitaldisplay/images/bg-box-big.png" alt="Craftmark Homes" class="img-fluid">
				      	</a>
				    </div>
				    <?php for ($i=2; $i <=13 ; $i++) { ?>
				    <div class="carousel-item bg-center" style="background-image: url(/floorplans/annapolis/images/clarksburg-town-center/slideShow<?php echo $i; ?>.jpg);">
				    	<a href="/floorplans/annapolis/images/clarksburg-town-center/slideShow<?php echo $i; ?>.jpg" class="i_<?php echo $floorplane_name; ?>">
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
      			<h1>Up to 2,450+ Sq | Ft. 3-4 Bedrooms | 2-3 Full & 1-2 Half Baths | 2-Car Garage</h1>
      			<div class="d-flex flex-wrap">
      				<div class="col-6 align-self-center">
      					<?php include_once("fp_accordion.php"); ?>
      				</div>
      				<div class="col-6">
      					<div id="fp_slider_<?php echo $floorplane_name; ?>" class="carousel slide body-slider" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                <!-- Ground -->
                                <div class="carousel-item active">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground1-1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground1-2.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground1-3.jpg" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/ground1-4.jpg" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor1-1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor1-4.png" class="img-fluid">
                                </div>
								<!-- Second -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor1-3.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/firstfloor1-2.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second1-1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second2-0.png" class="img-fluid">
                                </div>
								<!-- Third -->
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second1-2.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second1-3.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second1-4.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/Second1-5.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/loft1-1.png" class="img-fluid">
                                </div>
                                <div class="carousel-item">
                                    <img src="/craftmark_digitaldisplay/floorplans/<?php echo $floorplane_name; ?>/fp_images/loft1-2.png" class="img-fluid">
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
					<img src="/floorplans/annapolis/images/clarksburg-town-center/slideShow2.jpg" alt="">
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
					<img src="/floorplans/annapolis/images/clarksburg-town-center/slideShow4.jpg" alt="">
				</div>
				<div class="fp-el-image">
					<img src="/floorplans/annapolis/images/clarksburg-town-center/slideShow1.jpg" alt="">
				</div>
			</div>
			<p class="text-left">Elevations &amp; Photography</p>
		</div>
	</div>
</div>