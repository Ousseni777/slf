<?php

include '../../connectToDB.php';

if ($_POST['NUMDOSS']) {
    $numdoss = mysqli_real_escape_string($conn, $_POST['NUMDOSS']);
    // $numdoss=$_POST['NUMDOSS'];
    $query = "SELECT * FROM `majestic` WHERE NUMDOSS = '$numdoss'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $dossier = $result->fetch_assoc();
        $result =[
            "NUMDOSS" => $dossier['NUMDOSS'],
            "DATECREATION" => $dossier['DATECREATION'],
            "MARQUE" => $dossier['MARQUE'],
            "PRODUIT" => $dossier['PRODUIT'],
            "BAREME" => $dossier['BAREME'],
            "MNT_DEMANDE" => $dossier['MNT_DEMANDE'],
            "DUREE" => $dossier['DUREE'],
            "MENSUALITE" => $dossier['MENSUALITE'],
            "FRAISDOSS" => $dossier['FRAISDOSS'],
            "TAUXINT" => $dossier['TAUXINT'],
    
            "ETATPRODLIB" => $dossier['ETATPRODLIB'],
            "ETATENGLIB" => $dossier['ETATENGLIB'],
            "ETATINSTLIB" => $dossier['ETATINSTLIB'],
    
            "IDCLIENT" => $dossier['IDCLIENT'],
            "NOM" => $dossier['NOM'],
            "NOMSUITE" => $dossier['NOMSUITE'],
    
            "IDVENDEUR" => $dossier['IDVENDEUR'],
            "RIS" => $dossier['RIS'],
            "state" => "success"
        ];
    }else{
        $result =[
            "state" => "No data to fetch"
        ];
    }
        
    echo json_encode($result);
}   
