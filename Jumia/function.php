<?php
require 'db_connection.php';
// session_start();

function register($db_connect){

if(isset($_POST["submit"])){

$username = $_POST["username"];
$phone = $_POST["number"];
$email = $_POST["email"];
$addres = $_POST["addres"];
$password = $_POST["pwd"];
$unique_id = bin2hex(random_int(666, 999));
$device_name = get_current_user();
//   Preventing SQL injection  
$username = stripslashes($username);
$phone = stripslashes($phone);
$email = stripslashes($email);
$addres = stripslashes($addres);
$password = stripslashes($password);

$username = mysqli_real_escape_string($db_connect, $username);
$phone = mysqli_real_escape_string($db_connect, $phone);
$email = mysqli_real_escape_string($db_connect, $email);
$addres = mysqli_real_escape_string($db_connect, $addres);
$password = mysqli_real_escape_string($db_connect, $password);
// Checking form submission
if(empty($username) || empty($phone) || empty($email) || empty($addres) || empty($password)){
echo "<script type='text/javascript'> window.alert(\"Please fill in all inputs fields\")</script>";

echo "<span class='text-center text-danger offset-1 w-25'>Please fill in all required fields</span>";
echo "<br>";

}elseif(is_numeric($username)){
echo "<script type='text/javascript'> window.alert(\"Invalid username characters\")</script>";

echo "<span class='text-center text-danger offset-1 w-25'>Invalid username characters</span>";
echo "<br>";

}elseif(strlen($phone) !== 11){

echo "<script type='text/javascript'> window.alert(\"Invalid mobile number!\")</script>";
echo "<div class='text-danger text-center'>Invalid mobile number</div>";


}elseif(!filter_var($email, FILTER_SANITIZE_EMAIL) ||!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<script type='text/javascript'> window.alert(\"Invalid email address format\")</script>";
echo "<div class='text-danger text-center'>Invalid email address format</div>";

}else if(strlen($password) < 7){

echo "<div class='text-danger offset-1 shadow'>Password is too short</div>";
}else{
$sql = "SELECT email FROM `customers` WHERE email = ?";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $sql)){
echo "<center>" . "<div class='alert alert-danger' style='color:red;
background: transparent; border: 2px solid red'>"
. "Unable to perform request" . "</div>" . "</center>";
die;
}else{
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$rowCount = mysqli_stmt_num_rows($stmt);
if($rowCount > 0){
echo "<script type='text/javascript'> window.alert(\"The email '$uemail' belongs to another customer\")</script>";
echo "<div class='text-danger text-center'>The email address already exists</div>";
    
}else{
$query = "INSERT INTO `customers`(unique_id, username, phone, email, home_address, password, device) VALUES (?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $query)){
echo "<center>" . "<div class='alert alert-danger' style='color:red;
background: transparent; border: 2px solid red'>"
. "Unable to perform request" . "</div>" . "</center>";
exit();
}else{

$hashPass = password_hash($password, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "sssssss",$unique_id, $username, $phone, $email, $addres, $hashPass, $device_name);
mysqli_stmt_execute($stmt);
header("Location: Login.php");
}
}
}

//Closing connection
mysqli_stmt_close($stmt);
mysqli_close($db_connect);
}
}
}

function Contact($db_connect){

if(isset($_POST['send'])){

$Email = $_POST["email"];
$Subject = $_POST["subject"];
$Message = $_POST["message"];
if(empty($Email) || empty($Subject) || empty($Message)){

echo "<script type='text/javascript'>window.alert('Please fill in all required input fields')</script>";
echo "<div class='alert alert-danger text-center'>The email address already exists</div>";

}elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL) || !filter_var($Email, FILTER_SANITIZE_EMAIL)){
echo "<script type='text/javascript'>window.alert('Invalid email address provided. Please provide a valid email.')</script>";
echo "<div class=' alert alert-danger text-center'>The email address already exists</div>";

}else{

$to = "pauldrums32@gmail.com";
$subject = $Subject;
$message = $Message;
$headers = "From: $Email";
if(mail($to, $subject, $message, $headers)){
echo "<script type='text/javascript'>window.alert('Mail sent successfully! We will send a reply to this email.')</script>";
echo "<div class=' alert alert-success text-center'>Mail sent successfully!</div>";

}else{
echo "<script type='text/javascript'>window.alert('Sorry! We were unable to handle your request.Please try again later.')</script>";
echo "<div class=' alert alert-danger text-center'>Sorry! Failed to handle request. Please try again later</div>";

}

}
}

}

