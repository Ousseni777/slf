<?php

session_start();
include './connectToDB.php';


// $Affiliation = $_SESSION['user'];

switch ($_POST['ID_SCRIPT']) {
    case "brand":
        $brands = fetchBrand();
        displayBrand($brands);
        break;
    case "product":
        $IDMARK = $_POST['ID_MARQUE'];
        $products = fetchProduct($IDMARK);
        displayProduct($products);
        break;
    case "tariff":
        $idproduct = $_POST['ID_PRODUCT'];
        $idbrand = $_POST['ID_BRAND'];
        $tariffs = fetchTariff($idproduct, $idbrand);
        displayTariff($tariffs);
        break;
    case "duration":
        // $brand = $_POST['ID_BRAND'];
        // $product = $_POST['ID_PRODUCT'];
        // $tariff = $_POST['ID_TARIFF'];
        $durations = fetchDuration();
        displayDuration($durations);

        break;
    case "apport":
        // $brand = $_POST['ID_BRAND'];
        // $product = $_POST['ID_PRODUCT'];
        // $tariff = $_POST['ID_TARIFF'];
        $duration = $_POST['ID_DURATION'];
        $apports = fetchApport();
        displayApport($apports);
        break;

    default:
        break;
}

// *********************************************************     Marques        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des marques 
// ----------------------------------------------------------------------------

function fetchBrand(){
    global $conn, $Affiliation;
    $query = "SELECT DISTINCT MARQUE FROM SLF_CREDIT";
    
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql = [];
    }
    return $sql;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des marques
// ----------------------------------------------------------------------------

function displayBrand($brands){
    if (count($brands) > 0) {
        foreach ($brands as $data) {
            echo '<option value="' . $data['MARQUE'] . '">' . $data['MARQUE'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     produits        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des produits 
// ----------------------------------------------------------------------------

function fetchProduct($IDMARK){
    global $conn;
    $query = "SELECT DISTINCT PRODUIT FROM SLF_CREDIT WHERE MARQUE = '$IDMARK'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql = [];
    }
    return $sql;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des produits
// ----------------------------------------------------------------------------
function displayProduct($products){
    if (count($products) > 0) {
        foreach ($products as $data) {
            echo '<option>' . $data['PRODUIT'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     barêmes        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des barêmes 
// ----------------------------------------------------------------------------

function fetchTariff($idproduct, $idbrand){
    global $conn;
    $query = "SELECT DISTINCT NOM_BAREME FROM SLF_CREDIT WHERE PRODUIT = '$idproduct' AND MARQUE = '$idbrand'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql = [];
    }
    return $sql;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des barêmes
// ----------------------------------------------------------------------------

function displayTariff($tariffs){
    if (count($tariffs) > 0) {
        foreach ($tariffs as $data) {
            echo '<option>' . $data['NOM_BAREME'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     durées        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des durées 
// ----------------------------------------------------------------------------
function fetchDuration()
{
    global $conn;
    $query = "SELECT DISTINCT DUREE FROM SLF_TARIFICATION ORDER BY DUREE";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql_duree = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql_duree = [];
    }

    return $sql_duree;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des durées
// ----------------------------------------------------------------------------

function displayDuration($durations)
{
    // $ct = 0;
    //$min=min($fetchData);
    //$max= max($fetchData);
    if (count($durations) > 0) {
        $concat='';
        $ct=0;
        foreach ($durations as $data) {
            $selectedIndice=number_format(count($durations)/2,0,'.','') ;    
            if($ct==$selectedIndice)        
            {
                $concat = $concat . '<option selected value="'.$data["DUREE"].'">'.$data["DUREE"].'</option>';   
            }else{
                $concat = $concat . '<option value="'.$data["DUREE"].'">'.$data["DUREE"].'</option>';   
            }
            $ct++;
                                            
        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     apports        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des apports 
// ----------------------------------------------------------------------------

function fetchApport()
{
    global $conn;

    $query_apport = "SELECT DISTINCT APPORT FROM SLF_TARIFICATION ORDER BY APPORT";
    $result_apport = $conn->query($query_apport);

    if ($result_apport->num_rows > 0) {
        $sql_apport = mysqli_fetch_all($result_apport, MYSQLI_ASSOC);

        //echo '<script>console.log("Length Ligne apport : ' . count($sql_apport) . '")</script>';
    } else {
        $sql_apport = [];
    }

    return $sql_apport;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des apports
// ----------------------------------------------------------------------------

function displayApport($apports)
{
    $ct = 0;
    if (count($apports) > 0) {
        $concat='';
        foreach ($apports as $data) {
            // $apport = $data['APPORT'];
            // $TFD = $data['TXFD'];
            $concat = $concat . '<option value="'.$data["APPORT"].'">'.$data["APPORT"].'</option>';                                   
        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}