<?php include 'connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["counts"])) {

        $array = array();
        $sql = "SELECT COUNT(id) as count FROM users WHERE gender='Male'";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $male = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $array[0] = $male;
        $sql = "SELECT COUNT(id) as count FROM users WHERE gender='Male'";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $female = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $array[1] = $female;
        echo json_encode($array);
    } else {

        $question_id = $_GET['id'];
        $sql = 'SELECT * FROM answers WHERE question_id=:question_id';
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':question_id', $question_id, PDO::PARAM_INT);
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
    }
}
