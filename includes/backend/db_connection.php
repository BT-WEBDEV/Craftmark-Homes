<?php

// define("SERVERNAME", "localhost");
// define("USERNAME", "root");
// define("PASSWORD", "root");
// define("DBNAME", "cms_craftmark_db");

define("SERVERNAME", "23.229.238.65");
define("USERNAME", "CraftmarkDB");
define("PASSWORD", "af34!jHBffd");
define("DBNAME", "cms_craftmark_db");

$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
if (mysqli_connect_error()) {
	echo "Database connection failed!";
	die("Database connection failed. " . mysqli_connect_error());
}
?>