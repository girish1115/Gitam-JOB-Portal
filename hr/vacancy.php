<?
include 'includes/auth.php';
include 'includes/header.php';
include "includes/config.php"; 
error_reporting(0); 
    if(isset($_POST['btn_submit'])){    
         
        extract($_POST);   
        $company=$_SESSION['name']; 
        if($_GET['edit']!=''){ 
            $rs1=mysqli_query($con,"UPDATE vacancy set `vac_profile`='$vac_profile',vac_designation='$vac_designation', 
            vac_salary='$vac_salary',vac_venue='$vac_venue',vac_date='$vac_date',vac_total='$vac_total',vac_company='$company',
            `vac_job`='$vac_job',vac_tenth='$vac_tenth', vac_twelve='$vac_twelve',vac_batch='$vac_batch',vac_backlog='$vac_backlog',
            vac_degree='$vac_degree',vac_branch='$vac_branch',vac_college='$vac_college' where `vac_id`='".$_GET['edit']."'");  
        if($rs1){
            echo "<script>alert('Vacancy Details Updated Successfully');</script>";
        }
        else{
            echo "<script>alert('Vacancy Details didnt Update');</script>";
        }
    } 
        else {
            $rs=mysqli_query($con,"INSERT INTO `vacancy` set `vac_profile`='$vac_profile',vac_designation='$vac_designation', 
            vac_salary='$vac_salary',vac_venue='$vac_venue',vac_date='$vac_date',vac_total='$vac_total',vac_company='$company',
            `vac_job`='$vac_job',vac_tenth='$vac_tenth', vac_twelve='$vac_twelve',vac_batch='$vac_batch',vac_backlog='$vac_backlog',
            vac_degree='$vac_degree',vac_branch='$vac_branch',vac_college='$vac_college'"); 
             
            if($rs){
                echo "<script>alert('Vacancy Details Added Successfully');</script>";
            }
            else echo "<script>alert('Vacancy Details Not Added');</script>";  
        }
    }    
    $sql1=mysqli_query($con,"SELECT * from vacancy where `vac_id`='".$_GET['edit']."'"); 
    $row1=mysqli_fetch_assoc($sql1);    
?> 
<style>
    .pass_code{
        font-size: 18px;
        font-weight: 600;
        color: tomato;
        background-color: ivory;
        padding: 7px;
        border-radius: 5px;
    }
    </style>
     <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
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
                    <h1 class="h3 mb-4 text-gray-800">Add Vacancy</h1>
                    <form method="post" action='' enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-4">
                                <label>Profile Type</label>
                                <input type="text" name="vac_profile" value="<?=$row1['vac_profile']?>" required class="form-control"/>
                            </div>  
                            <div class="col-md-4">
                                <label>Designation</label>  
                                <input type="text" class="form-control" id="hiddenval" name="vac_designation" value="<?=$row1['vac_designation']?>"> <br />
                                
                            </div>   
                            <div class="col-md-4">
                                <label>Salary</label>
                                <input type="text" name="vac_salary" value="<?=$row1['vac_salary']?>" required class="form-control"/>
                            </div> 
                        </div> 
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label>Venue</label>
                                <input type="text" name="vac_venue" value="<?=$row1['vac_venue']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>Date</label>
                                <input type="date" name="vac_date" value="<?=$row1['vac_date']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>Total Vacancy</label>
                                <input type="number" name="vac_total" value="<?=$row1['vac_total']?>" required class="form-control"/>
                            </div>
                        </div> 
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label>Job Details</label>
                                <textarea class="form-control" id="editor1" name="vac_job" required><?=$row1['vac_job']?></textarea> 
                                <script>

                                CKEDITOR.replace( 'editor1' );

                                </script>

                            </div>
                            <div class="col-md-4">
                                <label>12%</label>
                                <input type="number" name="vac_twelve" value="<?=$row1['vac_twelve']?>" required class="form-control"/>
                            </div> 
                        </div> 
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label>Batch</label>
                                <input type="text" name="vac_batch" value="<?=$row1['vac_batch']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>Backlog</label>
                                <input type="text" name="vac_backlog" value="<?=$row1['vac_backlog']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>Degree</label>
                                <input type="text" name="vac_degree" value="<?=$row1['vac_degree']?>" required class="form-control"/>
                            </div>
                        </div> 
                        <div class="row mt-3">
                          <div class="col-md-4">
                                <label>10%</label>
                                <input type="number" name="vac_tenth" value="<?=$row1['vac_tenth']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>Branch</label>
                                <input type="text" name="vac_branch" value="<?=$row1['vac_branch']?>" required class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <label>College%</label>
                                <input type="number" name="vac_college" value="<?=$row1['vac_college']?>" required class="form-control"/>
                            </div> 
                        </div> 
                        <div class="row mt-3"> 
                            <div class="col-md-4" style="margin-top: 30px;">
                                <button type="submit" name="btn_submit" class="btn btn-primary">Add Vacancy</button>
                            </div>
                        </div> 
                    </form>
                </div>
                <!-- /.container-fluid --> 
            </div>
        </div>
            <!-- End of Main Content -->
         
<?  include "includes/footer.php"; ?>