<style>
    .form-hide-detail {
        /* display: none; */
    }
    .values{
        color: green;
        font-weight: bold;
    }
</style>


<div class="tab-pane fade profile-overview mt-3 active show" id="profile-overview">
    <?php

    if (isset($client) ) {

        $query_credit = "SELECT * FROM `credit_client` WHERE CLIENT_ID = '{$CLIENT_ID}' ";
        $result_credit = $conn->query($query_credit);
        if ($result_credit->num_rows > 0) {
            $credits = mysqli_fetch_all($result_credit, MYSQLI_ASSOC);
        }
        if (count($credits) > 0) {

            foreach ($credits as $credit) {
                $TARIFF_ID = $credit['TARIFF_ID'];
                $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID_UK='$TARIFF_ID'";
                $result_select_tariff = $conn->query($select_tariff);
                $tariff = $result_select_tariff->fetch_assoc();
                $elt = $credit['CREDIT_ID'];
                $elt_class = "." . $elt;
                $PROJECT = strtoupper($credit['PROJECT']);
                if ($PROJECT == "AUTO") {
                    ?>
                    <div class="card row">
                        <div class="card-body">
                            <h5 class="card-title infos-client"><i
                                    class="bi bi-arrow-return-right left"></i>Reférence de demande :
                                <?php echo $credit['CREDIT_ID'] ?> 
                            </h5>
                            <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                                <div class="col-10 row form-hide-detail <?php echo $elt ?>">
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
                                        <div class="col-lg-6 label">Marque :</div>
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
                                    <!-- <div class="row">
                                        <div class="col-lg-6 label">Etat production :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 label">Etat d'engagement :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 label">Etat d'instruction :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title infos-client" ><i
                                    class="bi bi-arrow-return-right left"></i>Reférence de demande :
                                <?php echo $credit['CREDIT_ID'] ?> 
                            </h5>
                            <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                                <div class="col-10 row form-hide-detail <?php echo $elt ?>">
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
                                    <!-- <div class="row">
                                        <div class="col-lg-6 label">Etat production :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 label">Etat d'engagement :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 label">Etat d'instruction :</div>
                                        <div class="col-lg-6 values">
                                            <span class="badge bg-warning">
                                                <?php echo $credit['STATE_LIB'] ?>
                                            </span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
            }
        }
    } else {

        $TARIFF_ID = $credit['TARIFF_ID'];
        $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID_UK='$TARIFF_ID'";
        $result_select_tariff = $conn->query($select_tariff);
        $tariff = $result_select_tariff->fetch_assoc();
        $elt = $credit['CREDIT_ID'];
        $elt_class = "." . $elt;
        $PROJECT = strtoupper($credit['PROJECT']);
        if ($PROJECT == "AUTO") {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title infos-client" ><i
                            class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?> 
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail <?php echo $elt ?>">
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
                                <div class="col-lg-6 label">Marque :</div>
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
                            <!-- <div class="row">
                                <div class="col-lg-6 label">Etat production :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 label">Etat d'engagement :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 label">Etat d'instruction :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title infos-client" ><i
                            class="bi bi-arrow-return-right left"></i>Reférence de demande :
                        <?php echo $credit['CREDIT_ID'] ?> 
                    </h5>
                    <div class="col-12 form-floating mb-3 d-flex flex-column align-items-center justify-content-center">
                        <div class="col-10 row form-hide-detail <?php echo $elt ?>">
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
                            <!-- <div class="row">
                                <div class="col-lg-6 label">Etat production :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 label">Etat d'engagement :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 label">Etat d'instruction :</div>
                                <div class="col-lg-6 values">
                                    <span class="badge bg-warning">
                                        <?php echo $credit['STATE_LIB'] ?>
                                    </span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        <?php }
    } ?>

</div>