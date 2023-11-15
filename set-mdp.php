<?php
session_start();
include_once "./connectToDB.php";

$user_type = $_GET['choix'];
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$_SESSION['email'] = $email;
$sql_mail = "SELECT EMAIL  FROM SLF_USER";
$sql_result = $conn->query($sql_mail);
$mails = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
$listMail = array();
$hashedList = array();
foreach ($mails as $mail) {
  $mail = $mail["EMAIL"];
  $hashedMail = md5($mail);
  array_push($listMail, $mail);
  array_push($hashedList, $hashedMail);
}

if (in_array($email, $hashedList)) {
  $query = "SELECT ID_UNIQUE  FROM SLF_USER  WHERE email = '{$listMail[array_search($email, $hashedList)]}'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_unique = $row['ID_UNIQUE'];
    //echo "Le mot '$email' identifiant : ". $row['ID_UNIQUE'] ;
  } else {
    echo "ECHEC.";
    // header("location: ./set-mdp");
  }

} else {
  echo "Le mot '$email' n'est pas dans la liste.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parcours</title>
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/style-form.css" rel="stylesheet">

</head>

<body>


  <?php
  switch ($user_type) {
    case "client":
      include_once "client-part.php";
      break;
    case "vendeur":
      include_once "client-slf.php";
      break;
    case "admin":
      include_once "admin.php";
      break;
    default:
      include_once "client-part.php";
  }
  ?>

  <!-- Ajoutez d'autres boîtes modales Bootstrap si nécessaire -->
  <!-- Ajoutez les liens vers les fichiers JavaScript de Bootstrap et jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>

    $(document).ready(function () {
      $('#modal1').modal('show');
    });
    // Fonction pour afficher la boîte modale suivante ou précédente
    function showModal(index) {
      // Fermer la boîte modale actuelle si elle est déjà ouverte
      $('#modal' + currentIndex).modal('hide');

      // Afficher la boîte modale suivante ou précédente
      currentIndex = index;
      $('#modal' + currentIndex).modal('show');
    }

    // Index de la boîte modale actuelle
    var currentIndex = 1;


    function selectionnerOption(checkbox) {
      var checkboxes = document.querySelectorAll('input[name="choix"]');

      // Désélectionner les autres cases à cocher
      checkboxes.forEach(function (currentCheckbox) {
        if (currentCheckbox !== checkbox) {
          currentCheckbox.checked = false;
        }
      });
    }
  </script>
</body>

</html>