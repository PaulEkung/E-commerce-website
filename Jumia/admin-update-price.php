<?php
session_start();
 require 'function.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add items</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
     
     <style>
     .login-page{
         margin:auto;
     }
     .form{
         /* position: relative; */
         z-index: -1;
         max-width: 500px;
         margin: 0 auto 50px;
         /* text-align: center; */
     }
    

   
        </style>
        </head>
        <body>

        <br>
       
        <a href="admin_dashboard.php" class="offset-1 btn btn-danger bi bi-arrow-left-circle-fill fs-4 rounded-circle"></a>
       
       <?php 
    
    if(isset($_POST['submit']))
    {
    $id = $_POST['id'];
    $result = $db_connect->query("SELECT * FROM `sales` WHERE `sales` . id = '$id' ");
    if($result)
    {
    while($row = mysqli_fetch_assoc($result))
    {
    $update_id = $row['id'];
    $image = $row['productImage'];
    $recent_price = $row['price'];
    $name = $row['productName'];
    
    ?>
    
    <div class="login-page">
    <div class="form p-5 shadow">
    <div class="header p-3 bg-dark text-light text-center">Update Item Price</div>
    <form action="admin-update-price.php" method="post">
    <br>
   <?php echo "<img src= 'upload/$image' class='offset-4 rounded-circle' style='width:130px; border-radius:3px'/>"; ?>
   <br>
   <br>
    Product Name : <?php echo $name ?>
    <br>
    Recent Price : <?php echo $recent_price     ?>
    <br>
    <input type="hidden" class="form-control" value="<?php echo $update_id ?>" name="id">
        <br>
        <br>
    <input type="text" class="form-control" name="price" placeholder="Enter new price">
    <br>
    <input type="submit" value="Update" name="update" class="btn btn-primary offset-0 w-50 p-2">
    <br>
    <br>
    <br>
    </form>
    
    </div>
    </div>
   
    <?php
    }
    }
    }
    $updateCart = adminUpdateFunction($db_connect);
    ?>


    
</body>
</html>