<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected

?>
<!DOCTYPE html>
<html>
<head>
       <title>orders</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body class="bg-light">
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header><br>
    <!-- main body  -->
<div class="container">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>PENDING ORDERS</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br>
   <!-- <h4><?php echo $num ?> order are pending</h4> -->
  <?php
  $order= "SELECT * FROM `order_table` WHERE stetus='paid'";
  $queryfire_order = mysqli_query($con,$order);
  $num = mysqli_num_rows($queryfire_order);
  ?><h4><?php echo $num  ?> order pending </h4>  <?php
   while($order_detail=mysqli_fetch_array($queryfire_order))
  {
    $email = $order_detail['email'];
    $amount = $order_detail['amount'];
    $neft = $order_detail['neft_ref'];
    $oid = $order_detail['o_id'];
    $method = $order_detail['method'];
   

      if ($method=='DD or NEFT')
       {
        ?>
        <div class="bg-dark text-white">
        <h5 class=" px-4 pt-3">Order detail</h5>
        <div class="row px-4 py-1"><div>Ref no : <?php echo $oid ?></div> <div class="ml-auto">NEFT Ref no : <?php echo $neft ?></div></div>
        <div class="row px-4 py-1"><div>Email : <?php echo $email ?></div> <div class="ml-auto">Amount Paid: INR <?php echo $amount ?></div></div>
        <div class="row px-4 py-1"><div>Method : <?php echo $method ?></div></div>
        </div>
       <?php
        $query = "SELECT * FROM `my_order` WHERE o_id = '$oid'";
        $queryfire = mysqli_query($con , $query);
        while($result = mysqli_fetch_array($queryfire))
        {
          $id = $result['i_id'];
          $size = $result['size'];
          $price = $result['price'];
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
        ?>
         <div class=" container-fluid  px-4 py-1">  
        <div class="row">
          <div><a href="mailto:<?php echo $email ?>?subject=images which ou have ordered from image hub with ref no <?php echo $oid ?>"><button class="btn btn-danger">EMAIL IMAGES</button></a></div>
          <div class="ml-auto"><a href="remove_order.php?oid=<?php echo $oid ?>"><button class="btn btn-danger">IMAGES ARE SENT, REMOVE THIS</button></a> </div>
        </div>
        </div> 
        <?php
       }
       else 
       {
        ?>
        <div class="bg-dark text-white">
        <h5 class=" px-4 pt-3">Order detail</h5>
        <div class="row px-4 py-1"><div>Ref no : <?php echo $oid ?></div><div class="ml-auto">Email : <?php echo $email ?></div> </div>
        <div class="row px-4 py-1"> <div>Method : <?php echo $method ?></div><div class="ml-auto">Amount Paid: INR <?php echo $amount ?></div></div>
        </div>
       <?php
        $query = "SELECT * FROM `my_order` WHERE o_id = '$oid'";
        $queryfire = mysqli_query($con , $query);
        while($result = mysqli_fetch_array($queryfire))
        {
          $id = $result['i_id'];
          $size = $result['size'];
          $price = $result['price'];
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
        ?>
         <div class=" container-fluid  px-4 py-1">  
        <div class="row">
          <div><a href="mailto:<?php echo $email ?>?subject=images which ou have ordered from image hub with ref no <?php echo $oid ?>"><button class="btn btn-danger">EMAIL IMAGES</button></a></div>
          <div class="ml-auto"><a href="rmove_order.php?oid=<?php echo $oid ?>"><button class="btn btn-danger">IMAGES ARE SENT, REMOVE THIS</button></a> </div>
        </div>
        </div> 
        <?php
       }
    
  }
  ?>

</div>   
<!-- main body end  -->
<footer class=" pt-3">
    <div class="bg-dark text-white" ><div class="container">© Imagehub.Com 2020 All Rights Reserved.</div></div>
</footer>
</body>
</html>