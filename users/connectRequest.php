<?php
session_start();

include_once "../connectToDB.php";

$ID_UK = mysqli_real_escape_string($conn, $_POST['ID_UK']);
$CIN = mysqli_real_escape_string($conn, $_POST['CIN']);


if (!empty($ID_UK) && !empty($CIN)) {
    //Chercher dans la table agence

    $query = "SELECT *  FROM SLF_USER_SALAFIN  WHERE SELLER_ID_UK = '{$ID_UK}' AND SELLER_CIN= '{$CIN}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['SELLER_ID_UK'] = $user['SELLER_ID_UK'];
        $_SESSION['PRODUCT'] = $user['PRODUCT'];
        $PRODUCT= $user['PRODUCT'];

        $response = array('status' => 'success', 'message' => $PRODUCT);
        echo json_encode($response);

    } else {
        //Chercher dans la table client

        $query = "SELECT *  FROM SLF_USER_CLIENT  WHERE CLIENT_ID_UK = '{$ID_UK}' AND CLIENT_CIN= '{$CIN}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['CLIENT_ID_UK'] = $user['CLIENT_ID_UK'];

            $response = array('status' => 'success', 'message' => 'CLIENT');
            echo json_encode($response);

        } else {
            //Chercher dans la table client
            $response = array('status' => 'error', 'message' => 'Mot de passe ou Identifiant incorrect');
            echo json_encode($response);
        }        
    }
} else {
    //Chercher dans la table client
    $response = array('status' => 'error', 'message' => 'Tous les champs sont requis');
    echo json_encode($response);
}

?>