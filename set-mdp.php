<?php

include_once "./connectToDB.php";

$email = mysqli_real_escape_string($conn, $_GET['email']);
$sql_mail = "SELECT EMAIL  FROM SLF_USER";
$sql_result= $conn->query($sql_mail);
$mails= mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
$listMail=array();
$hashedList = array();
foreach ($mails as $mail) {
  $mail=$mail["EMAIL"];
  $hashedMail = md5($mail);
  array_push($listMail, $mail);
  array_push($hashedList, $hashedMail);
}

if (in_array($email, $hashedList)) {
  $query = "SELECT ID_UNIQUE  FROM SLF_USER  WHERE email = '{$listMail[array_search($email, $hashedList)]}'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_unique=$row['ID_UNIQUE'];
    echo "Le mot '$email' identifiant : ". $row['ID_UNIQUE'] ;
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Setting || Password</title>
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
                    <h5 class="card-title text-center pb-0 fs-4">Terminez les options de connexion</h5>
                    <p class="text-center small">Veuillez definir un nouveau mot de passe afin d'accéder à l'espace
                      client</p>
                  </div>

                  <form action="connectRequest" method="post" class="row g-3 needs-validation">
                    <div class="col-12 form-floating mb-3">
                      <input type="text" name="id_unique" class="form-control" id="id_unique" value="<?php echo $id_unique ?>"
                        disabled>
                      <label for="id_unique" class="form-label">Votre identifiant est : </label>
                    </div>

                    <!-- <div class="col-12">
                      <label for="id_unique" class="form-label">Votre identifiant est : </label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="id_unique" class="form-control" id="id_unique" value="ZQZ-1612075898S" disabled>
                        <div class="invalid-feedback">Entrez votre identifiant.</div>
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="password" class="form-label">Votre mot de passe !</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword2" class="form-label">Ré-saisir le mot de passe</label>
                      <input type="password" name="password2" class="form-control" id="yourPassword2" required>

                    </div>

                    <p></p>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Valider</button>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

  <!-- Template Main JS File -->


</body>

</html>

