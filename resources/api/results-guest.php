<?php include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["survey-id"])) {
        
        $surveyId = $_GET["survey-id"];
        $score = $_SESSION['score'];

        if ($score > 0) {
            $sql1 = 'SELECT COUNT(id) as questions FROM questions WHERE survey_id = :survey_id';
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute(['survey_id' => $surveyId]);
            $rows1 = $stmt1->fetch();
    
            $new_arr = array();
            $new_arr[] = $score;
            $new_arr[] = $rows1;
            echo json_encode($new_arr);
        }

        else {
            echo 0;
        }

    }
}
