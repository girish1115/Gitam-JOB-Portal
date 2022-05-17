<?php
include_once('includes/config.php'); 

if(!empty($_POST["username"])) { 

    $rs=mysqli_query($con,"SELECT * FROM student WHERE student_idno='".$_POST["username"]."'"); 
    $user_count = mysqli_num_rows($rs);
    if($user_count>0) {
        echo "<span class='status-not-available'> Student ID Not Available</span>";
    }else{
        echo "<span class='status-available'> Student ID no is Available!</span>";
    }
  }
?>