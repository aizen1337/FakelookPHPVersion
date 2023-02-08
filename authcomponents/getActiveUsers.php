<?php
session_start();
include "database.php";
 $activity = mysqli_query($connection, "SELECT user_id,username,imageDir,user_active from users order by user_active DESC");
 $result = mysqli_fetch_all($activity, MYSQLI_ASSOC);
?>
    <?php
    foreach($result as $singleActiveUser) { 
        if ($singleActiveUser['user_id'] == $_SESSION['user_id']) {
            continue;
        }
        else {
        ?>
      
        <div class="nav-item m-2 ">
        <a class="text-decoration-none" href="index.php?chatUser=<?php echo $singleActiveUser['user_id']?>">
                <?php
                if($singleActiveUser['user_active'] == 1){
                ?>
                <div class="nav-link bg-dark">
                <h5 class="text-center display-6 text-light"><?php echo $singleActiveUser['username'];?></h5> <i class="fa-solid fa-circle useractive"></i>  
                <?php
                        if(!(empty($singleActiveUser['imageDir']))) 
                        {
                        ?>  
                        <img src="<?php echo $singleActiveUser['imageDir']?>" class="small-avatar" alt="..."> 
                        <?php 
                        }
                        ?>        
                        <p style="color: lime">Aktywny</p>
                     </div>
                     <?php
                }
                else {
                ?>  <div class="nav-link bg-dark"> <h5 class="text-center display-6 text-light"><?php echo $singleActiveUser['username'];?></h5> <i class="fa-solid fa-circle-xmark userinactive"></i>
                <?php
                        if(!(empty($singleActiveUser['imageDir']))) 
                        {
                        ?>  <img src="<?php echo $singleActiveUser['imageDir']?>" class="small-avatar" alt="..."> <?php
                        }
                        ?>
                        <p style="color: red">Nieaktywny</p>
                        </div>
                        <?php
                }
                ?>
        </a>
        </div>

    <?php
        }
    }
?>
