<?php
$mysqli = new mysqli('localhost','root','','club')or die(mysqli_error($mysqli));
$displayrecord = $mysqli->query("SELECT * FROM club_list")
?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['Email'];
if($email != false ){
    $sql = "SELECT * FROM student_info WHERE Email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $cheack_attempt = $fetch_info['Attempt'];
    $cheack_club = $fetch_info['Club'];
    if($cheack_attempt == 0 || $cheack_club=''){
       header('Location: club_page.php');
    }
    }
}else{
   header('Location: login.php');
}
?>
<?php
if(isset($_GET['join'])){
    $join = $_GET['join'];
    $sql = "SELECT * FROM student_info WHERE Email = '$email'";
      $run_Sql = mysqli_query($con, $sql);
      if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $select_club=mysqli_query($con,"Select * From student_info where Email = '$email'");
        if($select_club){
        $stdnum = mysqli_fetch_assoc($select_club);
        $get_stdnum = $stdnum['Student_Number'];
        $Attempt = $stdnum['Attempt'];
        $Attempt--;
        $join_club = mysqli_query($con,"update student_info set Club='$join',Attempt='$Attempt' where Student_Number = '$get_stdnum'");
        header('location:club_page.php');
        }
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Club</title>
    <link href="css/preloader.css"rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .glow {
 
     color: #fff;
     text-align: center;
     animation: glow 1s ease-in-out infinite alternate;
    }

     @-webkit-keyframes glow {
     from {
   text-shadow: 0 0 10px rgb(25, 115, 250), 0 0 20px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250);
    }
   to {
       text-shadow:  0 0 10px rgb(25, 115, 250), 0 0 20px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250), 0 0 10px rgb(25, 115, 250);
      }
   }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>  
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
            <li><a href="#">Home</a></li>                 
            <li><a href="#about">About</a></li>                                  
            <li><a href="#Skill">Event</a></li>
          </ul>
        </div>
      </nav>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <?php
             $carousel = "SELECT * FROM carousel WHERE id = '1'";
             $run_carousel = mysqli_query($mysqli, $carousel);
             $fetch_carousel = mysqli_fetch_assoc($run_carousel);
        ?>
        <div class="carousel-inner">

          <div class="carousel-item active">
            <img src="image/carousel/<?php echo $fetch_carousel['slide1']; ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/carousel/<?php echo $fetch_carousel['slide2']; ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/carousel/<?php echo $fetch_carousel['slide3']; ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
    
            </div>
          </div>
        </div>
        <button  class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div id = "sortable" class="d-flex p-2 bd-highlight">
      <?php
                   while ($row = mysqli_fetch_array($displayrecord)) {
                    echo"<div  class='card m-10' style='width: 18rem;' style='display: block;'>";
                    echo"<img src='image/club_banner/".$row['club_banner']."' class='card-img-top' alt='...'>";
                    echo"<img src='image/teachers_profile/".$row['teacher_profile']."' class='rounde' alt='...'>";
                    echo"<div class='card-body' style='border-top:1px solid rgb(231, 229, 229) ;'>";
                    echo"<h5 class='card-title'>".$row['club_name']."</h5>";
                    echo"<a href='clubs.php?join=".$row['club_name']."' class='btn btn-primary'  >Join Club</a>";
                    echo"<a href='#' class='btn btn-primary'>View Club</a>";
                    echo"</div>";
                    echo"</div>";
                  }
                 ?>
      </div>
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
       <div id="preloader" class="preloader">
      <div id="loader">
    </div>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dpopper.miist/umd/n.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script >
      const toggleButton = document.getElementsByClassName('toggle-button')[0]
      const navbarLinks = document.getElementsByClassName('navbar-links')[0]
      toggleButton.addEventListener('click', () => {
      navbarLinks.classList.toggle('active')
      })
      $( document ).ready(function() {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
      });
    </script>
    <script>
        $(window).on("load",function(){
          $(".preloader").fadeOut("slow");
        });
        </script>
</body>
</html>