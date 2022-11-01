$(document).ready(function () {

    $.ajax({
        url: "resources/api/survey-sets.php",
        method: "GET",
        success: function (res) {
            let data = JSON.parse(res);
            let rows = "";
            let count = 1;
            for (let datum of data) {
                rows += `<li class="p-3">
                    <a data-bs-toggle="collapse" class="collapse collapsed" data-bs-target="#accordion-list-${datum.id}" aria-expanded="false">
                    <span>${count})</span> ${datum.title} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-${datum.id}" class="collapse p-3" data-bs-parent=".accordion-list" style="">
                        <p>
                            ${datum.description}

                            <a class="btn btn-custom-1 w-25 float-end" href="questionnaire.php?survey-id=${datum.id}"> Select </a>
                        </p>
                    </div> 
                </li>`;
                count ++;
            }
            

            $('#survey-sets').html(rows);
        }
    });

    $('#add').on('submit', function (e) {
        e.preventDefault();
        if ($('#add').valid()) {

            let data = new FormData(this);
            data.append("add", 1);
            $.ajax({
                url: "resources/api/survey-sets.php",
                data: data,
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Survey added.',
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
            title: {
                required: true
            },

            description: {
                required: true
            }

        },
        messages: {
            title: {
                required: "Please enter the survey title."
            },

            description: {
                required: "Please enter the survey description."
            }
        }
    });

})
