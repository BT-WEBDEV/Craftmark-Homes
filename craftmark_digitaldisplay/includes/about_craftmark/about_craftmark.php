<?php include_once("../../../includes/db_connection.php"); ?>
<?php require_once("../../../includes/functions.php"); ?>
<pre style="color: white;">
<?php
    $about_craftmark = get_data(26); 
    $aboutinfo[] = about_filtered($about_craftmark);

    $base_url = "/cms-admin/wp-content/uploads/";

    $image_1 = get_image($aboutinfo[0]['image_1_brand']);
    $image_2 = get_image($aboutinfo[0]['image_2_brand']);
    $image_3 = get_image($aboutinfo[0]['image_3_brand']);
    $image_4 = get_image($aboutinfo[0]['image_1_award']);
    $image_5 = get_image($aboutinfo[0]['image_2_award']);
    $image_6 = get_image($aboutinfo[0]['image_3_award']);
    $image_7 = get_image($aboutinfo[0]['image_1_green']);
    $image_8 = get_image($aboutinfo[0]['image_2_green']);
    $image_9 = get_image($aboutinfo[0]['image_3_green']);
    $image_10 = get_image($aboutinfo[0]['image_2_quality']);
    $image_11 = get_image($aboutinfo[0]['image_2_quality']);

?>
</pre>
<!-- Main Body -->
<div class="row h-100 features-and-about">
	<div class="col-md-3 text-center align-self-end">
    	<ul class="list-unstyled text-left list-menu active_wrap">
    		<li class="active-link" data-target="#about-slider" data-slide-to="0">A Better Brand of Home</li>
    		<li data-target="#about-slider" data-slide-to="1">Awards &amp; Honors</li>
    		<li data-target="#about-slider" data-slide-to="2">Craftmark Green</li>
    		<li data-target="#about-slider" data-slide-to="3">Redefining Quality</li>
    	</ul>
	</div>
	<div class="col-md-9">
    	<div id="about-slider" class="carousel slide about-slider" data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                	<?php include_once("content_0.php"); ?>
                </div>
                <div class="carousel-item">
                	<?php include_once("content_1.php"); ?>
                </div>
                <div class="carousel-item">
                	<?php include_once("content_2.php"); ?>
                </div>
                <div class="carousel-item">
                	<?php include_once("content_3.php"); ?>
                </div>
            </div>
        </div>
	</div>
</div>
<!--///Main Body -->