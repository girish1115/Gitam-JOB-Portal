<?

    include 'includes/config.php';

    include 'includes/auth.php';

    include 'includes/header.php';

    include 'includes/header3.php';
    error_reporting(0); 



ob_start();

session_start();



if($_SESSION['student_id'] == ''){

   echo   "<script> 

   alert('Please Login'); </script>";



  header( "location:index1.php" );

}



 $student_login = $_SESSION['student_id'];



$job_id = $_GET['click_to_apply'];

$user_id_for_job =  $_GET['user_id'] ;

$company_name =  $_GET['comname'] ;



if($job_id !='' && $user_id_for_job !=''){

   /* $insert = mysqli_query($con,"UPDATE `applied_jobs` SET

        `job_status` = '1' WHERE `student_id` = '".$job_id."' AND `job_id` = '".$user_id_for_job."'");*/

        $insert = mysqli_query($con,"INSERT INTO  `applied_jobs` SET

        `job_status` = '1' , `job_id` = '".$job_id."' , `student_id` = '".$user_id_for_job."',

        `company_name` = '".$company_name."'");



        



}

    

?> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="container mt-4">

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) --> 

        <table id="example" class="display" style="width:100%">

          <thead>

            <tr>

                <td>S. No</td>

                <td>Profile Type</td>

                <td>Designation</td>            

                <td>Annual Salary</td>   

                <td>Venue</td>  

                <td>Event Date</td>  

                <td>Total Vacancy</td> 

                <td>Company Name</td>
                <td>Company Logo</td>

                <td>View Details</td> 

                 <td>Apply Now</td> 

            </tr>

          </thead>

        <tbody>

        <?  

            $result=$con->query("SELECT * FROM `vacancy` vac LEFT JOIN hr hh on vac.vac_company=hh.hr_fullname where vac_status=1 ORDER BY vac_id ASC"); 

            $j=1;

             



                   // 



            while($row = mysqli_fetch_assoc($result)) { ?> 

            <tr>

                <td><?= $j++; ?></td>

                <td><?=$row['vac_profile']?></td>  

                <td><?=$row['vac_designation']?></td>  

                <td><?=$row['vac_salary'] ?></td>  

                <td><?=$row['vac_venue'] ?></td> 

                <td><?=$row['vac_date'] ?></td>  

                <td><?=$row['vac_total']?></td>   

                <td><?=$row['vac_company']?></td> 
                <td><img src="admin/<?=$row['hr_profile']?>" style="height:80px"></td>

                 <td> <a class="btn  btn-primary"  href="view.php?jobid=<?=$row['vac_id']?>&comid=<?=$row['vac_company']?>" style="color: #000000;background-color: #f6c23e;border:0px;"><b>Click To View</b></a></td>  

                <td>

                    <? 





                    $check_qry = mysqli_query($con,"SELECT * FROM `applied_jobs` WHERE 

                    `student_id` = '".$student_login."' AND `job_id` = '".$row['vac_id']."'");

           


                     if(mysqli_num_rows($check_qry) == 0 ) { ?>

                             <a class="btn  btn-primary"  id="click_to_apply<?=$row['vac_id']?>" onclick="click_to_apply('<?=$row['vac_id']?>','<?=$student_login?>','<?=$row['vac_company']?>')" style="color: #000000;background-color: #f6c23e;border:0px;"><b>Click To Apply</b></a>

                                 

                                  <div id="displ_job_status<?=$row['vac_id']?>" style="display:none;"><b>

                                  Processing</b></div> 

                  <? } else {

                   while($row2 = mysqli_fetch_assoc($check_qry)){ 



                   ///if($row2[job_status] == 0){

                        ?>

                         <!--<a class="btn  btn-primary"  id="click_to_apply<?//=$row['vac_id']?>" onclick="click_to_apply('<?//=$row['vac_id']?>','<?=$student_login?>')" style="color: #000000;background-color: #f6c23e;border:0px;"><b>Click To Apply</b></a>

                                 

                                  <div id="displ_job_status<?//=$row['vac_id']?>" style="display:none;"><b>Processing</b></div>--> <? //} else

                                  if($row2['job_status'] == 1) { ?>

                                    <b>Processing</b>



                                  <? } elseif($row2['job_status'] == 2) { ?>

                                    <b>You are hired.</b>



                                <? }elseif($row2['job_status'] == 3){ ?>

                                    <b>You are rejected.</b>



                                <? }



                              }



                          }?> 







                    </td>  

            </tr>

            <? } ?>

        </tbody> 

        </table>

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



      function click_to_apply(click_to_apply,user_id,company_name){

                $.ajax({

                    url: 'vacancies.php?click_to_apply='+click_to_apply+'&user_id='+user_id+'&comname='+company_name,

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