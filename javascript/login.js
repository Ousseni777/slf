const form = document.getElementById("loginForm"),
    btnSend = form.querySelector(".btn-connect"),
    errorText = form.querySelector(".error-text");    

form.onsubmit = (e) => {
    e.preventDefault();
};

btnSend.onclick = () => {
    // form.style.pointerEvents = "none";
    $('#mainPreloader').show();
    errorText.style.display = "none";
    form.style.opacity = 0.5;

    setTimeout(function () {
        $('#mainPreloader').hide();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./users/connectRequest.php", true);        

        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // console.log(xhr.responseText);
                    let responseData = JSON.parse(xhr.responseText);

                    if (responseData.status === "success") {
                        if (responseData.message === "CLIENT"){
                            location.href = "sim-fx?tag=fx";
                        }else if (responseData.message === "CLIENT"){
                            location.href = "sim-cl?tag=chrono";
                        }else{
                            location.href = "sim-fx?tag=fx";
                        }
                        
                    } else {
                        form.style.pointerEvents = "all";
                        form.style.opacity = 1;
                        errorText.style.display = "block";
                        errorText.innerHTML = responseData.message;
                    }
                }
            }
        };

        let formData = new FormData(form);
        xhr.send(formData);
    }, 2000);
};
