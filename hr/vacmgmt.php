<?
include 'includes/auth.php';
include 'includes/header.php';
include "includes/config.php"; 
$sql=mysqli_query($con,"SELECT * from admin");
$row=mysqli_fetch_assoc($sql);
if(isset($_GET['del']) ){
    $result6=mysqli_query($con,"DELETE from `vacancy` where `vac_id`='".$_GET['del']."'");   
}
if(isset($_GET['show']) ){
    $result6=mysqli_query($con,"UPDATE `vacancy` set `vac_status`=1 where `vac_id`='".$_GET['show']."'");
    }   
  if(isset($_GET['hide']) ){  
    $result6=mysqli_query($con,"UPDATE `vacancy` set `vac_status`=0 where `vac_id`='".$_GET['hide']."'");
  } 
?> 
<style>
    #dataTable_filter {
	float: right;
}
    </style>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Profile</th> 
                                            <th>Designation</th> 
                                            <th>Salary</th>  
                                            <th>Venue</th> 
                                            <th>Date</th> 
                                            <th>Total Vacancy</th>  
                                            <th>Job Details</th>  
                                            <th>Tenth%</th> 
                                            <th>12%</th>  
                                            <th>Batch</th> 
                                            <th>Backlog</th> 
                                            <th>Degree</th> 
                                            <th>Branch</th>  
                                            <th>College%</th> 
                                            <th>Hide/ Show</th> 
                                            <th>Edit</th>
                                            <th>Delete</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?    
                                        $result=$con->query("SELECT * FROM `vacancy` where vac_company='".$_SESSION['name']."' ORDER BY `vac_id` ASC"); 
                                        $j=1;
                                        while($row1 = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?= $j++; ?></td> 
                                            <td><?=$row1['vac_profile']?></td>    
                                            <td><?=$row1['vac_designation']?></td> 
                                            <td><?=$row1['vac_salary']?></td>  
                                            <td><?=$row1['vac_venue']?></td>    
                                            <td><?=$row1['vac_date']?></td> 
                                            <td><?=$row1['vac_total']?></td> 
                                            <td><?//=$row1['vac_job']?>

                                             <?  if($row1['vac_job'] !=''){

                                  ?>

                                  <a class="btn  btn-primary"  id="click_to_see_job_info<?=$row1['vac_id']?>" onclick="click_to_see_job_info('<?=$row1['vac_id']?>')" style="color: #000000;background-color: #f6c23e;border:0px;"><b>Click To See Details</b></a>
                                 
                                  <div id="displ_job_info<?=$row1['vac_id']?>" style="display:none;" name ="displ_job_info" ><?=$row1['vac_job']?></div> <? } else { ?>
                                    <p> There is no information to show</p>

                                  <? } ?> 
                                                






                                            </td> 
                                            <td><?=$row1['vac_tenth']?></td>    
                                            <td><?=$row1['vac_twelve']?></td> 
                                            <td><?=$row1['vac_batch']?></td>  
                                            <td><?=$row1['vac_backlog']?></td>    
                                            <td><?=$row1['vac_degree']?></td> 
                                            <td><?=$row1['vac_branch']?></td> 
                                            <td><?=$row1['vac_college']?></td> 
                                            <td>
                                                <? if($row1['vac_status']==0){ ?>
                                                    <a class="btn btn-secondary" style="color: #fff;background-color: #6c757d;border-color: #6c757d;" href="vacmgmt.php?show=<?=$row1['vac_id']?>">Show</a>
                                                     <? 
                                                    }   
                                                    else { ?>  
                                                    <a class="btn btn-primary" href="vacmgmt.php?hide=<?=$row1['vac_id']?>">Hide</a>
                                                        <?  } ?> 
                                            </td> 
                                            <td><a class="btn btn-warning" href="vacancy.php?edit=<?=$row1['vac_id']?>">Edit</a></td>  
                                            <td><a class="btn btn-danger" href="vacmgmt.php?del=<?=$row1['vac_id']?>">Delete</a></td> 
                                        </tr>
                                        <? } ?>
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid --> 

                <script>
                    function click_to_see_job_info(click_to_see_job_info){
                
                                $(document).ready(function() {
                                 var myVar= $("#displ_job_info"+click_to_see_job_info).text();
                                 //console.log(myVar);
                                 
                                     swal({
                                            title: "Job Details",
                                            text: myVar,
                                            icon: "success",
                                            button: "Ok",
                                            timer: 60000
                                     });
                                     
                                });


                
            }

    </script>
            </div>
            <!-- End of Main Content -->

<?  include "includes/footer.php"; ?>