<?php include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["code"])) {
        $email = $_POST["email"];
        $query = "SELECT * FROM users WHERE email =:email AND code =:code";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                'code' => $_POST["code"],
                'email' => $email
            )
        );

        $rows = $statement->fetchAll();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            $status = 1;
            $sql = "UPDATE users SET status = :status WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':status'=>$status, ':email'=>$email]);
    
            $_SESSION['id'] = $rows[0]["id"];
            $_SESSION['name'] = $rows[0]["firstname"]." ".$rows[0]["lastname"];
            $_SESSION['type'] = $rows[0]["type"];
            echo 1;
        } else {
            echo 0;
        }
    }

    else {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                'email' => $_POST["email"],
                'password' => $_POST["password"]
            )
        );

        $rows = $statement->fetchAll();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            if ($rows[0]["status"] == 0){
                echo 2;
            }

            else {
                $_SESSION['id'] = $rows[0]["id"];
                $_SESSION['name'] = $rows[0]["firstname"]." ".$rows[0]["lastname"];
                $_SESSION['type'] = $rows[0]["type"];
                echo 1;
            }
        } else {
            echo 0;
        }
    }
    
}


