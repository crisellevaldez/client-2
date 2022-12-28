<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="dashboard.php" class="logo me-auto"><img src="resources/imgs/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
          <?php if(isset($_SESSION['id']) || isset($_SESSION['alias'])){ 
                  if(isset($_SESSION['id'])){
                    $fullname = $_SESSION['name'];
                    $name = "Survey";
                    if ($_SESSION['type'] == 1) {
                      $name = "Dashboard";
                    }
                  }

                  else {
                    $name = 'Survey';
                    $fullname = $_SESSION['alias'];
                  }
            ?>
          <li><a class="nav-link scrollto" id="dashboard" href="dashboard.php"> <?php echo $name; ?></a></li>
          <li class="dropdown"><a href="#" class="profile"><span> <?php echo $fullname; ?> </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php if(isset($_SESSION['id'])){ ?>
                <li><a href="profile.php" class="profile">Profile</a></li>
              <?php } ?>
              <li><a href="#" id="sign-out">Sign Out</a></li>
            </ul>
          </li>
          <?php } ?>
          <li> <?php if(!isset($_SESSION['id']) && !isset($_SESSION['alias'])){ ?>
            <a class="getstarted scrollto" href="sign-in.php">Sign In</a></li>
            <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->