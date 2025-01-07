@extends('app.layout-mobile')

@section('content')
<div class="px-4  fixed-top bg-white " style="padding-top: 16px; padding-bottom: 16px;">

    <div class="d-flex">
        <a href="/mobile/recommendation">
            <span class="material-symbols-outlined my-auto">
                arrow_back
            </span>
        </a>
        <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
            Recommendation
        </p>
    </div>
</div>

<div style="margin-top: 70px;" class="mx-3">

    <div class="mt-3">
        <div class="d-flex">
            <div class="col-6 my-auto" style="color:#eb79bd">
                <h3 id="name">
                    Cethapil
                </h3 >
                <p id="type">
                    Gentle skin Cleanser
                </p>
            </div>
            <div class="col-6 text-end" >
                <img src="" alt="" id="skincare-img" class="img-fluid" style="height: 150px;">
            </div>
        </div>

        <div class="card shadow border-0 rounded-4 my-3 text-white" style="background: #eb79bd">
            <div class="card-body rounded-4">
                <div class="mb-3">
                    <p class="fw-bold">
                        Suitable for:
                    </p>

                    <div id="suitable">
                        -
                    </div>
                </div>

                <div class="mb-3">
                    <p class="fw-bold">
                        Composition:
                    </p>

                    <div id="ingredients">
                        -
                    </div>
                </div>

                <div class="mb-3">
                    <p class="fw-bold">
                        Benefit:
                    </p>

                    <div id="benefit">
                        -
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection


@push('scripts')
<script>
    var id = window.location.pathname.split('/').pop();

    $.ajax({
        url: '/api/skincare/' + id,
        type: 'GET',
        success: function(data) {
            // console.log(data);
            var urlImg = data.image ? '{{asset("images/")}}' + '/' + data.image : 'https://png.pngtree.com/png-clipart/20220729/ourmid/pngtree-skincare-routine-png-image_6092051.png';
            $('#skincare-img').attr('src', urlImg);
            $('#name').text(data.name);
            $('#type').text(data.type);
            $('#suitable').text(data.skin_type);
            $('#ingredients').text(data.ingredients ?? '-');
            $('#benefit').text(data.key_benefit);
        }
    })
</script>
@endpush
