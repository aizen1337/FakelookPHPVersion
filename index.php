<?php 
session_start();
if(!isset($_SESSION["user_id"])) {
  header("location: login.php");
}
?>
<html lang="en">
  <?php include 'components/head.php'?>
<body>
    <?php include 'components/navbar.php' ?>
    <div class="content">
      </div>
      <div class="posts">
      <div class="card bg-dark text-light">
        <div class="card-header">
          <h1>Witaj, <?php echo $_SESSION['username'];?></h1>
        </div>
        <div class="card-body ">
        <?php
        include 'components/sidebar.php';
         ?>
          <h5 class="card-title">Jak się dzisiaj czujesz?</h5>
          <div class="mb-3">
          <form method="POST" class="needs-validation" enctype="multipart/form-data" action="postcomponents/addPost.php">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="post" rows="3" placeholder="Opowiedz nam o dzisiejszym dniu..." required></textarea>
            <br>
            <label for="fileInput" class="btn btn-secondary">Dodaj zdjęcie <i class="fa-regular fa-image"></i></label>
            <input hidden type="file" name="uploadFile" id="fileInput" required>
            <button type="submit" name="addPost" class="btn btn-secondary">Opublikuj!</button>
          </form>
          </div>
        </div>
        <?php include 'postcomponents/getPosts.php' ?>
    </div>
    </div>
  </div>
</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
</html>