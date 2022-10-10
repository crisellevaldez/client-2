function activate(email) {
    $('.modal').modal('show');
    $('#sign-in-confirm').prepend(`<input type="hidden" name="email" value="${email}">`)
}

function signIn() {
    Swal.fire({
        title: '',
        html: `<b> Republic Act 10173 – Data Privacy Act of 2012 seeks to protect all forms of information, 
        be it private, personal, or sensitive. It is meant to cover both natural and juridical persons involved 
        in the processing of personal information. </b> <br> <br> The aim of this survey is to assist the School Management 
        Team to identify the main areas and causes of potential stress at work so that any risks to your health,
        safety and wellbeing can be reduced. but please be assured that any information you do provide 
        will be treated confidentially.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed',
        width: '800px'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "dashboard.php";
        }

        else {
            $.ajax({
                url: "resources/api/sign-out.php",
                method: "GET",
                success: function (res) {
                    location.href= "sign-in.php";
                }
            })
        }
    })
}

$(document).ready(function () {

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
                        signIn();
                    }

                    else if (res == 2) {
                        activate(data.get("email"));
                    }

                    else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Wrong username/password.',
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
                            signIn();
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