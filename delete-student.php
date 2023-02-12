<?php
include "db_conn.php";

$id=$_REQUEST['id'];
$query = "DELETE FROM students WHERE id=$id"; 
$result = mysqli_query($conn,$query);
header("Location: admin_dashboard.php"); 
?>
