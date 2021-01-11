<?php
ob_start();
session_start();

if(!isset($_SESSION['username']))
{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
       <title>update details</title>
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
     <h1 >update profile</h1><br>
     <!-- form  -->
<div>

 <h4 class="text-center">update profile image</h4><br>
  <form action="update_it.php?id=1" method="post" enctype="multipart/form-data">
  <center> <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image-715x657.png" onclick="triggerClick()" 
  id="profile" class="img-fluid" style="border-radius:50%; width: 50%;"/>
    <input type="file" name="profile" onchange="displayImage(this)" id="profile_image" style=" display:none;"><br><br>
   <button type="submit" class="btn btn-primary">Update profile image</button></center>
  <!--js  functions  -->
  <script>
  function triggerClick(){
      document.querySelector('#profile_image').click();
  }
  
  function displayImage(e){
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            document.querySelector('#profile').setAttribute('src',e.target.result);
        } 
        reader.readAsDataURL(e.files[0]);  
    }
  }
  </script>
   <!-- js  functions end -->
  </form><br><hr style="background-color:white;"><br>

<h4>update bio :</h4><br>
 <form action="update_it.php?id=2" method="post">

     <div class="container-fluid"><div class="row">
     <div class="form-group">
         <textarea name="bio" class="form-control" placeholder="Write a short bio."  cols="35" rows="6"></textarea>
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update Bio</button></div>     
         </div></div>
  
</form>
<br><hr style="background-color:white;"><br>

<h4>change your password :</h4><br>
 <form action="update_it.php?id=9" method="post">

     <!-- <div class="container-fluid"><div class="row"> -->
     <div class="form-group">
         <label>old password :</label>
    <input type="password" class="form-control" placeholder="Enter old password" name="old_pass" require>  
  </div>
     <div class="form-group">
         <label>new password : </label>
    <input type="password" class="form-control" placeholder="Enter new password" name="new_pass" require>  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update password</button></div>     
         <!-- </div></div> -->
  
</form>
<br><hr style="background-color:white;"><br>

<h4>update email :</h4><br>
 <form action="update_it.php?id=3" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="email" class="form-control" placeholder="Enter email" name="email">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update Email</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>update contact no :</h4><br>
 <form action="update_it.php?id=4" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="number" class="form-control" placeholder="Enter contact no" name="contact">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update Contact No</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>update facebook link :</h4><br>
 <form action="update_it.php?id=5" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter New fb link" name="fb">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update facebook link</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>update instagram link :</h4><br>
 <form action="update_it.php?id=6" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter new insta link" name="insta">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update insta link</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>update twitter link :</h4><br>
 <form action="update_it.php?id=7" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter new twitter link" name="twitter">  
  </div>
    <div class=" ml-auto"> <button type="submit" class="btn btn-primary">Update twitter link</button></div>     
         </div></div>

</form><br><hr style="background-color:white;"><br>

<h4>update pinterest link :</h4><br>
 <form action="update_it.php?id=8" method="post">

 <div class="container-fluid"><div class="row">
     <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter new pinterest link" name="pin">  
  </div>
    <div class=" ml-auto"><center> <button type="submit" class="btn btn-primary">Update pinterest link</button></div>     
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
