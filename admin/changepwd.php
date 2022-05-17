<?
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/header2.php'; 
include 'includes/config.php';

if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from `admin` WHERE admin_id='".$_SESSION["admin_id"]."'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["admin_pass"]) {
        mysqli_query($con, "UPDATE admin set admin_pass='".$_POST["newPassword"]."' WHERE admin_id='".$_SESSION["admin_id"]."'"); 
        $message = "Password Changed";
        echo "<script>alert('$message');</script>";
    } else
        $message = "Current Password is not correct";
        echo "<script>alert('$message');</script>";
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                          </div>
                    </div> 
                </div>
            </div>
            <form class="form-horizontal" method="post" action="" name="frmChange"  onSubmit="return validatePassword()" enctype="multipart/form-data">
            <div class="row">
            
              <div class="col-md-4">
                    <div class="card-body"> 
                    <label>Old Password</label>
                      <input class="form-control" require type="password" placeholder="Old Password" name="currentPassword" id="currentPassword"> 
                    </div>
              </div>  
            </div>
            <div class="row"> 
              <div class="col-md-4">
                    <div class="card-body"> 
                    <label>New Password</label>
                      <input class="form-control" name="newPassword" id="newPassword" minlength="6" require type="password" placeholder="New Password"> 
                    </div>
              </div> 
            </div> 
            <div class="row"> 
              <div class="col-md-4">
                    <div class="card-body"> 
                    <label>Confirm Password</label>
                      <input class="form-control" name="confirmPassword" id="confirmPassword" minlength="6" require type="password" placeholder="Confirm Password"> 
                    </div>
              </div> 
            </div> 
            <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </section>
  </div>
<script> 
    function validatePassword() {
    var currentPassword,newPassword,confirmPassword,output = true; 
    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if(!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if(!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
    }
    else if(!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
    }
    if(newPassword.value != confirmPassword.value) {
        newPassword.value="";
        confirmPassword.value="";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
        alert('Passwords Did not Match');
    } 	
    return output;
    }
</script> 

  <? include 'includes/footer.php'; ?>