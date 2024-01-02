<style>

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
                        
                        <?php include("nav-tabs.php") ?>
                        <div class="tab-content pt-2">
              


                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">

                                <div class="container" id="panelEdit">
                                    <section class="section">

                                        <form action="#" id="form-client" enctype="multipart/form-data" method="POST">

                                            <div class="row">
                                                <div class="success-text" id="success-infos">
                                                    <div class="alert alert-success" role="alert"
                                                        style="text-align:center;">
                                                        <h4 class="alert-heading">Client N°
                                                            <?php echo $client['cin'] ?> modifié !
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="card error-text">
                                                    <p>Veuillez renseigner tous les champs !</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <input type="text" value="<?php echo $client['client_id'] ?>"
                                                            name="client_id" style="display: none;">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.civilite')"><i
                                                                    class="bi bi-person left"></i>Civilité<i
                                                                    class="bi right bi-dash civilite-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">
                                                                <input type="text" name="lname" placeholder=""
                                                                    value="<?php echo $client['lname'] ?>"
                                                                    class="form-control" id="lname" required>
                                                                <label for="lname" class="form-label">Nom</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">
                                                                <input type="text" name="fname" placeholder=""
                                                                    value="<?php echo $client['fname'] ?>"
                                                                    class="form-control" id="fname" required>
                                                                <label for="fname" class="form-label">Prénom</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">

                                                                <span> Titre</span>
                                                                <br>
                                                                <div class="form-check" style="float: left;">
                                                                    <?php if ($client['title'] == "Homme") { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleM" value="Homme" checked>
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleM" value="Homme">
                                                                    <?php } ?>
                                                                    <label class="form-check-label" for="titleM">
                                                                        Homme
                                                                    </label>
                                                                </div>
                                                                <div class="form-check" style="float: right;">
                                                                    <?php if ($client['title'] == "Femme") { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleF" value="Femme" checked>
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleF" value="Femme">
                                                                    <?php } ?>
                                                                    <label class="form-check-label" for="titleF">
                                                                        Femme
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.reference')"><i
                                                                    class="bi bi-file-earmark-text left"></i>Reférence<i
                                                                    class="bi right bi-dash reference-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 reference">
                                                                <input type="text" name="cin" placeholder=""
                                                                    value="<?php echo $client['cin'] ?>"
                                                                    class="form-control" required>
                                                                <label for="cin" class="form-label">Numéro CIN / Carte
                                                                    de
                                                                    séjour</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 reference">
                                                                <input type="text" name="income" placeholder=""
                                                                    value="<?php echo $client['income'] ?>"
                                                                    class="form-control" id="income" required>
                                                                <label for="income" class="form-label">Total revenus
                                                                    mensuels
                                                                    (net en DH)</label>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.contact')"><i
                                                                    class="bi bi-telephone left"></i>Contact <i
                                                                    class="bi right bi-dash contact-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 contact">
                                                                <input type="text" name="email" placeholder=""
                                                                    value="<?php echo $client['email'] ?>"
                                                                    class="form-control" id="email" required>
                                                                <label for="email" class="form-label">Adresse
                                                                    email</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 contact">
                                                                <input type="text" name="phone" placeholder=""
                                                                    value="<?php echo $client['phone'] ?>"
                                                                    class="form-control" id="phone" required>
                                                                <label for="phone" class="form-label">Téléphone</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.coordonnee')"><i
                                                                    class="bi bi-geo-alt left"></i>Coordonnées<i
                                                                    class="bi right bi-dash coordonnee-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 coordonnee">
                                                                <select name="region" onchange="loadTowns()"
                                                                    class="form-select" id="idRegion"
                                                                    aria-label="State">

                                                                </select>
                                                                <label for="yourRegion" class="form-label">Votre région
                                                                    !
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 coordonnee">
                                                                <select name="town" class="form-select" placeholder=""
                                                                    id="idTown">

                                                                </select>
                                                                <label for="yourTown" class="form-label">Votre ville
                                                                    actuelle
                                                                    !</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <button type="submit"
                                                            class="btn btn-outline-success btn-send-infos-client"
                                                            name="">Sauvegarder les modifications</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </section>

                                </div>


                            </div>


                            <div class="tab-pane fade pt-3" id="profile-pieces">

                                <div class="card" id="profile-pieces-edit">
                                    <div class="card-body row">
                                        <h5 class="card-title infos-client col-lg-12"
                                            onclick="displayElement('.justificatifs')">
                                            <i class="bi bi-file-earmark-text left"></i>Justificatifs<i
                                                class="bi right bi-dash justificatifs-bi"></i>
                                        </h5>

                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageCIN"
                                                    src="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageCIN"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourCIN"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageCIN" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageRib"
                                                    src="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageRib"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourRIB"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageRib" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageAdress"
                                                    src="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageAdress"><i
                                                    class="bi bi-file-image"></i>Changer</label>

                                            <input type="file" name="yourAdress"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageAdress" required>
                                        </div>


                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-outline-success btn-send-infos-client"
                                            name="">Sauvegarder les
                                            modifications</button>
                                    </div>
                                </div>

                            </div>

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


</main>


<script>
    window.addEventListener("load", function () {
        $(".form-hide").show();
        loadRegions();
    });

    function displayElement(elt) {
        icone = elt + "-bi";
        if ($(elt).hasClass("active")) {
            $(elt).hide();
            $(elt).removeClass('active');
            $(icone).removeClass('bi-dash');
            $(icone).addClass('bi-plus');

        } else {
            $(elt).show();
            $(elt).addClass('active');
            $(icone).addClass('bi-dash');
            $(icone).removeClass('bi-plus');
        }
    }



</script>