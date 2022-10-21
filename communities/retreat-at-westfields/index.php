<?php include_once("../../includes/header.php"); ?>
<?php include_once(ROOT_PATH."includes/components/community/communityDetailsV3.php"); ?>
<?php include_once(ROOT_PATH."includes/footer.php"); ?>


<?php $comm_array = "[".json_encode($comm, true)."]"; ?>


<script>
    var comm = <?php echo $comm_array; ?>;
    $(document).ready(function () {
        initMap();
        createCommunityMapMarkers(comm)
    });
</script>



