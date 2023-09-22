
<?php 
   require 'function.php';
     // session_start();
  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body class="">

<div class="container">

<div class="row">
    <div class="container">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-5">
   <br>
    <div class="modal-body">
    <div class="modal-header bg-success text-light p-4">
    <a href="index.php" class="bi bi-box-arrow-left fs-3 text-light"></a>
    <span>Send us an email</span>
    </div>

<form action="contact.php" method="post" class="shadow p-5">
<?php $trigger_function = contact($db_connect)?>

 <br>
    <input type="email" class="form-control" name="email" placeholder="Your Email">
    <p class="lead" style="color:darkblue">Please ensure the Email address is a valid one so that we can get back to you.</p>
    <br>
    <input type="text" class="form-control" name="subject" placeholder="Subject">
    <br>
    <textarea type="text" cols="100" rows="10" class="form-control" name="message" placeholder="Your Message"></textarea>
    <br>
    <input type="submit" class="btn btn-success" name="send">


</form>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
    

<!-- Question Accordion -->

</body>
</html>