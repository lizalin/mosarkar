const cacheName = "v1";

// Service worker installing
self.addEventListener('install', e => {
    // console.log('service worker installing');
})

// Service worker activating
self.addEventListener('activate', e => {
    console.log('service worker activate');
    // Remove old caches
    e.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cache => {
                    if(cache !== cacheName) {
                        // console.log('clearing old cache files...');
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// Service worker fetching
self.addEventListener('fetch', e => {
    // console.log('service worker Fetching start');
    e.respondWith(
        fetch(e.request)
        .then(res => {
            //   Make clone of response
            const resClone = res.clone();
            // Open cache
            caches.open(cacheName).then(cache => {
                // Add response to cache
                cache.put(e.request, resClone);
            })
            return res;            
        })
        .catch(err => caches.match(e.request).then(res => res))
    );
});