<?php

// db connect 
include_once('db_connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$massage = $_POST['massage'];


 $massage = "INSERT INTO `query`(`name`, `email`, `massage`,`stetus`) VALUES ('$name','$email','$massage','pending')";
 if($queryfire_massage = mysqli_query($con , $massage))
 {
    echo "<script>alert('massage sent')</script>";
    echo "<script>window.open('index.php','_self')</script>";
 }
 else
 {
    echo "<script>alert('technical issue please visit after some time')</script>";
    echo "<script>window.open('index.php','_self')</script>";    
 }

?>