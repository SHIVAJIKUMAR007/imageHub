<?php

include_once('../db_connect.php');

$id = $_GET['id'];

$remove = "DELETE FROM `query` WHERE id='$id'";
if($queryfire_remove = mysqli_query($con , $remove))
{
    echo "<script>alert('removed')</script>";
    echo "<script>window.open('query.php','_self')</script>";
}
else
{
    echo "<script>alert('technical error')</script>";
    echo "<script>window.open('query.php','_self')</script>";
}

?>