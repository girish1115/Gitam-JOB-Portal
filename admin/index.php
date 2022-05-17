 <?php 
ob_start();
session_start();
include_once('includes/config.php');
$query = mysqli_query($con, "SELECT * from `admin`");
$counts  = mysqli_num_rows($query);
if(isset($_POST['btn_submit']))
{ 
 $name = $_POST['admin_name'];
 $pwd = $_POST['admin_pass'];  
 $sql = mysqli_query($con,"SELECT * from `admin` where `admin_name` = '$name' and `admin_pass` = '$pwd'");  
 //print_r("SELECT * from `admin` where `admin_name` = '$name' and `admin_pass` = '$pwd'");
 $count  = mysqli_num_rows($sql);
 $row= mysqli_fetch_assoc($sql);
 if ($count>0 )
 {      
  
     $_SESSION['name'] = $name;
     $_SESSION['admin_id'] = $row['admin_id'];  
     header( "location:dashboard.php" );    
 }
 else
 {    
   $err = "Invalid Credentials.";  
   echo "<script type='text/javascript'>alert('$err');</script>";
 }
} 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard</title>
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
                background-image: url(images/preview.jpg);
                background-size: cover;
                background-repeat: no-repeat;
            } 
        </style> 
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php" class="h1"><b>Admin&nbsp;</b>Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>Sign in</b> to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="admin_name" placeholder="Admin User Id">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="admin_pass" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        <? if($counts<1) {?>
                            <p>If you are new <a href="register.php">Register here</a></p> 
                            <? }    
                            if($counts>=1) { ?>
                           <!--  <p><a href="forgot.php">Forgot Password</a></p>  --><? } ?>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-3"></div>
                        <div class="col-3">
                        <p><a href="../index.php" class="btn btn-primary">Home</a></p> 
                        </div>
                        <div class="col-4">
                            <button type="submit" name="btn_submit" class="btn btn-primary btn-block">Sign In</button>
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
</body>
</html>