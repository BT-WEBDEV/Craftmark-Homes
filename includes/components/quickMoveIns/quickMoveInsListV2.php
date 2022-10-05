<?php
$community_options = json_decode($qmi['community_options'], true);
?>

<div class="global-list-style quick-move-ins-list-v2">
    <div class="title">
        <div class="d-flex align-items-end">
            <h5 class="m-0 font-weight-normal"><span class="font-weight-bold"><?php echo $qmi['city']; ?></span> |
                <?php echo $community_options['params'][$qmi['community_id']]['value']; ?></h5>
            <div class="flex-grow-1 text-right">
                <!-- Liked Container -->
                <div class="liked-container">
                    <button id="save-btn-<?php echo $qmi['id']; ?>" class="list-card-save" type="button"
                        aria-label="Save" data-listid="<?php echo $qmi['id']; ?>" data-pageid="<?php echo $qmi['id']; ?>" data-sqltable="gka_quick_move_ins_view">
                        <?php require ROOT_PATH."/images/icon/heart-blue.svg" ?>
                    </button>
                </div>
                <!-- // Liked Container -->
            </div>
        </div>
    </div>
    <a href="/quick-move-ins/home?id=<?php echo $qmi['id']; ?>">
        <div class="image image-round">
            <div class="view overlay zoom cursor-pointer h-100">
                <?php if($qmi['gallery']) { ?>
                <img src="/cms-admin/wp-content/uploads/WPL/<?php echo $qmi['id']; ?>/<?php echo $qmi['gallery']; ?>"
                    alt="<?php echo $qmi['gal_desc']; ?>" class="img-fluid w-100" data-size="800x457">
                <?php } else { ?>
                <img src="/images/comingsoonListing.jpg" alt="<?php echo $qmi['property_name']; ?> Move-In Ready Homes"
                    class="img-fluid w-100" data-size="800x457">
                <?php } ?>
            </div>
            <?php if($qmi['list_status'] != "") { ?>
            <div class="status">
                <?php echo $qmi['list_status']; ?>
            </div>
            <?php } ?>
        </div>
    </a>
    <div class="header">
        <h6 class="mb-0 font-weight-normal">
            <span class="price">$<?php echo number_format($qmi['price']); ?></span>
        </h6>
    </div>
    <div class="content mt-0">
        <div class="spec d-flex flex-wrap align-items-center">
            <div class="d-flex flex-wrap align-items-center">
                <p><?php echo $qmi['county']; ?></p>
                <span class="seperator">|</span>
                <p><?php echo number_format($qmi['sq_feet']); ?> Sq. Ft.</p>
                <span class="seperator">|</span>
            </div>
            <div class="d-flex flex-wrap align-items-center">
                <p><?php echo $qmi['bedrooms']; ?> Beds</p>
                <span class="seperator">|</span>
                <p><?php echo $qmi['baths_full']; ?> full <?php echo $qmi['baths_half']; ?> half</p>
            </div>
        </div>
    </div>
</div>