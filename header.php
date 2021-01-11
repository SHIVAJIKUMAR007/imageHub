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
  <a class="navbar-brand" href="index.php"><img src="logo.png" style="height: 70px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"style="font-size:1.8vw;" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active ml-2 ml-4">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BROWSE CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="buyer/see_all.php?ctg=Natural">NATURAL</a>
          <a class="dropdown-item" href="buyer/see_all.php?ctg=Fashion">FASION</a>
          <a class="dropdown-item" href="buyer/see_all.php?ctg=Beauty">BEAUTY</a>
          <a class="dropdown-item" href="buyer/see_all.php?ctg=Food and Drink">FOOD AND DRINK</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="buyer/see_all.php?ctg=Other">OTHER</a>
        </div>
      </li>
      <li class="nav-item active ml-4">
        <a class="nav-link" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item active ml-4">
        <a class="nav-link" href="signup.php">SIGN UP</a>
      </li>
       </ul>
       
       <form method = "POST" action = "search.php" class="form-inline my-2 my-lg-0 ml-4">
      <input class="form-control mr-sm-2" type="search" name= "search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



</body>
</html>