<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];

if (!empty($_POST['author_id'])) {

    $author_id = mysqli_real_escape_string($conn, $_POST['author_id']);

    $BRAND = mysqli_real_escape_string($conn, $_POST['BRAND']);
    $PRODUCT = mysqli_real_escape_string($conn, $_POST['PRODUCT']);
    $TARIFF = mysqli_real_escape_string($conn, $_POST['TARIFF']);

    $AMOUNT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['AMOUNT'])));
    $DURATION = mysqli_real_escape_string($conn, $_POST['DURATION']);
    $MONTHLY = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['MONTHLY'])));
    $APP_FEES = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['APP_FEES'])));

    $ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['ADI'])));
    $COST_EX_ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['COST_EX_ADI'])));
    $TARIFF_ID_UK = mysqli_real_escape_string($conn, $_POST['TARIFF_ID_UK']);
    $DOWN_PMT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['DOWN_PMT'])));
    $DOWN_PMT_PERC = mysqli_real_escape_string($conn, $_POST['DOWN_PMT_PERC']);


    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if (!empty($_POST['CREDIT_ID_UK'])) {
        $CREDIT_ID_UK = mysqli_real_escape_string($conn, $_POST['CREDIT_ID_UK']);
        $select_credit = "SELECT * FROM `credit_client` WHERE SELLER_ID='$SELLER_ID_UK' AND CREDIT_ID_UK='$CREDIT_ID_UK'";
        $result_select_credit = $conn->query($select_credit);

        if ($result_select_credit->num_rows > 0) {
            //Mettre à jour le credit
        
            $update_query = "UPDATE `credit_client` SET `TARIFF_ID`='{$TARIFF_ID_UK}',`STATE_LIB`='En attente',`AMOUNT`='{$AMOUNT}',`DURATION`='{$DURATION}',`MONTHLY`='{$MONTHLY}',`APP_FEES`='{$APP_FEES}',`DOWN_PMT_PERC`='{$DOWN_PMT_PERC}',`DOWN_PMT`='{$DOWN_PMT}',`ADI`='{$ADI}',`COST_EX_ADI`='{$COST_EX_ADI}',`UP_DATE`='{$today}' 
            WHERE CREDIT_ID_UK='$CREDIT_ID_UK' AND CLIENT_ID='$author_id' AND SELLER_ID='$SELLER_ID_UK'";

            $result_update = $conn->query($update_query);
            if (($result_update)) {
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$CREDIT_ID_UK.'</b> , modifiée avec succès');        
            } else {
                $response = array('status' => 'error', 'message' => 'Echec de mise à jour du credit ');                        
            }

        }else{
            $response = array('status' => 'error', 'message' => 'Merci de verifier la référence du crédit ! ');              
        }
    } else {
        //Inserer le nouveau credit

        $query = "SELECT * FROM `slf_user_client` WHERE SELLER_ID = '{$SELLER_ID_UK}' AND CLIENT_CIN='{$author_id}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            $insert_query = "INSERT INTO `credit_client`(`CREDIT_ID_UK`, `TARIFF_ID`, `CLIENT_ID`, `SELLER_ID`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`, `APP_FEES`, `DOWN_PMT_PERC`, `DOWN_PMT`, `ADI`, `COST_EX_ADI`, `UP_DATE`) 
    VALUES ('{$ran_id}','{$TARIFF_ID_UK}','{$author_id}','{$SELLER_ID_UK}','En attente','{$AMOUNT}','{$DURATION}','{$MONTHLY}','{$APP_FEES}','{$DOWN_PMT_PERC}','{$DOWN_PMT}','{$ADI}','{$COST_EX_ADI}','{$today}')";


            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {
                
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$ran_id.' </b> , ajoutée avec succès');                        
            } else {
                $response = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');                              
            }
            
        } else {
            $response = array('status' => 'error', 'message' => 'Le CLIENT_CIN N°<b>' . $author_id . '</b> n\'est pas attribué à votre nom !');                                          
        }
    }
} else {
    $response = array('status' => 'error', 'message' => 'Veuillez attribuer un autheur à ce crédit !');                                  
}

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

?>