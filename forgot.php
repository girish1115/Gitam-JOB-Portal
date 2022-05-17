<?php 

ob_start();

session_start();
include 'includes/config.php'; 
 
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
                background-image: url(images/password.jpg);
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

                    <a href="forgot.php" class="h1"><b>Forgot&nbsp;</b>Panel</a>

                </div>

                <div class="card-body">

                    <p class="login-box-msg">Enter your <b>E-Mail</b></p> 

                    <form action="forgot1.php" method="post">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="student_email" placeholder="Enter your E-mail">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="submit" name="btn_submit" class="btn btn-primary btn-block">Forgot</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div> 

        <!-- jQuery -->

        <script src="../../plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->

        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE App -->

        <script src="../../dist/js/adminlte.min.js"></script>

    </body>

</html>