<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(isset($_POST['btn_submit']) && $_GET['edit']!=''){  
    extract($_POST);  
     if(is_uploaded_file($_FILES['student_profile']['tmp_name']) && !empty($_FILES['student_profile']['tmp_name'])){
         $temp=$_FILES['student_profile']['tmp_name'];
         $file=time()."-".$_FILES['student_profile']['name'];
         move_uploaded_file($temp,"uploads/students/".$file);  
         $file_sql=$file; 
     }  
     if(is_uploaded_file($_FILES['student_resume']['tmp_name'])){
        $files=$_FILES['student_resume']; 
        $temp=$_FILES['student_resume']['tmp_name'];
        $file=time()."-".$_FILES['student_resume']['name']; 
        move_uploaded_file($temp,"uploads/resume/".$file);  
        $file_sql1="`student_resume`='$file'";  
    }
     if($file_sql!='') $sql.=" , student_profile='$file_sql' ";
     if($file_sql1!='') $sql.=" , student_resume='$file_sql1' "; 
     $result=mysqli_query($con,"UPDATE `student` set student_name='$student_name',student_password='$student_password',
     student_idno='$student_idno',student_no='$student_no',student_email='$student_email',student_branch='$student_branch',
     student_address='$student_address',student_tenth='$student_tenth',student_inter='$student_inter', 
     student_grad='$student_grad' $sql where `student_id`='".$_GET['edit']."'"); 	   
   } 
$rs=mysqli_query($con,"Select * from `student` where student_id='".$_GET['edit']."'");   
$rw=mysqli_fetch_assoc($rs); 
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Student Information</li>
            </ol>
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
                                <input type="text" class="form-control" name="student_name" value="<?=$rw['student_name']?>" placeholder="Student Name" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                
                                <input type="text" class="form-control" name="student_idno" value="<?=$rw['student_idno']?>" placeholder="Student ID number" id="username" onBlur="checkAvailability()" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                
                            </div>
                            <span id="user-availability-status" style="margin-bottom: 5px;display: block;"></span>  
                             
                            <div class="input-group mb-3">
                                <input type="tel" pattern="[0-9]{10}" class="form-control" value="<?=$rw['student_no']?>" name="student_no" placeholder="Student Phone number" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_email" value="<?=$rw['student_email']?>" placeholder="Student Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-control" name="student_branch" required>
                                    <option>Select Branch</option>
                                    <?  
                                        $rrr=mysqli_query($con,"SELECT * FROM `branch` ORDER BY branch_id ASC"); 
                                        while($r1=mysqli_fetch_assoc($rrr)){ ?>
                                            <option value="<?=$r1['branch_name']?>" <? if($rw['student_branch'] == $r1['branch_name']) echo "selected";?>><?=$r1['branch_name']?></option>
                                    <? }  
                                    ?>
                                </select> 
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6"> 
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="student_address" placeholder="Student Address" required><?=$rw['student_address']?></textarea> 
                            </div> 
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_tenth" value="<?=$rw['student_tenth']?>" placeholder="Student 10th %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_inter" value="<?=$rw['student_inter']?>" placeholder="Student Inter %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="student_grad" value="<?=$rw['student_grad']?>" placeholder="Student Under Graduation %" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> 
                    <div class="row mt-2"> 
                        <div class="col-md-6"> 
                            <label class="mr-2">Profile Picture</label> 
                            <div class="custom-file">
                                <input type="file" name="student_profile"> 
                                <img src="uploads/students/<?=$rw['student_profile']?>" class="img-fluid mt-2"/>
                            </div>  
                        </div>
                        <div class="col-md-6"> 
                                <label class="mr-2">Resume</label>
                                 <a href="uploads/resume/<?=$rw['student_resume']?>" target="_blank">Download Resume</a> 
                                <div class="custom-file">
                                    <input type="file" name="student_resume"> 
                                </div> 
                            </div> 
                    </div> 
                    <div class="row"> 
                        <!-- /.col -->
                        <div class="col-3"></div><div class="col-3"></div>
                        <div class="col-3">
                            <button type="submit" name="btn_submit" class="btn btn-primary btn-block">Edit Profile</button>
                        </div>
                        <!-- /.col -->
                    </div> 
                </form> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>