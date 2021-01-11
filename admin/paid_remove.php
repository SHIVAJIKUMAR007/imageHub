<?php
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');

$seller = $_GET['username'];
// echo $seller;
$amount = $_GET['amount'];
// echo $amount;
$date = date("y/m/d");
 
$update_status = "UPDATE `payment_request` SET `stetus`='paid' WHERE username='$seller'";
$queryfire_update_status = mysqli_query($con,$update_status);

$insert = "INSERT INTO `payment_history`(`username`, `amount_withdraw`, `date`) VALUES ('$seller','$amount','$date')";
$queryfire_insert = mysqli_query($con , $insert);

//update withdrawal in seller_account 

$query = "SELECT * FROM `seller_account` WHERE username= '$seller'";
$queryfire = mysqli_query($con , $query);
$result = mysqli_fetch_array($queryfire);
$withdraw = $result['lifetime_withdraw'];

$withdraw = $withdraw + $amount;

$update_withdraw = "UPDATE `seller_account` SET `lifetime_withdraw`='$withdraw' WHERE username = '$seller'";
if($queryfire_update_withdraw = mysqli_query($con, $update_withdraw))
{
    echo "<script>alert('successfully removed!')</script>";
    echo "<script>window.open('payment_request.php','_self')</script>";
}
else
{
    echo "<script>alert('technical error')</script>";
    echo "<script>window.open('payment_request.php','_self')</script>";
}
?>