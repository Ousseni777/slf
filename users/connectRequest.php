<?php
session_start();

include_once "../connectToDB.php";

$id_unique = mysqli_real_escape_string($conn, $_POST['id_unique']);
$cin = mysqli_real_escape_string($conn, $_POST['cin']);


if (!empty($id_unique) && !empty($cin)) {
    //Chercher dans la table agence

    $query = "SELECT *  FROM SLF_USER_SALAFIN  WHERE seller_id = '{$id_unique}' AND cin= '{$cin}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['seller_id'] = $user['seller_id'];
        $_SESSION['product'] = $user['product'];
        $product= $user['product'];

        $response = array('status' => 'success', 'message' => $product);
        echo json_encode($response);

    } else {
        //Chercher dans la table client

        $query = "SELECT *  FROM SLF_USER_CLIENT  WHERE client_id = '{$id_unique}' AND cin= '{$cin}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['client_id'] = $user['client_id'];

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