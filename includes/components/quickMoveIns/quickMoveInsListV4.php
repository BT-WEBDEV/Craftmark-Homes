<?php
$community_options = json_decode($qmi['community_options'], true);
?>
<div class="quick-move-ins-list-v4">
    <div class="row mx-0">
        <div class="col-md-6 px-0">
            <a href="/floorplans/<?php echo $fp['url'] ?>/">
                <div class="image">
                    <div class="view overlay zoom cursor-pointer h-100">
                        <?php if($qmi['gallery']) { ?>
                        <img src="/cms-admin/wp-content/uploads/WPL/<?php echo $qmi['id']; ?>/<?php echo $qmi['gallery']; ?>"
                            alt="<?php echo $qmi['gal_desc']; ?>" class="img-fluid w-100" data-size="800x457">
                        <?php } else { ?>
                        <img src="/images/comingsoonListing.jpg"
                            alt="<?php echo $qmi['property_name']; ?> Move-In Ready Homes" class="img-fluid w-100"
                            data-size="800x457">
                        <?php } ?>
                    </div>
                    <?php if($qmi['list_status'] != "") { ?>
                    <div class="status">
                        <?php echo $qmi['list_status']; ?>
                    </div>
                    <?php } ?>
                </div>
            </a>
        </div>
        <div class="col-md-6 px-0">
            <div class="content">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/floorplans/<?php echo $fp['url'] ?>/">
                        <h3 class="font-weight-normal"><?php echo $qmi['city']; ?></span> |
                            <?php echo $community_options['params'][$qmi['community_id']]['value']; ?></h3>
                    </a>
                    <?php if($fp['basePrice'] != 0) { ?>
                    <div class="price"><span
                            class="font-weight-normal">$<?php echo number_format($qmi['price']); ?></span></div>
                    <?php } ?>
                </div>
                <div class="desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum, eveniet? Ipsa eos mollitia fugiat
                    omnis explicabo quasi dolores, natus enim impedit. Voluptate possimus suscipit necessitatibus, odit
                    optio id dolore quibusdam?
                </div>
                <div class="specs">
                    <div class="d-flex">
                        <div class="d-flex spec">
                            <img src="/images/icon/sqfeet_white.svg" alt="Sq Feet" class="">
                            <div><?php echo number_format($qmi['sq_feet']); ?> Sq.Ft.
                            </div>
                        </div>
                        <div class="d-flex spec">
                            <img src="/images/icon/bedrooms_white.svg" alt="Bedrooms" class="">
                            <div><?php echo $qmi['bedrooms']; ?> Beds</div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="d-flex spec">
                            <img src="/images/icon/bathrooms_white.svg" alt="Bathrooms" class="">
                            <div><?php echo $qmi['baths_full']; ?> full <?php echo $qmi['baths_half']; ?> half Baths
                            </div>
                        </div>
                        <?php if ($garages != "" && $garages != 0) { ?>
                        <div class="d-flex spec">
                            <img src="/images/icon/garage_white.svg" alt="Garage" class="">
                            <div><?php echo $qmi['garages']; ?> Car Garage</div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div>
                    <a href="/floorplans/<?php echo $fp['url'] ?>/" class="btn custom-btn bg-l-blue text-white">VIEW
                        DETAILS</a>
                </div>
            </div>
        </div>
    </div>
</div>