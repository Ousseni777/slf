<div class="card" id="cardAuto">
    <div class="spinner-border text-danger spinner-pieces" id="preloaderCreditAuto" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <h3 data-aos="fade-up" style="padding: 2%; color : #eb5d1e; text-align: center; ">Mon
        récapitulatif</h3>

    <div class="card-body">

        <hr class="hr">

        <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
        <form action="#" method="POST" id="formAuto">
            <div class="error-text"></div>
            <!-- List group with active and disabled items -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                        : </span> <input type="text" name="tariff_id" readonly id="infoTariffID" class="infoR"></li>
                <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input type="text"
                        name="project" readonly class="infoR" value="auto">
                </li>
                <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input type="text" name="amount"
                        readonly id="infoAmount" class="infoR"></li>
                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input type="text"
                        name="duration" readonly id="infoDuration" class="infoR">
                </li>
                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text" name="monthly"
                        readonly id="infoMonthly" class="infoR"></li>
                <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                    <input type="text" name="app_fees" readonly class="infoR" id="infoFD">
                </li>
                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input type="text"
                        name="down_pmt" readonly id="infoApport" class="infoR"></li>
                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                        (%) : </span> <input type="text" name="down_pmt_perc" readonly id="infoApportPerc"
                        class="infoR"></li>
                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text" name="adi" readonly
                        id="infoADI" class="infoR"></li>
                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input type="text"
                        name="cost_ex_adi" readonly id="infoCHAD" class="infoR">
                </li>

            </ul><!-- End Clean list group -->
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-outline-success w-100 btn-credit-auto" type="submit" name="btn-credit-auto"
                    id="btn_credit_auto">Demander ce crédit </button>
            </div>
        </form>
    </div>
</div>