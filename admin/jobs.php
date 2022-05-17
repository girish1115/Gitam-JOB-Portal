<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php'; 
if(isset($_GET['del']) ){
  $result6=mysqli_query($con,"DELETE from `vacancy` where `vac_id`='".$_GET['del']."'");   
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
                <td><b>Job Name</b></td>  
                <td><b>Company Name</b></td>   
                <td><b>Date</b></td>  
                <td><b>Venue</b></td> 
                <td><b>View</b></td> 
                <td><b>Delete</b></td> 
            </tr>
            </thead>
            <tbody>
            <? 
                $result=$con->query("SELECT * FROM `vacancy` ORDER BY vac_id DESC"); 
                $j=1;
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $j++; ?></td>
                    <td><?=$row['vac_profile']?></td>  
                    <td><?=$row['vac_company']?></td>
                    <td><?=$row['vac_date']?></td>
                    <td><?=$row['vac_venue']?></td> 
                    <td><a class="btn  btn-primary"  href="view.php?jobid=<?=$row['vac_id']?>&comid=<?=$row['vac_company']?>" style="color: #000000;background-color: #f6c23e;border:0px;"><b>Click To View</b></a></td>  
                   
                    <td><a class="btn btn-danger" href="jobs.php?del=<?=$row['vac_id']?>">Delete</a></td> 
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