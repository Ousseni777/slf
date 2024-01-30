<?php
session_start();
include '../../connectToDB.php';

$CLIENT_ID = mysqli_real_escape_string($conn, $_POST['CLIENT_ID']);
$SELLER_ID = $_SESSION['SELLER_ID'];

$LNAME = mysqli_real_escape_string($conn, $_POST['LNAME']);
$FNAME = mysqli_real_escape_string($conn, $_POST['FNAME']);
$TITLE = mysqli_real_escape_string($conn, $_POST['TITLE']);
$CLIENT_CIN = mysqli_real_escape_string($conn, $_POST['CLIENT_CIN']);
$INCOME = mysqli_real_escape_string($conn, $_POST['INCOME']);
$REGION = mysqli_real_escape_string($conn, $_POST['REGION']);
$TOWN = mysqli_real_escape_string($conn, $_POST['TOWN']);
$EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
$PHONE = mysqli_real_escape_string($conn, $_POST['PHONE']);


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
if (!empty($LNAME) && !empty($FNAME) && !empty($TITLE) && !empty($CLIENT_CIN) && !empty($INCOME)) {


    $shouldUpdated=true;
    $select_query = "SELECT * FROM `slf_user_client` WHERE  CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID' ";
    $result_select = $conn->query($select_query);

    if ($result_select->num_rows > 0) {
        $client = $result_select->fetch_assoc();
        $old_cin = $client['CLIENT_CIN'];
        $old_email = $client['EMAIL'];

        if ($EMAIL != $old_email) {
            $select_query = "SELECT * FROM `slf_user_client` WHERE  EMAIL= '$EMAIL' AND SELLER_ID='$SELLER_ID'  ";
            $result_select = $conn->query($select_query);
            if ($result_select->num_rows > 0) {
                $shouldUpdated = false;
                $msg= "Veuillez revoir l'email de ce client";
            }
        }
        if ($CLIENT_CIN != $old_cin) {
            $select_query = "SELECT * FROM `slf_user_client` WHERE  CLIENT_CIN= '$CLIENT_CIN' AND SELLER_ID='$SELLER_ID'  ";
            $result_select = $conn->query($select_query);
            if ($result_select->num_rows > 0) {
                $shouldUpdated = false;
                $msg= "Veuillez revoir le CIN de ce client";
            }
        }
        if ($shouldUpdated) {
            $update_query = "UPDATE `slf_user_client` SET `SELLER_ID`='{$SELLER_ID}',`EMAIL`='{$EMAIL}',`PHONE`='{$PHONE}',`LNAME`='{$LNAME}',`FNAME`='{$FNAME}',`TITLE`='{$TITLE}',`CLIENT_CIN`='{$CLIENT_CIN}',`INCOME`='{$INCOME}',`REGION`='{$REGION}',`TOWN`='{$TOWN}'
            WHERE CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID'";

            $result_update = $conn->query($update_query);
            if (($result_update)) {
                // `cin_piece`='{$new_img_name_cin}',`RIB_PIECE`='{$new_img_name_rib}',`ADRESS_PIECE`='{$new_img_name_adress}' 
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


                                $cin_link = "images/" . $_SESSION['CIN_PIECE'];

                                if (file_exists($cin_link)) {

                                    $update_query = "UPDATE `slf_user_client` SET  `CIN_PIECE`='{$new_img_name_cin}'
                                    WHERE CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['CIN_PIECE']);
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

                                $rib_link = "images/" . $_SESSION['RIB_PIECE'];

                                if (file_exists($rib_link)) {
                                    $update_query = "UPDATE `slf_user_client` SET  `RIB_PIECE`='{$new_img_name_rib}'
                    WHERE CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['RIB_PIECE']);
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

                                $adress_link = "images/" . $_SESSION['ADRESS_PIECE'];

                                if (file_exists($adress_link)) {
                                    $update_query = "UPDATE `slf_user_client` SET  `ADRESS_PIECE`='{$new_img_name_adress}'
                WHERE CLIENT_ID='$CLIENT_ID' AND SELLER_ID='$SELLER_ID'";
                                    $result_update = $conn->query($update_query);
                                    if ($result_update) {
                                        unset($_SESSION['ADRESS_PIECE']);
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
                $msg= " Ref Client : <b> ".$CLIENT_ID. "</b> modifié avec succès !";
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
