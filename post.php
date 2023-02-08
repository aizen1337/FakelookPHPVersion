<?php 
session_start();
$id = $_GET['post_id'];
if(!isset($_SESSION["user_id"]) and !isset($id)) {
    header("location: login.php");
  }
include "./authcomponents/database.php"; 
$id = mysqli_real_escape_string($connection,$_GET['post_id']);
$sql = "SELECT * FROM posts WHERE post_id = $id";
$result = mysqli_query($connection,$sql);
$post = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php'; ?>
<body>
    <?php include 'components/navbar.php'?>
    <div class="flex-container">
          <?php if($post['post_author'] == $_SESSION['user_id']) { ?>
        <form method="POST" action="postcomponents/updatePost.php?post_id=<?php echo $post['post_id']?>" class="needs-validation" enctype="multipart/form-data">
                <?php
                if($post['post_image_dir'] and $post['post_image_dir'] !== "img/posts/") {
                  ?>
                  <img src="<?php echo $post['post_image_dir']?>" class="card-img-bottom" alt="post">
                  <?php
                }
                ?>         
                <textarea class="form-control" id="exampleFormControlTextarea1" name="post" rows="3" placeholder="Napisz coś w poście" required><?php echo $post['post_content'] ?></textarea>
                <br>
                <label for="uploadFile" class="btn btn-secondary" >Dodaj zdjęcie <i class="fa-regular fa-image"></i></label>
                <input hidden type="file" id="uploadFile" name="uploadFile" value=<?php echo $post['post_image_dir'] ?> id="fileInput">
              <button type="submit" name="addPost" class="btn btn-secondary">Edytuj i opublikuj!</button>
              </form>
              <br>
              <form method="POST" action="postcomponents/deletePost.php?post_id=<?php echo $post['post_id']?>">
              <button type="submit" name="addPost" class="btn btn-secondary icon delete">Usuń! <i class="fa-solid fa-trash"></i></button>
              </form>
          <?php 
            }
            else {
              ?>
              <p class="text-light"><?php echo $post['post_content']?></p>
              <?php
              if($post['post_image_dir'] and $post['post_image_dir'] !== "img/posts/") {
                  ?>
                  <img src="<?php echo $post['post_image_dir']?>" class="post-image" alt="post">
                  <?php
                }
            }
            ?>
    </div>
</body>
</html>