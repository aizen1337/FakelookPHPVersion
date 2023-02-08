<?php
error_reporting(0);
include "database.php";
$sql = "SELECT username FROM users";
$result = mysqli_query($connection,$sql);
$users = mysqli_fetch_all($result);
$user = $_REQUEST["user"];
$hint = "";
// lookup all hints from array if $q is different from ""
if ($user !== "") {
  $user = strtolower($user);
  $len=strlen($user);
  foreach($users as $name) {
    if (stristr($user, substr($name[0], 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      }
     else {
        $hint .= ",$name";
      }
    }
  }
}
?>
<?php
$searchedUser = $hint[0];
$sql = "SELECT * FROM users where username = '$searchedUser'";
$result = mysqli_query($connection,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($users as $user) {
  if ($user['user_id'] == $_SESSION['user_id']) {
    continue;
  } else {
?>
<div class="flex-container">
        <a href="profilepage.php?user_id=<?php echo $user['user_id']?>" class="text-decoration-none">    
         <h1 class="text-light"><?php echo $user['username'] ?></h1>
         <?php
    if ($user['imageDir'] !== null and !empty($user['imageDir'])) {
         ?>
                <label for="fileInput"><img class="avatar" src="<?php echo $user['imageDir'] ?>"/></label>;
                <?php
    } else {
                ?>
                <label for="fileInput"><img class="avatar" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=2000"/></label>
                <?php
    }
    if ($user['user_active'] == 1) {
      ?>
       <p class="useractive" id>Użytkownik aktywny <i class="fa-solid fa-circle"></i></p>
       <?php
  }
    else {
      ?>
         <p class="userinactive">Użytkownik offline <i class="fa-solid fa-circle"></i></p>
      <?php
  }
  }
}
?>
</a>
</div>