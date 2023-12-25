<?php
session_start();
include '../../connectToDB.php';

$client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
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

$img_name_adress = $_FILES['yourAdress']['name'];
$img_type_adress = $_FILES['yourAdress']['type'];
$tmp_name_adress = $_FILES['yourAdress']['tmp_name'];


$status='error';
if (!empty($lname) && !empty($fname) && !empty($title) && !empty($cin) && !empty($income)) {


    $shouldUpdated=true;
    $select_query = "SELECT * FROM `slf_user_client` WHERE  client_id='$client_id' AND seller_id='$seller_id' ";
    $result_select = $conn->query($select_query);

    if ($result_select->num_rows > 0) {
        $client = $result_select->fetch_assoc();
        $old_cin = $client['cin'];
        $old_email = $client['email'];

        if ($email != $old_email) {
            $select_query = "SELECT * FROM `slf_user_client` WHERE  email= '$email' AND seller_id='$seller_id'  ";
            $result_select = $conn->query($select_query);
            if ($result_select->num_rows > 0) {
                $shouldUpdated = false;
                $msg= "Veuillez revoir l'email de ce client";
            }
        }
        if ($cin != $old_cin) {
            $select_query = "SELECT * FROM `slf_user_client` WHERE  cin= '$cin' AND seller_id='$seller_id'  ";
            $result_select = $conn->query($select_query);
            if ($result_select->num_rows > 0) {
                $shouldUpdated = false;
                $msg= "Veuillez revoir le CIN de ce client";
            }
        }
        if ($shouldUpdated) {
            $update_query = "UPDATE `slf_user_client` SET `seller_id`='{$seller_id}',`email`='{$email}',`phone`='{$phone}',`lname`='{$lname}',`fname`='{$fname}',`title`='{$title}',`cin`='{$cin}',`income`='{$income}',`region`='{$region}',`town`='{$town}'
            WHERE client_id='$client_id' AND seller_id='$seller_id'";

            $result_update = $conn->query($update_query);
            if (($result_update)) {
                // `cin_piece`='{$new_img_name_cin}',`rib_piece`='{$new_img_name_rib}',`adress_piece`='{$new_img_name_adress}' 
                $extensions = ["jpeg", "png", "jpg"];
                $types = ["image/jpeg", "image/jpg", "image/png"];

                if (!empty($img_name_cin)) {

                    $img_explode_cin = explode('.', $img_name_cin);
                    $img_ext_cin = end($img_explode_cin);

                    $time = rand(time(), 100000000);
                    $new_img_name_cin = $time . '_' . $img_name_cin;

                    if (in_array($img_ext_cin, $extensions)) {
                        if (in_array($img_type_cin, $types)) {
                            if (move_uploaded_file($tmp_name_cin, "images/" . $new_img_name_cin)) {


                                $cin_link = "images/" . $_SESSION['cin_piece'];

                                if (file_exists($cin_link)) {

                                    $update_query = "UPDATE `slf_user_client` SET  `cin_piece`='{$new_img_name_cin}'
                                    WHERE client_id='$client_id' AND seller_id='$seller_id'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['cin_piece']);
                                        if (!unlink($cin_link)) {
                                            $msg= "Échec de la suppression du : " . $cin_link;
                                        }
                                    } else {
                                        $msg= "Echec de mise à jour de: " . $new_img_name_cin;
                                    }

                                } else {
                                    $msg= "Lien non existant";
                                }
                            } else {
                                $msg= "Upload failed";
                            }
                        }

                    }
                }

                if (!empty($img_name_rib)) {

                    $img_explode_rib = explode('.', $img_name_rib);
                    $img_ext_rib = end($img_explode_rib);

                    $time = rand(time(), 100000000);
                    $new_img_name_rib = $time . '_' . $img_name_rib;

                    if (in_array($img_ext_rib, $extensions)) {
                        if (in_array($img_type_rib, $types)) {
                            if (move_uploaded_file($tmp_name_rib, "images/" . $new_img_name_rib)) {

                                $rib_link = "images/" . $_SESSION['rib_piece'];

                                if (file_exists($rib_link)) {
                                    $update_query = "UPDATE `slf_user_client` SET  `rib_piece`='{$new_img_name_rib}'
                    WHERE client_id='$client_id' AND seller_id='$seller_id'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['rib_piece']);
                                        if (!unlink($rib_link)) {
                                            $msg= "Échec de la suppression du : " . $rib_link;
                                        }
                                    } else {
                                        $msg= "Echec de mise à jour de: " . $new_img_name_rib;
                                    }
                                }
                            } else {
                                $msg= "Upload failed";
                            }
                        }

                    }
                }

                if (!empty($img_name_adress)) {

                    $img_explode_adress = explode('.', $img_name_adress);
                    $img_ext_adress = end($img_explode_adress);

                    $time = rand(time(), 100000000);
                    $new_img_name_adress = $time . '_' . $img_name_adress;

                    if (in_array($img_ext_adress, $extensions)) {
                        if (in_array($img_type_adress, $types)) {
                            if (move_uploaded_file($tmp_name_adress, "images/" . $new_img_name_adress)) {

                                $adress_link = "images/" . $_SESSION['adress_piece'];

                                if (file_exists($adress_link)) {
                                    $update_query = "UPDATE `slf_user_client` SET  `adress_piece`='{$new_img_name_adress}'
                WHERE client_id='$client_id' AND seller_id='$seller_id'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['adress_piece']);
                                        if (!unlink($adress_link)) {
                                            $msg= "Échec de la suppression du : " . $adress_link;
                                        }
                                    } else {
                                        $msg= "Echec de mise à jour de: " . $new_img_name_adress;
                                    }
                                }
                            } else {
                                $msg= "Upload failed";
                            }
                        }

                    }
                }
                $status='success';
                $msg= " Ref Client : <b> ".$client_id. "</b> modifié avec succès !";
            } else {
                $msg= "Echec de mise à jour du credit ";
            }
        }





    } else {
        $msg= "Le client existe déjà ";
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
