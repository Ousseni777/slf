<?php
// include './connectToDB.php';
// $select_credit = "SELECT * FROM `majestic` WHERE 1";
// $result_select_credit = $conn->query($select_credit);
// if ($result_select_credit->num_rows > 0) {
//     $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
// }
// if (count($credits) > 0) {
//     $DateEch1 = "25/01/2020";

// Créer un objet DateTime à partir de la chaîne de date
// $DateEch11 = DateTime::createFromFormat('d/m/Y', $DateEch1);
// $DateEch2 = DateTime::createFromFormat('d/m/Y', $DateEch1);
// $DateEch3 = DateTime::createFromFormat('d/m/Y', $DateEch1);
// $DateEch4 = DateTime::createFromFormat('d/m/Y', $DateEch1);
// $DateEch0 = DateTime::createFromFormat('d/m/Y', $DateEch1);
// $DateEch1->format('Y-m-d'); 

// foreach ($credits as $credit) {
//     $dossier = $credit['NUMDOSS'];
//     $DateEch11->add(new DateInterval('P1M'));
//     $DateEch11->add(new DateInterval('P1D'));
//     $DateEch2->add(new DateInterval('P2M'));
//     $DateEch2->add(new DateInterval('P3D'));
//     $DateEch3->add(new DateInterval('P3M'));
//     $DateEch3->add(new DateInterval('P5D'));
//     $DateEch4->add(new DateInterval('P3M'));
//     $DateEch4->add(new DateInterval('P5D'));
//     $DateEch0->sub(new DateInterval('P1M'));
//     $d1=$DateEch11->format('Y-m-d');
//     $d2=$DateEch2->format('Y-m-d');
//     $d3=$DateEch3->format('Y-m-d');
//     $d4=$DateEch4->format('Y-m-d');
//     $d0=$DateEch0->format('Y-m-d');
// $sql="UPDATE `majestic` SET `DATEPROD`='$d1', `DATEENG`='$d2', `DATEINST`='$d3', `DATEECH1`='$d4',`DATECREATION`='$d0' WHERE NUMDOSS='$dossier' ";
//         $sql="UPDATE `majestic` SET `IDVENDEUR`='MKE-1150546668' WHERE NUMDOSS='$dossier' ";
//         $conn->query($sql);
//         echo $DateEch0->format('Y-m-d') . '<br>';


//      }
// } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tableau Bootstrap</title>
</head>

<body>

    <div class="container mt-4">
        <h2>Tableau d'amortissement</h2>
        <table class="table table-striped table-bordered">
            <legend>Mon tableau</legend>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Date d'échéance</th>
                    <th scope="col">Montant du paiement</th>
                    <th scope="col">Intérêts</th>
                    <th scope="col">Remboursement du capital</th>
                    <th scope="col">Solde du capital restant dû</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/2023</td>
                    <td>$500.00</td>
                    <td>$50.00</td>
                    <td>$450.00</td>
                    <td>$9,550.00</td>
                </tr>
                <!-- Ajoutez d'autres lignes selon vos besoins -->
            </tbody>
        </table>
    </div>

    <!-- Chargement des scripts Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

