<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$seller = $_GET['seller'];
$images = "SELECT * FROM `images` WHERE s_username='$seller'";
$queryfire_images = mysqli_query($con, $images);

?>
<!DOCTYPE html>
<html>
<head>
       <title>See All images</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body>
    <header class="pt-2">
    <?php 
      if(!isset($_SESSION['username']))
      {
        include_once('header.php');
      }
      else
      {
        include_once('login_header.php');
      }
       ?>    </header>
<div style="background-color:black;" class=" container-fluid text-capitalize py-5">   
<div class="row pb-5">
   <div class="col-lg-3 col-md-3 col-12">
    <!-- sidebar  -->
    <div class=" container-fluid py-5 ">
<div class=" mt-5 p-2">

<?php

$get_data = "SELECT * FROM `seller` WHERE username= '$seller'";
$queryfire = mysqli_query($con,$get_data);
$result = mysqli_fetch_array($queryfire);
$avtar = $result['avtar'];
$name = $result['name'];
$bio = $result['bio'];
$fb = $result['fb'];
$insta = $result['insta'];
$twitter = $result['twitter'];
$pin = $result['pinterest']; 
if($avtar=="")
{   ?>
    <!-- profile image  -->
    <center><img src="https://st3.depositphotos.com/13159112/17145/v/450/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg"
     class="img-fluid" style="border-radius:50%; width:300px; height:300px;"></center>    
    <div style="margin-top:-150px;background-color:#bec7b9; padding-top:170px;" class=" pb-2">
      <!-- username and name  -->
    <div class=" text-danger text-center"><h5>Hi, <?php echo $seller ?>!</h5><h6><?php echo $name ?></h6> </div>
     <!-- bio  --><br>
    <div class="text-center"><?php echo $bio ?> </div>
    <!-- social media links  --><br>
    <div class="container pl-5 pr-5"><div class="row pr-5 pl-5">
     <div class=" mx-auto"><a href="<?php echo $fb  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $insta  ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $twitter  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
     <div class="mx-auto"><a href="<?php echo $pin  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
    </div></div>
    </div>
    <?php
}

else
{
    ?>
    <!-- profile image  -->
    <center><img src="../seller/profile image/<?php  echo $avtar;?>"
     class="img-fluid" style="border-radius:50%; width:300px; height:300px;"></center>    
    <div style="margin-top:-150px;background-color:#bec7b9; padding-top:170px;" class=" pb-2">
      <!-- username and name  -->
    <div class=" text-danger text-center"><h5>Hi, <?php echo $seller ?>!</h5><h6><?php echo $name ?></h6> </div>
     <!-- bio  --><br>
    <div class="text-center"><?php echo $bio ?> </div>
    <!-- social media links  --><br>
    <div class="container pl-5 pr-5"><div class="row pr-5 pl-5">
     <div class=" mx-auto"><a href="<?php echo $fb  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $insta  ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $twitter  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
     <div class="mx-auto"><a href="<?php echo $pin  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
    </div></div>
    </div>
    <?php
}
?>
</div>
</div>

    <!-- sidebar end  -->
   </div>
 <div class="col-lg-9 col-md-9 col-12">
 <div style="background-color:black;" class=" container-fluid text-capitalize py-5">   
<div class="row pb-5">
  <?php  
    while($result = mysqli_fetch_array($queryfire_images))
    {
        $image_id = $result['i_id'];
        $image_name = $result['i_name'];
        $image_url = $result['i_path'];
        $image_ctg = $result['category'];
        $image_tag = $result['tag'];
        ?>
          <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
          <a href="more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
          <div class="card mx-auto" style="width: 15rem;">
          <img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
               <div class="card-body">
                <h5 class="card-title"><?php echo $image_name ?></h5>
              </div></a>

              <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="same_modal.php?seller=<?php echo $seller ?>" style="color:black;"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="../login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="../login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                       <?php
                     }
                     else
                     {
                       ?>    
                          <a href="addcart.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="addwish.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                       <?php
                     }
                   ?>
                <a href="more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  

            </div>
           </div>
       <?php
    }
  ?>  </div>
  </div>
</div>



</div>
</div>
  <!-- white div end -->
<footer>
   <!-- contact us  -->
   <?php include_once('../contact.php'); ?>
   <!-- contact us end  -->
<?php  include_once('../footer.php'); ?>

</footer>
</body>
</html>





<!-- <h1 class=" text-danger text-center pb-4"><?php echo $seller ?>'s all images</h1> -->
