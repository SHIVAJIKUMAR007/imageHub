<?php
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
$seller = $_SESSION['username'];

$id = $_GET['id'];

if ($id == 1) {
    $name = $_POST['name'];
    $acc = $_POST['acc'];
    $ifsc = $_POST['ifsc'];
    $query = "UPDATE `seller` SET `payment_method`='Bank Transfer',`bank_name`='$name',`acc_no`='$acc',`ifsc`='$ifsc' WHERE username='$seller'";
    if($queryfire = mysqli_query($con,$query))
    {
        echo "<script>alert('your bank details are updated')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
    else
    {
        echo "<script>alert('some technical issue')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
}
else if ($id == 2) {
    $paytm = $_POST['paytm'];
    $query = "UPDATE `seller` SET `payment_method`='Paytm',`paytm_no`='$paytm' WHERE username='$seller'";
    if($queryfire = mysqli_query($con,$query))
    {
        echo "<script>alert('your bank details are updated')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
    else
    {
        echo "<script>alert('some technical issue')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
}
else if ($id == 3) {
    $u_no = $_POST['u_no'];
    $u_id = $_POST['u_id'];
    $query = "UPDATE `seller` SET `payment_method`='UPI', `upi_id`='$u_id',`upi_no`='$u_no' WHERE username='$seller'";
    if($queryfire = mysqli_query($con,$query))
    {
        echo "<script>alert('your bank details are updated')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
    else
    {
        echo "<script>alert('some technical issue')</script>";
        echo "<script>window.open('add_method.php','_self')</script>";  
    }
}
?>