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

$status='error';
$extensions = ["jpeg", "png", "jpg"];

if (isset($_POST['flagUpdate'])) {
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
                        WHERE client_id='$client_id'";
                        $result_update = $conn->query($update_query);
                        if ($result_update) {
                            unset($_SESSION['cin_piece']);
                            if (!unlink($cin_link)) {
                                $msg = "Échec de la suppression du : " . $cin_link;
                            }
                        } else {
                            $msg = "Echec de mise à jour de: " . $new_img_name_cin;
                        }

                    } else {
                        $msg = "Lien non existant";
                    }
                } else {
                    $msg = "Upload failed";
                }
            } else {
                $msg = "Probleme de types de fichiers";
            }

        } else {
            $msg = "Probleme d'extension du fichiers";
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
        WHERE client_id='$client_id'";
                        $result_update = $conn->query($update_query);
                        if ($result_update) {
                            unset($_SESSION['rib_piece']);
                            if (!unlink($rib_link)) {
                                $msg = "Échec de la suppression du : " . $rib_link;
                            }
                        } else {
                            $msg = "Echec de mise à jour de: " . $new_img_name_rib;
                        }
                    }
                } else {
                    $msg = "Upload failed";
                }
            } else {
                $msg = "Probleme de type du fichiers";
            }

        } else {
            $msg = "Probleme d'extension du fichiers";
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
    WHERE client_id='$client_id'";
                        $result_update = $conn->query($update_query);
                        if ($result_update) {
                            unset($_SESSION['adress_piece']);
                            if (!unlink($adress_link)) {
                                $msg = "Échec de la suppression du : " . $adress_link;
                            }
                        } else {
                            $msg = "Echec de mise à jour de: " . $new_img_name_adress;
                        }
                    }
                } else {
                    $msg = "Upload failed";
                }
            } else {
                $msg = "Probleme de type du fichiers";
            }

        } else {
            $msg = "Probleme d'extension du fichiers";
        }
    }
    $status='success';
    $msg= " Ref Client : <b> ".$client_id. "</b> modifié avec succès !";
} else {


    $img_explode_cin = explode('.', $img_name_cin);
    $img_ext_cin = end($img_explode_cin);

    $img_explode_rib = explode('.', $img_name_rib);
    $img_ext_rib = end($img_explode_rib);

    $img_explode_adress = explode('.', $img_name_adress);
    $img_ext_adress = end($img_explode_adress);

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
                            $update_credit = "UPDATE `credit_client` SET `state`= 'En cours' WHERE `client_id`='{$client_id}' AND `state`='En attente' ";
                            $conn->query($update_credit);
                            $status = "success";
                            $msg = "Vos données ont été envoyées avec succès";
                        } else {
                            $msg= "Update failed";
                        }
                    } else {
                        $msg= "impossible de uploder les fichiers";
                    }
                } else {
                    $msg= "Type problem";
                }
            } else {
                $msg= "Extension problem";
            }
        } else {
            $msg= "Inexistant user";
        }
    } else {
        $msg= "Téléchargez les fichiers";
    }
}

$response = array('status' => $status, 'message' => $msg);  
echo json_encode($response);
?>