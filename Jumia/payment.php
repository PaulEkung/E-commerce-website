           
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Payment</title>
                <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
            </head>
            <body>
            <br>
            <br>
            <!-- <img src="images/card2.jpg" style="width:200px" alt="..." class="offset-5 rounded-circle"> -->
            <br>
            <br>
            

            <div class="container">
            <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
            <div class="header bg-dark text-light p-3">
            Pay for orderd product <a href="myCarts.php" class="btn btn-danger btn-sm bi bi-x-circle-fill offset-6"> Exit</a>
            </div>
            <form action="payment.php" method="post" class="shadow p-4">
            <?php

            require 'db_connection.php';
            if(isset($_GET["payid"])){
            $id = $_GET["payid"];
            $sql = "SELECT sa.*, ord.* FROM `sales`sa, `orders`ord WHERE sa.productName = ord.productName AND ord.order_id = '$id'";
            $result = mysqli_query($db_connect, $sql);
            if($result){

             $row = mysqli_fetch_assoc($result);
            $image = $row["productImage"];
            $price = $row["price"];
            $productName = $row["productName"];
            
            echo "<img src='upload/$image' class='rounded-circle offset-4' alt='' style='width:9rem'>";
            echo "<br>";
           
             }
            }
            ?>
            <br>
            <br>
            
            <div class="container">
            <div class="row">
            <div class="col-sm-6">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="number" class="form-control" name="card-num" placeholder="Card Number">
            <br>
            <label for="date" class="fw-bold">Expiry</label>
            <input type="date" class="form-control" name="date" placeholder="Expiry">
            <br>
            <input type="submit" class="btn btn-dark w-100" name="pay" value="Pay">
            </div>
            <div class="col-sm-6">
            <input type="number" class="form-control" name="cvv" placeholder="cvv">
            <br>
          
            <select type="text" name="bank" id="" class="form-control form-select" placeholder="Bank Name">
            <!-- <option value="Acquire">Acquire</option> -->
            <option value="Access Bank">Access Bank</option>
            <option value="Eco Bank">Eco Bank</option>
            <option value="First Bank">First Bank</option>
            <option value="Fidelity Bank">Fidelity Bank</option>
            <option value="Micro Finance Bank">Micro Finance Bank</option>
            <option value="Union Bank">Micro Finance Bank</option>
            <option value="Zenith Bank">Zenith Bank</option>
            
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
            
            <div class="col-sm-2">
            <br>
            <br>
            <br>
            <br>
            <img src="images/card2.jpg" style="width:200px" alt="..." class="offset-5">
            </div>
            </div>
            </div>
            <br>
            <?php 
            require 'function.php';
            $pay = pay($db_connect);
            ?>
 
          </body>
            </html>