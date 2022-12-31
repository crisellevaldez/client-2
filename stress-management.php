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

    <title>Stress Management</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/stress-management.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up" style="margin-top: 120px">

            <div class="section-title">
                <h2> Stress Management </h2>
                <p> Manage survey visuals.</p>
            </div>

            <div class="row">

                <div class="row mt-5">
                    <div class="col-lg-6 col-12">
                        <label> Select a Survey to view folder: </label>
                        <select id="survey" class="form-select form-select-lg mt-2 w-100 surveys">
                        </select>
                    </div>

                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#add"> Add Visual</button>
                    </div>
                    <div class="col-lg-12" id="folder">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modals -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Visual</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="view-visual">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Visual</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="view-visual">
                    <form id="add-new-visual">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose Visual:</label>
                            <input class="form-control" type="file" name="visual">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Choose Stress Level:</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
                                <option value="3"> Low Stress </option>
                                <option value="2"> Medium Stress </option>
                                <option value="1"> High Stress </option>
                            </select>
                            <label> Select Survey: </label>
                            <select id="add-survey" class="form-select form-select-lg mt-2 w-100 surveys" name="id"></select>
                        </div>
                        <div class="text-center float-end mt-2"><button class="btn btn-custom-1" type="submit">Upload</button></div>
                    </form>
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