<?php
session_start();
require "../../../includes/backend/db_connection.php";
require "../../../includes/backend/functions.php";

if(isset($_POST)) {
    global $connection;

    $sid = session_id();
    $userIP = $_POST['ip'];

    $pageID = $_POST['pageID'];
    $sqltable = $_POST['sqltable'];
    $location = $_POST['city'] . ", " . $_POST['region_code'];
    
    // Check existance of IP
    $query = "  SELECT * 
                FROM {$sqltable} 
                WHERE pageID = '$pageID'
                AND sid = '$sid'";

    $data = mysqli_query($connection, $query);

    if(mysqli_num_rows($data) >= 1) {
        $query = "  UPDATE {$sqltable}
                    SET saved = 1
                    WHERE pageID = '$pageID'
                    AND sid = '$sid'";
        mysqli_query($connection, $query);
        echo "Item updated";
    } else {
        $query = "  INSERT INTO {$sqltable}
                        (sid, pageID, userIP, location, saved, date)
                    VALUES('$sid', '$pageID', '$userIP', '$location', 1, NOW())";
        mysqli_query($connection, $query);
        echo "Item inserted";
    }
}