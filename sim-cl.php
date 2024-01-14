<?php

ob_start();
session_start();

include './connectToDB.php';
// $_SESSION['CLIENT_ID_UK_TEMP'] = "CN-805410552";
// $_SESSION['client_id'] = "WV-692634956";
$_SESSION['page'] = "./sim-cl?tag=chrono";
$shouldBeUser = false;
$isClient = false;
$isOK = false;

$tagList = array("chrono");
unset($_SESSION['CLIENT_ID_UK_TEMP']);

if (isset($_SESSION['CLIENT_ID_UK_TEMP'])) {

  $CLIENT_ID_UK_TEMP = $_SESSION['CLIENT_ID_UK_TEMP'];
  $query_credit = "SELECT * FROM `credit_client` WHERE CLIENT_ID = '{$CLIENT_ID_UK_TEMP}' ";
  $result_credit = $conn->query($query_credit);

  if ($result_credit->num_rows > 0) {
    $credit = $result_credit->fetch_assoc();
    $shouldBeUser = true;
    $isClient = false;
  }

} else {
  if (isset($_SESSION['CLIENT_ID_UK'])) {
    $CLIENT_ID_UK = $_SESSION['CLIENT_ID_UK'];
    $query_client = "SELECT * FROM `slf_user_client` WHERE CLIENT_ID_UK = '{$CLIENT_ID_UK}' ";
    $result_client = $conn->query($query_client);

    if ($result_client->num_rows > 0) {

      $client = $result_client->fetch_assoc();
      $_SESSION['CIN_PIECE'] = $client['CIN_PIECE'];
      $_SESSION['RIB_PIECE'] = $client['RIB_PIECE'];
      $_SESSION['ADRESS_PIECE'] = $client['ADRESS_PIECE'];
      $shouldBeUser = true;
      $isClient = true;

      if (empty($client['CIN_PIECE']) || empty($client['RIB_PIECE']) || empty($client['ADRESS_PIECE'])) {
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

<div class="modal fade mt-5" id="feedbackModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row modal-header" style="text-align: center;">
                <i class="col-12 bi bi-check-circle" style="font-size: 100px;"></i>
                <div class="col-12">
                    <div class="row">
                        <p class="info-dialog" id="successMessage"> </p>
                    </div>

                    <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary" id="back">OK</a>

                </div>

            </div>


        </div>
    </div>
</div>

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

  const formPieces = document.getElementById("formPieces"),
    btnContinuousPieces = formPieces.querySelector(".btn-send-pieces"),
    errorTextPieces = formPieces.querySelector(".errors");

  formPieces.onsubmit = (e) => {
    e.preventDefault();
  }

  btnContinuousPieces.onclick = () => {
    formPieces.style.pointerEvents = "none";
    $('#mainPreloaderPieces').show();
    errorTextPieces.style.display = "none";
    formPieces.style.opacity = .5;

    setTimeout(function () {
      $('#mainPreloaderPieces').hide();
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "./users/client/save-pieces.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            let responseData = JSON.parse(xhr.responseText);
            let data = responseData.status.trim();

            if (data === "success") {
              $("#modalPieces").modal("hide");
              $("#successMessage").html(responseData.message);
              $("#feedbackModal").modal("show");
            } else {
              formPieces.style.pointerEvents = "all";
              formPieces.style.opacity = 1;
              errorTextPieces.style.display = "block";
              errorTextPieces.innerHTML = responseData.message;

            }
          }
        }
      }

      let formData = new FormData(formPieces);
      xhr.send(formData);
    }, 2000);

  }

  const formInfos = document.getElementById("form-client-infos"),
    btnContinuous = formInfos.querySelector(".btn-send-infos"),
    errorTextInfos = formInfos.querySelector(".errors");

  formInfos.onsubmit = (e) => {
    e.preventDefault();
  }

  btnContinuous.onclick = () => {
    formInfos.style.pointerEvents = "none";
    $('#mainPreloaderInfos').show();
    errorTextInfos.style.display = "none";
    formInfos.style.opacity = .5;

    setTimeout(function () {
      $('#mainPreloaderInfos').hide();
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "./users/client/save-infos.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            let responseData = JSON.parse(xhr.responseText);
            let data = responseData.status.trim();
            if (data === "success") {

              $("#modalInfos").modal("hide");
              $("#successMessage").html(responseData.message);
              $("#feedbackModal").modal("show");
            } else {
              formInfos.style.pointerEvents = "all";
              formInfos.style.opacity = 1;
              errorTextInfos.style.display = "block";
              errorTextInfos.innerHTML = responseData.message;

            }
          }
        }
      }

      let formData = new FormData(formInfos);
      xhr.send(formData);
    }, 2000);

  }
</script>

</html>

<?php
ob_end_flush();
?>