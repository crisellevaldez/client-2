<?php include 'connection.php';
session_start();
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["surveyId"])) {
        
        $surveyId = $_GET["surveyId"];
        $sql = 'SELECT answers.date_created, answers.user_id, answers.answer, survey_set.title, users.firstname, users.middlename, 
        users.lastname, users.age, users.gender, questions.question FROM answers INNER JOIN survey_set ON answers.survey_id = survey_set.id INNER JOIN 
        questions ON questions.id = answers.question_id INNER JOIN users ON users.id = answers.user_id 
        WHERE survey_set.id = :survey_id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['survey_id' => $surveyId]);
        $rows = $stmt->fetchAll();
        $num_rows = count($rows);

        if ($num_rows > 0) {
            echo json_encode($rows);
        }

        else {
            echo 0;
        }
    } 
}
