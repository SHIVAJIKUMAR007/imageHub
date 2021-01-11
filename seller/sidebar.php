<div class=" container-fluid py-5 ">
<div class=" mt-5 p-2">
<!-- style="background-color:#bec7b9; border-radius:10px;" -->
<?php

// connectinon of db
include_once('../db_connect.php'); 

$user = $_SESSION['username'];

$get_data = "SELECT * FROM `seller` WHERE username= '$user'";
$queryfire = mysqli_query($con,$get_data);
$result = mysqli_fetch_array($queryfire);
$avtar = $result['avtar'];
$name = $result['name'];
$bio = $result['bio'];
$fb = $result['fb'];
$insta = $result['insta'];
$twitter = $result['twitter'];
$pin = $result['pinterest']; 
if($avtar=="")
{   ?>
    <!-- profile image  -->
    <center><img src="https://st3.depositphotos.com/13159112/17145/v/450/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg"
     class="img-fluid" style="border-radius:50%; width:300px; height:300px;"></center>    
    <div style="margin-top:-150px;background-color:#bec7b9; padding-top:170px;" class=" pb-2">
      <!-- username and name  -->
    <div class=" text-danger text-center"><h5>Hi, <?php echo $user ?>!</h5><h6><?php echo $name ?></h6> </div>
     <!-- bio  --><br>
    <div class="text-center"><?php echo $bio ?> </div>
    <!-- social media links  --><br>
    <div class="container pl-5 pr-5"><div class="row pr-5 pl-5">
     <div class=" mx-auto"><a href="<?php echo $fb  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $insta  ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $twitter  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
     <div class="mx-auto"><a href="<?php echo $pin  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
    </div></div>
    </div>
    <?php
}

else
{
    ?>
    <!-- profile image  -->
    <center><img src="profile image/<?php  echo $avtar;?>"
     class="img-fluid" style="border-radius:50%; width:300px; height:300px;"></center>    
    <div style="margin-top:-150px;background-color:#bec7b9; padding-top:170px;" class=" pb-2">
      <!-- username and name  -->
    <div class=" text-danger text-center"><h5>Hi, <?php echo $user ?>!</h5><h6><?php echo $name ?></h6> </div>
     <!-- bio  --><br>
    <div class="text-center"><?php echo $bio ?> </div>
    <!-- social media links  --><br>
    <div class="container pl-5 pr-5"><div class="row pr-5 pl-5">
     <div class=" mx-auto"><a href="<?php echo $fb  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $insta  ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
     <div class=" mx-auto"><a href="<?php echo $twitter  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
     <div class="mx-auto"><a href="<?php echo $pin  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></div>
    </div></div>
    </div>
    <?php
}
?>
 
<h3 class="text-center" style="margin-top:80px;">COPYRIGHT STUFF</h3>
<hr class="w-75 mx-auto">
<div class="container-fluid" style="font-size:13px;">
Pinning, Tweeting and Sharing content/images from this blog is welcome and much appreciated! However, all content and images (unless otherwise noted) remain property of DesignYourOwnBlog.com. <br><br>

<b>Content:</b> All content on DesignYourOwnBlog.com is provided free for your personal education. You are free to use an excerpt from any article on this blog provided a link back to the original post is included. It is NEVER OK to copy a post in its entirety in your own blog or website. If in doubt, please contact me. <br><br>

<b>Images:</b> You are free to use an image or two provided that a link back to the original post is included. Please do not remove any logos or watermarks from images without obtaining written permission from me first. You can do that by contacting me here.
<br> <br>
Thank you for your understanding and support!
</div>

</div>
</div>