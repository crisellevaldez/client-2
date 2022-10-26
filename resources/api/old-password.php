<?php include 'connection.php';
session_start();
$id = $_SESSION['id'];
$password = $_POST['oPassword'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "SELECT * FROM users WHERE password =:password and id =:id";
    $statement = $conn->prepare($query);
    $statement->execute(
        array(
            'id' => $id,
            'password' => $password
        )
    );


    $rows = $statement->fetchAll();
    $num_rows = count($rows);
    if ($num_rows > 0) {
        echo 'true';
    } else {
        echo 'false';
    }
}
