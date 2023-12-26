<?php 
include './connectToDB.php';
$select_credit = "SELECT * FROM `majestic` WHERE 1";
$result_select_credit = $conn->query($select_credit);
if ($result_select_credit->num_rows > 0) {
    $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
}
if (count($credits) > 0) {
    $DateEch1 = "25/01/2020";

    // Créer un objet DateTime à partir de la chaîne de date
    $DateEch11 = DateTime::createFromFormat('d/m/Y', $DateEch1);
    $DateEch2 = DateTime::createFromFormat('d/m/Y', $DateEch1);
    $DateEch3 = DateTime::createFromFormat('d/m/Y', $DateEch1);
    $DateEch4 = DateTime::createFromFormat('d/m/Y', $DateEch1);
    $DateEch0 = DateTime::createFromFormat('d/m/Y', $DateEch1);
    // $DateEch1->format('Y-m-d'); 
    
    foreach ($credits as $credit) {
        $dossier = $credit['NUMDOSS'];
        $DateEch11->add(new DateInterval('P1M'));
        $DateEch2->add(new DateInterval('P3M'));
        $DateEch3->add(new DateInterval('P5M'));
        $DateEch4->add(new DateInterval('P5M'));
        $DateEch0->sub(new DateInterval('P1M'));
        $d1=$DateEch11->format('Y-m-d');
        $d2=$DateEch2->format('Y-m-d');
        $d3=$DateEch3->format('Y-m-d');
        $d4=$DateEch4->format('Y-m-d');
        $d0=$DateEch0->format('Y-m-d');
        $sql="UPDATE `majestic` SET `DATEPROD`='$d1', `DATEENG`='$d2', `DATEINST`='$d3', `DATEECH1`='$d4',`DATECREATION`='$d0' WHERE NUMDOSS='$dossier' ";
        $conn->query($sql);
        echo $DateEch0->format('Y-m-d') . '<br>';
        
        
     }
} 

