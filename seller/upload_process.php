<?php
ob_start();
session_start();
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}

$user = $_GET['user'];
$ctg = $_POST['ctg'];
$name =$_POST['image_name'];
$description =$_POST['description'];
$tag = $_POST['tag'];

$image_url=$_FILES['image']['name'];
$image_temp_name=$_FILES['image']['tmp_name'];
$image_path="../".$ctg."/".$image_url;
move_uploaded_file($image_temp_name,$image_path);

// connectinon of db
include_once('../db_connect.php');
//db connected
$upload_food = "INSERT INTO `images`(`i_name`, `i_path`, `category`, `description`, `s_username`, `tag`)
                             VALUES ('$name','$image_url','$ctg','$description','$user','$tag')";

if($queryfire_upload_food = mysqli_query($con,$upload_food))
{
    echo "<script>alert('image is uploaded')</script>";
    echo "<script>window.open('upload_image.php','_self')</script>";
}
else
{
    echo "<script>alert('some error coming, contact to our technical support')</script>";
    echo "<script>window.open('upload_image.php','_self')</script>";  
}

?>