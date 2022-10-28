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

    <title>Survey</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/questionnaire.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="questionnaires.php">All Surveys</a></li>
                    <li> Survey </li>
                </ol>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page pb-3">
            <div class="container shadow bg-light mb-3 pb-5">
            
                <form id="survey">
                    <div class="row pt-5 px-5"></div>

                    <button type="submit" id="btn-submit" class="btn btn-custom w-25 p-2 float-end">Save Changes</button>
                    </br>
                    </br>
                </form>
            </div>
        </section>
    </main>

    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add">
                        <div class="form-group col-md-12">
                            <label for="name">Question:</label>
                            <textarea class="form-control" name="question" required></textarea>
                        </div>
                        <div class="text-center float-end mt-2"><button class="btn btn-custom-1" type="submit">Add</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>