<style>

</style>

<main id="main" class="main">

    <div class="pagetitle" >
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

                            <?php include("edit-infos.php") ?>
                            <?php include("edit-pieces.php") ?>
                            <?php include("tab-new-credit.php") ?>
                            <?php include("tab-overview-credit.php") ?>

                        </div>

                    </div>
                </div>

            </div>
            <?php include("recap-credit.php") ?>
        </div>
    </section>


</main>



<script>
    window.addEventListener("load", function () {
        loadRegions();
    });

    function loadRegions() {

        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: {
                ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php echo $client['region']; ?>" },
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