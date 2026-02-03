<?php \Core\Vue::extends('layouts.principal'); ?>
<main class="min-h-screen bg-gradient-to-b from-[#faf8f3] via-white to-[#f8f4ed] dark:from-[#0f0f0f] dark:via-[#1a1a1a] dark:to-[#0a0a0a]">
    <div class="max-w-[1400px] mx-auto px-4 md:px-8 lg:px-12 py-12 md:py-20">
        <!-- Hero Section -->
        <div class="mb-12 md:mb-20 animate__bounceIn">
            <div class="relative">
                <!-- Gradient Background Blobs -->
                <div class="absolute -top-32 -left-32 w-96 h-96 bg-primary/15 rounded-full blur-3xl hidden lg:block"></div>
                <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-green-500/10 rounded-full blur-3xl hidden lg:block"></div>

                <div class="relative flex flex-col md:flex-row justify-between items-start md:items-end gap-6 md:gap-8">
                    <div class="flex flex-col gap-6 animate__slideInLeft">
                        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-primary/10 to-green-500/10 px-4 py-2 rounded-full border border-primary/30 w-fit animate__fadeInDown">
                            <span class="material-symbols-outlined text-primary text-lg">location_on</span>
                            <span class="text-primary font-bold tracking-widest uppercase text-xs">Localisation</span>
                        </div>
                        <div>
                            <h1 class="text-slate-900 dark:text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-[-0.033em] mb-4 animate__flipInX">
                                Nous <span class="bg-gradient-to-r from-primary via-green-500 to-emerald-600 bg-clip-text text-transparent">Trouver</span>
                            </h1>
                            <p class="text-slate-600 dark:text-slate-300 text-base md:text-lg max-w-2xl leading-relaxed animate__fadeInUp">
                                Découvrez notre restaurant au cœur de Kinshasa. Utilisez la carte interactive pour tracer votre itinéraire et nous rendre visite.
                            </p>
                        </div>
                    </div>
                    <button onclick="locateUser()" class="group flex items-center justify-center gap-2 rounded-2xl h-12 md:h-14 px-6 md:px-8 bg-gradient-to-r from-primary to-green-500 hover:from-primary/90 hover:to-green-500/90 text-white text-sm font-bold transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-lg whitespace-nowrap animate__lightSpeedInRight">
                        <span class="material-symbols-outlined text-lg group-hover:rotate-45 transition-transform duration-300">my_location</span>
                        <span>Ma Position</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Map Container - Large -->
            <div class="lg:col-span-2 h-[400px] md:h-[500px] lg:h-[650px] animate__zoomIn">
                <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl border border-white/50 dark:border-white/10 group">
                    <!-- Leaflet Map -->
                    <div id="map" class="w-full h-full"></div>

                    <!-- Search Bar -->
                    <div class="absolute top-4 left-4 right-4 md:top-6 md:left-6 z-20 md:right-auto md:w-80 animate__fadeInDown">
                        <label class="flex items-stretch bg-white dark:bg-slate-900 rounded-2xl h-12 md:h-14 shadow-xl hover:shadow-2xl transition-all duration-300 border border-primary/30 dark:border-primary/20 backdrop-blur-md bg-white/98 dark:bg-slate-900/98">
                            <div class="flex items-center justify-center pl-4 text-primary">
                                <span class="material-symbols-outlined text-xl">search</span>
                            </div>
                            <input id="searchInput" class="w-full bg-transparent border-none focus:ring-0 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 px-3 md:px-4 text-sm md:text-base font-medium" placeholder="Chercher un lieu..." />
                        </label>
                    </div>

                    <!-- Map Controls - Bottom Right -->
                    <div class="absolute bottom-4 right-4 md:bottom-6 md:right-6 flex flex-col gap-2 z-20 animate__bounceIn">
                        <!-- Zoom Controls -->
                        <div class="flex flex-col gap-1 bg-white dark:bg-slate-900 rounded-xl shadow-lg overflow-hidden border border-primary/20 dark:border-white/10 backdrop-blur-md">
                            <button id="zoomIn" class="p-2 md:p-3 hover:bg-primary/10 dark:hover:bg-white/10 text-slate-900 dark:text-white transition-all duration-200 hover:text-primary active:scale-95 animate__fadeInRight">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                            <div class="h-px bg-slate-200 dark:bg-white/10"></div>
                            <button id="zoomOut" class="p-2 md:p-3 hover:bg-primary/10 dark:hover:bg-white/10 text-slate-900 dark:text-white transition-all duration-200 hover:text-primary active:scale-95 animate__fadeInRight">
                                <span class="material-symbols-outlined">remove</span>
                            </button>
                        </div>

                        <!-- Geolocate Button -->
                        <button id="geolocate" class="p-3 md:p-4 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 active:scale-95 font-bold animate__pulse">
                            <span class="material-symbols-outlined">near_me</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-4 md:space-y-6 animate__slideInLeft">
                <!-- Restaurant Info Card -->
                <div class="bg-gradient-to-br from-white to-slate-50 dark:from-slate-800/50 dark:to-slate-900/50 rounded-3xl p-6 md:p-8 shadow-lg border border-white/50 dark:border-white/10 backdrop-blur-sm animate__bounceIn">
                    <div class="flex items-center gap-3 mb-6 animate__flipInX">
                        <div class="p-3 bg-gradient-to-br from-primary/20 to-green-500/20 rounded-2xl">
                            <span class="material-symbols-outlined text-primary text-2xl">restaurant</span>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white"><?= env('RESTAURANT_NAME', 'Limoncello') ?></h3>
                    </div>

                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex gap-3 animate__fadeInLeft">
                            <span class="text-primary font-bold text-lg">📍</span>
                            <div>
                                <p class="text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase">Adresse</p>
                                <p class="text-slate-900 dark:text-white font-semibold"><?= env('RESTAURANT_ADDRESS', 'Gombe, Kinshasa') ?></p>
                            </div>
                        </div>

                        <!-- Coordinates -->
                        <div class="flex gap-3 animate__fadeInUp">
                            <span class="text-primary font-bold text-lg">🧭</span>
                            <div>
                                <p class="text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase">Coordonnées</p>
                                <p class="text-slate-900 dark:text-white font-mono text-sm">
                                    <?= env('MAP_LAT', '-4.2634') ?><br>
                                    <?= env('MAP_LNG', '15.2429') ?>
                                </p>
                            </div>
                        </div>

                        <!-- Distance Display -->
                        <div id="distanceDisplay" class="hidden flex gap-3">
                            <span class="text-primary font-bold text-lg">📏</span>
                            <div>
                                <p class="text-xs font-semibold text-slate-600 dark:text-slate-400 uppercase">Distance</p>
                                <p id="distanceValue" class="text-slate-900 dark:text-white font-bold text-lg">--</p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="pt-4 space-y-2">
                            <a href="https://www.google.com/maps/search/<?= env('MAP_LAT', '-4.2634') ?>,<?= env('MAP_LNG', '15.2429') ?>" target="_blank" class="flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105">
                                <span class="material-symbols-outlined">open_in_new</span>
                                Google Maps
                            </a>
                            <button onclick="traceRoute()" class="flex items-center justify-center gap-2 w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105">
                                <span class="material-symbols-outlined">route</span>
                                Itinéraire
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hours Card -->
                <div class="bg-gradient-to-br from-white to-slate-50 dark:from-slate-800/50 dark:to-slate-900/50 rounded-3xl p-6 md:p-8 shadow-lg border border-white/50 dark:border-white/10 backdrop-blur-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">schedule</span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Horaires</h3>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">Lun - Ven</span>
                            <span class="font-bold text-slate-900 dark:text-white">12:00 - 23:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">Samedi</span>
                            <span class="font-bold text-slate-900 dark:text-white">12:00 - 00:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600 dark:text-slate-400">Dimanche</span>
                            <span class="font-bold text-slate-900 dark:text-white">11:00 - 22:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    .custom-div-icon {
        background: transparent !important;
        border: none !important;
    }

    .leaflet-popup-content {
        font-family: inherit !important;
    }

    .leaflet-popup-content-wrapper {
        border-radius: 1rem !important;
        backdrop-filter: blur(10px) !important;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.2);
            opacity: 0.7;
        }
    }

    @keyframes ping {

        75%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.5);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes expandMap {
        from {
            transform: scale(0.8);
        }

        to {
            transform: scale(1);
        }
    }

    .leaflet-marker-icon.zoom-in {
        animation: zoomIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    #map.expand-animation {
        animation: expandMap 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }
