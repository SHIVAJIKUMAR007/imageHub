<html>
<head>
     <title>signup</title>
    <?php include_once('bootstrap.php'); ?>
</head>
<body>
<?php include_once('header.php'); ?>
<div class="text-capitalize text-white " style="background-color:black;">
   <div class="container"><div class="row">
     <div class="my-5 col-lg-6 col-md-6 col-12">
     <img src="https://cdn3.vectorstock.com/i/1000x1000/16/02/register-now-design-vector-4381602.jpg" alt="login" style="width:100%;">
     </div>
     <div class=" bg-dark my-5 col-lg-6 col-md-6 col-12">
     <div class=" pt-4 container-fluid">
     <h1 >Register Now</h1><br>
     <h6>(to create a new account!)</h6>
     <br>
     <!-- form  -->
     <form action="get_signup.php" method="POST" onsubmit="return validation()">
         <div class="form-group">
    <label for="username">username: *</label>
    <input type="text" class="form-control" placeholder="Enter Your username" name="username" required>
  </div>
         <div class="form-group">
    <label for="name">Name: *</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
  </div>
  
  <div class="form-group">
    <label for="email">Email address: *</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
  </div>
  <div class="form-group">
    <label>Role: *</label>
    <input type="text" list="role" class="form-control" placeholder="Buyer or Seller" name="role" required>
<datalist id="role">
    <option value="Buyer">
    <option value="Seller">
</datalist>
  </div>
  <div class="form-group">
  <label for="gender">gender:</label>
  <input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
  </div>
  
  <div class="form-group">
    <label for="proffesion">proffesion : </label>
    <input type="text" class="form-control" placeholder="Enter proffesion" name="proffesion">
  </div>
         <div class="form-group">
    <label for="contact number">contact number : *</label>
    <input type="number" class="form-control" placeholder="Enter contact number" name="contact" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password: *</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
  </div>
  <div class="form-group">
    <label for="pwd"> Confirm Password: *</label>
    <input type="password" class="form-control" placeholder="Re-enter password" name="pwd" required>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" > Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
 <span>* are information must be given</span>

     <!-- form end  --><br><br>

    <div class="text-capitalize text-center"> <h3> alreay have a account ?</h3>
     <a href="login.php"><h4>login</h4></a></div>
     </div>
     </div>
</div></div>
</div>
<footer>
<?php include_once('footer.php'); ?>
</footer>
</body>
</html>