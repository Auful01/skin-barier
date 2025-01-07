@extends('app.layout-mobile')

@section('content')
<div class="px-4 mt-4 d-flex ">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto" >
            arrow_back
            </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        Points Remaining
    </p>
</div>


<div class="card shadow-none mx-3" style="margin-top: 20px;" >
    <div class="card-body rounded-4">
        <table class="w-100">
            <tr>
                <td>
                    <p class="fw-bold">My Points</p>
                    <h2>{{auth()->user()->point}}</h2>
                </td>
                <td class="text-end">

                    <span class="material-symbols-outlined" style="font-size: 40px;">
                        credit_card
                        </span>
                </td>
            </tr>
        </table>

    </div>
</div>


<div class="card shadow-none mx-3" style="margin-top: 20px;" >
    <div class="card-body rounded-4" style="height: 630px;">
        <div class="d-flex">
         <span class="material-symbols-outlined">
             history
             </span>
                 History
        </div>

        <table>
            <tr>
                <td>
                    <button class="btn btn-sm btn-primary" id="dispose">
                        Dispose
                    </button>
                </td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" id="exchange">
                        Exchange
                    </button>
                </td>
            </tr>
        </table>

        {{-- <select name="" id="" class="form-control">
            <option value="">All</option>
            <option value="">Metal</option>
            <option value="">Non Metal</option>
        </select> --}}

        {{-- @php
            $data = [
                [
                    'date' => '02/12/2024',
                    'metal' => 12,
                    'non_metal' => 12,
                    'points' => 12
                ],
                [
                    'date' => '02/12/2024',
                    'metal' => 12,
                    'non_metal' => 12,
                    'points' => 12
                ],
                [
                    'date' => '02/12/2024',
                    'metal' => 12,
                    'non_metal' => 12,
                    'points' => 12
                ],
                [
                    'date' => '02/12/2024',
                    'metal' => 12,
                    'non_metal' => 12,
                    'points' => 12
                ],
                [
                    'date' => '02/12/2024',
                    'metal' => 12,
                    'non_metal' => 12,
                    'points' => 12
                ],
            ];
        @endphp --}}

        <div style="overflow-y: auto;max-height:550px;" class="mt-4" id="data-dispose">
            @if (count($data) == 0)
            <div class="rounded-3 p-2 mb-3 text-center" >
                <img src="{{ asset('images/login/sakoo.png') }}" class="mx-auto d-block" alt="">
                <p>No Data</p>
            </div>
            @else
                @foreach ($data as $dt)
                <div class="rounded-3 p-2 mb-3" style="background: #fcfcfc">
                    <p>{{$dt['created_at']}}</p>

                    <table>
                        <tr>
                            <td>Points Reached&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>: +{{$dt['point']}}</td>
                        </tr>
                    </table>
                    <p class="m-0">
                        ----------
                    </p>
                    <small>
                        Obtain {{$dt['point']}} points from disposed {{$dt['category']['name']}}
                    </small>
                </div>
                @endforeach
            @endif
        </div>

        <div style="overflow-y: auto;max-height:550px;" class="mt-4" id="data-exchange" hidden>
            @if (count($exch) == 0)
            <div class="rounded-3 p-2 mb-3 text-center" >
                <img src="{{ asset('images/login/sakoo.png') }}" class="mx-auto d-block" alt="">
                <p>No Data</p>
            </div>
            @else
                @foreach ($exch as $dt)
                <div class="rounded-3 p-2 mb-3" style="background: #fcfcfc">
                    <p>{{$dt['created_at']}}</p>

                    <table>
                        <tr>
                            <td>Points Used&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>: -{{$dt['exchange']['point']}}</td>
                        </tr>
                    </table>
                    <p class="m-0">
                        ----------
                    </p>
                    <small>
                        Exchange {{$dt['exchange']['point']}} points for {{$dt['exchange']['name']}}
                    </small>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>


    $('#dispose').on('click', function(){
        $("#dispose").addClass('btn-primary').removeClass('btn-outline-primary');
        $('#data-dispose').removeAttr('hidden');
        $("#exchange").removeClass('btn-primary').addClass('btn-outline-primary');
        $('#data-exchange').attr('hidden', true);
    })

    $('#exchange').on('click', function(){
        $("#exchange").addClass('btn-primary').removeClass('btn-outline-primary');
        $('#data-exchange').removeAttr('hidden');
        $("#dispose").removeClass('btn-primary').addClass('btn-outline-primary');
        $('#data-dispose').attr('hidden', true);
    })

    const ctx = document.getElementById('points');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        // labels: ['Metal', 'Non Metal'],
        datasets: [{
        //   label: '# of Votes',
          data: [12, 19],
          borderWidth: 1
        }]
      },
    });
  </script>
@endpush
