<?php 
include "./authcomponents/database.php";
if(!isset($_SESSION["user_id"])) {
    header("location: login.php");
  }
$sql = 'SELECT post_id, user_id, username, post_author,imageDir, post_content, post_added_date, post_image_dir, likes FROM posts, users where posts.post_author = users.user_id order by post_added_date DESC';
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
        ?>
        </div>
        <?php
        if ($_SESSION['username'] == $post['username']) {
                ?> 
          <div class="card-footer">
                <a class="icon delete" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa-solid fa-trash"></i></a>
                <a class="icon edit" href="post.php?post_id=<?php echo $post['post_id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
          </div>
                <div class="modal dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Czy napewno chcesz usunąć ten post?</h1>
                    <div class="modal-footer">
                        <a href="postcomponents/deletePost.php?post_id=<?php echo $post['post_id']?>" class ="icon delete">Usuń</a>
                    </div>
                  </div>
                </div>
            <?php
            }
            ?>
        </div>
      </div>
        <?php     
        }
?>
