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

    <title>Results</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/results.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="services" class="services section-bg mt-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Results</h2>
                <p> Below are the results of survey sets that you answered.</p>
            </div>

            <div class="row">
            </div>

        </div>
    </section>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>