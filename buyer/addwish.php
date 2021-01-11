<?php
ob_start();
session_start();
// connectinon of db
include_once('../db_connect.php');
 
$buyer = $_SESSION['username'];
$i_id=$_GET['id'];
$seller = $_GET['seller'];

$query = "SELECT * FROM `wishlist` WHERE i_id = '$i_id'";
$queryfire = mysqli_query($con, $query);
$num = mysqli_num_rows($queryfire);

if($num > 0 )
{
       echo "<script>alert('this image is already present in the wishlist')</script>";
       echo "<script>window.open('wishlist.php','_self')</script>";
}
else 
{
     $insert = "INSERT INTO `wishlist`(`i_id`, `s_username`, `b_username`) 
     VALUES ('$i_id','$seller','$buyer')";
    if( $queryfire_insert = mysqli_query($con, $insert))
    {
        echo "<script>alert('this image is added to wishlist')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('some technical issue arise')</script>";
        echo "<script>window.open('home.php','_self')</script>";
    }

}

?>

