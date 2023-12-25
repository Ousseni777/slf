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
                        <input type="text" id="searchInput"  class="form-control">

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
                    <table class="table table-bordered" id="myTable" >
                        <thead>
                            <tr>
                                <th scope="col">ID Crédit</th>
                                <!-- <th scope="col"> Rejeté il y a</th> -->
                                <th scope="col"> Autheur du crédit</th>
                                <th style="width:300px; text-align: center;" scope="col">Action </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_user = "SELECT * FROM `slf_user_client` WHERE seller_id = '{$seller_id}'";
                                $result_user = $conn->query($query_user);

                                if ($result_user->num_rows > 0) {
                                    $sellers = mysqli_fetch_all($result_user, MYSQLI_ASSOC);
                                    if (count($sellers) > 0) {
                                        foreach ($sellers as $data) {
                                            $id_user_unique = $data["client_id"];
                                            $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$id_user_unique}'  AND state='rejected'";
                                            $result_credit = $conn->query($query_credit);
                                            if ($result_credit->num_rows > 0) {
                                                $credit = $result_credit->fetch_assoc(); ?>
                                                <?php
                                                $civilite = "civilite_" . $data["client_id"];
                                                $civil = ".civilite_" . $data["client_id"];

                                                ?>
                                                <tr>
                                                    <th>
                                                        <a href="./action/dialog?action=edit&id=<?php echo $credit["credit_id"] ?>"
                                                            type="button"><i class="bi bi-info-circle"></i>
                                                            <?php echo $credit["credit_id"] ?>
                                                        </a>
                                                    </th>
                                                    <td>
                                                        <?php echo $data["fname"] . ' ' . $data["lname"] ?>
                                                    </td>
                                                    <td style="text-align: center;" >
                                                        <a href="./action/dialog?action=edit&id=<?php echo $credit["credit_id"] ?>"
                                                            type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i>
                                                            Relancer
                                                        </a>
                                                        <button class="btn btn-info" onclick="displayElement('<?php echo $civil ?>')">
                                                            <i class="bi bi-plus control-bi <?php echo $civilite ?>-bi"
                                                                ></i> Voir raison
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="<?php echo $civilite ?> control">
                                                    <td colspan="3">
                                                        <div class="col-12 border-left">


                                                            <div class="row ">

                                                                <label for="inputText" class="col-sm-2 col-form-label">Raison du
                                                                    rejet</label>
                                                                <div class="col-sm-10">
                                                                    <textarea style="height:200px;" class="form-control">
                                                                                        <?php echo $credit["reason"] ?>
                                                                                    </textarea>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php


                                            }
                                        }
                                    } else {
                                        echo '<option>No Data Found</option>';
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