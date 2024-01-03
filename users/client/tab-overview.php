<style>
    .form-hide-detail {
        display: none;
    }
</style>


<div class="tab-pane fade profile-overview mt-5" id="profile-overview">
    <?php

    $query_credit = "SELECT * FROM `viewsim` WHERE client_id = '{$client_id}' ";
    $result_credit = $conn->query($query_credit);
    if ($result_credit->num_rows > 0) {
        $credits = mysqli_fetch_all($result_credit, MYSQLI_ASSOC);
    }
    if (count($credits) > 0) {

        foreach ($credits as $credit) {
            $tariff_id = $credit['tariff_id'];
            $select_tariff = "SELECT * FROM `slf_tarification` WHERE tariff_id='$tariff_id'";
            $result_select_tariff = $conn->query($select_tariff);
            $tariff = $result_select_tariff->fetch_assoc();
            $elt = $credit['credit_id'];
            $elt_class = "." . $elt;
            $project = strtoupper($credit['project']);
            if ($project == "AUTO") {
                ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title infos-client" onclick="displayElement('<?php echo $elt_class ?>' )"><i
                                class="bi bi-file-earmark-text left"></i>Reférence de demande :
                            <?php echo $credit['credit_id'] ?> <i class="bi right bi-plus <?php echo $elt ?>-bi"></i>
                        </h5>
                        <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                            <div class="col-10 row form-hide-detail <?php echo $elt ?>">
                                <div class="row">
                                    <div class="col-lg-6 label ">Date demande crédit :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['up_date'] ?>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6 label">Type de demande :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['project'] ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 label">Marque :</div>
                                    <div class="col-lg-6">
                                        <?php echo $tariff['MARQUE'] ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 label">Type produit :</div>
                                    <div class="col-lg-6">
                                        <?php echo $tariff['PRODUIT'] ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 label">Montant demandé (DH) :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['amount'] ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 label">Durée du crédit (mois) :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['duration'] ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 label">Mensualité :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['monthly'] ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 label">Frais de dossier :</div>
                                    <div class="col-lg-6">
                                        <?php echo $credit['app_fees'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 label">Etat production :</div>
                                    <div class="col-lg-6">
                                        <span class="badge bg-warning">
                                            <?php echo $credit['state'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 label">Etat d'engagement :</div>
                                    <div class="col-lg-6">
                                        <span class="badge bg-warning">
                                            <?php echo $credit['state'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 label">Etat d'instruction :</div>
                                    <div class="col-lg-6">
                                        <span class="badge bg-warning">
                                            <?php echo $credit['state'] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }
        }
    } ?>

</div>