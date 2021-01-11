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



<h2 class="text-capitalize text-center py-3">give answers </h2>

  <div class="container">
<?php

 $massage = "SELECT * FROM `query` WHERE stetus='pending'";
 $queryfire_massage = mysqli_query($con , $massage);
 $num = mysqli_num_rows($queryfire_massage);

 if ($num >0)
 {
     while ($result = mysqli_fetch_array($queryfire_massage))
     {
         $id = $result['id'];
         $name = $result['name'];
         $email = $result['email'];
         $massage = $result['massage'];
         ?>
     <div class="p-3 my-3" style="border: 2px solid black; border-radius:10px;">
     <p>Name : <?php echo $name ?></p>
     <p>Email : <?php echo $email ?></p>

     <p>Query :<br> <?php echo $massage ?></p><br>
         <div class="row">
              <div class="col-lg-4 col-md-4 col-12 py-2">
                 <center><a href="mailto:<?php echo $email; ?>?Subject=answer for your query by 'raja puja palace and jeneral store'">
                  <div class="bg-success text-white mx-auto w-25 text-center p-1 btn">Give Ans</div></a> </center>             
            </div>
            <div class="col-lg-4 col-md-4 col-12 py-2">
                 <center><form action="remove_massage.php?id=<?php echo $id ?>" method="post">
                  <button class="btn btn-success text-white">Answered, remove this.</button>
                </form> </center>             
            </div>
            <div class="col-lg-4 col-md-4 col-12 py-2">
                 <center><form action="remove_massage.php?id=<?php echo $id ?>" method="post">
                  <button class="btn btn-success text-white">Don't want to answer it.</button>
                </form> </center>             
            </div>
         </div>
       
     </div>
      <?php
     }
 }
 else
 {
    ?>
    <h1 class="my-5 py-5 mx-auto"> No query left now. </h1>
    <?php
 }


?>
  </div>





<!-- main body end  -->
<footer>
    <div class="bg-dark text-white"><div class="container">© Imagehub.Com 2020 All Rights Reserved.</div></div>
</footer>
</body>
</html>


