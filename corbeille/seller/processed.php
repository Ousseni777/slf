<main id="main" class="main">

<div class="pagetitle">
        <h1>Liste des demandes traitées</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Etat</li>
                <li class="breadcrumb-item">Traitées et validées</li>
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
                        <input type="text"  id="searchInput" class="form-control">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">

        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-12 mt-5">
                <div class="card">
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
                                    $query_credit = "SELECT * FROM `credit_client` WHERE client_id = '{$id_user_unique}'  AND state='processed'";
                                    $result_credit = $conn->query($query_credit);
                                    if ($result_credit->num_rows > 0) {
                                        $credit = $result_credit->fetch_assoc();
                                        include "elt.php";
                                    }
                                }
                            } else {
                                echo '<option>No Data Found</option>';
                            }
                        }
                    }
                    ?>
                </div>

            </div>

        </div>
    </section>


</main><!-- End #main -->