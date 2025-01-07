@extends('app.layout-mobile')

@section('content')
    <div class="content-wrapper">


        <div style="background: #eb79bd;padding-top: 30px;padding-bottom:30px;border-bottom-left-radius: 50px;" class="shadow">
            <table>
                <tr >
                    <td style="width: 100px">
                        <div class="text-center">
                            <a href="/mobile/profile">
                                <span class="material-symbols-outlined" style="color: #fff; font-size: 60px;">
                                    account_circle
                                </span>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="text-white">
                            <h3>Hello, {{Auth::user()->name}}!</h3>
                            <p>{{Auth::user()->email}}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>


        <div class="mx-3" style="margin-top: 30px;">
            <div class="alert alert-info  d-flex">
                <div class="col-3 my-auto text-center">
                    <span class="material-symbols-outlined" style="font-size: 40px;">
                        info
                    </span>
                </div>
                <div class="col-9 text-start">
                    With our AI, you can analyze your skin problem and get the best recommendation for your skin problem
                </div>
            </div>
            <table class="w-100">
                <tr>
                    <td colspan="2">
                        <a href="/mobile/analyze">
                            <div class="card shadow rounded-4  px-3 py-3 border-0 " style="background: #eb79bd">
                                <div class="card-body px-3 my-auto rounded-4 py-3">
                                    <div class="row d-flex text-white">
                                        <div class="col-8 my-auto">
                                            <h3>
                                                Analyze Your Skin Problem
                                            </h3>
                                        </div>
                                        <div class="col-4 my-auto text-center">
                                                <span class="material-symbols-outlined" style="font-size: 60px;">
                                                        familiar_face_and_zone
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>

            </table>

            <table style="margin-top: 30px">
                <tr class="align-top">
                    <td style="width: 50%" class="text-center">
                        <a href="/mobile/result">
                            <div class="card shadow rounded-4 border-0  px-3 py-3 text-white" style="background: #eb79bd">
                                <div class="card-body px-3 rounded-4 py-3">
                                    <span class="material-symbols-outlined" style="font-size: 50px;">
                                        dermatology
                                    </span>
                                </div>
                                <p class="text-center">
                                    Dermatology
                                </p>
                            </div>

                        </a>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td style="width: 50%" class="text-center">
                        <a href="/mobile/recommendation">
                                <div class="card shadow rounded-4 border-0  px-3 py-3 text-white" style="background: #eb79bd">
                                    <div class="card-body px-3 rounded-4 py-3">
                                        <span class="material-symbols-outlined" style="font-size: 50px;">
                                            water_drop
                                        </span>
                                    </div>
                                    <p class="text-center">
                                        Skincare
                                    </p>
                                </div>

                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

@endsection
