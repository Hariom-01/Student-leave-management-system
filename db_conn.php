<?php

$sname= "localhost";
$unmae= "root";
$password = "gx^dRzkW";

$db_name = "leavemanagement";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}