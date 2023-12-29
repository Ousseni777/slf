<?php


$client_id = "WV-692634956";
// $seller_id = $_SESSION['client_id'];
$query_client = "SELECT * FROM `slf_user_client` WHERE client_id = '{$client_id}' ";
$result_client = $conn->query($query_client);
$client = $result_client->fetch_assoc();
// $_SESSION['page'] = "detail-cl?id=".$client_id;


// $_SESSION['cin_piece'] = $client['cin_piece'];
// $_SESSION['rib_piece'] = $client['rib_piece'];
// $_SESSION['adress_piece'] = $client['adress_piece'];
$select_credit = "SELECT * FROM `credit_client` WHERE client_id='$client_id'";
$result_select_credit = $conn->query($select_credit);
$credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
?>

<style>
    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: purple;
        /* border-radius: 6px; */

    }

    .error-text {
        color: #721c24;
        padding: 8px 10px;
        text-align: center;
        border-radius: 5px;
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        margin-bottom: 10px;
        display: none;
    }

    .profile-new {
        padding: 20% 30%;
    }

    .inputImage {
        display: none;
    }

    .labelInputImage:hover {
        cursor: pointer;
    }

    .card-body .form-hide {
        display: none;
    }

    .portfolio-wrap {
        transition: 0.3s;
        position: relative;
        overflow: hidden;
        /* padding: 5%; */
        z-index: 1;
    }


    .portfolio-wrap::before {
        content: "";
        background: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        transition: all ease-in-out 0.3s;
        z-index: 2;
        opacity: 0;
    }

    .portfolio-wrap img {
        height: 160px;
        width: 96%;
        margin: 2%;
    }

    .portfolio-wrap .portfolio-links {
        opacity: 1;
        left: 0;
        right: 0;
        bottom: -60px;
        z-index: 3;
        position: absolute;
        transition: all ease-in-out 0.3s;
        display: flex;
        justify-content: center;
    }

    .portfolio-wrap .portfolio-links a {
        color: #fff;
        font-size: 28px;
        text-align: center;
        background: rgba(20, 157, 221, 0.75);
        transition: 0.3s;
        width: 100%;
    }

    .portfolio-wrap .portfolio-links a:hover {
        background: rgba(20, 157, 221, 0.95);
    }

    .portfolio-wrap .portfolio-links a+a {
        border-left: 1px solid #37b3ed;
    }

    .portfolio-wrap:hover::before {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 1;
    }

    .portfolio-wrap:hover .portfolio-links {
        opacity: 1;
        bottom: 0;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Complétez vos informations personnelles pour finaliser votre demande</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Infos</li>
                <li class="breadcrumb-item active">Justificatifs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section profile mt-5">
        <div class="row">


            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" id="nav-link-infos" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">Mes
                                    infos
                                    personnelles</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" id="nav-link-pieces" data-bs-toggle="tab"
                                    data-bs-target="#profile-pieces">Mes
                                    Justificatifs</button>
                            </li>
                            <!-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="collapse" data-bs-target="#track-demand">Suivre mes
                                    demandes</button>
                            </li> -->
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" id="nav-link-track"
                                    data-bs-target="#profile-overview">suivre
                                    mes
                                    demandes</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <?php if (isset($client['client_id'])) {
                                include("profile-edit.php");
                                // include("profile-edit.php");
                            
                            } else { ?>
                                <div class="tab-pane fade profile-new card show active" id="profile-new">
                                    <div class="card-body">
                                        <button class="btn btn-primary" style="padding: 5%;" data-bs-toggle="modal"
                                            data-bs-target="#modalInfo">Finalisez votre demande</button>
                                    </div>
                                </div>

                                <?php
                                include("profile-new.php");
                            } ?>


                            <div class="tab-pane fade profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                    cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure
                                    rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at
                                    unde.</p>

                                <h5 class="card-title">Profile Details</h5>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">Web Designer</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


</main><!-- End #main -->



<script>









    function chargerImage(elementId) {
        var inputImage = document.getElementById(elementId);
        imagePreviewID = "preview-" + elementId;
        var imagePreview = document.getElementById(imagePreviewID);

        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            // Lire le contenu du fichier comme une URL de données
            reader.readAsDataURL(fichierImage);
        }
    }

    // Fonction appelée lorsqu'on clique sur le bouton "Enregistrer"
    function sauvegarderImage(inputImage) {
        var inputImage = document.getElementById(inputImage);
        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            console.log('Image sélectionnée:', fichierImage);
        } else {
            console.log('Aucune image sélectionnée.');
        }
    }

    // Ajoutez un écouteur d'événement pour détecter les changements dans le champ d'entrée de type "file"
    document.getElementById('inputImageCIN').addEventListener('change', function () {
        chargerImage('inputImageCIN');
    });
    document.getElementById('inputImageRib').addEventListener('change', function () {
        chargerImage('inputImageRib');

    });
    document.getElementById('inputImageAdress').addEventListener('change', function () {
        chargerImage('inputImageAdress');

    });

    function loadRegions() {
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php echo $client['region'] ?>" },
            success: function (data) {
                $("#idRegion").html(data);

                const RegionID = $("#idRegion").val();

                $.ajax({
                    url: "users/region_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                    success: function (data) {
                        console.log(data);
                        $("#idTown").html(data);
                    }
                });
            }
        });
    }

    function loadTowns() {
        const RegionID = $("#idRegion").val();
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
            success: function (data) {
                $("#idTown").html(data);
            }
        });
    }

</script>