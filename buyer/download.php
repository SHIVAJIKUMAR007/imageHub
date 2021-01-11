<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$buyer = $_SESSION['username'];
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}

$output = "licence2.png";
$w = 1200;
$h =1500;
// header('Content-type: image/png');
$License = imagecreate($w, $h);

$white = imagecolorallocate($License, 255, 255, 255);
$black = imagecolorallocate($License,0,0,0);

$head = imagettftext($License,30,0,1200,50,$black,"OpenSans-Bold.ttf","License");





imagepng($License, $output);

// $path_image = 'License.png';
// imagepng($License, $path_image);
?>
<center><img src="licence2.png" ></center>