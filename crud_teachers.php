<?php
    
    $errors = array();

    $mysqli = new mysqli('localhost','root','','club')or die(mysqli_error($mysqli));
    
     if(isset($_GET['delete'])){
     $id=$_GET['delete'];
     $mysqli->query("DELETE FROM teachers_info WHERE id=$id")or die($mysqli->error());
    } 
    ?>
    <?php
    if(isset($_POST['edit'])){
    $ids=$_POST['ids'];
    $teacher_id=$_POST['teacher_id'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="UPDATE teachers_info SET id='$ids',teachers_id='$teacher_id',fullname='$name',gender='$gender',username='$username',email='$email',password='$password' WHERE id='$ids' ";
    $query_run=mysqli_query($mysqli,$query);

    if($query_run){
        echo '<script> alert("Update Successfull"); </script>';
        header("location:DashboardTable1.php");
    }else{
        echo '<script> Alert("Update Faild"); </script>';
    } 
    }
   ?>
 <?php
   if(isset($_POST['save'])){
   $employees_id=$_POST['employee_id'];
   $name=$_POST['fullname'];
   $gender=$_POST['gender'];
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
    
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $cpassword = mysqli_real_escape_string($mysqli, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM teachers_info WHERE email = '$email'";
    $res = mysqli_query($mysqli, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

    $employee_id_check = "SELECT * FROM teachers_info WHERE teachers_id = '$employees_id'";
    $employee_id = mysqli_query($mysqli, $employee_id_check);
    if(mysqli_num_rows($employee_id) > 0){
        $errors['employee_id'] = "Employee ID that you have entered is already exist!";
    }

    if(count($errors)===0){
    $query="INSERT INTO teachers_info (teachers_id,fullname,gender,username,email,Password)Values('$employees_id','$name','$gender','$username','$email','$password')";
    $query_run=mysqli_query($mysqli,$query);

        }
    }
 
 ?>