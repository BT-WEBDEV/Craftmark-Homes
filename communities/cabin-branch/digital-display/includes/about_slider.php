<div class="tab-content p-0" id="aboutTabSlider">
	<div id="photos" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="photos-tab" >
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider8">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/about/about<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb8">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=7; $i++) { ?>
					<div class="swiper-slide" style="background-image:url(images/about/about<?php echo $i; ?>.jpg)"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="videos" class="tab-pane vh-100 fade" role="tabpanel" aria-labelledby="videos-tab">
		<div class="w-100 h-100 d-flex align-items-center justify-content-center">
			<a data-fancybox="video" href="https://www.youtube.com/watch?v=ePrSAQY3rRo?rel=0">
				<img src="images/play.svg" alt="Play Button" width="200" height="200">
			</a>
			<!-- <iframe width="1120" height="630" src="https://www.youtube.com/embed/ePrSAQY3rRo?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
		</div>
	</div>
</div>