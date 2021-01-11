<?php
ob_start();
session_start();
// connectinon of db
include_once('../db_connect.php');
 
$buyer = $_SESSION['username'];
$i_id=$_GET['id'];

$query = "DELETE FROM `cart` WHERE i_id = '$i_id'";
if($queryfire = mysqli_query($con, $query))
{
      echo "<script>alert('this image is is deleted from your cart')</script>";
       echo "<script>window.open('cart.php','_self')</script>";
}
else
{
    echo "<script>alert('some technical issue arise')</script>";
       echo "<script>window.open('cart.php','_self')</script>";
}   


?>

