<?
include 'includes/auth.php';
include 'includes/header.php';
include "includes/config.php"; 
if(isset($_POST['btn_submit'])){
    extract($_POST);
        $rs1=mysqli_query($con,"UPDATE hr set `hr_fullname`='$hr_fullname',hr_email='$hr_email', hr_number='$hr_number',hr_pass='$hr_pass' where `hr_id`='".$_GET['id']."'");  
   
    if($rs1){
        echo "<script>alert('Vacancy Details Updated Successfully');</script>";
    }
} 
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
                <?  $rs=mysqli_query($con,"Select * from `hr` where hr_id='".$_GET['id']."'");  
                    $row1=mysqli_fetch_assoc($rs);
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Details</h1>
                    <form method="post" action='' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Company Name</label>
                            <input type="text" name="hr_fullname" value="<?=$row1['hr_fullname']?>" required class="form-control"/>
                        </div>  
                        <div class="col-md-3">
                            <label>Company Email</label>  
                            <input type="text" class="form-control" id="hiddenval" name="hr_email" value="<?=$row1['hr_email']?>"> <br />
                            
                        </div>   
                        <div class="col-md-3">
                            <label>Company Number</label>
                            <input type="text" name="hr_number" value="<?=$row1['hr_number']?>" required class="form-control"/>
                        </div> 
                        <div class="col-md-3">
                            <label>Password</label>
                            <input type="text" name="hr_pass" value="<?=$row1['hr_pass']?>" required class="form-control"/>
                        </div> 
                    </div> 
                        <div class="row mt-3"> 
                            <div class="col-md-4" style="margin-top: 30px;">
                                <button type="submit" name="btn_submit" class="btn btn-primary">Edit Company Profile</button>
                            </div>
                        </div> 
                </form>
                </div>
                <!-- /.container-fluid --> 
            </div>
            <!-- End of Main Content -->

<?  include "includes/footer.php"; ?>