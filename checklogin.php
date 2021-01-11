<?php
ob_start();
session_start();

if(!isset($_POST['username']))
{
    header('location:login.php');
}
else if(!isset($_POST['pwd']))
{
    header('location:login.php');
}
else if(!isset($_POST['role']))
{
    header('location:login.php');
}
    $user=$_POST['username'];
    $pass=$_POST['pwd'];
 
// connectinon of db
 include_once('db_connect.php'); 
$role = $_POST['role'];
if($role == "Buyer")
 {

    
    
    $query="SELECT * FROM `buyer` WHERE username= '$user'";
    $queryfire= mysqli_query($con,$query);
    $result=mysqli_fetch_array($queryfire);
    $check_pass=$result['pass'];
   
    if($checked=password_verify($pass,$check_pass)){
        $_SESSION['username']=$user;
        echo "<script>alert('succefully logined')</script>";
        echo "<script>window.open('buyer/home.php','_self')</script>"; 
         }
        else{    
            echo "<script>alert('please check your credentials')</script>";
            echo "<script>window.open('login.php','_self')</script>";   
        }
     }
else if($role =="Seller")
{
  
    $query="SELECT * FROM `seller` WHERE username= '$user'";
    $queryfire= mysqli_query($con,$query);
    $result=mysqli_fetch_array($queryfire);
    $check_pass=$result['pass'];
   
    if($checked=password_verify($pass,$check_pass)){
        $_SESSION['username']=$user;
        echo "<script>alert('successfully logined')</script>";
        echo "<script>window.open('seller/profile.php','_self')</script>";    
      }
        else{
    
            echo "<script>alert('please check your credentials')</script>";
            echo "<script>window.open('login.php','_self')</script>";   
        }
    }
else 
{
    echo "<script>alert('you did not selected right role. ')</script>";
    echo "<script>window.open('login.php','_self')</script>"; 
}
?>
