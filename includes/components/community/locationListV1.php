<?php

$selectedListingImgV1 = 0; // Default value
if (is_array($comm['selectedListingImgV1']) && sizeof($comm['selectedListingImgV1']) > 0) {
    $selectedListingImgV1 = rand(0, sizeof($comm['selectedListingImgV1']) - 1);
}

?>
<div class="global-list-style mx-0">
    <a class="text-black cursor-pointer d-inline"
        href="<?php echo ($comm['landingPage']) ? $comm['landingPage'] : ("/communities/".$comm['url']."/"); ?>"
        <?php echo ($comm['landingPage']) ? 'target="_blank"' : ''; ?>>
        <div class="image">
            <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['listingImgV1'][$selectedListingImgV1] ?>"
                alt="<?php echo $comm['imgAlt'] ?>" class="img-fluid w-100" size="500x459">
        </div>
    </a>
</div>