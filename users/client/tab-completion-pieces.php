<main id="main" class="main">

    <div class="pagetitle">
        <h1>Complétez vos informations personnelles pour finaliser votre demande </h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Infos</li>
                <li class="breadcrumb-item active">Justificatifs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section profile mt-3">
        <div class="row">

            <div class="col-xl-9">

                <div class="card">
                    <div class="col-lg-12 pt-3">

                        <?php include("nav-tabs.php") ?>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-new card show" id="profile-new">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" style="padding: 5%;" data-bs-toggle="modal"
                                        data-bs-target="#modalPieces">Finalisez votre demande</button>
                                </div>
                            </div>
                                                       
                            <?php include("tab-overview-credit.php") ?>  
                            <?php include("edit-infos.php") ?>            
                            <?php include("modal-pieces.php") ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


</main><!-- End #main -->



<script>

    window.addEventListener("load", function () {
        loadRegions();
    });

    document.getElementById("back").addEventListener("click", function () {
        $("#modalPieces").modal('hide');
    })
    document.getElementById("nav-link-track").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-pieces").addEventListener("click", function () {
        $("#profile-new").show();

    })
    document.getElementById("nav-link-infos").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-new").addEventListener("click", function () {
        $("#profile-new").show();
    })

    function loadRegions() {

        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: {
                ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php if (isset($client)) {
                    echo $client['REGION'];
                }
                ?> " },
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