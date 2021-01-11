<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$user = $_SESSION['username'];
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
       <title>wish list </title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body>
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header>
<div style="background-color: black;" class="text-white pb-5">
<h1 class="text-center p-4" style="font-weight: bolder;"><i class="fas fa-heart"></i>&nbsp;&nbsp;&nbsp;Your Wishlist </h1>
<a href="home.php" style="text-decoration:none; width:20%; "><div class="pl-5" style="font-family:Lucida Sans;border-radius:6px; border:2px solid black; width:20%;">
    <button style=" font-weight:bold; text-align:center;" class="btn btn-danger">BACK TO SHOPPING</button>
</div></a><br><br>
     
<?php

$query = "SELECT * FROM `wishlist` WHERE  b_username='$user'";
$queryfire=mysqli_query($con,$query);
$num = mysqli_num_rows($queryfire);


if($num >0){
    ?><h3 class="pl-5"><?php echo $num ?> found images in your Wishlist</h3><br>

    <div class="container_fluid">
    <div class="row">
    <?php
       while($wishlist = mysqli_fetch_array($queryfire))
       {
        $i_id= $wishlist['i_id'];
        $query1="SELECT * FROM `images` WHERE i_id = '$i_id'";
        $queryfire1=mysqli_query($con,$query1);
        $image_detail = mysqli_fetch_array($queryfire1);  
        $image_ctg = $image_detail['category']; 
        $image_name = $image_detail['i_name'];
        $image_url = $image_detail['i_path'];
        $image_tag = $image_detail['tag'];
        $seller = $image_detail['s_username'];   
    ?>
   <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
   <a href="more_info.php?id=<?php echo $i_id ?>" style =" text-decoration:none; color:black;">  
   <div class="card mx-auto" style="width: 15rem;">
             <img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $image_name ?></h5>
                 <div class="container-fluid"><div class="row">
                 <div>
                 <a href="see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="same_modal.php?seller=<?php echo $seller ?>" style="color:black;"><i class='fas fa-user-alt'></i> </a>
                 </div>
                 <div class=" ml-auto">
                <a href="addcart.php?id=<?php echo $i_id?>&seller=<?php echo $seller ?>" target="_blank" style="color:black;"><i class='fas fa-shopping-cart'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="removewish.php?id=<?php echo $i_id?>" style="color:black;" target="_blank"><i class="fas fa-times"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="more_info.php?id=<?php echo $i_id?>" style="color:black;"><i class='fas fa-info'></i></a>
                 </div>
                 </div></div>
                 </div>
               </div></a>
              </div>
    <?php
    }
 }
else
{
    ?><br><br><h1 class="mx-auto">your wishlist is empty</h1><?php
}
?>

    </div>
</div>


</div>
<!-- white div end -->
<footer>

       <!-- contact us  --> <br>
       <?php include_once('../contact.php'); ?>
<!-- contact us end  -->
<?php  include_once('../footer.php'); ?>

</footer>
</body>
</html>