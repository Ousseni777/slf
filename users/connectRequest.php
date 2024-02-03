<?php
session_start();

include_once "../connectToDB.php";

$ID_UK = mysqli_real_escape_string($conn, $_POST['ID_UK']);
$CIN = mysqli_real_escape_string($conn, $_POST['CIN']);


if (!empty($ID_UK) && !empty($CIN)) {
    //Chercher dans la table agence

    $query = "SELECT *  FROM SLF_USER_SALAFIN  WHERE SELLER_ID = '{$ID_UK}' AND SELLER_CIN= '{$CIN}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['ACTIVATE_STATE'] == 1) {
            $_SESSION['SELLER_ID'] = $user['SELLER_ID'];
            $_SESSION['ENTITE'] = $user['ENTITE'];
            $ENTITE = $user['ENTITE'];

            $response = array('status' => 'success', 'message' => $ENTITE);
            echo json_encode($response);
        }else{
            $response = array('status' => 'error', 'message' => 'Votre compte n\'est pas encore activé !');
            echo json_encode($response);
        }

    } else {
        //Chercher dans la table client

        $query = "SELECT *  FROM SLF_USER_CLIENT  WHERE CLIENT_ID = '{$ID_UK}' AND CLIENT_CIN= '{$CIN}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['CLIENT_ID'] = $user['CLIENT_ID'];

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