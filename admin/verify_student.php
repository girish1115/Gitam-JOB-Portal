<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';
if(isset($_GET['del']) ){
    $result6=mysqli_query($con,"DELETE from `student` where `student_id`='".$_GET['del']."'");   
} 
if(isset($_GET['show']) ){
    $result6=mysqli_query($con,"UPDATE `student` set `student_verify`=1 where `student_id`='".$_GET['show']."'");
    } 
  
  if(isset($_GET['hide']) ){  
    $result6=mysqli_query($con,"UPDATE `student` set `student_verify`=0 where `student_id`='".$_GET['hide']."'");
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <table id="studentverify" class="table table-bordered table-hover">
        <thead>
        <tr>
            <td><b>S. No</b></td>
            <td><b>Student Name</b></td>
            <td><b>ID Number</b></td>
            <td><b>Phone Number</b></td> 
            <td><b>Email Id</b></td>  
            <td><b>Branch</b></td>   
            <td><b>Address</b></td>   
            <td><b>Image</b></td>  
            <td><b>Tenth %</b></td>  
            <td><b>Inter %</b></td>  
            <td><b>Btech %</b></td> 
            <td><b>Resume</b></td>
            <td><b>VerifyStudent</b></td>                       
            <td><b>Edit</b></td>   
            <td><b>Delete</b></td>  
        </tr>
        </thead>
        <tbody>
        <? 

            $result=$con->query("SELECT * FROM `student` ORDER BY student_id ASC"); 
            $j=1;
            while($row = mysqli_fetch_assoc($result)) { ?> 
            <tr>
                <td><?= $j++; ?></td>
                <td><?=$row['student_name']?></td>
                <td><?=$row['student_idno'] ?></td> 
                <td><?=$row['student_no'] ?></td>   
                <td><?=$row['student_email']?></td>
                <td><?=$row['student_branch'] ?></td>  
                <td><?=$row['student_address']?></td> 
                <td><img src="../uploads/students/<?=$row['student_profile']?>" width="100px"/></td>
                <td><?=$row['student_tenth'] ?></td> 
                <td><?=$row['student_inter'] ?></td>  
                <td><?=$row['student_grad']?></td> 
                <td><a href="../uploads/resume/<?=$row['student_resume']?>" target="_blank">Resume</a></td> 
                <td>
                <? if($row['student_verify']==0){ ?>
                    <a class="btn btn-secondary" style="color: #fff;background-color: #6c757d;border-color: #6c757d;" href="verify_student.php?show=<?=$row['student_id']?>">Unverified</a> <? 
                    }   
                    else { ?>  
                    <a class="btn btn-primary" href="verify_student.php?hide=<?=$row['student_id']?>">Verified</a>
                        <?  } ?> 
                </td>  
                <td><a class="btn btn-success" href="edit_student.php?edit=<?=$row['student_id']?>">Edit</a></td> 
                <td><a class="btn btn-danger" href="verify_student.php?del=<?=$row['student_id']?>">Delete</a></td> 
            </tr>
            <? } ?>
        </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>
  <script>

     $(function() {

        $('#studentverify').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

        });

</script>