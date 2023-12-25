<?php
session_start();
include '../connectToDB.php';

$project = mysqli_real_escape_string($conn, $_POST['project']);

$amount = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['amount'])));
$duration =  mysqli_real_escape_string($conn, $_POST['duration']);
$monthly = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['monthly'])));
$app_fees = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['app_fees'])));


$rand_text = generateUniqueID(2);
$ran_id = rand(time(), 100000000);
$ran_id = $rand_text . '-' . $ran_id;
$today = new DateTime();
$today = $today->format('Y-m-d');

$insert_query ="INSERT INTO `credit_client_perso`(`credit_id`, `client_id`, `seller_id`, `state`, `amount`, `duration`, `monthly`, `app_fees`, `up_date`, `project`) 
VALUES ('{$ran_id}','{$ran_id}','{$ran_id}','tempo','{$amount}','{$duration}','{$monthly}','{$app_fees}','{$today}','{$project}')";

$result_insert = $conn->query($insert_query);
if (($result_insert)) {
    $_SESSION['credit_id_temp']=$ran_id;
    $_SESSION['project_temp']=$project;
    $msg = "success";
} else {
    $msg = "SUne erreur est survenue, merci de réessayer encore !";
}

echo $msg;

function generateUniqueID($k)
{
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $concat = '';
    for ($i = 0; $i < $k; $i++) {
        $concat = $concat . $alpha[rand(0, strlen($alpha) - 1)];
    }
    return $concat;
}

?>