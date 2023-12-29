window.addEventListener("load", function () {
    displayPreloader();

});

//Infos personnelle
// const form = document.getElementById("formInfos"),
// btnSend = form.querySelector(".btn-send");
// errorText = form.querySelector(".errors");
// successText = document.getElementById("success-infos");

// form.onsubmit = (e)=>{
//     e.preventDefault();
// }

// btnSend.onclick = ()=>{
//     form.style.pointerEvents="none";
//     $('#mainPreloader').show(); 
//     errorText.style.display = "none";
//     form.style.opacity=.5;
    
//     setTimeout(function () {
//         $('#mainPreloader').hide();  
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "./users/client/save-infos.php", true);
//         xhr.onload = ()=>{
//           if(xhr.readyState === XMLHttpRequest.DONE){
//               if(xhr.status === 200){
                   
//                   let data = xhr.response.trim();                            
//                   if(data === "success"){                                
                    
//                     successText.style.display="block";
//                   }else{   
//                     form.style.pointerEvents="all";
//                     form.style.opacity=1;
//                     errorText.style.display = "block";
//                     errorText.innerHTML = data;
                    
//                   }
//               }
//           }
//         }
//         $('#modalInfo').show();
//         let formData = new FormData(form);
//         xhr.send(formData);      
//     }, 2000);
    

// }

//Justificatifs

const formP = document.getElementById("formPieces"),
btnSendP = formP.querySelector(".btn-send-pieces");
errorTextP = formP.querySelector(".errors");
successTextP = document.getElementById("success-pieces");

formP.onsubmit = (e)=>{
    e.preventDefault();
}

btnSendP.onclick = ()=>{
    formP.style.pointerEvents="none";
    $('#mainPreloaderPieces').show(); 
    errorTextP.style.display = "none";
    formP.style.opacity=.5;
    console.log("cliquer");
    
    setTimeout(function () {
        $('#mainPreloaderPieces').hide();  
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./users/client/save-pieces.php", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                   
                  let data = xhr.response.trim();                            
                  if(data === "success"){                                
                    
                    successTextP.style.display="block";
                  }else{   
                    formP.style.pointerEvents="all";
                    formP.style.opacity=1;
                    errorTextP.style.display = "block";
                    errorTextP.innerHTML = data;
                    
                  }
              }
          }
        }
        $('#modalPieces').show();
        let formData = new FormData(formP);
        xhr.send(formData);      
    }, 2000);
    

}


btnInfo=document.getElementById('infos-perso');
btnInfo.onclick = ()=>{
    loadRegions();
}

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



function displayElement(elt) {
    icone = elt + "-bi";
    if ($(elt).hasClass("active")) {
        $(elt).hide();
        $(elt).removeClass('active');
        $(icone).removeClass('bi-dash');
        $(icone).addClass('bi-plus');

    } else {
        $(elt).show();
        $(elt).addClass('active');
        $(icone).addClass('bi-dash');
        $(icone).removeClass('bi-plus');
    }
}

function displayError() {
    $('.errors').show();
}

function loadRegions() {
    $.ajax({
        url: "users/region_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'region'},
        success: function (data) {
            $("#yourRegion").html(data);
            const RegionID = $("#yourRegion").val();
            $.ajax({
                url: "users/region_retriever.php",
                method: "POST",
                data: {ID_SCRIPT: 'town', ID_REGION: RegionID},
                success: function (data) {
                    $("#yourTown").html(data);                   
                }
            });
        }
    });
}


function loadTowns() {
    const RegionID = $("#yourRegion").val();    
    $.ajax({
        url: "users/region_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'town', ID_REGION: RegionID},
        success: function (data) {
            $("#yourTown").html(data);
        }
    });
}