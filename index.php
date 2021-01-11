<?php
// db connection 
include_once('./db_connect.php');
// coonnected
?>
<!DOCTYPE html>
<html>
<head>
       <title>Image Hub</title>
<?php include_once('bootstrap.php'); ?>
<style>
 .carousel-inner img {
    width: 100%;
    height: 100%;
  }
</style>
</head>
<body>
    <header class="pt-2">
          <?php include_once('header.php'); ?>
    </header>
<div style="background-color:black;" class="text-capitalize pb-4">

                <!-- carousel -->
<div id="demo" class="carousel slide m-auto pt-3 pb-3" data-ride="carousel" style="width: 90%; height:70%;" >

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner  " style="border:2px solid white;">
      <!-- inner start -->
    <div class="carousel-item active">
      <img src="Natural/nature1.jpg" alt="NATURAL">
      <div class="carousel-caption">
    <h3>NATURAL</h3>
    <p>great images releated to nature</p>
  </div>
    </div>
    <div class="carousel-item">
      <img src="Fashion/images.jpg" alt="FASION">
      <div class="carousel-caption">
    <h3>FASION</h3>
    <p> images for Fashion lovers</p>
  </div>
    </div>
    <div class="carousel-item ">
      <img src="Beauty/beauty1.jpg" alt="BEAUTY">
      <div class="carousel-caption">
    <h3>BEAUTY</h3>
    <p>do you love beauty</p>
  </div>
    </div class="">
    <div class="carousel-item">
      <img src="Food and drink/foo.jpg" alt="FOOD AND DRINK">
      <div class="carousel-caption">
    <h3>FOOD AND DRINK</h3>
    <p>best for foody</p>
  </div>
    </div>
  <!-- inner end -->
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
    <!-- carousel  end -->
    <br><br>

    <!-- black div start  -->



<div class="container-fluid pr-4 pl-4">
    <!-- nature section start -->
<div class="row pt-4"><div class="ml-4"><h2 class="text-white" >NATURE</h2></div><div class="ml-auto mr-4"><a href="buyer/see_all.php?ctg=Natural"><h3>see all</h3></a></div> </div>
<hr style="background-color: blanchedalmond;">
     <div class="row">
     <?php
          
          $get_image= "SELECT * FROM `images` WHERE category='Natural' LIMIT 4";
          $queryfire_get_image = mysqli_query($con, $get_image);
         while($array_image = mysqli_fetch_array($queryfire_get_image))
         {
           $image_name = $array_image['i_name'];

           if($image_name != "")
           {  
            $image_id = $array_image['i_id'];
           $image_url = $array_image['i_path'];
           $image_ctg = $array_image['category'];
           $image_tag = $array_image['tag'];
           ?>
             <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
             <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
             <div class="card mx-auto" style="width: 15rem;">
             <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $image_name ?></h5>
                 </div></a>

                 <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  

               </div>
              </div>
          <?php
          }
       }
     ?>
    </div>
       <!-- nature section end -->

         <!-- Fashion  section start -->
<div class="row pt-4 mx-auto "><div class="ml-4"><h2 class="text-white" >Fashion</h2></div><div class="ml-auto mr-4"><a href="buyer/see_all.php?ctg=Fashion"><h3>see all</h3></a></div> </div>
<hr style="background-color: blanchedalmond;">
     <div class="row ">
        <?php
          
          $get_image= "SELECT * FROM `images` WHERE category='Fashion' LIMIT 4";
          $queryfire_get_image = mysqli_query($con, $get_image);
         while($array_image = mysqli_fetch_array($queryfire_get_image))
         {
           $image_name = $array_image['i_name'];

           if($image_name != "")
           {  
            $image_id = $array_image['i_id'];
           $image_url = $array_image['i_path'];
           $image_ctg = $array_image['category'];
           $image_tag = $array_image['tag'];
           ?>
             <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
             <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
             <div class="card mx-auto" style="width: 15rem;">
             <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $image_name ?></h5>
                 </div></a>

                 <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  


               </div>
              </div>
          <?php
          }
       }
     ?>
    </div>
       <!-- Fashion section end -->

         <!-- beauty section start -->
<div class="row pt-4 mx-auto "><div class="ml-4"><h2 class="text-white" >BEAUTY</h2></div><div class="ml-auto mr-4"><a href="buyer/see_all.php?ctg=Beauty"><h3>see all</h3></a></div> </div>
<hr style="background-color: blanchedalmond;">
     <div class="row ">
        <?php
          
          $get_image= "SELECT * FROM `images` WHERE category='Beauty' LIMIT 4";
          $queryfire_get_image = mysqli_query($con, $get_image);
         while($array_image = mysqli_fetch_array($queryfire_get_image))
         {
           $image_name = $array_image['i_name'];

           if($image_name != "")
           {  
            $image_id = $array_image['i_id'];
           $image_url = $array_image['i_path'];
           $image_ctg = $array_image['category'];
           $image_tag = $array_image['tag'];
           ?>
             <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
             <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
             <div class="card mx-auto" style="width: 15rem;">
             <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $image_name ?></h5>
                 </div></a>

                 <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  


               </div>
              </div>
          <?php
          }
       }
     ?>
    </div>
       <!-- beauty section end -->

         <!-- food and drink section start -->
