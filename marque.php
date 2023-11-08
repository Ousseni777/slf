<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->

  <style>
   
        .col-md-6{
          padding: 20px;
          margin-top: 5px;
          margin-left: 25%;

        }
    
    
  </style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Choisissez la marque de voiture pour et continuez vers la simulation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">A propos de SALAFIN</a></li>
          <li class="breadcrumb-item"><a href="./#marques">Marque de voitures</a></li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">

              <form class="row g-3" action="sim-fx" method="POST">

               
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="marque" aria-label="State">
                      <option value="Audi">Audi</option>
                      <option selected value="Renault">Renault</option>
                      <option value="Peugeot">Peugeot </option>
                      <option value="Dacia">Dacia </option>
                      <option value="Volkswagen">Volkswagen </option>
                      <option value="Dacia">Toyota </option>
                      <option value="Ford">Ford </option>
                      <option value="Nissan">Nissan </option>
                      <option value="Kia">Kia </option>
                      <option value="Citroën">Citroën </option>
                      <option value="Mitsubishi">Mitsubishi </option>
                      <option value="Jeep">Jeep </option>
                      <option value="Mercedes-Benz">Mercedes-Benz </option>
                      <option value="BMW">BMW </option>                      

                    </select>
                    <label for="floatingSelect">Marque</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Continuez ...</button>
                </div>     
                  <div class="col-md-6">
                      <table>
                          <tr>
                              <th>Header</th>
                              <th>Header2</th>
                          </tr>
                          <tr>
                              <td>Cell1</td>
                              <td>Cell2</td>
                          </tr>
                          <tr>
                              <td>Cell3</td>
                              <td>Cell4</td>
                          </tr>
                      </table>
                  </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main --> 

</body>

</html>