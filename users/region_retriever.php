<?php


include '../connectToDB.php';

switch ($_POST['ID_SCRIPT']) {
    case "edit-region":
        $regions = fetchRegion();
        editRegion($regions);
        break;
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

function editRegion($regions){
    $region=$_POST['REGION_POSTALE'];
    if (count($regions) > 0) {
        foreach ($regions as $data) {
            if($data['REGION_POSTALE'] == $region){
                echo '<option selected value="' . $data['REGION_POSTALE'] . '">' . $data['REGION_POSTALE'] . '</option>';
            }else{
                echo '<option value="' . $data['REGION_POSTALE'] . '">' . $data['REGION_POSTALE'] . '</option>';
            }
        }
    } else {
        echo '<option>No Data Found</option>';
    }
}
function fetchTown($idregion)
{
    global $conn;
    $query = "SELECT LOCALITE FROM CODES_POSTAUX WHERE REGION_POSTALE = '{$idregion}'";
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
