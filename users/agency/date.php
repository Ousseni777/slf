<?php

include '../../connectToDB.php';

if ($_POST['NUMDOSS']) {
    $numdoss = mysqli_real_escape_string($conn, $_POST['NUMDOSS']);
    // $numdoss=$_POST['NUMDOSS'];
    $query = "SELECT * FROM `majestic` WHERE NUMDOSS = '$numdoss'";
    $result = $conn->query($query);
    $dossier = $result->fetch_assoc();

    $result =[
        "prod" => $dossier['DATEPROD'],
        "eng" => $dossier['DATEENG'],
        "inst" => $dossier['DATEINST']
    ];
    

    echo json_encode($result);
}   
