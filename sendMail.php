<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include_once "./connectToDB.php";

$email= $_GET['email'];
$emailHached= md5($email);
$link ="http://localhost/Simulation/charte?email=".$emailHached;

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
    $mail->Subject = 'VERIFICATION DE MAIL!';
    $html='<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container col-6 mt-5">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Bonjour !</h4>
        <p>Afin de poursuivre votre inscription merci de cliquer sur <a href="'.$link.'"> ce lien</a> </p>
       
        <p> Ou </p>
       
        <p> Copiez cet url ci-dessous et le coller dans un navigateur web </p>
        <p> Url : '.$link.' </p>
        <p class="mb-0">Merci de nous contacter.</p>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
    $mail->Body    = $html;

    $mail->send();
    $state=1;

    
    echo 'E-mail envoyé avec succès';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    $state= 0;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Succès</title>
  <!-- Ajoutez les liens vers les fichiers CSS de Bootstrap -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php if($state){  
    $_SESSION["sms"]='<div class="container col-12 mt-5">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Votre formulaire a été envoyé avec succès. !</h4>
      <p>Un mail de vérification vous a été envoyé, veuillez consulter votre e-mail.</p>
      <hr>
      <p class="mb-0">Merci de nous contacter.</p>
    </div>
  </div>';
 } else {
    $_SESSION['sms']="Une erreur s'est rpoduite, Veuillez le réessayer plutard ! ";
    
}  
$_SESSION["state"]= $state;
header("location: ./register");
?>
</body>
</html>

