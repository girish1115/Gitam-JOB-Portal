<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header3.php'; 
include 'includes/config.php';
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Details</h1>
          </div><!-- /.col --> 
          <div class="col-md-4"></div>
          <div class="col-md-2">
            <? $rs=mysqli_query($con,"Select * from `student` where student_id='".$_SESSION['student_id']."'");  
              $rw=mysqli_fetch_assoc($rs);
              ?>
            <div class="image">
              <img src="uploads/students/<?=$rw['student_profile']?>" class="img-circle elevation-2" alt="User Image" height="50px"> 
              <a class="btn btn-primary mt-3"><?=$rw['student_name']?></a> 
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
        <div class="row"> 
			<div class="col-md-4"></div>
           <div class="col-md-4">
			   	<label style="padding-right: 10px;">Name:</label><span><?=$rw['student_name']?></span> <br>
				<label style="padding-right: 10px;">ID number:</label><span><?=$rw['student_idno']?></span> <br>
				<label style="padding-right: 10px;">Phone number:</label><span><?=$rw['student_no']?></span> <br>
				<label style="padding-right: 10px;">Email:</label><span><?=$rw['student_email']?></span> <br>
				<label style="padding-right: 10px;">Branch	:</label><span><?=$rw['student_branch']?></span> <br>
				<label style="padding-right: 10px;">Address:</label><span><?=$rw['student_address']?></span> <br>
				<label style="padding-right: 10px;">Tenth %:</label><span><?=$rw['student_tenth']?></span> <br>
				<label style="padding-right: 10px;">Inter %:</label><span><?=$rw['student_inter']?></span> <br>
				<label style="padding-right: 10px;">Grad %:</label><span><?=$rw['student_grad']?></span> <br> 
				<label  style="padding-right: 10px;">Profile</label> <br>
					<img src="uploads/students/<?=$rw['student_profile']?>" height="200px"> <br>
					<a href="uploads/resume/<?=$rw['student_resume']?>" target="_blank">Resume</a></td>

			</div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>