<style>
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
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste des clients</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Etat</li>
                <li class="breadcrumb-item">En attente d'une validation</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row mt-5">

            <div class="col-4">
                <div class="row mb-3">
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
            <div class="col-4"></div>

            <div class="col-4">
                <div class="row">
                    <label for="inputText" class="col-sm-3 col-form-label">Rechercher</label>
                    <div class="col-sm-9">
                        <input type="text" id="searchInput" class="form-control">

                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-5">

                <div class="card row">

                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#ID Client (CIN) </th>

                                <th scope="col">Téléphone </th>
                                <th scope="col">Email</th>
                                <th style="text-align: center; " scope="col" colspan="2">Actions </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_user = "SELECT * FROM `slf_user_client` WHERE seller_id ='$seller_id'";
                                $result_user = $conn->query($query_user);

                                if ($result_user->num_rows > 0) {
                                    $users = mysqli_fetch_all($result_user, MYSQLI_ASSOC);
                                    if (count($users) > 0) {
                                        foreach ($users as $data) { ?>
                                            <tr >
                                                <th scope="row">
                                                    <?php echo '<i class="bi bi-info-circle"></i> <a class="cin-class" href="./detail-cl?id=' . $data["cin"] . ' "> ' . $data["cin"] . '</a>' ?>
                                                </th>

                                                <td>
                                                    <?php echo $data["phone"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["email"] ?>
                                                </td>
                                                <td style="text-align: center; width: 150px; ">
                                                    <a href="./detail-cl?edit=1&id=<?php echo $data["cin"] ?>" id="btn-edit"
                                                        class="btn btn-outline-primary btn-edit">
                                                        <i class="bi bi-pencil-square"></i> Modifier
                                                    </a>
                                                </td>
                                                <td style="text-align: center; width: 150px; ">
                                                    <button class="btn btn-outline-danger btn-delete">
                                                        <i class="bi bi-x-circle"></i> Supprimer

                                                    </button>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


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
                                <!-- <?php echo $_COOKIE['cin'] ?> -->
                            </p>
                            <p>Cette action est irreversible !</p>
                        </div>

                        <form action="#" class="row" id="form-delete" method="post">
                            <div class="error-text col-12"></div>
                            <input type="text" style="display: none;" name="cin" value="" id="cin">
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