<?php

include './connectToDB.php';
$num_doss = $_GET['numdoss'];
// $SELLER_ID = $_SESSION['SELLER_ID'];
$query_credit = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
$result_credit = $conn->query($query_credit);
$_SESSION['page'] = "./sim-fx?tag=revcf&numdoss=" . $num_doss;

if ($result_credit->num_rows > 0) {
    $dossier = $result_credit->fetch_assoc();
}

?>

<style>
    /*--------------------------------------------------------------
# Schedule Section
--------------------------------------------------------------*/
    #schedule {
        padding: 60px 0 60px 0;
    }

    #schedule .nav-tabs {
        text-align: center;
        margin: auto;
        display: block;
        border-bottom: 0;
        margin-bottom: 30px;
    }

    #schedule .nav-tabs li {
        display: inline-block;
        margin-bottom: 0;
    }

    #schedule .nav-tabs a {
        border: none;
        /* border-radius: 50px; */
        font-weight: 600;
        background-color: #0e1b4d;
        color: #fff;
        padding: 10px 60px;
    }

    @media (max-width: 991px) {
        #schedule .nav-tabs a {
            padding: 8px 100px;
        }
    }

    @media (max-width: 767px) {
        #schedule .nav-tabs a {
            padding: 8px 50px;
        }
    }

    @media (max-width: 480px) {
        #schedule .nav-tabs a {
            padding: 8px 30px;
        }
    }

    #schedule .nav-tabs a.active {
        background-color: #f82249;
        color: #fff;
    }

    #schedule .sub-heading {
        text-align: center;
        font-size: 18px;
        font-style: italic;
        margin: 0 auto 30px auto;
    }

    @media (min-width: 991px) {
        #schedule .sub-heading {
            width: 75%;
        }
    }

    #schedule .tab-pane {
        transition: ease-in-out 0.2s;
    }

    #schedule .schedule-item {
        border-bottom: 1px solid #cad4f6;
        padding-top: 15px;
        padding-bottom: 15px;
        transition: background-color ease-in-out 0.3s;
    }

    #schedule .schedule-item:hover {
        background-color: #fff;
    }

    #schedule .schedule-item time {
        padding-bottom: 5px;
        display: inline-block;
    }

    #schedule .schedule-item .speaker {
        width: 60px;
        height: 60px;
        overflow: hidden;
        border-radius: 50%;
        float: left;
        margin: 0 10px 10px 0;
    }

    #schedule .schedule-item .speaker img {
        height: 100%;
        transform: translateX(-50%);
        margin-left: 50%;
        transition: all ease-in-out 0.3s;
    }

    #schedule .schedule-item h4 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    #schedule .schedule-item h4 span {
        font-style: italic;
        color: #19328e;
        font-weight: normal;
        font-size: 16px;
    }

    #schedule .schedule-item p {
        font-style: italic;
        color: #152b79;
        margin-bottom: 0;
    }
</style>

<style>
    .custom-drag-drop:hover {
        cursor: copy;
    }

    .bi-custom {
        font-size: 50px;
        text-align: center;
    }

    .input-val {
        width: 80%;
    }

    #content-draged {
        max-height: 65vh;
        overflow-y: auto;
    }

    #motifRevcf {
        max-height: 35vh;
        overflow-y: auto;
    }


    #content-dropped {
        border: 2px dashed #ccc;
    }

    .input-value {
        display: none;
    }

    .dropzone {
        min-height: 380px;
        margin: 2% 0%;
        max-height: 55vh;
        overflow-y: auto;
    }

    .disabled-element {
        opacity: 0.5;
        pointer-events: none;
    }

    .legende {
        position: relative;
    }

    .close {
        position: absolute;
        right: 2%;
        font-size: 20px;

    }

    .close:hover {
        cursor: pointer;
    }
</style>

