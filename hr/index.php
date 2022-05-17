<? 
ob_start();
session_start();
include_once('includes/config.php');
$query = mysqli_query($con, "SELECT * from `admin`");
$counts  = mysqli_num_rows($query);
if(isset($_POST['btn_submit']))
{ 
 $email = $_POST['hr_email'];
 $pwd = $_POST['hr_pass'];  
 $sql = mysqli_query($con,"SELECT * from `hr` where `hr_email` = '$email' and `hr_pass` = '$pwd'");   
 $count  = mysqli_num_rows($sql);
 $row= mysqli_fetch_assoc($sql);
 if ($count>0 )
 {        
     $_SESSION['email'] = $email;
     $_SESSION['name'] = $row['hr_fullname'];
     $_SESSION['hr_id'] = $row['hr_id'];  
     header( "location:dashboard.php" );    
 }
 else
 {    
   $err = "Invalid Credentials.";  
   echo "<script type='text/javascript'>alert('$err');</script>";
 }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>Company Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post"> 
                                        <div class="form-group">
                                            <input type="email" name="hr_email" class="form-control form-control-user" required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="hr_pass" class="form-control form-control-user" required id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button name="btn_submit" class="btn btn-primary btn-user btn-block" style="background-color:crimson;border-color:crimson">
                                            Login
                                        </button>
                                    </form>
                                    <p><a href="../index.php"style="display: block;margin-top: 10px;" class="btn btn-primary">Home</a></p> 
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body> 
</html>