<?php
$selectedListingImgV2 = rand(0, sizeof($comm['selectedListingImgV2'])-1);

if($comm['selectedListingImgV2'] !== false) {
    $selectedListingImgV2 = $comm['selectedListingImgV2'];
}
?>

<div id="comm-<?php echo $comm['id']; ?>" class="global-list-style location-list-v2 listing-hover">
    <div class="title">
        <div class="d-flex align-items-end mb-1">
            <img src="/images/icon/map-pin.svg" alt="Map pin icon" class="map-pin">
            <?php if($comm['url'] != 'coming-soon') { ?>
                <a class="text-black cursor-pointer d-inline"
                    href="<?php echo ($comm['landingPage']) ? $comm['landingPage'] : ("/communities/".$comm['url']."/"); ?>"
                    <?php echo ($comm['landingPage']) ? 'target="_blank"' : ''; ?>>
                    <h6 class="m-0 font-weight-bold"><?php echo $comm['name'] ?></h6>
                </a>
            <?php } else { ?>
                <h6 class="m-0 font-weight-bold"><?php echo $comm['name'] ?></h6>
            <?php } ?>
            <div class="flex-grow-1 text-right">
                <!-- Liked Container -->
                <div class="liked-container">
                    <button id="save-btn-<?php echo $comm['id']; ?>" class="list-card-save" type="button" aria-label="Save"
                        data-listid="<?php echo $comm['id']; ?>" data-pageid="communities/<?php echo $comm['url']; ?>" data-sqltable="gka_community_view">
                        <?php require ROOT_PATH."/images/icon/heart-blue.svg" ?>
                    </button>
                </div>
                <!-- // Liked Container -->
            </div>
        </div>
    </div>
    <?php if($comm['url'] != 'coming-soon') { ?>
    <a class="text-black cursor-pointer d-inline"
        href="<?php echo ($comm['landingPage']) ? $comm['landingPage'] : ("/communities/".$comm['url']."/"); ?>"
        <?php echo ($comm['landingPage']) ? 'target="_blank"' : ''; ?>>
        <div class="image image-round">
            <div class="view">
                <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['listingImgV2'][$selectedListingImgV2]; ?>"
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
    <?php } else { ?>
        <div class="image image-round">
            <div class="view">
                <img src="/communities/<?php echo $comm['url'] ?>/images/<?php echo $comm['listingImgV2'][$selectedListingImgV2]; ?>"
                    alt="<?php echo $comm['imgAlt'] ?>" class="img-fluid w-100" data-size="500x285">
                <div class="mask">
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
    <?php } ?>
    <div class="header">
        <h6 class="m-0 font-weight-normal">
            <?php echo $comm['headerInput1'] ?>
            <span class="d-none"><?php echo $comm['priceInfo']['label'] ?>&nbsp;$<?php echo ($comm['priceInfo']['price'] != 0 || $comm['priceInfo']['price']) ? $comm['priceInfo']['price'] : "-- "; ?><?php echo ($comm['priceInfo']['priceTag']) ? $comm['priceInfo']['priceTag'] : "s"; ?></span>
        </h6>
    </div>
    <div class="content">
        <div class="spec d-flex flex-wrap align-items-center">
            <p><?php echo $comm['address']['addresses'][0]['label'] ?>
                <?php echo (($comm['address']['addresses'][0]['address']['street1'] == "") ? "" : $comm['address']['addresses'][0]['address']['street1'] . ", ")  . (($comm['address']['addresses'][0]['address']['street2'] == "") ? "" : " " . $comm['address']['addresses'][0]['address']['street2'] . ", ") . $comm['address']['addresses'][0]['address']['city'] . ", " . $comm['address']['addresses'][0]['address']['state'] . " " . $comm['address']['addresses'][0]['address']['zip']; ?>
            </p>
        </div>
    </div>
    <div class="hover-box"></div>
</div>