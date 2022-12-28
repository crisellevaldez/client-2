<?php include 'connection.php';
session_start();
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["survey-id"])) {
        
        $surveyId = $_GET["survey-id"];
        $date = $_GET["date"];
        $sql = 'SELECT SUM(answers.answer) as result, survey_set.id, survey_set.title, survey_set.description FROM answers INNER JOIN survey_set ON answers.survey_id = survey_set.id WHERE answers.user_id= :user_id and survey_set.id = :survey_id and answers.date_created = :date GROUP BY survey_set.id, survey_set.title, survey_set.description';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['user_id' => $id, 'survey_id' => $surveyId, 'date' => $date]);
        $rows = $stmt->fetchAll();

        $results = array();
        $num_rows = count($rows);

        if ($num_rows > 0) {
            $sql1 = 'SELECT COUNT(id) as questions FROM answers WHERE survey_id = :survey_id and user_id = :user_id and date_created = :date';
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute(['survey_id' => $surveyId, 'user_id' => $id, 'date' => $date]);
            $rows1 = $stmt1->fetch();
            foreach ($rows as $row) {
                $results[] = $row;
            }

            $new_arr = array();
            $new_arr[] = $results;
            $new_arr[] = $rows1;
            echo json_encode($new_arr);
        }

        else {
            echo 0;
        }

    } else {
        $sql = 'SELECT SUM(answers.answer) as result, survey_set.id, survey_set.title, survey_set.description FROM answers INNER JOIN survey_set ON answers.survey_id = survey_set.id WHERE answers.user_id= :user_id GROUP BY survey_set.id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['user_id' => $id]);
        $rows = $stmt->fetchAll();

        $results = array();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            foreach ($rows as $row) {
                $results[] = $row;
            }
            echo json_encode($results);
        }

        else {
            echo 0;
        }
    }
}