</style>

<script>
    const mapLat = parseFloat('<?= env("MAP_LAT", "-4.304908") ?>');
    const mapLng = parseFloat('<?= env("MAP_LNG", "15.314852") ?>');
    const restaurantName = '<?= env("RESTAURANT_NAME", "Limoncello") ?>';
    const restaurantAddress = '<?= env("RESTAURANT_ADDRESS", "Gombe, Kinshasa") ?>';

    let map, userMarker, watchId = null;

    function initMap() {
        map = L.map('map', {
            center: [mapLat, mapLng],
            zoom: 15,
            zoomControl: false,
            fadeAnimation: true
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap',
            maxZoom: 19
        }).addTo(map);

        // Restaurant marker
        const restaurantIcon = L.divIcon({
            html: `<div class="relative w-12 h-12 flex items-center justify-center">
                <div class="absolute inset-0 bg-green-400 rounded-full animate-ping" style="animation-duration: 2s;"></div>
                <div class="relative bg-gradient-to-br from-green-500 to-emerald-600 w-10 h-10 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                    <span class="material-symbols-outlined text-white text-xl">restaurant</span>
                </div>
            </div>`,
            className: 'custom-div-icon',
            iconSize: [48, 48],
            iconAnchor: [24, 24]
        });

        L.marker([mapLat, mapLng], {
                icon: restaurantIcon
            })
            .bindPopup(`<div class="p-3"><h3 class="font-bold text-lg">${restaurantName}</h3><p class="text-sm text-slate-600">${restaurantAddress}</p></div>`)
            .addTo(map);

        // Zoom controls
        document.getElementById('zoomIn').addEventListener('click', () => map.zoomIn());
        document.getElementById('zoomOut').addEventListener('click', () => map.zoomOut());
    }

    function locateUser() {
        if (!navigator.geolocation) {
            alert('Géolocalisation non supportée');
            return;
        }

        // Ajouter animation d'expansion à la carte
        const mapElement = document.getElementById('map');
        mapElement.classList.add('expand-animation');

        navigator.geolocation.getCurrentPosition(position => {
            const {
                latitude,
                longitude
            } = position.coords;

            if (userMarker) map.removeLayer(userMarker);

            const userIcon = L.divIcon({
                html: `<div class="relative w-10 h-10 flex items-center justify-center">
                    <div class="absolute inset-0 bg-blue-400 rounded-full animate-pulse"></div>
                    <div class="relative bg-blue-500 w-8 h-8 rounded-full shadow-lg border-2 border-white flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-sm">person</span>
                    </div>
                </div>`,
                className: 'custom-div-icon',
                iconSize: [40, 40],
                iconAnchor: [20, 20]
            });

            // Créer le marqueur avec animation de zoom
            userMarker = L.marker([latitude, longitude], {
                icon: userIcon
            }).addTo(map);

            // Ajouter animation au marqueur
            setTimeout(() => {
                const markerElement = userMarker.getElement();
                if (markerElement) {
                    markerElement.classList.add('zoom-in');
                }
            }, 100);

            // Animation du zoom fluide
            const currentZoom = map.getZoom();
            let step = 0;
            const maxSteps = 15;
            const targetZoom = 16;
            const targetLat = latitude;
            const targetLng = longitude;

            const zoomInterval = setInterval(() => {
                step++;
                const progress = step / maxSteps;
                const easeProgress = progress < 0.5 ?
                    2 * progress * progress :
                    -1 + (4 - 2 * progress) * progress;

                const newZoom = currentZoom + (targetZoom - currentZoom) * easeProgress;
                map.setZoom(newZoom, {
                    animate: false
                });

                const currentCenter = map.getCenter();
                const newLat = currentCenter.lat + (targetLat - currentCenter.lat) * easeProgress;
                const newLng = currentCenter.lng + (targetLng - currentCenter.lng) * easeProgress;

                map.setView([newLat, newLng], newZoom, {
                    animate: false
                });

                if (step >= maxSteps) {
                    clearInterval(zoomInterval);
                    map.setView([latitude, longitude], targetZoom, {
                        animate: true
                    });
                }
            }, 30);

            document.getElementById('distanceDisplay').classList.remove('hidden');
            const distance = map.distance([mapLat, mapLng], [latitude, longitude]) / 1000;
            document.getElementById('distanceValue').textContent = distance.toFixed(2) + ' km';

            // Ajouter une animation de pulse au bouton
            const geoBtn = document.getElementById('geolocate');
            geoBtn.style.transform = 'scale(1.1)';
            setTimeout(() => {
                geoBtn.style.transition = 'transform 0.3s ease-out';
                geoBtn.style.transform = 'scale(1)';
            }, 100);
        });
    }

    function traceRoute() {
        if (!userMarker) {
            alert('Veuillez d\'abord localiser votre position');
            return;
        }
    }

    window.addEventListener('load', initMap);
</script>