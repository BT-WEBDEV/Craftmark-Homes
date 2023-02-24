<div class="list-item featured-list">
    <a href="<?php echo $featured['highlightUrl']['url']; ?>"
        <?php if($featured['highlightUrl']['type'] == "youtube") { ?>
        data-fancybox="highlight-<?php echo $featured['url']; ?>" <?php } ?>
        <?php if($featured['highlightUrl']['type'] == "360tour") { ?> target="_blank" <?php } ?>>
        <div class="image view cursor-pointer">
            <img src="/featured/<?php echo $featured['url']; ?>/<?php echo $featured['mainImage']; ?>"
                alt="<?php echo $featured['imgAlt']; ?>" class="img-fluid w-100" data-size="500x632" loading="lazy">
            <div class="mask flex-center">
                <div class="text-center">
                    <img src="/featured/<?php echo $featured['url']; ?>/<?php echo $featured['imageFrame']; ?>"
                        alt="Frame" class="img-fluid" data-size="500x632" loading="lazy">
                    <img src="/featured/<?php echo $featured['url']; ?>/<?php echo $featured['logo']['fileName']; ?>"
                        alt="Logo" class="img-fluid logo" style=" top: <?php echo $featured['logo']['style']['top']; ?> ; 
                            right: <?php echo $featured['logo']['style']['right']; ?>;
                            bottom: <?php echo $featured['logo']['style']['bottom']; ?>;
                            left: <?php echo $featured['logo']['style']['left']; ?>;
                            width: <?php echo $featured['logo']['style']['width']; ?>;
                            margin: <?php echo $featured['logo']['style']['margin']; ?>;" loading="lazy">

                    <?php if($featured['highlightUrl']['type'] == "youtube") { ?>
                    <div class="play_btn_wrap cursor-pointer">
                        <img src="/images/icon/youtube.svg" alt="Play button icon" class="play_btn youtube" loading="lazy">
                    </div>
                    <?php } ?>
                    <?php if($featured['highlightUrl']['type'] == "360tour") { ?>
                    <div class="play_btn_wrap tour_btn_wrap cursor-pointer">
                        <img src="/images/icon/360tour.svg" alt="360 Tour icon" class="play_btn tour_btn" loading="lazy">
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </a>
</div>