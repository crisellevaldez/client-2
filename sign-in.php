<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include 'includes/sources.html' ?>
    <script src="resources/js/sign-in.js"> </script>
</head>

<body>
    <?php include 'includes/nav.php' ?>

    <!-- ======= Contact Section ======= -->
    <div class="container mt-5">
        <section id="" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0 section-title">
                        <h2 class="my-5 display-3 fw-bold ls-tight">
                            <br>
                            <span> Sign In</span></span>
                        </h2>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ab tenetur, est distinctio atque quam, dolor placeat corrupti adipisci quis officiis, veniam consequuntur omnis perspiciatis similique facilis nobis corporis incidunt.
                        </p>
                    </div>

                    <div class="col-lg-6 mt-lg-0 d-flex align-items-stretch">
                        <form id="sign-in" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-12 mt-3">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" id="name" name="email">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="text-center"><button type="submit">Sign In</button></div>
                            
                            <div class="form-group float-end">
                                <label for="name"> No account?</label>
                                <a href="sign-up.php"> Sign Up </a>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
    </div>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Activate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sign-in-confirm">
                        <p>To continue signing in, please confirm your account.</p>
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