<main id="main" class="main">

    <div class="row">


        <div class="col-lg-12">

            <!-- ======= Schedule Section ======= -->
            <section id="schedule" class="section-with-bg col-lg-12">
                <div class="container">


                    <ul class="nav nav-tabs" role="tablist" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-row align-items-center justify-content-center" href="#day-1"
                                role="tab" data-bs-toggle="tab"><i class="bi bi-list-ol"
                                    style="font-size : 60px; margin-right: 20px;"></i>MES DEMANDES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-row align-items-center justify-content-center" href="#day-2"
                                role="tab" data-bs-toggle="tab"><i class="bi bi-plus-circle"
                                    style="font-size : 60px; margin-right: 20px;"></i>NOUVELLE DEMANDE</a>
                        </li>

                    </ul>

                    <div class="tab-content row justify-content-center" data-aos-delay="200">

                        <!-- Schdule Day 1 -->
                        <div role="tabpanel" class="row col-lg-9 tab-pane fade show" id="day-1">
                            <h3 class="sub-heading">Liste des demandes sous revision de condition financière
                            </h3>
                            <div class="col-lg-4 float-end p-2 mb-3">
                                <input type="text" id="searchInput" placeholder="Rechercher" class="form-control">
                            </div>
                            <table class="table table-striped table-bordered mt-3" id="myTable">
                                <thead class="">
                                    <tr>
                                        <th scope="col">#Ref demande </th>
                                        <th scope="col">Date création</th>
                                        <th scope="col">Statut demande</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php echo '<i class="bi bi-info-circle"></i> <a class="cin-class" href="./detail-cl?id=s "> XXX-12203563232</a>' ?>
                                        </th>
                                        <td>12-10-2024: 11h:45mn:50s</td>
                                        <td><span class="badge bg-warning"> En attente </span></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo '<i class="bi bi-info-circle"></i> <a class="cin-class" href="./detail-cl?id=s "> XXX-12203563232</a>' ?>
                                        </th>
                                        <td>12-10-2024: 11h:45mn:50s</td>
                                        <td><span class="badge bg-danger"> Réjété </span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- End Schdule Day 1 -->

                        <!-- Schdule Day 2 -->
                        <div role="tabpanel" class="col-lg-10  tab-pane fade" id="day-2">
                            <form action="#" id="form-revcf" enctype="multipart/form-data" method="POST">
                                <div class="row">

                                    <div class="card-body col-lg-12">
                                    <input type="text" id="searchInput" placeholder="Rechercher" class="p-2 mt-3"> 
                                                                      
                                        <button class="btn btn-danger mt-3 btn-save-revcf float-end">Envoyer
                                            la
                                            demande</button>
                                    </div>

                                    <div class="row  mt-3">

                                        <div class="col-lg-6">
                                           
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="select-motif" name=""
                                                    onchange="addMotif()" aria-label="State">
                                                    <option value="motif8">-- Selectionner les paramètres de revision --</option>
                                                    <option value="motif7">Motif 7</option>
                                                    <option value="motif6">Motif 6</option>
                                                    <option value="motif5">Motif 5</option>
                                                    <option value="motif4">Motif 4</option>
                                                    <option value="motif3">Motif 3</option>
                                                    <option value="motif2">Motif 2</option>
                                                </select>
                                                <label for="floatingSelect">Paramètres de revision</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-5">                      
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="select-motif" name=""
                                                    onchange="addMotif()" aria-label="State">
                                                    <option value="motif8">-- Selectionner les raisons --</option>
                                                    <option value="motif7">Motif 7</option>
                                                    <option value="motif6">Motif 6</option>
                                                    <option value="motif5">Motif 5</option>
                                                    <option value="motif4">Motif 4</option>
                                                    <option value="motif3">Motif 3</option>
                                                    <option value="motif2">Motif 2</option>
                                                </select>
                                                <label for="floatingSelect">Motif de revision</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h2 class="card-title">
                                            Paramètre de revision
                                        </h2>
                                        <div class="dropzone d-flex flex-column align-items-center justify-content-center"
                                            id="content-dropped">
                                            <p id="default">Les paramètres de revision affichéront ici </p>


                                        </div>
                                    </div>
                                    <div class="row col-lg-1">

                                    </div>
                                    <div class="col-lg-5">
                                    <h2 class="card-title">
                                                Motif de Revcf
                                            </h2>

                                            <div class="card-body dropzone d-flex flex-column align-items-center justify-content-center"
                                                id="content-dropped">
                                                <p id="default">Les motifs affichéront ici </p>


                                            </div>

                                    </div>


                                    <hr>


                                </div>
                            </form>

                        </div>
                        <!-- End Schdule Day 2 -->

                        <!-- Schdule Day 3 -->
                        <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">
                            <div class="card">
                                <h2 class="card-title">Paramètre du crédit</h2>
                                <div class="card-body" id="content-draged">
                                    <div class="col-lg-12 mt-4" id="MNT_DEMANDE" draggable="true"
                                        ondragstart="drag(event)" onmouseover="addCustomCursor(this)"
                                        onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-MNT_DEMANDE">MONTANT TTC
                                                </h5>
                                                <input type="text" class="input-value" id="INPUT-MNT_DEMANDE"
                                                    value="<?php echo $dossier['MNT_DEMANDE']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="DUREE" draggable="true" ondragstart="drag(event)"
                                        onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-DUREE">DUREE</h5>
                                                <input type="text" class="input-value" id="INPUT-DUREE"
                                                    value="<?php echo $dossier['DUREE']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="MENSUALITE" draggable="true"
                                        ondragstart="drag(event)" onmouseover="addCustomCursor(this)"
                                        onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-MENSUALITE">MENSUALITE</h5>
                                                <input type="text" class="input-value" id="INPUT-MENSUALITE"
                                                    value="<?php echo $dossier['MENSUALITE']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="FRAISDOSS" draggable="true"
                                        ondragstart="drag(event)" onmouseover="addCustomCursor(this)"
                                        onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-FRAISDOSS">FRAIS DOSSIER
                                                </h5>
                                                <input type="text" class="input-value" id="INPUT-FRAISDOSS"
                                                    value="<?php echo $dossier['FRAISDOSS']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="TAUXINT" draggable="true" ondragstart="drag(event)"
                                        onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-TAUXINT">TAUX</h5>
                                                <input type="text" class="input-value" id="INPUT-TAUX"
                                                    value="<?php echo $dossier['TAUXINT']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="MARQUE" draggable="true" ondragstart="drag(event)"
                                        onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-MARQUE">MARQUE</h5>
                                                <input type="text" class="input-value" id="INPUT-MARQUE"
                                                    value="<?php echo $dossier['MARQUE']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4" id="PRODUIT" draggable="true" ondragstart="drag(event)"
                                        onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-PRODUIT">PRODUIT</h5>
                                                <input type="text" class="input-value" id="INPUT-PRODUIT"
                                                    value="<?php echo $dossier['PRODUIT']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4" id="BAREME" draggable="true" ondragstart="drag(event)"
                                        onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                        <div class="card">
                                            <div class="card-body custom-drag-drop">
                                                <h5 class="card-title" id="TITLE-BAREME">BAREME</h5>
                                                <input type="text" class="input-value" id="INPUT-BAREME"
                                                    value="<?php echo $dossier['BAREME']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- End Schdule Day 2 -->

                    </div>

                </div>

            </section><!-- End Schedule Section -->
        </div>


    </div>
    <div class="modal fade mt-5" id="feedbackModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row modal-header" style="text-align: center;">
                    <i class="col-12 bi bi-check-circle" style="font-size: 100px;"></i>
                    <div class="col-12">
                        <div class="row">
                            <p class="info-dialog" id="successMessage"> </p>
                        </div>

                        <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary" id="back">OK</a>

                    </div>

                </div>


            </div>
        </div>
    </div>




