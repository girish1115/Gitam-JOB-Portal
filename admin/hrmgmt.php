<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
if(isset($_GET['del']) ){
  $result6=mysqli_query($con,"DELETE from `hr` where `hr_id`='".$_GET['del']."'");   
}
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
                <td><b>Company Name</b></td>  
                <td><b>Company Password</b></td>   
                <td><b>Company Email</b></td>  
                <td><b>Company Number</b></td> 
                <td><b>Edit</b></td>  
                <td><b>Delete</b></td>   
            </tr>
            </thead>
            <tbody>
            <? 
                $result=$con->query("SELECT * FROM `hr` ORDER BY hr_id ASC"); 
                $j=1;
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $j++; ?></td>
                    <td><?=$row['hr_fullname']?></td>  
                    <td><?=$row['hr_pass']?></td>
                    <td><?=$row['hr_email']?></td>
                    <td><?=$row['hr_number']?></td>
                    <td><a class="btn btn-success" href="hr.php?edit=<?=$row['hr_id']?>">Edit</a></td> 
                    <td><a class="btn btn-danger" href="hrmgmt.php?del=<?=$row['hr_id']?>">Delete</a></td> 
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