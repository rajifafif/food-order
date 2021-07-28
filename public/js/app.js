if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register('js/sw.js')
        .then(registration => {
            console.log('Registration success')
            console.log(registration);
        }).catch(error => {
            console.log(error);
        })
} else {
    alert('Application Not Supported');
}
