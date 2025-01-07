@extends('app.layout')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mt-5">
            <a href="/dashboard" class="btn btn-primary btn-sm w-20 px-4 ">
                <
            </a>
        </div>
        <h1 class="txt-primary text-center fw-bold my-5">Sakoo Catalogue</h1>

        <div class="row d-flex justify-content-around">
            <input type="text" id="my-point" hidden value="{{auth()->user()->point}}">
            @foreach ($data as $item)
                <div class="col-md-2 mb-3">
                    <button class="btn btn-user-exchange" data-id="{{$item->id}}" data-point="{{$item->point}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="exchange text-center">
                                    <div style="width: 100px; height: 100px; overflow: hidden; position: relative; margin: 0 auto;">
                                        <img src="{{ asset('storage/images/exchange/' . $item->image) }}" alt="Image"
                                             style="width: 100%; height: 100%; object-fit: cover; display: block; margin: auto;">
                                    </div>
                                    {{-- <p class="mb-0 mt-4 txt-primary">{{$item->name}}</p> --}}
                                    <p class="mt-3 txt-primary">{{$item->point}} Points</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.btn-user-exchange', function() { // Use .on() for event delegation
                if (parseInt($('#my-point').val()) < parseInt($(this).data('point'))) {
                    swal({
                        title: "Insufficient Points",
                        text: "You do not have enough points to exchange this item",
                        icon: "error",
                    });
                    return;
                }else{
                    swal({
                        title: "Trade Now?",
                        text: "You will exchange this item",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Yes, exchange it!',
                        cancelButtonText: 'No, cancel!',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/api/user-exchange',
                                type: 'POST',
                                data: {
                                    user_id: {{auth()->user()->id}},
                                    exchange_id: $(this).data('id'),
                                    point: $(this).data('point')
                                },
                                success: function(data) {
                                        swal({
                                            title: "Exchanged!",
                                            text: "You have successfully exchanged the item",
                                            icon: "success",
                                        })

                                }
                            })
                        } else {
                            swal({
                                title: "Cancelled!",
                                text: "You have cancelled the exchange",
                                icon: "error",
                            })
                        }
                    });
                }
            });
        });

    </script>

@endpush
