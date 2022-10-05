<?php

$selectedListingImgV2 = rand(0, sizeof($comm['selectedListingImgV2'])-1);
if($comm['selectedListingImgV2'] !== false) {
    $selectedListingImgV2 = $comm['selectedListingImgV2'];
}
?>

<div id="savedComm-<?php echo $comm['id']; ?>" class="global-list-style location-list-v2 listing-hover">
    <div class="title">
        <div class="d-flex align-items-end mb-1">
            <img src="/images/icon/map-pin.svg" alt="Map pin icon" class="map-pin">
            <a class="text-black cursor-pointer d-inline"
                href="<?php echo ($comm['landingPage']) ? $comm['landingPage'] : ("/communities/".$comm['url']."/"); ?>"
                <?php echo ($comm['landingPage']) ? 'target="_blank"' : ''; ?>>
                <h6 class="m-0 font-weight-bold"><?php echo $comm['name'] ?></h6>
            </a>
            <div class="flex-grow-1 text-right d-none">
                <!-- Liked Container -->
                <div class="liked-container">
                    <button id="saved-com-btn-<?php echo $comm['id']; ?>" class="list-card-save" type="button" aria-label="Save"
                        data-listid="<?php echo $comm['id']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19"
                            viewBox="0 0 21.133 19.372">
                            <path id="heart"
                                d="M17.782,29.946a1.434,1.434,0,0,1-.512-.094c-.227-.084-2.278-.922-5.107-4.084-1.492-1.668-4.89-5.957-4.228-9.78a4.9,4.9,0,0,1,2.607-3.543c3.179-1.726,5.8.673,7.241,2.385,1.429-1.711,4.057-4.1,7.241-2.385a4.9,4.9,0,0,1,2.607,3.543c.661,3.823-2.737,8.112-4.228,9.78-2.829,3.162-4.88,4-5.107,4.084A1.434,1.434,0,0,1,17.782,29.946Z"
                                transform="translate(-7.216 -11.199)" fill="none" stroke="#195eb2"
                                stroke-width="1.25" />
                        </svg>
                    </button>
                </div>
                <!-- // Liked Container -->
            </div>
        </div>
    </div>
    <a class="text-black cursor-pointer d-inline"
        href="<?php echo ($comm['landingPage']) ? $comm['landingPage'] : ("/communities/".$comm['url']."/"); ?>"
        <?php echo ($comm['landingPage']) ? 'target="_blank"' : ''; ?>>
        <div class="image image-round">
            <div class="view">
                <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['listingImgV2'][$selectedListingImgV2] ?>"
                    alt="<?php echo $comm['imgAlt'] ?>" class="img-fluid w-100" data-size="500x285">
                <div class="mask cursor-pointer">
                    <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['frameV2'] ?>"
                        class="img-fluid w-100" alt="<?php echo $comm['name'] ?>">
                </div>
                <?php if($comm['status'] == "soldLabel") { ?>
                <div class="mask flex-center rgba-black overlay-status">
                    <p>SOLD OUT</p>
                </div>
                <?php } ?>
            </div>
        </div>
    </a>
    <div class="header">
        <h6 class="m-0 font-weight-normal">
            <?php echo $comm['headerInput1'] ?>
            <?php echo $comm['priceInfo']['label'] ?>&nbsp;$<?php echo ($comm['priceInfo']['price'] != 0 || $comm['priceInfo']['price']) ? $comm['priceInfo']['price'] : "-- "; ?>s
        </h6>
    </div>
    <div class="content">
        <div class="spec d-flex flex-wrap align-items-center">
            <p><?php echo $comm['address']['addresses'][0]['label'] ?>
                <?php echo $comm['address']['addresses'][0]['address']['street1'] . (($comm['address']['addresses'][0]['address']['street2'] == "") ? "" : " " . $comm['address']['addresses'][0]['address']['street2']) . ", " . $comm['address']['addresses'][0]['address']['city'] . ", " . $comm['address']['addresses'][0]['address']['state'] . " " . $comm['address']['addresses'][0]['address']['zip']; ?>
            </p>
        </div>
    </div>
    <!-- <div class="hover-box"></div> -->
</div>