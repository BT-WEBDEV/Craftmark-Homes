<?php
    // FloorPlan Correct listingImg on Community Page
    $listingImg = $fp['listingImg'][0];
    $imgAlt = $fp['listingImg'][1];
    if(sizeof($fp['fpVersions']) != 0) {
        foreach ($fp['fpVersions'] as $version) {
            if($version['galUrl'] == $comm['url']) {
                $listingImg = $version['listingImg'][0];
                $imgAlt = $version['listingImg'][1];
            }
        }
    }

    // Bed bath garage 
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
<div class="floorplan-list-v4">
    <div class="row mx-0">
        <div class="col-lg-6 px-0">
            <a href="/floorplans/<?php echo $fp['url'] ?>/">
                <div class="image h-100">
                    <img src="/floorplans/<?php echo $fp['url'] ?>/images/<?php echo $listingImg; ?>"
                        alt="<?php echo $imgAlt; ?>" class="img-fluid w-10 img-fit"
                        data-size="800x457">
                </div>
            </a>
        </div>
        <div class="col-lg-6 px-0">
            <div class="content">
                <div class="d-lg-flex justify-content-between align-items-end">
                    <a href="/floorplans/<?php echo $fp['url'] ?>/">
                        <h3 class="text-l-blue font-weight-normal"><?php echo $fp['name'] ?></h3>
                    </a>
                    <?php if($fp['basePrice'] != 0) { ?>
                    <div class="price">From <span class="font-weight-normal">$<?php echo number_format($fp['basePrice']); ?></span></div>
                    <?php } ?>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum, eveniet? Ipsa eos mollitia fugiat
                    omnis explicabo quasi dolores, natus enim impedit. Voluptate possimus suscipit necessitatibus, odit
                    optio id dolore quibusdam?
                </div>
                <div class="specs">
                    <div class="d-md-flex">
                        <div class="d-flex spec">
                            <img src="/images/icon/sqfeet.svg" alt="Sq Feet" class="">
                            <div><?php echo ($fp['specs']['sqFeet'] != "") ? $fp['specs']['sqFeet'] : "TBD"; ?> Sq.Ft.</div>
                        </div>
                        <div class="d-flex spec">
                            <img src="/images/icon/bedrooms.svg" alt="Bedrooms" class="">
                            <div><?php echo $bedrooms ?> Beds</div>
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="d-flex spec">
                            <img src="/images/icon/bathrooms.svg" alt="Bathrooms" class="">
                            <div><?php echo $bathrooms ?> Baths</div>
                        </div>
                        <?php if ($garages != "" && $garages != 0) { ?>
                        <div class="d-flex spec">
                            <img src="/images/icon/garage.svg" alt="Garage" class="">
                            <div><?php echo $garages ?> Car Garage</div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div>
                    <a href="/floorplans/<?php echo $fp['url'] ?>/" class="btn custom-btn bg-l-blue text-white">VIEW DETAILS</a>
                </div>
            </div>
        </div>
    </div>
</div>