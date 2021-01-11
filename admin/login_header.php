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
<!-- https://1.bp.blogspot.com/-HxrhsjbBXFg/Xo3ITPyu1CI/AAAAAAAAAMU/KZq7PhdxTboqWNw6aw4PFcWJYqR47x_iwCLcBGAsYHQ/s1600/logo.png -->
  <a class="navbar-brand" href="home.php"><img src="../logo.png" style="height: 70px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- style="font-size:1.6vw;" -->
  <div class="collapse navbar-collapse" style="font-size:23px;" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
 
    <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="order.php">ORDERS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="payment_request.php">PAYOUT REQUEST <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="query.php">QUERY <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="../logout.php">LOGOUT<span class="sr-only">(current)</span></a>
      </li>
     

       </ul>
  </div>
</nav>


</body>
</html>





