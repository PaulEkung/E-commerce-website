<?php
require 'db_connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">

</head>
<body>
 <div class="alert alert-warning lead fw-semibold">
<a href="admin_dashboard.php" class="bi bi-arrow-left-circle-fill fs-3"></a>
<span class="offset-5">
Search Outcome :
</span>
 <span>
 <?php
 if(isset($_POST["submit"])){
    $items = $_POST["search_items"];
    $result = $db_connect->query("SELECT count(*) FROM  `sales` WHERE `sales`.productName = '$items'");
    if($counter = mysqli_fetch_array($result))
    {
        echo $counter[0];
    }
    }
    ?>
    </span>

    </div>
    <br>
    <div style="display:flex" class="">                
    <?php 
    
    if(isset($_POST["submit"])){
    $items = $_POST["search_items"];
    $result = $db_connect->query("SELECT productName,productImage,price,id FROM  `sales` WHERE `sales`.productName = '$items'");
    if(!$result)
    {
        echo "No result was found from your search";
    }else{
        while($row = mysqli_fetch_assoc($result))
        {
        
        $image = $row['productImage'];
        $name = $row['productName'];
        $price = $row['price'];
        $id = $row['id'];
        echo "
            &nbsp;&nbsp;&nbsp;

        <span class='flex-row'> <img src='upload/$image' alt='' style='width:150px' class='rounded-circle'> </span>
        <br>
        <br>
        <div class='bg-white p-3'>
        Product name : $name <br>
        Price : $price <br><br>
        <form action='admin-update-price.php' method='post'>
        <input type='hidden' name='id' value='$id'>
        <input type='submit' name='submit' class='btn btn-warning' style='margin-top:0rem' value='Update'>
        &nbsp;
        <a href='admin-delete-item.php?deleteId=$id' class='bi bi-trash-fill btn btn-danger' style='width:4.5rem'></a>
        </form>
        
              
                </div>
                ";
            }
                }

                }
                
                ?>
                </div>
                <br>
                <br>
                <div class="flex-row">
                 <div class='alert alert-primary p-2  fs-5 fw-semibold text-center font-monospace w-25 offset-4'>Suggested items</div>
                <br>
                <br>
                <div style="display:flex" class="">
                &nbsp;
               <?php 
               if(isset($_POST["submit"])){
                   $items = $_POST["search_items"];
                $check_match = $items[0] . $items[1];
                // echo $check_match;
                $query = "SELECT * FROM sales WHERE productName LIKE '%$check_match%' or '%$check_match%'";
                $result = mysqli_query($db_connect, $query);
                if($result)
                {
                while($num_rows = mysqli_fetch_assoc($result)){
                $suggested_name = $num_rows['productName'];
                $suggested_image = $num_rows['productImage'];
                $suggested_price = $num_rows['price'];
                $suggested_id = $num_rows['id'];
                echo "
                  
               &nbsp;&nbsp;&nbsp;
               <span class=''> <img src='upload/$suggested_image' alt='' style='width:120px' class='rounded-circle'>
               </span>
               <span class='bg-white p-3'>
               Product name : $suggested_name <br>
                Price : $suggested_price <br><br>
                <form action='admin-update-price.php' method='post'>
                <input type='hidden' name='id' value='$suggested_id'>
                <input type='submit' name='submit' class='btn btn-primary' style='margin-top:0rem' value='Update'>
                </form>
                <br>
                <a href='admin-delete-item.php?deleteId=$suggested_id' class='bi bi-trash-fill btn btn-danger ' style='width:4.8rem'></a>
                </span>
                
                ";
            }
                }else{
                    echo "No suggestion were found based on your search";
                }
            }
            ?>

            </div>
            </div>
        </body>
        </html>