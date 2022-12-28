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
      <div class="row mt-5 mb-5">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 style="font-size: 25px"> St. Dominic de Guzman School, Inc. </h1>
          <h2 style="font-size: 20px"> VISION<br>
            St. Dominic de Guzman School, established by dominican Sisters of St. Joseph, is an evangelizing arm of the Catholic Church. Insired by its patron, St. Dominic de Guzman and its devotion to the Holy Eucharist and the Blessed Virgin Mary, the institution transforms the needy youth to live in truth and proclaim the gospel through prayer, study and service to the Society.
            <br><br>
            MISSION<br>
            A center of excellence in Catholic Education foring holistic Dominican, Christ-inspired, competent lifelong learners and responsible citizens for meaningful life in the 21st Century. </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="sign-in.php" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
          <img src="resources/imgs/school.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <script>
      $('#home').addClass('active');
  </script>
  <?php include 'includes/sources-2.html' ?>

</body>

</html>