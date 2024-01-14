<?php
session_start();
include '../../connectToDB.php';

$SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];

$LNAME = mysqli_real_escape_string($conn, $_POST['LNAME']);
$FNAME = mysqli_real_escape_string($conn, $_POST['FNAME']);
$TITLE = mysqli_real_escape_string($conn, $_POST['TITLE']);
$CLIENT_CIN = mysqli_real_escape_string($conn, $_POST['CLIENT_CIN']);
$INCOME = mysqli_real_escape_string($conn, $_POST['INCOME']);
$REGION = mysqli_real_escape_string($conn, $_POST['REGION']);
$TOWN = mysqli_real_escape_string($conn, $_POST['TOWN']);
$EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
$PHONE = mysqli_real_escape_string($conn, $_POST['PHONE']);

$img_name_CIN = $_FILES['yourCIN']['name'];
$img_type_CIN = $_FILES['yourCIN']['type'];
$tmp_name_CIN = $_FILES['yourCIN']['tmp_name'];

$img_name_rib = $_FILES['yourRIB']['name'];
$img_type_rib = $_FILES['yourRIB']['type'];
$tmp_name_rib = $_FILES['yourRIB']['tmp_name'];

$img_name_adress = $_FILES['yourAdress']['name'];
$img_type_adress = $_FILES['yourAdress']['type'];
$tmp_name_adress = $_FILES['yourAdress']['tmp_name'];

$img_explode_CIN = explode('.', $img_name_CIN);
$img_ext_CIN = end($img_explode_CIN);

$img_explode_rib = explode('.', $img_name_rib);
$img_ext_rib = end($img_explode_rib);

$img_explode_adress = explode('.', $img_name_adress);
$img_ext_adress = end($img_explode_adress);

$status="error";

if (!empty($LNAME) && !empty($FNAME) && !empty($TITLE) && !empty($CLIENT_CIN) && !empty($INCOME)) {

    if (!empty($img_name_CIN) && !empty($img_name_rib) && !empty($img_name_adress)) {

        $select_query = "SELECT * FROM `slf_user_client` WHERE (EMAIL= '$EMAIL' OR CLIENT_CIN='$CLIENT_CIN') AND SELLER_ID='$SELLER_ID_UK' ";
        $result_select = $conn->query($select_query);

        if (!$result_select->num_rows > 0) {            

            $extensions = ["jpeg", "png", "jpg"];
            if (in_array($img_ext_CIN, $extensions) && in_array($img_ext_rib, $extensions) && in_array($img_ext_adress, $extensions)) {
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if (in_array($img_type_CIN, $types) && in_array($img_type_rib, $types) && in_array($img_type_adress, $types)) {

                    $time = rand(time(), 100000000);
                    $new_img_name_CIN = $time . '_' . $img_name_CIN;

                    $time = rand(time(), 100000000);
                    $new_img_name_rib = $time . '_' . $img_name_rib;

                    $time = rand(time(), 100000000);
                    $new_img_name_adress = $time . '_' . $img_name_adress;

                    if (move_uploaded_file($tmp_name_CIN, "images/" . $new_img_name_CIN) && move_uploaded_file($tmp_name_rib, "images/" . $new_img_name_rib) && move_uploaded_file($tmp_name_adress, "images/" . $new_img_name_adress)) {

                        $rand_text1 = generateUniqueID(3);
                        $rand_text2 = generateUniqueID(1);
                        $ran_id = rand(time(), 100000000);
                        $ran_id = $rand_text1 . '-' . $ran_id . $rand_text2;

                        $insert_query = "INSERT INTO `slf_user_client` (`CLIENT_ID_UK`,`SELLER_ID`, `EMAIL`, `PHONE`, `LNAME`, `FNAME`, `TITLE`, `CLIENT_CIN`, `INCOME`, `REGION`, `TOWN`, `CIN_PIECE`, `RIB_PIECE`, `ADRESS_PIECE`) 
                            VALUES ('{$ran_id}','{$SELLER_ID_UK}','{$EMAIL}','{$PHONE}','{$LNAME}','{$FNAME}','{$TITLE}','{$CLIENT_CIN}','{$INCOME}','{$REGION}','{$TOWN}','{$new_img_name_CIN}','{$new_img_name_rib}','{$new_img_name_adress}')";

                        $result_insert = $conn->query($insert_query);
                        if (($result_insert)) {
                            $status="success";
                            $msg= "Client (Ref : <b> ".$ran_id."</b> a été ajouté avec succès, merci de lui affecter un crédit !";
                        } else {
                            $msg= "Insertion failed";
                        }

                    } else {
                        $msg= "Upload failed";                        
                    }
                }
            }

        } else {
            $msg= "Le client existe déjà ";
        }

    } else {
        $msg= "Veuillez renseigner les justificatifs !";
    }

} else {
    $msg= "Tous les champs sont requis !";
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
