<main id="main" class="main">

    <div class="pagetitle">
        <h1>Liste Demandes annulées</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Etat</li>
                <li class="breadcrumb-item">Demandes annulées</li>
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
                                <th scope="col">ID Crédit</th>
                                <th scope="col">Créé il y a </th>
                                <th scope="col">Nom autheur</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Montant du crédit </th>
                                <th scope="col">Durée </th>
                                <th scope="col">Mensualité </th>
                                <th style="text-align: center;" scope="col" colspan="2">Actions </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_user = "SELECT * FROM `slf_user_client` WHERE seller_id = '{$seller_id}'";
                                $result_user = $conn->query($query_user);

                                $today = new DateTime();



                                if ($result_user->num_rows > 0) {
                                    $users = mysqli_fetch_all($result_user, MYSQLI_ASSOC);
                                    if (count($users) > 0) {
                                        foreach ($users as $data) {
                                            $id_user_unique = $data["client_id"];
                                            $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$id_user_unique}'  AND state='canceled'";
                                            $result_credit = $conn->query($query_credit);
                                            if ($result_credit->num_rows > 0) {
                                                $credit = $result_credit->fetch_assoc();

                                                $up_date = new DateTime($credit["up_date"]);
                                                $day = $today->diff($up_date);
                                                $day = $day->days . " Jours";

                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo '<a href="./detail?credit_id=' . $credit["credit_id"] . ' "> <i class="bi bi-info-circle"></i> ' . $credit["credit_id"] . '</a>' ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $day ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data["fname"] . ' ' . $data["lname"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $credit["product"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $credit["amount"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $credit["duration"] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $credit["monthly"] ?>
                                                    </td>
                                                    <td>
                                                        <a href="./action/dialog?action=delete&id=<?php echo $credit["credit_id"] ?>"
                                                            type="button" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i> Suprimer

                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="./action/dialog?action=restart&id=<?php echo $credit["credit_id"] ?>"
                                                            type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i>
                                                            Reprendre
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
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






</main><!-- End #main -->