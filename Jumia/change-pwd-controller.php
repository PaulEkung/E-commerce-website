<?php
// require 'function.php';

if(isset($_POST["reset"]))
{

    $pwd_reset_email = $_POST["email"];
    $token = bin2hex(random_int(666, 999));
    $subject = "Password Reset Request";
    $message = nl2br("We received a password reset request.");
    $message.= "Your password reset token is $token";
    $headers = "From: pauldrums32@gmail.com";
    // if(mail($to, $subject, $message, $headers)){

    if(emptyField($pwd_reset_email) !== false)
    {
        echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Please fill in the input field.</div>";
    }

    else if(invalidEmail($pwd_reset_email) !== false)
    {
        echo "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Invalid email address format.</div>";
    }

    else if(__emailExistError($db_connect, $pwd_reset_email) !== false)
    {
        echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Unknown email address provided.</div>";
    }
    else{

       if(mail($pwd_reset_email, $subject, $message, $headers))
       {
           $sql = $db_connect->query("INSERT INTO `forgottenpwd`(email, token) values ('$pwd_reset_email', $token)");
           if($sql){
               header("Location: pwd-reset-token.php?email=$pwd_reset_email");
           }else{
               header("Location: forgotten-password.php?Failed");
           }

       }else{
           header("Location: forgotten-password.php?connectionError");
       }
       
       
    }
    
    
}
if(isset($_GET["connectionError"]))
{
 echo  "<div class='alert alert-danger offset-0 shadow w-100 text-center'>Failed to connect! Please check your internet connection and try again</div>";
}