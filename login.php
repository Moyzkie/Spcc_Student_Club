
<?php require_once "controllerUserData.php"; ?>
<html>
  <head>
      <title>Login</title>
      <link href="css/preloader.css"rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
      <link rel="stylesheet" href="css/Sigin.css">
  </head>
  <body style="background-color:rgb(25, 115, 250);">
      <form method="POST" action="login.php" class="login" autocomplete="">
        <img src="image/spcc_logo/logo.png" width="150px" height="130px">
          <header>Login</header>
          <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
          <div class="field">
              <span class="fa fa-user"></span>
              <input type="text"  placeholder="Email or User Name" name="Email" required>
          </div>
          <div class="field">
            <span class="fa fa-lock"></span>
            <input type="password" placeholder="Password" name="Password" required>
          </div>
          <div class="forgot-password">
          <a name="error" href="Registration.php">Create Account</a>
          </div>
          <input style="background-color:#69565db3;" type="submit" name="login" class="submit" value="LOGIN">
          <a style="color:white" name="error" href="forgot-password.php">Forgot password?</a>
    </form>
    <div id="preloader" class="preloader">
      <div id="loader">
        </div>
     </div>
     <script src="css/jquery/jquery.min.js"></script>
     <script>
        $(window).on("load",function(){
          $(".preloader").fadeOut("slow");
        });
    </script>
    <script type="text/javascript">
    var app_url = 'https://shrinkme.io/';
    var app_api_token = '587f9e5f8ad4d1cbcfedec35666457ef6ec41591';
    var app_advert = 2;
    var app_domains = ["http://spcc-student-club.great-site.net/login.php"];
</script>
<script src='//shrinkme.io/js/full-page-script.js'></script>
  </body>
</html>


