<?php include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "SELECT * FROM users WHERE email =:email";
    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            'email' => $_POST["email"]
        )
    );


    $rows = $statement->fetchAll();
    $num_rows = count($rows);
    if ($num_rows > 0) {
        echo 'false';
    } else {
        echo 'true';
    }
}
