<div class="col-sm-12" id="auto-block">

        <div class="block-field">

                <div class="group-select">
                        <label for="rangeInputAmount" class="form-label">PRIX TTC</label><br>
                        <input type="text" class="inputFlag" id="rangeValueAmount" value="100000">
                        <input type="range" class="form-range" min="5000" max="500000" onchange="calcFunctionAuto()"
                                step="1000" id="rangeInputAmount">

                </div>
        </div>

        <div class="block-field">

                <div class="col-sm-12 group-select">
                        <span for="rangeInputDuration" class="form-label">Durée (en
                                mois)</span><br>

                        <div class="row controlRadios" id="controlDuration">

                        </div>
                        <div class="" id="idRange">
                                <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled
                                        id="rangeInputDuration">
                        </div>
                </div>

        </div>
        <div class="block-field">
                <div class="col-sm-12 group-select">
                        <span for="rangeInputDuration" class="form-label">Apport TOTAL (en
                                %)</span><br>


                        <div class="row controlRadios" id="controlApport">

                        </div>
                        <div id="">

                                <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled
                                        id="rangeInputApport">
                        </div>
                </div>

        </div>
        <div class="block-field">
                <div id="InputMonthly" class="group-select">
                        <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                DH)</label><br>
                        <input type="text" class="inputFlag" id="rangeValueMonthly" disabled value="">
                        <input type="range" min="0" max="43000" class="form-range" step="0.01" value="" disabled
                                id="rangeInputMonthly">
                </div>
        </div>
        <div class="d-grid gap-2 mt-3">
                <!-- <button class="btn btn-outline-success w-100" id="simulerAuto"
                                            onclick="displayAuto()">Simuler </button> -->
                <button class="btn btn-outline-success w-100" id="simulerAuto" onclick="displayAuto()">Simuler <div
                                class="spinner-border" style="width: 15px; height: 15px; display: none; "
                                id="spinnerBtnAuto" role="status">
                                <span class="visually-hidden">Loading...</span>
                        </div></button>
        </div>
</div>