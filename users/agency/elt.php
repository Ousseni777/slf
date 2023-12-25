<?php
$civilite = "civilite_" . $data["client_id"];
$civil = ".civilite_" . $data["client_id"];

$today = new DateTime();

$up_date = new DateTime($credit["up_date"]);

$day = $today->diff($up_date);

switch ($day->days) {
    case 0:
        $flagDay = "Aujourd'hui";
        break;
    case 1:
        $flagDay = "Il y a " . $day->days . " jour";
        break;
    default:
        $flagDay = "Il y a " . $day->days . " jours";
        break;
}

?>




<div class="row card-body processed">
    <div class="row">
        <h5 class="card-title processed-title" >
            <img src="saver/images/<?php echo $data["picture_piece"] ?>" class="left" alt="">
            <span class="client-id">
            
                <!-- <?php echo 'ID: '. $data["client_id"] . ' ('. $data["fname"] . ' '.$data["lname"] .')'?> -->
                <?php echo 'ID: '. $data["client_id"] ?>
            </span>
            <button style="height: 50px; padding: 0px 1%;" class="btn btn-info right bi-plus control-bi <?php echo $civilite ?>-bi" onclick="displayElement('<?php echo $civil ?>')"></button>
            <p class="label right">
                <?php echo $flagDay; ?>
            </p>
            <p class="label right">Durée (
                <?php echo $credit["duration"] ?>)
            </p>
            <p class="label right">TTC (
                <?php echo number_format($credit["amount"], 2, ".", " ") ?>)
            </p>
            <p class="label right">Produit (LOA) </p>

        </h5>
    </div>

    <div class="col-6 border-left">
        <h5 class="card-title <?php echo $civilite ?> control"> Infos personnelles</h5>

        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Nom</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["lname"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Prénom</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["fname"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">CIN / Carte séjour</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["cin"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["email"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Téléphone</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["phone"] ?>
                </p>
            </div>
        </div>

        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Région</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["region"] ?>
                </p>
            </div>
        </div>

        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Ville</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $data["town"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-12 col-form-label">Justificatifs</label>
            <div class="col-4">
                <div class="portfolio-wrap col-8 form-control">
                    <img src="saver/images/<?php echo $data["cin_piece"] ?>" class="pieces img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="saver/images/<?php echo $data["cin_piece"] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                    </div>
                </div>
                <label for="">CIN</label>
            </div>
            <div class="col-4">
                <div class="portfolio-wrap col-8 form-control">
                    <img src="saver/images/<?php echo $data["rib_piece"] ?>" class="pieces img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="saver/images/<?php echo $data["rib_piece"] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                    </div>
                </div>
                <label for="">RIB</label>
            </div>
            <div class="col-4">
                <div class="portfolio-wrap col-8 form-control">
                    <img src="saver/images/<?php echo $data["adress_piece"] ?>" class="pieces img-fluid" alt="">
                    <div class="portfolio-links">
                        <a href="saver/images/<?php echo $data["adress_piece"] ?>" data-gallery="portfolioGallery"
                            class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                    </div>
                </div>
                <label for="">Adresse</label>
            </div>

        </div>
    </div>
    <div class="col-6 border-left">
        <h5 class="card-title <?php echo $civilite ?> control"> Détail du crédit</h5>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Type marque</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["brand"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Type produit</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["product"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Barême attribué</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["tariff"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">TTC (DH) </label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["amount"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Durée (mois) </label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["duration"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Apport en (%) </label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["down_pmt_perc"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Apport TOTAL (DH) </label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["down_pmt"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Mensualité (DH) </label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["monthly"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Frais de Dossier</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["application_fees"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">ADI</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["adi"] ?>
                </p>
            </div>
        </div>
        <div class="row <?php echo $civilite ?> control">
            <label for="inputText" class="col-sm-4 col-form-label">Coût Hors ADI</label>
            <div class="col-sm-8">
                <p class="form-control">
                    <?php echo $credit["cost_ex_adi"] ?>
                </p>
            </div>
        </div>

    </div>
</div>