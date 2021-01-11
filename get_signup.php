<?php
ob_start();
session_start();

// if(!isset($_POST['username']))
// {
//     header('location:login.php');
// }
// if(!isset($_POST['pass']))
// {
//     header('location:login.php');
// }
// if(!isset($_POST['role']))
// {
//     header('location:login.php');
// }

$role = $_POST['role'];
// connectinon of db
 include_once('db_connect.php'); 

 if($role == "Buyer")
 {

$user=$_POST['username'];
$name = $_POST['name'];
$pass=$_POST['pwd'];
$str_pass=password_hash($pass,PASSWORD_BCRYPT);
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender = $_POST['gender'];
$proffesion = $_POST['proffesion'];


$query="SELECT * FROM `buyer` WHERE  username= '$user'";

$result= mysqli_query($con,$query);
$num = mysqli_num_rows($result);

if($num>=1)
{
    echo "<script>alert('username already exist, try other.')</script>";
    echo "<script>window.open('signup.php','_self') </script>";
}
else
{
    $insert = "INSERT INTO `buyer`(`username`, `pass`, `name`, `email`, `contact no`, `gender`, `profession`)
     VALUES ('$user','$str_pass','$name','$email','$contact','$gender','$proffesion')";
    $queryfire_insert=mysqli_query($con,$insert);

        echo "<script>alert('successfully registered now login')</script>";
        echo "<script>window.open('login.php','_blank')</script>";

    // else
    // {
    // echo "<script>alert('technical issue visit after some time')</script>";
    // echo "<script>window.open('signup.php','_self')</script>";
    // }

    }

 }
else if($role =="Seller")
{

$user=$_POST['username'];
$name = $_POST['name'];
$pass=$_POST['pwd'];
$str_pass=password_hash($pass,PASSWORD_BCRYPT);
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender = $_POST['gender'];
$proffesion = $_POST['proffesion'];


    $query="SELECT * FROM `seller` WHERE username= '$user'";
    
    $result= mysqli_query($con,$query);
    $num = mysqli_num_rows($result);
    
    if($num>=1){
        echo "<script>alert('username already exist, try other.') </script>";
        echo "<script>window.open('signup.php','_self') </script>";
        }
        else
        {
        $insert = "INSERT INTO `seller`(`username`, `pass`, `name`, `gender`, `email`, `contact no`, `profession`)
         VALUES ('$user','$str_pass','$name','$gender','$email','$contact','$proffesion')";
        if($queryfire_insert=mysqli_query($con,$insert)){

            $payment = "INSERT INTO `seller_account`(`username`, `lifetime_earning`, `lifetime_withdraw`, `lifetime_large_sell`, `lifetime_medium_sell`, `lifetime_small_sell`, `lifetime_web_sell`)
                                            VALUES ('$user','0','0','0','0','0','0')";
            $queryfire_payment = mysqli_query($con, $payment);
 

            echo "<script>alert('successfully registered now login')</script>";
            echo "<script>window.open('login.php','_blank')</script>";
        }
        else
           {
            echo "<script>alert('technical issue visit after some time')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
           }
        }
    
    }
?>
