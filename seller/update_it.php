<?php
ob_start();
session_start();
// connectinon of db
include_once('../db_connect.php');
//db connected
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}

$update_id = $_GET['id'];
$user = $_SESSION['username'];
//    profile image 
if($update_id==1)
{
    $image_name=$_FILES['profile']['name'];
    $image_temp_name=$_FILES['profile']['tmp_name'];
    $target="profile image/".$image_name;
    move_uploaded_file($image_temp_name,$target);

    $update_avtar = "UPDATE `seller` SET `avtar`='$image_name' WHERE username= '$user'";
    if($queryfire_update_avtar = mysqli_query($con,$update_avtar))
    {
      echo "<script>alert('profile image is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }
}
    //   bio section 
else if($update_id==2)
{
    $bio = $_POST['bio'];
    
    $update_bio = "UPDATE `seller` SET `bio`='$bio' WHERE username= '$user'";
    if($queryfire_update_bio = mysqli_query($con,$update_bio))
    {
      echo "<script>alert('bio is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==3)
{
    $email = $_POST['email'];
    
    $update_email = "UPDATE `seller` SET `email`='$email' WHERE username= '$user'";
    if($queryfire_update_email = mysqli_query($con,$update_email))
    {
      echo "<script>alert('email is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==4)
{
    $contact = $_POST['contact'];
    
    $update_contact = "UPDATE `seller` SET `contact no`='$contact' WHERE username= '$user'";
    if($queryfire_update_contact = mysqli_query($con,$update_contact))
    {
      echo "<script>alert('contact no is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==5)
{
    $fb = $_POST['fb'];
    
    $update_fb = "UPDATE `seller` SET `fb`='$fb' WHERE username= '$user'";
    if($queryfire_update_fb = mysqli_query($con,$update_fb))
    {
      echo "<script>alert('fb link is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==6)
{
    $insta = $_POST['insta'];
    
    $update_insta = "UPDATE `seller` SET `insta`='$insta' WHERE username= '$user'";
    if($queryfire_update_insta = mysqli_query($con,$update_insta))
    {
      echo "<script>alert('insta link is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==7)
{
    $twitter = $_POST['twitter'];
    
    $update_twitter = "UPDATE `seller` SET `twitter`='$twitter' WHERE username= '$user'";
    if($queryfire_update_twitter = mysqli_query($con,$update_twitter))
    {
      echo "<script>alert('twitter link is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==8)
{
    $pin = $_POST['pin'];
    
    $update_pin = "UPDATE `seller` SET `pinterest`='$pin' WHERE username= '$user'";
    if($queryfire_update_pin = mysqli_query($con,$update_pin))
    {
      echo "<script>alert('pinterest link is updated')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}

else if($update_id==9)
{
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    $get_pass = "SELECT  `pass` FROM `seller` WHERE username= '$user'";
    $queryfire_get_pass = mysqli_query($con, $get_pass);
    $get_pass_array = mysqli_fetch_array($queryfire_get_pass);
    $pre_pass = $get_pass_array['pass'];
    

    if($old_pass==$new_pass)
    {
        echo "<script>alert('old and new password are same')</script>";
        echo "<script>window.open('update_profile.php','_self')</script>";   
    }
    else if($check_pass = password_verify($old_pass, $pre_pass))
    { 
        $hass_pass = password_hash($new_pass,PASSWORD_BCRYPT);
       

        $update_pass = "UPDATE `seller` SET `pass`='$hass_pass' WHERE username= '$user'";
        if($queryfire_update_pass = mysqli_query($con,$update_pass))
        {
          echo "<script>alert('password is updated')</script>";
          echo "<script>window.open('update_profile.php','_self')</script>";
        }
        else
        {
          echo "<script>alert('some error coming, contact to our technical support')</script>";
          echo "<script>window.open('update_profile.php','_self')</script>";  
        }
      
    }
    else
    {
        echo "<script>alert('you did not enter right old password')</script>";
          echo "<script>window.open('update_profile.php','_self')</script>";  
    }

}
?>