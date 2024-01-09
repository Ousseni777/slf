<?php

ob_start();
session_start();

include './connectToDB.php';
// $_SESSION['client_id_temp'] = "WV-692634956";
$_SESSION['client_id']="WV-692634956";
$shouldBeUser = false;
$isClient = false;
$isOK = false;

$tagList = array("chrono");
// unset($_SESSION['client_id_temp']);

if (isset($_SESSION['client_id_temp'])) {

  $client_id_temp = $_SESSION['client_id_temp'];
  $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$client_id_temp}' ";
  $result_credit = $conn->query($query_credit);

  if ($result_credit->num_rows > 0) {
    $credit = $result_credit->fetch_assoc();
    $shouldBeUser = true;
    $isClient = false;
  }
  
} else {
  if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
    $query_client = "SELECT * FROM `slf_user_client` WHERE client_id = '{$client_id}' ";
    $result_client = $conn->query($query_client);

    if ($result_client->num_rows > 0) {

      $client = $result_client->fetch_assoc();
      $shouldBeUser = true;
      $isClient = true;
  
      if (empty($client['cin_piece']) || empty($client['rib_piece']) || empty($client['adress_piece']) ) {
        $isOK = false;
      } else {
        $isOK = true;
      }
    }        
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
  <style>
    .spinner-pieces {
      position: absolute;
      z-index: 1;
      left: 48%;
      top: 45%;
      display: none;
    }
    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: purple;
        /* border-radius: 6px; */

    }

    .error-text {
        color: #721c24;
        padding: 8px 10px;
        text-align: center;
        border-radius: 5px;
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        margin-bottom: 10px;
        display: none;
    }

    .profile-new {
        padding: 20% 30%;
    }
    .inputImage {
        display: none;
    }

    .labelInputImage:hover {
        cursor: pointer;
    }

    .card-body .form-hide {
        /* display: none; */
    }

    .portfolio-wrap {
        transition: 0.3s;
        position: relative;
        overflow: hidden;
        /* padding: 5%; */
        z-index: 1;
    }


    .portfolio-wrap::before {
        content: "";
        background: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        transition: all ease-in-out 0.3s;
        z-index: 2;
        opacity: 0;
    }

    .portfolio-wrap img {
        height: 160px;
        width: 96%;
        margin: 2%;
    }

    .portfolio-wrap .portfolio-links {
        opacity: 1;
        left: 0;
        right: 0;
        bottom: -60px;
        z-index: 3;
        position: absolute;
        transition: all ease-in-out 0.3s;
        display: flex;
        justify-content: center;
    }

    .portfolio-wrap .portfolio-links a {
        color: #fff;
        font-size: 28px;
        text-align: center;
        background: rgba(20, 157, 221, 0.75);
        transition: 0.3s;
        width: 100%;
    }

    .portfolio-wrap .portfolio-links a:hover {
        background: rgba(20, 157, 221, 0.95);
    }

    .portfolio-wrap .portfolio-links a+a {
        border-left: 1px solid #37b3ed;
    }

    .portfolio-wrap:hover::before {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 1;
    }

    .portfolio-wrap:hover .portfolio-links {
        opacity: 1;
        bottom: 0;
    }
  </style>

</head>

<body>
  <?php if (isset($_GET["tag"]) && in_array($_GET["tag"], $tagList)) {
    // include 'header-cl.php';
    include 'siderbar-cl.php';
  } else {
    header('location: ./404');
  }
  if ($_GET["tag"] == "new") {
    include "new-credit-client.php";
  } ?>



  <?php if ($isClient && $isOK) {
    include 'users/client/tab-edit-profile.php';

  } else if ($isClient && !$isOK) {

    include 'users/client/tab-completion-pieces.php';

  } else if (!$isClient) {

    include 'users/client/tab-completion-profile.php';
  }
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="jquery.min.js"></script>

  <script src="assets/js/main-form.js"></script>

</body>
<script>

    function chargerImage(elementId) {
        var inputImage = document.getElementById(elementId);
        imagePreviewID = "preview-" + elementId;
        var imagePreview = document.getElementById(imagePreviewID);

        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            // Lire le contenu du fichier comme une URL de données
            reader.readAsDataURL(fichierImage);
        }
    }

    // Fonction appelée lorsqu'on clique sur le bouton "Enregistrer"
    function sauvegarderImage(inputImage) {
        var inputImage = document.getElementById(inputImage);
        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            console.log('Image sélectionnée:', fichierImage);
        } else {
            console.log('Aucune image sélectionnée.');
        }
    }

    // Ajoutez un écouteur d'événement pour détecter les changements dans le champ d'entrée de type "file"
    document.getElementById('inputImageCIN').addEventListener('change', function () {
        chargerImage('inputImageCIN');
    });
    document.getElementById('inputImageRib').addEventListener('change', function () {
        chargerImage('inputImageRib');

    });
    document.getElementById('inputImageAdress').addEventListener('change', function () {
        chargerImage('inputImageAdress');

    });
</script>

</html>

<?php
ob_end_flush();
?>