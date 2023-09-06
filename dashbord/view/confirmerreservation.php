<?php
require_once '../controller/reservationc.php';
$id=$_GET["id"];
$reservationc=new Reservationc();$reservationc->confirmerreservation($id);
$ress=$reservationc->getreservation($id);
$user=$reservationc->getuser($ress['iduser']);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'oumaima.benhadid@esprit.tn';                     // SMTP username
    $mail->Password = 'Azerty1234';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('oumaima.benhadid@esprit.tn', 'Admin');
    $mail->addAddress($user['email']);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation Reservation';
    $mail->Body = 'Cher/Chère  Client,
Nous avons le plaisir de vous confirmer que nous avons bien reçu votre réservation .
Votre réservation a été traitée avec succès et nous nous réjouissons de vous accueillir à notre événement.
Si vous avez des questions ou des préoccupations, nhésitez pas à nous contacter.
Merci davoir choisi notre événement.';
    $mail->send();
    echo "<script>alert('Message has been sent, check your email')</script>";

    echo 'Message has been sent, check your email';
} catch (Exception $e) {

    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
}

//header("Location: ../view/afficherreservation.php?id=".$ress['idseance']);
?>