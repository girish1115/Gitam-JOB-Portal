<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
?> 
<script src="https://kit.fontawesome.com/1660afd458.js" crossorigin="anonymous"></script>
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
          <div class="col-md-3"></div>
          <div class="col-md-3">
              <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                  <?
                    $rs=mysqli_query($con,"SELECT COUNT(student_verify) AS total from student where student_verify=1 ORDER BY student_id ASC");  
                    $row=mysqli_fetch_assoc($rs);
                  ?>
                  <span><img src="images/people.jpg" style="height:50px"></span><br>
                  <span><?=$row['total']?></span><br>
                  <span>Registered Candidates</span>
              </div>
          </div>
          <div class="col-md-3">
              <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                  <?
                    $rs=mysqli_query($con,"SELECT COUNT(student_verify) AS total from student where student_verify=0 ORDER BY student_id ASC");  
                    $row=mysqli_fetch_assoc($rs);
                  ?>
                  <span><img src="images/people.jpg" style="height:50px"></span><br>
                  <span><?=$row['total']?></span><br>
                  <span>Pending Candidates</span>
              </div>
          </div>
        </div> 
        <div class="row"> 
          <div class="col-md-3"></div>
          <div class="col-md-3">
              <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                  <?
                    $rs=mysqli_query($con,"SELECT COUNT(vac_status) AS total from vacancy where vac_status=1");  
                    $row=mysqli_fetch_assoc($rs);
                  ?>
                  <span><img src="images/job.png" style="height:50px"></span><br>
                  <span><?=$row['total']?></span><br>
                  <span>Job Posts</span>
              </div>
          </div>
          <div class="col-md-3">
              <div style="text-align: center;border: #000;border-block: beige;padding: 25px;display: block;">
                  <?
                    $rs=mysqli_query($con,"SELECT COUNT(hr_id) AS total from hr");  
                    $row=mysqli_fetch_assoc($rs);
                  ?>
                  <span><img src="images/company.png" style="height:50px"></span><br>
                  <span><?=$row['total']?></span><br>
                  <span>Companies</span>
              </div>
          </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>