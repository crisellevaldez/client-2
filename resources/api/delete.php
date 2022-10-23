<?php include 'connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $query = "SELECT * FROM answers WHERE question_id=?";
        $statement = $conn->prepare($query);
        $statement->execute([$id]);

        $rows = $statement->fetchAll();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            echo 0;
        }

        else {
            $sql = "DELETE FROM questions WHERE id=?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$id]);
            echo 1;
        }

    } else {
        $id = $_POST["id"];
        $query = "SELECT * FROM answers WHERE survey_id=?";
        $statement = $conn->prepare($query);
        $statement->execute([$id]);

        $rows = $statement->fetchAll();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            echo 0;
        }

        else {
            $sql = "DELETE FROM survey_set WHERE id=?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$id]);
            echo 1;
        }
    }
}
