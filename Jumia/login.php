<?php 
require_once "function.php";
session_start();
$get_device = get_current_user();
$result = mysqli_query($db_connect, "SELECT `device` FROM `customers` WHERE `device` = '$get_device'");
if(!$result)
{
    if($get_device){
        header("Location: homepage.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="js.js"></script>

    <style type="text/css">
     /* .back-video{
         position:absolute;
         right:0;
         bottom:0;
         z-index:-1;
         height:100vh;

     } */

      section{
         height: 100vh;
         width:100%;
         background-image: linear-gradient(rgba(12,3,51,0.9), rgba(12,3,51,0.8));
         padding:0.5%;
         position:relative;
         display:inline-block;
         justify-content:center;
         align-items:center;
     }
    </style>
        </head>
        <body>

               <!-- <div class="text-center bg-success offset-4 w-25 p-2 text-light shadow font-monospace" style="">Sign In</div> -->
        <!-- <div class="text-center bg-success offset-3 w-50 fw-bold p-2 text-light shadow font-monospace text-uppercase" style="">Sign In</div> -->



        <section class="text-center shadow-1-strong" 
        style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),
        url('images/5.jpg'); background-size: cover;
        background-repeat: no-repeat;height: 100vh; background-attachment: fixed">

         <!-- <nav class="navbar navbar-expand-lg fixed-top p-0" style="background:orange">
        <div class="nav-image">
        <img src="images/shop1.png" class="" style="width:150px" alt=""> <span class="text-light">JUMIA</span>
        </div>
        <div class="nav-items offset-9">
        <a href="" class="text-decoration-none text-light">Login</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="" class="text-decoration-none text-light">Sign up</a>
        </div>
        </nav> -->

<!-- <video src="images/ecom6.mp4" autoplay loop muted plays-inline type="video/mp4" class="back-video "> -->

<!-- </video> -->

<br>
<br>
<br>
<br>
<br>
<br>
 <br>
 <div class="container">

<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-4 bg-light p-4 shadow">
<div class="header p-3 bg-dark text-light text-center">Please provide your email address and password</div>
<br>
<?php $login = login($db_connect); ?>
<br>
<form action="Login.php" method="post" class="">

<input type="text" class="form-control" Placeholder="Email Address" name="email">
<br>
<input type="password" class="form-control" Placeholder="Password" name="password" id="pwd">
<br>
<span type="checkbox" onclick="showPass(this)" class="bi bi-eye-slash-fill fs-3" id="eye" style="cursor:pointer;color:darkred"></span>
<a href="forgotten-password.php" class="offset-4 text-decoration-none">Forgotten password</a>
        <br>
        <script>
        // let x = showPass();
        function showPass(element){
    var x = document.getElementById("pwd");
        if(x.type ==="password"){

     x.type ="text";

        }else{
            x.type="password";
        }

         var y = element.style.color;
       if(y == "darkred"){
           element.style.color = "darkblue";
       }else{
           element.style.color = "darkred";
       }
       var z = document.getElementById("eye");
        if(z.className == "bi bi-eye-fill fs-3")
        {
            z.className = "bi bi-eye-slash-fill fs-3";
        }else{
            z.className = "bi bi-eye-fill fs-3";
        }
    }


        </script>
       
<br>
<input type="submit" value="Login" name="trigger_login" class="btn btn-primary offset-0 w-100">
<br>
<br>
<span class="offset-0">Don't have an account yet?
 <a href="register.php" class="text-decoration-none"> Sign Up </a> </span>
</form>

<br>
 <?php 
if(isset($_GET["resetSuccessful"]))
{
 echo  "<div class='alert alert-primary offset-0 shadow w-100 text-center'>Password reset successfull. Enter new password to login</div>";
}

?>
</div>
<div class="col-sm-4"></div>

</div>

</div>



</section>


       
     <!-- <footer class="footer fixed-bottom p-5 text-center text-light" style="background:orange">
    &copy; 2022 Jumia.com
    </footer> -->
</body>
</html>