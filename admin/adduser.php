<?php
include_once('includes/config.php'); 
if(isset($_POST['btn_submit'])){  
     
    extract($_POST);    
    if(is_uploaded_file($_FILES['student_profile']['tmp_name'])){
        $temp=$_FILES['student_profile']['tmp_name'];
        $file=time()."-".$_FILES['student_profile']['name'];
        move_uploaded_file($temp,"uploads/students/".$file);  
        $file_sql="`student_profile`='$file'"; 
    }
    if(is_uploaded_file($_FILES['student_resume']['tmp_name'])){
        $files=$_FILES['student_resume']; 
        $temp=$_FILES['student_resume']['tmp_name'];
        $file=time()."-".$_FILES['student_resume']['name']; 
        move_uploaded_file($temp,"uploads/resume/".$file);  
        $file_sql1="`student_resume`='$file'";  
    }
    $date=date("d - m - Y"); 
    $rs=mysqli_query($con,"INSERT INTO `student` set student_name='$student_name',student_password='$student_password',student_idno='$student_idno',
    student_no='$student_no',student_email='$student_email',student_branch='$student_branch',
    student_address='$student_address',student_tenth='$student_tenth',student_inter='$student_inter', $file_sql,$file_sql1,
    student_grad='$student_grad',student_date='$date',student_verify='$student_verify'");   
    if($rs){  
      echo "<script>alert('Student Details Added Successfully');</script>";  
      header( "location:dashboard.php" ); 
    }
  }   
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Dashboard</title>
        <link rel="shortcut icon" href="images/favicon.jpg"> 
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <style type="text/css">
            body{
                background-image: url(images/register.png);
                background-size: cover;
                background-repeat: no-repeat;
            } 
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
        </style> 
    </head>
    <body class="hold-transition login-page">
    <div class="container">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href=" " class="h1"><b>Registration </b>Panel</a>
                <a href="index.php" class="btn btn-primary" style="float: right;">Sign In</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>Registration</b> </p>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_name" placeholder="Student Name" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                
                                <input type="text" class="form-control" name="student_idno" placeholder="Student ID number" id="username" onBlur="checkAvailability()" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                
                            </div>
                            <span id="user-availability-status" style="margin-bottom: 5px;display: block;"></span>  
                            <div class="input-group mb-3"> 
                                <input type="password" class="form-control" minlength="6" name="student_password" placeholder="Password (8 characters minimum)" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                        
                                    </div>
                                   
                                </div>
                                <p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
                            </div>
                            <div class="input-group mb-3">
                                <input type="tel" pattern="[0-9]{10}" class="form-control" name="student_no" placeholder="Student Phone number" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_email" placeholder="Student Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-control" name="student_branch" required>
                                    <option>Select Branch</option>
                                    <?  
                                        $rrr=mysqli_query($con,"SELECT * FROM `branch` ORDER BY branch_id ASC"); 
                                        while($r1=mysqli_fetch_assoc($rrr)){ ?>
                                            <option value="<?=$r1['branch_name']?>"><?=$r1['branch_name']?></option>
                                    <? }  
                                    ?>
                                </select>  
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="student_address" placeholder="Student Address" required></textarea> 
                            </div> 
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_tenth" placeholder="Student 10th %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_inter" placeholder="Student Inter %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_grad" placeholder="Student Under Graduation %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group"> 
                                            <label class="mr-2">Profile Picture</label> 
                                            <div class="custom-file">
                                                <input type="file" name="student_profile"> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="student_verify" value="0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group"> 
                                            <label class="mr-2">Resume</label>
                                            <div class="custom-file">
                                                <input type="file" name="student_resume"> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-3">
                        
                    </div>
                    </div>
                    <div class="row" style="padding-bottom:30px;"> 
                        <!-- /.col -->
                          <div class="col-4">   </div>               
                        <div class="col-4">
                            <button type="submit" name="btn_submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div> 
                </form> 
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box --> 
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>  
        $(function () {
            bsCustomFileInput.init();
        });  
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
            url: "ajax.php",
            data:'username='+$("#username").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
            });
        }
    </script>
</body>
</html>