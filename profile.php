<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
    header('location: sign-in.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/change.js"> </script>
    <script src="resources/js/sign-out.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <!-- ======= Contact Section ======= -->
    <div class="container" style="margin-top: 100px">
        <section id="" class="contact mt-5">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Profile</h2>
                </div>

                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form id="change-email" class="php-email-form">
                            <h5>Change Email</h5>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">New Email</label>
                                    <input type="text" name="email" class="form-control" required="">
                                </div>
                            </div>
                            
                            <div class="text-center"><button id="btn-submit-email" type="submit">Confirm</button></div>
                        </form>
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form id="change-password" class="php-email-form">
                            <h5>Change Password</h5>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Oldpassword">Old Password</label>
                                    <input type="password" class="form-control" name="oPassword" id="oPassword" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" name="password" id="password" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cPassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="cPassword" required="">
                                </div>
                            </div>
                            
                            <div class="text-center"><button id="btn-submit" type="submit">Confirm</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="change-confirm">
                        <p>Email sent! Please confirm your new email address.</p>
                        <div class="form-group col-md-12">
                            <label for="name">Enter 5-digit confirmation code:</label>
                            <input type="text" class="form-control" name="code">
                        </div>
                        <div class="text-center float-end mt-2"><button class="btn btn-custom-1" type="submit">Confirm</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.profile').addClass('active');
    </script>

    <?php include 'includes/sources-2.html' ?>
    <?php include 'includes/footer.html' ?>
</body>

</html>