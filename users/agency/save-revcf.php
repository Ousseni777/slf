<?php
session_start();
include '../../connectToDB.php';

$SELLER_ID = $_SESSION['SELLER_ID'];
$status = "error";
$msg = "Une erreur s'est produite !";

$rand_text1 = generateUniqueID(2);
$rand_text2 = generateUniqueID(1);
$ran_id = rand(time(), 100000000);
$ran_id = $rand_text1 . '-' . $ran_id . $rand_text2;

$insert_query = "INSERT INTO `revcf` (`REVCF_ID`) 
                            VALUES ('{$ran_id}')";

$result_insert = $conn->query($insert_query);
if (($result_insert)) {
    if (isset($_POST['MARQUE']) && !empty($_POST['MARQUE'])) {
        $MARQUE = mysqli_real_escape_string($conn, $_POST['MARQUE']);

        $update_query = "UPDATE `revcf` SET `MARQUE`='{$MARQUE}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données MARQUE! ";
        }
    }
    if (isset($_POST['PRODUIT']) && !empty($_POST['PRODUIT'])) {
        $PRODUIT = mysqli_real_escape_string($conn, $_POST['PRODUIT']);

        $update_query = "UPDATE `revcf` SET `PRODUIT`='{$PRODUIT}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données PRODUIT ! ";
        }
    }
    if (isset($_POST['BAREME']) && !empty($_POST['BAREME'])) {
        $BAREME = mysqli_real_escape_string($conn, $_POST['BAREME']);

        $update_query = "UPDATE `revcf` SET `BAREME`='{$BAREME}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données BAREME ! ";
        }
    }
    if (isset($_POST['MNT_DEMANDE']) && !empty($_POST['MNT_DEMANDE'])) {
        $MNT_DEMANDE = mysqli_real_escape_string($conn, $_POST['MNT_DEMANDE']);

        $update_query = "UPDATE `revcf` SET `MNT_DEMANDE`='{$MNT_DEMANDE}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données  MNT_DEMANDE! ";
        }
    }
    if (isset($_POST['DUREE']) && !empty($_POST['DUREE'])) {
        $DUREE = mysqli_real_escape_string($conn, $_POST['DUREE']);

        $update_query = "UPDATE `revcf` SET `DUREE`='{$DUREE}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données  DUREE! ";
        }
    }
    if (isset($_POST['MENSUALITE']) && !empty($_POST['MENSUALITE'])) {
        $MENSUALITE = mysqli_real_escape_string($conn, $_POST['MENSUALITE']);

        $update_query = "UPDATE `revcf` SET `MENSUALITE`='{$MENSUALITE}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données MENSUALITE ! ";
        }
    }
    if (isset($_POST['FRAISDOSS']) && !empty($_POST['FRAISDOSS'])) {
        $FRAISDOSS = mysqli_real_escape_string($conn, $_POST['FRAISDOSS']);

        $update_query = "UPDATE `revcf` SET `FRAISDOSS`='{$FRAISDOSS}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données FRAISDOSS ! ";
        }
    }
    if (isset($_POST['TAUXINT']) && !empty($_POST['TAUXINT'])) {
        $TAUXINT = $_POST['TAUXINT'];

        $update_query = "UPDATE `revcf` SET `TAUXINT`={$TAUXINT}
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données TAUXINT ! ";
        }
    }
    if (isset($_POST['COMMENT']) && !empty($_POST['COMMENT'])) {
        $COMMENT = mysqli_real_escape_string($conn, $_POST['COMMENT']);

        $update_query = "UPDATE `revcf` SET `COMMENT`='{$COMMENT}'
        WHERE `REVCF_ID`='{$ran_id}' ";

        $result_update = $conn->query($update_query);
        if (($result_update)) {
            $status = "success";            
        } else {
            $msg = "Echec de mise à jour des données COMMENT! ";
        }
    }

    if($status=="success"){
        $msg = "Demande de revision de condition financière envoyée avec succès";
    }else{        
        $conn->query("DELETE FROM `revcf` WHERE `REVCF_ID`='{$ran_id}'");
    }
} else {
    $msg = "Insertion failed";
}



$response = array('status' => $status, 'message' => $msg);
echo json_encode($response);

function generateUniqueID($k)
{
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $concat = '';
    for ($i = 0; $i < $k; $i++) {
        $concat = $concat . $alpha[rand(0, strlen($alpha) - 1)];
    }
    return $concat;
}
