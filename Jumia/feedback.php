<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reply</title>
<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>

<div class="container">
<div class="row">
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-dark">
<p class="lead text-warning">Reply message</p>
<a href="admin_dashboard.php" class=" btn btn-danger close text-light bi bi-arrow-left-circle-fill fs-5"></a>
</div>
<div class="modal-body">

<?php 
session_start();
include 'db_connection.php';

if(isset($_POST['reply'])){

 $post_id = $_POST['id'];  



 $sql = "SELECT * FROM `chats` WHERE id='$post_id'";
 $result = mysqli_query($db_connect, $sql);
 if($result){
 
 $row = mysqli_fetch_array($result);
 $msg = $row["message"];
echo "
 <div class='alert alert-success text-center p-4'>
 $msg
 </div>
 ";

echo "

<form action=\"feedback.php\" method=\"post\">
<input type='hidden' name='id' value='$post_id'>
<textarea cols='10' rows='2' class=\"form-control \" style=\"padding:5rem\" name=\"feedback\"></textarea>
<br>
<button type=\"submit\" class=\"btn btn-primary w-50 offset-3 bi bi-send-fill fw-semibold\" name=\"submit\"> Send</button>

</form>
";


}else{

echo "No message";

   }

  }

?>

 <?php 

if(isset($_POST['submit'])) {
$id = $_POST['id'];
$feedback = $_POST['feedback'];   



$sql = "UPDATE `chats` SET feedback = '$feedback' WHERE chats.id = '$id'";
$result = mysqli_query($db_connect, $sql);
if($result) {

$_SESSION['success'] = "<div class=\"alert alert-success p-2 text-center\">Feedback message successfully sent</div>";
echo $_SESSION['success'];

}else{

  echo  "<div class=\"alert alert-danger p-2\" id=\"successMessage\">Failed to send Feedback message</div>";  
}
}

?>

</div>
</div>
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>



                