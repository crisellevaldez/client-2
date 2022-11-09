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
    $.ajax({
        url: "resources/api/questions.php",
        method: "GET",
        data: {
            surveyId: surveyId
        },
        success: function (res) {
            if (res == 0) {

                $('.container').removeClass('shadow bg-light');
                Swal.fire({
                    title: 'Warning',
                    text: 'No questions yet. Please contact the administrator for concerns/questions.',
                    icon: 'warning',
                    showConfirmButton: false
                })

                setTimeout(function () {
                    location.href = "dashboard.php";
                }, 2000);
            }

            else if (res == 2){
                $('.container').removeClass('shadow bg-light');

                Swal.fire({
                    title: 'Error',
                    text: 'You already answered this survey this month. Please choose another one or come back again next month.',
                    icon: 'error',
                    showConfirmButton: false
                })

                setTimeout(function () {
                    location.href = "dashboard.php";
                }, 2000);
            }

            else {
                let questions = JSON.parse(res);
                let rows = `<div class="col-lg-12 mb-5 mb-lg-0 section-title" data-aos="fade-up">
                                <h2 class="my-5 display-3 fw-bold ls-tight">
                                    <br>
                                    <span> ${questions[0].title} </span></span>
                                </h2>
                                <p style="color: hsl(217, 10%, 50.8%)">
                                ${questions[0].description}
                                </p>
                            </div>`;
                let count = 1;
                for (let question of questions) {
                    rows += `<div class="col-12 bg-light mb-5">
                    <h4 class="fw-bold text-center mt-3"></h4>
                        <p> <b> ${count}. </b> ${question.question} </p>
                        <input type="hidden" name="question[]" value="${question.id}" />
                        <div class="m-2 d-inline">
                            <input class="form-check-input" type="radio" name="question-${question.id}" value="5" required/>
                            <label class="form-check-label" for="radioExample1">
                                Very Dissatisfied
                            </label>
                        </div>
                        <div class="m-2 d-inline">
                            <input class="form-check-input" type="radio" name="question-${question.id}" value="4" />
                            <label class="form-check-label" for="radioExample2">
                                Dissatisfied
                            </label>
                        </div>
                        <div class="m-2 d-inline">
                            <input class="form-check-input" type="radio" name="question-${question.id}" value="3"  />
                            <label class="form-check-label" for="radioExample3">
                                Neutral
                            </label>
                        </div>

                        <div class="m-2 d-inline">
                            <input class="form-check-input" type="radio" name="question-${question.id}" value="2"  />
                            <label class="form-check-label" for="radioExample3">
                                Satisfied
                            </label>
                        </div>

                        <div class="m-2 d-inline">
                            <input class="form-check-input" type="radio" name="question-${question.id}" value="1"  />
                            <label class="form-check-label" for="radioExample3">
                                Very Satisfied
                            </label>
                        </div>
                        
                        <label id="question-${question.id}-error" class="error-1" for="question-${question.id}"></label>
                </div>`;

                    count++;
                }


                rows += `<button type="submit" id="btn-submit" class="btn btn-custom w-25 p-2 float-end">Submit</button>`;

                $('form').html(rows);
            }

        }
    });

    $('form').on('submit', function (e) {
        e.preventDefault();
        if ($('form').valid()) {
            $('#btn-submit').html(`Submit <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`).attr("disabled", true);

            let surveyId = GetURLParameter('survey-id');
            let data = new FormData(this);
            data.append("surveyId", surveyId);
            $.ajax({
                url: "resources/api/survey.php",
                data: data,
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(function(){location.href = `result-survey.php?survey-id=${surveyId}`}, 1500);
                    }
                }
            });
        }

    }).validate({
        errorClass: "error-1",
        validClass: "my-valid-class",
        message: "This question is required"
    });

    
})
