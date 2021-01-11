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
       <title>admin panel</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body class="bg-light">
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header><br>
    <!-- main body  -->
   <h1 class="text-center">Welcome to the Admin Panel </h1>
<div class="container-fluid pl-5"><div class="row">
<div> <img src="image/image1.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/image2.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/image3.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/beauty1.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/beauty2.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/fashion.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/fashion2.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/food.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>
<div> <img src="image/food2.png" class="img-fluid mx-auto px-4 py-3" style="width:450px;"> </div>

</div></div>

<!-- main body end  -->
<footer>
    <div class="bg-dark"><div class="container">© Imagehub.Com 2020 All Rights Reserved.</div></div>
</footer>
</body>
</html>