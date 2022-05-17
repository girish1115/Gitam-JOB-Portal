<?
include 'includes/auth.php';
include 'includes/header.php';
include "includes/config.php"; 
error_reporting(0); 
$sql=mysqli_query($con,"SELECT * from admin");
$row=mysqli_fetch_assoc($sql);
if(isset($_GET['del']) ){
    $result6=mysqli_query($con,"DELETE from `vacancy` where `vac_id`='".$_GET['del']."'");   
}
if(isset($_GET['reject']) ){
    $result6=mysqli_query($con,"UPDATE `applied_jobs` set `job_status`=3 where `applied_jobs_id`='".$_GET['reject']."'");
    }   
  if(isset($_GET['hire']) ){  
    $result6=mysqli_query($con,"UPDATE `applied_jobs` set `job_status`=2 where `applied_jobs_id`='".$_GET['hire']."'");


include 'mail/class.phpmailer.php';
    $output = '';
   
        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        // $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
    //  $mail->Host = 'smtp.tauriustech.com';//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';                                //587Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    
    $mail->Username = 'batchfourteenb5@gmail.com';               //Sets SMTP username
       
        $mail->Password = 'AsDf@1234';                          //Sets SMTP password
        $mail->SMTPSecure = 'tls';                          //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From =  $_SESSION["hr_only_mail"];         //Sets the From email address for the message
        $mail->FromName = $_SESSION['name'];                 //Sets the From name of the message
        
        $mail->AddAddress($_GET['mail'], $_GET['nam']); //Adds a "To" address
        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Hi '.$_GET['nam'].' Congrats You Got Hired.'; //Sets the Subject of the message
        //An HTML or plain text message body
        $mail->Body = '<h3> Hi '.$_GET['nam'].'<br>
        congratulation you hired in '.$_SESSION['name'].'<br>
        <h3> Contant our HR with below details.<br>
        <b>Email: </b>'.$_SESSION["hr_only_mail"].'<br>
        <b>Number: </b>'.$_SESSION["hr_number"].'<br>
        <b>Comany Details: <b>'.$_SESSION["compla_deta"];

        $mail->AltBody = '';

        $result = $mail->Send();                        //Send an Email. Return true on success or false on error
        echo $result;

       
    


  } 

  if($_POST['interview_but'] !='' ){
    //$result6=mysqli_query($con,"UPDATE `applied_jobs` set `job_status`=3 where `applied_jobs_id`='".$_GET['reject']."'");

   // echo $_POST['interview_but'];
    $bre = explode("_",$_POST['interview_but']);
    $id = $bre[1];


    $interview_email= $_POST['interview_email'.$id];
    $interview_name=  $_POST['interview_name'.$id];
     $zoom_link=  $_POST['zoom_link'.$id];


      $result6=mysqli_query($con,"UPDATE `applied_jobs` set `job_interview_link` = '".$zoom_link."',`job_interview_status`=1 where `applied_jobs_id`='".$id."'");


include 'mail/class.phpmailer.php';
    $output = '';
   
        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        // $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
    //  $mail->Host = 'smtp.tauriustech.com';//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';                                //587Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
     
    $mail->Username = 'batchfourteenb5@gmail.com';               //Sets SMTP username
       
        $mail->Password = 'AsDf@1234';                          //Sets SMTP password
        $mail->SMTPSecure = 'tls';                          //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From =  $_SESSION["hr_only_mail"];         //Sets the From email address for the message
        $mail->FromName = $_SESSION['name'];                 //Sets the From name of the message
        
        $mail->AddAddress($interview_email,  $interview_name); //Adds a "To" address
        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Hi '.$interview_name.' Congrats You Got Selected For Interview.'; //Sets the Subject of the message
        //An HTML or plain text message body
        $mail->Body = '<h3> Hi '.$interview_name.'<br>
        congratulation you are selected for interview in '.$_SESSION['name'].'<br>
        <h3> HR with below details and interview link.<br>
        <b>Link: </b>'.$zoom_link.'<br>
        <b>Email: </b>'.$_SESSION["hr_only_mail"].'<br>
        <b>Number: </b>'.$_SESSION["hr_number"].'<br>
        <b>Comany Details: <b>'.$_SESSION["compla_deta"];

        $mail->AltBody = '';

        $result = $mail->Send();                        //Send an Email. Return true on success or false on error
       







    }  
