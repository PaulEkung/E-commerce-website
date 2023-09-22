
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
        <br>
       
    <a href="admin_dashboard.php" class="bi bi-arrow-left-circle text-secondary fs-1 offset-1"></a>
       
        <div class="login-page">
        <div class="form bg-light p-5 shadow">
        <div class="header p-3 bg-dark text-light text-center">Add Products</div>
        <form action="admin_add_items.php" method="post" enctype="multipart/form-data" class="">
        <br>
        <?php 
        require 'function.php';
        $add = add($db_connect);
        ?>
        <br>
        <input type="text" class="form-control" Placeholder="Product Category" name="category">
        <br>
        <input type="text" class="form-control" Placeholder="Product Name" name="name">
        <br>
        <input type="number" class="form-control" Placeholder="Price" name="price">
        <br>
        <input type="file" class="form-control" name="image">
        <br>
       
        <input type="submit" value="Add" name="add" class="btn btn-primary offset-0 w-100 p-2">
        <br>
        <br>
        <br>
        </form>

    
</body>
</html>