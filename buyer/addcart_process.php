<?php
ob_start();
session_start();
// connectinon of db
include_once('../db_connect.php');
 
$buyer = $_SESSION['username'];
$i_id=$_GET['id'];
$size = $_POST['size'];
if($size=="web")
$price = 800;
else if($size=="small")
$price = 1600;
else if($size=="medium")
$price = 2400;
else
$price = 3000;

$seller = $_GET['seller'];

$query = "SELECT * FROM `cart` WHERE i_id = '$i_id'";
$queryfire = mysqli_query($con, $query);
$num = mysqli_num_rows($queryfire);

if($num > 0 )
{
       echo "<script>alert('this image is already present in the cart')</script>";
       echo "<script>window.open('cart.php','_self')</script>";
}
else 
{
     $insert = "INSERT INTO `cart`(`s_username`, `b_username`, `i_id`, `size`, `price`) 
     VALUES ('$seller','$buyer','$i_id','$size','$price')";
    if( $queryfire_insert = mysqli_query($con, $insert))
    {
        echo "<script>alert('this image is added to cart')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('some technical issue arise')</script>";
        echo "<script>window.open('home.php','_self')</script>";
    }

}

?>

