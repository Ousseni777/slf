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
        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        // $tariff = $_POST['ID_TARIFF'];
        $durations = fetchDuration($brand, $product);
        displayDuration($durations);

        break;
    case "apport":
        $brand = $_POST['ID_BRAND'];
        $product = $_POST['ID_PRODUCT'];
        // $tariff = $_POST['ID_TARIFF'];
        $duration = $_POST['ID_DURATION'];
        $apports = fetchApport($brand,$product,$duration);
        displayApport($apports);
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
    global $conn, $Affiliation;
    if(!isset($_SESSION['user']) || $_SESSION['user']=='ADMIN'){
        $query = "SELECT DISTINCT MARQUE FROM SLF_CREDIT";
    }else{
        $Affiliation = $_SESSION['user'];
        $query = "SELECT DISTINCT MARQUE FROM SLF_CREDIT WHERE MARQUE = '$Affiliation'";
        
    }
    
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
    if (count($brands) > 0) {
        $concat='<option value="0">Quelle marque ?</option>';
        foreach ($brands as $data) {
            $concat.= '<option value="' . $data['MARQUE'] . '">' . $data['MARQUE'] . '</option>';
        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     produits        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des produits 
// ----------------------------------------------------------------------------

function fetchProduct($IDMARK)
{
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
function displayProduct($products)
{
    if (count($products) > 0) {
        $concat='<option value="0">Quel produit ?</option>';
        foreach ($products as $data) {
            $concat.= '<option>' . $data['PRODUIT'] . '</option>';
        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     barêmes        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des barêmes 
// ----------------------------------------------------------------------------

function fetchTariff($idproduct, $idbrand)
{
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

function displayTariff($tariffs)
{
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
function fetchDuration($brand, $product)
{
    global $conn;
    $query = "SELECT DISTINCT DUREE FROM SLF_TARIFICATION WHERE MARQUE='$brand' AND PRODUIT='$product' ORDER BY DUREE";

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
        $ct=1;
        foreach ($durations as $data) {
            $selectedIndice=number_format(count($durations)/2,0,'.','') ;    
            if($ct==$selectedIndice)        
            {
                $concat.= '
                <div class="col-2 radios" >                
                    <label class="form-check-label" for="duration'.$data["DUREE"].'">'.$data["DUREE"].'</label>
                    <input class="check-input" type="radio" name="durationName" id="duration'.$data["DUREE"].'" onchange="myTariff.loadApport()" checked value="'.$data["DUREE"].'">                                                                
                </div>';   
            }else{
                $concat.= '
                <div class="col-2 radios" >                
                    <label class="form-check-label" for="duration'.$data["DUREE"].'">'.$data["DUREE"].'</label>
                    <input class="check-input" type="radio" name="durationName" id="duration'.$data["DUREE"].'" onchange="myTariff.loadApport()" value="'.$data["DUREE"].'">                                                                
                </div>';  
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

function fetchApport($brand,$product,$duration)
{
    global $conn;

    $query_apport = "SELECT DISTINCT APPORT FROM SLF_TARIFICATION WHERE MARQUE='$brand' AND PRODUIT='$product' AND DUREE = '$duration' ORDER BY APPORT";
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
        $ct=1;
        foreach ($apports as $data) {
            $selectedIndice=number_format(count($apports)/2,0,'.','') ;    
            if($ct==$selectedIndice)        
            {
                $concat.= '
                <div class="col-2 radios" >                
                    <label class="form-check-label" for="apport'.$data["APPORT"].'">'.$data["APPORT"].'</label>
                    <input class="check-input" type="radio" name="apportName" id="apport'.$data["APPORT"].'" onchange="myTariff.calcFunction()" checked value="'.$data["APPORT"].'">                                                                
                </div>';   
            }else{
                $concat.= '
                <div class="col-2 radios" >                
                    <label class="form-check-label" for="apport'.$data["APPORT"].'">'.$data["APPORT"].'</label>
                    <input class="check-input" type="radio" name="apportName" id="apport'.$data["APPORT"].'" onchange="myTariff.calcFunction()" value="'.$data["APPORT"].'">                                                                
                </div>';    
            }
            $ct++;
                                            
        }
        echo $concat;
    } else {
        echo '<option>No Data Found</option>';
    }
}