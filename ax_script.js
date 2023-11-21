
class Tarification {
    constructor() {
        this.ProjetctID = $("#idProject");
        this.BrandID = $("#idBrand");
        this.ProductID = $("#idProduct");
        this.DurationID = $("#idDuration");
        this.ApportID = $("#idApport");
        this.AmountID = $("#rangeInputTTC");

        this.RangeInputD = document.getElementById("rangeInputDuration");
        this.RangeInputA = document.getElementById("rangeInputApport");
        this.RangeInputM = document.getElementById("rangeInputMonthly");

        this.DisplayD = document.getElementById("valueDisplayDuration");
        this.DisplayA = document.getElementById("valueDisplayApport");
        this.DisplayM = document.getElementById("valueDisplayMonthly");

        this.selectMonthly = document.getElementById('idMonthly');
        this.selectApport = document.getElementById('idApport');
    }

    loadData(){
        if(this.ProductID.val()!==0){
            this.loadDuration();
        }
    }

    loadDuration() {

        $.ajax({
            url: "data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'duration' },
            success: (data) => {
                this.DurationID.html(data);
                this.calcFunction();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });
    }
    loadApport() {

        $.ajax({
            url: "data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'apport' },
            success: (data) => {
                this.ApportID.html(data);
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });
    }
    calcFunction() {

        $.ajax({
            url: "calc-fx.php",
            method: "POST",
            data: {
                ID_AMOUNT: this.AmountID.val(),
                ID_DURATION: this.DurationID.val(),
                ID_APPORT: this.ApportID.val()
            },
            success: (data) => {

                var result = JSON.parse(data);
                                
                this.selectMonthly.textContent = '';
                let ind=0;
                result.monthly.forEach(element => {
                    var nouvelleOption = document.createElement('option');
                    nouvelleOption.value = element;
                    nouvelleOption.text = element;
                    if(ind==(Math.round(result.monthly.length/2))){
                        nouvelleOption.selected=true;     
                        let chiffreSansEspace = element.replace(/\s/g, '');                              
                    }
                    ind++;
                    
                    this.selectMonthly.appendChild(nouvelleOption);
                });

                let first=0;
                let count=0;
                this.selectApport.textContent = '';
                result.apport.forEach(element => {
                    var nouvelleOption = document.createElement('option');
                    nouvelleOption.value = element;
                    nouvelleOption.text = element;
                    nouvelleOption.setAttribute("data-custom",count)
                    // nouvelleOption.count = count;
                    count++;
                    if(first==(Math.round(result.apport.length/2))){
                        nouvelleOption.selected=true;                                   
                    }
                    first++;
                    
                    this.selectApport.appendChild(nouvelleOption);
                });
                this.updateInfoDuration();



            }
        });
    }
    updateInfoDuration() {
        this.DisplayD.textContent= this.DurationID.val();
        this.RangeInputD.value = this.DurationID.val();
        var percent = (this.RangeInputD.value - this.RangeInputD.min) / (this.RangeInputD.max - this.RangeInputD.min) * 100;
        this.DisplayD.style.left = percent + '%';
        
        this.updateInfoApport();
        
    }
    updateInfoApport() {
        this.RangeInputA.value = this.ApportID.val();
        this.DisplayA.textContent= this.RangeInputA.value;
        // console.log(this.selectApport.selectedIndex);
        var percent = (this.RangeInputA.value - this.RangeInputA.min) / (this.RangeInputA.max - this.RangeInputA.min) * 100;
        this.DisplayA.style.left = percent + '%';
        
        this.updateInfoMonthly(this.selectApport.selectedIndex,0);       
        
    }
    updateInfoMonthly(indice="default",ind="default") {
        if(indice!=="default"){
            this.selectMonthly.selectedIndex=indice;
        }                                   
        this.RangeInputM.value=parseFloat(this.selectMonthly.value.replace(/\s/g, ''));        
        this.DisplayM.textContent= this.RangeInputM.value;
        
        var percent = (this.RangeInputM.value - this.RangeInputM.min) / (this.RangeInputM.max - this.RangeInputM.min) * 100;
        this.DisplayM.style.left = percent + '%';

        if(ind==="default"){
            this.selectApport.selectedIndex=this.selectMonthly.selectedIndex;   
            this.RangeInputA.value = this.selectApport.value;
            this.DisplayA.textContent= this.RangeInputA.value;
            // console.log(this.selectApport.selectedIndex);
            var percent = (this.RangeInputA.value - this.RangeInputA.min) / (this.RangeInputA.max - this.RangeInputA.min) * 100;
            this.DisplayA.style.left = percent + '%';        
        }                  
    }
}

function loadBrand() {
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'brand' },
        success: function (data) {
            $("#brand").html(data);
            loadProduct();
        }
    });
}

function loadProduct() {
    const BrandID = $("#brand").val();
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID },
        success: function (data) {
            $("#product").html(data);
            loadTariff();
        }
    });
}




var myTariff = new Tarification();