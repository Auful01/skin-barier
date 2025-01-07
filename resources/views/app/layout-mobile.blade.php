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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
/*
    body {
        background-color: #dd4470;
    } */

    body {
        font-family: 'Poppins', sans-serif;
        /* background-color: #dd4470; */
    }

    td{
        border: none;
    }



     /* .bottom-navbar{
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 70px;
        display: flex;
        justify-content: space-around;
        align-items: center;
     } */

     a{
            text-decoration: none;
     }

     .bottom-navbar {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #eb79bd;
        display: flex;
        justify-content: space-around; /* Evenly space items */
        align-items: center;
        padding: 10px 0; /* Add vertical padding */
        z-index: 1000; /* Ensure it's above other elements */
    }

    .bottom-navbar a {
        text-decoration: none;
    }

    .content{
        padding-bottom: 80px;
        min-height: 100%;
    }

    /* .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    } */
</style>
<body >
    <div class="content">
        @yield('content')
    </div>


    @if (Request::segment(2) != "sign-in" && Request::segment(2) != "register" &&Request::segment(2) != "login" )

    <div class="bottom-navbar">
        <a href="/mobile/result" class="btn btn-sm w-20 px-4 ">
            <span class="material-symbols-outlined" style="font-size: 36px;color:#fff">
                dermatology
            </span>
        </a>
        <a href="/mobile/dashboard" class="btn btn-sm w-20 px-4 ">
            <span class="material-symbols-outlined" style="font-size: 36px;color:#fff">
                home
            </span>
        </a>
        <a href="/mobile/recommendation" class="btn btn-sm w-20 px-4 ">
            <span class="material-symbols-outlined" style="font-size: 36px;color:#fff">
                water_drop
                </span>
        </a>
    </div>
    @endif



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
