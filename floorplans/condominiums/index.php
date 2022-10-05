<?php include_once("../../includes/header.php"); ?>
<?php 
include_once("../../includes/backend/functions.php"); 
$floorplans = getJsonData($json_db_url.'floorplans.json');
?>
<section class="nav-space">
<?php include_once("../../includes/components/floorplan/floorplanTypeListings.php"); ?>
</section>
<?php include_once("../../includes/footer.php"); ?>