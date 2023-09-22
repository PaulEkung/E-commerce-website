<?php
// require 'db_connection.php';
session_start();
session_unset();
session_destroy();
header("Location: admin-login.php");

