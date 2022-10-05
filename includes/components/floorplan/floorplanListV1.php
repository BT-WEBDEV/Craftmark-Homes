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

<div class="global-list-style floorplan-list-v1">
    <div class="image">
        <a href="/floorplans/<?php echo $fp['url'] ?>/">
            <img src="/floorplans/<?php echo $fp['url'] ?>/images/<?php echo $fp['listingImg'][0]; ?>" alt="<?php echo $fp['listingImg'][1]; ?>"
                class="img-fluid" data-size="500x285">
        </a>
    </div>
    <div class="bg-white content-box">
        <div class="header">
            <h6 class="font-weight-normal"><?php echo $fp['name'] ?></h6>
        </div>
        <div class="content">
            <div class="spec-icon">
                <div class="row m-0 align-items-center">
                    <div class="sqfeet item-wrap col-md-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/sqfeet.svg" class="icon" alt="Square feet icon">
                        <p><span class="label"><?php echo $fp['specs']['sqFeetLabel'] ?></span> <?php echo $fp['specs']['sqFeet'] ?> Sq. Ft.</p>
                    </div>
                    <div class="beds item-wrap col-md-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/bedrooms.svg" class="icon" alt="Bedroom icon">
                        <!-- <p><?php echo $fp['specs']['beds'] ?> Beds</p> -->
                        <p><?php echo $bedrooms ?> Beds</p>
                    </div>
                    <span class="seperator">|</span>
                    <div class="baths item-wrap col-md-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/bathrooms.svg" class="icon" alt="bathroom icon">
                        <!-- <p><?php echo $fp['specs']['baths'] ?> Baths</p> -->
                        <p><?php echo $bathrooms ?> Baths</p>
                    </div>
                    <div class="garage item-wrap col-md-6 p-0 d-flex align-items-center">
                        <img src="/images/icon/garage.svg" class="icon" alt="garage icon">
                        <!-- <p><?php echo $fp['specs']['garage'] ?>-Car Garage</p> -->
                        <p><?php echo $garages ?>-Car Garage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>