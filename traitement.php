<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$people = $_POST['people'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

$message2 = "Nom: $name\n<br> Téléphone: $phone\n<br> Email: $email\n<br> Convives: $people\n<br> Date: $date\n<br> Temps: $time\n<br> Avis du client: $message\n";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'muhindoirenction@gmail.com';                     //SMTP username
    $mail->Password   = 'pvni owre ppwe slgg';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Reservation Maghali');
    $mail->addAddress('lumooaaron@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message2;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message envoyé avec succès';
} catch (Exception $e) {
    echo "Échec de l’envoi. Veuillez réessayer : {$mail->ErrorInfo}";
}