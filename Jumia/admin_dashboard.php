<?php
session_start();
require 'db_connection.php';
require 'function.php';
$check_sesion = checkAdminSession($db_connect);
$checkCook = setCook($db_connect);
if(!isset($_COOKIE['admin']))
{
    echo "<script>location.href='admin-login.php'</script>";
}

setcookie('admin', 'abc', time() + 7200);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
     <style type="text/css" media="all">
      .sidenav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0rem;
    left: 0;
    background: rgba(0, 3, 32, 0.753);
    overflow-x: hidden;
    padding-top: 90px;
    transition: 0.2s;

    }


    .sidenav a{
        
    display: block;
    padding: 10px 8px 10px 10px;
    text-decoration: none;
    /* font-size: 22px; */
    transition: 0.3s;
    /* color: aliceblue; */
    /* font-family: 'Courier New', Courier, monospace; */
    /* font-weight: bold; */
    text-transform: capitalize;
    /* font-weight: 700; */

    }

    /* .sidenav a:hover{
        
        color:gold;
        transition: 0.1s;
        transform: scale(1.1);
        font-weight: 500;
    } */

    .sidenav .closebtn{
        position: absolute;
        color: black;
        top: -2rem;
        right: 0;
        font-size: 36px;
        margin-left: 0px;
        cursor: pointer;
        color: aliceblue;
    }

      #main{
        transition: margin-left .3s ease-in-out;
        overflow: hidden;
        width: 100%;
    }
    input[type="checkbox"]{
        cursor: pointer;
    }


     </style>


</head>
<body>
<script type="text/javascript">
function openNav(){
    document.getElementById("mySidenav").style.width ="370px";
    // document.getElementById("mySidenav").style.background = "rgba(0,0,0,0.5)";
    document.getElementById("main").style.marginLeft ="80px";
    // document.getElementById("main").style.opacity ="0.1";
}
function closeNav(){
    document.getElementById("mySidenav").style.width ="0";
    document.getElementById("main").style.marginLeft ="0";
    // document.getElementById("main").style.opacity ="100";
}

</script>


<div id="main">
<nav class="navbar navbar-expand-lg p-5" style="background:orange">
<img src="images/person icon.jpg" class="position-absolute rounded-circle" style="width: 5rem" alt="">
<span class="offset-2 text-light position-absolute fs-4">Admin Dashboard</span>
<span class="offset-8 btn btn-default text-light position-absolute fs-2 bi bi-list-check" onclick="openNav()"></span>
<span class="position-absolute offset-9 bi bi-arrow-repeat text-light fs-2" style="cursor:pointer" onclick="window.location.reload()"></span>
<span class="position-absolute offset-10 bi bi-chat-dots-fill text-light fs-2" style="cursor:pointer" data-bs-target='#chats' data-bs-toggle="modal">
<span class="fs-4">
<?php
$result = mysqli_query($db_connect, "SELECT count(*) FROM chats");
if($result)
{
    $chat_count = mysqli_fetch_array($result);
    echo "<span class='text-black'>$chat_count[0]</span>";
}
?>
</span>
</span>
</nav>
 
 </div> 

 <div class="container">
       

            <div id="mySidenav" class="sidenav">
            <span class="closebtn bg-warning p-5 w-100" onclick="closeNav()">&times;</span>
            <!-- <a href="#">Admin Feedback</a> -->
            <!-- <ol> -->
            <div class="accordion accordion-flush " id="" style="">
                <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#question-two"
                            aria-expanded="false"
                            aria-controls="flush-collapseTwo" >
                            
                            <h3 class="lead"><b>Items</b></h3>
                            
                            </button>

                            </h2>

                <div id="question-two" class="accordion-collapse collapse"
                aria-labelledby="flush-headingTwo"
                data-bs-parent="#questions">
                <div class="accordion-body">
               

               <a href="admin_add_items.php">Add Items</a>
               <a href="#search_items" data-bs-toggle="modal">Search Items</a>
            
              

                </div>

                </div>

                <!-- Item 3 -->

                <div class="accordion-item">
                    <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#question-three"
                                aria-expanded="false"
                                aria-controls="flush-collapseThree" >
                                
                                <h3 class="lead"><b>Users</b></h3>
                                
                                </button>

                                </h2>

                <div id="question-three" class="accordion-collapse collapse"
                aria-labelledby="flush-headingThree"
                data-bs-parent="#questions">
                <div class="accordion-body">
                
               <a href="admin-view-users.php">View Users</a>
               <a href="mail.php">Contact Users</a>
             
              
                    </div>

                </div>

                </div>

              
                <div class="accordion-item">
                        <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#question-four"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseFour" >
                                    
                                    <h3 class="lead"><b>More Options</b></h3>
                                    
                                    </button>

                                    </h2>

                    <div id="question-four" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-bs-parent="#questions">
                    <div class="accordion-body">
                    
                    <a href="admin-change-pwd.php">Change Pin</a>
                   <a href="#logout" data-bs-target="#logout" class='' data-bs-toggle="modal">Logout</a>
                    
            
                        </div>

                    </div>

                    </div>


                </div>
                    
                </div>
           
            <!-- </ol> -->
            </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
        <section>
        <div class="alert alert-primary w-100">
        <span class="bi bi-person-circle fs-1 position-relative">
        </span><span class="lead fw-bold"> Total Registered Users :
        <span class=" bg-light fw-bold p-2 rounded-circle">
        <?php 
        $query = "SELECT count(*) FROM  `customers`";
        $result = mysqli_query($db_connect, $query);
        if($counter = mysqli_fetch_array($result)){

            echo $counter[0];
        }
        ?>
        </span>
         </span>

       <span class="bi bi-cart-check-fill fs-1 position-relative offset-1"></span><span class=" lead fw-bold">
        Total Orders :
        <span class=" bg-light fw-bold p-2 rounded-circle">
        <?php 
        $query = "SELECT count(*) FROM  `orders`";
        $result = mysqli_query($db_connect, $query);
        if($counter = mysqli_fetch_array($result)){

            echo $counter[0];
        }
        ?>
        </span>
         </span>
       <span class="bi bi-hourglass-top fs-1 position-relative offset-1"></span><span class=" lead fw-bold"> Pending Orders :
       <span class=" bg-light fw-bold p-2 rounded-circle"> 
       <?php 
        $result = $db_connect->query("SELECT count(*) FROM `orders` WHERE `status` = ''");
        if($counter = mysqli_fetch_array($result)){

            echo $counter[0];
        }
        ?>
        </span>
       </span>
      
       <span class="bi bi-check-circle-fill fs-1 position-relative offset-1"></span><span class=" lead fw-bold"> Approved Orders :
       <span class=" bg-light fw-bold p-2 rounded-circle"> 
       <?php 
        $query = "SELECT count(*) FROM  `orders` WHERE `status` = 'Approved'";
        $result = mysqli_query($db_connect, $query);
        if($counter = mysqli_fetch_array($result)){

            echo $counter[0];
        }
        ?>
        </span>
       </span>
      
        </div>
        <div id='success'>
