<?php
session_start();

include_once "../connectToDB.php";
$status = "error";
$message = "start";

if (isset($_POST['BTN_AUTO'])) {
    $CSP = mysqli_real_escape_string($conn, $_POST['CSP']);
    $BRAND = mysqli_real_escape_string($conn, $_POST['BRAND']);
    $PRODUCT = mysqli_real_escape_string($conn, $_POST['PRODUCT']);
    $TARIFF = mysqli_real_escape_string($conn, $_POST['TARIFF']);

    if ($BRAND != 0 && $PRODUCT != 0) {
        $_SESSION["CSP"] = $CSP;
        $_SESSION["BRAND"] = $BRAND;
        $_SESSION["PRODUIT"] = $PRODUCT;
        $_SESSION["TARIFF"] = $TARIFF;
        $status = "success";
        $message = "success";
    } else {
        $message = "Les sélections sont obligatoires";
    }

} else if (isset($_POST['BTN_PERSONNEL'])) {
    $PROFESSION = mysqli_real_escape_string($conn, $_POST['PROFESSION']);
    $AMOUNT = $_POST['AMOUNT'];
    $DURATION = $_POST['DURATION'];

    if ($PROFESSION != 0 && !empty($AMOUNT) && !empty($DURATION)) {
        $_SESSION["PROFESSION"] = $PROFESSION;
        $_SESSION["PROJECT"] = "CREDIT PERSONNEL";
        $_SESSION["BRAND"] = $PROFESSION;
        $_SESSION["AMOUNT"] = $AMOUNT;
        $_SESSION["DURATION"] = $DURATION;
        $status = "success";
        $message = "success";
    } else {
        $message = "Tous les champs sont obligatoires";
    }
} else if (isset($_POST['BTN_RENOUVELABLE'])) {
    $PROFESSION = mysqli_real_escape_string($conn, $_POST['PROFESSION']);
    $AMOUNT = $_POST['AMOUNT'];
    $DURATION = $_POST['DURATION'];

    if ($PROFESSION != 0 && !empty($AMOUNT) && !empty($DURATION)) {
        $_SESSION["PROFESSION"] = $PROFESSION;
        $_SESSION["AMOUNT"] = $AMOUNT;
        $_SESSION["DURATION"] = $DURATION;
        $_SESSION["BRAND"] = $PROFESSION;
        $_SESSION["PROJECT"] = "CREDIT RENOUVELABLE";
        $status = "success";
        $message = "success";
    } else {
        $message = "Tous les champs sont obligatoires";
    }
} else if (isset($_POST['BTN_ASK_REVCF'])) {
    $NUMDOSS = mysqli_real_escape_string($conn, $_POST['NUMDOSS']);

    if (!empty($NUMDOSS)) {
        $status = "success";
        $message = $NUMDOSS;
    } else {
        $message = "Merci de saisir un numéro de dossier valide !";
    }
} else if (isset($_POST['BTN_CHECK_REVCF'])) {
    $NUMDOSS = mysqli_real_escape_string($conn, $_POST['NUMDOSS']);

    if (!empty($NUMDOSS)) {

        $select_numdoss = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$NUMDOSS}'";
        $result_select_numdoss = $conn->query($select_numdoss);
        if ($result_select_numdoss->num_rows > 0) {
            $status = "success";
            $message = $NUMDOSS;
        
        } else {
            $message = "Merci de saisir un numéro de dossier valide !";
        }

    } else {
        $message = "Merci de saisir un numéro de dossier !";
    }
}

$response = array('status' => $status, 'message' => $message);
echo json_encode($response);

?>