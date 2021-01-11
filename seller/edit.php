<?php
ob_start();
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
       <title>edit image details</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body>
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<div class="text-capitalize text-white " style="background-color:black;">
   <div class="container"><div class="row">
     <div class="my-5 col-lg-6 col-md-6 col-12">
     <img src="https://thumbs.dreamstime.com/b/update-refresh-icon-special-soft-green-square-button-update-refresh-icon-isolated-special-soft-green-square-button-reflected-99524941.jpg" alt="login" style="width:100%;">
     </div>
     <div class=" bg-dark my-5 col-lg-6 col-md-6 col-12">
     <div class=" pt-4 container-fluid">
     <h1 >edit image details</h1><br>
     <!-- form  -->
<div>
<h4>edit name :</h4><br>
 <form action="edit_it.php?i_id=<?php echo $id ?>&id=1" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter New name" name="name">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Edit Name</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>Edit Description :</h4><br>
 <form action="edit_it.php?i_id=<?php echo $id ?>&id=3" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter new description" name="description">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Edit Description</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>Edit Tags :</h4><br>
 <form action="edit_it.php?i_id=<?php echo $id ?>&id=4" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter new tags" name="tag">  
  </div>
    <div class=" ml-auto"><center> <button type="submit" class="btn btn-primary">Edit Tags</button></div>     
         </div></div>

</form>

</div>
   <!-- form end  --><br><br>


     </div>
     </div>
</div></div>
</div>
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>
