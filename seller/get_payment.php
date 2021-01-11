<?php
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
$seller = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
       <title>request withdraw</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body>
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<!-- main body  -->
<!-- <div class="container pt-4">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>WITHDRAW </h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br>
</div> -->
<?php 
   $query = "SELECT * FROM `seller` WHERE username = '$seller'";
   $queryfire= mysqli_query($con, $query);
   $result = mysqli_fetch_array($queryfire);
   $name = $result['name'];
   $avtar = $result['avtar'];
   $payment_method = $result['payment_method'];
?>
 
 <!-- profile image  -->
 <?php  
      if($avtar=="")
      {   ?>
          <!-- profile image  -->
          <center><img src="https://st3.depositphotos.com/13159112/17145/v/450/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg"
           class="img-fluid" style="border-radius:50%; width:230px; height:230px;"></center>    
            <!-- username and name  -->
          <center><h5>Hi, <?php echo $seller ?>!</h5><h6><?php echo $name ?></h6>  </center>
          <?php
      }
      
      else
      {
          ?>
          <!-- profile image  -->
          <center><img src="profile image/<?php  echo $avtar;?>"
           class="img-fluid" style="border-radius:50%; width:230px; height:230px;"></center>    
            <!-- username and name  -->
         <center> <h5>Hi, <?php echo $seller ?>!</h5><h6><?php echo $name ?></h6></center>
          <?php
      }
 ?>
 <!-- profile image end  -->
  <!-- earning details  -->
  <br><br>
  <?php
     $earning_detail = "SELECT * FROM `seller_account` WHERE username = '$seller' ";
     $queryfire_earning_detail = mysqli_query($con, $earning_detail);
     $array_earning_detail = mysqli_fetch_array($queryfire_earning_detail);
     $lifetime_earning = $array_earning_detail['lifetime_earning'];
     $lifetime_withdraw = $array_earning_detail['lifetime_withdraw'];
     $balance = $lifetime_earning - $lifetime_withdraw;
     $web = $array_earning_detail['lifetime_web_sell'];
     $small = $array_earning_detail['lifetime_small_sell'];
     $medium = $array_earning_detail['lifetime_medium_sell'];
     $large = $array_earning_detail['lifetime_large_sell'];
  ?>
  <div class="container">
   <div class="row">
    <div class="col-lg-4 col-md-4 col-12">
        <div><div class="bg-dark text-white px-2 pt-1 w-75 mx-auto"><h4>Lifetime Earning</h4></div><br>
                          <h5 class="text-center">INR <?php echo $lifetime_earning ?></h5><br>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 w-75 mx-auto"><h4>Lifetime withdraw</h4></div><br>
                          <h5 class="text-center">INR <?php echo $lifetime_withdraw ?></h5><br>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 w-75 mx-auto"><h4>Balance</h4></div><br>
                          <h5 class="text-center">INR <?php echo $balance ?></h5><br>
    </div>
    </div>
   </div>
<br><br>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 mx-auto"><h4>Web Size Sell </h4></div><br>
                          <h5 class="text-center"><?php echo $web ?></h5><br>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 mx-auto"><h4>Small size sell</h4></div><br>
                          <h5 class="text-center"><?php echo $small ?></h5><br>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 mx-auto"><h4>Medium size sell</h4></div><br>
                          <h5 class="text-center"><?php echo $medium ?></h5><br>
    </div>
    </div>

    <div class="col-lg-3 col-md-3 col-12">
    <div><div class="bg-dark text-white px-2 pt-1 mx-auto"><h4>Large size sell</h4></div><br>
                          <h5 class="text-center"><?php echo $large ?></h5><br>
    </div>
    </div>
  </div>
  </div>
   <!-- earning details end  -->
  <br><hr style="color:black;"><br>
  <div class="container pt-4">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>REQUEST WITHDRAWAL </h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br>
</div>
<!-- form for request -->
<?php  
 if($payment_method=="")
 {
     ?> <h2>You did not added any payment method.</h2>    <?php
 }
 else
 {    
     ?>
      <div class="container-fluid">
     <div class="col-lg-4 col-md-4 col-12 mx-auto"><br></div>
     <div class="col-lg-4 col-md-4 col-12 mx-auto" style="border:1px solid black; border-radius:20px; ">
     <h3 class="py-4 text-center">Withdrawal Request Form</h3>
     <form action="req_for_payment.php" method="post" class="p-3">
     <div class="form-group">
     <label>Amount to withdraw:</label>
     <input type="number" class="form-control" placeholder="Enter Amount to withdraw" name="amount" require>
     </div>
     <button class="btn btn-warning text-white">Send Request</button>
    </form>
      </div>
     <div class="col-lg-4 col-md-4 col-12 mx-auto"><br></div>
    </div>
     <?php
 }
?>

<!-- form for request -->
<!-- main body end  -->
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>