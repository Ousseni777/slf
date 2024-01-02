<?php
session_start();
include '../../connectToDB.php';

if (isset($_SESSION['client_id_temp'])) {

    $client_id = $_SESSION['client_id_temp'];
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $cin = mysqli_real_escape_string($conn, $_POST['cin']);
    $income = mysqli_real_escape_string($conn, $_POST['income']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $town = mysqli_real_escape_string($conn, $_POST['town']);

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
                $_SESSION['client_id']=$client_id;
                echo "success";
            } else {
                echo "Insertion failed";
            }
        } else {
            echo "Pas de données temporaire ";
        }



    } else {
        echo "Tous les champs sont requis !";
    }


}


