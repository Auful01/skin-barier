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
        <div class="px-4 mt-4 d-flex ">
            <a href="/mobile/profile">
                <span class="material-symbols-outlined my-auto" >
                    arrow_back
                    </span>
            </a>
        </div>
        <div class="text-center" style="padding-top: 20px">

            <div class="row justify-content-center">
                <div class="col-10">
                    <h1 class="fw-bold my-5 text-start">
                        Edit Profile
                    </h1>
                    <div class="form-group text-start mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group text-start mb-3">
                        <label for="">Age</label>
                        <input type="number" class="form-control"  id="age">
                    </div>
                    <div class="form-group text-start mb-3">
                        <label for="">Gender</label>
                        <select name="" id="gender" class="form-control">
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group text-start mb-3">
                        <label for="">Skin Type</label>
                        <select name="" id="skin-type" class="form-control">
                            <option value=""></option>
                            <option value="dry">Dry</option>
                            <option value="oil">Oil</option>
                            <option value="sensitive">Sensitive</option>
                        </select>
                    </div>



                    <button  class="btn w-100 btn-sm  px-4 py-2 rounded-2  fw-bold text-white" style="background: #eb79bd" id="update-profile">
                        Update Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        $.ajax({
            url: '/api/profile',
            type: 'GET',
            success: function (data) {
                // $("#name").val(data.name)
                $("#age").val(data.age)
                $("#gender").val(data.gender)
                $("#skin-type").val(data.skin_type)
            }
        })


        $('#update-profile').on("click", function () {
            $.ajax({
                url: '/api/profile',
                type: 'POST',
                data: {
                    name: $("#name").val(),
                    age: $("#age").val(),
                    gender: $("#gender").val(),
                    skin_type: $("#skin-type").val()
                },
                success: function (data) {
                    swal({
                        title: "Success",
                        text: data.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(() => {
                        window.location.href = '/mobile/profile'
                    }, 1500)
                }
            })
        })
    </script>
@endpush
