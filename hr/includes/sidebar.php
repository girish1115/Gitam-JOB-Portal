<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Company Dashboard</div>
    </a>  
    <!-- Divider -->
    <hr class="sidebar-divider my-0"> 
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link active" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       
    </div> 
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevendor"
            aria-expanded="true" aria-controls="collapsevendor">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Vacancy</span>
        </a>
        <div id="collapsevendor" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"> 
                <a class="collapse-item" href="vacancy.php">Add Vacancy</a>
                <a class="collapse-item" href="vacmgmt.php">Manage Vacancy</a> 
            </div>
        </div>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#location"
            aria-expanded="true" aria-controls="location">
            <i class="fas fa-location-arrow"></i>
            <span>Details</span>
        </a>
        <div id="location" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">  
                <a class="collapse-item" href="details.php?id=<?=$_SESSION['hr_id']?>">Company Details</a> 
            </div>
        </div>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appli"
            aria-expanded="true" aria-controls="appli">
            <i class="fas fa-location-arrow"></i>
            <span>Applications</span>
        </a>
        <div id="appli" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">  
                <a class="collapse-item" href="applications.php">Applications</a> 
            </div>
        </div>
    </li> 
   
</ul>