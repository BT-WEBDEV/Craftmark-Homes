<?php

// Add Visitor information
function checkUserIP($currentPage, $table) {

    $userIP = $_SERVER['REMOTE_ADDR'];
    $sid = session_id();

    global $connection;

    // Get IP Address Details (OLD AMRA CODE) // 
    // $ipDetails = @json_decode(file_get_contents( 
    //     "https://freegeoip.app/json/" . $userIP)); 
    // $ipLocation = $ipDetails->city . ", " . $ipDetails->region_name;

    // Get IP Address Details
    $ipDetails = @json_decode(file_get_contents("https://freegeoip.app/json/" . $userIP));

    if ($ipDetails && isset($ipDetails->city) && isset($ipDetails->region_name)) {
        $ipLocation = $ipDetails->city . ", " . $ipDetails->region_name;
    } else {
        // Handle the case when IP details are not available or incomplete
        $ipLocation = "Unknown"; // Set a default location or handle it as desired
    }

    // Check existance of IP
    $query = "  SELECT * 
                FROM {$table} 
                WHERE pageID = '$currentPage'
                AND sid = '$sid'";

    $data = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($data) == 0) {
        $query = "  INSERT INTO {$table}
                          (sid, pageID, userIP, location, saved)
                    VALUES('$sid', '$currentPage', '$userIP', '$ipLocation', 0)";

        mysqli_query($connection, $query);
    }
}

// Get total View
function getTotalStats($currentPage, $table, $saved) {
    global $connection;

    $query = "  SELECT * 
                FROM {$table}
                WHERE pageID = '$currentPage'";
    if($saved) {
        $query .= " AND saved = 1";
    }
    $data = mysqli_query($connection, $query);

    return mysqli_num_rows($data);

}

// Initial fake views
$initialViews = array(
    "communities/clarksburg-town-center" => 142,
    "communities/crown" => 72,
    "communities/fillmore-place-of-west-alexandria" => 94,
    "communities/georgia-row-at-walter-reed" => 183,
    "communities/liberty" => 67,
    "communities/mateny-hill" => 104,
    "communities/preserve-at-westfields" => 118,
    "communities/primrose-hill-th" => 137,
    "communities/reserve-at-black-rock" => 249,
    "communities/towns-at-south-alex" => 151, 
    "communities/rainwater-run" => 249, 
    "communities/watershed" => 2000
);

// Initial fake saved
$initialSaved = array(
    "communities/clarksburg-town-center" => 45,
    "communities/crown" => 19,
    "communities/fillmore-place-of-west-alexandria" => 25,
    "communities/georgia-row-at-walter-reed" => 52,
    "communities/liberty" => 19,
    "communities/mateny-hill" => 47,
    "communities/preserve-at-westfields" => 42,
    "communities/primrose-hill-th" => 51,
    "communities/reserve-at-black-rock" => 67,
    "communities/towns-at-south-alex" => 59, 
    "communities/rainwater-run" => 19, 
    "communities/watershed" => 60
);