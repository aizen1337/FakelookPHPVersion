<?php
include "database.php";
session_start();
$currentUser = $_SESSION['user_id'];
mysqli_query($connection, "UPDATE users set user_active = 0 where user_id = $currentUser");
session_unset();
session_destroy();
header("location: ../login.php");
exit();
?>