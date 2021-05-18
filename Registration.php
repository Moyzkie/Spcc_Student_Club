<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registerstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body style="background-color: rgb(25, 115, 250);">
  <div class="container">
    <center><img src="image/spcc_logo/logo.png" width="150px" height="130px"></center>
    <div class="title">Registration</div>
    <br>
    <div class="content">
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
      <form action="Registration.php" method="POST" autocomplete="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
    
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" id="email" name="email"placeholder="Enter your email" required>
           
          </div>
          <div class="input-box">
            <span class="details">Student Number</span>
            <input type="number" id="stdnumber" name="stdnumber" placeholder="Enter your student number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>
        <div class="button">
          <input  style="background-color:#69565db3;"  class="btn btn-primary" type="submit" id="register" name="signup" value="Sign-up">
        </div>
        <div>
              <a style="color:white" name="error" href="login.php">Already Have An Account Sign In Here</a>
          </div>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>
