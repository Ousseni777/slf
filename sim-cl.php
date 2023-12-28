<?php
ob_start();
session_start();
// $_SESSION['client_id']="MOZ-619356449";

if (!isset($_SESSION["client_id"])) {
  header('location: ./login');
}

include './connectToDB.php';

$client_id = $_SESSION['client_id'];

$tagList = array("chrono", "list","new");
$isOK = false;
$select_client = "SELECT * FROM `slf_user_client` WHERE client_id='$client_id' ";
$result_select_client = $conn->query($select_client);
if ($result_select_client->num_rows > 0) {
  $client = $result_select_client->fetch_assoc();
  
  $isClient = true;
  if ($client['cin_piece'] == null) {
    $isOK = false;
  } else {
    $isOK = true;
  }
} else {
  $isClient = false;
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


  



  <main id="main" class="main">



    <section class="section dashboard">

      <?php if ($_GET["tag"] == "chrono") { ?>
        <div class="row" id="dashboard">
          <div class="pagetitle ">
            <h1>Complétez vos informations personnelles pour finaliser votre demande</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Infos</a></li>
                <li class="breadcrumb-item active">Justificatifs</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->
          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row align-items-center justify-content-center">


              <?php if ($isClient) { ?>
                <button class="col-xxl-4 col-md-8 btn btn-lg myBtn is-client" id="infos-perso" data-bs-toggle="modal"
                  data-bs-target="#modalInfo">
                  <div class="card info-card revenue-card">

                    <div class="row card-body">
                      <h5 class="col-12 card-title">Infos personnelles</span></h5>

                      <div class="col-12">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-check-circle processed"></i>

                        </div>
                      </div>
                    </div>
                  </div>
                </button><!-- End Revenue Card -->

              <?php } else { ?>
                <button class="col-xxl-4 col-md-8 btn btn-lg myBtn" id="infos-perso"
                  data-bs-toggle="modal" data-bs-target="#modalInfo">
                  <div class="card info-card revenue-card">

                    <div class="row card-body">
                      <h5 class="col-12 card-title">Infos personnelles</span></h5>

                      <div class="col-12">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-person-circle processed"></i>

                        </div>
                      </div>
                    </div>
                  </div>
                </button><!-- End Revenue Card -->
              <?php } ?>

              <?php if ($isOK) { ?>
                <button class="col-xxl-4 col-md-8 btn btn-lg mt-5 myBtn is-ok" style="pointer-events: none;" id="pieces" data-bs-toggle="modal"
                  data-bs-target="#modalPieces">
                  <div class="card info-card revenue-card">

                    <div class="row card-body">
                      <h5 class="col-12 card-title">Justificatifs</span></h5>

                      <div class="col-12 align-items-center justify-content-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-check-circle processed"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </button><!-- End Revenue Card -->

              <?php } else if($isClient && !$isOK) { ?>
                <button class="col-xxl-4 col-md-8 btn btn-lg mt-5 myBtn" id="pieces" data-bs-toggle="modal"
                  data-bs-target="#modalPieces">
                  <div class="card info-card revenue-card">

                    <div class="row card-body">
                      <h5 class="col-12 card-title">Justificatifs</span></h5>

                      <div class="col-12 align-items-center justify-content-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-file processed"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </button><!-- End Revenue Card -->
              <?php }else{ ?>
                <button class="col-xxl-4 col-md-8 btn btn-lg mt-5 myBtn" id="pieces" data-bs-toggle="modal"
                  data-bs-target="#modalPieces">
                  <div class="card info-card revenue-card">

                    <div class="row card-body">
                      <h5 class="col-12 card-title">Justificatifs</span></h5>

                      <div class="col-12 align-items-center justify-content-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-patch-exclamation processed"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </button><!-- End Revenue Card -->
                <?php } ?>

            </div>
          </div><!-- End Left side columns -->



          <!-- Right side columns -->
          <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>Chronologie</span></h5>

                <div class="activity">

                  <div class="activity-item d-flex">

                    <div class="activite-label">Il y a 6 jours</div>
                    <i class='bi bi-check-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      <span class="fw-bold text-dark">Infos personnelles</span>
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex mt-5">
                    <div class="activite-label">Il y a 4 jours</div>
                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                    <div class="activity-content">
                      <span>Justificatifs</span>
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex mt-5">
                    <div class="activite-label">Il y a 2 jours</div>
                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                    <div class="activity-content">
                      Prise de contact
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex mt-5">
                    <div class="activite-label">Il y a 2 jours</div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content">
                      <span>Validation de demande</span>
                    </div>
                  </div><!-- End activity item-->

                  <div class="activity-item d-flex mt-5">
                    <div class="activite-label">2Il y a 2 jours</div>
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                      <span>Virement</span>
                    </div>
                  </div><!-- End activity item-->
                </div>

              </div>
            </div><!-- End Recent Activity -->
          </div>

        </div>
      <?php } else if ($_GET["tag"] == "list") { ?>


          <div class="row" id="listDemande">
            <div class="pagetitle ">
              <h1>Liste de mes crédits</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Infos</a></li>
                  <li class="breadcrumb-item active">Justificatifs</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="col-lg-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">


                  <table class="table table-borderless table-striped datatable">
                    <thead>
                      <tr>
                        <th scope="col">#Référence</th>
                        <th scope="col">Date création</th>
                        <th scope="col">Type de demande</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Statut</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                    $select_credit = "SELECT * FROM `credit_client` WHERE client_id='$client_id'";
                    $result_select_credit = $conn->query($select_credit);
                    if($result_select_credit->num_rows > 0){
                      $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
                    }
                    if (count($credits) > 0) {
                      foreach ($credits as $credit) {
                    ?>
                      <tr>
                        <th scope="row"><a href="detail?id=<?php echo $credit['credit_id'] ?>"># <?php echo $credit['credit_id'] ?> </a></th>
                        <td><?php echo $credit['up_date'] ?></td>
                        <td><a href="#" class="text-primary"><?php echo $credit['project'] ?></a></td>
                        <td><?php echo number_format($credit['amount'], 2, ".", " ") ?></td>
                        <td><span class="badge bg-success"><?php echo $credit['state'] ?></span></td>
                      </tr>
                    <?php } } ?>                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
          </div>
          <?php } ?>



    </section>

    <div class="modal fade" id="modalInfo" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
      data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
      <div class="spinner-border text-danger spinner-register" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>

      <div class="modal-dialog modal-dialog-scrollable">
        <div class="success-text" id="success-infos" >
          <div class="alert alert-success" role="alert" style="text-align:center;">
            <h4 class="alert-heading">Félicitation !</h4>
            <p>Vos données personnelles ont été envoyées avec succès, merci de nous faire part les justificatifs !</p>
          </div>
        </div>
        <div class="modal-content">
          <div class="modal-header">
            <div class="pagetitle">
              <h1>Infos de l'emprunteur</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="sim">Simulation</a></li>
                  <li class="breadcrumb-item">Emprunteur</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <a href="./sim-cl?tag=chrono" class="btn-close" aria-label="Close"></a>
          </div>
          <div class="modal-body">

            <div class="container">
              <section class="section">
                <form action="#" enctype="multipart/form-data" id="formInfos" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title" onclick="displayElement('.civilite')"><i
                              class="bi bi-person left"></i>Civilité<i class="bi right bi-plus civilite-bi"></i></h5>
                          <div class="col-12 form-floating mb-3 civilite">
                            <input type="text" name="lname" class="form-control" id="lname" required>
                            <label for="lname" class="form-label">Nom</label>
                          </div>
                          <div class="col-12 form-floating mb-3 civilite">
                            <input type="text" name="fname" class="form-control" id="fname" required>
                            <label for="fname" class="form-label">Prénom</label>
                          </div>
                          <div class="col-6 form-floating mb-3 civilite">

                            <span> Titre</span>
                            <br>
                            <div class="form-check" style="float: left;">
                              <input class="form-check-input" type="radio" name="title" id="titleM" value="Masculin"
                                checked>
                              <label class="form-check-label" for="titleM">
                                Masculin
                              </label>
                            </div>
                            <div class="form-check" style="float: right;">
                              <input class="form-check-input" type="radio" name="title" id="titleF" value="Masculin">
                              <label class="form-check-label" for="titleF">
                                Feminin
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title" onclick="displayElement('.reference')"><i
                              class="bi bi-file-earmark-text left"></i>Reférence<i
                              class="bi right bi-plus reference-bi"></i></h5>
                          <div class="col-12 form-floating mb-3 reference">
                            <input type="text" name="cin" class="form-control" id="cin" required>
                            <label for="cin" class="form-label">Numéro CIN / Carte de
                              séjour</label>
                          </div>
                          <div class="col-12 form-floating mb-3 reference">
                            <input type="text" name="income" class="form-control" id="income" required>
                            <label for="income" class="form-label">Total revenus mensuels
                              (net en DH)</label>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-body">

                          <h5 class="card-title" onclick="displayElement('.coordonnee')"><i
                              class="bi bi-geo-alt left"></i>Coordonnées<i class="bi right bi-plus coordonnee-bi"></i>
                          </h5>
                          <div class="col-12 form-floating mb-3 coordonnee">
                            <select name="region" onchange="loadTowns()" class="form-select" id="yourRegion"
                              aria-label="State">
                            </select>
                            <label for="yourRegion" class="form-label">Votre région !
                            </label>
                          </div>
                          <div class="col-12 form-floating mb-3 coordonnee">
                            <select name="town" class="form-select" id="yourTown">

                            </select>
                            <label for="yourTown" class="form-label">Votre ville actuelle
                              !</label>
                          </div>
                        </div>
                      </div>


                    </div>


                    <div class="card errors">

                    </div>


                  </div>
                  <div class="modal-footer">
                    <a href="./sim-cl?tag=chrono" class="btn btn-secondary">Revenir</a>
                    <button type="submit" class="btn btn-primary btn-send" id="" name="infos_pieces">Envoyer la
                      demande</button>
                  </div>
                </form>

              </section>

            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="modalPieces" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
      data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
      <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderPieces" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="success-text" id="success-pieces">
          <div class="alert alert-success" role="alert" style="text-align:center;">
            <h4 class="alert-heading">Félicitation !</h4>
            <p>Vos données personnelles ont été envoyées avec succès, merci de nous faire part les justificatifs !</p>
          </div>
        </div>
        <div class="modal-content">
          <div class="modal-header">
            <div class="pagetitle">
              <h1>Infos de l'emprunteur</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="sim">Simulation</a></li>
                  <li class="breadcrumb-item">Emprunteur</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <a href="./sim-cl?tag=chrono" class="btn-close" aria-label="Close"></a>
          </div>
          <div class="modal-body">
            <div class="container">
              <!-- <h2>Conditions d'Utilisation</h2> -->
              <section class="section">
                <form action="#" enctype="multipart/form-data" id="formPieces" method="post">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title" onclick="displayElement('.justificatifs')"><i
                          class="bi bi-file-earmark-text left"></i>Justificatifs<i
                          class="bi right bi-plus justificatifs-bi"></i></h5>

                      <div class="col-12 form-floating mb-3 justificatifs">
                        <input type="file" name="yourCIN" class="form-control"
                          accept="image/x-png,image/gif,image/jpeg,image/jpg" id="yourCIN" >
                        <label for="yourCIN" class="form-label">Numéro CIN / Carte de
                          séjour</label>
                      </div>

                      <div class="col-12 form-floating mb-3 justificatifs">
                        <input type="file" name="yourRIB" class="form-control"
                          accept="image/x-png,image/gif,image/jpeg,image/jpg" id="yourRIB" >
                        <label for="yourRIB" class="form-label">Spécimen Chèque ou RIB
                        </label>
                      </div>
                      <div class="col-12 form-floating mb-3 justificatifs">
                        <input type="file" name="yourAdresse" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                          class="form-control" id="yourAdresse">
                        <label for="yourAdresse" class="form-label">Justificatif
                          d'adresse </label>
                      </div>



                    </div>
                    <div class="card errors">

                    </div>

                  </div>


                  <div class="modal-footer">
                    <a href="./sim-cl?tag=chrono" class="btn btn-secondary">Revenir</a>
                    <button type="submit" class="btn btn-primary btn-send-pieces" name="btn-send-pieces">Envoyer la
                      demande</button>
                  </div>
                </form>

              </section>

            </div>
          </div>

        </div>
      </div>
    </div>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  

  <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main-form.js"></script>
  <script type="text/javascript" src="javascript/sim-cl.js"></script>

</body>

</html>

<?php
ob_end_flush();
?>