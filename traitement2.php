<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$guest_count = $_POST['guest_count'];
$event_type = $_POST['event_type'];
$message = $_POST['message'];

$message2 = "Nom: $name\n<br> Addresse mail: $email\n<br>
 Telephone: $phone\n<br> Date de l'evenement: $date\n<br>
  Nombre de personnes: $guest_count\n<br> Type d'evenement: $event_type\n<br> Plus d'information: $message\n";
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
    $mail->setFrom('from@example.com', 'Evenenement Maghali');
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