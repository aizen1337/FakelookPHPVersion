<nav class="navbar navbar-dark bg-dark fixed-top">
   <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><h1>Fakelook</h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Fakelook</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i>  Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="users.php"><i class="fa-solid fa-user-group"></i>  Friends</a></li>
                <li><a class="dropdown-item" href="profilepage.php?user_id=<?php echo $_SESSION['user_id']?>"><i class="fa-solid fa-user"></i>  Your profile</a></li>
                <li><a class="dropdown-item" href="authcomponents/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>  Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>