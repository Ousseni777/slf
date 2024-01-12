<div class="col-sm-12" id="perso-block">
    <div class="range-container group-select">
        <label for="customRange2" class="form-label">Montant du crédit</label>
        <input type="range" class="form-range custom-range" min="2000" max="50000" step="500" id="rangeInputTTC"
            value="40000">
        <span class="value-display" id="valueDisplayTTC"></span>
        <span class="value-display value-min" id="valueMin"></span>
        <span class="value-display value-max" id="valueMax"></span>
    </div>
    <p class="space"></p>
    <div class="range-container group-select">
        <label for="customRange2" class="form-label">Durée</label>
        <input type="range" class="form-range custom-range" min="2" max="120" value="24" step="1"
            id="rangeInputDurationPerso">
        <span class="value-display" id="valueDisplayDuration"></span>
        <span class="value-display value-min" id="valueMinMonthly"></span>
        <span class="value-display value-max" id="valueMaxMonthly"></span>
    </div>
    <p class="space"></p>
    <div class="range-container group-select">
        <label for="customRange2" class="form-label">Mensualité</label>
        <input type="range" class="form-range custom-range" min="100" max="30000" step=".1" id="rangeInputMonthlyPerso"
            onchange="calcFunctionPerso('duration')">
        <span class="value-display" id="valueDisplayMonthly"></span>
        <span class="value-display value-min" id="valueMinMonthly"></span>
        <span class="value-display value-max" id="valueMaxMonthly"></span>
    </div>

    <div class="col-12 group-select">
        <p class="space"></p>
        <button class="btn btn-outline-success w-100" id="simulerPerso" onclick="displayPerso()">Simuler <div
                class="spinner-border" style="width: 15px; height: 15px; display: none; " id="spinnerBtnPerso"
                role="status">
                <span class="visually-hidden">Loading...</span>
            </div></button>
    </div>
</div>