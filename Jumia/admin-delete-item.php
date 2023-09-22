<?php 
require 'db_connection.php';

 if(isset($_GET['deleteId']))
 {
$id = $_GET['deleteId'];
   $result = mysqli_query($db_connect, "DELETE FROM `sales` WHERE  `sales`. id = '$id'");
   if($result)
   {
       header("Location:admin_dashboard.php?Item+successfully+deleted ");
   }
 }
// Another way of doing the query
 // $result = $db_connect->query("query enters here");
 // if($result)
 //{
// Do something
 //}