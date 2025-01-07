@extends('app.layout-mobile')

@section('content')

    <div class="px-4 mt-4 d-flex ">
        <a href="/mobile/dashboard">
            <span class="material-symbols-outlined my-auto" >
                arrow_back
                </span>
        </a>
        <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
            Profile
        </p>
    </div>
    <div class="text-center" style="margin-top: 100px;">

        <div class="d-flex flex-column align-items-center mx-auto mt-5">
            <div class="mb-5 w-50">
                <h1 class="fw-bold">
                   {{Auth::user()->name}}
            </h1>
                <p>
                    {{Auth::user()->email}}
                </p>
            </div>
        </div>

        <div class="card rounded-4 shadow border-0 mx-3 mb-4">
            <div class="card-body rounded-4">
                <table class="table">
                    <tr>
                        <td class="text-start">
                            Gender
                        </td>
                        <td>
                            :
                        </td>
                        <td id="gender">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            Age
                        </td>
                        <td>
                            :
                        </td>
                        <td id="age">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            Skin Type
                        </td>
                        <td>
                            :
                        </td>
                        <td id="skin-type">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            Skin Problem
                        </td>
                        <td>
                            :
                        </td>
                        <td id="skin-problem">
                            -
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <a class="btn btn-sm btn-primary mb-3 rounded-5 w-50" href="/mobile/profile/edit">
            Edit Profile
        </a>
        <a href="/mobile/logout" class="btn btn-sm btn-primary rounded-5 w-50">
            Logout
        </a>
        {{-- <div class="row justify-content-center">
            <div class="col-6">
            </div>
        </div> --}}
    </div>
@endsection


@push('scripts')
    <script>
        $('#edit-profile').on("click", function () {
            // window.location.href = "/mobile/edit-profile";
            swal({
                title: "Coming Soon",
                text: "This feature is coming soon",
                icon: "info",
                button: "OK",
            })
        })

        $.ajax({
            url: '/api/profile',
            type: 'GET',
            success: function (data) {
                // $("#name").val(data.name)
                $("#age").text(data.age)
                $("#gender").text(data.gender)
                $("#skin-type").text(data.skin_type)
            }
        })
    </script>
@endpush
