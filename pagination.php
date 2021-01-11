<?php

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$num_per_page = 5;
$start_from = ($page - 1)*$num_per_page;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  include_once('bootstrap.php');
        include_once('./db_connect.php');
    ?>
    <title>pagination</title>
</head>
<body>
    
    <div class=" container mx-auto table table-striped w-100">
    <table>
    <th>
         <td>Name</td>
         <td>	i_id </td>
         <td>	i_path</td>
         <td>seller</td>
    </th>
    <?php
     $query = "SELECT * FROM `images` LIMIT $start_from,$num_per_page";
     $queryfire = mysqli_query($con,$query);
     $num = mysqli_num_rows($queryfire);

     $totle_page = ceil( $num / 3 );

     while($result = mysqli_fetch_assoc($queryfire))
     {
         $name = $result['i_name'];
         $id = $result['i_id'];
         $path = $result['i_path'];
         $seller = $result['s_username'];
         ?>
           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
           <tr>
               <td><?php echo $name ?></td>
               <td><?php echo $id ?> </td>
               <td><?php echo $path ?></td>
               <td><?php echo $seller ?></td> 
            </tr>
         <?php
     }
    ?>
    </table> 
    </div>


</body>
</html>