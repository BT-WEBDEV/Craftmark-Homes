<?php include_once("../../../includes/header.php"); ?>
<?php include_once("../../../includes/screen_saver.php"); ?>
<section class="mainWrap h-100">
	 <div class="container-fluid d h-100 d-flex flex-column">
	 	<!-- Header and Logo -->
	 	<div class="row">
	 		<div class="col-md-2 custom-col-2 text-center align-self-center craft_page_logo">
	 			<img class="img-fluid" src="/craftmark_digitaldisplay/images/craftmark_logo.svg" alt="Craftmark Homes">
	 		</div>
	 		<div class="col-md-10 custom-col-10 align-self-center community_name">
	 			<h1>Included Features<span class="city_name"> at Towns at South Alex®</span></h1>
	 		</div>
	 	</div>
		<!-- ///Header and Logo -->

	 	<!-- Main Body -->
	 	<div class="row h-100 features-and-about">
	 		<div class="col-md-3 text-center align-self-end">
				<ul class="list-unstyled text-left list-menu active_wrap">
					<li class="active-link" data-target="#features-slider" data-slide-to="0">Luxury Features</li>
					<li data-target="#features-slider" data-slide-to="1">Gourmet Kitchens</li>
					<li data-target="#features-slider" data-slide-to="2">Bath and Powder Rooms</li>
					<li data-target="#features-slider" data-slide-to="3">Energy Savings</li>
					<li data-target="#features-slider" data-slide-to="4">Community Features</li>
					<li data-target="#features-slider" data-slide-to="6">Safety Sensitive Features</li>
				</ul>
	 		</div>

	 		<div class="col-md-9">
				<div class="header-img">
					<img src="/craftmark_digitaldisplay/images/GettyImages-530185857.jpg" alt="" class="img-fluid">
				</div>
				<!-- Standard Features -->
				<?php include_once("../../../includes/standard_features/features_list.php"); ?>
			</div>
	 	</div>
		<!--///Main Body -->
	 </div>
</section>

<?php include_once("../../../includes/footer.php"); ?>