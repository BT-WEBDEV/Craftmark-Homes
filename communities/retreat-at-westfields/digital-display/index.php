<?php include_once("includes/header.php"); ?>
<?php include_once("includes/screen_saver.php"); ?>

<section class="main-section">
    <div class="container-fluid">
        <div class="row">
            <div class="left-side col-5">
                <div class="main-logo">
                    <img class="img-fluid" src="images/logo.svg">
                    <div>
                        <!--Navbar-->
                        <nav class="navbar navbar-light">
                            <!-- Collapse button -->
                            <!-- <button class="navbar-toggler menu-button" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent20" aria-controls="navbarSupportedContent20"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <div class="animated-icon1"><span></span><span></span><span></span></div>
                            </button> -->

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse z-depth-1" id="navbarSupportedContent20">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="https://www.craftmarkhomes.com/communities/crown/digital-display/">Crown</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://webtest4.gkaadvertising.com/">The Village at
                                            Cabin Branch</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Clarksburg Town Center</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Collapsible content -->

                        </nav>
                        <!--/.Navbar-->
                    </div>
                </div>
                <div class="tab-content" id="mainTabContent">
                    <div class="floorplan tab-pane fade show active align-content-center" role="tabpanel"
                        aria-labelledby="floorplan-tab">
                        <?php include_once("includes/floorplan.php"); ?>
                    </div>
                    <div class="features tab-pane fade align-content-center" role="tabpanel"
                        aria-labelledby="features-tab">
                        <?php include_once("includes/features.php"); ?>
                    </div>

                    <div class="siteplan tab-pane fade align-content-center" role="tabpanel"
                        aria-labelledby="siteplan-tab">
                        <?php include_once("includes/siteplan.php"); ?>
                    </div>

                    <div class="about tab-pane fade align-content-center" role="tabpanel" aria-labelledby="about-tab">
                        <?php include_once("includes/about.php"); ?>
                    </div>
                </div>
                <div class="circle-controls row justify-content-center align-items-center">
                    <ul class="nav nav-tabs" id="mainTab" role="tablist">
                        <li class="nav-item mr-3">
                            <a class="nav-link btn circle-btn active" id="floorplan-tab" data-toggle="tab"
                                href=".floorplan" role="tab" aria-controls="floorplan" aria-selected="false">Floor
                                Plans<br>& Pictures</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link btn circle-btn" id="features-tab" data-toggle="tab" href=".features"
                                role="tab" aria-controls="features" aria-selected="false">Features</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link btn circle-btn" id="siteplan-tab" data-toggle="tab" href=".siteplan"
                                role="tab" aria-controls="siteplan" aria-selected="false">Site Map<br>& Area</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn circle-btn" id="about-tab" data-toggle="tab" href=".about" role="tab"
                                aria-controls="about" aria-selected="false">About Craftmark</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-side col-7">
                <div class="row">
                    <ul class="nav nav-tabs" id="imageTab" role="tablist" hidden>
                        <li class="nav-item">
                            <a class="nav-link active" id="fp-tab" data-toggle="tab" href="#fp" role="tab"
                                aria-controls="fp" aria-selected="false">Floor Plans<br>& Pictures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ft-tab" data-toggle="tab" href="#ft" role="tab" aria-controls="ft"
                                aria-selected="false">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sp-tab" data-toggle="tab" href="#sp" role="tab" aria-controls="sp"
                                aria-selected="false">Site Map<br>& Area</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ab-tab" data-toggle="tab" href="#ab" role="tab" aria-controls="ab"
                                aria-selected="false">About Craftmark</a>
                        </li>
                    </ul>
                    <div class="vh-100 w-100">
                        <div class="tab-content p-0" id="imageTabContent">
                            <div id="fp" class="tab-pane vh-100 fade show active" role="tabpanel"
                                aria-labelledby="fp-tab">
                                <?php include_once("includes/floorplan_slider.php"); ?>
                            </div>

                            <div id="ft" class="tab-pane vh-100 fade show active" role="tabpanel"
                                aria-labelledby="ft-tab">
                                <div class="float-text-wrapper">
                                    <div class="float-text">
                                        <p>RESERVE YOUR HOMESITE</p>
                                        <!-- <img src="images/leaf3.png" alt=""> -->
                                    </div>
                                </div>
                                <?php include_once("includes/features_slider.php"); ?>
                            </div>

                            <div id="sp" class="tab-pane vh-100 fade show active" role="tabpanel"
                                aria-labelledby="sp-tab">
                                <div class="float-text-wrapper">
                                    <div class="float-text">
                                        <p>RESERVE YOUR HOMESITE</p>
                                        <!-- <img src="images/leaf3.png" alt=""> -->
                                    </div>
                                </div>
                                <?php include_once("includes/siteplan_slider.php"); ?>
                            </div>

                            <div id="ab" class="tab-pane vh-100 fade show active" role="tabpanel"
                                aria-labelledby="ab-tab">
                                <div class="float-text-wrapper">
                                    <div class="float-text">
                                        <p>RESERVE YOUR HOMESITE</p>
                                        <!-- <img src="images/leaf3.png" alt=""> -->
                                    </div>
                                </div>
                                <?php include_once("includes/about_slider.php"); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("includes/footer.php"); ?>