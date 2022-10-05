<?php include_once("../../../includes/header.php"); ?>
<?php include_once("../../../includes/screen_saver.php"); ?>
<link href="/craftmark_digitaldisplay/includes/ImageViewer-master/imageviewer.css"  rel="stylesheet" type="text/css" />
<section class="mainWrap h-100">
	 <div class="container-fluid d h-100 d-flex flex-column">
	 	<!-- Header and Logo -->
	 	<div class="row">
	 		<div class="col-md-2 custom-col-2 text-center align-self-center craft_page_logo">
                <img class="img-fluid" src="/craftmark_digitaldisplay/images/craftmark_logo.svg" alt="Craftmark Homes">
            </div>
	 		<div class="col-md-10 custom-col-10 align-self-center community_name">
	 			<h1>Site Plan &amp; Area Map<span class="city_name"> at The Crest of Alexandria</span></h1>
	 		</div>
	 	</div>
		<!-- ///Header and Logo -->

	 	<!-- Main Body -->
	 	<div class="row h-100 siteplan">
	 		<div class="col-md-12">
    			<!-- <iframe src="/communities/preserve-at-westfields/siteplan.pdf#view=Fit"></iframe> -->
    			<div id="image-gallery">
				    <div class="image-container"></div>
				    <img src="/craftmark_digitaldisplay/images/arrow-left.svg" class="prev"/>
				    <img src="/craftmark_digitaldisplay/images/arrow-right.svg"  class="next"/>
				    <div class="footer-info">
				        <span class="current"></span>/<span class="total"></span>
				    </div>
				</div> 
	 		</div>
	 	</div>
		<!--///Main Body -->
	 </div>
</section>
<?php include_once("../../../includes/footer.php"); ?>
<script src="/craftmark_digitaldisplay/includes/ImageViewer-master/imageviewer.min.js"></script>
<script type="text/javascript">
$(function () {
    var images = [
    {
        small : 'siteplan_image/siteplan.jpg',
        big : 'siteplan_image/siteplan.jpg'
    },
    {
        small : 'siteplan_image/siteplan_1.jpg',
        big : 'siteplan_image/siteplan_1.jpg'
    },
    {
        small : 'siteplan_image/siteplan_2.jpg',
        big : 'siteplan_image/siteplan_2.jpg'
    }];
 
    var curImageIdx = 1,
        total = images.length;
    var wrapper = $('#image-gallery'),
        curSpan = wrapper.find('.current');
    var viewer = ImageViewer(wrapper.find('.image-container'));
 
    //display total count
    wrapper.find('.total').html(total);
 
    function showImage(){
        var imgObj = images[curImageIdx - 1];
        viewer.load(imgObj.small, imgObj.big);
        curSpan.html(curImageIdx);
    }
 
    wrapper.find('.next').click(function(){
         curImageIdx++;
        if(curImageIdx > total) curImageIdx = 1;
        showImage();
    });
 
    wrapper.find('.prev').click(function(){
         curImageIdx--;
        if(curImageIdx < 0) curImageIdx = total;
        showImage();
    });
 
    //initially show image
    showImage();
});
</script>