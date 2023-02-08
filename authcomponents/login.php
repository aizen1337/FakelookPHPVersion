<?php 
if(isset($_POST['submit'])) {
    $userUsername = $_POST['username'];
    $userPassword = $_POST['password'];
    require_once "database.php";
    require_once "loginUser.php";
    loginUser($connection,$userUsername,$userPassword);
    exit();
}