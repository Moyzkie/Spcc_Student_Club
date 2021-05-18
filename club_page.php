<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['Email'];
if($email != false ){
    $sql = "SELECT * FROM student_info WHERE Email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
  
    if($run_Sql){
      $fetch_info = mysqli_fetch_assoc($run_Sql);
      $club_com=$fetch_info['Club'];
      $sql_content_clubs = mysqli_query($con,"SELECT * FROM club_event WHERE club_name = '$club_com'");
      $sql_content_club_works = mysqli_query($con,"SELECT * FROM club_works WHERE club_name = '$club_com'");
      $sql_content_club_lessom = mysqli_query($con,"SELECT * FROM club_lessons WHERE club_name = '$club_com'");
      
    }
     }else{
   header('Location: login.php');
}
?>

<?php
if(isset($_GET['yes'])){
    $get_stdnum = $_GET['yes'];
    $sql = "SELECT * FROM student_info WHERE Email = '$email'";
      $run_Sql = mysqli_query($con, $sql);
      if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $select_club=mysqli_query($con,"Select * From student_info where Email = '$email'");
        if($select_club){
        $attempt = $fetch_info['Attempt'];
        if($attempt == 0){
          echo "<div class='alert alert-danger text-center'>You have reach the maximum attempt and you are not able to leave this club</div>";
        }else{
          $join_club = mysqli_query($con,"update student_info set Club=''where Student_Number = '$get_stdnum'");
          header('location:clubs.php');
        }
        }
      }
    }
?>
 <?php
   if(isset($_GET['getvideo'])){
    $videoid=$_GET['getvideo'];
    $sqlvideo = mysqli_query($con,"SELECT * from club_works WHERE video ='$videoid'");
    
   } 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>clubpage</title>
    <style>
     
   .why-us .box:hover {
    background: #0d0c0cde !important;
  padding: 30px 30px 70px 30px !important;
  box-shadow: 10px 15px 30px rgba(0, 0, 0, 0.18) !important;
}

@media(max-width: 1000px){
  
  .why-us {
      max-height: 800px;
      overflow-y: scroll;
      margin:20px;
    }
    .Works {
      max-height: 800px;
      overflow-y: scroll;ol
      margin:20px;
    }
   .scroll{
     background-size: 690px 350px !important;
     background-position: center !important;
     background-position-x: center !important;
     background-repeat: no-repeat !important;
     opacity: 0.8  !important;
    }
    .box{
    height:350px !important;
    }
    }
     .box{
       opacity: 0;
     }
    .box:hover{
      opacity: 1;
    }
    
    </style>
    <link href="css/preloader.css"rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/creativetim/creativetim.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <!-- =======Navbar======= -->
    <nav class="navbar">
        <div style="display: flex;">
          <img src="image/spcc_logo/logo.png" class="rounded" alt="logo" width="60px" height="60px">
          <a href="" class="logos">SPCC STUDENT CLUB</a>
        </div>
          <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </a>
          <div class="navbar-links">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="#Event">Event</a></li>
              <li><a href="#Works">Wokrs</a></li>
              <li><a href="#Lessons">Lessson</a></li>
              <li ><a class="text-white" data-toggle="modal" data-target="#leave_club">|Leave Club|</a></li>
              <li><a class="text-white" data-toggle="modal" data-target="#logoutModal">|<?php echo $fetch_info['FullName'] ?>|</a></li>
            </ul>
          </div>
        </nav>
        <div>
       <!-- =======End Navbar======= -->
          <img src="image/carousel/slide2.jpg" width="100%">
        </div>
       <!-- ======= Event Section ======= -->
       <div class="section-title ">
           <h2 style="top:10px;">Event</h2>
        </div>
        <section id="Event" class="why-us">
          <div class="container">
            <div class="row" >   
              <?php
                while($row=mysqli_fetch_array($sql_content_clubs)){
                  echo"<div class='col-lg-4 scroll shadow' style='background-image:url(image/event/".$row['image'].");background-size:100%;background-position:center; background-repeat:no-repeat'>";
                  echo"<div class='box'>";
                  echo"<h4 >".$row['event_name']."</h4>";
                  echo "<p>".$row['description']."</p>";
                  echo "</div>";
                  echo"</div>";
                 
                }
              ?>
            </div>
          </div>
        </section>
        <!-- ======= Event End Section ======= -->

         <!-- ======= Works Section ======= -->
           <div class="section-title">
          <h2>Works</h2>
          </div>
         <section id="Works" class="why-us">
         <div class="container">
            <div class="row" style="width:100%" >   
              <?php
                while($row_works=mysqli_fetch_array($sql_content_club_works)):?>
                  <div class="col-lg-4 scroll"style="background-image:url(image/works_image/<?php echo $row_works['image']?>);background-size:100%;background-position:center; background-repeat:no-repeat">
                  <div class="box">
                  <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row_works['description']  ?>">
                    Description
                   </button>
                  <video width="100%" height="100%" controls src="video/<?php echo$row_works['video'] ?>">
                  </div>
                  </div>
            <?php endwhile; ?>
            </div>
          </div>
        </section>
      <!-- ======= works End Section ======= -->

         <!-- ======= Lesson Works ======= -->
         <div class="section-title">
            <h2>Lessons</h2>
          </div>
         <section id="Lessons" class="why-us">
          <div class="container">
            <div class="row">
            <?php
                while($row_lesson=mysqli_fetch_array($sql_content_club_lessom)):?>
                  <div class="col-lg-4 scroll">
                  <div class="boxs" width="100%" height="250px" >
                  <h4><?php echo $row_lesson['topic']?></h4>
                  
                  <video width="100%" height="100%" controls src="video/<?php echo$row_lesson['discusion'] ?> " >
                 
                  </div>
                  </div>
            <?php endwhile; ?>
            </div>
          </div>
        </section>
        <!-- ======= Lesson End Section ======= -->

        <!-- ======= Footer ======= -->
        <div class="footer-dark">
          <footer>
              <div class="container">
                  <div class="row">
                      <div class="col item social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                      </div>
                  </div>
                  <p class="copyright">System Plus Computer College © 2020</p>
              </div>
          </footer>
         </div>
         <!-- ======= End Footer ======= -->
         
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <button  class="btn btn-primary " >Cancel</button>
                    <a class="btn btn-danger" href="logout-user.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!--Leave Club-->
    <div class="modal fade" id="leave_club" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You have <?php echo $fetch_info['Attempt'] ?> attempt left</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to leave this club?</div>
                <div class="modal-footer">
                    <button  class="btn btn-secondary " >No</button>
                    <a class="btn btn-primary" href="club_page.php?yes=<?php echo $fetch_info['Student_Number']; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
         <div id="preloader" class="preloader">
           <div id="loader">
           </div>
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
    const toggleButton = document.getElementsByClassName('toggle-button')[0]
    const navbarLinks = document.getElementsByClassName('navbar-links')[0]
    toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
    });
    </script>
       <script>
        $(window).on("load",function(){
          $(".preloader").fadeOut("slow");
        });
      
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
        </script>
  
</body>
</html>
