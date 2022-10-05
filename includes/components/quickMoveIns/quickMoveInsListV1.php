<a href="/quick-move-ins/home/index.php?id=<?php echo $qmi['id']; ?>">
    <div class="global-list-style quick-move-ins-v1">
        <div class="image">
            <?php if($qmi['gallery']) { ?>
            <img src="/cms-admin/wp-content/uploads/WPL/<?php echo $qmi['id']; ?>/<?php echo $qmi['gallery']; ?>"
                alt="<?php echo $qmi['gal_desc']; ?>" class="img-fluid" data-size="500x285">
            <?php } else { ?>
            <img src="/images/comingsoonListing.jpg" alt="<?php echo $qmi['property_name']; ?> Move-In Ready Homes"
                class="img-fluid w-100" data-size="800x457">
            <?php } ?>
            <?php if($qmi['list_status'] != "") { ?>
            <div class="status" style="top: 0px;">
                <?php echo $qmi['list_status']; ?>
            </div>
            <?php } ?>
        </div>
        <div class="content-box bg-white">
            <div class="header">
                <h6 class="mb-0 font-weight-normal text-black"><span
                        class="price">$<?php echo number_format($qmi['price']); ?></span><?php echo $qmi['property_name']; ?>
                </h6>
            </div>
            <div class="content">
            </div>
        </div>
    </div>
</a>