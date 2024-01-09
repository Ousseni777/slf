<?php
session_start();
$client_id = $_SESSION['client_id'];
include '../../connectToDB.php';


$img_name_cin = $_FILES['yourCIN']['name'];
$img_type_cin = $_FILES['yourCIN']['type'];
$tmp_name_cin = $_FILES['yourCIN']['tmp_name'];

$img_name_rib = $_FILES['yourRIB']['name'];
$img_type_rib = $_FILES['yourRIB']['type'];
$tmp_name_rib = $_FILES['yourRIB']['tmp_name'];

$img_name_adress = $_FILES['yourAdress']['name'];
$img_type_adress = $_FILES['yourAdress']['type'];
$tmp_name_adress = $_FILES['yourAdress']['tmp_name'];


$img_explode_cin = explode('.', $img_name_cin);
$img_ext_cin = end($img_explode_cin);

$img_explode_rib = explode('.', $img_name_rib);
$img_ext_rib = end($img_explode_rib);

$img_explode_adress = explode('.', $img_name_adress);
$img_ext_adress = end($img_explode_adress);


$extensions = ["jpeg", "png", "jpg"];

if (!empty($img_name_cin) && !empty($img_name_adress) && !empty($img_name_rib)) {
    $query = "SELECT *  FROM SLF_USER_CLIENT  WHERE client_id = '{$client_id}'";
    $result = $conn->query($query);
    

    if ($result->num_rows > 0) {
        if (in_array($img_ext_cin, $extensions) && in_array($img_ext_rib, $extensions) && in_array($img_ext_adress, $extensions)) {
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if (in_array($img_type_cin, $types) && in_array($img_type_rib, $types) && in_array($img_type_adress, $types)) {

                $time = rand(time(), 100000000);
                $new_img_name_cin = $time . '_' . $img_name_cin;

                $time = rand(time(), 100000000);
                $new_img_name_rib = $time . '_' . $img_name_rib;

                $time = rand(time(), 100000000);
                $new_img_name_adress = $time . '_' . $img_name_adress;

                if (move_uploaded_file($tmp_name_cin, "images/" . $new_img_name_cin) && move_uploaded_file($tmp_name_rib, "images/" . $new_img_name_rib) && move_uploaded_file($tmp_name_adress, "images/" . $new_img_name_adress)) {

                    $update_query = "UPDATE `slf_user_client` 
                SET `cin_piece`='{$new_img_name_cin}',`rib_piece`='{$new_img_name_rib}',`adress_piece`='{$new_img_name_adress}' 
                WHERE `client_id`='{$client_id}'";
                    $result_update = $conn->query($update_query);
                    if (($result_update)) {
                        //Mettre à jours le credit du client
                        $update_credit="UPDATE `credit_client` SET `state`= 'En cours' WHERE `client_id`='{$client_id}' AND `state`='En attente' ";
                        $conn->query($update_credit);
                        echo "success";
                    } else {
                        echo "Update failed";
                    }
                } else {
                    echo "impossible de uploder les fichiers";
                }
            } else {
                echo "Type problem";
            }
        } else {
            echo "Extension problem";
        }
    } else {
        echo "Inexistant user";
    }
} else {
    echo "Téléchargez les fichiers";
}
?>