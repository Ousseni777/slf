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
                                <th scope="col">#Référence crédit </th>  
                                <th scope="col">Référence de l'Autheur</th>                                                             
                                <th scope="col">Date de demande</th>    
                                <th scope="col">Durée du crédit</th>                                                                
                                <th scope="col">Montant crédit</th>
                                <th style="text-align: center; " scope="col" colspan="2">Actions </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_SESSION['seller_id'])) {
                                $seller_id = $_SESSION['seller_id'];
                                $query_credit = "SELECT * FROM `credit_client` WHERE seller_id ='$seller_id'";
                                $result_client = $conn->query($query_credit);

                                if ($result_client->num_rows > 0) {
                                    $users = mysqli_fetch_all($result_client, MYSQLI_ASSOC);
                                    if (count($users) > 0) {
                                        foreach ($users as $data) { ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo '<a href="./detail-cl?credit_id=' . $data["credit_id"] . ' "> <i class="bi bi-info-circle"></i> ' . $data["credit_id"] . '</a>' ?>
                                                </th> 
                                                
                                                <th scope="row">
                                                    <?php echo '<a href="./detail-cl?client_id=' . $data["client_id"] . ' "> <i class="bi bi-info-circle"></i> ' . $data["client_id"] . '</a>' ?>
                                                </th>                                                
                                                <td>
                                                    <?php echo $data["up_date"] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["amount"] ?>
                                                </td>   
                                                <td>
                                                    <?php echo $data["duration"] ?>
                                                </td>                                                                                          
                                                <td style="text-align: center; width: 150px; ">
                                                    <a href="?id=<?php echo $data["client_id"] ?>"
                                                        type="button" class="btn btn-primary">
                                                        <i class="bi bi-pencil-square"></i> Modifier

                                                    </a>
                                                </td>
                                                <td style="text-align: center; width: 150px; ">
                                                    <a href="?id=<?php echo $data["client_id"] ?>"
                                                        type="button" class="btn btn-danger">
                                                        <i class="bi bi-x-circle"></i> Supprimer

                                                    </a>
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






</main><!-- End #main -->