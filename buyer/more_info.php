<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$id = $_GET['id'];
$images = "SELECT * FROM `images` WHERE i_id= '$id'";
$queryfire_images = mysqli_query($con, $images);
$result = mysqli_fetch_array($queryfire_images);
$i_name= $result['i_name'];
$ctg = $result['category'];
$i_url = $result['i_path'];
$tag = $result['tag'];
$description = $result['description'];
$seller = $result['s_username'];
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
    <!-- black div start  -->
    <div style="background-color:black;" class=" container-fluid text-white text-capitalize py-5">     
     <h1 class=" text-center text-capitalize mb-4 ">name : <?php echo $i_name  ?></h1>
      <div class="container"><center><img src="../<?php echo $ctg ?>/<?php echo $i_url ?>" 
       class="img-fluid" style="width:300px;"  alt="<?php echo $tag ?>">
       <br><br>
        <div class="container-fluid" style="width:290px;" ><div class="row">
                 <div>
                <a href="see_all.php?ctg=<?php echo $ctg  ?>" style="color:white;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="same_modal.php?seller=<?php echo $seller ?>" style="color:white;"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                   <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="../login.php" style="color:white;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="../login.php" style="color:white;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>
                       <?php
                     }
                     else
                     {
                       ?>    
                          <a href="addcart.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:white;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="addwish.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:white;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>
                       <?php
                     }
                   ?>
                </div>
                 </div></div>  
       
       </center></div><br>
       <h5 class="px-5 mt-3 mb-3">Category : <?php echo $ctg ?></h5>
       <h4 class="px-5 mt-5">Description : </h4>
       <p class="px-5"><?php echo $description ?></p>               
    </div>

</div>
  <!-- black div end -->
   <!-- white div  -->
  <div class=" container py-5"><div class="row">
      <div class="col-lg-3 col-md-3 col-12">
          <a href="same_modal.php?seller=<?php echo $seller ?>" style=" text-decoration:none; color:black;">
          <div class=" mt-5 px-3 text-center py-2" style="border:2px solid black;"><i class='fas fa-user-alt' title = "same modal">&nbsp;&nbsp;</i> Same Modal Images &nbsp;&nbsp; <i class="fa fa-angle-double-right"></i> </div></a>
      </div>
      <div class="col-lg-9 col-md-9 col-12">
         
     <div class=" container-fluid text-capitalize">   
     <div class="row pb-5">
     <?php
     $query = "SELECT * FROM `images` WHERE s_username = '$seller' LIMIT 3";
     $queryfire = mysqli_query($con, $query);  
     while($result = mysqli_fetch_array($queryfire))
      {
         $image_id = $result['i_id'];
        $image_name = $result['i_name'];
        $image_url = $result['i_path'];
        $image_ctg = $result['category'];
        $image_tag = $result['tag'];
        $seller = $result['s_username'];
        ?>
          <div class=" col-lg-4 col-md-4 col-sm-12 col-12 my-2 ">
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
       ?>
      </div>
    </div>
      </div>
     
  </div>
 </div>
   <!-- white div end  -->
<footer>
     <!-- contact us  -->
     <?php include_once('../contact.php'); ?>
   <!-- contact us end  -->
<?php  include_once('../footer.php'); ?>

</footer>
</body>
</html>