?> 
<style>
    #dataTable_filter {
	float: right;
}
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                            <th>Applicant Detail</th>
                                            <th>Job Detail</th>
                                            <th>Schedule Interview</th>
                                            <th>Hire Now</th> 
                                            <th>Reject Application</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?    

                                    $only_for_hr =  mysqli_query($con,"SELECT * FROM `hr` WHERE  `hr_fullname` = '".$_SESSION['name']."' LIMIT 1");
                                    while($you=mysqli_fetch_assoc($only_for_hr)){
                                    $_SESSION["hr_only_mail"] = $you['hr_email'];
                                    $_SESSION["hr_number"] = $you['hr_number'];
                                    $_SESSION["compla_deta"] = $you['hr_companydetails'];
                                }
                                   

 $j=1;

                    $applied_jobs = mysqli_query($con,"SELECT * FROM `applied_jobs` WHERE `company_name` = '".$_SESSION['name']."'");

                  //  echo "SELECT * FROM `applied_jobs` WHERE `company_name` = '".$_SESSION['name']."'";

                  

                  //  echo "SELECT * FROM `vacancy` WHERE `vac_company` = '".$_SESSION['name']."'";

                  //  while($applied_jobs_row = mysqli_fetch_assoc($applied_jobs) AND $vacancy_row = mysqli_fetch_assoc($vacancy)){
                    while($applied_jobs_row = mysqli_fetch_assoc($applied_jobs)){

                      

                       // echo mysqli_num_rows($applied_jobs_row);

                        $get_student = mysqli_query($con,"SELECT * FROM `student` WHERE `student_id` = '".$applied_jobs_row['student_id']."'");
                        // echo "SELECT * FROM `student` WHERE `student_id` = '".$applied_jobs_row['student_id']."'";

                      //

                        while($get_student_row = mysqli_fetch_assoc($get_student)){

                               $vacancy = mysqli_query($con,"SELECT * FROM `vacancy` WHERE `vac_company` = '".$_SESSION['name']."' AND `vac_id` = '".$applied_jobs_row['job_id']."'");
                             while($vacancy_row = mysqli_fetch_assoc($vacancy)){
                            

                         ?>



  <tr>
                                        <td><?=$j++; ?></td> 
                                        <td>
                                                      

                                         <div class="list-group">
                            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Applicant Name: </b><?=$get_student_row['student_name'];?></label></div>

                              <div class="list-group-item list-group-item-action"><label ><b>Roll No: </b><?=$get_student_row['student_idno'];?></label> </div>

                              
                              <div class="list-group-item list-group-item-action list-group-item-primary"> <label><b>Email: </b><?=$get_student_row['student_email'];
                             // $_SESSION["for_mail"] =$row3['student_email']; ?></label>  </div>

                               <div class="list-group-item list-group-item-action"><label ><b>Resume: </b><a href="https://www.tauriustech.com/tpo/uploads/resume/<?=$get_student_row['student_resume'];?>" target="_blank">Click To See.</a></label> </div>

                         
                              </div>
                                                    
                                                    <? //}
                                                     //} ?>
                                                </td> 

                                               <? 
                                /*  if($applied_jobs_row['student_id'] != $get_student_row['student_id'] ){

                                  } else {*/


                                            ?>


                                            <td><?//=$row1['vac_profile']?>
                                            
           
                                                
                         <div class="list-group">
                            <div class="list-group-item list-group-item-action list-group-item-info"><label ><b>Profile: </b><?=$vacancy_row['vac_profile'];?></label></div>

                              <div class="list-group-item list-group-item-action"><label ><b>Designation: </b><?=$vacancy_row['vac_designation'];?></label> </div>

                              
                              <div class="list-group-item list-group-item-action list-group-item-primary"> <label><b>Salary: </b><?=$vacancy_row['vac_salary'];?></label>  </div>

                         </div>
                    



                                            </td>   

                                              <td>
                                                <?  


                                                if($applied_jobs_row['job_interview_status']==0){ ?>
                                                      
                                                    
                                                    <a class="btn btn-primary" id="set_interview<?=$applied_jobs_row['applied_jobs_id']?>"
                                                        onclick="set_interview('<?=$applied_jobs_row['applied_jobs_id']?>')">Set</a>

                                                          <div class="form-group" id="div_interview<?=$applied_jobs_row['applied_jobs_id']?>" style="display: none;">

                                                            <form action="" method="post" name="f">

                                                  <input type="hidden" value='<?=$get_student_row['student_email']?>' name="interview_email<?=$applied_jobs_row['applied_jobs_id']?>">
                                                    <input type="hidden" value='<?=$get_student_row['student_name'];?>' name="interview_name<?=$applied_jobs_row['applied_jobs_id']?>">

                                                  <textarea class="form-control" name="zoom_link<?=$applied_jobs_row['applied_jobs_id']?>" class="form-control" rows="5" placeholder="Enter Zoom Link" required></textarea><br>

                                                   <button type="submit" class="btn btn-primary" name="interview_but" value="interviewbut_<?=$applied_jobs_row['applied_jobs_id']?>" onclick="send_zoom_link('<?=$applied_jobs_row['applied_jobs_id']?>')">Send</button>

                                               </form>
                                                 

                                                </div>




                                                        <?  }elseif($applied_jobs_row['job_interview_status']==1) { ?> 
                                                            Link Sent.

                                                         <?  }
                                                         ?>
                                            </td> 


                                 <td>
                                                <?  


                                                if($applied_jobs_row['job_status']==1){ ?>
                                                      
                                                    
                                                    <a class="btn btn-primary" href="applications.php?hire=<?=$applied_jobs_row['applied_jobs_id']?>&mail=<?=$get_student_row['student_email'];?>&=<?=$get_student_row['student_name'];?>">Hire</a>
                                                        <?  }elseif($applied_jobs_row['job_status']==2) { ?> 
                                                            Hired

                                                         <?  }elseif($applied_jobs_row['job_status']==3) { ?> 
                                                            Rejected

                                                        <? }

                                                         ?>
                                            </td> 
                                            <td>
                                                <? if($applied_jobs_row['job_status']==1){ ?>
                                                     
                                                    <a class="btn btn-warning" href="applications.php?reject=<?=$applied_jobs_row['applied_jobs_id']?>">Reject</a>
                                                        <?  }elseif($applied_jobs_row['job_status']==2) { ?> 
                                                            Hired

                                                         <?  }elseif($applied_jobs_row['job_status']==3) { ?> 
                                                            Rejected

                                                        <? } ?>


                                                <!--<a class="btn btn-warning" href="vacancy.php?edit=<?//=$row1['vac_id']?>">Edit</a>-->
                                            </td>  
                                            <!--<td><a class="btn btn-danger" href="vacmgmt.php?del=<?//=$row1['vac_id']?>">Delete</a></td>Taurius -->
                                        </tr>


                                        </tr>

              <?         

                             // }   
                         }
                        }







                    }

                    //---------------------------------------------------------------------------
                                    ?>

                                       
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid --> 
            </div>
            <!-- End of Main Content -->
            <script>
                function set_interview(set_interview){
  

                 $(document).ready(function() {
                  $("#set_interview"+set_interview).hide();
                    $("#div_interview"+set_interview).show();
                               
                               });

                             
                }
</script>

<?  include "includes/footer.php"; ?>