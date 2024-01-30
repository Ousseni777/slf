<?php

include './connectToDB.php';
$num_doss = '790551';
// $SELLER_ID = $_SESSION['SELLER_ID'];
$query_credit = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
$result_credit = $conn->query($query_credit);
$_SESSION['page'] = "./sim-fx?tag=revcf&numdoss=" . $num_doss;

if ($result_credit->num_rows > 0) {
    $dossier = $result_credit->fetch_assoc();
}

?>



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
        margin: 2% 5%;
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


<div class="modal-header">
    <!-- <h4 class="modal-title">Critère auto</h4> -->
    <h2 class="modal-title">Revision condition financière sur le dossier N° :
        <?php echo $num_doss ?>

    </h2>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" style="padding: 2% 5%;" >

    <main id="main" class="main">

        <div class="pagetitle">

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">REVCF</li>
                    <li class="breadcrumb-item">Glisser deposer les paramètres que vous souhaitez modifier</li>
                </ol>
            </nav>
            <form action="#" id="form-revcf" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-lg-4 mt-3"><input type="text" id="searchInput"
                            placeholder="Rechercher un autre N° Dossier ici..." class="form-control"></div>
                    <div class="card-body col-lg-8" style="position: relative;">
                        <button class="btn btn-danger mt-3 btn-save-revcf" style="position: absolute; right: 0;">Envoyer
                            la
                            demande</button>
                    </div>

                    <div class="col-lg-5 mt-5">
                        <div class="card">
                            <h2 class="card-title">Paramètre du crédit</h2>
                            <div class="card-body" id="content-draged">
                                <div class="col-lg-12 mt-4" id="MNT_DEMANDE" draggable="true" ondragstart="drag(event)"
                                    onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                    <div class="card">
                                        <div class="card-body custom-drag-drop">
                                            <h5 class="card-title" id="TITLE-MNT_DEMANDE">MONTANT TTC</h5>
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
                                <div class="col-lg-12 mt-4" id="MENSUALITE" draggable="true" ondragstart="drag(event)"
                                    onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                    <div class="card">
                                        <div class="card-body custom-drag-drop">
                                            <h5 class="card-title" id="TITLE-MENSUALITE">MENSUALITE</h5>
                                            <input type="text" class="input-value" id="INPUT-MENSUALITE"
                                                value="<?php echo $dossier['MENSUALITE']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4" id="FRAISDOSS" draggable="true" ondragstart="drag(event)"
                                    onmouseover="addCustomCursor(this)" onmouseout="removeCustomCursor(this)">
                                    <div class="card">
                                        <div class="card-body custom-drag-drop">
                                            <h5 class="card-title" id="TITLE-FRAISDOSS">FRAIS DOSSIER</h5>
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
                    <div class="row col-lg-1 mt-5 align-items-center justify-content-center">
                        <i class="bi bi-arrow-left-right bi-custom" style=""></i>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                            <h2 class="card-title">
                                Paramètre de revision
                            </h2>



                            <div class="card-body dropzone d-flex flex-column align-items-center justify-content-center"
                                id="content-dropped">
                                <p id="default">Glissez et déposez ici </p>
                            </div>

                            <div class="card error-text">
                                <p>Veuillez renseigner tous les champs !</p>
                            </div>
                            <div class="card-body">

                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row col-lg-12 mt-5">
                        <div class="col-lg-6 card">
                            <h2 class="card-title">Pour quel Motif ?</h2>
                            <div class="card-body mt-3">
                                <div class="col-md-12" id="">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="select-motif" name="" onchange="addMotif()"
                                            aria-label="State">
                                            <option value="motif8">Motif 8</option>
                                            <option value="motif7">Motif 7</option>
                                            <option value="motif6">Motif 6</option>
                                            <option value="motif5">Motif 5</option>
                                            <option value="motif4">Motif 4</option>
                                            <option value="motif3">Motif 3</option>
                                            <option value="motif2">Motif 2</option>
                                        </select>
                                        <label for="floatingSelect">Motif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 card">
                            <h2 class="card-title">Motif Revcf</h2>
                            <div class="card-body motif-revcf" id="motifRevcf">
                                <div class="col-lg-12">
                                    <p id="default-motif">Ajouter un modif </p>
                                </div>
                            </div>
                            <h2 class="card-title">Commentaire</h2>
                            <div class="card-body" id="">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating">
                                        <textarea name="COMMENT" class="form-control" placeholder="Comment"
                                            id="floatingTextarea" style="height: 100px;"></textarea>
                                        <label for="floatingTextarea">Laisser un commentaire</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>


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

</div>

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