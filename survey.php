<?php
  session_start();
  if(!(isset($_SESSION['id']))){
    header('location: sign-in.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/survey.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="dashboard.php">All Factors</a></li>
                    <li> Factor </li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page pb-3">
            <div class="container d-flex justify-content-center shadow bg-light mb-3 pb-5">
                <form> 
                </form>
            </div>
        </section>

    </main>

    <?php include 'includes/sources-2.html' ?>
</body>

</html>