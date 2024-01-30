<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID = $_SESSION['SELLER_ID'];

if (!empty($_POST['CLIENT_CIN'])) {

    $CLIENT_CIN = mysqli_real_escape_string($conn, $_POST['CLIENT_CIN']);

    $AMOUNT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['AMOUNT'])));
    $DURATION = mysqli_real_escape_string($conn, $_POST['DURATION']);
    $MONTHLY = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['MONTHLY'])));
    $APP_FEES = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['APP_FEES'])));

    $ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['ADI'])));
    $COST_EX_ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['COST_EX_ADI'])));
    $TARIFF_ID = mysqli_real_escape_string($conn, $_POST['TARIFF_ID']);
    $DOWN_PMT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['DOWN_PMT'])));
    $DOWN_PMT_PERC = mysqli_real_escape_string($conn, $_POST['DOWN_PMT_PERC']);


    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if (!empty($_POST['CREDIT_ID'])) {
        $CREDIT_ID = mysqli_real_escape_string($conn, $_POST['CREDIT_ID']);
        $select_credit = "SELECT * FROM `credit_client` WHERE SELLER_ID='$SELLER_ID' AND CREDIT_ID='$CREDIT_ID'";
        $result_select_credit = $conn->query($select_credit);

        if ($result_select_credit->num_rows > 0) {
            //Mettre à jour le credit
        
            $update_query = "UPDATE `credit_client` SET `TARIFF_ID`='{$TARIFF_ID}',`STATE_LIB`='En attente',`AMOUNT`='{$AMOUNT}',`DURATION`='{$DURATION}',`MONTHLY`='{$MONTHLY}',`APP_FEES`='{$APP_FEES}',`DOWN_PMT_PERC`='{$DOWN_PMT_PERC}',`DOWN_PMT`='{$DOWN_PMT}',`ADI`='{$ADI}',`COST_EX_ADI`='{$COST_EX_ADI}',`UP_DATE`='{$today}' 
            WHERE CREDIT_ID='$CREDIT_ID' AND CLIENT_CIN='$CLIENT_CIN' AND SELLER_ID='$SELLER_ID'";

            $result_update = $conn->query($update_query);
            if (($result_update)) {
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$CREDIT_ID.'</b> , modifiée avec succès');        
            } else {
                $response = array('status' => 'error', 'message' => 'Echec de mise à jour du credit ');                        
            }

        }else{
            $response = array('status' => 'error', 'message' => 'Merci de verifier la référence du crédit ! ');              
        }
    } else {
        //Inserer le nouveau credit

        $query = "SELECT * FROM `slf_user_client` WHERE SELLER_ID = '{$SELLER_ID}' AND CLIENT_CIN='{$CLIENT_CIN}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            $insert_query = "INSERT INTO `credit_client`(`CREDIT_ID`, `TARIFF_ID`, `CLIENT_CIN`, `SELLER_ID`, `STATE`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`,`PROJECT`, `APP_FEES`, `DOWN_PMT_PERC`, `DOWN_PMT`, `ADI`, `COST_EX_ADI`, `UP_DATE`) 
    VALUES ('{$ran_id}','{$TARIFF_ID}','{$CLIENT_CIN}','{$SELLER_ID}',0,'En attente','{$AMOUNT}','{$DURATION}','{$MONTHLY}','CREDIT AUTO','{$APP_FEES}','{$DOWN_PMT_PERC}','{$DOWN_PMT}','{$ADI}','{$COST_EX_ADI}','{$today}')";


            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {
                
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$ran_id.' </b> , ajoutée avec succès');                        
            } else {
                $response = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');                              
            }
            
        } else {
            $response = array('status' => 'error', 'message' => 'Ce numéro <b>' . $CLIENT_CIN . '</b> n\'existe pas! <br> Merci  de vérifier !');                                          
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
