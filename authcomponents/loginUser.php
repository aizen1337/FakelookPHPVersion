<?php
require_once 'database.php';
require_once 'userExists.php';
function loginUser($connection, $username, $password) {
    $usernameExists = userExists($connection,$username);
    if($usernameExists === false) {
        header("location: ../login.php");
        exit();
    }
    $hashedPassword = $usernameExists['password'];
    $checkPassword = password_verify($password,$hashedPassword);
    if($checkPassword === false ) {
        header("location: ../login.php");
        exit();
    }
    else {
        session_start();
        $_SESSION["user_id"] = $usernameExists["user_id"];
        $_SESSION["username"] = $usernameExists["username"];
        $_SESSION["imageDir"] = $usernameExists["imageDir"];
        $currentUser = $_SESSION['user_id'];
        mysqli_query($connection, "UPDATE users set user_active = 1 where user_id = $currentUser");
        header("location: ../index.php");
        exit();
    }
}
?>