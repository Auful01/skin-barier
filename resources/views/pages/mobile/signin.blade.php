@extends('app.layout-mobile')

@section('content')

    <style>

        /* .bg-login-green {
            background-color: #c4d581;
            min-height: 550px;
            width: 100%;
            position: absolute;
            bottom: 0;
            z-index: -1;
            border-radius: 8% 8% 0 0;
        } */
    </style>

    <div style="overflow: hidden">
        {{-- <div class="px-4 mt-4 d-flex ">
            <a href="/mobile/login">
                <span class="material-symbols-outlined my-auto" >
                    arrow_back
                    </span>
            </a>
        </div> --}}
        <div class="text-center" style="padding-top: 200px">

            <div class="bg-login-green">

            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <h1 class="fw-bold my-5 text-start">
                        Sign In
                    </h1>

                    <div class="form-group text-start mt-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control cstm-form" placeholder="Username" id="username">
                    </div>
                    <div class="form-group text-start my-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control  cstm-form" placeholder="Password" id="password">
                    </div>

                    <button id="login" class="btn w-100 btn-sm btn-primary text-white py-2 px-4 rounded-3 shadow mt-3 fw-bold" style="background: #eb79bd">
                        Login
                    </button>

                    <div class="mt-4">
                        <a href="/mobile/register">
                            Dont have an account? Sign Up
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>

        $('#login').on("click", function () {
            $.ajax({
                url: '/api/login',
                type: 'POST',
                data: {
                    username: $("#username").val(),
                    password: $("#password").val()
                },
                success: function (data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(() => {
                            // Set the cookie using a library like js-cookie or the native `document.cookie`
                            const date = new Date();
                            date.setTime(date.getTime() + (data.expires_in * 60 * 60)); // 1 hour in milliseconds
                            document.cookie = `token=${data.access_token}; path=/; expires=${date.toUTCString()};  samesite=Lax; domain=${window.location.hostname}`;

                            window.location.href = "/mobile/dashboard";

                        }, 1500);
                    } else {
                        console.log(data);
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                    swal({
                        title: "Error",
                        text: "Invalid username or password",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        })
    </script>

@endpush
