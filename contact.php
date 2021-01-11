<div style="background-color:darkseagreen; padding-bottom:2rem; padding-top:2rem;">
    <h2 class=" text-center">Get in Touch</h2>
    <p class=" text-center">Feel free to drop us a line to contact us</p><br><br>
  <div class=" container text-capitalize "><div class=" row ">
     <div class=" col-lg-6 col-md-6 col-12 my-3">
       <h3>Feel Free To Contact</h3>
       <p>Hello Everyone! Have a great day :) We are here to help you. If you want to know something or you have any suggestion then please mail us. Thank You.</p>
        <span style =" font-size:20px;">adress : chandni chowk, delhi. </span><br><br><br>
        <span style =" font-size:20px;">phone no : 1800-11-5859 </span><br><br><br>
        <span style =" font-size:20px;">email adress : official.imagehub@gamil.com </span><br><br><br>
        <span style =" font-size:20px;">website : www.imagehub.com </span><br>
      </div>
      <div class=" col-lg-6 col-md-6 col-12 my-3">
      <form action="" method="POST">
      <h3>send a massage</h3><br>
  <div class="form-group">
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" required><br>
  
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" required><br>
    <label for="massage">Massage:</label>
    <textarea type="text" class="form-control" placeholder="Massage" name="massage" required></textarea><br>
  </div>
 
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox">  I am agree with the terms and conditon 
    </label>
  </div><br>
  <button type="submit" class="btn btn-primary" name="submit">Send</button>
</form>

      </div>
   </div></div></div> 


   <?php
   
// db connect 
include_once('db_connect.php');

if(isset($_POST['submit']))
{
      
$name = $_POST['name'];
$email = $_POST['email'];
$massage = $_POST['massage'];


 $massage = "INSERT INTO `query`(`name`, `email`, `massage`,`stetus`) VALUES ('$name','$email','$massage','pending')";
 if($queryfire_massage = mysqli_query($con , $massage))
 {
    echo "<script>alert('massage sent')</script>";
 }
 else
 {
    echo "<script>alert('technical issue please visit after some time')</script>";
 }

}

?>
