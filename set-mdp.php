<?php
session_start();
include_once "./connectToDB.php";

$email = mysqli_real_escape_string($conn, $_GET['email']);
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


  <form action="">
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Terminez les options de connexion</h5>
              <p class="text-center small">Veuillez definir un nouveau mot de passe afin d'accéder à
                l'espace
                client</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <section class="section py-4">
            <div class="container">

              <div class="col-lg-12">
                <div class="card-body">

                  <div class="col-12 form-floating mb-3">
                    <input type="text" name="id_unique" class="form-control" id="id_unique"
                      value="<?php echo $id_unique ?>" disabled>
                    <label for="id_unique" class="form-label">Votre identifiant est : </label>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Votre mot de passe !</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                  </div>
                  <div class="col-12">
                    <label for="yourPassword2" class="form-label">Ré-saisir le mot de passe</label>
                    <input type="password" name="password2" class="form-control" id="yourPassword2" required>

                  </div>

                </div>

              </div>

            </div>

          </section>


          <div class="modal-footer">

            <button type="button" class="btn btn-primary" onclick="showModal(2)">Suivant</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Appartenance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


            <div class="row no-gutters">

              <div class="col-lg-4 box">
                <h3>User SALAFIN</h3>
                

                <input type="checkbox" name="choix" value="option1" onchange="selectionnerOption(this)">
              </div>

              <div class="col-lg-4 box featured">
                <h3>Client particulier</h3>
         

                <input type="checkbox" name="choix" value="option1" onchange="selectionnerOption(this)">
              </div>

              <div class="col-lg-4 box">
                <h3>Vendeur</h3>

                <input type="checkbox" name="choix" value="option1" onchange="selectionnerOption(this)">
              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(1)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(3)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Boîte Modale 3</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Contenu de la Boîte Modale 3.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(2)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(4)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Boîte Modale 4</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Contenu de la Boîte Modale 4.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(3)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(5)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
  </form>
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