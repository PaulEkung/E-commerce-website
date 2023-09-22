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
       
        <a href="myCarts.php" class="offset-1 btn btn-danger bi bi-arrow-left-circle-fill fs-4 rounded-circle"></a>
       
       <?php 
    
    if(isset($_POST['updateCart']))
    {
    $id = $_POST['id'];
    $result = $db_connect->query("SELECT sa.*, ord.* FROM `sales` sa, `orders` ord WHERE sa.productName = ord.productName AND ord.order_id = '$id' ");
    if($result)
    {
    while($row = mysqli_fetch_assoc($result))
    {
    $order_id = $row['order_id'];
    $image = $row['productImage'];
    $recent_quantity = $row['order_quantity'];
    $recent_method = $row['order_method'];
    $recent_address = $row['order_address'];
   
    ?>
    
    <div class="login-page">
    <div class="form p-5 shadow">
    <div class="header p-3 bg-dark text-light text-center">Update your cart</div>
    <form action="user-update-cart.php" method="post">
    <br>
   <?php echo "<img src= 'upload/$image' class='offset-4 rounded-circle' style='width:130px; border-radius:3px'/>"; ?>

    <br>
    <input type="hidden" class="form-control" value="<?php echo $order_id ?>" name="id">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" value="<?php echo $recent_quantity ?>" name="quantity">
    <br>
    <label for="Acquire">Acquire</label>
    <input type="text" class="form-control" value="<?php echo $recent_method ?>" name="acquire">
    <br>
    <label for="Address">Home address</label>
    <input type="text" class="form-control" value="<?php echo $recent_address ?>" name="address">
    
    <br>
    
    <input type="submit" value="Update" name="update" class="btn btn-primary offset-0 w-100 p-2">
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
    $updateCart = cartUpdateFunction($db_connect);
    ?>


    
</body>
</html>