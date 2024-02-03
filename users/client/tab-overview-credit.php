<style>
    .form-hide-detail {
        /* display: none; */
    }

    .values {
        color: green;
        font-weight: bold;
    }
</style>


<div class="tab-pane fade profile-overview mt-3 active show" id="profile-overview">
    <?php

    if (isset($client)) {

        $query_credit = "SELECT * FROM `credit_client` WHERE CREDIT_ID = '{$CREDIT_ID}' ";
        $result_credit = $conn->query($query_credit);
        if ($result_credit->num_rows > 0) {
            $credit = $result_credit->fetch_assoc();
        }

        $TARIFF_ID = $credit['TARIFF_ID'];
        $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID='$TARIFF_ID'";
        $result_select_tariff = $conn->query($select_tariff);
        $tariff = $result_select_tariff->fetch_assoc();

        $PROJECT_ID = strtoupper($credit['PROJECT_ID']);
        if ($PROJECT_ID == 0) {
            ?>
            <div class="card row">
                <div class="card-body">
                    <h5 class="card-title infos-client"><i class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?>
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail">
                            <div class="row">
                                <div class="col-lg-6 label ">Date demande crédit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['UP_DATE'] ?>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 label">Type de demande :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['PROJECT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Marque auto :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['MARQUE'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Type produit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['PRODUIT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Type barême :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['BAREME'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Montant demandé (DH) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['AMOUNT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Durée du crédit (mois) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['DURATION'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Mensualité :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['MONTHLY'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Frais de dossier :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['APP_FEES'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title infos-client"><i class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?>
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail">
                            <div class="row">
                                <div class="col-lg-6 label ">Date demande crédit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['UP_DATE'] ?>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 label">Type de demande :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['PROJECT'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Montant demandé (DH) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['AMOUNT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Durée du crédit (mois) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['DURATION'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Mensualité :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['MONTHLY'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Frais de dossier :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['APP_FEES'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }

    } else {

        $query_credit = "SELECT * FROM `credit_client_tmp` WHERE CREDIT_ID = '{$CREDIT_ID}' ";
        $result_credit = $conn->query($query_credit);
        if ($result_credit->num_rows > 0) {
            $credit = $result_credit->fetch_assoc();
        }

        $TARIFF_ID = $credit['TARIFF_ID'];
        $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID='$TARIFF_ID'";
        $result_select_tariff = $conn->query($select_tariff);
        $tariff = $result_select_tariff->fetch_assoc();

        $PROJECT_ID = strtoupper($credit['PROJECT_ID']);
        if ($PROJECT_ID == 0) {
            ?>
            <div class="card row">
                <div class="card-body">
                    <h5 class="card-title infos-client"><i class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?>
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail">
                            <div class="row">
                                <div class="col-lg-6 label ">Date demande crédit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['UP_DATE'] ?>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 label">Type de demande :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['PROJECT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Marque auto :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['MARQUE'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Type produit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['PRODUIT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Type barême :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $tariff['BAREME'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Montant demandé (DH) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['AMOUNT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Durée du crédit (mois) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['DURATION'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Mensualité :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['MONTHLY'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Frais de dossier :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['APP_FEES'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title infos-client"><i class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?>
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail">
                            <div class="row">
                                <div class="col-lg-6 label ">Date demande crédit :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['UP_DATE'] ?>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 label">Type de demande :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['PROJECT'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Montant demandé (DH) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['AMOUNT'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Durée du crédit (mois) :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['DURATION'] ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 label">Mensualité :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['MONTHLY'] ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 label">Frais de dossier :</div>
                                <div class="col-lg-6 values">
                                    <?php echo $credit['APP_FEES'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }

    } ?>

</div>