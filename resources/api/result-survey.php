<?php include 'connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["survey-id"])) {
        if (isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $surveyId = $_GET["survey-id"];
            $sql = 'SELECT survey_set.title, survey_set.description, answers.date_created FROM answers INNER JOIN survey_set ON answers.survey_id = survey_set.id WHERE answers.user_id= :user_id and survey_set.id = :survey_id GROUP BY answers.date_created';
            $stmt = $conn->prepare($sql);
            $stmt->execute(['user_id' => $id, 'survey_id' => $surveyId]);
            $rows = $stmt->fetchAll();

            $num_rows = count($rows);

            if ($num_rows > 0) {
                echo json_encode($rows);
            }

            else {
                echo 0;
            }
        }

        else {
            $surveyId = $_GET["survey-id"];
            $sql = 'SELECT title, description FROM survey_set WHERE id = :survey_id';
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
}
