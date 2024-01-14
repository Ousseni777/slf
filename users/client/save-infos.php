<?php
session_start();
include '../../connectToDB.php';
$status = 'error';

$LNAME = mysqli_real_escape_string($conn, $_POST['LNAME']);
$FNAME = mysqli_real_escape_string($conn, $_POST['FNAME']);
$TITLE = mysqli_real_escape_string($conn, $_POST['TITLE']);
$CLIENT_CIN = mysqli_real_escape_string($conn, $_POST['CLIENT_CIN']);
$INCOME = mysqli_real_escape_string($conn, $_POST['INCOME']);
$REGION = mysqli_real_escape_string($conn, $_POST['REGION']);
$TOWN = mysqli_real_escape_string($conn, $_POST['TOWN']);


if (isset($_POST['flagUpdate']) && !empty($_POST['flagUpdate']) ) {
    $EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
    $PHONE = mysqli_real_escape_string($conn, $_POST['PHONE']);
    //Mise à jour des données clients
    $CLIENT_ID_UK = $_SESSION['CLIENT_ID_UK'];
    if (!empty($LNAME) && !empty($FNAME) && !empty($TITLE) && !empty($CLIENT_CIN) && !empty($INCOME)) {
        
        $shouldUpdated = true;
        $select_query = "SELECT * FROM `slf_user_client` WHERE  CLIENT_ID_UK='$CLIENT_ID_UK'  ";
        $result_select = $conn->query($select_query);

        if ($result_select->num_rows > 0) {
            $client = $result_select->fetch_assoc();
            $old_cin = $client['CLIENT_CIN'];
            $old_email = $client['EMAIL'];

            if ($EMAIL != $old_email) {
                $select_query = "SELECT * FROM `slf_user_client` WHERE  EMAIL= '$EMAIL'   ";
                $result_select = $conn->query($select_query);
                if ($result_select->num_rows > 0) {
                    $shouldUpdated = false;
                    $msg = $EMAIL . " existe pour un autre compte ! <br> Si c'est le votre, merci de vous reconnecter à ce compte";
                }
            }
            if ($CLIENT_CIN != $old_cin) {
                $select_query = "SELECT * FROM `slf_user_client` WHERE  CLIENT_CIN= '$CLIENT_CIN' ";
                $result_select = $conn->query($select_query);
                if ($result_select->num_rows > 0) {
                    $shouldUpdated = false;
                    $msg = $CLIENT_CIN . " existe pour un autre compte ! <br> Si c'est le votre, merci de vous reconnecter à ce compte";
                }
            }
            if ($shouldUpdated) {
                $update_query = "UPDATE `slf_user_client` SET `EMAIL`='{$EMAIL}',`PHONE`='{$PHONE}',`LNAME`='{$LNAME}',`FNAME`='{$FNAME}',`TITLE`='{$TITLE}',`CLIENT_CIN`='{$CLIENT_CIN}',`INCOME`='{$INCOME}',`REGION`='{$REGION}',`TOWN`='{$TOWN}'
        WHERE CLIENT_ID_UK='$CLIENT_ID_UK' ";

                $result_update = $conn->query($update_query);
                if (($result_update)) {
                    $status = 'success';
                    $msg = " Données modifiées avec succès !";
                } else {
                    $msg = "Echec de mise à jour des données ! ";
                }
            }

        } else {
            $msg = "Une erreur s'est produite ! <br> Merci d'actualiser la page ! ";
        }



    } else {
        $msg = "Tous les champs sont requis !";
    }
} else {
    
    //insertion nouvelle des données clients
    $CLIENT_ID_UK_TEMP = $_SESSION['CLIENT_ID_UK_TEMP'];
    if (!empty($LNAME) && !empty($FNAME) && !empty($TITLE) && !empty($CLIENT_CIN) && !empty($INCOME)) {

        $select_query_temp = "SELECT * FROM `temp_verification` WHERE CLIENT_ID_UK_TEMP= '$CLIENT_ID_UK_TEMP' ";
        $result_select_temp = $conn->query($select_query_temp);

        if ($result_select_temp->num_rows > 0) {
            $data_tempo = $result_select_temp->fetch_assoc();
            $EMAIL = $data_tempo['EMAIL_TEMP'];
            $PHONE = $data_tempo['PHONE_TEMP'];

            $insert_query = "INSERT INTO `slf_user_client` (`CLIENT_ID_UK`,`SELLER_ID`, `EMAIL`, `PHONE`, `LNAME`, `FNAME`, `TITLE`, `CLIENT_CIN`, `INCOME`, `REGION`, `TOWN`) 
            VALUES ('{$CLIENT_ID_UK_TEMP}','ANONYME','{$EMAIL}','{$PHONE}','{$LNAME}','{$FNAME}','{$TITLE}','{$CLIENT_CIN}','{$INCOME}','{$REGION}','{$TOWN}')";

            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {
                //Retirer l'utilisateur de la table temporaire
                // $delete_query = "DELETE FROM `temp_verification` WHERE id_unique= '$CLIENT_ID_UK' ";
                // $conn->query($delete_query);
                unset($_SESSION['CLIENT_ID_UK_TEMP']);
                $_SESSION['CLIENT_ID_UK'] = $CLIENT_ID_UK_TEMP;
                $status = "success";
                $msg = "Vos informations ont bien été envoyées ! <br> Merci de nous communiquer les justificatifs ! <br> Votre identifiant unique est : <b> " . $CLIENT_ID_UK_TEMP . "</b>, vous pouvez vous connecter à tout moment en utilisant cet identifiant et votre CIN";
            } else {
                $msg = "Insertion failed";
            }
        } else {
            $msg = "Pas de données temporaire ";
        }
    } else {
        $msg = "Tous les champs sont requis !";
    }

}

$response = array('status' => $status, 'message' => $msg);
echo json_encode($response);






