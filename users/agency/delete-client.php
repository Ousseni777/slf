<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID = $_SESSION['SELLER_ID'];

if (isset($_POST['confirmation']) && !empty($_POST['confirmation'])) {
    if (isset($_POST['CLIENT_CIN']) && !empty($_POST['CLIENT_CIN'])) {
        $CLIENT_CIN = mysqli_real_escape_string($conn, $_POST['CLIENT_CIN']);

        $select_query = "SELECT * FROM `slf_user_client` WHERE  CLIENT_CIN='$CLIENT_CIN' AND SELLER_ID='$SELLER_ID' ";
        $result_select = $conn->query($select_query);

        if ($result_select->num_rows > 0) {
            $client = $result_select->fetch_assoc();
            $CLIENT_ID=$client['CLIENT_CIN'];                        
            $conn->query("DELETE FROM `credit_client` WHERE CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID'");
            
            $cin_link = "images/" . $client['CIN_PIECE'];
            $rib_link = "images/" . $client['RIB_PIECE'];
            $adress_link = "images/" . $client['ADRESS_PIECE'];

            // Utilisez unlink pour supprimer le fichier
          
            if (file_exists($cin_link)){
                if (!unlink($cin_link)) {               
                    echo "Échec de la suppression du : ".$cin_link ;
                }
            }
            if (file_exists($rib_link)){
                if (!unlink($rib_link)) {               
                    echo "Échec de la suppression du : ".$rib_link ;
                }
            }
            if (file_exists($adress_link)){
                if (!unlink($adress_link)) {               
                    echo "Échec de la suppression du : ".$adress_link ;
                }
            }
            
            
            
        }        
        

        $query_client = $conn->prepare("DELETE FROM `slf_user_client` WHERE  SELLER_ID = ? AND CLIENT_CIN = ?");
        $query_client->bind_param("ss", $SELLER_ID, $CLIENT_CIN);
        $result_client = $query_client->execute();

        // $query_client = "DELETE FROM `slf_user_client` WHERE  SELLER_ID = '{$SELLER_ID}' AND CLIENT_CIN='{$CLIENT_CIN}' ";
        // $result_client = $conn->query($query_client);
        if (($result_client)) {
            echo "success";
        } else {
            echo "Echec de suppression, veuillez le réessayer plutard !";
            // echo $CLIENT_CIN." n'est pas un sous votre autheur !";
        }
    } else {
        echo "Identifiant inexistant";
    }
} else {
    echo "Cochez la case de confirmation !";
}


