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
       <title>add method</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body>
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<!-- main body  -->
<div class="container pt-4">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>ADD A PAYMENT METHOD</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br>
*You can add only one method of payment <br>
<!-- bank details  -->
<div class="bg-dark px-4 pt-2 pb-1 mt-5 text-white"><h3>Add Bank Detail</h3></div><br>
<form action="payment_method_update.php?id=1" method="post">
    <div class="form-group">
    <div class="form-group">
    <label for="name">Bank Name :</label>
    <input type="text" class="form-control" placeholder="Enter name in your bank account" name="name"><br>
  
    <label for="number">Account No :</label>
    <input type="number" class="form-control" placeholder="Enter account number" name="acc"><br>
    <label for="ifsc">IFSC Code  :</label>
    <input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc"><br>
    </div>
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
<hr>
<!-- paytm details  -->
<div class="bg-dark px-4 pt-2 pb-1 mt-5 text-white"><h3>Add Paytm No</h3></div><br>
<form action="payment_method_update.php?id=2" method="post">
    <div class="form-group">
    <div class="form-group">
    <label for="number">Paytm No :</label>
    <input type="number" class="form-control" placeholder="Enter paytm number" name="paytm"><br>
    </div>
  </div>
  <button type="submit" class="btn btn-info">Submit</button> 
</form>
<hr>
<!-- upi details  -->
<div class="bg-dark px-4 pt-2 pb-1 mt-5 text-white"><h3>Add UPI Detail</h3></div><br>
<form action="payment_method_update.php?id=3" method="post">
    <div class="form-group">
    <div class="form-group">
    <label for="number">UPI Phone No :</label>
    <input type="number" class="form-control" placeholder="Enter paytm number" name="u_no"><br>
    <label for="number">UPI ID :</label>
    <input type="text" class="form-control" placeholder="Enter paytm number" name="u_id"><br>
    </div>
  </div>
  <button type="submit" class="btn btn-info">Submit</button> 
</form>

</div>
<!-- main body end  -->
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>