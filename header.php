<?php
session_start();
require 'dbconnect.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="css/stylesheet.css" type="text/css">