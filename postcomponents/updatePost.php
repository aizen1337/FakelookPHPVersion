<?php
        session_start();
        if(!isset($_SESSION["user_id"])) {
            header("location: login.php");
          }
        include "../authcomponents/database.php"; 
        $id = $_GET['post_id'];
        $id = mysqli_real_escape_string($connection,$_GET['post_id']);
        $sql = "SELECT * FROM posts WHERE post_id = $id";
        $result = mysqli_query($connection,$sql);
        $post = mysqli_fetch_assoc($result);
        if ($post['post_author'] == $_SESSION['user_id'] and isset($_POST['post'])) {
            if (isset($_FILES['uploadFile']['name'])) {
            $post_image = $_FILES["uploadFile"]['name'];
            $tempname = $_FILES["uploadFile"]["tmp_name"];
            $folder = "../img/posts/". time() . $post_image;
            $destination = "img/posts/". time() . $post_image;
            }
            $post_content = $_POST['post'];
            $updateId = $_GET['post_id'];
            $sql = "UPDATE posts SET post_content = '$post_content', post_image_dir = '$destination', post_added_date = current_timestamp() WHERE post_id = $updateId";
            mysqli_query($connection,$sql);
            move_uploaded_file($tempname, $folder);
            header("location: ../index.php");
            }
        else {
            header("location: ../index.php");
        }
        mysqli_close($connection);
?>
