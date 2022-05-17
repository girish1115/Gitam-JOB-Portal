<? 

include 'config.php'; ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="images/client.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Student Info</span>
    </a>

        <? $rs=mysqli_query($con,"Select * from `student` where student_id='".$_SESSION['student_id']."'");  
            $rw=mysqli_fetch_assoc($rs);
            ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="uploads/students/<?=$rw['student_profile']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$rw['student_name']?></a>
        </div>
      </div> 
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a> 
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i> 
              <p>
                Student 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="details.php?id=<?=$_SESSION['student_id']?>" class="nav-link">
                  <i class="fas fa-wrench nav-icon"></i>
                  <p>Student Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="edit_student.php?edit=<?=$_SESSION['student_id']?>" class="nav-link">
                  <i class="fas fa-wrench nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-project-diagram"></i> 
              <p>
                Password
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="changepwd.php" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li> 
            </ul>
          </li> 
          <li class="nav-header"></li>  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>