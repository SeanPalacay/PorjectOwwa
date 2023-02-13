<?php

session_start();

// Destroy the user's session
session_destroy();

// Redirect the user to the login page
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}


?>