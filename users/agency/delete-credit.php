<?php
session_start();
include '../../connectToDB.php';
$seller_id = $_SESSION['seller_id'];

if (isset($_POST['confirmation']) && !empty($_POST['confirmation'])) {
    if (isset($_POST['credit_id']) && !empty($_POST['credit_id'])) {
        $credit_id = mysqli_real_escape_string($conn, $_POST['credit_id']);              
        

        $query_credit = $conn->prepare("DELETE FROM `credit_client` WHERE  seller_id = ? AND credit_id = ?");
        $query_credit->bind_param("ss", $seller_id, $credit_id);
        $result_credit = $query_credit->execute();

        if (($result_credit)) {
            echo "success";
        } else {
            echo "Echec de suppression, veuillez le réessayer plutard !";
            // echo $credit_id." n'est pas un sous votre autheur !";
        }
    } else {
        echo "Reference non trouver";
    }
} else {
    echo "Cochez la case de confirmation !";
}