function login($db_connect){

if(isset($_POST["trigger_login"]))
{

//something was posted
$login_email = $_POST['email'];
$pwd = $_POST['password'];

// To protect SQL injection
$login_email = stripslashes($login_email);
$pwd = stripslashes($pwd);
$login_email = mysqli_real_escape_string($db_connect, $login_email);
$pwd = mysqli_real_escape_string($db_connect, $pwd);

if(empty($login_email) || empty($pwd))
{

echo "<div class='alert alert-danger offset-0 shadow'>Please fill in all input fields</div>";

}else if(!filter_var($login_email, FILTER_VALIDATE_EMAIL)){
echo "<div class='alert alert-danger offset-0 shadow'>Invalid email address format</div>";
}else{
$sql = "SELECT * FROM `customers` WHERE email = ?";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $sql)){
die("Failed to connect");
exit();
}else{
mysqli_stmt_bind_param($stmt, "s", $login_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if($field = mysqli_fetch_assoc($result)){

$password_check = password_verify($pwd, $field['password']);
if($password_check == false){
echo "<div class='alert alert-danger offset-0 shadow'>Incorrect Password</div>";

}elseif($password_check == true){
    $_SESSION['session_User_id'] = $field['id'];
    $_SESSION['session_name'] = $field['username'];
    $_SESSION['session_email'] = $field['email'];
    // for cookie auto logout authentification
    // setcookie('admin', 'abc', time() + 20);
    header("Location: index.php");
    
}else{

        echo "<div class='alert alert-danger offset-0 shadow'>Incorrect Password</div>";

}

}else{

echo "<div class='alert alert-danger offset-0 shadow'>Invalid user information</div>";

}
}
}


}
}



function add($db_connect){

if(isset($_POST["add"])){

$category = $_POST["category"];
$product_name = $_POST["name"];
$price = $_POST["price"];

$image_name = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$tmp_name = $_FILES['image']['tmp_name'];
$image_error = $_FILES['image']['error'];
if($image_error === 0){
$image_exe = pathinfo($image_name, PATHINFO_EXTENSION);
$image_exe_to_lc = strtolower($image_exe);
$allowed_exe = array('jpg', 'jpeg', 'png');
if(in_array($image_exe_to_lc, $allowed_exe)){
    $new_image_name = uniqid("$product_name", true). '.' . $image_exe_to_lc;

    if($image_size > 4000000){
        
        define("err_1", "<div class='alert alert-danger'><b>Error: </b>The image size is too large. </div>", false);
        echo err_1; 
    }else{

        $upload_file_path = './upload/'. $new_image_name;
    }

}else{

define("err_2", "<div class='alert alert-danger'><b>Error: </b>You cant upload images of type: $allowed_exe </div>", false);
echo err_2;
} 
}else{
// define("err_3", "<div class='alert alert-danger'><b>Error: </b>Failed to upload image</div>", false);
// echo err_3;
}

}

if(empty($category) || empty($product_name) || empty($price) || empty($image_name))
{

define("err_6", "<div class='alert alert-danger text-center'>Please fill in all input fields</div>");
echo err_6; 
}else{
$query = "INSERT INTO `recommendedproducts`(productName, price, productImage, category) VALUES ('$product_name', 
'$price', '$new_image_name', '$category')";
if($db_connect->query($query)){
move_uploaded_file($tmp_name, $upload_file_path);

define("err_4", "<div class='alert alert-success'><b>Success: </b>Item added successsfully!</div>", false);
echo err_4; 
}else{
define("err_5", "<div class='alert alert-danger'><b>Failed: </b> Failed to add items</div>", false);
echo err_5; 
}
}


}

