<div class="tab-content p-0" id="siteplanTabSlider">
	<div id="map" class="tab-pane vh-100 fade show active" role="tabpanel" aria-labelledby="map-tab">
		<iframe id="googlemap"
			src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24851.282070813602!2d-77.4477272!3d38.8688545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x88c9cf5dcce55e!2zMzjCsDUyJzIyLjciTiA3N8KwMjcnNDEuOSJX!5e0!3m2!1sen!2sus!4v1648216335648!5m2!1sen!2sus"
			width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<div id="siteplanSlider" class="tab-pane vh-100 fade show active" role="tabpanel"
		aria-labelledby="siteplanSlider-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider7">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=2; $i++) { ?>
				<div class="swiper-slide" style="background-image:url(images/sitemap/siteplan-<?php echo $i; ?>.jpg)">
				</div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb7">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=2; $i++) { ?>
				<div class="swiper-slide" style="background-image:url(images/sitemap/siteplan-<?php echo $i; ?>.jpg)">
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="siteplan2Slider" class="tab-pane vh-100 fade show active" role="tabpanel"
		aria-labelledby="siteplan2Slider-tab">
		<!-- Swiper -->
		<div class="swiper-container gallery-top slider11">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
				<div class="swiper-slide" style="background-image:url(images/sitemap/clubhouse<?php echo $i; ?>.jpg)">
				</div>
				<?php } ?>
			</div>
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs thumb11">
			<div class="swiper-wrapper">
				<?php for($i=1; $i<=4; $i++) { ?>
				<div class="swiper-slide" style="background-image:url(images/sitemap/clubhouse<?php echo $i; ?>.jpg)">
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>