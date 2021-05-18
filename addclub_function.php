<link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php

 if (isset($_POST['submit'])) {
    $get_teacher_id_name = mysqli_query($mysqli, "SELECT id,fullname FROM teachers_info");
    // Get image name
    $image_banner = $_FILES['club_banner']['name'];

     // Get image name
     $image_profile = $_FILES['teacher_profile']['name'];
    // Get text
    $club_name=$_POST['club_name'];
    $teacher_name=$_POST['teacher_name'];
    // image file directory
    $target_banner= "image/club_banner/".basename($image_banner);
    $target_profile= "image/teachers_profile/".basename($image_profile );
    
    $name_cheak= mysqli_query($mysqli,"SELECT teacher_name FROM club_list  WHERE teacher_name = '$teacher_name'");
    $get_name = mysqli_fetch_assoc($name_cheak);
    if($get_name['teacher_name'] == $teacher_name){
   echo "<div class='alert alert-danger text-center'>This teacher we have already club </div>";
    }else{
    $sql = "INSERT INTO club_list(club_name,teacher_name,club_banner,teacher_profile) VALUES ('$club_name','$teacher_name','$image_banner','$image_profile')";  
    // execute query
    mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_assoc($get_teacher_id_name)){
    if($row['fullname'] == $teacher_name){  
    $get_id = $row['id'];
    $insert_club = "update teachers_info set  club='$club_name',profile='$image_profile' where id = '$get_id'";
    mysqli_query($mysqli,$insert_club);
    }
    }
    move_uploaded_file($_FILES['club_banner']['tmp_name'], $target_banner);
    move_uploaded_file($_FILES['teacher_profile']['tmp_name'], $target_profile);
    header("Location: Addclub.php"); 
    }
}
?>