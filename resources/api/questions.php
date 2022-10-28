<?php include 'connection.php';
session_start();
$survey_id = $_GET['surveyId'];
$id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $date = date("Y-m-01");
  $date1 = date("Y-m-d", strtotime("+1 month", strtotime($date)));
  $sql = 'SELECT * FROM answers WHERE survey_id= :survey_id AND user_id=:user_id AND date_created >= :date and date_created < :date1';
  $stmt = $conn->prepare($sql);
  $stmt->execute(array(
      ':survey_id' => $survey_id,
      ':user_id' => $id,
      ':date' => $date,
      ':date1' => $date1
  ));

  if ($stmt->rowCount() > 0) {
      echo 2;
  } else {
    $sql = 'SELECT questions.id, questions.question, survey_set.title, survey_set.description FROM questions INNER JOIN survey_set ON questions.survey_id = survey_set.id WHERE questions.survey_id= :survey_id';
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $arr_ques = array ();
    if ($questions) {
      foreach ($questions as $question) {
        $arr_ques[] = $question;
      }

      echo json_encode($arr_ques);
    }

    else {
      echo 0;
    }
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


