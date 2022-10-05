<ul class="nav nav-tabs" id="floorplanTabMenu" role="tablist" hidden>
	<li class="nav-item">
		<a class="nav-link active" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="floorplanSlider1-tab" data-toggle="tab" href="#floorplanSlider1" role="tab" aria-controls="floorplanSlider1" aria-selected="false">Ground Level</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="floorplanSlider2-tab" data-toggle="tab" href="#floorplanSlider2" role="tab" aria-controls="floorplanSlider2" aria-selected="false">Second Floor</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="floorplanSlider3-tab" data-toggle="tab" href="#floorplanSlider3" role="tab" aria-controls="floorplanSlider3" aria-selected="false">Third Floor</a> 
	</li>
</ul>
<div class="tab-content p-0" id="floorplanTabSlider">
	<div id="gallery" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="gallery-tab" >
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider1">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=26; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/floorplan/slider<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb1">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=26; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/floorplan/slider<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="floorplanSlider1" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="floorplanSlider1-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider2">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=2; $i++) { ?>
					<div id="fp-slider<?php echo $i; ?>" class="swiper-slide" style="background-image:url(images/floorplan/floorplanground<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb2">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=2; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/floorplan/floorplanground<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="floorplanSlider2" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="floorplanSlider2-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider9">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=1; $i++) { ?>
					<div id="fp-slider<?php echo $i; ?>" class="swiper-slide" style="background-image:url(images/floorplan/floorplansecond<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb9">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=1; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/floorplan/floorplansecond<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="floorplanSlider3" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="floorplanSlider3-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider10">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=3; $i++) { ?>
					<div id="fp-slider<?php echo $i; ?>" class="swiper-slide" style="background-image:url(images/floorplan/floorplanthird<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb10">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=3; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/floorplan/floorplanthird<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>