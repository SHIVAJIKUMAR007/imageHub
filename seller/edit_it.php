<?php  
ob_start();
session_start();
// connect db 
include_once('../db_connect.php');
//db connected

$update_id = $_GET['id'];
$i_id = $_GET['i_id'];

if($update_id==1)
{
    $i_name = $_POST['name'];
    
    $update_i_name = "UPDATE `images` SET `i_name`='$i_name' WHERE i_id='$i_id'";
    if($queryfire_update_i_name = mysqli_query($con,$update_i_name))
    {
      echo "<script>alert('image name is updated')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";  
    }

}

else if($update_id==3)
{
    $description = $_POST['description'];
    
    $update_description = "UPDATE `images` SET `description`='$description' WHERE i_id='$i_id'";
    if($queryfire_update_description = mysqli_query($con,$update_description))
    {
      echo "<script>alert('description is updated')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";  
    }

}

else if($update_id==4)
{
    $tag = $_POST['tag'];
    
    $update_tag = "UPDATE `images` SET `tag`='$tag' WHERE i_id='$i_id'";
    if($queryfire_update_tag = mysqli_query($con,$update_tag))
    {
      echo "<script>alert('tag is updated')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";
    }
    else
    {
      echo "<script>alert('some error coming, contact to our technical support')</script>";
      echo "<script>window.open('edit.php?id=$i_id','_self')</script>";  
    }

}
?>