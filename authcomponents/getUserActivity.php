<?php 
include 'database.php';
$user = $_GET['user_id'];
$activity = mysqli_query($connection, "SELECT user_active from users where user_id = $user");
$result = mysqli_fetch_assoc($activity);
if ($result['user_active'] == 1) {
    ?>
     <p class="useractive" id>Użytkownik aktywny <i class="fa-solid fa-circle"></i></p>
     <?php
}
else {
    ?>
       <p class="userinactive">Użytkownik offline <i class="fa-solid fa-circle"></i></p>
    <?php
}
?>