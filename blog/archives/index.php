<?php include_once("../../includes/header.php"); ?>
<?php
include_once("../../includes/backend/db_connection.php");
include_once("../../includes/backend/functions.php");

$posts_per_page = 12; // set the number of posts you want to display per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($current_page - 1) * $posts_per_page;

$blog_posts = getBlogArchives($start, $posts_per_page);

// Get the total number of posts
$total_posts = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as count FROM wp_posts WHERE post_type = 'blog' AND post_status = 'publish'"))['count'];

// Calculate the total number of pages
$total_pages = ceil($total_posts / $posts_per_page);
?>

<section class="nav-space">
    <div class="container-fluid">
        <div class="row d-block py-3 z-depth-1">
            <h2 class="m-0 font-weight-bold text-center">Blog Archives</h2>
        </div>
    </div>
    <div class="container">
        <div class="row blog-archive-list-grid">
            <?php foreach ($blog_posts as $key => $singleBlog) { 
                $date = new DateTime($singleBlog['post_date']); ?>
            <div class="col-6 single-blog-archive <?php echo "item-".$key; ?>">
                <div class="blog-content-container">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue justify-content-center flex-wrap">
                <?php
                // Display pagination links
                if ($total_pages > 1) {
                    echo '<li class="page-item ' . ($current_page == 1 ? 'disabled' : '') . '">';
                    echo '<a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a>';
                    echo '</li>';

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<li class="page-item ' . ($i == $current_page ? 'active' : '') . '">';
                        echo '<a class="page-link" href="?page=' . $i . '">' . $i;
                        if ($i == $current_page) {
                            echo '<span class="sr-only">(current)</span>';
                        }
                        echo '</a></li>';
                    }

                    echo '<li class="page-item ' . ($current_page == $total_pages ? 'disabled' : '') . '">';
                    echo '<a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</section>
<?php include_once(ROOT_PATH."/includes/footer.php"); ?>
