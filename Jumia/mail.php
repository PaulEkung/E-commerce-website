<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
<br>
<br>
<br>
    <div class="container">
    <div class="row">
    <div class="col-md-4">
    <a href="admin_dashboard.php" class="bi bi-arrow-left-circle fs-2 text-dark"></a>
    </div>
    <div class="col-md-4">
    <form action="mail.php" method="post" class="shadow p-4" autocomplete="off">
    <input type="email" name="email" id="email" class="form-control" placeholder="Reciever's email" autofocus>
    <br>
    <input type="email" name="subject" id="email" class="form-control" placeholder="Subject">
    <br>
    <textarea type="email" cols="10" rows="10" name="message" id="email" class="form-control" placeholder="Message"></textarea>
    <br>
    <input type="submit" class="btn btn-primary" name="submit" value="Send Mail">
    </form>
    <?php 
    if(isset($_POST["submit"]))
    {
        $reciever = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["email"];
        $headers ="From: pauldrums32@gmail.com";

        $conn_data = connection_status();
        if(!$conn_data){
            echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>No internet connection! Please check your internet connectivity and retry.</div>";
        }elseif(empty($reciever) || empty($subject) || empty($message)){

            echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Please fill in all inputs</div>";
        }else{
            if(mail($reciever, $subject, $message, $headers))
            {
                echo  "<div class='alert alert-success offset-0 shadow w-100 text-center'>Mail sent successfully</div>";
            }else{
                echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Failed to send mail! Something went wrong</div>";
            }
        }
    }
    ?>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
    
</body>
</html>