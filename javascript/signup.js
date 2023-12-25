//Formulaire crédit personnel ou renouvellable

const form = document.getElementById("formRegister"),
    btnContinue = form.querySelector(".btn-register");
errorText = form.querySelector(".error-text");
successText = document.querySelector(".success-text");
$('#mainPreloader').hide();

form.onsubmit = (e) => {
    e.preventDefault();
}

btnContinue.onclick = () => {
    form.style.pointerEvents = "none";
    $('#mainPreloader').show();
    errorText.style.display = "none";
    form.style.opacity = .5;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./phpMailer/send-verif-mail.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.response.trim();
                if (data === "success") {
                    successText.style.display = "block";
                    $('#mainPreloader').hide();
                } else {
                    setTimeout(function () {
                        $('#mainPreloader').hide();
                        form.style.pointerEvents = "all";
                        form.style.opacity = 1;
                        errorText.style.display = "block";
                        errorText.innerHTML = data;
                        
                    }, 2000);
                }

            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

}

window.addEventListener("load", function () {
    displayPreloader();

});

function displayPreloader() {


    $('#main-register').hide();
    $('#mainPreload').show();
    $('#main-register').removeClass('show');


    setTimeout(function () {
        $('#mainPreload').hide();

        $('#main-register').show();
        $('#main-register').addClass('show');
    }, 1600);


}