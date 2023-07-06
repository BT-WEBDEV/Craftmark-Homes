<?php include_once("../../includes/header.php"); ?>
<?php include_once(ROOT_PATH."includes/components/community/communityDetailsV4.php"); ?>
<?php include_once(ROOT_PATH."includes/footer.php"); ?>

<?php 
// Get Community Details
foreach ($communities['communities'] as $community) {
    if($community['url'] == $url_path[2]) {
        $comm = $community;
        break;
    }
}
$comm_array = "[".json_encode($comm, true)."]";
?> 

<script>
    var comm = <?php echo $comm_array; ?>;
    comm[0]['status'] = "showMap";
    $(document).ready(function () {
        initMap();
        createCommunityMapMarkers(comm); 
    });
</script>