function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
}
window.addEventListener('load', function () {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(siteUrl+'/pwa-sw.js')
            .then(function (registration) {
                //console.log('Registration successful, scope is:', registration.scope);
            })
            .catch(function (error) {                
                //console.log('Service worker registration failed, error:', error);
            });
    }
})

window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    myFunction();
});

// Detects if device is on iOS 
const isIos = () => {
    const userAgent = window.navigator.userAgent.toLowerCase();
    return /iphone|ipad|ipod/.test( userAgent );
}
// Detects if device is in standalone mode
const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);

// Checks if should display install popup notification:
if (isIos() && !isInStandaloneMode()) {    
    // myFunction();
    // this.setState({ showInstallMessage: true });
}