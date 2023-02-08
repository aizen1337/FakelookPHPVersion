<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php'?>
<body class="text-center">
    <h1 class="display-1 text-light">Welcome to Fakelook</h1>
    <h2 class="display-4 text-light">Załóż konto poniżej</h1>>
    <div class="container-fluid">   
        <form class="needs-validation d-flex justify-content-center p-5 m-5 text-center" method="POST" action="authcomponents/signup.inc.php" novalidate>
        <div class="form-row w-75">
            <div class="form-group">
            <label for="validationCustom01"><p class="text-white">Nazwa uzytkownika</p></label>
            <input type="text" class="form-control" name="username" id="validationCustom01" placeholder="Nazwa użytkownika" required>
            <div class="valid-feedback">
                Jest git
            </div>
            </div>
            <div class="form-group">
            <label for="validationCustom02"><p class="text-white">Hasło</p></label>
            <input type="password" class="form-control" name="password" id="validationCustom02" placeholder="Hasło" required>
            <div class="valid-feedback">
            i tu też
            </div>
            </div>
            <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
            <p class="text-white">Jest zgoda</p>
            </label>
            <div class="invalid-feedback">
                Zgody nie ma
            </div>
            </div>
        </div>
        <button class="btn btn-light" name="submit" type="submit">Dołącz</button>
        </form>
    </div>
    <a class="display-6 text-light" href="login.php">Posiadasz konto? Zaloguj się!</a>
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