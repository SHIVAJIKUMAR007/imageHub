<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$buyer = $_SESSION['username'];
$payable_amount = $_GET['pay'];
if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
// buyer detail 
 $detail = "SELECT * FROM `buyer` WHERE username= '$buyer'";
 $queryfire_detail = mysqli_query($con,$detail);
 $result = mysqli_fetch_array($queryfire_detail);
 $name = $result['name'];
 $email= $result['email'];
 $contact = $result['contact no'];
?>
<!DOCTYPE html>
<html>
<head>
       <title>Checkout</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body>
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header><br>

<!-- main div  -->
<div class="container">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>Checkout</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br>
<div class="row">
<div class="col-lg-8 col-md-8 col-12">
<h3 class=" text-white  bg-dark p-2 pl-4">Re-confirm Billing Address</h3>
<table>
<tr><td >Name : </td> <td style="padding-left:15vw;"><b><?php echo $name ?></b></td></tr>
<tr><td>Email : </td> <td style="padding-left:15vw;"><b><?php echo $email ?></b></td></tr>
<tr><td>Contact no : </td> <td style="padding-left:15vw;"><b><?php echo $contact ?></b></td></tr>
</table><br>
<form action="payment.php?email=<?php echo $email ?>&pay=<?php echo $payable_amount ?>" method="post">
<table>
<tr><td> <label> GSTIN no :</label> </td> <td style="padding-left:15vw;"><input type="number" name="gst" class="form-control" min="100000000000000"></td></tr>
</table><br>
<p style="color:red;">This will enable to avail credit of the taxes to be charged on services directly to your account as per GST regulations.</p><br>
<table>
<tr><td> <label> Client/Designated End User *:</label> </td> <td style="padding-left:5.5vw;"><input type="text" name="name" class="form-control"></td></tr>
</table><br>
<p style="color:red;">[The "Client/Designated End User" means the specific product, service or entity that is being promoted by the use of the item. It is important to name PRECISELY the intended end-user so that you do, indeed, secure the rights you actually need.]</p>
<hr>
<h4>Payment Mode</h4>

<div class="form-group">
  <input type="radio" id="Online" name="method" value="Online">
<label class="pl-4" for="Online">Online</label><br>
<input type="radio" id="DD or NEFT" name="method" value="DD or NEFT">
<label class="pl-4" for="DD or NEFT">DD or NEFT</label><br>
  </div>

<p style="color:red;">Pornographic, defamatory, libelous, immoral, obscene, fraudulent or otherwise unlawful use of the item is strictly prohibited.</p><br>
<div class="form-group form-check"> 
    <label class="form-check-label" style="color:red;">
      <input class="form-check-input" type="checkbox">Please read the License Agreements before clicking on the "Confirm Order" button. Your acceptance of these terms & conditions is an absolute condition to your use of any item available at www.imagesbazaar.com 
    </label><br><br>

<center><button type="submit" class="btn-dark p-2 px-5">Confirm Order</button></center>
</form>
<br><br>
<ul>
<li>If you select online payment method then please wait you will redirect to the landing page where you have to select online payment method .</li><br>
<li>If you select Offline cheque then in the my order page you will get address to where you have to deliver the cheque.</li><br>
<li>If you select DD or NEFT then you will have to get all details for DD or NEFT in my order page.</li>
</ul>
</div>
</div>
<!-- side bar  -->
<div class="col-lg-4 col-md-4 col-12">
<h3 class=" text-white  bg-dark p-2 pl-4">Total Amount</h3>
<div class="px-3 py-4"><table>
<tr><td >Total Amount Payable : </td> <td style="padding-left:3vw;"><b>INR <?php echo $payable_amount ?></b></td></tr>
</table></div>
<h3 class=" text-white  bg-dark p-2 pl-4 mt-4">Order Summary</h3>
<div class="px-3 py-2">
<?php
  $query = "SELECT * FROM `cart` WHERE  b_username='$buyer'";
  $queryfire=mysqli_query($con,$query);
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

   ?><table class="mb-3">
    <tr><td ><img src="../<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php  echo $image_tag  ?>" class="img-fluid" style="width:100px;"> </td> <td style="padding-left:2vw; font-size:12px;"><b>ID : <?php echo $i_id ?><br>Size : <?php echo $size ?><br>Price : <?php echo $price ?></b></td></tr>
    </table>
   <?php

  }

?>
</div>
</div>
</div>
</div>
</div>
<!-- main div end  -->

<footer>
       <!-- contact us  --> <br>
       <?php include_once('../contact.php'); ?>
<!-- contact us end  -->
<?php  include_once('../footer.php'); ?>

</footer>
</body>
</html>