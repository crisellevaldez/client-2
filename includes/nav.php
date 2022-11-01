<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Logo</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
          <?php if(isset($_SESSION['id'])){ ?>
          <li><a class="nav-link scrollto" href="dashboard.php">Dashboard</a></li>
          <li class="dropdown"><a href="#"><span> <?php echo $_SESSION['name']; ?> </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
  
              <li><a href="profile.php">Profile</a></li>
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