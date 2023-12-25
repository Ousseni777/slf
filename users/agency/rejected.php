<main id="main" class="main">
    <div class="pagetitle">
        <h1>Liste Demandes rejetées</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Etat</li>
                <li class="breadcrumb-item">Demandes rejetées</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
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
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-12 mt-5">
                <div class="card row">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Référence crédit</th>     
                                <th scope="col">Référence de l'Autheur</th>                                
                                <th scope="col"> Montant demandé</th>
                                <th scope="col"> Durée du crédit</th>
                                <th scope="col">Raison du rejet </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_credit = "SELECT * FROM `credit_client` WHERE seller_id = '$seller_id' AND state='Demande rejetée'";
                                $result_credit = $conn->query($query_credit);

                                if ($result_credit->num_rows > 0) {
                                    $credits = mysqli_fetch_all($result_credit, MYSQLI_ASSOC);
                                    if (count($credits) > 0) {
                                        $count_credit = 0;
                                        foreach ($credits as $credit) {
                                            $client_id = $credit["client_id"];
                                            $count_credit++;
                                            ?>
                                            <?php
                                            $civilite = "civilite_" . $credit["client_id"];
                                            $civil = ".civilite_" . $credit["client_id"];

                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="./detail?credit_id=<?php echo $credit["credit_id"] ?>" type="button"><i
                                                            class="bi bi-info-circle"></i>
                                                        <?php echo $credit["credit_id"] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="./detail?credit_id=<?php echo $credit["client_id"] ?>" type="client_id"><i
                                                            class="bi bi-info-circle"></i>
                                                        <?php echo $credit["client_id"] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo $credit["amount"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $credit["duration"] ?>
                                                </td>
                                                <td style="text-align: center;">                                                    
                                                    <button class="btn btn-info" onclick="displayElement('<?php echo $civil ?>')">
                                                        <i class="bi bi-plus control-bi <?php echo $civilite ?>-bi"></i> Voir raison
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="<?php echo $civilite ?> control">
                                                <td colspan="5">
                                                    <div class="col-12 border-left">

                                                        <div class="row ">

                                                            <label for="inputText" class="col-sm-2 col-form-label">Raison du
                                                                rejet</label>
                                                            <div class="col-sm-10">
                                                                <textarea style="height:200px; text-align: left; " class="form-control">
                                                                                                                            <?php echo $credit["reason"] ?>
                                                                                                                        </textarea>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                    } else {
                                        echo '<option>No Data Found</option>';
                                    }
                                }
                                if ($count_credit == 0) { ?>

                                    <tr style="text-align:center;">
                                        <td colspan="3">
                                            Aucune demande n'a été rejetée
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>


</main><!-- End #main -->