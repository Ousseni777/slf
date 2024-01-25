<?php

session_start();
include '../../connectToDB.php';


// $affiliation = $_SESSION['PRODUCT'];

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
    case "apport":
        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        $tariff = $_POST['ID_TARIFF'];
        $apports = fetchApport($brand, $product, $tariff);
        displayApport($apports);
        break;
    case "duration":

        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        $tariff = $_POST['ID_TARIFF'];
        $apport = $_POST['ID_APPORT'];
        $durations = fetchDuration($brand, $tariff, $product, $apport);
        displayDuration($durations);

        break;


    case "cin":
        displayCIN(fetchAllCIN());
        break;

    case "full_cin":
        $cin = $_POST['CIN'];
        fetchCIN($cin);
        break;

    case "numdoss":
        displayNUMDOSS(fetchNUMDOSS());
        break;

    default:
        break;
}

// *********************************************************     Marques        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des marques 
// ----------------------------------------------------------------------------

function fetchBrand()
{
    global $conn, $affiliation;
    // if (!isset($_SESSION['PRODUCT']) || $_SESSION['PRODUCT'] == 'SALAFIN') {
    //     $query = "SELECT DISTINCT MARQUE FROM slf_tarification";
    // } else {
    //     $affiliation = $_SESSION['PRODUCT'];
    //     $query = "SELECT DISTINCT MARQUE FROM slf_tarification WHERE MARQUE = '$affiliation'";

    // }

    $query = "SELECT DISTINCT MARQUE FROM slf_tarification";

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

function displayBrand($brands)
{
    global $affiliation;
    $brandOption = '';
    if (count($brands) > 0) {
        foreach ($brands as $data) {
            if (isset($_SESSION['BRAND']) && $_SESSION['BRAND'] == $data['MARQUE']) {
                $brandOption .= '<option selected value="' . $data['MARQUE'] . '">' . $data['MARQUE'] . '</option>';
                // unset($_SESSION['BRAND']);
            } else {
                $brandOption .= '<option value="' . $data['MARQUE'] . '">' . $data['MARQUE'] . '</option>';
            }
        }
        echo $brandOption;
    } else {
        // echo '<option>' . $affiliation . '</option>';
    }
}

// *********************************************************     produits        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des produits 
// ----------------------------------------------------------------------------

function fetchProduct($IDMARK)
{
    global $conn;
    $query = "SELECT DISTINCT PRODUIT FROM SLF_TARIFICATION WHERE MARQUE = '$IDMARK'";
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
function displayProduct($products)
{
    if (count($products) > 0) {
        $productOption ='';
        foreach ($products as $data) {
            if (isset($_SESSION['PRODUIT']) && $_SESSION['PRODUIT'] == $data['PRODUIT']) {
                $productOption .= '<option selected>' . $data['PRODUIT'] . '</option>';
                // unset($_SESSION['PRODUIT']);
            } else {
                $productOption .= '<option>' . $data['PRODUIT'] . '</option>';
            }
           
        }

        echo $productOption;
    } else {
        // echo '<option>No Data Found</option>';
    }
}

// *********************************************************     barêmes        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des barêmes 
// ----------------------------------------------------------------------------

function fetchTariff($idproduct, $idbrand)
{
    global $conn;
    $query = "SELECT DISTINCT BAREME FROM SLF_TARIFICATION WHERE PRODUIT = '$idproduct' AND MARQUE = '$idbrand'";
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

function displayTariff($tariffs)
{
    if (count($tariffs) > 0) {
        $tariffOption ='';
        foreach ($tariffs as $data) {
            if (isset($_SESSION['TARIFF']) && $_SESSION['TARIFF'] == $data['BAREME']) {
                $tariffOption .= '<option selected value="' . $data['BAREME'] . '">' . $data['BAREME'] . '</option>';
                // unset($_SESSION['TARIFF']);
            } else {
                $tariffOption .= '<option value="' . $data['BAREME'] . '">' . $data['BAREME'] . '</option>';
            }
            
        }
        echo $tariffOption;
    } else {
        // echo '<option>No Data Found</option>';
    }
}

// *********************************************************     apports        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des apports 
// ----------------------------------------------------------------------------

function fetchApport($brand, $product, $tariff)
{
    global $conn;

    $query_apport = "SELECT DISTINCT APPORT FROM SLF_TARIFICATION WHERE MARQUE='$brand' AND PRODUIT='$product' AND BAREME='$tariff' ORDER BY APPORT";
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
        $concat = '';
        $ct = 1;
        foreach ($apports as $data) {
            $selectedIndice = number_format(count($apports) / 2, 0, '.', '');
            if ($ct == $selectedIndice) {
                $concat .= '
                <div class="col-2 radios  d-flex flex-row align-items-center justify-content-center" >                                    
                    <input class="check-input label-apport" type="radio" name="apportName" id="apport' . $data["APPORT"] . '" onchange="loadDuration()" checked value="' . $data["APPORT"] . '">                                                                
                    <label class="form-check-label ms-2 label-apport" for="apport' . $data["APPORT"] . '">' . $data["APPORT"] . '</label>
                </div>';
            } else {
                $concat .= '
                <div class="col-2 radios  d-flex flex-row align-items-center justify-content-center" >                                    
                    <input class="check-input label-apport" type="radio" name="apportName" id="apport' . $data["APPORT"] . '" onchange="loadDuration()" value="' . $data["APPORT"] . '">                                                                
                    <label class="form-check-label ms-2 label-apport" for="apport' . $data["APPORT"] . '">' . $data["APPORT"] . '</label>
                </div>';
            }
            $ct++;

        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}


// *********************************************************     durées        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des durées 
// ----------------------------------------------------------------------------
function fetchDuration($brand, $tariff, $product, $apport)
{
    global $conn;
    $query = "SELECT DISTINCT DUREE FROM SLF_TARIFICATION WHERE MARQUE='$brand' AND PRODUIT='$product' AND BAREME='$tariff' AND APPORT='$apport' ORDER BY DUREE";

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
        $concat = '';
        $ct = 1;
        foreach ($durations as $data) {
            $selectedIndice = number_format(count($durations) / 2, 0, '.', '');
            if ($ct == $selectedIndice) {
                $concat .= '
                <div class="col-2 radios d-flex flex-row align-items-center justify-content-center" >                                    
                    <input class="check-input label-duration" type="radio" name="durationName" id="duration' . $data["DUREE"] . '" onchange="calcFunction()" checked value="' . $data["DUREE"] . '">                                                                
                    <label class="form-check-label ms-2 label-duration" for="duration' . $data["DUREE"] . '">' . $data["DUREE"] . '</label>
                </div>';
            } else {
                $concat .= '
                <div class="col-2 radios d-flex flex-row align-items-center justify-content-center" >                                    
                    <input class="check-input label-duration" type="radio" name="durationName" id="duration' . $data["DUREE"] . '" onchange="calcFunction()" value="' . $data["DUREE"] . '">                                                                
                    <label class="form-check-label ms-2 label-duration" for="duration' . $data["DUREE"] . '">' . $data["DUREE"] . '</label>
                </div>';
            }
            $ct++;

        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     Marques        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des marques 
// ----------------------------------------------------------------------------

function fetchCIN($cin)
{
    global $conn;

    // $SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];
    $query = "SELECT * FROM `slf_user_client` WHERE CLIENT_CIN = '$cin' ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo 1; //"existed"
    } else {
        echo 0; //"Not existed"
    }

}

function fetchAllCIN()
{
    global $conn;

    $SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];
    $query = "SELECT * FROM `slf_user_client` WHERE SELLER_ID='$SELLER_ID_UK'";
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

function displayCIN($brands)
{
    $elements = array();

    if (count($brands) > 0) {

        foreach ($brands as $data) {
            $elements[] = $data['CLIENT_CIN'];
        }
    }
    $jsonListe = json_encode($elements);

    echo $jsonListe;

}


function fetchNUMDOSS()
{
    global $conn;

    // $SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];
    $query = "SELECT * FROM `majestic` WHERE NUMDOSS is not NULL";
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

function displayNUMDOSS($numdoss)
{
    $elements = array();

    if (count($numdoss) > 0) {

        foreach ($numdoss as $data) {
            $elements[] = $data['NUMDOSS'];
        }
    }
    $jsonListe = json_encode($elements);

    echo $jsonListe;

}