<?php
require_once 'crud.php';
?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];

if($email != false ){
    $sql = "SELECT * FROM teachers_info WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $get_club = $fetch_info['club'];
        $displayrecord = $mysqli->query("SELECT * FROM club_lessons WHERE club_name = '$get_club'")or die(msqli_error($mysqli));
    }}else{
   header('Location: login.php');
    }
  ?>
    <?php
     if (isset($_POST['addlesson'])) {
    // Get image & video name
    if($get_club == ''){
        echo "you are not able to add club content because you did not have club";
    }else{
        $video= $_FILES['video']['name'];
        // Get text
        $description=$_POST['des'];
        $topic=$_POST['topic'];
     
        // image & video file directory
        $target_video= "video/".basename($video);
        
        // execute query
        mysqli_query($mysqli,"INSERT INTO club_lessons (club_name,topic,description,discusion) VALUES ('$get_club','$topic','$description','$video')");
    
        move_uploaded_file($_FILES['video']['tmp_name'], $target_video);
        header('location:lesson.php');
    }
    }
   ?>
    <?php
     if (isset($_POST['edit_lesson'])) {
    // Get image & video name
        $id = $_POST['id'];
        $video= $_FILES['video']['name'];
        // Get text
        $description=$_POST['des'];
        $topic=$_POST['topic'];
     
        // image & video file directory
        $target_video= "video/".basename($video);
        
        // execute query
        mysqli_query($mysqli,"UPDATE club_lessons SET topic = '$topic',description='$description',discusion='$video' where  id ='$id'");
    
        move_uploaded_file($_FILES['video']['tmp_name'], $target_video);
        header('location:lesson.php');
    }
   ?>
   <?php
    if(isset($_GET['delete_lesson'])){
     $id=$_GET['delete_lesson'];
      $delete = $mysqli->query("DELETE FROM club_lessons WHERE id='$id'");
      header('location:lesson.php');
    } 
    ?>
   <html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Dashboard</title>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="spccDashboard.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="sidebar-brand-text mx-3 r-7">Student Club</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="Teacher Dashboard.php">
                    
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="TeacherStudentTable.php">
                    <i class="fas fa-user"></i>
                    <span>My Student</span></a>
            </li>
           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-bell"></i>
                    <span>Announcement</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Announcement</h6>
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
                        <a class="collapse-item fas fa-user-plus" data-toggle="modal" data-target="#addlessons">Add Lesson</a>
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
                <a class="nav-link" href="works.php">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Works</span></a>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="lesson.php">
                    <i class="fas fa-fw fa-Book"></i>
                    <span>Lesson</span></a>
            </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="event.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Event</span></a>
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
                    </button>


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
                                <img class="img-profile rounded-circle" src="image/teachers_profile/<?php echo $fetch_info['profile']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
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
                <div class="container-fluid">
                   <!-- DataTales Example -->
                   <div class="card shadow mb-4">
                        <div style="background-color: rgb(25, 115, 250); " class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-white">lesson table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover"  id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Topic</th>
                                            <th>Description</th>
                                            <th>Discussion</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                          <tr>
                                          <th>ID</th>
                                            <th>Topic</th>
                                            <th>Description</th>
                                            <th>Discussion</th>
                                            <th>Action</th>
                                         </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                    <?php
                                     while($row = $displayrecord->fetch_assoc()):?>
                                        <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['topic']?></td>
                                        <td><?php echo "<textarea readonly class='form-control disabled' id='des' name='des'  rows='3'>".$row['description']."</textarea>"?></td>
                                        <td><?php echo $row['discusion']?></td>
                                        <td>
                                        <button type="button" class="btn btn-success btn-sm  editbtn"  data-toggle="modal" data-target="#edit">edit</button>
                                        <a href="lesson.php?delete_lesson=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                        </tr>
                                        <?php  endwhile; ?>
                                    </tbody>
                                </table>
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
     <!--Add lesson modal-->
     <div id="addlessons" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="lesson.php" METHOD="POST" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add lesson</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
     <div class="form-group">
       <label>Topic</label>
       <input type="text"id="topic" name="topic"    class="form-control" >
      </div>    
      <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" id="des" name="des"  rows="4"></textarea>
      </div>
      <div class="form-group">
       <label> video Descussion</label>
       <input type="file" name="video" id="videos"  class="form-control">
      </div>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success"  name="addlesson" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>
  <!--Add works edit-->
  <div id="edit" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="lesson.php" METHOD="POST" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">edit event</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <input type="text"  hidden name="id" id="id">
     <div class="modal-body">   
     <div class="form-group">
       <label>Topic</label>
       <input type="text"id="topics" name="topic"    class="form-control" >
      </div>    
      <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" id="des1" name="des"  rows="4"></textarea>
      </div>
      <div class="form-group">
       <label>Descussion</label>
       <input type="file" name="video" id="videos1"  class="form-control">
      </div>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success"  name="edit_lesson" value="Save">
     </div>
    </form>
   </div>
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
     $(document).ready(function(){
         $(document).on('click','.editbtn',function(){
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      $('#id').val(data[0]);
      $('#topics').val(data[1]);
      $('#des1').val(data[2]);
      $('#videos1').val(data[3]);
         });
     });
     
    </script>


</body></html>