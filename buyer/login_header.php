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
 
<!-- search engine  -->
<form method = "POST" action = "../search.php"  class="form-inline my-2" style="margin-right: 120px;">
      <input class="form-control mr-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
     <!-- search engine  -->

      <li class="nav-item dropdown  ml-3">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BROWSE CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="see_all.php?ctg=Natural">NATURAL</a>
          <a class="dropdown-item" href="see_all.php?ctg=Fashion">FASION</a>
          <a class="dropdown-item" href="see_all.php?ctg=Beauty">BEAUTY</a>
          <a class="dropdown-item" href="see_all.php?ctg=Food and Drink">FOOD AND DRINK</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="see_all.php?ctg=Other">OTHER</a>
        </div>
      </li>

      <li class="nav-item dropdown ml-3">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php  echo $_SESSION['username'];  ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="home.php">HOME <span class="sr-only">(current)</span></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="my_order.php" target="_blank"> MY ORDER </a>
        <a class="dropdown-item" href="cart.php" target="_blank">CART</a>
        <a class="dropdown-item" href="wishlist.php" target="_blank">WISH LIST </a>
        <a class="dropdown-item" href="history.php">ORDER HISTORY</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../logout.php">LOGOUT</a>
        </div>
      </li>

       </ul>
  </div>
</nav>


</body>
</html>





