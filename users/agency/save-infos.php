<?php
session_start();
include '../../connectToDB.php';

$seller_id = $_SESSION['seller_id'];

$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$cin = mysqli_real_escape_string($conn, $_POST['cin']);
$income = mysqli_real_escape_string($conn, $_POST['income']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$town = mysqli_real_escape_string($conn, $_POST['town']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$img_name_cin = $_FILES['yourCIN']['name'];
$img_type_cin = $_FILES['yourCIN']['type'];
$tmp_name_cin = $_FILES['yourCIN']['tmp_name'];

$img_name_rib = $_FILES['yourRIB']['name'];
$img_type_rib = $_FILES['yourRIB']['type'];
$tmp_name_rib = $_FILES['yourRIB']['tmp_name'];

$img_name_adress = $_FILES['yourAdresse']['name'];
$img_type_adress = $_FILES['yourAdresse']['type'];
$tmp_name_adress = $_FILES['yourAdresse']['tmp_name'];

$img_explode_cin = explode('.', $img_name_cin);
$img_ext_cin = end($img_explode_cin);

$img_explode_rib = explode('.', $img_name_rib);
$img_ext_rib = end($img_explode_rib);

$img_explode_adress = explode('.', $img_name_adress);
$img_ext_adress = end($img_explode_adress);

$status="error";

if (!empty($lname) && !empty($fname) && !empty($title) && !empty($cin) && !empty($income)) {

    if (!empty($img_name_cin) && !empty($img_name_rib) && !empty($img_name_adress)) {

        $select_query = "SELECT * FROM `slf_user_client` WHERE (email= '$email' OR cin='$cin') AND seller_id='$seller_id' ";
        $result_select = $conn->query($select_query);

        if (!$result_select->num_rows > 0) {            

            $extensions = ["jpeg", "png", "jpg"];
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

                        $rand_text1 = generateUniqueID(3);
                        $rand_text2 = generateUniqueID(1);
                        $ran_id = rand(time(), 100000000);
                        $ran_id = $rand_text1 . '-' . $ran_id . $rand_text2;

                        $insert_query = "INSERT INTO `slf_user_client` (`client_id`,`seller_id`, `email`, `phone`, `lname`, `fname`, `title`, `cin`, `income`, `region`, `town`, `cin_piece`, `rib_piece`, `adress_piece`) 
                            VALUES ('{$ran_id}','{$seller_id}','{$email}','{$phone}','{$lname}','{$fname}','{$title}','{$cin}','{$income}','{$region}','{$town}','{$new_img_name_cin}','{$new_img_name_rib}','{$new_img_name_adress}')";

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
