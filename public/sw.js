self.addEventListener('install', function (e) {
    console.log('Service Worker Installed');
});

self.addEventListener('fetch', function (event) {
    event.respondWith(fetch(event.request));
});

const CACHE_NAME = 'laravel-pwa-v1';

// file penting yang dicache pertama kali
const urlsToCache = [
    '/',
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/icons/icon-192.png',
];

// INSTALL → simpan cache awal
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Cache opened');
                return cache.addAll(urlsToCache);
            })
    );
});

// ACTIVATE → hapus cache lama
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        })
    );
});

// FETCH → handle request
self.addEventListener('fetch', event => {
    event.respondWith(
        fetch(event.request)
            .then(response => {
                // simpan response ke cache
                return caches.open(CACHE_NAME).then(cache => {
                    cache.put(event.request, response.clone());
                    return response;
                });
            })
            .catch(() => {
                // kalau offline → ambil dari cache
                return caches.match(event.request)
                    .then(response => {
                        return response || caches.match('/offline');
                    });
            })
    );
});