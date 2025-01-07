@extends('app.layout-mobile')

@section('content')
<div class="px-4 d-flex fixed-top " style="padding-top: 16px; padding-bottom: 16px;background: #ffffff42;backdrop-filter: blur(5px);">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto">
            arrow_back
        </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        Maps
    </p>
</div>

<div class=" d-flex  justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
    <div id="maps-mobile" style="height: 100%;width:100%"></div>
</div>

@endsection


@push('scripts')
    <script>
        var map = L.map('maps-mobile').setView([-7.9327467, 112.5715631], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([-7.9327467, 112.5715631]).addTo(map)
            .bindPopup('SAKOO Malang')
            .openPopup();


        // Add geolocation functionality
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const userLatLng = [position.coords.latitude, position.coords.longitude];

                // Add a marker at the user's location
                const userMarker = L.marker(userLatLng).addTo(map)
                    .bindPopup("You are here!")
                    .openPopup();

                // Set map view to user's location
                map.setView(userLatLng, 13);

                // Destination coordinates
                const destinationLatLng = [-7.9327467, 112.5715631]; // Example: New York (Empire State Building)

                // Add a marker at the destination
                const destinationMarker = L.marker(destinationLatLng).addTo(map)
                    .bindPopup("Destination: Sakoo Banks");

                // Draw a path between the user and the destination
                const path = L.polyline([userLatLng, destinationLatLng], {
                    color: 'blue',
                    weight: 4,
                    opacity: 0.7,
                }).addTo(map);
            }, (error) => {
                console.error("Geolocation error:", error.message);
                alert("Geolocation not available or permission denied.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    </script>

@endpush
