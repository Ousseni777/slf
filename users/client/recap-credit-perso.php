<div class="card" id="cardPerso">
    <div class="spinner-border text-danger spinner-pieces" id="preloaderCreditPerso" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    

    <h3 data-aos="fade-up" style="padding: 2%; color : #eb5d1e; text-align: center; ">Mon
        récapitulatif</h3>

    <div class="card-body">

        <hr class="hr">

        <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
        <form action="#" id="formPerso" method="POST">
            <div class="error-text"></div>
            <!-- List group with active and disabled items -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input type="text"
                        name="PROJECT" readonly class="infoR" id="infoProjectP">
                </li>

                <li class="list-group-item"><span class="infoL">Montant crédit (DH) : </span>
                    <input type="text" name="AMOUNT" readonly id="infoAmountP" class="infoR">
                </li>
                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input type="text"
                        name="DURATION" readonly id="infoDurationP" class="infoR">
                </li>
                <li class="list-group-item"><span class="infoL">Mensualité (DH) : </span> <input type="text"
                        name="MONTHLY" readonly id="infoMonthlyP" class="infoR">
                </li>
                <li class="list-group-item"><span class="infoL">Frais de dossier (DH) : </span>
                    <input type="text" name="APP_FEES" readonly class="infoR" id="infoFDP">
                </li>

            </ul><!-- End Clean list group -->
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-outline-success w-100 btn-credit-perso" type="submit"
                    name="btn_credit_perso">Demander ce crédit </button>
            </div>
        </form>

    </div>
</div>