<?php
if(isset($_GET['approved']))
{
   
    echo "  
    <span class='alert alert-success text-center offset-10 p-3 position-absolute' id='deleteMsg' style='margin-top:0'>
    Cart approved!
    </span>
    ";
}
?>
</div>
<div id='delete'>
<?php
if(isset($_GET['deleted']))
{
   
    echo "  
    <span class='alert alert-success text-center offset-10 p-3 position-absolute' id='deleteMsg' style='margin-top:0'>
    Cart item deleted successfully
    </span>
    ";
}
?>
</div>

<script type="text/javascript">
var msg = document.getElementById("delete");
msg.onclick = setTimeout(function(){
  msg.style.visibility = "hidden";
  <?php
  if(isset($_GET['deleted']))
  {
      
      unset($_GET['deleted']);
  }
  ?>  
}, 3000)
</script>


<script type="text/javascript">
var message = document.getElementById("success");
message.onclick = setTimeout(function(){
  message.style.visibility = "hidden";
  <?php
  if(isset($_GET['approved']))
  {
      
      unset($_GET['approved']);
  }
  ?>  
    }, 3000)
    </script>
        </section>
        <hr>
     <?php 
    
    $query = "SELECT sa.*, ord.* FROM `sales`sa, `orders`ord WHERE sa.productName = ord.productName ";
    
    $result = mysqli_query($db_connect, $query);
    if($result == true)
    {
        while($row = mysqli_fetch_assoc($result)){
       $name = $row["productName"];
       $email = $row["order_user_email"];
       $phone = $row["order_phone"];
       $address = $row["order_address"];
       $quantity = $row["order_quantity"];
       $method = $row["order_method"];
       $image = $row["productImage"];
       $id = $row["order_id"];
   
    echo  "
    <div class='alert alert-warning shadow offset-0' style='width: 18rem'>Notice:  <span class='bi bi-check-circle-fill fs-5'>
    New Order added
    </span>
    </div>
    ";

        ?>
   
        <table class='table table-bordered p-0 table-condensed table-sm text-center table-responsive alert alert-secondary'>
            <thead>
            <th class='alert alert-secondary p-3 border-light border-2' style='border:'>Email / Phone</th> 
            <th class='alert alert-secondary p-3 border-light border-2' style='border:'>Address</th>
            <th class='alert alert-secondary p-3 border-light border-2' style='width:30rem'>Product name</th>
            <th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Image</th>  
            <th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Quantity</th>  
            <th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Acquire</th>  
            <th class='alert alert-secondary p-3 border-light border-2' style='width:17rem'>Payment status</th>  
            <th class='bg-dark p-3 text-warning border-light border-2' style=''>Action</th> 
            </thead>
            <tbody class=''>

            <td class='bg-light p-5 border-light border-2'>
            
             <?php echo $email ?>
             <br>
             <br>
            <?php echo $phone ?>
           
            </td>
           
            <td class='bg-light p-5 border-white border-2' style='height:20px'>
            <?php echo $address ?>
            </td>
            <td class='bg-light border-white p-5 border-white border-2' style='height:20px'>
            
            <?php echo $name ?>
            
            </td>
        
            <td class='bg-light p-5 border-white border-2' style='height:20px'>
            <?php echo "<img src= 'upload/$image' class='offset-0' style='width:100px; border-radius:3px'/>"?>
            </td>
            <td class='bg-light p-5 border-white border-2' style='height:20px'>
            <?php echo $quantity ?>
            </td>
            
            <td class='bg-light p-5 border-white border-2' style='height:20px'>

            <?php echo $method ?>
            
            </td>
            
            <td class='bg-light p-5 border-white border-2' style='height:20px'>
            <?php 
            
            if(empty($row['card_num']) && empty($row['expiry']) && empty($row['cvv']) && empty($row['bank_num']) && empty($row['pay_status']))
            {
                $p_s = "<span class='text-danger fw-bold'>Not paid</span>";
            }else{
                $p_s = "<span class='text-success fw-bold'>Paid</span>";
            }
        
           echo $p_s;
 
            ?>
            </td>
            
         

            <td class='p-4 border-white border-2' style='height:20px'>
            <?php 
            if(empty($row['status']))
            {
              echo "  
            <a href='admin-approve-carts.php?approveId=$id' class='btn btn-warning bi bi-hourglass fs-5'></a>
            ";
            }else{
                echo "  
                <a href='' class='btn btn-success bi bi-check-all fs-5'></a>
                "; 
            }
            ?>
            <br>
            <br>
            
            <a href='admin-delete-cart.php?deleteId=<?php echo $id ?>' class='btn btn-danger'>
            <span class="bi bi-trash-fill fs-6"></a>
            </td>
            
            
            </tbody>
            
            </table>
            <hr>
            
            <?php
        
          }
          }else{
        echo  "
        <div class='alert alert-warning shadow offset-0' style='width: 18rem'><b>Notice: </b>No Orders have been made</b>
        </div>
        ";
        }
    

        
    
         ?>

            <div class="container">
            <div class="row">
            <div class="modal fade" id="chats" role="dialog">
            <div class="container">
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header bg-dark">
            <p class="lead font-monospace text-warning">Chat Requests</p><span class="close btn btn-danger offset-2" data-bs-dismiss="modal">Close</span>
            </div>
            <div class="modal-body">

            <?php 

            $sql = "SELECT * FROM `chats`";
            $result = mysqli_query($db_connect, $sql);
            if($result) {

            while($row = mysqli_fetch_assoc($result)) {

            $chat_msg = $row['message'];
            $chat_id = $row['id'];
            $chat_email = $row['email'];
            $chat_date = $row['date'];
          
            
        

            echo "
            <span class='alert-light'><strong style='border-radius: 100px' class='bg-light p-1 text-black'>
            Chat</strong> from <b>$chat_email</b>
            <p class='bg-primary p-2 text-light'>
           
            &nbsp; $chat_msg
            <p><b>Posted date:</b>  $chat_date </p>
            <form action='feedback.php' method='post'>
            <input type='hidden' name='id' value='$chat_id'class='form-control'>
            <input type='submit' name='reply' value='Reply' class='btn btn-success offset-10' style='margin-top:-4rem'>
            </form>
            </p>


            </span>

            <br><br>

            ";
            }
            }else{
                echo "No result";
            }
            ?>

            </div>
            </div>
            </div>
            </div>
            </div>
            <div class="col-sm-1"></div>
            </div>
            </div>
            </div>
            </div>
                <!-- search item modal -->

                <div class="container">
                <div class="row">
                <div class="modal fade" id="search_items">
                <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <form action="admin-search-items.php" method="post" autocomplete="off">
                <div class="autocomplete" style="300px">
               <input type="text" class="form-control bg-transparent border-2"
                placeholder="Search Items" style="" id="search" name="search_items" autocomplete="off">
                <br>
               <input type="submit" class="btn btn-dark px-4" name="submit" id="submit">
                <span class="btn btn-danger btn-sm offset-7" data-bs-dismiss=modal>Exit</span>
                </div>
                </form>
                
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

                 <div class="container">
                <div class="row">
                <div class="modal fade" id="logout">
                <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <span class="bi bi-lock fs-3"></span>&nbsp; Ready to leave
                <span class="bi bi-x-circle-fill fs-3 btn" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-body">

                 You are about to logout of this session!
                This will close up the current page you're working on.. <br>
                <br>
                &nbsp;&nbsp;&nbsp;
                <a href="admin-logout.php" class="bi bi-check-circle-fill btn btn-success offset-4 w-25 fs-5"></a>
                
               
               
               
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

                

<script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>