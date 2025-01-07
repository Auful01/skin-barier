@extends('app.layout-mobile')

@section('content')

    <style>

        /* .bg-login-green {
            background-color: #c4d581;
            min-height: 800px;
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

        <div class="text-center" style="padding-top: 60px">

            <div class="bg-login-green">

            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <h1 class="fw-bold my-5 text-start">
                        Sign Up
                    </h1>
                    <div class="form-group text-start">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="name">
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email">
                    </div>

                    <div class="form-group text-start mt-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="username">
                    </div>

                    <div class="form-group text-start my-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control " placeholder="Password" id="password">
                    </div>

                    <button id="login" class="btn w-100 btn-sm text-white px-4 py-2 rounded-3 shadow mt-5 fw-bold" style="background: #eb79bd">
                        Sign Up
                    </button>

                    <a href="/mobile/login">
                        <p class="mt-4">
                            Already have an account? Sign In
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>

        $('#login').on("click", function () {
            $.ajax({
                url: '/api/register',
                type: 'POST',
                data: {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    username: $("#username").val(),
                    password: $("#password").val(),
                    role: 'user'
                },
                success: function (data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        })

                        setTimeout(() => {
                            window.location.href = '/mobile/login'
                        }, 1500)
                    } else {
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        })
    </script>
@endpush
