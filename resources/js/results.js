$(document).ready(function () {

    $.ajax({
        url: "resources/api/results.php",
        method: "GET",
        success: function (res) {

            if (res != 0){
                let data = JSON.parse(res);
                let rows = "";
                let count = 1;
                for (let datum of data) {
                    rows += `<div class="col-12" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box mb-3">
                                    <h4><a href="result.php?survey-id=${datum.id}">${count}. ${datum.title}</a></h4>
                                    <p>${datum.description}</p>
                                </div>
                            </div>`;
                    count ++;
                }
                
                $('.row').html(rows);
            }

            else {
                $('.services').remove();
                    Swal.fire({
                        title: 'Error',
                        text: 'No results yet. (Redirecting to dashboard)',
                        icon: 'error',
                        showConfirmButton: false
                    })

                    setTimeout(function () {
                        location.href = "dashboard.php";
                    }, 2000);
            }
        }
    });


    
})
