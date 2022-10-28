<?php
session_start();
if (isset($_SESSION['id'])) {

    if ($_SESSION['type'] == 1) {
        header('location: admin.php');
    }
} else {
    header('location: sign-in.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dasboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/survey-sets.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 mb-5 mb-lg-0 section-title">
                    <h2 class="my-5 display-3 fw-bold ls-tight">
                        <br>
                        <span> Factors </span></span>
                    </h2>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Below are the following factors sets that you can answer.
                    </p>
                </div>

                <div class="col-12 mb-3 d-flex justify-content-center">
                    <a href="results.php" class="btn btn-custom m-1"> See All Results </a>
                </div>

                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="accordion-list">
                        <ul id="survey-sets">

                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>