function orders($db_connect){
if(isset($_POST['addCart']))
{
    // $id = $_POST['id'];
$orderEmail = $_POST['email'];
$orderNumber = $_POST['number'];
$orderAddress = $_POST['h-address'];
$orderQuantity = $_POST['quantity'];
$orderName = $_POST['p-name'];
$orderMethod = $_POST['method'];
if(empty($orderEmail) || empty($orderNumber) || empty($orderAddress) || 
empty($orderQuantity) || empty($orderName) || empty($orderMethod)){

    $alert[] = "<div class='alert alert-danger offset-4 text-center shadow w-25'>Please fill in all required fields.</div>";
    
}else if(!filter_var($orderEmail, FILTER_VALIDATE_EMAIL)){
    $alert[] = "<div class='alert alert-danger offset-4 shadow w-25'>Invalid email address format.</div>";
    
}else{

$sql = "INSERT INTO `orders` (productName, order_user_email, order_phone, order_address, order_quantity, order_method) 

VALUES ('$orderName', '$orderEmail', '$orderNumber', '$orderAddress', '$orderQuantity', '$orderMethod')";
if($db_connect->query($sql) === true){
    $alert[] = "<div class='alert alert-success text-center offset-4 shadow w-25'>Cart added successfully.</div>";  
                                    
}
}
foreach ($alert as $alerts){
echo $alerts;
}

}

}

function myCarts($db_connect)
{
$query = "SELECT sa.*, ord.* FROM `sales`sa, `orders`ord WHERE sa.productName = ord.productName and ord.order_user_email = '".$_SESSION['session_email']."'";
$result = mysqli_query($db_connect, $query);
if($result){
while($row = mysqli_fetch_assoc($result))
{
$price = $row['price'];
$q = $row['order_quantity'];
$order_id = $row['order_id'];
$total = $price * $q;
?>

<table class='table table-bordered p-0 table-condensed table-sm text-center table-responsive alert alert-secondary'>
<thead>
<th class='alert alert-secondary p-3 border-light border-2' style='border:'>Email / Phone</th> 
<th class='alert alert-secondary p-3 border-light border-2' style='border:'>Address</th>
<th class='alert alert-secondary p-3 border-light border-2' style='width:30rem'>Name / Price</th>
<th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Image</th>  
<th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Quantity</th>  
<th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Acquire</th>  
<th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Total</th>  
<th class='bg-dark p-3 text-warning border-light border-2' style=''>Action</th> 
</thead>
<tbody class=''>

<td class='bg-light p-5 border-light border-2'>

<?php
echo $row['order_user_email']; 
echo "<br>";
echo "<br>";
echo $row['order_phone'];
?>

</td>

<td class='bg-light p-5 border-white border-2' style='height:20px'>
<?php echo $row['order_address'] ?>
</td>
<td class='bg-light border-white p-5 border-white border-2' style='height:20px'>


<?php 
echo $row['productName'];
echo "<br>";
echo "<br>";
echo "<span class='bi bi-coin'></span> " . $row['price'];
?>

</td>
<td class='bg-light p-5 border-white border-2' style='height:20px'>
<?php echo "<img src= 'upload/".$row['productImage']."' class='offset-0' style='width:100px; border-radius:3px'/>"?>
</td>

<td class='bg-light p-5 border-white border-2' style='height:20px'>
<?php echo $row['order_quantity'] ?>
</td>

<td class='bg-light p-5 border-white border-2' style='height:20px'>

<?php echo $row['order_method'] ?>

</td>

<td class='bg-light p-5 border-white border-2' style='height:20px'>
<?php
echo $total;
?>
</td> 

<td class='p-4 border-white border-2' style='height:20px'>

<!-- <a href='#reply' data-bs-toggle='modal' class='btn btn-success text-light bi bi-arrow-up-circle-fill fs-5'></a> -->
<br>
<form action="user-update-cart.php" method="post">
<input type="hidden" name='id' value="<?php echo $order_id ?>">
<input type="submit" value="Update" class="btn btn-warning" name="updateCart">
</form>
<br>
<br>

<a href='user-delete-carts.php?deleteId=<?php echo $order_id ?>' class='btn btn-danger'>
<span class="bi bi-trash-fill fs-5">
</a>
</td>


</tbody>


</table>
&nbsp; <span class="bi bi-calendar-check"> Date :
<?php
echo $row['order_date'];
if(empty($row['card_num']) && empty($row['expiry']) && empty($row['cvv']) && empty($row['bank_num']) && empty($row['pay_status']))
{
echo "<a href='payment.php?payid=$order_id' class='btn btn-secondary offset-1'>Make payment</a>";
}else{
echo "<span class='offset-3'>Payment status:
<span class='text-success offset-0 fw-bold bi bi-check-all fs-6'>Verified</span>";  
}

?>
</span>

<span class="offset-2"> Order status :
<?php
if($row['status'] == ""){
echo "<span class='text-danger fw-bold bi bi-hourglass'> Pending</span>";
}else{
echo "<span class='text-success fw-bold bi bi-check-all'> Approved</span>";
}

?>
</span>
                

<?php
echo "<br>";
echo "<br>";
echo "<hr>";
}

}else{

echo "<div class='alert alert-warning bi bi-emoji-frown p-4'>You do not have any orders in your carts</div>";
}



}

