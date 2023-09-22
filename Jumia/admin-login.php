<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="main.js"></script>
    <script src="javaScript.js"></script>
    <style>
    body{
        justify-content: center;
        align-items: center;
    }
    input[type="password"]:placeholder-shown{
        border: 3px solid red !important;
    }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <img src="images/security.jpg" class="w-100" alt="">
    </div>
    <div class="col-md-4">
    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
     function showPwd(element){
        var pwd = document.getElementById("pwd");
        if(pwd.type == "password")
        {
            pwd.type ="text";
        }else{
            pwd.type="password";
        }
       var y = element.style.color;
       if(y == "darkred"){
           element.style.color = "darkblue";
       }else{
           element.style.color = "darkred";
       }
       var z = document.getElementById("eye");
        if(z.className == "bi bi-eye-fill fs-4")
        {
            z.className = "bi bi-eye-slash-fill fs-4";
        }else{
            z.className = "bi bi-eye-fill fs-4";
        }
    }

    
    </script>
    <?php
    require 'function.php';
    $login = adminLogin($db_connect);
    $setCookie = setCook($db_connect);
    ?>
    <form action="admin-login.php" method="POST" class="shadow p-5" style="border:3px solid dodgerblue">
    <div class="form-group">
    <input type="password" name="password" id="pwd" class="form-control" placeholder="Enter 6 digit pin">
    </div>
    <br>
    &nbsp;
    <span class="bi bi-eye-slash-fill fs-4" id="eye" onclick="showPwd(this)"style="cursor:pointer;color:darkred"></span> 
    
    <input type="submit" class="btn btn-dark offset-2 btn-sm w-50" value=Login>
    </form>
    <br>
    &nbsp;&nbsp;
    <span class="alert alert-secondary text-center w-100">Please provide your pin to login to your dashboard</span>
    </div>
    <div class="col-md-2"></div>
    </div>
    </div>
   
   
</body>
</html>