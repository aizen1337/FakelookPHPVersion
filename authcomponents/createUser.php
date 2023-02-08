<?php
function createUser($conn,$username,$password) {
    $sql = "INSERT INTO users(username,password) VALUES (?,?)";
    $statement = mysqli_stmt_init($conn);
    $hashedPassword = password_hash($username, PASSWORD_DEFAULT);
    if (!mysqli_stmt_prepare($statement,$sql)) {
        header("location: ../signup.php");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $username,$hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../index.php");
    exit();
}