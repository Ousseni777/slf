<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register / salfin</title>
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


  <!-- Template Main CSS File -->
  <link href="assets/css/style-form.css" rel="stylesheet">
  <style>
    .errors {
      background-color: rgba(239, 139, 139, .5);
      border-radius: 5px;
      padding: 2%;
    }
  </style>

</head>

<body>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <?php if (isset($_SESSION['state']) && $_SESSION['state'] == 1) {
                echo $_SESSION['sms'];
                unset($_SESSION['sms']);
                unset($_SESSION['state']);
              } ?>
              <div class="d-flex justify-content-center py-4">
                <a href="./" class="logo d-flex align-items-center w-auto">
                  <img style="width: 100%; height: 100%;" src="assets/img/logo.svg" alt="">
                  <!-- <span class="d-none d-lg-block">SALAFIN</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">INSCRIVEZ-VOUS</h5>

                    <?php if (isset($_SESSION['sms'])) {
                      echo '<p class="errors">' . $_SESSION['sms'] . '</p>';
                      unset($_SESSION['sms']);
                    } else { ?>
                      <p class="text-center small">Inscrivez-vous afin d'obtenir votre identifiant</p>
                    <?php } ?>
                  </div>

                  <form class="row g-3 needs-validation" action="sendMail" method="get">
                    <div class="col-12 form-floating mb-3">
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <label for="yourEmail" class="form-label">Votre adresse mail</label>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">J'accepte les <a href="#">termes et les
                            conditions</a></label>
                        <div class="invalid-feedback">Acceptez avant de soumettre le formulaire.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-50" style="float: right;" type="submit">Continuer</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Déjà utilisateur ? <a href="login">Connectez-vous</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- Designed by <a href="">Ousseni Boro</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  <!-- Vendor JS Files -->

  <!-- Template Main JS File -->



  <script>

    window.addEventListener("load", function () {

      loadVendeurs();
      loadRegions();
    });

  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

  <script type="text/javascript" src="ax_script.js"></script>
</body>

</html>