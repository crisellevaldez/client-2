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

    <title>Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/admin.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="team" class="team section-bg " style="margin-top: 100px">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>ADMIN DASHBOARD</h2>
                <p></p>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-12 mb-3 d-flex justify-content-center">
                        <!-- <a href="questionnaires.php" class="btn btn-custom m-1"> Manage Survey Questionnaire </a> -->
                        <a href="gathered-data.php" class="btn btn-custom m-1"> Gathered Data </a>
                    </div>

                    <div class="col-xl col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-items-center row">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted mb-2">MALE</h6>
                                        <span id="male" class="h2 mb-0">0</span>
                                        <span class="mt-n1 ms-2 badge bg-success-soft">+3.5%</span>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-items-center row">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted mb-2">FEMALE</h6>
                                        <span id="female" class="h2 mb-0">0</span>
                                        <span class="mt-n1 ms-2 badge bg-success-soft">+3.5%</span>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-items-center row">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted mb-2">TOTAL FACULTY MEMBERS</h6>
                                        <span id="total" class="h2 mb-0"></span>
                                        <span class="mt-n1 ms-2 badge bg-success-soft">0</span>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-6 ">
                        <label> Select a Survey to view Chart: </label>
                        <select id="survey" class="form-select form-select-lg mt-2">

                        </select>

                        <div id="insert-canva">
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <script>
        $('#dashboard').addClass('active');
    </script>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>