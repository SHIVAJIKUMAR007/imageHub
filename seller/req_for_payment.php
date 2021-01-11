<?php
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');
//connected
$seller = $_SESSION['username'];
$amount = $_POST['amount'];
$date = date("y/m/d");
echo $date;
// funciton for date   =  date("d/m/y")
$get_balance = "SELECT * FROM `seller_account` WHERE username = '$seller'";
$queryfire_get_balance = mysqli_query($con, $get_balance);
$array_get_balance = mysqli_fetch_array($queryfire_get_balance);
$earning = $array_get_balance['lifetime_earning'];
$withdraw = $array_get_balance['lifetime_withdraw'];
$balance = $earning - $withdraw;

if($amount<$balance)
{
    $query = "INSERT INTO `payment_request`(`username`, `amount_req`, `stetus`, `date`) VALUES ('$seller','$amount','pending','$date')";
    $queryfire = mysqli_query($con, $query);

    echo "<script>alert('payment request is sent.')</script>";
    echo "<script>window.open('get_payment.php','_self')</script>";
}
else 
{
    echo "<script>alert('not enough balance for this transaction.')</script>";
    echo "<script>window.open('get_payment.php','_self')</script>";
}
?>