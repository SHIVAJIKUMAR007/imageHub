<?php
    include_once('./db_connect.php'); 
    $search = $_POST['search'];
        
    $query = "SELECT * FROM `images` WHERE tag LIKE '%$search%'";
    $queryfire = mysqli_query($con, $query);
    $num = mysqli_num_rows($queryfire);
        
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php include_once('./bootstrap.php');  ?>
            <title>Image related <?php echo $search ?> on Image Hub</title>
       </head>
       <body>
           <header class="pt-2">
            <?php include_once('header.php'); ?>
            </header> 
            <?php
              if($num == 0 )
              {
                  echo  "<h1 class= 'text-center p-5'> No result for $search is found  </h1>";
              }
              else
              {
                while($result = mysqli_fetch_array($queryfire))
                   {
                    $image_name = $result['i_name'];
                    $image_id = $result['i_id'];
                    $image_url = $result['i_path'];
                    $image_ctg = $result['category'];
                    $image_tag = $result['tag'];
                    ?>
                      <div class=" col-lg-3 col-md-6 col-sm-12 col-12 my-5">
                      <a href="buyer/more_info.php?id=<?php echo $image_id ?>" style =" text-decoration:none; color:black;"> 
                      <div class="card mx-auto" style="width: 15rem;">
                      <img src="<?php echo $image_ctg ?>/<?php echo $image_url ?>" alt="<?php echo $image_tag ?>" class="img-fluid p-1">
                           <div class="card-body">
                            <h5 class="card-title"><?php echo $image_name ?></h5>
                          </div></a>
         
         
                          <div class="container-fluid"><div class="row px-3">
                          <div>
                         <a href="buyer/see_all.php?ctg=<?php echo $image_ctg  ?>" style="color:black;"> <i class="fa fa-th-large" aria-hidden="true" title = "same category"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="buyer/same_modal.php?seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-user-alt' title = "same modal"></i> </a>
                          </div>
                          <div class="ml-auto">
                          <?php
                              if(!isset($_SESSION['username']))
                              { 
                                ?>
                               <a href="login.php" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="login.php" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                              }
                              else
                              {
                                ?>    
                                   <a href="addcart.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class='fas fa-shopping-cart' title = "add to cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                   <a href="addwish.php?id=<?php echo $id?>&seller=<?php echo $seller ?>" style="color:black;" target="_blank"><i class="fas fa-heart" title = "add to wishlist"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                              }
                            ?>
                         <a href="buyer/more_info.php?id=<?php echo $image_id?>" style="color:black;"><i class='fas fa-info' title = "more info"></i></a>
                          </div>
                          </div></div>  
         
         
                        </div>
                       </div>
                   <?php                      
                    }    
              }


            ?>
        <footer>
            <?php include_once('contact.php'); ?>
           <?php  include_once('footer.php'); ?>
        </footer>
    </body>
     </html>
