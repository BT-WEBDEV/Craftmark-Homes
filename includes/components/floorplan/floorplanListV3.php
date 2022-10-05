
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
<div class="floorplan-list-v3">
    <a href="/floorplans/<?php echo $fp['url'] ?>/">
        <div class="image view">
            <img src="/floorplans/<?php echo $fp['url'] ?>/images/<?php echo $listingImg; ?>"
                alt="<?php echo $imgAlt; ?>" class="img-fluid w-100" data-size="800x457">
            <div class="mask bg-gradient-black content d-flex flex-column justify-content-between cursor-pointer">
                <div>
                    <h4 class="font-weight-bold"><?php echo $fp['name'] ?></h4>
                    <?php if($fp['basePrice'] != 0 && $fp['url'] != "seneca" && $fp['url'] != "richmond") { ?>
                    <div class="font-weight-bold">From $<?php echo number_format($fp['basePrice']); ?></div>
                    <?php } ?>
                </div>
                <div class="d-flex specs-v3">
                    <div class="spec-item">
                        <div class="type"><?php echo ($fp['specs']['sqFeetLabel'] != "") ? $fp['specs']['sqFeetLabel'] : " "; ?></div>
                        <div><?php echo ($fp['specs']['sqFeet'] != "") ? $fp['specs']['sqFeet'] : "TBD"; ?></div>
                        <div class="type">Sq.Ft.</div>
                    </div>
                    <div class="spec-item">
                        <div><?php echo $bedrooms ?></div>
                        <div class="type">Beds</div>
                    </div>
                    <div class="spec-item">
                        <div><?php echo $bathrooms ?></div>
                        <div class="type">Baths</div>
                    </div>
                    <?php if ($garages != "" && $garages != 0) {
                    ?>
                    <div class="spec-item">
                        <div><?php echo $garages ?></div>
                        <div class="type">Car Garage</div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </a>
</div>