function cartUpdateFunction($db_connect)
{ 
if(isset($_POST['update']))
{

$id = $_POST['id'];   
$new_quantity = $_POST["quantity"];
$new_acquire = $_POST["acquire"];
$new_address = $_POST["address"];

if(empty($new_quantity) || empty($new_acquire) || empty($new_address))
{
echo "<div class='alert alert-danger offset-4 shadow w-25 text-center'>An input field cannot be empty</div>";
}else{
$sql = "UPDATE `orders` SET `order_quantity` ='$new_quantity',`order_method` ='$new_acquire',`order_address` ='$new_address' WHERE `orders`. order_id = '$id' AND `order_user_email` = '".$_SESSION['session_email']."'";
$result = mysqli_query($db_connect, $sql);
if($result)
{
header("Location: myCarts.php?success");
}else{
echo "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Failed to update cart.</div>";
}
}


}

}

function adminUpdateFunction($db_connect)
{ 
if(isset($_POST['update']))
{

$id = $_POST['id'];   
$new_price = $_POST["price"];


if(empty($new_price))
{
echo "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Please fill the price field</div>";
}else{
$sql = "UPDATE `sales` SET `price` ='$new_price' WHERE `sales`. id = '$id'";
$result = mysqli_query($db_connect, $sql);
if($result)
{
header("Location: admin_dashboard.php?update+successful");
}else{
echo "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Failed to update cart.</div>";
}
}


}

}


function totalPrice($db_connect)
{
$sql = "SELECT sa.*, ord.*, sum(price * order_quantity) FROM `sales`sa, `orders`ord WHERE sa.productName = ord.productName AND ord.order_user_email = '".$_SESSION['session_email']."'";
$result = mysqli_query($db_connect, $sql);

while($row = mysqli_fetch_array($result)){
$quantity = $row['order_quantity'];
$price = $row['price'];
echo $row['sum(price * order_quantity)'];
// echo $price * $quantity;



}
}
function adminLogin($db_connect)
{
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$pwd = $_POST["password"];
if(empty($pwd))
{
    define('error_1', "<div class='alert alert-danger offset-0 shadow text-center'>Please provide password.</div>", false);
    echo error_1;

}else{
$sql = "SELECT password FROM `j_admin` WHERE password = ?;";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($db_connect));
}else{
    mysqli_stmt_bind_param($stmt, "s", $pwd);
    mysqli_stmt_execute($stmt);
$fetch_result = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_array($fetch_result))
{
    if($pwd !== $row['password'])
    {
        define("error_2", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect password </div>", false);
        echo error_2;
    }else
    {
        $_SESSION['password'] = $row["password"];
        $_SESSION['session_admin_id'] = $row["id"];
        header("Location: admin_dashboard.php");
    }
}else{
    define("error_3", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect password</div>", false);
    echo error_3;
}
}
}
}
}
function pay($db_connect)
{
if(isset($_POST['pay'])){
    $pay_id = $_POST['id'];
    $card_num = $_POST['card-num'];
    $expiry = $_POST['date'];
    $cvv = $_POST['cvv'];
    $bank_name = $_POST['bank'];
    $verified = "Verified";

    if(empty($card_num) || empty($expiry) || empty($cvv) || empty($bank_name))  
    {
        $error[] =  "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Please fill all inputs.</div>";

    }else if(strlen($card_num) <> 16 ){

    $error[] =  "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Invalid card number.</div>";
}else if(strlen($cvv) <> 3)
{
    $error[] =  "<div class='alert alert-danger offset-4 shadow w-25 text-center'>Invalid cvv number.</div>";
}else{

    $result = $db_connect->query("UPDATE orders SET card_num ='$card_num', expiry ='$expiry', cvv ='$cvv', bank_name ='$bank_name', pay_status ='$verified' WHERE orders.order_id = '$pay_id'");
    if($result == true)
    {
        $error[] =  "<div class='alert alert-success offset-4 shadow w-25 text-center'>Payment successful.</div>";
    }
}

foreach($error as $errors)
{
    echo $errors;
}
}

}

