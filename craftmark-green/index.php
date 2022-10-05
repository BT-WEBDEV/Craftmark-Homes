<?php include_once("../includes/header.php"); ?>
<?php
include_once("../includes/backend/functions.php"); 
$craftmarkGreen = getJsonData($json_db_url.'craftmarkGreen.json');
$singleFamilyHomes = $craftmarkGreen['singleFamilyHomes'];
$townhomes = $craftmarkGreen['townhomes'];
?>
<section class="nav-space">
    <div class="py-3 z-depth-1 text-center">
        <img src="images/craftmark-green.svg" alt="Craftmark Green">
    </div>
</section>
<section id="green-desc" class="py-3 pt-sm-0 bg-white">
    <div class="content-wrap">
        <div class="container">
            <div class="content max-lg-width-1140 mx-auto">
                <h2 class="font-weight-bold">ENERGY. HEALTH. ENVIRONMENT. YOU.</h2>
                <p>Craftmark Homes is committed to making smarter construction and healthier living part of your
                    definition
                    of luxury. Energy efficiency for lower utility costs. Improved air quality & insulation for your
                    well-being. Conscious construction techniques for minimal environmental impact. A simply better
                    home,
                    for you.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row py-3">
            <div class="col-12 p-0">
                <img src="images/infogr_mobile.jpg" alt="Energy Saving" class="img-fluid w-100 d-block d-sm-none">
                <img src="images/infogr_desktop.jpg" alt="Energy Saving" class="img-fluid w-100 d-none d-sm-block px-3">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="green-item-wrap" class="row py-sm-3 px-md-5">
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="text-center">
                    <img src="images/energy.svg" alt="Energy">
                    <h3 class="font-weight-bold mt-2">Energy</h3>
                    <p class="mt-3">As a multiple ENERGY STAR® Leadership Award winner, Craftmark homes achieve HERS®
                        Index ratings almost half that of the average new home!* That’s huge savings for you every
                        month.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="text-center">
                    <img src="images/health.svg" alt="Health">
                    <h3 class="font-weight-bold mt-2">Health</h3>
                    <p class="mt-3">Craftmark homes are not just built for luxury and lifestyle. Every home is crafted
                        with our homeowners’ health and well-being in mind. Indoor air quality is enhanced through tight
                        construction, duct sealing and increased insulation.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="text-center">
                    <img src="images/enviroment.svg" alt="Environment">
                    <h3 class="font-weight-bold mt-2">Environment</h3>
                    <p class="mt-3">Craftmark Homes’ dedication to environmental preservation is evident through our
                        efforts in conservation, water efficiency and resource management. We make locally acquired and
                        recyclable products a priority wherever we build.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <div class="text-center">
                    <img src="images/you.svg" alt="You">
                    <h3 class="font-weight-bold mt-2">You</h3>
                    <p class="mt-3">From blueprint to construction, from material and appliance selections to finishing
                        touches and luxury details, your Craftmark home is designed to be healthy,
                        environmentally-friendly, and quality constructed.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white py-3">
    <div class="container-fluid px-lg-5">
        <div class="text-sm-center">
            <p>Craftmark Homes strives to meet and exceed EPA energy efficiency guidelines whenever possible, saving you
                money and helping to protect the environment by promoting green living.</p>
            <p class="font-weight-bold mt-3">Learn more about the award-winning energy efficiency of Craftmark Homes.</>
        </div>
        <div class="row craftmark-green-gallery">
            <div class="image z-depth-1">
                <img src="images/green-1.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
            <div class="image z-depth-1">
                <img src="images/green-2.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
            <div class="image z-depth-1">
                <img src="images/green-3.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
            <div class="image z-depth-1">
                <img src="images/green-4.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
            <div class="image z-depth-1">
                <img src="images/green-5.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
            <div class="image z-depth-1">
                <img src="images/green-6.jpg" alt="Energy-Efficient Single Family Homes, Craftmark Green Model" class="img-fluid w-100">
            </div>
        </div>
    </div>
    <div id="green-home-type" class="container-fluid">
        <div class="row d-block">
            <div class="content-wrap px-lg-5">
                <div class="px-3 content text-sm-right">
                    <h2 class="font-weight-bold">VISUALIZE YOUR LOW CARBON FOOTPRINT WITH CRAFTMARK HOMES</h2>
                    <p class="mt-2">Select from Single Family Homes and Townhomes below to see all the effort that goes
                        into
                        Craftmark Green to provide energy efficient features that help the environment, reduce your
                        energy
                        usage, and improve your health.</p>
                </div>
            </div>
            <div id="craftmark-green-pills" class="py-3 pt-sm-0">
                <ul class="nav md-pills hover-tab custom-pills z-depth-1">
                    <li class="nav-item col-6">
                        <a class="nav-link active justify-content-center" data-toggle="tab" href="#singleFamilyHomes"
                            role="tab">
                            Single Family Homes
                        </a>
                    </li>
                    <li class="nav-item col-6">
                        <a class="nav-link justify-content-center" data-toggle="tab" href="#townhomes" role="tab">
                            Townhomes
                        </a>
                    </li>
                </ul>
                <div>
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="singleFamilyHomes">
                            <?php include_once("singleFamilyHomes.php") ?>
                        </div>
                        <div class="tab-pane fade" id="townhomes">
                            <?php include_once("townhomes.php") ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once(ROOT_PATH."/includes/footer.php"); ?>