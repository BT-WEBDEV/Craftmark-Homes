<?php include_once("../includes/header.php"); ?>
<?php
include_once("../includes/backend/db_connection.php");
include_once("../includes/backend/functions.php");
$blog = getBlog();
?>
<section class="nav-space">
    <div class="container-fluid">
        <div class="row d-block py-3 z-depth-1">
            <h2 class="m-0 font-weight-bold text-center">Blog</h2>
        </div>
    </div>
    <div class="container">
        <div class="row blog-list-grid">
            <?php foreach ($blog as $key => $singleBlog) { 
                $date = new DateTime($singleBlog['post_date']); ?>
            <div class="col-6 single-blog <?php echo "item-".$key; ?>">
                <div class="blog-content-container" <?php if($key % 5 == 0) { ?>
                    style="background-image: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,.7)),url(/cms-admin/wp-content/uploads/<?php echo $singleBlog['listing_image'] ?>); "
                    <?php } ?>>
                    <div class="content">
                        <div class="image">
                            <a href="/cms-admin/blog/<?php echo $singleBlog['post_name']; ?>"
                                class="text-black font-weight-normal">
                                <img src="/cms-admin/wp-content/uploads/<?php echo $singleBlog['listing_image'] ?>"
                                    alt="<?php echo $singleBlog['post_title'] ?>" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="date">
                            <?php echo $date->format('M d'); ?>
                        </div>
                        <div class="header">
                            <h4 class="font-weight-bold m-0"><?php echo $singleBlog['post_title'] ?></h4>
                            <p>
                                <?php echo $singleBlog['post_excerpt']; ?>
                            </p>
                            <div class="">
                                <a href="/cms-admin/blog/<?php echo $singleBlog['post_name']; ?>"
                                    class="text-black font-weight-normal">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-block py-3">
            <a href="/blog/archives" class="text-black font-weight-normal"> 
                <h4 class="m-0 font-weight-bold text-center">View Blog Archives</h4>
            </a>
        </div>
    </div>
</section>
<?php include_once(ROOT_PATH."/includes/footer.php"); ?>