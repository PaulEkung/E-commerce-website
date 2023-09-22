<?php
 session_start();
 require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Carts</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
                <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
<nav class="navbar p-4" style="background:orange">
<a href="index.php" class="bi bi-arrow-left-circle-fill fs-2 text-light"></a>
<span class="offset-0 text-light">
<span class="bi bi-person-circle fs-2 text-light"></span>
<?php echo $_SESSION['session_name'] ?>
</span>
</nav>

<div class="alert alert-success w-50 p-3">
<span class="bi bi-cart-check-fill fs-2"></span> &nbsp; Your total orders
&nbsp;
<span class=" bg-light fw-bold p-2 rounded-circle">
 <?php
 $sql = "SELECT count(*) FROM `orders` WHERE order_user_email = '".$_SESSION['session_email']."'";
$result = mysqli_query($db_connect, $sql);
if($counter = mysqli_fetch_array($result))
{
    echo $counter[0];
}
 ?>
 </span>

<span class="bi bi-cash-coin fs-2 offset-2"></span> &nbsp; Your total amount
&nbsp;
<span class=" bg-light fw-bold p-2">
 <?php
//   require 'function.php';
  $totalAmount = totalPrice($db_connect);
 ?>
 </span>
</div>
<div id='deleteMsg'>
<?php
if(isset($_GET['deleted']))
{
   
    echo "  
    <span class='alert alert-success text-center w-25 offset-8 p-4 position-absolute' id='deleteMsg' style='margin-top:-6rem'>
    Cart item deleted successfully
    </span>
    ";
}
?>
</div>

<div id='success'>
<?php
if(isset($_GET['success']))
{
   
    echo "  
    <span class='alert alert-success text-center w-25 offset-8 p-4 position-absolute' id='deleteMsg' style='margin-top:-6rem'>
    Cart updated successfully
    </span>
    ";
}
?>
</div>

<script type="text/javascript">
var message = document.getElementById("deleteMsg");
message.onclick = setTimeout(function(){
  message.style.visibility = "hidden";
  <?php
  if(isset($_GET['deleted']))
  {
      
      unset($_GET['deleted']);
  }
  ?>  
}, 3000)
</script>

<script type="text/javascript">
var success = document.getElementById("success");
success.onclick = setTimeout(function(){
  success.style.visibility = "hidden";
  <?php
  if(isset($_GET['success']))
  {
      
      unset($_GET['success']);
  }
  ?>  
}, 3000)
</script>

<br>

<?php
$myCarts = myCarts($db_connect);
// echo $_SESSION['session_email'];

?>

    <script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>