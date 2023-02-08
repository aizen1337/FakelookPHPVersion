<?php 
include "../authcomponents/database.php";
session_start();
if (isset($_POST['addPost'])) {
    $post = $_POST['post'];
    $currentUser = $_SESSION['user_id'];
    if(isset($_FILES)) {
        $filename = $_FILES["uploadFile"]["name"];
        $tempname = $_FILES["uploadFile"]["tmp_name"];
        $folder = "../img/posts/" . time() . $filename;
        $destination = "img/posts/". time(). $filename;
        $sql = "INSERT INTO posts(post_author,post_content,post_image_dir) VALUES ('$currentUser','$post','$destination');"; 
        move_uploaded_file($tempname, $folder);
    }
    else {
        $sql = "INSERT INTO posts(post_author,post_content,post_image_dir) VALUES ('$currentUser','$post','image/posts/');";
    }
    mysqli_query($connection, $sql);
    header("location: ../index.php");
}