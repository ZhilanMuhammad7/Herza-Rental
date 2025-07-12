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
            <div>
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var map = L.map('map').setView([-0.7893, 113.9213], 5); // Default center Indonesia

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var carIcon = L.icon({
            iconUrl: '/admin/image/mb-2.png', // ganti sesuai path icon mu
            iconSize: [42, 50],
        });

        var markersLayer = L.layerGroup().addTo(map);

        function loadGpsData() {
            axios.get('/gps-data')
                .then(function (response) {
                    var locations = response.data;

                    // Clear existing markers
                    markersLayer.clearLayers();

                    locations.forEach(function (loc) {
                        if (loc.lat && loc.lon) {
                            var marker = L.marker([loc.lat, loc.lon], {
                                icon: carIcon
                            });

                            var popupContent =
                                "<b>" + loc.unit_name + "</b><br>" +
                                "Event: " + loc.event_type + "<br>" +
                                "Waktu: " + loc.created_at + "<br>" +
                                "Lokasi: Loading..."; // default text

                            marker.bindPopup(popupContent);

                            // Buka popup saat hover
                            marker.on('mouseover', function (e) {
                                this.openPopup();

                                // Jika address null, ambil via Nominatim
                                if (!loc.address) {
                                    axios.get('https://nominatim.openstreetmap.org/reverse', {
                                        params: {
                                            format: 'json',
                                            lat: loc.lat,
                                            lon: loc.lon
                                        }
                                    })
                                        .then(function (response) {
                                            var displayName = response.data.display_name;

                                            // Update popup content dengan address terbaru
                                            marker.setPopupContent(
                                                "<b>" + loc.unit_name + "</b><br>" +
                                                "Event: " + loc.event_type + "<br>" +
                                                "Waktu: " + loc.created_at + "<br>" +
                                                "Lokasi: " + displayName
                                            );
                                        })
                                        .catch(function (error) {
                                            console.error('Gagal mengambil alamat:', error);
                                        });
                                }
                            });

                            marker.on('mouseout', function (e) {
                                this.closePopup();
                            });

                            marker.addTo(markersLayer);
                        }
                    });
                })
                .catch(function (error) {
                    console.error('Gagal mengambil data GPS:', error);
                });
        }

        // Load pertama kali saat page load
        loadGpsData();

        // Refresh setiap 1 menit (60000 ms)
        setInterval(loadGpsData, 60000);
    </script>
@endsection