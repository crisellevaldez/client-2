function activate(email) {
    $('.modal').modal('show');
    $('#sign-up-confirm').prepend(`<input type="hidden" name="email" value="${email}">`)
    $('#btn-submit').html(`Sign Up`).attr("disabled", true);;
}

$(document).ready(function () {

    $('#sign-up').on('submit', function (e) {
        e.preventDefault();

        if ($(this).valid()) {
            $('#btn-submit').html(`Sign Up <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`).attr("disabled", true);;
            let data = new FormData(this);
            $.ajax({
                url: "resources/api/sign-up.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    activate(data.get("email"));
                }
            });
        }

    }).validate({
        rules: {
            firstName: {
                required: true
            },

            lastName: {
                required: true
            },

            gender: {
                required: true
            },

            password: {
                required: true,
                min: 5
            },

            cPassword: {
                required: true,
                equalTo : "#password"
            },

            email: {
                required: true,
                email: true,
                remote: {
                    url: "resources/api/check-email.php",
                    type: "post"
                }
            },

        },
        messages: {
            password: {
                required: "Please enter your password.",
                min: "Please enter at least 5 characters long.",
            },

            cPassword: {
                required: "Please confirm your password.",
                equalTo : "Password do not match."
            },

            firstName: {
                required: "Please enter your first name.",
            },

            lastName: {
                required: "Please enter your last name.",
            },

            gender: {
                required: "Please select your gender.",
            },

            email: {
                required: "Please enter your email.",
                email: "Please enter a valid email address.",
                remote: "Email address already exist."
            }
        }
    });

    $('#sign-up-confirm').on('submit', function (e) {
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
                            type: 'error',
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