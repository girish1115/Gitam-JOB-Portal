<?
    include 'includes/config.php';
    include 'includes/auth.php';
    include 'includes/header.php';
    include 'includes/header2.php';
    error_reporting(0);

ob_start();
session_start();

if($_SESSION['admin_id'] == ''){
   echo   "<script> 
   alert('Please Login'); </script>";

  header( "location:../index.php" );
}

 $student_login = $_SESSION['student_id'];

$get_job_id = $_GET['jobid'];
$get_com_name =  $_GET['comid'] ;


?> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container mt-4">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
        <div class="row">

         
        <? $tt = mysqli_query($con,"SELECT * FROM `vacancy` WHERE `vac_id` = '".$get_job_id."' AND `vac_company` = '".$get_com_name."'");
        while($row1=mysqli_fetch_assoc($tt)){ ?>
         <h3> Job Details</h3>
        <div class="col-md-6">
              <div class="list-group">
                 <div class="list-group-item list-group-item-action"><label ><b>Job Profile: </b><?=$row1['vac_job'];?></label> </div>
                 <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Profile: </b><?=$row1['vac_profile'];?></label></div>

                  <div class="list-group-item list-group-item-action"><label ><b>Designation: </b><?=$row1['vac_designation'];?></label> </div>

                   <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Salary: </b><?=$row1['vac_salary'];?></label> </div>
                    
                     <div class="list-group-item list-group-item-action"><label ><b>Venue: </b><?=$row1['vac_venue'];?></label> </div>

                       <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Date: </b><?=$row1['vac_date'];?></label> </div>
                       <div class="list-group-item list-group-item-action"><label ><b>Total Vacancies: </b><?=$row1['vac_total'];?></label> </div>
                    
                         </div><br>
        </div>
        <h3> Selection Criteria</h3>
        <div class="col-md-6">
          <div class="list-group">
           <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>10th (%): </b><?=$row1['vac_tenth'];?></label></div>
            <div class="list-group-item list-group-item-action"><label ><b>12th (%): </b><?=$row1['vac_twelve'];?></label> </div>

            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Batch: </b><?=$row1['vac_batch'];?></label></div>
            <div class="list-group-item list-group-item-action"><label ><b>Backlogs: </b><?=$row1['vac_backlog'];?></label> </div>

            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Degree: </b><?=$row1['vac_degree'];?></label></div>
            <div class="list-group-item list-group-item-action"><label ><b>Branch: </b><?=$row1['vac_branch'];?></label> </div> 
            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>College: </b><?=$row1['vac_college'];?></label></div><br>
        </div>
      </div>
      <? } ?>

      <h3>Company Details</h3>
      <div class="row">
        <div class="col-md-6">
          <? $tt2 = mysqli_query($con,"SELECT * FROM `hr` WHERE `hr_fullname` = '".$get_com_name."'");
        while($row11=mysqli_fetch_assoc($tt2)){ ?>
           <div class="list-group">
          
            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Company Name: </b><?=$get_com_name;?></label></div>

            <? if($row11['hr_companydetails'] !='') { ?>
            <div class="list-group-item list-group-item-action"><label ><b>Company Details: </b><?=$row11['hr_companydetails'];?></label> </div>

          </div>
          <? } 
        }?>

           
       
      </div>
    </div>

      </div>
      </div><!-- /.container-fluid -->
    </section> 
            </div>
         <? include 'includes/footer.php'; ?>
        <script>
        $(document).ready(function() {
            
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>

    <script>

      function click_to_apply(click_to_apply,user_id){
                $.ajax({
                    url: 'vacancies.php?click_to_apply='+click_to_apply+'&user_id='+user_id,
                    type:"GET",
                    success: function(html) {

                                $(document).ready(function() {
                                     swal({
                                            title: "Your Request Is Successful.",
                                            text: "You Will Contact You Soon.",
                                            icon: "success",
                                            button: "Ok",
                                            timer: 5000
                                     });

                                     

                                     
                                      $("#displ_job_status"+click_to_apply).show();
                                      $("#click_to_apply"+click_to_apply).hide();
                                     
                                     
                                });

                    }
                });

                
            }

</script>
    </body>  
</html>