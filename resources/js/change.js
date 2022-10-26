function activate(email) {
    $('.modal').modal('show');
    $('#change-confirm').prepend(`<input type="hidden" name="email" value="${email}">`)
    $('#btn-submit-email').html(`Confirm`).attr("disabled", false);;
}


$(document).ready(function () {

    $('#change-email').validate({
        rules: {
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

            email: {
                required: "Please enter your email.",
                email: "Please enter a valid email address.",
                remote: "Email address already exist."
            }
        },

        submitHandler: function(form) {
            $('#btn-submit-email').html(`Confirm <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`).attr("disabled", true);
            let data = new FormData(form);
            data.append("changeE", 1);
            console.log(1);
            $.ajax({
                url: "resources/api/change.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    activate(data.get("email"));
                }
            });

            return false; 
          }
    });
    
    $('#change-confirm').validate({
        rules: {
            code: {
                required: true,
            }
        },
        messages: {
            code: {
                required: "Please enter your confirmation code."
            }
        },

        submitHandler: function(form) {
            let data = new FormData(form);
            $.ajax({
                url: "resources/api/change.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Email successfully changes.',
                            icon: 'success',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            window.location.reload();
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

            return false; 
          }
    });

    $('#change-password').validate({
        rules: {
            password: {
                required: true,
                minlength: 5
            },

            cPassword: {
                required: true,
                equalTo : "#password"
            },

            oPassword: {
                required: true,
                remote: {
                    url: "resources/api/old-password.php",
                    type: "post"
                }
            },
        },
        messages: {
            password: {
                required: "Please enter your password.",
                minlength: "Please enter at least 5 characters long.",
            },

            oPassword: {
                required: "Please enter your old password.",
                remote: "Old password is wrong.",
            },

            cPassword: {
                required: "Please confirm your password.",
                equalTo : "Password do not match."
            },
            
        },

        submitHandler: function(form) {
            let data = new FormData(form);
            $.ajax({
                url: "resources/api/change-pass.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Password successfully changed.',
                            icon: 'success',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);

                    }

                }
            });

            return false; 
          }
    });
});