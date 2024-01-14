<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];

if (isset($_POST['confirmation']) && !empty($_POST['confirmation'])) {
    if (isset($_POST['CREDIT_ID_UK']) && !empty($_POST['CREDIT_ID_UK'])) {
        $CREDIT_ID_UK = mysqli_real_escape_string($conn, $_POST['CREDIT_ID_UK']);              
        

        $query_credit = $conn->prepare("DELETE FROM `credit_client` WHERE  SELLER_ID_UK = ? AND CREDIT_ID_UK = ?");
        $query_credit->bind_param("ss", $SELLER_ID_UK, $CREDIT_ID_UK);
        $result_credit = $query_credit->execute();

        if (($result_credit)) {
            echo "success";
        } else {
            echo "Echec de suppression, veuillez le réessayer plutard !";
            // echo $CREDIT_ID_UK." n'est pas un sous votre autheur !";
        }
    } else {
        echo "Reference non trouver";
    }
} else {
    echo "Cochez la case de confirmation !";
}


