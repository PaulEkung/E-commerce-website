<?php
 session_start();
 require 'db_connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chats</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body class="bg-dark"  style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.8)),
    url('images/girl1 (1).jpg'); background-size: cover;
    background-repeat: no-repeat;height: 100vh; background-attachment: fixed; height:100vh">>
<div class="alert alert-warning lead fixed-top p-1">
 <img src="images/robot.jpg" style="width:100px;border:2px solid dodgerblue" class="rounded-circle" alt=""> Hi <?php echo $_SESSION['session_name'] ?>. How can we help you?
<a href="index.php" class="bi bi-backspace-fill fs-1 offset-6 text-dark"></a>
</div>
<!-- <section class="text-center shadow-1-strong">  -->
   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <br>
    <br>
    <?php
        $query = $db_connect->query("SELECT feedback FROM `chats` WHERE `chats`.email = '".$_SESSION['session_email']."'");
        
    if($query)
    {
    while($row = mysqli_fetch_assoc($query))
    {
    $reply = $row['feedback'];
    if(!empty($reply)){
    echo "<div class='offset-2 alert alert-light text-center' style='border-radius: 1rem 0 1rem 0;width:25rem'>
    <img src='images/robot.jpg' style='width:50px' class='rounded-circle'>
    $reply  </div>";

    echo "<br>";
    echo "<br>";
    // echo "<br>";
    }
   }
  }
    
    

    ?>
    </div>
    <div class="col-md-6">
    <?php 
if(isset($_POST["send"]))
{
    $message = $_POST["message"];
    $email = $_POST['email'];
    $result = $db_connect->query("INSERT INTO `chats` (email, message) VALUES ('$email', '$message') ");
    
}
?>

    <span class="text-light">
    <?php
        $new_query = $db_connect->query("SELECT * FROM chats WHERE email = '".$_SESSION['session_email']."'");
        
        if($new_query)
        {
            while($row = mysqli_fetch_assoc($new_query))
            {
            $msg = $row['message'];
            echo "<div class='offset-6 alert alert-success text-center' style='border-radius: 1rem 0 1rem 0;width:12rem'> $msg  <span class='bi bi-check-all text-primary'></span> </div>";
        
            echo "<br>";

        }
    }

?>
</span>
    </div>
    </div>
    </div>
    

<!-- </section> -->
<div class="container">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<form action="chats.php" method="post" class="fixed-bottom bg-light">
   <!-- <span class="bi bi-textarea"></span> -->
   <div class="form-group">
   <input type="hidden" name="email" value="<?php echo $_SESSION['session_email'] ?>">
   <textarea name="message" id="" cols="0" rows="0" placeholder="Type here.." class="form-control form-control-sm w-50 offset-2 bg-dark text-light textarea" autofocus>
   
   </textarea><button type="submit" class="btn btn-dark bi bi-send-fill fs-3 p-1 position-absolute offset-8"  style="margin-top:-3.2rem; width:4rem" name="send"></button>
   </div>
   </form> 
</div>
<div class="col-sm-4"></div>
  
</div>
</div>
</body>
</html>