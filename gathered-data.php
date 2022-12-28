<?php
session_start();
if (isset($_SESSION['id'])) {

    if ($_SESSION['type'] == 2) {
        header('location: dashboard.php');
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

    <title>Gathered Data</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/min/jquery/jquery-excel/src/jquery.table2excel.js"></script>
    <script src="resources/js/gathered-data.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up" style="margin-top: 120px">

            <div class="section-title">
                <h2>Gathered Data </h2>
                <p> Below are the gathered data from all the survey.</p>
            </div>

            <div class="row">

                <div class="row mt-5">
                    <div class="col-lg-6 ">
                        <label> Select a Survey to view Chart: </label>
                        <select id="survey" class="form-select form-select-lg mt-2">
<<<<<<< HEAD

=======
                            
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <button type="button" class="btn btn-outline-success float-end mb-3">
                        Export <img src="resources/imgs/excel.png" style="width: 25px">
                    </button>
                </div>

                <div class="col-12 gathered-table">
                </div>
            </div>

        </div>
    </section>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>