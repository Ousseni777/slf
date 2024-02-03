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

    .container {
      position: relative;
    }

    #mainPreloader {
      /* display: none; */
      position: absolute;
      left: 40%;
      top: 40%;
      opacity: .7;
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
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Récuperation de compte</h5>
                    <p class="text-center small">Saisir votre adresse Email pour récuperer votre identifiant</p>
                  </div>

                  <div class="spinner-border text-danger" id="mainPreloader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>

                  <form action="#" method="post" id="forgot-form" class="row g-3 needs-validation">
                    <div class="error-text col-12 mt-5"></div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Votre adresse !</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="EMAIL" class="form-control" id="yourEmail">
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-danger w-100 btn-forgot" type="">Récuperer</button>
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

  <script>
    const formForgot = document.getElementById("forgot-form"),
      btnFormForgot = formForgot.querySelector(".btn-forgot"),
      errorTextForgot = formForgot.querySelector(".error-text");

    formForgot.onsubmit = (e) => {
      e.preventDefault();
    };

    btnFormForgot.onclick = () => {
      formForgot.style.pointerEvents = "none";
      $('#mainPreloader').show();
      errorTextForgot.style.display = "none";
      formForgot.style.opacity = 0.5;


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "./users/connectRequest.php", true);

      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            let responseData = JSON.parse(xhr.responseText);

            if (responseData.status === "success") {
              setTimeout(function () {
                $('#mainPreloader').hide();

              }, 2000);

            } else {

              setTimeout(function () {
                $('#mainPreloader').hide();
                formForgot.style.pointerEvents = "all";
                formForgot.style.opacity = 1;
                errorTextForgot.style.display = "block";
                errorTextForgot.innerHTML = responseData.message;

              }, 2000);
            }
          }
        }
      };

      let formData = new FormData(formForgot);
      xhr.send(formData);

    };
  </script>


</body>

</html>