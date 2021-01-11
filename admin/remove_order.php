<?php 
ob_start();
session_start();
// db connect 
include_once('../db_connect.php');
// connected 

$oid = $_GET['oid'];
 //update status in order_table 
$update_order_table_stetus = "UPDATE `order_table` SET `stetus`='delivered' WHERE o_id='$oid'";
$queryfire_update_order_table_stetus = mysqli_query($con, $update_order_table_stetus);
 // select the elements from my_order table 
$select_myorder = "SELECT * FROM `my_order` WHERE o_id ='$oid'";
$queryfire_select_myorder =mysqli_query($con, $select_myorder);

while ($array_select_myorder = mysqli_fetch_array($queryfire_select_myorder))
{
    $buyer = $array_select_myorder['b_username'];
    $seller = $array_select_myorder['s_username'];
    $size = $array_select_myorder['size'];
    $price = $array_select_myorder['price'];
    $i_id = $array_select_myorder['i_id'];
     // update status in my_order table 
    $update_stetus = "UPDATE `my_order` SET `stetus`='delivered' WHERE o_id = '$oid' && i_id = '$i_id'";
    $qeuryfire_update_stetus = mysqli_query($con, $update_stetus);
      // insert detail of sells in sell_detail table 
    $insert_sell_detail = "INSERT INTO `sell_detail`(`username`, `o_id`, `i_id`, `size`, `price`, `buyer`)
                                               VALUES ('$seller','$oid','$i_id','$size','$price','$buyer')";
    $queryfire_insert_sell_detail = mysqli_query($con, $insert_sell_detail);
      // get detail from seller_account table   
    $get_details ="SELECT * FROM `seller_account` WHERE username = '$seller'";
    $queryfire_get_details = mysqli_query($con , $get_details);
    $array_get_details = mysqli_fetch_array($queryfire_get_details);
     $no_of_web_size = $array_get_details['lifetime_web_sell'];
     $no_of_small_size = $array_get_details['lifetime_small_sell'];
     $no_of_medium_size = $array_get_details['lifetime_medium_sell'];
     $no_of_large_size = $array_get_details['lifetime_large_sell'];

   // update no of sells in of that type in seller_account table 
    if( $size == 'web')
    {
        $no_of_web_size = $no_of_web_size+1;

        $update_no_of_size = "UPDATE `seller_account` SET `lifetime_web_sell`='$no_of_web_size' WHERE username = '$seller'";
        $queryfire_update_no_of_size = mysqli_query($con, $update_no_of_size);
        
    }

    else if ($size == 'small')
    {
        $no_of_small_size = $no_of_small_size+1; 

        $update_no_of_size = "UPDATE `seller_account` SET `lifetime_small_sell`='$no_of_small_size' WHERE username = '$seller'";
        $queryfire_update_no_of_size = mysqli_query($con, $update_no_of_size);
    }
    
    else if ($size == 'medium')
    {
        $no_of_medium_size = $no_of_medium_size+1;  
        
        $update_no_of_size = "UPDATE `seller_account` SET `lifetime_medium_sell`='$no_of_medium_size' WHERE username = '$seller'";
        $queryfire_update_no_of_size = mysqli_query($con, $update_no_of_size);
    }

    else if ($size == 'large')
    {
        $no_of_large_size = $no_of_large_size+1;  

        $update_no_of_size = "UPDATE `seller_account` SET `lifetime_large_sell`='$no_of_large_size' WHERE username = '$seller'";
        $queryfire_update_no_of_size = mysqli_query($con, $update_no_of_size);

    }

}

    // calculating lifetime earning 
   
     $get_details ="SELECT * FROM `seller_account` WHERE username = '$seller'";
     $queryfire_get_details = mysqli_query($con , $get_details);
     $array_get_details = mysqli_fetch_array($queryfire_get_details);
     $web = $array_get_details['lifetime_web_sell'];
     $small = $array_get_details['lifetime_small_sell'];
     $medium = $array_get_details['lifetime_medium_sell'];
     $large = $array_get_details['lifetime_large_sell'];
     
     $lifetime_earning = ($web*800) + ($small*1600) + ($medium*2400) +($large*3000);
     $earning_after_commition = ($lifetime_earning*90)/100;

    // update totle lifetime earning 

    $update_lifetime_earning = "UPDATE `seller_account` SET `lifetime_earning`='$earning_after_commition' WHERE username = '$seller'";
    $queryfire_update_lifetime_earning = mysqli_query($con, $update_lifetime_earning);

    echo "<script> alert('image is delivered') </script>";
    echo "<script> window.open('order.php','_self') </script>";

?>