<?php
ob_start();
session_start();
// connect db 
include_once('../db_connect.php');
//db connected

$id = $_GET['id'];

 
$delete = "DELETE FROM `images` WHERE i_id='$id'";
if($queryfire_delete = mysqli_query($con,$delete))
{
  echo "<script>alert('image is deleted')</script>";
  echo "<script>window.open('profile.php','_self')</script>";
}
else
{
  echo "<script>alert('some error coming, contact to our technical support')</script>";
  echo "<script>window.open('profile.php','_self')</script>";  
}

?>