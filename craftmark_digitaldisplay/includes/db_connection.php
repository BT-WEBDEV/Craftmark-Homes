<?php
define("SERVERNAME", "23.229.165.41");
define("USERNAME", "CraftmarkDB");
define("PASSWORD", "af34!jHBffd");
define("DBNAME", "cms_craftmark_db");
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
if (mysqli_connect_error()) {
	die("Database connection failed. " . mysqli_connect_error());
}
?>