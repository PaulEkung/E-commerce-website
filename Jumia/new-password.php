<?php require_once "db_connection.php" ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>reset password</title>
        <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
        
        <script>
        // let x = showPass();
        function showPass(element){
    var x = document.getElementById("token");
    var y = document.getElementById("token2");
        if(x.type ==="password"){

     x.type ="text";

        }else{
            x.type="password";
        }
        if(y.type ==="password"){

     y.type ="text";

        }else{
            y.type="password";
        }

         var y = element.style.color;
       if(y == "darkred"){
           element.style.color = "darkblue";
       }else{
           element.style.color = "darkred";
       }
       var z = document.getElementById("eye");
        if(z.className == "bi bi-eye-fill fs-3 offset-4")
        {
            z.className = "bi bi-eye-slash-fill fs-3 offset-4";
        }else{
            z.className = "bi bi-eye-fill fs-3 offset-4";
        }
    }


        </script>
       
    </head>
    <body class="bg-secondary">
    <br>
    <br>
    <br>
    <br>
    <?php 
    if(isset($_GET["email"]))
    {
        $tokenEmail = $_GET["email"];
    
    }
    ?>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-sm-4">
    <?php echo "
    <a href='forgotten-password.php' class='bi bi-arrow-left-circle text-light fs-1'></a>
    ";
    ?>
    </div>
    <div class="col-sm-4">
    <div class="modal-body">
    <div class=" header alert alert-primary text-center">
    Provide your new password
    
    </div>
    <form action="new-password.php" method="post" autocomplete="off">
    <div class="form-group shadow p-5 bg-light">
    
    <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $tokenEmail ?>">
    <br>
    <input type="password" class="form-control" id="token" name="new-pwd" placeholder="Enter new password">
    <br>
    <input type="password" class="form-control" id="token2" name="confirm-pwd" placeholder="Confirm new password">
    <br>
    <input type="submit" name="reset" value="Reset" class="btn btn-primary w-50">
    <span type="checkbox" onclick="showPass(this)" class="bi bi-eye-slash-fill fs-3 offset-4" id="eye" style="cursor:pointer;color:darkred"></span>
    </div>
    </form>
    </div>   
      <?php 
    // require 'function.php';
    if(isset($_POST["reset"]))
    {
        $tokenEmail = $_POST["email"];
       $newPwd = $_POST["new-pwd"];
       $confirmPwd = $_POST["confirm-pwd"];
       if(!empty($newPwd) || !empty($confirmPwd))
       {
           $pwd_hash = password_hash($newPwd, PASSWORD_DEFAULT);
           $sql = $db_connect->query("UPDATE customers set password = '$pwd_hash' WHERE email = '$tokenEmail'");
           if($sql)
           {
               header("Location: login.php?resetSuccessful");
           }
       }else if($newPwd !== $confirmPwd){
           header("Location:new-password.php?unmatch='$tokenEmail'");
       }else{
        header("Location:new-password.php?emptyFields='$tokenEmail'");
       }
    }
 

    if(isset($_GET["unmatch"]))
{
    $tokenEmail = $_GET["unmatch"];
 echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>The two passwords did not match</div>";
}elseif(isset($_GET["emptyFields"]))
{
    $tokenEmail = $_GET["emptyFields"];
    echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Empty input fields</div>";
}
       
    ?>       
    </div>
    </div>
    </div>
    <div class="col-sm-4"></div>
    </div>
    </div>

    

        
    </body>
    </html>