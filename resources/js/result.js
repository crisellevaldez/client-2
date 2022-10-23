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

                    if (percentage == 0) {
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
                                        </div>
                                        
                                        <div>

                                            If you’re coping with an extremely stressful situation, consider using the following techniques to manage and ease those feelings. 
                                            Deploying multiple stress management strategies can help you move forward in a more productive way.
                                            <br><br>1. Start small 
                                                stress often arises out of a feeling of inadequate control over a situation. By imposing some order or routine to your day, that may help you feel more in charge.
                                            <br>2. Talk about it
                                                Work to shift your focus from feeling like a victim of stress to looking for remedies and solutions.
                                            <br>3. Write it down
                                                Putting your thoughts, feelings and to-do list on paper removes them from your overcrowded mind where you can take a look at them from a different angle and potentially find solutions or better ways of managing.
                                                <br>4. Break it down
                                                more manageable chunks can also help significantly reduce the amount of stress you’re feeling about it.
                                                <br>5. Get organized
                                                Organizing your thoughts and feelings around a matter of great stress can help take some of the emotion out of those feelings and let you be more analytical about what the real issue is.
                                                <br>6. Get to the root of the problem.
                                                coping with extreme stressors to shift how they’re thinking about the problem and rather than feeling helpless to control it, get curious about what underlying issues may be making it harder for you to manage the situation.
                                                <br>7. Realize that stress is normal.
                                                Our feelings are not bound by normative definitions of good or bad.
                                                <br>8. Avoid unhealthy coping mechanisms.
                                                <br>9. Talk to a professional.
                                                <br>10. Reassess what’s most important.
                                                <br>11. Keep the faith.
                                            
                                                <br><br>Minimizing the chronic stress of daily life as much as possible is important for overall health.
                                            That’s because chronic stress harms health and increases your risk of health conditions 
                                            such as heart disease, anxiety disorders, and depression.
                                            “We’re all capable of moving through our current situation and coming out the other side.”
                                            <br>
                                            <br>
                                            *tas yung randod video na*
                                            
                                            If you are looking for someone to reach out to or talk to please don't be shy and call us!
                                            <img src="resources/imgs/clinic.png" class="img-fluid" alt="Clinic">
                                        </div>`;
                            }

                            else if (percentage >= 33) {
                                rows += `<div class="alert alert-warning" role="alert">
                                        <h4> Results: ${percentage}% </h4> Medium Stress
                                        </div>
                                        
                                        <div>
                                        You're showing some signs of stress suggesting that you may be struggling to cope with the pressures you're currently under.

                                        <br><br>Ways on how to relieve Mediuum level of stress:
                                        <br>1. Being physically active
                                        <br>2. Trying to get a good night’s sleep
                                        <br>3. Being creative
                                        <br>4. Staying connected to your family and friends and asking for support if you need to.
                                        <br>5. Practice Mindfulness
                                        
                                        <br><br>Minimizing the chronic stress of daily life as much as possible is important for overall health. - description ng solution
                                        That’s because chronic stress harms health and increases your risk of health conditions 
                                        such as heart disease, anxiety disorders, and depression.
                                        
                                        *tas yung randod video na*
                                        If you are looking for someone to reach out to or talk to please don't be shy and call us!
                                            <img src="resources/imgs/clinic.png" class="img-fluid" alt="Clinic">
                                        </div>`;
                            }

                            else {
                                rows += `<div class="alert alert-success" role="alert">
                                        <h4> Results: ${percentage}% </h4> Low Stress
                                        </div>
                                        
                                        <div>
                                        Based on your answer in the survey questionnaire, you have a low level of stress. - description ng result

                                        <br><br>Ways on how to relieve Low level of Stress: - solution ng result 
                                        <br>1. Get more physical activity
                                        <br>2. Follow a healthy diet
                                        <br>3. Minimize phone use and screen time
                                        <br>4. Consider supplements (Several vitamins and minerals play an important role in your body’s stress response and mood regulation.)
                                        <br>5. Practice self-care
                                        <br>6. Reduce your caffeine intake 
                                        <br>7. Spend time with friends and family
                                        <br>8. Create bounderies
                                        <br>9. Learn to avoid procastination
                                        <br>10. Take a yoga class
                                        <br>11. Practice mindfulness
                                        <br>12. Cuddle
                                        <br>13. Spend time in nature
                                        <br>14. Practice deep breathing 
                                        <br>15. Play with your pets
                                        
                                        <br><br>Minimizing the chronic stress of daily life as much as possible is important for overall health. - description ng solution
                                        That’s because chronic stress harms health and increases your risk of health conditions 
                                        such as heart disease, anxiety disorders, and depression.
                                        
                                        *tas yung random video na*
                                        
                                        <br><br>If you are looking for someone to reach out to or talk to please don't be shy and call us!
                                        <img src="resources/imgs/clinic.png" class="img-fluid" alt="Clinic">
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
