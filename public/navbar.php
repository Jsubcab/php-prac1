<?php
session_start();
?>

<nav class="navbar navbar-expand-lg">

  <div class="container">

      <!-- Right links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu-navbar">
        <li class="nav-item">
          <a href="index.php">Categories</a>
        </li>
        <li class="nav-item">
            <i class="bi bi-cart"></i>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center menu-navbar-right">
        <a href="checkout.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
        
        
        <?php
        if (isset($_SESSION['loggedin'])) {
          ?>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right menu-navbar-right-dropdown">
              <?php
              if ($_SESSION['permissions'] == 1) {
                ?> <button onclick="window.location.href='admin.php'" class="dropdown-item" type="button">Profile</button><?php
              } else if ($_SESSION['permissions'] == 3){
                ?>
                <button onclick="window.location.href='profile.php'" class="dropdown-item" type="button">Profile</button>
                <?php
              }
              ?>
              
              <button onclick="window.location.href='../private/login_logout.php'" class="dropdown-item" type="button">Logout</button>
            </div>
          </div>
        <?php
            }
            else {
              ?>
              <a type="button" href="login.php" class="btn btn-primary"><i class="fas fa-user"></i></a>
              <?php
            }
          ?>
      </div>

  </div>

</nav>