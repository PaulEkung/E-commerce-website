<?php
require 'db_connection.php';  
if(isset($_GET['approveId']))
{
    $id = $_GET['approveId'];
    $result = mysqli_query($db_connect, "UPDATE `orders` SET `status` = 'Approved' WHERE `orders`.order_id = '$id' ");
    if($result)
    {
        header("Location: admin_dashboard.php?approved");
    }
}