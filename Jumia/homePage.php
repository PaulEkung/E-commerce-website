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
                    <style type="text/css" media="all">
                    *{
                        margin:0;
                        padding:0;
                        box-sizing:border-box;

                    }

                    body{
                        overflow:hidden;
                    }

                    section{
                        height: 100vh;
                        width:100%;
                        background-image: linear-gradient(rgba(12,3,51,0.9), rgba(12,3,51,0.8));
                        padding:0.5%;
                        position:relative;
                        display:inline-block;
                        justify-content:center;
                        align-items:center;
                    }
                    .back-video{
                        position:absolute;
                        right:0;
                        bottom:0;
                        z-index:-1;
                        height:100vh;

                    }
                    @media(min-aspect-ratio: 16/9){
                        .back-video{
                            width:100%;
                            height:auto;
                        }
                    }

                    @media(max-aspect-ratio: 16/9){
                        .back-video{
                            width:auto;
                            height:100%;
                        }
                    }

                    .h1:hover{
                        -webkit-text-stroke: 2px #fff;
                        color: transparent;
                        transition:0.5s;
                    }

                    p{
                        display:inline-block;
                        overflow:hidden;
                        white-space: nowrap;
                    }

                    /* p:first-of-type{

                        animation: appear 6s infinite;
                    }
                    */
                    p:last-of-type{

                        animation: reveal 6s infinite;
                    }
                    p:last-of-type span{
                        animation: slide 6s infinite;

                    }
                    /* @keyframes appear{
                        0%{opacity: 0;}
                        20%{opacity: 1;}
                        80%{opacity: 1;}
                        100%{opacity: 0;}
                    } */
                    
                    @keyframes slide{
                        0%{margin-left: -800px;}
                        20%{margin-left: -800px;}
                        80%{margin-left: 0px;}
                        100%{margin-left: 0px;}
                    }
                    @keyframes reveal{
                        0%{opacity: 0; width: 0px;}
                        20%{opacity: 1; width: 0px;}
                        30%{width: 665px;}
                        80%{opacity: 1;}
                        100%{opacity: 0; width: 665px}
                    }
                    
                    </style>
                </head>
                <body>
                <section class="text-light">
                <nav class="navbar navbar-expand-lg fixed-top p-0" style="background:orange">
                <div class="nav-image">
                    
                <img src="images/shop1.png" class="" style="width:150px" alt=""> 
                </div>
                <span class="text-light fs-4 fw-bold">JUMIA</span>
                <div class="nav-items offset-7">
              
                <span class="text-decoration-none text-light fs-3">Sign up now to purchase your products</span>
                </div>
                </nav>
                <video src="images/ecom2.mp4" autoplay loop muted plays-inline type="video/mp4" class="back-video ">

                </video>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="p-5 text-warning fs-1 fw-bold offset-2 lead text-transparent " style="font-size:0rem">WELCOME TO JUMIA ONLINE SHOPPING  
                SERVICES
                <p class="text-light fs-2 lead offset-6">Fastest Delevery Of Products </p> 
                </div>
                <!-- <br> -->
                <!-- <p>
                <span>
                gdgdgdggdgdggdddddddddd
                </span>
                </p> -->
                <p class="text-light offset-2 lead">&nbsp;&nbsp;&nbsp; We Offer The Best Products At Affordable
                <br> &nbsp;&nbsp;&nbsp; Prices And Deliver At Your Door Post</p>
                <br>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="register.php" class="btn btn-outline-warning offset-2 w-25">Click To Make Your Orders</a>
                <footer class="footer fixed-bottom p-5 bg-dark">
                &copy; 2022 jumia platform enterprise
                </footer>
                </section>

                <!-- <div class="container">
                <div class="row">
                <div class="modal fade" id="proceed" role="dialog">
                <div class="container">
                <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                <br>
                <br>
                <br>
                <div class="modal-dialog">
                <div class="modal-content bg-transparent">
                <div class="modal-body">

                <a href="" class="btn btn-secondary w-25 offset-3">Sign In</a>
                <a href="register.php" class="btn btn-primary w-25 offset-1">Sign Up</a>
                <br>
                <br>
                <br>
                &nbsp;&nbsp;
                <span class="btn btn-close-white btn-close text-light offset-6 fw-bold" data-bs-dismiss="modal">&times;</span>

                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div> -->



                    <script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script> 
                    <script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>

                </body>
                </html>