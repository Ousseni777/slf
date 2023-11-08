<?php

include './connectToDB.php';

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
        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        $tariff = $_POST['ID_TARIFF'];
        $durations = fetchDuration($brand, $product, $tariff);
        displayDuration($durations);

        break;
    case "apport":
        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        $tariff = $_POST['ID_TARIFF'];
        $duration = $_POST['ID_DURATION'];
        $apports = fetchApport($brand, $product, $tariff, $duration);
        displayApport($apports);
        break; 
    default:
        break;
}

// *********************************************************     Marques        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des marques 
// ----------------------------------------------------------------------------

function fetchBrand() {
    global $conn;
    $query = "SELECT DISTINCT MARQUE FROM SAL_CREDIT";
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

function displayBrand($brands) {
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

function fetchProduct($IDMARK) {
    global $conn;
    $query = "SELECT DISTINCT PRODUIT FROM SAL_CREDIT WHERE MARQUE = '$IDMARK'";
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
function displayProduct($products) {
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

function fetchTariff($idproduct, $idbrand) {
    global $conn;
    $query = "SELECT DISTINCT NOM_BAREME FROM SAL_CREDIT WHERE PRODUIT = '$idproduct' AND MARQUE = '$idbrand'";
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

function displayTariff($tariffs) {
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
function fetchDuration($brand, $product, $tariff) {
    global $conn;
    $query = "SELECT DISTINCT DUREE FROM TARIFICATION WHERE MARQUE = '$brand' AND PRODUIT = '$product' AND BAREME = '$tariff' ORDER BY DUREE";

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

function displayDuration($durations) {
    $ct = 0;
    //$min=min($fetchData);
    //$max= max($fetchData);
    if (count($durations) > 0) {
        foreach ($durations as $data) {
            $ct += 1;
            if ($ct == 1) {
                echo '
                <div class="form-check">
                    <input class="form-check-input" onchange="loadApport()" type="radio" name="radioBtn" id="firstRadios" checked value="' . $data['DUREE'] . '">
                    <label class="form-check-label" for="firstRadios">
                        ' . $data['DUREE'] . '
                    </label>
                </div>';
            } else {
                echo '
            <div class="form-check">
                <input class="form-check-input" onchange="loadApport()" type="radio" name="radioBtn" id="gridRadios' . $data['DUREE'] . '" value="' . $data['DUREE'] . '">
                <label class="form-check-label" for="gridRadios' . $data['DUREE'] . '">
                    ' . $data['DUREE'] . '
                </label>
            </div>
            
            ';
            }
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     apports        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des apports 
// ----------------------------------------------------------------------------

function fetchApport($brand, $product, $tariff, $duration) {
    global $conn;

    $query_apport = "SELECT APPORT, TXFD FROM TARIFICATION WHERE MARQUE = '$brand' AND PRODUIT = '$product' AND BAREME = '$tariff' AND DUREE = '$duration' ORDER BY APPORT";
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

function displayApport($apports) {
    $ct = 0;
    if (count($apports) > 0) {
        foreach ($apports as $data) {
            $apport = $data['APPORT'];
            $TFD = $data['TXFD'];
            if ($ct == 0) {
                echo '
                <div class="form-check">                
                    <input class="form-check-input" onchange="calcFunction()" type="radio" name="apportName" id="apport" checked value="' . $apport . '">
                    <label class="form-check-label" for="apport">' . $apport . ' </label>                    
                </div>';
            } else {
                echo '
            <div class="form-check">
            
                <input class="form-check-input" onchange="calcFunction()" type="radio" name="apportName" id="apport' . $apport . '" value="' . $apport . '">
                <label class="form-check-label" for="apport' . $apport . '">
                    ' . $apport . ' 
                </label>                
            </div>            
            ';
            }
            $ct++;
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}