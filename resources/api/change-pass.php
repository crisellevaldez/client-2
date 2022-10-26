<?php include 'connection.php';
session_start();
$id = $_SESSION['id'];
$password = $_POST['password'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE users SET password = :password WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':password' => $password, ':id' => $id]);
    echo 1;
}
