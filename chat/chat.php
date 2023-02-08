<?php 
session_start();
include '../authcomponents/database.php';
if($_GET['chatUser']) {
$chosenUser = $_GET['chatUser'];
$currentUser = $_SESSION['user_id'];
$sql = "select sender_id, u1.username as sender , u2.username as receiver, messages.message, u1.imageDir as sender_avatar, u2.imageDir as receiver_avatar, message_sent_date from messages
left join users u1 on u1.user_id = messages.sender_id 
left join users u2 on u2.user_id = messages.receiver_id 
where (messages.receiver_id = $chosenUser and messages.sender_id = $currentUser) or (messages.receiver_id = $currentUser and messages.sender_id = $chosenUser) order by messages.message_sent_date ASC;";
$chatMessages = mysqli_query($connection, $sql);
$messages = mysqli_fetch_all($chatMessages,MYSQLI_ASSOC);
 }
else {
    header("location: ../index.php");
} 
    if (count($messages) == 0) {
    echo '<h1 class="text-light">Przywitaj się!</h1>';
    } 
    foreach($messages as $chat) {
        ?>
        <?php
        if($chat["sender_id"] == $currentUser) {
        ?>
        <div class="sentMessage">
            <p><?php echo $chat['message']?></p>
            <small><?php echo $chat['message_sent_date']?></small>
            <a href="profilepage.php?user_id=<?php echo $chat['sender_id']?>"><img src="<?php echo $chat['sender_avatar']?>" class="chat-avatar"/></a>
        </div>
        <?php
        }
        else {
            ?>
            <div class="receivedMessage">
            <p><?php echo $chat['message']?></p>
            <small class="text-dark"><?php echo $chat['message_sent_date']?></small>
            <?php 
             if(!empty($chat['sender_avatar'])) 
             {
             ?> <a href="profilepage.php?user_id=<?php echo $chat['sender_id']?>"><img src="<?php echo $chat['sender_avatar']?>" class="chat-avatar"/></a>
             <?php
             }
             ?>
            </div>
            <?php
        }
        ?>
        <?php
    }
?>
