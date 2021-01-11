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
       <title>upload a new image</title>
<?php include_once('../bootstrap.php'); ?>

</head>
<body>
<header><?php include_once('./header.php') ?></header>
<!-- header end  -->
<!-- form  -->
<div class="text-capitalize text-white" style="background-color:black;">
   <div class="container"><div class="row">
     <div class="my-5 col-lg-6 col-md-6 col-12">
     <img src="https://media.istockphoto.com/illustrations/upload-icon-soft-green-round-button-illustration-id957951500?k=6&m=957951500&s=170667a&w=0&h=73ga1XGpXdfJTbgLAoitWn2iQq79sB7OmWsY-xxejgE=" alt="login" style="width:100%;">
     </div>
     <div class=" bg-dark my-5 col-lg-6 col-md-6 col-12">
     <div class=" pt-4 container-fluid">
     <h1 >upload a new image</h1>
     <br>
     <!-- form  -->
<form action="upload_process.php?user=<?php echo $_SESSION['username']  ?>" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>select image</label>
<input type="file" name="image" class="form-control" accept="image/*"  placeholder=" select image" required>
</div>
<div class="form-group">
    <label> image name :</label>
    <input type="text" class="form-control" placeholder="enter image name" name="image_name" required>
  </div>
  <div class="form-group">
    <label>Discription :</label>
    <input type="text" class="form-control" placeholder="write a short description" name="description" required>
  </div>
<div class="form-group">
    <label> category : </label>
    <input type="text" list="ctg" name="ctg" class="form-control" placeholder="select category" required>
    <datalist id="ctg">
        <option value="Natural"></option>
        <option value="Fashion"></option>
        <option value="Beauty"></option>
        <option value="Food and Drink"></option>
        <option value="Other"></option>
    </datalist>
</div>
  <div class="form-group">
    <label>Tags : <br> <h6 style="font-size:15px;"> ( Saparate tags by comma and space. Your image will search on the bases of your tags. )</h6></label>
    <input type="text" class="form-control" placeholder="tags" name="tag" autocomplete="off">
  </div>

<button type="submit" class="btn btn-primary">Submit</button>

</form></div>
     <!-- form end  --><br><br>
     </div>
</div></div>
</div>
<!-- form end  -->
<!-- footer  -->
<footer>
<div class="py-3"><?php include_once('../contact.php'); ?></div>
<?php  include_once('../footer.php'); ?>
</footer>
</body>
</html>


