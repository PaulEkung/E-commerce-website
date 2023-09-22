<?php 
session_start();
require 'db_connection.php';
require 'checkUserLogin.php';
$ckeckConn = checkLoginConn($db_connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="10;url=user-logout.php"/> -->
    <title>index</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
     <!-- <script src="javaScript.js"></script> -->
<style type="text/css" media="all">
*{
    box-sizing:border-box;
}
 .autocomplete{
     position:relative;
     display:inline-block;
 }
 input[type="text"]{
     
     width:200%;
 }
    .autocomplete-items{
        position:absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        top: 100%;
        right: 0;
        left: 0;
    }
    .autocomplete-items div{
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover{
        background-color:#e9e9e9;

    }
    .autocomplete:active{
        background-color: dodgerblue !important;
        color:#ffffff;
    }

    .sidenav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 100;
    top: -2rem;
    left: 0;
    background: #fff;
    overflow-x: hidden;
    padding-top: 90px;
    transition: 0.1s;

    }


    .sidenav a{
        
    display: block;
    padding: 10px 8px 10px 10px;
    text-decoration: none;
    transition: 0.3s;
    color: black;
   
    text-transform: capitalize;


    }

    

    .sidenav .closebtn{
        position: relative;
        top: -1.5rem;
        right: 0;
        font-size: 30px;
        margin-left: 1rem;
        cursor: pointer;
    }

    .sidenav .dashboard{
        margin-top: -4.7rem;
        margin-left: 10rem;
    }

      #main{
        transition: margin-left .3s ease-in-out;
        overflow: hidden;
        width: 100%;
    }

        ::placeholder{
            color:#fff;
        }

        

        
        .footer-items a{
            text-decoration:none;
        }
        .footer-items a:hover{
            background: #fff;
            padding:1rem;
            color:black;
            /* transform: scale(1.2); */
            font-weight: 500;
            transition:0.2s;
        }

        .slideshow-container{
            max-width:1000px;
            margin:auto;
            position: relative;
        }
        .mySlides{
            display:none;
        }
        img{
            vertical-align: middle;
        }

        .prev, .next{
            cursor: pointer;
            position:absolute;
            top:50%;
            width:auto;
            margin-top:-22px;
            padding: 16px;
            color:black;
            font-weight: bold;
            font-size:18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        .next{
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover{
            background-color: rgba(0,0,0,0.8);
        }
        .text{
            position:absolute;
            padding: 8px 12px;
            bottom:8px;
            width:100%;
            text-align: center;
            font-size: 15px;
            color: black;
        }
        .numbertext{
            color: black;
            font-size: 12px;
            position:absolute;
            top:0;
            padding: 8px 12px;
        }
        .dot{
            cursor:pointer;
            height: 15px;
            width:15px;
            background-color: #bbb;
            display:inline-block;
            transition: background-color 0.6s ease;
            border-radius:50%;
            margin:0 2px;
        }
        .active, .dot:hover{
            background-color:#717171;
        }
        .fade{
            animation-name: fade;
            animation-duration: 1.5s;

        }
        @keyframes fade{
            from{opacity: .5}
            to{opacity: 1}
        }
        @media only screen and (max-width:300px){
            .prev, .next, .text{
                font-size:11px;
            }
        }

        

        </style>
        </head>

        <script type="text/javascript">
            function openNav(){
                document.getElementById("mySidenav").style.width ="370px";
                // document.getElementById("mySidenav").style.background = "rgba(0,0,0,0.5)";
                document.getElementById("main").style.marginLeft ="50px";
                // document.getElementById("main").style.opacity ="0.1";
            }
            function closeNav(){
                document.getElementById("mySidenav").style.width ="0";
                document.getElementById("main").style.marginLeft ="0";
                // document.getElementById("main").style.opacity ="100";
            }
            </script>
        <a href="" id="top"></a>
        <body>

          <!-- <div class="container shadow">
                    <div class="row"> -->
                    <div class="container">

                    <div id="mySidenav" class="sidenav">

                    <div class="container p-0" style="margin-top:-4rem; background:orange">
                        <br>
                        <br>
                    <a href="javascript:void(0)" class="closebtn text-light offset-3" onclick="closeNav()">&times;</a>
                     <span class=" lead fw-semibold dashboard position-absolute offset-0 bi bi-person-circle fs-2 text-black"> Dashboard</span>                    

                    </div>
                    <br>
                    <ul>
                    <li>
                    <a href="chats.php">
                    <span class="bi bi-chat-text-fill text-black fs-3"></span> &nbsp; Chat with our agents</a>
                    </li>
                    <hr>
                    <li>
                    <a href="contact.php">
                    <span class="bi bi-envelope-fill text-black fs-3"></span> &nbsp; Contact us
                    <!-- <span class="badge position-absolute mb-5"> -->

                 
                    </span>
                    </a>
                    </li>
                    <hr>
                    <li>
                    <a href="myCarts.php">
                    <span class="bi bi-cart4 text-dark fs-3"></span>&nbsp; my carts 
                  
                   </a>
                    </li>
                    <hr>
                   
                    <li>
                    <a href="#rate" data-bs-toggle="modal">
                    <span class="bi bi-star-fill text-dark fs-3"></span> &nbsp; Rate us</a>
                    </li>
                    <hr>
                    <li>
                    <a href="#changePass" data-bs-toggle="modal">
                    <span class="bi bi-wrench  text-dark fs-3"></span> &nbsp;Account settings</a>
                    </li>
                    <hr>
                    <li>
                    <a href="#logout" data-bs-toggle="modal"
                    class=" ">
                    <span class="bi bi-lock-fill text-dark fs-3" data-bs-target="#logout" data-bs-toggle="modal"></span>  &nbsp; logout
                    </a>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <!-- </div>
                    </div> -->
        <div id="main">


        
        <nav class="p-2  bg-secondary" style="">
        <div class="nav-item text-capitalize">
        <span class="bg-secondary text-light" style='padding:1.5rem'>
        <?php 
        if(isset($_SESSION['session_name'])){
            $name = $_SESSION['session_name'];
            echo "Hello! " ."<b>" . $name . ","  . "</b>" . " Start shopping with your " . "<b>" . get_current_user(). "</b>" ." device";
        }
        ?>
        </span>
            
            <a href="index.php" class="nav-item  offset-1 text-decoration-none text-light bi bi-house-door-fill fs-3"></a>
            
          
            <a href="#questions" class="nav-item text-light offset-1 text-decoration-none bi bi-question-circle-fill fs-3"></a>
        
            <a href="" class="nav-item text-light offset-1 text-decoration-none bi bi-book-half fs-3"></a>
            
            <a href="#search_items" data-bs-toggle="modal" class=" btn offset-2 text-decoration-none bi bi-search text-light fs-3"></a>
          
            <a href="#" class="text-light offset-1 bi bi-list fs-1" onclick="openNav()"></a>
                
                        
                        
         </div>

              </nav>
             

             
           
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
                <form action="searched_items.php" method="post" autocomplete="off">
                <div class="autocomplete" style="300px">
               <input type="text" class="form-control bg-transparent border-2"
                placeholder="Search Items" style="" id="search" name="search_items" autocomplete="off">
                <br>
               <input type="submit" class="btn btn-dark px-4" name="submit" id="submit">
                </div>
                <span class="btn btn-danger btn-sm offset-4" data-bs-dismiss=modal>Exit</span>
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

                <!-- logout modal -->

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

                Dear <?php echo $_SESSION['session_name'] ?>, you are about to logout of this session! <br>
                This will close up the current page you're working on.. <br>
                <br>
                &nbsp;&nbsp;&nbsp;
                <a href="user-logout.php" class="bi bi-check-circle-fill btn btn-success offset-4 w-25 fs-5"></a>
                
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
                <div class="modal fade" id="rate">
                <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <span class="bi bi-stars fs-3"></span>&nbsp; Rate us now!
                <span class="bi bi-x-circle-fill fs-3 btn" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-body">

                <span class="bi bi-star-fill fs-2 offset-3" onclick="changeColor(this)" style="color:black;cursor:pointer" id="star1"></span>
                <span class="bi bi-star-fill fs-2 offset-1"  onclick="changeColor(this)" style="color:black;cursor:pointer" id="star2"></span>
                <span class="bi bi-star-fill fs-2 offset-1"  onclick="changeColor(this)" style="color:black;cursor:pointer" id="star3"></span>
                <span class="bi bi-star-fill fs-2 offset-1"  onclick="changeColor(this)" style="color:black;cursor:pointer" id="star4"></span>
                <br>
                <br>
                
                <script>
            function changeColor(element)
        {
            var currentColor = element.style.color;
            if(currentColor == "black"){
                element.style.color = "orange";
            }else{
                element.style.color = "black"
            }
        }
    
                </script>
                
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php?rating=success" class="btn btn-success offset-4 w-25 fs-5">Rate</a>
                
               <?php 
               if(isset($_GET['rating']))
               {
                   $alert = $_GET['rating'];
                   if($alert == 'success')
                   {
                       echo "<script type='text/javascript'>window.alert('Your rating has successfully been sent. Thanks for your support')</script>";
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
    
                <section class=" video p-0">
                <video src="images/ecom.mp4" autoplay loop muted plays-inline class="25" style="width:23.5rem">

                </video>
                <video src="images/ecom3.mp4" autoplay loop muted plays-inline class="25" style="width:23.3rem">

                </video>
                <video src="images/ecom4.mp4" autoplay loop muted plays-inline class="25" style="width:23.3rem">

                </video>
                <video src="images/ecom6.mp4" autoplay loop muted plays-inline class="25" style="width:23.5rem">

                </video>
                </section>
                <br>

                <section id="instructor" class="p-3 bg-secondary" style="background:orange">
                    <!-- <a href="welcomePage.php" class="btn btn-primary">Home</a> -->
                    
        <h2 class="text-center text-white">
            Recommended Items For you!
        </h2>
        <p class="lead text-center text-white mb-4">
            Lots and lots of suprises for you.
            <span class="glyphicon glyphicon-user"></span>
        </p>
        <div class="row g-3 flex-row">
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
            class="rounded-circle mb-3" alt=""> -->
            <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Sizo'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $image1 = $row['productImage'];
                    $price = $row['price'];
                    $id = $row['id'];

                echo  "<img src='upload/$image1' class='rounded-circle' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
           
            <p class="card-text">
                
            </p>
            
            <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Bounce'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image2 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image2' class='rounded-circle' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                
            </p>
            <!-- <a href="images/Bounce.jpg" class="btn btn-dark btn-sm text-light mx-1">view Item</a> -->
            <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                            YOU CAN ALSO USE "WOMEN"(portraits/women/13.jpg)
                        class="rounded-circle mb-3" alt=""> -->
                        <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Tennis'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image3 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image3' class='rounded-circle' alt='' style='width:9rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
           
            <p class="card-text">
                
            </p>
            <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                            YOU CAN ALSO USE "WOMEN"(portraits/women/13.jpg)
                        class="rounded-circle mb-3" alt=""> -->
                        <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Hot Tennis'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image4 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image4' class='rounded-circle' alt='' style='width:11rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
          
            <p class="card-text">
                
            </p>
            <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                            class="rounded-circle mb-3" alt=""> -->
                  <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Zuzuki'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image5 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image5' class='rounded-circle' alt='' style='width:6.2rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
               
                <p class="card-text">
                    
                </p>
                <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                        </div>
                    </div>
                </div>

            <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                            class="rounded-circle mb-3" alt=""> -->
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Zach Drop'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image6 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image6' class='rounded-circle w-50' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
               
                <p class="card-text">
                
                </p>
                <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                                class="rounded-circle mb-3" alt=""> -->

                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Snow Breaker'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image7 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image7' class='rounded-circle w-50' alt='' style=''>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
            
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                                class="rounded-circle mb-3" alt=""> -->
                  <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Sputon'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image8 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image8' class='rounded-circle' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                                class="rounded-circle mb-3" alt=""> -->
                  <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Versage'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image9 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image9' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                                class="rounded-circle mb-3" alt=""> -->
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Palmper'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image10 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image10' class='rounded-circle' alt='' style='width:8.8rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>

                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                                class="rounded-circle mb-3" alt=""> -->
                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Ladies Walk'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image11 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image11' class='rounded-circle' alt='' style='width:7.7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                  
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Crusher'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image12 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image12' class='rounded-circle' alt='' style='width:5.9rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                                
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                    
                    <!-- <span class="offset-0 text-light lead">Make Oders For <b class="fs-4">Wrist Watch</b></span> -->
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Double Gold'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image13 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image13' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                               
                  
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Hang Over'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image14 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image14' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                                
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Old School'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image15 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image15' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                                
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                    

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Street Dancer'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image16 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image16' class='rounded-circle' alt='' style='width:7.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                                
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
                 <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'B-D-A'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image17 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image17' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                               
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'G-Shirts'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image18 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image18' class='rounded-circle' alt='' style='width:7.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                               
                
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'F-W-L'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image19 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image19' class='rounded-circle' alt='' style='width:4.7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                                
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Jew Bag'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image20 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image20' class='rounded-circle' alt='' style='width:7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                               
                   
                    <p class="card-text">
                    
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>
                    
                            </div>
                        </div>
                    </div>
                    

                    
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Red Hover'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image21 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image21' class='rounded-circle' alt='' style='width:6.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                             
                  
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Shufflers'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image22 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image22' class='rounded-circle' alt='' style='width:6.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                             
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Ladies Blag'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image23 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image23' class='rounded-circle' alt='' style='width:6.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                               
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Ladies Brown'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image24 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image24' class='rounded-circle' alt='' style='width:6.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                              
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Red Women'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image25 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image25' class='rounded-circle' alt='' style='width:6.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                            
                              
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                 <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'iphone 12 Pro Max'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image26 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image26' class='rounded-circle' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                 
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">

                <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Mens Budd'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image27 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image27' class='rounded-circle' alt='' style='width:8.7rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                              
                   
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>

                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                            <?php
                $query = "SELECT * FROM `sales` WHERE productName = 'Slimix'";
                $result = mysqli_query($db_connect, $query);
                if($result){

                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $image28 = $row['productImage'];
                    $price = $row['price'];

                echo  "<img src='upload/$image28' class='rounded-circle' alt='' style='width:8.5rem'>";
                    
                echo "<h6 class='card-title mb-3'>$ $price </h6>";
                }
                ?>
                              
                    
                    <p class="card-text">
                        
                    </p>
                    <form action="carts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
            </form>


                            </div>
                        </div>
                    </div>
              
                    </section>
                    <br>



                    <br>
                        <div class="container bg-dark w-100 text-light p-3 text-center fw-bold lead">
                      <span class="bi bi-cart4 text-light fs-3"></span>  Pick up some top items  <span class="bi bi-cart4 text-light fs-3"></span> 
                        </div>
                    <section id="learn" class="p-5">
                      <div class="container">
                   <div class="row  justify-content-between">
                       <div class="col-md">
                           <span class="position-absolute
                            bg-primary rounded-circle p-4 offset-3 fw-bold fs-3 text-light" style="margin-top:6rem;">hp</span>
                            <?php
                            $query = "SELECT * FROM `sales` WHERE productName = 'ELITEBOOK 8460P'";
                            $result = mysqli_query($db_connect, $query);
                            if($result){

                                $row = mysqli_fetch_assoc($result);
                                $image = $row['productImage'];
                                $id = $row['id'];

                              echo  "<img src='upload/$image' class='image-fluid w-100 mb-5' alt=''>";
                            }
                            ?>
                           <!-- <img src="images/system4.png" class="image-fluid w-100 mb-5" alt=""> -->
                       </div>
                       <div class="col-md">
                       <span class="position-absolute
                        rounded-circle p-5 offset-3 fw-bold fs-3 text-light" style="margin-top:6rem;background:orange">
                        #120,000 <br>
                        <i class="lead">23% off</i>
                        </span>
                           <h2>ELITEBOOK 8460P</h2>
                           <p class="lead">
                               <b>
                              INTEL CORE I5 2.5GHZ <br>
                              1GB AMD RADEON HD <br>
                              14 INCH HD DISPLAY 500 GB HDD 4GB RAM 
                               </b>
                           </p>

                            <br>
                          <br>
                          <br>
                          <br>
                          <form action="carts.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
                        </form>
                           
                       </div>
                   </div>
               </div>
               <div class="container">
                   <div class="row  justify-content-between">
                       <div class="col-md">
                           <span class="position-absolute
                            bg-primary rounded-circle p-4 offset-3 fw-bold fs-3 text-light" 
                            style="margin-top:6rem;">SAMSUNG</span>
                            <?php
                            $query = "SELECT * FROM `sales` WHERE productName = 'SAMSUNG ELITE MARK R70'";
                            $result = mysqli_query($db_connect, $query);
                            if($result){

                                $row = mysqli_fetch_assoc($result);
                                $image = $row['productImage'];
                                $id = $row['id'];

                              echo  "<img src='upload/$image' class='image-fluid w-100 mb-5' alt=''>";
                            }
                            ?>
                           <!-- <img src="images/system2.jpg" class="image-fluid w-100 mb-5" alt=""> -->
                       </div>
                       <div class="col-md">
                       <span class="position-absolute
                        rounded-circle p-5 offset-3 fw-bold bg-danger fs-3 text-light" style="margin-top:6rem;background:orange">
                        #250,000 <br>
                        <i class="lead">27% off</i>
                        </span>
                           <h2>SAMSUNG ELITE MARK R70</h2>
                           <p class="lead">
                               <b>
                              INTEL CORE I5 2.5GHZ <br>
                              2GB AMD RADEON HD <br>
                              14 INCH HD DISPLAY 500 GB HDD 8GB RAM 
                               </b>
                           </p>

                          <br>
                          <br>
                          <br>
                          <br>
                          <form action="carts.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
                            </form>
                            
                       </div>
                   </div>
               </div>
               <div class="container">
                   <div class="row  justify-content-between">
                       <div class="col-md">
                           <span class="position-absolute
                            bg-danger rounded-circle p-4 offset-3 fw-bold fs-3 text-light" 
                            style="margin-top:6rem;">hp</span>
                            <?php
                            $query = "SELECT * FROM `sales` WHERE productName = 'SENS R70'";
                            $result = mysqli_query($db_connect, $query);
                            if($result){

                                $row = mysqli_fetch_assoc($result);
                                $image = $row['productImage'];
                                $id = $row['id'];

                              echo  "<img src='upload/$image' class='image-fluid w-100 mb-5' alt=''>";
                            }
                            ?>
                       </div>
                       <div class="col-md">
                       <span class="position-absolute
                        rounded-circle p-5 offset-3 fw-bold bg-dark fs-3 text-light" style="margin-top:6rem;background:orange">
                        #150,000 <br>
                        <i class="lead">27% off</i>
                        </span>
                           <h2>SENS R70</h2>
                           <p class="lead">
                               <b>
                              INTEL CORE I5 2.5GHZ <br>
                              2GB AMD RADEON HD <br>
                              14 INCH HD DISPLAY 500 GB HDD 8GB RAM 
                               </b>
                           </p>

                            <br>
                          <br>
                          <br>
                          <br>
                          <form action="carts.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
                            </form> 
                               
                            
                       </div>
                   </div>
               </div>
               <div class="container">
                   <div class="row justify-content-between">
                       <div class="col-md">
                           <span class="position-absolute
                            bg-primary rounded-circle p-4 offset-3 fw-bold fs-3 text-light" 
                            style="margin-top:6rem;">iphone</span>
                            <?php
                            $query = "SELECT * FROM `sales` WHERE productName = 'iphone 13 Pro Max'";
                            $result = mysqli_query($db_connect, $query);
                            if($result){

                                $row = mysqli_fetch_assoc($result);
                                $image = $row['productImage'];
                                $id = $row['id'];

                              echo  "<img src='upload/$image' class='image-fluid w-75 mb-5 rounded-circle' alt=''>";
                            }
                            ?>
                           <!-- <img src="images/29.jpg" class="image-fluid w-75 mb-5 rounded-circle" alt=""> -->
                       </div>
                       
                       <div class="col-md">
                       <span class="position-absolute
                        rounded-circle p-5 offset-3 fw-bold bg-danger fs-3 text-light" style="margin-top:6rem;background:orange">
                        #300,000 <br>
                        <i class="lead">27% off</i>
                        </span>
                           <h2>iphone 13 Pro Max</h2>
                           <p class="lead">
                               <b>
                             
                               </b>
                           </p>

                            <br>
                          <br>
                          <br>
                          <br>
                          <form action="carts.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
                            </form>
                               
                            
                       </div>
                   </div>
               </div>
               <br>
               <div class="container">
                   <div class="row justify-content-between">
                       <div class="col-md">
                           <span class="position-absolute
                            bg-primary rounded-circle p-4 offset-3 fw-bold fs-3 text-light" 
                            style="margin-top:6rem;">Galaxy S14</span>
                            <?php
                            $query = "SELECT * FROM `sales` WHERE productName = 'Samsung Galaxy s14'";
                            $result = mysqli_query($db_connect, $query);
                            if($result){

                                $row = mysqli_fetch_assoc($result);
                                $image = $row['productImage'];
                                $id = $row['id'];

                              echo  "<img src='upload/$image' class='image-fluid w-75 mb-5 rounded-circle' alt=''>";
                            }
                            ?>
                           <!-- <img src="images/29.jpg" class="image-fluid w-75 mb-5 rounded-circle" alt=""> -->
                       </div>

                       <div class="col-md">
                       <span class="position-absolute
                        rounded-circle p-5 offset-3 fw-bold bg-secondary fs-3 text-light" style="margin-top:6rem;background:orange">
                        #300,000 <br>
                        <i class="lead">37% off</i>
                        </span>
                           <h2>Samsung Galaxy S14</h2>
                           <p class="lead">
                               <b>
                             
                               </b>
                           </p>

                            <br>
                          <br>
                          <br>
                          <br>
                          <form action="carts.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" class="btn btn-primary text-light mx-5" style="margin-top:0rem" value="Place Order">
                            </form> 
                               
                               
                        
                       </div>
                   </div>
               </div>
              
           </section>
           
           <!-- <section class="bg-secondary p-5">
        
           <div class="slideshow-container p-0">
           <div class="fade mySlides">
           <div class="numbertext">1 / 3</div>
           <img src="images/oil-1.jpg" alt="" style="width:50%">
        
           <div class="text text-light">
           Caption Text
           </div>
           </div>

           <div class="mySlides fade">
           <div class="numbertext">
           2 / 3
           </div>
           <img src="images/oil-2.jpg" alt="" style="width:50%">
           <div class="text">
           Caption Two
           </div>
           </div>

           <div class="mySlides fade">
           <div class="numbertext">
           3 / 3
           </div>
           <img src="images/oil-3.jpg" alt="" style="width:50%">
           <div class="text">
           Caption Three
           </div>
           </div>

           <a  class="prev" onclick="plusSlides(-1)">&#10094;</a>
           <a class="next" onclick="plusSlides(1)">&#10095;</a>
           </div>
    <br>
           <div style="text-align:center">
           <span class="dot" onclick="currentSlide(1)"></span>
           <span class="dot" onclick="currentSlide(2)"></span>
           <span class="dot" onclick="currentSlide(3)"></span>
           
           </div>

           </section> -->

                    <br>
                    <section class="">
                    <div class="container"  style="display:flex">
                    <?php
                    $query = "SELECT * FROM `sales` WHERE productName = 'Mantra'";
                    $result = mysqli_query($db_connect, $query);
                    if($result){

                        $row = mysqli_fetch_assoc($result);
                        $image = $row['productImage'];
                        $id = $row['id'];

                        echo  "<img src='upload/$image' style='width: 9rem' class='' alt=''>";
                        echo "
                        <form action='carts.php' method='post' class='flex-row'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='submit' class='btn btn-primary text-light mx-0' style='margin-top:0rem' value='Place Order'>
                        </form>
                        ";
                    
                    }
                    ?>
                   &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $query = "SELECT * FROM `sales` WHERE productName = 'Golden Penny'";
                    $result = mysqli_query($db_connect, $query);
                    if($result){

                        $row = mysqli_fetch_assoc($result);
                        $image = $row['productImage'];
                        $id = $row['id'];

                        echo  "<img src='upload/$image' style='width: 10rem' class='' alt=''>";
                        echo "
                        <form action='carts.php' method='post' class='flex-row'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='submit' class='btn btn-primary text-light mx-0' style='margin-top:0rem' value='Place Order'>
                        </form>
                        ";
                    }
                    ?>
                  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $query = "SELECT * FROM `sales` WHERE productName = 'Nadim'";
                    $result = mysqli_query($db_connect, $query);
                    if($result){

                        $row = mysqli_fetch_assoc($result);
                        $image = $row['productImage'];
                        $id = $row['id'];

                        echo  "<img src='upload/$image' style='width: 10rem' class='' alt=''>";
                        echo "
                        <form action='carts.php' method='post' class='flex-row'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='submit' class='btn btn-primary text-light mx-0' style='margin-top:0rem' value='Place Order'>
                        </form>
                        ";
                    }
                    ?>
                   
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $query = "SELECT * FROM `sales` WHERE productName = 'Kings'";
                    $result = mysqli_query($db_connect, $query);
                    if($result){

                        $row = mysqli_fetch_assoc($result);
                        $image = $row['productImage'];
                        $id = $row['id'];

                        echo  "<img src='upload/$image' style='width: 10rem' class='' alt=''>";

                        echo "
                        <form action='carts.php' method='post'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='submit' class='btn btn-primary text-light mx-0' style='margin-top:0rem' value='Place Order'>
                        </form>
                        ";
                    }
                    ?>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $query = "SELECT * FROM `sales` WHERE productName = 'Mantra-small'";
                    $result = mysqli_query($db_connect, $query);
                    if($result){

                        $row = mysqli_fetch_assoc($result);
                        $image = $row['productImage'];
                        $id = $row['id'];

                        echo  "<img src='upload/$image' style='width: 10rem' class='' alt=''>";
                        
                        echo "
                        <form action='carts.php' method='post'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='submit' class='btn btn-primary text-light mx-0' style='margin-top:0rem' value='Place Order'>
                        </form>
                        ";
                    }
                    ?>
                 
                    </div>
                    
                    </div>
                    </section>
                    <br>
                    
                    <section id="questions" class="p-5">
                <!-- <div class="container"> -->
                <h2 class="text-center mb-4">Frequently Asked Questions</h2>
               
                <div class="accordion accordion-flush" id="questions">
                <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#question-two"
                            aria-expanded="false"
                            aria-controls="flush-collapseTwo" >
                            
                            <h3 class="lead"><b>How sure am I for fast and and save delivery of an odered item?</b></h3>
                            
                            </button>

                            </h2>

                <div id="question-two" class="accordion-collapse collapse"
                aria-labelledby="flush-headingTwo"
                data-bs-parent="#questions">
                <div class="accordion-body">
                A room or Selve contain is 70,000 naira only. However, 65,000 normal payment fee and 5000 for caution fee. <br>
                Note that the caution fee is refundable only when you exit from the lodge without damaging any of the lodge property.
                </div>

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
                                
                                <h3 class="lead"><b>Do you collect payments instalmentally?</b></h3>
                                
                                </button>

                                </h2>

                <div id="question-three" class="accordion-collapse collapse"
                aria-labelledby="flush-headingThree"
                data-bs-parent="#questions">
                <div class="accordion-body">
                We do not release our products to customers without complete payment on the Jumia platform.
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
                                    
                                    <h3 class="lead"><b>How do I make an oder for items?</b></h3>
                                    
                                    </button>

                                    </h2>

                    <div id="question-four" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-bs-parent="#questions">
                    <div class="accordion-body">
                    Kindly click the BOOK NOW button above to register an apply for accomodation. 
                        </div>

                    </div>

                    </div>


                </div>
                    
                </div>
                <!-- </div> -->
                <br>

                </section>
                <br>
                <br>
                </div>
                <footer class="p-2  bg-dark">
                <div class="container text-light">
                <h3 class="text-center font-monospace">Follow us on :</h3>
                <br>
                <br>
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                    <span class="bi bi-facebook fs-1 offset-1"></span>
                
                    <span class="bi bi-twitter fs-1 offset-1"></span>
                    <span class="bi bi-linkedin fs-1 offset-1"></span>
                    <span class="bi bi-instagram fs-1 offset-1"></span>
                    <span class="bi bi-youtube fs-1 offset-1"></span>
                    <span class="bi bi-telegram fs-1 offset-1"></span>
                    <span class="bi bi-whatsapp fs-1 offset-1"></span>
                <hr class="fw-bold fs-3" style="font-weight:700px">
                </div>
                <br>
                <br>
                <div class="footer-items w-100 p-2">
                <div class="container">
                <h3 class="text-center font-monospace text-light">More for you</h3>
                <br>
                <br>
                <a href="" style="color:orange" class="offset-2">
                  <!-- <span class="bi bi-telephone-outbound-fill text-light fs-4"></span> -->
                   Jumia Express </a> 
                <a href="" style="color:orange" class="offset-1">
                <!-- <span class="bi bi-newspaper text-light fs-4"></span> -->
                 Feed</a>
                <a href="" style="color:orange" class="offset-1">
                  <!-- <span class="bi bi-airplane-engines-fill text-light fs-4"></span>  -->
                  Fast Shipping </a>
                <a href="" style="color:orange" class="offset-1"> Brands On Jumia </a>

                <a href="" style="color:orange" class="offset-1"> 
               <!-- <span class="bi bi-telephone-outbound-fill text-light fs-4"></span> -->
                Call Us Now 
                </a>

                    <hr style="color:white">
                </div>
                <br>
            
                <a href="#top" style="" class="offset-6 text-light fs-2 bi bi-arrow-up-circle-fill"></a>
                </div>
                </footer>
                <script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
                </body>
                </html>