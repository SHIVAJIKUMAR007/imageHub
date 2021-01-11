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

?>
<!DOCTYPE html>
<html>
<head>
       <title>HISTORY</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body class="bg-light">
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header><br>
    <!-- main body  -->
<div>
<div class="container"><div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3><i class="fa fa-history" aria-hidden="true"></i> Order History</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br></div>
<div class="container">
<?php 
  $orders = "SELECT * FROM `order_table` WHERE b_username = '$buyer' && stetus = 'delivered'";
  $queryfire_order = mysqli_query($con, $orders);
  $num = mysqli_num_rows($queryfire_order);
?> <h4>( You have ordered <?php echo $num ?> orders till now which are deliverd. )</h4>  <?php 
  while($order_array = mysqli_fetch_array($queryfire_order))
  {
    $ref = $order_array['o_id'];
    $email = $order_array['email'];
    $otp = $order_array['otp'];
    $amount = $order_array['amount'];
    $stetus = $order_array['stetus'];
    $method = $order_array['method'];
    $neft = $order_array['neft_ref'];
    if($method == 'DD or NEFT')
    {
    ?>
    <div class="bg-dark text-white">
    <h5 class=" px-4 pt-3">Order detail</h5>
    <div class="row px-4 py-1"><div>Ref no : <?php echo $ref ?></div> <div class="ml-auto">OTP : <?php echo $otp ?></div></div>
    <div class="row px-4 py-1"><div>NEFT Ref No : <?php echo $neft ?></div> <div class="ml-auto">Amount you paid : INR <?php echo $amount ?></div></div>
    <div class="row px-4 py-1"><div>Status : <?php echo $stetus ?></div> <div class="ml-auto">Method : <?php echo $method ?></div></div>
    
    </div>
   <?php
    $query = "SELECT * FROM `my_order` WHERE o_id = '$ref'";
    $queryfire = mysqli_query($con,$query);
    while($order_detail=mysqli_fetch_array($queryfire))
    {  
        $id = $order_detail['i_id'];
        $size = $order_detail['size'];
        $price = $order_detail['price'];
        $query1="SELECT * FROM `images` WHERE i_id = '$id'";
        $queryfire1=mysqli_query($con,$query1);
        $image_detail = mysqli_fetch_array($queryfire1);
        $image_ctg = $image_detail['category']; 
        $image_name = $image_detail['i_name'];
        $image_url = $image_detail['i_path'];
        $image_tag = $image_detail['tag'];
        $seller = $image_detail['s_username'];      

        ?>
         
    <div class="row pt-3">
    <div class=" col-lg-7 col-md-7 col-7">
     <div class="row">
    <div><img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" class="img-fluid m-1" style="width:130px;" alt="<?php echo $image_tag ?>"></div>
    <div class="pl-3"><b>
    Image ID : <?php echo $id ?><br><br>
    Size : <?php echo $size ?></b>
    </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-7">
    <b> <h5 class="my-3"> INR <?php echo $price  ?></h5></b>
    </div>
    
   </div>
    <hr>
         
        <?php
    }
    ?> <a href="download.php"><button class="btn btn-danger">DOWNLOAD LICENCE</button></a>     
    <br><hr><br>
    <?php
   }
   else if($method == 'Online')
   {
    ?>
    <div class="bg-dark text-white">
    <h5 class=" px-4 pt-3">Order detail</h5>
    <div class="row px-4 py-1"><div>Ref no : <?php echo $ref ?></div> <div class="ml-auto">OTP : <?php echo $otp ?></div></div>
    <div class="row px-4 py-1"> <div>Method : <?php echo $method ?></div><div class="ml-auto">Amount you paid: INR <?php echo $amount ?></div></div>
    <div class="row px-4 py-1"><div>Status : <?php echo $stetus ?></div></div>
    </div>
   <?php
    $query = "SELECT * FROM `my_order` WHERE o_id = '$ref'";
    $queryfire = mysqli_query($con,$query);
    while($order_detail=mysqli_fetch_array($queryfire))
    {  
        $id = $order_detail['i_id'];
        $size = $order_detail['size'];
        $price = $order_detail['price'];
        $query1="SELECT * FROM `images` WHERE i_id = '$id'";
        $queryfire1=mysqli_query($con,$query1);
        $image_detail = mysqli_fetch_array($queryfire1);
        $image_ctg = $image_detail['category']; 
        $image_name = $image_detail['i_name'];
        $image_url = $image_detail['i_path'];
        $image_tag = $image_detail['tag']; 
        $seller = $image_detail['s_username'];      

        ?>
         
    <div class="row pt-3">
    <div class=" col-lg-7 col-md-7 col-7">
     <div class="row">
    <div><img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" class="img-fluid m-1" style="width:130px;" alt="<?php echo $image_tag ?>"></div>
    <div class="pl-3"><b>
    Image ID : <?php echo $id ?><br><br>
    Size : <?php echo $size ?></b>
    </div>
     </div>
    </div>
    <div class="col-lg-3 col-md-3 col-7">
    <b> <h5 class="my-3"> INR <?php echo $price  ?></h5></b>
    </div>
    
   </div>
    <hr>
         
        <?php
    }
    ?> <a href="download.php"><button class="btn btn-danger">DOWNLOAD LICENCE</button></a>     
    <br><hr><br>
    <?php
   }
  }

?>
</div>

</div>

   <!-- main body end  -->
  <footer>
       <!-- contact us  --> <br>
       <?php include_once('../contact.php'); ?>
<!-- contact us end  -->
<?php  include_once('../footer.php'); ?>

</footer>
</body>
</html>