function checkAdminSession($db_connect)
{
$t = time();
if(!isset($_SESSION['password']) && ($t - $_SESSION['password'] > 7200))
{
    session_destroy();
    unset($_SESSION['password']);
    header("Location: admin-login.php");

}else{
    $_SESSION['password'] = time();
}

}

function setCook($db_connect)
{
setcookie('admin', 'abs', time() + 7200);
}

function emptyField($pwd_reset_email)
{
    $result;
   if(empty($pwd_reset_email))
   {
    $result = true;
   } else{
       $result = false;
   }
   return $result;
}
function invalidEmail($pwd_reset_email)
{
    $result;
    if(!filter_var($pwd_reset_email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

    function __emailExistError($db_connect, $pwd_reset_email)
    {
        $result;
        $sql = $db_connect->query("SELECT email FROM `customers`");
        if($sql == true)
        {
            $row = mysqli_fetch_assoc($sql);
            $user_email = $row["email"];
            if($pwd_reset_email !== $user_email){
            
            $result = true;
        }else{
            $result = false;
        }
        return $result;
     }
    }

    
       
   function adminChangePwd($db_connect)
  
   {
   if(isset($_POST['update']))
    {
    $query = $db_connect->query("SELECT * FROM `j_admin`");
    if($query)
    {
        $row = mysqli_fetch_assoc($query);
        $recent_pwd = $row['password'];
    }
    $pwd_1 = $_POST['old-pwd'];
    $pwd_2 = $_POST['new-pwd'];
    $pwd_3 = $_POST['confirm-pwd'];

    if(empty($pwd_1) || empty($pwd_2) || empty($pwd_3))
    {
        $MESSAGE = "<div class='alert alert-danger offset-0 shadow text-center'>Please fill all input fields</div>";
        
        echo $MESSAGE;
    }else if($pwd_1 <> $recent_pwd){

        define("incorrect", "<div class='alert alert-danger offset-0 shadow text-center'>The old password is incorrect</div>", false);
        echo incorrect;

    }else if($pwd_2 !== $pwd_3){

        define("unmatch", "<div class='alert alert-danger offset-0 shadow text-center'>The new password did not match the confirm password</div>", false);
        echo unmatch;
    }else if(strlen($pwd_2) <> 6){

        define("str_short", "<div class='alert alert-danger offset-0 shadow text-center'>The new pin must be 6 digits only</div>", false);
        echo str_short;
    }else{
        $result = $db_connect->query("UPDATE `j_admin` SET password = '$pwd_2'  WHERE id = 1");
        if($result == true)
        {
            define("success", "<div class='alert alert-success offset-0 shadow text-center'>Password update successfull</div>", false);
            echo success;
        }else{
            define("failed", "<div class='alert alert-danger offset-0 shadow text-center'>Failed to update password</div>", false);
            echo failed;

        }
    }

}
}
    function viewUsers($db_connect)
    {
        $sql = $db_connect->query("SELECT * FROM `customers`");
        if($sql == true)
        {
        while ($row = mysqli_fetch_assoc($sql))
        {

            $name = $row['username'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['home_address'];
            $date = $row['date'];
            $device = $row['device'];
    echo "         
    
<tr>
    <tbody class=''>

    <td class='bg-light p-5 border-light border-2'>
    
    $name

    </td>

    <td class='bg-light p-5 border-white border-2' style='height:20px'>
    $phone
    </td>
    <td class='bg-light border-white p-5 border-white border-2' style='height:20px'>
    
    $email
    
    </td>

    <td class='bg-light p-5 border-white border-2' style='height:20px'>

    $address
    
    </td>
    
    <td class='bg-light p-5 border-white border-2' style='height:20px'>
    $date 
    </td>
    
    <td class='bg-light p-5 border-white border-2' style='height:20px'>
    $device
    </td>

    </tr>
    </tbody>
    
    
    ";
        }
        }
    }













