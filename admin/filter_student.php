<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/left.php'; 
include 'includes/config.php';
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
              <li class="breadcrumb-item"><a href="dashbard.php">Home</a></li>
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
        <table id="example" class="display" style="width:100%">
          <thead>
            <tr>
                <td>S. No</td>
                <td>Student Name</td>
                <td>ID Number</td>            
                <td>Branch</td>  
                <td>Batch</td>  
                <td>Tenth %</td>  
                <td>Inter %</td>  
                <td>Btech %</td> 
                <td>Image</td> 
                <td>Edit</td>   
                <td>Delete</td>  
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
                <td><?=$row['student_branch'] ?></td> 
                <td><?=$row['student_batch'] ?></td>  
                <td><?=$row['student_tenth'] ?></td> 
                <td><?=$row['student_inter'] ?></td>  
                <td><?=$row['student_grad']?></td> 
                <td><img src="uploads/students/<?=$row['student_profile']?>" width="100px"/></td>  
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
        $(document).ready(function() {
            
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>