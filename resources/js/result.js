function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}

$(document).ready(function () {

    let surveyId = GetURLParameter('survey-id');

    if (surveyId == null || surveyId == "") {
        location.href = "results.php";
    }

    else {
        $.ajax({
            url: "resources/api/results.php?survey-id=" + surveyId,
            method: "GET",
            success: function (res) {

                if (res == 0) {
                    $('.services').remove();
                    Swal.fire({
                        title: 'Error',
                        text: 'The survey set does not exist.',
                        icon: 'error',
                        showConfirmButton: false
                    })

                    setTimeout(function () {
                        location.href = "results.php";
                    }, 2000);
                }

                else {
                    let data = JSON.parse(res);
                    let rows = "";
                    let total = 5 * data[1][0];
                    let result = data[0][0].result / total;
                    let percentage = result * 100;

                    if (percentage == 0){
                        $('.services').remove();
                        Swal.fire({
                            title: 'Warning',
                            text: 'The survey set is not answered yet.',
                            icon: 'warning',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.href = "results.php";
                        }, 2000);
                    }

                    else {
                        for (let datum of data[0]) {
                            rows += `<div class="col-12" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon-box">
                                        <h4>${datum.title}</h4>
                                        <p>${datum.description}</p>`;
    
                            if (percentage >= 66) {
                                rows += `<div class="alert alert-danger" role="alert">
                                        <h4> Results: ${percentage}% </h4> High Stress
                                        </div>`;
                            }
    
                            else if (percentage >= 33) {
                                rows += `<div class="alert alert-warning" role="alert">
                                        <h4> Results: ${percentage}% </h4> Medium Stress
                                        </div>`;
                            }
    
                            else {
                                rows += `<div class="alert alert-success" role="alert">
                                        <h4> Results: ${percentage}% </h4> Low Stress
                                        </div>`;
                            }
    
    
                        }
                    }
                    
                    rows += `</div> </div>`;
                    $('.row').html(rows);
                }
            }

        });

    }



})
