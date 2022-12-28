<?php include 'connection.php';
session_start();
$survey_id = $_GET['surveyId'];
$id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = 'SELECT * FROM `survey_set` LEFT OUTER JOIN `questions` ON `questions`.`survey_id` = `survey_set`.`id` WHERE survey_set.id= :survey_id';
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($questions) {

      $sql1 = 'SELECT * FROM answers WHERE survey_id = :survey_id';
      $stmt1 = $conn->prepare($sql1);
      $stmt1->execute(['survey_id' => $survey_id]);
      $rows1 = $stmt1->fetchAll();

      $new_arr = array();
      $new_arr[] = $questions;
      $new_arr[] = $rows1;

      echo json_encode($new_arr);
    }

    else {
      echo 0;
    }
}

/*else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $ques = $_POST['question'];
  $id = $_POST['id'];

  $stmt = $conn->prepare("UPDATE questions SET question=? WHERE id=?");
  $stmt->bind_param("si", $ques, $id);
  $result = $stmt->execute();
  
  if ($stmt->execute() === TRUE) {
    echo json_encode($_POST);
  } else {
    echo "Error updating record: " . $conn->error;
  }

}*/


