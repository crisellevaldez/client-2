<?php
  session_start();
  if(isset($_SESSION['id'])){

    if($_SESSION['type'] == 2){
        header('location: dashboard.php');
    }

    else {
        header('location: admin.php');
    }
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
    <script src="resources/js/sign-up.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <!-- ======= Contact Section ======= -->
    <div class="container mt-5">
        <section id="" class="contact mt-5">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Sign Up</h2>
                    <p> To answer our survey, create a account.</p>
                </div>

                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-10 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form id="sign-up" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="firstName">First name</label>
                                    <input type="text" name="firstName" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middleName">Middle name</label>
                                    <input type="text" name="middleName" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastName">Last name</label>
                                    <input type="text" name="lastName" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Gender</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" style="height: 15px; width: 15px" type="radio" name="gender" id="male" value="Male" checked>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" style="height: 15px; width: 15px" type="radio" name="gender" id="female" value="Female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" style="height: 15px; width: 15px" type="radio" name="gender" id="others" value="Others">
                                        <label class="form-check-label" for="others">
                                            Others
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Confirm Password</label>
                                    <input type="password" class="form-control" name="cPassword" required="">
                                </div>
                            </div>
                            
                            <div class="text-center"><button id="btn-submit" type="submit">Sign Up</button></div>
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
                    <h5 class="modal-title">Activate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sign-up-confirm">
                        <p>Email sent! Please confirm your account.</p>
                        <div class="form-group col-md-12">
                            <label for="name">Enter 5-digit activation code:</label>
                            <input type="text" class="form-control" name="code">
                        </div>
                        <div class="text-center float-end mt-2"><button class="btn btn-custom-1" type="submit">Activate</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/sources-2.html' ?>
</body>

</html>