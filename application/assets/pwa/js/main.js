window.onload = () => {
  'use strict';

  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
             .register('http://localhost/web_pago_facil/application/assets/pwa/sw.js');
  }
}
window.addEventListener('offline', function(e) {
  // queue up events for server
  console.log("You are offline");
  alert("esta sin internet porfavor activar sus megas");
  Page.showOfflineWarning();
}, false);