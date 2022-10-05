<?php

    $bedrooms = $fp['specs']['beds']['min'];
    if ( $fp['specs']['beds']['max'] != "" ) {
        $bedrooms = $bedrooms . "-" . $fp['specs']['beds']['max'];
    }

    $bathrooms = $fp['specs']['fullBaths']['min'];
    if ( $fp['specs']['fullBaths']['max'] != "" ) {
        $bathrooms = $bathrooms . "-" . $fp['specs']['fullBaths']['max'];
    }

    if ( $fp['specs']['halfBaths']['min'] != "" ) {
        $bathrooms = $bathrooms . "F " . $fp['specs']['halfBaths']['min'];
        if ( $fp['specs']['halfBaths']['max'] != "" ) {
            $bathrooms = $bathrooms . "-" . $fp['specs']['halfBaths']['max'] . "H";
        } else {
            $bathrooms = $bathrooms . "H";
        }
    }    

    $garages = $fp['specs']['garage']['min'];
    if ( $fp['specs']['garage']['max'] != "" ) {
        $garages = $garages . "-" . $fp['specs']['garage']['max'];
    }

    
?>

<div class="global-list-style floorplan-list-v2">
    <div class="image image-round">
        <a href="/floorplans/<?php echo $fp['url'] ?>/">
            <div class="view">
                <img src="/floorplans/<?php echo $fp['url'] ?>/images/<?php echo $fp['listingImg'][0]; ?>"
                    alt="<?php echo $fp['listingImg'][1]; ?>" class="img-fluid w-100 cursor-pointer listing-img" data-size="800x457">
                <?php if($fp['status'] == "sold") { ?>
                <div class="mask flex-center rgba-black overlay-status">
                    <p>SOLD OUT</p>
                </div>
                <?php } if($fp['awards']) { ?>
                <img class="award" src="/floorplans/<?php echo $fp['url'] ?>/images/awards.png" alt="GALA Award">
                <?php } if($fp['modelStatus']) { ?>
                <div class="status font-weight-bold z-depth-1" style="top: 0px; right: 0px; left: auto;">
                    MODEL HOME
                </div>
                <?php } ?>
            </div>
        </a>
    </div>
    <div class="content-box">
        <div class="header">
            <h6 class="mb-0 font-weight-bold"><?php echo $fp['name'] ?></h6>
        </div>
        <div class="content mt-0">
            <div class="spec-list d-sm-none d-flex flex-wrap align-items-center">
                <div class="d-flex flex-wrap align-items-center">
                    <p>
                        <?php 
                        echo $fp['specs']['sqFeetLabel'], " ";
                        echo ($fp['specs']['sqFeet'] != "") ? $fp['specs']['sqFeet'] : "TBD", " Sq.Ft."; 
                    ?>
                    </p>
                    <span class="seperator">|</span>
                    <p><?php echo $bedrooms; ?> Beds</p>
                    <span class="seperator">|</span>
                </div>
                <div class="d-flex flex-wrap align-items-center">
                    <p><?php echo $bathrooms; ?> Baths</p>
                    <?php if ($garages != "" && $garages != 0) {
                    
                ?>
                    <span class="seperator">|</span>
                    <p><?php echo $garages ?>-Car Garage</p>
                    <?php } ?>
                </div>
            </div>
            <div class="spec-icon d-none d-sm-block">
                <div class="row m-0">
                    <div class="item-wrap col-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/sqfeet.svg" class="icon" alt="Square feet icon">
                        <p>
                            <?php // echo $fp['specs']['sqFeetLabel'] ?>
                            <?php echo $fp['specs']['sqFeet'] ?> Sq. Ft.</p>
                    </div>
                    <div class="item-wrap col-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/bedrooms.svg" class="icon" alt="Bedroom icon">
                        <p><?php echo $bedrooms; ?> Beds</p>
                    </div>
                    <div class="item-wrap col-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/bathrooms.svg" class="icon" alt="Bathroom icon">
                        
                        <p><?php echo $bathrooms; ?> Baths</p>
                    </div>
                    <div class="item-wrap col-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/garage.svg" class="icon" alt="Garage icon">
                        <p><?php echo $garages; ?>-Car Garage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>