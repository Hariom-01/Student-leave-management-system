<?php
include "db_conn.php";

$id=$_REQUEST['id'];
$query="update leaves set status='approved' where id='$id'";
$result = mysqli_query($conn,$query);
header("Location: staff_dashboard.php"); 
?>