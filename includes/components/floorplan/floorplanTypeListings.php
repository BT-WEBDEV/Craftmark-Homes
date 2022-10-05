
<?php
$url_path = explode('/', $_SERVER['REQUEST_URI']);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="my-3 d-flex align-items-center justify-content-between">
                <?php foreach ($floorplans['floorplanTypes'] as $fp_type) { 
                    if($fp_type['type'] == $url_path[2]) {  
                ?>
                    <h3 class="font-weight-bold m-0"><?php echo $fp_type['header'] ?></h3>
                <?php } } ?>
                <a href="#" class="text-l-blue font-weight-normal">Model Homes</a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            foreach ($floorplans['floorplanTypes'] as $fp_type) {
                if($fp_type['type'] == "townhomes") {
                foreach ($fp_type['floorplans'] as $fp) { 
                    if($fp['status'] == "live") {
            ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-0">
            <div class="mb-2">
                <?php include("../../includes/components/floorplan/floorplanListV3.php"); ?>
            </div>
        </div>
        <?php }}}} ?>
    </div>
</div>