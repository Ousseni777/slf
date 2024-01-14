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
  <link href="styles/style.css" rel="stylesheet">

  <style>
    #mainPreload {
      margin-left: 45%;
      margin-top: 20%;

    }

    @media (max-width: 1199px) {
      #mainPreload {
        margin-left: 40%;
        margin-top: 85%;
        padding: 20px;
      }
    }

    .spinner-register {
      position: absolute;
      z-index: 1;
      left: -10%;
      top: 10%;
    }
  </style>

</head>

<body>


  <main id="main-register" class="disabled-div">

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="container col-12 mt-5 success-text">
                <div class="alert alert-success" role="alert" style="text-align:center;">
                  <h4 class="alert-heading">Vérification de l'E-mail !</h4>
                  <p>Un mail de vérification vous a été envoyé, veuillez consulter votre e-mail</p>                  
                </div>
              </div>

              <div class="d-flex justify-content-center py-4">
                <a href="./" class="logo d-flex align-items-center w-auto">
                  <img style="width: 100%; height: 100%;" src="assets/img/logo.svg" alt="">
                  <!-- <span class="d-none d-lg-block">SALAFIN</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">


                <div class="card-body">
                  <div class="spinner-border text-danger spinner-register" id="mainPreloader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">DEMANDER MON CREDIT EN LIGNE</h5>
                    <p class="text-center small">Mes coordonnées</p>

                  </div>


                  <form class="row g-3 needs-validation" action="#" id="formRegister" method="post">
                    <div class="error-text col-12"></div>
                    <div class="col-12 form-floating mb-3">
                      <input type="email" name="EMAIL" placeholder="Votre adresse mail" class="form-control"
                        id="yourEmail">
                      <label for="yourEmail" class="form-label">Votre adresse mail</label>
                    </div>
                    <div class="col-12 form-floating mb-3">
                      <input type="text" name="PHONE" class="form-control" placeholder="Votre N° Téléphone" id="phone">
                      <label for="phone" class="form-label">Votre N° Téléphone</label>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check" style="width:80%;">
                        <input class="form-check-input" type="checkbox" value="" id="acceptTerms">
                        <label class="form-check-label" for="acceptTerms">J'accepte les <a href="#">termes et les
                            conditions</a></label>

                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-outline-primary w-100 btn-register" style="float: right;"
                        type="submit">Continuer</button>
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


  <div class="main spinner-grow text-danger" id="mainPreload" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <script>

  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->

  <script type="text/javascript" src="javascript/signup.js"></script>
</body>

</html>