<div class="list-item featured-listV2">
    <a href="<?php echo $featured['highlightUrl']['url']; ?>"
        <?php if($featured['highlightUrl']['type'] == "youtube") { ?>
        data-fancybox="highlight-<?php echo $featured['url']; ?>" <?php } ?>
        <?php if($featured['highlightUrl']['type'] == "360tour") { ?> target="_blank" <?php } ?>>
        <div class="image view cursor-pointer">
            <img src="/featured/<?php echo $featured['url']; ?>/<?php echo $featured['mainImage']; ?>"
                alt="<?php echo $featured['imgAlt']; ?>" class="img-fluid w-100" data-size="500x632">
            <div class="mask flex-center">
                <div class="text-center">
                    <img src="/featured/<?php echo $featured['url']; ?>/<?php echo $featured['imageFrame']; ?>"
                        alt="Frame" class="img-fluid" data-size="500x632">
                    <?php if($featured['highlightUrl']['type'] == "youtube") { ?>
                    <div class="play_btn_wrap cursor-pointer">
                        <img src="/images/icon/Play-blue.svg" alt="Play button" class="play_btn youtube">
                    </div>
                    <?php } ?>
                    <?php if($featured['highlightUrl']['type'] == "360tour") { ?>
                    <div class="play_btn_wrap tour_btn_wrap cursor-pointer">
                        <img src="/images/icon/360-View-blue.svg" alt="360 Tour" class="play_btn tour_btn">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="text-white desc">
            <?php echo $featured['imgAlt']; ?>
        </div>
    </a>
</div>