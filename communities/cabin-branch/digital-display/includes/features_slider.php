<ul class="nav nav-tabs" id="featuresTabMenu" role="tablist" hidden>
	<li class="nav-item">
		<a class="nav-link active" id="feature1-tab" data-toggle="tab" href="#feature1" role="tab" aria-controls="feature1" aria-selected="false">Luxury</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="feature2-tab" data-toggle="tab" href="#feature2" role="tab" aria-controls="feature2" aria-selected="false">Energy</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="feature3-tab" data-toggle="tab" href="#feature3" role="tab" aria-controls="feature3" aria-selected="false">Kitchen</a> 
	</li>
	<li class="nav-item">
		<a class="nav-link" id="feature4-tab" data-toggle="tab" href="#feature4" role="tab" aria-controls="feature4" aria-selected="false">Bath</a> 
	</li>
</ul>
<div class="tab-content p-0" id="featuresTabSlider">
	<div id="feature1" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="feature1-tab" >
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider3">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/luxury<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb3">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/luxury<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="feature2" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="feature2-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider4">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
					<div id="fp-slider<?php echo $i; ?>" class="swiper-slide" style="background-image:url(images/features/energy<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb4">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/energy<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="feature3" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="feature3-tab" >
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider5">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/kitchen<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb5">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/kitchen<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="feature4" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="feature4-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider6">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div id="fp-slider<?php echo $i; ?>" class="swiper-slide" style="background-image:url(images/features/bath<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb6">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/features/bath<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>