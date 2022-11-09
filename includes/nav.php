<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto"><img src="resources/imgs/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php" id="home">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
          <?php if(isset($_SESSION['id'])){ 
                  $name = "Survey";
                  if ($_SESSION['type'] == 1) {
                    $name = "Dashboard";
                  }
            ?>
          <li><a class="nav-link scrollto" id="dashboard" href="dashboard.php"> <?php echo $name; ?></a></li>
          <li class="dropdown"><a href="#" class="profile"><span> <?php echo $_SESSION['name']; ?> </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
  
              <li><a href="profile.php" class="profile">Profile</a></li>
              <li><a href="#" id="sign-out">Sign Out</a></li>
            </ul>
          </li>
          <?php } ?>
          <li> <?php if(!isset($_SESSION['id'])){ ?>
            <a class="getstarted scrollto" href="sign-in.php">Sign In</a></li>
            <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->