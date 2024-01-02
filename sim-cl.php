<?php

ob_start();
session_start();

include './connectToDB.php';
// $_SESSION['client_id_temp'] = "WV-692634956";

$shouldBeUser = false;
$isOK = false;
$tagList = array("chrono");

if (isset($_SESSION['client_id_temp'])) {

  $client_id_temp = $_SESSION['client_id_temp'];
  $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$client_id_temp}' ";
  $result_credit = $conn->query($query_credit);
  $credit = $result_credit->fetch_assoc();
  $isClient = false;
  $shouldBeUser = true;
} else {
  if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
    $query_client = "SELECT * FROM `slf_user_client` WHERE client_id = '{$client_id}' ";
    $result_client = $conn->query($query_client);
    $client = $result_client->fetch_assoc();

    $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$client_id}' ";
    $result_credit = $conn->query($query_credit);
    $credit = $result_credit->fetch_assoc();

    $tariff_id = $credit['tariff_id'];
    $select_tariff = "SELECT * FROM `slf_tarification` WHERE tariff_id='$tariff_id'";
    $result_select_tariff = $conn->query($select_tariff);
    $tariff = $result_select_tariff->fetch_assoc();

    if (empty($client['cin_piece'])) {
      $isOK = false;
    } else {
      $isOK = true;
    }
    $isClient = true;
    $shouldBeUser = true;
  }

}

if (!$shouldBeUser) {
  header('location: ./login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>cl | follow</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style-form.css" rel="stylesheet">
  <link href="styles/sim-cl.css" rel="stylesheet">

</head>

<body>

  <?php if (isset($_GET["tag"]) && in_array($_GET["tag"], $tagList)) {
    include 'header-cl.php';

    include 'siderbar-cl.php';
  } else {
    header('location: ./404');
  }
  if ($_GET["tag"] == "new") {
    include "new-credit-client.php";
  } ?>



  <?php if (isset($client['client_id']) && $isOK) {
    include 'users/client/profile-edit.php';

  } else if (isset($client['client_id']) && !$isOK) {

    include 'users/client/profile-edit-infos.php';

  } else if (!isset($client['client_id'])) {

    include 'users/client/profile-new.php';
  }
  ?>




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main-form.js"></script>
  <!-- <script type="text/javascript" src="javascript/sim-cl.js"></script> -->

  <script>
        function loadRegions() {
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php echo $client['region'] ?>" },
            success: function (data) {
                $("#idRegion").html(data);

                const RegionID = $("#idRegion").val();

                $.ajax({
                    url: "users/region_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                    success: function (data) {
                        console.log(data);
                        $("#idTown").html(data);
                    }
                });
            }
        });
    }

    function loadTowns() {
        const RegionID = $("#idRegion").val();
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
            success: function (data) {
                $("#idTown").html(data);
            }
        });
    }
  </script>

</body>

</html>

<?php
ob_end_flush();
?>