<div class="row pt-4 mx-auto "><div class="ml-4"><h2 class="text-white" >FOOD AND DRINK</h2></div><div class="ml-auto mr-4"><a href="buyer/see_all.php?ctg=Food and Drink"><h3>see all</h3></a></div> </div>
<hr style="background-color: blanchedalmond;">
     <div class="row ">
     <?php
          
           $get_image= "SELECT * FROM `images` WHERE category='Food and Drink' LIMIT 4";
           $queryfire_get_image = mysqli_query($con, $get_image);
          while($array_image = mysqli_fetch_array($queryfire_get_image))
          {
            $image_name = $array_image['i_name'];

            if($image_name != "")
            {  
              $image_id = $array_image['i_id'];
            $image_url = $array_image['i_path'];
            $image_ctg = $array_image['category'];
            $image_tag = $array_image['tag'];
            ?>
              <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
              <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
              <div class="card mx-auto" style="width: 15rem;">
              <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                   <div class="card-body">
                    <h5 class="card-title"><?php echo $image_name ?></h5>
                  </div></a>

                  <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  


                </div>
               </div>
           <?php
           }
        }
      ?>
    </div>
       <!-- food and drink section end -->
       <!-- other section start  -->
       <div class="row pt-4 mx-auto "><div class="ml-4"><h2 class="text-white" >OTHER</h2></div><div class="ml-auto mr-4"><a href="buyer/see_all.php?ctg=Other"><h3>see all</h3></a></div> </div>
<hr style="background-color: blanchedalmond;">
     <div class="row ">
     <?php
          
          $get_image= "SELECT * FROM `images` WHERE category='Other' LIMIT 4";
          $queryfire_get_image = mysqli_query($con, $get_image);
         while($array_image = mysqli_fetch_array($queryfire_get_image))
         {
           $image_name = $array_image['i_name'];

           if($image_name != "")
           {  
           $image_id = $array_image['i_id'];
           $image_url = $array_image['i_path'];
           $image_ctg = $array_image['category'];
           $image_tag = $array_image['tag'];
           ?>
             <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-2 ">
             <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
             <div class="card mx-auto" style="width: 15rem;">
             <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $image_name ?></h5>
                 </div></a>


                 <div class="container-fluid"><div class="row px-3">
                 <div>
                <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" title = "same category" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                 </div>
                 <div class="ml-auto">
                 <?php
                     if(!isset($_SESSION['username']))
                     { 
                       ?>
                      <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                 </div>
                 </div></div>  


               </div>
              </div>
          <?php
          }
       }
     ?>
    </div>
    <!-- other section end  -->
</div>
<!-- card end here  -->
</div>
<!-- black div end -->
<!-- white div start -->
<div class="my-3">
               <!-- join us  -->
   <div class="pt-5 pb-4 bg-primary text-white text-capitalize my-3">
    <div class=" text-center"> <h1>want to join as seller</h1><br>
     <p> this is the best place where you can sell your images online </p>
   <button type="button"  class=" btn p-2 bg-warning text-capitalize" data-toggle="modal" data-target="#myModal">join now </button></div>
     
  <!-- The Modal -->
<div class="modal text-dark text-capitalize" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">join us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
   <div class="modal-body">
         <form action="get_signup.php" method="POST">
         <div class="form-group">
    <label for="username">username:</label>
    <input type="text" class="form-control" placeholder="Enter Your username" name="username">
  </div>
         <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
  </div>
  
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label>Role:</label>
    <input type="text" list="role" class="form-control" placeholder="Buyer or Seller" name="role" require>
<datalist id="role">
    <option value="Buyer">
    <option value="Seller">
</datalist>
  </div>
  <div class="form-group">
  <label for="gender">gender:</label>
  <input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
  </div>
  
  <div class="form-group">
    <label for="proffesion">proffesion : </label>
    <input type="text" class="form-control" placeholder="Enter proffesion" name="proffesion">
  </div>
         <div class="form-group">
    <label for="contact number">contact number : </label>
    <input type="number" class="form-control" placeholder="Enter contact number" name="contact">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd">
  </div>
  <div class="form-group">
    <label for="pwd"> Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Re-enter password" name="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  
  </div>
          <!-- join us end  -->

   <!-- why -->
<div class="container py-4"><h1 class="text-center">Why Images Hub?</h1>
India's diversity and complexity can be witnessed through its people, traditions and values associated with 
distinctive regional customs, habits, lifestyle and festivals. That's why our content reflects the innate 
expressions of deep-rooted feelings of individuals through which spring their day-to-day actions. From contemporary 
concepts and ideas to the broadest range of categories depicting Indians in virtually all walks
 of life, age groups and expressions - you will find it all here!<a href="about.php"> Know More</a>
</div>
   <!-- why end  -->
 <br>
   <!-- contact us  -->
   <?php include_once('contact.php'); ?>

   <!-- contact us end  -->
</div>
  <!-- white div end -->
<footer>

<?php  include_once('footer.php'); ?>

</footer>
</body>
</html>