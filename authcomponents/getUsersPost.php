<?php 
include "database.php";
if(!isset($_SESSION["user_id"]) and isset($_GET['user_id'])) {
    header("location: login.php");
  }
$chosenUser = $_GET['user_id'];
$sql = "SELECT post_id, user_id, username, post_author,imageDir, post_content, post_added_date, post_image_dir, likes FROM posts, users where posts.post_author = users.user_id and users.user_id = $chosenUser order by post_added_date DESC";
$result = mysqli_query($connection,$sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($connection);
        foreach($posts as $post) {
        ?>
        <br>
       
        <div class="card bg-dark text-light">
        <a class="link" href='post.php?post_id=<?php echo $post['post_id']?>'>
        <div class="card-body">
           
            <h5 class="card-title text-light">
                
                <?php echo $post['post_content'];?>
            </h5>
            <p class="card-text"><small class="text-muted">Opublikowano <?php echo $post['post_added_date']?> 
                przez <?php 
            if ($_SESSION['username'] == $post['username']) {
                ?><b><a class="link" href="profilepage.php?user_id=<?php echo $_SESSION['user_id']?>">ciebie 
                <?php 
                if(!empty($post['imageDir'])) { ?>
                <img src="<?php echo $post['imageDir']?>" class="small-avatar" alt="avatar">
                </a></b>
                <?php
                }
            }
            else {
            ?> <b><a class="link" href="profilepage.php?user_id=<?php echo $post['user_id']?>"> <?php echo $post["username"]?></b> <?php
               if(!empty($post['imageDir'])) { ?>
              <img src="<?php echo $post['imageDir']?>" class="small-avatar" alt="avatar">
              </a></b>
              <?php
              }
            }
            ?></small></p>
                </a>
        </div>
        <div class="card-footer">
        <?php 
        if ($post['post_image_dir'] and $post['post_image_dir'] !== "img/posts/") {
          ?> <a class="link" href='post.php?post_id=<?php echo $post['post_id']?>'><img src="<?php echo $post['post_image_dir']?>" class="card-img-bottom" alt="post"> </a><?php
        }
        if ($_SESSION['username'] == $post['username']) {
                ?>  
            
                <a class="icon delete" href="postcomponents/deletePost.php?post_id=<?php echo $post['post_id']?>"><i class="fa-solid fa-trash"></i></a>
                <a class="icon edit" href="post.php?post_id=<?php echo $post['post_id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
            <?php
            }
            ?>
        </div>
        </div>
        <?php     
        }
?>