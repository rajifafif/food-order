self.addEventListener("install", e => {
    //Caching Files
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll([
                "/",
                "/dashboard",
                "/vendor/adminlte/dist/js/adminlte.min.js",
                "/vendor/bootstrap/js/bootstrap.bundle.min.js",
                "/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
                "/vendor/jquery/jquery.min.js",
                "/vendor/fontawesome-free/css/all.min.css",
                "/vendor/overlayScrollbars/css/OverlayScrollbars.min.css",
                "/vendor/adminlte/dist/css/adminlte.min.css"
            ])
        })
    )
    console.log('Installed');
})

self.addEventListener("fetch", e => {
    //Get from chace or fetch new
    e.respondWith(
        caches.match(e.request).then(response => {
            return response || fetch(e.request);
        })
    )
})
