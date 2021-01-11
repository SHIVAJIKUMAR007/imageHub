<?php
ob_start();
session_start();
// db connection 
include_once('../db_connect.php');
// coonnected
$buyer = $_SESSION['username'];
$i_id = $_GET['id'];
$seller = $_GET['seller'];
?>
<!DOCTYPE html>
<html>
<head>
       <title>ADD TO CART</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body>
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header>
<div class="container"> <h2 class="text-center pt-3">Single Image Pricing</h2><div class="row">

<div class="col-lg-4 col-md-4 col-12 pt-5">
<?php
 $image = "SELECT * FROM `images` WHERE i_id = '$i_id'";
 $queryfire = mysqli_query($con,$image);
 $result = mysqli_fetch_array($queryfire);
 $ctg = $result['category'];
 $i_url = $result['i_path'];
 $tag = $result['tag'];
?>
<img src="../<?php echo $ctg ?>/<?php echo $i_url ?>" alt="<?php echo $tag  ?>" class="img-fluid" style="width:250px;" >
</div>
<div class="col-lg-8 col-md-8 col-12">
<table>
<tr><th class="p-3">Image Type</th><th class="p-3">Resolution</th><th class="p-3">Dimension (Pixels)</th> <th class="p-3">Size (Inches)</th><th class="p-3">Price (Rs.)*</th></tr>
<tr><td class="py-1 px-3">Web</td><td class="py-1 px-3">72DPI</td><td class="py-1 px-3">800 x 1200</td><td class="py-1 px-3">For Web Use only</td><td class="py-1 px-3">800</td></tr>
<tr><td class="py-1 px-3">Small</td><td class="py-1 px-3">300DPI</td><td class="py-1 px-3">1500 X 2250</td><td class="py-1 px-3">5” x 7.5” at 300 dpi</td><td class="py-1 px-3">1600</td></tr>
<tr><td class="py-1 px-3">Medium</td><td class="py-1 px-3">300DPI</td><td class="py-1 px-3">3600 X 5400</td><td class="py-1 px-3">12” x 18” at 300 dpi</td><td class="py-1 px-3">2400</td></tr>
<tr><td class="py-1 px-3">Large</td><td class="py-1 px-3">300DPI</td><td class="py-1 px-3">5400 X 8100</td><td class="py-1 px-3">18” x 27” at 300 dpi</td><td class="py-1 px-3">3000</td></tr>
</table>
</div>
</div>
<h3 class="text-center">Select size</h3>
<form action="addcart_process.php?id=<?php echo $i_id  ?>&seller=<?php echo $seller ?>" method="POST" class="w-50 mx-auto">
<!-- <div class="row"> -->
<div class="form-group">
    <label>Size :</label>
    <input type="text" list="size" class="form-control" placeholder="Select size" name="size" require>
<datalist id="size">
<option value="web">
<option value="small">
<option value="medium">
<option value="large">
</datalist>
  </div>
  <button type="submit" class="btn btn-primary ml-auto">Add To Cart</button>
<!-- </div> -->
</form>
</div>

<footer>

       <!-- contact us  --> <br>
       <?php include_once('../contact.php'); ?>
<!-- contact us end  -->
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>