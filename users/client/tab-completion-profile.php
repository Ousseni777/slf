<style>
    /* .profile-new {
        height: 100%;
    } */
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


            <div class="col-lg-8 card">
                <div class="col-lg-12 pt-3">
                    <?php include("nav-tabs.php") ?>
                    <div class="tab-content pt-2 d-flex flex-column align-items-center justify-content-center py-4">

                        <div class="tab-pane fade profile-new show align-items-center justify-content-center pt-4"
                            id="profile-new">
                            <button class="btn btn-primary" style="padding: 5%;" data-bs-toggle="modal"
                                data-bs-target="#modalInfos">Completez votre demande</button>
                        </div>

                        <?php include("tab-overview-credit.php") ?>

                        <?php include("modal-infos.php") ?>
                        <?php include("modal-pieces.php") ?>

                    </div>

                </div>
            </div>
            <div class="col-lg-4" style="display: none;">
                <div class="card">
                    <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderCredit" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="card-body">

                        <h5 class="card-title">Détails du crédit</h5>
                        <!-- List group with active and disabled items -->
                        <ul class="list-group list-group-flush">

                            <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-projet"> <i
                                    class="bi bi-chevron-down bi-subtile-projet"></i> Projet</h6>

                            <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                                    : </span> <input type="text" name="TARIFF_ID_UK" readonly id="infoTariffID"
                                    class="infoR"></li>
                            <li class="list-group-item" style="display: none;"><span class="infoL">TAUXINT
                                    : </span> <input type="text" name="TAUXINT" readonly id="infoTAUXINT" class="infoR">
                            </li>
                            <li class="list-group-item li-subtile-projet"><span class="infoL"> Type projet : </span>
                                <input type="text" id="infoBrand" name="BRAND" readonly class="infoR">
                            </li>
                            <li class="list-group-item li-subtile-projet"><span class="infoL"> Profession :
                                </span> <input type="text" id="infoProduct" value="SALARIE" name="PRODUCT" readonly
                                    class="infoR">
                            </li>


                            <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-credit"><i
                                    class="bi bi-chevron-down bi-subtile-credit"></i>Crédit simulé</h6>

                            <li class="list-group-item li-subtile-credit"><span class="infoL">Prix TTC : </span>
                                <input type="text" id="infoAmount" name="AMOUNT" readonly class="infoR">
                            </li>
                            <li class="list-group-item li-subtile-credit"><span class="infoL">Durée (mois) : </span>
                                <input type="text" id="infoDuration" name="DURATION" readonly class="infoR">
                            </li>
                            <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                    (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC" readonly
                                    class="infoR"></li>
                            <li class="list-group-item li-subtile-credit"><span class="infoL">Mensualité : </span>
                                <input type="text" id="infoMonthly" name="MONTHLY" readonly class="infoR">
                            </li>

                            <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-apport"> <i
                                    class="bi bi-chevron-down bi-subtile-apport"></i> Apport</h6>

                            <li class="list-group-item li-subtile-apport"><span class="infoL">Frais dossier :
                                </span> <input type="text" name="APP_FEES" class="infoR" readonly id="infoFD"></li>
                            <li class="list-group-item li-subtile-apport"><span class="infoL">Apport total : </span>
                                <input type="text" id="infoApport" name="DOWN_PMT" readonly class="infoR">
                            </li>
                            <li class="list-group-item li-subtile-apport"><span class="infoL">Assurance : </span>
                                <input type="text" id="infoADI" name="ADI" readonly class="infoR">
                            </li>
                            <li class="list-group-item li-subtile-apport"><span class="infoL">Coût hors ADI :
                                </span> <input type="text" id="infoCHAD" name="COST_EX_ADI" readonly class="infoR">
                            </li>

                        </ul><!-- End Clean list group -->

                        <div class="modal fade" id="share-link-modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="position: relative;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Renseigner le mail du destinateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="g-3 needs-validation" action="#" id="register-form" method="post">
                                            <div class="spinner-border text-danger spinner-pieces"
                                                id="preloaderShareLink" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <div class="error-text-share-link col-lg-12"></div>
                                            <div class="col-lg-11 form-floating mb-3 ms-2 mt-3">
                                                <input type="email" name="EMAIL" placeholder="Votre adresse mail"
                                                    class="form-control" id="yourEmail">
                                                <label for="yourEmail" class="form-label">Saisir l'adresse
                                                    email ici...</label>
                                            </div>


                                            <div class="mt-5">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="" name="SHARE_LINK"
                                                    class="btn btn-danger btn-credit-share-link">Partager</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Vertically centered Modal-->
                        <div class="mt-3">
                            <button type="button" name="ask_credit_user" class="btn-custom btn-credit">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>


<script>
    window.addEventListener("load", function () {
        loadRegions();
    });


    document.getElementById("nav-link-track").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-pieces").addEventListener("click", function () {
        $("#profile-new").show();

    })
    document.getElementById("nav-link-infos").addEventListener("click", function () {
        $("#profile-new").show();
    })

    document.getElementById("nav-link-new").addEventListener("click", function () {
        $("#profile-new").show();
    })


    function loadRegions() {

        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: {
                ID_SCRIPT: "region"
            },
            success: function (data) {
                $("#idRegion").html(data);

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