<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php'?>
<body class="text-center">
    <h1 class="display-1 text-light">Welcome to Fakelook</h1>
    <h2 class="display-4 text-light">Zaloguj się</h1>>
    <div class="container-fluid">   
        <form class="needs-validation d-flex justify-content-center p-5 m-5 text-center" method="POST" action="authcomponents/login.php" novalidate>
        <div class="form-row w-75">
            <div class="form-group">
            <label for="validationCustom01"><p class="text-white">Nazwa uzytkownika</p></label>
            <input type="text" class="form-control" id="validationCustom01" name="username" placeholder="Nazwa użytkownika" required>
            <div class="valid-feedback">
                Jest git
            </div>
            </div>
            <div class="form-group">
            <label for="validationCustom02"><p class="text-white">Hasło</p></label>
            <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Hasło" required>
            <div class="valid-feedback">
            i tu też
            </div>
        <button class="btn btn-light m-4" name="submit" type="submit">Zaloguj się</button>
        </form>
    </div>
    <a class="display-6 text-light" href="signup.php">Nie posiadasz konta?</a>
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
</body>
</html>