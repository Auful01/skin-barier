<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
/*
    body {
        background-color: #dd4470;
    } */
</style>
<body >
    <div class="body-container">
        @if (Request::segment(2) != 'login')

            <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
                <div class="container">
                <a class="navbar-brand" href="#">SB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item my-auto">
                        <a class="nav-link active" aria-current="page" href="/admin/dashboard">Home</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" aria-current="page" href="/admin/user">User</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="/admin/skincare">Skincare</a>
                    </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="/admin/analyze">Analyze</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="/admin/solution">Solution</a>
                        </li>

                        {{-- <li class="nav-item dropdown my-auto">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Transaction
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item my-auto">
                                    <a class="nav-link" href="/admin/user-exchange">Exchange</a>
                                </li>
                                <li class="nav-item my-auto">
                                    <a class="nav-link" href="/admin/user-dispose">Dispose</a>
                                </li>
                            </ul>
                          </li> --}}



                    <li class="nav-item my-auto">
                        <button class="btn btn-sm bt-primary rounded-5 px-4">
                            @if (Auth::check())
                                <a class="nav-link text-white" href="/logout">Logout</a>
                            @else
                                <a class="nav-link text-white" href="/login">Login</a>
                            @endif
                        </button>
                        {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        @endif

        @yield('content')
    </div>

    <div class="mobile-block-message" style="display: none;">
        <h2>Access Restricted</h2>
        <p>This form is not available on mobile devices. Please use a desktop browser.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function swal(params) {
            return Swal.fire({
                icon: params.icon,
                title: params.title,
                text: params.text,
                showConfirmButton: params.showConfirmButton,
                showCancelButton: params.showCancelButton,
                confirmButtonText: params.confirmButtonText,
                cancelButtonText: params.cancelButtonText,
                timer: params.timer,
            });
        }

    </script>
    @stack('scripts')
</body>
</html>
