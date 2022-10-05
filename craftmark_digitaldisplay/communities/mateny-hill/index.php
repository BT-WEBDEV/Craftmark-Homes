<?php include_once("../../includes/header.php"); ?>
<?php include_once("../../includes/screen_saver.php"); ?>
<?php $community_name = "Mateny Hill"; ?>

<section class="mainWrap h-100">
	<div class="text-center craftmark_logo">
		<img class="img-fluid" src="/craftmark_digitaldisplay/images/craftmark_logo.svg" alt="Craftmark Homes">
	</div>
	 <div class="container-fluid d h-100 d-flex flex-column">
	 	<!-- Main Body -->
	 	<div class="row h-100 main-body">
	 		<div class="custom-col-2 col-md-2 text-center align-self-end fp-listWrap">
	 			<div class="fp-select fp-select-active" data-selector="arlington-mateny">
					<?php include_once("../../floorplans/arlington-mateny/fp_list.php"); ?>
				</div>
				<div class="fp-select" data-selector="annapolis-mateny">
					<?php include_once("../../floorplans/annapolis-mateny/fp_list.php"); ?>
				</div>
				<div class="fp-select" data-selector="wakefield-mateny">
					<?php include_once("../../floorplans/wakefield-mateny/fp_list.php"); ?>
				</div>
	 		</div>

	 		<div class="custom-col-10 col-md-10 fp-detailsWrap">
	 			<div class="fp-item fp-active animated slideInUp" id="arlington-mateny">
	 				<?php include_once("../../floorplans/arlington-mateny/fp_details.php"); ?>
	 			</div>
	 			<div class="fp-item animated slideOutUp" id="annapolis-mateny">
	 				<?php include_once("../../floorplans/annapolis-mateny/fp_details.php"); ?>
	 			</div>
	 			<div class="fp-item animated slideOutUp" id="wakefield-mateny">
	 				<?php include_once("../../floorplans/wakefield-mateny/fp_details.php"); ?>
	 			</div>
	 		</div>
	 	</div>
		<!--///Main Body -->
	 </div>
</section>

<?php include_once("../../includes/footer.php"); ?>
