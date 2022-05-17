<style>
.nav-item:hover {
	background-color: #163562;
	margin-left: 2px;
}
.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
	color: #fff;
	font-weight: 600;
} 
</style> 

        <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="col-md-6">
                    <a href="https://www.gitam.edu/" target="_blank"><img src="../images/logo.png" class="img-fluid" style="height: 65px;"/></a>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-1">
                    <img src="../images/1.png" class="img-fluid" style="height: 65px;"/>
                </div>
                <div class="col-md-1">
                    <img src="../images/3.png" class="img-fluid" style="height: 65px;"/>
                </div>  
                <div class="col-md-1">
                    <img src="../images/4.png" class="img-fluid" style="height: 65px;"/>
                </div>
                <div class="col-md-1">
                    <img src="../images/5.png" class="img-fluid" style="height: 65px;"/>
                </div>
            </div>  
        </div> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-top:20px"> 
            <div class="container">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="../index.php">GITAM</a>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color:#fff">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="dashboard.php" style="color:#fff">Admin Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="verify_student.php" style="color:#fff">Verify User Details</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="bulk_email.php" style="color:#fff">Send Email</a>
                            </li> 
                            <li class="nav-item">
                            <a class="nav-link" href="applications.php" style="color:#fff">Applications</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="jobs.php" style="color:#fff">Active Jobs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="color:#fff" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Branch</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="addBranch.php">Add Branch</a></li>
                                    <li><a class="dropdown-item" href="branchmgmt.php">Manage Branch</a></li> 
                                </ul> 
                            </li> 
                       
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style="color:#fff" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Company</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="hr.php">Add Company</a></li>
                                    <li><a class="dropdown-item" href="hrmgmt.php">Manage Company</a></li> 
                                </ul> 
                            </li> 
                            <li class="nav-item">
                            <a class="nav-link" href="changepwd.php" style="color:#fff">Change Password</a>
                            </li>
                        </ul>
                            <ul class="navbar-nav ml-auto"> 
                                <li class="nav-item" style="float:right">
                                    <a class="nav-link" data-widget="fullscreen" href="logout.php" style="color:#fff" role="button">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                    </a>
                                </li> 
                            </ul>
                         
                    </div>
                </div>
            </div>
        </nav> 