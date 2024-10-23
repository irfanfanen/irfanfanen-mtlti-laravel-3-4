@extends('layouts.app')

@section('css')
<style>
    #map {
        height: 600px;
        width: 100%;
    }
    .emoji-icon {
        font-size: 24px;
        text-align: center;
    }
    .leaflet-routing-container {
        display: none !important; 
    }
</style>
@endsection

@section('content')
    <div id="map"></div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi peta di pusat Jakarta
        const map = L.map('map').setView([-6.2088, 106.8456], 11);

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);

        // Ikon custom untuk status excavator dan proyek
        const icons = {
            active: L.icon({
                iconUrl: 'images/active.png', 
                iconSize: [24, 24],
                iconAnchor: [12, 24],
                popupAnchor: [1, -24],
            }),
            inactive: L.icon({
                iconUrl: 'images/inactive.png', 
                iconSize: [24, 24],
                iconAnchor: [12, 24],
                popupAnchor: [1, -24],
            }),
            start: L.icon({
                iconUrl: 'images/start.png', 
                iconSize: [24, 24],
                iconAnchor: [12, 24],
                popupAnchor: [1, -24],
            }),
            completed: L.icon({
                iconUrl: 'images/completed.png', 
                iconSize: [24, 24],
                iconAnchor: [12, 24],
                popupAnchor: [1, -24],
            }),
        };

        // Ambil data excavators dari server (simulasi dengan Laravel)
        const excavators = @json($items);
        const markers = {};

        // Tambahkan marker untuk setiap excavator atau proyek
        excavators.forEach(item => {
            const marker = L.marker([item.latitude, item.longitude], { icon: icons[item.status] })
                .addTo(map)
                .bindPopup(`
                    <b>${item.name}</b><br>
                    Status: ${item.status}<br>
                    Latitude: ${item.latitude}<br>
                    Longitude: ${item.longitude}<br>
                    Note: ${item.note}<br>
                `);

            markers[item.id] = marker;  // Simpan marker untuk update real-time
        });

        // Pilih excavator aktif untuk membuat rute yang mengikuti jalan
        const activeExcavators = excavators.filter(e => e.status === 'active');

        // Tambahkan rute antara excavator aktif menggunakan Leaflet Routing Machine
        if (activeExcavators.length > 1) {
            const waypoints = activeExcavators.map(e => L.latLng(e.latitude, e.longitude));

            L.Routing.control({
                waypoints: waypoints,
                lineOptions: { styles: [{ color: 'red', weight: 4 }] },  // Gaya garis merah
                routeWhileDragging: true,
                createMarker: () => null , // Tidak buat marker tambahan di rute
                show: false,
            }).addTo(map);
        }

        // Pilih excavator dengan status "start" dan "completed"
        const startExcavators = excavators.filter(e => e.status === 'start');
        const completedExcavators = excavators.filter(e => e.status === 'completed');

        // Buat polyline antara excavator dengan status "start" dan "completed"
        if (startExcavators.length > 0) {
            startExcavators.forEach(start => {
                // Ambil setiap completed excavator untuk membuat garis
                completedExcavators.forEach(completed => {
                    const line = L.polyline([
                        [start.latitude, start.longitude],
                        [completed.latitude, completed.longitude]
                    ], {
                        color: 'blue', // Warna garis biru
                        weight: 4
                    }).addTo(map);
                });
            });
        }

        // Zoom peta agar menampilkan semua marker
        const bounds = L.latLngBounds(excavators.map(e => [e.latitude, e.longitude]));
        map.fitBounds(bounds);
    });
</script>
@endsection