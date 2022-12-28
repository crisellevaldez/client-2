<?php include 'connection.php';
session_start();

$surveyId = $_POST["surveyId"];
$count = count($_POST)-2;

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "INSERT INTO answers (survey_id, user_id, answer, question_id) VALUES (?,?,?,?)";

    for ($i=0; $i<$count; $i++) {
        $quesId = $_POST["question"][$i];
        $answer = $_POST["question-".$quesId];
        $stmt= $conn->prepare($sql);
        $stmt->execute([$surveyId, $id, $answer, $quesId]);
    }

    echo 1;
}

else {
    $score = 0;
    for ($i=0; $i<$count; $i++) {
        $quesId = $_POST["question"][$i];
        $answer = $_POST["question-".$quesId];
        $score += $answer;
    }

    $_SESSION['score'] = $score;
    echo $_SESSION['score'];
}