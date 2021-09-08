var version = '0.0.1',
    staticCacheName = "pwa-v=" + version,
    filesToCache = [
        '/offline',
        '/css/app.css',
        '/css/welcome.css',
        '/js/analista.js',
        '/js/coordinador_general.js',
        '/js/coordinador.js',
        '/js/curriculo.js',
        '/js/estudiante.js',
        '/js/jefe_control.js',
        '/js/profesor.js',
        '/js/secretaria.js',
        '/js/subdireccion.js',
        '/js/welcome.js',
        '/images/icons/icon-72x72.png',
        '/images/icons/icon-96x96.png',
        '/images/icons/icon-128x128.png',
        '/images/icons/icon-144x144.png',
        '/images/icons/icon-152x152.png',
        '/images/icons/icon-192x192.png',
        '/images/icons/icon-384x384.png',
        '/images/icons/icon-512x512.png',
    ];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        }).then(() => { return self.clients.claim() })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});