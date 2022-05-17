<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
if(isset($_GET['del']) ){
    $result6=mysqli_query($con,"DELETE from `branch` where `branch_id`='".$_GET['del']."'");   
}
?>
<div class="container">
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Branch Management</h1>
        </div> 
    </div>
    <div class="card-body">
        <table id="branch" class="table table-bordered table-hover">
            <thead>
            <tr>
                <td><b>S. No</b></td>
                <td><b>Batch Name</b></td>  
                <td><b>Edit</b></td>   
                <td><b>Delete</b></td>  
            </tr>
            </thead>
            <tbody>
            <? 
                $result=$con->query("SELECT * FROM `branch` ORDER BY branch_id ASC"); 
                $j=1;
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $j++; ?></td>
                    <td><?=$row['branch_name']?></td>  
                    <td><a class="btn btn-success" href="addBranch.php?edit=<?=$row['branch_id']?>">Edit</a></td> 
                    <td><a class="btn btn-danger" href="branchmgmt.php?del=<?=$row['branch_id']?>">Delete</a></td> 
                </tr>
                <? } ?>
            </tbody>
        </table>
    </div>
  </div>
</section>
</div>
<? include 'includes/footer.php'; ?>
<script>
 $(function() {
    $('#branch').DataTable({
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