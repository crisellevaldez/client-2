function activate(email) {
    $('#sign-in').modal('show');
    $('#sign-in-confirm').prepend(`<input type="hidden" name="email" value="${email}">`)
}

$(document).ready(function () {

    $('#sign-in-guest').on('submit', function (e) {
        e.preventDefault();

        if ($(this).valid()) {
            let data = new FormData(this);
            $.ajax({
                url: "resources/api/sign-in-alias.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        location.href = "dashboard.php";
                    }
                }
            });
        }

    }).validate({
        rules: {
            alias: {
                required: true
            }
        },
        messages: {
            alias: "Please enter your alias."
        }
    });

    $('#sign-in').on('submit', function (e) {
        e.preventDefault();

        if ($(this).valid()) {
            let data = new FormData(this);
            $.ajax({
                url: "resources/api/sign-in.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        location.href = "dashboard.php";
                    }

                    else if (res == 2) {
                        activate(data.get("email"));
                    }

                    else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Wrong email/password.',
                            icon: 'error'
                        })
                    }

                }
            });
        }

    }).validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: "Please enter your email.",
                email: "Please enter a valid email address."
            },
            password: "Please enter your password."
        }
    });
    
    $('#sign-in-confirm').on('submit', function (e) {
        e.preventDefault();

        if ($(this).valid()) {
            let data = new FormData(this);
            $.ajax({
                url: "resources/api/sign-in.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Account activated.',
                            icon: 'success',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.href = "dashboard.php";
                        }, 2000);

                    }

                    else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Wrong code entered. Please try again.',
                            icon: 'error',
                            showConfirmButton: false
                        })
                    }

                }
            });
        }

    }).validate({
        rules: {
            code: {
                required: true,
            }
        },
        messages: {
            code: {
                required: "Please enter your activation code."
            }
        }
    });
});