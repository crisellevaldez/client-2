<?php
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include 'includes/sources.html' ?>
  <script src="resources/js/sign-out.js"> </script>
</head>

<body>
  <?php include 'includes/nav.php' ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1> Bulacan State University </h1>
          <h2> BULACAN STATE UNIVERSITY (BulSU) is the premiere state-operated institution of higher learning in the Cenral Luzon region. </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/bulsu.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>


  <?php include 'includes/sources-2.html' ?>

</body>

</html>