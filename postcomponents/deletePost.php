<?php
  include "../authcomponents/database.php"; 
  session_start();
  if(!isset($_SESSION["user_id"])) {
      header("location: login.php");
    }
  $current_user = $_SESSION["user_id"];
  $id = $_GET['post_id'];
  $id = mysqli_real_escape_string($connection,$id);
  $sql = "DELETE FROM posts WHERE post_id = $id and post_author = '$current_user'";
  $result = mysqli_query($connection,$sql);
  header("location: ../index.php");
?>