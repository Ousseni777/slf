<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>forgot | password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style-form.css" rel="stylesheet">
  <style>
    .errors{
      background-color: rgba(239, 139, 139,.5);   
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
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="./" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.svg" style="width: 100%; height: 100%;" alt="">
                  <!-- <span class="d-none d-lg-block">SALAFIN</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <?php
                if (isset($_SESSION['state'])) {
                    // echo $_SESSION['state']?>
                    <div class="pt-4 pb-2">        
                    <h5 class="card-title text-center pb-0 fs-4">Récuperation de compte</h5>             
                      <p class="text-center small errors"><?php echo $_SESSION['sms']?></p>
                    </div>
                  <?php unset($_SESSION['state']); unset($_SESSION['sms']);  } else {?>
                  <div class="pt-4 pb-2">              
                  <h5 class="card-title text-center pb-0 fs-4">Récuperation de compte</h5>     
                    <p class="text-center small">Saisir votre adresse Email pour récuperer votre identifiant</p>
                  </div>
                  <?php }?>
                  <form action="returnedID" method="get" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Votre adresse !</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email']; unset($_SESSION['email']);} ?>">                                               
                      </div>
                    </div>
               
                    <div class="col-12">
                      <div class="form-check">                        
                        <a href="login" class="form-check-label" for="rememberMe">>> Je me connecte</a>                        
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Récuperer</button>
                    </div>
            
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="">Ousseni Boro</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

  <!-- Template Main JS File -->
  

</body>

</html>