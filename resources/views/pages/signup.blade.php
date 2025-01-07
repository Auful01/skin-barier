@extends('app.layout')

@section('content')

<div class="container d-flex justify-content-center" style="max-width: 50%;flex-direction: column;height: 100vh;">
    <h1 class="fw-bold text-center mb-5">SIGN UP</h1>

    <div class="row d-flex">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control cstm-form" placeholder="First Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control cstm-form" placeholder="Last Name">
            </div>
        </div>
    </div>
    <div class="form-group mt-4">
        <input type="email" class="form-control cstm-form" placeholder="Email">
    </div>
    <div class="form-group mt-4">
        <input type="text" class="form-control cstm-form" placeholder="Username">
    </div>
    <div class="form-group mt-4">
        <input type="password" class="form-control cstm-form" placeholder="Password">
    </div>

    <div class="row d-flex mt-4">
        <div class="col-6">
            <button class="btn bt-secondary w-100">
                <a href="login" class="text-white">Back</a>
            </button>
        </div>
        <div class="col-6">
            <button class="btn bt-accent w-100">
                <a href="#" class="text-white">Submit</a>
            </button>
        </div>
    </div>
</div>
@endsection
