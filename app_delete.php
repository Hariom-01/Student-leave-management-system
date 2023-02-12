<?php
include "db_conn.php";

$id=$_REQUEST['id'];
$query = "DELETE FROM leaves WHERE id=$id"; 
$result = mysqli_query($conn,$query);
header("Location: staff_dashboard.php"); 
?>
