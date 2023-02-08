<button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><h1>Czatuj  <i class="fa-solid fa-comment-dots"></i></h1> </button>
<div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light" id="offcanvasWithBothOptionsLabel">Czat</h5>
    <a href="index.php" class="btn btn-white text-reset"><i class="fa-solid fa-arrow-left"></i></a>
    <button type="button" class="btn-close btn-close-white btn-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>
        <nav class="nav nav-pills flex-column">
            <?php 
            error_reporting(0);
            if(!isset($_GET['chatUser'])) {
            include "authcomponents/getActiveUsers.php";
            }
            else if(isset($_GET['chatUser'])) {
                ?>
            <div class="chat" id="chat">
            </div>
            <form method="POST" id="form">
                <input type="text" class="messageBox" name="chatbox" id="chatbox">
                <button type="submit" class="messageButton"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
            <?php
            } 
            ?>
        </nav>
    </p>
  </div>
</div>
<script src="./chat/chatController2.js"></script>