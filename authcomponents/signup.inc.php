<?php
if(isset($_POST["submit"])) {
    $userUsername = $_POST['username'];
    $userPassword = $_POST['password'];
    include "database.php";
    include "createUser.php";
    include "userExists.php";
    if(userExists($connection,$userUsername) == false) {
    createUser($connection,$userUsername,$userPassword);
    $_SESSION["user_id"] = $usernameExists["user_id"];
    $_SESSION["username"] = $usernameExists["username"];
    $_SESSION["imageDir"] = $usernameExists["imageDir"];
    $currentUser = $_SESSION['user_id'];
    mysqli_query($connection, "UPDATE users set user_active = 1 where user_id = $currentUser");
    header("location: ../index.php");
    }
}
else {
    header("location: ../signup.php");
    exit();
}
?>
