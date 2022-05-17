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
            <h1 class="m-0">Dashboard</h1>
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
          <div class="col-md-6 col-lg-6 col-sm-6">
            <a href="details.php?id=<?=$_SESSION['student_id']?>" ><img class="img-fluid" src="images/details.jpg" /></a>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6">
            <a href="changepwd.php"><img class="img-fluid" src="images/pwd.jpg" /></a>
          </div> 
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>