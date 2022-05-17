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

                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                                <?
                                    $rs=mysqli_query($con,"SELECT COUNT(vac_status) AS total from vacancy where vac_company='".$_SESSION['name']."' ");  
                                    $row=mysqli_fetch_assoc($rs);
                                ?>
                                <p><img src="images/job.png" style="height:50px"></p><br>
                                <p><?=$row['total']?></p><br>
                                <p>Job Posted</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                                <?
                                    $rs=mysqli_query($con,"SELECT COUNT(student_id) AS total from applied_jobs where company_name='".$_SESSION['name']."'");  
                                    $row=mysqli_fetch_assoc($rs);
                                ?>
                                <p><img src="images/comp.png" style="height:50px"></p><br>
                                <p><?=$row['total']?></p><br>
                                <p>Application for Jobs</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- /.container-fluid --> 
            </div>
            <!-- End of Main Content -->

<?  include "includes/footer.php"; ?>