if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register('sw.js?id=2')
        .then(registration => {
            console.log('Registration success')
            console.log(registration);
        }).catch(error => {
            console.log(error);
        })
} else {
    alert('Application Not Supported');
}


const scannerBtn = document.getElementById('scan-meja');
if ( scannerBtn ) {
    console.log('Button Found')

    scannerBtn.addEventListener('click', function() {
        var constraints = { audio: false, video: { width: 400, height: 320, facingMode: { exact: "environment" } } };
        navigator.mediaDevices.getUserMedia(constraints)
        .then(function(stream) {
            var video = document.querySelector('video');
            video.classList.remove("d-none");
            video.srcObject = stream;
            video.onloadedmetadata = function(e) {
                video.play();
            };
        })
        .catch(function(err) {
        /* handle the error */
        });
    })
}
