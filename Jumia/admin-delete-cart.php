<?php 
require 'db_connection.php';

 if(isset($_GET['deleteId']))
 {
$id = $_GET['deleteId'];
   $result = mysqli_query($db_connect, "DELETE FROM `orders` WHERE  `orders`.order_id='$id'");
   if($result)
   {
       header("Location:admin_dashboard.php?deleted");
   }
 }
// Another way of doing the query
 // $result = $db_connect->query("query enters here");
 // if($result)
 //{
// Do something
 //}