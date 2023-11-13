<?php


include './connectToDB.php';

switch ($_POST['ID_SCRIPT']) {
    case "region":
        $regions = fetchRegion();
        displayRegion($regions);
        break;
    case "town":
        $idregion = $_POST['ID_REGION'];
        // $idprovince = $_POST['ID_PROVINCE'];
        $towns = fetchTown($idregion);
        displayTown($towns);
        break;
    case "vendeur":
        $brands = fetchBrand();
        displayBrand($brands);
        break;
    default:
        break;
}


// *********************************************************     REGIONS POSTALES       *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des regions postales 
// ----------------------------------------------------------------------------
function fetchRegion()
{
    global $conn;
    $query = "SELECT DISTINCT REGION_POSTALE FROM CODES_POSTAUX";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql = [];
    }
    return $sql;
}

// ----------------------------------------------------------------------------
//  Afficher la liste des regions postales
// ----------------------------------------------------------------------------

function displayRegion($regions)
{
    if (count($regions) > 0) {
        foreach ($regions as $data) {
            echo '<option value="' . $data['REGION_POSTALE'] . '">' . $data['REGION_POSTALE'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     PROVINCES        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des PROVINCES 
// ----------------------------------------------------------------------------

// function fetchProvince($idregion)
// {
//     global $conn;
//     $query = "SELECT PROVINCE FROM CODES_POSTAUX WHERE REGION_POSTALE LIKE '$idregion'";
//     $result = $conn->query($query);

//     if ($result->num_rows > 0) {
//         $sql = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     } else {
//         $sql = [];
//     }
//     return $sql;
// }

// ----------------------------------------------------------------------------
//  Afficher la liste des PROVINCES
// ----------------------------------------------------------------------------
// function displayProvince($provinces)
// {
//     if (count($provinces) > 0) {
//         foreach ($provinces as $data) {
//             echo '<option value="' . $data['PROVINCE'] . '" >' . $data['PROVINCE'] . '</option>';
//         }
//     } else {
//         echo '<option>No Data Found</option>';
//     }
// }

// *********************************************************     VILLES        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste des villes 
// ----------------------------------------------------------------------------

function fetchTown($idregion)
{
    global $conn;
    $query = "SELECT LOCALITE FROM CODES_POSTAUX WHERE REGION_POSTALE = '$idregion'";
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

function displayTown($towns)
{
    if (count($towns) > 0) {
        foreach ($towns as $data) {
            echo '<option value="' . $data['LOCALITE'] . '" >' . $data['LOCALITE'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}

// *********************************************************     Marques        *************************************************//
// ----------------------------------------------------------------------------
//  Recuperer la liste  des marques 
// ----------------------------------------------------------------------------

function fetchBrand()
{
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

function displayBrand($brands)
{
    if (count($brands) > 0) {
        foreach ($brands as $data) {
            echo '<option value="' . $data['MARQUE'] . '">' . $data['MARQUE'] . '</option>';
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}
