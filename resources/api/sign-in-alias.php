<?php include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["alias"])) {
        $_SESSION["alias"] = $_POST["alias"];
        echo 1;
    }
    
}


