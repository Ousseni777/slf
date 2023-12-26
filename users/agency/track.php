<style>
    .status {
        text-align: center;
        color: green;
        border-radius: 5px;
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

    .activite-label {
        width: 120px;
    }

    #myTable tbody {
        max-height: 330px;
        overflow-y: auto;
        display: block;
    }

    #myTable thead,
    #myTable tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    table.table tbody tr:hover {
        background-color: red;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste des dossiers en traitement</h1>
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
            <div class="col-3"></div>

            <div class="col-5">
                <div class="row">
                    <label for="inputText" class="col-sm-3 col-form-label">Rechercher</label>
                    <div class="col-sm-9">
                        <input type="text" id="searchInput" placeholder="Num doss, id client ou id vendeur"
                            class="form-control">

                    </div>
                </div>
            </div>


            <div class="col-lg-8">

                <div class="card row">

                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#NUM DOSSIER </th>
                                <th scope="col">#ID AUTHEUR </th>
                                <th scope="col">#ID VENDEUR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_doss = "SELECT * FROM `majestic` WHERE 1";
                                $result_doss = $conn->query($query_doss);

                                if ($result_doss->num_rows > 0) {
                                    $dossiers = mysqli_fetch_all($result_doss, MYSQLI_ASSOC);
                                    if (count($dossiers) > 0) {
                                        $i = 0;
                                        foreach ($dossiers as $dossier) { ?>

                                            <tr>
                                                <td scope="row">
                                                    <?php echo '<i class="bi bi-info-circle"></i> <a class="numdoss" href="./detail-doss?id=' . $dossier["NUMDOSS"] . ' "> ' . $dossier["NUMDOSS"] . '</a>' ?>
                                                </td>

                                                <td scope="row">
                                                    <?php echo '<i class="bi bi-info-circle"></i> <a  href="./detail-cl?id=' . $dossier["IDCLIENT"] . ' "> ' . $dossier["IDCLIENT"] . '</a>' ?>
                                                </td>
                                                <td scope="row">
                                                    <?php echo '<i class="bi bi-info-circle"></i> <a href="./detail-sl?id=' . $dossier["IDVENDEUR"] . ' "> ' . $dossier["IDVENDEUR"] . '</a>' ?>
                                                </td>


                                            </tr>
                                        <?php }
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
 
                </div>


            </div>
            <!-- <div class="col-lg-1">

            </div> -->
            <div class="row col-lg-4">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">#DATE PRODUCTION</h5>
                        <input type="text" id="infoPROD" name="down_pmt" readonly
                            value="<?php echo $dossier['DATEPROD'] ?>" class="form-control status">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">#DATE ENGAGEMENT</h5>
                        <input type="text" id="infoENG" name="down_pmt" readonly
                            value="<?php echo $dossier['DATEENG'] ?>" class="form-control status">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">#DATE INSTRUCTION</h5>
                        <input type="text" id="infoINST" name="down_pmt" readonly
                            value="<?php echo $dossier['DATEINST'] ?>" class="form-control status">

                    </div>
                </div>


            </div>

        </div>
    </section>




</main><!-- End #main -->


<script type="text/javascript" src="jquery.min.js"></script>
<script>

    $(document).ready(function () {
        // Ajoutez la gestion du survol avec JavaScript
        $('tbody tr').hover(

            function () {
                $(this).find('td').each(function () {
                    let numdoss = $(this).find('a.numdoss');
                    // console.log(numdoss.text());
                    
                    $(this).replaceWith(function () {
                        return $("<th>", { html: $(this).html() });

                    });
                    loadDate(numdoss.text());

                });
                
                
            },
            function () {
                // Revertir au survol
                $(this).find('th').each(function () {
                    $(this).find('td:first').removeClass('highlighted');
                    $(this).replaceWith(function () {
                        return $("<td>", { html: $(this).html() });
                    });
                });
            }
        );
    });

    function loadDateA(numdoss) {
        numdoss = numdoss.trim();
        console.log(numdoss.length)
        $.ajax({
            url: "users/agency/date.php",
            method: "POST",
            data: { NUMDOSS: numdoss },
            success: function (data) {
                var result = JSON.parse(data);
                $("#infoPROD").val(result.prod);
                $("#infoENG").val(result.eng);
                $("#infoINST").val(result.inst);

            }
        });
    }

    function loadDate(numdoss) {
        numdoss = numdoss.trim();
        // console.log(numdoss)
        let xhr = new XMLHttpRequest();
        let url = "users/agency/date.php";
        let params = "NUMDOSS=" + numdoss;
        xhr.open("POST", url, true);

        // Ajouter un en-tête pour indiquer que le contenu est de type formulaire
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            // console.log("Contenu de la réponse :", xhr.responseText.trim());

            let result;

            if (xhr.status === 200) {
                try {
                    result = JSON.parse(xhr.responseText.trim());                    
                    $("#infoPROD").val(result.prod);
                    $("#infoENG").val(result.eng);
                    $("#infoINST").val(result.inst);
                } catch (e) {
                    console.error("Erreur lors de l'analyse du JSON :", e);
                }
            } else {
                console.error("La requête a échoué avec le statut :", xhr.status);
            }

            // Utilisez la variable 'result' comme nécessaire

        };

        xhr.onerror = function () {
            console.error("Une erreur réseau s'est produite");
        };

        xhr.send(params);

    }

</script>