<?php
session_start();
include '../../connectToDB.php';
$status = 'error';

$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$cin = mysqli_real_escape_string($conn, $_POST['cin']);
$income = mysqli_real_escape_string($conn, $_POST['income']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$town = mysqli_real_escape_string($conn, $_POST['town']);


if (isset($_POST['flagUpdate'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    //Mise à jour des données clients
    $client_id = $_SESSION['client_id'];
    if (!empty($lname) && !empty($fname) && !empty($title) && !empty($cin) && !empty($income)) {
        
        $shouldUpdated = true;
        $select_query = "SELECT * FROM `slf_user_client` WHERE  client_id='$client_id'  ";
        $result_select = $conn->query($select_query);

        if ($result_select->num_rows > 0) {
            $client = $result_select->fetch_assoc();
            $old_cin = $client['cin'];
            $old_email = $client['email'];

            if ($email != $old_email) {
                $select_query = "SELECT * FROM `slf_user_client` WHERE  email= '$email'   ";
                $result_select = $conn->query($select_query);
                if ($result_select->num_rows > 0) {
                    $shouldUpdated = false;
                    $msg = $email . " existe pour un autre compte ! <br> Si c'est le votre, merci de vous reconnecter à ce compte";
                }
            }
            if ($cin != $old_cin) {
                $select_query = "SELECT * FROM `slf_user_client` WHERE  cin= '$cin' ";
                $result_select = $conn->query($select_query);
                if ($result_select->num_rows > 0) {
                    $shouldUpdated = false;
                    $msg = $cin . " existe pour un autre compte ! <br> Si c'est le votre, merci de vous reconnecter à ce compte";
                }
            }
            if ($shouldUpdated) {
                $update_query = "UPDATE `slf_user_client` SET `email`='{$email}',`phone`='{$phone}',`lname`='{$lname}',`fname`='{$fname}',`title`='{$title}',`cin`='{$cin}',`income`='{$income}',`region`='{$region}',`town`='{$town}'
        WHERE client_id='$client_id' ";

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
    $client_id = $_SESSION['client_id_temp'];
    if (!empty($lname) && !empty($fname) && !empty($title) && !empty($cin) && !empty($income)) {

        $select_query_temp = "SELECT * FROM `temp_verification` WHERE id_unique= '$client_id' ";
        $result_select_temp = $conn->query($select_query_temp);

        if ($result_select_temp->num_rows > 0) {
            $data_tempo = $result_select_temp->fetch_assoc();
            $email = $data_tempo['email'];
            $phone = $data_tempo['phone'];

            $insert_query = "INSERT INTO `slf_user_client` (`client_id`,`seller_id`, `email`, `phone`, `lname`, `fname`, `title`, `cin`, `income`, `region`, `town`) 
            VALUES ('{$client_id}','ANONYME','{$email}','{$phone}','{$lname}','{$fname}','{$title}','{$cin}','{$income}','{$region}','{$town}')";

            $result_insert = $conn->query($insert_query);
            if (($result_insert)) {
                //Retirer l'utilisateur de la table temporaire
                // $delete_query = "DELETE FROM `temp_verification` WHERE id_unique= '$client_id' ";
                // $conn->query($delete_query);
                unset($_SESSION['client_id_temp']);
                $_SESSION['client_id'] = $client_id;
                $status = "success";
                $msg = "Vos informations ont bien été envoyées ! <br> Merci de nous communiquer les justificatifs ! <br> Votre identifiant unique est : <b> " . $client_id . "</b>, vous pouvez vous connecter à tout moment en utilisant cet identifiant et votre CIN";
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






