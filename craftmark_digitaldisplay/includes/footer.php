
<?php 
$community_url = $_SERVER['REQUEST_URI']; 
$community_url = explode("/", $community_url);
?>
<!-- Navigation -->
<nav id="bottom-nav" class="navbar navbar-expand-lg navbar-dark fixed-bottom" data-nav-bg="black">
    <div class="container-fluid">
        <div class="row">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-9 no-padding collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="/craftmark_digitaldisplay/communities/<?php echo $community_url[3]; ?>/">Pics &amp; Plans</a>
                    </li>
                    <li class="nav-item">
                        <a href="/craftmark_digitaldisplay/communities/<?php echo $community_url[3]; ?>/standard-features/">Included Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="/craftmark_digitaldisplay/communities/<?php echo $community_url[3]; ?>/siteplan/">Site &amp; Area</a>
                    </li>
                    <li class="nav-item">
                        <a href="/craftmark_digitaldisplay/communities/<?php echo $community_url[3]; ?>/about-craftmark/">About Craftmark</a>
                    </li>
                </ul>
            </div>
            <div class="text-right col-3 no-padding disclaimer align-self-center">
                Floorplans and elevations are approximate and subject to change without notice. Room sizes and window configurations may vary with elevation. Square footage includes extensions, not garages. All content is for illustrative purposes only. See Sales Manager for specific details.
            </div>
        </div>
    </div>
</nav>

</body>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/craftmark_digitaldisplay/js/carousel-swipe.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="/craftmark_digitaldisplay/js/main.js" type="text/javascript"></script>
<script src="/craftmark_digitaldisplay/includes/ilightbox/js/ilightbox.js" type="text/javascript"></script>
<script src="/craftmark_digitaldisplay/includes/screensaver/vegas.min.js" type="text/javascript"></script>
</html>

<!-- Screen Saver Photo Slider -->
<?php include_once("screensaver/scr_saver_img.php"); ?>