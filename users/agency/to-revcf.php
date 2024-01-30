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

    #myTable tbody {
        max-height: 65vh;
        overflow-y: auto;
        display: block;
    }

    #myTable thead,
    #myTable tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste demandes sous REVCF</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Aperçu rapide</li>
                <li class="breadcrumb-item active">Liste des demande sous REVCF</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row mt-3">

            <div class="col-lg-4">
                <div class="row">
                    <label class="col-sm-5 col-form-label">Nombre de lignes</label>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-lg-4"></div>

            <div class="col-lg-4">
                <div class="row">
                    <label for="inputText" class="col-sm-3 col-form-label">Rechercher</label>
                    <div class="col-sm-9">
                        <input type="text" id="searchInput" class="form-control">

                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-3">



                <?php

                if (isset($_SESSION['SELLER_ID'])) {

                    $query_revcf = "SELECT * FROM `revcf` WHERE 1";
                    $result_revcf = $conn->query($query_revcf);

                    if ($result_revcf->num_rows > 0) {
                        $revcfs = mysqli_fetch_all($result_revcf, MYSQLI_ASSOC);
                        if (count($revcfs) > 0) {
                            foreach ($revcfs as $revcf) { ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Référence REVCF :
                                        <?php echo $revcf['REVCF_ID'] ?>
                                    </h4>
                                    <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis
                                        laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                                    <hr>
                                    <div class="row">
                                        <div class="row mb-0 col-lg-10">
                                            <div class="col-lg-3 ms-2 alert alert-primary alert-dismissible fade show" role="alert">
                                                A simple reason here
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="col-lg-3 ms-2 alert alert-warning alert-dismissible fade show" role="alert">
                                                A simple reason here
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="col-lg-3 ms-2 alert alert-danger alert-dismissible fade show" role="alert">
                                                A simple reason here
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                        <p class="col-lg-2" style="position: relative;">
                                            <a href="#" class="btn btn-danger">REVCF</a><a href="#" class="btn btn-warning">Detail</a>
                                        </p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>


                                <?php
                            }
                        }
                    }
                }
                ?>




            </div>

        </div>
    </section>

    <div class="modal fade mt-5" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row modal-header" style="text-align: center;">
                    <i class="col-12 bi bi-exclamation-circle" style="font-size: 100px;"></i>
                    <div class="col-12">
                        <div class="row">
                            <p class="info-dialog">Vous allez supprimer le client CIN : <span id="idDemande"></span>

                            </p>
                            <p>Cette action est irreversible !</p>
                        </div>

                        <form action="#" class="row" id="form-delete" method="post">
                            <div class="error-text col-12"></div>
                            <input type="text" style="display: none;" name="CLIENT_CIN" value="" id="CLIENT_CIN">
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="confirmation" id="accepter"
                                    required>
                                <label class="form-check-label" for="accepter">
                                    Oui j'en suis sûr !
                                </label>
                            </div>

                            <div class="col-12 mt-5">
                                <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary">Revenir</a>
                                <input type="submit" name="exec-action" class="btn btn-primary btn-delete-action"
                                    value="Valider l'action">
                            </div>

                        </form>

                    </div>

                </div>


            </div>
        </div>
    </div>




</main><!-- End #main -->
<script>



    var deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var td = button.parentElement;
            var tr = td.parentElement;
            tdID = tr.querySelector('.cin-class');
            valle = tdID.textContent;
            valle = valle.trim().replace(/\s/g, "");
            console.log(valle.length);
            $("#idDemande").text(valle);
            $("#cin").val(valle);
            // document.cookie="cin="+valle;
            $("#deleteModal").modal("show");
            // e.preventDefault();
        });
    });

    var deleteButtons = document.querySelectorAll('.btn-edit');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var td = button.parentElement;
            var tr = td.parentElement;
            tdID = tr.querySelector('.cin-class');
            valle = tdID.textContent;
            valle = valle.trim().replace(/\s/g, "");
            console.log(valle.length);
            $("#idDemande").text(valle);
            $("#cin").val(valle);
            // document.cookie="cin="+valle;
            $("#editModal").modal("show");
            // e.preventDefault();
        });
    });



    const form = document.getElementById("form-delete"),
        btnDelete = form.querySelector(".btn-delete-action"),
        errorText = form.querySelector(".error-text");


    form.onsubmit = (e) => {
        e.preventDefault();
    }

    btnDelete.onclick = () => {
        errorText.style.display = "none";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./users/agency/delete-client.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {

                    let data = xhr.response.trim();
                    if (data === "success") {
                        // $("#deleteModal").modal("hide");
                        location.href = "<?php echo $_SESSION['page'] ?>";
                    } else {
                        setTimeout(function () {
                            errorText.style.display = "block";
                            errorText.innerHTML = data;

                        }, 200);
                    }

                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);

    }


</script>