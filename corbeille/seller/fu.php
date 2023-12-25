<main id="main" class="main">

            <div class="pagetitle">
                <h1>Demander mon crédit en ligne</h1>
                <nav>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item active">Simulation</li>
                        <li class="breadcrumb-item"><a href="#">Mes infos personnelles</a></li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->


            <section class="section">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Commencez la simulation pour le crédit approprié</h5>
                                <hr>

                                <!-- Commencez la simulation pour le crédit approprié -->

                                <div class="row g-3">

                                    <?php if (isset($seller)) { ?>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <?php if ($seller == 'SALAFIN') { ?>

                                                    <select class="form-select" id="idBrand" name="brand" onchange="loadProduct()"
                                                        aria-label="State">
                                                    </select>

                                                <?php } else { ?>

                                                    <select class="form-select" id="idBrand" name="brand" disabled
                                                        onchange="loadProduct()" aria-label="State">
                                                    </select>

                                                <?php } ?>
                                                <label for="floatingSelect">Marque</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4 controlAutos" id="controlProduct">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="idProduct" name="product" aria-label="State"
                                                    onchange="loadTariff()">

                                                </select>
                                                <label for="floatingSelect">Produit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="idTariff" name="tariff"
                                                    onchange="loadDuration()" aria-label="State">


                                                </select>

                                                <label for="floatingSelect">Barême</label>
                                            </div>

                                        </div>


                                    <?php } ?>



                                    <div class="row mb-5">
                                        <!-- <label class="col-sm-2 col-form-label"> Mon choix </label> -->

                                        <div class="col-sm-12">

                                            <div class="block-field">

                                                <div class="group-select">
                                                    <label for="rangeInputAmount" class="form-label">PRIX
                                                        TTC</label><br>
                                                    <input type="text" class="inputFlag" id="rangeValueAmount"
                                                        value="">
                                                    <input type="range" name="amount" class="form-range" min="5000"
                                                        max="500000" onchange="calcFunction()" step="1000"
                                                        id="rangeInputAmount">

                                                </div>
                                            </div>

                                            <div class="block-field">

                                                <div class="col-sm-10 group-select">
                                                    <span for="rangeInputDuration" class="form-label">Durée (en
                                                        mois)</span><br>
                                                    <div class="row controlRadios" id="controlDuration">

                                                    </div>
                                                    <div id="idRange">
                                                        <input type="range" name="duration" class="form-range" min="0"
                                                            max="100" value="" step="1" disabled id="rangeInputDuration">
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="block-field">
                                                <div class="col-sm-10 group-select">
                                                    <span for="rangeInputDuration" class="form-label">Apport TOTAL (en
                                                        %)</span><br>
                                                    <div class="row controlRadios" id="controlApport">

                                                    </div>
                                                    <div id="">
                                                        <input type="range" name="down_pmt_perc" class="form-range" min="0"
                                                            max="100" value="" step="1" disabled id="rangeInputApport">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="block-field">
                                                <div id="InputMonthly" class="group-select">
                                                    <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                                        DH)</label><br>
                                                    <input type="text" class="inputFlag" id="rangeValueMonthly" disabled
                                                        value="">
                                                    <input type="range" name="monthly" min="0" max="43000"
                                                        class="form-range" step="0.01" value="" disabled
                                                        id="rangeInputMonthly">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form action="process1" method="post">
                            <div class="card">

                                <div class="card-body">
                                    <h2>Détails du crédit</h2>


                                    <!-- List group with active and disabled items -->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="infoL"> Nom vendeur : </span> <input
                                                type="text" id="infoBrand" name="brand" name="product" readonly
                                                class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL"> Type produit : </span> <input
                                                type="text" id="infoProduct" name="product" name="product" readonly
                                                class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL"> Barême : </span> <input type="text"
                                                id="infoTariff" name="tariff" readonly class="infoR infoBareme"></li>

                                        <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input
                                                type="text" id="infoAmount" name="amount" readonly class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                                type="text" id="infoDuration" name="duration" readonly class="infoR"></li>
                                        <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                                (%)</span> <input type="text" id="infoApportPerc" name="down_pmt_perc"
                                                readonly class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Mensualité : </span> <input
                                                type="text" id="infoMonthly" name="monthly" readonly class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Frais de dossier : </span> <input
                                                type="text" name="application_fees" class="infoR" readonly id="infoFD"></li>
                                        <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                                type="text" id="infoApport" name="down_pmt" readonly class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                                id="infoADI" name="adi" readonly class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                                type="text" id="infoCHAD" name="cost_ex_adi" readonly class="infoR"></li>

                                    </ul><!-- End Clean list group -->
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" name="ask_credit_user" class="btn btn-outline-primary"
                                            type="button">Demander
                                            ce
                                            crédit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </main><!-- End #main -->