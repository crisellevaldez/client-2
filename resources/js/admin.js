$(document).ready(function () {

    $.ajax({
        url: "resources/api/chart.php",
        method: "GET",
        data: {
            counts: 1
        },
        success: function (res) {
            let data = JSON.parse(res);
            $('#male').html(data[0][0].count);
            $('#female').html(data[1][0].count);
            let total = parseInt(data[0][0].count) + parseInt(data[1][0].count);
            $('#total').html(total);
        }
    });

    $.ajax({
        url: "resources/api/all-questions.php",
        method: "GET",
        success: function (res) {
            let data = JSON.parse(res);
            let rows = ``;

            for (let question of data) {
                rows += `<option value="${question.id}">${question.question}</option>`;
            }
            $('select').html(rows);
        }
    });

    $('#survey').on('change', function (e) {
        e.preventDefault();

        $.ajax({
            url: "resources/api/chart.php",
            method: "GET",
            data: {
                id: $('#survey').val()
            },
            success: function (res) {
                let one = 0, two = 0, three = 0, four = 0, five = 0;
                let data = JSON.parse(res);

                if (data == 0) {
                    $('#insert-canva').html(`<h5 class="mt-2"> No Data </h5>`);
                    $('#myChart').remove();
                }

                else {
                    $('#insert-canva').html(`<canvas id="myChart" style="width:100%;max-width:500px"></canvas>`);
                    for (datum of data) {

                        if (datum.answer == 1) {
                            one++;
                        }

                        else if (datum.answer == 2) {
                            two++;
                        }

                        else if (datum.answer == 3) {
                            three++;
                        }

                        else if (datum.answer == 4) {
                            four++
                        }

                        else if (datum.answer == 5) {
                            five++;
                        }
                    }

                    var xValues = [" Very Dissatisfied (5)", "Dissatisfied (4)", "Neutral (3)", "Satisfied (2)", "Very Satisfied (2)"];
                    var yValues = [one, two, three, four, five];
                    var barColors = ["red", "green", "blue", "orange", "brown"];

                    new Chart("myChart", {
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            legend: { display: true },
                            title: {
                                display: true,
                            }
                        }
                    });

                }

            }

        });

    });

});