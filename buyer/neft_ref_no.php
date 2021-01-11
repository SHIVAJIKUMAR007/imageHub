<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$buyer = $_SESSION['username'];
$oid = $_GET['oid'];
$neft = $_POST['neft'];
echo $neft;
 $update = "UPDATE `order_table` SET `stetus`='paid',`neft_ref`='$neft' WHERE o_id = '$oid'";
 $queryfire = mysqli_query($con,$update);

 $select = "SELECT * FROM `my_order` WHERE o_id = '$oid'";
 $queryfire_select= mysqli_query($con,$select);
 while($result = mysqli_fetch_array($queryfire_select))
 {
    $update = "UPDATE `my_order` SET`stetus`='paid' WHERE o_id = '$oid'";
    $queryfire = mysqli_query($con, $update);
 }  

 echo "<script> alert('your neft ref no is received, our team will check your ref no and soon you will get image and licence by email')</script>";
 echo "<script> window.open('my_order.php','_self')</script>";

?>