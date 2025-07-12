@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Tracking Lokasi</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Peta lokasi real-time</span>
                </h3>
            </div>
            <div class="card-body">
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <script>
        let map = L.map('map').setView([-1.6429, 102.256], 13); // koordinat awal (ubah sesuai kebutuhan)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([-1.6429, 102.256])
            .addTo(map)
            .bindPopup("Memuat data lokasi..."); // default popup awal

        function updateLocation() {
            fetch('{{ route("lokasi.real-time") }}') // endpoint yang kamu buat di backend
                .then(data => {
                console.log(data); // Tambahkan ini dulu untuk debugging

                const lat = data.latitude;
                const lng = data.longitude;

                if (lat && lng) {
                    marker.setLatLng([lat, lng]);
                    map.setView([lat, lng], 15);

                    marker.bindPopup(`
                        <strong>Detail Lokasi:</strong><br>
                        Latitude: ${lat}<br>
                        Longitude: ${lng}<br>
                        Info: ${data.detail || 'Tidak ada detail'}
                    `);
                } else {
                    console.warn("Latitude atau Longitude tidak valid:", lat, lng);
                }
            })
        }

        // Update tiap 5 detik
        setInterval(updateLocation, 5000);
        updateLocation(); // panggil pertama kali
    </script>
@endsection
