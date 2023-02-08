<?php 
function userExists($connection,$username) {
    $sql = "select * from users where username = ?";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement,$sql)) {
        header("location: ../signup.php");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $resultData = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($statement);
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
}