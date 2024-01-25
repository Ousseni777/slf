<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      /* background-color: black; */
    }

    .main {
      /* background-color: black; */
      width: 90%;
      margin: 24% auto;
      position: relative;
    }

    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 12px;
      outline: none;
      border-radius: 3px;
      background-color: rgba(0, 0, 0, .3);
    }

    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 48px;
      height: 48px;
      z-index: 3;
      position: relative;
    }

    .selector {
      height: 104px;
      width: 48px;
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;

    }

    .selectBtn {
      height: 48px;
      width: 48px;

      background-image: url(assets/img/favicon.png);
      background-size: cover;
      background-position: center;
      border-radius: 50%;

      position: absolute;
      bottom: 0;
    }

    .select-value {
      width: 48px;
      height: 40px;
      position: absolute;
      color: white;
      top: 0;
      background-color: red;
      border-radius: 4px;
      text-align: center;
      line-height: 45px;
      font-size: 20px;
      font-weight: bold;
    }

    .select-value::after {
      content: '';
      border-top: 17px solid purple;
      border-left: 24px solid white;
      border-right: 24px solid white;
      position: absolute;
      bottom: -14px;
      left: 0;

    }

    .progress-bar {
      width: 50%;
      height: 15px;
      background-color: red;
      position: absolute;
      border-radius: 3px;
      top: 7px;
      left: 0;
    }
  </style>
</head>

<body>

  <div class="main">
    <div class="col-lg-12">
      <input type="range" min="0" max="100" step="1" value="50" id="slider-amount" oninput="setSlider(this)" class="slider">
      <div id="selector-slider-amount" class="selector">
        <div class="selectBtn"> </div>
        <div id="select-value-slider-amount" class="select-value"> </div>
      </div>
      <div id="progress-bar-slider-amount" class="progress-bar"></div>
    </div>

  </div>

  <script>



    // let sliders =document.querySelectorAll('.slider');
    // let selectors =document.querySelectorAll('.selector');
    // let selectValues =document.querySelectorAll('.select-value');
    // let progressBars =document.querySelectorAll('.progress-bar');
    let slider = document.getElementById("slider-amount");
    let selectValue = document.getElementById("select-value-slider-amount");
    selectValue.innerHTML = slider.value;

    // slider.oninput = function () {
    //   selector.style.left = this.value + "%";
    //   progressBar.style.width = this.value + "%";
    //   selectValue.innerHTML = this.value;
    // }
    function setSlider(btn) {
      let selectorId= "selector-" + btn.id;
      let progressBarId = "progress-bar-" + btn.id;
      
      let selector = document.getElementById(selectorId);
      let progressBar = document.getElementById(progressBarId);

      selector.style.left = btn.value + "%";
      progressBar.style.width = btn.value + "%";
      selectValue.innerHTML = btn.value;
    }
  </script>
</body>

</html>