<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
error_reporting(0);
if(isset($_POST['btn_submit'])){  
extract($_POST);  
if($_GET['edit']!=''){ 
        if($branch_name=='') {
          echo "<script>alert('Branch Name should not be empty');</script>";
        } else {
        $result=mysqli_query($con,"UPDATE `branch` set branch_name='$branch_name' where `branch_id`='".$_GET['edit']."'"); 	
        if($result){
          echo "<script>alert('Branch Details Updated Successfully');</script>";
      }
    }
    }     
    else{
      $rs=mysqli_query($con,"INSERT INTO `branch` set branch_name='$branch_name'"); 
        if($rs){
            echo "<script>alert('Branch Details Added Successfully');</script>";
        }
    }
}
$rr=mysqli_query($con,"select * from `branch` where `branch_id`='".$_GET['edit']."'"); 
$rw=mysqli_fetch_assoc($rr);

?>
 <!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Branch</h1>
        </div><!-- /.col -->
         
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
                    <div class="card-body"> 
                     <input class="form-control" name="branch_name" value="<?=$rw['branch_name']?>" require type="text" placeholder="Branch Name"> 
                   </div>
              </div>  
            </div> 
            <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>