<?php include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../phpmailer/src/PHPMailer.php';
include '../phpmailer/src/SMTP.php';
include '../phpmailer/src/Exception.php';

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$middlename = $_POST['middleName'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$age = $_POST['age'];

$type = 2;
$status = 0;
$code = random_int(10000, 99999);

$sql = "INSERT INTO users (firstname, lastname, middlename, gender, age, email, password, type, status, code) VALUES (?,?,?,?,?,?,?,?,?,?)";
$stmt= $conn->prepare($sql);
$stmt->execute([$firstname, $lastname, $middlename, $gender, $age, $email, $password, $type, $status, $code]);

$name = $firstname." ".$lastname;
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
$mail->Subject = "Activate your account.";
$content = "Hello ".$name."! To continue, please enter this code to activate your account: <b>".$code."</b>";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo 0;
}
