<?php include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $sql = 'SELECT * FROM survey_set';
  $stmt = $conn->query($sql);
  $surveys = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $arr_survey = array ();
  if ($surveys) {
    foreach ($surveys as $survey) {
      $arr_survey[] = $survey;
    }

    echo json_encode($arr_survey);
  }
}
