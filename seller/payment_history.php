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
       <title>payment history</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body>
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<!-- main body  -->
<div class="container pt-4">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>WITHDRAW HISTORY</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div><br></div>


<div class="container">
<?php
 $req = "SELECT * FROM `payment_history` WHERE username = '$user'";
 $queryfire_req = mysqli_query($con , $req);
 $num = mysqli_num_rows($queryfire_req);
?>
<div><h3><?php echo $num ?> payment request are pending</h3></div><br>
<?php
  while($req_array = mysqli_fetch_array($queryfire_req))
  {   
      $id = $req_array['p_id'];
      $amount = $req_array['amount_withdraw'];
      $date = $req_array['date'];

        ?>
          <div class="bg-light p-4 px-4 m-3" style="border: 2px solid black;">
          <h6>Payment ID : <?php echo $id ?></h6>
          <div class="row"><div>Amount paid : INR <?php echo $amount ?></div><div class="ml-auto">Date of payment : <?php echo $date ?></div></div>
          <a href="mailto:official.imagehub@gmail.com?subject=query releated paymet with payment id <?php echo $id ?>">
          <button class="btn btn-primary mt-3">Query releated this payment</button></a>        
        </div>
       <?php
  }
?>

</div> 

<!-- main body end  -->
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>