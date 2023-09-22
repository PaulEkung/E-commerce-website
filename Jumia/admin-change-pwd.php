<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change password</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
   <br>
   <br>
   <br>
   <br>
   <div>
   <a href="admin_dashboard.php" class="bi bi-arrow-left-circle-fill offset-1 fs-2"></a>
   </div>
   <br>
   <div class="container shadow p-5 rounded-circle bg-primary">
   <div class="row">
   <div class="col-md-4">
   <br>
   <br>
   <br>
   <br>
    <span class="fs-5 text-light lead fw-bold">
    Change Your Password
    </span>
    <br>
    <p>
    <?php 
    require 'function.php';
    $changePwd = adminChangePwd($db_connect);
    ?>
    </p>
   </div>
   <div class="col-md-4">
   <form action="admin-change-pwd.php" method="post" class="shadow p-5 rounded-bottom rounded-top bg-light">
   <input type="password" class="form-control" placeholder="Enter old pin" name="old-pwd" id="pass1">
   <br>
   <input type="password" class="form-control" placeholder="Enter new pin" name="new-pwd" id="pass2">
   <br>
   
   <input type="password" class="form-control" placeholder="Confirm new pin" name="confirm-pwd" id="pass3">
   <br>
   <span class="bi bi-eye-slash-fill fs-4 offset-0" id="eye" onclick="showPwd(this)"style="cursor:pointer;color:darkred"></span> 
   <input type="submit" value="Finish" class="btn btn-dark offset-7 w-25" name="update">

   </form>
   </div>
   <div class="col-md-4 lead text-light">
   <br>
   <br>
   <br>
   <br>
   Please ensure to use a strong pin in order to ensure a tight security to your account!
   </div>
   </div>
   </div>
   <script>
     function showPwd(element){

        var pwd_1 = document.getElementById("pass1");
        var pwd_2 = document.getElementById("pass2");
        var pwd_3 = document.getElementById("pass3");

        if(pwd_1.type == "password")
        {
            pwd_1.type ="text";
        }else{
            pwd_1.type="password";
        }
        if(pwd_2.type == "password")
        {
            pwd_2.type ="text";
        }else{
            pwd_2.type="password";
        }
        if(pwd_3.type == "password")
        {
            pwd_3.type ="text";
        }else{
            pwd_3.type="password";
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
</body>
</html>