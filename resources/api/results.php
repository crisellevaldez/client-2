<?php include 'connection.php';
session_start();

$id = $_SESSION["id"];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->prepare("SELECT SUM(answer) as result FROM answers WHERE user_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt -> store_result();
    $stmt -> bind_result($sum);
    $stmt -> fetch();
    
    echo $sum;
}
