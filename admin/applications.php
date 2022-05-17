<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row"> 
        <table id="hr" class="table table-bordered table-hover">
            <thead>
            <tr>
                <td><b>S. No</b></td>
                <td><b>Name</b></td>  
                <td><b>Id Number</b></td>   
                <td><b>Email</b></td>  
                <td><b>Branch</b></td> 
                <td><b>Resume</b></td> 
                <td><b>Date of Joining</b></td> 
            </tr>
            </thead>
            <tbody>
            <? 
                $result=$con->query("SELECT * FROM `student` WHERE student_verify=1 ORDER BY student_id ASC"); 
                $j=1;
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $j++; ?></td>
                    <td><?=$row['student_name']?></td>  
                    <td><?=$row['student_idno']?></td>
                    <td><?=$row['student_email']?></td>
                    <td><?=$row['student_branch']?></td> 
                    <td><a href="../uploads/resume/<?=$row['student_resume']?>">Resume</a></td>  
                     <td><?=$row['student_date']?></td>
                </tr>
                <? } ?>
            </tbody>
        </table>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>
  <script>
 $(function() {
    $('#hr').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>