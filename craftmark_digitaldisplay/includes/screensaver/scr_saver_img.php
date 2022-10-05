<?php
$screen_saver = get_screen_saver($f_list[0]['slider_id']);
?>

<script>
var screen_json = $.parseJSON('<?php echo json_encode($screen_saver); ?>');
var imagecollection = [];

$.each(screen_json, function(key, value) {   
	var imagepath = "https://www.craftmarkhomes.com/cms-admin"+value['path']+value['filename'];
	imagecollection.push({ src: imagepath });
});

$(".screen_saver").vegas({
        animation: "random",
        transition: "random",
        loop: "loop",
        autoplay: "true",
        color: "black",
        slides: imagecollection
    });
</script>