</main><!-- End #main -->
<script type="text/javascript" src="jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>

    function addMotif() {
        selectMotifVal = $("#select-motif");

        var selectedIndex = selectMotifVal[0].selectedIndex;
        motifRevcf = document.getElementById("motifRevcf");

        var newContent = document.createElement("div");
        newContent.className = "col-lg-12";
        newContent.id = 'id' + selectedIndex;
        nameParamId = 'NAME_' + selectedIndex;
        newContent.innerHTML = `
        <div class="alert alert-info  alert-dismissible fade show" role="alert">
                            ${selectMotifVal.val()} !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;

        motifRevcf.appendChild(newContent);
        $("#default-motif").hide();
    }

    function allowDrop(event) {
        event.preventDefault();
        var dropTarget = event.target;

        // Vérifiez que le dropTarget est une zone de dépôt valide
        if (dropTarget.classList.contains("card")) {
            dropTarget = dropTarget.parentElement;
        }

        // Ajoutez ou supprime la classe en fonction du survol
        if (event.type === "dragover") {
            dropTarget.classList.add("custom-drag-drop");
        } else {
            dropTarget.classList.remove("custom-drag-drop");
        }
    }

    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    function drop(event) {
        event.preventDefault();
        var data = event.dataTransfer.getData("text");
        var draggedElement = document.getElementById(data);
        // $(draggedElement).css('background-color', 'lightgreen');
        $(draggedElement).addClass('disabled-element');
        handleParam(draggedElement);


        // if (!droppedElements.includes(data)) {

        //     var contentDropped = document.getElementById("content-dropped");
        //     contentDropped.innerHTML += draggedElement.innerHTML;
        //     droppedElements.push(data);
        // }
    }

    function addCustomCursor(element) {
        element.classList.add("custom-drag-drop");
    }

    function removeCustomCursor(element) {
        element.classList.remove("custom-drag-drop");
    }

    function handleParam(draggedElement) {

        title = $(draggedElement).find("h5.card-title").text();
        inputValue = $(draggedElement).find("input").val();
        nameParam = $(draggedElement).attr('id');

        var newContent = document.createElement("div");
        newContent.className = "col-lg-12";
        newContent.id = nameParam + 'id';
        nameParamId = nameParam + 'id';
        newContent.innerHTML = `
            <div class="card">
                <div class="card-body" >
                        <h2 class="card-title legende">${title}  <i class="bi bi-x-lg close" onclick="dropParam('${nameParamId}','${nameParam}')"></i> </h2>
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>Valeur actuelle</th>
                                    <th>Valeur souhaitée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="input-val" value="${inputValue}" readonly></td>
                                    <td> <input type="text" name="${nameParam}" class="input-val"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div >
                </div >
            `;

        $("#default").hide();
        var dropzone = document.querySelector(".dropzone");
        dropzone.appendChild(newContent);
    }

    function dropParam(dropParam, dragParam) {
        var childToRemove = document.getElementById(dropParam);
        var parentElement = document.getElementById("content-dropped");
        dragParam = "#" + dragParam;
        $(dragParam).removeClass('disabled-element');
        parentElement.removeChild(childToRemove);
    }

    const formRevcf = document.getElementById("form-revcf"),
        btnValide = formRevcf.querySelector(".btn-save-revcf"),
        errorTextRevcf = formRevcf.querySelector(".error-text");
    // successTextInfo = document.getElementById("success-infos");

    formRevcf.onsubmit = (e) => {
        e.preventDefault();
    }

    btnValide.onclick = () => {

        formRevcf.style.pointerEvents = "none";
        $('#mainPreloaderInfos').show();
        errorTextRevcf.style.display = "none";
        formRevcf.style.opacity = .5;

        setTimeout(function () {
            $('#mainPreloaderInfos').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/agency/save-revcf.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        let responseData = JSON.parse(xhr.responseText);
                        let data = responseData.status.trim();
                        if (data === "success") {
                            $("#successMessage").html(responseData.message);

                            $("#feedbackModal").modal("show");

                        } else {
                            formRevcf.style.pointerEvents = "all";
                            formRevcf.style.opacity = 1;
                            errorTextRevcf.style.display = "block";

                            errorTextRevcf.innerHTML = responseData.message;

                        }
                    }
                }
            }
            let formData = new FormData(formRevcf);
            xhr.send(formData);
        }, 2000);


    }

    $('#searchInput').typeahead({

        source: function (query, process) {
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'numdoss' },
                success: function (data) {
                    var result = JSON.parse(data);
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