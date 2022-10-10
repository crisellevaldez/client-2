$(document).ready(function () {
    $('#sign-out').click(function () {

        $.ajax({
            url: 'resources/api/sign-out.php',
            success: function (data) {
                if (data == 1) {
                    location.href = "sign-in.php";
                }
            }
        });
    });
    
});
