<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID = $_SESSION['SELLER_ID'];

if (isset($_POST['confirmation']) && !empty($_POST['confirmation'])) {
    if (isset($_POST['CREDIT_ID']) && !empty($_POST['CREDIT_ID'])) {
        $CREDIT_ID = mysqli_real_escape_string($conn, $_POST['CREDIT_ID']);              
        

        $query_credit = $conn->prepare("DELETE FROM `credit_client` WHERE  SELLER_ID = ? AND CREDIT_ID = ?");
        $query_credit->bind_param("ss", $SELLER_ID, $CREDIT_ID);
        $result_credit = $query_credit->execute();

        if (($result_credit)) {
            echo "success";
        } else {
            echo "Echec de suppression, veuillez le réessayer plutard !";
            // echo $CREDIT_ID." n'est pas un sous votre autheur !";
        }
    } else {
        echo "Reference non trouver";
    }
} else {
    echo "Cochez la case de confirmation !";
}


