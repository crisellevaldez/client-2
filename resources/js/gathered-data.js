<<<<<<< HEAD
function calculate(data) {
=======
function calculate(data){
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
    let msg = "";
    if (data >= 66) {
        msg = "High Stress";
    }

    else if (data >= 33) {
        msg = "Medium Stress";
    }

    else {
        msg = "Low Stress";
    }

    return msg;
}

$(document).ready(function () {

<<<<<<< HEAD
    $("button").click(function () {
        let date = new Date().toLocaleString();
        date = date.replaceAll("/", "-").replaceAll(":", "-");
        let fileName = "gathered-data (" + date.replaceAll("/", "-") + ")";
        $("table").table2excel({
            name: "Gathered Data",
            filename: fileName,//do not include extension
            fileext: ".xls", // file extension
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
=======
    $("button").click(function(){
        let date = new Date().toLocaleString();
        date = date.replaceAll("/", "-").replaceAll(":","-");
        let fileName = "gathered-data ("+date.replaceAll("/", "-")+")";
        $("table").table2excel({
            name:"Gathered Data",
            filename: fileName,//do not include extension
            fileext:".xls", // file extension
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
          });
        });
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f

    $.ajax({
        url: "resources/api/survey-sets.php",
        method: "GET",
        success: function (res) {
            let data = JSON.parse(res);
            let rows = ``;

            rows += `<option value=""> Select Survey </option>`;
            for (let survey of data) {
                rows += `<option value="${survey.id}">${survey.title}</option>`;
            }
            $('select').html(rows);
        }
    });

    $('#survey').on('change', function (e) {
<<<<<<< HEAD

=======
        
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
        $.ajax({
            url: "resources/api/gathered-data.php",
            method: "GET",
            data: {
                surveyId: $('#survey').val()
            },
            success: function (res) {

<<<<<<< HEAD
                if (res == 0) {
=======
                if (res == 0){
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
                    $('.gathered-table').html(`<h5 class=""> No Data </h5>`);
                }

                else {
                    let data = JSON.parse(res);
                    let rows = `<div class="table-responsive">
                                    <table class="table bg-light table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
<<<<<<< HEAD
                                                <th scope="col">Survey Title</th>
                                                <th scope="col">Date and Time</th>`;;

                    let id = 0, date = 0, date1 = 0, result = 0, count = 0, c = 1;
                    let rows1 = "";
                    for (let datum of data) {
                        if (date1 == datum.date_created) {
=======
                                                <th scope="col">Age</th>
                                                <th scope="col">Survey Title</th>
                                                <th scope="col">Date and Time</th>`;;
                        
                    let id = 0, date = 0, date1 = 0, result = 0, count = 0, c = 1;
                    let rows1 = "";
                    for (let datum of data){
                        if (date1 == datum.date_created){
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
                            rows += `<th scope="col">${datum.question}</th>`;
                        }

                        else {
<<<<<<< HEAD
                            if (date1 == 0) {
=======
                            if (date1 == 0){
>>>>>>> f30d7416b9af4d78af85708124e60c2e5a12259f
                                rows += `<th scope="col">${datum.question}</th>`;
                                date1 = datum.date_created;
                            }
                        }

                        if (c == data.length) {
                            rows += `<th scope="col">Result</th>`;
                        }

                        if (id != datum.user_id || date != datum.date_created) {

                            if (id != 0) {
                                let total = 5 * count;
                                let result1 = result / total;
                                let percentage = result1 * 100;
                                percentage = Math.round(percentage)
                                let msgRes = calculate(percentage);
                                rows1 += `<td> ${percentage}% - ${msgRes} </td>`;
                                result = 0, count = 0;
                            }

                            rows1 += `<tr>
                                        <td> ${datum.firstname} ${datum.middlename} ${datum.lastname}</td>
                                        <td> ${datum.gender}</td>
                                        <td> ${datum.title}</td>
                                        <td> ${datum.date_created}</td>`;
                        }

                        let msg = "";
                        if (datum.answer == 1) {
                            msg = "Very Satisfied";
                        }

                        else if (datum.answer == 2) {
                            msg = "Satisfied";
                        }

                        else if (datum.answer == 3) {
                            msg = "Neutral";
                        }

                        else if (datum.answer == 4) {
                            msg = "Dissatisfied";
                        }

                        else if (datum.answer == 5) {
                            msg = "Very Dissatisfied";
                        }

                        rows1 += `<td> ${msg} </td>`;
                        result += parseInt(datum.answer);
                        count++; c++;
                        let d = c - 1;
                        if (d == data.length) {
                            let total = 5 * count;
                            let result1 = result / total;
                            let percentage = result1 * 100;
                            percentage = Math.round(percentage)
                            let msgRes = calculate(percentage);
                            rows1 += `<td> ${percentage}% - ${msgRes} </td>`;

                        }

                        id = datum.user_id;
                        date = datum.date_created;
                    }

                    rows += `</tr>
                                </thead>
                                <tbody>
                                    ${rows1}
                                </tbody>
                            </table>
                        </div>`;

                    $('.gathered-table').html(rows);
                }
            }

        });

    });
    /*$.ajax({
        url: "resources/api/result-survey.php?survey-id=" + surveyId,
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
                let rows = "";
                res = JSON.parse(res);
                for (let datum of res) {
                    rows += `<tr>
                                <td> ${datum.title} </td>
                                <td class="w-50"> <textarea class="w-100" readonly>${datum.description}</textarea></td>
                                <td> ${datum.date_created} </td>
                                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" onclick="results(${surveyId},'${datum.date_created}')">
                                        Select
                                    </button> </td>
                            </tr>`;
                }

                $('tbody').html(rows);
            }
        }

    }); */
})
