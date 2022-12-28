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

/*function updateQuestion(id){
    let question = $('#q-'+id).val();

    if (question == "" || question == null){
        Swal.fire({
            title: 'Error',
            text: 'Please enter question.',
            icon: 'error',
            showConfirmButton: false
        })
    }

    else {
        $.ajax({
            url: "resources/api/update.php",
            method: "POST",
            data: {
                update: 1,
                question: question,
                id: id
            },
            success: function (res) {
                if (res == 1) {
    
                    Swal.fire({
                        title: 'Success',
                        text: 'Question updated.',
                        icon: 'success',
                        showConfirmButton: false
                    })
                }
            }
        });
    }
}

function deleteSurvey(){
    let id = GetURLParameter('survey-id');
    Swal.fire({
        title: 'Delete survey?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "resources/api/delete.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Survey deleted.',
                            icon: 'success',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.href = "questionnaires.php";
                        }, 2000);
                    }

                    else {
                        Swal.fire({
                            title: 'Error',
                            text: 'You cannot delete surveys with answers.',
                            icon: 'error',
                            showConfirmButton: false
                        })
                    }
                }
            });
        }
      })
}

function deleteQuestion(id){
    Swal.fire({
        title: 'Delete question?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "resources/api/delete.php",
                method: "POST",
                data: {
                    delete: 1,
                    id: id
                },
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Question deleted.',
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
                            text: 'You cannot delete questions with answers.',
                            icon: 'error',
                            showConfirmButton: false
                        })
                    }
                }
            });
        }
      })
}*/

$(document).ready(function () {

    let surveyId = GetURLParameter('survey-id');
    $.ajax({
        url: "resources/api/questions1.php",
        method: "GET",
        data: {
            surveyId: surveyId
        },
        success: function (res) {
            if (res == 0) {

            }

            else {
                let data = JSON.parse(res);
                let questions = data[0];
                let rows = `  
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Survey Title</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="surveyTitle" value="${questions[0].title}" id="inputPassword" readonly>
                                `;

                                if (data[1].length == 0){
                                    rows += `<button type="button" class="btn btn-primary float-top mt-3" data-bs-toggle="modal" data-bs-target="#modal">
                                        Add Question
                                    </button>`;
                                }
                                
                                /*
                                if (data[1].length == 0){
                                    rows += `<button type="button" class="btn btn-danger float-top mt-3" style="margin-left: 5px" onclick="deleteSurvey()">
                                        Delete this survey
                                    </button>`;
                                }*/
                                rows += `</div></div>
                                    <div class="mb-3 col-md-6">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="surveyDesc" value="${questions[0].description}" id="inputPassword" readonly>
                                        </div>
                                    </div>
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Question</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                let count = 1;

                if (questions[0].question != null){
                    for (let question of questions) {
                        rows += `<tr>
                                    <th scope="row">${count}</th>
                                    <td class="w-75"> <textarea readonly class="form-control" id="q-${question.id}">${question.question}</textarea> </td>`;
                                    /*
                                    <td> <button type="button" class="btn btn-primary" onclick="updateQuestion(${question.id})">Update</button> 
                                    if (data[1].length == 0){
                                        rows += `<button type="button" class="btn btn-danger" style="margin-left: 5px" onclick="deleteQuestion(${question.id})">Delete</button>`;
                                    }*/
                                    rows += `</td></tr>`;
                        count++;
                    }
                }
                
                rows += `</tbody> </table>`;
                $('.row').html(rows);
            }

        }
    });

    /*
    $('#survey').on('submit', function (e) {
        console.log('1')
        e.preventDefault();
        if ($('#survey').valid()) {

            let surveyId = GetURLParameter('survey-id');
            let data = new FormData(this);
            data.append("surveyId", surveyId);
            $.ajax({
                url: "resources/api/update.php",
                data: data,
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Survey updated.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        }

    }).validate({
        rules: {
            surveyTitle: {
                required: true
            },

            surveyDesc: {
                required: true
            }

        },
        messages: {
            surveyTitle: {
                required: "Please enter the survey title."
            },

            surveyDesc: {
                required: "Please enter the survey description."
            }
        }
    }); 

    */

    $('#add').on('submit', function (e) {
        console.log(1)
        e.preventDefault();
        if ($('#add').valid()) {

            let surveyId = GetURLParameter('survey-id');
            let data = new FormData(this);
            data.append("id", surveyId);
            data.append("add", 1);
            $.ajax({
                url: "resources/api/add.php",
                data: data,
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Question added.',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        }

    }).validate({
        rules: {
            question: {
                required: true
            }

        },
        messages: {
            question: {
                required: "Please enter the question."
            }
        }
    });

})
