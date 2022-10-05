<?php
session_start();
require "../../../includes/backend/db_connection.php";
require "../../../includes/backend/functions.php";

if(isset($_POST)) {

    global $connection;

    $sid = session_id();
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Get IP Address Details
    $ipDetails = @json_decode(file_get_contents( 
        "https://freegeoip.app/json/" . $userIP)); 
    $ipLocation = $ipDetails->city . ", " . $ipDetails->region_name;

    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $interestedComm = $_POST['community'];
    $phone = $_POST['phone'];
    
    // Check existance of IP
    $query = "  SELECT * 
                FROM gka_users
                WHERE sid = '$sid'";

    $data = mysqli_query($connection, $query);

    if(mysqli_num_rows($data) == 0) {
        $query = "  INSERT INTO gka_users
                        (sid, userIP, firstname, lastname, email, interestedCommunity, phone, date)
                    VALUES('$sid', '$userIP', '$firstname', '$lastname', '$email', '$interestedComm', '$phone', NOW())";
        mysqli_query($connection, $query);
        echo "Item inserted";
    }
}