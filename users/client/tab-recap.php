<div class="col-xl-3">
                <div class="card" id="cardPerso">

                    <h3 class="card-title" style="padding: 2%;  text-align: center; ">Mon
                        récapitulatif</h3>
                    <div class="error-text"></div>
                    <div class="card-body" style="padding: 1%;">

                        <hr class="hr">

                        <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
                        <form action="#" id="formPerso" method="POST">
                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input
                                        type="text" name="project" readonly class="infoR" value="Personnel"
                                        id="infoProjectP">
                                </li>

                                <li class="list-group-item"><span class="infoL">Montant crédit: </span>
                                    <input type="text" name="amount" readonly id="infoAmountP" value="20000"
                                        class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                        type="text" name="duration" readonly id="infoDurationP" value="24"
                                        class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL">Mensualité (DH) : </span> <input
                                        type="text" name="monthly" readonly id="infoMonthlyP" value="200.25"
                                        class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                                    <input type="text" name="app_fees" value="200" readonly class="infoR" id="infoFDP">
                                </li>

                            </ul><!-- End Clean list group -->
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-outline-success w-100 btn_credit_perso" type="submit"
                                    name="btn_credit_perso">Demander ce crédit </button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card" id="cardAuto">


                    <h3 class="card-title" style="padding: 2%;  text-align: center; ">Mon
                        récapitulatif</h3>
                    <div class="error-text"></div>
                    <div class="card-body" style="padding: 1%;">

                        <hr class="hr">

                        <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
                        <form action="#" method="POST" id="formAuto">
                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                                        : </span> <input type="text" name="tariff_id" readonly id="infoTariffID"
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input
                                        type="text" name="project" readonly class="infoR" value="Auto">
                                </li>
                                <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input type="text"
                                        name="amount" readonly id="infoAmount" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                        type="text" name="duration" readonly id="infoDuration" class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text"
                                        name="monthly" readonly id="infoMonthly" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                                    <input type="text" name="app_fees" readonly class="infoR" id="infoFD">
                                </li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" name="down_pmt" readonly id="infoApport" class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%) : </span> <input type="text" name="down_pmt_perc" readonly
                                        id="infoApportPerc" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                        name="adi" readonly id="infoADI" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                        type="text" name="cost_ex_adi" readonly id="infoCHAD" class="infoR">
                                </li>

                            </ul><!-- End Clean list group -->
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-outline-success w-100 btn_credit_auto" type="submit"
                                    name="btn_credit_auto" id="btn_credit_auto">Demander ce crédit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<script>
    
//Formulaire crédit personnel ou renouvellable

const formP = document.getElementById("formPerso"),
btnCreditPerso = formP.querySelector(".btn_credit_perso");
errorText = formP.querySelector(".error-text");

formP.onsubmit = (e)=>{
    e.preventDefault();
}

btnCreditPerso.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "users/client/save-credit.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response.trim();     
              console.log(data);
              if(data === "success"){
                location.href="signup";
                
              }else{   
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(formP);
    xhr.send(formData);
}

//Formulaire crédit auto

const form = document.getElementById("formAuto"),
btnCreditAuto = form.querySelector(".btn_credit_auto");
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

btnCreditAuto.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "users/client/save-credit.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response.trim();    
              console.log(data);                        
              if(data === "success"){
                location.href="signup";
                
              }else{   
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


</script>