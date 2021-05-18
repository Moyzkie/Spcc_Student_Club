<?php
    $errors = array();
    $mysqli = new mysqli('localhost','root','','club')or die(mysqli_error($mysqli));
     if(isset($_GET['delete'])){
     $stdnum=$_GET['delete'];
      $delete = $mysqli->query("DELETE FROM student_info WHERE Student_Number=$stdnum")or die($mysqli->error());
     header('location:DashboardTable.php');
     echo "<div class='alert alert-danger text-center'>You have reach the maximum attempt and you are not able to leave this club</div>";
    } 
    ?>
  
    <?php
     if (isset($_POST['admin_save'])) {
    // Get image name
    $image_profile= $_FILES['profile']['name'];
    // Get text
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    // image file directory
    $target_profile= "image/admin_profile/".basename($image_profile);
    
    $sql = "INSERT INTO admin(fullname,username,password,profile) VALUES ('$fullname','$username','$password','$image_profile')";  
    // execute query
    mysqli_query($mysqli, $sql);
    move_uploaded_file($_FILES['profile']['tmp_name'], $target_profile);

    header("Location: spccDashboard.php"); 
    }
   ?>
  
    <?php
     if (isset($_POST['up_carousel_save'])) {
    // Get image name
    $slide1= $_FILES['slide1']['name'];
    $slide2= $_FILES['slide2']['name'];
    $slide3= $_FILES['slide3']['name'];
    // image file directory
    $target_slide1= "image/carousel/".basename($slide1);
    $target_slide2= "image/carousel/".basename($slide2);
    $target_slide3= "image/carousel/".basename($slide3);
    
    $query="UPDATE carousel SET slide1='$slide1',slide2='$slide2',slide3='$slide3' WHERE id='1' ";
    // execute query
    mysqli_query($mysqli, $query);
    move_uploaded_file($_FILES['slide1']['tmp_name'], $target_slide1);
    move_uploaded_file($_FILES['slide2']['tmp_name'], $target_slide2);
    move_uploaded_file($_FILES['slide3']['tmp_name'], $target_slide3);

    header("Location: spccDashboard.php"); 
    }
   ?>
   
    <?php
    if(isset($_GET['deletes'])){
    $clubID=$_GET['deletes'];
    $compare_name = mysqli_query($mysqli,"select  teacher_name from club_list  WHERE id='$clubID'");
    $find_name= mysqli_fetch_assoc($compare_name);
    $get_name = $find_name['teacher_name'];
    $teacher_name= mysqli_query($mysqli,"select id,fullname from teachers_info where fullname = '$get_name'");
    $get_teacher_name =mysqli_fetch_assoc($teacher_name);
    $get_teacher_id = $get_teacher_name['id'];
    $get_con_name = $get_teacher_name['fullname'];
    if($get_con_name == $get_name){
    $remove_club = mysqli_query($mysqli,"update teachers_info set club = '' where id ='$get_teacher_id'");
    $mysqli->query("DELETE FROM club_list WHERE id=$clubID");
    }
    }
    ?>
    <?php
    if(isset($_POST['edit'])){
    $stdnum=$_POST['studentnum'];
    
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="UPDATE student_info SET Student_Number='$stdnum',FullName='$name',UserName='$username',Email='$email',Password='$password' WHERE Student_Number='$stdnum' ";
    $query_run=mysqli_query($mysqli,$query);

    if($query_run){
        echo '<script> alert("Update Successfull"); </script>';
        header("location:DashboardTable.php");
    }else{
        echo '<script> Alert("Update Faild"); </script>';
    } 
    }
   ?>
    <?php
    if(isset($_POST['save'])){
    $code=0;
    $status="verified";
    $stdnum=$_POST['stdnumber'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $cpassword = mysqli_real_escape_string($mysqli, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM student_info WHERE email = '$email'";
    $res = mysqli_query($mysqli, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

    $stdnum_check = "SELECT * FROM student_info WHERE Student_Number = '$stdnum'";
    $res_stdnum = mysqli_query($mysqli, $stdnum_check);
    if(mysqli_num_rows($res_stdnum) > 0){
        $errors['stdnum'] = "Student number that you have entered is already exist!";
    }

    if(count($errors)===0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $Attempt =3;
        $query="INSERT INTO student_info (Student_Number,Fullname,UserName,Email,Password,Code,Status,Attempt)Values('$stdnum','$name','$username','$email','$encpass','$code','$status','$Attempt')";
        $query_run=mysqli_query($mysqli,$query);
        }
    }
   ?>
   