<style>
    .spinner-pieces {
        position: absolute;
        z-index: 1;
        left: 48%;
        top: 45%;
        display: none;
    }
</style>
<div class="col-xl-3">
    <?php include "./users/client/recap-credit-perso.php" ?>
    <?php include "./users/client/recap-credit-auto.php" ?>
</div>

<div class="modal fade mt-5" id="feedbackModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row modal-header" style="text-align: center;">
                <i class="col-12 bi bi-check-circle" style="font-size: 100px;"></i>
                <div class="col-12">
                    <div class="row">
                        <p class="info-dialog" id="successMessage"> </p>
                    </div>

                    <a href="./sim-cl?tag=chrono" class="btn btn-secondary" id="back">OK</a>

                </div>

            </div>


        </div>
    </div>
</div>


<script>

    //Formulaire crédit personnel ou renouvellable

    const formP = document.getElementById("formPerso"),
        btnCreditPerso = formP.querySelector(".btn-credit-perso"),
        errorTextP = formP.querySelector(".error-text");

    formP.onsubmit = (e) => {
        e.preventDefault();
    }

    btnCreditPerso.onclick = () => {
        formP.style.pointerEvents = "none";
        $('#preloaderCreditPerso').show();
        errorTextP.style.display = "none";
        formP.style.opacity = .5;
        setTimeout(function () {
            $('#preloaderCreditPerso').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "users/client/save-credit.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let responseData = JSON.parse(xhr.responseText);
                        let data = responseData.status.trim();
                        if (data === "success") {
                            $("#successMessage").html(responseData.message);
                            $("#feedbackModal").modal("show");

                        } else {
                            errorTextP.style.display = "block";
                            errorTextP.textContent = data;
                        }
                    }
                }
            }
            let formData = new FormData(formP);
            xhr.send(formData);
        }, 2000);
    }

    //Formulaire crédit auto

    const form = document.getElementById("formAuto"),
        btnCreditAuto = form.querySelector(".btn-credit-auto"),
        errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    btnCreditAuto.onclick = () => {
        form.style.pointerEvents = "none";
        $('#preloaderCreditAuto').show();
        errorText.style.display = "none";
        form.style.opacity = .5;
        setTimeout(function () {
            $('#preloaderCreditAuto').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "users/client/save-credit.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let responseData = JSON.parse(xhr.responseText);
                        let data = responseData.status.trim();
                        if (data === "success") {
                            $("#successMessage").html(responseData.message);
                            $("#feedbackModal").modal("show");

                        } else {
                            errorText.style.display = "block";
                            errorText.textContent = data;
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }, 2000);
    }


</script>