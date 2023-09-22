            <?php require_once "db_connection.php" ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Forgotten password</title>
                <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
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
            <a href='login.php' class='bi bi-arrow-left-circle text-light fs-1'></a>
            ";
            ?>
            </div>
            <div class="col-sm-4">
            <div class="modal-body">
            <div class=" header alert alert-primary text-center">
            Please provide your email address
            </div>
            <form action="forgotten-password.php" method="post" autocomplete="off">
            <div class="form-group shadow p-5 bg-light">
            
            <input type="text" class="form-control" name="email" placeholder="Enter email address">
            <br>
            <input type="submit" name="reset" value="Reset" class="btn btn-primary w-50">
            </div>
            </form>
            </div>                                               <?php 
            require 'function.php';
            require 'change-pwd-controller.php';

            ?>       
            </div>
            </div>
            </div>
            <div class="col-sm-4"></div>
            </div>
            </div>

            

                
            </body>
            </html>