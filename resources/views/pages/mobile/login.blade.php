@extends('app.layout-mobile')

@section('content')

    <style>

        .bg-login-green {
            background-color: #c4d581;
            height: 360px;
            width: 100%;
            position: absolute;
            bottom: 0;
            /* right: ; */
            z-index: -1;
            border-radius: 35% 35% 0 0;
        }
    </style>

    <div style="overflow: hidden">
        <div class="text-center" style="padding-top: 350px">
            <p>
                Welcome to
            </p>
            <h1 class="fw-bold">
                SAKOO
            </h1>
            <p>
                Turn trash into treasure
            </p>

            <div>
                <img src="{{asset('images/login/sakoo.png')}}" style="max-height: 150px;" alt="">
            </div>

            <div class="bg-login-green">

            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <a href="/mobile/sign-in" class="btn btn-sm btn-primary mb-3 mt-5 rounded-5 w-100">
                        Login
                    </a>
                    <a href="/mobile/sign-up" class="btn btn-sm btn-primary rounded-5 w-100">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
