<?php 
include "./authcomponents/database.php"; 
session_start();
if(!isset($_SESSION["user_id"]) and !isset($id)) {
    header("location: login.php");
  }
$id = $_GET['user_id'];
$id = mysqli_real_escape_string($connection,$id);
$sql = "SELECT * FROM users WHERE user_id = $id";
$result = mysqli_query($connection,$sql);
$user = mysqli_fetch_assoc($result);
if(isset($_POST['upload']) and isset($_FILES["uploadfile"]['name']) and $user['user_id'] == $_SESSION['user_id']) {
    $currentUser = $_SESSION['user_id'];
    $post_image = $_FILES["uploadfile"]['name'];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "img/avatar/". time() . $post_image;
    $destination = "img/avatar/". time() . $post_image;
    $sql = "UPDATE users SET imageDir = '$destination' WHERE user_id = $currentUser";
    mysqli_query($connection,$sql);
    move_uploaded_file($tempname, $folder);
  }
?>
<html lang="en">
  <?php include 'components/head.php'?>
<body>
    <?php include 'components/navbar.php' ?>
    <div class="profile">
    <div class="left">
    <div class="flex-container">
             <h1 class="text-light"><?php echo $user['username']?></h1>
             <?php
                if ($user['imageDir'] !== null and !empty($user['imageDir'])) {
                    ?>
                    <label for="fileInput"><img class="avatar" src="<?php echo $user['imageDir']?>"/></label>;
                    <?php 
                }
                else { 
                    ?>
                    <label for="fileInput"><img class="avatar" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=2000"/></label>
                    <?php
                }
            ?>
            <?php
            if($user['user_id'] == $_SESSION['user_id']) {
                ?>
            <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" id="fileInput" type="file" name="uploadfile" hidden />
            </div>
            <div class="form-group">
                <br>
                <button class="btn btn-secondary" type="submit" name="upload">Zmień zdjęcie profilowe</button>
            </div>
            </form>
            <?php
            }
            ?>
            <?php if ($id !== $_SESSION['user_id']) 
                { ?>
             <div id="activity"></div>
             <nav class="navbar">
             </nav>
             <div id="chat"></div>
             <?php } ?>
        </div>
    </div>
        <div class="right">
            <div class="posts">
                        <?php include "authcomponents/getUsersPost.php"?>
                </div>
            </div>
    </div>
    <script>
        const id = new URLSearchParams(window.location.search).get('user_id');
        console.log(id);
        function getRealtimeData() {
            const data = new XMLHttpRequest();
            data.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("activity").innerHTML = this.responseText;
                }
            }
            data.open("GET", `authcomponents/getUserActivity.php?user_id=${id}`, true);
            data.send();
        }
        setInterval(() => {
            getRealtimeData();
        }, 100)
        window.onload = getRealtimeData();
    </script>
</body>
</html>