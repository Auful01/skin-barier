@extends('app.layout-mobile')

@section('content')
<div class="px-4  fixed-top bg-white " style="padding-top: 16px; padding-bottom: 16px;">

    <div class="d-flex">
        <a href="/mobile/dashboard">
            <span class="material-symbols-outlined my-auto">
                arrow_back
            </span>
        </a>
        <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
            Recommendation
        </p>
    </div>


    <div class="input-group mt-4">
        <input type="text" class="form-control" placeholder="Search" id="search">
        <div class="input-group-append my-auto ">
            <button class="btn my-auto rounded-start-0" style="background: #eb79bd">
                <span class="material-symbols-outlined mx-2 " style="font-size: 24px;color: #fff">
                    search
                </span>
            </button>
        </div>
    </div>
</div>

<div style="margin-top: 150px;" class="mx-3">

    <div class="mt-3" id="skincare-list">
        {{-- @php
            $data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        @endphp

        @foreach ($data as $item)
        <a href="/mobile/recommendation/{{$item}}">
            <div class="card shadow border-0 rounded-4 mb-3" style="background: #eb79bd">
                <div class="card-body rounded-4">
                    <div class="row">

                        <div class="col-9 text-white">
                            <h3>Cethapil</h3>
                            <p>Suitable for:</p>
                            <ul>
                                <li>Normal Skin</li>
                                <li>Dry Skin</li>
                            </ul>
                        </div>
                        <div class="col-3 my-auto">
                            <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach --}}

    </div>
</div>
@endsection


@push('scripts')

<script>
    $.ajax({
        url: '/api/skincare/mobile',
        type: 'GET',
        success: function(data) {
            data.forEach(e => {
                var data = `
                <a href="/mobile/recommendation/${e.id}">
                    <div class="card shadow border-0 rounded-4 mb-3" style="background: #eb79bd">
                        <div class="card-body rounded-4">
                            <div class="row">

                                <div class="col-9 text-white">
                                    <h3>${e.name}</h3>
                                    <p>Suitable for:</p>
                                    <ul>
                                        <li>${e.skin_type}</li>
                                    </ul>
                                </div>
                                <div class="col-3 my-auto">
                                    <img src="{{asset('images/${e.image}')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                `

                $('#skincare-list').append(data);
            });
        }
    })

    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#skincare-list .card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>

@endpush
