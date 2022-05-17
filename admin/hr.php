<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
error_reporting(0);
      if(isset($_POST['btn_submit']) == 'ok'){   
        $name = $_POST['hr_fullname']; 
        $pass = $_POST['hr_pass'];
        $email = $_POST['hr_email'];  
        $num = $_POST['hr_number'];
  
    
       
        include 'mail/class.phpmailer.php';
    $output = '';
   
        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        // $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = '587';                                //587Sets the default SMTP server port
        $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    
      $mail->Username = 'batchfourteenb5@gmail.com';               //Sets SMTP username
       
        $mail->Password = 'AsDf@1234';                          //Sets SMTP password
        $mail->SMTPSecure = 'tls';                          //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From =  'batchfourteenb5@gmail.com';         //Sets the From email address for the message
        $mail->FromName = 'Company HR Manger';                 //Sets the From name of the message 
        $mail->AddAddress($email, $name); //Adds a "To" address
        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Hi '.$name.' Your Account Is Created.'; //Sets the Subject of the message
        //An HTML or plain text message body
        $mail->Body = '<h3> Hi '.$name.'<br>
        Your HR account is created successfully<br>
        <h3>  HR login details are in below.<br>
        <b>Email: </b>'.$email.'<br>
        <b>Number: </b>'.$num.'<br>
        <b>Password: <b>'. $pass;

        $mail->AltBody = '';

        $result = $mail->Send();                        //Send an Email. Return true on success or false on error
         $result;
            
             if( $result){
              
                echo "<script>alert('The email message was sent.')</script>"; 
            }
 

        extract($_POST);  
       
        if($_GET['edit'] !=''){ 
                if($hr_email=='' || $hr_pass=='' || $hr_fullname=='' || $hr_number=='' ) {
                  echo "<script>alert('Branch Name should not be empty');</script>";
                } else {
                $result=mysqli_query($con,"UPDATE `hr` set hr_fullname='$hr_fullname',hr_pass='$hr_pass',hr_email='$hr_email',hr_number='$hr_number',hr_companydetails='$hr_companydetails',hr_profile ='$file' where `hr_id`='".$_GET['edit']."'"); 	
                if($result){
                  echo "<script>alert('TPO Details Updated Successfully');</script>";
              }
              }
              }  else{

                 /*if(is_uploaded_file($_FILES['hr_profile']['tmp_name'])){
                $temp=$_FILES['hr_profile']['tmp_name'];
                $file=$_FILES['hr_profile']['name'];
                 move_uploaded_file($temp,"/uploads/company/".$file);  
              //  $file_sql="`hr_profile`='$file'"; 
                //$file_sql=$file; 
            }*/

              $target_path = "uploads/company/";  
             // $file = $target_path.basename($_FILES['hr_profile']['name']);
               $file=$target_path.time()."-".$_FILES['hr_profile']['name'];
            //  print_r($_FILES['hr_profile']);   
  
              if(move_uploaded_file($_FILES['hr_profile']['tmp_name'], $file)) {  
              //    echo "File uploaded successfully!";  
              } else{  
                //  echo "Sorry, file not uploaded, please try again!";  
              }  


              $rs=mysqli_query($con,"INSERT INTO `hr` set hr_fullname='$hr_fullname',hr_pass='$hr_pass',hr_email='$hr_email',hr_number='$hr_number',hr_companydetails='$hr_companydetails',hr_profile ='$file'"); 
             //  echo "INSERT INTO `hr` set hr_fullname='$hr_fullname',hr_pass='$hr_pass',hr_email='$hr_email',hr_number='$hr_number',hr_companydetails='$hr_companydetails',hr_profile ='$file'";
              if($rs){
                    echo "<script>alert('TPO Details Added Successfully');</script>";
                }

             
            }
        }
$rr=mysqli_query($con,"select * from `hr` where `hr_id`='".$_POST['edit']."'"); 
$rw=mysqli_fetch_assoc($rr);
 
?> 
     <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col --> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row"> 
             <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="input-group mb-3">
                    <label class="mr-3">Email</label><br />
                    <input type="email" class="form-control" name="hr_email" value="<?=$rw['hr_email']?>" placeholder="Email HR" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div> 
                <div class="input-group mb-3"> 
                  <label class="mr-3">Password</label><br>
                    <button class="btn btn-primary ml-4 mr-4 mb-2" onclick = "gfg_Run()">Generate Password</button> <br>
                    <span id="geeks" style="display:none" class="pass_code"></span> 
                    <input type="text" class="form-control" min-length='6' id="hiddenval" value="<?=$rw['hr_pass']?>" name="hr_pass" placeholder="Company Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div> 
                </div>
             </div>
          </div> 
          <div class="row"> 
             <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="input-group mb-3">
                    <label class="mr-3">Full name</label><br />
                    <input type="text" class="form-control" name="hr_fullname" value="<?=$rw['hr_fullname']?>" placeholder="Company Name" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3"> 
                    <label class="mr-3">Number</label><br />
                    <input type="tel" pattern="[0-9]{10}" class="form-control" value="<?=$rw['hr_number']?>" name="hr_number" placeholder="HR Number" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div> 
                </div>
             </div>
          </div> 
          <div class="row"> 
             <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="input-group mb-3">
                    <label class="mr-3">Company Details</label><br />
                    <textarea class="form-control" id="editor1" placeholder="Company Profile" required name="hr_companydetails"></textarea>  
                    <script>  CKEDITOR.replace( 'editor1' );  </script>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group"> 
                            <label class="mr-2">Upload Logo</label>
                            <div class="custom-file">
                                <input type="file" name="hr_profile"> 
                            </div> 
                        </div>
                    </div>
                </div>
             </div>
          </div> 
          <div class="row">
            <div class="col-md-4">
              <button type="submit" name="btn_submit" value="ok" class="btn btn-primary btn-block"><? if($_GET['edit'] !='') echo "Update"; else echo "Register";?></button>
            </div>
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      <script>
          var el_down = document.getElementById("geeks");  
              /* Function to generate combination of password */
              function generateP() {
                  var pass = '';
                  var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 'abcdefghijklmnopqrstuvwxyz0123456789@#$';
                      
                  for (i = 1; i <= 8; i++) {
                      var char = Math.floor(Math.random() * str.length + 1); 
                      pass += str.charAt(char)
                  } 
                  return pass;
              } 
              function gfg_Run() {
                  var passcode =generateP();
                  el_down.innerHTML = passcode;
                  document.getElementById("hiddenval").value = passcode;
              }
      </script> 
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>