<?php
session_start();
include '../../connectToDB.php';
$seller_id = $_SESSION['seller_id'];

if (!empty($_POST['author'])) {

    $author_id = mysqli_real_escape_string($conn, $_POST['author']);

    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $product = mysqli_real_escape_string($conn, $_POST['product']);
    $tariff = mysqli_real_escape_string($conn, $_POST['tariff']);

    $amount = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['amount'])));
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $monthly = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['monthly'])));
    $app_fees = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['app_fees'])));

    $adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['adi'])));
    $cost_ex_adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['cost_ex_adi'])));
    $tariff_id = mysqli_real_escape_string($conn, $_POST['tariff_id']);
    $down_pmt = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['down_pmt'])));
    $down_pmt_perc = mysqli_real_escape_string($conn, $_POST['down_pmt_perc']);


    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if (!empty($_POST['credit_id'])) {
        $credit_id = mysqli_real_escape_string($conn, $_POST['credit_id']);
        $select_credit = "SELECT * FROM `credit_client` WHERE seller_id='$seller_id' AND credit_id='$credit_id'";
        $result_select_credit = $conn->query($select_credit);

        if ($result_select_credit->num_rows > 0) {
            //Mettre à jour le credit
        
            $update_query = "UPDATE `credit_client` SET `tariff_id`='{$tariff_id}',`state`='En attente',`amount`='{$amount}',`duration`='{$duration}',`monthly`='{$monthly}',`app_fees`='{$app_fees}',`down_pmt_perc`='{$down_pmt_perc}',`down_pmt`='{$down_pmt}',`adi`='{$adi}',`cost_ex_adi`='{$cost_ex_adi}',`up_date`='{$today}' 
            WHERE credit_id='$credit_id' AND client_id='$author_id' AND seller_id='$seller_id'";

            $result_update = $conn->query($update_query);
            if (($result_update)) {
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$credit_id.'</b> , modifiée avec succès');        
            } else {
                $response = array('status' => 'error', 'message' => 'Echec de mise à jour du credit ');                        
            }

        }else{
            $response = array('status' => 'error', 'message' => 'Merci de verifier la référence du crédit ! ');              
        }
    } else {
        //Inserer le nouveau credit

        $query = "SELECT * FROM `slf_user_client` WHERE seller_id = '{$seller_id}' AND cin='{$author_id}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {

            $insert_query = "INSERT INTO `credit_client`(`credit_id`, `tariff_id`, `client_id`, `seller_id`, `state`, `amount`, `duration`, `monthly`, `app_fees`, `down_pmt_perc`, `down_pmt`, `adi`, `cost_ex_adi`, `up_date`) 
    VALUES ('{$ran_id}','{$tariff_id}','{$author_id}','{$seller_id}','En attente','{$amount}','{$duration}','{$monthly}','{$app_fees}','{$down_pmt_perc}','{$down_pmt}','{$adi}','{$cost_ex_adi}','{$today}')";


            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {
                
                $response = array('status' => 'success', 'message' => 'Demande N°: <b>'.$ran_id.' </b> , ajoutée avec succès');                        
            } else {
                $response = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');                              
            }
            
        } else {
            $response = array('status' => 'error', 'message' => 'Le CIN N°<b>' . $author_id . '</b> n\'est pas attribué à votre nom !');                                          
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