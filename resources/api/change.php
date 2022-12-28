<?php
session_start();
$id = $_SESSION['id'];
$email = $_POST['email'];
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../phpmailer/src/PHPMailer.php';
include '../phpmailer/src/SMTP.php';
include '../phpmailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["changeE"])) {
        $type = 2;
        $status = 0;
        $code = random_int(10000, 99999);

        $sql = "UPDATE users SET code=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $id]);

        $name = $_SESSION['name'];
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "dummyemailforclient@gmail.com";
        $mail->Password   = "sqldlersrimrmmiw";

        $mail->IsHTML(true);
        $mail->AddAddress($email, $name);
        $mail->SetFrom("dummyemailforclient@gmail.com", "John Doe");
        $mail->Subject = "Confirm your new email address.";
        $content = "Hello " . $name . "! To continue, please enter this code to confirm your new email address: <b>" . $code . "</b>";

        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo 0;
        }
    }

    else {
        $code = $_POST["email"];
        $query = "SELECT * FROM users WHERE id =:id AND code =:code";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                'code' => $_POST["code"],
                'id' => $id
            )
        );

        $rows = $statement->fetchAll();
        $num_rows = count($rows);
        if ($num_rows > 0) {
            $sql = "UPDATE users SET email = :email WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':email'=>$email, ':id'=>$id]);
            echo 1;
        } else {
            echo 0;
        }
    }
}
