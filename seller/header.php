<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
  </style>
</head>
<body>




<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="profile.php"><img src="../logo.png" style="height: 70px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"style="font-size:20px;" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item active  ml-5">
        <a class="nav-link" href="profile.php">PROFILE <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active  ml-5">
        <a class="nav-link" href="update_profile.php">UPDATE PROFILE <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active  ml-5">
        <a class="nav-link" href="upload_image.php">UPLOAD NEW IMAGE <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown  ml-3">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PAYMENT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_method.php">ADD PAYMENT METHOD</a>
          <a class="dropdown-item" href="get_payment.php">PAYMENT REQUEST</a>
          <a class="dropdown-item" href="payment_history.php">PAYMENT HISTORY</a>
        </div>
      </li>
      <li class="nav-item active ml-5">
        <a class="nav-link" href="../logout.php">LOGOUT</a>
      </li>      
      </li>
       </ul>
   </div>
</nav>

  <!-- <form action="upload_it.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileToUpload">
      <button><i class="fa fa-camera"></i></button>
        </form> -->


</body>
</html>