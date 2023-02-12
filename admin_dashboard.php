<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['user_name'])) {
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
<link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header">
            <div class="app-header__logo">
                <div class="bold"><b>Admin Panel</b></div>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                             <a style="padding-left:10px" class="logout-button" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>        
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                    <a href="admin_dashboard.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Student List
                                    </a>
                                </li>
                                <li>
                                    <a href="staff-list.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Staff Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                <div class="p-5">
                        <h3 style="color:black;text-align:center">Student List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Registration</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Roll Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                                  if ($result->num_rows > 0) {
                                    // output data of each row
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['registration'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['class_name'] . "</td>";
                                            echo "<td>" . $row['roll_number'] . "</td>";
                                            echo "<td><a class='btn btn-danger' href='delete-student.php?id=".$row['id']."'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                       
                </div>
          </div>
      </div>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script></body>
</html>
<?php
} else {
     header("Location: login.php");
     exit();
}
?>