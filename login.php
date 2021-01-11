<html>
<head>
     <title>login</title>
    <?php include_once('bootstrap.php'); ?>
    <script>
// function validation()
// {
// 	var result=true;
// 	var i=document.getElementsByTagName("input");
// 	 if(i[1] !='Buyer' )
// 	{
//     if(i[1] != 'Seller')
// 	   {
//        var result=false;
// 	    alert("Please select right role"); 
//      } 
//     }
//   //  else if(i[2].value.length <= 6 )
// 	// {
// 	// var result=false;
// 	// alert("password must be greater than 6 digit");
//   //   }
// 	return(result);
// }
    </script>
</head>
<body>
<?php include_once('header.php'); ?>
<div class="text-capitalize text-white " style="background-color:black;">
   <div class="container"><div class="row">
     <div class="my-5 col-lg-6 col-md-6 col-12">
     <img src="https://cdn4.vectorstock.com/i/1000x1000/89/13/user-login-icon-vector-21078913.jpg" alt="login" style="width:100%;">
     </div>
     <div class=" bg-dark my-5 col-lg-6 col-md-6 col-12">
     <div class=" pt-4 container-fluid">
     <h1 >login</h1><br>
     <h6>(if you already have an account) </h6>
     <br>
     <!-- form  -->
     <form action="checklogin.php" method="POST" target="_blank" onsubmit = "return validation()">
  <div class="form-group">
    <label>Username:</label>
    <input type="text" class="form-control" placeholder="Enter username" name="username" required>
  </div>
  <div class="form-group">
    <label>Role:</label>
    <input type="text" list="role" class="form-control" placeholder="Buyer or Seller" name="role" required>
<datalist id="role">
    <option value="Buyer">
    <option value="Seller">
</datalist>
  </div>
  <div class="form-group">
    <label>Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

     <!-- form end  --><br><br>

    <div class="text-capitalize text-center"> <h3>Not Registered Yet? </h3>
     <a href="signup.php"><h4>Register Now</h4></a></div>
     </div>
     </div>
</div></div>
</div>
<footer>
<?php include_once('footer.php'); ?>
</footer>
</body>
</html>