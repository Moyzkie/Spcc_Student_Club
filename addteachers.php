<?php
require_once 'crud_teachers.php';
?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];

if($email != false ){
    $sql = "SELECT * FROM admin WHERE username = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
       
    }
}else{
   header('Location: login.php');
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Add Teachers</title>
    <link href="css/preloader.css"rel="stylesheet" type="text/css">
   <link href="css/demo/demo.css" type="text/css"> 
   <link href="css/demo/material-dashboard.css" type="text/css"> 
   <!-- Custom fonts for this template -->
   <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

   <!-- Custom styles for this page -->
   <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top" class="sidebar-toggled">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul style="background-color: rgb(25, 115, 250);" class="navbar-nav  sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="spccDashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="sidebar-brand-text mx-3 r-7">Spcc Admin</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="spccDashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-comments"></i>
                    <span>Message &amp; Announ..</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Message &amp; Announ..:</h6>
                        <a class="collapse-item" href="buttons.html">Create Message</a>
                        <a class="collapse-item" href="cards.html">Create Announcement</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item fas fa-user-plus" href="addstudent.php">Add Student</a>
                    <a class="collapse-item fas fa-user-plus" href="addteachers.php">Add Teachers</a>
                    <a class="collapse-item fas fa-user-plus" data-toggle="modal" data-target="#admin">Add-User-Admin</a>
                    <a class="collapse-item fas fa-clipboard-list" href="Addclub.php">Add club</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="DashboardTable.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Student Information Table</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="DashboardTable1.php">
                    <i class="fas fa-user"></i>
                    <span>Teachers Information Table</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>User Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All User Page</h6>
                        <a class="collapse-item" href="club_page.html">Club Page</a>
                        <a class="collapse-item" href="index.php">Home Page</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>        
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fetch_info['fullname'] ?></span>
                                <img class="img-profile rounded-circle" src="image/admin_profile/<?php echo $fetch_info['profile'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="col-md-13">
                        <div class="card">
                          <div style="background-color: rgb(25, 115, 250); color: white;" class="card-header card-header-primary">
                            <h4 class="card-title">ADD TEACHERS</h4>
                          </div>
                          <div class="card-body">
                          <?php
                           if(count($errors) == 1){ ?>
                             <div class="alert alert-danger text-center">
                             <?php
                              foreach($errors as $showerror){
                                  echo $showerror;
                                  }?>
                              </div>
                              <?php
                              }elseif(count($errors) > 1){?>
                              <div class="alert alert-danger">
                              <?php
                             foreach($errors as $showerror){?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                                 } ?>
                                 </div>
                                 <?php
                               }
                            ?>
                            <form action="addteachers.php" method="POST" autocomplete="">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"><b>Employee_ID</b></label>
                                    <input type="number" id="teacher_id" name="employee_id"  class="form-control id_num" placeholder="Enter your ID number" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating"><b>FullName</b></label>
                                      <input type="text" id="fullname" name="fullname" class="form-control fname"placeholder="Enter your fullname" required >
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating"><b>Username</b></label>
                                      <input type="text" id="username" name="username" class="form-control username" placeholder="Enter your username" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating"><b>Email</b> </label>
                                        <input type="email" id="email"  name="email" class="form-control email" placeholder="Enter your email" required >
                                      </div>
                                    </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating"><b>Password</b></label>
                                      <input type="password" id="password" name="password" class="form-control password" placeholder="Enter your password" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating"><b>Confirm Password</b></label>
                                        <input type="password" id="con_password"  name="cpassword" class="form-control con_password" placeholder="Please confirm your password" required>
                                      </div>
                                    </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                      <label class="bmd-label-floating"><b>Gender</b></label>
                                      <select class="form-control" name="gender"  id="exampleFormControlSelect1 gender">
                                          <option>Male</option>
                                          <option>Female</option>
                                        </select>
                                    </div>
                                  </div>
                              </div>
                              <button style="background-color: rgb(25, 115, 250); color: white;" name="save" id="save" type="submit" class="btn  pull-right">Save</button>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
        <i class="fas fa-angle-up"></i>
    </a>
    
     <!-- Add-User-Admin Modal HTML -->
 <div id="admin" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="crud.php" METHOD="POST" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Edit Club</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <div class="form-group">
       <label>Admin FullName</label>
       <input  type="text" name="fullname"  id="fullname" class="form-control"  required>
      </div>
      <div class="form-group">
       <label>Username</label>
       <input type="text"id="username" name="username"   class="form-control" required>
      </div>
      <div class="form-group">
       <label>Pssword</label>
       <input type="text"id="password" name="password"   class="form-control" required>
      </div>
      <div class="form-group">
       <label>Profile</label>
       <input type="file" name="profile" id="profile"  class="form-control">
      </div>  
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success"  name="admin_save" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout-user.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div id="preloader" class="preloader">
        <div id="loader">
        </div>
        </div>
    <!-- Bootstrap core JavaScript-->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="css/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="css/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="css/jquery.dataTables.min.js"></script>
    <script src="css/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="css/demo/datatables-demo.js"></script>
    <script>
        $(window).on("load",function(){
          $(".preloader").fadeOut("slow");
        });
    </script>


</body></html>