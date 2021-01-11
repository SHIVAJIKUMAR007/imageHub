<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$buyer = $_SESSION['username'];
$payable_amount = $_GET['pay'];
$email = $_GET['email'];
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}

$gst = $_POST['gst'];
$name = $_POST['name'];
$method = $_POST['method'];
$otp = rand(10000000,99999999);

if($method == "Online")
{
   $result = header('location : online payment gateway ');

   if($result)
   {
    $insert = "INSERT INTO `order_table`( `name`, `email`, `b_username`, `amount`, `stetus`, `otp`,`gst`,`method`)
    VALUES ('$name','$email','$buyer','$payable_amount','paid','$otp','$gst','$method')";
    $queryfire_insert = mysqli_query($con, $insert);

$query ="SELECT `o_id` FROM `order_table` WHERE otp='$otp'";
$queryfire = mysqli_query($con,$query);
$oid = mysqli_fetch_array($queryfire);
$o_id = $oid['o_id'];    

    $detail = "SELECT * FROM `cart` WHERE b_username='$buyer'";
    $queryfire_detail = mysqli_query($con, $detail);
    while( $result = mysqli_fetch_array($queryfire_detail))
    {
        $seller= $result['s_username'];
        echo $seller;
        $i_id = $result['i_id'];
        $size = $result['size'];
        $price = $result['price'];
       $query = "INSERT INTO `my_order`(`o_id`, `b_username`, `s_username`, `i_id`, `stetus`, `size`, `price`,`method`)
                              VALUES ('$o_id','$buyer','$seller','$i_id','paid','$size','$price','$method')";
        $queryfire = mysqli_query($con,$query);
       
    }
    $delete = "DELETE FROM `cart` WHERE b_username='$buyer'";
    $queryfire_delete = mysqli_query($con,$delete);

    echo  "<script>alert('your order is received, thank you.')</script>";
    echo  "<script>window.open('my_order.php','_self')</script>";
   }
   else
   {
    echo  "<script>window.open('checkout.php?pay=$payable_amount','_self')</script>";
   }
}

else if ( $method == "DD or NEFT")
{

       $insert = "INSERT INTO `order_table`( `name`, `email`, `b_username`, `amount`, `stetus`, `otp`,`gst`,`method`)
        VALUES ('$name','$email','$buyer','$payable_amount','unpaid','$otp','$gst','$method')";
        $queryfire_insert = mysqli_query($con, $insert);
 
    $query ="SELECT `o_id` FROM `order_table` WHERE otp='$otp'";
    $queryfire = mysqli_query($con,$query);
    $oid = mysqli_fetch_array($queryfire);
    $o_id = $oid['o_id'];    

        $detail = "SELECT * FROM `cart` WHERE b_username='$buyer'";
        $queryfire_detail = mysqli_query($con, $detail);
        while( $result = mysqli_fetch_array($queryfire_detail))
        {
            $seller= $result['s_username'];
            echo $seller;
            $i_id = $result['i_id'];
            $size = $result['size'];
            $price = $result['price'];
           $query = "INSERT INTO `my_order`(`o_id`, `b_username`, `s_username`, `i_id`, `stetus`, `size`, `price`,`method`)
                                  VALUES ('$o_id','$buyer','$seller','$i_id','unpaid','$size','$price','$method')";
            $queryfire = mysqli_query($con,$query);
           
        }
        $delete = "DELETE FROM `cart` WHERE b_username='$buyer'";
        $queryfire_delete = mysqli_query($con,$delete);

        echo  "<script>alert('your order is received, thank you.')</script>";
        echo  "<script>window.open('my_order.php','_self')</script>";
   
}

?>