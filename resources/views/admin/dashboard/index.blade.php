@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 gx-xl-10">
            <div class="page-heading">
                <h1>Welcome, Owner!</h1>
            </div>
            <div class="col-xxl-12 mb-md-5 mb-xl-12">
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-basket text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $produk }}</div>
                                <div class="fw-semibold text-white">Jumlah Mobil Tersedia</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-cheque text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan }}</div>
                                <div class="fw-semibold text-white">Jumlah Sewa Mobil</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-chart-simple-3 text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total : {{ $cicilan }}</div>
                                <div class="fw-semibold text-white">Jumlah Cicilan Sewa Mobil Belum Lunas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Tracking GPS Map</h2>
            <div id="map"></div>
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
                .then(function(response) {
                    var locations = response.data;

                    // Clear existing markers
                    markersLayer.clearLayers();

                    locations.forEach(function(loc) {
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
                            marker.on('mouseover', function(e) {
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
                                        .then(function(response) {
                                            var displayName = response.data.display_name;

                                            // Update popup content dengan address terbaru
                                            marker.setPopupContent(
                                                "<b>" + loc.unit_name + "</b><br>" +
                                                "Event: " + loc.event_type + "<br>" +
                                                "Waktu: " + loc.created_at + "<br>" +
                                                "Lokasi: " + displayName
                                            );
                                        })
                                        .catch(function(error) {
                                            console.error('Gagal mengambil alamat:', error);
                                        });
                                }
                            });

                            marker.on('mouseout', function(e) {
                                this.closePopup();
                            });

                            marker.addTo(markersLayer);
                        }
                    });
                })
                .catch(function(error) {
                    console.error('Gagal mengambil data GPS:', error);
                });
        }

        // Load pertama kali saat page load
        loadGpsData();

        // Refresh setiap 1 menit (60000 ms)
        setInterval(loadGpsData, 60000);
    </script>
@endsection
