<?php
session_start();
$email = $_SESSION['email'];

$state = 0;
include_once "./connectToDB.php";
$msg = "All input fields are required!";


$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$id_unique = mysqli_real_escape_string($conn, $_POST['id_unique']);

if (!empty($password2) && !empty($password)) {
    if ($password === $password2) {
        $password = md5($password);
        $query = "UPDATE `slf_user` SET `password`= '$password' WHERE id_unique = '{$id_unique}'";
        $result = $conn->query($query);

        if ($result) {

            echo 'Modification de mot de passe : successfully !';
            // header('location: ./sim-fx');
        } else {

            $_SESSION['sms'] = "Une erreur s'est produite, Veuillez réessayer ! ";
            $_SESSION['state'] = 1;
            // header('location: ./set-mdp?email=email');
        }
    } else {
        $_SESSION['sms'] = "Différence de mots de passe ! ";
        $_SESSION['state'] = 1;
        // header('location: ./set-mdp?email=email');
    }
} else {
    $_SESSION['sms'] = "Renseignez dans les deux champs";
    $_SESSION['state'] = 1;
    // header('location: ./set-mdp?email=email');
}

echo $_SESSION['sms'];