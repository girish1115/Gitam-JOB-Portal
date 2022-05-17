<?
include 'includes/auth.php';
include 'includes/header.php';
include "includes/config.php"; 
$sql=mysqli_query($con,"SELECT * from admin");
$row=mysqli_fetch_assoc($sql);
?> 
<body id="page-top"> 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <? include "includes/sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <? include "includes/header2.php"; ?>
                <!-- End of Topbar -->
                <?  $rs=mysqli_query($con,"Select * from `hr` where hr_id='".$_SESSION['hr_id']."'");  
                    $rw=mysqli_fetch_assoc($rs);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Details</h1>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <label style="padding-right: 10px;"><b>Company Name:</b></label><span><?=$rw['hr_fullname']?></span> <br>
                            <label style="padding-right: 10px;"><b>Company Email:</b></label><span><?=$rw['hr_email']?></span> <br>
                            <label style="padding-right: 10px;"><b>Company Number:</b></label><span><?=$rw['hr_number']?></span> <br>
                            <label style="padding-right: 10px;"><b>Password:</b></label><span><?=$rw['hr_pass']?></span> <br>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                        </div>  
                        <div class="col-md-4">
                            <a href="edit.php?id=<?=$_SESSION['hr_id']?>" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid --> 
            </div>
            <!-- End of Main Content -->

<?  include "includes/footer.php"; ?>