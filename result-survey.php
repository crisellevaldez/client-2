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

    <title>Result</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/result-survey.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="services" class="services section-bg mt-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Result - History </h2>
                <p> Below are the history of your answers based on the selected survey.</p>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table bg-light table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Survey Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Result</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>