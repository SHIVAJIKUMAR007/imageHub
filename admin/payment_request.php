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
       <title>payment request</title>
<?php include_once('../bootstrap.php'); ?>
</head>
<body class="bg-light">
    <header class="pt-2">
          <?php include_once('login_header.php');?>
    </header><br>
    <!-- main body  -->
<div class="container">
<div class="row"><div class="col-lg-4 col-md-4 col-4"><hr></div> <div class="col-lg-4 col-md-4 col-4 text-center"><b><h3>PAYMENT REQUESTS</h3></b></div> <div class="col-lg-4 col-md-4 col-4"><hr></div></div></div><br>
<div class="container">
<?php
 $req = "SELECT * FROM `payment_request` WHERE stetus= 'pending'";
 $queryfire_req = mysqli_query($con , $req);
 $num = mysqli_num_rows($queryfire_req);
?>
<div><h3><?php echo $num ?> payment request are pending</h3></div><br>
<?php
  while($req_array = mysqli_fetch_array($queryfire_req))
  {   
      $id = $req_array['req_id'];
    //   echo $id."<br>";
      $status = $req_array['stetus'];
    //   echo $status."<br>";
      $amount = $req_array['amount_req'];
    //   echo $amount."<br>";
      $user = $req_array['username'];
    //   echo $user."<br>";
      $date = $req_array['date'];
    //   echo $date."<br>";

      $query = "SELECT * FROM `seller` WHERE username = '$user'";
      $queryfire = mysqli_query($con,$query);
      $result = mysqli_fetch_array($queryfire);
      $name = $result['name'];
      $email= $result['email'];
      $contact = $result['contact no'];
      $method = $result['payment_method'];
      $bank_name = $result['bank_name'];
      $acc = $result['acc_no'];
      $ifsc = $result['ifsc'];
      $paytm = $result['paytm_no'];
      $u_id = $result['upi_id'];
      $u_no = $result['upi_no'];
    if($method == 'Bank Transfer')
    {
        ?>
          <div class="bg-light p-4 px-4 m-3" style="border: 2px solid black;">
            <h4>Modal Details</h4>
            <div class="row"><div>Name : <?php echo $name ?></div><div class="ml-auto">Username : <?php echo $user ?></div></div>
            <div class="row"><div>Email : <?php echo $email ?></div><div class="ml-auto">Contact no : <?php echo $contact ?></div></div>
            <div class="row"><div>Amount Requested : INR <?php echo $amount ?></div><div class="ml-auto">Date of request : <?php echo $date ?></div></div>        
           
            <h4>Payment Method Details</h4>
            <div class="row"><div>Method : <?php echo $method ?></div><div class="ml-auto">Name in bank : <?php echo $bank_name ?></div></div>
            <div class="row"><div>Account no : <?php echo $acc ?></div><div class="ml-auto">IFSC Code : <?php echo $ifsc ?></div></div>
            <br><a href="paid_remove.php?username=<?php echo $user ?>&amount=<?php echo $amount ?>"><button class="btn btn-primary">Paid, Now Remove </button></a>
 
        </div>
       <?php
    }

    else if($method == 'Paytm')
    {
        ?>
        <div class="bg-light p-4 px-4 m-3" style="border: 2px solid black;">
        <h4>Modal Details</h4>
            <div class="row"><div>Name : <?php echo $name ?></div><div class="ml-auto">Username : <?php echo $user ?></div></div>
            <div class="row"><div>Email : <?php echo $email ?></div><div class="ml-auto">Contact no : <?php echo $contact ?></div></div>
            <div class="row"><div>Amount Requested : INR <?php echo $amount ?></div><div class="ml-auto">Date of request : <?php echo $date ?></div></div>        
           
            <h4>Payment Method Details</h4>
            <div class="row"><div>Method : <?php echo $method ?></div><div class="ml-auto">Paytm No : <?php echo $paytm ?></div></div>
           <br>
            <a href="paid_remove.php?username=<?php echo $user ?>&amount=<?php echo $amount ?>"><button class="btn btn-primary">Paid, Now Remove </button></a>

        </div>
     <?php 
    }

    else if($method == 'UPI')
    {
        ?>
          <div class="bg-light p-4 px-4 m-3" style="border: 2px solid black;">
          <h4>Modal Details</h4>
            <div class="row"><div>Name : <?php echo $name ?></div><div class="ml-auto">Username : <?php echo $user ?></div></div>
            <div class="row"><div>Email : <?php echo $email ?></div><div class="ml-auto">Contact no : <?php echo $contact ?></div></div>
            <div class="row"><div>Amount Requested : INR <?php echo $amount ?></div><div class="ml-auto">Date of request : <?php echo $date ?></div></div>        
           
            <h4>Payment Method Details</h4>
            <div class="row"><div>Method : <?php echo $method ?></div><div class="ml-auto">UPI Phone No : <?php echo $u_no ?></div></div>
            <div class="row"><div>UPI ID : <?php echo $u_id ?></div></div>
            <br>
            <a href="paid_remove.php?username=<?php echo $user ?>&amount=<?php echo $amount ?>"><button class="btn btn-primary">Paid, Now Remove </button></a>
          </div>
       <?php
    }
  }
?>

</div> 
<!-- main body end  -->
<footer>
    <div class="bg-dark text-white"><div class="container">© Imagehub.Com 2020 All Rights Reserved.</div></div>
</footer>
</body>
</html>