<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include_once "./connectToDB.php";

$email= $_GET['email'];
$emailHached= md5($email);
$link ="http://localhost/Simulation/set-mdp?email=".$emailHached;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com'; // Serveur SMTP d'Outlook
    $mail->SMTPAuth   = true;
    $mail->Username   = 'serveurqlickview@outlook.fr'; // Votre adresse e-mail Outlook
    $mail->Password   = 'sql$2022'; // Votre mot de passe Outlook
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('serveurqlickview@outlook.fr', ' BORO OUSS ');
    $mail->addAddress('boro7ousseni@gmail.com', 'BORO');

    $mail->isHTML(true);
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body    = 'Contenu de l\'e-mail au format HTML.'. $link;

    $mail->send();
    echo 'E-mail envoyé avec succès';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
?>
