@extends('app.layout')


@section('content')

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">Skin Barrier</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item my-auto">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#feature">Feature</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#team">Teams</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#location">Location</a>
            </li>
                {{-- <li class="nav-item my-auto">
                    <a class="nav-link" href="#About">Pricing</a>
                </li> --}}
            <li class="nav-item my-auto">
                <button class="btn btn-sm rounded-5 px-4" style="background: #dd4470">
                    <a class="nav-link text-white" href="/admin/login">Login</a>
                </button>
                {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
            </li>
            </ul>
        </div>
        </div>
    </nav>

  <section id="home" style="background: #dd4470;">
      <div class="container d-flex justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
        <h3>Welcome to the</h3>
        <h1 style="font-size: 50pt" class="fw-bold">SKIN BARRIER</h1>
        <h3>AI based Apps with mercury detection sensors</h3>
    </div>
  </section>

  {{-- <section id="home" style="background: #dd4470;">
    <div class="container  d-flex justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
        <div class="row d-flex bg-white p-5 rounded-4 txt-primary">
            <div class="col-md-4">
                Test
            </div>
            <div class="col-md-8">
                Sakoo-bank is AI baseed smart wasted management system for public places that utilize advanced technology to facilitate the sorting, collecting and simplify the recycling.
                <button class="btn btn-sm bt-primary px-4 rounded-4" >
                    Learn More
                </button>
            </div>
        </div>
    </div>
  </section> --}}

    <section id="feature" style="background: #fff;">
        <div class="container d-flex justify-content-center align-items-center  txt-primary" style="height: 100vh; flex-direction: column;">
            <h1 class="text-center py-5">Features</h1>
            {{-- <div class="row d-flex">
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                </div>
                <div class="col-md-8">
                    <p class="txt-secondary">Sakoo is derived from the Indonesian phrase SAMPAH KU means “my waste.” It’s an AI-powered smart waste management system that simplifies waste sorting, collection, and recycling in public spaces.</p>
                    <button class="btn btn-sm bt-primary px-4 rounded-4" >
                        Learn More
                    </button>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center">
                <div class="col text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        familiar_face_and_zone
                    </span>
                    <h3 class="mt-4">Skin Analysis</h3>
                    <p class="txt-secondary">find out the condition of your skin
                        through the sensors contained in this
                        application</p>
                </div>
                <div class="col text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                            photo_camera
                    </span>
                    <h3 class="mt-4">Sensor Tools</h3>
                    <p class="txt-secondary">
                        sensor camera that detects mercury levels, type and condition of the skin barrier
                    </p>
                </div>
                <div class="col text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        dermatology
                </span>

                    <h3 class="mt-4">Skincare Recommendation</h3>
                    <p class="txt-secondary">know what products are
                        suitable for your skin based on
                        sensor results</p>
                </div>
            </div>
        </div>
    </section>

    <section id="team">
        <div class="container d-flex  justify-content-center align-items-center " style="height: 100vh; flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Our Team</h1>
            </div>
            <div class="row d-flex justify-content-center txt-primary">
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Arsy Haffaf</h3>
                    <p>Leader and Researcher</p>
                </div>
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Quenisa Nirbita</h3>
                    <p>Researcher</p>
                </div>
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Allysha Mehlika</h3>
                    <p>Finance</p>
                </div>
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Thalita Syafa</h3>
                    <p>Designer</p>
                </div>
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Alisha Hidayat</h3>
                    <p>Designer</p>
                </div>
                <div class="col-md-3 mb-5 text-center">
                    <span class="material-symbols-outlined" style="font-size: 100px;">
                        account_circle
                    </span>
                    <h3 class="mt-4">Adisa Aira</h3>
                    <p>Equiptment</p>
                </div>
            </div>
        </div>
    </section>

    <section id="location">
        <div class="container d-flex  justify-content-center align-items-center " style="height: 100vh; flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Location</h1>
            </div>
            <div id="map" style="height: 400px;width:100%"></div>
        </div>
    </section>


@endsection

@push('scripts')
    <script>
        var map = L.map('map').setView([-7.9327467, 112.5715631], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([-7.9327467, 112.5715631]).addTo(map)
            .bindPopup('SAKOO Malang')
            .openPopup();
    </script>

@endpush
