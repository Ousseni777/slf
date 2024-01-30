<style>
    /*--------------------------------------------------------------
# Schedule Section
--------------------------------------------------------------*/
    .schedule {
        padding: 0;
    }

    .schedule .nav-tabs {
        text-align: center;
        /* margin: auto; */
        display: block;
        border-bottom: 0;
        margin-bottom: 30px;
    }

    .schedule .nav-tabs li {
        display: inline-block;
        margin-bottom: 0;
    }

    .schedule .nav-tabs a {

        border-radius: 5px;

        font-weight: 600;
        /* background-color: rgba(77, 25, 14,.8); */
        border: 3px solid #f82249;
        color: red;
        /* padding: 10px; */
    }



    .schedule .nav-tabs a.active {
        background-color: #f82249;
        color: #fff;
    }




    .schedule .tab-pane {
        transition: ease-in-out 0.2s;
    }







    .schedule .schedule-item h4 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 0px;
    }

    .schedule .schedule-item h4 span {
        font-style: italic;
        color: #19328e;
        font-weight: normal;
        font-size: 16px;
    }

    .schedule .schedule-item p {
        font-style: italic;
        color: #152b79;
        margin-bottom: 0;
    }


    /* Sections Header
--------------------------------*/
    .section-header {
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 5px;
    }

    .section-header::before {
        content: "";
        position: absolute;
        display: block;
        width: 60px;
        height: 5px;
        background: #f82249;
        bottom: 0;
        left: calc(50% - 25px);
    }

    .section-header h2 {
        font-size: 26px;
        text-transform: uppercase;
        text-align: center;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .section-header p {
        text-align: center;
        padding: 0;
        margin: 0;
        font-size: 18px;
        font-weight: 500;
        color: #9195a2;
    }

    .section-with-bg {
        background-color: #f6f7fd;
    }

    .icone {
        font-size: 35px;
        margin-right: 20px;
    }
</style>

<style>
    .modal-body {
        position: relative;
    }

    .spinner-process {
        display: none;
        position: absolute;
        left: 45%;
        top: 35%;
    }
</style>

<main class="main" id="main">
    <!-- ======= Schedule Section ======= -->
    <section class="schedule row">
        <div class="section-header">
            <h2>Simulateur</h2>
        </div>

        <ul class="nav nav-tabs row" role="tablist" data-aos-delay="100">
            <li class="nav-item col-lg-3">
                <a class="nav-link mylink d-flex flex-row align-items-center justify-content-center"
                    id="credit-auto-link" href="#"><i class="icone bx bx-car"></i>CREDIT AUTO</a>
            </li>
            <li class="nav-item col-lg-3">
                <a class="nav-link mylink d-flex flex-row align-items-center justify-content-center"
                    id="credit-personnel-link" href="#"><i class="icone bx bx-credit-card-front"></i>CREDIT
                    PERSONNELE</a>
            </li>
            <li class="nav-item col-lg-3">
                <a class="nav-link mylink d-flex flex-row align-items-center justify-content-center"
                    id="credit-renouvelable-link" href="#"><i class="icone bx bx-refresh"></i>CREDIT RENOUVELABLE</a>
            </li>

        </ul>

    </section><!-- End Schedule Section -->

    <!-- ======= Schedule Section ======= -->
    <section class="schedule col-lg-12">
        <div class="container">
            <div class="section-header">
                <h2>RVCF</h2>
            </div>

            <ul class="nav row nav-tabs" role="tablist" data-aos-delay="100">
                <li class="nav-item col-lg-3">
                    <a class="nav-link mylink d-flex flex-row align-items-center justify-content-center"
                        id="ask-revcf-link" href="#"><i class="icone bx bx-notification"></i>DEMANDE DE REVCF</a>
                </li>
                <li class="nav-item col-lg-3">
                    <a class="nav-link mylink d-flex flex-row align-items-center justify-content-center"
                        id="check-revcf-link" href="#"><i class="icone bx bx-analyse"></i>ANALYSE DE REVCF</a>
                </li>

            </ul>


        </div>

    </section><!-- End Schedule Section -->
    <!-- Modal Form -->
    <div id="modal-credit-auto" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Critère auto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" id="modal-form-auto">
                        <div class="spinner-border text-danger spinner-process" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="error-text col-12"></div>
                        <div class="form-group mt-3">
                            <select id="idBrand" name="BRAND" class="form-select" onchange="loadProduct()">

                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <!-- <i class="bi bi-vinyl-fill"></i> -->
                            <select id="idProduct" name="PRODUCT" class="form-select" onchange="loadTariff()">

                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <select id="idTariff" name="TARIFF" class="form-select">

                            </select>
                        </div>
                        <div class="text-center mt-3">
                            <input type="" name="BTN_AUTO" class="btn btn-outline-danger btn-form-auto"
                                value="Passer à la simulation">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal Form -->
    <div id="modal-credit-personnel" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remplir le formulaire pour passer à la simulation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="modal-form-personnel" action="#">
                        <div class="spinner-border text-danger spinner-process" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="error-text col-12"></div>
                        <div class="form-group mt-3">
                            <select id="ticket-type" name="PROFESSION" class="form-select">
                                <option value="">-- S'agit t-il d'un ? --</option>
                                <option value="SALARIE">SALARIE</option>
                                <option value="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                <option value="COMMERCANT">COMMERCANT</option>
                                <option value="SOCIETE">SOCIETE</option>
                            </select>
                        </div>
                        <div class="row form-group mt-3">
                            <div class="col-lg-5 ms-2">
                                <label for="AMOUNT" class="form-label">Montant (en DH) </label>
                                <input type="number" name="AMOUNT" class="form-control" id="AMOUNT">
                            </div>
                            <div class="col-lg-5 ms-2">
                                <label for="DURATION" class="form-label">Durée (en mois) </label>
                                <input type="number" name="DURATION" class="form-control" id="DURATION">
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <input type="" name="BTN_PERSONNEL" class="btn btn-outline-danger btn-form-personnel"
                                value="Passer à la simulation">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal Form -->
    <div id="modal-credit-renouvelable" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remplir le formulaire pour passer à la simulation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="modal-form-renouvelable" action="#">
                        <div class="spinner-border text-danger spinner-process" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="error-text col-12"></div>
                        <div class="form-group mt-3">
                            <select id="ticket-type" name="PROFESSION" class="form-select">
                                <option value="">-- S'agit t-il d'un ? --</option>
                                <option value="SALARIE">SALARIE</option>
                                <option value="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                <option value="COMMERCANT">COMMERCANT</option>
                                <option value="SOCIETE">SOCIETE</option>
                            </select>
                        </div>
                        <div class="row form-group mt-3">
                            <div class="col-lg-5 ms-2">
                                <label for="AMOUNT" class="form-label">Montant (en DH) </label>
                                <input type="number" name="AMOUNT" class="form-control" id="AMOUNT">
                            </div>
                            <div class="col-lg-5 ms-2">
                                <label for="DURATION" class="form-label">Durée (en mois) </label>
                                <input type="number" name="DURATION" class="form-control" id="DURATION">
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <input type="" name="BTN_RENOUVELABLE" class="btn btn-outline-danger btn-form-renouvelable"
                                value="Passer à la simulation">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</main>
<script src="assets/js/jquery.min.js"></script>
<script>
    window.addEventListener("load", function () {
        loadBrand();
    });

    const creditAuto = document.getElementById("credit-auto-link");
    creditAuto.onclick = (e) => {
        $("#modal-credit-auto").modal("show");
        e.preventDefault();
    };

    const creditPerso = document.getElementById("credit-personnel-link");
    creditPerso.onclick = (e) => {
        $("#modal-credit-personnel").modal("show");
        e.preventDefault();
    };


    const creditRenouv = document.getElementById("credit-renouvelable-link");
    creditRenouv.onclick = (e) => {
        $("#modal-credit-renouvelable").modal("show");
        e.preventDefault();
    };



    

    const formRenouvelable = document.getElementById("modal-form-renouvelable"),
        btnformRenouvelable = formRenouvelable.querySelector(".btn-form-renouvelable"),
        errorTextRenou = formRenouvelable.querySelector(".error-text");
    preloaderRenouvelable = formRenouvelable.querySelector(".spinner-process");

    formRenouvelable.onsubmit = (e) => {
        e.preventDefault();
    };

    btnformRenouvelable.onclick = () => {
        preloaderRenouvelable.style.display = "block";
        errorTextRenou.style.display = "none";
        formRenouvelable.style.opacity = 0.5;

        setTimeout(function () {
            preloaderRenouvelable.style.display = "none";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/middle-process.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        let responseData = JSON.parse(xhr.responseText);

                        if (responseData.status === "success") {
                            formRenouvelable.style.pointerEvents = "all";
                            location.href = "sim-fx?tag=fx-pr";

                        } else {
                            formRenouvelable.style.pointerEvents = "all";
                            formRenouvelable.style.opacity = 1;
                            errorTextRenou.style.display = "block";
                            errorTextRenou.innerHTML = responseData.message;
                        }
                    }
                }
            };

            let formData = new FormData(formRenouvelable);
            xhr.send(formData);
        }, 500);
    };


    const formPersonnel = document.getElementById("modal-form-personnel"),
        btnformPersonnel = formPersonnel.querySelector(".btn-form-personnel"),
        errorTextPerso = formPersonnel.querySelector(".error-text"),
        preloaderPersonnel = formPersonnel.querySelector(".spinner-process");

    formPersonnel.onsubmit = (e) => {
        e.preventDefault();
    };

    btnformPersonnel.onclick = () => {
        preloaderPersonnel.style.display = "block";
        errorTextPerso.style.display = "none";
        formPersonnel.style.opacity = 0.5;

        setTimeout(function () {
            preloaderPersonnel.style.display = "none";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/middle-process.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        let responseData = JSON.parse(xhr.responseText);

                        if (responseData.status === "success") {
                            formPersonnel.style.pointerEvents = "all";
                            location.href = "sim-fx?tag=fx-pr";

                        } else {
                            formPersonnel.style.pointerEvents = "all";
                            formPersonnel.style.opacity = 1;
                            errorTextPerso.style.display = "block";
                            errorTextPerso.innerHTML = responseData.message;
                        }
                    }
                }
            };

            let formData = new FormData(formPersonnel);
            xhr.send(formData);
        }, 500);
    };

    const formAuto = document.getElementById("modal-form-auto"),
        btnFormAuto = formAuto.querySelector(".btn-form-auto"),
        errorTextAuto = formAuto.querySelector(".error-text"),
        preloaderAuto = formAuto.querySelector(".spinner-process");

    formAuto.onsubmit = (e) => {
        e.preventDefault();
    };

    btnFormAuto.onclick = () => {
        preloaderAuto.style.display = "block";
        errorTextAuto.style.display = "none";
        formAuto.style.opacity = 0.5;

        setTimeout(function () {
            preloaderAuto.style.display = "none";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/middle-process.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        let responseData = JSON.parse(xhr.responseText);

                        if (responseData.status === "success") {
                            formAuto.style.pointerEvents = "all";
                            location.href = "sim-fx?tag=fx";

                        } else {
                            formAuto.style.pointerEvents = "all";
                            formAuto.style.opacity = 1;
                            errorTextAuto.style.display = "block";
                            errorTextAuto.innerHTML = responseData.message;
                        }
                    }
                }
            };

            let formData = new FormData(formAuto);
            xhr.send(formData);
        }, 500);
    };


    function loadBrand() {

        $.ajax({
            url: "users/agency/data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'brand' },
            success: function (data) {
                data = '<option value="0" selected>-- Selectionner la marque --</option>' + data;
                $("#idBrand").html(data);
                loadProduct();
            }
        });
    }

    function loadProduct() {
        BrandID = $("#idBrand");
        $.ajax({
            url: "users/agency/data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
            success: function (data) {
                data = '<option value="0" selected>-- Selectionner le produit --</option>' + data;
                $("#idProduct").html(data);
                loadTariff();
            }
        });

    }

    function loadTariff() {
        const BrandID = $("#idBrand").val();
        const ProductID = $("#idProduct").val();
        $.ajax({
            url: "users/agency/data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID, ID_BRAND: BrandID },
            success: function (data) {
                data = '<option value="0" selected>-- Selectionner le barême --</option>' + data;
                $("#idTariff").html(data);

                // loadApport();
            }
        });
    }
    function displayControl(btn) {

        var boutonsMtm = document.querySelectorAll(".option");

        boutonsMtm.forEach(function (bouton) {
            bouton.classList.remove("active");
        });

        btn.classList.add("active");
        if (btn.id == "credit") {
            $("#choix-credit").show();
            $("#choix-revcf").hide();

        } else {
            $("#choix-credit").hide();
            $("#choix-revcf").show();
        }
        scrollToBottom();
    }

    function scrollToBottom() {
        window.scrollTo({
            top: 500,
            behavior: 'smooth'
        });
    }

    $('#mySearchInputAsk').typeahead({
        source: function (query, process) {
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'numdoss' },
                success: function (data) {
                    var result = JSON.parse(data);
                    if (query.length > 7) {
                        // console.log(query);
                        controlDisplayOption(query);
                    }

                    var autocompleteData = result;
                    process(autocompleteData);

                }
            });
        },
        minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
        highlight: true, // Met en surbrillance les correspondances dans les résultats
        hint: true // Affiche une suggestion en surbrillance
    });

    $('#mySearchInputCheck').typeahead({
        source: function (query, process) {
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'numdoss' },
                success: function (data) {
                    var result = JSON.parse(data);
                    if (query.length > 7) {
                        // console.log(query);
                        controlDisplayOption(query);
                    }

                    var autocompleteData = result;
                    process(autocompleteData);

                }
            });
        },
        minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
        highlight: true, // Met en surbrillance les correspondances dans les résultats
        hint: true // Affiche une suggestion en surbrillance
    });

</script>