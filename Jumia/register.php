
 <?php 
        require_once 'function.php'; 
        session_start();

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
     <script src="javaScript.js"></script>
     <style>
     .login-page{
         margin:auto;
     }
     .form{
         /* position: relative; */
         z-index: -1;
         max-width: 400px;
         margin: 0 auto 50px;
         /* text-align: center; */
     }
    

   
        </style>
        </head>
        <body class="">
        <section class="text-center shadow-1-strong" 
        style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)),
        url('images/5.jpg'); background-size: cover;
        background-repeat: no-repeat;height: 100vh; background-attachment: fixed">
         <br>
        <br>
       
        <br>

        <div class="login-page">
        <div class="form bg-light p-5 shadow">
        <div class="header p-3 bg-dark text-light text-center">Create Your Account Now!</div>
        <form action="register.php" method="post" class="register-form">
        <br>
        <?php $register = register($db_connect); ?>
        <br>
        <input type="text" class="form-control" Placeholder="Username" name="username">
        <br>
        <input type="number" class="form-control" Placeholder="Phone Number" name="number">
        <br>
        <input type="text" class="form-control" Placeholder="Email Address" name="email">
        <br>
        <input type="text" class="form-control" Placeholder="Home Address" name="addres">
        <br>
        <input type="password" class="form-control" Placeholder="Password"  name="pwd" id="pwd">
        <br>
         <span class="bi bi-eye-slash-fill fs-3" id="eye" style="cursor:pointer;color:darkred" onclick="showPass(this)"></span>
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
        if(z.className == "bi bi-eye-fill fs-4")
        {
            z.className = "bi bi-eye-slash-fill fs-4";
        }else{
            z.className = "bi bi-eye-fill fs-4";
        }
    }


        </script>
       
        <br>
        <input type="submit" value="Proceed" name="submit" class="btn btn-primary offset-0 w-100 p-2">
        <br>
        <br>
        <br>
        
        <span class="offset-1"> Already have an account? 
        <a href="login.php" class="text-decoration-none fw-normal"> Sign In </a> 
        </span>
        </form>


        <!-- </div>d -->
        
        </div>
        </div>
      
   </section>
                <!-- <script src="https://code.jquery.com/jquery-3.2-1.min.js"></script>

        <script>
        $(."message a"),click(finction(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow")
        }); -->
        <!-- </script> -->
        <script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="bootstrap3/js/jquery.min.js"></script>
        <script src="bootstrap3/js/jquery.js"></script>
    
</body>
</html>