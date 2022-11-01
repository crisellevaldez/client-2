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

else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST["title"];
    $desc = $_POST["description"];
    $sql = "INSERT INTO survey_set (title, description) VALUES (?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$title, $desc]);
    echo 1;
}
