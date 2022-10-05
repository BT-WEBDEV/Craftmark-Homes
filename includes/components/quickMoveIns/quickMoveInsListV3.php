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
                <div class="liked-container d-none">
                    <button id="saved-qmi-btn-<?php echo $qmi['id']; ?>" class="list-card-save" type="button"
                        aria-label="Save" data-listid="<?php echo $qmi['id']; ?>">
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