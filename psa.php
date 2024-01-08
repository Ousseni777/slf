<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Bre</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./assets/img/favicon.png" rel="icon">
    <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">

    <!-- Vendor CSS Files -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./assets/css/style-form.css" rel="stylesheet">

    <style>
        .card-body {
            background-color: #f6f9ff;
        }

        .right {
            float: right;
            margin-right: 3%;
            font-size: 35px;
        }

        .left {
            margin-left: 5%;
            margin-right: 2%;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        textarea{
            text-align: center;
            border: none;
        }
    </style>

</head>

<body>

    <main class="main" id="main">
        <section class="section">
            <div class="pagetitle">
                <h2>PENSER - SENTIR - AGIR</h2>
                <h1>Attention à la Théorie des Signaux</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="sim">THEOS@</a></li>
                        <li class="breadcrumb-item">PSA</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row col-lg-12">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title infos-client" onclick="displayElement('.reference')">
                                <i class="bi bi-file-earmark-text left"></i>Reférence<i
                                    class="bi right bi-plus reference-bi"></i>
                            </h5>
                            <div class="col-12 form-floating form-hide mb-3 reference">
                                <input type="text" name="cin" placeholder="" class="form-control" id="cin" readonly
                                    oninvalid="displayError()">
                                
                            </div>
                            <div class="col-12 form-floating form-hide mb-3 reference">
                                <textarea readonly class="col-lg-12" name="content" id="content" rows="6"></textarea>
                              
                            </div>
                        </div>
                    </div>                 

                </div>
                <div class="col-lg-6">
                    <button class="btn btn-primary">Ajouter</button>
                    <button class="btn btn-danger">Supprimer</button>
                </div>
            </div>


        </section>
    </main>

    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

</body>

</html>
<?php
ob_end_flush();
?>