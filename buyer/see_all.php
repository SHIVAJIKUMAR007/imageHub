<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$ctg = $_GET['ctg'];
$images = "SELECT * FROM `images` WHERE category= '$ctg'";
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
       ?>
    </header>
<div style="background-color:black;" class=" container-fluid text-capitalize py-5">   
 <h1 class=" text-danger text-center pb-4"><?php echo $ctg ?> based all images</h1>
<div class="row pb-5">
   <?php
    while($result = mysqli_fetch_array($queryfire_images))
    {
        $image_id = $result['i_id'];
        $image_name = $result['i_name'];
        $image_url = $result['i_path'];
        $image_ctg = $result['category'];
        $image_tag = $result['tag'];
        $seller = $result['s_username'];

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
                 <a href="same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
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
  ?>
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
