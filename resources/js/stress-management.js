const deleteVisual = path => {

    $.ajax({
        url: "resources/api/visuals.php",
        method: "POST",
        data: {
            delete: 1,
            filePath: path
        },
        success: function (res) {
            if (res == 1) {
                Swal.fire({
                    title: 'Success',
                    text: 'Visual successfully deleted.',
                    icon: 'success',
                    showConfirmButton: false
                })

                setTimeout(function () {
                    location.href = "stress-management.php";
                }, 2000);

            }
        }
    });
}

const chooseVisual = (type, path) => {

    let visual = ''

    switch (type) {
        case "mp4":
            visual += `<video class="w-100" controls>
                <source src="resources/results${path}" type="video/mp4">
                <source src="resources/results${path}" type="video/mp4">
                Your browser does not support the video tag.
            </video>`
            break
        case "mp3":
            visual += `<audio class="w-100" controls>
                        <source src="resources/results${path}" type="video/mp4">
                        <source src="resources/results${path}" type="video/mp4">
                        Your browser does not support the audio tag.
                    </audio>`
            break
        case "jpg":
            visual += `<div class="col-12 text-center">
                        <img class="img-fluid" src="resources/results${path}">
                    </div>`
            break
    }

    $('#view-visual').html(visual)
    $('#view').modal('show');
}

$(document).ready(function () {

    $.ajax({
        url: "resources/api/survey-sets.php",
        method: "GET",
        success: function (res) {
            let data = JSON.parse(res);
            let rows = ``;

            rows += `<option value="0"> Select Survey </option>`;
            for (let survey of data) {
                rows += `<option value="${survey.id}">${survey.title}</option>`;
            }
            $('.surveys').html(rows);
        }
    });

    $('#survey').on('change', function (e) {
        $.ajax({
            url: "resources/api/get-visuals.php?survey-id=" + $(this).val(),
            method: "GET",
            success: function (res) {

                if (res == 0) {
                    $('#folder').html(`<h5 class=""> No Data </h5>`);
                }

                else {
                    const data = JSON.parse(res)
                    let table = `<table class="table mt-2 border border-1 mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" style="text-align:center;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>`

                    for (let file of data) {
                        let fileType = file.filename.split('.')
                        let filePath = file.path.split('results')[1]
                        let newFilePath = filePath.replaceAll("\\", "\\\\");
                        let msg = '';

                        if (filePath.includes('low')) {
                            msg = 'Low Stress'
                        }

                        else if (filePath.includes('mid')) {
                            msg = 'Medium Stress'
                        }

                        else {
                            msg = 'High Stress'
                        }

                        table += `<tr>
                                    <th scope="row">${file.filename}</th>
                                    <td>${msg}</td>
                                    <td style="text-align:center;">
                                        <button class="btn btn-success" id="select" onClick='chooseVisual("${fileType[1]}", "${newFilePath}")'> View </button>
                                        <button class="btn btn-danger" id="select" onClick='deleteVisual("${newFilePath}")'> Delete </button>
                                    </td>
                                </tr>`
                    }

                    table += `</tbody>
                                </table>`

                    $('#folder').html(table)
                }
            }
        });

    });

    $('#add-new-visual').on('submit', function (e) {
        e.preventDefault();

        if ($(this).valid()) {

            let data = new FormData(this);
            data.append('add', 1)
            $.ajax({
                url: "resources/api/visuals.php",
                method: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Visual successfully uploaded.',
                            icon: 'success',
                            showConfirmButton: false
                        })

                        setTimeout(function () {
                            location.href = "stress-management.php";
                        }, 2000);

                    }

                    else {
                        Swal.fire({
                            title: 'Error',
                            text: res,
                            icon: 'error',
                            showConfirmButton: false
                        })
                    }

                }
            });
        }

    }).validate({
        rules: {
            visual: {
                required: true,
            },

            status: {
                required: true,
            },

            id: {
                required: true,
            }
        },
        messages: {
            file: {
                required: "Please choose your visual."
            },

            status: {
                required: "Please choose stress level."
            },

            id: {
                required: "Please choose a survey."
            },

        }
    });

})
