@extends('app.layout')


@section('content')

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">SAKOO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item my-auto">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#service">Service</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#categories">Category</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#catalogue">Catalogue</a>
            </li>
                {{-- <li class="nav-item my-auto">
                    <a class="nav-link" href="#About">Pricing</a>
                </li> --}}
            <li class="nav-item my-auto">
                <button class="btn btn-sm bt-primary rounded-5 px-4">
                    <a class="nav-link text-white" href="/login">Login</a>
                </button>
                {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
            </li>
            </ul>
        </div>
        </div>
    </nav>

  <section id="welcome" style="background: #dd4470;">
      <div class="container d-flex justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
        <h3>Welcome to the</h3>
        <h1 style="font-size: 50pt" class="fw-bold">SAKOO</h1>
        <h3>Turn Trash into Treasure</h3>
    </div>
  </section>

  <section id="home" style="background: #dd4470;">
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
  </section>

    <section id="about" style="background: #fff;">
        <div class="container d-flex justify-content-center align-items-center  txt-primary" style="height: 100vh; flex-direction: column;">
            <h1 class="text-center py-5">ABOUT US</h1>
            <div class="row d-flex">
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                </div>
                <div class="col-md-8">
                    <p class="txt-secondary">Sakoo is derived from the Indonesian phrase SAMPAH KU means “my waste.” It’s an AI-powered smart waste management system that simplifies waste sorting, collection, and recycling in public spaces.</p>
                    <button class="btn btn-sm bt-primary px-4 rounded-4" >
                        Learn More
                    </button>
                </div>
            </div>
            {{-- <div class="row d-flex justify-content-center">
                <div class="col text-center">
                    <img src="https://via.placeholder.com/150" alt="">
                    <h3 class="mt-4">Our Vision</h3>
                    <p class="txt-secondary">Our vision is to create a sustainable environment by reducing the amount of waste that goes to landfill.</p>
                </div>
                <div class="col text-center">
                    <img src="https://via.placeholder.com/150" alt="">
                    <h3 class="mt-4">Our Mission</h3>
                    <p class="txt-secondary">Our mission is to provide a smart waste management system that is easy to use and helps people recycle more.</p>
                </div>
                <div class="col text-center">
                    <img src="https://via.placeholder.com/150" alt="">
                    <h3 class="mt-4">Our Values</h3>
                    <p class="txt-secondary">Our values are to be innovative, sustainable and customer-focused.</p>
                </div>
            </div> --}}
        </div>
    </section>

    <section>
        <div class="container d-flex  justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Sakoo Founders</h1>
                <h3 class="txt-accent">
                    Meet the crew that brought SAKOO to Your Fingertips!
                </h3>
            </div>
            <div class="row d-flex justify-content-center txt-primary">
                <div class="col-md-3 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">Kayla</h3>
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">Mayra</h3>
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">Kayla</h3>
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">Cinta</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="container d-flex  justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Our Service</h1>
            </div>
            <div class="row d-flex justify-content-center txt-primary">
                <div class="col-md-6 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">Application</h3>
                    <p>
                        Apps shows location of nearby sakoo-bank, track their waste managements, and monitor the points which can be redeemed for goods at Sakoo vending machines.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://via.placeholder.com/200" alt="">
                    <h3 class="mt-4">SAKOO-BANK</h3>
                    <p>
                        An AI-powered waste-sorting machine for public spaces that uses advanced sensors to automatically identify and sort waste. Users can exchange their earned points for goods in Sakoo bank
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="location">
        <div class="container d-flex  justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
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
