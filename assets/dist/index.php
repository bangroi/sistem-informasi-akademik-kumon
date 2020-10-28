<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>QR Code Reader - webcodecamjs (https)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<canvas></canvas>
<select style="display: none;"></select>
<button id="btn-play">Play</button>


<!-- partial -->
  <script src='./jquery-2.2.4.min.js'></script>
<script src='./qrcodelib.js'></script>
<script src='./webcodecamjs.js'></script>
<script >  var txt = "innerText" in HTMLElement.prototype ? "innerText" :
  "textContent";
var arg = {
  resultFunction: function(result) {
    var aChild = document.createElement('form');
    aChild[txt] = result.format + ': ' + result.code;
    document.querySelector('body').appendChild(aChild);
    /*alert(aChild[txt]);*/
    console.log(result.code);
    decoder.stop();
    $('#btn-play').html('Play').removeClass('playing');
  }
};
var decoder = new
WebCodeCamJS("canvas").init(arg).buildSelectMenu('select', 1);
setTimeout(function() {
  decoder.play();
  decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg);
}, 500);
$('#btn-play').on('click', function() {
  $(this).toggleClass('playing');
  if ($(this).hasClass('playing')) {
    $(this).html('Stop');
    decoder.play();
  } else {
    $(this).html('Play');
    decoder.stop();
  }
});
</script>

</body>
</html>