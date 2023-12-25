<?php
session_start();
include '../../connectToDB.php';
$seller_id = $_SESSION['seller_id'];

if (isset($_POST['confirmation']) && !empty($_POST['confirmation'])) {
    if (isset($_POST['cin']) && !empty($_POST['cin'])) {
        $cin = mysqli_real_escape_string($conn, $_POST['cin']);

        $select_query = "SELECT * FROM `slf_user_client` WHERE  cin='$cin' AND seller_id='$seller_id' ";
        $result_select = $conn->query($select_query);

        if ($result_select->num_rows > 0) {
            $client = $result_select->fetch_assoc();
            $client_id=$client['cin'];                        
            $conn->query("DELETE FROM `credit_client` WHERE client_id='$client_id' AND seller_id='$seller_id'");
            
            $cin_link = "images/" . $client['cin_piece'];
            $rib_link = "images/" . $client['rib_piece'];
            $adress_link = "images/" . $client['adress_piece'];

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
        

        $query_client = $conn->prepare("DELETE FROM `slf_user_client` WHERE  seller_id = ? AND cin = ?");
        $query_client->bind_param("ss", $seller_id, $cin);
        $result_client = $query_client->execute();

        // $query_client = "DELETE FROM `slf_user_client` WHERE  seller_id = '{$seller_id}' AND cin='{$cin}' ";
        // $result_client = $conn->query($query_client);
        if (($result_client)) {
            echo "success";
        } else {
            echo "Echec de suppression, veuillez le réessayer plutard !";
            // echo $cin." n'est pas un sous votre autheur !";
        }
    } else {
        echo "Identifiant inexistant";
    }
} else {
    echo "Cochez la case de confirmation !";
}


