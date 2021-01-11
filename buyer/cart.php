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
       <title>CART</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body>
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header>
    <div  class="pb-5">
  <h1 class="text-center p-4" style="font-weight: bolder;"><i class='fas fa-shopping-cart'></i>&nbsp;&nbsp;&nbsp;Your Cart  </h1>
  <!-- <a href="home.php" style="text-decoration:none; width:20%; "><div class="pl-5" style="font-family:Lucida Sans;">
    <button style=" font-weight:bold; text-align:center;" class="btn btn-danger">BACK TO SHOPPING</button>
</div></a> -->


  <?php

   $query = "SELECT * FROM `cart` WHERE  b_username='$user'";
   $queryfire=mysqli_query($con,$query);
   $num = mysqli_num_rows($queryfire);
   $total=0;
   
   if($num >0){
         ?>  
              <div class="container"><br><br>
              <div class="row bg-dark text-white p-3"> <div class="col-lg-7 col-md-7 col-7"><b> Content</b></div><div class="col-lg-3 col-md-3 col-3"><b> Price</b></div></div><br>
        <?php
          while($cartitem = mysqli_fetch_array($queryfire))
          {
           $size = $cartitem['size'];
           $price = $cartitem['price'];
           $i_id= $cartitem['i_id'];
           $query1="SELECT * FROM `images` WHERE i_id = '$i_id'";
           $queryfire1=mysqli_query($con,$query1);
           $image_detail = mysqli_fetch_array($queryfire1);
           $image_ctg = $image_detail['category']; 
           $image_name = $image_detail['i_name'];
           $image_url = $image_detail['i_path'];
           $image_tag = $image_detail['tag'];
           $seller = $image_detail['s_username'];                      
       ?>
 
<div class="row">
<div class=" col-lg-7 col-md-7 col-7">
     <div class="row">
    <div><img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" class="img-fluid m-1" style="width:130px;" alt="<?php echo $image_tag ?>"></div>
    <div class="pl-3"><b>
    Image ID : <?php echo $i_id ?><br><br>
    Size : <?php echo $size ?></b>
    </div>
     </div>
</div>
<div class="col-lg-3 col-md-3 col-7">
 <b> <h5 class="my-3"> INR <?php echo $price  ?></h5></b>
</div>
<div class="col-lg-2 col-md-2 col-2 my-4">
<a href="removecart.php?id=<?php echo $i_id?>" style="color:black;"><center><div class="bg-dark" style="height:30px; width: 30px; border-radius:50%;"><i class="fas fa-close text-white pt-2" title="close"></i></div></center></a>
</div>
</div>
<hr>
       <?php
       $total = $total + $price;
       }
       $tax = 18*$total/100;
       ?>
       
       <!-- price cart -->
   <div class="row">
   <table class="ml-auto" style="font-size:20px;">
   <tr><td class="px-4" >Item in Cart</td> <td><b><?php echo $num ?></b></td></tr>
   <tr><td class="px-4">Amount Total</td> <td><b>INR <?php echo $total ?></b></td></tr>
   <tr><td class="px-4">Tax @18%</td> <td><b>INR <?php echo $tax ?></b></td></tr>
   <tr><td class="px-4">Net Payable Amount</td> <td><b>INR <?php echo $tax+$total ?></b></td></tr>
   </table>
   </div><br><br>
   <div class="container-fluid"><div class="row">
   <div>
   <a href="home.php"><button style="font-size: 20px;" class="btn btn-dark p-2 px-5">Add More Images</button></a>
   </div>
   <div class="ml-auto">
   <a href="checkout.php?pay=<?php echo $total+$tax ?>"><button style="font-size: 20px;" class="btn btn-dark p-2 px-5">Checkout</button></a>
   </div>
   </div></div>
   <hr>
   <!-- container div end  -->
   </div>
       <?php
   }
   else
   {
       echo "<center><br><br><h1>your cart is empty</h1></center>";
   }
   ?>
   

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