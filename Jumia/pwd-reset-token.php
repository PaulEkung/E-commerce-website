<?php require_once "db_connection.php" ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Token</title>
                <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
                <style type="text/css" medis="all">
                input[type="number"]:placeholder-shown{
                    border: 3px solid red;
                }
                input[type="number"]{
                    border: 2px solid dodgerblue;
                }
                </style>
                <script type="text/javascript" defer>
                var token = document.getElementById("token");
                if(token.length = 1 || token.length = 2 || token.length = 3 || token.length = 4 || token.length = 5)
                {
                    token.border = "2px solid red";
                }elseif(token.length = 6)
                {
                    token.border = "2px solid dodgerblue";
                }else{
                    token.border = "2px solid red";
                }
                </script>
            </head>
            <body class="bg-secondary">
            <br>
            <br>
            <br>
            <br>
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
            A 6 digit password reset token was sent to 
            <?php 
            if(isset($_GET["email"]))
            {
                $email = $_GET["email"];
                echo $email;
            }
            
            ?>. Please provide the 6 digit token to reset your password.
            </div>
            <form action="pwd-reset-token.php" method="post" autocomplete="off">
            <div class="form-group shadow p-5 bg-light">
            
            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email ?>">
            <input type="number" class="form-control" id="token" name="token" placeholder="Enter 6 digit token">
            <br>
            <input type="submit" name="submit" value="Reset" class="btn btn-primary w-50">
            </div>
            </form>
            </div>

            <?php 

         if(isset($_POST["submit"]))
         {
             $email = $_POST["email"];
             $token = $_POST["token"];
            $sql = $db_connect->query("SELECT token from `forgottenpwd` where email = '$email'");
            if($sql)
            {
                $row = mysqli_fetch_assoc($sql);
                $t = $row["token"];
            }
            if(empty($token))
            {
                echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Empty input fields</div>";
            
            }elseif($token !== $t)
            {
                echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Incorrect token provided</div>";
            }else{
                header("Location: new-password.php?email=$email");
            }
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