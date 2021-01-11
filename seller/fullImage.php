<?php
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
$user = $_SESSION['username'];
$id = $_GET['id'];
$query = "SELECT * FROM `images` WHERE i_id = '$id'";
$queryfire = mysqli_query($con, $query);
$result = mysqli_fetch_array($queryfire);
$i_name = $result['i_name'];
$i_url = $result['i_path'];
$ctg = $result['category'];
$description = $result['description'];
$tag = $result['tag'];
?>
<!DOCTYPE html>
<html>
<head>
       <title>image full detail</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body >
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
 <div style="background-color: black;" class="text-white">
 <div class="container-fluid mb-5"><div class="row">
    <div class="col-lg-3 col-md-3 col-12" >
        <?php include_once('sidebar.php'); ?>
    </div>
    <div class="col-lg-9 col-md-9 col-12 mt-5" >
      <h1 class=" text-center text-capitalize mb-4 ">name : <?php echo $i_name  ?></h1>
      <div class="container"><center><img src="../<?php echo $ctg ?>/<?php echo $i_url ?>" 
       class="img-fluid" style="height:500px;"  alt="<?php echo $tag ?>"></center></div>
       <h5 class=" mt-3 mb-3">Category : <?php echo $ctg ?></h5>
       <h4 class=" mt-5">Description : </h4>
       <p><?php echo $description ?></p>
       <h5 class=" mt-5">Tags : </h5>
       <h6> <?php echo $tag ?></h6> <br>

                 <!-- button to delete or update  -->
                  <div class="container px-5"><div class="row">
                  <div><form action="edit.php?id=<?php echo $id ?>" method="post"><button type="submit" class="btn btn-danger">Edit details</button></form></div>
                  <div class="ml-auto"><form action="delete.php?id=<?php echo $id ?>" method="post"><button type="submit" class="btn btn-danger">Delete this image</button></form></div>
                  </div></div>
    </div>
 </div></div>
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>

<!-- class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" -->