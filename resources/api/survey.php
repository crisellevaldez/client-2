<?php include 'connection.php';

$id = 2;
$surveyId = $_POST["surveyId"];
$count = count($_POST)-2;


$sql = "INSERT INTO answers (survey_id, user_id, answer, question_id) VALUES (?,?,?,?)";

for ($i=0; $i<$count; $i++) {
    $quesId = $_POST["question"][$i];
    $answer = $_POST["question-".$quesId];
    $stmt= $conn->prepare($sql);
    $stmt->execute([$surveyId, $id, $answer, $quesId]);
}

echo 1;



