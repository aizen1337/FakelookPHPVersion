<?php 
session_start();
include '../authcomponents/database.php';
if($_POST["chatbox"] and $_GET['chatUser']) {
    $message = $_POST['chatbox'];
    $receiver = $_GET['chatUser'];
    $currentUser = $_SESSION['user_id'];
    $chatMessages = mysqli_query($connection, "INSERT INTO messages(sender_id,receiver_id, message) VALUES('$currentUser','$receiver','$message')");
    if($chatMessages) {
        header("location: ../index.php?chatUser=$receiver");
    }
}