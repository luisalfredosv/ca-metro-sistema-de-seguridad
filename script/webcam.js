jQuery(document).ready(function($) {

$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

     $('#webcam').click(function () {
     $('#webcam').attr("disabled", true);
  var streaming = false,
      video        = document.querySelector('#video'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#webcam'),
      width = 320,
      height = 0;

  // CODIGO DE CAMARA VIEJO

  // navigator.getMedia = ( navigator.getUserMedia ||
  //                        navigator.webkitGetUserMedia ||
  //                        navigator.mozGetUserMedia ||
  //                        navigator.msGetUserMedia);
  // navigator.getMedia(
  //   {
  //     video: true,
  //     audio: false
  //   },
  //   function(stream) {
  //     if (navigator.mozGetUserMedia) {
  //       video.mozSrcObject = stream;
  //     } else {
  //       var vendorURL = window.URL || window.webkitURL;
  //       video.src = vendorURL.createObjectURL(stream);
  //     }
  //     video.play();
  //   },
  //   function(err) {
  //     console.log("An error occured! " + err);
  //   }
  // );
  // 


if (navigator.getUserMedia) {
            navigator.getUserMedia(
                { 'video': true },
                function(stream)
                {
                    video.src = stream;
                    video.play();
                }
            );
        } else if (navigator.webkitGetUserMedia) {
            navigator.webkitGetUserMedia
            (
                { 'video': true },
                function(stream)
                {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }
            );
        } else if (navigator.mozGetUserMedia) {
            navigator.mozGetUserMedia
            (
                { 'video': true },
                function(stream)
                {
                    video.mozSrcObject = stream;
                    video.play();
                },
                function(err)
                {
                    alert('An error occured! '+err);
                }
            );
        }


  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', 150);
      video.setAttribute('height', 122);
      canvas.setAttribute('width', 150);
      canvas.setAttribute('height', 122);
      streaming = true;
    }
  }, false);
  $('#Capturar').click(function(){
    canvas.width = 150;
    canvas.height = 122;
    canvas.getContext('2d').drawImage(video, 0, 0, 150, 122);
    var data = canvas.toDataURL('image/png');
    Capturar.setAttribute('src', data);
  });
  startbutton.addEventListener('click', function(ev){
      takepicture();
    ev.preventDefault();
  }, false);

    
    
    });
});