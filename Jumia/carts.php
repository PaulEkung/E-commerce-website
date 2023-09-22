           
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Orders</title>
                <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
            </head>
            <body>
            <br>
            <br>
            <br>

            <div class="container">
            <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
            <div class="header bg-dark text-light p-3">
            Place your orders now! <a href="index.php" class="btn btn-danger btn-sm bi bi-x-circle-fill offset-6"> Exit</a>
            </div>
            <form action="carts.php" method="post" class="shadow p-4">
            <?php

            require 'db_connection.php';
            if(isset($_POST["submit"])){
            $id = $_POST["id"];
            $sql = "SELECT * FROM `sales` WHERE id = '$id'";
            $result = mysqli_query($db_connect, $sql);
            if($result){

                    $row = mysqli_fetch_assoc($result);
            $image = $row["productImage"];
            $price = $row["price"];
            $productName = $row["productName"];
            
            echo "<img src='upload/$image' class='rounded-circle offset-4' alt='' style='width:9rem'>";
            echo "<br>";
            echo "<span class='offset-0'>Name: $productName </span>";
            echo "<br>";
            echo "<span class='offset-0'>Price: $price </span>";
             }
            }
            ?>
            <br>
            <br>
            <div class="container">
            <div class="row">
            <div class="col-sm-6">
            <!-- <input type="hidden" name="id" value="<?php echo $id ?>"> -->
            <input type="text" class="form-control" name="email" placeholder="Customer's email">
            <br>
            <input type="number" class="form-control" name="number" placeholder="Phone number">
            <br>
            <input type="submit" class="btn btn-dark w-100" name="addCart" value="Add to Cart">
            </div>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="h-address" placeholder="Address">
            <br>
            <input type="text" class="form-control" name="quantity" placeholder="Quantity">
            <input type="hidden" name='p-name' value="<?php echo $productName ?>">
            <br>
            <select type="" name="method" id="" class="form-control form-select" placeholder="Acquire">
            <!-- <option value="Acquire">Acquire</option> -->
            <option value="Delivery">Delivery</option>
            <option value="Pickup">Pickup</option>
            
            </select>
        

            </div>
            </div>
            </div>
                <br>
                <br>
            </form>
            <br>
            <br>
            </div>
            
            <div class="col-sm-2"></div>
            </div>
            </div>
            <br>
            <?php 
            require 'function.php';
            $addCart = orders($db_connect);
            ?>
 
          </body>
            </html>