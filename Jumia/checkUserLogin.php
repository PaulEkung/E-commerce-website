<?php
require 'db_connection.php';
function checkLoginConn(){
if(!isset($_SESSION["session_User_id"])){
    header("Location:login.php");
    exit();
}
}