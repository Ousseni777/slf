<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
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
    .error-text {
      background-color: rgba(239, 139, 139, .5);
      border-radius: 5px;
      text-align: center;
      padding: 2%;
      display: none;
    }

    .spinner-login {
      position: absolute;
      z-index: 1;
      left: 46%;
      top: 40%;
      display: none;
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
                  <div class="spinner-border text-danger spinner-login" id="mainPreloader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connectez à votre espace client</h5>
                    <p class="text-center small">Pour vous connecter entrez votre identifiant & CIN</p>
                  </div>

                  <form action="#" method="POST" id="loginForm" class="row g-3 needs-validation">
                    <div class="error-text col-12"></div>

                    <div class="col-12">
                      <label for="ID_UK" class="form-label">Saisir votre identifiant</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="ID_UK" class="form-control" id="ID_UK">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="CIN" class="form-label">Votre CIN / Carte de séjour</label>
                      <input type="text" name="CIN" class="form-control">
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <a href="forgot" class="form-check-label" for="rememberMe">Identifiant oublié
                          ?</a>

                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100 btn-connect" type="submit">Se connecter</button>
                    </div>
                    <div class="col-12">
                      <!-- <p class="small mb-0">Vous n'avez pas de compte ? <a href="register-ec">Créer un compte</a></p> -->
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>
  <!-- <script type="text/javascript" src="javascript/login.js"></script> -->
  <!-- Template Main JS File -->
  <script>
    const form = document.getElementById("loginForm"),
      btnSend = form.querySelector(".btn-connect"),
      errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
      e.preventDefault();
    };

    btnSend.onclick = () => {
      // form.style.pointerEvents = "none";
      $('#mainPreloader').show();
      errorText.style.display = "none";
      form.style.opacity = 0.5;

      setTimeout(function () {
        $('#mainPreloader').hide();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./users/connectRequest.php", true);

        xhr.onload = () => {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              console.log(xhr.responseText);
              let responseData = JSON.parse(xhr.responseText);

              if (responseData.status === "success") {
                if (responseData.message !== "CLIENT") {
                  location.href = "sim-fx?tag=fx";
                } else if (responseData.message === "CLIENT") {
                  location.href = "sim-cl?tag=chrono";
                }

              } else {
                form.style.pointerEvents = "all";
                form.style.opacity = 1;
                errorText.style.display = "block";
                errorText.innerHTML = responseData.message;
              }
            }
          }
        };

        let formData = new FormData(form);
        xhr.send(formData);
      }, 2000);
    };

  </script>


</body>

</html>