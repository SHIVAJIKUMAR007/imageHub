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
?>
<!DOCTYPE html>
<html>
<head>
       <title>profile</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body style="background-color: black;" class="text-white">
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<!-- main body  -->
<div class="container-fluid mt-5 mb-5"><div class="row">

      <div class="col-lg-3 col-md-3 col-12" >
        <?php include_once('sidebar.php'); ?>
      </div>
      <!-- photos -->
      <div class="col-lg-9 col-md-9 col-12" >
      <h1 class=" text-center text-capitalize ">your all images</h1>
          <div class="container-fluid my-5"><div class="row">
       
     <?php
       
       $query = "SELECT * FROM `images` WHERE s_username= '$user'";
       $queryfire = mysqli_query($con, $query);
    
    while($result = mysqli_fetch_array($queryfire))  {       
       $i_url = $result['i_path'];
       $i_name = $result['i_name'];
       $ctg = $result['category'];
       $id = $result['i_id'];

       
        ?>
       <div class="col-lg-3 col-md-6 col-12">
         <a href="fullImage.php?id=<?php echo $id ?>" style="text-decoration: none;">
         <div class="card mx-auto my-3" style="width: 15rem;;">
       <h5 class="card-title p-3">Name : <?php echo $i_name ?></h5>
         <img src="../<?php echo $ctg ?>/<?php echo $i_url ?>" class="img-fluid p-1" >
         <p class="card-title p-3">Category : <?php echo $ctg ?></p>

         </div></a>
         </div>
        <?php
    }    
?>
</div></div>

 </div>
 <!-- photos end  -->

</div></div>
<!-- main body end  -->
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>