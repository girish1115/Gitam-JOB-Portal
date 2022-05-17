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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) --> 
        <form method="get" action="email.php">
            <div class="row">  
               <div class="col-md-4">
                    <label>Select Branch</label>
                    <select  name="student_branch" class="form-control" id="student_branch" required>
                        <option value="" disabled selected>Select Branch</option>
                                    <? 
                                    $rrr=mysqli_query($con,"SELECT * FROM `branch` ORDER BY branch_id ASC"); 
                                    while($r1=mysqli_fetch_assoc($rrr)){ ?>
                                    <option value="<?=$r1['branch_name']?>" ><?=$r1['branch_name']?></option>
                                <? } ?>
                            </select> 
                    </select>
                </div>
                <div class="col-md-4">
                    <label>10 %</label>
                    <input type="text" class="form-control" name="student_tenth" required /> 
                </div> 
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-md-4">
                    <label>Inter %</label>
                    <input type="text" class="form-control" name="student_inter" required />  
                </div>
                <div class="col-md-4">
                    <label>B. Tech %</label>
                    <input type="text" class="form-control" name="student_grad" required />  
                </div>
            </div> 
            <div class="row">
                <div class="col-md-4 mt-5">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <? include 'includes/footer.php'; ?>