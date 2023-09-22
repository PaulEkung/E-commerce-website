<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand p-4 bg-dark">
<a href="admin_dashboard.php" class="bi bi-arrow-left-circle fs-1 text-light"></a>
 <span class="text-light offset-5 fs-3">Total Users</span>
</nav>
<br>
<table class='table table-bordered p-0 table-condensed table-sm text-center table-responsive'>
    <thead>
    <th class='bg-secondary p-3 text-light border-light border-2' style='border:'>Username</th> 
    <th class='bg-secondary p-3 text-light border-light border-2' style='border:'>Phone number</th>
    <th class='bg-secondary p-3 text-light border-light border-2' style='width:20rem'>Email Address</th>
    <th class='bg-secondary p-3 text-light border-light border-2' style='width:17rem'>Home Address</th>  
    <th class='bg-secondary p-3 text-light border-light border-2' style='width:17rem'>Registered Date</th>  
    <th class='bg-secondary p-3 text-light border-light border-2' style='width:12rem'>Logged Device</th>  
    </thead>
    <?php 
    require "function.php";
    $users = viewUsers($db_connect);
    ?>
    </table>
</body>
</html>