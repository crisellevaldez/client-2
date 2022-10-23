<?php include 'connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["add"])) {
        $id = $_POST["id"];
        $question = $_POST["question"];
        $sql = "INSERT INTO questions (question, survey_id) VALUES (?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$question, $id]);
        echo 1;
    } else {
        $title = $_POST['surveyTitle'];
        $desc = $_POST['surveyDesc'];
        $id = $_POST['surveyId'];
        $sql = "UPDATE survey_set SET title=?, description=? WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$title, $desc, $id]);
        echo 1;
    }
}
