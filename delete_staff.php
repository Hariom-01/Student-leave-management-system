<?php
include "db_conn.php";

$id=$_REQUEST['id'];
$query = "DELETE FROM staffs WHERE id=$id"; 
$result = mysqli_query($conn,$query);
header("Location: staff-list.php"); 
?>
