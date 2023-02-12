<?php
session_start();
include "db_conn.php";

$sql = "SELECT * FROM leaves WHERE student_id='$_SESSION[id]' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$leaves = [];

if (isset($_SESSION['id']) && isset($_SESSION['registration'])) {
?>
     <!DOCTYPE html>
     <html>
     <head>
          <title>HOME</title>
          <link rel="stylesheet" type="text/css" href="style.css">
     </head>
     <body style="background-image: url('image/homepage.jpg');">
          <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
          <a class="logout-button" href="logout.php">Logout</a>
          <div class="container">
               <div class="form-box">
                    <h1>Leave application form</h1>
                    <label style="color:white">Please fill in this form with all the required information.<br> After the leave request has been approved by your supervisor.</label>
                    <br>
                    <br>
                    
                    <?php
                     if (mysqli_num_rows($result) === 1) {
                         $leaves = mysqli_fetch_assoc($result);
                     }
                     if (isset($leaves['status'])) {
                         echo '<center><label style="color:white;">Your Current Leave Status is <u>'. $leaves['status']  .'.</u></label></center>.';
                     }
                
                    ?>
                    
                    <br>
                    <br>
                    <form action="saveleaveform.php" method="post">
                         <?php if (isset($_GET['error'])) { ?>
                              <p class="error"><?php echo $_GET['error']; ?></p>
                         <?php } ?>

                         <?php if (isset($_GET['success'])) { ?>
                              <p class="success"><?php echo $_GET['success']; ?></p>
                         <?php } ?>
                         <div class="form-group">
                              <label for="subject">Subject</label>
                              <input class="form-control" id="subject" type="text" name="subject">
                              <input class="form-control" id="student_id" type="hidden" value="<?php echo $_SESSION['id']; ?>" name="student_id">
                              <input class="form-control" id="student_name" type="hidden" value="<?php echo $_SESSION['name']; ?>" name="student_name">
                         </div>
                         <div class="form-group">
                              <label for="date">Leave Start Date</label>
                              <input class="form-control" id="start_date" type="date" name="start_date" min="<?php echo date("Y-m-d"); ?>">
                         </div>
                         <div class="form-group">
                              <label for="date">Leave End Date</label>
                              <input class="form-control" id="end_date" type="date" name="end_date" min="<?php echo date("Y-m-d"); ?>">
                         </div>
                         <div class="form-group">
                              <label for="roll_number">Roll Number</label>
                              <input class="form-control" id="roll_number" type="text" name="roll_number">
                         </div>
                         <div class="form-group">
                              <label for="phone_number">Phone Number</label>
                              <input class="form-control" id="phone_number" type="number" name="phone_number">
                         </div>
                         <div class="form-group">
                              <label for="class_name">Class Name</label>
                              <input class="form-control" id="class_name" type="text" name="class_name">
                         </div>
                         <div class="form-group">
                              <label for="reason">Reason</label>
                              <textarea class="form-control" id="reason" name="reason"></textarea>
                         </div>
                         <input class="btn btn-primary" type="submit" value="Submit" />
                    </form>
               </div>
          </div>
       
     </body>

     </html>

<?php
} else {
     header("Location: student-login.php");
     exit();
}
?>