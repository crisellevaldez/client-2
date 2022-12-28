<?php include 'connection.php';
session_start();

$sql = 'SELECT * FROM survey_set';
$stmt = $conn->prepare($sql);

$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$arr_ques = array();
if ($questions) {
    foreach ($questions as $question) {
        $arr_ques[] = $question;
    }

    echo json_encode($arr_ques);
} else {
    echo 0;
}
