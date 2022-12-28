<?php
session_start();
if (isset($_SESSION['id']) || isset($_SESSION['alias'])) {
    if (isset($_SESSION['type'])){
        if ($_SESSION['type'] == 1) {
            header('location: admin.php');
        }
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

    <title>Survey</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/survey.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <main id="main"  style="margin-top: 100px">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="dashboard.php">All Surveys</a></li>
                    <li> Survey </li>
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
    <?php include 'includes/footer.html' ?>
</body>

</html>